<?php
/*
	Plugin Name: JNews - Auto Load Next Post
	Plugin URI: http://jegtheme.com/
	Description: Auto load next post when scroll for JNews
	Version: 7.0.3
	Author: Jegtheme
	Author URI: http://jegtheme.com
	License: GPL2
*/

defined( 'JNEWS_AUTOLOAD_POST' ) 		        or define( 'JNEWS_AUTOLOAD_POST', 'jnews-auto-load-post');
defined( 'JNEWS_AUTOLOAD_POST_URL' ) 		    or define( 'JNEWS_AUTOLOAD_POST_URL', plugins_url(JNEWS_AUTOLOAD_POST));
defined( 'JNEWS_AUTOLOAD_POST_FILE' ) 		    or define( 'JNEWS_AUTOLOAD_POST_FILE',  __FILE__ );
defined( 'JNEWS_AUTOLOAD_POST_DIR' ) 		    or define( 'JNEWS_AUTOLOAD_POST_DIR', plugin_dir_path( __FILE__ ) );

/**
 * Get jnews option
 *
 * @param $setting
 * @param $default
 * @return mixed
 */
if(!function_exists('jnews_get_option'))
{
    function jnews_get_option($setting, $default = null)
    {
        $options = get_option( 'jnews_option', array() );
        $value = $default;
        if ( isset( $options[ $setting ] ) ) {
            $value = $options[ $setting ];
        }
        return $value;
    }
}

/**
 * Load script for JNews Autoload
 */
add_action( 'wp_enqueue_scripts', 'jnews_auto_load_assets' );

if ( ! function_exists( 'jnews_auto_load_assets' ) ) {
    function jnews_auto_load_assets() {
        if ( ! is_customize_preview() && is_singular( 'post' ) ) {
            wp_enqueue_script( 'jnews-autoload', JNEWS_AUTOLOAD_POST_URL . '/assets/js/jquery.autoload.js', array( 'jquery' ), null, true );
        }
    }
}

/**
 * Single post load class
 */
add_filter( 'jnews_post_wrap_class' , 'jnews_autoload_post_wrap_class');

if(!function_exists('jnews_autoload_post_wrap_class'))
{
    function jnews_autoload_post_wrap_class($class)
    {
        $class .= ' post-autoload ';
        return $class;
    }
}

/**
 * Single post autoload attribute
 */
add_filter('jnews_post_wrap_attribute', 'jnews_autoload_post_wrap_attribute', null, 2);

if(!function_exists('jnews_autoload_post_wrap_attribute'))
{
    function jnews_autoload_post_wrap_attribute($attribute, $post_id)
    {
        $attribute .= " data-url=\"" . get_permalink($post_id) . "\" data-title=\"" . esc_attr(get_the_title($post_id)) . "\" data-id=\"" . esc_attr(get_the_ID()) . "\" ";

        $content = jnews_get_option('autoload_content', '');

        if($content === 'category') {
            $prev_post = get_previous_post(true, null, 'category');
        } else if($content === 'tag') {
            $prev_post = get_previous_post(true, null, 'post_tag');
        } else {
            $prev_post = get_previous_post();
        }

        if(!empty($prev_post)) {
            $attribute .= " data-prev=\"" . esc_url(get_permalink($prev_post->ID)) . "\" ";
        }

        return $attribute;
    }
}

/**
 * Single post prev next
 */
add_filter('jnews_single_show_prev_next_post', 'jnews_autoload_single_show_prev_next_post');

if(!function_exists('jnews_autoload_single_show_prev_next_post'))
{
    function jnews_autoload_single_show_prev_next_post()
    {
        return false;
    }
}

/**
 * Single popup post
 */
add_filter('jnews_single_show_popup_post', 'jnews_autoload_single_show_popup_post');

if(!function_exists('jnews_autoload_single_show_popup_post'))
{
    function jnews_autoload_single_show_popup_post()
    {
        return false;
    }
}

/**
 * Add Rewrite Endpoint
 */
add_action( 'init', 'jnews_load_next_post_rewrite_endpoint');

if(!function_exists('jnews_load_next_post_rewrite_endpoint'))
{
    function jnews_load_next_post_rewrite_endpoint()
    {
        add_rewrite_endpoint('autoload', EP_PERMALINK);
    }
}

/**
 * Activation hook
 */
if(!function_exists('jnews_autoload_activation_hook'))
{
    register_activation_hook( __FILE__, 'jnews_autoload_activation_hook' );

    function jnews_autoload_activation_hook()
    {
        jnews_load_next_post_rewrite_endpoint();

        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }
}

/**
 * Template Redirect
 */
