<form name="post" method="post" action="options.php" id="post" autocomplete="off">
    <input type="hidden" name="option_page" value="<?php echo esc_attr($option_group); ?>">
    <input type="hidden" name="action" value="update">
    <?php wp_nonce_field($option_group . '-options');?>
    <table class="form-table">
        <p><?php echo __('Setting text and style for the floating widget.', 'ninjateam-whatsapp') ?></p>
        <tbody>
            <tr>
                <th scope="row"><label for="nta-wa-switch-control"><?php echo __('Show on desktop', 'ninjateam-whatsapp') ?></label></th>
                <td>
                    <div class="nta-wa-switch-control">
                        <input type="checkbox" id="nta-wa-switch" name="show_on_desktop" <?php echo (isset($option['show_on_desktop']) ? 'checked' : '') ?>>
                        <label for="nta-wa-switch" class="green"></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="nta-wa-switch-control"><?php echo __('Show on mobile', 'ninjateam-whatsapp') ?></label></th>
                <td>
                    <div class="nta-wa-switch-control">
                        <input type="checkbox" id="nta-wa-switch-mb" name="show_on_mobile" <?php echo (isset($option['show_on_mobile']) ? 'checked' : '') ?>>
                        <label for="nta-wa-switch-mb" class="green"></label>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="whatsapp_name"><?php echo __('Widget Text', 'ninjateam-whatsapp') ?></label></th>
                <td><input name="widget_name" placeholder="Start a Conversation" type="text" id="whatsapp_name" value="<?php echo esc_attr($option['widget_name']) ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="whatsapp_label"><?php echo __('Widget Label', 'ninjateam-whatsapp') ?></label></th>
                <td><input name="widget_label" placeholder="Need Help? <strong>Chat with us</strong>" type="text" id="whatsapp_label" value="<?php echo esc_attr($option['widget_label']) ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="whatsapp_responseText"><?php echo __('Response Time Text', 'ninjateam-whatsapp') ?></label></th>
                <td><input name="widget_responseText" placeholder="The team typically replies in a few minutes." type="text" id="whatsapp_responseText" value="<?php echo esc_attr($option['widget_responseText']) ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="text_color"><?php echo __('Widget Text Color', 'ninjateam-whatsapp') ?></label></th>
                <td><input type="text" id="text_color" name="text_color" value="<?php echo esc_attr($option['text_color']) ?>" class="widget-text-color" data-default-color="#fff" /></td>
            </tr>

            <tr>
                <th scope="row"><label for="back_color"><?php echo __('Widget Background Color', 'ninjateam-whatsapp') ?></label></th>
                <td><input id="back_color" type="text" name="back_color" value="<?php echo esc_attr($option['back_color']) ?>" class="widget-background-color" data-default-color="#2db742" /></td>
            </tr>

            <tr>
                <th scope="row"><label for=""><?php echo __('Widget Position', 'ninjateam-whatsapp') ?></label></th>
                <td>
                    <div class="setting align">
                        <div class="button-group button-large" data-setting="align">
                            <button class="button btn-left <?php echo ($option['widget_position'] == 'left' ? 'active' : '') ?>" value="left" type="button">
                                <?php echo __('Left', 'ninjateam-whatsapp') ?>
                            </button>
                            <button class="button btn-right <?php echo ($option['widget_position'] == 'right' ? 'active' : '') ?>" value="right" type="button">
                                <?php echo __('Right', 'ninjateam-whatsapp') ?>
                            </button>
                        </div>
                        <input name="widget_position" id="widget_position" class="hidden" value="<?php echo esc_attr($option['widget_position']) ?>" />
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="widget_description"><?php echo __('Description', 'ninjateam-whatsapp') ?></label></th>
                <td>
                    <?php
                        $settings = array(
                            'media_buttons' => false,
                            'textarea_rows' => get_option('default_post_edit_rows', 5),
                            'quicktags' => false,
                            'teeny' => true,
                        );
                        wp_editor($option['widget_description'], 'widget_description', $settings);
                    ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="widget_gdpr"><?php echo __('GDPR Notice', 'ninjateam-whatsapp') ?></label></th>
                <td>
                    <div class="nta-wa-switch-control" style="margin-top: 5px;">
                        <input type="checkbox" id="nta-wa-switch-gdpr" name="show_gdpr" <?php echo (isset($option['show_gdpr']) ? 'checked' : '') ?>>
                        <label for="nta-wa-switch-gdpr" class="green"></label>
                    </div>
                    <br/>
                    <div id="nta-gdpr-editor" class="<?php echo (isset($option['show_gdpr']) ? '' : 'hidden') ?>">
                        <?php
                            wp_editor($option['widget_gdpr'], 'widget_gdpr', $settings);
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="widget_display_pages"><?php echo __('Display', 'ninjateam-whatsapp') ?></label></th>
                <td>
                    <?php $display = $option['display-pages']?>
		            <select name="nta-wa-display-pages" id="ninja-wa-display-pages">
		                <option <?php echo ($display == 'hide' ? 'selected' : '') ?> value="hide"><?php echo __("Display all pages but except", "ninjateam-whatsapp") ?></option>
		                <option <?php echo ($display == 'show' ? 'selected' : '')?> value="show"><?php echo __("Display for pages...", "ninjateam-whatsapp") ?></option>
                    </select> 
                    <p class="description">Select type you want to display Whatsapp Widget (If it does not display in WooCommerce pages, please make sure you selected 'Display all pages but except' option)</p>
		        </td>
            </tr>
                <th scope="row">
                    <label for="widget_show_on_pages">
                    <?php echo __('Select pages', 'ninjateam-whatsapp') ?>
                    </label>
                </th>
                <td class="nta-wa-pages-content hide-page <?php echo esc_attr($option['display-pages'] == 'show' ? 'hide-select' : '') ?>">
                    <input type="checkbox" id="nta-wa-pages-checkall-hide" />
                        <label for="nta-wa-pages-checkall">All</label>
		                    <ul id="nta-wa-display-pages-list">
		                        <?php 
                                    $array_hide = $option['nta-wa-hide-pages'];
                                    if (!$array_hide) {
                                        $array_hide = array();
                                    }
                                    while ($get_pages_query->have_posts()): $get_pages_query->the_post();
                                        ?>
	                                    <li>
	                                        <input <?php if (in_array(get_the_ID(), $array_hide)) {echo 'checked="checked"';}?>
                                                name="nta-wa-hide-pages[]"
                                                class="nta-wa-hide-pages"
	                                            type="checkbox" value="<?php esc_attr(the_ID())?>"
	                                            id="nta-wa-hide-page-<?php esc_attr(the_ID())?>" />
	                                            <label for="nta-wa-hide-page-<?php esc_attr(the_ID())?>"><?php esc_html(the_title())?></label>
	                                        </li>
			                            <?php
                                    endwhile;
                            wp_reset_postdata();
                        ?>
		            </ul>
		        </td>

                <td class="nta-wa-pages-content show-page <?php echo esc_attr($option['display-pages'] == 'hide' ? 'hide-select' : '') ?>">
                    <input type="checkbox" id="nta-wa-pages-checkall-show" />
                        <label for="nta-wa-pages-checkall">All</label>
		                    <ul id="nta-wa-display-pages-list">
		                        <?php 
                                    $array_show = $option['nta-wa-show-pages'];
                                    if (!$array_show) {
                                        $array_show = array();
                                    }
                                    while ($get_pages_query->have_posts()): $get_pages_query->the_post();
                                        ?>
	                                    <li>
	                                        <input <?php if (in_array(get_the_ID(), $array_show)) {echo 'checked="checked"';}?>
	                                            name="nta-wa-show-pages[]"
                                                class="nta-wa-show-pages"
                                                type="checkbox" value="<?php esc_attr(the_ID())?>"
	                                            id="nta-wa-show-page-<?php esc_attr(the_ID())?>" />
	                                            <label for="nta-wa-show-page-<?php esc_attr(the_ID())?>"><?php esc_html(the_title())?></label>
	                                    </li>
			                            <?php
                                    endwhile;   
                            wp_reset_postdata();
                        ?>
		            </ul>
		        </td>
            </tr>
        </tbody>
    </table>
    <button class="button button-primary button-large" id="btnSave" type="submit"><?php echo __('Save Display Settings', 'ninjateam-whatsapp') ?></button>
</form>

