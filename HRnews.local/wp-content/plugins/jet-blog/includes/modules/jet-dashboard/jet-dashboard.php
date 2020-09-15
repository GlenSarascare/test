<?php
/**
 * Jet Dashboard Module
 *
 * Version: 1.0.10
 */

namespace Jet_Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Dashboard {

	/**
	 * A reference to an instance of this class.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    object
	 */
	private static $instance = null;

	/**
	 * Module directory path.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var srting.
	 */
	protected $path;

	/**
	 * Module directory URL.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var srting.
	 */
	protected $url;

	/**
	 * Module version
	 *
	 * @var string
	 */
	protected $version = '1.0.10';

	/**
	 * [$dashboard_slug description]
	 * @var string
	 */
	public $dashboard_slug = 'jet-dashboard';

	/**
	 * [$module_manager description]
	 * @var null
	 */
	public $module_manager = null;

	/**
	 * [$license_manager description]
	 * @var null
	 */
	public $license_manager = null;

	/**
	 * [$plugin_updater description]
	 * @var null
	 */
	public $plugin_manager = null;

	/**
	 * [$subpage description]
	 * @var null
	 */
	private $subpage = null;

	/**
	 * [$default_args description]
	 * @var [type]
	 */
	public $default_args = array(
		'path'           => '',
		'url'            => '',
		'cx_ui_instance' => false,
		'plugin_data'    => array(
			'slug'    => false,
			'version' => '',
		),
	);

	/**
	 * [$args description]
	 * @var array
	 */
	public $args = array();

	/**
	 * [$cx_ui_instance description]
	 * @var boolean
	 */
	public $cx_ui_instance = false;

	/**
	 * [$plugin_slug description]
	 * @var boolean
	 */
	public $plugin_data = false;

	/**
	 * [$assets_enqueued description]
	 * @var boolean
	 */
	protected $assets_enqueued = false;

	/**
	 * [$registered_plugins description]
	 * @var array
	 */
	public $registered_plugins = array();

	/**
	 * Jet_Dashboard constructor.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function __construct() {

		$this->load_files();

		add_action( 'admin_menu', array( $this, 'register_page' ), 21 );

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_assets' ) );

		add_action( 'init', array( $this, 'init_managers' ), -998 );
	}

	/**
	 * [load_files description]
	 * @return [type] [description]
	 */
	public function load_files() {
		require $this->path . 'inc/utils.php';
		require $this->path . 'inc/license-manager.php';
		require $this->path . 'inc/plugin-manager.php';
		require $this->path . 'inc/module-manager.php';
		require $this->path . 'inc/modules/base.php';
		require $this->path . 'inc/modules/welcome/module.php';
		require $this->path . 'inc/modules/license/module.php';
	}

	/**
	 * [init description]
	 * @return [type] [description]
	 */
	public function init( $args = [] ) {

		$this->args = wp_parse_args( $args, $this->default_args );

		$this->path = ! empty( $this->args['path'] ) ? $this->args['path'] : false;
		$this->url  = ! empty( $this->args['url'] ) ? $this->args['url'] : false;

		if ( ! $this->path || ! $this->url || ! $this->args['cx_ui_instance'] ) {
			wp_die(
				'Jet_Dashboard not initialized. Module URL, Path, UI instance and plugin data should be passed into constructor',
				'Jet_Dashboard Error'
			);
		}

		$this->plugin_data = $this->args['plugin_data'];

		$this->register_plugin( $this->args['plugin_data']['file'], $this->args['plugin_data'] );
	}

	/**
	 * [init_managers description]
	 * @param  array  $args [description]
	 * @return [type]       [description]
	 */
	public function init_managers() {
		$this->module_manager  = new Module_Manager();
		$this->license_manager = new License_Manager();
		$this->plugin_manager  = new Plugin_Manager();
	}

	/**
	 * Register add/edit page
	 *
	 * @return void
	 */
	public function register_page() {

		add_menu_page(
			'JetPlugins',
			'JetPlugins',
			'manage_options',
			$this->dashboard_slug,
			array( $this, 'render_dashboard' ),
			"data:image/svg+xml,%3Csvg width='18' height='15' viewBox='0 0 18 15' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M16.0767 0.00309188C17.6897 -0.0870077 18.6099 1.81257 17.5381 3.02007L7.99824 13.7682C6.88106 15.0269 4.79904 14.2223 4.82092 12.5403L4.87766 8.17935C4.88509 7.60797 4.62277 7.06644 4.16961 6.71768L0.710961 4.05578C-0.623014 3.02911 0.0373862 0.899003 1.71878 0.805085L16.0767 0.00309188Z' fill='white'/%3E%3C/svg%3E%0A",
			59
		);

		add_submenu_page(
			'jet-dashboard',
			esc_html__( 'Dashboard', 'jet-tricks' ),
			esc_html__( 'Dashboard', 'jet-tricks' ),
			'manage_options',
			'jet-dashboard'
		);
	}

	/**
	 * Render installation wizard page
	 *
	 * @return void
	 */
	public function render_dashboard() {
		include $this->get_view( 'common/dashboard' );
	}

	/**
	 * [init_ui_instance description]
	 * @param  boolean $ui_callback [description]
	 * @return [type]               [description]
	 */
	public function init_ui_instance( $ui_callback = false ) {

		if ( $ui_callback && is_object( $ui_callback ) && 'CX_Vue_UI' === get_class( $ui_callback ) ) {
			$this->cx_ui_instance = $ui_callback;
		}

		if ( ! $ui_callback || ! is_callable( $ui_callback ) ) {
			return;
		}

		$this->cx_ui_instance = call_user_func( $ui_callback );
	}

