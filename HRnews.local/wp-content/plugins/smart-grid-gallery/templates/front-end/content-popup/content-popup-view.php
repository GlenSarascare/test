<section id="origincode_videogallery_content_<?php echo esc_attr($origincode_gallery_videoID); ?>" class="gallery-video-content"
         data-gallery-video-id="<?php echo esc_attr($origincode_gallery_videoID); ?>" data-gallery-video-perpage="<?php echo esc_attr($num); ?>">
    <div id="origincode_videogallery_container_<?php echo esc_attr($origincode_gallery_videoID); ?>"
         class="origincode_videogallery_container super-list variable-sizes clearfix view-<?php echo esc_attr($view_slug); ?>"
         data-show-center="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_content_in_center_popup']; ?>"
         data-image-behaviour="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_natural_size_contentpopup']; ?>">
        <div id="origincode_videogallery_container_moving_<?php echo esc_attr($origincode_gallery_videoID); ?>">
            <input type="hidden" class="pagenum" value="1"/>
            <input type="hidden" id="total" value="<?php echo esc_attr($total); ?>"/>
            <?php
            foreach ($page_videos as $key => $row) {
                $link = str_replace('__5_5_5__', '%', esc_url($row->sl_url));
                $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));
                $result = substr($descnohtml, 0, 50);
                $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
                ?>
                <div
                    class="video-element_<?php echo $origincode_gallery_videoID; ?> video-element <?php if (empty($row->name) && (empty($link) || $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_show_linkbutton'] == 'off')) echo 'no-video-title'; ?>"
                    id="origincode_videogallery_pupup_element_<?php echo $row->id; ?>_child" tabindex="0"
                    data-symbol="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                    data-category="alkaline-earth">
                    <div class="image-block_<?php echo $origincode_gallery_videoID; ?> image-block">
                        <?php
                        $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                        if ($videourl[1] == 'youtube') {
                            if (empty($row->thumb_url)) {
                                $thumb_pic = '//img.youtube.com/vi/' . $videourl[0] . '/mqdefault.jpg';
                            } else {
                                $thumb_pic = $row->thumb_url;
                            }
                            ?>


                            <img src="<?php echo esc_attr($thumb_pic); ?>" alt=""/>
                            <?php
                        } else {
                            $hash = @unserialize(wp_remote_fopen($protocol."vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                            if (empty($row->thumb_url)) {
                                $imgsrc = $hash[0]['thumbnail_large'];
                            } else {
                                $imgsrc = $row->thumb_url;
                            }

                            ?>
                            <img src="<?php echo esc_attr($imgsrc); ?>" alt=""/>
                            <?php
                        }
                        ?>
                        <?php if (str_replace('__5_5_5__', '%', esc_url($row->sl_url)) == '') {
                            $viwMoreButton = '';
                        } else {
                            if ($row->link_target == "on") {
                                $target = 'target="_blank"';
                            } else {
                                $target = '';
                            }
                            $viwMoreButton = '<div class="button-block"><a href="' . str_replace('__5_5_5__', '%', $row->sl_url) . '" ' . $target . ' >' . $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_linkbutton_text"] . '</a></div>';
                        }


                        ?>
                        <div class="videogallery-image-overlay"><a href="#<?php echo esc_attr($row->id); ?>"></a></div>
                    </div>
                    <?php if ($row->name != '' || $link != ''): ?>
                        <div class="title-block_<?php echo esc_attr($origincode_gallery_videoID); ?>">
                            <h3><?php echo str_replace('__5_5_5__', '%', $row->name); ?></h3>
                            <?php if ($origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_show_linkbutton"] == 'on') { ?>
                                <?php echo $viwMoreButton ?>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            } ?>
        </div>
        <div style="clear:both;"></div>
    </div>
    <?php
    $a = $disp_type;
    if ($a == 1 && $num < $total_videos) {
	    $content_popup_nonce = wp_create_nonce('origincode_gallery_video_content_popup_nonce');
        ?>
        <div class="load_more5">
            <div
                class="load_more_button5"
                data-content-nonce-value="<?php echo esc_attr($content_popup_nonce); ?>"><?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loadmore_text']); ?></div>
            <div class="loading5"><img
                    src="<?php if ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loading_type'] == '1') {
                        echo $path_site . '/arrows/loading1.gif';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loading_type'] == '2') {
                        echo $path_site . '/arrows/loading4.gif';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loading_type'] == '3') {
                        echo $path_site . '/arrows/loading36.gif';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loading_type'] == '4') {
                        echo $path_site . '/arrows/loading51.gif';
                    } ?>"></div>
        </div>
        <?php
    } elseif ($a == 0) {
        ?>
        <div class="paginate5">
            <?php
            $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
            $actual_link = esc_attr($protocol) . esc_url($_SERVER['HTTP_HOST']) . esc_url($_SERVER['REQUEST_URI']) . "";
            $checkREQ = '';
            $pattern = "/\?p=/";
            $pattern2 = "/&page-video[0-9]+=[0-9]+/";
            if (preg_match($pattern, $actual_link)) {
                if (preg_match($pattern2, $actual_link)) {
                    $actual_link = preg_replace($pattern2, '', $actual_link);
                }
                $checkREQ = $actual_link . '&page-video' . $origincode_gallery_videoID . $pID;
            } else {
                $checkREQ = '?page-video' . $origincode_gallery_videoID . $pID;
            }
            $pervpage = '';
            if ($page != 1) {
                $pervpage = '<a href= ' . $checkREQ . '=1><i class="icon-style5 origincodeicons-fast-backward" ></i></a>  
	                               <a href= ' . $checkREQ . '=' . ($page - 1) . '><i class="icon-style5 origincodeicons-chevron-left"></i></a> ';
            }
            $nextpage = '';
            if ($page != $total) {
                $nextpage = ' <a href= ' . $checkREQ . '=' . ($page + 1) . '><i class="icon-style5 origincodeicons-chevron-right"></i></a>  
                                   <a href= ' . $checkREQ . '=' . $total . '><i class="icon-style5 origincodeicons-fast-forward" ></i></a>';
            }
            echo $pervpage . $page . '/' . $total . $nextpage;
            ?>
        </div>
        <?php
    }
    ?>
