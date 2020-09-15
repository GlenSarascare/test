<style>

.video-element_<?php echo $origincode_gallery_videoID; ?> {
    width: 100%;
    max-width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view6_width']; ?>px;
    margin:0 0 10px 0;
    border:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view6_border_width']; ?>px solid #<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view6_border_color']; ?>;
    border-radius:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view6_border_radius']; ?>px;
    outline:none;
    overflow:hidden;
    box-sizing: content-box;
}

.video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> {
    position:relative;
    width: 100%;
    max-width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view6_width']; ?>px;
}

.video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> a {display:block;box-shadow: none !important;}

.video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> img {
    width:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view6_width']; ?>px !important;
    height:auto;
    display:block;
    border-radius: 0 !important;
    box-shadow: 0 0 0 rgba(0, 0, 0, 0) !important;
}

.video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> img:hover {
    cursor: -webkit-zoom-in; cursor: -moz-zoom-in;
}

.video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?> .play-icon {
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    cursor: -webkit-zoom-in;
    cursor: -moz-zoom-in;
}

.video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?>  .play-icon.youtube-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.youtube.png'; ?>) center center no-repeat;}

.video-element_<?php echo $origincode_gallery_videoID; ?> .image-block_<?php echo $origincode_gallery_videoID; ?>  .play-icon.vimeo-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.vimeo.png'; ?>) center center no-repeat;}


.video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> {
    position:absolute;
    text-overflow: ellipsis;
    overflow: hidden;
    left:0;
    width:100%;
    height:30px;
    bottom:-35px;
    color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view6_title_font_color"];?>;
    background: <?php
			list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_ht_view6_title_background_color'],2));
				$titleopacity=$origincode_gallery_video_get_option["origincode_gallery_video_ht_view6_title_background_transparency"]/100;
				echo 'rgba('.$r.','.$g.','.$b.','.$titleopacity.')  !important'; 		
	?>;
    -webkit-transition: bottom 0.3s ease-out 0.1s;
    -moz-transition: bottom 0.3s ease-out 0.1s;
    -o-transition: bottom 0.3s ease-out 0.1s;
    transition: bottom 0.3s ease-out 0.1s;
}
.entry-content a{
    border-bottom: 0;
}
.video-element_<?php echo $origincode_gallery_videoID; ?>:hover .title-block_<?php echo $origincode_gallery_videoID; ?> {bottom:0;}

.video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a, .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:link, .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:visited {
    position:relative;
    margin:0;
    padding:0 1% 0 2%;
    width:97%;
    text-decoration:none;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space:nowrap;
    z-index:20;
    font-size: <?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view6_title_font_size"];?>px;
    color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view6_title_font_color"];?>;
    font-weight:normal;
    box-shadow: none !important;
}

.video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:hover, .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:focus, .video-element_<?php echo $origincode_gallery_videoID; ?> .title-block_<?php echo $origincode_gallery_videoID; ?> a:active {
    color:#<?php echo $origincode_gallery_video_get_option["origincode_gallery_video_ht_view6_title_font_hover_color"];?>;
    text-decoration:none;
}

.load_more4 {
    margin: 10px 0;
    position:relative;
    text-align:<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loadmore_position'] == 'left') {echo 'left';}
			elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loadmore_position'] == 'center') { echo 'center'; }
			elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loadmore_position'] == 'right') { echo 'right'; }?>;
    width:100%;
}

.load_more_button4 {
    border-radius: 10px;
    display:inline-block;
    padding:5px 15px;
    font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loadmore_fontsize']; ?>px !important;;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loadmore_font_color']; ?> !important;;
    background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_button_color']; ?> !important;
    cursor:pointer;

}
.load_more_button4:hover{
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_loadmore_font_color_hover']; ?> !important;
    background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_button_color_hover']; ?> !important;
}

.loading4 {
    display:none;
}
.paginate4{
    font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_paginator_fontsize']; ?>px !important;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_paginator_color']; ?> !important;
    text-align: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_paginator_position']; ?>;
    margin-top: 25px;
}
.paginate4 a{
    border-bottom: none !important;
    box-shadow: none !important;
}
.icon-style4{
    font-size: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_paginator_icon_size']; ?>px !important;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view4_paginator_icon_color']; ?> !important;
}
.clear{
    clear:both;
}
</style>