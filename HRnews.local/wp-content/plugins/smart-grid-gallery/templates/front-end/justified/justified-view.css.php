<style>
.justified-gallery {
	width: 100%;
	position: relative;
	overflow: hidden;
}
.justified-gallery > a,
.justified-gallery > div {
	position: absolute;
	display: inline-block;
	opacity: 0;
	overflow:hidden;
	filter: alpha(opacity=0);
	/* IE8 or Earlier */
}
.justified-gallery > a > img,
.justified-gallery > div > img {
	position: absolute;
	top: 50%;
	left: 50%;
	padding: 0;
}
.justified-gallery > a > .caption,
.justified-gallery > div > .caption {
	width: 100%;
	display: none;
	position: absolute;
	bottom: 0;
	padding: 5px;
	left: 0;
	right: 0;
	margin: 0;
	color: #<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view8_element_title_font_color"]; ?>;
	font-size: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view8_element_title_font_size"]; ?>px;
	font-weight: 300;
	font-family: sans-serif;
	background:<?php 			
				list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_ht_view8_element_title_background_color'],2));
				$titleopacity=$origincode_gallery_video_get_option["origincode_gallery_video_ht_view8_element_title_overlay_transparency"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';	
		?>;

	overflow: hidden;
	text-overflow: ellipsis;
	white-space:nowrap;
}
.justified-gallery > a > .caption.caption-visible,
.justified-gallery > div > .caption.caption-visible {
	display: initial;
	opacity: 0.7;
	filter: "alpha(opacity=70)";
	/* IE8 or Earlier */
	-webkit-animation: justified-gallery-show-caption-animation 500ms 0 ease;
	-moz-animation: justified-gallery-show-caption-animation 500ms 0 ease;
	-ms-animation: justified-gallery-show-caption-animation 500ms 0 ease;
}
.justified-gallery > .entry-visible {
	opacity: 1.0;
	filter: alpha(opacity=100);
	/* IE8 or Earlier */
	-webkit-animation: justified-gallery-show-entry-animation 300ms 0 ease;
	-moz-animation: justified-gallery-show-entry-animation 300ms 0 ease;
	-ms-animation: justified-gallery-show-entry-animation 300ms 0 ease;
	border: none !important;
}
.justified-gallery > .spinner {
	position: absolute;
	bottom: 0;
	margin-left: -24px;
	padding: 10px 0 10px 0;
	left: 50%;
	opacity: initial;
	filter: initial;
	overflow: initial;
}
.justified-gallery > .spinner > span {
	display: inline-block;
	opacity: 0;
	filter: alpha(opacity=0);
	/* IE8 or Earlier */
	width: 8px;
	height: 8px;
	margin: 0 4px 0 4px;
	background-color: #000;
	border-top-left-radius: 6px;
	border-top-right-radius: 6px;
	border-bottom-right-radius: 6px;
	border-bottom-left-radius: 6px;
}
.load_more2 {
	margin: 10px 0;
	position:relative;
	text-align:<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loadmore_position'] == 'left') {echo 'left';}
			elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loadmore_position'] == 'center') { echo 'center'; }
			elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loadmore_position'] == 'right') { echo 'right'; }?>;
	width:100%;
}

.load_more_button2 {
	border-radius: 10px;
	display:inline-block;
	padding:5px 15px;
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loadmore_fontsize']; ?>px !important;;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loadmore_font_color']; ?> !important;;
	background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_button_color']; ?> !important;
	cursor:pointer;

}
.load_more_button2:hover{
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_loadmore_font_color_hover']; ?> !important;
	background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_button_color_hover']; ?> !important;
}

.loading2 {
	display:none;
}
.paginate2{
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_paginator_fontsize']; ?>px !important;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_paginator_color']; ?> !important;
	text-align: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_paginator_position']; ?>;
	margin-top: 25px;
}
.paginate2 a{
	border-bottom: none !important;
	box-shadow: none !important;
}
.icon-style2{
	font-size: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_paginator_icon_size']; ?>px !important;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view8_paginator_icon_color']; ?> !important;
}
.clear{
	clear:both;
}
.play-icon {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
}

.play-icon.youtube-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/small.play.youtube.png'; ?>) center center no-repeat;background-size:20%;}
.play-icon.vimeo-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/small.play.vimeo.png'; ?>) center center no-repeat;background-size:20%;}

</style>