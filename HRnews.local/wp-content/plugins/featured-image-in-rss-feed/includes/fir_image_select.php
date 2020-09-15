<style>
.form-table.noborder td, .form-table.noborder th{ border:none;}
</style>
<table class="wp-list-table widefat fixed bookmarks">
    <thead>
        <tr>
            <th>Select Image Size For Rss Feed</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
			<form method="post" action="options.php">
			<?php settings_fields( 'fir-settings-group' ); ?>
            <table class="form-table noborder">
                <tr valign="top">
                    <th scope="row">Image Size</th>
                    <td>
                        
                        <?php $image_sizes = get_intermediate_image_sizes(); ?>
                        <select name="fir_rss_image_size">
                          <?php foreach ($image_sizes as $size_name => $size_attrs): var_dump($size_attrs);?>
                            <option value="<?php echo $size_attrs ?>" <?php echo $fir_rss_image_size == $size_attrs?'selected="selected"':''; ?>><?php echo ucwords(str_replace(array('-','_'),' ',$size_attrs)); ?></option>                    
                          <?php endforeach; ?>
                          <option value="full" <?php echo $fir_rss_image_size == 'full'?'selected="selected"':''; ?>>Full Size</option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">&nbsp;</th>
                    <td bordercolor="red">
                        <input type="submit" name="submit-bpu" class="button-primary" value="<?php _e('Save Changes') ?>" />
                    </td>
                </tr>
               
            </table>
        </form><br />

            
</td>
</tr>
</tbody>
</table><br/>