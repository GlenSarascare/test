<?php
/**
 * Class description
 *
 * @package   package_name
 * @author    Cherry Team
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Jet_Blog_Settings' ) ) {

	/**
	 * Define Jet_Blog_Settings class
	 */
	class Jet_Blog_Settings {

		/**
		 * A reference to an instance of this class.
		 *
		 * @since  1.0.0
		 * @access private
		 * @var    object
		 */
		private static $instance = null;

		/**
		 * [$key description]
		 * @var string
		 */
		public $key = 'jet-blog-settings';

		/**
		 * [$settings description]
		 * @var null
		 */
		public $settings = null;

		/**
		 * [$settings_page_config description]
		 * @var array
		 */
		public $settings_page_config = [];

		/**
		 * Available Widgets array
		 *
		 * @var array
		 */
		public $avaliable_widgets = array();

		/**
		 * Init page
		 */
		public function init() {

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 0 );

			add_action( 'admin_menu', array( $this, 'register_page' ), 99 );

			foreach ( glob( jet_blog()->plugin_path( 'includes/addons/' ) . '*.php' ) as $file ) {
				$data = get_file_data( $file, array( 'class' => 'Class', 'name' => 'Name', 'slug' => 'Slug' ) );

				$slug = basename( $file, '.php' );
				$this->avaliable_widgets[ $slug ] = $data['name'];
			}

			add_action( 'jet-styles-manager/compatibility/register-plugin', array( $this, 'register_for_styles_manager' ) );

		}

		/**
		 * Register jet-blog plugin for styles manager
		 *
		 * @param  object $compatibility_manager JetStyleManager->compatibility instance
		 * @return void
		 */
		public function register_for_styles_manager( $compatibility_manager ) {
			$compatibility_manager->register_plugin( 'jet-blog', (int) $this->get( 'widgets_load_level', 100 ) );
		}

		/**
		 * [generate_frontend_config_data description]
		 * @return [type] [description]
		 */
		public function generate_frontend_config_data() {

			$default_active_widgets = [];

			foreach ( $this->avaliable_widgets as $slug => $name ) {

				$avaliable_widgets[] = [
					'label' => $name,
					'value' => $slug,
				];

				$default_active_widgets[ $slug ] = 'true';
			}

			$active_widgets = $this->get( 'avaliable_widgets', $default_active_widgets );

			$post_types = [];

			$post_types_list = jet_blog_tools()->get_post_types();

			if ( ! empty( $post_types_list ) ) {
				foreach ( $post_types_list as $slug => $label ) {
					$post_types[] = [
						'label' => $label,
						'value' => $slug,
					];
				}
			}

			$rest_api_url = apply_filters( 'jet-blog/rest/frontend/url', get_rest_url() );

			$this->settings_page_config = [
				'messages' => [
					'saveSuccess' => esc_html__( 'Saved', 'jet-blog' ),
					'saveError'   => esc_html__( 'Error', 'jet-blog' ),
				],
				'ajaxUrl'        => esc_url( admin_url( 'admin-ajax.php' ) ),
				'settingsApiUrl' => $rest_api_url . 'jet-blog-api/v1/plugin-settings',
				'settingsData' => [
					'youtube_api_key' => [
						'value' => $this->get( 'youtube_api_key', '' ),
					],
					'widgets_load_level'      => [
						'value' => $this->get( 'widgets_load_level', 100 ),
						'options' => [
							[
								'label' => 'None',
								'value' => 0,
							],
							[
								'label' => 'Low',
								'value' => 25,
							],
							[
								'label' => 'Medium',
								'value' => 50,
							],
							[
								'label' => 'Advanced',
								'value' => 75,
							],
							[
								'label' => 'Full',
								'value' => 100,
							],
						],
					],
					'allow_filter_for' => [
						'value'   => $this->get( 'allow_filter_for', 'post' ),
						'options' => $post_types,
					],
					'avaliable_widgets'       => [
						'value'   => $active_widgets,
						'options' => $avaliable_widgets,
					] ,
				],
			];
		}

		/**
		 * Initialize page builder module if required
		 *
		 * @return void
		 */
		public function admin_enqueue_scripts() {

			if ( isset( $_REQUEST['page'] ) && $this->key === $_REQUEST['page'] ) {

				$this->generate_frontend_config_data();

				$module_data = jet_blog()->module_loader->get_included_module_data( 'cherry-x-vue-ui.php' );
				$ui          = new CX_Vue_UI( $module_data );

				$ui->enqueue_assets();

				wp_enqueue_style(
					'jet-blog-admin-css',
					jet_blog()->plugin_url( 'assets/css/admin.css' ),
					false,
					jet_blog()->get_version()
				);

				wp_enqueue_script(
					'jet-blog-admin-script',
					jet_blog()->plugin_url( 'assets/js/jet-blog-admin.js' ),
					array( 'cx-vue-ui' ),
					jet_blog()->get_version(),
					true
				);

				wp_localize_script(
					'jet-blog-admin-script',
					'JetBlogSettingsPageConfig',
					apply_filters( 'jet-blog/admin/settings-page-config', $this->settings_page_config )
				);
			}
		}

		/**
		 * [get description]
		 * @param  [type]  $setting [description]
		 * @param  boolean $default [description]
		 * @return [type]           [description]
		 */
		public function get( $setting, $default = false ) {

			if ( null === $this->settings ) {
				$this->settings = get_option( $this->key, array() );
			}

			return isset( $this->settings[ $setting ] ) ? $this->settings[ $setting ] : $default;
		}

		/**
		 * Return settings page URL
		 *
		 * @return string
		 */
		public function get_settings_page_link() {

			return add_query_arg(
				array(
					'page' => $this->key,
				),
				esc_url( admin_url( 'admin.php' ) )
			);

		}

		/**
		 * Register add/edit page
		 *
		 * @return void
		 */
		public function register_page() {

			add_submenu_page(
				'jet-dashboard',
				esc_html__( 'JetBlog Settings', 'jet-blog' ),
				esc_html__( 'JetBlog Settings', 'jet-blog' ),
				'manage_options',
				$this->key,
				array( $this, 'render_page' )
			);
		}

		/**
		 * Render settings page
		 *
		 * @return void
		 */
		public function render_page() {
			include jet_blog()->get_template( 'admin-templates/settings-page.php' );
		}

		/**
		 * Returns the instance.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return object
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}
	}
}

/**
 * Returns instance of Jet_Blog_Settings
 *
 * @return object
 */
function jet_blog_settings() {
	return Jet_Blog_Settings::get_instance();
}

jet_blog_settings()->init();
