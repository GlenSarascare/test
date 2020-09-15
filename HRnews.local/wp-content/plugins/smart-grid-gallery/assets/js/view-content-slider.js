"use strict";
jQuery.each(param_obj, function (index, value) {
    if (!isNaN(value)) {
        param_obj[index] = parseInt(value);
    }
});

function OriginCode_Gallery_Video_Content_Slider(id) {
    var _this = this;
    _this.container = jQuery('#' + id + '.main-slider.liquid-slider');
    _this.pauseHover = _this.container.data("pause-hover") == "on";
    _this.autoSlide = _this.container.data("autoslide") == "on";
    _this.slideDuration = +_this.container.data("slide-duration");
    _this.slideInterval = +_this.container.data("slide-interval");
    _this.hideArrowsThreshold;
    _this.timeArrowsClick;
    if(jQuery(window).width() <=480 ){
        _this.hideArrowsThreshold = 0;
    }
    else{
        _this.hideArrowsThreshold = 1;
    }
    _this.sliderOptons = {
        autoSlide: _this.autoSlide,
        pauseOnHover: _this.pauseHover,
        slideEaseDuration: _this.slideDuration,
        autoSlideInterval: _this.slideInterval,
        hideArrowsThreshold: _this.hideArrowsThreshold,
        responsive: true
    };
    _this.documentReady = function () {
        _this.container.liquidSlider(_this.sliderOptons);
        galleryVideolightboxInit();
    };
    _this.addEventListeners = function () {
        if (_this.autoSlide) {
            jQuery('body').on('click', '.ls-nav-left-arrow,.ls-nav-right-arrow', _this.autoslide);
        }
    };
    _this.autoslide = function () {
        clearTimeout(_this.timeArrowsClick);
        var api = jQuery.data(document.querySelector('#' + id + '.main-slider.liquid-slider'), 'liquidSlider');
        _this.timeArrowsClick = setTimeout(function () {
            api.startAutoSlide();
        }, _this.slideInterval);
    };
    _this.init = function () {
        _this.documentReady();
        _this.addEventListeners();
    };
    this.init();
}
var video_galleries = [];
jQuery(document).ready(function () {
    jQuery(".main-slider.view-content-slider").each(function (i) {
        var id = jQuery(this).attr('id');
        video_galleries[i] = new OriginCode_Gallery_Video_Content_Slider(id);
    });
});
