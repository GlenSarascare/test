<?php
/**
 * Lazyload images for speed
 */
class Bunyad_Theme_Lazyload
{
	public $image_sizes;
	public $svg_cache;

	/**
	 * Flag to enable/disable images that follow in queue
	 */
	public $disabled = false;
	public $prev_state = false;
	
	public function __construct()
	{
		if (is_admin()) {
			return;
		}

		// Bunyad::options() isn't initialized yet, wait for it
		add_action('after_setup_theme', array($this, 'init'));
	}
	
	/**
	 * All core ready - initialize
	 */
	public function init()
	{
		if (!Bunyad::options()->lazyload_enabled) {
			return;
		}
		
		// Add attributes for the normal img tags, masonry, some sliders, or legacy.
		add_filter('wp_get_attachment_image_attributes', array($this, 'image_attribs'), 10, 3);

		// Add attributes to the new background images.
		add_filter('bunyad_media_bg_image_attribs', array($this, 'bg_image_attribs'));

		/**
		 * Native lazyload for images in content. To be removed after https://core.trac.wordpress.org/ticket/44427 
		 * lands in core. No longer needed after WP v5.5.
		 * 
		 * @deprecated 7.3
		 */
		if (!function_exists('wp_lazy_loading_enabled')) {
			$native_lazy = function($content) {
				return $this->process_content($content, 'native');
			};

			foreach (['the_content', 'the_excerpt', 'comment_text', 'widget_text_content', 'get_avatar'] as $filter) {
				add_filter($filter, $native_lazy);
			}
		}

		// We have our custom lazyload, don't use native lazyloading for featured media.
		add_filter('bunyad_media_post_thumbnail_args', function($args) {
			$args['attr']['loading'] = '';
			return $args;
		});

		// Aggressive lazyload for sidebar and footer
		if (Bunyad::options()->lazyload_aggressive) {

			// WPBakery conflicts in preview with footer buffer and widgets won't update.
			// vc_is_page_editable() isn't reliable at this point.
			if (!empty($_GET['vc_editable'])) { 
				return;
			}

			add_action('dynamic_sidebar_before', array($this, 'start_buffer'), 10);
			add_action('dynamic_sidebar_after', array($this, 'process_buffer'), 10);
		
			add_action('bunyad_pre_footer', array($this, 'start_buffer'), 10);
			add_action('wp_footer', array($this, 'process_buffer'), 2);
		}

		// Enable bg images for thumbnails in lazyload, where possible.
		add_filter('bunyad_media_image_options', function($options) {
			if ($this->should_lazy() && $options['bg_image'] === null) {
				$options['bg_image'] = 'auto';
			}

			return $options;
		});

		// Cache image sizes - used by image_attribs()
		$this->image_sizes = $this->get_registered_sizes();
		
		add_action('wp_enqueue_scripts', array($this, 'register_assets'));
		Bunyad::core()->add_body_class('lazy-' . Bunyad::options()->lazyload_type);
	}
	
	/**
	 * Setup the JS file
	 */
	public function register_assets()
	{
		wp_enqueue_script(
			'lazysizes', 
			get_template_directory_uri() . '/js/lazysizes.js', 
			array('cheerup-theme'), 
			Bunyad::options()->get_config('theme_version'), 
			true
		);
	}
	
	/**
	 * Disable lazy flags addition on images that follow
	 */
	public function disable() {
		$this->prev_state = $this->disabled;
		$this->disabled   = true;
		return $this;
	}
	
	/**
	 * Re-enable lazy load (enabled by default)
	 */
	public function enable() {
		$this->prev_state = $this->disabled;
		$this->disabled   = false;
		return $this;
	}

	/**
	 * Restore to previous state (as set by enable()/disable())
	 */
	public function restore() {
		$this->disabled = $this->prev_state;
		return $this;
	}
	
	/**
	 * Start capturing content to filter later
	 */
	public function start_buffer()
	{
		// Capture sidebar input
		ob_start();
	}
	
	public function process_buffer()
	{
		$content = ob_get_clean();
		$content = $this->process_content($content);

		echo $content;
	}
	
	/**
	 * Process Raw HTML to find and replace images
	 */
	public function process_content($content = '', $type = '')
	{
		if (!$this->should_lazy()) {
			return $content;
		}
		
		preg_match_all('#<(img|iframe)[^>]*>#is', $content, $matches);
		$elements = $matches[0];
		
		foreach ($elements as $key => $element) {
			
			$updated = '';
			$tag     = $matches[1][$key];
			
			// Parse the tag attributes.
			// @todo: More testing on regex OR use wp_kses_hair()
			preg_match_all('#(?P<name>[a-z\-]+)=("|\')(?P<value>.*?)\2#is', $element, $match);
			if (empty($match['name'])) {
				continue;
			}
			
			$attr = array_combine((array) $match['name'], (array) $match['value']);
			
			// Skip if already lazyloaded.
			if (isset($attr['class']) && strstr($attr['class'], 'lazyload')) {
				continue;
			}

			// Native lazyload has to be handled differently.
			if ($type == 'native') {

				// Skip if an existing loading is defined - which maybe eager.
				if (isset($attr['loading'])) {
					continue;
				}

				$attr['loading'] = 'lazy';
			}
			else {

				// Extend some defaults
				$attr = array_merge(array(
					'class' => ''
				), $attr);
					
				// Add class
				$attr['class'] .= ' lazyload';
				
				$width  = (!empty($attr['width']) ? $attr['width'] : 1);
				$height = (!empty($attr['height']) ? $attr['height'] : 1);
				
				// Generate src
				$attr['data-src'] = $attr['src'];
				$attr['src'] = $this->svg_placeholder($width, $height);
				
				// Set srcset if exists
				if (!empty($attr['data-srcset'])) {
					$attr['data-srcset'] = $attr['srcset'];
					unset($attr['srcset']);
				}
			}

			$updated = '<' . esc_attr($tag) . ' '
				. Bunyad::markup()->attribs('lazy', $attr, array('esc_src_url' => 0, 'echo' => 0))
				. ($tag == 'img' ? ' />' : '>');

			$content = str_replace($element, $updated, $content);

		}
		
		return $content;
	}
	
