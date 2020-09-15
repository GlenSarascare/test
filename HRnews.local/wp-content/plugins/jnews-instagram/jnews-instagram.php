<?php
/*
	Plugin Name: JNews - Instagram Feed
	Plugin URI: http://jegtheme.com/
	Description: Put your instagram feed on the header and footer of your website
	Version: 7.0.2
	Author: Jegtheme
	Author URI: http://jegtheme.com
	License: GPL2
*/


defined( 'JNEWS_INSTAGRAM' ) 		        or define( 'JNEWS_INSTAGRAM', 'jnews-instagram');
defined( 'JNEWS_INSTAGRAM_URL' ) 		    or define( 'JNEWS_INSTAGRAM_URL', plugins_url(JNEWS_INSTAGRAM));
defined( 'JNEWS_INSTAGRAM_FILE' ) 		    or define( 'JNEWS_INSTAGRAM_FILE',  __FILE__ );
defined( 'JNEWS_INSTAGRAM_DIR' ) 		    or define( 'JNEWS_INSTAGRAM_DIR', plugin_dir_path( __FILE__ ) );

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
 * Instagram Feed Option
 */
add_action( 'jeg_register_customizer_option', 'jnews_instagram_customizer_option');

if(!function_exists('jnews_instagram_customizer_option'))
{
    function jnews_instagram_customizer_option()
    {
        require_once 'class.jnews-instagram-option.php';
        JNews_Instagram_Option::getInstance();
    }
}


add_filter('jeg_register_lazy_section', 'jnews_instagram_lazy_section');

if(!function_exists('jnews_instagram_lazy_section'))
{
    function jnews_instagram_lazy_section($result)
    {
        $result['jnews_instagram_feed_section'][] = JNEWS_INSTAGRAM_DIR . "instagram-option.php";
        return $result;
    }
}

/**
 * Render Instagram Feed - Header
 */
add_action( 'jnews_render_instagram_feed_header', 'jnews_instagram_feed_header' );

if ( ! function_exists('jnews_instagram_feed_header') )
{
    function jnews_instagram_feed_header()
    {
        require_once 'class.jnews-instagram.php';

        $option = jnews_get_option('instagram_feed_enable', 'hide');

        if ( $option === 'only_header' || $option === 'both' )
        {
	        $param = array(
		        'row'         => jnews_get_option('footer_instagram_row', 1),
		        'column'      => jnews_get_option('footer_instagram_column', 8),
		        'username'    => jnews_get_option('footer_instagram_username', ''),
		        'sort'        => jnews_get_option('footer_instagram_sort_type', 'most_recent'),
		        'hover'       => jnews_get_option('footer_instagram_hover_style', 'zoom'),
		        'newtab'      => jnews_get_option('footer_instagram_newtab', null) ? 'target=\'_blank\'' : '',
		        'follow'      => jnews_get_option('footer_instagram_follow_button', null),
                'method'      => jnews_get_option('instagram_feed_method', 'username'),
                'token'       => jnews_get_option('footer_instagram_access_token', null),
	        );

            $instagram = new JNews_Instagram( $param );
            $instagram->generate_element();
        }
    }
}

/**
 * Render Instagram Feed - Footer
 */
add_action( 'jnews_render_instagram_feed_footer', 'jnews_instagram_feed_footer' );

if ( ! function_exists('jnews_instagram_feed_footer') )
{
    function jnews_instagram_feed_footer()
    {
        require_once 'class.jnews-instagram.php';

        $option = jnews_get_option('instagram_feed_enable', 'hide');

        if ( $option === 'only_footer' || $option === 'both' )
        {
            $param = array(
                'row'       => jnews_get_option('footer_instagram_row', 1),
                'column'    => jnews_get_option('footer_instagram_column', 8),
                'username'  => jnews_get_option('footer_instagram_username', ''),
                'sort'      => jnews_get_option('footer_instagram_sort_type', 'most_recent'),
                'hover'     => jnews_get_option('footer_instagram_hover_style', 'zoom'),
                'newtab'    => jnews_get_option('footer_instagram_newtab', null) ? 'target=\'_blank\'' : '',
                'follow'    => jnews_get_option('footer_instagram_follow_button', null),
                'method'    => jnews_get_option('instagram_feed_method', 'username'),
                'token'     => jnews_get_option('footer_instagram_access_token', null),
            );

            $instagram = new JNews_Instagram( $param );
            $instagram->generate_element();
        }
    }
}

