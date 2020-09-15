<?php
/**
 * WordPress Customizer registration
 */
class Bunyad_Theme_Customizer
{
	public $option_key;
	protected $contexts;
	protected $options;

	// Current priority for the customizer loop
	protected $priority;
	protected $active_options;
	protected $control_prefix = 'bunyad_';

	/**
	 * @var WP_Customize_Manager
	 */
	protected $wp_customizer;

	public function __construct()
	{
		// Register the customizer.
		add_action('customize_register', [$this, 'register'], 11);

		// Pre-compute active for contexts. Only fires on customizer load, NOT in iframe.
		// set_active_options() is handled in init_preview() for iframe.
		add_action('customize_controls_init', [$this, 'set_active_options'], 10, 0);

		// iframe only hook.
		add_action('customize_preview_init', [$this, 'init_preview']);
		
		// AJAX reset
		add_action('wp_ajax_reset_customizer', [$this, 'ajax_reset']);
		
		// Contextual controls handler
		add_filter('customize_control_active', [$this, 'contextual_controls'], 10, 2);

		// Register assets
		add_action('customize_controls_enqueue_scripts', [$this, 'register_assets'], 9);

		// Options key
		add_action('bunyad_core_post_init', [$this, 'init']);

		// Customizer preview settings only become available after wp_loaded. We need some
		// settings raw before that.
		add_action('start_previewing_theme', function() {
			global $wp_customize;
			
			$post_data = $wp_customize->unsanitized_post_values();
			$early_init_options = apply_filters('bunyad_customize_early_init_options', []);

			foreach ($early_init_options as $key) {
				$option = $this->option_key . '[' . $key . ']';

				if (isset($post_data[$option])) {
					Bunyad::options()->set($option, $post_data[$option]);
				}
			}
		});
	}

	/**
	 * Initialize at the right hook.
	 * Note: bunyad_core_post_init is run before after_setup_theme.
	 */
	public function init()
	{
		$this->option_key = Bunyad::options()->get_config('theme_prefix') .'_theme_options';
	}

	/**
	 * Register CSS and scripts
	 */
	public function register_assets()
	{
		wp_enqueue_style(
			'bunyad-customizer', 
			get_theme_file_uri('css/admin/customizer.css'), 
			[], 
			Bunyad::options()->get_config('theme_version')
		);

		wp_enqueue_script(
			'bunyad-customizer-controls', 
			get_template_directory_uri() . '/inc/customizer/js/dist/customizer-controls.js', 
			['jquery', 'customize-controls'],
			Bunyad::options()->get_config('theme_version')
		);

		// Add settings with defaults
		$settings  = [];
		foreach ($this->wp_customizer->settings() as $id => $setting) {
			if (!$setting->check_capabilities()) {
				continue;
			}
			
			$settings[$id] = $setting->default;
		}

		$elements = Bunyad::factory('admin/options')->get_elements_from_tree($this->options);

		wp_localize_script('bunyad-customizer-controls', 'Bunyad_CZ_Data', [
			'settingPrefix' => $this->option_key,
			'controlPrefix' => 'bunyad_',
			'elements'      => $elements
		]);
	}

