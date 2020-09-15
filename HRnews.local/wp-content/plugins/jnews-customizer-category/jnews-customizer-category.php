<?php
/*
	Plugin Name: JNews - Detail Category Customizer
	Plugin URI: http://jegtheme.com/
	Description: Customize and overwrite detail layout of every global category on your website
	Version: 7.0.0
	Author: Jegtheme
	Author URI: http://jegtheme.com
	License: GPL2
*/

add_filter( 'jnews_load_detail_customizer_category', 'jnews_load_detail_customizer_category' );

if ( ! function_exists( 'jnews_load_detail_customizer_category' ) ) {
	function jnews_load_detail_customizer_category() {
		return true;
	}
}


add_filter( 'jnews_category_override', 'jnews_customizer_category_override', 10, 2);

if ( ! function_exists( 'jnews_customizer_category_override' ) ) {
	function jnews_customizer_category_override( $value, $term ) {
		if ( get_theme_mod( 'jnews_category_override_' . $term, false ) ) {
			return true;
		}

		return $value;
	}
}


add_filter( 'theme_mod_jnews_category_custom_template_id', 'jnews_load_detail_custom_template' );

if ( ! function_exists( 'jnews_load_detail_custom_template' ) ) {

	function jnews_load_detail_custom_template( $template ) {

		if ( is_category() ) {

			$term = get_queried_object_id();

			if ( $term && get_theme_mod( 'jnews_category_override_' . $term, false ) && get_theme_mod( 'jnews_category_page_layout_' . $term, 'right-sidebar' ) === 'custom-template' ) {

				$template_id = get_theme_mod( 'jnews_category_custom_template_id_' . $term, '' );

				if ( $template_id ) {
					$template = $template_id;
				}
			}
		}

		return $template;
	}

}


add_filter( 'theme_mod_jnews_category_custom_template_number_post', 'jnews_load_detail_custom_template_number_post' );

if ( ! function_exists( 'jnews_load_detail_custom_template_number_post' ) ) {

	function jnews_load_detail_custom_template_number_post( $number ) {

		if ( is_category() ) {

			$term = get_queried_object_id();

			if ( $term && get_theme_mod( 'jnews_category_override_' . $term, false ) && get_theme_mod( 'jnews_category_page_layout_' . $term, 'right-sidebar' ) === 'custom-template' ) {

				$template_id = get_theme_mod( 'jnews_category_custom_template_number_post_' . $term, '' );

				if ( $template_id ) {
					$number = $template_id;
				}
			}
		}

		return $number;
	}

}


add_filter( 'theme_mod_jnews_category_page_layout', 'jnews_override_category_page_layout' );

if ( ! function_exists( 'jnews_override_category_page_layout' ) ) {

	function jnews_override_category_page_layout( $layout ) {

		if ( is_category() ) {

			$term = get_queried_object_id();

			if ( $term && get_theme_mod( 'jnews_category_override_' . $term, false ) ) {

				$layout = get_theme_mod( 'jnews_category_page_layout_' . $term, '' );
			}
		}

		return $layout;
	}
}
