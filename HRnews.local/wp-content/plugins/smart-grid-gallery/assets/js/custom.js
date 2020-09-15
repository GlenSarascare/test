"use strict";
function galleryVideoIsotope(elem, option) {
    if (typeof elem.isotope == 'function') {
        elem.isotope(option);
    }
    else {
        elem.origincodemicro(option);
    }
}
function galleryVideolightboxInit() {

    if(video_lightbox_type == 'old_type') {

        jQuery('.gallery-video-content').each(function () {
            var galleryVideoId = jQuery(this).attr('data-gallery-video-id');
            var lightboxVideoHeight = parseInt(lightbox_obj.lightbox_width * 9 / 16);
            jQuery(".slider-content.clone .image-block_" + galleryVideoId + " a").removeClass('group' + galleryVideoId);
            jQuery(this).find("a[href*='youtu'],a[href*='vimeo']").removeClass('cboxElement ');
            jQuery(".group" + galleryVideoId).removeClass('cboxElement').vcolorbox({rel: 'group' + galleryVideoId});
            jQuery(".vyoutube").removeClass('cboxElement').vcolorbox({
                iframe: true,
                innerWidth: lightbox_obj.lightbox_width,
                innerHeight: lightboxVideoHeight
            });
            jQuery(".vvimeo").removeClass('cboxElement').vcolorbox({
                iframe: true,
                innerWidth: lightbox_obj.lightbox_width,
                innerHeight: lightboxVideoHeight
            });
            jQuery(".iframe").removeClass('cboxElement').vcolorbox({iframe: true, width: "80%", height: "80%"});
            jQuery(".inline").removeClass('cboxElement').vcolorbox({inline: true, width: "50%"});
            jQuery(".callbacks").removeClass('cboxElement').vcolorbox({
                onOpen: function () {
                    alert('onOpen: vcolorbox is about to open');
                },
                onLoad: function () {
                    alert('onLoad: vcolorbox has started to load the targeted content');
                },
                onComplete: function () {
                    alert('onComplete: vcolorbox has displayed the loaded content');
                },
                onCleanup: function () {
                    alert('onCleanup: vcolorbox has begun the close process');
                },
                onClosed: function () {
                    alert('onClosed: vcolorbox has completely closed');
                }
            });

            jQuery('.non-retina').removeClass('cboxElement').vcolorbox({rel: 'group5', transition: 'none'})
            jQuery('.retina').removeClass('cboxElement').vcolorbox({
                rel: 'group5',
                transition: 'none',
                retinaImage: true,
                retinaUrl: true
            });
        });
    }
    else if(video_lightbox_type == 'new_type'){
        jQuery('.gallery-video-content').each(function () {
            var galleryVideoId = jQuery(this).attr('data-gallery-video-id');
            jQuery(".slider-content.clone .image-block_" + galleryVideoId + " a").removeClass('group' + galleryVideoId);
            jQuery(this).find("a[href*='youtu'],a[href*='vimeo']").removeClass('cboxElement ').addClass('vg_responsive_lightbox');
            if(origincode_gallery_video_view === 'content-slider'){
                jQuery('div.slider-content.clone').find("a[href*='youtu'],a[href*='vimeo']").removeClass('vg_responsive_lightbox');
                jQuery('.right-block').find("a[href*='youtu'],a[href*='vimeo']").removeClass('vg_responsive_lightbox');
            }
            jQuery('.vg_responsive_lightbox').lightboxVideo();
        });

    }
}
jQuery(document).ready(function () {
    galleryVideolightboxInit();
});