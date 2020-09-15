<?php
/**
 * Methods related to media functionalities (images, audio and videos)
 * 
 * @copyright ThemeSphere
 */
class Bunyad_Theme_Media
{
	/**
	 * @var array All the known image sizes of the theme.
	 */
	public $theme_sizes = [];

	/**
	 * @var array Known computed ratios.
	 */
	public $preset_ratios = [];

	/**
	 * @var array Current image data to process srcset via a filter.
	 */
	public $srcset_process_data;

	/**
	 * @var array Store image attributes of latest image from 'wp_get_attachment_image_attributes'. 
	 */
	protected $current_img_attribs;

	/**
	 * @var array Image URLs to be filtered via 'wp_calculate_image_srcset'.
	 */
	protected $srcset_remove = [];


	public function __construct()
	{
		// Preset known ratios.
		$this->preset_ratios = [
			'1-1'  => 1,
			'4-3'  => round(4/3, 2),
			'3-2'  => round(3/2, 2),
			'16-9' => round(16/9, 2),
			'3-4'  => round(3/4, 2),
			'2-3'  => round(2/3, 2),
		];

		// Store all the sizes registered by the theme.
		add_filter('bunyad_image_sizes', function($sizes) {
			$this->theme_sizes = $sizes;	
			return $sizes;
		}, 999);

		add_filter('max_srcset_image_width', array($this, '_max_size'), 10, 2);
		add_filter('bunyad_image_sizes', [$this, '_scale_theme_sizes'], 5);
		
		// Filter to process srcset data of images. See method for details.
		add_filter('wp_calculate_image_srcset_meta', [$this, '_srcset_process'], 10, 3);

		// Unset images marked to be removed. Needed as src file has to be preserved in srcset_meta filter.
		add_filter('wp_calculate_image_srcset', function($sources) {
			foreach ($sources as $id => $image) {
				if (in_array($image['url'], $this->srcset_remove)) {
					unset($sources[$id]);
				}
			}

			// All done for this image.
			$this->srcset_remove = [];

			return $sources;
		});

		// Store current image attribs. Used by self::get_post_thumbnail()
		add_filter('wp_get_attachment_image_attributes', function($attr) {
			$this->current_img_attribs	= $attr;
			return $attr;
		}, 9);

		// Generating additional retina sizes can be done here.
		// Usage:
		//   add_filter('bunyad_image_sizes', [$this, '_add_retina_sizes'], 5);

		/**
		 * Determine physical image size to use based on provided width. Generally, this
		 * is not very important as all are added to srcset and browser picks right.
		 * 
		 * Useful in cases: 
		 *  - if height isn't specified, the closest image is needed for html attribute.
		 *  - old browsers
		 */
		add_filter('bunyad_media_image_fallback_size', function($size, $width) {
			
			if ($width < 780) {
				$size = 'cheerup-768';
			}
			else if ($width < 1100) {
				$size = 'large';
			}
			else if ($width < 1200) {
				$size = 'cheerup-full';
			}
			else if ($width < 1600) {
				$size = '1536x1536';
			}
			else {
				$size = 'cheerup-viewport';
			}

			// Appropriate size removed programmatically? Fallback.
			if (!$this->image_exists($size)) {
				$size = 'large';
			}

			return $size;

		}, 10, 2);
	}
	
	/**
	 * Callback: Register max width for srcset.
	 * 
	 * This mainly ensures original images that are too large aren't included.
	 */
	public function _max_size($width, $size = array())
	{
		// 2x for 1170px+ and for large image sizes should be allowed.
		if (!empty($size[0]) && $size[0] >= 1170) {
			return 2400;
		}
		
		// Largest in WordPress 5.3.
		return 2048;
	}

	/**
	 * Callback: Scale default image sizes for theme width.
	 *
	 * @param array $image_sizes
	 * @return array
	 */
	public function _scale_theme_sizes($image_sizes) 
	{
		// Scale sizes if theme width changed.
		$theme_width  = Bunyad::options()->layout_width ? Bunyad::options()->layout_width : 1170;
		$scale_factor = $theme_width / 1170;

		if ($theme_width !== 1170) {
			foreach ($image_sizes as $key => $size) {
				if (!empty($size['generate'])) {
					continue;
				}

				// Skip scaling of larger images.
				if ($size['width'] > $theme_width) {
					continue;
				}

				$image_sizes[$key] = array_replace($size, [
					'width'  => round($size['width'] * $scale_factor),
					'height' => round($size['height'] * $scale_factor),
				]);
			}
		}

		return $image_sizes;
	}

