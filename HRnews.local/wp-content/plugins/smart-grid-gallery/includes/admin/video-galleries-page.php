<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_Galleries {

	public function __construct() {

	}

	/**
	 * Load Video Galleries admin page
	 */
	public function load_video_gallery_page() {
		global $wpdb;
		$task = origincode_gallery_video_get_video_gallery_task();
		$id   = origincode_gallery_video_get_video_gallery_id();
		switch ( $task ) {
			case 'edit_cat':
				if ( $id ) {
					$this->edit_video_gallery( $id );
				} else {
					$id = $wpdb->get_var( "SELECT MAX( id ) FROM " . $wpdb->prefix . "origincodegallery_gallerys" );
					$this->edit_video_gallery( $id );
				}
				break;
			case 'apply':
				$a = isset( $_REQUEST['save_data_nonce'] );
				$b = wp_verify_nonce( $_REQUEST['save_data_nonce'], 'origincode_gallery_video_save_data_nonce' . $id );
				$c = wp_verify_nonce( $_REQUEST['save_data_nonce'], 'origincode_gallery_video_nonce_remove_video' . ( isset( $_GET['remove_video'] ) ? absint( $_GET['remove_video'] ) : '' ) );
				if ( ! ( ( $b || $c ) && $a ) ) {
					wp_die( 'Security check fail' );
				}
				if ( $id ) {
					$this->save_video_gallery_data( $id );
					$this->edit_video_gallery( $id );
				}
				break;
			case 'remove_origincode_gallery_video':
				if ( ! isset( $_REQUEST['origincode_origincode_gallery_video_nonce_remove_video_gallery'] ) | ! wp_verify_nonce( $_REQUEST['origincode_origincode_gallery_video_nonce_remove_video_gallery'], 'origincode_origincode_gallery_video_nonce_remove_video_gallery' . $id ) ) {
					wp_die( 'Security check fail' );
				}
				$this->remove_video_gallery( $id );
				$this->show_video_galleries_page();
				break;
			default:
				$this->show_video_galleries_page();
				break;
		}
	}

	/**
	 * Shows Video Gallery Main Page
	 */
	public function show_video_galleries_page() {
		global $wpdb;
		if ( isset( $_POST['search_events_by_title'] ) ) {
			$_POST['search_events_by_title'] = sanitize_html_class( stripslashes( $_POST['search_events_by_title'] ) );
		}
		$where                 = '';
		$sort["custom_style"]  = "manage-column column-autor sortable desc";
		$sort["default_style"] = "manage-column column-autor sortable desc";
		$sort["sortid_by"]     = 'id';
		$sort["1_or_2"]        = 1;
		$order                 = '';

		if ( isset( $_POST['page_number'] ) ) {
			if ( $_POST['asc_or_desc'] ) {
				$sort["sortid_by"] = absint( $_POST['order_by'] );
				if ( $_POST['asc_or_desc'] == 1 ) {
					$sort["custom_style"] = "manage-column column-title sorted asc";
					$sort["1_or_2"]       = "2";
					$order                = "ORDER BY " . $sort["sortid_by"] . " ASC";
				} else {
					$sort["custom_style"] = "manage-column column-title sorted desc";
					$sort["1_or_2"]       = "1";
					$order                = "ORDER BY " . $sort["sortid_by"] . " DESC";
				}
			}
			if ( $_POST['page_number'] ) {
				$limit = ( $_POST['page_number'] - 1 ) * 20;
			} else {
				$limit = 0;
			}
		} else {
			$limit = 0;
		}
		if ( isset( $_POST['search_events_by_title'] ) ) {
			$search_tag = sanitize_html_class( stripslashes( $_POST['search_events_by_title'] ) );
		} else {
			$search_tag = "";
		}
		if ( isset( $_GET["catid"] ) ) {
			$cat_id = absint( $_GET["catid"] );
		} else {
			if ( isset( $_POST['cat_search'] ) ) {
				$cat_id = sanitize_text_field( $_POST['cat_search'] );
			} else {
				$cat_id = 0;
			}
		}
        $query='';
		if ( $search_tag ) {
			$where = " WHERE name LIKE '%" . $search_tag . "%' ";
		}
		if ( $where ) {
			if ( $cat_id ) {
				$where .= " AND sl_width=" . $cat_id;
                $query  = $wpdb->prepare("SELECT COUNT(*) FROM " . $wpdb->prefix . "origincode_videogallery_galleries  WHERE name LIKE %s  AND sl_width=%d" ,'%'.$search_tag.'%',$cat_id);
           }
		} else {
			if ( $cat_id ) {
				$where .= " WHERE sl_width=" . $cat_id;
                $query  = $wpdb->prepare("SELECT COUNT(*) FROM " . $wpdb->prefix . "origincode_videogallery_galleries  WHERE sl_width=%d" ,$cat_id);
            }
		}
		$cat_row_query    = $wpdb->prepare("SELECT id,name FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE sl_width= %d",0);
		$cat_row          = $wpdb->get_results( $cat_row_query );
		$total            = $wpdb->get_var( $query );
		$pageNav['total'] = $total;
		$pageNav['limit'] = $limit / 20 + 1;

		if ( $cat_id ) {
			$query = "SELECT  a.* ,  COUNT(b.id) AS count, g.par_name AS par_name FROM " . $wpdb->prefix . "origincode_videogallery_galleries  AS a LEFT JOIN " . $wpdb->prefix . "origincode_videogallery_galleries AS b ON a.id = b.sl_width LEFT JOIN (SELECT  " . $wpdb->prefix . "origincode_videogallery_galleries.ordering as ordering," . $wpdb->prefix . "origincode_videogallery_galleries.id AS id, COUNT( " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id ) AS prod_count
FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos, " . $wpdb->prefix . "origincode_videogallery_galleries
WHERE " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id = " . $wpdb->prefix . "origincode_videogallery_galleries.id
GROUP BY " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id) AS c ON c.id = a.id LEFT JOIN
(SELECT " . $wpdb->prefix . "origincode_videogallery_galleries.name AS par_name," . $wpdb->prefix . "origincode_videogallery_galleries.id FROM " . $wpdb->prefix . "origincode_videogallery_galleries) AS g
 ON a.sl_width=g.id WHERE  a.name LIKE '%" . $search_tag . "%' group by a.id " . $order . " " . " LIMIT " . $limit . ",20";

		} else {
			$query = "SELECT  a.* ,  COUNT(b.id) AS count, g.par_name AS par_name FROM " . $wpdb->prefix . "origincode_videogallery_galleries  AS a LEFT JOIN " . $wpdb->prefix . "origincode_videogallery_galleries AS b ON a.id = b.sl_width LEFT JOIN (SELECT  " . $wpdb->prefix . "origincode_videogallery_galleries.ordering as ordering," . $wpdb->prefix . "origincode_videogallery_galleries.id AS id, COUNT( " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id ) AS prod_count
FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos, " . $wpdb->prefix . "origincode_videogallery_galleries
WHERE " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id = " . $wpdb->prefix . "origincode_videogallery_galleries.id
GROUP BY " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id) AS c ON c.id = a.id LEFT JOIN
(SELECT " . $wpdb->prefix . "origincode_videogallery_galleries.name AS par_name," . $wpdb->prefix . "origincode_videogallery_galleries.id FROM " . $wpdb->prefix . "origincode_videogallery_galleries) AS g
 ON a.sl_width=g.id WHERE a.name LIKE '%" . $search_tag . "%'  group by a.id " . $order . " " . " LIMIT " . $limit . ",20";
		}
		$rows = $wpdb->get_results( $query );
		global $glob_ordering_in_cat;
		if ( isset( $sort["sortid_by"] ) ) {
			if ( $sort["sortid_by"] == 'ordering' ) {
				if ( $_POST['asc_or_desc'] == 1 ) {
					$glob_ordering_in_cat = " ORDER BY ordering ASC";
				} else {
					$glob_ordering_in_cat = " ORDER BY ordering DESC";
				}
			}
		}
		$rows      = origincode_gallery_video_open_cat_in_tree( $rows );
		$query     = "SELECT  " . $wpdb->prefix . "origincode_videogallery_galleries.ordering," . $wpdb->prefix . "origincode_videogallery_galleries.id, COUNT( " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id ) AS prod_count
FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos, " . $wpdb->prefix . "origincode_videogallery_galleries
WHERE " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id = " . $wpdb->prefix . "origincode_videogallery_galleries.id
GROUP BY " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos.videogallery_id ";
		$prod_rows = $wpdb->get_results( $query );

		foreach ( $rows as $row ) {
			foreach ( $prod_rows as $row_1 ) {
				if ( $row->id == $row_1->id ) {
					$row->ordering   = $row_1->ordering;
					$row->prod_count = $row_1->prod_count;
				}
			}
		}
		$cat_row = origincode_gallery_video_open_cat_in_tree( $cat_row );
		require_once( ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'galleries-list-page.php' );
	}

	/**
	 * Prints Video Gallery images after editing data
	 *
	 * @param $id
	 *
	 * @return string
	 */
	public function edit_video_gallery( $id ) {
		global $wpdb;
		$query = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id= %d", $id );
		$row   = $wpdb->get_row( $query );
		if ( ! isset( $row->videogallery_list_effects_s ) ) {
			return 'id not found';
		}
		$query                          = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = %d order by ordering ASC  ", $row->id );
		$rowim                          = $wpdb->get_results( $query );
		$query                          = "SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_galleries order by id ASC";
		$rowsld                         = $wpdb->get_results( $query );
		$origincode_gallery_video_edit_video_nonce = wp_create_nonce( 'origincode_gallery_video_edit_video_nonce' );
		require_once( ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'videos-list-page.php' );
	}

	/**
	 * Edit Video Gallery images and data
	 *
	 * @param $id
	 *
	 * @return bool
	 */
	function save_video_gallery_data( $id ) {
		global $wpdb;
		$cat_row    = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id!= %d ", $id ) );
		$query      = $wpdb->prepare( "SELECT sl_width FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id = %d", $id );
		$table_name = $wpdb->prefix . "origincode_videogallery_galleries";
		$id         = absint( $id );
        if ( isset( $_GET["remove_video"] ) ) {
            if ( $_GET["remove_video"] != '' ) {
                $table_name = $wpdb->prefix . "origincode_videoorigincode_gallery_videos";
                $wpdb->delete(
                    $table_name,
                    array( 'id' => absint( $_GET["remove_video"] ) )
                );
            }
        }
		if ( isset( $_POST["name"] ) ) {
			$name                        = sanitize_text_field( wp_unslash( $_POST["name"] ) );
			$sl_width                    = absint( $_POST["sl_width"] );
			$sl_height                   = absint( $_POST["sl_height"] );
			$pause_on_hover              = in_array( $_POST["pause_on_hover"], array(
				'on',
				'off'
			) ) ? $_POST["pause_on_hover"] : 'on';
			$videogallery_list_effects_s = sanitize_text_field( $_POST["videogallery_list_effects_s"] );
			$description                 = absint( $_POST["sl_pausetime"] );
			$sl_changespeed              = absint( $_POST["sl_changespeed"] );
			$sl_position                 = in_array( $_POST["sl_position"], array(
				'right',
				'left',
				'center'
			) ) ? $_POST["sl_position"] : 'center';
			$origincode_sl_effects          = absint( $_POST["origincode_sl_effects"] );
			$autoslide                   = in_array( $_POST["autoslide"], array(
				'on',
				'off'
			) ) ? $_POST["autoslide"] : 'on';
		}
		if ( isset( $_POST["name"] ) && isset( $_POST["display_type"] ) && isset( $_POST["content_per_page"] ) ) {
			if ( $_POST["name"] != '' ) {
				$display_type     = absint( $_POST["display_type"] );
				$content_per_page = absint( $_POST["content_per_page"] );
				$wpdb->update(
					$table_name,
					array(
						'name'                        => $name,
						'sl_width'                    => $sl_width,
						'sl_height'                   => $sl_height,
						'pause_on_hover'              => $pause_on_hover,
						'videogallery_list_effects_s' => $videogallery_list_effects_s,
						'description'                 => $description,
						'param'                       => $sl_changespeed,
						'sl_position'                 => $sl_position,
						'origincode_sl_effects'          => $origincode_sl_effects,
						'display_type'                => $display_type,
						'content_per_page'            => $content_per_page,
						'ordering'                    => 1
					),
					array( 'id' => $id )
				);
			}
		}
		if ( isset( $_POST["name"] ) ) {
			if ( $_POST["name"] != '' ) {
				$wpdb->update(
					$table_name,
					array(
						'name'                        => $name,
						'sl_width'                    => $sl_width,
						'sl_height'                   => $sl_height,
						'pause_on_hover'              => $pause_on_hover,
						'videogallery_list_effects_s' => $videogallery_list_effects_s,
						'description'                 => $description,
						'param'                       => $sl_changespeed,
						'sl_position'                 => $sl_position,
						'origincode_sl_effects'          => $origincode_sl_effects,
						'autoslide'                   => $autoslide,
						'ordering'                    => 1
					),
					array( 'id' => $id )
				);
			}
		}
		$query = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id = %d", $id );
		$row   = $wpdb->get_row( $query );
		$query = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = %d order by id ASC", $row->id );
		$rowim = $wpdb->get_results( $query );
        $allowed_tags = wp_kses_allowed_html('post');

		foreach ( $rowim as $key => $rowimages ) {
			if ( isset( $_POST[ "order_by_" . $rowimages->id . "" ] ) ) {
				$table_name    = $wpdb->prefix . "origincode_videoorigincode_gallery_videos";
				$order_by      = absint( $_POST[ "order_by_" . $rowimages->id ] );
				$link_target   = in_array( $_POST[ "sl_link_target" . $rowimages->id ], array(
					'on',
					'off'
				) ) ? $_POST[ "sl_link_target" . $rowimages->id ] : 'on';
				$sl_url        = sanitize_text_field( str_replace( '%', '__5_5_5__', $_POST[ "sl_url" . $rowimages->id ] ) );
				$title         = wp_kses( wp_unslash( str_replace( '%', '__5_5_5__', $_POST[ "titleimage" . $rowimages->id ] ) ), $allowed_tags );
				$description   = wp_kses( wp_unslash( str_replace( '%', '__5_5_5__', $_POST[ "im_description" . $rowimages->id ] ) ),$allowed_tags );
				$video_url     = sanitize_text_field( $_POST[ "imagess" . $rowimages->id ] );
				$thumb_url     = sanitize_text_field( $_POST[ "thumbs" . $rowimages->id ] );
				if( !isset($_POST["show_controls". $rowimages->id ] ))
					$show_controls = 'on';
				else
				$show_controls = in_array( $_POST["show_controls". $rowimages->id ], array(
					'on',
					'off'
				) ) ? $_POST["show_controls". $rowimages->id] : 'on';
				if( !isset($_POST["show_info". $rowimages->id ] ))
					$show_info = 'on';
				else
				$show_info     = in_array( $_POST["show_info". $rowimages->id ], array(
					'on',
					'off'
				) ) ? $_POST["show_info". $rowimages->id] : 'on';
				$wpdb->update(
					$table_name,
					array(
						'ordering'      => $order_by,
						'link_target'   => $link_target,
						'sl_url'        => $sl_url,
						'name'          => $title,
						'description'   => $description,
						'image_url'     => $video_url,
						'thumb_url'     => $thumb_url,
						'show_info'     => $show_info,
						'show_controls' => $show_controls,
					),
					array( 'ID' => $rowimages->id )
				);
			}

		}
		?>
		<div class="updated"><p><strong><?php _e( 'Item Saved' ); ?></strong></p></div>
		<?php

		return true;
	}

	/**
	 * Removes Video Gallery
	 *
	 * @param $id
	 */
	function remove_video_gallery( $id ) {
		global $wpdb;
		$table_name = $wpdb->prefix . "origincode_videogallery_galleries";
		$wpdb->delete(
			$table_name,
			array( 'id' => $id ) );
		$sql_remov_tag = $wpdb->prepare( "DELETE FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id = %d", $id );
		if ( ! $wpdb->query( $sql_remov_tag ) ) {
			?>
			<div id="message" class="error"><p>Video Gallery Deleted</p></div>
			<?php
		} else {
			?>
			<div class="updated"><p><strong><?php _e( 'Item Deleted.' ); ?></strong></p></div>
			<?php
		}
	}
}


