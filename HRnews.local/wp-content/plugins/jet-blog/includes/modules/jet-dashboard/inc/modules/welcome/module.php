<?php
namespace Jet_Dashboard\Modules\Welcome;

use Jet_Dashboard\Base\Module as Module_Base;
use Jet_Dashboard\Dashboard as Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Module extends Module_Base {

	/**
	 * Returns module slug
	 *
	 * @return void
	 */
	public function get_slug() {
		return 'welcome-page';
	}

	/**
	 * Enqueue module-specific assets
	 *
	 * @return void
	 */
	public function enqueue_module_assets() {

		wp_enqueue_script(
			'jet-dashboard-welcome-page',
			Dashboard::get_instance()->get_dashboard_url() . 'assets/js/welcome-page.js',
			array( 'cx-vue-ui' ),
			Dashboard::get_instance()->get_dashboard_version(),
			true
		);
	}

	/**
	 * License page config
	 *
	 * @param  array  $config  [description]
	 * @param  string $subpage [description]
	 * @return [type]          [description]
	 */
	public function page_config( $config = array(), $subpage = '' ) {

		$config['headerTitle']  = 'Welcome';
		$config['page']         = 'welcome-page';
		$config['wrapperCss']   = 'welcome-page';

		return $config;
	}

	/**
	 * Add welcome component template
	 *
	 * @param  array  $templates [description]
	 * @param  string $subpage   [description]
	 * @return [type]            [description]
	 */
	public function page_templates( $templates = array(), $subpage = '' ) {

		$templates['welcome-page'] = 'welcome/main';

		return $templates;
	}
}
