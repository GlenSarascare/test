<?php
/**
 * General Template tags / View Helpers and utility methods.
 */
class Bunyad_Theme_Helpers
{
	/**
	 * View Helper: Output mobile logo
	 */
	public function mobile_logo()
	{
		if (!Bunyad::options()->mobile_logo_2x) {
			return;
		}
		
		// Attachment id is saved in the option
		$id   = Bunyad::options()->mobile_logo_2x;
		$logo = wp_get_attachment_image_src($id, 'full');
		
		if (!$logo) {
			return;
		}
			
		// Have the logo attachment - use half sizes for attributes since it's in 2x size
		if (is_array($logo)) {
			$url = $logo[0]; 
			$width  = round($logo[1] / 2);
			$height = round($logo[2] / 2);
		}
		
		?>
					
		<img class="mobile-logo" src="<?php echo esc_url($url); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>" 
			alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />

		<?php
	}
	
	/**
	 * Categories for meta
	 * 
	 * @param boolean|null $all  Display primary/one category or all categories.
	 * @return string Rendered HTML.
	 */
	public function get_meta_cats($all = null, $post_id = false)
	{
		// Object has category taxonomy? i.e., is it a post or a valid CPT?
		if (!is_object_in_taxonomy(get_post_type($post_id), 'category')) {
			return;
		}

		$categories = apply_filters('the_category_list', get_the_category($post_id), $post_id);
		$output     = [];

		// Not showing all categories.
		if (!$all) {
			$category = $this->get_primary_cat($post_id);

			$categories = [];
			if (is_object($category)) { 
				$categories[] = $category;
			}
		}
		
		foreach ($categories as $category) {
			$output[] = sprintf(
				'<a href="%1$s" class="category" rel="category">%2$s</a>',
				esc_url(get_category_link($category)),
				esc_html($category->name)
			);
		}

		return join(' ', $output);
	}

	public function meta_cats($all = null) 
	{
		// Legacy: For sliders etc. that are still using this method directly.
		// Auto-decide if only primary should be displayed.
		if ($all === null) {
			$all = Bunyad::options()->post_meta_all_cats;
		}

		echo $this->get_meta_cats($all); // Escaped output above.
	}

	/**
	 * Get primary category for a post.
	 *
	 * @param int $post_id
	 * @return object|WP_Error|null
	 */
	public function get_primary_cat($post_id = null)
	{
		// Primary category defined.
		if (($cat_label = Bunyad::posts()->meta('cat_label', $post_id))) {
			$category = get_category($cat_label);
		}
		
		// This test is needed even if a primary cat is defined to test for its
		// existence (it might be deleted etc.)
		if (empty($category)) {
			$category = current(get_the_category($post_id));
		}

		return apply_filters('bunyad_get_primary_cat', $category);
	}
	
	/**
	 * Get the loop template with handling via a dynamic loop template
	 * for special cases.
	 * 
	 * @param  string  $id
	 * @param  array   $data
	 * @param  array   $options
	 * @see Bunyad_Core::partial()
	 */
	public function loop($id = '', $data = array(), $options = array()) 
	{
		if (empty($id)) {
			$id = 'loop';
		}
		
		// Dynamic loop templates configuration
		$dynamic = array(
			'loop-grid'               => array('number' => 0),
			'loop-grid-3'             => array('number' => 0, 'grid_cols' => 3),
			'loop-list'               => array('number' => 0, 'type' => 'list'),
			'loop-1st-large'          => array('number' => 100),
			'loop-1st-large-list'     => array('type' => 'list', 'number' => 100),
			'loop-1st-overlay'        => array('large' => 'overlay', 'number' => 100),
			'loop-1st-overlay-list'   => array('large' => 'overlay', 'number' => 100, 'type' => 'list'),
			'loop-1-2'                => array(),
			'loop-1-2-list'           => array('type' => 'list'),
			'loop-1-2-overlay'        => array('large' => 'overlay'),
			'loop-1-2-overlay-list'   => array('large' => 'overlay', 'type' => 'list')
		);
		
		// Is a dynamic template?
		if (array_key_exists($id, $dynamic)) {
			
			if (!empty($options)) {
				$dynamic[$id] = array_merge($dynamic[$id], $options);
			}
			
			// Loaded through load more? Ignore mixed/first large
			if (!empty($_GET['first_normal'])) {
				$dynamic[$id]['number'] = 0;	
			}
			
			// Render our dynamic loop
			return Bunyad::core()->partial(
				'loop-dynamic', 
				array_merge($dynamic[$id], $data, array('loop' => $id))
			);
		}
		else {
			$id = 'loop';
		}
		
		Bunyad::core()->partial($id, $data);
	}

