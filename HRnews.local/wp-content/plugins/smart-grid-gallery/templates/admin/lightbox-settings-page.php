<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$lightbox_options_nonce = wp_create_nonce( 'origincode_gallery_nonce_save_lightbox_options' );
$origincode_gallery_video_get_option=origincode_gallery_video_get_default_general_options();
?>
<div class="wrap post-body-content">
	<?php require(ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'banner-head.php');?>
    <div id="general-options-post-body-heading">
        <h2>Lightbox Options</h2>
        <a onclick="document.getElementById('adminForm').submit()" class="save-videogallery-options"><?php echo __( 'Save Options', 'gallery-video' ); ?></a>
    </div>

    <div style="" id="poststuff">

        <form   action="admin.php?page=Options_video_gallery_lightbox_styles&task=save&origincode_gallery_nonce_save_lightbox_options=<?php echo esc_attr($lightbox_options_nonce); ?>"
                method="post" id="adminForm" name="adminForm">
            <p class="pro_info">
		        <?php _e('These features are available in the Professional version of the plugin only.', 'gallery-video' ); ?>
                <a href="https://origincode.co/downloads/video-gallery/" target="_blank" class=""><?php _e('GET THE FULL VERSION', 'gallery-video');?></a>
            </p>
            <ul id="lightbox_type">
                <li class="">
                    <label for="new_type" class="<?php if ( get_option('origincode_gallery_video_lightbox_type') == 'new_type' ) {
	                    echo "active";
                    } ?>"><?php _e('New Type', 'gallery-video');?>
                        <input type="checkbox" name="params[origincode_gallery_video_lightbox_type]"
                               id="new_type" <?php if ( get_option('origincode_gallery_video_lightbox_type') == 'new_type' ) {
                            echo 'checked';
                        } ?>
                               value="new_type">
                    </label>
                </li>
                <li class="">
                    <label for="old_type" class="<?php if ( get_option('origincode_gallery_video_lightbox_type') == 'old_type' ) {
	                    echo "active";
                    } ?>"><?php _e('Old Type', 'gallery-video');?>
                        <input type="checkbox" name="params[origincode_gallery_video_lightbox_type]"
                               id="old_type" <?php if ( get_option('origincode_gallery_video_lightbox_type') == 'old_type' ) {
                            echo 'checked';
                        } ?>
                               value="old_type">
                    </label>
                </li>
            </ul>
            <div id="lightbox-options-list"
                 class="unique-type-options-wrapper <?php if ( get_option('origincode_gallery_video_lightbox_type') == 'old_type' ) {
                     echo "active";
                 } ?>">
                <div class="gallery_options_grey_overlay"></div>
                <img style="width: 100%;" src="<?php echo esc_attr(ORIGINCODE_GALLERY_VIDEO_IMAGES_URL.'/admin_images/lightbox_opt.png');?>">
            </div>
            <div id="new-lightbox-options-list"
                 class="unique-type-options-wrapper <?php if ( get_option('origincode_gallery_video_lightbox_type') == 'new_type' ) {
                     echo "active";
                 } ?>">
                <div class="gallery_options_grey_overlay"></div>
                <div class="lightbox-options-block">
                    <h3>General Options</h3>
                    <div class="has-background">
                        <label for="origincode_gallery_video_lightbox_lightboxView"><?php _e('Lightbox style', 'gallery-video');?>
                            <div class="help">?
                                <div class="help-block">
                                    <span class="pnt"></span>
                                    <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                                </div>
                            </div>
                        </label>
                        <select id="origincode_gallery_video_lightbox_lightboxView" name="params[origincode_gallery_video_lightbox_lightboxView]">
                            <option <?php selected( 'view1', get_option('origincode_gallery_video_lightbox_lightboxView') ); ?>
                                    value="view1">1
                            </option>
                            <option <?php selected( 'view2', get_option('origincode_gallery_video_lightbox_lightboxView') ); ?>
                                    value="view2">2
                            </option>
                            <option <?php selected( 'view3', get_option('origincode_gallery_video_lightbox_lightboxView') ); ?>
                                    value="view3">3
                            </option>
                            <option <?php selected( 'view4', get_option('origincode_gallery_video_lightbox_lightboxView') ); ?>
                                    value="view4">4
                            </option>
                            <option <?php selected( 'view5', get_option('origincode_gallery_video_lightbox_lightboxView') ); ?>
                                    value="view5">5
                            </option>
                            <option <?php selected( 'view6', get_option('origincode_gallery_video_lightbox_lightboxView') ); ?>
                                    value="view6">6
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="origincode_gallery_video_lightbox_speed_new"><?php _e('Lightbox open speed', 'gallery-video');?>
                            <div class="help">?
                                <div class="help-block">
                                    <span class="pnt"></span>
                                    <p><?php _e('Set lightbox opening speed', 'gallery-video');?></p>
                                </div>
                            </div>
                        </label>
                        <input type="number" name="params[origincode_gallery_video_lightbox_speed_new]" id="origincode_gallery_video_lightbox_speed_new"
                               value="<?php echo get_option('origincode_gallery_video_lightbox_speed_new'); ?>"
                               class="text">
                        <span>ms</span>
                    </div>
                    <div class="has-background">
                        <label for="origincode_gallery_video_lightbox_overlayClose_new"><?php _e('Overlay close', 'gallery-video');?>
                            <div class="help">?
                                <div class="help-block">
                                    <span class="pnt"></span>
                                    <p><?php _e('Check to enable close by Esc key.', 'gallery-video');?></p>
                                </div>
                            </div>
                        </label>
                        <input type="hidden" value="false" name="params[origincode_gallery_video_lightbox_overlayClose_new]"/>
                        <input type="checkbox"
                               id="origincode_gallery_video_lightbox_overlayClose_new" <?php if ( get_option('origincode_gallery_video_lightbox_overlayClose_new') == 'true' ) {
                            echo 'checked="checked"';
                        } ?> name="params[origincode_gallery_video_lightbox_overlayClose_new]" value="true"/>
                    </div>
                    <div>
                        <label for="origincode_gallery_video_lightbox_style"><?php _e('Loop content', 'gallery-video');?>
                            <div class="help">?
                                <div class="help-block">
                                    <span class="pnt"></span>
                                    <p><?php _e('Check to enable repeating images after one cycle.', 'gallery-video');?></p>
                                </div>
                            </div>
                        </label>
                        <input type="hidden" value="false" name="params[origincode_gallery_video_lightbox_loop_new]"/>
                        <input type="checkbox"
                               id="origincode_gallery_video_lightbox_loop_new" <?php if ( get_option('origincode_gallery_video_lightbox_loop_new') == 'true' ) {
                            echo 'checked="checked"';
                        } ?> name="params[origincode_gallery_video_lightbox_loop_new]" value="true"/>
                    </div>
                </div>
        </form>
        <div class="lightbox-options-block" >
            <h3>Advanced Options</h3>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_style"><?php _e('EscKey close', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="checkbox"
                       id="origincode_gallery_video_lightbox_escKey_new"/>
            </div>
            <div>
                <label for="origincode_gallery_video_lightbox_keyPress_new"><?php _e('Keyboard navigation', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="checkbox"
                       id="origincode_gallery_video_lightbox_keyPress_new"/>
            </div>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_arrows"><?php _e('Show Arrows', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="checkbox"
                       id="origincode_gallery_video_lightbox_arrows" checked/>
            </div>
            <div>
                <label for="origincode_gallery_video_lightbox_mouseWheel"><?php _e('Mouse Wheel Navigaion', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="checkbox"
                       id="origincode_gallery_video_lightbox_mouseWheel" />
            </div>

            <div>
                <label for="origincode_gallery_video_lightbox_showCounter"><?php _e('Show Counter', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="checkbox"
                       id="origincode_gallery_video_lightbox_showCounter" />
            </div>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_sequence_info"><?php _e('Sequence Info text', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="text"
                       style="width: 13%"
                       value="image"
                       class="text">
                X <input type="text"
                         style="width: 13%"
                         value="of"
                         class="text">
                XX
            </div>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_slideAnimationType"><?php _e('Transition type', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <select id="origincode_gallery_video_lightbox_slideAnimationType" >
                    <option <?php selected( 'effect_1', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_1">Effect 1
                    </option>
                    <option <?php selected( 'effect_2', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_2">Effect 2
                    </option>
                    <option <?php selected( 'effect_3', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_3">Effect 3
                    </option>
                    <option <?php selected( 'effect_4', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_4">Effect 4
                    </option>
                    <option <?php selected( 'effect_5', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_5">Effect 5
                    </option>
                    <option <?php selected( 'effect_6', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_6">Effect 6
                    </option>
                    <option <?php selected( 'effect_7', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_7">Effect 7
                    </option>
                    <option <?php selected( 'effect_8', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_8">Effect 8
                    </option>
                    <option <?php selected( 'effect_9', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'] ); ?>
                            value="effect_9">Effect 9
                    </option>
                </select>
            </div>
        </div>

        <div class="lightbox-options-block" >
            <h3>Dimensions</h3>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_width_new"><?php _e('Lightbox Width', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Set the width of the popup in percentages.', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="number"
                       value="<?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_lightbox_width_new']); ?>"
                       class="text">
                <span>%</span>
            </div>
            <div>
                <label for="origincode_gallery_video_lightbox_height_new"><?php _e('Lightbox Height', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Set the height of the popup in percentages.', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="number"
                       value="<?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_lightbox_height_new']); ?>"
                       class="text">
                <span>%</span>
            </div>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_videoMaxWidth"><?php _e('Lightbox Video maximum width', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Set the maximum width of the popup in pixels, the height will be fixed automatically.', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="number"
                       value="<?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_lightbox_videoMaxWidth']); ?>"
                       class="text">
                <span>px</span>
            </div>
        </div>
        <div class="lightbox-options-block" >
            <h3>Slideshow</h3>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_slideshow_new"><?php _e('Slideshow', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Set the width of popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="hidden" value="false" name="params[origincode_gallery_video_lightbox_slideshow_new]"/>
                <input type="checkbox"
                       id="origincode_gallery_video_lightbox_slideshow_new" name="params[origincode_gallery_video_lightbox_slideshow_new]" value="true"/>
            </div>
            <div>
                <label for="origincode_gallery_video_lightbox_slideshow_auto_new"><?php _e('Slideshow auto start', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Set the width of popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="hidden" value="false" name="params[origincode_gallery_video_lightbox_slideshow_auto_new]"/>
                <input type="checkbox"
                       id="origincode_gallery_video_lightbox_slideshow_auto_new" name="params[origincode_gallery_video_lightbox_slideshow_auto_new]" value="true"/>
            </div>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_slideshow_speed_new"><?php _e('Slideshow interval', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Set the height of popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="number" name="params[origincode_gallery_video_lightbox_slideshow_speed_new]"
                       id="origincode_gallery_video_lightbox_slideshow_speed_new"
                       value="<?php echo esc_attr($origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideshow_speed_new']); ?>"
                       class="text">
                <span>ms</span>
            </div>
        </div>

        <div class="lightbox-options-block" >
            <h3><?php _e('Social Share Buttons', 'gallery-video');?></h3>
            <div class="has-background">
                <label for="origincode_gallery_video_lightbox_socialSharing"><?php _e('Social Share Buttons', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Set the width of popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <input type="checkbox"  id="origincode_gallery_video_lightbox_socialSharing"  />
            </div>
            <div class="social-buttons-list">
                <label><?php _e('Social Share Buttons List', 'gallery-video');?>
                    <div class="help">?
                        <div class="help-block">
                            <span class="pnt"></span>
                            <p><?php _e('Choose the style of your popup', 'gallery-video');?></p>
                        </div>
                    </div>
                </label>
                <div>
                    <table>
                        <tr>
                            <td>
                                <label for="origincode_gallery_video_lightbox_facebookButton">Facebook
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_facebookButton" checked="checked"

                                    value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_twitterButton">Twitter
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_twitterButton"  checked="checked"  value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_googleplusButton">Google Plus
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_googleplusButton"  value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_pinterestButton">Pinterest
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_pinterestButton" value="true"/></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="origincode_gallery_video_lightbox_linkedinButton">Linkedin
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_linkedinButton" checked="checked" value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_tumblrButton">Tumblr
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_tumblrButton"  value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_redditButton">Reddit
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_redditButton" checked="checked" value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_bufferButton">Buffer
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_bufferButton"  value="true"/></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="origincode_gallery_video_lightbox_vkButton">Vkontakte
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_vkButton" checked="checked" value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_yummlyButton">Yumly
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_yummlyButton"  value="true"/></label>
                            </td>
                            <td>
                                <label for="origincode_gallery_video_lightbox_diggButton">Digg
                                    <input type="checkbox"
                                           id="origincode_gallery_video_lightbox_diggButton"  value="true"/></label>
                            </td>
                            <td>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>
