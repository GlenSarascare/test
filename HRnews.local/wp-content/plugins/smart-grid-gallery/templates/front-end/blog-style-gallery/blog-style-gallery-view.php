<div class="galery_video_view9_cont_list"
     id="galery_video_view9_cont_list<?php echo esc_attr($origincode_gallery_videoID); ?>"
     data-gallery-video-perpage="<?php echo esc_attr($num); ?>" data-gallery-video-id="<?php echo esc_attr($origincode_gallery_videoID); ?>">
	<div id="origincode_gallery_video_view9_cont_list<?php echo esc_attr($origincode_gallery_videoID); ?>" class="origincode_gallery_video_view9_cont_list view-<?php echo esc_attr($view_slug); ?>">
		<input type="hidden" id="total" value="<?php echo esc_attr($total); ?>"/>
		<?php
		foreach ( $page_videos as $key => $row ) {
			$videourl    = esc_url($row->image_url);
			$pattern     = '/watch\?v=/';
			$videourl    = preg_replace( $pattern, 'embed/', $videourl );
			$icon        = origincode_gallery_video_youtube_or_vimeo( $videourl );
			$video_name  = str_replace( '__5_5_5__', '%', $row->name );
			$video_desc  = str_replace( '__5_5_5__', '%', $row->description );
			$video_thumb = $row->thumb_url;
			if ( $video_thumb != '' ){
				$iframe_thumbclass = 'iframe-thumb';
			}
			else {
				$iframe_thumbclass = '';
			}

			if ( $origincode_gallery_video_get_option['origincode_gallery_video_video_view9_image_position'] == 1 ) :
				?>
				<div class="video_view9_container">
					<input type="hidden" class="pagenum" value="1"/>
					<div class="video_view9_vid_wrapper" data-id="<?php echo esc_attr($row->id); ?>">
						<?php if ( $video_thumb != '' ): ?>
							<div class="thumb_wrapper" >
								<img class="thumb_image" style="cursor: pointer;"
								     src="<?php echo esc_attr( $video_thumb ); ?>" alt=""/>
								<div class="playbutton <?php echo $icon; ?>-icon"></div>
							</div>
						<?php endif; ?>
						<div id="thevideo" style="display: block;">
							<?php
							$videourl = origincode_gallery_video_get_video_id_from_url( $row->image_url );
							if ( $videourl[1] == 'youtube' ) { ?>
								<iframe class="video_view9_img <?php echo $iframe_thumbclass; ?>"
								        width="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width']; ?>"
								        height="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height']; ?>"
								        src="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>" style="border: 0;"
								        allowfullscreen></iframe>
								<?php
							} else {
								?>
								<iframe class="video_view9_img <?php echo esc_attr($iframe_thumbclass); ?>"
								        width="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width']; ?>"
								        height="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height']; ?>"
								        src="//player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>" style="border: 0;"
								        allowfullscreen></iframe>
								<?php
							}
							?>
						</div>
					</div>
					<h1 class="video_new_view_title"><?php echo esc_attr($video_name); ?></h1>
					<div class="video_new_view_desc"><?php echo esc_attr($video_desc); ?></div>
				</div>
				<div class="clear"></div>
				<?php
			elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_video_view9_image_position'] == 2 ) :
				?>
				<div class="video_view9_container">
					<input type="hidden" class="pagenum" value="1"/>
					<h1 class="video_new_view_title"><?php echo esc_attr($video_name); ?></h1>
					<div class="video_view9_vid_wrapper" data-id="<?php echo esc_attr($row->id); ?>">

							<div class="thumb_wrapper">
							<?php if ( $video_thumb != '' ): ?>
								<img class="thumb_image" style="cursor: pointer;"
								     src="<?php echo esc_attr( $video_thumb ); ?>" alt=""/>
							<?php endif; ?>
								<div class="playbutton <?php echo esc_attr($icon); ?>-icon"></div>
							</div>
						<div id="thevideo" style="display: block;">
							<?php
							$videourl = origincode_gallery_video_get_video_id_from_url( $row->image_url );
							if ( $videourl[1] == 'youtube' ) { ?>
								<iframe class="video_view9_img <?php echo esc_attr($iframe_thumbclass); ?>"
								        width="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width']; ?>"
								        height="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height']; ?>"
								        src="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>" style="border: 0;"
								        allowfullscreen></iframe>
								<?php
							} else {
								?>
								<iframe class="video_view9_img <?php echo esc_attr($iframe_thumbclass); ?>"
								        width="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width']; ?>"
								        height="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height']; ?>"
								        src="//player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>" style="border: 0;"
								        allowfullscreen></iframe>
								<?php
							}
							?>
						</div>
					</div>
					<div class="video_new_view_desc"><?php echo esc_attr($video_desc); ?></div>
				</div>
				<div class="clear"></div>
				<?php
			elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_video_view9_image_position'] == 3 ) :
				?>
				<div class="video_view9_container">
					<input type="hidden" class="pagenum" value="1"/>
					<h1 class="video_new_view_title"><?php echo esc_attr($video_name); ?></h1>
					<div class="video_new_view_desc"><?php echo esc_attr($video_desc); ?></div>
					<div class="video_view9_vid_wrapper" data-id="<?php echo esc_attr($row->id); ?>">
						<?php if ( $video_thumb != '' ): ?>
							<div class="thumb_wrapper" >
								<img class="thumb_image" style="cursor: pointer;"
								     src="<?php echo esc_attr( $video_thumb ); ?>" alt=""/>
								<div class="playbutton <?php echo esc_attr($icon); ?>-icon"></div>
							</div>
						<?php endif; ?>
						<div id="thevideo" style="display: block;">
							<?php
							$videourl = origincode_gallery_video_get_video_id_from_url( $row->image_url );
							if ( $videourl[1] == 'youtube' ) { ?>
								<iframe class="video_view9_img <?php echo esc_attr($iframe_thumbclass); ?>"
								        width="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width']; ?>"
								        height="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height']; ?>"
								        src="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>" style="border: 0;"
								        allowfullscreen></iframe>
								<?php
							} else {
								?>
								<iframe class="video_view9_img <?php echo esc_attr($iframe_thumbclass); ?>"
								        width="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width']; ?>"
								        height="<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height']; ?>"
								        src="//player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>" style="border: 0;"
								        allowfullscreen></iframe>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<?php
			endif;
		}
		?>
	</div>
	<?php
	$a = $disp_type;
	if ( $a == 1 && $num < $total_videos ) {
		$origincode_gallery_video_blog_nonce = wp_create_nonce( 'origincode_gallery_video_blog_load_nonce' );
		?>
		<div class="load_more">
			<div
				class="load_more_button"
				data-blog-nonce="<?php echo $origincode_gallery_video_blog_nonce; ?>"><?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_loadmore_text']; ?></div>
			<div class="loading"><img src="<?php if ( $origincode_gallery_video_get_option['origincode_gallery_video_loading_type'] == '1' ) {
					echo $path_site . '/arrows/loading1.gif';
				} elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_loading_type'] == '2' ) {
					echo $path_site . '/arrows/loading4.gif';
				} elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_loading_type'] == '3' ) {
					echo $path_site . '/arrows/loading36.gif';
				} elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_loading_type'] == '4' ) {
					echo $path_site . '/arrows/loading51.gif';
				} ?>"></div>
		</div>
		<?php
	} elseif ( $a == 0 ) {
		?>
		<div class="paginate">
			<?php
			$protocol    = stripos( $_SERVER['SERVER_PROTOCOL'], 'https' ) === true ? 'https://' : 'http://';
			$actual_link = esc_attr($protocol) . esc_url($_SERVER['HTTP_HOST']) . esc_url($_SERVER['REQUEST_URI']) . "";
			$checkREQ    = '';
			$pattern     = "/\?p=/";
			$pattern2    = "/&page-video[0-9]+=[0-9]+/";
			$pattern3    = "/?page-video[0-9]+=[0-9]+/";
			if ( preg_match( $pattern, $actual_link ) ) {
				if ( preg_match( $pattern2, $actual_link ) ) {
					$actual_link = preg_replace( $pattern2, '', $actual_link );
				}
				$checkREQ = $actual_link . '&page-video' . $origincode_gallery_videoID . $pID;
			} else {
				$checkREQ = '?page-video' . $origincode_gallery_videoID . $pID;
			}
			$pervpage = '';
			if ( $page != 1 ) {
				$pervpage = '<a href= ' . $checkREQ . '=1><i class="icon-style origincodeicons-fast-backward" ></i></a>  
                               <a href= ' . $checkREQ . '=' . ( $page - 1 ) . '><i class="icon-style origincodeicons-chevron-left"></i></a> ';
			}
			$nextpage = '';
			if ( $page != $total ) {
				$nextpage = '<a href= ' . $checkREQ . '=' . ( $page + 1 ) . '><i class="icon-style origincodeicons-chevron-right"></i></a>  
                               <a href= ' . $checkREQ . '=' . $total . '><i class="icon-style origincodeicons-fast-forward" ></i></a>';
			}
			echo $pervpage . $page . '/' . $total . $nextpage;
			?>
		</div>
		<?php
	}
	?>

</div>