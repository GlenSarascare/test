<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_Shortcode {

	/**
	 * OriginCode_Gallery_Video_Shortcode constructor.
	 */
	public function __construct() {
		add_shortcode( 'origincode_videogallery', array( $this, 'run_shortcode' ) );
		add_action( 'admin_footer', array( $this, 'inline_popup_content' ) );
		add_action( 'media_buttons_context', array( $this, 'add_editor_media_button' ) );

	}

	/**
	 * Run the shortcode on front-end
	 *
	 * @param $attrs
	 *
	 * @return string
	 */
	public function run_shortcode( $attrs ) {
		$attrs = shortcode_atts( array(
			'id' => 'no origincode video_gallery',

		), $attrs );

		global $wpdb;
		$query        = $wpdb->prepare( "SELECT origincode_sl_effects FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id=%d", $attrs['id'] );
		$video_gallery_view = $wpdb->get_var( $query );
		$query = $wpdb->prepare( "SELECT image_url FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos WHERE videogallery_id=%d", $attrs['id'] );
		$videos       = $wpdb->get_col( $query );
		$has_youtube  = false;
		$has_vimeo    = false;
		foreach ( $videos as $video_row ) {
			if ( strpos( $video_row, 'youtu' ) !== false ) {
				$has_youtube = true;
			}
			if ( strpos( $video_row, 'vimeo' ) !== false ) {
				$has_vimeo = true;
			}
		}

		do_action( 'origincode_gallery_video_shortcode_scripts', $attrs['id'], $video_gallery_view, $has_youtube, $has_vimeo );
		do_action( 'origincode_gallery_video_localize_scripts', $attrs['id'] );

		return $this->init_frontend( $attrs['id'] );
	}

	/**
	 * Show published galleries in frontend
	 *
	 * @param $id
	 *
	 * @return string
	 */
	protected function init_frontend( $id ) {
		global $wpdb;
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC",$id);
		$videos=$wpdb->get_results($query);
		$query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."origincode_videogallery_galleries where id = '%d' order by id ASC",$id);
		$origincode_gallery_video=$wpdb->get_results($query);
		$origincode_gallery_video_get_option = origincode_gallery_video_get_default_general_options();

		ob_start();
		OriginCode_Gallery_Video()->template_loader->load_front_end( $videos, $origincode_gallery_video_get_option, $origincode_gallery_video );

		return ob_get_clean();

	}

	/**
	 * Add editor media button
	 *
	 * @param $context
	 *
	 * @return string
	 */
	public function add_editor_media_button( $context ) {
		$img          = ORIGINCODE_GALLERY_VIDEO_IMAGES_URL . '/admin_images/post.button.png';
		$container_id = 'origincode_videogallery';
		$title        = __( 'Select OriginCode Gallery Video to insert into post', 'gallery-video' );
		$context .= '<a class="button thickbox" title="' . $title . '" href="#TB_inline?width=400&inlineId=' . $container_id . '">
        <span class="wp-media-buttons-icon" style="background: url(' . $img . '); background-repeat: no-repeat; background-position: left bottom;"></span>'.
    __("Add Gallery Video").
    '</a>';

		return $context;
	}

	/**
	 * Inline popup contents
	 */
	public function inline_popup_content() {
        global $wpdb;
        $query="SELECT * FROM ".$wpdb->prefix."origincode_videogallery_galleries order by id ASC";
        $shortcodevideogallerys=$wpdb->get_results($query);
        $query="SELECT * FROM ".$wpdb->prefix."origincode_videogallery_galleries";
        $firstrow=$wpdb->get_row($query);
        $id=$firstrow->id;
        $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."origincode_videogallery_galleries WHERE id= %d",$id);
        $row=$wpdb->get_row($query);
		require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'popup-content-page.php';
	}


}
