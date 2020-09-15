<div id="main-slider_<?php echo $origincode_gallery_videoID; ?>"
     class="liquid-slider main-slider view-<?php echo esc_attr($view_slug); ?> gallery-video-content"
     data-pause-hover="<?php echo esc_attr($origincode_gallery_video[0]->pause_on_hover); ?>"
     data-autoslide="<?php echo esc_attr($origincode_gallery_video[0]->autoslide); ?>"
     data-slide-duration="<?php echo esc_attr($origincode_gallery_video[0]->param); ?>"
     data-slide-interval="<?php echo esc_attr($origincode_gallery_video[0]->description); ?>"
     data-gallery-video-id="<?php echo $origincode_gallery_videoID; ?>">
	<?php
	foreach ( $videos as $key => $row ) {
		$imgurl     = explode( ";", $row->image_url );
		$link       = str_replace( '__5_5_5__', '%', $row->sl_url );
		$descnohtml = strip_tags( str_replace( '__5_5_5__', '%', $row->description ) );
		$result     = substr( $descnohtml, 0, 50 );
		?>
		<div class="slider-content">
			<div class="slider-content-wrapper">
				<div class="image-block_<?php echo $origincode_gallery_videoID; ?>">
					<?php
					$videourl = origincode_gallery_video_get_video_id_from_url( $row->image_url );
					if ( $videourl[1] == 'youtube' ) {
						if ( empty( $row->thumb_url ) ) {
							$thumb_pic = '//img.youtube.com/vi/' . esc_attr($videourl[0]) . '/mqdefault.jpg';
						} else {
							$thumb_pic = $row->thumb_url;
						}
						?>
						<a data-id="<?php echo $row->id; ?>" class="vyoutube origincode_videogallery_item group<?php echo $origincode_gallery_videoID; ?>"
						   href="//www.youtube.com/embed/<?php echo $videourl[0]; ?>"
                           data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                           title="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>">
							<img src="<?php echo esc_attr( $thumb_pic ); ?>" alt="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>"/>
							<div class="play-icon <?php echo esc_attr($videourl[1]); ?>-icon"></div>
						</a>
						<?php
					} else {
						$hash = @unserialize( wp_remote_fopen( $protocol . "vimeo.com/api/v2/video/" . esc_attr($videourl[0]) . ".php" ) );
						if ( empty( $row->thumb_url ) ) {
							$imgsrc = $hash[0]['thumbnail_large'];
						} else {
							$imgsrc = $row->thumb_url;
						}
						?>
						<a class="vvimeo origincode_videogallery_item group<?php echo $origincode_gallery_videoID; ?>" data-id="<?php echo $row->id; ?>"
						   href="//player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>"
                           data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                            title="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>">
							<img src="<?php echo esc_attr( $imgsrc ); ?>" alt="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>" />
							<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
						</a>
						<?php
					}
					?>
				</div>
				<div class="right-block">
					<div><h2 class="title"><?php echo str_replace( '__5_5_5__', '%', $row->name ); ?></h2></div>
					<?php if ( $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_show_description"] == 'on'  && strlen($row->description) > 0  ) { ?>
						<div
							class="description"><?php echo str_replace( '__5_5_5__', '%', $row->description ); ?></div><?php } ?>
					<?php if ( $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_show_linkbutton"] == 'on' && strlen(esc_attr($link)) > 0) { ?>
						<div class="button-block">
							<a href="<?php echo esc_attr($link); ?>"
							   data-id="b<?php echo $row->id; ?>" <?php if ( $row->link_target == "on" ) {
								echo 'target="_blank"';
							} ?>><?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_linkbutton_text"]; ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php
	} ?>
</div>