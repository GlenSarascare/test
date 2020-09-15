<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Plugin Name: RSS Feed Widget	
Plugin URI: http://androidbubble.com/blog/wordpress/widgets/rss-feed-widget	
Description: RSS Feed Widget with highly customizable slider. Feed title, description, image, cache and many other things which you can control.	
Version: 2.8.2
Author: Fahad Mahmood 	
Author URI: http://www.androidbubbles.com	
Text Domain: rss-feed-widget
Domain Path: /languages/
License: GPL2

This WordPress Plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
This free software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this software. If not, see http://www.gnu.org/licenses/gpl-2.0.html.
*/ 


        
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	global $rfw_data, $rfw_all_plugins, $rfw_activated_plugins, $rfw_chameleon_installed, $rfw_chameleon_activated;
	global $rfw_premium_link, $rfw_pro, $rfw_pro_file;
	
	$rfw_premium_link = 'http://shop.androidbubbles.com/product/rss-feed-widget-pro/';
	$rfw_dir = plugin_dir_path( __FILE__ );
	
	$rfw_pro_file = $rfw_dir.'/pro/rss_extended.php';
	//pree($rfw_pro_file);
	$rfw_pro = file_exists($rfw_pro_file);
    $rfw_data = get_plugin_data(__FILE__);    
	$rfw_all_plugins = get_plugins();
	$rfw_activated_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ));

	$rfw_chameleon_installed = (array_key_exists('chameleon/index.php', $rfw_all_plugins)); 
	$rfw_chameleon_activated = (in_array('chameleon/index.php', $rfw_activated_plugins)); 
	
	include('functions.php');
    
	

    function register_rfw_scripts() {
        global $rfw_chameleon_installed, $rfw_chameleon_activated;
		$rfw_dock = new rfw_dock;
		$settings = get_option('widget_rfw_dock');


		
		wp_enqueue_script(
			'rfw-script',
			plugins_url('js/functions.js', __FILE__),
			array( 'jquery' ),
			date('Ymhi'),
			true
		);
		
		wp_localize_script( 'rfw-script', 'rfw',
		array( 'speed' => '' ) );
		
	
		
		wp_enqueue_script(
			'rfw-script-fitvid',
			plugins_url('js/jquery.fitvids.js', __FILE__),
			array( 'jquery' ),
			date('Ymhi'),
			true
		);		
		

		
		
		wp_enqueue_style( 'rfw-style',  plugins_url('css/style.css', (__FILE__)), array(), date('Ymhi'));

		
		if($rfw_chameleon_installed && $rfw_chameleon_activated && get_option('rfw_style', '')!=''){			
			global $wpc_assets_loaded, $wpc_dir, $wpc_url;
			$rfw_style = get_option('rfw_style', '');
			$css_file = str_replace($wpc_dir, $wpc_url, $wpc_assets_loaded['rfw'][$rfw_style]['styles'][$rfw_style]);
			wp_enqueue_style( 'rfw-'.$rfw_style.'-style',  $css_file, array(), date('Yha'));
		}
		
	}
	
	function admin_rfw_scripts(){
		
		wp_enqueue_style( 'rfw-admin-style',  plugins_url('css/admin-styles.css', __FILE__), array(), date('Ymhi'));
		
		wp_enqueue_script(
			'rfw-admin-scripts',
			plugins_url('js/admin-scripts.js', __FILE__),
			array( 'jquery' )
		);	
		
		
		
		$translation_array = array(
			'this_url' => admin_url( 'admin.php?page=rfw_options' ),
			'rfw_tab' => (isset($_GET['t'])?esc_attr($_GET['t']):'0'),
		);
		
		
		
		wp_localize_script( 'rfw-admin-scripts', 'rfw_obj', $translation_array );		
	}

        
	add_action( 'wp_enqueue_scripts', 'register_rfw_scripts' );
	add_action( 'admin_enqueue_scripts', 'admin_rfw_scripts' );
	add_action( 'widgets_init', 'rfw_init');
	
	if(is_admin()){
		add_action('admin_menu', 'rfw_settings');
		add_action('admin_init', 'register_rfwsettings');
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'rfw_plugin_links' );	
	}else{
		add_filter('the_excerpt_rss', 'rfw_featuredtoRSS');
		add_filter('the_content_feed', 'rfw_featuredtoRSS');			
	}
	