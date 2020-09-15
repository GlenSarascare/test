<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$insert_new_video_nonce = wp_create_nonce('insert_new_video_nonce');
?>
<div id="origincode_origincode_gallery_video_edit_videos" style="display:none;">

    <form method="post" id="form-edit-video" data-gallery-video-id="" data-video-id=""
          data-video-edit-nonce="<?php echo esc_attr($origincode_gallery_video_edit_video_nonce); ?>">
        <h1><?php echo __('Update video', 'gallery-video'); ?></h1>
        <div class="iframe-text-area">
            <iframe class="gallery-video-iframe-area" src="" frameborder="0"
                    allowfullscreen></iframe>
            <textarea rows="4" cols="50" class="video-text-area" disabled>
			</textarea>
            <input type="text" id="edit_video_input" name="edit_video_input" value=""
                   placeholder="New video url"/><br/>
        </div>
        <a class='button-primary set-new-video' data-insert-new-video-nonce="<?php echo esc_attr($insert_new_video_nonce); ?>"><?php echo __('See New Video', 'gallery-video'); ?></a>
        <a class='button-primary edit-video-button'
           id='origincode-edit-video-button'><?php echo __('Insert Video', 'gallery-video'); ?></a>
    </form>
</div>