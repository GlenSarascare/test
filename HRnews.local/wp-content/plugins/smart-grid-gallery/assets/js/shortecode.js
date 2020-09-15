"use strict";
jQuery(document).ready(function () {
    var pause_on_hover;
    var gal_sel;
    jQuery('input[name=pause_on_hover]').change(function () {
        if (jQuery('input[name=pause_on_hover]').prop('checked') == false) {
            jQuery('input[name=pause_on_hover]').val('off');
        }
        else if (jQuery('input[name=pause_on_hover]').prop('checked') == true) {
            jQuery('input[name=pause_on_hover]').val('on');
        }
    });

    jQuery('#origincodevideogalleryinsert').on('click', function () {
        var id = jQuery('#origincode_videogallery-select option:selected').val();
        var origincode_sl_effects = jQuery('#origincode_sl_effects').val();
        var sl = origincode_sl_effects;
        var display_type = jQuery('#videogallery-current-options-' + sl + ' select[id="display_type"]').val();
        var content_per_page = jQuery('#videogallery-current-options-' + sl + ' input[id="content_per_page"]').val();
        var sl_width = jQuery('input[name=sl_width]').val();
        var sl_height = jQuery('input[name=sl_height]').val();
        var videogallery_list_effects_s = jQuery('select[name=videogallery_list_effects_s]').val();
        var sl_pausetime = jQuery('input[name=sl_pausetime]').val();
        var sl_changespeed = jQuery('input[name=sl_changespeed]').val();
        var sl_position = jQuery('select[name=sl_position]').val();
        var insertShortecodeNonce = jQuery(this).attr('data-insert-shortecode-nonce');
        pause_on_hover = jQuery('input[name=pause_on_hover]').val();
        var data = {
            video_id: id,
            action: 'admin_origincode_gallery_video_shortecode',
            post: 'videoGalSaveOptions',
            origincode_sl_effects: origincode_sl_effects,
            display_type: display_type,
            content_per_page: content_per_page,
            sl_width: sl_width,
            sl_height: sl_height,
            videogallery_list_effects_s: videogallery_list_effects_s,
            sl_pausetime: sl_pausetime,
            sl_changespeed: sl_changespeed,
            sl_position: sl_position,
            pause_on_hover: pause_on_hover,
            insertShortecodeNonce: insertShortecodeNonce
        };

        jQuery.post(ajax_object_shortecode, data, function (response) {
        });

        window.send_to_editor('[origincode_videogallery id="' + id + '"]');
        tb_remove();
    })
    if (jQuery('select[name="display_type"]').val() == 2) {
        jQuery('li[id="content_per_page"]').hide();
    } else {
        jQuery('li[id="content_per_page"]').show();
    }
    jQuery('select[name="display_type"]').on('change', function () {
        if (jQuery(this).val() == 2) {
            jQuery('li[id="content_per_page"]').hide();
        } else {
            jQuery('li[id="content_per_page"]').show();
        }
    })
    jQuery('#videogallery-unique-options').on('change', function () {
        jQuery(this).find('div[id^="videogallery-current-options"]').each(function () {
            if (!jQuery(this).hasClass("active")) {
                jQuery(this).find('ul li input[name="content_per_page"]').attr('name', '');
                jQuery(this).find('ul li select[name="display_type"]').attr('name', '');
            } else {
                jQuery(this).find('ul li input[id="content_per_page"]').attr('name', 'content_per_page');
                jQuery(this).find('ul li select[id="display_type"]').attr('name', 'display_type');
            }
        });
        if (jQuery('select[name="display_type"]').val() == 2) {
            jQuery('li[id="content_per_page"]').hide();
        } else {
            jQuery('li[id="content_per_page"]').show();
        }
    });
    jQuery('#origincode_sl_effects').change(function () {
        var sel = jQuery(this).val();
        jQuery('div[id^="videogallery-current-options"]').each(function () {
            if (jQuery(this).hasClass("active")) {
                jQuery(this).removeClass("active");
            }
        });
        if (sel == 0) {
            jQuery('#videogallery-current-options-0').addClass('active');
        }
        if (sel == 3) {
            jQuery('#videogallery-current-options-3').addClass('active');
        }
        if (sel == 4) {
            jQuery('#videogallery-current-options-4').addClass('active');
        }
        if (sel == 5) {
            jQuery('#videogallery-current-options-5').addClass('active');
        }
        if (sel == 6) {
            jQuery('#videogallery-current-options-6').addClass('active');
        }
        if (sel == 7) {
            jQuery('#videogallery-current-options-7').addClass('active');
        }
    });
    jQuery('#origincode_sl_effects').change();
    jQuery('#origincode_videogallery-select').change(function () {
        var changeShortecodeViewNonce = jQuery(this).attr('data-change-view-nonce');
        gal_sel = jQuery(this).val();
        var data = {
            action: 'admin_origincode_gallery_video_shortecode',
            post: 'video_gal_change_options',
            id: gal_sel,
            changeShortecodeViewNonce: changeShortecodeViewNonce
        };
        jQuery.post(ajax_object_shortecode, data, function (response) {
            response = JSON.parse(response);
            jQuery('#origincode_sl_effects').val(response.origincode_sl_effects);
            jQuery('#origincode_sl_effects').change();
            jQuery('select[name=display_type]').val(response.display_type);
            jQuery('input[name=content_per_page]').val(response.content_per_page);
            jQuery('input[name=sl_width]').val(response.sl_width);
            jQuery('input[name=sl_height]').val(response.sl_height);
            jQuery('select[name=videogallery_list_effects_s]').val(response.videogallery_list_effects_s);
            jQuery('input[name=sl_pausetime]').val(response.sl_pausetime);
            jQuery('input[name=sl_changespeed]').val(response.sl_changespeed);
            jQuery('select[name=sl_position]').val(response.sl_position);

            if (jQuery('select[name="display_type"]').val() == 2) {
                jQuery('li[id="content_per_page"]').hide();
            } else {
                jQuery('li[id="content_per_page"]').show();
            }

            jQuery('input[name=pause_on_hover]').val(response.pause_on_hover);
            if (jQuery('input[name=pause_on_hover]').val() == 'on') {
                jQuery('input[name=pause_on_hover]').attr('checked', 'checked');
            }
            else jQuery('input[name=pause_on_hover]').removeAttr('checked');

        });

    });
});