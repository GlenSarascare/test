<section id="thumbwrapper<?php echo esc_attr($origincode_gallery_videoID); ?>" class="gallery-video-content"
         data-gallery-video-perpage="<?php echo esc_attr($num); ?>" data-gallery-video-id="<?php echo esc_attr($origincode_gallery_videoID); ?>">

    <input type="hidden" class="pagenum" value="1"/>
    <ul id="origincode_videogallery" class="origincode_videogallery view-<?php echo esc_attr($view_slug); ?>">
        <li id="fullPreview"></li>
        <input type="hidden" id="total" value="<?php echo esc_attr($total); ?>"/>
        <?php foreach ($page_videos as $key => $row) { ?>
            <li class="origincode_big_li" data-id="<?php echo esc_attr($row->id); ?>">
                <?php
                $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                $thumb_pic = '//img.youtube.com/vi/' . esc_attr($videourl[0]) .'/mqdefault.jpg';
                if ($videourl[1] == 'youtube') {
                    if (empty($row->thumb_url)) {
                        $thumb_pic = '//img.youtube.com/vi/' . esc_attr($videourl[0]) . '/mqdefault.jpg';
                    } else {
                        $thumb_pic = $row->thumb_url;
                    }
                    ?>
                    <a class="vyoutube origincode_videogallery_item group<?php echo $origincode_gallery_videoID; ?>"
                       href="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>"
                       title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                       data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                       data-id="<?php echo esc_attr($row->id); ?>"></a>
                    <img src="<?php echo esc_attr($thumb_pic); ?>"
                         alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"/>
                    <?php
                } else {
                    $hash = @unserialize(wp_remote_fopen($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                    if (empty($row->thumb_url)) {
                        $imgsrc = $hash[0]['thumbnail_large'];
                    } else {
                        $imgsrc = $row->thumb_url;
                    }
                    ?>
                    <a class="vvimeo origincode_videogallery_item group<?php echo $origincode_gallery_videoID; ?>"
                       href="//player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>"
                       title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                       data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                       data-id="<?php echo esc_attr($row->id); ?>"></a>
                    <img src="<?php echo esc_attr($imgsrc); ?>"
                         alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"/>
                    <?php
                }
                ?>
                <div class="overLayer"></div>
                <div class="infoLayer">
                    <ul>
                        <li>
                            <h2>
                                <?php echo str_replace('__5_5_5__', '%', $row->name); ?>
                            </h2>
                        </li>
                        <li>
                            <p>
                                <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_view_text"]; ?>
                            </p>
                        </li>
                    </ul>
                </div>
            </li>
        <?php } ?>

    </ul>
    <?php
    $a = $disp_type;

    if ($a == 1 && $num < $total_videos) {

        $thubnail_nonce = wp_create_nonce('origincode_gallery_video_thumbnail_nonce');
        ?>
        <div class="load_more3">
            <div class="load_more_button3"
                 data-thumbnail-load-nonce="<?php echo esc_attr($thubnail_nonce); ?>"><?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loadmore_text']); ?></div>
            <div class="loading3"><img
                        src="<?php if ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loading_type'] == '1') {
                            echo $path_site . '/arrows/loading1.gif';
                        } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loading_type'] == '2') {
                            echo $path_site . '/arrows/loading4.gif';
                        } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loading_type'] == '3') {
                            echo $path_site . '/arrows/loading36.gif';
                        } elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loading_type'] == '4') {
                            echo $path_site . '/arrows/loading51.gif';
                        } ?>"></div>
        </div>
        <?php
    } elseif ($a == 0 ) {
        ?>
        <div class="paginate3">
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
            if ($page != 1) {
                $pervpage = '<a href= ' . $checkREQ . '=1><i class="icon-style3 origincodeicons-fast-backward" ></i></a>  
	                               <a href= ' . $checkREQ . '=' . ($page - 1) . '><i class="icon-style3 origincodeicons-chevron-left"></i></a> ';
            }
            $nextpage = '';
            if ($page != $total) {
                $nextpage = ' <a href= ' . $checkREQ . '=' . ($page + 1) . '><i class="icon-style3 origincodeicons-chevron-right"></i></a>  
                                   <a href= ' . $checkREQ . '=' . $total . '><i class="icon-style3 origincodeicons-fast-forward" ></i></a>';
            }
            echo $pervpage . $page . '/' . $total . $nextpage;
            ?>
        </div>
        <?php
    }
    ?>
</section>