	/**
	 * Callback: Add retina image sizes.
	 * May also be used as a regular method for additional control.
	 *
	 * @param array $image_sizes
	 * @param array $images
	 * @return array
	 */
	public function _add_retina_sizes($image_sizes, array $images = [])
	{
		if (!$images) {
			$images = ['cheerup-main', 'cheerup-main-full'];
		}

		// Add 2x Retina sizes for some images if enabled.
		foreach ($images as $image) {
			
			if (!isset($image_sizes[$image])) {
				continue;
			}

			$size = $image_sizes[$image];

			$image_sizes[ $image . '-2x' ] = [
				'width'  => round($size['width'] * 2),
				'height' => round($size['height'] * 2),
			];
		}
		
		return $image_sizes;
	}

	/**
	 * Get featured image for a post. 
	 * 
	 * If the image for a specified size does not exist, a fallback is used based on
	 * provided width or width of the specified size - usually 'large'.
	 *
	 * @param string      $size     Native or Bunyad registered image size id.
	 * @param array       $options  An array of options to override defaults.
	 * @param int|WP_Post $post     Can be a post ID or an attachment ID.
	 * 
	 * @return array|bool
	 */
	public function featured_image($size, $options = [], $post = null)
	{
		$options = array_replace([
			'width'   => null,
			'height'  => null,

			// @see self::get_post_thumbnail()
			'srcset_filter' => true,
			'bg_image'      => null,

			// Integer, string, array, or float accepted.
			'ratio'   => null,

			// Scale both width and height by a number.
			'scale'   => null,
			'attr'    => [],
		], $options);

		$options = apply_filters('bunyad_media_image_options', $options, $size);

		$ratio_class     = '';
		$is_registered   = array_key_exists($size, $this->theme_sizes);

		// Size not registered as a theme size.
		if (!$is_registered) {

			$use_registered  = false;
			$width = $height = 0;

			// Might as well use the_post_thumbnail() here. If width is present, still makes 
			// sense for masonry or with ratio.
			if (!$options['width'] && !$options['height']) {
				_doing_it_wrong('featured_image', 'Not supposed to be used with a non-theme/native image size unless custom width and height has to be set.', null);
				return false;
			}
		}
		else {

			$use_registered = true;

			$image_data = $this->theme_sizes[$size];
			$width      = $image_data['width'];
			$height     = $image_data['height'];

			// Size isn't marked to be generated, can't be used.
			if (empty($image_data['generate'])) {
				$use_registered = false;
			}
		}

		// Custom width if provided and toggle the use_registered flag.
		if ($options['width'] !== null && $width !== $options['width']) {
			$width = round($options['width']);
			$use_registered = false;
		}

		// Custom height if provided and toggle the use_registered flag.
		if ($options['height'] !== null && $height !== $options['height']) {
			$height = round($options['height']);
			$use_registered = false;
		}

		// Scale height and widths if needed.
		if ($options['scale']) {
			$width  = round($width * $options['scale']);
			$height = round($height * $options['scale']);
		}

		// If height is set (and greater than 0), and a ratio is defined, scale height.
		$custom_ratio = $this->ratio_to_multiple($options['ratio']);
		if ($custom_ratio) {
			// DEBUG: $custom_ratio . '  --- ' . $options['ratio'];
			$height = round($width * $custom_ratio);
			$use_registered = false;
		}

		/**
		 * If image size is registered, exists, and is of correct dimension - use exact image.
		 * Otherwise, fallback to 'large' or an image size determined by the filter.
		 * 
		 * Filter: bunyad_media_image_fallback_size
		 * 
		 * Note: When a cropped registered size exists, 2x version is also required. User has to 
		 * use Retina2x in this case.
		 */
		if ($use_registered && $this->image_exists($size, [$width, $height], $post)) {

			// No need of srcset_filter here.
			$rendered = $this->get_post_thumbnail(
				$size, 
				[
					'width'    => $width,
					'height'   => $height,
					'set_size' => !empty($image_data['crop']) ? true : false,
					'attr'     => $options['attr'],
					'bg_image' => $options['bg_image'],

					// srcset filtering isn't required for real crops.
					'srcset_filter' => false,
				],
				$post
			);
		}
		else {
			
			// Fallback size to use.
			$fallback_size  = 'large';
			$fallback_size  = apply_filters('bunyad_media_image_fallback_size', $fallback_size, $width, $height);

			// Only rewrite dimensions if all present.
			$set_dimensions = ($width > 0 && $height > 0) ? true : false;

			$rendered = $this->get_post_thumbnail(
				$fallback_size, 
				[
					'width'          => $width,
					'height'         => $height,
					'srcset_filter'  => $options['srcset_filter'],
					'set_size'       => true,
					'set_dimensions' => $set_dimensions,
					'attr'           => $options['attr'],
					'bg_image'       => $options['bg_image'],
				],
				$post
			);
		}

		/**
		 * If both height/width present, determine wrapper for aspect ratios.
		 * 
		 * Note: Masonry have height 0, so ratio is unknown.
		 */
		if ($width > 0 && $height > 0) {

			if (!$custom_ratio) {
				$cur_ratio = round($width / $height, 2);
			}
			else {
				$cur_ratio = round($custom_ratio, 2);
			}
			
			// Known preset ratio? Use existing class.
			$preset_ratio = array_search($cur_ratio, $this->preset_ratios);
			if ($preset_ratio !== false) {
				$ratio_class = 'ratio-' . $preset_ratio;
			}
			else if ($custom_ratio) {
				$ratio_class = 'ratio-is-custom';
			}
			else {
				// Default wrapper class uses ar-{size_name}. Example: .ar-prefix-grid-image. 
				// These are expected to be defined in the CSS for the correct size.
				$ratio_class = 'ar-' . $size;
			}
		}

		return [
			'output'       => !empty($rendered['html']) ? $rendered['html'] : '',
			'ratio_class'  => $ratio_class,
			'inline_ratio' => $rendered['ratio']
		];
	}