add_action('template_redirect', 'jnews_auto_load_next_post_template_redirect');

if(!function_exists('jnews_auto_load_next_post_template_redirect'))
{
    function jnews_auto_load_next_post_template_redirect()
    {
        global $wp_query;

        if ( ! isset($wp_query->query_vars['autoload']) || ! is_singular()) {
            return;
        }

        require 'autoload-template.php';
        exit;
    }
}

/**
 * Register customizer option
 */
add_action( 'jeg_register_customizer_option', 'jnews_autoload_customizer_option');

if(!function_exists('jnews_autoload_customizer_option'))
{
    function jnews_autoload_customizer_option()
    {
        require_once 'class.jnews-auto-load-post-option.php';
        JNews_Auto_Load_Post_Option::getInstance();
    }
}


add_filter('jeg_register_lazy_section', 'jnews_autoload_lazy_section');

if(!function_exists('jnews_autoload_lazy_section'))
{
    function jnews_autoload_lazy_section($result)
    {
        $result['jnews_autoload_section'][] = JNEWS_AUTOLOAD_POST_DIR . "autoload-option.php";
        return $result;
    }
}


add_filter( 'jnews_single_post_template', 'jnews_auto_load_single_post_template' );

if(!function_exists('jnews_auto_load_single_post_template'))
{
    function jnews_auto_load_single_post_template()
    {
        return jnews_get_option('autoload_blog_template', '1');
    }
}

add_filter( 'jnews_single_post_layout', 'jnews_auto_load_single_post_layout' );

if(!function_exists('jnews_auto_load_single_post_layout'))
{
    function jnews_auto_load_single_post_layout()
    {
        if(wp_is_mobile()) {
            return 'no-sidebar';
        } else {
            return jnews_get_option('autoload_blog_layout', 'right-sidebar');
        }

    }
}

add_filter( 'jnews_single_post_sidebar', 'jnews_auto_load_single_post_sidebar' );

if(!function_exists('jnews_auto_load_single_post_sidebar'))
{
    function jnews_auto_load_single_post_sidebar()
    {
        return jnews_get_option('autoload_sidebar', 'default-sidebar');
    }
}

add_filter( 'jnews_single_post_second_sidebar', 'jnews_auto_load_single_post_second_sidebar' );

if(!function_exists('jnews_auto_load_single_post_second_sidebar'))
{
	function jnews_auto_load_single_post_second_sidebar()
	{
		return jnews_get_option('autoload_second_sidebar', 'default-sidebar');
	}
}

/**
 * JNews Single Post
 */
add_action('jnews_single_post_after_content', 'jnews_auto_load_single_post_after_content', 45);

if(!function_exists('jnews_auto_load_single_post_after_content'))
{
    function jnews_auto_load_single_post_after_content()
    {
        $post_attr = jnews_autoload_post_wrap_attribute('', get_the_ID());
        echo "<div class='jnews-autoload-splitter' {$post_attr}></div>";
    }
}

/**
 * JNews Remove Comment
 */
add_filter('jnews_single_show_comment', 'jnews_auto_load_remove_comment');

function jnews_auto_load_remove_comment()
{
    if(jnews_get_option('autoload_disable_comment', 'hide') === 'hide')
    {
        return false;
    }

    return true;
}


if ( ! function_exists('jnews_autoload_separator_ads') )
{
    add_action( 'jnews_autoload_separator', 'jnews_autoload_separator_ads');

    function jnews_autoload_separator_ads()
    {
        if ( jnews_get_option('autoload_ads_enable', false) )
        {
            jnews_autoload_render_ads('', true);
        }
    }
}