	/**
	 * Register customizer settings from Bunyad options
	 * 
	 * @param WP_Customize_Manager $wp_customizer
	 */
	public function register($wp_customizer)
	{
		$this->wp_customizer = $wp_customizer;
		
		/**
		 * Load custom controls and register them
		 */ 
		include get_template_directory() . '/inc/customizer/controls/base-trait.php';
		include get_template_directory() . '/inc/customizer/controls/base.php';

		include get_template_directory() . '/inc/customizer/sections/base.php';
		include get_template_directory() . '/inc/customizer/sections/heading.php';
		include get_template_directory() . '/inc/customizer/sections/message.php';
		include get_template_directory() . '/inc/customizer/panels/base.php';

		// Register custom section classes
		$this->wp_customizer->register_section_type('Bunyad_Customizer_Sections_Base');
		$this->wp_customizer->register_section_type('Bunyad_Customizer_Sections_Heading');
		$this->wp_customizer->register_section_type('Bunyad_Customizer_Sections_Message');
		$this->wp_customizer->register_panel_type('Bunyad_Customizer_Panels_Base');

		$controls = [
			'color',
			'color-alpha',
			'text',
			'radio',
			'checkbox',
			'number',
			'checkboxes',
			'group',
			'select',
			'slider',
			'font-family',
			'toggle',
			'textarea',
			'image',
			'content',
			'message',
			'dimensions',		
		];

		foreach ($controls as $control) {

			include get_theme_file_path('inc/customizer/controls/' . $control . '.php');

			$class = 'Bunyad_Customizer_Controls_' . Bunyad::file_to_class_name($control);
			$wp_customizer->register_control_type($class);	
		}		
		
		/**
		 * Load settings array
		 */
		$options = Bunyad::options()->load_options_tree();
		
		// Start priority at 10 and increment by 1
		$this->priority = 10;

		// Add group options
		$this->options = $this->process_options($options);
		$options       = $this->organize_sections($this->options);

		/**
		 * Loop through options array to add panels, sections, and controls
		 */
		foreach ($options as $panel) {
			
			$this->priority++;
			
			if (!empty($panel['id']) && isset($panel['title'])) {

				if (!strstr($panel['id'], 'bunyad-') && !strstr($panel['id'], 'sphere-')) {
					$panel['id'] = 'bunyad-' . $panel['id'];
				}
				
				$wp_customizer->add_panel(new Bunyad_Customizer_Panels_Base(
					$this->wp_customizer,
					$panel['id'], 
					[
						'title' => $panel['title'],
						'description' => (!empty($panel['desc']) ? $panel['desc'] : ''),
						'priority' => $this->priority,
						'classes'     => !empty($panel['classes']) ? $panel['classes'] : '',
					]
				));
			}
			else {
				$panel['id'] = null;
			}

			// Pseudo panel? Or something's wrong.
			if (!isset($panel['sections'])) {
				continue;
			}
			
			/**
			 * Add sections
			 */
			foreach ((array) $panel['sections'] as $section) {
				
				if (!isset($section['id'])) {
					$section['id'] = strtolower(str_replace(' ', '', $section['title']));
				}
				else if (!strstr($section['id'], 'bunyad-') && !strstr($section['id'], 'sphere-')) {
					$section['id'] = 'bunyad-' . $section['id'];
				}
				
				// Add the section
				$section_args = [
					'title'       => $section['title'],
					'description' => !empty($section['desc']) ? $section['desc'] : '',
					'panel'       => $panel['id'],
					'priority'    => $this->priority,
					'classes'     => !empty($section['classes']) ? $section['classes'] : '',
				];

				$section_type = !empty($section['type']) ? $section['type'] : '';

				switch ($section_type) {
					case 'heading':
						$wp_customizer->add_section(
							new Bunyad_Customizer_Sections_Heading(
								$this->wp_customizer,
								$section['id'],
								$section_args
							)
						);
						break;

					case 'message':
						$wp_customizer->add_section(
							new Bunyad_Customizer_Sections_Message(
								$this->wp_customizer,
								$section['id'],
								$section_args
							)
						);
						break;

					default:
						$wp_customizer->add_section(
							new Bunyad_Customizer_Sections_Base(
								$this->wp_customizer,
								$section['id'],
								$section_args
							)
						);
						break;
				}
				
				/**
				 * Add Controls
				 */
				foreach ($section['fields'] as $field) {
					$this->add_control($field, $section);					
				}
				
			} // sections loop
			
		} // tabs loop
		
		
		/**
		 * Modifications to the default elements
		 */
		
		// Move native background image container to color & style
		$bg = $wp_customizer->get_section('background_image');
		$bg->panel = 'colors';
		$bg->title = esc_html_x('Site Background Image', 'Admin', 'cheerup');
		
		// Move Site Identity section sufficiently below.
		$identity = $wp_customizer->get_section('title_tagline');
		// $identity->panel = 'sphere-general';
		$identity->priority = $this->priority++;
		
		// Remove default color section
		$wp_customizer->remove_section('colors');
	}

