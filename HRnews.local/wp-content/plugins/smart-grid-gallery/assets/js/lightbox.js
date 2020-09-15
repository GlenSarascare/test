(function ($) {

    'use strict';
    jQuery.each(origincode_gallery_video_resp_lightbox_obj, function (index, value) {
        if (value.indexOf('true') > -1 || value.indexOf('false') > -1)
            origincode_gallery_video_resp_lightbox_obj[index] = value == "true";
    });

    function Lightbox(element, options) {

        this.el = element;
        this.$element = $(element);
        this.$body = $('body');
        this.objects = {};
        this.lightboxModul = {};
        this.$item = '';
        this.$cont = '';
        this.$items = this.$body.find('a.vg_responsive_lightbox');

        this.settings = $.extend({}, this.constructor.defaults, options);

        this.init();

        return this;
    }

    Lightbox.defaults = {
        idPrefix: 'origincodevideogallerylb-',
        classPrefix: 'origincodevideogallerylb-',
        attrPrefix: 'data-',
        slideAnimationType: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_slideAnimationType, /*  effect_1   effect_2    effect_3
         effect_4   effect_5    effect_6
         effect_7   effect_8    effect_9   */
        lightboxView: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_lightboxView,              //  view1, view2, view3, view4, view5
        speed: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_speed_new,
        width: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_width_new + '%',
        height: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_height_new + '%',
        videoMaxWidth: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_videoMaxWidth,
        sizeFix: true, //not for option
        overlayDuration: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_overlayDuration,
        slideAnimation: true, //not for option
        overlayClose: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_overlayClose_new,
        loop: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_loop_new,
        escKey: false,
        keyPress: false,
        arrows: true,
        mouseWheel: false,
        showCounter: false,
        defaultTitle: '',  //some text
        preload: 10,  //not for option
        showAfterLoad: true,  //not for option
        nextHtml: '',  //not for option
        prevHtml: '',  //not for option
        sequence_info: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_sequence_info,
        sequenceInfo: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_sequenceInfo,
        slideshow: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_slideshow_new,
        slideshowAuto: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_slideshow_auto_new,
        slideshowSpeed: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_slideshow_speed_new,
        slideshowStart: '',  //not for option
        slideshowStop: '',   //not for option
        hideControlOnEnd: false,  //not for option
        watermark: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark,
        socialSharing: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_socialSharing,
        titlePos: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_title_pos,
        fullwidth: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_fullwidth_effect,
        zoomLogo: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_zoomlogo,
        wURL: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_link,
        watermarkURL: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_url,
        wURLnewTab: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_url_new_tab,
        share: false

    };

    Lightbox.prototype.init = function () {

        var $object = this,
            $hash;

        $hash = window.location.hash;

        ($object.settings.watermark && $('.watermark').watermark());

        if ($hash.indexOf('lightbox&') > 0) {
            $object.index = parseInt($hash.split('&slide=')[1], 10) - 1;

            $object.$body.addClass('origincodevideogallerylb-share');
            if (!$object.$body.hasClass('origincodevideogallerylb-on')) {
                setTimeout(function () {
                    $object.build($object.index);
                }, 900);
                $object.$body.addClass('origincodevideogallerylb-on');
            }
        }

        (($object.settings.preload > $object.$items.length) && ($object.settings.preload = $object.$items.length));

        $object.$items.on('click.origincodevideogallerylbcustom', function (event) {

            event = event || window.event;
            event.preventDefault ? event.preventDefault() : (event.returnValue = false);

            $object.index = $object.$items.index(this);

            if (!$object.$body.hasClass($object.settings.classPrefix + 'on')) {
                $object.build($object.index);
                $object.$body.addClass($object.settings.classPrefix + 'on');
            }

        });

        $object.$body.on('click', function () {
            $object.$_y_ = window.pageYOffset;
        });

        switch (this.settings.zoomLogo) {
            case '1':
                $object.$body.addClass('origincodevideogallerylb-zoomGlass');
                break;
            case '2':
                $object.$body.addClass('origincodevideogallerylb-zoomHand');
                break;
        }

    };

    Lightbox.prototype.build = function (index) {

        var $object = this;

        $object.structure();

        $object.lightboxModul['modul'] = new $.fn.lightboxVideo.lightboxModul['modul']($object.el);

        $object.slide(index, false, false);

        ($object.settings.keyPress && $object.addKeyEvents());

        if ($object.$items.length > 1) {

            $object.arrow();

            ($object.settings.mouseWheel && $object.mousewheel());

            ($object.settings.slideshow && $object.slideShow());

        }

        $object.counter();

        $object.closeGallery();

        $object.$cont.on('click.origincodevideogallerylb-container', function () {

            $object.$cont.removeClass($object.settings.classPrefix + 'hide-items');

        });


        $object.calculateDimensions();
    };

    Lightbox.prototype.structure = function () {

        var $object = this, list = '', controls = '', i,
            subHtmlCont1 = '', subHtmlCont2 = '', subHtmlCont3 = '',
            close1 = '', close2 = '', socialIcons = '',
            template, $arrows, $next, $prev,
            $_next, $_prev, $close_bg, $download_bg, $download_bg_, $contInner, $view;

        $view = (this.settings.lightboxView === 'view6') ? 'origincodevideogallerylb-view6' : '';

        this.$body.append(
            this.objects.overlay = $('<div class="' + this.settings.classPrefix + 'overlay ' + $view + '"></div>')
        );
        this.objects.overlay.css('transition-duration', this.settings.overlayDuration + 'ms');

        var $wURL = '',
            $target = '';

        if ($object.settings.watermark && $object.settings.wURL && origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_text) {
            if ($object.settings.wURLnewTab) {
                $target = 'target="_blank"';
            }
            $wURL = '<a href="' + $object.settings.watermarkURL + '" class="w_url" ' + $target + '></a>';
        }

        for (i = 0; i < this.$items.length; i++) {
            list += '<div class="' + this.settings.classPrefix + 'item">' + $wURL + '</div>';
        }

        $close_bg = '<svg class="close_bg" width="16px" height="16px" fill="#999" viewBox="-341 343.4 15.6 15.6">' +
            '<path d="M-332.1,351.2l6.5-6.5c0.3-0.3,0.3-0.8,0-1.1s-0.8-0.3-1.1,0l-6.5,6.5l-6.5-6.5c-0.3-0.3-0.8-0.3-1.1,0s-0.3,0.8,0,1.1l6.5,6.5l-6.5,6.5c-0.3,0.3-0.3,0.8,0,1.1c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2l6.5-6.5l6.5,6.5c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1L-332.1,351.2z"/>' +
            '</svg>';

        switch (this.settings.lightboxView) {
            case 'view1':
            default:
                $_next = '<svg class="next_bg" width="22px" height="22px" fill="#999" viewBox="-333 335.5 31.5 31.5" >' +
                    '<path d="M-311.8,340.5c-0.4-0.4-1.1-0.4-1.6,0c-0.4,0.4-0.4,1.1,0,1.6l8,8h-26.6c-0.6,0-1.1,0.5-1.1,1.1s0.5,1.1,1.1,1.1h26.6l-8,8c-0.4,0.4-0.4,1.2,0,1.6c0.4,0.4,1.2,0.4,1.6,0l10-10c0.4-0.4,0.4-1.1,0-1.6L-311.8,340.5z"/>' +
                    '</svg>';
                $_prev = '<svg class="prev_bg" width="22px" height="22px" fill="#999" viewBox="-333 335.5 31.5 31.5" >' +
                    '<path d="M-322.7,340.5c0.4-0.4,1.1-0.4,1.6,0c0.4,0.4,0.4,1.1,0,1.6l-8,8h26.6c0.6,0,1.1,0.5,1.1,1.1c0,0.6-0.5,1.1-1.1,1.1h-26.6l8,8c0.4,0.4,0.4,1.2,0,1.6c-0.4,0.4-1.1,0.4-1.6,0l-10-10c-0.4-0.4-0.4-1.1,0-1.6L-322.7,340.5z"/>' +
                    '</svg>';
                subHtmlCont1 = '<div class="' + this.settings.classPrefix + 'title"></div>';
                close1 = '<span class="' + this.settings.classPrefix + 'close ' + $object.settings.classPrefix + 'icon">' + $close_bg + '</span>';
                break;
            case 'view2':
                $_next = '<svg class="next_bg" width="22px" height="22px" fill="#999" viewBox="-123 125.2 451.8 451.8" >' +
                    '<g><path d="M222.4,373.4L28.2,567.7c-12.4,12.4-32.4,12.4-44.8,0c-12.4-12.4-12.4-32.4,0-44.7l171.9-171.9L-16.6,179.2c-12.4-12.4-12.4-32.4,0-44.7c12.4-12.4,32.4-12.4,44.8,0l194.3,194.3c6.2,6.2,9.3,14.3,9.3,22.4C231.7,359.2,228.6,367.3,222.4,373.4z"/></g>' +
                    '</svg>';
                $_prev = '<svg class="prev_bg" width="22px" height="22px" fill="#999" viewBox="-123 125.2 451.8 451.8" >' +
                    '<g><path d="M-25.9,351.1c0-8.1,3.1-16.2,9.3-22.4l194.3-194.3c12.4-12.4,32.4-12.4,44.8,0c12.4,12.4,12.4,32.4,0,44.7L50.5,351.1L222.4,523c12.4,12.4,12.4,32.4,0,44.7c-12.4,12.4-32.4,12.4-44.7,0L-16.6,373.4C-22.8,367.3-25.9,359.2-25.9,351.1z"/></g>' +
                    '</svg>';
                subHtmlCont2 = '<div class="' + this.settings.classPrefix + 'title"></div>';
                close2 = '<div class="barCont"></div><span class="' + this.settings.classPrefix + 'close ' + $object.settings.classPrefix + 'icon">' + $close_bg + '</span>';
                break;
            case 'view3':
                $_next = '<svg class="next_bg" width="22px" height="22px" fill="#999" viewBox="-104 105.6 490.4 490.4" >' +
                    '<g><g><path d="M141.2,596c135.2,0,245.2-110,245.2-245.2s-110-245.2-245.2-245.2S-104,215.6-104,350.8S6,596,141.2,596z M141.2,130.1c121.7,0,220.7,99,220.7,220.7s-99,220.7-220.7,220.7s-220.7-99-220.7-220.7S19.5,130.1,141.2,130.1z"/>' +
                    '<path d="M34.7,363.1h183.4l-48,48c-4.8,4.8-4.8,12.5,0,17.3c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6l68.9-68.9c4.8-4.8,4.8-12.5,0-17.3l-68.9-68.9c-4.8-4.8-12.5-4.8-17.3,0s-4.8,12.5,0,17.3l48,48H34.7c-6.8,0-12.3,5.5-12.3,12.3C22.4,357.7,27.9,363.1,34.7,363.1z"/></g></g>' +
                    '</svg>';
                $_prev = '<svg class="prev_bg" width="22px" height="22px" fill="#999" viewBox="-104 105.6 490.4 490.4" >' +
                    '<g><g><path d="M141.2,596c135.2,0,245.2-110,245.2-245.2s-110-245.2-245.2-245.2S-104,215.6-104,350.8S6,596,141.2,596z M141.2,130.1c121.7,0,220.7,99,220.7,220.7s-99,220.7-220.7,220.7s-220.7-99-220.7-220.7S19.5,130.1,141.2,130.1z"/>' +
                    '<path d="M94.9,428.4c2.4,2.4,5.5,3.6,8.7,3.6s6.3-1.2,8.7-3.6c4.8-4.8,4.8-12.5,0-17.3l-48-48h183.4c6.8,0,12.3-5.5,12.3-12.3c0-6.8-5.5-12.3-12.3-12.3H64.3l48-48c4.8-4.8,4.8-12.5,0-17.3c-4.8-4.8-12.5-4.8-17.3,0l-68.9,68.9c-4.8,4.8-4.8,12.5,0,17.3L94.9,428.4z"/></g></g>' +
                    '</svg>';
                subHtmlCont1 = '<div class="' + this.settings.classPrefix + 'title"></div>';
                close1 = '<span class="' + this.settings.classPrefix + 'close ' + $object.settings.classPrefix + 'icon">' + $close_bg + '</span>';
                break;
            case 'view4':
                $_next = '<svg class="next_bg" width="22px" height="22px" fill="#999" viewBox="-123 125.2 451.8 451.8" >' +
                    '<g><path d="M222.4,373.4L28.2,567.7c-12.4,12.4-32.4,12.4-44.8,0c-12.4-12.4-12.4-32.4,0-44.7l171.9-171.9L-16.6,179.2c-12.4-12.4-12.4-32.4,0-44.7c12.4-12.4,32.4-12.4,44.8,0l194.3,194.3c6.2,6.2,9.3,14.3,9.3,22.4C231.7,359.2,228.6,367.3,222.4,373.4z"/></g>' +
                    '</svg>';
                $_prev = '<svg class="prev_bg" width="22px" height="22px" fill="#999" viewBox="-123 125.2 451.8 451.8" >' +
                    '<g><path d="M-25.9,351.1c0-8.1,3.1-16.2,9.3-22.4l194.3-194.3c12.4-12.4,32.4-12.4,44.8,0c12.4,12.4,12.4,32.4,0,44.7L50.5,351.1L222.4,523c12.4,12.4,12.4,32.4,0,44.7c-12.4,12.4-32.4,12.4-44.7,0L-16.6,373.4C-22.8,367.3-25.9,359.2-25.9,351.1z"/></g>' +
                    '</svg>';
                $close_bg = '<svg class="close_bg" width="16px" height="16px" fill="#999" viewBox="-341 343.4 15.6 15.6">' +
                    '<path d="M-332.1,351.2l6.5-6.5c0.3-0.3,0.3-0.8,0-1.1s-0.8-0.3-1.1,0l-6.5,6.5l-6.5-6.5c-0.3-0.3-0.8-0.3-1.1,0s-0.3,0.8,0,1.1l6.5,6.5l-6.5,6.5c-0.3,0.3-0.3,0.8,0,1.1c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2l6.5-6.5l6.5,6.5c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1L-332.1,351.2z"/>' +
                    '</svg>';
                subHtmlCont2 = '<div class="' + this.settings.classPrefix + 'title"></div>';
                close1 = '<span class="' + this.settings.classPrefix + 'close ' + $object.settings.classPrefix + 'icon">' + $close_bg + '</span>';
                break;
            case 'view5':
            case 'view6':
                $_next = '<svg class="next_bg" width="22px" height="44px" fill="#999" x="0px" y="0px"' +
                    'viewBox="0 0 40 70" style="enable-background:new 0 0 40 70;" xml:space="preserve">' +
                    '<path id="XMLID_2_" class="st0" d="M3.3,1.5L1.8,2.9l31.8,31.8c0.5,0.5,0.5,0.9,0,1.4L1.8,67.9l1.5,1.4c0.3,0.5,0.9,0.5,1.4,0' +
                    'l33.2-33.2c0.3-0.5,0.3-0.9,0-1.4L4.7,1.5C4.3,1,3.6,1,3.3,1.5L3.3,1.5z"/>' +
                    '</svg>';
                $_prev = '<svg class="prev_bg" width="22px" height="44px" fill="#999" x="0px" y="0px"' +
                    'viewBox="0 0 40 70" style="enable-background:new 0 0 40 70;" xml:space="preserve">' +
                    '<path id="XMLID_2_" class="st0" d="M37.1,68.9l1.5-1.4L6.8,35.7c-0.3-0.5-0.3-0.9,0-1.4L38.6,2.5l-1.5-1.4c-0.3-0.5-0.9-0.5-1.2,0' +
                    'L2.5,34.3c-0.3,0.5-0.3,0.9,0,1.4l33.4,33.2C36.2,69.4,36.8,69.4,37.1,68.9L37.1,68.9z"/>' +
                    '</svg>';
                $close_bg = '<svg class="close_bg" width="16px" height="16px" fill="#999" viewBox="-341 343.4 15.6 15.6">' +
                    '<path d="M-332.1,351.2l6.5-6.5c0.3-0.3,0.3-0.8,0-1.1s-0.8-0.3-1.1,0l-6.5,6.5l-6.5-6.5c-0.3-0.3-0.8-0.3-1.1,0s-0.3,0.8,0,1.1l6.5,6.5l-6.5,6.5c-0.3,0.3-0.3,0.8,0,1.1c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2l6.5-6.5l6.5,6.5c0.1,0.1,0.3,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1L-332.1,351.2z"/>' +
                    '</svg>';
                subHtmlCont3 += '<div class="' + this.settings.classPrefix + 'title"></div>';
                subHtmlCont3 += '<div class="' + this.settings.classPrefix + 'description"></div>';
                close1 = '<span class="' + this.settings.classPrefix + 'close ' + $object.settings.classPrefix + 'icon">' + $close_bg + '</span>';
                break;
        }

        if (this.settings.arrows && this.$items.length > 1) {
            controls = '<div class="' + this.settings.classPrefix + 'arrows">' +
                '<div class="' + this.settings.classPrefix + 'prev ' + $object.settings.classPrefix + 'icon">' + $_prev + this.settings.prevHtml + '</div>' +
                '<div class="' + this.settings.classPrefix + 'next ' + $object.settings.classPrefix + 'icon">' + $_next + this.settings.nextHtml + '</div>' +
                '</div>';
        }

        if (this.settings.socialSharing && (this.settings.lightboxView !== 'view5' || this.settings.lightboxView !== 'view6')) {
            socialIcons = '<div class="' + this.settings.classPrefix + 'socialIcons"><button class="shareLook">share</button></div>';
        }

        $contInner = (this.settings.lightboxView === 'view5' || this.settings.lightboxView === 'view6') ? '<div class="contInner">' + subHtmlCont3 + '</div>' : '';

        var $zoomDiv = origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_zoom ? '<div class="origincodevideogallerylb-zoomDiv"></div>' : '';
        var arrowHE = (this.settings.lightboxView !== 'view2' && this.settings.lightboxView !== 'view3') ? this.settings.arrowsHoverEffect : '';
        template = '<div class="' + this.settings.classPrefix + 'cont ">' +
            $zoomDiv +
            '<div class="origincodevideogallerylb-container origincodevideogallerylb-' + this.settings.lightboxView + ' origincodevideogallerylb-arrows_hover_effect-' + arrowHE + '">' +
            '<div class="cont-inner">' + list + '</div>' +
            $contInner +
            '<div class="' + this.settings.classPrefix + 'toolbar group">' +
            close1 + subHtmlCont2 +
            '</div>' +
            controls +
            '<div class="' + this.settings.classPrefix + 'bar">' +
            close2 + subHtmlCont1 + '</div>' +
            '</div>' +
            '</div>';


        if ($object.settings.socialSharing) {
            setTimeout(function () {
                $object.socialShare();
            }, 50);
        }

        this.$body.append(template);
        this.$cont = $('.' + $object.settings.classPrefix + 'cont');
        this.$item = this.$cont.find('.' + $object.settings.classPrefix + 'item');

        if (!this.settings.slideAnimation) {
            this.$cont.addClass(this.settings.classPrefix + 'animation');
            this.settings.slideAnimationType = this.settings.classPrefix + 'slide';
        } else {
            this.$cont.addClass(this.settings.classPrefix + 'use');
        }

        $object.calculateDimensions();

        $(window).on('resize.origincodevideogallerylb-container', function () {
            setTimeout(function () {
                $object.calculateDimensions();
            }, 100);
        });

        this.$item.eq(this.index).addClass(this.settings.classPrefix + 'current');

        if (this.effectsSupport()) {
            this.$cont.addClass(this.settings.classPrefix + 'support');
        } else {
            this.$cont.addClass(this.settings.classPrefix + 'noSupport');
            this.settings.speed = 0;
        }

        this.$cont.addClass(this.settings.slideAnimationType);

        ((this.settings.showAfterLoad) && (this.$cont.addClass(this.settings.classPrefix + 'show-after-load')));

        if (this.effectsSupport()) {
            var $inner = this.$cont.find('.cont-inner');
            $inner.css('transition-timing-function', 'ease');
            $inner.css('transition-duration', this.settings.speed + 'ms');
        }

        switch ($object.settings.lightboxView) {
            case 'view1':
            case 'view2':
            case 'view3':
                $inner.css({
                    height: 'calc(100% - 92px)',
                    top: '47px'
                });
                break;
            case 'view4':
                $inner.css({
                    height: 'calc(100% - 92px)',
                    top: '45px'
                });
                break;
        }

        $object.objects.overlay.addClass('in');

        setTimeout(function () {
            $object.$cont.addClass($object.settings.classPrefix + 'visible');
        }, this.settings.overlayDuration);

        if (this.settings.download) {
            $download_bg = '<svg class="download_bg" width="20px" height="20px" stroke="#999" fill="#999"  viewBox="-328 330.3 41.7 41.7" >' +
                '<path class="st0" d="M-296.4,352.1c0.4-0.4,0.4-1.1,0-1.6c-0.4-0.4-1.1-0.4-1.6,0l-8,8V332c0-0.6-0.5-1.1-1.1-1.1c-0.6,0-1.1,0.5-1.1,1.1v26.5l-8-8c-0.4-0.4-1.2-0.4-1.6,0c-0.4,0.4-0.4,1.1,0,1.6l10,10c0.4,0.4,1.1,0.4,1.6,0L-296.4,352.1zM-288.5,359.4c0-0.6,0.5-1.1,1.1-1.1c0.6,0,1.1,0.5,1.1,1.1v10.9c0,0.6-0.5,1.1-1.1,1.1h-39.5c-0.6,0-1.1-0.5-1.1-1.1v-10.9c0-0.6,0.5-1.1,1.1-1.1c0.6,0,1.1,0.5,1.1,1.1v9.8h37.2V359.4z"/>' +
                '</svg>';
            $download_bg_ = '<svg class="download_bg" width="36px" height="34px" stroke="#999" fill="#999" x="0px" y="0px"' +
                'viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve">' +
                '<path id="XMLID_2_" class="st0" d="M61.3,31.8L45.5,47.7c-0.2,0.2-0.5,0.2-0.7,0l-16-15.9c-0.2-0.2-0.2-0.5,0-0.7l2.1-2.1l12.6,12.6' +
                'V7.4c0-0.9,0.7-1.7,1.7-1.7s1.8,0.8,1.8,1.7v34l12.2-12.3l2.1,2.1C61.5,31.3,61.5,31.6,61.3,31.8L61.3,31.8z"/>' +
                '<path id="XMLID_3_" class="st0" d="M25.6,50.7L25.6,50.7h38.7c1.6,0,2.8,1.2,2.8,2.7v1.5c0,1.6-1.2,2.9-2.8,2.9H25.6' +
                'c-1.5,0-2.8-1.3-2.8-2.9v-1.5C22.9,51.9,24.1,50.7,25.6,50.7L25.6,50.7z"/>' +
                '</svg>';
            switch (this.settings.lightboxView) {
                case 'view1':
                default:
                    this.$cont.find('.' + $object.settings.classPrefix + 'toolbar').append('<a id="' + $object.settings.classPrefix + 'download" target="_blank" download class="' + this.settings.classPrefix + 'download ' + $object.settings.classPrefix + 'icon">' + $download_bg + '</a>');
                    break;
                case 'view2':
                    this.$cont.find('.' + $object.settings.classPrefix + 'bar').append('<a id="' + $object.settings.classPrefix + 'download" target="_blank" download class="' + this.settings.classPrefix + 'download ' + $object.settings.classPrefix + 'icon">' + $download_bg + '</a>');
                    break;
                case 'view4':
                    $('<a id="' + $object.settings.classPrefix + 'download" target="_blank" download class="' + this.settings.classPrefix + 'download ' + $object.settings.classPrefix + 'icon">' + $download_bg + '</a>').insertBefore($('.origincodevideogallerylb-title'));
                    break;
                case 'view5':
                case 'view6':
                    $('.origincodevideogallerylb-toolbar').append('<a id="' + $object.settings.classPrefix + 'download" target="_blank" download class="' + this.settings.classPrefix + 'download ' + $object.settings.classPrefix + 'icon">' + $download_bg_ + '</a>');
                    break;
            }
        }
        $arrows = $('.origincodevideogallerylb-arrows .origincodevideogallerylb-next, .origincodevideogallerylb-arrows .origincodevideogallerylb-prev');
        $next = $('.origincodevideogallerylb-arrows .origincodevideogallerylb-next');
        $prev = $('.origincodevideogallerylb-arrows .origincodevideogallerylb-prev');

        var title_text = $('.origincodevideogallerylb-title');

        switch (this.settings.titlePos) {
            case 'left':
                title_text.css({'text-align': 'left'});
                break;
            case 'center':
                title_text.css({'text-align': 'center'});
                break;
            case 'right':
                title_text.css({'text-align': 'right'});
                break;
        }

        switch (this.settings.lightboxView) {
            case 'view1':
            default:
                $arrows.css({'top': '50%'});
                $next.css({'right': '20px'});
                $prev.css({'left': '20px'});
                break;
            case 'view2':
                $arrows.css({'bottom': '0'});
                $next.css({'right': '40%'});
                $prev.css({'left': '40%'});
                break;
            case 'view3':
                $arrows.css({'top': '14px', 'z-index': '1090000'});
                $next.css({'right': '20px'});
                $prev.css({'right': '55px'});
                title_text.css({'text-align': 'left', 'border-top': '1px solid #999'});
                $('.origincodevideogallerylb-close').css({'margin-right': '45%'});
                $('.origincodevideogallerylb-overlay, .origincodevideogallerylb-toolbar, .origincodevideogallerylb-title, .origincodevideogallerylb-next, .origincodevideogallerylb-prev').css({'background': 'rgba(255, 255, 255, 1)'});
                $('.origincodevideogallerylb-title, .shareLook').css({'color': '#999'});
                $('.origincodevideogallerylb-toolbar').css({'border-bottom': '1px solid #999'});
                $('.origincodevideogallerylb-toolbar .origincodevideogallerylb-icon, .origincodevideogallerylb-arrows .origincodevideogallerylb-icon').addClass('origincodevideogallerylb-icon0');
                break;
        }

        this.prevScrollTop = $(window).scrollTop();

        $object.objects.content = $('.origincodevideogallerylb-container');

        $object.objects.content.css({
            'width': $object.settings.width,
            'height': $object.settings.height
        });

        var $color, $zoomTop = (document.documentElement.clientHeight - $object.objects.content.height()) / 2;
        switch (this.settings.lightboxView) {
            case 'view3':
                $color = 'rgba(255,255,255,.9)';
                break;
            default:
                $color = 'rgba(0,0,0,.9)';
                break;
        }


        $('.origincodevideogallerylb-zoomDiv').css({
            'width': $object.settings.width,
            'top': $zoomTop + 'px',
            'background-color': $color
        });

        setTimeout(function () {
            $('.origincodevideogallerylb-container').bind('contextmenu', function () {
                return false;
            });
        }, 50);

    };

    Lightbox.prototype.calculateDimensions = function () {
        var $object = this, $width;

        $width = $('.' + $object.settings.classPrefix + 'current').height() * 16 / 9;

        if ($width > $object.settings.videoMaxWidth) {
            $width = $object.settings.videoMaxWidth;
        }

        $('.' + $object.settings.classPrefix + 'video-cont ').css({
            'max-width': $width + 'px'
        });
    };

    Lightbox.prototype.effectsSupport = function () {
        var transition, root, support;
        support = function () {
            transition = ['transition', 'MozTransition', 'WebkitTransition', 'OTransition', 'msTransition', 'KhtmlTransition'];
            root = document.documentElement;
            for (var i = 0; i < transition.length; i++) {
                if (transition[i] in root.style) {
                    return transition[i] in root.style;
                }
            }
        };

        return support();
    };

    Lightbox.prototype.isVideo = function (src, index) {

        var youtube, vimeo;

        youtube = src.match(/\/\/(?:www\.)?youtu(?:\.be|be\.com)\/(?:watch\?v=|embed\/)?([a-z0-9\-\_\%]+)/i);
        vimeo = src.match(/\/\/?player.vimeo.com\/([0-9a-z\-_]+)/i);

        if (youtube) {
            return {
                youtube: youtube
            };
        } else if (vimeo) {
            return {
                vimeo: vimeo
            };
        }
    };

    Lightbox.prototype.counter = function () {
        if (this.settings.showCounter) {
            switch (this.settings.lightboxView) {
                case 'view1':
                default:
                    $('.' + this.settings.classPrefix + 'toolbar').append(this.objects.counter = $('<div id="' + this.settings.idPrefix + 'counter"></div>'));
                    $('#origincodevideogallerylb-counter').css({'padding-left': '23px'});
                    break;
                case 'view2':
                case 'view4':
                    $('.' + this.settings.classPrefix + 'bar').append('<div class="barCont"></div>').append(this.objects.counter = $('<div id="' + this.settings.idPrefix + 'counter"></div>'));
                    break;
                case 'view5':
                case 'view6':
                    $('.contInner').append(this.objects.counter = $('<div id="' + this.settings.idPrefix + 'counter"></div>'));
                    break;
            }
            if(this.settings.sequence_info === "image")
            {
                this.settings.sequence_info="video";
            }
            this.objects.counter.append(
                this.objects.current = $('<div>' + this.settings.sequence_info + ' <span id="' + this.settings.idPrefix + 'counter-current">' + (parseInt(this.index, 10) + 1) + '</span> ' +
                    this.settings.sequenceInfo + ' <span id="' + this.settings.idPrefix + 'counter-all">' + this.$items.length + '</span></div>')
            );
        }
    };

    Lightbox.prototype.setTitle = function (index) {
        var $object = this, $title, $currentElement;

        $currentElement = this.$items.eq(index);
        $title = $currentElement.find('img').attr('alt') ||
            $currentElement.find('img').attr('title') ||
            $currentElement.find('a').attr('title') ||
            this.settings.defaultTitle ||
            $currentElement.next('img').attr('alt') || '';

        this.$cont.find('.' + this.settings.classPrefix + 'title').html('<div class="origincodevideogallerylb-title-text">' + $title + '</div>');

        (($object.settings.lightboxView === 'view2') && $('.origincodevideogallerylb-title-text').css({'width': '100%'}));

        if ($object.settings.lightboxView !== 'view1' && $object.settings.lightboxView !== 'view3' && $object.settings.lightboxView !== 'view4') {
            ($title === '' && $object.settings.socialSharing) ?
                this.$cont.find('.' + this.settings.classPrefix + 'title').hide() :
                this.$cont.find('.' + this.settings.classPrefix + 'title').show();
        }
    };

    Lightbox.prototype.setDescription = function (index) {
        var $object = this, $description, $currentElement;

        $currentElement = this.$items.eq(index);
        $description = $currentElement.attr('data-description') || '';

        this.$cont.find('.' + this.settings.classPrefix + 'description').html('<div class="origincodevideogallerylb-description-text" title="' + $description + '">' + $description + '</div>');
    };

    Lightbox.prototype.preload = function (index) {
        for (var i = 1; i <= this.settings.preload; i++) {
            if (i >= this.$items.length - index) {
                break;
            }

            this.loadContent(index + i, false, 0);
        }

        for (var j = 1; j <= this.settings.preload; j++) {
            if (index - j < 0) {
                break;
            }

            this.loadContent(index - j, false, 0);
        }
    };

    Lightbox.prototype.socialShare = function () {
        var $object = this;

        var shareButtons = '<ul class="origincodevideogallerylb-share-buttons">';
        shareButtons += $object.settings.share.facebookButton ? '<li><a title="Facebook" id="origincodevideogallerylb-share-facebook" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.twitterButton ? '<li><a title="Twitter" id="origincodevideogallerylb-share-twitter" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.googleplusButton ? '<li><a title="Google Plus" id="origincodevideogallerylb-share-googleplus" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.pinterestButton ? '<li><a title="Pinterest" id="origincodevideogallerylb-share-pinterest" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.linkedinButton ? '<li><a title="Linkedin" id="origincodevideogallerylb-share-linkedin" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.tumblrButton ? '<li><a title="Tumblr" id="origincodevideogallerylb-share-tumblr" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.redditButton ? '<li><a title="Reddit" id="origincodevideogallerylb-share-reddit" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.bufferButton ? '<li><a title="Buffer" id="origincodevideogallerylb-share-buffer" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.diggButton ? '<li><a title="Digg" id="origincodevideogallerylb-share-digg" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.vkButton ? '<li><a title="VK" id="origincodevideogallerylb-share-vk" target="_blank"></a></li>' : '';
        shareButtons += $object.settings.share.yummlyButton ? '<li><a title="Yummly" id="origincodevideogallerylb-share-yummly" target="_blank"></a></li>' : '';
        shareButtons += '</ul>';


        if (this.settings.lightboxView === 'view5' || this.settings.lightboxView === 'view6') {
            $('.contInner').append(shareButtons);
        } else {
            $('.' + this.settings.classPrefix + 'socialIcons').append(shareButtons);
        }


        setTimeout(function () {
            $('#origincodevideogallerylb-share-facebook').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-twitter').attr('href', 'https://twitter.com/intent/tweet?text=&url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-googleplus').attr('href', 'https://plus.google.com/share?url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-pinterest').attr('href', 'http://www.pinterest.com/pin/create/button/?url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-linkedin').attr('href', 'http://www.linkedin.com/shareArticle?mini=true&amp;url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-tumblr').attr('href', 'http://www.tumblr.com/share/link?url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-reddit').attr('href', 'http://reddit.com/submit?url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-buffer').attr('href', 'https://bufferapp.com/add?url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-digg').attr('href', 'http://www.digg.com/submit?url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-vk').attr('href', 'http://vkontakte.ru/share.php?url=' + (encodeURIComponent(window.location.href)));
            $('#origincodevideogallerylb-share-yummly').attr('href', 'http://www.yummly.com/urb/verify?url=' + (encodeURIComponent(window.location.href)));
        }, 200);
    };

    Lightbox.prototype.changeHash = function (index) {
        var $object = this;

        (($object.settings.socialSharing) && (window.location.hash = '/lightbox&slide=' + (index + 1)));
    };

    Lightbox.prototype.loadContent = function (index, rec, delay) {

        var $object, src, isVideo;

        $object = this;

        function isImg() {
            src = $object.$items.eq(index).attr('href');
            return src.match(/\.(jpg|png|gif)\b/);
        }

        if ($object.settings.watermark) {
            if (isImg()) {
                src = $object.$items.eq(index).find('img').attr('data-src');
            }
        } else {
            src = $object.$items.eq(index).attr('href');
        }

        isVideo = $object.isVideo(src, index);
        if (!$object.$item.eq(index).hasClass($object.settings.classPrefix + 'loaded')) {
            if (isVideo) {
                $object.$item.eq(index).prepend('<div class="' + this.settings.classPrefix + 'video-cont "><div class="' + this.settings.classPrefix + 'video"></div></div>');
                $object.$element.trigger('hasVideo.origincodevideogallerylb-container', [index, src]);
            } else {
                $object.$item.eq(index).prepend('<div class="' + this.settings.classPrefix + 'img-wrap"><img class="' + this.settings.classPrefix + 'object ' + $object.settings.classPrefix + 'image watermark" src="' + src + '" /></div>');
            }

            $object.$element.trigger('onAferAppendSlide.origincodevideogallerylb-container', [index]);

            $object.$item.eq(index).addClass($object.settings.classPrefix + 'loaded');
        }

        $object.$item.eq(index).find('.' + $object.settings.classPrefix + 'object').on('load.origincodevideogallerylb-container error.origincodevideogallerylb-container', function () {

            var speed = 0;
            if (delay) {
                speed = delay;
            }

            setTimeout(function () {
                $object.$item.eq(index).addClass($object.settings.classPrefix + 'complete');
            }, speed);

        });

        if (rec === true) {

            if (!$object.$item.eq(index).hasClass($object.settings.classPrefix + 'complete')) {
                $object.$item.eq(index).find('.' + $object.settings.classPrefix + 'object').on('load.origincodevideogallerylb-container error.origincodevideogallerylb-container', function () {
                    $object.preload(index);
                });
            } else {
                $object.preload(index);
            }
        }

    };

    Lightbox.prototype.slide = function (index, fromSlide, fromThumb) {

        var $object, prevIndex;
        $object = this;
        prevIndex = this.$cont.find('.' + $object.settings.classPrefix + 'current').index();

        var length = this.$item.length,
            time = 0,
            next = false,
            prev = false;

        if (this.settings.download) {
            var src;
            if (!this.settings.watermark) {
                src = $object.$items.eq(index).attr('data-download-url') !== 'false' && ($object.$items.eq(index).attr('data-download-url') || $object.$items.eq(index).attr('href'));
            }
            else {
                src = $object.$items.eq(index).find('img').attr('data-src');
            }
            if (src) {
                $('#' + $object.settings.classPrefix + 'download').attr('href', src);
                $object.$cont.removeClass($object.settings.classPrefix + 'hide-download');
                $object.$cont.removeClass($object.settings.classPrefix + 'hide-actual-size');
                $object.$cont.removeClass($object.settings.classPrefix + 'hide-fullwidth');
                $object.$cont.removeClass($object.settings.classPrefix + 'hide-zoom-in');
                $object.$cont.removeClass($object.settings.classPrefix + 'hide-zoom-out');
            } else {
                $object.$cont.addClass($object.settings.classPrefix + 'hide-download');
                $object.$cont.addClass($object.settings.classPrefix + 'hide-actual-size');
                $object.$cont.addClass($object.settings.classPrefix + 'hide-fullwidth');
                $object.$cont.addClass($object.settings.classPrefix + 'hide-zoom-in');
                $object.$cont.addClass($object.settings.classPrefix + 'hide-zoom-out');
            }
        }

        this.$element.trigger('onBeforeSlide.origincodevideogallerylb-container', [prevIndex, index, fromSlide, fromThumb]);

        setTimeout(function () {
            $object.setTitle(index);
        }, time);

        if ($object.settings.lightboxView === 'view5' || $object.settings.lightboxView === 'view6') {
            setTimeout(function () {
                $object.setDescription(index);
            }, time);
        }

        this.arrowDisable(index);


        $object.$cont.addClass($object.settings.classPrefix + 'no-trans');

        this.$item.removeClass($object.settings.classPrefix + 'prev-slide ' + $object.settings.classPrefix + 'next-slide');
        if (!fromSlide) {

            if (index < prevIndex) {
                prev = true;
                if ((index === 0) && (prevIndex === length - 1) && !fromThumb) {
                    prev = false;
                    next = true;
                }
            } else if (index > prevIndex) {
                next = true;
                if ((index === length - 1) && (prevIndex === 0) && !fromThumb) {
                    prev = true;
                    next = false;
                }
            }

            if (prev) {

                this.$item.eq(index).addClass($object.settings.classPrefix + 'prev-slide');
                this.$item.eq(prevIndex).addClass($object.settings.classPrefix + 'next-slide');
            } else if (next) {

                this.$item.eq(index).addClass($object.settings.classPrefix + 'next-slide');
                this.$item.eq(prevIndex).addClass($object.settings.classPrefix + 'prev-slide');
            }

            setTimeout(function () {
                $object.$item.removeClass($object.settings.classPrefix + 'current');

                $object.$item.eq(index).addClass($object.settings.classPrefix + 'current');

                $object.$cont.removeClass($object.settings.classPrefix + 'no-trans');
            }, 50);
        } else {

            var slidePrev = index - 1;
            var slideNext = index + 1;

            if ((index === 0) && (prevIndex === length - 1)) {

                slideNext = 0;
                slidePrev = length - 1;
            } else if ((index === length - 1) && (prevIndex === 0)) {

                slideNext = 0;
                slidePrev = length - 1;
            }

            this.$item.removeClass($object.settings.classPrefix + 'prev-slide ' + $object.settings.classPrefix + 'current ' + $object.settings.classPrefix + 'next-slide');
            $object.$item.eq(slidePrev).addClass($object.settings.classPrefix + 'prev-slide');
            $object.$item.eq(slideNext).addClass($object.settings.classPrefix + 'next-slide');
            $object.$item.eq(index).addClass($object.settings.classPrefix + 'current');
        }

        $object.loadContent(index, true, $object.settings.overlayDuration);

        $object.$element.trigger('onAfterSlide.origincodevideogallerylb-container', [prevIndex, index, fromSlide, fromThumb]);

        if (this.settings.showCounter) {
            $('#' + $object.settings.classPrefix + 'counter-current').text(index + 1);
        }

        if (this.settings.socialSharing) {
            $object.changeHash(index);
        }

        var $top, $left, $wWidth, $wHeight, $imgWidth, $imgHeight, $wmWidth, $wmHeight, $pos, $item;
        $item = $('.origincodevideogallerylb-item.origincodevideogallerylb-current');
        $pos = +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_margin;
        $wWidth = +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_containerWidth;
        $wHeight = +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_textFontSize;
        $imgWidth = $object.$item.eq(index).find('img').width();
        $imgHeight = $object.$item.eq(index).find('img').height();
        $wmWidth = $item.width();
        $wmHeight = $item.height();

        switch ('pos' + origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_position_new) {
            case 'pos1':
                $top = ($wmHeight - $imgHeight) / 2 + $pos;
                $left = ($wmWidth - $imgWidth) / 2 + $pos;
                break;
            case 'pos2':
                $top = ($wmHeight - $imgHeight) / 2 + $pos;
                $left = ($wmWidth - $wWidth) / 2;
                break;
            case 'pos3':
                $top = ($wmHeight - $imgHeight) / 2 + $pos;
                $left = ($wmWidth + $imgWidth) / 2 - $wWidth - $pos;
                break;
            case 'pos4':
                $top = ($wmHeight - $wHeight) / 2;
                $left = ($wmWidth - $imgWidth) / 2 + $pos;
                break;
            case 'pos5':
                $top = ($wmHeight - $wHeight) / 2;
                $left = ($wmWidth - $wWidth) / 2;
                break;
            case 'pos6':
                $top = ($wmHeight - $wHeight) / 2;
                $left = ($wmWidth + $imgWidth) / 2 - $wWidth - $pos;
                break;
            case 'pos7':
                $top = ($wmHeight + $imgHeight) / 2 - $wHeight - $pos;
                $left = ($wmWidth - $imgWidth) / 2 + $pos;
                break;
            case 'pos8':
                $top = ($wmHeight + $imgHeight) / 2 - $wHeight - $pos;
                $left = ($wmWidth - $wWidth) / 2;
                break;
            case 'pos9':
                $top = ($wmHeight + $imgHeight) / 2 - $wHeight - $pos;
                $left = ($wmWidth + $imgWidth) / 2 - $wWidth - $pos;
                break;
            default:
                $top = ($wmHeight - $wHeight) / 2;
                $left = ($wmWidth - $wWidth) / 2;
        }

        $('.w_url').css({
            position: 'absolute',
            width: $wWidth + 'px',
            height: $wHeight + 'px',
            top: $top + 'px',
            left: $left + 'px'
        });

        $object.calculateDimensions();

        $('.origincodevideogallerylb-container .origincodevideogallerylb-thumb-item img').css({
            opacity: 1 - +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs_overlay_opacity / 100
        });

        $('.origincodevideogallerylb-container .origincodevideogallerylb-thumb-item.active img').css({
            opacity: 1
        });

        var $id = jQuery('.gallery-video-content').attr('data-origincode_gallery_video_id'),
            $autoplay = jQuery('.gallery-video-content').attr('data-gallery_autoplay'),
            $disable_rel = 'off';

        if ($autoplay === 'on' && $disable_rel === 'on') {
            setTimeout(function () {
                var $iframe = jQuery('.origincodevideogallerylb-current').find('iframe'),
                    $src = $iframe.attr('src'),
                    $src_1;

                if ($src.indexOf('autoplay') === -1 && $src.indexOf('rel') === -1) {
                    $src_1 = $src + '?rel=0&autoplay=1';
                } else {
                    $src_1 = $src.substr(0, $src.length - 1) + '1';
                }

                $iframe.attr('src', $src_1);
            }, 50);
        } else if ($autoplay === 'off' && $disable_rel === 'on') {
            setTimeout(function () {
                var $iframe = jQuery('.origincodevideogallerylb-current').find('iframe'),
                    $src = $iframe.attr('src'), $src_1;
                if ($src.indexOf('autoplay') === -1 && $src.indexOf('rel') === -1) {
                    $src_1 = $src + '?rel=0&autoplay=0';
                } else {
                    $src_1 = $src.substr(0, $src.length - 1) + '0';
                }
                $iframe.attr('src', $src_1);
            }, 50);
        } else if ($autoplay === 'on' && $disable_rel === 'off') {
            setTimeout(function () {
                var $iframe = jQuery('.origincodevideogallerylb-current').find('iframe'),
                    $src = $iframe.attr('src'), $src_1;
                if ($src.indexOf('autoplay') === -1) {
                    $src_1 = $src + '?autoplay=1';
                } else {
                    $src_1 = $src.substr(0, $src.length - 1) + '1';
                }
                $iframe.attr('src', $src_1);
            }, 50);
        }


    };

    Lightbox.prototype.goToNextSlide = function (fromSlide) {
        var $object = this,
            $cont = $('.origincodevideogallerylb-cont'),
            $imageObject, k;
        if (($object.index + 1) < $object.$item.length) {
            $object.index++;
            $object.slide($object.index, fromSlide, false);
        } else {
            if ($object.settings.loop) {
                $object.index = 0;
                $object.slide($object.index, fromSlide, false);
            }
        }

        if ($object.settings.fullwidth && $cont.hasClass('origincodevideogallerylb-fullwidth-on')) {
            $imageObject = $cont.find('.origincodevideogallerylb-image').eq($object.index);

            k = $imageObject.width() / $imageObject.height();
            if ($imageObject.width() > $imageObject.height() && k > 2) {
                $imageObject.css({
                    'min-width': '100%'
                });
            } else {
                $imageObject.css({
                    'min-height': '100%'
                });
            }
        }
        setTimeout(function () {
            var $current,
                $iframe,
                $src,
                $src_0,
                $src_1,
                $current_prev;

            $current = jQuery('.origincodevideogallerylb-current');
            $iframe = $current.find('iframe');
            $src = $iframe.attr('src');
            $current_prev = $current.prev().find('iframe');


            if ($current_prev.attr('src')) {
                if ($current_prev.attr('src').indexOf('?') === -1) {

                    $src_1 = '?autoplay=0';
                }
                else {
                    $src_1 = '&autoplay=0';

                }
                $src_0 = $current_prev.attr('src') + $src_1;
                $current_prev.attr('src', $src_0);
            }

            else {
                $current = jQuery('.origincodevideogallerylb-container');
                $current_prev = $current.find('iframe:last');
                if ($current_prev.attr('src').indexOf('?') === -1) {

                    $src_1 = '?autoplay=0';
                }
                else {
                    $src_1 = '&autoplay=0';

                }
                $src_0 = $current_prev.attr('src') + $src_1;
                $current_prev.attr('src', $src_0);

            }
        }, 50);

    };

    Lightbox.prototype.goToPrevSlide = function (fromSlide) {
        var $object = this,
            $cont = $('.origincodevideogallerylb-cont'),
            $imageObject, k;

        if ($object.index > 0) {
            $object.index--;
            $object.slide($object.index, fromSlide, false);
        } else {
            if ($object.settings.loop) {
                $object.index = $object.$items.length - 1;
                $object.slide($object.index, fromSlide, false);
            }
        }

        if ($object.settings.fullwidth && $cont.hasClass('origincodevideogallerylb-fullwidth-on')) {
            $imageObject = $cont.find('.origincodevideogallerylb-image').eq($object.index);

            k = $imageObject.width() / $imageObject.height();
            if ($imageObject.width() > $imageObject.height() && k > 2) {
                $imageObject.css({
                    'min-width': '100%'
                });
            } else {
                $imageObject.css({
                    'min-height': '100%'
                });
            }
        }
        setTimeout(function () {
            var $current,
                $iframe,
                $src,
                $src_0,
                $src_1,
                $currents,
                $current_next;

            $current = jQuery('.origincodevideogallerylb-current');
            $iframe = $current.find('iframe');
            $src = $iframe.attr('src');
            $current_next = $current.next().find('iframe');

            if ($current_next.attr('src')) {
                if ($current_next.attr('src').indexOf('?') === -1) {
                    $src_1 = '?autoplay=0';
                }
                else {
                    $src_1 = '&autoplay=0';
                }
                $src_0 = $current_next.attr('src') + $src_1;
                $current_next.attr('src', $src_0);
            }


            else {
                $current = jQuery('.origincodevideogallerylb-container');
                $current_next = $current.find('iframe:first');
                if ($current_next.attr('src').indexOf('?') === -1) {
                    $src_1 = '?autoplay=0';
                }
                else {
                    $src_1 = '&autoplay=0';
                }
                $src_0 = $current_next.attr('src') + $src_1;
                $current_next.attr('src', $src_0);

            }
        }, 500);


    };

    Lightbox.prototype.slideShow = function () {
        var $object = this, $toolbar, $play_bg, $pause_bg;

        $play_bg = '<svg class="play_bg" width="20px" height="20px" fill="#999" viewBox="-192 193.9 314.1 314.1">' +
            '<g><g id="_x33_56._Play"><g><path d="M101,272.5C57.6,197.4-38.4,171.6-113.5,215c-75.1,43.4-100.8,139.4-57.5,214.5c43.4,75.1,139.4,100.8,214.5,57.5C118.6,443.6,144.4,347.6,101,272.5z M27.8,459.7c-60.1,34.7-136.9,14.1-171.6-46c-34.7-60.1-14.1-136.9,46-171.6c60.1-34.7,136.9-14.1,171.6,46C108.5,348.2,87.9,425,27.8,459.7z M21.6,344.6l-82.2-47.9c-7.5-4.4-13.5-0.9-13.5,7.8l0.4,95.2c0,8.7,6.2,12.2,13.7,7.9l81.6-47.1C29,356,29,349,21.6,344.6z"/></g></g></g>' +
            '</svg>';
        $pause_bg = '<svg class="pause_bg" width="20px" height="20px" fill="#999" viewBox="-94 96 510 510" >' +
            '<g><g id="pause-circle-outline"><path d="M84.5,453h51V249h-51V453z M161,96C20.8,96-94,210.8-94,351S20.8,606,161,606s255-114.8,255-255S301.3,96,161,96zM161,555C48.8,555-43,463.2-43,351s91.8-204,204-204s204,91.8,204,204S273.2,555,161,555z M186.5,453h51V249h-51V453z"/></g></g>' +
            '</svg>';

        $toolbar = $('.' + $object.settings.classPrefix + 'toolbar');

        if ($object.settings.slideshowAuto) {
            $object.slideshowAuto();
        }

        $object.$cont.find('.' + $object.settings.classPrefix + 'autoplay-button').on('click.origincodevideogallerylb-container', function () {
            !$($object.$cont).hasClass($object.settings.classPrefix + 'show-autoplay') ? $object.startSlide() : $object.stopSlide();
        });

    };

    Lightbox.prototype.slideshowAuto = function () {
        var $object = this;

        $object.$cont.addClass('' + $object.settings.classPrefix + 'show-autoplay');
        $object.startSlide();
    };

    Lightbox.prototype.startSlide = function () {
        var $object = this;

        $object.interval = setInterval(function () {
            $object.goToNextSlide();
        }, $object.settings.slideshowSpeed);
    };

    Lightbox.prototype.stopSlide = function () {
        clearInterval(this.interval);

    };

    Lightbox.prototype.addKeyEvents = function () {
        var $object = this;
        if (this.$items.length > 1) {
            $(window).on('keyup.origincodevideogallerylb-container', function (e) {
                if ($object.$items.length > 1) {
                    if (e.keyCode === 37) {
                        e.preventDefault();
                        $object.goToPrevSlide();
                    }

                    if (e.keyCode === 39) {
                        e.preventDefault();
                        $object.goToNextSlide();
                    }
                }
            });
        }

        $(window).on('keydown.origincodevideogallerylb-container', function (e) {
            if ($object.settings.escKey === true && e.keyCode === 27) {
                e.preventDefault();
                if (!$object.$cont.hasClass($object.settings.classPrefix + 'thumb-open')) {
                    $object.destroy();
                } else {
                    $object.$cont.removeClass($object.settings.classPrefix + 'thumb-open');
                }
            }
        });
    };

    Lightbox.prototype.arrow = function () {
        var $object = this;
        this.$cont.find('.' + $object.settings.classPrefix + 'prev').on('click.origincodevideogallerylb-container', function () {
            $object.goToPrevSlide();
        });

        this.$cont.find('.' + $object.settings.classPrefix + 'next').on('click.origincodevideogallerylb-container', function () {
            $object.goToNextSlide();
        });
    };

    Lightbox.prototype.arrowDisable = function (index) {

        if (!this.settings.loop && this.settings.hideControlOnEnd) {
            if ((index + 1) < this.$item.length) {
                this.$cont.find('.' + this.settings.classPrefix + 'next').removeAttr('disabled').removeClass('disabled');
            } else {
                this.$cont.find('.' + this.settings.classPrefix + 'next').attr('disabled', 'disabled').addClass('disabled');
            }

            if (index > 0) {
                this.$cont.find('.' + this.settings.classPrefix + 'prev').removeAttr('disabled').removeClass('disabled');
            } else {
                this.$cont.find('.' + this.settings.classPrefix + 'prev').attr('disabled', 'disabled').addClass('disabled');
            }
        }
    };

    Lightbox.prototype.mousewheel = function () {
        var $object = this, delta;

        $object.$cont.on('mousewheel', function (e) {
            e = e || window.event;
            delta = e.deltaY || e.detail || e.wheelDelta;

            (delta > 0) ? $object.goToNextSlide() : $object.goToPrevSlide();
            e.preventDefault ? e.preventDefault() : (e.returnValue = false);
        });

    };

    Lightbox.prototype.closeGallery = function () {

        var $object = this, mousedown = false;

        this.$cont.find('.' + $object.settings.classPrefix + 'close').on('click.origincodevideogallerylb-container', function () {
            $object.destroy();
        });

        if ($object.settings.overlayClose) {

            $object.$cont.on('mousedown.origincodevideogallerylb-container', function (e) {

                mousedown = ($(e.target).is('.' + $object.settings.classPrefix + 'cont') || $(e.target).is('.' + $object.settings.classPrefix + 'item ') || $(e.target).is('.' + $object.settings.classPrefix + 'img-wrap'));

            });

            $object.$cont.on('mouseup.origincodevideogallerylb-container', function (e) {

                if ($(e.target).is('.contInner') || $(e.target).is('.' + $object.settings.classPrefix + 'cont') || $(e.target).is('.' + $object.settings.classPrefix + 'item ') || $(e.target).is('.' + $object.settings.classPrefix + 'img-wrap') && mousedown) {
                    if (!$object.$cont.hasClass($object.settings.classPrefix + 'dragEvent')) {
                        $object.destroy();
                    }
                }

            });

        }

    };

    Lightbox.prototype.destroy = function (d) {

        var $object = this;

        clearInterval($object.interval);

        $object.$body.removeClass($object.settings.classPrefix + 'on');

        $(window).scrollTop($object.prevScrollTop);

        if (d) {
            $.removeData($object.el, 'lightbox');
        }

        ($object.settings.socialSharing && (window.location.hash = ''));

        this.$element.off('.origincodevideogallerylb-container');

        $(window).off('.origincodevideogallerylb-container');

        if ($object.$cont) {
            $object.$cont.removeClass($object.settings.classPrefix + 'visible');
        }

        $object.objects.overlay.removeClass('in');

        setTimeout(function () {
            if ($object.$cont) {
                $object.$cont.remove();
            }

            $object.objects.overlay.remove();

        }, $object.settings.overlayDuration + 50);

        window.scrollTo(0, $object.$_y_);
    };

    $.fn.lightboxVideo = function (options) {
        return this.each(function () {
            if (!$.data(this, 'lightbox')) {
                $.data(this, 'lightbox', new Lightbox(this, options));
            }
        });
    };

    $.fn.lightboxVideo.lightboxModul = {};

    var Modul = function (element) {

        this.dataL = $(element).data('lightbox');
        this.$element = $(element);
        this.dataL.modulSettings = $.extend({}, this.constructor.defaultsModul);

        this.init();

        if (this.dataL.modulSettings.zoom && this.dataL.effectsSupport()) {
            this.initZoom();

            this.zoomabletimeout = false;

            this.pageX = $(window).width() / 2;
            this.pageY = ($(window).height() / 2) + $(window).scrollTop();
        }

        if (this.dataL.modulSettings.fullwidth && this.dataL.effectsSupport()) {
            this.initFullWidth();
        }

        this.$el = $(element);
        this.$thumbCont = null;
        this.thumbContWidth = 0;
        this.thumbTotalWidth = (this.dataL.$items.length * (this.dataL.modulSettings.thumbsWidth + this.dataL.modulSettings.thumbMargin));
        this.thumbIndex = this.dataL.index;
        this.left = 0;
        if (origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs) {
            this.initThumbs();
        }

        return this;
    };

    Modul.defaultsModul = {
        idPrefix: 'origincodevideogallerylb-',
        classPrefix: 'origincodevideogallerylb-',
        attrPrefix: 'data-',
        videoMaxWidth: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_videoMaxWidth,
        fullwidth: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_fullwidth_effect,
        zoom: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_zoom,
        scale: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_zoomsize / 10,
        thumbnail: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs,
        thumbsWidth: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs_width,
        thumbsHeight: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs_height,
        thumbMargin: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs_margin,
        showByDefault: true,
        toogleThumb: false,
        thumbPosition: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs_position,
        thumbsOverlayColor: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs_overlay_color,
        thumbsOverlayOpacity: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_thumbs_overlay_opacity
    };

    Modul.prototype.init = function () {
        var $object = this;

        $object.dataL.$element.on('hasVideo.origincodevideogallerylb-container', function (event, index, src) {
            $object.dataL.$item.eq(index).find('.' + $object.dataL.modulSettings.classPrefix + 'video').append($object.loadVideo(src, '' + $object.dataL.modulSettings.classPrefix + 'object', index));
        });

        $object.dataL.$element.on('onAferAppendSlide.origincodevideogallerylb-container', function (event, index) {
            $object.dataL.$item.eq(index).find('.' + $object.dataL.settings.classPrefix + 'video-cont').css({
                'max-width': $object.dataL.modulSettings.videoMaxWidth + 'px'
            });
        });

        $object.dataL.$element.on('onBeforeSlide.origincodevideogallerylb-container', function (event, prevIndex, index) {

            var $videoSlide = $object.dataL.$item.eq(prevIndex),
                youtubePlayer = $videoSlide.find('.origincodevideogallerylb-youtube').get(0),
                vimeoPlayer = $videoSlide.find('.origincodevideogallerylb-vimeo').get(0);

            if (youtubePlayer) {
                youtubePlayer.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
            } else if (vimeoPlayer) {
                try {
                    $f(vimeoPlayer).api('pause');
                } catch (e) {
                    console.error('Make sure you have included froogaloop2 js');
                }
            }

            var src;
            src = $object.dataL.$items.eq(index).attr('href');

            var isVideo = $object.dataL.isVideo(src, index) || {};
            if (isVideo.youtube || isVideo.vimeo) {
                $object.dataL.$cont.addClass($object.dataL.modulSettings.classPrefix + 'hide-actual-size');
                $object.dataL.$cont.addClass($object.dataL.modulSettings.classPrefix + 'hide-fullwidth');
                $object.dataL.$cont.addClass($object.dataL.modulSettings.classPrefix + 'hide-zoom-in');
                $object.dataL.$cont.addClass($object.dataL.modulSettings.classPrefix + 'hide-zoom-out');
            }

        });

        $object.dataL.$element.on('onAfterSlide.origincodevideogallerylb-container', function (event, prevIndex) {
            $object.dataL.$item.eq(prevIndex).removeClass($object.dataL.modulSettings.classPrefix + 'video-playing');
        });
    };

    Modul.prototype.loadVideo = function (src, addClass, index) {
        var video = '',
            isVideo = this.dataL.isVideo(src, index) || {};


        if (isVideo.youtube) {

            video = '<iframe class="' + this.dataL.modulSettings.classPrefix + 'video-object ' + this.dataL.modulSettings.classPrefix + 'youtube ' + addClass + '" width="560" height="315" src="//www.youtube.com/embed/' + isVideo.youtube[1] + '" frameborder="0" allowfullscreen></iframe>';

        } else if (isVideo.vimeo) {


            video = '<iframe class="' + this.dataL.modulSettings.classPrefix + 'video-object ' + this.dataL.modulSettings.classPrefix + 'vimeo ' + addClass + '" width="560" height="315"  src="' + src + '" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

        }

        return video;
    };

    Modul.prototype.initFullWidth = function () {
        var $object = this,
            $fullWidth, $fullWidthOn;

        $fullWidth = '<svg id="origincodevideogallerylb-fullwidth" width="20px" height="20px" stroke="#999" fill="#999" x="0px" y="0px" viewBox="134 -133 357 357" style="enable-background:new 134 -133 357 357;">' +
            '<g><g id="fullscreen"><path d="M165,96.5h-31V224h127.5v-31H165V96.5z M134-5.5h31V-82h96.5v-31H134V-5.5z M440,193h-76.5v31H491V96.5h-31V192z M363.5-103v21H460v76.5h31V-113H363.5z"></path>' +
            '</g></g></svg>';

        $fullWidthOn = '<svg id="origincodevideogallerylb-fullwidth_on" width="20px" height="20px" stroke="#999" fill="#999" x="0px" y="0px" viewBox="134 -133 357 357" style="enable-background:new 134 -133 357 357;">' +
            '<g><g id="fullscreen-exit"><path d="M134, 127.5h 96.5V 224h 31V 96.5H 114V 147.5z M210.5 -36.5H 134v 31h 127.5V -133h -31V -36.5z M363.5, 224h 31v -96.5H 491v -31H 363.5V 224z M394.5 -56.5V -133h -31V -5.5H 491v -31H 395.5z"></path>' +
            '</g></g></svg>';

        if (this.dataL.modulSettings.fullwidth) {
            var fullwidth = '<span class="origincodevideogallerylb-fullwidth origincodevideogallerylb-icon">' + $fullWidth + $fullWidthOn + '</span>';
            switch (origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_lightboxView) {
                case 'view1':
                default:
                    this.dataL.$cont.find('.origincodevideogallerylb-toolbar').append(fullwidth);
                    break;
                case 'view2':
                    this.dataL.$cont.find('.origincodevideogallerylb-bar').append(fullwidth);
                    break;
                case 'view4':
                    $(fullwidth).insertBefore('.origincodevideogallerylb-title');
                    break;
            }

        }

        if (this.dataL.modulSettings.fullwidth) {
            $('.origincodevideogallerylb-fullwidth').on('click.origincodevideogallerylb-container', function () {
                !$('.origincodevideogallerylb-cont').hasClass('origincodevideogallerylb-fullwidth-on') ? $object.onFullWidth() : $object.offFullWidth();
            });
        }
    };

    Modul.prototype.onFullWidth = function () {

        var $imageObject = this.dataL.$cont.find('.origincodevideogallerylb-current .origincodevideogallerylb-image');

        $('#origincodevideogallerylb-fullwidth').css({'display': 'none'});
        $('#origincodevideogallerylb-fullwidth_on').css({'display': 'inline-block'});

        $('.origincodevideogallerylb-cont').addClass('origincodevideogallerylb-fullwidth-on');

        $('.origincodevideogallerylb-container').css({
            width: '100%',
            height: '100%'
        });

        var k = $imageObject.width() / $imageObject.height();
        if ($imageObject.width() > $imageObject.height() && k > 2) {
            $imageObject.css({
                'min-width': '100%'
            });
        } else {
            $imageObject.css({
                'min-height': '100%'
            });
        }
        if (origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_zoom) {
            $('.origincodevideogallerylb-zoomDiv').css({
                top: '45px',
                width: '100%'
            });
        }
    };

    Modul.prototype.offFullWidth = function () {
        var $imageObject = this.dataL.$cont.find('.origincodevideogallerylb-current .origincodevideogallerylb-image');

        $('#origincodevideogallerylb-fullwidth').css({'display': 'inline-block'});
        $('#origincodevideogallerylb-fullwidth_on').css({'display': 'none'});

        $('.origincodevideogallerylb-cont').removeClass('origincodevideogallerylb-fullwidth-on');
        $('.origincodevideogallerylb-container').css({
            width: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_width_new + '%',
            height: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_height_new + '%'
        });
        $imageObject.css({
            'min-width': '',
            'min-height': ''
        });
        if (origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_zoom) {
            $('.origincodevideogallerylb-zoomDiv').css({
                top: ((document.documentElement.clientHeight - $('.origincodevideogallerylb-container').height()) / 2) + 'px',
                width: this.dataL.settings.width
            });
        }
    };

    Modul.prototype.initZoom = function () {

        var $object = this, zoomIcons,
            $zoomIn, $zoomOut, scale;

        $zoomIn = '<svg id="zoom_in" width="20px" height="20px" stroke="#999" fill="#999" x="0px" y="0px" viewBox="-18 19 53 53" style="enable-background:new -18 19 53 53;">' +
            '<g><path d="M11,39H5v-6c0-0.6-0.4-1-1-1s-1,0.4-1,1v6h-6c-0.6,0-1,0.4-1,1s0.4,1,1,1h6v6c0,0.6,0.4,1,1,1s1-0.4,1-1v-6h6' +
            'c0.6,0,1-0.4,1-1S11.5,39,11,39z"/>' +
            '<path d="M33.7,70.3L18.8,54.9c3.8-3.8,6.1-9,6.1-14.8c0-11.6-9.4-21-21-21s-21,9.4-21,21s9.4,21,21,21c5.1,0,9.7-1.8,13.4-4.8' +
            'l14.9,15.5c0.2,0.2,0.5,0.3,0.7,0.3c0.3,0,0.5-0.1,0.7-0.3C34.1,71.3,34.1,70.7,33.7,70.3z M-15,40c0-10.5,8.5-19,19-19' +
            's19,8.5,19,19S14.5,59,4,59S-15,50.5-15,40z"/></g>' +
            '</svg>';

        $zoomOut = '<svg id="zoom_out" width="20px" height="20px" stroke="#999" fill="#999" x="0px" y="0px" x="0px" y="0px" viewBox="-18 19 53 53" style="enable-background:new -18 19 53 53;">' +
            '<g><path d="M11,39H-3c-0.6,0-1,0.4-1,1s0.4,1,1,1h14c0.6,0,1-0.4,1-1S11.5,39,11,39z"/>' +
            '<path d="M33.7,70.3L18.8,54.9c3.8-3.8,6.1-9,6.1-14.8c0-11.6-9.4-21-21-21s-21,9.4-21,21s9.4,21,21,21c5.1,0,9.7-1.8,13.4-4.8' +
            'l14.9,15.5c0.2,0.2,0.5,0.3,0.7,0.3c0.3,0,0.5-0.1,0.7-0.3C34.1,71.3,34.1,70.7,33.7,70.3z M-15,40c0-10.5,8.5-19,19-19' +
            's19,8.5,19,19S14.5,59,4,59S-15,50.5-15,40z"/></g>' +
            '</svg>';

        zoomIcons = '<span id="origincodevideogallerylb-zoom-out" class="origincodevideogallerylb-icon">' + $zoomOut + '</span><span id="origincodevideogallerylb-zoom-in" class="origincodevideogallerylb-icon">' + $zoomIn + '</span>';

        switch (origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_lightboxView) {
            case 'view1':
            default:
                this.dataL.$cont.find('.origincodevideogallerylb-toolbar').append(zoomIcons);
                break;
            case 'view2':
                this.dataL.$cont.find('.origincodevideogallerylb-bar').append(zoomIcons);
                break;
            case 'view4':
                $(zoomIcons).insertBefore('.origincodevideogallerylb-title');
                break;
        }

        scale = 1;
        function zoom(scaleVal) {
            var $imageObject, _x, _y, offsetX, offsetY, x, y;

            $imageObject = $object.dataL.$cont.find('.origincodevideogallerylb-current .origincodevideogallerylb-image');

            offsetX = ($(window).width() - $imageObject.width()) / 2;
            offsetY = (($(window).height() - $imageObject.height()) / 2) + $(window).scrollTop();

            _x = $object.pageX - offsetX;
            _y = $object.pageY - offsetY;

            x = _x;
            y = _y;

            $imageObject.css('transform', 'scale3d(' + scaleVal + ', ' + scaleVal + ', 1)').attr('data-scale', scaleVal);

            $imageObject.parent().css({
                transform: 'translate3d(0, ' + -y + 'px, 0)'
            }).attr('data-y', -y);
        }

        function callScale() {
            if (scale > 1) {
                $object.dataL.$cont.addClass('origincodevideogallerylb-zoomed');
            } else {
                $object.dataL.$cont.removeClass('origincodevideogallerylb-zoomed');
            }

            if (scale < 1) {
                scale = 1;
            }

            zoom(scale);
        }

        $(window).on('resize.origincodevideogallerylb-container.zoom scroll.origincodevideogallerylb-container.zoom orientationchange.origincodevideogallerylb-container.zoom', function () {
            $object.pageX = $(window).width() / 2;
            $object.pageY = ($(window).height() / 2) + $(window).scrollTop();
            zoom(scale);
        });

        $('#origincodevideogallerylb-zoom-out').on('click.origincodevideogallerylb-container', function () {
            if ($object.dataL.$cont.find('.origincodevideogallerylb-current .origincodevideogallerylb-image').length) {
                scale -= $object.dataL.modulSettings.scale;
                callScale();
            }
        });

        $('#origincodevideogallerylb-zoom-in').on('click.origincodevideogallerylb-container', function () {
            if ($object.dataL.$cont.find('.origincodevideogallerylb-current .origincodevideogallerylb-image').length) {
                scale += $object.dataL.modulSettings.scale;
                callScale();
            }
        });

        if (origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_zoomlogo !== '0') {
            $object.dataL.$cont.dblclick(function () {
                if (!$object.dataL.$cont.hasClass('dbl-zoomed')) {
                    $object.dataL.$cont.addClass('dbl-zoomed');
                    if ($object.dataL.$cont.find('.origincodevideogallerylb-current .origincodevideogallerylb-image').length) {
                        scale += $object.dataL.modulSettings.scale;
                        callScale();
                    }
                } else {
                    $object.dataL.$cont.removeClass('dbl-zoomed');
                    if ($object.dataL.$cont.find('.origincodevideogallerylb-current .origincodevideogallerylb-image').length) {
                        scale -= $object.dataL.modulSettings.scale;
                        callScale();
                    }
                }
            });
        }

        if (!('ontouchstart' in document.documentElement)) {
            $object.zoomDrag();
        }

        if (('ontouchstart' in document.documentElement)) {
            $object.zoomSwipe();
        }

    };

    Modul.prototype.touchendZoom = function (startCoords, endCoords, abscissa, ordinate) {

        var $object = this, _$el, $imageObject, distanceX, distanceY, maxX, maxY;

        _$el = $object.dataL.$item.eq($object.dataL.index).find('.origincodevideogallerylb-img-wrap');
        $imageObject = $object.dataL.$item.eq($object.dataL.index).find('.origincodevideogallerylb-object');
        maxX = Math.abs($imageObject.outerWidth() * Math.abs($imageObject.attr('data-scale')) - $object.dataL.$cont.find('.origincodevideogallerylb-container').width()) / 2;
        maxY = Math.abs($imageObject.outerHeight() * Math.abs($imageObject.attr('data-scale')) - $object.dataL.$cont.find('.origincodevideogallerylb-container').height()) / 2 + $(window).scrollTop();

        if (_$el.attr('data-x')) {
            distanceX = +_$el.attr('data-x') + (endCoords.x - startCoords.x);
        } else {
            distanceX = endCoords.x - startCoords.x;
        }

        distanceY = +_$el.attr('data-y') + (endCoords.y - startCoords.y);

        if ((Math.abs(endCoords.x - startCoords.x) > 15) || (Math.abs(endCoords.y - startCoords.y) > 15)) {

            if (abscissa) {
                if (endCoords.x - startCoords.x < 0) {
                    if (distanceX <= -maxX) {
                        distanceX = -maxX;
                    }
                } else {
                    if (distanceX >= maxX) {
                        distanceX = maxX;
                    }
                }

                _$el.attr('data-x', distanceX);
            }

            if (ordinate) {
                if (endCoords.y - startCoords.y < 0) {
                    if (distanceY <= -(maxY + ($object.pageY - ($(window).height() - $imageObject.height()) / 2)) + 2 * $(window).scrollTop()) {
                        distanceY = -(maxY + ($object.pageY - ($(window).height() - $imageObject.height()) / 2)) + 2 * $(window).scrollTop();
                    }
                } else {
                    if (distanceY >= maxY - ($object.pageY - ($(window).height() - $imageObject.height()) / 2)) {
                        distanceY = maxY - ($object.pageY - ($(window).height() - $imageObject.height()) / 2);
                    }
                }

                _$el.attr('data-y', distanceY);
            }

            _$el.css({
                transform: 'translate3d(' + distanceX + 'px, ' + distanceY + 'px, 0)'
            });

        }
    };

    Modul.prototype.zoomDrag = function () {

        var $object = this;
        var startCoords = {};
        var endCoords = {};
        var isDraging = false;
        var isMoved = false;

        var abscissa = false;

        var ordinate = false;

        $object.dataL.$item.on('mousedown.origincodevideogallerylb-container.zoom', function (e) {

            var $imageObject = $object.dataL.$item.eq($object.dataL.index).find('.origincodevideogallerylb-object');

            ordinate = $imageObject.outerHeight() * $imageObject.attr('data-scale') > $object.dataL.$cont.find('.origincodevideogallerylb-container').height();
            abscissa = $imageObject.outerWidth() * $imageObject.attr('data-scale') > $object.dataL.$cont.find('.origincodevideogallerylb-container').width();

            if ($object.dataL.$cont.hasClass('origincodevideogallerylb-zoomed')) {
                if ($(e.target).hasClass('origincodevideogallerylb-object') && (abscissa || ordinate)) {
                    e.preventDefault();
                    startCoords = {
                        x: e.pageX,
                        y: e.pageY
                    };

                    isDraging = true;

                    $object.dataL.$cont.scrollLeft += 1;
                    $object.dataL.$cont.scrollLeft -= 1;

                }
            }
        });

        $(window).on('mousemove.origincodevideogallerylb-container.zoom', function (e) {
            if (isDraging) {
                var _$el = $object.dataL.$item.eq($object.dataL.index).find('.origincodevideogallerylb-img-wrap');
                var distanceX;
                var distanceY;

                isMoved = true;
                endCoords = {
                    x: e.pageX,
                    y: e.pageY
                };

                if (_$el.attr('data-x')) {
                    distanceX = +_$el.attr('data-x') + (endCoords.x - startCoords.x);
                } else {
                    distanceX = endCoords.x - startCoords.x;
                }

                if (ordinate) {
                    distanceY = +_$el.attr('data-y') + (endCoords.y - startCoords.y);
                }

                _$el.css({
                    transform: 'translate3d(' + distanceX + 'px, ' + distanceY + 'px, 0)'
                });
            }
        });

        $(window).on('mouseup.origincodevideogallerylb-container.zoom', function (e) {

            if (isDraging) {
                isDraging = false;

                if (isMoved && ((startCoords.x !== endCoords.x) || (startCoords.y !== endCoords.y))) {
                    endCoords = {
                        x: e.pageX,
                        y: e.pageY
                    };
                    $object.touchendZoom(startCoords, endCoords, abscissa, ordinate);

                }

                isMoved = false;
            }

        });
    };

    Modul.prototype.zoomSwipe = function () {
        var $object = this;
        var startCoords = {};
        var endCoords = {};
        var isMoved = false;

        var abscissa = false;

        var ordinate = false;

        $object.dataL.$item.on('touchstart.origincodevideogallerylb-container', function (e) {

            if ($object.dataL.$cont.hasClass('origincodevideogallerylb-zoomed')) {
                var $imageObject = $object.dataL.$item.eq($object.dataL.index).find('.origincodevideogallerylb-object');

                ordinate = $imageObject.outerHeight() * $imageObject.attr('data-scale') > $object.dataL.$cont.find('.origincodevideogallerylb-container').height();
                abscissa = $imageObject.outerWidth() * $imageObject.attr('data-scale') > $object.dataL.$cont.find('.origincodevideogallerylb-container').width();
                if ((abscissa || ordinate)) {
                    e.preventDefault();
                    startCoords = {
                        x: e.originalEvent.targetTouches[0].pageX,
                        y: e.originalEvent.targetTouches[0].pageY
                    };
                }
            }

        });

        $object.dataL.$item.on('touchmove.origincodevideogallerylb-container', function (e) {

            if ($object.dataL.$cont.hasClass('origincodevideogallerylb-zoomed')) {

                var _$el = $object.dataL.$item.eq($object.dataL.index).find('.origincodevideogallerylb-img-wrap');
                var distanceX;
                var distanceY;

                e.preventDefault();
                isMoved = true;

                endCoords = {
                    x: e.originalEvent.targetTouches[0].pageX,
                    y: e.originalEvent.targetTouches[0].pageY
                };

                if (_$el.attr('data-x')) {
                    distanceX = +_$el.attr('data-x') + (endCoords.x - startCoords.x);
                } else {
                    distanceX = endCoords.x - startCoords.x;
                }

                if (ordinate) {
                    distanceY = +_$el.attr('data-y') + (endCoords.y - startCoords.y);
                }

                if ((Math.abs(endCoords.x - startCoords.x) > 15) || (Math.abs(endCoords.y - startCoords.y) > 15)) {
                    _$el.css({
                        transform: 'translate3d(' + distanceX + 'px, ' + distanceY + 'px, 0)'
                    });
                }

            }

        });

        $object.dataL.$item.on('touchend.origincodevideogallerylb-container', function () {
            if ($object.dataL.$cont.hasClass('origincodevideogallerylb-zoomed')) {
                if (isMoved) {
                    isMoved = false;
                    $object.touchendZoom(startCoords, endCoords, abscissa, ordinate);

                }
            }
        });

    };

    Modul.prototype.initThumbs = function () {
        var $object = this;

        if (this.dataL.modulSettings.thumbnail && this.dataL.$items.length > 1) {

            if (this.dataL.modulSettings.showByDefault) {
                setTimeout(function () {
                    $object.dataL.$cont.addClass('origincodevideogallerylb-thumb-open');
                }, 100);
            }

            this.buildThumbs();

            this.dataL.effectsSupport() && this.enableThumbDrag();

            this.activatedThumbs = false;

            if ($object.dataL.modulSettings.toogleThumb) {
                $object.$thumbCont.append('<span class="origincodevideogallerylb-toggle-thumb origincodevideogallerylb-icon"></span>');
                $object.dataL.$cont.find('.origincodevideogallerylb-toggle-thumb').on('click.origincodevideogallerylb-container', function () {
                    $object.dataL.$cont.toggleClass('origincodevideogallerylb-thumb-open');
                });
            }
        }

        $('.origincodevideogallerylb-container .origincodevideogallerylb-thumb-item').css({
            background: '#' + this.dataL.modulSettings.thumbsOverlayColor
        });
        $('.origincodevideogallerylb-container .origincodevideogallerylb-thumb-item img').css({
            opacity: 1 - +this.dataL.modulSettings.thumbsOverlayOpacity / 100
        });

        $('.origincodevideogallerylb-thumb-cont').css({
            bottom: -$object.dataL.modulSettings.thumbsHeight + 'px'
        });

        if (this.dataL.modulSettings.showByDefault) {
            var $cont_ = $('.cont-inner'),
                $thumb_ = $('.origincodevideogallerylb-thumb-cont'),
                $toolbar_ = $('.origincodevideogallerylb-toolbar');
            setTimeout(function () {
                switch ($object.dataL.settings.lightboxView) {
                    case 'view1':
                        switch ($object.dataL.modulSettings.thumbPosition) {
                            case '0':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 92) + 'px)',
                                    top: '47px'
                                });
                                $thumb_.css({
                                    bottom: '0',
                                    backgroundColor: 'rgba(0,0,0,.9)'
                                });
                                $('.origincodevideogallerylb-bar > *').css({
                                    bottom: $object.dataL.modulSettings.thumbsHeight + 'px'
                                });
                                break;
                            case '1':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 92) + 'px)',
                                    top: $object.dataL.modulSettings.thumbsHeight + 47 + 'px'
                                });
                                $thumb_.css({
                                    top: '47px',
                                    backgroundColor: 'rgba(0,0,0,.9)'
                                });
                                break;
                        }
                        break;
                    case 'view2':
                        switch ($object.dataL.modulSettings.thumbPosition) {
                            case '0':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 92) + 'px)',
                                    top: '45px'
                                });
                                $thumb_.css({
                                    bottom: '45px',
                                    backgroundColor: 'rgba(0,0,0,.9)'
                                });
                                break;
                            case '1':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 92) + 'px)',
                                    top: $object.dataL.modulSettings.thumbsHeight + 45 + 'px'
                                });
                                $thumb_.css({
                                    top: '0',
                                    backgroundColor: 'rgba(0,0,0,.9)'
                                });
                                $toolbar_.css({
                                    top: $object.dataL.modulSettings.thumbsHeight + 'px'
                                });
                                break;
                        }
                        break;
                    case 'view3':
                        switch ($object.dataL.modulSettings.thumbPosition) {
                            case '0':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 92) + 'px)',
                                    top: '47px'
                                });
                                $thumb_.css({
                                    bottom: '0',
                                    backgroundColor: 'white'
                                });
                                $('.origincodevideogallerylb-title').css({
                                    bottom: $object.dataL.modulSettings.thumbsHeight + 'px'
                                });
                                break;
                            case '1':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 93) + 'px)',
                                    top: ($object.dataL.modulSettings.thumbsHeight + 48) + 'px'
                                });
                                $thumb_.css({
                                    top: '48px',
                                    backgroundColor: 'white'
                                });
                                break;
                        }
                        break;
                    case 'view4':
                        switch ($object.dataL.modulSettings.thumbPosition) {
                            case '0':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 92) + 'px)'
                                });
                                $thumb_.css({
                                    bottom: '0',
                                    backgroundColor: 'none'
                                });
                                $('.origincodevideogallerylb-socialIcons').css({
                                    bottom: ($object.dataL.modulSettings.thumbsHeight - 10) + 'px'
                                });
                                $('.barCont').css({
                                    bottom: $object.dataL.modulSettings.thumbsHeight + 'px'
                                });
                                $('#origincodevideogallerylb-counter').css({
                                    bottom: ($object.dataL.modulSettings.thumbsHeight + 5) + 'px'
                                });
                                $('.origincodevideogallerylb-item').css({
                                    top: '47px'
                                });
                                break;
                            case '1':
                                $cont_.css({
                                    height: 'calc(100% - ' + ($object.dataL.modulSettings.thumbsHeight + 90) + 'px)',
                                    top: $object.dataL.modulSettings.thumbsHeight + 45 + 'px'
                                });
                                $thumb_.css({
                                    top: '45px',
                                    backgroundColor: 'none'
                                });
                                break;
                        }
                        break;
                    case 'view5':
                        switch ($object.dataL.modulSettings.thumbPosition) {
                            case '0':
                                $cont_.css({
                                    height: 'calc(100% - ' + $object.dataL.modulSettings.thumbsHeight + 'px)'
                                });
                                $thumb_.css({
                                    bottom: '0'
                                });
                                break;
                            case '1':
                                $cont_.css({
                                    height: 'calc(100% - ' + $object.dataL.modulSettings.thumbsHeight + 'px)',
                                    top: $object.dataL.modulSettings.thumbsHeight + 'px'
                                });
                                $thumb_.css({
                                    top: '0'
                                });
                                break;
                        }
                        break;
                }
            }, 100);
        }
    };

    Modul.prototype.buildThumbs = function () {
        var $object = this;
        var thumbList = '';
        var vimeoErrorThumbSize = '';
        var $thumb;
        var html = '<div class="origincodevideogallerylb-thumb-cont">' +
            '<div class="origincodevideogallerylb-thumb group">' +
            '</div>' +
            '</div>';

        vimeoErrorThumbSize = '100x75';

        $object.dataL.$cont.addClass('origincodevideogallerylb-has-thumb');

        $object.dataL.$cont.find('.origincodevideogallerylb-container').append(html);

        $object.$thumbCont = $object.dataL.$cont.find('.origincodevideogallerylb-thumb-cont');
        $object.thumbContWidth = $object.$thumbCont.width();

        $object.dataL.$cont.find('.origincodevideogallerylb-thumb').css({
            width: $object.thumbTotalWidth + 'px',
            position: 'relative'
        });

        $object.$thumbCont.css('height', $object.dataL.modulSettings.thumbsHeight + 'px');

        function getThumb(src, thumb, index) {
            var isVideo = $object.dataL.isVideo(src, index) || {};
            var thumbImg;
            var vimeoId = '';

            if (isVideo.youtube || isVideo.vimeo || isVideo.dailymotion) {
                if (isVideo.youtube) {
                    thumbImg = '//img.youtube.com/vi/' + isVideo.youtube[1] + '/1.jpg';
                } else if (isVideo.vimeo) {
                    thumbImg = '//i.vimeocdn.com/video/error_' + vimeoErrorThumbSize + '.jpg';
                    vimeoId = isVideo.vimeo[1];
                }
            } else {
                thumbImg = thumb;
            }

            thumbList += '<div data-vimeo-id="' + vimeoId + '" class="origincodevideogallerylb-thumb-item" style="width:' + $object.dataL.modulSettings.thumbsWidth + 'px; margin-right: ' + $object.dataL.modulSettings.thumbMargin + 'px"><img src="' + thumbImg + '" /></div>';
            vimeoId = '';
        }

        $object.dataL.$items.each(function (i) {

            getThumb($(this).attr('href') || $(this).attr('data-src'), $(this).find('img').attr('src'), i);

        });

        $object.dataL.$cont.find('.origincodevideogallerylb-thumb').html(thumbList);

        $thumb = $object.dataL.$cont.find('.origincodevideogallerylb-thumb-item');

        $thumb.each(function () {
            var $this = $(this);
            var vimeoVideoId = $this.attr('data-vimeo-id');

            if (vimeoVideoId) {
                $.getJSON('//www.vimeo.com/api/v2/video/' + vimeoVideoId + '.json?callback=?', {
                    format: 'json'
                }, function (data) {
                    $this.find('img').attr('src', data[0]['thumbnail_small']);
                });
            }
        });

        $thumb.eq($object.dataL.index).addClass('active');
        $object.dataL.$element.on('onBeforeSlide.origincodevideogallerylb-container', function () {
            $thumb.removeClass('active');
            $thumb.eq($object.dataL.index).addClass('active');
        });

        $thumb.on('click.origincodevideogallerylb-container touchend.origincodevideogallerylb-container', function () {
            var _$this = $(this);
            setTimeout(function () {
                if ($object.activatedThumbs || !$object.dataL.effectsSupport()) {
                    $object.dataL.index = _$this.index();
                    $object.dataL.slide($object.dataL.index, false, true);
                    $('.origincodevideogallerylb-thumb').removeClass('thumb_move');
                }
            }, 50);
        });

        $object.dataL.$element.on('onBeforeSlide.origincodevideogallerylb-container', function () {
            $object.animateThumb($object.dataL.index);
        });

        $(window).on('resize.origincodevideogallerylb-container.thumb orientationchange.origincodevideogallerylb-container.thumb', function () {
            setTimeout(function () {
                $object.animateThumb($object.dataL.index);
                $object.thumbContWidth = $object.$thumbCont.width();
            }, 200);
        });

    };

    Modul.prototype.animateThumb = function (index) {
        var $thumb = this.dataL.$cont.find('.origincodevideogallerylb-thumb'),
            position = (this.thumbContWidth / 2) - (this.dataL.modulSettings.thumbsWidth / 2);

        this.left = ((this.dataL.modulSettings.thumbsWidth + this.dataL.modulSettings.thumbMargin) * index - 1) - position;
        if (this.left > (this.thumbTotalWidth - this.thumbContWidth)) {
            this.left = this.thumbTotalWidth - this.thumbContWidth;
        }

        if (this.left < 0) {
            this.left = 0;
        }

        if (this.dataL.origincodevideogallerylballeryOn) {
            if (!$thumb.hasClass('on')) {
                this.dataL.$cont.find('.origincodevideogallerylb-thumb').css('transition-duration', this.dataL.modulSettings.speed + 'ms');
            }

            if (!this.dataL.effectsSupport()) {
                $thumb.animate({
                    left: -this.left + 'px'
                }, this.dataL.modulSettings.speed);
            }
        } else {
            if (!this.dataL.effectsSupport()) {
                $thumb.css('left', -this.left + 'px');
            }
        }
        if (!$('.origincodevideogallerylb-thumb').hasClass('thumb_move')) {
            this.dataL.$cont.find('.origincodevideogallerylb-thumb').css({
                transform: 'translate3d(-' + (this.left) + 'px, 0px, 0px)'
            });
        }
    };

    Modul.prototype.enableThumbDrag = function () {

        var $object = this,
            startCoords = 0,
            endCoords = 0,
            isDraging = false,
            isMoved = false,
            tempLeft = 0,
            $left_ = ((this.dataL.modulSettings.thumbsWidth + this.dataL.modulSettings.thumbMargin) * $object.dataL.index - 1) - (this.thumbContWidth / 2) - (this.dataL.modulSettings.thumbsWidth / 2);

        $('.origincodevideogallerylb-thumb').attr('data-left', $left_);

        $object.dataL.$cont.find('.origincodevideogallerylb-thumb').on('mousedown.origincodevideogallerylb-container.thumb', function (e) {
            if ($object.thumbTotalWidth > $object.thumbContWidth) {
                e.preventDefault();
                startCoords = e.pageX;
                isDraging = true;

                $object.dataL.$cont.scrollLeft += 1;
                $object.dataL.$cont.scrollLeft -= 1;

                $object.activatedThumbs = false;
            }
        });

        $(window).on('mousemove.origincodevideogallerylb-container.thumb', function (e) {
            if (isDraging) {
                tempLeft = +$('.origincodevideogallerylb-thumb').attr('data-left');
                isMoved = true;
                endCoords = e.pageX;

                if (Math.abs(endCoords - startCoords) > 0 && $('.origincodevideogallerylb-cont').hasClass('origincodevideogallerylb-show-autoplay')) {
                    $('.origincodevideogallerylb-thumb').addClass('thumb_move');
                }

                tempLeft = tempLeft - (endCoords - startCoords);

                if (tempLeft > ($object.thumbTotalWidth - $object.thumbContWidth)) {
                    tempLeft = $object.thumbTotalWidth - $object.thumbContWidth;
                }

                if (tempLeft < 0) {
                    tempLeft = 0;
                }

                $object.dataL.$cont.find('.origincodevideogallerylb-thumb').css({
                    transform: 'translate3d(-' + (tempLeft) + 'px, 0px, 0px)'
                });
            }
        });

        $(window).on('mouseup.origincodevideogallerylb-container.thumb', function () {
            if (isMoved) {
                isMoved = false;

                $('.origincodevideogallerylb-thumb').attr('data-left', tempLeft);

            } else {
                $object.activatedThumbs = true;
            }

            if (isDraging) {
                isDraging = false;
            }
        });

    };

    Modul.prototype.destroy = function () {
        var $object = this;

        $object.dataL.$element.off('.origincodevideogallerylb-container.zoom');
        $(window).off('.origincodevideogallerylb-container.zoom');
        $object.dataL.$item.off('.origincodevideogallerylb-container.zoom');
        $object.dataL.$element.off('.origincodevideogallerylb-container.zoom');
        $object.dataL.$cont.removeClass('origincodevideogallerylb-zoomed');
        clearTimeout($object.zoomabletimeout);
        $object.zoomabletimeout = false;

        if (this.dataL.modulSettings.thumbnail && this.dataL.$items.length > 1) {
            $(window).off('resize.origincodevideogallerylb-container.thumb orientationchange.origincodevideogallerylb-container.thumb keydown.origincodevideogallerylb-container.thumb');
            this.$thumbCont.remove();
            this.dataL.$cont.removeClass('origincodevideogallerylb-has-thumb');
            $('.cont-inner').css({
                height: '100%'
            });
        }
    };

    $.fn.lightboxVideo.lightboxModul.modul = Modul;

    var WaterMark = function (element) {
        this.element = element;
        this.settings = $.extend({}, this.constructor.defaults);
        this.init();
    };

    WaterMark.defaults = {
        imgSrc: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_img_src_new,
        text: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_text,
        textColor: '#' + origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_textColor,
        textFontSize: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_textFontSize,
        containerBackground: origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_container_bg_color,
        containerWidth: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_containerWidth,
        position: 'pos' + origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_position_new,
        opacity: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_opacity / 100,
        margin: +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_margin,
        done: function (imgURL) {
            this.dataset.src = imgURL;
        }
    };

    WaterMark.prototype.init = function () {
        var $object = this,
            $elem = $object.element,
            $settings = $object.settings,
            wmData = {},
            imageData = {};

        var WatermarkImage = jQuery('<img />');
        WatermarkImage.attr('src', $object.settings.imgSrc);
        WatermarkImage.css('display', 'none').attr('id', 'origincode_watermark_img_sample');
        if (!jQuery('body').find('#origincode_watermark_img_sample').length) {
            jQuery('body').append(WatermarkImage);
        }

        wmData = {
            imgurl: $settings.imgSrc,
            type: 'jpeg'
        };

        imageData = {
            imgurl: $elem.dataset.imgsrc
        };

        var defer = $.Deferred();

        $.when(defer).done(function (imgObj) {
            imageData.$wmObject = imgObj;

            $object.imgurltodata(imageData, function (dataURL) {
                $settings.done.call($elem, dataURL);
            });
        });

        if ($settings.text !== '') {
            wmData.imgurl = $object.textwatermark();
        }

        $object.imgurltodata(wmData, function (imgObj) {
            defer.resolve(imgObj);
        });
    };

    WaterMark.prototype.textwatermark = function () {
        var $object = this,
            $settings,
            canvas,
            context,
            $width,
            $height;

        $settings = $object.settings;
        canvas = document.createElement('canvas');
        context = canvas.getContext('2d');

        $width = $settings.containerWidth;
        $height = $settings.textFontSize;

        canvas.width = $width;
        canvas.height = $height;

        context.fillStyle = $settings.containerBackground;
        context.fillRect(0, 0, $width, $height);

        context.fillStyle = $settings.textColor;
        context.textAlign = 'center';
        context.font = '500 ' + $settings.textFontSize + 'px Sans-serif';

        context.fillText($settings.text, ($width / 2), ($height - 5));

        return canvas.toDataURL();
    };

    WaterMark.prototype.imgurltodata = function (data, callback) {
        var $object = this,
            $settings = $object.settings,
            img;

        img = new Image();
        img.setAttribute('crossOrigin', 'anonymous');
        img.onload = function () {

            var canvas = document.createElement('canvas'),
                context = canvas.getContext('2d'),

                $imgWidth = this.width,
                $imgHeight = this.height;

            if (data.$wmObject) {

                if (data.width !== 'auto' && data.height === 'auto' && data.width < $imgWidth) {
                    $imgHeight = $imgHeight / $imgWidth * data.width;
                    $imgWidth = data.width;
                } else if (data.width === 'auto' && data.height !== 'auto' && data.height < $imgHeight) {
                    $imgWidth = $imgWidth / $imgHeight * data.height;
                    $imgHeight = data.height;
                } else if (data.width !== 'auto' && data.height !== 'auto' && data.width < $imgWidth && data.height < $imgHeight) {
                    $imgWidth = data.width;
                    $imgHeight = data.height;
                }

            }


            canvas.width = $imgWidth;
            canvas.height = $imgHeight;

            /*if (data.type === 'jpeg') {
             context.fillStyle = '#ffffff';
             context.fillRect(0, 0, $imgWidth, $imgHeight);
             }*/

            context.drawImage(this, 0, 0, $imgWidth, $imgHeight);

            if (data.$wmObject) {

                var $opacity = +origincode_gallery_video_resp_lightbox_obj.origincode_gallery_video_lightbox_watermark_containerOpacity / 100;
                if ($opacity >= 0 && $opacity <= 1) {
                    //context.globalAlpha = $settings.opacity;
                    context.globalAlpha = $opacity;
                }

                var $wmWidth,
                    $wmHeight,
                    pos = $settings.margin,
                    $x, $y;
                if ($settings.text !== '') {
                    $wmWidth = data.$wmObject.width;
                    $wmHeight = data.$wmObject.height;
                }
                else {
                    $wmWidth = $settings.containerWidth;
                    $wmHeight = (jQuery('img#origincode_watermark_img_sample').prop('naturalHeight') * $wmWidth) / jQuery('img#origincode_watermark_img_sample').prop('naturalWidth');
                }

                switch ($settings.position) {
                    case 'pos1':
                        $x = pos;
                        $y = pos;
                        break;
                    case 'pos2':
                        $x = $imgWidth / 2 - $wmWidth / 2;
                        $y = pos;
                        break;
                    case 'pos3':
                        $x = $imgWidth - $wmWidth - pos;
                        $y = pos;
                        break;
                    case 'pos4':
                        $x = pos;
                        $y = $imgHeight / 2 - $wmHeight / 2;
                        break;
                    case 'pos5':
                        $x = $imgWidth / 2 - $wmWidth / 2;
                        $y = $imgHeight / 2 - $wmHeight / 2;
                        break;
                    case 'pos6':
                        $x = $imgWidth - $wmWidth - pos;
                        $y = $imgHeight / 2 - $wmHeight / 2;
                        break;
                    case 'pos7':
                        $x = pos;
                        $y = $imgHeight - $wmHeight - pos;
                        break;
                    case 'pos8':
                        $x = $imgWidth / 2 - $wmWidth / 2;
                        $y = $imgHeight - $wmHeight - pos;
                        break;
                    case 'pos9':
                        $x = $imgWidth - $wmWidth - pos;
                        $y = $imgHeight - $wmHeight - pos;
                        break;
                    default:
                        $x = $imgWidth - $wmWidth - pos;
                        $y = $imgHeight - $wmHeight - pos;
                }
                context.drawImage(data.$wmObject, $x, $y, $wmWidth, $wmHeight);
            }

            var dataURL = canvas.toDataURL('image/' + data.type);

            if (typeof callback === 'function') {

                if (data.$wmObject) {
                    callback(dataURL);

                } else {
                    var $wmNew = new Image();
                    $wmNew.src = dataURL;
                    callback($wmNew);
                }
            }

            canvas = null;
        };

        img.src = data.imgurl;
    };

    $.fn['watermark'] = function () {
        return this.each(function () {
            if (!$.data(this, 'watermark')) {
                $.data(this, 'watermark', new WaterMark(this));
            }
        });
    };

})(jQuery);