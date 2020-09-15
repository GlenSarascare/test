<?php
/*
	Plugin Name: JNews - Essential
	Plugin URI: http://jegtheme.com/
	Description: Advertisement, Shortcode & Widget for JNews
	Version: 7.0.5
	Author: Jegtheme
	Author URI: http://jegtheme.com
	License: GPL2
*/


defined( 'JNEWS_ESSENTIAL' ) or define( 'JNEWS_ESSENTIAL', 'jnews-essential' );
defined( 'JNEWS_ESSENTIAL_VERSION' )  or define( 'JNEWS_ESSENTIAL_VERSION', '7.0.5' );
defined( 'JNEWS_ESSENTIAL_URL' ) or define( 'JNEWS_ESSENTIAL_URL', plugins_url( JNEWS_ESSENTIAL ) );
defined( 'JNEWS_ESSENTIAL_FILE' ) or define( 'JNEWS_ESSENTIAL_FILE', __FILE__ );
defined( 'JNEWS_ESSENTIAL_DIR' ) or define( 'JNEWS_ESSENTIAL_DIR', plugin_dir_path( __FILE__ ) );
defined( 'JEG_THEME_URL' ) or define( 'JEG_THEME_URL', JNEWS_ESSENTIAL_URL );

// Vafpress
require_once 'lib/vp/bootstrap.php';

// Twitter
require_once 'lib/twitter/autoload.php';

// Jeg Framework
require_once 'lib/jeg-framework/bootstrap.php';

add_filter( 'jnews_load_advertisement_option', 'jnews_load_advertisement_option' );

if ( ! function_exists( 'jnews_load_advertisement_option' ) ) {
	function jnews_load_advertisement_option() {
		return true;
	}
}

add_filter( 'jnews_load_shortcode_detail', 'jnews_load_shortcode_detail' );

if ( ! function_exists( 'jnews_load_shortcode_detail' ) ) {
	function jnews_load_shortcode_detail() {
		return true;
	}
}

add_filter( 'jnews_load_all_widget', 'jnews_load_all_widget' );

if ( ! function_exists( 'jnews_load_all_widget' ) ) {
	function jnews_load_all_widget() {
		return true;
	}
}

add_filter( 'jnews_load_default_metabox', 'jnews_load_default_metabox' );

if ( ! function_exists( 'jnews_load_default_metabox' ) ) {
	function jnews_load_default_metabox() {
		return true;
	}
}

add_filter( 'jnews_load_post_subtitle', 'jnews_load_post_subtitle' );

if ( ! function_exists( 'jnews_load_post_subtitle' ) ) {
	function jnews_load_post_subtitle() {
		return true;
	}
}

add_filter( 'jnews_load_mega_menu_option', 'jnews_load_mega_menu_option' );

if ( ! function_exists( 'jnews_load_mega_menu_option' ) ) {
	function jnews_load_mega_menu_option() {
		return true;
	}
}

add_filter( 'jnews_send_message', 'jnews_send_message', null, 4 );

if ( ! function_exists( 'jnews_send_message' ) ) {
	function jnews_send_message( $result, $email, $title, $message ) {
		return wp_mail( $email, $title, $message );
	}
}

add_action( 'jnews_render_element', 'jnews_render_shortcode', null, 2 );

if ( ! function_exists( 'jnews_render_shortcode' ) ) {
	function jnews_render_shortcode( $tag, $func ) {
		add_shortcode( $tag, $func );
	}
}


add_action( 'jnews_admin_dashboard_parent', 'jnews_add_dashboard_menu' );

if ( ! function_exists( 'jnews_add_dashboard_menu' ) ) {
	function jnews_add_dashboard_menu( $parameter ) {
		call_user_func_array( 'add_menu_page', $parameter );
	}
}

add_action( 'jnews_admin_dashboard_child', 'jnews_add_dashboard_submenu' );

if ( ! function_exists( 'jnews_add_dashboard_submenu' ) ) {
	function jnews_add_dashboard_submenu( $parameter ) {
		call_user_func_array( 'add_submenu_page', $parameter );
	}
}

add_action( 'jnews_vc_element_parame', 'jnews_vc_element_parame' );

if ( ! function_exists( 'jnews_vc_element_parame' ) ) {
	function jnews_vc_element_parame( $parameter ) {
		call_user_func_array( 'vc_add_shortcode_param', $parameter );
	}
}


