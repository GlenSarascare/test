"use strict";
jQuery.each(param_obj, function (index, value) {
    if (!isNaN(value)) {
        param_obj[index] = parseInt(value);
    }
});
function OriginCode_Gallery_Video_Justified(id) {
    var _this = this;
    _this.body = jQuery('body');
    _this.container = jQuery('#' + id + '.view-justified');
    _this.content = _this.container.parent();
    _this.defaultBlockWidth = param_obj.origincode_gallery_video_ht_view6_width;
    _this.loadMoreBtn = _this.content.find('.load_more_button2');
    _this.loadingIcon = _this.content.find('.loading2');
    _this.galleryVideoId = _this.content.attr('data-gallery-video-id');
    _this.contentPerPage = _this.content.attr('data-gallery-video-perpage');
    _this.documentReady = function () {
        jQuery(window).load(function () {
            jQuery('.justified-gallery a').each(function () {
                var img = jQuery(this).find('img');
                if (jQuery(this).find('img').attr('alt') == '') {
                    img.parent().find(".caption").css('display', 'none');
                }
            });
        });
    };
    _this.addEventListeners = function () {
        _this.loadMoreBtn.on('click', _this.loadMoreBtnClick);
    };
    _this.loadMoreBtnClick = function () {
        var justifiedLoadNonce = jQuery(this).attr('data-justified-load-nonce');
        if (parseInt(_this.content.find(".pagenum:last").val()) < parseInt(_this.content.find("#total").val())) {
            var pagenum = parseInt(_this.content.find(".pagenum:last").val()) + 1;
            var perpage = _this.contentPerPage;
            var galleryVideoId = _this.galleryVideoId;
            _this.getResult(pagenum, perpage, galleryVideoId, justifiedLoadNonce);
        } else {
            _this.loadMoreBtn.hide();
        }
        return false;
    };
    _this.getResult = function (pagenum, perpage, galleryVideoId, justifiedLoadNonce) {
        var data = {
            action: "origincode_origincode_gallery_video_front_end_ajax",
            task: 'load_videos_justified',
            page: pagenum,
            perpage: perpage,
            galleryVideoId: galleryVideoId,
            galleryVideoJustifiedLoadNonce: justifiedLoadNonce
        };
        _this.loadingIcon.show();
        _this.loadMoreBtn.hide();
        jQuery.post(adminUrl, data, function (response) {
                if (response.success) {
                    var $objnewitems = jQuery(response.success);
                    _this.container.append($objnewitems);
                    setTimeout(function () {
                        _this.container.justifiedGallery();

                    }, 100);
                    _this.loadMoreBtn.show();
                    _this.loadingIcon.hide();
                    if (_this.content.find(".pagenum:last").val() == _this.content.find("#total").val()) {
                        _this.loadMoreBtn.hide();
                    }
                    galleryVideolightboxInit();
                    setTimeout(function () {
                        jQuery('.justified-gallery a').each(function () {
                            var img = jQuery(this).find('img');
                            if (jQuery(this).find('img').attr('alt') == '') {
                                img.parent().find(".caption").css('display', 'none');
                            }
                        });
                    }, 500);
                } else {
                    alert("no");
                }
            }
            , "json");
    };
    _this.init = function () {
        _this.container.justifiedGallery();
        _this.documentReady();
        _this.addEventListeners();
    };
    this.init();
}
var videoGalleries = [];
jQuery(document).ready(function () {
    jQuery(".my_video_gallery.view-justified").each(function (i) {
        var id = jQuery(this).attr('id');
        videoGalleries[i] = new OriginCode_Gallery_Video_Justified(id);
    });
});

