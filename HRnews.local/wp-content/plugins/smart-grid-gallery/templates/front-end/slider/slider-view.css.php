<style>
.origincode_slideshow_image_wrap_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	height:<?php echo $sliderheight; ?>px;
	width:<?php  echo $sliderwidth; ?>px;
	position:relative;
	display: block;
	text-align: center;
	clear:both;
<?php if($sliderposition=="left"){ $position='float:left;';}elseif($sliderposition=="right"){$position='float:right;';}else{$position='float:none; margin:0 auto;';} ?>
<?php echo $position;  ?>
	border-style:solid;
}


.origincode_slideshow_image_wrap_videogallery_<?php echo $origincode_gallery_videoID; ?> * {
	box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}


.origincode_slideshow_image_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	/*width:100%;*/
}

#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?>,
#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	cursor: pointer;
	display:none;
	display: block;
	height: 100%;
	outline: medium none;
	position: absolute;
	z-index: 13;
	bottom:25px;
	top:50%;
	box-shadow: none;
}


#origincode_slideshow_left-ico_videogallery_<?php echo $origincode_gallery_videoID; ?>,
#origincode_slideshow_right-ico_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	z-index: 13;
	-moz-box-sizing: content-box;
	box-sizing: content-box;
	cursor: pointer;
	display: table;
	left: -9999px;
	line-height: 0;
	margin-top: -15px;
	position: absolute;
	top: 50%;
}
#origincode_slideshow_left-ico_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover,
#origincode_slideshow_right-ico_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	cursor: pointer;
}

.origincode_slideshow_image_container_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	display: table;
	position: relative;
	top:0;
	left:0;
	text-align: center;
	vertical-align: middle;
	width:100%;
	height:100%;
}

.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	text-decoration: none;
	position: absolute;
	z-index: 11;
	display: inline-block;
<?php  if($origincode_gallery_video_get_option['origincode_gallery_video_slider_title_has_margin']=='on'){
		$slider_title_width=($origincode_gallery_video_get_option['origincode_gallery_video_slider_title_width']-6);
		$slider_title_height=($origincode_gallery_video_get_option['origincode_gallery_video_slider_title_height']-6);
		$slider_title_margin="3";
	}else{
		$slider_title_width=($origincode_gallery_video_get_option['origincode_gallery_video_slider_title_width']);
		$slider_title_height=($origincode_gallery_video_get_option['origincode_gallery_video_slider_title_height']);
		$slider_title_margin="0";
	}  ?>
	width:<?php echo $slider_title_width; ?>%;
<?php
	if($slideshow_title_position[0]=="left"){echo 'left:'.$slider_title_margin.'%;';}
	elseif($slideshow_title_position[0]=="center"){echo 'left:50%;';}
	elseif($slideshow_title_position[0]=="right"){echo 'right:'.$slider_title_margin.'%;';}

	if($slideshow_title_position[1]=="top"){echo 'top:'.$slider_title_margin.'%;';}
	elseif($slideshow_title_position[1]=="middle"){echo 'top:50%;';}
	elseif($slideshow_title_position[1]=="bottom"){echo 'bottom:'.$slider_title_margin.'%;';}
 ?>
	padding:2%;
	text-align:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_title_text_align']; ?>;
	font-weight:bold;
	color:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_title_color']; ?>;
	background:<?php
				list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_slider_title_background_color'],2));
				$titleopacity=$origincode_gallery_video_get_option["origincode_gallery_video_slider_title_background_transparency"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
		?>;
	border-style:solid;
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_title_font_size']; ?>px;
	border-width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_title_border_size']; ?>px;
	border-color:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_title_border_color']; ?>;
	border-radius:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_title_border_radius']; ?>px;
}

.origincode_slideshow_description_text_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	text-decoration: none;
	position: absolute;
	z-index: 11;
	border-style:solid;
	display: inline-block;