	/**
	 * Render and output breadcrumb trail with the markup.
	 *
	 * @param array $options
	 * @return void
	 */
	public function breadcrumbs($options = [])
	{
		// Check if Yoast SEO's Breadcrumbs are enabled.
		$is_yoast = false;
		if (class_exists('WPSEO_Options') && function_exists('yoast_breadcrumb')) {
			if (is_callable(['WPSEO_Options', 'get']) && WPSEO_Options::get('breadcrumbs-enable', false)) {
				$is_yoast = true;
			}
		}

		// Neither theme nor Yoast's Breadcrumbs enabled.
		if (!$is_yoast && !Bunyad::options()->breadcrumbs_enable) {
			return;
		}

		// Sphere Core Class is required.
		if (!class_exists('\Sphere\Core\Plugin', false)) {
			return;
		}

		$options = array_replace([
			'classes' => [],
		], $options);

		$wrap_classes = array_merge(
			['breadcrumbs', 'ts-contain'],
			(array) $options['classes']
		);

		$before = sprintf(
			'<nav class="%1$s" id="breadcrumb"><div class="inner wrap">',
			join(' ', $wrap_classes)
		);

		$after = '</div></nav>';

		// Output Yoast Breadcrumbs.
		if ($is_yoast) {
			return yoast_breadcrumb($before, $after);
		}

		// Find disabled locations from theme settings.
		// Note: Homepage is disabled by default by the Sphere breadcrumbs.
		$location_keys = [
			'single', 'page', 'search', 'archive'
		];

		$disable_at = [];
		foreach ($location_keys as $key) {
			if (!Bunyad::options()->get('breadcrumbs_' . $key)) {
				$disable_at[] = $key;
			}
		}

		/** @var \Sphere\Core\Breadcrumbs\Module $breadcrumbs */
		$breadcrumbs = \Sphere\Core\Plugin::get('breadcrumbs');
		if (!$breadcrumbs) {
			return;
		}

		$breadcrumbs->render([
			'primary_cat_callback' => [$this, 'get_primary_cat'],
			
			// Spaces added left and right to be same as Yoast.
			'delimiter'     => ' <span class="delim"><i class="tsi tsi-angle-right"></i></span> ',

			'before'        => $before,
			'after'         => $after,
			'disable_at'    => $disable_at,
			'labels'        => [
				'home'     => esc_html_x('Home', 'breadcrumbs', 'cheerup'),
				'category' => esc_html_x('Category: "%s"', 'breadcrumbs','cheerup'),
				'tax'      => esc_html_x('Archive for "%s"', 'breadcrumbs','cheerup'),
				'search'   => esc_html_x('Search Results for "%s"', 'breadcrumbs','cheerup'),
				'tag'      => esc_html_x('Posts Tagged "%s"', 'breadcrumbs','cheerup'),
				'404'      => esc_html_x('Error 404', 'breadcrumbs','cheerup'),
				'author'   => esc_html_x('Author: %s', 'breadcrumbs','cheerup'),
				'paged'    => esc_html_x(' (Page %d)', 'breadcrumbs','cheerup')
			]
		]);
	}
	
