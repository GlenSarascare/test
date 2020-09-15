<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_Ajax
{

    public function __construct()
    {
        add_action('wp_ajax_nopriv_admin_origincode_gallery_video_shortecode', array(
            $this,
            'origincode_gallery_video_admin_ajax_shortecode_callback'
        ));
        add_action('wp_ajax_admin_origincode_gallery_video_shortecode', array(
            $this,
            'origincode_gallery_video_admin_ajax_shortecode_callback'
        ));

        add_action('wp_ajax_nopriv_admin_origincode_gallery_video', array(
            $this,
            'origincode_gallery_video_admin_ajax_callback'
        ));
        add_action('wp_ajax_admin_origincode_gallery_video', array($this, 'origincode_gallery_video_admin_ajax_callback'));

        add_action('wp_ajax_nopriv_origincode_origincode_gallery_video_front_end_ajax', array(
            $this,
            'origincode_video_gallery_ajax_front_end_callback'
        ));
        add_action('wp_ajax_origincode_origincode_gallery_video_front_end_ajax', array(
            $this,
            'origincode_video_gallery_ajax_front_end_callback'
        ));

        add_action("wp_ajax_nopriv_share_count_ajax_callback", array(
            $this,
            'share_count_views_ajax_callback_function'
        ));
        add_action("wp_ajax_share_count_ajax_callback", array($this, 'share_count_views_ajax_callback_function'));
    }

    function origincode_gallery_video_admin_ajax_shortecode_callback()
    {
        global $wpdb;
        if ($_POST['post'] == 'video_gal_change_options') {
            if (!isset($_REQUEST['changeShortecodeViewNonce']) || !wp_verify_nonce($_REQUEST['changeShortecodeViewNonce'], 'origincode_gallery_video_shortecode_change_view_nonce')) {
                wp_die('Security check fail');
            }
            if ( !isset( $_POST["id"] ) || absint( $_POST['id'] ) != $_POST['id'] ) {
                echo json_encode(array('success'=>'0','message'=>'"id" parameter is required to be not negative integer'));
            }
            $id = absint($_POST['id']);
            $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_galleries WHERE id = %d", $id);
            $row = $wpdb->get_row($query);
            $response = array(
                'origincode_sl_effects' => $row->origincode_sl_effects,
                'sl_height' => $row->sl_height,
                'sl_width' => $row->sl_width,
                'pause_on_hover' => $row->pause_on_hover,
                'videogallery_list_effects_s' => $row->videogallery_list_effects_s,
                'sl_pausetime' => $row->description,
                'sl_changespeed' => $row->param,
                'sl_position' => $row->sl_position,
                'display_type' => $row->display_type,
                'content_per_page' => $row->content_per_page
            );
            echo json_encode($response);
        }
        if ($_POST['post'] == 'videoGalSaveOptions') {
            if (!isset($_REQUEST['insertShortecodeNonce'])  || !wp_verify_nonce($_REQUEST['insertShortecodeNonce'], 'origincode_gallery_video_insert_shortecode')) {
                wp_die('Security check fail');
            }
            if ( !isset( $_POST["video_id"] ) || absint( $_POST['video_id'] ) != $_POST['video_id'] ) {
                echo json_encode(array('success'=>'0','message'=>'"video_id" parameter is required to be not negative integer'));
            }
            $id = absint($_POST["video_id"]);
            $table_name = $wpdb->prefix . "origincode_videogallery_galleries";
            if (isset($_POST["display_type"]) || isset($_POST["content_per_page"])) {
                $display_type = sanitize_text_field($_POST["display_type"]);
                $content_per_page = sanitize_text_field($_POST["content_per_page"]);
                $wpdb->update(
                    $table_name,
                    array(
                        'display_type' => $display_type,
                        'content_per_page' => $content_per_page
                    ),
                    array('id' => $id)
                );
            }
            $view = absint($_POST["origincode_sl_effects"]);
            $sl_width = absint($_POST["sl_width"]);
            $sl_height = absint($_POST["sl_height"]);
            $videogallery_list_effects_s = sanitize_text_field($_POST["videogallery_list_effects_s"]);
            $sl_pausetime = absint($_POST["sl_pausetime"]);
            $sl_changespeed = absint($_POST["sl_changespeed"]);
            $sl_position = in_array(sanitize_text_field($_POST["sl_position"]), array(
                'right',
                'left',
                'center'
            )) ? sanitize_text_field($_POST["sl_position"]) : 'center';
            $pause_on_hover = in_array(sanitize_text_field($_POST["pause_on_hover"]), array(
                'on',
                'off',
            )) ? sanitize_text_field($_POST["pause_on_hover"]) : 'on';
            $wpdb->update(
                $table_name,
                array(
                    'origincode_sl_effects' => $view,
                    'sl_width' => $sl_width,
                    'sl_height' => $sl_height,
                    'videogallery_list_effects_s' => $videogallery_list_effects_s,
                    'description' => $sl_pausetime,
                    'param' => $sl_changespeed,
                    'sl_position' => $sl_position,
                    'pause_on_hover' => $pause_on_hover
                ),
                array('id' => $id)
            );
        }
        wp_die();
    }

    function origincode_gallery_video_admin_ajax_callback()
    {
        if (isset($_POST['task']) && $_POST['task'] == 'send_url_popup') {
            if ( !isset( $_POST["videoUniqueId"] ) || absint( $_POST['videoUniqueId'] ) != $_POST['videoUniqueId'] ) {
                echo json_encode(array('success'=>'0','message'=>'"videoUniqueId" parameter is required to be not negative integer'));
            }
            $video_unique_id = absint($_POST['videoUniqueId']);
            if (!isset($_REQUEST['editVideoNonce']) || !wp_verify_nonce($_REQUEST['editVideoNonce'], 'origincode_gallery_video_nonce_edit_video' . $video_unique_id)) {
                wp_die('Security check fail');
            }
            $video = origincode_gallery_video_get_video_id_from_url(esc_url($_POST['video_url']));
            $video_id = $video[0];
            $video_type = $video[1];
            $response = array(
                'video_id' => $video_id,
                'video_type' => $video_type
            );
            wp_die(json_encode($response));
        }
        if (isset($_POST['task']) && $_POST['task'] == 'set_new_video') {
            if (!isset($_REQUEST['insertVideoNonce']) || !wp_verify_nonce($_REQUEST['insertVideoNonce'], 'insert_new_video_nonce')) {
                wp_die('Security check fail');
            }
            $video = origincode_gallery_video_get_video_id_from_url(esc_url($_POST['video_url']));
            $video_id = $video[0];
            $video_type = $video[1];
            $response = array('video_id' => $video_id, 'video_type' => $video_type);
            wp_die(json_encode($response));
        }
    }

    function origincode_video_gallery_ajax_front_end_callback()
    {
        $origincode_gallery_video_get_option = origincode_gallery_video_get_default_general_options();
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
        if (isset($_POST['task']) && $_POST['task'] == "load_videos_content") {
            if (!isset($_REQUEST['galleryVideoContentLoadNonce']) || !wp_verify_nonce($_REQUEST['galleryVideoContentLoadNonce'], 'origincode_gallery_video_content_popup_nonce')) {
                wp_die('Security check fail');
            }
            global $wpdb;
            $page = 1;
            if (!empty($_POST["page"]) && is_numeric($_POST['page']) && $_POST['page'] > 0) {
                if ( !isset( $_POST["galleryVideoId"] ) || absint( $_POST['galleryVideoId'] ) != $_POST['galleryVideoId'] ) {
                    echo json_encode(array('success'=>'0','message'=>'"galleryVideoId" parameter is required to be not negative integer'));
                }
                $origincode_gallery_video_id = absint($_POST['galleryVideoId']);
                $page = absint($_POST["page"]);
                $num = absint($_POST['perpage']);
                $start = $page * $num - $num;
                $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC LIMIT %d,%d", $origincode_gallery_video_id, $start, $num);
                $page_videos = $wpdb->get_results($query);
                $output = '';
                $output_popup = '';
                $changePopup = absint($_POST['change_popup']);
                foreach ($page_videos as $key => $row) {
                    $link = str_replace('__5_5_5__', '%', $row->sl_url);
                    $video_name = str_replace('__5_5_5__', '%', $row->name);
                    $id = $row->id;
                    $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));
                    $result = substr($descnohtml, 0, 50);
                    $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                    if ($videourl[1] == 'youtube') {
                        if (empty($row->thumb_url)) {
                            $thumb_pic = '//img.youtube.com/vi/' . $videourl[0] . '/mqdefault.jpg';
                        } else {
                            $thumb_pic = $row->thumb_url;
                        }
                        $video = '<img src="' . $thumb_pic . '" alt="" />';
                        $video_src = '//www.youtube.com/embed/' . $videourl[0];
                    } else {
                        $hash = unserialize(wp_remote_fopen($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                        if (empty($row->thumb_url)) {
                            $imgsrc = $hash[0]['thumbnail_large'];
                        } else {
                            $imgsrc = $row->thumb_url;
                        }
                        $video = '<img src="' . $imgsrc . '" alt="" />';
                        $video_src = '//player.vimeo.com/video/' . $videourl[0] . '?title=0&amp;byline=0&amp;portrait=0';
                    }

                    ?>
                    <?php if (str_replace('__5_5_5__', '%', $row->sl_url) == '') {
                        $button = '';
                    } else {
                        if ($row->link_target == "on") {
                            $target = 'target="_blank"';
                        } else {
                            $target = '';
                        }
                        $button = '<div class="button-block"><a href="' . str_replace('__5_5_5__', '%', $row->sl_url) . '" ' . $target . ' >' . sanitize_text_field($_POST['linkbutton']) . '</a></div>';
                    }
                    $no_video_title = '';
                    if (empty($row->name) && (empty($link) || $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_show_linkbutton'] == 'off')) {
                        $no_video_title = 'no-video-title';
                    }
                    $output .= '<div class="video-element_' . $origincode_gallery_video_id . ' video-element ' . $no_video_title . '" id="origincode_videogallery_pupup_element_' . $row->id . '_child" tabindex="0" data-symbol="' . $video_name . '"  data-category="alkaline-earth">';
                    $output .= '<input type="hidden" class="pagenum" value="' . $page . '" />';
                    $output .= '<div class="image-block_' . $origincode_gallery_video_id . ' image-block">';
                    $output .= $video;
                    $output .= '<div class="videogallery-image-overlay"><a href="#' . $id . '"></a></div>';
                    $output .= '</div>';
                    $output .= '<div class="title-block_' . $origincode_gallery_video_id . '">';
                    $output .= '<h3>' . $video_name . '</h3>';
                    $output .= $button;
                    $output .= '</div>';
                    $output .= '</div>';

                    if (str_replace('__5_5_5__', '%', $row->sl_url) == '') {
                        $viwMoreButton = '';
                    } else {
                        if ($row->link_target == "on") {
                            $target = 'target="_blank"';
                        } else {
                            $target = '';
                        }
                        $viwMoreButton = '<div class="button-block"><a href="' . str_replace('__5_5_5__', '%', $row->sl_url) . '" ' . $target . ' >' . $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_linkbutton_text"] . '</a></div>';
                        $viwMoreButtonPopup = '<div class="button-block"><a href="' . str_replace('__5_5_5__', '%', $row->sl_url) . '" ' . $target . ' >' . $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_linkbutton_text"] . '</a></div>';
                    }
                    $popup_right_block = '';
                    if ($origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_show_popup_title"] == 'on') {
                        $popup_right_block .= '<h3 class="title">' . str_replace('__5_5_5__', '%', $row->name) . '</h3>';
                    }
                    if ($origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_show_description"] == 'on') {
                        $popup_right_block .= '<div	class="description">' . str_replace('__5_5_5__', '%', $row->description) . '</div>';
                    }
                    if ($origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_show_popup_linkbutton"] == 'on') {
                        $popup_right_block .= $viwMoreButtonPopup;
                    }
                    $nextPopup = $changePopup + 1;
                    $prevPopup = $changePopup - 1;
                    $output_popup = $output_popup . '
<li class="pupup-element" id="origincode_videogallery_pupup_element_' . $row->id . '">
	<div class="heading-navigation">
		<div style="display: inline-block; float: left;">
			<div class="left-change"><a href="#' . $prevPopup . '"
			     data-popupid="#' . $row->id . '"><</a></div>
			<div class="right-change"><a href="#' . $nextPopup . '"
			     data-popupid="#' . $row->id . '">></a></div>
		</div>
		<a href="#close" class="close"></a>
		<div style="clear:both;"></div>
	</div>
	<div class="popup-wrapper_' . $origincode_gallery_video_id . ' popup-wrapper">
		<div class="image-block_' . $origincode_gallery_video_id . ' image-block">
			<div class="hg_iframe_class">
				<div class="hg_iframe_class_sub"></div>
				<iframe class="hg_iframe_class"
			        src="' . $video_src . '" style="border: 0;"
			        allowfullscreen >
		        </iframe>
			</div>
		</div>
		<div class="right-block">
		' . $popup_right_block . '
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>
</li>
	';

                    $changePopup = $changePopup + 1;
                }
                echo json_encode(array("success" => 1, 'output' => $output, 'output_popup' => $output_popup));
                die();
            }
        }
///////////////////////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['task']) && $_POST['task'] == "load_videos_lightbox") {
            if (!isset($_REQUEST['galleryVideoLightboxLoadNonce']) || !wp_verify_nonce($_REQUEST['galleryVideoLightboxLoadNonce'], 'origincode_gallery_video_lightbox_nonce')) {
                wp_die('Security check fail');
            }
            global $wpdb;
            $page = 1;
            if (!empty($_POST["page"]) && is_numeric($_POST['page']) && $_POST['page'] > 0) {
                if ( !isset( $_POST["galleryVideoId"] ) || absint( $_POST['galleryVideoId'] ) != $_POST['galleryVideoId'] ) {
                    echo json_encode(array('success'=>'0','message'=>'"galleryVideoId" parameter is required to be not negative integer'));
                }
                $origincode_gallery_video_id = absint($_POST['galleryVideoId']);
                $page = absint($_POST["page"]);
                $num = absint($_POST['perpage']);
                $start = $page * $num - $num;
                $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC LIMIT %d,%d", $origincode_gallery_video_id, $start, $num);
                $page_videos = $wpdb->get_results($query);
                $output = '';
                foreach ($page_videos as $key => $row) {
                    $link = str_replace('__5_5_5__', '%', $row->sl_url);
                    $video_name = str_replace('__5_5_5__', '%', $row->name);
                    $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));
                    $result = substr($descnohtml, 0, 50);
                    $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                    if ($videourl[1] == 'youtube') {
                        if (empty($row->thumb_url)) {
                            $thumb_pic = '//img.youtube.com/vi/' . $videourl[0] . '/mqdefault.jpg';
                        } else {
                            $thumb_pic = $row->thumb_url;
                        }
                        $video = '<a class="vyoutube origincode_videogallery_item group1"  href="//www.youtube.com/embed/' . $videourl[0] . '" title="' . $video_name . '">
                                    <img src="' . $thumb_pic . '" alt="' . $video_name . '" />
                                    <div class="play-icon ' . $videourl[1] . '-icon"></div>
                                 </a>';
                    } else {
                        $hash = unserialize(wp_remote_fopen($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                        if (empty($row->thumb_url)) {
                            $imgsrc = $hash[0]['thumbnail_large'];
                        } else {
                            $imgsrc = $row->thumb_url;
                        }
                        $video = '<a class="vvimeo origincode_videogallery_item group1" href="http://player.vimeo.com/video/' . $videourl[0] . '" title="' . $video_name . '">
                                    <img src="' . $imgsrc . '" alt="" />
                                    <div class="play-icon ' . $videourl[1] . '-icon"></div>
                                 </a>';
                    }
                    if (str_replace('__5_5_5__', '%', $row->name) != "") {
                        if ($row->link_target == "on") {
                            $target = 'target="_blank"';
                        } else {
                            $target = '';
                        }
                        $button_title = '';
                        if ($link != '' || !empty($link))
                            $button_title .= '<a href="' . $link . '"' . $target . '>';
                        $button_title .= $video_name;
                        if ($link != '' || !empty($link))
                            $button_title .= '</a>';
                        $linkimg = '<div class="title-block_' . $origincode_gallery_video_id . '">' . $button_title . '</div>';
                    } else {
                        $linkimg = '';
                    }
                    $output .= '<div class="video-element_' . $origincode_gallery_video_id . ' video-element" tabindex="0" data-symbol="' . $video_name . '"  data-category="alkaline-earth">';
                    $output .= '<input type="hidden" class="pagenum" value="' . $page . '" />';
                    $output .= '<div class="image-block_' . $origincode_gallery_video_id . '">';
                    $output .= $video;
                    $output .= $linkimg;
                    $output .= '</div>';
                    $output .= '</div>';
                }
                echo json_encode(array("success" => $output));
                die();
            }
        }

////////////////////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['task']) && $_POST['task'] == "load_videos_justified") {
            if (!isset($_REQUEST['galleryVideoJustifiedLoadNonce']) || !wp_verify_nonce($_REQUEST['galleryVideoJustifiedLoadNonce'], 'origincode_gallery_video_justified_nonce')) {
                wp_die('Security check fail');
            }
            global $wpdb;
            $page = 1;
            if (!empty($_POST["page"]) && is_numeric($_POST['page']) && $_POST['page'] > 0) {
                $page = absint($_POST["page"]);
                $num = absint($_POST['perpage']);
                $start = $page * $num - $num;
                $origincode_gallery_video_id = absint(($_POST['galleryVideoId']));
                $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC LIMIT %d,%d", $origincode_gallery_video_id, $start, $num);
                $output = '';
                $page_videos = $wpdb->get_results($query);
                foreach ($page_videos as $key => $row) {
                    $video_name = str_replace('__5_5_5__', '%', $row->name);
                    $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                    if ($videourl[1] == 'youtube') {
                        if (empty($row->thumb_url)) {
                            $thumb_pic = '//img.youtube.com/vi/' . $videourl[0] . '/mqdefault.jpg';
                        } else {
                            $thumb_pic = $row->thumb_url;
                        }
                        $video = '<a class="vyoutube origincode_videogallery_item group1"  href="//www.youtube.com/embed/' . $videourl[0] . '" title="' . $video_name . '">
                                        <img  src="' . $thumb_pic . '" alt="' . $video_name . '" />
                                        <div class="play-icon ' . $videourl[1] . '-icon"></div>
                                    </a>';
                    } else {
                        $hash = unserialize(wp_remote_fopen($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                        if (empty($row->thumb_url)) {
                            $imgsrc = $hash[0]['thumbnail_large'];
                        } else {
                            $imgsrc = $row->thumb_url;
                        }
                        $video = '<a class="vvimeo origincode_videogallery_item group1" href="http://player.vimeo.com/video/' . $videourl[0] . '" title="' . $video_name . '">
                                        <img alt="' . $video_name . '" src="' . $imgsrc . '"/>
                                    </a>';
                    }
                    $output .= $video . '<input type="hidden" class="pagenum" value="' . $page . '" />';
                }
                ?>

                <?php
                echo json_encode(array("success" => $output));
                die();
            }
        }
////////////////////////////////////////////////////////////////////////////////////////////
        if (isset($_POST['task']) && $_POST['task'] == "load_videos_thumbnail") {
            if (!isset($_REQUEST['galleryVideoThumbnailLoadNonce']) || !wp_verify_nonce($_REQUEST['galleryVideoThumbnailLoadNonce'], 'origincode_gallery_video_thumbnail_nonce')) {
                wp_die('Security check fail');
            }
            global $wpdb;
            $page = 1;
            if (!empty($_POST["page"]) && is_numeric($_POST['page']) && $_POST['page'] > 0) {
                if ( !isset( $_POST["galleryVideoId"] ) || absint( $_POST['galleryVideoId'] ) != $_POST['galleryVideoId'] ) {
                    echo json_encode(array('success'=>'0','message'=>'"galleryVideoId" parameter is required to be not negative integer'));
                }
                $origincode_gallery_video_id = absint($_POST['galleryVideoId']);
                $page = absint($_POST["page"]);
                $num = absint($_POST['perpage']);
                $start = $page * $num - $num;
                $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC LIMIT %d,%d", $origincode_gallery_video_id, $start, $num);
                $output = '';
                $page_videos = $wpdb->get_results($query);
                foreach ($page_videos as $key => $row) {
                    $video_name = str_replace('__5_5_5__', '%', $row->name);
                    $video_thumb = $row->thumb_url;
                    $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                    if ($videourl[1] == 'youtube') {
                        if (empty($row->thumb_url)) {
                            $thumb_pic = '//img.youtube.com/vi/' . $videourl[0] . '/mqdefault.jpg';
                        } else {
                            $thumb_pic = $row->thumb_url;
                        }
                        $video = '<a  class="vyoutube origincode_videogallery_item group1"  href="//www.youtube.com/embed/' . $videourl[0] . '" title="' . $video_name . '"></a>
                                    <img src="' . $thumb_pic . '" alt="' . $video_name . '" />';
                    } else {

                        $hash = unserialize(wp_remote_fopen($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php"));

                        if (empty($row->thumb_url)) {
                            $imgsrc = $hash[0]['thumbnail_large'];
                        } else {
                            $imgsrc = $row->thumb_url;
                        }
                        $video = '<a  class="vvimeo origincode_videogallery_item group1" href="http://player.vimeo.com/video/' . $videourl[0] . '" title="' . $video_name . '"></a>
                                    <img src="' . $imgsrc . '" alt="' . $video_name . '" />';
                    }
                    $icon = origincode_gallery_video_youtube_or_vimeo($row->image_url);
                    if ($video_thumb != '') {
                        $thumb = '<div class="playbutton ' . $icon . '-icon"></div>';

                    } else {
                        $thumb = "";
                    }


                    $output .= '
                <li class="origincode_big_li">
                    <input type="hidden" class="pagenum" value="' . $page . '" />
                        ' . $video . '

                    <div class="overLayer"></div>
                    <div class="infoLayer">
                        <ul>
                            <li>
                                <h2>
                                    ' . $video_name . '
                                </h2>
                            </li>
                            <li>
                                <p>
                                    ' . wp_kses($_POST['thumbtext'], 'default') . '
                                </p>
                            </li>
                        </ul>
                    </div>
                    
                </li>
            ';

                }
                echo json_encode(array("success" => $output));
                die();
            }
        }
        ///////////////////////////////////////////////////////////////////////////////////////////


        if (isset($_POST['task']) && $_POST['task'] == "load_videos_blog_style") {
            global $wpdb;
            $page = 1;
            if (!empty($_POST["page"]) && is_numeric($_POST['page']) && $_POST['page'] > 0) {
                if ( !isset( $_POST["galleryVideoId"] ) || absint( $_POST['galleryVideoId'] ) != $_POST['galleryVideoId'] ) {
                    echo json_encode(array('success'=>'0','message'=>'"galleryVideoId" parameter is required to be not negative integer'));
                }
                $origincode_gallery_video_id = absint($_POST['galleryVideoId']);
                $page = absint($_POST["page"]);
                $num = absint($_POST['perpage']);
                $start = $page * $num - $num;
                $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC LIMIT %d,%d", $origincode_gallery_video_id, $start, $num);
                $output = '';
                $page_videos = $wpdb->get_results($query);
                foreach ($page_videos as $key => $row) {
                    $video_name = str_replace('__5_5_5__', '%', $row->name);
                    $video_desc = str_replace('__5_5_5__', '%', $row->description);
                    $video_thumb = $row->thumb_url;
                    if ($video_thumb == '') {
                        $thumbimglink = '';
                    } else {
                        $thumbimglink = '<img class="thumb_image" style="cursor: pointer;" src="' . $video_thumb . '" alt="" />';
                    }
                    $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                    if ($videourl[1] == 'youtube') {
                        $iframe = '<iframe class="video_view9_img" width="' . $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width'] . '" height="' . $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height'] . '" src="//www.youtube.com/embed/' . $videourl[0] . '" style="border: 0;" allowfullscreen></iframe>';
                    } else {
                        $iframe = '<iframe class="video_view9_img" width="' . $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width'] . '" height="' . $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height'] . '" src="//player.vimeo.com/video/' . $videourl[0] . '"  style="border: 0;" allowfullscreen></iframe>';
                    }
                    $icon = origincode_gallery_video_youtube_or_vimeo($row->image_url);
                    if ($video_thumb != '' || !empty($video_thumb) || !$video_thumb) {
                        $thumb = '<div class="playbutton ' . $icon . '-icon"></div>';

                    } else {
                        $thumb = "";
                    }
                    if ($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_image_position'] == 1) {

                        $output .= '
                <div class="video_view9_container">
                    <input type="hidden" class="pagenum" value="' . $page . '" />
                    <div class="video_view9_vid_wrapper">

                        <div class="thumb_wrapper" >
                            
                            ' . $thumbimglink . $thumb . '
                        </div>
                        <div id="thevideo" style="display: block;">
                            ' . $iframe . '
                        </div>
                    </div>
                    <h1 class="video_new_view_title">' . $video_name . '</h1>
                    <div class="video_new_view_desc">' . $video_desc . '</div>
                </div>
                <div class="clear"></div>
            ';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_image_position'] == 2) {


                        $output .= '
                <div class="video_view9_container">
                    <input type="hidden" class="pagenum" value="' . $page . '" />
                    <h1 class="video_new_view_title">' . $video_name . '</h1>
                    <div class="video_view9_vid_wrapper">

                        <div class="thumb_wrapper" >
                            
                            ' . $thumbimglink . $thumb . '
                        </div>
                        <div id="thevideo" style="display: block;">
                            ' . $iframe . '
                        </div>
                    </div>
                    
                    <div class="video_new_view_desc">' . $video_desc . '</div>
                </div>
                <div class="clear"></div>
            ';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_image_position'] == 3) {


                        $output .= '
                <div class="video_view9_container">
                    <input type="hidden" class="pagenum" value="' . $page . '" />
                    <h1 class="video_new_view_title">' . $video_name . '</h1>
                    <div class="video_new_view_desc">' . $video_desc . '</div>
                    <div class="video_view9_vid_wrapper">

                        <div class="thumb_wrapper" >
                            
                            ' . $thumbimglink . $thumb . '
                        </div>
                        <div id="thevideo" style="display: block;">
                            ' . $iframe . '
                        </div>
                    </div>
                    
                    
                </div>
                <div class="clear"></div>
            ';
                    }
                }
                echo json_encode(array("success" => $output));
                die();
            }
        }
    }

    function share_count_views_ajax_callback_function()
    {
        global $wpdb;
        if (isset($_POST['task'])) {
            if ($_POST['task'] == "data-id") {
                if (origincode_gallery_video_get_ip() != 'UNKNOWN') {
                    $ip = origincode_gallery_video_get_ip();
                    if ( !isset( $_POST["id"] ) || absint( $_POST['id'] ) != $_POST['id'] ) {
                        echo json_encode(array('success'=>'0','message'=>'"id" parameter is required to be not negative integer'));
                    }
                    $vid_id = absint($_POST['id']);
                    $sql_origin_result = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_params_ip WHERE ip=%s and video_id=%d", $ip, $vid_id);
                    $ipcount = $wpdb->get_results($sql_origin_result);
                    $ipcount = count($ipcount);
                    if ($ipcount == 0) {
                        $sql_origin_result_view = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videogallery_params_ip WHERE id=%d", $vid_id);
                        $view_count = $wpdb->get_results($sql_origin_result_view);
                        $current_date = date("Y-m-d H:i:s");
                        $sql_origincode_insert = "INSERT INTO " . $wpdb->prefix . "origincode_videogallery_params_ip (video_id, ip, date) VALUES ('" . $vid_id . "','" . origincode_gallery_video_get_ip() . "','" . $current_date . "')";
                        $wpdb->query($sql_origincode_insert);
                        echo json_encode(array('response' => 'successRecord'));
                        wp_die();
                    }
                }
            }
        }
    }
}