<?php  if($origincode_gallery_video_get_option['origincode_gallery_video_slider_description_has_margin']=='on'){
		$slider_description_width=($origincode_gallery_video_get_option['origincode_gallery_video_slider_description_width']-6);
		$slider_description_height=($origincode_gallery_video_get_option['origincode_gallery_video_slider_description_height']-6);
		$slider_description_margin="3";
	}else{
		$slider_description_width=($origincode_gallery_video_get_option['origincode_gallery_video_slider_description_width']);
		$slider_descriptione_height=($origincode_gallery_video_get_option['origincode_gallery_video_slider_description_height']);
		$slider_description_margin="0";
	}  ?>

	width:<?php echo $slider_description_width; ?>%;
	/*height:<?php echo $slider_description_height; ?>%;*/
<?php
	if($slideshow_description_position[0]=="left"){echo 'left:'.$slider_description_margin.'%;';}
	elseif($slideshow_description_position[0]=="center"){echo 'left:50%;';}
	elseif($slideshow_description_position[0]=="right"){echo 'right:'.$slider_description_margin.'%;';}

	if($slideshow_description_position[1]=="top"){echo 'top:'.$slider_description_margin.'%;';}
	elseif($slideshow_description_position[1]=="middle"){echo 'top:50%;';}
	elseif($slideshow_description_position[1]=="bottom"){echo 'bottom:'.$slider_description_margin.'%;';}
 ?>
	padding:3%;
	text-align:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_description_text_align']; ?>;
	color:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_description_color']; ?>;

	background:<?php
			list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_slider_description_background_color'],2));
			$descriptionopacity=$origincode_gallery_video_get_option["origincode_gallery_video_slider_description_background_transparency"]/100;
			echo 'rgba('.$r.','.$g.','.$b.','.$descriptionopacity.') !important';
		?>;
	border-style:solid;
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_description_font_size']; ?>px;
	border-width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_description_border_size']; ?>px;
	border-color:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_description_border_color']; ?>;
	border-radius:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_description_border_radius']; ?>px;
}

.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?>.none, .origincode_slideshow_description_text_videogallery_<?php echo $origincode_gallery_videoID; ?>.none,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?>.hidden, .origincode_slideshow_description_text_videogallery_<?php echo $origincode_gallery_videoID; ?>.hidden	   {display:none;}

.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h1, .origincode_slideshow_description_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h1,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h2, .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h2,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h3, .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h3,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h4, .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> h4,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> p, .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> p,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> strong,  .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> strong,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> span, .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> span,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> ul, .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> ul,
.origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> li, .origincode_slideshow_title_text_videogallery_<?php echo $origincode_gallery_videoID; ?> li {
	padding:2px;
	margin:0;
}

.origincode_slide_container_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	display: table-cell;
	margin: 0 auto;
	position: relative;
	vertical-align: middle;
	width:100%;
	height:100%;
	_width: inherit;
	_height: inherit;
}
.origincode_slide_bg_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	margin: 0 auto;
	width:100%;
	height:100%;
	_width: inherit;
	_height: inherit;
}
.origincode_slider_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	width:100%;
	height:100%;
	display:table;
	padding:0;
	margin:0;

}
.origincode_slideshow_image_item_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	width:100%;
	height:100%;
	width: inherit;
	height: inherit;
	display: table-cell;
	filter: Alpha(opacity=100);
	opacity: 1;
	position: absolute;
	top:0;
	left:0;
	vertical-align: middle;
	z-index: 2;
	margin:0 !important;
	padding:0;
	overflow:hidden;
	border-radius: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_slideshow_border_radius']; ?>px !important;
}
.origincode_slideshow_image_second_item_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	width:100%;
	height:100%;
	_width: inherit;
	_height: inherit;
	display: table-cell;
	filter: Alpha(opacity=0);
	opacity: 0;
	position: absolute;
	top:0;
	left:0;
	vertical-align: middle;
	z-index: 1;
	overflow:hidden;
	margin:0 !important;
	padding:0;
	border-radius: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_slideshow_border_radius']; ?>px !important;
}
.origincode_grid_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	display: none;
	height: 100%;
	overflow: hidden;
	position: absolute;
	width: 100%;
}
.origincode_gridlet_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	opacity: 1;
	filter: Alpha(opacity=100);
	position: absolute;
}


.origincode_slideshow_dots_container_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	display: table;
	position: absolute;
	width:100% !important;
	height:100% !important;
}
.origincode_slideshow_dots_thumbnails_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	margin: 0 auto;
	overflow: hidden;
	position: absolute;
	width:100%;
	height:30px;
}

