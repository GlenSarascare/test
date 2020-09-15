<?php
/**
 * Render the CSS customizations using Bunyad Framework options
 */
class Bunyad_Css_Generator
{
	public $elements;
	public $css_options;
	
	public $css = [];
	public $google_fonts = [];
	public $groups = [];
	
	/**
	 * Stores options relevant to parsing the current CSS
	 * 
	 * @var array
	 */
	public $args = [];

	/**
	 * @var array Internal state of previous selectors
	 */
	protected $prev_selectors = [];
	protected $device_keys    = ['global', 'main', 'large', 'medium', 'small'];

	/**
	 * Media querys key map
	 */
	protected $query_map = [
		'root'   => false,
		'global' => false,
		'main'   => '@media (min-width: 1200px)',
		'large'  => '@media (min-width: 940px) and (max-width: 1200px)',
		'medium' => '@media (min-width: 768px) and (max-width: 940px)',
		'small'  => '@media (max-width: 767px)',
	];
	
	public function __construct()
	{
		$this->css = ['root' => []];
	}
	
	/**
	 * Initialize and get all the Custom CSS options
	 */
	public function init()
	{
		// Do a full options load if a short load was done.
		if (Bunyad::options()->is_short_load()) {
			Bunyad::options()->init(false);
		}

		$this->elements    = Bunyad::options()->defaults;
		$this->css_options = Bunyad::options()->get_all();
	}
	
	/**
	 * Process the main CSS changes and construct the basic CSS 
	 * for colors, typography etc.
	 */
	public function process()
	{
		// Render all of the custom CSS for elements.
		foreach ($this->get_css_elements() as $data) {
			list($element, $value) = $data;
			$this->process_element($element, $value);
		}
	}

	/**
	 * Get all valid elements with CSS.
	 *
	 * @return array
	 */
	public function get_css_elements()
	{
		$valid_elements = [];

		foreach ($this->css_options as $key => $value) {

			if (!array_key_exists($key, $this->elements)) {
				continue;
			}
			
			$element = $this->elements[$key];

			// Not an element with CSS.
			if (!isset($element['css'])) {
				continue;
			}

			// Note: Converting to string as comparison below of 0 == 'any' (unless start with number). 
			// Can't use strict for legacy reasons. Value can be: array, string, integer, float.
			if (is_numeric($element['value'])) {
				$element['value'] = (string) $element['value'];
			}

			
			/**
			 * Skip default values. Some legacy limitations.
			 * 
			 * 1. For value 0, skip only if default is 0 too.
			 * 2. Everything else is loose comparison.
			 */
			if ($value === '0') {

				// Already converted to string above. 
				if ($element['value'] === '0') {
					continue;
				}
			}
			else if (empty($value) || $value == $element['value']) {
				continue;
			}

			$valid_elements[] = [$element, $value];
		}

		return $valid_elements;
	}