	/**
	 * Convert ratio to a multiplier.
	 *
	 * @param string|array|float|integer $ratio
	 * @return null|float
	 */
	public function ratio_to_multiple($ratio) 
	{
		if (is_string($ratio)) {
			$ratio_split = preg_split('#(-|/)#', $ratio);

			if ($ratio_split && count($ratio_split) == 2) {
				$ratio = $ratio_split;
			}
		}

		// If an array is available, divide, avoiding division by 0.
		if (is_array($ratio) && count($ratio) == 2 && $ratio[1] > 0) {
			$ratio = (float) $ratio[0] / (float) $ratio[1];
		}

		if (!is_numeric($ratio)) {
			return null;
		}
		
		return (float) $ratio;
	}

	/**
	 * Get and output featured image.
	 *
	 * @uses self::featured_image()
	 * 
	 * @param string $size
	 * @param array  $args
	 * @return void
	 */
	public function the_image($size, $args = [])
	{
		// Skip if post doesn't even have a thumbnail.
		if (!has_post_thumbnail()) {
			return;	
		}

		// Also see: $options in self::featured_image()
		$args = array_replace([
			'attr'    => [],
			'wrapper' => '<a href="%1$s" class="%2$s"%3$s>%4$s</a>',
			'link'    => null,

			// Ratio class to add when ratio exists. Set to false to disable.
			'ratio_class' => 'media-ratio',

			// Set to true to always use bg images instead of img tag. Use 'auto' to only
			// enable if dimensions present.
			'bg_image' => null,

			// Classes to use on the wrapper.
			'classes' => 'image-link',
		], $args);

		// Add a title attribute by default.
		$args['attr'] = array_replace([
			'title' => strip_tags(get_the_title())
		], (array) $args['attr']);

		// Get the featured image.
		$featured = $this->featured_image($size, $args);

		// Add wrapper classes including ratio class determined by featured_image().
		$classes = [$args['classes']];
		$extra_attribs = [];

		if ($args['ratio_class']) {

			// Set the ratio class for bg images, even with unknown ratio.
			if (!$featured['ratio_class'] && $args['bg_image']) {
				$featured['ratio_class'] = 'bg-ratio';
			}
			
			if ($featured['ratio_class']) {
				array_push($classes, $args['ratio_class'], $featured['ratio_class']);
			}

			// Set an inline ratio for, usually, a bg image that had incomplete dimension
			// info. For example, masonry images with unknown height.
			if ($featured['inline_ratio']) {
				$extra_attribs[] = sprintf(
					'style="--a-ratio: %s"', 
					floatval($featured['inline_ratio'])
				);
			}
		}

		$wrapper_class = join(' ', array_filter($classes));

		if (!$args['link']) {
			$args['link'] = get_the_permalink();
		}

		// Final output.
		$output = sprintf(
			$args['wrapper'], 
			esc_url($args['link']), 
			esc_attr($wrapper_class),
			join(' ', $extra_attribs),
			$featured['output']  // Safe output from get_the_post_thumbnail()
		);

		echo apply_filters('bunyad_media_the_image', $output);
	}