	/**
	 * Add a control to the customizer
	 *
	 * @param array $field
	 * @param array $section
	 * @return void
	 */
	public function add_control($field, $section)
	{
		// Setup defaults and override
		$field = array_merge([
			'type'        => '', 
			'label'       => '', 
			'desc'        => '', 
			'value'       => '', 
			// Setting it manually: 'transport'   => 'refresh', 
			'input_attrs' => [], 
			'options'     => [], 
			'context'     => '',
			'devices'     => false,
			'group'       => null,
			'group_type'  => null,
			'style'       => null,
			'classes'     => null,
			'preserve'    => null,
			'collapsed'   => true,
			'options'     => [],
			'preset'      => null,

			// Note: 'css' is not set as some internal logic checks for isset() on 'css' in fields.

		], $field);

		// Name is required.
		if (!isset($field['name'])) {
			return;
		}
		
		/**
		 * Register the setting
		 */
		$setting_id = $this->option_key . '[' . $field['name'] .']';

		// Support field names of type example[key]
		if (strstr($field['name'], '[')) {
			$setting_id = preg_replace('/(.+?\[.+?)\[(.+?)\]\]/', '\\1][\\2]', $setting_id);
		}
		
		// Have sanitization function?
		if (isset($field['sanitize_callback'])) {
			$sanitize = $field['sanitize_callback'];
		}
		else {
			// Fallback to filtering HTML if no specific sanitize
			$sanitize = (is_array($field['value']) ? [$this, 'sanitize_array'] :  'wp_kses_post_deep');
		}

		// Set transport
		$transport = !isset($field['transport']) ? 'refresh' : $field['transport'];
		if (!empty($field['css']) && !isset($field['transport'])) {
			$transport = 'postMessage';
		}

		$setting = [
			'type'      => 'option',
			'default'   => $field['value'],
			'transport' => $transport,
			'sanitize_callback' => $sanitize,
		];
		
		$this->wp_customizer->add_setting($setting_id, $setting);
		
		/**
		 * Prepare the control
		 */
		$control = [
			'type'        => $field['type'],
			'section'     => $section['id'],
			'settings'    => $setting_id,
			'label'       => $field['label'],
			'description' => $field['desc'],
			'priority'    => !empty($field['priority']) ? $field['priority'] : $this->priority,
			'input_attrs' => $field['input_attrs'],
			'context'     => $field['context'],
			'devices'     => $field['devices'],
			'group'       => $field['group'],
			'choices'     => $field['options'],
			'preset'      => $field['preset'],
			'style'       => $field['style'],
			'classes'     => $field['classes'],
			'preserve'    => $field['preserve'],
			'collapsed'   => $field['collapsed'],
		];
		
		// Add prefix to field name for controls and contexts.
		$field['name'] = $this->control_prefix . $field['name'];

		// Add prefix to groups.
		if ($control['group']) {
			$control['group'] = $this->control_prefix . $control['group'];
		}

		// Contextual conditionals?
		if ($field['context']) {
			$this->contexts[ $field['name'] ] = $control;
		}

		switch ($field['type']) {
			
			/**
			 * Color control with a special sanitize function
			 */
			case 'color':
				$control['type'] = 'bunyad-color';

				// Change sanitize for colors
				$this->wp_customizer->add_setting(
					$setting_id, 
					array_merge($setting, ['sanitize_callback' => 'sanitize_hex_color'])
				);
				
				// Add the control
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Color($this->wp_customizer, $field['name'], $control)
				);
				
				break;

			case 'color-alpha':
				$control['type'] = 'bunyad-color-alpha';

				// Change sanitize for colors
				$this->wp_customizer->add_setting(
					$setting_id, 
					array_merge($setting, ['sanitize_callback' => [$this, 'sanitize_color']])
				);
				
				// Add the control
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_ColorAlpha($this->wp_customizer, $field['name'], $control)
				);
				