	/**
	 * Process an element and add CSS etc.
	 *
	 * @param array $element
	 * @param mixed $value
	 */
	public function process_element($element, $value)
	{
		$element['type'] = isset($element['type']) ? $element['type'] : null;

		/**
		 * Font-family
		 */
		if ($element['type'] == 'font-family') {

			$font_data = [
				'family'  => $value,
				'weights' => [400, 500, 600, 700]
			];

			$fallbacks = [
				'sans-serif' => 'system-ui, -apple-system, "Segoe UI", Arial, sans-serif',
				'serif'      => 'Georgia, serif'
			];

			$font_family = $value;
			$fallback    = !empty($element['fallback_stack']) ? $element['fallback_stack'] : 'sans-serif';
			
			// Fallbacks specified in the value?
			if (strstr($font_family, ',')) {

				// First is the font-family
				$families    = explode(',', $font_family);
				$font_family = array_shift($families);

				// Remaining are fallback
				$fallback    = implode(',', $families);
			}

			// Pointing to presets?
			if (isset($fallbacks[ $fallback ])) {
				$fallback = $fallbacks[ $fallback ];
			}

			// Value with fallbacks
			$value = sprintf(
				'"%s", %s',
				esc_attr($font_family), 
				$fallback
			);

			/**
			 * A group? Handle weight and style for Google Fonts.
			 */
			if (isset($element['group'])) {
				$typography = $this->get_grouped($element['group']);

				if (!empty($typography['weight'])) {
					$font_data['weights'] = [ $typography['weight'] ];
				}

				if (!empty($typography['style']) && $typography['style'] == 'italic') {
					foreach ($font_data['weights'] as $weight) {
						array_push($font_data['weights'], $weight . 'i');
					}
				}
			}

			/**
			 * Register Google fonts.
			 */
			$font_data['family'] = $font_family;
			$weights = $font_data['weights'];

			if (!isset($this->google_fonts[$font_family])) {
				$this->google_fonts[$font_family] = [];
			}

			$this->google_fonts[$font_family] = array_unique(array_merge(
				$this->google_fonts[$font_family],
				$weights
			));

		}

		/**
		 * Dimensions
		 */
		if ($element['type'] == 'dimensions') {

			foreach ($element['css'] as $selector => $data) {

				if (!isset($data['dimensions'])) {
					continue;
				}

				$data['props'] = isset($data['props']) ? $data['props'] : [];

				// Prefix the dimensions
				$keys  = ['top', 'bottom', 'left', 'right'];
				foreach ($keys as $key) {
				
					$callback = function($value) use ($key) {
						if (!is_array($value) || !isset($value[$key])) {
							return false;
						}

						$value['unit'] = !empty($value['unit']) ? $value['unit'] : 'px';

						return $value[$key] . $value['unit'];
					};

					// Alternatively instead of callback, we could use: "{value:{$key}}{value:unit}"
					// A closure for validation of unit.
					$data['props'][ $data['dimensions'] . '-' . $key ] = $callback;
				}

				unset($data['dimensions']);

				// Propagate to original element array
				$element['css'][$selector] = $data;
			}
		}

		/**
		 * Backgrounds / Image
		 */
		if ($element['type'] == 'upload' && !empty($element['bg_type'])) {

			$bg_type = $element['bg_type']['value'];
			$props   = [];
		
			if ($bg_type == 'cover' || $bg_type == 'cover-nonfixed') {
				$props = [
					'background-repeat'   => 'no-repeat',
					'background-position' => 'center center',
					'background-size'     => 'cover',
				];

				if ($bg_type == 'cover') {
					$props['background-attachment'] = 'fixed';
				}
			}
			else {
				$props = ['background-repeat' => esc_attr($bg_type)];
			}

			foreach ($element['css'] as $selector => $data) {

				// Original props are not overriden, only missing added.
				$element['css'][$selector]['props'] = array_replace($props, $data['props']);
			}
		}

		return $this->process_element_css($element, $value);
	}

	/**
	 * Process an element to register CSS.
	 *
	 * @param array $element
	 * @param mixed $value
	 */
	public function process_element_css($element, $value) 
	{

		if (!is_array($element['css'])) {
			return;
		}
		
		$merge_previous = false;

		// Selectors of current element
		$cur_selectors = array_diff(
			array_keys($element['css']), 
			['vars']
		);
		
		// Using same selectors as previous element
		if (
			count($this->prev_selectors) == count($cur_selectors) 
			&& !array_diff($this->prev_selectors, $cur_selectors)
		) {

			$merge_previous = true;		
		}

		$this->prev_selectors = $cur_selectors;

		/**
		 * Further process values for correct data.
		 */
		if (!empty($element['devices'])) {

			$values = (array) $value;
			$limit  = isset($values['limit']) ? $values['limit'] : '';

			// Device keys are expected. If they're missing, assume a different value.
			if (!array_intersect(array_keys($values), $this->device_keys)) {
				$values = ['global' => $value];
			}
			
			// Consider desktop MQ applicable to global unless limit is set.
			if (!$limit && isset($values['main'])) {

				// + to add at beginning
				$values = ['global' => $values['main']] + $values;
				unset($values['main']);
			}
		}
		else {

			// Simple values apply to either provided media or globally. Also fix legacy or corrupt value.
			$values = [
				'global' => $value
			];
		}

		$devices = array_intersect(
			array_keys($values), 
			$this->device_keys
		);

		/**
		 * Add CSS for each registered selector for this element.
		 */
		$element_css = [];
		foreach ($element['css'] as $selector => $data) {

			$props     = [];
			$raw_props = [];
			$media_queries = $devices;

			// Data can be in two formats, either direct props or a combination of nested
			// props within media keys.
			if (!isset($data['props'])) {

				// $first = is_array($data) ? reset($data) : [];
				
				// Legacy or missing props.
				// if (!isset($first['props'])) {
				// 	continue;
				// }

				$raw_props = $data;

				// Consider all the media keys as some maybe forced and remove 'all'.
				$media_queries = array_diff(
					array_merge($media_queries, array_keys($raw_props)),
					['all']
				);

				$media_queries = array_unique($media_queries);

				// When 'limit' is applied, 'main' is expected to be set. If missing,
				// fallback to 'global'. 
				if (in_array('main', $media_queries) && !isset($raw_props['main'])) {

					if (isset($raw_props['global'])) {
						$raw_props['main'] = $raw_props['global'];
					}
				}
			}
			else {
				$raw_props = ['all' => $data];
			}

			foreach ($media_queries as $media) {

				// Either all or the specific media props need to be defined.
				if (!isset($raw_props['all']) && !isset($raw_props[$media])) {
					continue;
				}

				// Use props specific to this media or generic 'all'.
				$the_props = isset($raw_props[$media]) ? $raw_props[$media] : $raw_props['all'];
				$value_key = $media;

				// Empty or missing props imply this media query should be ignored.
				if (empty($the_props['props'])) {
					continue;
				}
				
				if (isset($the_props['value_key'])) {
					$value_key = $the_props['value_key'];

					// Fallback to global when main is missing.
					if ($value_key === 'main' && !isset($values['main'])) {
						$value_key = 'global';
					}
				}

				$the_value = isset($values[$value_key]) ? $values[$value_key] : null;

				// If a value doesn't exist, skip processing unless forced.
				if (is_null($the_value)) {
					if (empty($the_props['force'])) {
						continue;
					}
				}

				// Add the processed props with values.
				$props[$media] = $this->process_props($the_props['props'], $the_value);
			}

			$element_css[$selector] = $props;
		}

		if ($element_css) {
			return $this->add_element_css($element_css, $merge_previous);
		}

		return false;
	}

