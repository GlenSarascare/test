<style>
.video_view9_container:nth-last-child(3){
    margin-bottom: 0 !important;
    padding-bottom: 0 !important;
    border:none !important;

}
.video_view9_container{
    width: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_general_width']; ?>%;
    float:<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_position'] == 'left' || $origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_position'] == 'center') { echo 'none'; }
					elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_position'] == 'right') { echo 'right'; }?>;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_position'] == 'center') { echo 'margin:0 auto;'; }?>;
    margin-bottom: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_general_space']; ?>px !important;
    padding-bottom: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_general_space']; ?>px !important;
    border-bottom:  <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_general_separator_size']; ?>px

    <?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_separator_style'] == 'none') { echo 'none'; }
          elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_separator_style'] == 'solid') { echo 'solid'; }
          elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_separator_style'] == 'dashed') { echo 'dashed'; }
          elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_separator_style'] == 'dotted') { echo 'dotted'; }
          elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_separator_style'] == 'groove') { echo 'groove'; }
          elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_general_separator_style'] == 'double') { echo 'double'; }?> #<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_general_separator_color']; ?>;
}
.video_new_view_title{
    font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_title_fontsize']; ?>px !important;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_title_color']; ?> !important;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_element_title_show'] == 'false') { echo 'display:none;'; }?>;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_title_textalign'] == 'left') { echo 'text-align:left;'; }
      elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_title_textalign'] == 'right') { echo 'text-align:right;'; }
      elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_title_textalign'] == 'center') { echo 'text-align:center;'; }
      elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_title_textalign'] == 'justify') { echo 'text-align:justify;'; }?>;
    background-color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_title_back_color']; ?> !important;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_title_opacity'] != 100) { echo 'opacity:'.($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_title_opacity']/100).';'; }?>;
}
.video_new_view_desc ul{
    list-style-type: none;
}
.video_new_view_desc{
    margin-top: 15px;
    line-height: 1.5;
    font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_desc_fontsize']; ?>px !important;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_desc_color']; ?> !important;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_element_desc_show'] == 'false') { echo 'display:none;'; }?>;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_desc_textalign'] == 'left') { echo 'text-align:left;'; }
  elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_desc_textalign'] == 'right') { echo 'text-align:right;'; }
  elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_desc_textalign'] == 'center') { echo 'text-align:center;'; }
  elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_desc_textalign'] == 'justify') { echo 'text-align:justify;'; }?>;
    background-color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_desc_back_color']; ?> !important;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_desc_opacity'] != 100) { echo 'opacity:'.($origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_desc_opacity']/100).';'; }?>;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_video_position'] == 'right'):?>
    clear: both;
<?php endif;?>
}
.paginate{
    font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_paginator_fontsize']; ?>px !important;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_paginator_color']; ?> !important;
    text-align: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_view9_paginator_position']; ?>;
}
.paginate a{
    border-bottom: none !important;
    box-shadow: none !important;
}
.icon-style{
    font-size: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_paginator_icon_size']; ?>px !important;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_paginator_icon_color']; ?> !important;
}
.clear{
    clear:both;
}
.video_view9_img{
    display:block;
    margin: 0 auto;
}
.video_view9_vid_wrapper .thumb_wrapper{
    width: 100%;
    height: 100%;
}
.video_view9_vid_wrapper #thevideo{
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
}
.video_view9_vid_wrapper{
    /*width: <?php /*echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_width']; */?>px;
    height: <?php /*echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_video_height']; */?>px;*/
    width: 100%;
    position: relative;
    margin-bottom: 15px;
    display: inline-block;
    float:<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_video_position'] == 'left') {echo 'left';}
			elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_video_position'] == 'center') { echo 'none'; }
			elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_video_position'] == 'right') { echo 'right'; }?>;
<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_image_position'] == 2):?>
    margin-right: 1%;
<?php endif; ?>
    left: 50%;
    transform: translateX(-50%);
    max-width: 99%;
}
.video_view9_vid_wrapper iframe{
    opacity: 1;
    cursor: pointer;
    max-width:100%;
    max-height: 100%;
}
.video_view9_vid_wrapper iframe.iframe-thumb{
    opacity: 0;
}
.thumb_image{
    position: absolute;
    width: 100%;
    height: 100% !important;
    z-index: 10;
}
.youtube-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.youtube.png'; ?>) center center no-repeat;}
.vimeo-icon {background:url(<?php echo ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/play.vimeo.png'; ?>) center center no-repeat;}
.playbutton{
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 11;
}

.load_more {
    margin: 10px 0;
    position:relative;
    text-align:<?php if($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_loadmore_position'] == 'left') {echo 'left';}
			elseif ($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_loadmore_position'] == 'center') { echo 'center'; }
			elseif($origincode_gallery_video_get_option['origincode_gallery_video_video_view9_loadmore_position'] == 'right') { echo 'right'; }?>;

    width:100%;


}

.load_more_button {
    border-radius: 10px;
    display:inline-block;
    padding:5px 15px;
    font-size:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_loadmore_fontsize']; ?>px !important;
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_loadmore_font_color']; ?> !important;
    background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_button_color']; ?> !important;
    cursor:pointer;
    margin-top: 15px;

}
.load_more_button:hover{
    color:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_loadmore_font_color_hover']; ?> !important;
    background:<?php echo '#'.$origincode_gallery_video_get_option['origincode_gallery_video_video_ht_view9_button_color_hover']; ?> !important;
}
.loading {
    display:none;
}

</style>