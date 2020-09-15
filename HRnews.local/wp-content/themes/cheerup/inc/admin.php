<?php
/**
 * General Admin functionality - hooks, methods.
 *  
 * This file serves to be the functions.php for admin functionality. Any
 * non-specific functionality is contained here.
 * 
 * Also see admin/ folder in the root.
 *
 */
class Bunyad_Theme_Admin
{
	public function __construct()
	{
		// Setup plugins before init
		$this->setup_plugins();

		// Set up hooks
		add_action('bunyad_core_post_init', array($this, 'init'));
		
		// Educate on theme check
		add_action('themecheck_checks_loaded', array($this, 'notice_themecheck'));
		
		// Compatability warning
		if (class_exists('Endurance_Page_Cache')) {
			add_action('admin_notices', array($this, 'notice_cache'));
		}
		
		/**
		 * Include relevant admin files
		 */
		
		// Dashboard, importer and editor
		include get_template_directory() . '/inc/admin/dashboard.php';
		include get_template_directory() . '/inc/admin/import.php';
		include get_template_directory() . '/inc/admin/editor.php';

		// Packaged plugin updates
		include get_template_directory() . '/inc/admin/plugins-update.php';
	}
	
	public function init()
	{

		// Do 3rd party plugin settings, if needed, at theme init.
		add_action('after_switch_theme', [$this, 'plugin_settings']);

		// Add image sizes to the editor
		// add_filter('image_size_names_choose', array($this, 'add_image_sizes_editor'));
	}

	/**
	 * Setup and recommend plugins.
	 */
	public function setup_plugins()
	{
		if (!is_admin()) {
			return;
		}
		
		// Load the plugin activation class and plugin updater.
		require_once get_template_directory() . '/lib/vendor/class-tgm-plugin-activation.php';
		require_once get_template_directory() . '/inc/admin/dash-plugins.php';
		
		// Recommended and required plugins
		$plugins = array(
			array(
				'name'     => esc_html_x('Sphere Core', 'Admin', 'cheerup'),
				'slug'     => 'sphere-core',
				'required' => true,
				'source'   => get_template_directory() . '/lib/vendor/plugins/sphere-core.zip', // The plugin source
				'version'  => '1.1.3'
			),

			array(
				'name'     => esc_html_x('CheerUp Core', 'Admin', 'cheerup'),
				'slug'     => 'cheerup-core',
				'required' => true,
				'source'   => get_template_directory() . '/lib/vendor/plugins/cheerup-core.zip', // The plugin source
				'version'  => '1.0.2'
			),

			array(
				'name'     => esc_html_x('Bunyad Widget for Instagram', 'Admin', 'cheerup'),
				'slug'     => 'bunyad-instagram-widget',
				'required' => false,
				'source'   => get_template_directory() . '/lib/vendor/plugins/bunyad-instagram-widget.zip', // The plugin source
				'version'  => '1.2.2',
			),
				
			array(
				'name'     => esc_html_x('WPBakery Page Builder (Required for Magazine)', 'Admin', 'cheerup'),
				'slug'     => 'js_composer',
				'required' => false,
				'source'   => get_template_directory() . '/lib/vendor/plugins/js_composer.zip', // The plugin source
				'version'  => '6.2'
			),
		
			array(
				'name'     => esc_html_x('Contact Form 7', 'Admin', 'cheerup'),
				'slug'     => 'contact-form-7',
				'required' => false,
			),

			array(
				'name'     => esc_html_x('Easy GDPR Consent Forms for MailChimp', 'Admin', 'cheerup'),
				'slug'     => 'easy-gdpr-consent-mailchimp',
				'required' => false,
				'optional' => true,
			),

			array(
				'name'     => esc_html_x('Self-Hosted Google Fonts', 'Admin', 'cheerup'),
				'slug'     => 'selfhost-google-fonts',
				'required' => false,
				'optional' => true,
			),

			array(
				'name'     => esc_html_x('Bunyad AMP', 'Admin', 'cheerup'),
				'slug'     => 'bunyad-amp',
				'required' => false,
				'optional' => true,
				'source'   => get_template_directory() . '/lib/vendor/plugins/bunyad-amp.zip', // The plugin source
				'version'  => '1.5.4',
				'external_url' => 'https://cheerup.theme-sphere.com/documentation/#amp'
			),

			array(
				'name'     => esc_html_x('WP Recipe Maker', 'Admin', 'cheerup'),
				'slug'     => 'wp-recipe-maker',
				'required' => false,
				'optional' => true,
			),

		);
		
		// Set for update checking
		Bunyad::registry()->set('packaged_plugins', $plugins);

		tgmpa($plugins, array(
			'parent_slug' => 'sphere-dash',
			'id' => 'cheerup_tgmpa'
		));
		
	}

	
	/**
	 * Filter callback: Add custom image sizes to the editor image size selection
	 * 
	 * @param array $sizes
	 * @deprecated 7.0.0
	 */
	public function add_image_sizes_editor($sizes) 
	{
		global $_wp_additional_image_sizes;
		
		if (empty($_wp_additional_image_sizes)) {
			return $sizes;
		}

		$images = array('cheerup-main', 'cheerup-main-full', 'cheerup-grid', 'cheerup-list');
		foreach ($_wp_additional_image_sizes as $id => $data) {

			if (in_array($id, $images) && !isset($sizes[$id])) {
				$sizes[$id] = esc_html('Legacy - ') . ucwords(str_replace('-', ' ', $id));
			}
		}
		
		return $sizes;
	}
	
