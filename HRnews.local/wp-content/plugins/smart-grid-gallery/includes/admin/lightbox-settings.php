<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_Lightbox_Options {


    public function __construct() {
        add_action( 'origincode_gallery_video_save_lightbox_options', array( $this, 'save_options' ) );
    }
	/**
	 * Loads Lightbox options page
	 */
	public function load_page() {
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'Options_video_gallery_lightbox_styles' ) {
            if ( isset( $_GET['task'] ) ) {
                if ( $_GET['task'] == 'save' ) {
                    do_action( 'origincode_gallery_video_save_lightbox_options' );
                }
            } else {
                $this->show_page();
            }
            	}
	}

	/**
	 * Shows Lightbox options page
	 */
	public function show_page() {
		require( ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'lightbox-settings-page.php' );
	}
    public function save_options() {
        if ( !isset( $_REQUEST['origincode_gallery_nonce_save_lightbox_options'] ) || ! wp_verify_nonce( $_REQUEST['origincode_gallery_nonce_save_lightbox_options'], 'origincode_gallery_nonce_save_lightbox_options' ) ) {
            wp_die( 'Security check fail' );
        }
        if ( isset( $_POST['params'] ) ) {
            $params = array_map('sanitize_text_field',( $_POST['params'] ));
            foreach ( $params as $name => $value ) {
                update_option( $name, wp_unslash( $value ) );
            }
            ?>
            <div class="updated"><p><strong><?php _e( 'Item Saved' ); ?></strong></p></div>
            <?php
        }
        $this->show_page();
    }
}