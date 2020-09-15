"use strict";
jQuery.each(param_obj, function (index, value) {
    if (!isNaN(value)) {
        param_obj[index] = parseInt(value);
    }
});
//@todo natural images
function OriginCode_Gallery_Video_Content_Popup(id) {
    var _this = this;
    _this.body = jQuery('body');
    _this.container = jQuery('#' + id + '.view-content-popup');
    _this.content = _this.container.parent();
    _this.element = _this.container.find('.video-element');
    _this.defaultBlockHeight = param_obj.origincode_gallery_video_ht_view2_element_height;
    _this.defaultBlockWidth = param_obj.origincode_gallery_video_ht_view2_element_width;
    _this.imageOverlay = _this.element.find('.videogallery-image-overlay a');
    _this.popupList = _this.content.next();
    _this.popupCloseButton = _this.popupList.find('a.close');
    _this.leftButton = _this.popupList.find('.heading-navigation .left-change');
    _this.rightButton = _this.popupList.find('.heading-navigation .right-change');
    _this.isCentered = _this.container.data("show-center") == 'on';
    _this.imageBehaviour = _this.container.data("image-behaviour");
    _this.loadMoreBtn = _this.content.find('.load_more_button5');
    _this.loadingIcon = _this.content.find('.loading5');
    _this.galleryVideoId = _this.content.attr('data-gallery-video-id');
    _this.contentPerPage = _this.content.attr('data-gallery-video-perpage');

    _this.documentReady = function () {
        var options = {
            itemSelector: _this.element,
            masonry: {
                columnWidth: _this.defaultBlockWidth + 20 + param_obj.origincode_gallery_video_ht_view2_element_border_width * 2,
            },
            masonryHorizontal: {
                rowHeight: 300 + 20
            },
            cellsByRow: {
                columnWidth: 300 + 20,
                rowHeight: 240
            },
            cellsByColumn: {
                columnWidth: 300 + 20,
                rowHeight: 240
            },
            getSortData: {
                symbol: function ($elem) {
                    return $elem.attr('data-symbol');
                },
                category: function ($elem) {
                    return $elem.attr('data-category');
                },
                number: function ($elem) {
                    return parseInt($elem.find('.number').text(), 10);
                },
                weight: function ($elem) {
                    return parseFloat($elem.find('.weight').text().replace(/[\(\)]/g, ''));
                },
                id: function ($elem) {
                    return $elem.find('.id').text();
                }
            }
        };
        galleryVideoIsotope(_this.container.children().first());
        galleryVideoIsotope(_this.container.children(), options);
    };
    _this.showCenter = function () {
        if (_this.isCentered) {
            var count = _this.element.length;
            var elementwidth = _this.defaultBlockWidth + 20 + param_obj.origincode_gallery_video_ht_view2_element_border_width * 2;
            var enterycontent = _this.content.width();
            var whole = Math.floor(enterycontent / elementwidth);
            if (whole > count) whole = count;
            if (whole == 0) {
                return false;
            }
            else {
                var sectionwidth = whole * elementwidth ;
            }
            _this.container.css({
                "width": sectionwidth,
                "max-width": "100%",
                "margin": "0px auto",
                "overflow": "hidden"
            });
            var loadInterval = setInterval(function () {
                galleryVideoIsotope(_this.container.children(), 'layout');
            }, 100);
            setTimeout(function () {
                clearInterval(loadInterval);
            }, 5000);
        }
    };


    _this.addEventListeners = function () {
        _this.container.on('click', '.videogallery-image-overlay a', _this.overlayClick);
        _this.popupList.on('click', 'a.close', _this.closePopup);
        _this.body.on('click', '#origin-popup-overlay', _this.closePopup);
        _this.popupList.on('click', '.heading-navigation .left-change', _this.leftChange);
        _this.popupList.on('click', '.heading-navigation .right-change', _this.rightChange);
        _this.popupList.on('click', '.hg_iframe_class_sub', _this.playVideo);
        _this.body.keydown(_this.changeRightAndLeft);
        _this.loadMoreBtn.on('click', _this.loadMoreBtnClick);
        jQuery(window).resize(_this.resizeEvent);
    };
    _this.playVideo = function(){
        var video_src = jQuery(this).parent().find("iframe").attr('src');
        if (video_src.indexOf("youtube") >= 0) {
            jQuery(this).parent().find("iframe").attr('src', video_src + '?autoplay=1');
        }
        else {
            jQuery(this).parent().find("iframe").attr('src', video_src + '&autoplay=1');
        }
        jQuery(this).addClass("hg_display_none_block");
    }
    _this.overlayClick = function () {
        var strid = jQuery(this).attr('href').replace('#', '');
        jQuery('body').append('<div id="origin-popup-overlay"></div>');
        _this.popupList.insertBefore('#origin-popup-overlay');
        var height = jQuery(window).height();
        var width = jQuery(window).width();
        if (width <= 767) {
            jQuery(window).scrollTop(0);
            _this.popupList.find('.popup-wrapper .image-block iframe').height(jQuery('body').width() * 0.5);
        } else {
            _this.popupList.find('.popup-wrapper .image-block iframe').height(jQuery('body').width() * 0.23);
        }
        jQuery('#origincode_videogallery_pupup_element_' + strid).addClass('active').css({height: height * 0.7});
        _this.popupList.addClass('active');

        if (jQuery('.pupup-element.active .description').height() + jQuery('.right-block h3').height() + 200 > jQuery('.pupup-element.active .right-block').height()) {
            if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block').height()) {
                jQuery('.pupup-element.active .right-block').css('overflow-y', '');
                jQuery('.pupup-element.active .popup-wrapper').css('overflow-y', 'auto');
            } else {
                jQuery('.pupup-element.active .right-block').css('overflow-y', 'auto');
            }
        } else {
            if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block').height()) {
                jQuery('.pupup-element.active .popup-wrapper').css('overflow-y', 'auto');
            }
        }

        return false;
    };
    _this.leftChange = function () {
        var height = jQuery(window).height();
        var num = jQuery(this).find("a").attr("href").replace('#', '');
        var videoSrc = _this.popupList.find('.pupup-element.active .image-block .hg_iframe_class > iframe').attr('src');
        if(videoSrc.indexOf('autoplay=1')) {
            videoSrc=videoSrc.replace('autoplay=1','autoplay=0');
            _this.popupList.find('.pupup-element.active .image-block .hg_iframe_class > iframe').attr('src',videoSrc);
        }
        if (num >= 1) {
            var strid = jQuery(this).closest(".pupup-element").prev(".pupup-element").find('a').data('popupid').replace('#', '');
            _this.popupList.find('#origincode_videogallery_pupup_element_' + strid).css({height: height * 0.7});
            jQuery(this).closest(".pupup-element").removeClass("active");
            jQuery(this).closest(".pupup-element").prev(".pupup-element").addClass("active");
        } else {
            var strid = _this.popupList.find(".pupup-element").last().find('a').data('popupid').replace('#', '');
            _this.popupList.find('#origincode_videogallery_pupup_element_' + strid).css({height: height * 0.7});
            jQuery(this).closest(".pupup-element").removeClass("active");
            _this.popupList.find(".pupup-element").last().addClass("active");
        }

        if (jQuery('.pupup-element.active .description').height() + jQuery('.right-block h3').height() + 200 > jQuery('.pupup-element.active .right-block').height()) {
            if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block').height()) {
                jQuery('.pupup-element.active .right-block').css('overflow-y', '');
                jQuery('.pupup-element.active .popup-wrapper').css('overflow-y', 'auto');
            } else {
                jQuery('.pupup-element.active .right-block').css('overflow-y', 'auto');
            }
        } else {
            if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block').height()) {
                jQuery('.pupup-element.active .popup-wrapper').css('overflow-y', 'auto');
            }
        }
    };
    _this.rightChange = function () {
        var height = jQuery(window).height();
        var num = jQuery(this).find("a").attr("href").replace('#', '');
        var cnt = 0;
        var videoSrc = _this.popupList.find('.pupup-element.active .image-block .hg_iframe_class > iframe').attr('src');
        if(videoSrc.indexOf('autoplay=1')) {
            videoSrc=videoSrc.replace('autoplay=1','autoplay=0');
            _this.popupList.find('.pupup-element.active .image-block .hg_iframe_class > iframe').attr('src',videoSrc);
        }
        _this.popupList.find(".pupup-element").each(function () {
            cnt++;
        });
        if (num <= cnt) {
            var strid = jQuery(this).closest(".pupup-element").next(".pupup-element").find('a').data('popupid').replace('#', '');
            _this.popupList.find('#origincode_videogallery_pupup_element_' + strid).css({height: height * 0.7});
            jQuery(this).closest(".pupup-element").removeClass("active");
            jQuery(this).closest(".pupup-element").next(".pupup-element").addClass("active");
        } else {
            var strid = _this.popupList.find(".pupup-element:first-child a").data('popupid').replace('#', '');
            _this.popupList.find('#origincode_videogallery_pupup_element_' + strid).css({height: height * 0.7});
            jQuery(this).closest(".pupup-element").removeClass("active");
            _this.popupList.find(".pupup-element:first-child").addClass("active");
        }

        if (jQuery('.pupup-element.active .description').height() + jQuery('.right-block h3').height() + 200 > jQuery('.pupup-element.active .right-block').height()) {
            if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block').height()) {
                jQuery('.pupup-element.active .right-block').css('overflow-y', '');
                jQuery('.pupup-element.active .popup-wrapper').css('overflow-y', 'auto');
            } else {
                jQuery('.pupup-element.active .right-block').css('overflow-y', 'auto');
            }
        } else {
            if (jQuery('.pupup-element.active img').height() > jQuery('.pupup-element.active .image-block').height()) {
                jQuery('.pupup-element.active .popup-wrapper').css('overflow-y', 'auto');
            }
        }
    };
    _this.closePopup = function () {
        jQuery('#origin-popup-overlay').remove();
        var videoSrc = _this.popupList.find('li.active iframe').attr('src');
        videoSrc = videoSrc.split('?');
        videoSrc = videoSrc[0];
        _this.popupList.find('li.active iframe').attr('src', '');
        _this.popupList.find('li.active iframe').attr('src', videoSrc);
        _this.popupList.find('li').removeClass('active');
        _this.popupList.removeClass('active');
    };
    _this.changeRightAndLeft = function (e) {
        if (e.keyCode == 37) {
            _this.popupList.find('li.active .heading-navigation .left-change').click();
        }
        if (e.keyCode == 39) {
            _this.popupList.find('li.active .heading-navigation .right-change').click();
        }
        if (e.keyCode == 27) {
            _this.closePopup();
        }
    };
    _this.resizeEvent = function () {
        var iframeHeight = jQuery('body').width() * 0.23;
        _this.popupList.find('.popup-wrapper .image-block iframe').height(iframeHeight);
        galleryVideoIsotope(_this.container.children(), 'layout');
        _this.showCenter();

    };
    _this.imagesBehavior = function () {
        _this.container.find('.video-element .image-block img').each(function (i, img) {
            var naturalRatio = jQuery(this).prop('naturalWidth') / jQuery(this).prop('naturalHeight');
            var defaultRatio = _this.defaultBlockWidth / _this.defaultBlockHeight;
            if (naturalRatio <= defaultRatio) {
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
    _this.loadMoreBtnClick = function () {
        var contentLoadNonce = jQuery(this).attr('data-content-nonce-value');
        if (parseInt(_this.content.find(".pagenum:last").val()) < parseInt(_this.container.find("#total").val())) {
            var pagenum = parseInt(_this.content.find(".pagenum:last").val()) + 1;
            var perpage = _this.contentPerPage;
            var galleryVideoId = _this.galleryVideoId;
            var linkbutton = param_obj.origincode_gallery_video_ht_view2_element_linkbutton_text;
            var showbutton = param_obj.origincode_gallery_video_ht_view2_element_show_linkbutton;
            var changePopup = _this.popupList.find('.pupup-element:last').find('.right-change a').attr('href').replace('#', '');
            _this.getResult(pagenum, perpage, galleryVideoId, linkbutton, showbutton, contentLoadNonce, changePopup);
        } else {
            _this.loadMoreBtn.hide();
        }
        return false;
    };
    _this.getResult = function (pagenum, perpage, galleryVideoId, linkbutton, showbutton, contentLoadNonce, changePopup) {
        var data = {
            action: "origincode_origincode_gallery_video_front_end_ajax",
            task: 'load_videos_content',
            page: pagenum,
            perpage: perpage,
            galleryVideoId: galleryVideoId,
            linkbutton: linkbutton,
            showbutton: showbutton,
            galleryVideoContentLoadNonce: contentLoadNonce,
            change_popup: changePopup
        };
        _this.loadingIcon.show();
        _this.loadMoreBtn.hide();
        jQuery.post(adminUrl, data, function (response) {
                if (response.success) {
                    var $objnewitems = jQuery(response.output);
                    var popupNewItems = response.output_popup;
                    _this.container.children().first().append($objnewitems);
                  galleryVideoIsotope(_this.container.children().first());
                    setTimeout(function () {

                        galleryVideoIsotope(_this.container.children().first(), 'reloadItems');
                        galleryVideoIsotope(_this.container.children().first(), {sortBy: 'original-order'});
                        galleryVideoIsotope(_this.container.children().first(), 'layout');
                    }, 100);
                    _this.popupList.append(popupNewItems);
                    _this.container.children().find('img').on('load', function () {
                        var defaultBlockHeight = param_obj.origincode_gallery_video_ht_view2_element_height + 37;
                        var defaultBlockWidth = param_obj.origincode_gallery_video_ht_view2_element_width;
                        var options2 = {
                            itemSelector: '.video-element',
                            masonry: {
                                columnWidth: defaultBlockWidth + 20 + param_obj.origincode_gallery_video_ht_view2_element_border_width * 2
                            },
                            masonryHorizontal: {
                                rowHeight: defaultBlockHeight + 20
                            },
                            cellsByRow: {
                                columnWidth: defaultBlockWidth + 20,
                                rowHeight: defaultBlockHeight
                            },
                            cellsByColumn: {
                                columnWidth: defaultBlockWidth + 20,
                                rowHeight: defaultBlockHeight
                            },
                            getSortData: {
                                symbol: function ($elem) {
                                    return $elem.attr('data-symbol');
                                },
                                category: function ($elem) {
                                    return $elem.attr('data-category');
                                },
                                number: function ($elem) {
                                    return parseInt($elem.find('.number').text(), 10);
                                },
                                weight: function ($elem) {
                                    return parseFloat($elem.find('.weight').text().replace(/[\(\)]/g, ''));
                                },
                                name: function ($elem) {
                                    return $elem.find('.name').text();
                                }
                            }
                        };
                        galleryVideoIsotope(_this.container.children(), options2);
                        if (param_obj.origincode_gallery_video_ht_view2_content_in_center == 'on') {
                            _this.showCenter();
                        }
                    });
                    _this.loadMoreBtn.show();
                    _this.loadingIcon.hide();
                    if (_this.content.find(".pagenum:last").val() == _this.content.find("#total").val()) {
                        _this.loadMoreBtn.hide();
                    }
                    if (_this.imageBehaviour == 'natural') {
                        setTimeout(function () {
                            _this.imagesBehavior();
                        }, 100);
                    }
                }
                else {
                    alert("no");
                }
            }
            , "json");
    }
    _this.init = function () {
        _this.showCenter();
        _this.documentReady();
        _this.addEventListeners();
        if (_this.imageBehaviour == 'natural') {
            setTimeout(function () {
                _this.imagesBehavior();
            });
        }
    };

    this.init();
}
var videoGalleries = [];
jQuery(document).ready(function () {
    jQuery(".origincode_videogallery_container.view-content-popup").each(function (i) {
        var id = jQuery(this).attr('id');
        videoGalleries[i] = new OriginCode_Gallery_Video_Content_Popup(id);
    });
});