	/**
	 * Extended the native get_post_thumbnail method and use filters to set the 
	 * dimensions (width, height), size attributes, and process srcset if needed.
	 *
	 * @uses get_the_post_thumbnail()
	 * 
	 * @param string $size
	 * @param array $args
	 * @param int|WP_Post $post
	 * @return array
	 */
	public function get_post_thumbnail($size, $args, $post = null) 
	{
		$args = array_replace([
			'width'          => null,
			'height'         => null,

			// Whether to filter images in srcset for correct aspect ratio or height.
			// Supports array: ['min_height' => 500]
			'srcset_filter'  => true,
			'attr'           => [],

			// Set to true to always use bg images instead of img tag. Use 'auto' to only
			// enable if dimensions present.
			'bg_image'       => null,

			// Whether to rewrite size attribute with correct width.
			'set_size'       => false,

			// To rewrite width and height attributes.
			'set_dimensions' => false,

		], $args);
		
		$args   = apply_filters('bunyad_media_post_thumbnail_args', $args);

		$width  = $args['width'];
		$height = $args['height'];

		if ($args['set_size']) {		
			$size_attr    = '(max-width: %1$dpx) 100vw, %1$dpx';
			$args['attr'] = array_replace(['sizes' => $size_attr], (array) $args['attr']);
		}

		// Allows replacing width in externally added size attrib as well.
		if (isset($args['attr']['sizes'])) {

			$args['attr']['sizes'] = sprintf(
				$size_attr, 

				// Fix to use 768px images on 1x. Chrome uses 1024 image for 770px otherwise.
				(abs($width - 768) < 10) ? 768 : $width
			);
		}

		// Data to ensure srcset images meet the minimum height requirement.
		// @see self::_srcset_process();
		if ($args['srcset_filter'] && ($height || is_array($args['srcset_filter']))) {

			if (!$height && !isset($args['srcset_filter']['min_height'])) {
				_doing_it_wrong('get_post_thumbnail', 'Either height has to be known or specified in key min_height of srcset_filter.', null);
				return false;
			}

			$_height = $height;
			if (is_array($args['srcset_filter']) && isset($args['srcset_filter']['min_height'])) {
				$_height = $args['srcset_filter']['min_height'];
			}

			$this->srcset_process_data = [
				'min_height'   => $_height,
				'target_width' => $args['width'],
			];
		}
		
		// The provided post id may be an attachment or post.
		if (get_post_type($post) !== 'attachment') {
			$rendered = get_the_post_thumbnail($post, $size, $args['attr']);
		}
		else {
			$rendered = wp_get_attachment_image($post, $size, false, $args['attr']);
		}

		// If bg images are forced. Or if bg images are set to 'auto' and dimensions present.
		$img_attribs = (array) $this->current_img_attribs;
		if (
			$args['bg_image'] || 
			($args['bg_image'] == 'auto' && $width && $height > 0 && $img_attribs)
		) {

			// When forced and one of the dimensions is missing, real ratio is needed.
			$file_ratio = null;
			if (!$width || !$height) {
				$image = wp_get_attachment_metadata(
					get_post_thumbnail_id($post)
				);

				if ($image['width'] && $image['height']) {
					$file_ratio = $image['width'] / $image['height'];
				}
			}

			$rendered = $this->_render_bg_image(
				$img_attribs + ['file_ratio' => $file_ratio]
			);
		}

		// @todo Make it optional.
		if ($args['set_dimensions']) {
			
			// Regex is alright in a short & specific string like this.
			$rendered = preg_replace('/width="([^"]*)"/', 'width="' . intval($width) . '"', $rendered);
			$rendered = preg_replace('/height="([^"]*)"/', 'height="' . intval($height) . '"', $rendered);
		}

		return [
			'html'  => apply_filters('bunyad_media_image_html', $rendered),
			
			// Only set when a bg image of missing width or height is used.
			'ratio' => !empty($file_ratio) ? $file_ratio : null
		];
	}

