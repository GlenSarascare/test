<?php
/**
 * CheerUp Theme!
 * 
 * This is the typical theme initialization file. Sets up the Bunyad Framework
 * and the theme functionality.
 * 
 * ----
 * 
 * Code Locations:
 * 
 *  /          -  WordPress default template files.
 *  lib/       -  Contains the Bunyad Framework files.
 *  inc/       -  Theme related functionality and some HTML helpers.
 *  admin/     -  Admin-only content.
 *  partials/  -  Template parts (partials) called via get_template_part().
 *  
 * Note: If you're looking to edit HTML, look for default WordPress templates in
 * top-level / and in partials/ folder.
 * 
 * Main Theme file:  inc/theme.php 
 */

// Already initialized?
if (class_exists('Bunyad_Core')) {
	return;
}

// Require PHP 5.6+
if (version_compare(phpversion(), '5.6.0', '<')) {

	function cheerup_php_notice() {
		$message = sprintf(esc_html_x('CheerUp requires %1$sPHP 5.6+%2$s same as requirement of latest WordPress. Please ask your webhost to upgrade to at least PHP 5.6. Recommended: %1$sPHP 7+%2$s%3$s', 'Admin', 'cheerup'), '<strong>', '</strong>', '<br>');
		printf('<div class="notice notice-error"><h3>Important:</h3><p>%1$s</p></div>', wp_kses_post($message));
	}

	add_action('admin_notices', 'cheerup_php_notice');	
	return;
}

// Initialize Framework
require_once get_theme_file_path('lib/bunyad.php');
require_once get_theme_file_path('inc/bunyad.php');

/**
 * Main Theme File: Contains most theme-related functionality
 * 
 * See file:  inc/theme.php
 */
require_once get_theme_file_path('inc/theme.php');

// Fire up the theme - make available in Bunyad::get('theme')
Bunyad::register('theme', array(
	'class' => 'Bunyad_Theme_Cheerup',
	'init' => true
));

// Legacy compat: Alias
Bunyad::register('cheerup', array('object' => Bunyad::get('theme')));

/**
 * Main Framework Configuration
 * 
 * Note: Keep PHP 5.2 syntax in this file.
 */
$bunyad_core = Bunyad::core()->init(apply_filters('bunyad_init_config', array(

	'theme_name'    => 'cheerup',
	'meta_prefix'   => '_bunyad',    // Keep meta framework prefix for data interoperability 
	'theme_version' => '7.3.1',

	// Sphere plugin components.
	'sphere_components' => array(
		'social-share', 'likes', 'social-follow', 'breadcrumbs',
	),

	'post_formats' => array('gallery', 'image', 'video', 'audio'),
	'customizer'   => true,
)));
