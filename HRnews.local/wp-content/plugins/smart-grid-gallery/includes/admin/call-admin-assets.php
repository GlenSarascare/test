<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//todo: correct urls
class OriginCode_Gallery_Video_Admin_Assets {

	/**
	 * OriginCode_Gallery_Video_Admin_Assets constructor.
	 */
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}

	/**
	 * @param $hook hook of current page
	 */
	public function admin_styles( $hook ) {
		if ( in_array( $hook, OriginCode_Gallery_Video()->admin->pages ) ) {
			wp_enqueue_style( "origincode_gallery_video_admin_css", OriginCode_Gallery_Video()->plugin_url() . "/assets/style/admin.style.css", false );
			wp_enqueue_style( "origincode_gallery_video_jquery_ui_css", OriginCode_Gallery_Video()->plugin_url() . "/assets/style/jquery-ui.css", false );
			wp_enqueue_style( "origincode_gallery_video_simple_slider_css", OriginCode_Gallery_Video()->plugin_url() . "/assets/style/simple-slider-video.css", false );

            wp_enqueue_style("free-banner", OriginCode_Gallery_Video()->plugin_url() . "/assets/style/head-banner.css", false);
            wp_register_style( 'fontawesome-css', plugins_url( '../../assets/style/css/font-awesome.css', __FILE__ ) );
            wp_enqueue_style( 'fontawesome-css' );
		}
		$edit_pages = array('post.php','post-new.php');
		if ( in_array( $hook, $edit_pages ) ){
			wp_enqueue_style( "origincode_gallery_video_add_shortecode_css", OriginCode_Gallery_Video()->plugin_url() . "/assets/style/shortecode.css", false );
		}
		

	}

	public function admin_scripts( $hook ) {
		$admin_url              = admin_url( "admin-ajax.php" );
		if ( in_array( $hook, OriginCode_Gallery_Video()->admin->pages ) ) {
			wp_enqueue_media();
			wp_enqueue_script( "origincode_gallery_video_admin_js", OriginCode_Gallery_Video()->plugin_url() . "/assets/js/admin.js", false );
			wp_enqueue_script( "jquery-ui-core" );
			wp_enqueue_script( "origincode_gallery_video_simple_slider_js", OriginCode_Gallery_Video()->plugin_url() . '/assets/js/simple-slider.js', false );
			wp_enqueue_script( 'origincode_gallery_video_js_color', OriginCode_Gallery_Video()->plugin_url() . "/assets/js/jscolor.js" );
			wp_localize_script( 'origincode_gallery_video_admin_js', 'ajax_object_admin', $admin_url );
		}
		$edit_pages = array('post.php','post-new.php');
		if ( in_array( $hook, $edit_pages ) ){
			wp_enqueue_script( "origincode_gallery_video_add_shortecode", OriginCode_Gallery_Video()->plugin_url() . "/assets/js/shortecode.js", false );
			wp_localize_script( 'origincode_gallery_video_add_shortecode', 'ajax_object_shortecode', $admin_url );
		}
	}
}