	/**
	 * Render HTML for a bg image given the image attributes.
	 * 
	 * Note: BG images are only used in conjunction with JS, generally for lazyloading.
	 * 
	 * @param array $img_attribs {
	 *     @type string $class 
	 *     @type string $src
	 *     @type string $srcset
	 *     @type string $sizes
	 *     @type string $alt
	 *     @type int    $file_ratio  Optional ratio from real file.
	 * }
	 * 
	 * @return string
	 */
	protected function _render_bg_image($img_attribs) 
	{
		$attribs = [
			'data-bgsrc' => $img_attribs['src'],
			'class'      => 'img bg-cover wp-post-image ' . $img_attribs['class'],

			// With or without aria-label, it's still good to have when title's provided.
			'role'       => 'img'
		];

		if (isset($img_attribs['srcset']) && isset($img_attribs['sizes'])) {
			$attribs['data-bgset'] = $img_attribs['srcset'];
			$attribs['data-sizes'] = $img_attribs['sizes'];
		}

		// Use alt in aria-label or fallback to title.
		if (!empty($img_attribs['alt'])) {
			$attribs['aria-label'] = $img_attribs['alt'];
		}
		else if (!empty($img_attribs['title'])) {
			$attribs['title'] = $img_attribs['title'];
		}

		// Ratio is needed from original file since height is missing.
		if ($img_attribs['file_ratio'] > 0) {
			$attribs['data-ratio'] = $img_attribs['file_ratio'];
		}

		$attribs = apply_filters('bunyad_media_bg_image_attribs', $attribs);

		return sprintf(
			'<span %s></span>',
			Bunyad::markup()->attribs(
				'render-img', 
				array_map('esc_attr', $attribs), 
				['echo' => 0]
			)
		);
	}