	/**
	 * Process properties, interopolate and convert to strings.
	 * 
	 * @return array Array of property strings
	 */
	public function process_props($props, $value) 
	{
		if (isset($props['condition'])) {
			foreach ($props['condition'] as $expected => $the_props) {
				if ($value == $expected)  {
					$props = array_merge($props, $the_props);
				}
			}

			unset($props['condition']);
		}

		$prop_strings = [];
		foreach ($props as $prop => $format) {

			// Create property value - skip on empty or when it's just units.
			$prop_value  = $this->create_prop_value($format, $value);
			if (!$prop_value) {
				continue;
			}

			$prop_strings[] = $prop . ': ' . $prop_value;
		}

		return $prop_strings;
	}

	/**
	 * Add an elements CSS to processing stack.
	 *
	 * @param array   $css             An assoc array of CSS selectors and props.
	 * @param boolean $merge_previous  Whether to merge with previous element CSS.
	 */
	public function add_element_css(array $css, $merge_previous = false) 
	{
		if (isset($css['vars'])) {

			// Global values - apply without media query at :root.
			if (!empty($css['vars']['global'])) {
				$css_vars = !empty($css['vars']['global']) ? $css['vars']['global'] : $css['vars']['main'];

				// Add the global CSS vars for :root
				$this->css['root'] = array_merge(
					(array) $this->css['root'], 
					$css_vars
				);
			}
			// Presence of 'main' here instead of global implies a "limit to desktop". Use :root selector.
			else if (!empty($css['vars']['main'])) {
				$css[':root'] = ['main' => $css['vars']['main']];

				// IE11 hack for css-vars-ponyfills.
				$css['._ie-mq'] = ['global' => $css['vars']['main']];
			}

			unset($css['vars']);

			// If no other selectors for this element, return.
			if (empty($css)) {
				return;
			}
		}

		if ($merge_previous) {
			$previous = end($this->css);
			$css      = array_merge_recursive($previous, $css);

			// Replace previous
			$this->css[ key($this->css) ] = $css;
		}
		else {
			$this->css[] = $css;
		}

		return $css;
	}
	
