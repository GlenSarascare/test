<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_Admin {

	/**
	 * Array of pages in admin
	 * @var array
	 */
	public $pages = array();

	/**
	 * Instance of OriginCode_Gallery_Video_General_Options class
	 *
	 * @var OriginCode_Gallery_Video_General_Options
	 */
	public $general_options = null;

	/**
	 * Instance of OriginCode_Gallery_Video_Galleries class
	 *
	 * @var OriginCode_Gallery_Video_Galleries
	 */
	public $video_galleries = null;

	/**
	 * Instance of OriginCode_Gallery_Video_Lightbox_Options class
	 *
	 * @var OriginCode_Gallery_Video_Lightbox_Options
	 */
	public $lightbox_options = null;

    /**
     * @return mixed
     */
    public function get_pages() {
        return $this->pages;
    }
	/**
	 * OriginCode_Gallery_Video_Admin constructor.
	 */
	public function __construct() {
		$this->init();
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'wp_loaded', array( $this, 'wp_loaded' ) );
		add_action( 'wp_loaded', array( $this, 'wp_loaded_add_video' ) );
		add_action( 'wp_loaded', array( $this, 'wp_loaded_edit_video' ) );
		add_action( 'wp_loaded', array( $this, 'wp_loaded_duplicate_video' ) );
	}

	/**
	 * Initialize Video Gallery's admin
	 */
	protected function init() {
		$this->general_options  = new OriginCode_Gallery_Video_General_Options();
		$this->video_galleries  = new OriginCode_Gallery_Video_Galleries();
		$this->lightbox_options = new OriginCode_Gallery_Video_Lightbox_Options();
	}

	/**
	 * Prints Video Gallery Menu
	 */
	public function admin_menu() {
		$this->pages[] = add_menu_page( __( 'Video Gallery', 'gallery-video' ), __( 'Video Gallery', 'gallery-video' ), 'delete_pages', 'video_galleries_origincode_video_gallery', array(
			OriginCode_Gallery_Video()->admin->video_galleries,
			'load_video_gallery_page'
		), ORIGINCODE_GALLERY_VIDEO_IMAGES_URL . "/admin_images/video_gallery_icon.png" );
		$this->pages[] = add_submenu_page( 'video_galleries_origincode_video_gallery', __( 'Video Galleries', 'gallery-video' ), __( 'Video Galleries', 'gallery-video' ), 'delete_pages', 'video_galleries_origincode_video_gallery', array(
			OriginCode_Gallery_Video()->admin->video_galleries,
			'load_video_gallery_page'
		) );

		$this->pages[] = add_submenu_page( 'video_galleries_origincode_video_gallery', __( 'Advanced Features PRO', 'gallery-video' ), __( 'Advanced Features PRO', 'gallery-video' ), 'delete_pages', 'Options_video_gallery_styles', array(
			OriginCode_Gallery_Video()->admin->general_options,
			'load_page'
		) );

		$this->pages[] = add_submenu_page( 'video_galleries_origincode_video_gallery', __( 'Lightbox Options', 'gallery-video' ), __( 'Lightbox Options', 'gallery-video' ), 'delete_pages', 'Options_video_gallery_lightbox_styles', array(
			OriginCode_Gallery_Video()->admin->lightbox_options,
			'load_page'
		) );
	}

	/**
	 * Inserts New Video Gallery
	 */
	public function wp_loaded() {
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'video_galleries_origincode_video_gallery' ) {
			if ( origincode_gallery_video_get_video_gallery_task() ) {
				if ( origincode_gallery_video_get_video_gallery_task() == 'add_cat' ) {
					if ( ! isset( $_REQUEST['origincode_origincode_gallery_video_nonce_add_origincode_gallery_video'] ) || ! wp_verify_nonce( $_REQUEST['origincode_origincode_gallery_video_nonce_add_origincode_gallery_video'], 'origincode_origincode_gallery_video_nonce_add_origincode_gallery_video' ) ) {
						wp_die( 'Security check fail' );
					}
					global $wpdb;
					$table_name = $wpdb->prefix . "origincode_videogallery_galleries";
					$wpdb->insert(
						$table_name,
						array(
							'name'                        => 'New Video Gallery',
							'sl_height'                   => 375,
							'sl_width'                    => 600,
							'pause_on_hover'              => 'on',
							'videogallery_list_effects_s' => 'cubeH',
							'description'                 => 4000,
							'param'                       => 1000,
							'ordering'                    => 1,
							'published'                   => 300,
							'origincode_sl_effects'          => 4
						)
					);
					$apply_video_gallery_safe_link = wp_nonce_url(
						'admin.php?page=video_galleries_origincode_video_gallery&id=' . $wpdb->insert_id . '&task=apply',
						'origincode_gallery_video_save_data_nonce' . $wpdb->insert_id,
						'save_data_nonce'
					);
					$apply_video_gallery_safe_link = htmlspecialchars_decode( $apply_video_gallery_safe_link );
					wp_redirect( $apply_video_gallery_safe_link );
				}
			}
		}
	}

	/**
	 * Inserts New Video into Video Gallery
	 */
	public function wp_loaded_add_video() {

		if ( isset( $_GET['page'] ) && $_GET['page'] == 'video_galleries_origincode_video_gallery' ) {
			if ( origincode_gallery_video_get_video_gallery_task() && origincode_gallery_video_get_video_gallery_id() ) {
				if ( origincode_gallery_video_get_video_gallery_task() == 'videoorigincode_gallery_video' && $_GET['closepop'] == 1 ) {
					if ( ! isset( $_REQUEST['video_add_nonce'] ) || ! wp_verify_nonce( $_REQUEST['video_add_nonce'], 'origincode_gallery_nonce_add_video' ) ) {
						wp_die( 'Security check fail' );
					}
					$id = origincode_gallery_video_get_video_gallery_id();
					global $wpdb;
					$title       = wp_kses( wp_unslash( $_POST["show_title"] ), 'default' );
					$description = wp_kses( wp_unslash( $_POST["show_description"] ), 'default' );
					$video_url   = sanitize_text_field( $_POST["origincode_add_video_input"] );
					$link_url    = sanitize_text_field( $_POST["show_url"] );
					if ( isset( $_POST["origincode_add_video_input"] ) ) {
						if ( $_POST["origincode_add_video_input"] != '' ) {
							$table_name   = $wpdb->prefix . "origincode_videoorigincode_gallery_videos";
							$query        = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id= %d", $id );
							$row          = $wpdb->get_row( $query );
							$query        = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = %d order by id ASC", $row->id );
							$rowplusorder = $wpdb->get_results( $query );

							foreach ( $rowplusorder as $key => $rowplusorders ) {
								$rowplusorderspl = $rowplusorders->ordering + 1;
								$wpdb->update(
									$table_name,
									array( 'ordering' => $rowplusorderspl ),
									array( 'id' => $rowplusorders->id )
								);
							}
							$wpdb->insert(
								$table_name,
								array(
									'name'                  => $title,
									'videogallery_id'       => $id,
									'description'           => $description,
									'image_url'             => $video_url,
									'sl_url'                => $link_url,
									'sl_type'               => 'video',
									'link_target'           => 'on',
									'ordering'              => 0,
									'published'             => 1,
									'published_in_sl_width' => 1
								)
							);
						}
					}
					$apply_video_gallery_safe_link = wp_nonce_url(
						'admin.php?page=video_galleries_origincode_video_gallery&id=' . $id . '&task=apply',
						'origincode_gallery_video_save_data_nonce' . $id,
						'save_data_nonce'
					);
					$apply_video_gallery_safe_link = htmlspecialchars_decode( $apply_video_gallery_safe_link );
					wp_redirect( $apply_video_gallery_safe_link );
				}
			}
		}
	}

	/**
	 * Edit Video
	 */
	public function wp_loaded_edit_video() {
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'video_galleries_origincode_video_gallery' ) {
			if ( origincode_gallery_video_get_video_gallery_task() && origincode_gallery_video_get_video_gallery_task() == 'origincode_gallery_video_edit_video' && $_GET['closepop'] == 1 ) {
				if ( ! isset( $_REQUEST['video_edit_nonce'] ) || ! wp_verify_nonce( $_REQUEST['video_edit_nonce'], 'origincode_gallery_video_edit_video_nonce' ) ) {
					wp_die( 'Security check fail' );
				}
				global $wpdb;
                if ( !isset( $_GET["video_id"] ) || absint( $_GET['video_id'] ) != $_GET['video_id'] ) {
                    wp_die('"video_id" parameter is required to be not negative integer');
                }
				$video_unique_id  = absint( $_GET['video_id'] );
                if ( !isset( $_GET["origincode_gallery_video_id"] ) || absint( $_GET['origincode_gallery_video_id'] ) != $_GET['origincode_gallery_video_id'] ) {
                    wp_die('"origincode_gallery_video_id" parameter is required to be not negative integer');
                }
				$origincode_gallery_video_id = absint( $_GET['origincode_gallery_video_id'] );
				$video_url        = sanitize_text_field( $_GET['video_url'] );
				$table_name       = $wpdb->prefix . 'origincode_videoorigincode_gallery_videos';
				$wpdb->update(
					$table_name,
					array( 'image_url' => $video_url ),
					array( 'id' => $video_unique_id )
				);
				$apply_video_gallery_safe_link = wp_nonce_url(
					'admin.php?page=video_galleries_origincode_video_gallery&id=' . $origincode_gallery_video_id . '&task=apply',
					'origincode_gallery_video_save_data_nonce' . $origincode_gallery_video_id,
					'save_data_nonce'
				);
				$apply_video_gallery_safe_link = htmlspecialchars_decode( $apply_video_gallery_safe_link );
				wp_redirect( $apply_video_gallery_safe_link );
			}
		}
	}

	/**
	 * Duplicate Video
	 */
	function wp_loaded_duplicate_video() {
		if ( isset( $_GET['page'] ) && $_GET['page'] == 'video_galleries_origincode_video_gallery' ) {
			if ( origincode_gallery_video_get_video_gallery_task() ) {
				if ( origincode_gallery_video_get_video_gallery_task() == 'duplicate_origincode_gallery_video' ) {
                    if ( !isset( $_GET["id"] ) || absint( $_GET['id'] ) != $_GET['id'] ) {
                        wp_die('"id" parameter is required to be not negative integer');
                    }
                    $id = absint( $_GET["id"] );
					if ( ! isset( $_REQUEST['origincode_gallery_video_duplicate_nonce'] ) || ! wp_verify_nonce( $_REQUEST['origincode_gallery_video_duplicate_nonce'], 'origincode_origincode_gallery_video_nonce_duplicate_gallery' . $id) ) {
						wp_die( 'Security check fail' );
					}
					global $wpdb;
					$table_name    = $wpdb->prefix . "origincode_videogallery_galleries";
					$query         = $wpdb->prepare( "SELECT * FROM " . $table_name . " WHERE id=%d", $id );
					$origincode_gallery_video = $wpdb->get_results( $query );
					$wpdb->insert(
						$table_name,
						array(
							'name'                        => $origincode_gallery_video[0]->name . ' Copy',
							'sl_height'                   => $origincode_gallery_video[0]->sl_height,
							'sl_width'                    => $origincode_gallery_video[0]->sl_width,
							'pause_on_hover'              => $origincode_gallery_video[0]->pause_on_hover,
							'videogallery_list_effects_s' => $origincode_gallery_video[0]->videogallery_list_effects_s,
							'description'                 => $origincode_gallery_video[0]->description,
							'param'                       => $origincode_gallery_video[0]->param,
							'sl_position'                 => $origincode_gallery_video[0]->sl_position,
							'ordering'                    => $origincode_gallery_video[0]->ordering,
							'published'                   => $origincode_gallery_video[0]->published,
							'origincode_sl_effects'          => $origincode_gallery_video[0]->origincode_sl_effects,
							'display_type'                => $origincode_gallery_video[0]->display_type,
							'content_per_page'            => $origincode_gallery_video[0]->content_per_page,
							'autoslide'                   => $origincode_gallery_video[0]->autoslide
						)
					);

					$query    = $wpdb->prepare( "SELECT id FROM " . $wpdb->prefix . "origincode_videogallery_galleries order by id ASC");
					$row_ids = $wpdb->get_col( $query );
					$last_key = max($row_ids);
					$table_name  = $wpdb->prefix . "origincode_videoorigincode_gallery_videos";
					$query       = $wpdb->prepare( "SELECT * FROM " . $table_name . " WHERE videogallery_id=%d", $id );
					$videos      = $wpdb->get_results( $query );
					$videos_list = "";
					foreach ( $videos as $key => $video ) {
						$new_video = "('";
						$new_video .= esc_sql($video->name) . "','" . esc_attr($last_key) . "','" . esc_sql( $video->description) . "','" . esc_url($video->image_url) . "','" .
                            esc_url($video->sl_url) . "','" . esc_attr($video->sl_type) . "','" . esc_attr($video->link_target) . "','" . esc_attr($video->ordering ). "','" .
                            esc_attr($video->published) . "','" . esc_attr($video->published_in_sl_width) . "','" . esc_url($video->thumb_url) . "','" .
                            esc_attr($video->show_controls) . "','" . esc_attr($video->show_info) . "')";
						$videos_list .= $new_video ."," ;
					}
					$videos_list      = substr($videos_list,0,strlen($videos_list)-1);
					$query = "INSERT into " . $table_name . " (name,videogallery_id,description,image_url,sl_url,sl_type,link_target,ordering,published,published_in_sl_width,thumb_url,show_controls,show_info)
					VALUES " . $videos_list ;
					$wpdb->query( $query);
					wp_redirect( 'admin.php?page=video_galleries_origincode_video_gallery' );
				}
			}
		}
	}

}