	/**
	 * Output meta partial based on theme settings
	 * 
	 * @param  string|null $type  Meta type to use, mainly used as a setting prefix like 'grid'.
	 * @param  array       $args  Options to set/overwrite, see $options in method.
	 * @return void
	 */
	public function post_meta($type, $args = [])
	{
		$prefixes = [
			'grid'   => 'post_meta_grid',
			'list'   => 'post_meta_list',
			'list-b' => 'post_meta_list',
			'single' => 'post_meta_single',
		];

		// Default args/options - will be merged into $args later below.
		$options = [
			'items_above'   => Bunyad::options()->post_meta_above,
			'items_below'   => Bunyad::options()->post_meta_below,
			'style'         => Bunyad::options()->post_meta_style,
			'align'         => Bunyad::options()->post_meta_align,
			'text_labels'   => (
				Bunyad::options()->post_meta_labels_enable 
					? (array) Bunyad::options()->post_meta_labels
					: []
			),
			'all_cats'      => Bunyad::options()->post_meta_all_cats,
			'modified_date' => Bunyad::options()->post_meta_modified_date,

			// Whether to show overlay cat labels as inline - useful when can't overlay.
			'cat_labels_inline'  => false,

			// Category labels remain legacy.
			'cat_labels_overlay' => Bunyad::options()->meta_cat_labels,
		];

		/**
		 * Remove default and null values from array.
		 */
		$filter_defaults = function($options) {
			// Remove default/null values.
			foreach ($options as $key => $opt) {
				if ($opt === null || $opt === 'default') {
					unset($options[$key]);
				}
			}

			return $options;
		};

		// A known type and isn't set to use global options.
		if (isset($prefixes[$type]) && !Bunyad::options()->get($prefixes[$type] . '_global')) {
			
			$key = $prefixes[$type];

			$local_opts = [
				'items_above' => Bunyad::options()->get($key . '_above'),
				'items_below' => Bunyad::options()->get($key . '_below'),
				'style'       => Bunyad::options()->get($key . '_style')
			];
			
			$options = array_replace($options, $filter_defaults($local_opts));
		}

		// Style overrides for selected style, such as a.
		if (isset($options['style'])) {
			$style_opts = [
				'align'   => Bunyad::options()->get('post_meta_' . $options['style'] . '_align'),
				'divider' => Bunyad::options()->get('post_meta_' . $options['style'] . '_divider'),
			];

			$options = array_replace($options, $filter_defaults($style_opts));
		}

		$args = array_replace($options, $args);

		// If inline cat labels are forced and there are no items above.
		// This stays consistent with the legacy post-meta-c behavior.
		if ($args['cat_labels_inline'] && $args['cat_labels_overlay'] && empty($args['items_above'])) {
			$args['items_above'] = ['cat'];
			$args['cat_style']   = 'labels';
		}

		// Single has separate setting for all categories.
		if (!empty($args['is_single'])) {
			$args['all_cats'] = Bunyad::options()->single_all_cats;
		}

		// Divider are only supported on a few types even on post-meta-a.
		$support_divider = [
			'grid', 
			'grid-b', 
			'large', 
			'large-c',
			'large-b',
			'list', 
			'list-b',
			'single'
		];

		if (!in_array($type, $support_divider)) {
			$args['divider'] = false;
		}

		// Remove forcefully disabled items.
		if (Bunyad::options()->post_meta_disabled) {
			$args['items_above'] = array_diff($args['items_above'], (array) Bunyad::options()->post_meta_disabled);
			$args['items_below'] = array_diff($args['items_below'], (array) Bunyad::options()->post_meta_disabled);
		}

		echo $this->render_post_meta(
			apply_filters('bunyad_post_meta_args', $args, $type)
		);
	}

	/**
	 * Render the post meta.
	 *
	 * @param array $args
	 * @return string
	 */
	public function render_post_meta($args) 
	{
		$args = array_replace([
			'items_above' => [], //['cat', 'date'],
			'items_below' => ['author', 'date', 'comments'],
			
			'show_title'  => true,
			'title_class' => 'post-title-alt',
			'title_tag'   => 'h2',
			'is_single'   => false,
			
			// Show text labels like "In", "By"
			'text_labels' => [],
			'cat_style'   => '',
			'all_cats'    => false,
			'style'       => 'b',

			// Alignment defaults to inherit from parents.
			'align'       => '',
			'add_class'   => '',
			'cat_labels'  => false,

			'modified_date' => false,
			'wrapper'       => null,
			// 'divider' => false
		], $args);

		// Enable divider on style a by default, unless specified.
		if (!isset($args['divider'])) {
			$args['divider'] = $args['style'] == 'a' ? true : false;
		}

		$style  = str_replace('style-', '', $args['style']);
		$class  = array_merge(
			[
				'post-meta',
				'post-meta-' . $style,
				($args['align'] ? 'post-meta-' . $args['align'] : null),
				($args['divider'] ? 'post-meta-divider' : null)
			],
			(array) $args['add_class']
		);

		/**
		 * Start preparing the output.
		 */
		$output = '';

		// Meta items above title.
		$output .= $this->render_post_meta_items(
			$args['items_above'], ['meta-above'], $args
		);

		// Post title and tag.
		if ($args['show_title']) {
			
			$tag = $args['title_tag'];

			if ($args['is_single']) {
				$tag   = 'h1';
				$title = get_the_title();
			}
			else {
				$title = sprintf(
					'<a href="%1$s">%2$s</a>',
					esc_url(get_the_permalink()),
					get_the_title()
				);
			}

			$output .= sprintf(
				'<%1$s class="is-title %2$s">%3$s</%1$s>',
				esc_attr($tag),
				esc_attr($args['title_class']),
				$title // Safe above.
			);
		}
		
		// Meta items below title.
		$items_below = $this->render_post_meta_items(
			$args['items_below'], ['below meta-below'], $args
		);

		$output .= $items_below;

		// Add a class to denote items below exist.
		if ($items_below) {
			$class[] = 'has-below';
		}
		
		// Default wrapper.
		if ($args['wrapper'] === null) {
			$args['wrapper'] = '<div %1$s>%2$s</div>';
		}

		$output = sprintf(
			$args['wrapper'],			
			Bunyad::markup()->attribs(
				'post-meta-wrap', 
				['class' => $class],
				['echo' => false]
			),
			$output
		);

		return $output;
	}

