"use strict";
jQuery.each(param_obj, function (index, value) {
    if (!isNaN(value)) {
        param_obj[index] = parseInt(value);
    }
});
function OriginCode_Gallery_Video_Thumbnails(id) {
    var _this = this;
    _this.body = jQuery('body');
    _this.container = jQuery('#' + id + '.view-thumbnails');
    _this.content = _this.container.parent();
    _this.defaultBlockWidth = param_obj.origincode_gallery_video_thumb_image_width;
    _this.defaultBlockHeiight = param_obj.origincode_gallery_video_thumb_image_height;
    _this.loadMoreBtn = _this.content.find('.load_more_button3');
    _this.loadingIcon = _this.content.find('.loading3');
    _this.galleryVideoId = _this.content.attr('data-gallery-video-id');
    _this.contentPerPage = _this.content.attr('data-gallery-video-perpage');

    _this.addEventListeners = function () {

      //  if (parseInt(_this.content.find(".pagenum:last").val()) == parseInt(_this.container.find("#total").val())) {  _this.loadMoreBtn.hide();}

        _this.loadMoreBtn.on('click', _this.loadMoreBtnClick);

    };
    _this.loadMoreBtnClick = function () {
        var thumbnailLoadNonce = jQuery(this).attr('data-thumbnail-load-nonce');
        if (parseInt(_this.content.find(".pagenum:last").val()) < parseInt(_this.container.find("#total").val())) {
            var pagenum = parseInt(_this.content.find(".pagenum:last").val()) + 1;
            var perpage = _this.contentPerPage;
            var galleryVideoId = _this.galleryVideoId;
            var thumbtext = param_obj.origincode_gallery_video_thumb_view_text;
            _this.getResult(pagenum, perpage, galleryVideoId, thumbtext, thumbnailLoadNonce);
        }
        else {
            _this.loadMoreBtn.hide();
        }
        return false;
    };
    _this.getResult = function (pagenum, perpage, galleryVideoId, thumbtext, thumbnailLoadNonce) {
        if (_this.content.find(".pagenum:last").val() == _this.content.find("#total").val()) {
            _this.loadMoreBtn.hide();
        }else{
            var data = {
                action: "origincode_origincode_gallery_video_front_end_ajax",
                task: 'load_videos_thumbnail',
                page: pagenum,
                perpage: perpage,
                galleryVideoId: galleryVideoId,
                thumbtext: thumbtext,
                galleryVideoThumbnailLoadNonce: thumbnailLoadNonce
            };
            _this.loadingIcon.show();
            _this.loadMoreBtn.hide();
            jQuery.post(adminUrl, data, function (response) {
                    if(response.success) {
                        var $objnewitems = jQuery(response.success);
                        _this.container.append($objnewitems);
                        _this.loadMoreBtn.show();
                        _this.loadingIcon.hide();
                        if (_this.content.find(".pagenum:last").val() == _this.content.find("#total").val()) {
                            _this.loadMoreBtn.hide();
                        }
                        galleryVideolightboxInit();
                        setTimeout(function () {
                            if (param_obj.origincode_gallery_video_video_natural_size_thumbnail == 'natural') {
                                _this.naturalImageThumb();
                            }
                        }, 200);
                    } else {
                        alert("no");
                    }
                }
                , "json");
        }

    };
    _this.naturalImageThumb = function () {
        _this.container.find(".origincode_big_li img").each(function (i, img) {
            var imgStr = jQuery(this).prop('naturalWidth') / jQuery(this).prop('naturalHeight');
            var elemStr = _this.defaultBlockWidth / _this.defaultBlockHeiight;
            if (imgStr <= elemStr) {
                jQuery(img).css({
                    position: "relative",
                    width: '100%',
                    top: '50%',
                    transform: 'translateY(-50%)'
                });
            } else {
                jQuery(img).css({
                    position: "relative",
                    height: '100%',
                    left: '50%',
                    transform: 'translateX(-50%)'
                });
            }
        });
    };
    _this.init = function () {
        _this.addEventListeners();
        if (param_obj.origincode_gallery_video_video_natural_size_thumbnail == 'natural') {
            _this.naturalImageThumb();
        }
    };
    this.init();
}
var video_galleries = [];
jQuery(document).ready(function () {
    jQuery(".origincode_videogallery.view-thumbnails").each(function (i) {
        var id = jQuery(this).attr('id');
        video_galleries[i] = new OriginCode_Gallery_Video_Thumbnails(id);
    });
});

