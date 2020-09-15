<?php
/**
 * Updates plugins packaged with the theme.
 * 
 * This to ensure packaged plugins are updated correctly via WP core update interface.
 * Note: TGMPA doesn't handle updates for packaged plugins.
 */
class Bunyad_Theme_Admin_Plugins_Update 
{	
	public $tracking = array();
	public $plugins_info = array();
	public $latest_meta;
	
	public function __construct() 
	{
		add_action('admin_init', array($this, 'init'));
		
		// Check for version difference via the typical update hook
		add_filter('pre_set_site_transient_update_plugins', array($this, 'check_update'), 99);
		
		// Add info for the plugin api
		add_filter('plugins_api', array($this, 'set_info'), 99, 3);
	}
	
	/**
	 * Setup the plugins to be tracked for local updates
	 */
	public function init()
	{
		
		// DEBUG: set_site_transient('update_plugins', '');
		
		// Set the plugins being tracked based on packaged_plugin data
		$this->latest_meta = array_combine(
			wp_list_pluck(Bunyad::registry()->packaged_plugins, 'slug'),
			Bunyad::registry()->packaged_plugins
		);

		// cache existing data for tracked plugins
		$installed = get_plugins();

		foreach ($installed as $id => $plugin) {
			$slug = dirname($id);
			
			// Track updates for this plugin?
			if (!in_array($slug, $this->tracking) OR !array_key_exists('version', $this->latest_meta[$slug])) {
				continue;
			}
			
			$this->plugins_info[$slug] = array_merge($plugin, array('file' => $id));
			array_push($this->tracking, $slug);
		}
		
		$this->tracking = apply_filters('bunyad_plugin_updates_tracking', $this->tracking);
	}

	/**
	 * Information of plugin for Plugin API
	 * 
	 * @param boolean|object  $existing
	 * @param string  $action
	 * @param object  $arg
	 */
	public function set_info($existing, $action, $arg) 
	{
		if (!empty($existing)) {
			return $existing;
		}
		
		if (!is_object($arg) OR empty($arg->slug)) {
		    return false;
		}
		
		if (in_array($arg->slug, $this->tracking)) {
			$info = array('slug' => $arg->slug);
			
			if (!empty($this->latest_meta[$arg->slug]['info'])) {
				$info = array_merge($info, (array) $this->latest_meta[$arg->slug]['info']);
			}
			
			return (object) $info;
		}

		return false;
	}
	
	/**
	 * Check for local plugin updates
	 * 
	 * @param object $transient
	 */
	public function check_update($transient)
	{
				
		if (empty($transient->checked)) {
			return $transient;
		}
		
		// check local updates for all tracked plugins
		foreach ($this->tracking as $plugin) {
			
			if (!isset($this->plugins_info[$plugin])) {
				continue;
			}
			
			$info = $this->plugins_info[$plugin];			
			$latest_version = $this->get_latest_version($plugin);

			// if a newer version is available, add the update
			if (version_compare($info['Version'], $latest_version, '<')) {
				
				// generate plugin update data from local source
				$update_url  = get_template_directory_uri() . '/lib/vendor/plugins/' . $plugin . '.zip';
				$update_data = array(
					'slug'    => $plugin,
					'url'     => $info['PluginURI'],
					'plugin'  => $info['file'],
					'package' => $update_url,
					'new_version' => $latest_version,
				);

				$transient->response[$info['file']] = (object) $update_data;

				// Will need no_update too in future:
				// https://make.wordpress.org/core/2020/07/30/recommended-usage-of-the-updates-api-to-support-the-auto-updates-ui-for-plugins-and-themes-in-wordpress-5-5/
			}
		}
		
		return $transient;
	}
	
	/**
	 * Get latest version information
	 * 
	 * @param string $slug
	 */
	public function get_latest_version($slug)
	{
		return (!empty($this->latest_meta[$slug]['version']) ? $this->latest_meta[$slug]['version'] : 0);
	}
	
}

// init and make available in Bunyad::get('plugin_updates')
Bunyad::register('plugin_updates', array(
	'class' => 'Bunyad_Theme_Admin_Plugins_Update',
	'init' => true
));