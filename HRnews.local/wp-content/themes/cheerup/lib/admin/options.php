<?php
/**
 * Theme Options handler on admin side
 */
class Bunyad_Admin_Options
{
	public $option_key;
	public $options;
	
	public function __construct()
	{
		$this->option_key = Bunyad::options()->get_config('theme_prefix') .'_theme_options';

		// admin_menu comes before admin_init in order
		add_action('admin_menu', array($this, 'init'));
		
		// check theme version info
		add_action('admin_init', array($this, 'check_version'));
		add_action('after_switch_theme', array($this, 'check_version'));
		
		// Cleanup defaults. Caps will be pre-checked.
		add_action('customize_save_after', array($this, 'customizer_save_process'));
	}
	
	/**
	 * Register a single option using Setting API and use sanitization hook
	 */
	public function init()
	{
		// current user can edit?
		if (!current_user_can('edit_theme_options')) {
			return;
		}
	}
	
	/**
	 * Check current theme version and run an update hook if necessary
	 */
	public function check_version()
	{
		$option = Bunyad::options()->get_config('theme_prefix') . '_theme_version';

		// Stored version info
		$version_info   = (array) get_option($option);
		$stored_version = !empty($version_info['current']) ? $version_info['current'] : null;

		// Legacy compat: Get from options.
		if (!$stored_version && Bunyad::options()->theme_version) {
			$stored_version = Bunyad::options()->theme_version;
		}
		
		// Update version if necessary.
		if (!version_compare($stored_version, Bunyad::options()->get_config('theme_version'), '==')) {
			
			// This shouldn't happen, but just in case the previous version is known and we're in customizer. 
			// We can't update while in customizer preview. 
			if ($stored_version && function_exists('is_customize_preview') && is_customize_preview()) {
				return wp_die(
					'The theme has a pending update that may cause fatal errors on customizer. Please go back to your WordPress admin area first and then open Customizer again.',
					'Pending Update!'
				);
			}

			// Fire up the hook
			do_action('bunyad_theme_version_change', $stored_version);

			// Can be filtered to stop the version update in db.
			if (!apply_filters('bunyad_theme_version_update_done', true)) {
				return;
			}
			
			// Update the theme version
			$version_info['current'] = Bunyad::options()->get_config('theme_version');
				
			if ($stored_version) {
				$version_info['previous'] = $stored_version;
			}
			
			// Update changes in database.
			update_option($option, array_filter($version_info));
		}
	}
	
	/**
	 * Load options locally for the class
	 */
	public function set_options($options = null)
	{
		if ($options) {
			$this->options = $options;
		}
		else if (!$this->options) { 
			
			// Get default options if empty
			$this->options = include get_template_directory() . '/admin/options.php';
		}
		
		return $this;
	}

	/**
	 * Extract elements/fields from the options hierarchy
	 * 
	 * @param array $options
	 * @param boolean $sub  add partial sub-elements in the list
	 * @param string  $tab_id  filter using a tab id
	 */
	public function get_elements_from_tree(array $options, $sub = false, $tab_id = null)
	{
		$elements = array();
		
		foreach ($options as $tab) {
			
			if ($tab_id != null && $tab['id'] != $tab_id) {
				continue;
			}

			if (empty($tab['sections'])) {
				continue;
			}
			
			foreach ($tab['sections'] as $section) 
			{
				foreach ($section['fields'] as $element) 
				{
					// pseudo element?
					if (empty($element['name'])) {
						continue;
					}
					
					$elements[$element['name']] = $element;
					
					// special treatment for typography section - it has sub-options
					if ($sub === true && $element['type'] == 'typography') {
						
						if (!empty($element['color'])) {
							// over-write 'value' key from the one in color - to set proper default
							$elements[$element['name'] . '_color'] = array_merge($element, $element['color']);
						}
						
						if (!empty($element['size'])) {
							$elements[$element['name'] . '_size'] = array_merge($element, $element['size']);
						}
					}
					
					// special treatment for typography section - it has sub-options
					if ($sub === true && $element['type'] == 'upload') {
						
						if (!empty($element['bg_type'])) {
							// over-write 'value' key from the one in color - to set proper default
							$elements[$element['name'] . '_bg_type'] = array_merge($element, $element['bg_type']);
						}
					}
					
				} // end fields loop
				
			} // end sections
		}
		
		return $elements;
	}

