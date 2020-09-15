<style>
#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> a{
	border:0;
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> {
	width: 100%;
	max-width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_width']+2*$origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_border_width']; ?>px;
	height:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_height']+45+2*$origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_border_width']; ?>px;
	margin: 0 0 10px 0;
	background:#<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_background_color']; ?>;
	border:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_border_width']; ?>px solid #<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_border_color']; ?>;
	outline:none;
	box-sizing: border-box;
}
#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?>.no-video-title{
	height:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_height']+2*$origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_border_width']; ?>px;
}
#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> {
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_natural_size_contentpopup']=='resize'){?>
	position:relative;
	width:100%;
<?php }elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_natural_size_contentpopup']=='natural'){?>
	position:relative;
	width:100%;
	overflow: hidden;
	height:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_height']; ?>px !important;
<?php }?>
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> img {
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_natural_size_contentpopup']=='resize'){?>
	width:100% !important;
	max-width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_width']; ?>px !important;
	height:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_height']; ?>px !important;
	
<?php }elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_natural_size_contentpopup']=='natural'){?>
	max-width: none !important;
<?php }?>
	display:block;
	border-radius: 0 !important;
	box-shadow: 0 0 0 rgba(0, 0, 0, 0) !important;
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> .videogallery-image-overlay {
	position:absolute;
	top: 0;
	left: 0;
	width:100%;
	height:100%;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_overlay_color'],2));
				$titleopacity=$origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_overlay_transparency"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>;
	display:none;
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?>:hover .image-block_<?php echo $origincode_gallery_videoID; ?>  .videogallery-image-overlay {
	display:block;
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> .videogallery-image-overlay a {
	position:absolute;
	top: 0;
	left: 0;
	display:block;
	width:100%;
	height:100%;
	box-shadow: none !important;
	background:url('<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/zoom.'.$origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_zoombutton_style"].'.png'; ?>') center center no-repeat;
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> {
	position:relative;
	height: 30px;
	margin: 0;
	padding: 15px 0 15px 0;
	-webkit-box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
	box-shadow: inset 0 1px 0 rgba(0,0,0,.1);
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> h3 {
	position:relative;
	margin: 0 !important;
	padding: 0 1% 5px 1% !important;
	width:98%;
	text-overflow: ellipsis;
	overflow: hidden;
	white-space:nowrap;
	font-weight:normal;
	font-size: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_title_font_size"];?>px !important;
	line-height: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_title_font_size"];?>px !important;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_title_font_color"];?>;
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> .button-block {
	position:absolute;
	right: 0;
	top: 0;
	display:none;
	vertical-align:middle;
	/*height:30px;*/
	padding:10px 10px 4px 10px;
	/* background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_element_overlay_color'],2));
				$titleopacity=$origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_overlay_transparency"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>; */
	border-left: 1px solid rgba(0,0,0,.05);
}
.load_more5 {
	margin: 10px 0;
	position:relative;
	text-align:<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loadmore_position'] == 'left') {echo 'left';}
			elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loadmore_position'] == 'center') { echo 'center'; }
			elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loadmore_position'] == 'right') { echo 'right'; }?>;

	width:100%;


}

.load_more_button5 {
	border-radius: 10px;
	display:inline-block;
	padding:5px 15px;
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loadmore_fontsize']; ?>px !important;;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loadmore_font_color']; ?> !important;;
	background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_button_color']; ?> !important;
	cursor:pointer;

}
.load_more_button5:hover{
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_loadmore_font_color_hover']; ?> !important;
	background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_button_color_hover']; ?> !important;
}

.loading5 {
	display:none;
}
.paginate5{
	font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_paginator_fontsize']; ?>px !important;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_paginator_color']; ?> !important;
	text-align: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_paginator_position']; ?>;
	margin-top:15px;
}
.paginate5 a{
	border-bottom: none !important;
	box-shadow: none !important;
}
.icon-style5{
	font-size: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_paginator_icon_size']; ?>px !important;
	color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view1_paginator_icon_color']; ?> !important;
}
.clear{
	clear:both;
}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?>:hover .title-block_<?php echo $origincode_gallery_videoID; ?> .button-block {display:block;}

#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a,.video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:link,.video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:visited,
#origincode_videogallery_content_<?php echo $origincode_gallery_videoID; ?> #origincode_videogallery_container_<?php echo $origincode_gallery_videoID; ?> .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:hover,.video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:focus,.video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:active {
	position:relative;
	display:block;
	vertical-align:middle;
	padding: 3px 10px 3px 10px;
	border-radius:3px;
	font-size:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_linkbutton_font_size"];?>px;
	background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_linkbutton_background_color"];?>;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_element_linkbutton_color"];?>;
	text-decoration:none;
}

/*#####POPUP#####*/

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> {
	position:fixed;
	display:table;
	width:80%;
	top:7%;
	left:7%;
	margin: 0 !important;
	padding: 0 !important;
	list-style:none;
	z-index:999999;
	display:none;
	height:85%;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?>.active {display:table;}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> li.pupup-element {
	position:relative;
	display:none;
	width:100%;
	padding:40px 0 20px 0;
	min-height:100%;
	position:relative;
	background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_background_color"];?>;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> li.pupup-element.active {
	display:block;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation {
	position:absolute;
	width:100%;
	height:40px;
	top: 0;
	left: 0;
	z-index:2001;
	background:url('<?php echo  ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/divider.line.png'; ?>') center bottom repeat-x;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .close,#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .close:link, #origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .close:visited {
	position:relative;
	float:right;
	width:40px;
	height:40px;
	display:block;
	background:url('<?php echo  ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/close.popup.'.$origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_closebutton_style"].'.png'; ?>') center center no-repeat;
	border-left:1px solid #ccc;
	opacity:.65;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .close:hover, #origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .close:focus, #origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .close:active {opacity:1;}


#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> li.pupup-element .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> {
	position:relative;
	width: 98%;
	height: 98%;
	padding: 2% 0% 0% 2%;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> {
	width:55%;
	position:relative;
	float:left;
	margin-right:2%;
	border-right:1px solid #ccc;
	min-width:200px;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> img {
	width:100% !important;
	display:block;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> iframe  {
	width:100% !important;
	height:100%;
	display:block;

}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block {
	width:42.8%;
	height: 100%;
	position:relative;
	float:left;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> li.pupup-element .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block > div {
	padding-top: 10px;
	padding-right: 4%;
	margin-bottom: 10px;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_show_separator_lines']=="on") {?>
	background:url('<?php echo  ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/divider.line.png'; ?>') center top repeat-x;
<?php } ?>
}
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> li.pupup-element .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block > div:last-child {background:none;}


#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .title {
	position:relative;
	display:block;
	margin: 0 0 10px 0 !important;
	font-size:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_title_font_size"];?>px !important;
	line-height:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_title_font_size"];?>px !important;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_title_font_color"];?>;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description {
	clear:both;
	position:relative;
	font-weight:normal;
	text-align:justify;
	font-size:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_description_font_size"];?>px !important;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_description_color"];?>;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description h1,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description h2,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description h3,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description h4,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description h5,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description h6,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description p,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description strong,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description span {
	padding:2px !important;
	margin: 0 !important;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description ul,
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block .description li {
	padding:2px 0 2px 5px;
	margin: 0 0 0 8px;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block ul.thumbs-list {
	list-style:none;
	display:table;
	position:relative;
	clear:both;
	width:100%;
	margin: 0 auto;
	padding: 0;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block ul.thumbs-list li {
	display:block;
	float:left;
	width:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_thumbs_width"];?>px;
	height:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_thumbs_height"];?>px;
	margin: 0 2% 5px 1% !important;
	opacity:0.45;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block ul.thumbs-list li.active,#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block ul.thumbs-list li:hover {
	opacity:1;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block ul.thumbs-list li a {
	display:block;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block ul.thumbs-list li img {
	width:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_thumbs_width"];?>px !important;
	height:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_thumbs_height"];?>px !important;
}
/**/
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .left-change, #origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .right-change{
	width: 40px;
	height: 39px;
	font-size: 25px;
	display: inline-block;
	text-align: center;
	border: 1px solid #eee;
	border-bottom: none;
	border-top: none;
}
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .right-change{
	position: relative;
	margin-left: -6px;
}
#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .right-change:hover, #origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .left-change:hover{
	background: #ddd;
	border-color: #ccc;
	color: #000 !important;
	cursor: pointer;
}

#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .right-change a, #origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .heading-navigation .left-change a{
	position: absolute;
	top:50%;
	transform: translate(-50%, -50%);
	color: #777;
	text-decoration: none;
	width: 12px;
	height: 24px;
	display: inline-block;
	line-height:1;
}


/**/

.pupup-element .button-block {
	position:relative;
}

.pupup-element .button-block a,.pupup-element .button-block a:link,.pupup-element .button-block a:visited {
	position:relative;
	display:inline-block;
	padding:6px 12px;
	background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_linkbutton_background_color"];?>;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_linkbutton_color"];?>;
	font-size:<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_linkbutton_font_size"];?>px;
	text-decoration:none;
}

.pupup-element .button-block a:hover,.pupup-element .button-block a:focus,.pupup-element .button-block a:active {
	background:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_linkbutton_background_hover_color"];?>;
	color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_linkbutton_font_hover_color"];?>;
}


#origin-popup-overlay {
	position:fixed;
	top: 0;
	left: 0;
	width:100%;
	height:100%;
	z-index:199;
	background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_ht_view2_popup_overlay_color'],2));
				$titleopacity=$origincode_gallery_video_get_option["origincode_gallery_video_ht_view2_popup_overlay_transparency_color"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important';
	?>
}


@media only screen and (max-width: 767px) {

	#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> {
		position:absolute;
		left: 0;
		top: 0;
		width:100%;
		height:auto !important;
		left: 0;
	}

	#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> li.pupup-element {
		margin: 0;
		height:auto !important;
		position:absolute;
		left: 0;
		top: 0;
	}

	#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> li.pupup-element .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> {
		height:auto !important;
	}


	#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> {
		width:100%;
		float:none;
		clear:both;
		margin-right: 0;
		border-right: 0;
	}

	#origincode_videogallery_popup_list_<?php echo $origincode_gallery_videoID; ?> .popup-wrapper_<?php echo $origincode_gallery_videoID; ?> .right-block {
		width:100%;
		float:none;
		clear:both;
		margin-right: 0;
		border-right: 0;
	}

	#origin-popup-overlay {
		position:fixed;
		top: 0;
		left: 0;
		width:100%;
		height:100%;
		z-index:199;
	}
}
.hg_iframe_class_sub {
	width: 100%;
	height: 100%;
	position: absolute;
}

.hg_display_none_block {
	display: none;
}
</style>