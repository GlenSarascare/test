<?php
/**
 * Plugin configurations
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$GLOBALS['origincode_gallery_video_aliases'] = array(
	'OriginCode_Gallery_Video_Install'          => 'includes/view/class-install-data',
	'OriginCode_Gallery_Video_Template_Loader'  => 'includes/view/template-loader',
	'OriginCode_Gallery_Video_Ajax'             => 'includes/view/class-ajax-call',
	'OriginCode_Gallery_Video_Widgets'          => 'includes/view/widgets',
	'OriginCode_Gallery_Video_Widget'           => 'includes/view/class-widget',
	'OriginCode_Gallery_Video_Shortcode'        => 'includes/view/class-shortcode',
	'OriginCode_Gallery_Video_Frontend_Scripts' => 'includes/view/call-frontend-scripts',
	'OriginCode_Gallery_Video_Admin'            => 'includes/admin/admin-page',
	'OriginCode_Gallery_Video_Admin_Assets'     => 'includes/admin/call-admin-assets',
	'OriginCode_Gallery_Video_General_Options'  => 'includes/admin/general-settings',
	'OriginCode_Gallery_Video_Galleries'        => 'includes/admin/video-galleries-page',
	'OriginCode_Gallery_Video_Lightbox_Options' => 'includes/admin/lightbox-settings',
);

/**
 * @param $classname
 *
 * @throws Exception
 */
function origincode_gallery_video_aliases( $classname ) {
	global $origincode_gallery_video_aliases;

	/**
	 * We do not touch classes that are not related to us
	 */
	if ( ! strstr( $classname, 'OriginCode_Gallery_Video_' ) ) {
		return;
	}

	if ( ! key_exists( $classname, $origincode_gallery_video_aliases ) ) {
		throw new Exception( 'trying to load "' . $classname . '" class that is not registered in config file.' );
	}

	$path = OriginCode_Gallery_Video()->plugin_path() . '/' . $origincode_gallery_video_aliases[ $classname ] . '.php';

	if ( ! file_exists( $path ) ) {

		throw new Exception( 'the given path for class "' . $classname . '" is wrong, trying to load from ' . $path );

	}

	require_once $path;

	if ( ! interface_exists( $classname ) && ! class_exists( $classname ) ) {

		throw new Exception( 'The class "' . $classname . '" is not declared in "' . $path . '" file.' );

	}
}

spl_autoload_register( 'origincode_gallery_video_aliases' );