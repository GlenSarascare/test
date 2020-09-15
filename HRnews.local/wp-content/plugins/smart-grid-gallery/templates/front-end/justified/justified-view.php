<div id="my_video_gallery_wrapper_<?php echo esc_attr($origincode_gallery_videoID); ?>" class="clearfix gallery-video-content"
     data-gallery-video-id="<?php echo esc_attr($origincode_gallery_videoID); ?>" data-gallery-video-perpage="<?php echo esc_attr($num); ?>">
	<div id="my_video_gallery_<?php echo esc_attr($origincode_gallery_videoID); ?>"
	     class="clearfix my_video_gallery view-<?php echo esc_attr($view_slug); ?>">
		<input type="hidden" id="total" value="<?php echo esc_attr($total); ?>"/>
		<?php
		foreach ( $page_videos as $key => $row ) {
			$videourl = origincode_gallery_video_get_video_id_from_url( $row->image_url );
			if ( $videourl[1] == 'youtube' ) {
				if ( empty( $row->thumb_url ) ) {
					$thumb_pic = '//img.youtube.com/vi/' . esc_attr($videourl[0]) . '/mqdefault.jpg';
				} else {
					$thumb_pic = $row->thumb_url;
				}
				?>
				<a class="vyoutube origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
				   href="<?php echo esc_url("//www.youtube.com/embed/". $videourl[0]); ?>"
                   data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                   title="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>" data-id="<?php echo esc_attr($row->id); ?>">
					<img src="<?php echo esc_attr( $thumb_pic ); ?>"
					     alt="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>"/>
					<div class="play-icon <?php echo $videourl[1]; ?>-icon"></div>
				</a>
				<input type="hidden" class="pagenum" value="1"/>
			<?php } else {
				$hash = @unserialize( wp_remote_fopen(esc_url( $protocol . "vimeo.com/api/v2/video/" . $videourl[0] . ".php" )) );
				if ( empty( $row->thumb_url ) ) {
					$imgsrc = $hash[0]['thumbnail_large'];
				} else {
					$imgsrc = $row->thumb_url;
				}
				?>
				<a class="vvimeo origincode_videogallery_item group<?php echo esc_attr($origincode_gallery_videoID); ?>"
				   href="<?php echo esc_url("//player.vimeo.com/video/". $videourl[0]); ?>"
                   data-description="<?php echo str_replace('__5_5_5__', '%', $row->description); ?>"
                   title="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>" data-id="<?php echo esc_attr($row->id); ?>">
					<img alt="<?php echo str_replace( '__5_5_5__', '%', $row->name ); ?>"
					     src="<?php echo esc_attr( $imgsrc ); ?>"/>
					<div class="play-icon <?php echo esc_url($videourl[1]); ?>-icon"></div>
				</a>
				<input type="hidden" class="pagenum" value="1"/>
				<?php
			}
		}
		?>
	</div>
	<?php
	$a = $disp_type;
	if ( $a == 1 && $num < $total_videos){
		$origincode_gallery_video_justified_nonce = wp_create_nonce( 'origincode_gallery_video_justified_nonce' );
		?>
		<div class="load_more2">
			<div class="load_more_button2 load_more_button_<?php echo esc_attr($origincode_gallery_videoID); ?>"
			     data-justified-load-nonce="<?php echo $origincode_gallery_video_justified_nonce; ?>"><?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loadmore_text']; ?></div>
			<div class="loading2 loading_<?php echo $origincode_gallery_videoID; ?>"><img
					src="<?php if ( $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loading_type'] == '1' ) {
						echo $path_site . '/arrows/loading1.gif';
					} elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loading_type'] == '2' ) {
						echo $path_site . '/arrows/loading4.gif';
					} elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loading_type'] == '3' ) {
						echo $path_site . '/arrows/loading36.gif';
					} elseif ( $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loading_type'] == '4' ) {
						echo $path_site . '/arrows/loading51.gif';
					} ?>"></div>
		</div>
		<?php
	}elseif ( $a == 0 ){
	?>
	<div class="paginate2">
		<?php
		$protocol    = stripos( $_SERVER['SERVER_PROTOCOL'], 'https' ) === true ? 'https://' : 'http://';
		$actual_link = esc_attr($protocol) . esc_url($_SERVER['HTTP_HOST']) . esc_url($_SERVER['REQUEST_URI']) . "";
		$checkREQ    = '';
		$pattern     = "/\?p=/";
		$pattern2    = "/&page-video[0-9]+=[0-9]+/";
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
			$pervpage = '<a href= ' . $checkREQ . '=1><i class="icon-style2 origincodeicons-fast-backward" ></i></a>  
                            <a href= ' . $checkREQ . '=' . ( $page - 1 ) . '><i class="icon-style2 origincodeicons-chevron-left"></i></a> ';
		}
		$nextpage = '';
		if ( $page != $total ) {
			$nextpage = '<a href= ' . $checkREQ . '=' . ( $page + 1 ) . '><i class="icon-style2 origincodeicons-chevron-right"></i></a>  
                           <a href= ' . $checkREQ . '=' . $total . '><i class="icon-style2 origincodeicons-fast-forward" ></i></a>';
		}
		echo $pervpage . $page . '/' . $total . $nextpage;
		?>
	</div>
</div>
<?php
}
?>
</div>