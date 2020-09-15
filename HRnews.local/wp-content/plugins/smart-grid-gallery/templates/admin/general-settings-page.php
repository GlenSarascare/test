<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap">
	<?php require(ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'banner-head.php');?>

	<div style="clear: both;"></div>
	<div id="poststuff">
		<?php $path_site = ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images'; ?>
		<div id="post-body-content" class="videogallery-options">
            <div id="general-options-post-body-heading">
                <h2>General Options</h2>
                <a href="#" class="save-videogallery-options">Save Options</a>
            </div>
			<form action="admin.php?page=Options_video_gallery_styles&task=save" method="post" id="adminForm" name="adminForm">
                <p class="pro_info">
					<?php echo __('These features are available in the Professional version of the plugin only.', 'gallery-video'); ?>
                    <a href="https://origincode.co/downloads/video-gallery/" target="_blank" class=""><?php _e('GET THE FULL VERSION', 'gallery-video');?></a>
                </p>
				<div id="videogallery-options-list">
					<ul id="videogallery-view-tabs">
						<li><a href="#videogallery-view-options-0"><?php _e('Video Gallery/Content-Popup', 'gallery-video');?></a></li>
						<li><a href="#videogallery-view-options-1"><?php _e('Content Video Slider', 'gallery-video');?></a></li>
						<li><a href="#videogallery-view-options-2"><?php _e('Lightbox-Video Gallery', 'gallery-video');?></a></li>
						<li><a href="#videogallery-view-options-3"><?php _e('Video Slider', 'gallery-video');?></a></li>
						<li><a href="#videogallery-view-options-4"><?php _e('Thumbnails', 'gallery-video');?></a></li>
						<li><a href="#videogallery-view-options-5"><?php _e('Justified', 'gallery-video');?></a></li>
						<li><a href="#videogallery-view-options-6"><?php _e('Blog Style Gallery', 'gallery-video');?></a></li>
                        <li><a href="#videogallery-view-options-7"><?php _e('Playlist', 'gallery-video');?></a></li>
					</ul>
					<ul class="options-block" id="videogallery-view-tabs-contents">
						<div class="gallery_options_grey_overlay"></div>
						<li id="videogallery-view-options-0" class="active">
							<img style="width: 100%;" src='<?php echo esc_url($path_site); ?>/Content popup tab1.png' >
						</li>
						<li id="videogallery-view-options-1">
							<img style="width: 100%;" src='<?php echo esc_url($path_site); ?>/Content-Video-slider-tab2.png' >
						</li>
						<li id="videogallery-view-options-2">
							<img style="width: 100%;" src='<?php echo esc_url($path_site); ?>/lightbox-tab3.png' >
						</li>
						<li id="videogallery-view-options-3">
							<img style="width: 100%;" src='<?php echo esc_url($path_site); ?>/slider--tab4.png' >
						</li>
						<li id="videogallery-view-options-4">
							<img style="width: 100%;" src='<?php echo esc_url($path_site); ?>/thumbnails-tab5.png' >
						</li>
						<li id="videogallery-view-options-5">
							<img style="width: 100%;" src='<?php echo esc_url($path_site); ?>/justified-tab6.png' >
						</li>
						<li id="videogallery-view-options-6">
							<img style="width: 100%;" src='<?php echo esc_url($path_site); ?>/blockstyle-tab7.png' >
						</li>

                        <li id="videogallery-view-options-7">
                            <div class="playlist_option_cont">
                                <div>
                                    <h3><?php _e('Playlist Container', 'gallery-video'); ?></h3>
                                    <div class="has-background">
                                        <label for="origincode_gallery_video_ht_view10_container_width"><?php _e('Container Width', 'gallery-video'); ?></label>
                                        <input type="number" name="param"
                                               id="origincode_gallery_video_ht_view10_container_width"
                                               value="650"
                                               class="text" min="220">
                                        <span>px</span>
                                    </div>
                                    <div>
                                        <label for="origincode_gallery_video_ht_view10_thumb_scroll"><?php _e('Playlist Scroll', 'gallery-video'); ?></label>
                                        <select id="origincode_gallery_video_ht_view10_thumb_scroll" name="para">
                                            <option  value="on">on</option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="origincode_gallery_video_ht_view10_thumb_position"><?php _e('Playlist Position', 'gallery-video'); ?></label>
                                        <select id="origincode_gallery_video_ht_view10_thumb_position" name="para">
                                            <option  value="left">right</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="origincode_gallery_video_ht_view10_search"><?php _e('Search', 'gallery-video'); ?></label>
                                        <select id="origincode_gallery_video_ht_view10_search" name="param">
                                            <option  value="on">off</option>
                                        </select>
                                    </div>
                                    <div class="has-background">
                                        <label for="origincode_gallery_video_ht_view10_search_criteria"><?php _e('Search By', 'gallery-video'); ?></label>
                                        <select id="origincode_gallery_video_ht_view10_search_criteria" name="param">
                                            <option value="both">both</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="lightbox-options-block" >
                                    <h3><?php _e('Social Share Buttons', 'gallery-video');?></h3>

                                    <div class="has-background social-buttons-list">
                                        <label><?php _e('Social Share Buttons List', 'gallery-video');?>
                                            <div class="help">?
                                                <div class="help-block">
                                                    <span class="pnt"></span>
                                                    <p><?php _e('Check to activate your preferable ones.', 'gallery-video');?></p>
                                                </div>
                                            </div>
                                        </label>
                                        <div>
                                            <table width="100%">
                                                <tr>
                                                    <td>
                                                        <label for="origincode_gallery_video_playlist_facebookButton">Facebook
                                                            <input type="hidden" value="false" name="param" />
                                                            <input type="checkbox" id="origincode_gallery_video_playlist_facebookButton" name="params[origincode_gallery_video_playlist_facebookButton]" value="true"/></label>
                                                    </td>
                                                    <td>
                                                        <label for="origincode_gallery_video_playlist_twitterButton">Twitter
                                                            <input type="hidden" value="false" name="params[origincode_gallery_video_playlist_twitterButton]" />
                                                            <input type="checkbox"
                                                                   id="origincode_gallery_video_playlist_twitterButton" name="param" value="true"/></label>
                                                    </td>
                                                    <td>
                                                        <label for="origincode_gallery_video_playlist_googleplusButton">Google Plus
                                                            <input type="hidden" value="false" name="param" />
                                                            <input type="checkbox"
                                                                   id="origincode_gallery_video_playlist_googleplusButton" name="param" value="true"/></label>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </li>
					</ul>
			</form>
		</div>
	</div>
</div>
</div>
<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>