.origincode_slideshow_dots_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	display: inline-block;
	position: relative;
	cursor: pointer;
	box-shadow: 1px 1px 1px rgba(0,0,0,0.1) inset, 1px 1px 1px rgba(255,255,255,0.1);
	width:10px;
	height: 10px;
	border-radius: 10px;
	background: #00f;
	margin: 10px;
	overflow: hidden;
	z-index: 17;
}

.origincode_slideshow_dots_active_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	opacity: 1;
	background:#0f0;
	filter: Alpha(opacity=100);
}
.origincode_slideshow_dots_deactive_videogallery_<?php echo $origincode_gallery_videoID; ?> {

}

.origincode_slideshow_image_item1_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	display: table;
	width: inherit;
	height: inherit;
}
.origincode_slideshow_image_item2_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	display: table-cell;
	vertical-align: middle;
	text-align: center;
}

.origincode_slideshow_image_item2_videogallery_<?php echo $origincode_gallery_videoID; ?> a {
	display:block;
	vertical-align:middle;
	width:100%;
	height:100%;
}
.slide_thumb{
	position: absolute;
}

.origincode_slideshow_image_wrap_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	background:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_slider_background_color']; ?>;
	border-width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_slideshow_border_size']; ?>px;
	border-color:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_slideshow_border_color']; ?>;
	border-radius:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_slideshow_border_radius']; ?>px;
	box-sizing: content-box;
}

.origincode_slideshow_dots_thumbnails_videogallery_<?php echo $origincode_gallery_videoID; ?> {
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_slider_dots_position']=="bottom"){?>
	bottom:0;
<?php }else if($origincode_gallery_video_get_option['origincode_gallery_video_slider_dots_position']=="none"){?>
	display:none;

}else{
	 top:0; <?php } ?>
 }

.origincode_slideshow_dots_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	background:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_dots_color']; ?>;
}

.origincode_slideshow_dots_active_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	background:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_slider_active_dot_color']; ?>;
}
.youtube-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.youtube.png'; ?>) center center no-repeat;}
.vimeo-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.vimeo.png'; ?>) center center no-repeat;}
.playbutton{
	width: 100%;
	height: 100%;
	position: absolute;
	z-index: 1;
}

<?php
switch ($origincode_gallery_video_get_option['origincode_gallery_video_slider_navigation_type']) {
	case 1:
		?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-21px;
	height:43px;
	width:29px;
	background:url(<?php echo $arrowfolder;?>/arrows.simple.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-21px;
	height:43px;
	width:29px;
	background:url(<?php echo $arrowfolder;?>/arrows.simple.png) right top no-repeat;
}
<?php
break;
case 2:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-25px;
	height:50px;
	width:50px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.shadow.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-25px;
	height:50px;
	width:50px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.shadow.png) right top no-repeat;
}

#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:left -50px;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:right -50px;
}
<?php
break;
case 3:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-22px;
	height:44px;
	width:44px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.simple.dark.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-22px;
	height:44px;
	width:44px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.simple.dark.png) right top no-repeat;
}

#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:left -44px;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:right -44px;
}
<?php
break;
case 4:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-33px;
	height:65px;
	width:59px;
	background:url(<?php echo $arrowfolder;?>/arrows.cube.dark.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-33px;
	height:65px;
	width:59px;
	background:url(<?php echo $arrowfolder;?>/arrows.cube.dark.png) right top no-repeat;
}

#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:left -66px;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:right -66px;
}
<?php
break;
case 5:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-18px;
	height:37px;
	width:40px;
	background:url(<?php echo $arrowfolder;?>/arrows.light.blue.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-18px;
	height:37px;
	width:40px;
	background:url(<?php echo $arrowfolder;?>/arrows.light.blue.png) right top no-repeat;
}

<?php
break;
case 6:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-25px;
	height:50px;
	width:50px;
	background:url(<?php echo $arrowfolder;?>/arrows.light.cube.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-25px;
	height:50px;
	width:50px;
	background:url(<?php echo $arrowfolder;?>/arrows.light.cube.png) right top no-repeat;
}