if ( ! function_exists('jnews_autoload_render_ads') )
{
    function jnews_autoload_render_ads( $addclass = '', $echo = false )
    {
        $type     = jnews_get_option('autoload_ads_type', 'googleads');
        $ads_html = '';

        if ( $type === 'image' )
        {
            $ads_tab    = jnews_get_option('autoload_ads_open_tab', false) ? '_blank' : '_self';
            $ads_link   = jnews_get_option('autoload_ads_link', '');
            $ads_text   = jnews_get_option('autoload_ads_text', '');

	        $ads_images = array(
		        'ads_image'         => jnews_get_option('autoload_ads_image', ''),
		        'ads_image_tablet'  => jnews_get_option('autoload_ads_image_tablet', ''),
		        'ads_image_phone'   => jnews_get_option('autoload_ads_image_phone', '')
	        );

	        foreach ( $ads_images as $key => $ads_image )
	        {
		        if ( ! empty( $ads_image ) )
		        {
			        $ads_html .= 
                        "<div class='{$addclass} {$key}'>
                            <a href='{$ads_link}' target='{$ads_tab}' class='adlink'>
                                <img src='" . apply_filters( 'jnews_empty_image', '' ) . "' class='lazyload' data-src='{$ads_image}' alt='{$ads_text}' data-pin-no-hover=\"true\">
                            </a>
                        </div>";
		        }
	        }
        }

        if ( $type === 'shortcode' )
        {
            $ads_html = "<div class='{$addclass}'>" . do_shortcode( jnews_get_option('autoload_ads_shortcode', '') ) . "</div>";
        }

        if ( $type === 'code' )
        {
            $ads_html = "<div class='{$addclass}'>" . jnews_get_option('autoload_ads_code', '') . "</div>";
        }

        if ( $type === 'googleads' )
        {
            $publisherid = jnews_get_option('autoload_ads_google_publisher', '');
            $slotid      = jnews_get_option('autoload_ads_google_id', '');

	        $publisherid = str_replace(' ', '', $publisherid);
	        $slotid      = str_replace(' ', '', $slotid);

            if ( ! empty($publisherid) && ! empty($slotid) )
            {
                $desktopsize_ad = array('728','90');
                $tabsize_ad     = array('468','60');
                $phonesize_ad   = array('320', '50');

                $desktopsize    = jnews_get_option('autoload_ads_google_desktop', 'auto');
                $tabsize        = jnews_get_option('autoload_ads_google_tab', 'auto');
                $phonesize      = jnews_get_option('autoload_ads_google_phone', 'auto');

                if ( $desktopsize !== 'auto' )
                {
                    $desktopsize_ad = explode('x', $desktopsize);
                }
                if ( $tabsize !== 'auto' )
                {
                    $tabsize_ad = explode('x', $tabsize);
                }
                if ( $phonesize !== 'auto' )
                {
                    $phonesize_ad = explode('x', $phonesize);
                }

                $randomstring = uniqid();
                $ad_style     = '';

                if ( $desktopsize !== 'hide' && is_array($desktopsize_ad) && isset($desktopsize_ad['0']) && isset($desktopsize_ad['1']) )
                {
                    $ad_style .= ".adsslot_{$randomstring}{ width:{$desktopsize_ad[0]}px !important; height:{$desktopsize_ad[1]}px !important; }\n";
                }
                if ( $tabsize !== 'hide' && is_array($tabsize_ad) && isset($tabsize_ad['0']) && isset($tabsize_ad['1']) )
                {
                    $ad_style .= "@media (max-width:1199px) { .adsslot_{$randomstring}{ width:{$tabsize_ad[0]}px !important; height:{$tabsize_ad[1]}px !important; } }\n";
                }
                if ( $phonesize !== 'hide' && is_array($phonesize_ad) && isset($phonesize_ad['0']) && isset($phonesize_ad['1']) )
                {
                    $ad_style .= "@media (max-width:767px) { .adsslot_{$randomstring}{ width:{$phonesize_ad[0]}px !important; height:{$phonesize_ad[1]}px !important; } }\n";
                }

                $ads_html .=
                    "<div class=\"{$addclass}\">
                        <style type='text/css' scoped>
                            {$ad_style}
                        </style>
                        <ins class=\"adsbygoogle adsslot_{$randomstring}\" style=\"display:inline-block;\" data-ad-client=\"{$publisherid}\" data-ad-slot=\"{$slotid}\"></ins>
                        <script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>
                        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
                    </div>";
            }
        }

        $bottom_text = jnews_get_option('autoload_ads_text', false);

        if($bottom_text) {
            $ads_text_html = jnews_return_translation( 'ADVERTISEMENT', 'jnews', 'advertisement' );
            $ads_html = $ads_html . "<div class='ads-text'>{$ads_text_html}</div>";
        }

        $ads_html = "<div class='jeg_ad jeg_autoload_ad'>{$ads_html}</div>";

        if ( $echo )
        {
            echo jnews_sanitize_output( $ads_html );
        } else {
            return $ads_html;
        }
    }
}

/**
 * Load Text Domain
 */
function jnews_auto_load_post_textdomain()
{
    load_plugin_textdomain( JNEWS_AUTOLOAD_POST, false, basename(__DIR__) . '/languages/' );
}

jnews_auto_load_post_textdomain();


if ( ! function_exists( 'jnews_autoload_post_limit' ) ) {

	add_filter( 'jnews_frontend_asset_localize_script', 'jnews_autoload_post_limit' );

	function jnews_autoload_post_limit( $option ) {
		$option['autoload_limit'] = jnews_get_option( 'autoload_limit', 10 );
        $option['autoload_content'] = jnews_get_option('autoload_content', '');
		return $option;
	}
}
