<?php
/* 
Plugin Name: Featured Image In Rss Feed
Plugin URI: http://dineshkarki.com.np/featured-image-in-rss-feed
Description: Add Feature Image to your RSS Feed.
Author: Dinesh Karki
Version: 2.2
Author URI: https://www.dineshkarki.com.np
*/

/*  Copyright 2012  Dinesh Karki  (email : dnesskarki@gmail.com) */

function featuredtoRSS($content) {
	$fir_rss_image_size 			= get_option('fir_rss_image_size');
	global $post;
	if ( has_post_thumbnail( $post->ID ) ){
		$content = '' . get_the_post_thumbnail( $post->ID, $fir_rss_image_size, array( 'style' => 'float:left; margin:0 15px 15px 0;' ) ) . '' . $content;
	}
	return $content;
}

$fir_license_key_status		= get_option('fir_license_key_status');
if (($fir_license_key_status != 'trial_expired') && ($fir_license_key_status != 'expired')){
	add_filter('the_excerpt_rss', 'featuredtoRSS');
	add_filter('the_content_feed', 'featuredtoRSS');
}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'fir_plugin_action_links' );
function fir_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=featured-image-in-rss-feed/plugin_interface.php') ) .'">Settings</a>';
   return $links;
}

include('plugin_interface.php');
?>