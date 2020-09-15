<table class="form-table">
    <p><?php echo __('This styling applies only to the shortcode buttons for this account. Leave blank to use the <a href="admin.php?page=nta_whatsapp">default styles set on the settings page', 'ninjateam-whatsapp') ?></a></p>
    <tbody>
        <tr>
            <th scope="row"><label for="button_style"><?php echo __('Button Style', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <div class="setting align">
                    <div class="button-group button-large" data-setting="align">
                        <button class="button btn-round <?php echo ($buttonStyle['button_style'] == 'round' ? 'active' : '') ?>" value="round" type="button">
                            <?php echo __('Round', 'ninjateam-whatsapp') ?>
                        </button>
                        <button class="button btn-square <?php echo ($buttonStyle['button_style'] == 'square' ? 'active' : '') ?>" value="square" type="button">
                            <?php echo __('Square', 'ninjateam-whatsapp') ?>
                        </button>
                    </div>
                    <input name="button_style" id="nta_button_style" class="hidden" value="<?php echo esc_attr($buttonStyle['button_style']) ?>" />
                </div>
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="button_back_color"><?php echo __('Button Background Color', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <input type="text" id="button_back_color" name="button_back_color" value="<?php echo esc_attr($buttonStyle['button_back_color']) ?>" class="widget-background-color" data-default-color="#2DB742" />
            </td>
        </tr>

        <tr>
            <th scope="row"><label for="button_text_color"><?php echo __('Button Text Color', 'ninjateam-whatsapp') ?></label></th>
            <td>
                <input type="text" id="button_text_color" name="button_text_color" value="<?php echo esc_attr($buttonStyle['button_text_color']) ?>" class="widget-background-color" data-default-color="#fff" />
            </td>
        </tr>
    </tbody>
</table>