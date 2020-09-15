<?php $disable_rel = 'on';
$autoload = 'off';
?>
<div id="main-playlist_<?php echo esc_attr($origincode_gallery_videoID); ?>"
         class="main-playlist view-<?php echo esc_attr($view_slug); ?> "
         data-scroll="<?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_thumb_scroll']); ?>"
         data-position="<?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_thumb_position']); ?>"
         data-origincode_gallery_video_id="<?php echo esc_attr($origincode_gallery_videoID); ?>">
       <?php if ($origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_thumb_position']=='bottom') { ?>
        <div class="playlist-container-<?php echo esc_attr($origincode_gallery_videoID); ?> playlist-container">
            <div class="playlist-scroll">
                <ul id="vid-list" class="playlist-thumbs">
                    <?php
                    foreach ($videos as $key => $row) {
                        echo $row->description;
                        $imgurl = explode(";", $row->image_url);
                        $link = str_replace('__5_5_5__', '%', $row->sl_url);
                        $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));

                        $result = substr($descnohtml, 0, 80);

                        $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                        if ($videourl[1] == 'youtube') {

                            $rel_videos = '';
                            if ($disable_rel == 'on' && $autoload == 'on') {
                                $rel_videos .= '?rel=0&autoplay=1';

                            } else if ($disable_rel == 'off' && $autoload == 'on') {
                                $rel_videos .= '?autoplay=1';

                            } else if ($disable_rel == 'on' && $autoload == 'off') {
                                $rel_videos .= '?rel=0&autoplay=0';
                            }

                            if (empty($row->thumb_url)) {
                                $thumb_pic = '//img.youtube.com/vi/' . $videourl[0] . '/mqdefault.jpg';
                            } else {
                                $thumb_pic = $row->thumb_url;
                            }
                            ?>
                            <li class="playlist-thumb-container">
                                <a data-id="<?php echo $row->id; ?>"
                                   class="vyoutube origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
                                   href="//www.youtube.com/embed/<?php echo $videourl[0] . $rel_videos; ?>"
                                   title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>" >
                                    <div class="vid-thumb"><img src="<?php echo esc_attr($thumb_pic); ?>"
                                                                alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                                                /></div>
                                    <div class="playlist-thumb-desc <?php if (!strlen($row->name) && !strlen($row->description)) {echo 'empty_desc';}?>" >
                                        <div class="vid-thumb-title"><?php echo str_replace('__5_5_5__', '%', $row->name); ?></div>
                                        <div class="vid-thumb-description"><?php echo $result ?></div>
                                    </div>
                                </a>
                            </li>
                            <?php
                        } else {
                            $hash = @unserialize(wp_remote_fopen($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                            if (empty($row->thumb_url)) {
                                $imgsrc = $hash[0]['thumbnail_large'];
                            } else {
                                $imgsrc = $row->thumb_url;
                            }
                            ?>
                            <li class="playlist-thumb-container">
                                <a class="vvimeo origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
                                   data-id="<?php echo esc_attr($row->id); ?>"
                                   href="//player.vimeo.com/video/<?php if ($autoload == 'on') {
                                       if (get_option('origincode_gallery_video_lightbox_type') === 'old_type') {
                                           $videourl[0] .= '?autoplay=1';
                                       } else {
                                           $videourl[0] .= '?autoplay=0';
                                       }
                                   }
                                   echo $videourl[0]; ?>"
                                   title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>">
                                    <div class="vid-thumb">
                                        <img src="<?php echo esc_attr($imgsrc); ?>"
                                             alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                             width="46px" />
                                    </div>
                                    <div class="playlist-thumb-desc <?php if (!strlen($row->name) && !strlen($row->description)) {echo 'empty_desc';}?>" >
                                        <div class="vid-thumb-title"><?php echo str_replace('__5_5_5__', '%', $row->name); ?></div>
                                        <div class="vid-thumb-description"><?php echo $result ?></div>
                                    </div>
                                </a>
                            </li>
                            <?php
                        }
                    } ?>
                </ul>
            </div>
            <div class="video-wrapper">
                <div class="socialIcons"></div>
                <iframe class="main-video main-video<?php echo esc_attr($origincode_gallery_videoID); ?>" width="100%"
                        height="100%" src="" frameborder="0" allowfullscreen="" style="margin:0;"></iframe>
            </div>
        </div>
       <?php } else { ?>
           <div class="playlist-container-<?php echo esc_attr($origincode_gallery_videoID); ?> playlist-container">

               <div class="video-wrapper">
                   <iframe class="main-video main-video<?php echo esc_attr($origincode_gallery_videoID); ?>" width="100%"
                           height="100%" src="" frameborder="0" allowfullscreen="" style="margin:0;"></iframe>
               </div>
               <div class="playlist-scroll">
                   <ul id="vid-list" class="playlist-thumbs">
                       <?php
                       foreach ($videos as $key => $row) {
                           $imgurl = explode(";", $row->image_url);
                           $link = str_replace('__5_5_5__', '%', $row->sl_url);
                           $descnohtml = strip_tags(str_replace('__5_5_5__', '%', $row->description));
                           $result = substr($descnohtml, 0, 80);
                           $videourl = origincode_gallery_video_get_video_id_from_url($row->image_url);
                           if ($videourl[1] == 'youtube') {

                               $rel_videos = '';
                               if ($disable_rel == 'on' && $autoload == 'on') {
                                   $rel_videos .= '?rel=0&autoplay=1';

                               } else if ($disable_rel == 'off' && $autoload == 'on') {
                                   $rel_videos .= '?autoplay=1';

                               } else if ($disable_rel == 'on' && $autoload == 'off') {
                                   $rel_videos .= '?rel=0&autoplay=0';
                               }

                               if (empty($row->thumb_url)) {
                                   $thumb_pic = '//img.youtube.com/vi/' . $videourl[0] . '/mqdefault.jpg';
                               } else {
                                   $thumb_pic = $row->thumb_url;
                               }
                               ?>
                               <li class="playlist-thumb-container">
                                   <a data-id="<?php echo $row->id; ?>"
                                      class="vyoutube origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
                                      href="//www.youtube.com/embed/<?php echo $videourl[0] . $rel_videos; ?>"
                                      title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>">
                                       <div class="vid-thumb"><img src="<?php echo esc_attr($thumb_pic); ?>" alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"/></div>
                                       <div class="playlist-thumb-desc  <?php if (!strlen($row->name) && !strlen($row->description)) {echo 'empty_desc';}?>" >
                                           <div class="vid-thumb-title"><?php echo str_replace('__5_5_5__', '%', $row->name); ?></div>
                                           <div class="vid-thumb-description"><?php echo $result ?></div>
                                       </div>
                                   </a>
                               </li>
                               <?php
                           } else {
                               $hash = @unserialize(wp_remote_fopen($protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                               if (empty($row->thumb_url)) {
                                   $imgsrc = $hash[0]['thumbnail_large'];
                               } else {
                                   $imgsrc = $row->thumb_url;
                               }
                               ?>
                               <li class="playlist-thumb-container">
                                   <a class="vvimeo origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
                                      data-id="<?php echo esc_attr($row->id); ?>"
                                      href="//player.vimeo.com/video/<?php if ($autoload == 'on') {
                                          if (get_option('origincode_gallery_video_lightbox_type') === 'old_type') {
                                              $videourl[0] .= '?autoplay=1';
                                          } else {
                                              $videourl[0] .= '?autoplay=0';
                                          }
                                      }
                                      echo $videourl[0]; ?>"
                                      title="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>" >
                                       <div class="vid-thumb">
                                           <img src="<?php echo esc_attr($imgsrc); ?>"
                                                alt="<?php echo str_replace('__5_5_5__', '%', $row->name); ?>"
                                                width="46px" />
                                       </div>
                                       <div class="playlist-thumb-desc <?php if (!strlen($row->name) && !strlen($row->description)) {echo 'empty_desc';}?>" >
                                           <div class="vid-thumb-title"><?php echo str_replace('__5_5_5__', '%', $row->name); ?></div>
                                           <div class="vid-thumb-description"><?php echo $result ?></div>
                                       </div>
                                   </a>
                               </li>
                               <?php
                           }
                       } ?>
                   </ul>
               </div>
           </div>
       <?php } ?>
    </div>