add_filter( 'jnews_translate_polylang', 'jnews_translate_polylang', null, 2 );

if ( ! function_exists( 'jnews_translate_polylang' ) ) {
	function jnews_translate_polylang( $text ) {
		if ( defined( 'POLYLANG_VERSION' ) && defined( 'PLL_INC' ) ) {
			if ( ! function_exists( 'pll__' ) ) {
				require_once PLL_INC . '/api.php';
			}

			return pll__( $text );
		}

		return $text;
	}
}

add_filter( 'jnews_force_disable_related_post', 'jnews_force_disable_related_post' );

if ( ! function_exists( 'jnews_force_disable_related_post' ) ) {
	function jnews_force_disable_related_post() {
		return false;
	}
}


/** Additional social account */
add_filter( 'user_contactmethods', 'jnews_account_social_contact', null );

function jnews_account_social_contact( $socials ) {
	$additional = jnews_additional_account_social_contact();

	return array_merge( $socials, $additional );
}

/** Additional social account coauthor field */
add_filter( 'coauthors_guest_author_fields', 'jnews_coauthor_account_social_contact', 10, 2 );

function jnews_coauthor_account_social_contact( $field, $groups ) {
	if ( in_array( $groups[0], [ 'all', 'contact-info' ] ) ) {
		$additional       = jnews_additional_account_social_contact();
		$fields_to_return = $global_fields = array();
		foreach ( $additional as $key => $label ) {
			$fields_to_return[] = array(
				'key'      => $key,
				'label'    => $label,
				'group'    => 'contact-info',
			);
		}
		$field = array_merge( $field, $fields_to_return );
	}
	return $field;
}

function jnews_additional_account_social_contact() {
	return array(
		'facebook'   => 'Facebook',
		'twitter'    => 'Twitter',
		'linkedin'   => 'Linkedin',
		'pinterest'  => 'Pinterest',
		'behance'    => 'Behance',
		'github'     => 'Github',
		'flickr'     => 'Flickr',
		'tumblr'     => 'Tumblr',
		'dribbble'   => 'Dribbble',
		'soundcloud' => 'Soundcloud',
		'instagram'  => 'Instagram',
		'vimeo'      => 'Vimeo',
		'youtube'    => 'Youtube',
		'reddit'     => 'Reddit',
		'vk'         => 'Vk',
		'weibo'      => 'Weibo',
		'rss'        => 'Rss',
	);
}


// Need to remove admin dashboard
add_action(
	'admin_menu',
	function () {
		remove_action( 'jnews_admin_dashboard_child', 'jnews_theme_admin_dashboard_child' );
	}
);

/**
 * Activation hook
 */
if ( ! function_exists( 'jnews_essential_activation_hook' ) ) {
	register_activation_hook( __FILE__, 'jnews_essential_activation_hook' );

	function jnews_essential_activation_hook() {
		global $wp_rewrite;
		$wp_rewrite->flush_rules();
	}
}

/**
 * Check is plugin active
 */
if ( ! function_exists( 'jeg_plugin_active' ) ) {
	function jeg_plugin_active( $class, $slug ) {
		return $class->is_plugin_active( $slug );
	}
}

/**
 * Register post type
 */
if ( ! function_exists( 'jeg_register_post_type' ) ) {
	function jeg_register_post_type( $slug, $args ) {
		register_post_type( $slug, $args );
	}
}

/**
 * Register menu on the admin bar
 */
if ( ! function_exists( 'jeg_admin_topbar_menu' ) ) {
	function jeg_admin_topbar_menu( $class, $priority ) {
		add_action( 'admin_bar_menu', $class, $priority );
	}
}

/**
 * Check is email
 */
if ( ! function_exists( 'jeg_is_emails' ) ) {
	function jeg_is_emails( $value ) {
		return is_email( $value );
	}
}

/**
 * Register widget
 */
if ( ! function_exists( 'jeg_register_widget_module' ) ) {
	function jeg_register_widget_module( $args ) {
		register_widget( $args );
	}
}

/**
 * Remove filter
 */
if ( ! function_exists( 'jeg_remove_filters' ) ) {
	function jeg_remove_filters( $tag, $function_to_remove, $priority = 10 ) {
		remove_filter( $tag, $function_to_remove, $priority );
	}
}

/**
 * Get Server Info
 */
if ( ! function_exists( 'jeg_server_info' ) ) {
	function jeg_server_info() {
		return $_SERVER['SERVER_SOFTWARE'];
	}
}

