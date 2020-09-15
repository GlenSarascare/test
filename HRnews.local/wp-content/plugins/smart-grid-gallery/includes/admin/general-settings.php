<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_General_Options {
	/**
	 * Loads General options page
	 */
	public function load_page() {
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'Options_video_gallery_styles' ) {
            $this->show_page();
		}
	}

	/**
	 * Shows General options page
	 */
	public function show_page() {
		require( ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'general-settings-page.php' );
	}

}