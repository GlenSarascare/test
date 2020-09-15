<section id="origincode_videogallery_content_<?php echo esc_attr($origincode_gallery_videoID); ?>" class="gallery-video-content"
         data-gallery-video-id="<?php echo esc_attr($origincode_gallery_videoID); ?>"
         data-gallery-video-perpage="<?php echo $num; ?>">
    <div id="origincode_videogallery_container_<?php echo esc_attr($origincode_gallery_videoID); ?>"
         class="origincode_videogallery_container super-list variable-sizes clearfix view-<?php echo esc_attr($view_slug); ?>"
         data-show-center="<?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_content_in_center_lightbox']); ?>">
        <div id="origincode_videogallery_container_moving_<?php echo esc_attr($origincode_gallery_videoID); ?>"
             class="super-list variable-sizes clearfix">
            <input type="hidden" class="pagenum" value="1"/>
            <input type="hidden" id="total" value="<?= esc_attr($total); ?>"/>
            <?php

            foreach ($page_videos as $key => $row) {
                $link = str_replace('__5_5_5__', '%', esc_url($row->sl_url));
                $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));
                $result = substr($descnohtml, 0, 50);
                ?>
                <div data-id="<?php echo esc_attr($row->id); ?>"
                     class="video-element_<?php echo $origincode_gallery_videoID; ?> video-element" tabindex="0"
                     data-symbol="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                     data-category="alkaline-earth">
                    <div class="image-block_<?php echo esc_attr($origincode_gallery_videoID); ?>">
                        <?php
                        $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                        if ($videourl[1] == 'youtube') {
                            if (empty($row->thumb_url)) {
                                $thumb_pic = esc_url('//img.youtube.com/vi/' .$videourl[0]. '/mqdefault.jpg');
                            } else {
                                $thumb_pic = $row->thumb_url;
                            }
                            ?>
                            <a class="vyoutube origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
                               href="<?php echo esc_url("//www.youtube.com/embed/". $videourl[0]); ?>"
                               title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                               data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                               data-id="<?php echo esc_attr($row->id); ?>">
                                <img src="<?php echo esc_attr($thumb_pic); ?>"
                                     alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"/>
                                <div class="play-icon <?php echo esc_url($videourl[1]); ?>-icon"></div>
                            </a>
                            <?php
                        } else {
                            $hash = @unserialize(wp_remote_fopen(esc_url($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php")));
                            if (empty($row->thumb_url)) {
                                $imgsrc = esc_attr($hash[0]['thumbnail_large']);
                            } else {
                                $imgsrc = esc_url($row->thumb_url);
                            }
                            ?>
                            <a class="vvimeo origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
                               href="<?php  echo esc_url("//player.vimeo.com/video/". $videourl[0]); ?>"
                               title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                               data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                               data-id="<?php echo esc_attr($row->id); ?>">
                                <img src="<?php echo esc_attr($imgsrc); ?>" alt=""/>
                                <div class="play-icon <?php echo esc_url($videourl[1]); ?>-icon"></div>
                            </a>
                            <?php
                        }
                        ?>
                    </div>
                    <?php if (str_replace('__5_5_5__', '%', $row->name) != "") { ?>
                        <div class="title-block_<?php echo esc_attr($origincode_gallery_videoID); ?>">
                        <?php if($link != '') :?>
                            <a href="<?php echo $link; ?>" <?php if ($row->link_target == "on") {
                                echo 'target="_blank"';
                            } ?>>
                        <?php endif;?>
                            <?php echo str_replace('__5_5_5__', '%', $row->name); ?>
                        <?php if($link != '') :?>
                            </a>
                        <?php endif;?>
                        </div>
                    <?php } ?>
                </div>
                <?php
            } ?>
        </div>
    </div>

    <?php
    $a = $disp_type;
    if ($a == 1 && $num < $total_videos) {
        $origincode_gallery_video_lightbox_nonce = wp_create_nonce('origincode_gallery_video_lightbox_nonce');
        ?>
        <div class="load_more4">
            <div class="load_more_button4"
                 data-lightbox-nonce-value="<?php echo esc_attr($origincode_gallery_video_lightbox_nonce); ?>"><?= esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loadmore_text']); ?></div>
            <div class="loading4"><img
                    src="<?php if ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loading_type'] == '1') {
                        echo $path_site . '/arrows/loading1.gif';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loading_type'] == '2') {
                        echo $path_site . '/arrows/loading4.gif';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loading_type'] == '3') {
                        echo $path_site . '/arrows/loading36.gif';
                    } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loading_type'] == '4') {
                        echo $path_site . '/arrows/loading51.gif';
                    } ?>"></div>
        </div>
        <?php
    } elseif ($a == 0) {
        ?>
        <div class="paginate4">
            <?php
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
            if ($page != 1)
                $pervpage = '<a href= ' . $checkREQ . '=1><i class="icon-style4 origincodeicons-fast-backward" ></i></a>  
                                   <a href= ' . $checkREQ . '=' . ($page - 1) . '><i class="icon-style4 origincodeicons-chevron-left"></i></a> ';
            $nextpage = '';
            if ($page != $total)
                $nextpage = ' <a href= ' . $checkREQ . '=' . ($page + 1) . '><i class="icon-style4 origincodeicons-chevron-right"></i></a>  
                                   <a href= ' . $checkREQ . '=' . $total . '><i class="icon-style4 origincodeicons-fast-forward" ></i></a>';
            echo $pervpage . $page . '/' . $total . $nextpage;
            ?>
        </div>
        <?php
    }
    ?>
</section>