	/**
	 * Check if lazy load should be applied
	 */
	public function should_lazy()
	{
		if ($this->disabled || is_feed() || is_preview() || is_admin()) {
			return false;
		}

		// WPBakery page builder loads shortcode this way.
		// vc_is_page_editable() isn't reliable at this point.
		if (!empty($_GET['vc_editable'])) { 
			return false;
		}
		
		if (function_exists('is_amp_endpoint') && is_amp_endpoint()) {
			return false;
		}
		
		// WooCommerce image zoom is bugged
		if (function_exists('is_product') && is_product()) {
			return false;
		}
		
		// Filter that can disable lazyload by returning false
		if (!apply_filters('bunyad_lazyload_enabled', true)) {
			return false;
		}
		
		return true;
	}
	
	
	/**
	 * Add image attributes 
	 * 
	 * @see wp_get_attachment_image()
	 * @param string $size
	 */
	public function image_attribs($attr, $attachment, $size) 
	{
		if (!$this->should_lazy()) {
			return $attr;
		}

		/**
		 * Get width and height
		 */
		$width  = 1;
		$height = 1;
		
		$attachment = wp_get_attachment_metadata($attachment->ID);
		
		if (is_string($size)) {
			
			// From attachment metadata first - fallback to global setting next
			if (!empty($attachment['sizes']) && array_key_exists($size, $attachment['sizes'])) {
				$info   = $attachment['sizes'][$size];
			}
			else if (array_key_exists($size, $this->image_sizes)) {
				$info   = $this->image_sizes[$size];

			}
			
			if (!empty($info)) {
				$width  = $info['width'];
				$height = $info['height'];
			}
		}
		
		// Have srcset?
		if (!empty($attr['srcset'])) {
			
			$attr['data-srcset'] = $attr['srcset'];
			unset($attr['srcset']);
		}

		// Add placeholder and move orig to data-src
		$attr['data-src'] = $attr['src'];
		$attr['src']      = esc_attr($this->svg_placeholder($width, $height));
		$attr['class']   .= ' lazyload';
		
		return $attr;
	}

	/**
	 * Filter callback: Add the lazyload class to bg images.
	 * 
	 * Filter: bunyad_media_bg_image_attribs
	 */
	public function bg_image_attribs($attrs) 
	{
		if (!$this->should_lazy()) {
			return $attrs;
		}

		// Add lazy load class.
		$attrs['class']  = !isset($attrs['class']) ? '' : $attrs['class'];
		$attrs['class'] .= ' lazyload';

		return $attrs;
	}
	
	/**
	 * Create an SVG placeholder for data URI
	 * 
	 * @param integer $width
	 * @param integer $height
	 * @return string Data URI format svg
	 * 
	 */
	public function svg_placeholder($width = 1, $height = 1)
	{
		$id = "{$width}x{$height}";
		
		if (!empty($this->svg_cache[$id])) {
			return $this->svg_cache[$id];
		}
		
		$svg = "<svg viewBox='0 0 {$width} {$height}' xmlns='http://www.w3.org/2000/svg'></svg>";
		$svg = base64_encode($svg);
		
		return ($this->svg_cache[$id] = 'data:image/svg+xml;base64,' . $svg); 
	}
	
	/**
	 * Get all registered image sizes, including default ones
	 * 
	 * @link http://core.trac.wordpress.org/ticket/18947 Reference ticket
	 */
	public function get_registered_sizes()
	{
		global $_wp_additional_image_sizes;
	
		$default_sizes = array('thumbnail', 'medium', 'medium_large', 'large');
		 
		foreach ($default_sizes as $size) {
			$image_sizes[$size]['width']  = intval( get_option("{$size}_size_w"));
			$image_sizes[$size]['height'] = intval( get_option("{$size}_size_h"));
			$image_sizes[$size]['crop']   = get_option("{$size}_crop") ? get_option("{$size}_crop") : false;
		}
		
		if (!empty($_wp_additional_image_sizes)) {
			$image_sizes = array_merge($image_sizes, $_wp_additional_image_sizes);
		}
			
		return $image_sizes;
	}
}

// init and make available in Bunyad::get('lazyload')
Bunyad::register('lazyload', array(
	'class' => 'Bunyad_Theme_Lazyload',
	'init' => true
));