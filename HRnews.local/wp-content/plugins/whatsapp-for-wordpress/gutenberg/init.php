<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function nta_whatsapp_block_assets()
{ // phpcs:ignore
    // Styles.
    wp_enqueue_style(
        'nta_whatsapp-style-css', // Handle.
        plugins_url('dist/blocks.style.build.css', dirname(__FILE__)), // Block style CSS.
        array('wp-editor') // Dependency to include the CSS after it.
        // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
    );
}

// Hook: Frontend assets.
add_action('enqueue_block_assets', 'nta_whatsapp_block_assets');

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function nta_whatsapp_editor_assets()
{ // phpcs:ignore
    // Scripts.
    wp_enqueue_script(
        'nta_whatsapp-block-js', // Handle.
        plugins_url('/dist/blocks.build.js', dirname(__FILE__)), // Block.build.js: We register the block here. Built with Webpack.
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components'), // Dependencies, defined above.
        // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: File modification time.
        true// Enqueue the script in the footer.
    );

    // Styles.
    wp_enqueue_style(
        'nta_whatsapp-block-editor-css', // Handle.
        plugins_url('dist/blocks.editor.build.css', dirname(__FILE__)), // Block editor CSS.
        array('wp-edit-blocks') // Dependency to include the CSS after it.
        // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
    );

    wp_enqueue_style('nta-css-block-button', plugins_url('dist/assets/css/style.css', dirname(__FILE__)));
}

// Hook: Editor assets.
add_action('enqueue_block_editor_assets', 'nta_whatsapp_editor_assets');

add_action('rest_api_init', 'nta_whatsapp_posts_meta_field');

function nta_whatsapp_posts_meta_field()
{
    register_rest_field('whatsapp-accounts', 'post-meta-fields', array(
        'get_callback' => 'nta_whatsapp_post_meta_for_api',
        'schema' => null)
    );
}

function nta_whatsapp_post_meta_for_api($object)
{
    $post_id = $object['id'];
    $data = get_post_meta($post_id, 'nta_whatsapp_accounts', true);
    return $data;
}

function nta_render_block_core_whatsapp($attributes)
{
    if ($attributes['isSelectedAccount'] != -1) {
        return do_shortcode("[njwa_button id={$attributes['isSelectedAccount']}]");
    } else {
        $avatarClass = $attributes['imageUrl'] ? "wa__btn_w_img" : "wa__btn_w_icon";
        $btnStyleClass = $attributes['buttonStyle'] == "round" ? "wa__r_button" : "wa__sq_button";
        $btn_icon_or_image = '';
        if (!$attributes['imageUrl']) {
            $btn_icon_or_image = '<div class="wa__btn_icon"><img src="' . NTA_WHATSAPP_PLUGIN_URL . 'dist/assets/img/whatsapp_logo.svg' . '" alt=""/></div>';
        } else {
            $btn_icon_or_image = '<div class="wa__cs_img"><div class="wa__cs_img_wrap" style="background: url(' . $attributes['imageUrl'] . ') center center no-repeat; background-size: cover;"></div></div>';
        }
        $html = '';
        $html .= '<div style="margin: 30px 0 30px;">';
        $html .= '<a target="_blank" href="https://web.whatsapp.com/send?phone=' . $attributes['waUrl'] . '" class="wa__button ' . $btnStyleClass . ' wa__stt_online ' . $avatarClass . '" style="background-color: ' . $attributes['buttonColor'] . '; color: ' . $attributes['textColor'] . '">';
        $html .= $btn_icon_or_image;
        $html .= '<div class="wa__btn_txt"><div class="wa__cs_info">';
        $html .= '<div class="wa__cs_name" style="color: ' . $attributes['textColor'] . '">' . $attributes['buttonInfo'] . '</div>';
        $html .= '<div class="wa__cs_status">Online</div></div>';
        $html .= '<div class="wa__btn_title">' . $attributes['buttonTitle'] . '</div></div></a></div>';
        return $html;
    }
}

function nta_register_block_core_whatsapp()
{
    register_block_type(
        'ninjateam/nta-whatsapp',
        array(
            'attributes' => array(
                'isSelectedAccount' => array(
                    'type' => 'string',
                    'default' => -1,
                ),
                'title' => array(
                    'type' => 'string',
                    'default' => "THu ne",
                ),
                'imageID' => array(
                    'type' => 'string',
                    'default' => "",
                ),
                'imageAlt' => array(
                    'type' => 'string',
                    'default' => "img",
                ),
                'imageUrl' => array(
                    'type' => 'string',
                    'default' => "",
                ),
                'buttonStyle' => array(
                    'type' => 'string',
                    'default' => "round",
                ),
                'buttonColor' => array(
                    'type' => 'string',
                    'default' => "#2DB742",
                ),
                'buttonTitle' => array(
                    'type' => 'string',
                    'default' => "",
                ),
                'buttonInfo' => array(
                    'type' => 'string',
                    'default' => "",
                ),
                'textColor' => array(
                    'type' => 'string',
                    'default' => "#fff",
                ),
                'waUrl' => array(
                    'type' => 'string',
                    'default' => "",
                ),
                'className' => array(
                    'type' => 'string',
                ),
                'plugin_dir' => array(
                    'type' => 'string',
                    'default' => NTA_WHATSAPP_PLUGIN_URL,
                ),
            ),
            'editor_script' => 'njwa_button',
            'render_callback' => 'nta_render_block_core_whatsapp',
        )
    );
    //add_shortcode('njwa_button', 'render_block_core_whatsapp');
}
add_action('init', 'nta_register_block_core_whatsapp');