</section>
<ul id="origincode_videogallery_popup_list_<?php echo esc_attr($origincode_gallery_videoID); ?>" class="hg_video_popup">
    <?php
    $changePopup = 1;
    foreach ($page_videos as $key => $row) {
        $imgurl = explode(";", esc_url($row->image_url));
        $link = str_replace('__5_5_5__', '%', esc_url($row->sl_url));
        $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));
        $result = substr($descnohtml, 0, 50);
        ?>
        <li class="pupup-element" id="origincode_videogallery_pupup_element_<?php echo esc_attr($row->id); ?>">
            <div class="heading-navigation">
                <div style="display: inline-block; float: left;">
                    <div class="left-change"><a href="#<?php echo $changePopup - 1; ?>"
                                                data-popupid="#<?php echo $row->id; ?>"><</a></div>
                    <div class="right-change"><a href="#<?php echo $changePopup + 1; ?>"
                                                 data-popupid="#<?php echo $row->id; ?>">></a></div>
                </div>
                <?php $changePopup = $changePopup + 1; ?>
                <a href="#close" class="close"></a>
                <div style="clear:both;"></div>
            </div>
            <div class="popup-wrapper_<?php echo $origincode_gallery_videoID; ?> popup-wrapper">
                <div class="image-block_<?php echo $origincode_gallery_videoID; ?> image-block">
                    <?php
                    $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                    if ($videourl[1] == 'youtube') {
                        ?>
                        <div class="hg_iframe_class">
                            <div class="hg_iframe_class_sub"></div>
                            <iframe class="hg_iframe_class"
                                    src="<?php  echo esc_url("//www.youtube.com/embed/". $videourl[0]); ?>" style="border: 0;"
                                    allowfullscreen></iframe>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="hg_iframe_class">
                            <div class="hg_iframe_class_sub"></div>
                            <iframe
                                src="<?php echo esc_url("//player.vimeo.com/video/".$videourl[0]); ?>?title=0&amp;byline=0&amp;portrait=0"
                                style="border: 0;" allowfullscreen></iframe>
                        </div>
                        <?php
                    }
                    ?>
                    <?php if (str_replace('__5_5_5__', '%', $row->sl_url) == '') {
                        $viwMoreButton = '';
                    } else {
                        if ($row->link_target == "on") {
                            $target = 'target="_blank"';
                        } else {
                            $target = '';
                        }
                        $viwMoreButton = '<div class="button-block"><a href="' . str_replace('__5_5_5__', '%', $row->sl_url) . '" ' . $target . ' >' . $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_linkbutton_text"] . '</a></div>';
                    }


                    ?>
                </div>
                <div class="right-block">
                    <?php if ($origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_show_popup_title"] == 'on') { ?><h3
                        class="title"><?php echo str_replace('__5_5_5__', '%', $row->name); ?></h3><?php } ?>
                    <?php if ($origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_show_description"] == 'on') { ?>
                        <div
                            class="description"><?php echo str_replace('__5_5_5__', '%', $row->description); ?></div><?php } ?>
                    <?php if ($origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_show_popup_linkbutton"] == 'on') { ?>
                        <?php echo $viwMoreButton; ?>
                    <?php } ?>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </li>
        <?php
    } ?>
</ul>