/**
 * Deregister script
 */
if ( ! function_exists( 'jeg_deregister_script' ) ) {
	function jeg_deregister_script( $value ) {
		wp_deregister_script( $value );
	}
}

/**
 * General header social
 */
if ( ! function_exists( 'jeg_header_social' ) ) {

	add_action( 'jnews_header_social', 'jeg_header_social' );

	function jeg_header_social() {
		if ( function_exists( 'jnews_generate_social_icon_block' ) ) {
			?>
			<div
				class="jeg_nav_item socials_widget jeg_social_icon_block <?php echo esc_attr( get_theme_mod( 'jnews_header_social_icon', 'nobg' ) ); ?>">
				<?php jnews_generate_social_icon_block(); ?>
			</div>
			<?php
		}
	}
}

/**
 * General footer social
 */
if ( ! function_exists( 'jeg_footer_social' ) ) {

	add_action( 'jnews_footer_social', 'jeg_footer_social' );

	function jeg_footer_social( $position = 'hide' ) {
		if ( get_theme_mod( 'jnews_footer_social_position', 'hide' ) === $position && function_exists( 'jnews_generate_social_icon_block' ) ) {
			?>
			<div class="jeg_social_icon_block socials_widget nobg">
				<?php jnews_generate_social_icon_block(); ?>
			</div>
			<?php
		}
	}
}

/**
 * Footer 5 social
 */
if ( ! function_exists( 'jeg_footer_5_social' ) ) {

	add_action( 'jnews_footer_5_social', 'jeg_footer_5_social' );

	function jeg_footer_5_social() {
		if ( function_exists( 'jnews_generate_social_icon_block' ) ) {
			?>
			<div class="jeg_footer_social">
				<div class="socials_widget jeg_new_social_icon_block circle">
					<?php jnews_generate_social_icon_block( true, true ); ?>
				</div>
			</div>
			<?php
		}
	}
}

/**
 * Footer 7 social
 */
if ( ! function_exists( 'jeg_footer_7_social' ) ) {

	add_action( 'jnews_footer_7_social', 'jeg_footer_7_social' );

	function jeg_footer_7_social() {
		if ( function_exists( 'jnews_generate_social_icon_block' ) ) {
			?>
			<div class="socials_widget nobg">
				<?php jnews_generate_social_icon_block(); ?>
			</div>
			<?php
		}
	}
}

/**
 * Cookies checker
 */
if ( ! function_exists( 'jeg_check_cookies_path' ) ) {

	function jeg_check_cookies_path( $option ) {

		$option['site_slug']   = '/';
		$option['site_domain'] = $_SERVER['SERVER_NAME'];

		if ( ! is_main_site() ) {
			$path                = explode( '/', $_SERVER['REQUEST_URI'] );
			$option['site_slug'] = '/' . $path[1] . '/';
		}

		return $option;
	}
}

/**
 * Google Analytics
 */
if ( ! function_exists( 'jnews_insert_google_analytics' ) ) {
	add_action( 'wp_footer', 'jnews_insert_google_analytics' );

	function jnews_insert_google_analytics() {
		$tracking_code = get_theme_mod( 'jnews_google_analytics_code', '' );
		if ( trim( $tracking_code ) !== '' ) {
			if ( get_theme_mod( 'jnews_google_analytics_local', false ) ) {
				wp_enqueue_script( 'jnews-analytics', JNEWS_ESSENTIAL_URL . '/assets/js/analytics.js', null, null );
				?>
				<script>
					window.ga = window.ga || function () {(ga.q = ga.q || []).push(arguments);};
					ga.l = +new Date;
	              	ga('create', '<?php echo esc_html( $tracking_code ); ?>', 'auto')
	              	ga('send', 'pageview')
				</script>
				<?php
			} else {
				?>
				<script>
	              (function (i, s, o, g, r, a, m) {
	                i['GoogleAnalyticsObject'] = r
	                i[r] = i[r] || function () {
	                  (i[r].q = i[r].q || []).push(arguments)
	                }, i[r].l = 1 * new Date()
	                a = s.createElement(o),
	                  m = s.getElementsByTagName(o)[0]
	                a.async = 1
	                a.src = g
	                m.parentNode.insertBefore(a, m)
	              })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga')

	              ga('create', '<?php echo esc_html( $tracking_code ); ?>', 'auto')
	              ga('send', 'pageview')
				</script>
				<?php
			}
		}
	}
}