	/**
	 * Get modified elements of a group (defaults won't be included).
	 *
	 * @param  string $group ID of the group.
	 * @return array
	 */
	public function get_grouped($group = '')
	{	
		if (empty($this->groups)) {

			// Process the groups
			// @todo Further optimize performance. Benchmark lazy-process.
			foreach ($this->elements as $option) {
				if ($option['type'] === 'group') {
					$this->groups[ $option['name'] ] = [];
				}

				if (!empty($option['group']) && isset($this->css_options[ $option['name'] ])) {

					$current = $this->css_options[ $option['name'] ];

					// Perhaps a group itself or other pseudo-element.
					if (!isset($option['value'])) {
						continue;
					}

					// Add only if current value is not same as default value for this option
					if ($current !== $option['value'] && isset($this->elements[ $option['group'] ])) {

						// Remove group prefix from names
						$group_prefix = $this->elements[ $option['group'] ]['name'];
						$name  = preg_replace('/^' . preg_quote($group_prefix) . '_/', '', $option['name']);

						$this->groups[ $option['group'] ][ $name ] = $current;
					}
				}
			}
		}

		if ($group) {
			return isset($this->groups[ $group ]) ? $this->groups[ $group ] : [];
		}

		return $this->groups;
	}

	/**
	 * Process the final CSS
	 */
	public function render_css()
	{
		// Empty array filled query map to preserve order of MQs.
		$css = array_map('__return_empty_array', $this->query_map);
		$css_elements = $this->css;

		// CSS Variables at root.
		if (!empty($css_elements['root'])) {
			$css['root'] = $css_elements['root'];
			unset($css_elements['root']);
		}

		// Create rules and add to appropriate media.
		foreach ($css_elements as $element) {
			foreach ($element as $selector => $data) {
				foreach ($data as $media => $props) {

					if (!$props) {
						continue;
					}

					$rule = sprintf(
						"%s { %s }", 
						$selector, 
						join(' ', $props)
					);

					$css[ $media ][] = $rule;
				}
			}
		}

		$css = array_filter($css);
		$final_css = join("\n", $this->_render_css_media($css));

		return $final_css;
	}

	/**
	 * Render rules for each media block
	 */
	public function _render_css_media($css)
	{
		$final_css = [];

		foreach ($css as $media => $rules) {

			if ($media == 'global') {
				$final_css = array_merge($final_css, $rules);
			}
			else if ($media == 'root') {
				$final_css[] = sprintf(':root { %s }', join("\n", $rules));
			}
			else {

				// Use from map or a custom defined MQ
				$media = isset($this->query_map[$media]) ? $this->query_map[$media] : $media;

				// Final rule
				$final_css[] = sprintf(
					"%s { %s }", 
					esc_attr($media), 
					join("\n", $rules)
				);
				
			}
		}

		return $final_css;
	}

	/**
	 * Create inner CSS rules based on provided format and value
	 * 
	 * @param string|callable $format
	 * @param mixed $value
	 * @return bool|string
	 */
	public function create_prop_value($format, $value)
	{
		// Format's a callback? Resolve.
		if (is_callable($format)) {
			$format = call_user_func($format, $value);
		}

		if (!is_string($format)) {
			return false;
		}

		/**
		 * Get value off another element and replace - Support formats: 
		 * 
		 *  {css_my_key} - Normal option key.
		 *  {value:value_key} - A key based off the current value.
		 */
		preg_match_all('/{([a-z\_\-\:]+?)}/i', $format, $matches);
		foreach ($matches[1] as $key => $match) {
			$replacement = $this->_interpolate($match, $value);

			// Skip this rule altogether if a replacement is missing
			if (!$replacement) {
				return false;
			}

			// Replace 
			$format = str_replace($matches[0][$key], $replacement, $format);
		}

		// Replacements expected but no value?
		if (preg_match('#%(s|d)#', $format) && (!$value && $value !== '0')) {
			return false;
		}

		// Escape % to allow 100% etc. 
		$format = preg_replace('#%(?!s|d)#', '%%', $format);
		
		// Add in the current element value
		$format = sprintf($format, $value) . ';';

		/** 
		 * RGBA color? Supported formats:
		 * 
		 * 	rgba(%s, 0.6) - indirectly, substituted above
		 *  rgba(#000, %s)
		 *  rgba({css_key}, %s)
		 */
		if (preg_match('/rgba\(([^,]+?),([^,]+?)\)/', $format, $match)) {
			
			if (!$match[1]) {
				$match[1] = $value;
			}

			$rgb = $this->hex2rgb($match[1]);
			$color = $rgb['red'] . ',' . $rgb['green'] . ',' . $rgb['blue'];
			
			// add in the rgb color part in rgba
			$format = str_replace($match[1], $color, $format);
		}

		// For format: hexToRgb(#fff)
		if (preg_match('/hexToRgb\((#[a-z0-9]{3,7})\)/i', $format, $match)) {
			$rgb = $this->hex2rgb($match[1]);
			$color = $rgb['red'] . ',' . $rgb['green'] . ',' . $rgb['blue'];
			
			// add in the rgb color part in rgba
			$format = str_replace($match[0], $color, $format);
		}
		
		$the_css = $format;
		
		return $the_css;
	}
	
