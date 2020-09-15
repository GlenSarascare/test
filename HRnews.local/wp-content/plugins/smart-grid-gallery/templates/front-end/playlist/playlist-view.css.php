<style>
.main-playlist a {
    outline: none;
    text-decoration: none;
    box-shadow: none;
}
.main-playlist {
    max-width: <?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_container_width']?>px;
    margin-top: 5px;
    margin-bottom: 5px;
}
.playlist-container{
    max-width: 100%;
    border: 1px solid #333333;
    background-color:#333333;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.playlist-container::after{
    content: "";
    clear: both;
    display: table;
}
ul#vid-list .vid-thumb-description {
    color: gray;
}
.video-wrapper {
    position: relative;
}
ul#vid-list .playlist-thumb-container a {
    border: none;
    box-sizing: border-box;
}
ul#vid-list .vid-thumb img{
    box-shadow: none;
}
.empty_desc {
    padding: 23px !important;
}
ul#vid-list .active_li .playlist-thumb-desc{
    background-color:#434343;
}
ul#vid-list .active_li {
    background-color:#434343;
}


/*THUMBS LEFT RIGHT*/
.playlist-scroll {
    float: <?php if ($origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_thumb_position']=='left' ) { echo 'right';} else {echo 'left';} ;?>;
    width: 33%;
}
.video-wrapper {
    float: <?php if ($origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_thumb_position']=='left' ) { echo 'right';} else {echo 'left';} ;?>;
    width: 67%;
    max-height:<?php echo $origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_container_width']*9/16?>px;
}

ul#vid-list {
    overflow-y: <?php if ($origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_thumb_scroll']=='on') { echo 'scroll';} else {echo 'hidden';} ?>;
    max-height:<?php echo ($origincode_gallery_video_get_option['origincode_gallery_video_ht_view10_container_width'])*9/16?>px;
}
ul#vid-list .playlist-thumb-container {
    font-size: 11px;
    line-height: 15px;
    color: #ddd;
    overflow: hidden;
    white-space: normal;
    vertical-align: middle;
}
ul#vid-list {
    margin:0;
    padding:0;
    background: #222;
    cursor: pointer;
    width: 100%;
}
ul#vid-list li {
    width: 100%;
    list-style: none;
    margin:0;
    padding:10px;
    border-bottom:1px solid black;
}
ul#vid-list li a {
    text-decoration: none ;
    background-color: #222;
    display:block;
    color:#333333;
    box-shadow:none;
}
ul#vid-list li:hover  {
    background-color:#434343 ;
}
ul#vid-list li:hover a {
    background-color:#434343 ;
}
ul#vid-list  img{
    width: 46px;
    height: 46px;
}
ul#vid-list .vid-thumb {
    float: left;
    width: 50px;
    box-sizing: border-box;
}
ul#vid-list .vid-thumb-title {
    color: #dbdbdb;
    font-size: 13px;
    font-weight: bold;
    overflow: hidden;
}
ul#vid-list .playlist-thumb-desc {
    font-size: 11px;
    line-height: 15px;
    color: #ddd;
    padding: 0 5px 0 5px;
    width: calc(100% - 50px);
    float: right;
    overflow: hidden;
    box-sizing: border-box;
}
@media screen and (max-width: 768px) {
    .playlist-scroll {
        width: 100%;
    }
    .video-wrapper {
        float: left;
        width: 100%;
    }
    ul#vid-list div.vid-thumb {
        width: 15% !important;
    }
    ul#vid-list div.playlist-thumb-desc {
        width:85% !important;
    }
}
</style>