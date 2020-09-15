"use strict";
var name_changeRight = function (e) {
    document.getElementById("name").value = e.value;
}
var name_changeTop = function (e) {
    document.getElementById("origincode_videogallery_name").value = e.value;
};

jQuery(document).ready(function () {
    jQuery('#lightbox_type input').change(function () {

        jQuery('#lightbox_type input').parent().removeClass('active');
        jQuery(this).parent().addClass('active');
        if(jQuery(this).val() == 'old_type'){
            jQuery('#lightbox-options-list').addClass('active');
            jQuery('#new-lightbox-options-list').removeClass('active');
        }
        else{
            jQuery('#lightbox-options-list').removeClass('active');
            jQuery('#new-lightbox-options-list').addClass('active');
        }
        jQuery('#lightbox_type input').prop('checked',false);
        if(!jQuery(this).prop('checked')){
            jQuery(this).prop('checked',true);
        }
    });
    jQuery('#origincode-insert-video-button').on('click',function () {
        var add_nonce = jQuery(this).parents('#origincode_origincode_gallery_video_add_videos_wrap').attr('data-add-video-nonce');
        var videoGalleryId = jQuery(this).parents('#origincode_origincode_gallery_video_add_videos_wrap').attr('data-videogallery-id');
        var action = 'admin.php?page=video_galleries_origincode_video_gallery&task=videoorigincode_gallery_video&id='+videoGalleryId+'&closepop=1&video_add_nonce='+add_nonce;
        jQuery(this).parents('form').attr('action',action);
    });
    jQuery('a.add-video-slide').on('click',function(){
        var addVideoNonce  = jQuery(this).attr('data-add-video-nonce');
        var videoGalleryId  = jQuery(this).attr('data-videogallery-id');
        jQuery('#origincode_origincode_gallery_video_add_videos_wrap').attr('data-add-video-nonce',addVideoNonce);
        jQuery('#origincode_origincode_gallery_video_add_videos_wrap').attr('data-videogallery-id',videoGalleryId);
    });
    jQuery(".close_free_banner").on("click",function(){
        jQuery(".free_version_banner").css("display","none");
        hgSliderSetCookie( 'galleryVideoFreeBannerShow', 'no', {expires:86400} );
    });
    jQuery('.save-videogallery-options').click(function(e){
        e.preventDefault();
        alert('General Settings are disabled in free version. If you need those functionalities, you need to buy the commercial version.');
    });
    jQuery('#arrows-type input[name="params[origincode_gallery_video_slider_navigation_type]"]').change(function(){
        jQuery(this).parents('ul').find('li.active').removeClass('active');
        jQuery(this).parents('li').addClass('active');
    });
    jQuery('.iframe-text-area').nextAll('a.edit-video-button').on('click', function () {
        var videoUrl = jQuery(this).prev().prev().find('#edit_video_input').val();
        if (!videoUrl) {
            alert('Please copy and past url from Youtube or Vimeo to insert into Gallery Video');
            return;
        }
        var galleryVideoId = jQuery(this).parent('#form-edit-video').attr('data-gallery-video-id');
        var videoUniqueId = jQuery(this).parent('#form-edit-video').attr('data-video-id');
        var videoEditNonce = jQuery(this).parent('#form-edit-video').attr('data-video-edit-nonce');
        var formAction = 'admin.php?page=video_galleries_origincode_video_gallery&task=origincode_gallery_video_edit_video&origincode_gallery_video_id=' + galleryVideoId + '&video_id='+videoUniqueId+'&video_url=' + videoUrl + '&TB_iframe=1&closepop=1&video_edit_nonce='+videoEditNonce;
        jQuery(this).parent('#form-edit-video').attr('action',formAction).submit();
    });
    jQuery('.iframe-text-area + .set-new-video').on('click', function () {
        var videoUrl = jQuery(this).prev().find('#edit_video_input').val();
        var insertVideoNonce = jQuery(this).attr('data-insert-new-video-nonce');
        jQuery('.video-text-area').text(videoUrl);
        var data = {
            task: 'set_new_video',
            action: 'admin_origincode_gallery_video',
            video_url: videoUrl,
            insertVideoNonce: insertVideoNonce
        };
        jQuery.post(ajax_object_admin, data, function (response) {
            response = JSON.parse(response);
            var videoId = response.video_id;
            var videoType = response.video_type;
            var newVideoUrl;
            if (videoType == 'youtube') {
                newVideoUrl = '//www.youtube.com/embed/' + videoId + '?modestbranding=1&showinfo=0&controls=0';
            }
            if (videoType == 'vimeo') {
                newVideoUrl = '//player.vimeo.com/video/' + videoId + '?title=0&amp;byline=0&amp;portrait=0';
            }
            jQuery('.gallery-video-iframe-area').attr('src', newVideoUrl);
        });
    });
    jQuery('.remove-image-container a.edit-video').on('click', function () {
        var videoUrl = jQuery(this).attr('data-video-url');
        var galleryVideoId = jQuery(this).attr('data-gallery-video-id');
        var videoUniqueId = jQuery(this).attr('data-video-id');
        var editVideoNonce = jQuery(this).attr('data-edit-video-nonce');
        jQuery('.video-text-area').text(videoUrl);
        var data = {
            video_url: videoUrl,
            action: 'admin_origincode_gallery_video',
            task: 'send_url_popup',
            editVideoNonce: editVideoNonce,
            videoUniqueId: videoUniqueId
        };
        jQuery.post(ajax_object_admin, data, function (response) {
            jQuery('#TB_window').css('overflow', 'hidden');
            response = JSON.parse(response);
            var videoId = response.video_id;
            var videoType = response.video_type;
            var newVideoUrl;
            if (videoType == 'youtube') {
                newVideoUrl = '//www.youtube.com/embed/' + videoId + '?modestbranding=1&showinfo=0&controls=0';
            }
            if (videoType == 'vimeo') {
                newVideoUrl = '//player.vimeo.com/video/' + videoId + '?title=0&amp;byline=0&amp;portrait=0';
            }
            jQuery('.gallery-video-iframe-area').attr('src', newVideoUrl);
            jQuery('form#form-edit-video').attr('data-gallery-video-id', galleryVideoId);
            jQuery('form#form-edit-video').attr('data-video-id', videoUniqueId);
        });
    });
    jQuery('#postbox-container-1 input[name="sl_pausetime"]').on('change', function () {
        var sl_pausetime = jQuery(this).val();
        jQuery('#postbox-container-1 input[name="sl_pausetime"]').each(function () {
            jQuery(this).val(sl_pausetime);
        });
    });
    jQuery('#postbox-container-1 input[name="sl_changespeed"]').on('change', function () {
        var sl_changespeed = jQuery(this).val();
        jQuery('#postbox-container-1 input[name="sl_changespeed"]').each(function () {
            jQuery(this).val(sl_changespeed);
        });
    });
    jQuery('#postbox-container-1 input[name="pause_on_hover"]').on('change', function () {
        var pause_on_hover = jQuery(this).prop('checked');
        jQuery('#postbox-container-1 input[name="pause_on_hover"]').each(function () {
            jQuery(this).prop('checked', pause_on_hover);
        });
    });
    jQuery('table td a.delete-gallery-video').on('click', function () {
        if (!confirm('Are you sure you want to delete this item?'))
            return false;
    });
    jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
        jQuery(this).parent().find('span').html(parseInt(data.value) + "%");
        jQuery(this).val(parseInt(data.value));
    });
    var strliID = jQuery(location).attr('hash');
    jQuery('#videogallery-view-tabs > li').removeClass('active');
    if (jQuery('#videogallery-view-tabs > li a[href="' + strliID + '"]').length > 0) {
        jQuery('#videogallery-view-tabs > li a[href="' + strliID + '"]').parent().addClass('active');
    } else {
        jQuery('#videogallery-view-tabs > li a[href="#videogallery-view-options-0"]').parent().addClass('active');
    }
    jQuery('#videogallery-view-tabs-contents > li').removeClass('active');

    if (jQuery(strliID).length > 0) {
        jQuery(strliID).addClass('active');
    } else {
        jQuery('#videogallery-view-options-0').addClass('active');
    }
    jQuery('input[data-slider="true"]').bind("slider:changed", function (event, data) {
        jQuery(this).parent().find('span').html(parseInt(data.value) + "%");
        jQuery(this).val(parseInt(data.value));
    });
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
        jQuery('li[id^="videogallery-current-options"]').each(function () {
            if (!jQuery(this).hasClass("active")) {
                jQuery(this).find('ul li input[name="content_per_page"]').attr('name', '');
                jQuery(this).find('ul li select[name="display_type"]').attr('name', '');
            } else {
                jQuery(this).find('ul li input#content_per_page').attr('name', 'content_per_page');
                jQuery(this).find('ul li select#display_type').attr('name', 'display_type');
            }
        })
    });
    jQuery("input.thumb_id_button, .hg_set_def_button ").each(function () {
        jQuery(this).hover(function () {
                jQuery(this).clearQueue().animate({
                    width: "170px",
                }, 200);
            },
            function () {
                jQuery(this).animate({
                    width: "20px",
                }, 200);
            })
    });
    var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;
    jQuery('.origincode-editnewuploader .editimgbutton ').click(function (e) {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = jQuery(this);
        var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function (props, attachment) {
            if (_custom_media) {
                jQuery("#" + id).val(attachment.url);
                jQuery("#save-buttom").click();
            } else {
                return _orig_send_attachment.apply(this, [props, attachment]);
            }
            ;
        }
        wp.media.editor.open(button);
        return false;
    });
    jQuery('.add_media').on('click', function () {
        _custom_media = false;
    });
    jQuery(".origincode-editnewuploader").click(function () {
    });
    jQuery(".wp-media-buttons-icon").click(function () {
        jQuery(".media-menu .media-menu-item").css("display", "none");
        jQuery(".media-menu-item:first").css("display", "block");
        jQuery(".separator").next().css("display", "none");
        jQuery('.attachment-filters').val('image').trigger('change');
        jQuery(".attachment-filters").css("display", "none");
    });
    jQuery("#images-list").sortable({
        stop: function () {
            jQuery("#images-list > li").removeClass('has-background');
            var count = jQuery("#images-list > li").length;
            for (var i = 0; i <= count; i += 2) {
                jQuery("#images-list > li").eq(i).addClass("has-background");
            }
            jQuery("#images-list > li").each(function () {
                jQuery(this).find('.order_by').val(jQuery(this).index());
            });
        },
        revert: true
    });
    jQuery('.def_thumb').on('click', (function () {
        jQuery(this).parents('li').find('.image-container input+input').val('');
        submitbutton('apply');
    }));
    jQuery('#arrows-type input[name="params[slider_navigation_type]"]').change(function () {
        jQuery(this).parents('ul').find('li.active').removeClass('active');
        jQuery(this).parents('li').addClass('active');
    });
    jQuery('input[data-videogallery="true"]').bind("videogallery:changed", function (event, data) {
        jQuery(this).parent().find('span').html(parseInt(data.value) + "%");
        jQuery(this).val(parseInt(data.value));
    });
    jQuery('#videogallery-view-tabs li a').click(function () {
        jQuery('#videogallery-view-tabs > li').removeClass('active');
        jQuery(this).parent().addClass('active');
        jQuery('#videogallery-view-tabs-contents > li').removeClass('active');
        var liID = jQuery(this).attr('href');
        jQuery(liID).addClass('active');
        jQuery('#adminForm').attr('action', "admin.php?page=Options_video_gallery_styles&task=save" + liID);
        return false;
    });
    jQuery('#origincode_sl_effects').change(function () {
        jQuery('.videogallery-current-options').removeClass('active');
        jQuery('#videogallery-current-options-' + jQuery(this).val()).addClass('active');
        if(jQuery(this).val() == 3)
            jQuery('.video_slider_params').css('display','');
        else
            jQuery('.video_slider_params').css('display','none');


        if(jQuery(this).val() == 3 || jQuery(this).val() == 7)
            jQuery('.autoplay').css('display','none');
        else
            jQuery('.autoplay').css('display','');

    });
    jQuery('#origincode_sl_effects').change();
});

function submitbutton(pressbutton) {
    if (!document.getElementById('name').value) {
        alert("Name is required.");
        return;
    }
    document.getElementById("adminForm").action = document.getElementById("adminForm").action + "&task=" + pressbutton;
    document.getElementById("adminForm").submit();
}
function clear_serch_texts() {
    document.getElementById("serch_or_not").value = '';
}

/* Cookies */
function hgSliderGetCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}

function hgSliderSetCookie(name, value, options) {
    options = options || {};

    var expires = options.expires;

    if (typeof expires == "number" && expires) {
        var d = new Date();
        d.setTime(d.getTime() + expires * 1000);
        expires = options.expires = d;
    }
    if (expires && expires.toUTCString) {
        options.expires = expires.toUTCString();
    }


    if(typeof value == "object"){
        value = JSON.stringify(value);
    }
    value = encodeURIComponent(value);
    var updatedCookie = name + "=" + value;

    for (var propName in options) {
        updatedCookie += "; " + propName;
        var propValue = options[propName];
        if (propValue !== true) {
            updatedCookie += "=" + propValue;
        }
    }

    document.cookie = updatedCookie;
}

function hgSliderDeleteCookie(name) {
    setCookie(name, "", {
        expires: -1
    })
};
