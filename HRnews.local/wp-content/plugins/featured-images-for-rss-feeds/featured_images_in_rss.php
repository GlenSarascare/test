<?php

/**
 * Plugin Name: Featured Images in RSS for Mailchimp & Other Email
 * Plugin URI:  http://wordpress.org/plugins/featured-images-for-rss-feeds/
 * Description: Outputs images in your RSS feed to Mailchimp, Infusionsoft, Hubspot, and other services that use RSS feed data for content marketing.
 * Author:      5 Star Plugins
 * Version:     1.5.6
 * Author URI:  https://5starplugins.com/
 * Text Domain: featured-images-for-rss-feeds
 *
 */
define( 'FIRSS_VERSION', '1.5.6' );
define( 'FIRSS_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
// __Freemius
/**
 * Create a helper function for easy SDK access.
 *
 * @since 1.4
 */
if ( !function_exists( 'fifrf_fs' ) ) {
    function fifrf_fs()
    {
        global  $fifrf_fs ;
        
        if ( !isset( $fifrf_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/includes/freemius/start.php';
            $fifrf_fs = fs_dynamic_init( array(
                'id'             => '195',
                'slug'           => 'featured-images-for-rss-feeds',
                'public_key'     => 'pk_9ea1864d86f1a7f3c11a487405043',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug' => 'featured-images-for-rss-feeds',
            ),
                'trial'          => array(
                'days'               => 14,
                'is_require_payment' => false,
            ),
                'is_premium'     => false,
                'is_live'        => true,
            ) );
        }
        
        return $fifrf_fs;
    }

}
// Init Freemius.
fifrf_fs();
fifrf_fs()->add_filter(
    'connect_message_on_update',
    'firss_freemius_update_message',
    10,
    6
);
fifrf_fs()->add_filter(
    'connect_message',
    'firss_freemius_new_message',
    10,
    6
);
// __End Freemius.
add_action( 'plugins_loaded', 'firss_init' );
add_action( 'admin_footer', 'firss_styles' );
/**
 * Init plugin.
 *
 * @since 1.4
 */
/* Start wrap of if (!function_exists(firss_init)) */

if ( !function_exists( 'firss_init' ) ) {
    function firss_init()
    {
        // Add Menus.
        add_action( 'admin_menu', 'firss_create_parent_menu', 10 );
        add_action( 'admin_init', 'firss_register_firss_settings' );
        add_action( 'admin_print_footer_scripts', 'firss_inline_scripts', 99 );
        // Plugin related.
        add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'firss_add_plugin_action_links' );
        add_filter(
            'plugin_row_meta',
            'firss_plugin_meta_links',
            10,
            2
        );
        // Main hooks.
        add_filter(
            'the_excerpt_rss',
            'firss_featured_images_in_rss',
            1000,
            1
        );
        add_filter(
            'the_content_feed',
            'firss_featured_images_in_rss',
            1000,
            1
        );
        add_filter(
            'post_thumbnail_html',
            'firss_filter_post_thumbnail_html',
            10,
            5
        );
        add_action( 'firss_settings_form_actions', 'firss_call_to_action' );
        add_action( 'firss_settings_after_form', 'firss_inform_premium' );
        firss_load_plugin_textdomain();
    }
    
    /**
     * Load Localization files.
     *
     * Note: the first-loaded translation file overrides any following ones if the same translation is present.
     *
     * Locales are found in:
     * - WP_LANG_DIR/plugins/featured-images-in-rss-LOCALE.mo
     *
     * Example:
     * - WP_LANG_DIR/plugins/featured-images-in-rss-pt_PT.mo
     */
    function firss_load_plugin_textdomain()
    {
        $locale = apply_filters( 'plugin_locale', get_locale(), 'featured-images-for-rss-feeds' );
        load_textdomain( 'featured-images-for-rss-feeds', WP_LANG_DIR . '/plugins/featured-images-in-rss-' . $locale . '.mo' );
        load_plugin_textdomain( 'featured-images-for-rss-feeds', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }
    
    /**
     * Inline helper scripts.
     *
     * @since 1.4
     */
    function firss_inline_scripts()
    {
        ob_start();
        ?>
    <script type='text/javascript'>
        jQuery(document).ready(function($) {
            // Open support forum page in new tab.
            $('a[href="admin.php?page=featured-images-for-rss-feeds-wp-support-forum"]').attr('target','_blank');
        });
    </script>
<?php 
        echo  ob_get_clean() ;
    }
    
    /**
     * Creates the parent menu.
     *
     * @since 1.4
     */
    function firss_create_parent_menu()
    {
        add_menu_page(
            'Featured Images In RSS Feeds',
            'Featured Images In RSS Feeds',
            'manage_options',
            'featured-images-for-rss-feeds',
            'firss_settings_page',
            'dashicons-images-alt'
        );
    }
    
    /**
     * Register settings page.
     */
    function firss_register_firss_settings()
    {
        $group = 'firss-settings-group';
        register_setting( $group, 'featured_images_in_rss_size' );
        register_setting( $group, 'featured_images_in_rss_css' );
        register_setting( $group, 'featured_images_in_rss_padding' );
        register_setting( $group, 'featured_images_in_rss_clickable_link' );
        do_action( 'firss_register_settings', $group );
    }
    
    /**
     * Setup the settings page.
     */
    function firss_settings_page()
    {
        firss_settings_init();
        $featured_images_in_rss_size = get_option( 'featured_images_in_rss_size' );
        $featured_images_in_rss_css = get_option( 'featured_images_in_rss_css' );
        $featured_images_in_rss_padding = get_option( 'featured_images_in_rss_padding', 5 );
        $featured_images_in_rss_thumb_size_w = get_option( 'featured_images_in_rss_thumb_size_w' );
        $featured_images_in_rss_thumb_size_h = get_option( 'featured_images_in_rss_thumb_size_h' );
        $featured_images_in_rss_clickable_link = (bool) get_option( 'featured_images_in_rss_clickable_link' );
        ?>
    <div class="wrap">
        <h2></h2>
        <div class="headerDiv" >
            <a href="https://5starplugins.com/" target="_blank"><img class="headerImg" src="<?php 
        echo  plugins_url( 'includes/images/banner.jpg', __FILE__ ) ;
        ?>" width="940"></a>
        </div>
        <h1 class="header-title">Featured Images in RSS for Mailchimp and Other Email</h1>

        <form method="post" action="options.php" class="firss-settings-form">

            <?php 
        settings_fields( 'firss-settings-group' );
        ?>

            <table class="form-table firss-settings">

                <?php 
        do_action( 'firss_settings_before' );
        ?>

                <tr valign="top">
                    <th scope="column"><?php 
        echo  __( 'Set the size of feed images', 'featured-images-for-rss-feeds' ) ;
        ?></th>
                    <td>
                        <?php 
        $image_sizes = apply_filters( 'firss_image_sizes', get_intermediate_image_sizes() );
        ?>
                        <select name="featured_images_in_rss_size">
                            <?php 
        foreach ( $image_sizes as $size_name ) {
            ?>
                                <option value="<?php 
            echo  esc_attr( $size_name ) ;
            ?>" <?php 
            selected( $featured_images_in_rss_size === $size_name );
            ?>><?php 
            echo  $size_name ;
            ?></option>
                            <?php 
        }
        ?>
                                <option value="full" <?php 
        selected( $featured_images_in_rss_size === 'full' );
        ?>>full</option>
                        </select>

                        <br><span class="custom-sizes" style="display: none;">
                            <label for="featured_images_in_rss_thumb_size_w"><?php 
        echo  __( 'Width', 'featured-images-for-rss-feeds' ) ;
        ?></label>
                            <input name="featured_images_in_rss_thumb_size_w" type="number" step="1" min="0" id="featured_images_in_rss_thumb_size_w" value="<?php 
        echo  esc_attr( $featured_images_in_rss_thumb_size_w ) ;
        ?>" class="small-text">
                            <label for="featured_images_in_rss_thumb_size_h"><?php 
        echo  __( 'Height', 'featured-images-for-rss-feeds' ) ;
        ?></label>
                            <input name="featured_images_in_rss_thumb_size_h" type="number" step="1" min="0" id="featured_images_in_rss_thumb_size_h" value="<?php 
        echo  esc_attr( $featured_images_in_rss_thumb_size_h ) ;
        ?>" class="small-text"> px
                        </span>

                        <p>
                            <small><?php 
        echo  sprintf( __( '(You can customize global image pixel sizes in the <a href="%1$s">Media Options</a>... then you\'ll need to <a href="%2$s" target=_blank>Regenerate Thumbnails</a>.)', 'featured-images-for-rss-feeds' ), '/wp-admin/options-media.php', 'http://wordpress.org/plugins/regenerate-thumbnails/' ) ;
        ?>
                            </small>
                        </p>
                    </td>
                </tr>
                <tr>
                    <th scope="column"><?php 
        echo  __( 'Set alignment of feed images', 'featured-images-for-rss-feeds' ) ;
        ?></th>
                    <td>
                        <select name="featured_images_in_rss_css">
                           <option value="left-above" <?php 
        selected( $featured_images_in_rss_css === 'left-above' );
        ?>><?php 
        echo  __( 'Image Left Above Text', 'featured-images-for-rss-feeds' ) ;
        ?></option>
                           <option value="centered-above" <?php 
        selected( $featured_images_in_rss_css === 'centered-above' );
        ?>><?php 
        echo  __( 'Image Centered Above Text', 'featured-images-for-rss-feeds' ) ;
        ?></option>
                           <option value="left-wrap" <?php 
        selected( $featured_images_in_rss_css === 'left-wrap' );
        ?>><?php 
        echo  __( 'Image Left Text Wraps', 'featured-images-for-rss-feeds' ) ;
        ?></option>
                           <option value="right-wrap" <?php 
        selected( $featured_images_in_rss_css === 'right-wrap' );
        ?>><?php 
        echo  __( 'Image Right Text Wraps', 'featured-images-for-rss-feeds' ) ;
        ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="column"><?php 
        echo  __( 'Set the spacing between text and feed images', 'featured-images-for-rss-feeds' ) ;
        ?></th>
                    <td>
                        <input name="featured_images_in_rss_padding" value="<?php 
        esc_attr_e( $featured_images_in_rss_padding );
        ?>" class="small-text"> px
                    </td>
                </tr>
                <tr>
                    <th scope="column"><?php 
        echo  __( 'Enable clickable images', 'featured-images-for-rss-feeds' ) ;
        ?></th>
                    <td>
                        <input type="checkbox" name="featured_images_in_rss_clickable_link" <?php 
        checked( $featured_images_in_rss_clickable_link );
        ?> >
                        <?php 
        echo  __( 'Adds the post URL link to the image', 'featured-images-for-rss-feeds' ) ;
        ?>
                        <p><small><?php 
        echo  __( 'Outputs additional HTML surrounding the image so when clicked it links to the post URL.', 'featured-images-for-rss-feeds' ) ;
        ?></small></p>
                    </td>
                </tr>

                <?php 
        do_action( 'firss_settings_after' );
        ?>

            </table>

            <p class="submit"><input type="submit" name="submit-bpu" class="button-primary" value="<?php 
        _e( 'Save Changes' );
        ?>" /></p>

            <?php 
        do_action( 'firss_settings_form_actions' );
        ?>

        </form>

        <?php 
        do_action( 'firss_settings_after_form' );
        ?>

        <div class="footer-notes">
            <br/>- <?php 
        echo  sprintf( __( 'If you like this plugin, please <a href="%s" target=_blank>Rate and Review</a> it so others can benefit too.', 'featured-images-for-rss-feeds' ), 'http://wordpress.org/support/view/plugin-reviews/featured-images-for-rss-feeds/?rate=5#new-post' ) ;
        ?>
            <br/>- <?php 
        echo  sprintf( __( 'Still not seeing images in your feed? Verify featured images are set. Clear your browser and any server caches. Using Feedburner? Be sure to also <a href="%s" target=_blank>Ping Feedburner</a> so it refreshes your feed.', 'featured-images-for-rss-feeds' ), esc_url( 'http://feedburner.google.com/fb/a/pingSubmit?bloglink=' . site_url() ) ) ;
        ?>
            <br/>- <?php 
        echo  sprintf( __( 'To view your site’s raw RSS feed, click here: <a href="%s/feed/" target=_blank>/feed/</a>', 'featured-images-for-rss-feeds' ), esc_url( site_url() ) ) ;
        ?>
            <p/><?php 
        echo  sprintf( __( 'Free and premium FAQ and Support contact form available at <a href="%s" target=_blank>support.5starplugins.com</a>', 'featured-images-for-rss-feeds' ), esc_url( 'https://support.5starplugins.com/' ) ) ;
        ?>
            <p/><?php 
        echo  sprintf( __( 'Developed and supported by <a href="%s" target=_blank>5 Star Plugins</a> in San Diego, CA', 'featured-images-for-rss-feeds' ), esc_url( 'https://5starplugins.com/' ) ) ;
        ?> <img class="footerLogo" src="<?php 
        echo  plugins_url( 'includes/images/5StarPlugins_Logo80x80.png', __FILE__ ) ;
        ?>" width="20">
        </div>
    </div>
<?php 
    }
    
    /**
     * Adding WordPress plugin action links.
     */
    function firss_add_plugin_action_links( $links )
    {
        return array_merge( array(
            'settings' => '<a href="' . get_bloginfo( 'wpurl' ) . '/wp-admin/admin.php?page=featured-images-for-rss-feeds">Settings</a>',
        ), $links );
    }
    
    /**
     * Rate plugin.
     */
    function firss_plugin_meta_links( $links, $file )
    {
        $plugin = plugin_basename( __FILE__ );
        // Create link.
        if ( $file == $plugin ) {
            return array_merge( $links, array( '<a href="https://wordpress.org/support/plugin/featured-images-for-rss-feeds/reviews/?rate=5#new-post" target=_blank>' . __( 'Please rate and review', 'featured-images-for-rss-feeds' ) . '</a>' ) );
        }
        return $links;
    }
    
    function firss_filter_post_thumbnail_html(
        $html,
        $pid,
        $post_thumbnail_id,
        $size,
        $attr
    )
    {
        if ( !empty($attr['link_thumbnail']) ) {
            $html = sprintf(
                '<a href="%s" title="%s" rel="nofollow">%s</a>',
                get_permalink( $pid ),
                esc_attr( get_the_title( $pid ) ),
                $html
            );
        }
        return $html;
    }
    
    /**
     * Feature the images in RSS feeds.
     */
    function firss_featured_images_in_rss( $content )
    {
        global  $post ;
        
        if ( has_post_thumbnail( $post->ID ) ) {
            firss_settings_init();
            $featured_images_in_rss_size = get_option( 'featured_images_in_rss_size' );
            $featured_images_in_rss_css_code = firss_eval_css( get_option( 'featured_images_in_rss_css' ) );
            $featured_images_in_rss_clickable_link = (bool) get_option( 'featured_images_in_rss_clickable_link' );
            $content = get_the_post_thumbnail( $post->ID, $featured_images_in_rss_size, array(
                'style'          => $featured_images_in_rss_css_code,
                'class'          => 'webfeedsFeaturedVisual',
                'link_thumbnail' => $featured_images_in_rss_clickable_link,
            ) ) . $content;
        }
        
        return $content;
    }
    
    /**
     * Show premium features and link to subscribe page.
     *
     * @since 1.4
     */
    function firss_inform_premium()
    {
        if ( fifrf_fs()->can_use_premium_code() ) {
            return;
        }
        ?>
    <table class="form-table premium-features">
        <tr class="premiumHead">
            <th class="preBanner" scope="column" colspan=2>
                <h1>
                    <?php 
        echo  sprintf( __( 'Upgrade for these Premium Features%s', 'featured-images-for-rss-feeds' ), ( fifrf_fs()->is_trial() ? ' ' . __( '(Free Trial)', 'featured-images-for-rss-feeds' ) : '' ) ) ;
        ?>
                </h1>
            </th>
        </tr>

        <?php 
        foreach ( firss_premium_features() as $feature => $desc ) {
            ?>
            <tr>
                <th class="preBanner" width="30%" scope="column"><span class="dashicons dashicons-yes firss-premium"></span><span class="firss-premium-feature"><?php 
            echo  $feature ;
            ?></span></th>
                    <td width="70%" scope="column"><em><?php 
            echo  $desc ;
            ?></em>
                </th>
            </tr>
        <?php 
        }
        ?>
        <tr>
            <th style="text-align: center; padding-bottom: 20px;" scope="column" colspan="2"><a class="btnBuy" href="<?php 
        echo  esc_url( firss_upgrade_url() ) ;
        ?>"><?php 
        _e( 'Upgrade Now', 'featured-images-for-rss-feeds' );
        ?></a>
            </th>
        </tr>
    </table>
<?php 
    }
    
    /**
     * Display the call to action button.
     *
     * @since 1.4
     */
    function firss_call_to_action()
    {
        if ( !fifrf_fs()->is_not_paying() ) {
            return;
        }
        ?>
    <div class="call-to-action">
        <a class="btnBuy" href="<?php 
        echo  esc_url( firss_upgrade_url() ) ;
        ?>"><?php 
        _e( 'Upgrade Now', 'featured-images-for-rss-feeds' );
        ?></a>
        <?php 
        
        if ( !fifrf_fs()->is_trial() ) {
            ?>
            <a class="trialLink" href="<?php 
            echo  esc_url( '/wp-admin/admin.php?trial=true&page=featured-images-for-rss-feeds-pricing' ) ;
            ?>"><?php 
            echo  __( '14 Day Free Trial', 'featured-images-for-rss-feeds' ) ;
            ?></a>
        <?php 
        }
        
        ?>
    </div>
<?php 
    }
    
    /**
     * Output the images styling.
     */
    function firss_eval_css( $featured_images_in_rss_css )
    {
        // Add padding.
        $padding = get_option( 'featured_images_in_rss_padding', 5 );
        switch ( $featured_images_in_rss_css ) {
            case 'left-above':
                $featured_images_in_rss_css_code = 'display: block; margin-bottom: %1$spx; clear:both;max-width: 100%%;';
                break;
            case 'centered-above':
                $featured_images_in_rss_css_code = 'display: block; margin: auto; margin-bottom: %1$spx;max-width: 100%%;';
                break;
            case 'left-wrap':
                $featured_images_in_rss_css_code = 'float: left; margin-right: %1$spx;';
                break;
            case 'right-wrap':
                $featured_images_in_rss_css_code = 'float: right; margin-left: %1$spx;';
                break;
            default:
                $featured_images_in_rss_css_code = 'display: block; margin-bottom: %1$spx; clear: both;max-width: 100%%;';
                break;
        }
        $featured_images_in_rss_css_code = sprintf( $featured_images_in_rss_css_code, $padding );
        /**
         * Allow additional styling though hook.
         */
        return apply_filters( 'firss_image_styles', $featured_images_in_rss_css_code );
    }
    
    /**
     * Checks and sets default values if options have never been set before.
     */
    function firss_settings_init()
    {
        $featured_images_in_rss_size = get_option( 'featured_images_in_rss_size' );
        if ( empty($featured_images_in_rss_size) ) {
            update_option( 'featured_images_in_rss_size', 'thumbnail' );
        }
        $featured_images_in_rss_css = get_option( 'featured_images_in_rss_css' );
        if ( empty($featured_images_in_rss_css) ) {
            update_option( 'featured_images_in_rss_css', 'left-above' );
        }
        $featured_images_in_rss_padding = get_option( 'featured_images_in_rss_padding', 5 );
        if ( empty($featured_images_in_rss_padding) ) {
            update_option( 'featured_images_in_rss_padding', 5 );
        }
        do_action( 'firss_update_default_settings' );
    }
    
    /**
     * Outputs the list of premium features.
     *
     * @since 1.4
     */
    function firss_premium_features()
    {
        $features = array(
            __( 'Media Tag Support', 'featured-images-for-rss-feeds' )         => __( 'Support for media and image tags.', 'featured-images-for-rss-feeds' ),
            __( 'Use First Body Image', 'featured-images-for-rss-feeds' )      => __( 'Use first image in post as images in RSS feed.', 'featured-images-for-rss-feeds' ),
            __( 'Disable responsive images', 'featured-images-for-rss-feeds' ) => __( 'Disable responsive images (fixes images in certain RSS readers).', 'featured-images-for-rss-feeds' ),
            __( 'Premium Support', 'featured-images-for-rss-feeds' )           => __( 'Priority support to help you with features, configuration or use.', 'featured-images-for-rss-feeds' ),
            __( 'Custom Image Size', 'featured-images-for-rss-feeds' )         => __( 'Set custom sizes of images in RSS feed.', 'featured-images-for-rss-feeds' ),
            __( 'Exclude Categories', 'featured-images-for-rss-feeds' )        => __( 'Exclude certain categories from feed.', 'featured-images-for-rss-feeds' ),
            __( 'Pre-Feed Content', 'featured-images-for-rss-feeds' )          => __( 'Insert text or HTML messages, ads, links before your feed.', 'featured-images-for-rss-feeds' ),
            __( 'Post-Feed Content', 'featured-images-for-rss-feeds' )         => __( 'Also insert text or HTML messages, ads, links after your feed.', 'featured-images-for-rss-feeds' ),
            __( 'Publish Delay', 'featured-images-for-rss-feeds' )             => __( 'Delays the publishing of the feed after a post is published.', 'featured-images-for-rss-feeds' ),
        );
        return $features;
    }
    
    /**
     * The message for current plugin users.
     */
    function firss_freemius_update_message(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    )
    {
        return sprintf(
            __fs( 'hey-x' ) . '<br>' . __( 'Please help us improve %2$s! If you opt-in, some data about your usage will be sent to our platform Freemius. If you skip this, that\'s okay, the %2$s will still work just fine.', 'featured-images-for-rss-feeds' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }
    
    /**
     * The message for new plugin users.
     */
    function firss_freemius_new_message(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    )
    {
        return sprintf(
            __fs( 'hey-x' ) . '<br>' . __( 'In order to enjoy all of the features, functionality and enable a free trial of premium version, %2$s needs to connect your user, %3$s at %4$s, to our platform Freemius.', 'featured-images-for-rss-feeds' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }
    
    /**
     * Retrieve the upgrade URL.
     *
     * @since 1.4.2
     */
    function firss_upgrade_url( $params = array() )
    {
        $defaults = array(
            'checkout'      => 'true',
            'plan_id'       => 261,
            'plan_name'     => 'premium',
            'billing_cycle' => 'annual',
            'licenses'      => 1,
        );
        $params = wp_parse_args( $params, $defaults );
        return add_query_arg( $params, fifrf_fs()->get_upgrade_url() );
    }
    
    /**
     * Styles for the plugin settins page.
     *
     * @since 1.4
     */
    function firss_styles()
    {
        if ( empty($_GET['page']) || 'featured-images-for-rss-feeds' !== $_GET['page'] ) {
            return;
        }
        ?>
    <style type="text/css">
        .firss-settings-form {
            float: left;
            width: 70%;
        }

        table.premium-features {
            float: right;
            width: 30%;
            clear: right;
            background-color: #ffffff;
            border-radius:3px;
            color: #354951;
        }

        @media screen and (max-width:783px){
            .firss-settings-form, table.premium-features{
                width:100%;
            }

            .form-table th{
            font-size:16px;
            }
        }

        .footer-notes {
            clear: both;
            padding-top: 20px;
        }

        .firss-premium {
            color: #3c96da;
            width: 30px;
            float: left;
            font-size: 29px;
            margin-top: -3px;
        }

        span.firss-premium-feature {
            display: block;
            margin-left: 30px
        }

        .call-to-action {
            vertical-align: middle;
            float: left;
            clear: both;
            margin-top: 15px;
        }

        .trial {
            width: 120px;
        }

        @media screen and (max-width: 1101px) {
            .firss-settings-form,
            table.premium-features {
                display: block;
            }
        table.premium-features{
        float:left;
        clear:left;
            }
        }

        .btnBuy {
            -webkit-border-radius: 10;
            -moz-border-radius: 10;
            border-radius: 3px;
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            background: #6BC406;
            padding: 10px 20px 10px 20px;
            border: solid #ffffff 0px;
            text-decoration: none;
            font-weight: 200;
        }

        .btnBuy:hover {
            background: #509304;
            text-decoration: none;
            color:#ffffff;
        }

        a:hover {
            color: #ffffff;
        }
        .trialLink{
           display:block;
               color: #AAAAAA;
               margin: 10px;
               text-decoration: none;
           text-align: center;
               font-size: 13px;
               line-height: 26px;
               height: 28px;
        }
        .trialLink:hover{
        color:#32a6d6;
        text-decoration: underline;
        }
        .headerImg {
            align-content: center;
            background-size: cover;
            max-width:100%;
        }

        .headerDiv {
            width: 100%;
            margin-top: 20px;
            text-align:center;
        }

        a:hover{
        color:#32a6d6;
        }

        .form-table th{
        padding: 10px;
        }
        .form-table td{
        padding: 10px 10px;
        }
        .wrap h1{
        font-size: 26px;
        text-align: center;
        color: #ffffff;
        padding:15px 0;
        background-color: #6BC406;
        }
        h1.header-title{
        font-size: 28px;
        text-align: left;
        color: #23282d;
        background-color: unset;
        }
        h4{
        margin: .33em 0
        }
        .premiumHead{
        background-color: #6BC406;
        color: #ffffff;
        text-align: center;
        }

        .preBanner{
        padding: 15px 0;
        }

        th{
        padding-left:10px;
        }


    </style>
<?php 
    }
    
    /* End wrap of if (!function_exists(firss_init)) */
}