/**
 * Load Text Domain
 */
function jnews_instagram_load_textdomain()
{
    load_plugin_textdomain( JNEWS_INSTAGRAM, false, basename(__DIR__) . '/languages/' );
}

jnews_instagram_load_textdomain();

/** Module Element for Footer */

/**
 * New Element
 */
add_filter('jnews_module_list', 'jnews_instagram_module_element');

if ( !function_exists('jnews_instagram_module_element') )
{
    function jnews_instagram_module_element($module)
    {
        array_push($module, array(
            'name'      => 'JNews_Footer_Instagram',
            'type'      => 'footer',
            'widget'    => false
        ));
        return $module;
    }
}


add_filter('jnews_get_option_class_from_shortcode', 'jnews_get_option_class_from_shortcode_instagram', null, 2);

if ( !function_exists('jnews_get_option_class_from_shortcode_instagram') )
{
    function jnews_get_option_class_from_shortcode_instagram($class, $module)
    {
        if($module === 'JNews_Footer_Instagram')
        {
            return 'JNews_Footer_Instagram_Option';
        }

        return $class;
    }
}


add_filter('jnews_get_view_class_from_shortcode', 'jnews_get_view_class_from_shortcode_instagram', null, 2);

if ( !function_exists('jnews_get_view_class_from_shortcode_instagram') )
{
    function jnews_get_view_class_from_shortcode_instagram($class, $module)
    {
        if($module === 'JNews_Footer_Instagram')
        {
            return 'JNews_Footer_Instagram_View';
        }

        return $class;
    }
}

add_filter('jnews_get_shortcode_name_from_option', 'jnews_get_shortcode_name_from_option_instagram', null, 2);

function jnews_get_shortcode_name_from_option_instagram($module, $class)
{
    if($class === 'JNews_Footer_Instagram_Option')
    {
        return 'jnews_footer_instagram';
    }

    return $module;
}


add_action( 'jnews_build_shortcode_jnews_footer_instagram_view', 'jnews_instagram_load_module_view');

if(!function_exists('jnews_instagram_load_module_view'))
{
    function jnews_instagram_load_module_view()
    {
        jnews_instagram_load_module_option();
        require_once 'class.jnews-instagram-module-view.php';
    }
}


add_action( 'jnews_load_all_module_option', 'jnews_instagram_load_module_option' );

if(!function_exists('jnews_instagram_load_module_option'))
{
    function jnews_instagram_load_module_option()
    {
        require_once 'class.jnews-instagram-module-option.php';
    }
}


if ( ! function_exists('jnews_module_elementor_get_option_class_instagram') )
{
	add_filter( 'jnews_module_elementor_get_option_class', 'jnews_module_elementor_get_option_class_instagram' );

	function jnews_module_elementor_get_option_class_instagram( $option_class )
	{
		if ( $option_class === '\JNews\Module\Footer\Footer_Instagram_Option' )
		{
			require_once 'class.jnews-instagram-module-option.php';
			return 'JNews_Footer_Instagram_Option';
		}

		return $option_class;
	}
}


if ( ! function_exists('jnews_module_elementor_get_view_class_instagram') )
{
	add_filter( 'jnews_module_elementor_get_view_class', 'jnews_module_elementor_get_view_class_instagram' );

	function jnews_module_elementor_get_view_class_instagram( $view_class )
	{
		if ( $view_class === '\JNews\Module\Footer\Footer_Instagram_View' )
		{
			require_once 'class.jnews-instagram-module-view.php';
			return 'JNews_Footer_Instagram_View';
		}

		return $view_class;
	}
}