	/**
	 * Enqueue builder assets
	 *
	 * @return void
	 */
	public function enqueue_assets( $hook ) {

		if ( 'toplevel_page_' . $this->dashboard_slug !== $hook ) {
			return;
		}

		if ( $this->assets_enqueued ) {
			return;
		}

		$this->init_ui_instance( $this->args['cx_ui_instance'] );

		$this->cx_ui_instance->enqueue_assets();

		/**
		 * Fires before enqueue page assets
		 */
		do_action( 'jet-dashboard/before-enqueue-assets', $this );

		/**
		 * Fires before enqueue page assets with dynamic subpage name
		 */
		do_action( 'jet-dashboard/before-enqueue-assets/' . $this->get_subpage(), $this );

		$direction_suffix = is_rtl() ? '-rtl' : '';

		wp_enqueue_style(
			'jet-dashboard-admin-css',
			$this->url . 'assets/css/jet-dashboard-admin' . $direction_suffix . '.css',
			false,
			$this->version
		);

		wp_enqueue_script(
			'jet-dashboard-script',
			$this->url . 'assets/js/jet-dashboard.js',
			array( 'cx-vue-ui' ),
			$this->version,
			true
		);

		$style_parent_theme = wp_get_theme( get_template() );

		$theme_info = array(
			'name'       => $style_parent_theme->get('Name'),
			'theme'      => strtolower( preg_replace('/\s+/', '', $style_parent_theme->get('Name') ) ),
			'version'    => $style_parent_theme->get('Version'),
			'author'     => $style_parent_theme->get('Author'),
			'authorSlug' => strtolower( preg_replace('/\s+/', '', $style_parent_theme->get('Author') ) ),
		);

		wp_localize_script(
			'jet-dashboard-script',
			'JetDashboardPageConfig',
			apply_filters( 'jet-dashboard/js-page-config', array(
				'themeInfo'         => $theme_info,
				'headerTitle'       => '',
				'mainPage'          => $this->get_dashboard_page_url( $this->get_initial_page() ),
				'page'              => false,
				'module'            => $this->get_subpage(),
				'nonce'             => wp_create_nonce( $this->dashboard_slug ),
				'ajaxUrl'           => esc_url( admin_url( 'admin-ajax.php' ) ),
				'licenseList'       => array_values( Utils::get_license_list() ),
				'allJetPlugins'     => $this->plugin_manager->get_plugin_data_list(),
				'debugActions'      => $this->license_manager->get_debug_action_list(),
			) )
		);

		add_action( 'admin_footer', array( $this, 'print_vue_templates' ), 0 );

		$this->assets_enqueued = true;
	}

	/**
	 * Print components templates
	 *
	 * @return void
	 */
	public function print_vue_templates() {

		$templates = apply_filters(
			'jet-dashboard/js-page-templates',
			array(
				'header' => 'common/header',
			),
			$this->get_subpage()
		);

		foreach ( $templates as $name => $path ) {

			ob_start();
			include $this->get_view( $path );
			$content = ob_get_clean();

			printf(
				'<script type="text/x-template" id="jet-dashboard-%1$s">%2$s</script>',
				$name,
				$content
			);
		}
	}

	/**
	 * [get_registered_plugins description]
	 * @return [type] [description]
	 */
	public function get_registered_plugins() {
		return $this->registered_plugins;
	}

	/**
	 * [get_registered_plugins description]
	 * @return [type] [description]
	 */
	public function register_plugin( $plugin_slug = false, $plugin_data = array() ) {

		if ( ! array_key_exists( $plugin_slug, $this->registered_plugins ) ) {
			$this->registered_plugins[ $plugin_slug ] = $plugin_data;
		}

		return false;
	}

	/**
	 * [get_dashboard_version description]
	 * @return [type] [description]
	 */
	public function get_dashboard_path() {
		return $this->path;
	}

	/**
	 * [get_dashboard_version description]
	 * @return [type] [description]
	 */
	public function get_dashboard_url() {
		return $this->url;
	}

	/**
	 * [get_dashboard_version description]
	 * @return [type] [description]
	 */
	public function get_dashboard_version() {
		return $this->version;
	}

	/**
	 * Returns path to view file
	 *
	 * @param  [type] $path [description]
	 * @return [type]       [description]
	 */
	public function get_view( $path ) {
		return apply_filters( 'jet-dashboard/get-view', $this->path . 'views/' . $path . '.php' );
	}

	/**
	 * Returns current subpage slug
	 *
	 * @return string
	 */
	public function get_subpage() {

		if ( null === $this->subpage ) {
			$this->subpage = isset( $_GET['sub'] ) ? esc_attr( $_GET['sub'] ) : $this->get_initial_page();
		}

		return $this->subpage;
	}

	/**
	 * Returns wizard initial subpage
	 *
	 * @return string
	 */
	public function get_initial_page() {
		return 'license-page';
	}

	/**
	 * Check if dashboard page is currently displayiing
	 *
	 * @return boolean [description]
	 */
	public function is_dashboard_page() {
		return ( ! empty( $_GET['page'] ) && $this->dashboard_slug === $_GET['page'] );
	}

	/**
	 * [get_admin_url description]
	 * @return [type] [description]
	 */
	public function get_dashboard_page_url( $subpage = null, $args = array() ) {

		$page_args = array(
			'page' => $this->dashboard_slug,
			'sub'  => $subpage,
		);

		if ( ! empty( $args ) ) {
			$page_args = array_merge( $page_args, $args );
		}

		return add_query_arg( $page_args, admin_url( 'admin.php' ) );
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