	/**
	 * Render post meta items.
	 *
	 * @param array $items          An array of meta item name/ids.
	 * @param array|string $classes A list of classes to add to wrapper.
	 * @param array $args           Extra options consumed by get_meta_items()
	 * @return string
	 */
	public function render_post_meta_items(array $items, $classes, $args = [])
	{
		$args = array_replace([
			'cat_style'     => '',
			'all_cats'      => false,
			'text_labels'   => [],
			'modified_date' => false
		], $args);

		// It doesn't make sense to have two of same items in same line.
		$items = array_unique($items);

		$the_items = '';
		$total   = count($items);
		$current = 0;
		foreach ($items as $item) {
			$current++;
			
			$output = $this->get_meta_item($item, $args);

			// If current item's not the last item.
			if ($current !== $total) {

				// Note: $current is already +1 for array.
				$next = $items[$current];

				if ($next !== 'jump_recipe' && $item !== 'jump_recipe') {
					$output .= 
						// Spaces around for backward compatibility.
						' <span class="meta-sep"></span> ';
				}
			}

			$the_items .= $output;
		}

		if (!$the_items) {
			return '';
		}

		$classes = join(' ', (array) $classes);

		return sprintf(
			'<div class="%1$s">%2$s</div>',
			esc_attr($classes),
			$the_items
		);
	}

	/**
	 * Get a post a meta item's HTML.
	 *
	 * @param string $item 
	 * @param array  $args
	 * 
	 * @return string Rendered HTML.
	 */
	public function get_meta_item($item, $args = []) 
	{
		$args = array_replace([
			'cat_style'   => '',
			'all_cats'    => false,
			'text_labels' => [],
			'modified_date' => false,
			'is_single'   => false,
		], $args);

		$output = '';

		/**
		 * Determine the item to render and generate output.
		 */
		switch ($item) {

			// Meta item: Category/s
			case 'cat':

				$cat_class = 'post-cat';
				
				if (!empty($args['cat_style'])) {

					// Map of cat styles and the relevant classes.
					$cat_styles = [
						'text'   => 'post-cat',
						'labels' => 'cat-labels',
					];

					$cat_class = $cat_styles[ $args['cat_style'] ];
				}

				// Add "In" if text labels enabled.
				$text = '';
				if (in_array('in', $args['text_labels'])) {
					$text   = sprintf(
						'<span class="text-in">%s</span>',
						esc_html__('In', 'cheerup')
					);
				}

				$output = sprintf(
					'<span class="%1$s">
						%2$s
						%3$s
					</span>
					',
					esc_attr($cat_class),
					$text,
					$this->get_meta_cats($args['all_cats'])
				);

				break;

			// Meta item: Comments Count & Link
			case 'comments':
				$output = sprintf(
					'<span class="meta-item comments"><a href="%1$s">%2$s</a></span>',
					esc_url(get_comments_link()),
					esc_html(get_comments_number_text())
				);

				break;

			// Meta item: Date
			case 'date':

				$date_w3c = $args['modified_date'] ? get_the_modified_date(DATE_W3C) : get_the_date(DATE_W3C);
				$date     = $args['modified_date'] ? get_the_modified_date() : get_the_date();

				$output = sprintf(
					'<a href="%1$s" class="meta-item date-link">
						<time class="post-date" datetime="%2$s">%3$s</time>
					</a>',
					esc_url(get_the_permalink()),
					esc_attr($date_w3c),
					esc_html($date)
				);

				break;

			// Meta item: Author
			case 'author':

				// Add "By" if labels enabled. 
				$label = '';
				if (in_array('by', $args['text_labels'])) {
					$label = sprintf(
						esc_html_x('%sBy%s', 'Post Meta', 'cheerup'), 
						'<span class="by">', 
						'</span> '
					);
				}
			
				$author_link = $label . get_the_author_posts_link();

				$output = sprintf(
					'<span class="meta-item post-author">%1$s</span>',
					$author_link
				);

				break;

			// Meta Item: Estimated Read Time
			case 'read_time':

				$minutes = $this->get_read_time();
				$text    = sprintf(
					_n('%d Min Read', '%d Mins Read', $minutes, 'cheerup'),
					$minutes
				);

				$output = sprintf(
					'<span class="meta-item read-time">%1$s</span>',
					$text
				);

				break;

			// Meta Item: Jump Recipe - only for single pages.
			case 'jump_recipe':

				if ($args['is_single']) {
					$output = do_shortcode('[wprm-recipe-jump]');
				}

				break;
		}

		return $output;
	}

