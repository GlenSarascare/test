"use strict";
jQuery.each(param_obj, function (index, value) {
    if (!isNaN(value)) {
        param_obj[index] = parseInt(value);
    }
});
function OriginCode_Gallery_Video_Blog_Style_Gallery(id) {
    var _this = this;
    _this.body = jQuery('body');
    _this.container = jQuery('#' + id + '.view-blog-style-gallery');
    _this.content = _this.container.parent();
    _this.loadMoreBtn = _this.content.find('.load_more_button');
    _this.loadingIcon = _this.content.find('.loading');
    _this.galleryVideoId = _this.content.attr('data-gallery-video-id');
    _this.contentPerPage = _this.content.attr('data-gallery-video-perpage');
    _this.element = _this.container.find('.video_view9_container');
    _this.wrapperWidth = _this.element.find('.video_view9_vid_wrapper').width();
    _this.addEventListeners = function () {
        _this.loadMoreBtn.on('click', _this.loadMoreBtnClick);
        _this.container.on('click','.thumb_image,.playbutton', _this.thumbWrapperClick);
    };
    _this.loadMoreBtnClick = function () {
        var blogLoadNonce = jQuery(this).attr('data-blog-nonce');
        if (parseInt(_this.content.find(".pagenum:last").val()) < parseInt(_this.container.find("#total").val())) {
            var pagenum = parseInt(_this.content.find(".pagenum:last").val()) + 1;
            var perpage = _this.contentPerPage;
            var galleryVideoId = _this.galleryVideoId;
            _this.getResult(pagenum, perpage, galleryVideoId, blogLoadNonce);
        } else {
            _this.loadMoreBtn.hide();
        }
        return false;
    };
    _this.thumbWrapperClick = function(){
        var src = jQuery(this).parent().next().find('iframe').attr('src');
        src += '?autoplay=1';
        jQuery(this).parent().next().find('iframe').attr('src',src);
        jQuery(this).parent().next().find('iframe').css('opacity','1');
        jQuery(this).parent().find('*').css('display','none');
    };
    _this.getResult = function (pagenum, perpage, galleryVideoId, blogLoadNonce) {
        var data = {
            action: "origincode_origincode_gallery_video_front_end_ajax",
            task: 'load_videos_blog_style',
            page: pagenum,
            perpage: perpage,
            galleryVideoId: galleryVideoId,
            galleryImgBlogLoadNonce: blogLoadNonce
        };
        _this.loadingIcon.show();
        _this.loadMoreBtn.hide();
        jQuery.post(adminUrl, data, function (response) {
                if (response.success) {
                    var $objnewitems = jQuery(response.success);
                    _this.container.append($objnewitems);
                    setTimeout(function () {
                        _this.resizeEvent();
                    }, 100);
                    _this.loadMoreBtn.show();
                    _this.loadingIcon.hide();
                    if (_this.content.find(".pagenum:last").val() == _this.content.find("#total").val()) {
                        _this.loadMoreBtn.hide();
                    }
                } else {
                    alert("no");
                }
            }
            , "json");
    };
    _this.resizeEvent = function(){
        var iframeRatio = 56.25;
        var wrapperHeight = _this.wrapperWidth*iframeRatio/100;
        _this.container.find('.video_view9_container').find('.video_view9_vid_wrapper').css('height',wrapperHeight);
    }
    _this.init = function () {
        _this.addEventListeners();
        _this.resizeEvent();
        jQuery(window).resize(function(){
            _this.wrapperWidth = _this.element.find('.video_view9_vid_wrapper').width();
        _this.resizeEvent();
        });
    };
    this.init();
}
var videoGalleries = [];
jQuery(document).ready(function () {
    jQuery(".origincode_gallery_video_view9_cont_list.view-blog-style-gallery").each(function (i) {
        var id = jQuery(this).attr('id');
        videoGalleries[i] = new OriginCode_Gallery_Video_Blog_Style_Gallery(id);
    });
});

