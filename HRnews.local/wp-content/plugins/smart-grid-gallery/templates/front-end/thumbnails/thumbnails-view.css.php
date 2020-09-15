<style>
section #origincode_videogallery a{
	border:none;
}
section #origincode_videogallery {
	padding: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_box_padding"]."px"; ?>;
	display: block;
	min-height: 100%;
	text-align: center;
	margin-bottom: 30px;
<?php if($origincode_gallery_video_get_option["origincode_gallery_video_thumb_box_has_background"] == 'on'){ ?>  background-color: #<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_box_background"]; ?>; <?php } ?>
<?php if($origincode_gallery_video_get_option["origincode_gallery_video_thumb_box_use_shadow"] == 'on'){ echo 'box-shadow: 0 0 10px;'; } ?>
}


#origincode_videogallery .origincode_big_li {
<?php if($origincode_gallery_video_get_option["origincode_gallery_video_video_natural_size_thumbnail"]=='resize'){?>
	width: 100%;
	max-width: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_width"]; ?>px;
<?php }
elseif($origincode_gallery_video_get_option["origincode_gallery_video_video_natural_size_thumbnail"]=='natural'){
?>
	width: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_width"]; ?>px;
<?php }?>
	overflow:hidden;
	height: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_height"]; ?>px;
	margin: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_margin_image"]; ?>px !important;
	padding:0 !important;
	border: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_border_width"]; ?>px solid #<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_border_color"]; ?>;
	border-radius: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_border_radius"]; ?>px;
}

section #origincode_videogallery li .infoLayer ul li {
	max-height:80px;
	overflow:hidden;
}

section #origincode_videogallery li .overLayer ul li h2,
section #origincode_videogallery li .infoLayer ul li h2 {
	font-size: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_title_font_size"]; ?>px;
	color: #<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_title_font_color"]; ?>;
	margin:0 !important;
}

section #origincode_videogallery li .infoLayer ul li p {
	color: #<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_title_font_color"]; ?>;
	margin:0 !important;
}

section #origincode_videogallery li .overLayer,
section #origincode_videogallery li .infoLayer {
	-webkit-transition: opacity 0.3s linear;
	-moz-transition: opacity 0.3s linear;
	-ms-transition: opacity 0.3s linear;
	-o-transition: opacity 0.3s linear;
	transition: opacity 0.3s linear;
	width: 100%;
	max-width: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_width"]; ?>px;
	height: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_height"]; ?>px;
	position: absolute;
	text-align: center;
	opacity: 0;
	top: 0;
	left: 0;
	z-index: 4;
	border-radius: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_border_radius"]; ?>px;
}



section #origincode_videogallery li a {
	position: absolute;
	display: block;
	width: 100%;
	max-width: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_width"]; ?>px;
	height: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_height"]; ?>px;
	top: 0;
	left: 0;
	z-index: 6;
	border-radius: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_border_radius"]; ?>px;
}
.load_more3 {
	margin: 10px 0;
	position:relative;
	text-align:<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loadmore_position'] == 'left') {echo 'left';}
			elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loadmore_position'] == 'center') { echo 'center'; }
			elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loadmore_position'] == 'right') { echo 'right'; }?>;
	width:100%;
}

.load_more_button3 {
	border-radius: 10px;
	display:inline-block;
	padding:5px 15px;
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loadmore_fontsize']; ?>px !important;;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loadmore_font_color']; ?> !important;;
	background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_button_color']; ?> !important;
	cursor:pointer;

}
.load_more_button3:hover{
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_loadmore_font_color_hover']; ?> !important;
	background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_button_color_hover']; ?> !important;
}
.loading3 {
	display:none;
}
.paginate3{
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_paginator_fontsize']; ?>px !important;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_paginator_color']; ?> !important;
	text-align: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_paginator_position']; ?>;
}
.paginate3 a{
	border-bottom: none !important;
	box-shadow: none !important;
}
.icon-style3{
	font-size: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_paginator_icon_size']; ?>px !important;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view7_paginator_icon_color']; ?> !important;
}
.clear{
	clear:both;
}

#origincode_videogallery li img {
<?php if($origincode_gallery_video_get_option["origincode_gallery_video_video_natural_size_thumbnail"]=='resize'){?>
	width: 100%;
	max-width: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_width"] - 2*$origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_border_width"]; ?>px;
	height: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_height"] - 2*$origincode_gallery_video_get_option["origincode_gallery_video_thumb_image_border_width"]; ?>px;
<?php }
elseif($origincode_gallery_video_get_option["origincode_gallery_video_video_natural_size_thumbnail"]=='natural'){
?>
	max-width: none !important;
	min-width: 100%;
<?php }?>
	min-height: 100%;
	margin:0 !important;
}

section #origincode_videogallery li:hover .overLayer {
	-webkit-transition: opacity 0.3s linear;
	-moz-transition: opacity 0.3s linear;
	-ms-transition: opacity 0.3s linear;
	-o-transition: opacity 0.3s linear;
	transition: opacity 0.3s linear;
	opacity: <?php echo ($origincode_gallery_video_get_option["origincode_gallery_video_thumb_title_background_transparency"]/100)+0.001; ?>;
	display: block;
	background: #<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_thumb_title_background_color"]; ?>;
}
section #origincode_videogallery li:hover .infoLayer {
	-webkit-transition: opacity 0.3s linear;
	-moz-transition: opacity 0.3s linear;
	ms-transition: opacity 0.3s linear;
	-o-transition: opacity 0.3s linear;
	transition: opacity 0.3s linear;
	opacity: 1;
	display: block;
}
section #origincode_videogallery p {text-align:center;}
</style>