	/**
	 * Display category label overlay when conditions meet
	 */
	public function meta_cat_label($options = array())
	{
		if (!Bunyad::options()->meta_cat_labels && empty($options['force'])) {
			return;
		}
		
		$class = 'cat-label cf';
		
		if (!empty($options['class'])) {
			$class .= ' ' . $options['class'];
		}
		
		?>
		
		<span class="<?php echo esc_attr($class); ?>"><?php echo $this->meta_cats(); ?></span>
		
		<?php
	}

	/**
	 * Reading time calculator for a post content.
	 * 
	 * @param  string $content  Post Content
	 * @return integer
	 */
	public function get_read_time($content = '')
	{
		if (!$content) {
			$content = get_post_field('post_content');
		}

		$wpm = apply_filters('bunyad_reading_time_wpm', 200);

		// Strip HTML and count words for reading time. Built-in function not safe when 
		// incorrect locale: str_word_count(wp_strip_all_tags($content))
		// Therefore, using a regex instead to split.
		$content    = wp_strip_all_tags($content);
		$word_count = count(preg_split('/&nbsp;+|\s+/', $content));
		$minutes    = ceil($word_count / $wpm);

		return $minutes;
	}

	/**
	 * A wrapper for get_search_form to allow multiple styles
	 *
	 * @see get_search_form()
	 * 
	 * @param string $style  Type of search form
	 * @param array  $data   Extra data to pass
	 * @return string|void
	 */
	public function search_form($style, $data = array(), $echo = true)
	{
		$previous = Bunyad::registry()->search_form_data;

		// Extend data
		$data = array_merge(array(
			'style' => $style,
		), $data);

		// Placeholder text decision
		if (!isset($data['text']) && $style == 'alt') {
			$data['text'] = esc_html_x('Search', 'search', 'cheerup');
		}

		// Set the data and get the form
		Bunyad::registry()->search_form_data = $data;
		$form = get_search_form($echo);

		// Restore to a global / previous style if any
		Bunyad::registry()->search_form_data = $previous ? $previous : '';

		if (!$echo) {
			return $form;
		}
	}
	
	/**
	 * Get relative width for current block, based on parent column width in 
	 * relation to the whole container.
	 * 
	 * @return  float  Column width in percent number, example 66
	 */
	public function relative_width()
	{
		// Set current column width weight (width/100) - used to determine image sizing 
		$col_relative_width = 1;
		if (isset(Bunyad::registry()->layout['col_relative_width'])) {
			$col_relative_width = Bunyad::registry()->layout['col_relative_width'];
		}
	
		// Adjust relative width if there's a sidebar
		if (Bunyad::core()->get_sidebar() != 'none') {
			$col_relative_width = ($col_relative_width * (8/12)); 
		}
		
		return $col_relative_width * 100;
	}

