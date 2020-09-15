<style>
* {outline:none;}
#main-slider_<?php echo $origincode_gallery_videoID; ?> a{
	border:none;
	box-shadow: none !important;
}
#main-slider_<?php echo $origincode_gallery_videoID; ?> {background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_slider_background_color"];?>;}

#main-slider_<?php echo $origincode_gallery_videoID; ?> div.slider-content {
	position:relative;
	width:100%;
	padding:0 0 0 0;
	background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_slider_background_color"];?>;
}

[class$="-arrow"] {
	background-image:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/arrow.'.$origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_icons_style"].'.png' ;?>) !important;
}

.ls-select-box {
	background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/menu.'.$origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_icons_style"].'.png' ;?>) right center no-repeat #<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_slider_background_color"] ;?> !important;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?>-nav-select {
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_title_font_color"];?>;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> div.slider-content .slider-content-wrapper {
	position:relative;
	width:100%;
	padding:0;
	display:block;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?> {
	position:relative;
	width:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_main_image_width"];?>px;
	display:table-cell;
	padding:0;
	float:left;
	margin-right: 10px;
}
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?> a {
	position: relative;
	display: inline-block;
}
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?> img.main-image {
	position:relative;
	width:100%;
	height:auto;
	display:block;
}


#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?> .play-icon {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
}
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?>  .play-icon.youtube-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.youtube.png'; ?>) center center no-repeat;}
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?>  .play-icon.vimeo-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.vimeo.png'; ?>) center center no-repeat;}




#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block {
	display:table-cell;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block > div {
	padding-bottom:10px;
	margin-top:10px;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_ht_view5_show_separator_lines']=="on") {?>
	background:url('<?php echo  ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/divider.line.png'; ?>') center bottom repeat-x;
<?php } ?>
}
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block > div:last-child {background:none;}


#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .title {
	position:relative;
	display:block;
	margin:-10px 0 0 0;
	font-size:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_title_font_size"];?>px !important;
	line-height:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_title_font_size"];?>px !important;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_title_font_color"];?>;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_description_font_size"];?>px !important;
	line-height:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_description_font_size"];?>px !important;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_description_color"];?>;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description h1,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description h2,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description h3,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description h4,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description h5,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description h6,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description p,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description strong,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description span {
	padding:2px !important;
	margin:0 !important;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description ul,
#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block .description li {
	padding:2px 0 2px 5px;
	margin:0 0 0 8px;
}



#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .button-block {
	position:relative;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .button-block a,#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .button-block a:link,#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .button-block a:visited{
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_linkbutton_background_color"];?>;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_linkbutton_color"];?>;
	font-size:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_linkbutton_font_size"];?>px;
	text-decoration:none;
}

#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .button-block a:hover,#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .button-block a:focus,#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .button-block a:active {
	background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_linkbutton_background_hover_color"];?>;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view5_linkbutton_font_hover_color"];?>;
}

@media only screen and (min-width:500px) {
	#main-slider_<?php echo $origincode_gallery_videoID; ?>-nav-ul {
		visibility:hidden !important;
		height:1px;
	}
}

@media only screen and (max-width:500px) {
	#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?>,#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block {
		width:100%;
		display:block;
		float:none;
		clear:both;
	}
}
@media only screen and (max-width: 2000px) and (min-width: 500px) {
    #main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .image-block_<?php echo $origincode_gallery_videoID; ?>,#main-slider_<?php echo $origincode_gallery_videoID; ?> .slider-content-wrapper .right-block {
        width:100%;
        display:block;
        float:none;
        clear:both;
    }
</style>