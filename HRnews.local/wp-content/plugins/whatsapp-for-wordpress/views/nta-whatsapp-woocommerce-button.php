<input type="hidden" name="option_page" value="<?php echo esc_attr($option_group); ?>">
<input type="hidden" name="action" value="update">
<?php wp_nonce_field($option_group . '-options');?>
<p>Use the form below to automatically display buttons on WooCommerce product page.</p>
<table class="form-table">
    <tbody>
        <tr>
            <th scope="row"><label for="nta-wa-switch-control"><?php echo __('Enabled', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <div class="nta-wa-switch-control">
                    <input type="checkbox" id="nta-wa-switch" name="nta_woo_button_status" <?php echo esc_attr(isset($woo_button_setting['nta_woo_button_status']) ? 'checked' : '') ?>>
                    <label for="nta-wa-switch" class="green"></label>
                </div>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="nta_woo_button_position"><?php echo __('Button position', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <select name="nta_woo_button_position" id="nta_woo_button_position">
                    <option value="before_atc" <?php echo esc_attr($woo_button_setting['nta_woo_button_position'] == 'before_atc' ? 'selected' : '') ?>><?php echo __('Before Add to Cart button', 'ninjateam-whatsapp') ?></option>
                    <option value="after_atc" <?php echo esc_attr($woo_button_setting['nta_woo_button_position'] == 'after_atc' ? 'selected' : '') ?>><?php echo __('After Add to Cart button', 'ninjateam-whatsapp') ?></option>
                    <option value="after_short_description" <?php echo esc_attr($woo_button_setting['nta_woo_button_position'] == 'after_short_description' ? 'selected' : '') ?>><?php echo __('After short description', 'ninjateam-whatsapp') ?></option>
                    <option value="after_long_description" <?php echo esc_attr($woo_button_setting['nta_woo_button_position'] == 'after_long_description' ? 'selected' : '') ?>><?php echo __('After long description', 'ninjateam-whatsapp') ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="selected_accounts"><?php echo __('Select accounts to display', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <div class="search-account">
                    <input id="input-users" class="njt-wa-woobutton" type="text" autocomplete="off" placeholder="Search account by enter name or title">
                </div>
                <br/>

                <label class="nta-list-status"><strong><?php echo __('Selected Accounts:', 'ninjateam-whatsapp') ?></strong></label>

                <div class="nta-list-box-accounts postbox" id="sortable">
                    <?php foreach ($account_list_view as $row): ?>
                        <div class="nta-list-items" data-index="<?php echo esc_attr($row['account_id']) ?>" data-position="<?php echo esc_attr($row['wo_position']) ?>">
                            <div class="box-content box-content-woo">
                                <div class="box-row">
                                    <div class="account-avatar">
                                        <?php if (!empty($row['avatar'])): ?>
                                            <div class="wa_img_wrap" style="background: url(<?php echo esc_attr($row['avatar']) ?>) center center no-repeat; background-size: cover;"></div>
                                            <?php
else:
    echo NTA_WHATSAPP_DEFAULT_AVATAR;
    ?>
							                                        <?php endif;?>
                                    </div>
                                    <div class="container-block">
                                        <a href="<?php echo get_edit_post_link($row['account_id']); ?>"><h4><?php echo $row['post_title'] ?></h4></a>
                                        <p><?php echo $row['nta_title'] ?></p>
                                        <p>
                                            <span <?php echo ($row['nta_monday'] == 'checked' ? 'class="active-date"' : '') ?>>Mon</span><span <?php echo ($row['nta_tuesday'] == 'checked' ? 'class="active-date"' : '') ?>>Tue</span><span <?php echo ($row['nta_wednesday'] == 'checked' ? 'class="active-date"' : '') ?>>Wed</span><span <?php echo ($row['nta_thursday'] == 'checked' ? 'class="active-date"' : '') ?>>Thur</span><span <?php echo ($row['nta_friday'] == 'checked' ? 'class="active-date"' : '') ?>>Fri</span><span <?php echo ($row['nta_saturday'] == 'checked' ? 'class="active-date"' : '') ?>>Sar</span><span <?php echo ($row['nta_sunday'] == 'checked' ? 'class="active-date"' : '') ?> >Sun</span>
                                        </p>
                                        <a data-remove="<?php echo esc_attr($row['account_id']) ?>" href="javascrtip:;" class="btn-remove-account">Remove</a>
                                    </div>
                                    <div class="icon-block">
                                        <img src="<?php echo esc_attr(NTA_WHATSAPP_PLUGIN_URL . 'images/bar-sortable.svg') ?>" width="20px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>

            </td>
        </tr>
    </tbody>
</table>
<p><input type="submit" id="submit" class="button button-primary" value="Save WooCommerce Button"></p>