	/**
	 * Helper Callback: String interopolation 
	 *
	 * @param mixed  $match  Matched interpolationg string.
	 * @param mixed  $value  Current value to replace references with.
	 * 
	 * @return mixed
	 */
	private function _interpolate($match, $value = '') 
	{
		// Use a key from current value
		//$matched = $match[1];
		$matched = $match;
		if (strpos($matched, 'value:') !== false) {
			list($_, $key) = explode(':', $matched);
			return isset($value[$key]) ? $value[$key] : false;
		}

		return $this->css_options[ $matched ];
	}
	
	/**
	 * Convet hex to rgb
	 * 
	 * @param array $color
	 */
	public function hex2rgb($color) 
	{
		if ($color[0] == '#') {
			$color = substr($color, 1);	
		}
	
		// convert 3 to 6 char hex
		if (strlen($color) == 3) {
			$color = str_repeat($color[0], 2) . str_repeat($color[1], 2) . str_repeat($color[2], 2);
		}
	
		return array(
			'red' => hexdec($color[0] . $color[1]),
			'green' => hexdec($color[2] . $color[3]),
			'blue' => hexdec($color[4] . $color[5])
		);
	}
	
	/**
	 * Get output without the cache part
	 * 
	 * @see get_transient()
	 * @see set_transient()
	 * @see self::process()
	 * 
	 * @param string $key  google_fonts or output
	 * @return mixed
	 */
	public function get_processed($key = '')
	{
		$anchor   = (!empty($this->args['anchor_obj']) ? '_' . $this->args['anchor_obj'] : 0);
		$in_cache = false;

		// Default
		$data   = array(
			'google_fonts' => array(), 
			'output'       => ''
		);

		// Only use cache if not on preview and not disabled
		if (!is_customize_preview() && apply_filters('bunyad_custom_css_nocache', false) !== true) {
			
			// Have data in cache?
			$cache = get_transient('bunyad_custom_css_cache');
			if (is_array($cache) && !empty($cache[$anchor])) {
				$in_cache = true;
				$data     = $cache[$anchor];
			}

			// Key not in cache, bugged? Invalidate
			if ($key && !isset($data[$key])) {
				$in_cache = false;
			}
		}

		// Process if not cached
		if (!$in_cache) {

			/**
			 * Process to create CSS and enqueues
			 */
			$this->init();
			$this->process();
			
			$output = $this->render_css() . "\n\n" . 
				(!empty($this->css_options['css_custom']) ? wp_specialchars_decode($this->css_options['css_custom']) : '');
			
			// Remove excessive tabs
			$output = str_replace("\t", '', $output);
				
			$data = array(
				'google_fonts' => (array) $this->google_fonts,
				'output'       => $output
			);

			// Cache it only if not in customizer preview/changeset.
			if (!is_customize_preview()) {
				set_transient('bunyad_custom_css_cache', array($anchor => $data));
			}
		}

		return ($key ? $data[$key] : $data);
	}

	/**
	 * Add google fonts to the top of CSS
	 */
	public function get_google_fonts_url()
	{
		$fonts = $this->get_processed('google_fonts');

		if (!$fonts) {
			return false;
		}

		$families = [];
		foreach ($fonts as $font => $weights) {
			$families[] = $font . ':' . join(',', $weights);
		}

		$args = array(
			'family' => implode('|', $families)
		);

		if (Bunyad::options()->font_charset) {
			$args['subset'] = implode(',', array_filter(Bunyad::options()->font_charset));
		}

		if (Bunyad::options()->font_display) {
			$args['display'] = Bunyad::options()->font_display;
		}

		return add_query_arg(
			urlencode_deep($args), 
			'https://fonts.googleapis.com/css'
		);
	}

	/**
	 * Render and return the output
	 * 
	 * @return string
	 */
	public function render()
	{
		return $this->get_processed('output');
	}
}