				break;

			
			/**
			 * Upload control - supports the media field to save id or older image control for full
			 */
			case 'upload':
				
				// Important for JS handling
				$control['type'] = $field['options']['type'];
					
				// Image/upload control - saves attachment ID
				if ($field['options']['type'] == 'media') {
					
					$this->wp_customizer->add_control(
						new WP_Customize_Media_Control($this->wp_customizer, $field['name'], $control)
					);
					
				}
				else {
					
					// Image or Upload?
					$type = ($field['options']['type'] == 'image' ? 'Bunyad_Customizer_Controls_Image' : 'WP_Customize_Upload_Control');
					$this->wp_customizer->add_control(
						new $type($this->wp_customizer, $field['name'], $control)
					);
				}
				
				break;
				
			/**
			 * Multiple checkboxes control is a custom control
			 */
			case 'checkboxes':
				
				// Set choices
				$control['choices'] = $field['options'];
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Checkboxes($this->wp_customizer, $field['name'], $control)
				);
				
				break;
				
			/**
			 * Content Control is a custom control for custom HTML
			 */
			case 'content':
			
				$control['text'] = $field['text'];
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Content($this->wp_customizer, $field['name'], $control)
				);
				
				break;
			
			/**
			 * Show a message, alert and so on.
			 */
			case 'message':

				$control['text'] = $field['text'];
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Message($this->wp_customizer, $field['name'], $control)
				);

				break;


			case 'group':
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Group($this->wp_customizer, $field['name'], $control)
				);

				break;
				

			/**
			 * A simple HTML5 number control.
			 */
			case 'number':
			
				$control['type'] = 'bunyad-number';

				// Change sanitize for numbers
				$this->wp_customizer->add_setting(
					$setting_id, 
					array_merge($setting, ['sanitize_callback' => [$this, 'sanitize_number']])
				);
				
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Number($this->wp_customizer, $field['name'], $control)
				);
				
				break;

			/**
			 * Number with slider control.
			 */
			case 'slider':
			
				$control['type'] = 'bunyad-slider';

				// Change sanitize for numbers
				$this->wp_customizer->add_setting(
					$setting_id, 
					array_merge($setting, ['sanitize_callback' => [$this, 'sanitize_number']])
				);
				
				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Slider($this->wp_customizer, $field['name'], $control)
				);
				
				break;

			/**
			 * Dropdown native select.
			 */
			case 'select':
				
				$control['type'] = 'bunyad-select';

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Select($this->wp_customizer, $field['name'], $control)
				);
				break;

			case 'text':

				$control['type'] = 'bunyad-text';

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Text($this->wp_customizer, $field['name'], $control)
				);
				break;

			case 'font-family':

				$control['type'] = 'bunyad-font-family';

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_FontFamily($this->wp_customizer, $field['name'], $control)
				);

				break;

			case 'toggle':

				$control['type'] = 'bunyad-toggle';

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Toggle($this->wp_customizer, $field['name'], $control)
				);

				break;

			case 'dimensions':

				$control['type'] = 'bunyad-dimensions';

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Dimensions($this->wp_customizer, $field['name'], $control)
				);

				break;


			case 'textarea':

				$control['type'] = 'bunyad-textarea';

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Textarea($this->wp_customizer, $field['name'], $control)
				);

				break;


			case 'checkbox':
				// $control['type']    = 'checkbox';

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Checkbox($this->wp_customizer, $field['name'], $control)
				);

				break;


			case 'radio':
				$control['type']    = 'bunyad-radio';
				$control['choices'] = $field['options'];

				$this->wp_customizer->add_control(
					new Bunyad_Customizer_Controls_Radio($this->wp_customizer, $field['name'], $control)
				);

				break;

			// Doesn't render in customizer.
			case 'ignore':
				break;
			
			/**
			 * Default handler for all core supported controls
			 */
			default:
				$this->wp_customizer->add_control($field['name'], $control);
				break;
				
		}
	}

	/**
	 * Process options to set group options, device defaults and so on.
	 *
	 * @param array $options
	 * @param boolean $skip_advanced
	 * @return array
	 */
	public function process_options($options, $skip_advanced = false)
	{
		// Loop through options array to add panels, sections, and controls.
		foreach ($options as $panel_key => $panel) {
			
			if (!isset($panel['sections'])) {
				continue;
			}
			
			foreach ($panel['sections'] as $section_key => $section) {

				$orig_fields = &$options[$panel_key]['sections'][$section_key]['fields'];
				$fields      = $orig_fields;
				
				if ($skip_advanced !== true) {
					$fields = $this->add_group_fields($orig_fields);
				}

				$fields = $this->set_device_defaults($fields);

				// Assign to the original array (using the ref)
				$orig_fields = $fields;

				
			} // Sections loop	
		}

		return $options;
	}

	/**
	 * Organize sections under headings for first-level panel.
	 *
	 * @param array $options
	 * @return array
	 */
	public function organize_sections($options)
	{
		/**
		 * Add a section before a panel/section.
		 */
		$add_section = function($section, $before_key, $array, $is_panel = true) {

			$before_section = [[
				'id'     => 'bunyad-cz-bh-' . $section['id'],
				'title'  => $section['add_heading'],
				'fields' => [],
				'type'   => 'heading'
			]];

			// Creating a panel instead of a section?
			if ($is_panel) {
				$before_section = ['bh-' . $section['id'] => [
					'sections' => $before_section
				]];
			}

			// Case numeric keys to ensure _array_insert_after will work.
			if ($before_key !== null) {
				$before_key = (string) $before_key;
			}

			$this->_array_insert_after($array, $before_key, $before_section);
			return $array;
		};

		// Loop through options array to add panels, sections, and controls.
		$prev_panel_key = null;
		foreach ($options as $panel_key => $panel) {
			
			// A panel needs a heading before or after?
			if (isset($panel['add_heading'])) {
				$add_after = !empty($panel['add_heading_after']) ? $panel_key : $prev_panel_key;
				$options   = $add_section($panel, $add_after, $options);
			}

			if (!isset($panel['sections'])) {
				continue;
			}
			
			$prev_section_key = null;
			foreach ($panel['sections'] as $section_key => $section) {

				// A section requiring a heading before or after?
				if (isset($section['add_heading'])) {
					$add_after = !empty($section['add_heading_after']) ? $section_key : $prev_section_key;
					$options[ $panel_key ]['sections'] = $add_section(
						$section, 
						$add_after, 
						$panel['sections'],
						$is_panel = false
					);
				}
				
				$prev_section_key = $section_key;
			}

			$prev_panel_key = $panel_key;
		}
		
		return $options;
	}

	/**
	 * Pre-made groups of options will have options that will be dynamically added.
	 * 
	 * @param array $fields
	 * @return array
	 */
	public function add_group_fields($fields)
	{
		$new_fields   = $fields;
		$extra_fields = [];

		foreach ($fields as $key => $field) {

			if (!isset($field['type'])) {
				continue;
			}

			if ($field['type'] === 'group' && isset($field['group_type']) && $field['group_type'] === 'typography') {
				$extra_fields[ $key ] = $this->add_group_typography($field);

				//
				// Too slow as it uses array merge, better to create a new array instead when 
				// the element count is higher.
				//
				// $this->_array_insert_after(
				// 	$fields,
				// 	// Using string cast makes it find correct key in mixed arrays
				// 	(string) $key,
				// 	$extra_fields[ $key ]
				// );
			}
		}

		/**
		 * It's much faster to just re-do the array than to use array_splice, esp. with array_merge.
		 * 
		 * We don't care about preserving keys, just the order. Hence, $this->_array_insert_after()'s
		 * overhead isn't needed. 
		 * 
		 * Note: This removes support for string keys in options.
		 */
		if ($extra_fields) {
			$new_fields = [];
			foreach ($fields as $key => $field) {
				$new_fields[] = $field;

				if (isset($extra_fields[ $key ])) {
					foreach ($extra_fields[ $key ] as $ef_field) {
						$new_fields[] = $ef_field;
					}
				}
			}
		}

		return $new_fields;
	}

	/**
	 * Loop and set device defaults to the options.
	 * 
	 * @param array $fields
	 * @return array
	 */
	public function set_device_defaults($fields)
	{
		foreach ($fields as $key => $field) {

			/**
			 * Fix defaults devices
			 */
			if (!empty($field['devices'])) {

				if (!is_array($field['devices'])) {
					$field['devices'] = ['main', 'medium', 'small'];
				}

				if (empty($field['value'])) {
					$field['value'] = array_fill_keys($field['devices'], '');
				}

				// String / other value? Move it under main device.
				if (!is_array($field['value'])) {
					$field['value'] = array_merge(
						array_fill_keys($field['devices'], ''),
						['main' => $field['value']]
					);
				}
			}

			$fields[$key] = $field;
		}

		return $fields;
	}

	/**
	 * Insert into array after a certain key.
	 * 
	 * Note: Doesn't play with numeric indices in inserted arrays when 
	 * dealing with associative arrays.
	 *
	 * @param array $array
	 * @param integer|string $key
	 * @param array $insert
	 * 
	 * @return void
	 */
	public function _array_insert_after(&$array, $key, $insert) 
	{
		$index = array_search($key, array_keys($array));
		$pos   = false === $index ? count($array) : $index + 1;

		// Add at beginning.
		if ($key === null) {
			$pos = 0;
		}

		$array = array_merge(
			array_slice($array, 0, $pos), 
			$insert, 
			array_slice($array, $pos)
		);
	}

	/**
	 * Add typography group.
	 */
	public function add_group_typography($group)
	{
		$controls = [
			'family', 
			'size',
			'weight', 
			'style',
			'transform',
			'line_height',
			'spacing',
		];

		if (!empty($group['controls'])) {
			$controls = $group['controls'];
		}

		$selector = !empty($group['css']) ? $group['css'] : null;
		$preserve = !empty($group['preserve']) ? $group['preserve'] : null;
		$devices  = isset($group['devices']) ? $group['devices'] : true;

		$controls_options = [
			'family' => [
				'name'    => $group['name'] . '_family',
				'label'   => esc_html_x('Font Family', 'Admin', 'cheerup'),
				'value'   => '',
				'type'    => 'font-family',
				'options' => [],
				'css'     => [
					$selector => ['props' => ['font-family' => '%s']],
				],
				'preserve' => $preserve,
			],

			'size' => [
				'name'    => $group['name'] . '_size',
				'label'   => esc_html_x('Size', 'Admin', 'cheerup'),
				'value'   => '',
				'type'    => 'slider',
				'options' => [],
				'devices' => $devices,
				'input_attrs' => [
					'min'  => 7, 
					'max'  => 100, 
					'step' => 1
				],
				'css'     => [
					$selector => ['props' => ['font-size' => '%spx']],
				],
				'preserve' => $preserve,
			],

			'line_height' => [
				'name'    => $group['name'] . '_lheight',
				'label'   => esc_html_x('Line Height', 'Admin', 'cheerup'),
				'value'   => '',
				'type'    => 'slider',
				'options' => [],
				'devices' => $devices,
				'input_attrs' => [
					'min'  => 0, 
					'max'  => 3,
					'step' => .05
				],
				'css'     => [
					$selector => ['props' => ['line-height' => '%s']],
				],
				'preserve' => $preserve,
			],

			'spacing' => [
				'name'    => $group['name'] . '_spacing',
				'label'   => esc_html_x('Letter Spacing', 'Admin', 'cheerup'),
				'value'   => '',
				'type'    => 'slider',
				'options' => [],
				'devices' => $devices,
				'input_attrs' => [
					'min'  => -0.25, 
					'max'  => 1,
					'step' => .01
				],
				'css'     => [
					$selector => ['props' => ['letter-spacing' => '%sem']],
				],
				'preserve' => $preserve,
			],

			'weight' => [
				'name'    => $group['name'] . '_weight',
				'label'   => esc_html_x('Font Weight', 'Admin', 'cheerup'),
				//'desc'    => esc_html_x('Used if the font has this weight available.', 'Admin', 'cheerup'),
				'value'   => '',
				'type'    => 'select',
				'preset'  => 'font_weights',
				'style'   => 'inline',
				'css'     => [
					$selector => ['props' => ['font-weight' => '%s']],
				],
				'preserve' => $preserve,
			],

			'style' => [
				'name'    => $group['name'] . '_style',
				'label'   => esc_html_x('Font Style', 'Admin', 'cheerup'),
				'value'   => '',
				'type'    => 'select',
				'preset'  => 'font_style',
				'style'   => 'inline',
				'css'     => [
					$selector => ['props' => ['font-style' => '%s']],
				],
				'preserve' => $preserve,
			],

			'transform' => [
				'name'    => $group['name'] . '_transform',
				'label'   => esc_html_x('Transform', 'Admin', 'cheerup'),
				'value'   => '',
				'type'    => 'select',
				'preset'  => 'font_transform',
				'style'   => 'inline',
				'css'     => [
					$selector => ['props' => ['text-transform' => '%s']],
				],
				'preserve' => $preserve,
			],
		];

		$valid_controls  = [];
		$option_override = !empty($group['controls_options']) ? $group['controls_options'] : [];

		// Function to replace {selector} in key of an array. 
		// To be used with array_modify_recursive().
		$replace_selector = function($key, $val) use($selector) {
			$key = str_replace('{selector}', $selector, $key);
			return [$key, $val];
		};

		foreach ($controls as $control_id) {
			if (!isset($controls_options[$control_id])) {
				continue;
			}

			$control = $controls_options[$control_id];
			$control['group'] = $group['name'];
			if (isset($group['context'])) {
				$control['context'] = $group['context'];
			}

			/**
			 * Override if any controls options specified.
			 * Note: array_replace_recursive isn't used because we don't want to override beyond
			 * 1st level depth of array.
			 */
			if (isset($option_override[$control_id])) {

				$override = $option_override[$control_id];
				$control  = array_replace($control, $override);

				// Replace {selector} with current group selector for css overrides.
				if (isset($override['css'])) {
					$control = Bunyad::helpers()->array_modify_recursive(
						$control, $replace_selector
					);
				}
			}
			// foreach ($control as $option => $data) {
			// 	if (!empty($option_override[$control_id][$option])) {
			// 		$control[$option] = $option_override[$control_id][$option];
			// 	}
			// }

			$valid_controls[ $control['name'] ] = $control;

		}

		return $valid_controls;
	}

	/**
	 * Pre process options for contextually active tests.
	 */
	public function set_active_options($options = array())
	{
		if (!$options) {
			// Load all options (defaults to short load).
			Bunyad::options()->init(false);

			// Disabled contexts are already removed at runtime of init().
			$this->active_options = Bunyad::options()->get_all();
		}
		else {
			$this->active_options = $options;
		}
	}

	/**
	 * Contextual controls - hide and show controls based on provided rules.
	 * 
	 * Despite JS-side controls, this is still needed to meet some dependencies:
	 *  - wp.customize.settings.activeControls is updated using this.
	 * 
	 * @param boolean $active
	 * @param WP_Customize_Control $control
	 */
	public function contextual_controls($active, $control)
	{
		if (empty($this->contexts[$control->id])) {
			return $active;
		}

		// active_options are without prefix. So remove prefix.
		$control_id = substr($control->id, strlen($this->control_prefix));

		if (isset($this->active_options[$control_id])) {
			return true;
		}

		return false;
	}

	/**
	 * Run when customizer is run on the front-end to show the preview.
	 * 
	 * Initialized by customizer manager class at hook 'wp_loaded' which is later than
	 * init hook. Settings are also intiialized at the same so option overrides are
	 * only available after this is run.
	 * 
	 * @return void
	 */
	public function init_preview()
	{
		// Re-init options in memory based on preview 
		// @todo Remove defaults. 
		// Currently inactive contexts are removed, defaults are ignored by CSS generator,
		// and for other options, defaults are fine to be redeclared.
		Bunyad::options()->init(false);

		$this->set_active_options(Bunyad::options()->get_all());

		// Re-init sidebars again as widget styles can change in options. 
		// Customizer preview initializes the options later than the 'widgets_init' hook.
		Bunyad::get('theme')->register_sidebars();

		// Re-init skins as options may have changed.
		Bunyad::get('theme')->init_skins();

		// Re-register images to account for any changes to site width etc.
		Bunyad::get('theme')->register_images();

		// Special case: This is set by Bunyad_Core::init() which runs before init_preview() 
		Bunyad::core()->set_sidebar(Bunyad::options()->default_sidebar);
		
		// Enqueue our JS
		wp_enqueue_script(
			'cheerup-customize-preview', 
			get_template_directory_uri() . '/inc/customizer/js/dist/customizer-preview.js', 
			['jquery', 'customize-preview'], 
			Bunyad::options()->get_config('theme_version')
		);
	}

	/**
	 * Sanitize array of values
	 */
	public function sanitize_array($values = '')
	{
		if (!is_array($values)) {
			return [];
		}
		
		return array_map('wp_kses_post_deep', $values);
		
	}
	
	/**
	 * Sanitize float or int.
	 */
	public function sanitize_number($value)
	{
		$filter = function($value) {
			$value = preg_replace('/[^0-9\.\-]+/', '', trim($value));
			return $value;
		};

		if (is_array($value)) {

			// Numeric values - except for empty strings, which may be needed 
			// to preserve defaults.
			return array_map(function($val) use($filter) {
				return $val === '' ? '' : $filter($val);
			}, $value);
		}

		return $filter($value);
	}

	/**
	 * Sanitize a hex, rgb, hsl or rgba color.
	 * 
	 * @return string
	 */
	public function sanitize_color($value)
	{
		// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
		$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
		preg_match($pattern, $value, $matches);

		// Return the 1st match found.
		if (isset($matches[0])) {
			if (is_string($matches[0])) {
				return $matches[0];
			}

			if (is_array($matches[0]) && isset($matches[0][0])) {
				return $matches[0][0];
			}
		}

		// If no match was found, return an empty string.
		return '';
	}
	
	/**
	 * Reset settings with AJAX for a custom control
	 */
	public function ajax_reset()
	{	
		// Note: Using nonce registered by WordPress default customizer - since this 
		// action is handled as a setting save action, we shouldn't use our own nonce. 
		$nonce = 'save-customize_' . wp_get_theme()->get_stylesheet();
		
		if (!check_ajax_referer($nonce, 'nonce', false)) {
			wp_send_json_error('invalid_nonce');
			return;
		}
		
		// Delete all options - setting them to defaults
		Bunyad::factory('admin/options')->set_options()->delete_options(null, false);
		
		wp_send_json_success();
	}
}


// init and make available in Bunyad::get('customizer')
Bunyad::register('customizer', array(
	'class' => 'Bunyad_Theme_Customizer',
	'init' => true
));