	/**
	 * Post-process Save customizer options.
	 * 
	 * This is needed to fix the defaults on customizer as it saves values in DB even when default is used.
	 * 
	 * @todo Refactor to Bunyad_Options::update()
	 */
	public function customizer_save_process()
	{
		// Get options and process them to add group pseudo-options and defaults.
		$elements = Bunyad::options()->load_elements(false);

		// The save options (Just saved by Customizer before this hook)
		$options  = get_option($this->option_key);

		if (empty($options)) {
			return;
		}

		// Remove defaults
		foreach ($options as $key => $value) {

			// Reset default as isset() is used later.
			unset($default);

			// Unrecognized element. Skip.
			// Note: Not unsetting as it might be a legacy value still needed in options storage.
			if (!isset($elements[$key])) {
				continue;
			}

			// Default unspecified?
			if (isset($elements[$key])) {
				$default = $elements[$key]['value'];
			}

			if (is_array($value)) {

				foreach ($value as $k => $v) {

					/**
			 		 * For special arrays that have keys in options as social_profile[facebook]
			 		 */
					$ele_key = "{$key}[{$k}]";
					if (isset($elements[$ele_key])) {
						$ele_default = $elements[$ele_key]['value'];

						if ($ele_default == $v) {
							unset($options[$key][$k]);
						}
					}
				}

				// Filter empty entries from devices array
				if (!empty($elements[$key]['devices'])) {
					$value = array_filter($value);
				}

				// Empty arrays are removed only if the default value is empty too. (below)
				// Otherwise, selecting no checkboxes for example can be a problem.
			}
			
			// Remove default values.
			// Note: Arrays with same keys are equal as it's a loose match. Sortables shouldn't 
			// use string keys but dynamic integer keys.
			//
			// Caveat: Casting to int would mean, '#222' or 'e' == 0 in loose match.
			if (isset($default) && $default == $value) {
				unset($options[$key]);
			}
		}

		// Remove dependencies disabled via context.
		// @deprecated Remove on runtime instead to preserve entered data in customizer.
		// $options = $this->remove_disabled_contexts($options, $elements);

		// Save the updated options
		update_option($this->option_key, $options);
	}
	
	/**
	 * Remove disabled dependencies based on context.
	 *
	 * @param array $options
	 * @return array
	 */
	public function remove_disabled_contexts($options, $elements)
	{
		// Override default values on elements.
		foreach ($options as $key => $value) {
			if (isset($elements[$key])) {
				$elements[$key]['value'] = $value;

				// Remove groups and other fields that should not have a value.
				if (isset($elements[$key]['type']) && in_array($elements[$key]['type'], ['group', 'message'])) {
					unset($options[$key]);
				}
			}
		}

		// Note: Separate from previous loop as all values need to be made available beforehand
		// for the method is_context_active.
		foreach ($options as $key => $value) {

			if (!isset($elements[$key]) OR !array_key_exists('context', $elements[$key])) {
				continue;
			}

			// Preserved flag - do not remove.
			if (!empty($elements[$key]['preserve'])) {
				continue;
			}

			$context = $elements[$key]['context'];

			if (!$this->is_context_active($context, $elements)) {
				unset($options[$key]);
			}
		}

		return $options;
	}

	/**
	 * Check if an element is contextually active.
	 * 
	 * @param array $contexts  Context tests to conduct.
	 * @param array $elements  Elements expected with values overriden (not defaults).
	 * 
	 * @return boolean
	 */
	public function is_context_active($contexts, $elements)
	{
		$active = null;

		foreach ($contexts as $data) {

			$data['relation'] = isset($data['relation']) ? $data['relation'] : 'AND';
			
			// Previous condition failed, continue no more with AND relation.
			if ($active === false && $data['relation'] !== 'OR') { 
				return false;
			}

			// Previous condition passed, stop with OR relation.
			if ($active === true && $data['relation'] === 'OR') {
				return true;
			}

			$expected = $data['value'];
			$value    = $elements[ $data['key'] ]['value'];
			$compare  = isset($data['compare']) ? $data['compare'] : '';

			$active = $this->context_compare($value, $expected, $compare);
		}

		return $active;
	}

	/**
	 * Compare current with expected value.
	 * 
	 * @return boolean
	 */
	public function context_compare($value, $expected, $compare)
	{
		if (is_array($expected)) {
			$compare = $compare == '!=' ? 'not in' : 'in';
		}

		switch ($compare) {
			case 'in':
			case 'not in':
				$return = in_array($value, $expected);
				return $compare == 'in' ? $return : !$return;

			case '!=':
				return $value != $expected;

			default:
				return $value == $expected;
		}
	}

	/**
	 * Delete / reset options - security checks done outside
	 */
	public function delete_options($type = null)
	{
		// get options object
		$options_obj = Bunyad::options();
		
		if ($type == 'colors') {
			$elements = $this->get_elements_from_tree($this->options, true, 'options-style-color');
			
			// preserve this
			unset($elements['predefined_style']);
		} 
		else {
			$elements = $this->get_elements_from_tree($this->options, true);
		}
		
		// loop through all elements and reset them
		foreach ($elements as $key => $element) {
			$options_obj->set($key, null); // unset / reset
		}

		// save in database
		$options_obj->update();
		
		return true;
	}
	
}