	/**
	 * Filter callback: Process srcset meta sizes to filter out images that don't meet
	 * a minimum height or an aspect ratio.
	 * 
	 * Using srcset, the w descriptor ensures correct image is selected using the widths
	 * in srcset. The height is not considered which is fine in normal WP crops. However 
	 * our image selection can include multiple uncropped images that are right width 
	 * but the height might be too low. 
	 * 
	 * For instance, for a location that needs 370x370, an uploaded image of 740x320 will 
	 * have a cheerup-medium 370x160 size image in srcset. The browser may pick this image
	 * on width basis, resulting in blurriness. 
	 *
	 * Solution by this method: to pick images that are either close in ratio, for example
	 * 370x350 or images that have greater than min specified height.
	 *
	 * @param array $meta
	 * @return array Filtered sizes in the meta array.
	 */
	public function _srcset_process($meta, $sizes = [], $image_src = '')
	{
		$data = $this->srcset_process_data;

		if (!$data || empty($meta['sizes']) || !$data['target_width'] || !$data['min_height']) {
			return $meta;
		}

		// Desired pixels used in Case 1 below.
		$desired_pixels = $data['target_width'] * $data['min_height'];

		// Target ratio for both cases below.
		$target_ratio = $data['target_width'] / $data['min_height'];

		// Directory from the main image file for matching src.
		$dirname       = trailingslashit(_wp_get_attachment_relative_path($meta['file']));
		$upload_dir    = wp_get_upload_dir();
		$image_baseurl = trailingslashit($upload_dir['baseurl']) . $dirname;

		// All the known physical sizes.
		foreach ($meta['sizes'] as $key => $image) {

			$is_src = false;
			if (false !== strpos($image_src, $dirname . $image['file'])) {
				$is_src = true;
			}

			if (!$image['width'] || !$image['height']) {
				continue;
			}

			// The height meets the requirement.
			if ($image['height'] >= $data['min_height']) {
				continue;
			}

			$ratio      = $image['width'] / $image['height'];
			$ratio_diff = 100 * (1 - (min($target_ratio, $ratio) / max($target_ratio, $ratio)));

			/**
			 * Case 1: An image with larger than required width but smaller height. Otherwise, 
			 * we'll compare ratio later.
			 * 
			 * Keep if the image pixels are higher than demanded pixels. This will always 
			 * crop and zoom without any quality loss.
			 * 
			 * OR if the difference is within ~1.5% range. Example desired 370x300 at 450x240:
			 *  370x300 = 111000px, 450x243 = 109350px, 1.49% diff
			 *  Height with browser zoom: 243*(450/370) = ~296px
			 * 
			 */
			if ($image['width'] >= $data['target_width']) {
				$pixels = $image['width'] * $image['height'];

				// This is always adequate with browser crop and zoom.
				if ($pixels >= $desired_pixels) {
					continue;
				}
				else {

					// Allow ~1.5% leeway.
					$pixels_diff = 1 - (min($desired_pixels, $pixels) / max($desired_pixels, $pixels));
					if (($pixels_diff * 100) < 1.5) {
						continue;
					}
				}
			}
			else {

				/**
				 * Case 2: An image with smaller width and smaller height.
				 * 
				 * Ratio Check: Good if percentage difference of ratio is less than 10%. So 
				 * images within 10% of expected ratio will be kept.
				 */
				if ($ratio_diff < 10) {
					continue;
				}
			}

			// Debug: echo "Dropping {$key} => {$image['width']} x {$image['height']}";

			// If it's the src image, don't remove it yet. The $src_matched check in 
			// wp_calculate_image_srcset() has to pass. Mark it to be removed later with
			// the filter 'wp_calculate_image_srcset'.
			if ($is_src) {
				$this->srcset_remove[] = $image_baseurl . $image['file'];
			}
			else {
				// Not a valid candidate, filter.
				unset($meta['sizes'][$key]);
			}
		}

		// Remove the data, image is processed.
		$this->srcset_process_data = null;

		return $meta;
	}

	/**
	 * Check if the image size exists. If dimensions are specified, ensures the width
	 * and height matches.
	 *
	 * @param string $size
	 * @param null|array $dimensions
	 * @return boolean
	 */
	public function image_exists($size, $dimensions = null, $post = null)
	{
		$id = get_post_thumbnail_id($post);
		$found_image = image_get_intermediate_size($id, $size);
		
		if ($found_image) {

			if ($dimensions === null) {
				return true;
			}

			// If specific dimensions are required. Registered image sizes by id 
			// can have their values changed sometimes.
			list($width, $height) = $dimensions;

			// Round subpixel values and allow for 1px difference either way.
			$width_diff  = absint(round($width - $found_image['width']));
			$height_diff = absint(round($height - $found_image['height']));

			if ($width_diff <= 1 && $height_diff <= 1) {
				return true;
			}
		}

		return false;
	}
	
	/**
	 * Get post thumbnail image size if it exists or a fallback.
	 * 
	 * Not recommended anymore. Use Bunyad::media()->the_image().
	 * 
	 * @param string $size
	 */
	public function image_size($size, $fallback = '') 
	{
		$id = get_post_thumbnail_id();
		
		if (image_get_intermediate_size($id, $size)) {
			return $size;
		}
		
		// Sane size for full
		if ($fallback == 'full') {

			// Get featured image dimensions
			list($url, $width, $height) = wp_get_attachment_image_src($id, 'full');
			
			if ($width > 2400 OR $height > 2400) {
				$fallback = 'large';
			}
		}
		
		return $fallback;
	}
}

// init and make available in Bunyad::get('media')
Bunyad::register('media', array(
	'class' => 'Bunyad_Theme_Media',
	'init' => true
));