#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:left -50px;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:right -50px;
}
<?php
break;
case 7:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	right:0;
	margin-top:-19px;
	height:38px;
	width:38px;
	background:url(<?php echo $arrowfolder;?>/arrows.light.transparent.circle.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-19px;
	height:38px;
	width:38px;
	background:url(<?php echo $arrowfolder;?>/arrows.light.transparent.circle.png) right top no-repeat;
}
<?php
break;
case 8:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-22px;
	height:45px;
	width:45px;
	background:url(<?php echo $arrowfolder;?>/arrows.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-22px;
	height:45px;
	width:45px;
	background:url(<?php echo $arrowfolder;?>/arrows.png) right top no-repeat;
}
<?php
break;
case 9:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-22px;
	height:45px;
	width:45px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.blue.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-22px;
	height:45px;
	width:45px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.blue.png) right top no-repeat;
}
<?php
break;
case 10:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-24px;
	height:48px;
	width:48px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.green.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-24px;
	height:48px;
	width:48px;
	background:url(<?php echo $arrowfolder;?>/arrows.circle.green.png) right top no-repeat;
}

#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:left -48px;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?>:hover {
	background-position:right -48px;
}
<?php
break;
case 11:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-29px;
	height:58px;
	width:55px;
	background:url(<?php echo $arrowfolder;?>/arrows.blue.retro.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-29px;
	height:58px;
	width:55px;
	background:url(<?php echo $arrowfolder;?>/arrows.blue.retro.png) right top no-repeat;
}
<?php
break;
case 12:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-37px;
	height:74px;
	width:74px;
	background:url(<?php echo $arrowfolder;?>/arrows.green.retro.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-37px;
	height:74px;
	width:74px;
	background:url(<?php echo $arrowfolder;?>/arrows.green.retro.png) right top no-repeat;
}
<?php
break;
case 13:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-16px;
	height:33px;
	width:33px;
	background:url(<?php echo $arrowfolder;?>/arrows.red.circle.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-16px;
	height:33px;
	width:33px;
	background:url(<?php echo $arrowfolder;?>/arrows.red.circle.png) right top no-repeat;
}
<?php
break;
case 14:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-51px;
	height:102px;
	width:52px;
	background:url(<?php echo $arrowfolder;?>/arrows.triangle.white.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-51px;
	height:102px;
	width:52px;
	background:url(<?php echo $arrowfolder;?>/arrows.triangle.white.png) right top no-repeat;
}
<?php
break;
case 15:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:0;
	margin-top:-19px;
	height:39px;
	width:70px;
	background:url(<?php echo $arrowfolder;?>/arrows.ancient.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:0;
	margin-top:-19px;
	height:39px;
	width:70px;
	background:url(<?php echo $arrowfolder;?>/arrows.ancient.png) right top no-repeat;
}
<?php
break;
case 16:
?>
#origincode_slideshow_left_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	left:-21px;
	margin-top:-20px;
	height:40px;
	width:37px;
	background:url(<?php echo $arrowfolder;?>/arrows.black.out.png) left  top no-repeat;
}

#origincode_slideshow_right_videogallery_<?php echo $origincode_gallery_videoID; ?> {
	right:-21px;
	margin-top:-20px;
	height:40px;
	width:37px;
	background:url(<?php echo $arrowfolder;?>/arrows.black.out.png) right top no-repeat;
}
<?php
break;
}
?>
.thumb_image{
	position: absolute !important;
	width: 100%;
	height: 100%;
	top: 0;
	left:0;
}
.origincode_slideshow_image_wrap_videogallery_<?php echo $origincode_gallery_videoID; ?> .thumb_wrapper img{
	<?php if($origincode_gallery_video_get_option['origincode_gallery_video_slider_crop_image'] == 'crop'):?>
	max-width: none !important;
	<?php endif;?>
}
.thumb_wrapper{
	position: absolute;
	width: 100%;
	height: 100%;
	overflow: hidden;
}
.thevideo{
	position: absolute;
	top: 0;
	width: 100%;
	height: 100%;
}
.entry-content a{
	border-bottom: none !important;
}
</style>