	/**
	 * Create multiple options based on provided replacements and a template array.
	 *
	 * @param array $templates
	 * @param array $field_types
	 * @param array $options
	 * @param array $config
	 * @return void
	 */
	public function repeat_options($templates, $field_types, &$options, $config = []) 
	{
		$config = array_replace([
			'replace_in' => ['css']
		], $config);

		foreach ($field_types as $key => $type) {
			foreach ($templates as $id => $template) {

				// Skip this specific field.
				if (isset($type['skip']) && in_array($template['name'], $type['skip'])) {
					continue;
				}

				$to_add         = array_replace_recursive($template, $type);
				$to_add['name'] = str_replace('{key}', $key, $to_add['name']);

				// Overrides for specific keys.
				if (!empty($type['overrides']) && isset($type['overrides'][ $template['name'] ])) {
					 $to_add = array_replace(
						 $to_add, 
						 (array) $type['overrides'][ $template['name'] ]
					);
				}

				// Override 'css' with data from 'fields_css'.
				if (!empty($type['fields_css'][$id])) {
					$to_add['css'] = $type['fields_css'][$id];
				}

				foreach ($config['replace_in'] as $replace) {
					if (empty($to_add[ $replace ])) {
						continue;
					}

					if (is_array($to_add[ $replace ])) {

						/**
						 * Recursively replace {key} in both keys and values.
						 */
						$to_add[ $replace ] = $this->array_modify_recursive($to_add[ $replace ], function($new_key, $new_val) use($key) {
							$new_key = str_replace('{key}', $key, $new_key);

							if (is_string($new_val)) {
								$new_val = str_replace('{key}', $key, $new_val);
							}

							return [$new_key, $new_val];
						});
					}
					else {
						$to_add[ $replace ] = str_replace('{key}', $key, $to_add[ $replace ]);
					}
				}

				unset(
					$to_add['fields_css'], 
					$to_add['skip']
				);

				$options[] = $to_add;
			}
		}
	}

	/**
	 * Get custom ratio if available for an option.
	 *
	 * @param string $key
	 * @return null|string
	 */
	public function get_ratio($key, $fallback = null)
	{
		$ratio = Bunyad::options()->get($key . '_custom', $key);

		if (!$ratio && $fallback) {
			return $this->get_ratio($fallback);
		}

		// This would happen if option is set to custom but no custom value 
		// in custom ratio field.
		if ($ratio == 'custom') {
			return null;
		}

		return $ratio;
	}


	/**
	 * Remove prefix/suffix from set of keys, recursively.
	 *
	 * @param array   $array
	 * @param string  $affix
	 * @param boolean $is_prefix
	 * @return array
	 */
	public function deaffix_keys(array $array, $affix, $is_prefix = true, $args = []) 
	{
		$args = array_replace([
			'require_affix' => false
		], $args);

		$new_array = [];

		foreach ($array as $key => $val) {
			if (is_array($val)) {
				$val = $this->deaffix_keys($val, $affix, $is_prefix);
			}

			// Flag to denote if an affix was found and changes made.
			$affixed = false;

			// Prefix
			if ($is_prefix && strpos($key, $affix) === 0) {
				$affixed = true;
				$key     = substr($key, strlen($affix));
			}
			elseif (!$is_prefix) {
				
				// Finding and removing a suffix.
				$offset = strlen($key) - strlen($affix);
				if (strpos($key, $affix, $offset) !== false) {
					$affixed = true;
					$key     = substr($key, 0, -strlen($affix));
				}
			}

			// Discard if affix is required.
			if ($args['require_affix'] && !$affixed) {
				continue;
			}
			
			$new_array[$key] = $val;
		}

		return $new_array;
	}

	/**
	 * Remove affix in keys of array and pick only the affixed keys.
	 *
	 * @see self::defaffix_keys
	 * @return array
	 */
	public function pick_deaffixed(array $array, $affix, $is_prefix = true) 
	{
		return $this->deaffix_keys($array, $affix, $is_prefix, ['require_affix' => true]);
	}

	/**
	 * Modify both keys and values in a an array recursively, while preserving sort.
	 *
	 * @param array    $array    Original array.
	 * @param callable $callback Callback function takes two params (key, value) and 
	 *                           returns the new [key, value] to as an array.
	 *
	 * @return array
	 */
	public function array_modify_recursive(array $array, callable $callback)	
	{
		$output = [];

		foreach ($array as $key => $value) {

			if (is_array($value)) {
				$value = $this->array_modify_recursive($value, $callback);
			}

			$new_key   = $key;
			$new_value = $value;

			// Get output from callback and use as key/value.
			$replace   = $callback($key, $value);
			if (is_array($replace)) {
				list($new_key, $new_value) = $replace;
			}

			// If callback returns false, skip.
			if ($replace !== false) {
				$output[$new_key] = $new_value;
			}
		}

		return $output;
	}
}


// init and make available in Bunyad::get('helpers')
Bunyad::register('helpers', array(
	'class' => 'Bunyad_Theme_Helpers',
	'init' => true
));