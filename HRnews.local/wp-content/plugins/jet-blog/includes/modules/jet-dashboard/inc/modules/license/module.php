<?php
namespace Jet_Dashboard\Modules\License;

use Jet_Dashboard\Base\Module as Module_Base;
use Jet_Dashboard\Dashboard as Dashboard;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Module extends Module_Base {

	/**
	 * [init description]
	 * @return [type] [description]
	 */
	public function init() {
		add_action( 'admin_menu', array( $this, 'register_license_page' ), 22 );
	}

	/**
	 * [register_license_page description]
	 * @return [type] [description]
	 */
	public function register_license_page() {

	}

	/**
	 * Returns module slug
	 *
	 * @return void
	 */
	public function get_slug() {
		return 'license-page';
	}

	/**
	 * Enqueue module-specific assets
	 *
	 * @return void
	 */
	public function enqueue_module_assets() {
		wp_enqueue_script(
			'jet-dashboard-license-page',
			Dashboard::get_instance()->get_dashboard_url() . 'assets/js/license-page.js',
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

		$config['headerTitle']  = 'License Manager';
		$config['page']         = 'license-page';
		$config['wrapperCss']   = 'license-page';

		return $config;
	}

	/**
	 * [page_templates description]
	 * @param  array  $templates [description]
	 * @param  string $subpage   [description]
	 * @return [type]            [description]
	 */
	public function page_templates( $templates = array(), $subpage = '' ) {

		$templates['license-page']          = 'license/main';
		$templates['license-item']          = 'license/license-item';
		$templates['plugin-item-installed'] = 'license/plugin-item-installed';
		$templates['plugin-item-avaliable'] = 'license/plugin-item-avaliable';
		$templates['plugin-item-more']      = 'license/plugin-item-more';
		$templates['responce-info']         = 'license/responce-info';

		return $templates;
	}
}