	/**
	 * Educate new users about theme check 
	 */
	public function notice_themecheck() 
	{
		if (!isset($_GET['page']) OR $_GET['page'] != 'themecheck') {
			return;
		}
		
		?>
		
		<div class="error">
			<h3>Theme Check Invalid for Premium Themes!</h3>
			<p>
			Theme Check plugin was created for WordPress.org repository to automate submission checks. Please note that theme check rules DO NOT apply to premium themes. 
			</p>
		</div>
		<?php 
	}
	
	
	/**
	 * Compatibility Issue notice
	 * 
	 * - BlueHost Endurance Cache plugin
	 */
	public function notice_cache()
	{
		$cache = get_option('mm_cache_settings');
		if (!empty($cache['page']) && $cache['page'] == 'disabled') {
			return;
		}

		// The level is probably 0.
		if (!get_option('endurance_cache_level')) {
			return;
		}
		
		if (!empty($_GET['page']) && strstr($_GET['page'], 'sphere-')) {
			return;
		}
		
		?>
		
		<div class="error">
			<p>
			<strong>Incompatible Plugin:</strong> Endurance Cache Plugin does not follow best practices for cache and is not recommended. 
				Please disable it now. Go to <a href="<?php echo esc_url(admin_url('options-general.php#epc_settings')); ?>">Settings > General</a>, set Cache Level to Off and Save.
				After your site is setup, consider a better cache plugin like W3 Total Cache  (<a href="https://cheerup.theme-sphere.com/documentation/#performance" target="_blank">more info</a>).
			</p> 
		</div>
		<?php 
	}

	/**
	 * 3rd Party Settings/Options update on theme activate.
	 */
	public function plugin_settings()
	{
		$this->do_wprm_settings();
	}

	/**
	 * WP Recipe Maker initial settings.
	 */
	public function do_wprm_settings()
	{
		$options = (array) get_option('wprm_settings');
		$options['default_recipe_template_modern'] = 'cheerup';
		$options['comment_rating_form_position']   = 'below';
		$options['default_recipe_amp_template']    = 'default_recipe_template';
		$options['default_recipe_feed_template']   = 'default_recipe_template';

		update_option('wprm_settings', $options);
	}
}

// init and make available in Bunyad::get('admin')
Bunyad::register('admin', array(
	'class' => 'Bunyad_Theme_Admin',
	'init' => true
));