"use strict";
function OriginCode_Gallery_Video_Playlist(id) {
    var _this = this;
    _this.container = jQuery('#' + id + '.main-playlist');
    _this.gallery_id = _this.container.data("origincode_gallery_video_id");
    _this.scroll = _this.container.data("scroll");
    _this.position = _this.container.data("position");

    ///// on thumbnail click open video
    _this.AttachThumbClick = function (){
        jQuery('#'+id).children().find(".origincode_videogallery_item").on('click', function( event ) {
            event.preventDefault();
            jQuery('.main-video'+_this.gallery_id).attr('src', jQuery(this).attr('href') );
            jQuery(this).closest('ul').children().removeClass('active_li');
            jQuery(this).closest('li').addClass('active_li');

        });
    };
    _this.AttachThumbClick();

    ///// turn on first video
    jQuery('#' + id).children().find('#vid-list a').first().click();

    ///// resize responsive container
    _this.resizeRespons = function () {
        jQuery(window).resize(function () {
            _this.container.height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
            jQuery(".video-wrapper").height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
            jQuery(".playlist-scroll").height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
            jQuery("ul#vid-list").height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
        });
    };
    _this.container.height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
    jQuery(".video-wrapper").height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
    jQuery(".playlist-scroll").height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
    jQuery("ul#vid-list").height(0.67 * jQuery('.playlist-container').width() * 9 / 16);
    _this.resizeRespons();

    ///// scroll on mouse move
    if (_this.scroll == 'off') {
        if (_this.position == 'top' || _this.position == 'bottom') {
            var newX = 0,
                prevX = 0,
                scrollRight = 0,
                thumbContWidth = 0;
            thumbContWidth = jQuery(".playlist-thumbs").width();
            jQuery(".playlist-scroll").mousemove(function (event) {
                var scrollSize = 0;
                var mouseMoveSize = 0;
                var thumbs_cont = jQuery(this).find('.playlist-thumbs');
                prevX = newX;
                newX = event.pageX;
                mouseMoveSize = newX - prevX;
                jQuery(".main-video").height();
                if (mouseMoveSize < 10) {
                    if (( mouseMoveSize > 0 ) && ( scrollRight < thumbContWidth )) {
                        scrollSize = scrollRight + mouseMoveSize;
                        thumbs_cont.animate({
                            scrollLeft: scrollSize
                        }, {
                            duration: 10,
                            specialEasing: {
                                width: "swing",
                                height: "easeOutBounce"
                            }
                        });
                        scrollRight = scrollSize;
                    } else {
                        if (( mouseMoveSize < 0 ) && ( scrollRight > -1 )) {
                            scrollSize = scrollRight + mouseMoveSize;
                            thumbs_cont.animate({
                                scrollLeft: scrollSize
                            }, {
                                duration: 10,
                                specialEasing: {
                                    width: "swing",
                                    height: "easeOutBounce"
                                }
                            });
                            scrollRight = scrollSize;
                        }

                    }
                }
            });
        } else {
            var newY = 0,
                prevY = 0,
                scrollTop = 0,
                thumbContHeight = 0;
            thumbContHeight = jQuery(".playlist-thumbs").height();
            jQuery(".playlist-scroll").mousemove(function (event) {
                var scrollSize = 0;
                var mouseMoveSize = 0;
                var thumbs_cont = jQuery(this).find('.playlist-thumbs');
                prevY = newY;
                newY = event.pageY;
                mouseMoveSize = newY - prevY;
                jQuery(".main-video").height();
                if (mouseMoveSize < 10) {
                    if (( mouseMoveSize > 0 ) && ( scrollTop < thumbContHeight )) {
                        scrollSize = scrollTop + mouseMoveSize;
                        thumbs_cont.animate({
                            scrollTop: scrollSize
                        }, {
                            duration: 10,
                            specialEasing: {
                                width: "swing",
                                height: "easeOutBounce"
                            }
                        });
                        scrollTop = scrollSize;
                    } else {
                        if (( mouseMoveSize < 0 ) && ( scrollTop > -1 )) {
                            scrollSize = scrollTop + mouseMoveSize;
                            thumbs_cont.animate({
                                scrollTop: scrollSize
                            }, {
                                duration: 10,
                                specialEasing: {
                                    width: "swing",
                                    height: "easeOutBounce"
                                }
                            });
                            scrollTop = scrollSize;
                        }

                    }
                }
            });
        }
    }

    ///// thumbnail text shortener
    function shorten(text, maxLength) {
        var ret = text;
        if (ret.length > maxLength) {
            ret = ret.substr(0, maxLength - 3) + "…";
        }
        return ret;
    }
    _this.container.find('.vid-thumb-title').each(function () {
        var shortVal = shorten(jQuery(this).text(), 13);
        jQuery(this).text(shortVal);
    });
    _this.container.find('.vid-thumb-description').each(function () {
        var shortVal = shorten(jQuery(this).text(), 35);
        jQuery(this).text(shortVal);
    })
}

var video_galleries = [];
jQuery(document).ready(function () {
    jQuery(".main-playlist.view-playlist").each(function (i) {
        var id = jQuery(this).attr('id');
        video_galleries[i] = new OriginCode_Gallery_Video_Playlist(id);
    });
});

