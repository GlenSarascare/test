<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
	global $rfw_pro, $rfw_data, $rfw_chameleon_installed, $rfw_chameleon_activated, $rfw_premium_link;

	$rfw_rss_image_size = get_option('rfw_rss_image_size', 'thumbnail');	
	$rfw_mutes = get_option('rfw_mutes', '');
	$rfw_sc_ids = get_option('rfw_sc_ids', '');
	
	
?>	
<style type="text/css">
.form-table.noborder td, .form-table.noborder th{ border:none;}
.notice-warning, .update-nag{ display:none; }
.rfw-esettings{
	
}
.rfw-esettings a.nav-tab{
	cursor:pointer;
}
.rfw-esettings > .ecolumns{
	width:50%;
	float:left;
	
}
.rfw-esettings > .ecolumns th{
	text-align:center;
}
.rfw-esettings > .ecolumns th h5{
	text-align:left;
	margin:0 0 10px 0;
	font-size:14px;
}
.rfw-esettings > .ecolumns th pre {
	
	margin: 0;
	background-color: rgba(255,255,0,0.4);
	padding: 6px 20px;
	border-radius: 12px;
	white-space: pre-wrap;
}
</style>
<div class="wrap rfw-esettings">
<h2><?php echo $rfw_data['Name'].' ('.$rfw_data['Version'].($rfw_pro?') Pro':')').''; ?> - <?php _e('Settings'); ?></h2><br/>





<h2 class="nav-tab-wrapper">
    <a class="nav-tab nav-tab-active"><?php _e("Instructions","rss-feed-widget"); ?></a>    
    <a class="nav-tab"><?php _e("Appearance","rss-feed-widget"); ?></a>    
    <a class="nav-tab"><?php _e("Filters","rss-feed-widget"); ?></a>
    <a class="nav-tab"><?php _e("Image Size","rss-feed-widget"); ?></a>
    <a class="nav-tab"><?php _e("Shortcodes","rss-feed-widget"); ?></a>
    <a class="nav-tab"><?php _e("Advanced Settings","rss-feed-widget"); ?></a>
</h2>

<form class="nav-tab-content" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<input type="hidden" name="rfw_tn" value="<?php echo esc_attr($_GET['t']); ?>" />

<table>
	<tr>
    	<td valign="top">          
        
        <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th><h5><?php _e('Instructions'); ?></h5></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                    	<ol>
                        	<li><?php _e('Select image size which you want to use in your rss feeds.'); ?></li>
                            
                            <li><?php _e('Save Changes'); ?></li>

							<li><?php _e("That's it."); ?></li>
                            
                            <li>If you still have any query visit my <a href="<?php echo $rfw_data['PluginURI']; ?>" target="_blank">website</a> and contact me.</li>
                            
                        </ol>
                        
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            
            <br/>
        
        </td>
    </tr>
</table>
</form>

<form class="nav-tab-content hide" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<input type="hidden" name="rfw_tn" value="<?php echo esc_attr($_GET['t']); ?>" />
<?php wp_nonce_field( 'rfw_styles_act', 'rfw_styles' ); ?>
<table width="100%">
	<tr>
    	<td valign="top">          
        
        <table class="wp-list-table widefat fixed styles">
            	<thead>
                <tr>
                	<th><h5><?php _e('Styles'); ?></h5></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                    
                    <?php 
						if($rfw_chameleon_installed){
							if($rfw_chameleon_activated){
								
								global $wpc_assets_loaded, $wpc_dir, $wpc_url;
								$styles = array();
								
								
						
					?>								
                    	
                        
                        
                        <?php
						if(!empty($wpc_assets_loaded) && array_key_exists('rfw', $wpc_assets_loaded) && !empty($wpc_assets_loaded['rfw'])){
							$rfw_style = get_option('rfw_style');
						?>
                        <input type="hidden" name="rfw_style" value="<?php echo $rfw_style; ?>" />
                        <ul>
                        <?php
							foreach($wpc_assets_loaded['rfw'] as $name=>$data){
						?>
                        	<li <?php echo ($rfw_style==$name?'class="selected"':''); ?> title="<?php echo $name; ?>" data-id="<?php echo $name; ?>"><img src="<?php echo str_replace($wpc_dir, $wpc_url, $data['images']['screenshot']); ?>" alt="<?php echo $name; ?>" /><span><?php echo ucwords($name); ?></span></li>
								
						<?php
                            }
						?>
                        </ul>
                        <div style="float:left; width:100%;">
                        <input type="submit" value="Apply Style" class="button-primary" />
                        </div>
                        
                        <?php
						}else{
						?>
                        <?php _e('No styles found.'); ?>
						<?php							
						}
						?>
                    	
                        	
                            
                       
					<?php
							}else{
					?>
                    		Wow, you have installed <a href="https://downloads.wordpress.org/plugin/chameleon.zip" target="_blank">Chameleon</a> already. <a href="plugins.php?s=chameleon&plugin_status=inactive" target="_blank">Click here</a> to activate styles for <?php echo $rfw_data['Name']; ?>.
                    <?php								
							}
						}else{
					?>
                    		Good news, now you can install <a href="https://downloads.wordpress.org/plugin/chameleon.zip" target="_blank">Chameleon</a> to get awesome styles for for <?php echo $rfw_data['Name']; ?>.
                    <?php								
						}
					?>						
                   
                        
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            
            <br/>
        
        </td>
    </tr>
</table>

 </form>


<form class="nav-tab-content hide" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<input type="hidden" name="rfw_tn" value="<?php echo esc_attr($_GET['t']); ?>" />
<?php wp_nonce_field( 'rfw_mutes_action', 'rfw_mutes_field' ); ?>
<table width="100%">
	<tr>
    	<td valign="top">          
        
        <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th><h5><?php _e('Filter RSS Feeds'); ?></h5></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                    
                    	
                    	<textarea name="rfw_mutes" style="width:100%; height:200px"><?php echo $rfw_mutes; ?></textarea>
                        <br />
						<p><?php _e('Enter text/words/sentences which you want to filter or mute. One per line.'); ?></p>
                    
					

                        <input type="submit" name="submit-bpu" class="button-primary" value="<?php _e('Save Changes') ?>" />
                    
                        
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            
            <br/>
        
        </td>
    </tr>
</table>

</form>


<form class="nav-tab-content hide" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<input type="hidden" name="rfw_tn" value="<?php echo esc_attr($_GET['t']); ?>" />
<?php wp_nonce_field( 'rfw_settings_action', 'rfw_settings_field' ); ?>
<table width="100%">
	<tr>
    	<td valign="top">          
<table class="wp-list-table widefat fixed bookmarks">
    <thead>
        <tr>
            <th><h5><?php _e('Select Image Size For Rss Feed'); ?></h5></th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
			
			<?php settings_fields( 'rfw_settings_group' ); ?>
            <table class="form-table noborder">
                <tr valign="top">
                    <th scope="row"><?php _e('Image Size'); ?></th>
                    <td>
                        
                        <?php $image_sizes = get_intermediate_image_sizes(); ?>
                        <select name="rfw_rss_image_size">
                          <?php foreach ($image_sizes as $size_name => $size_attrs): //var_dump($size_attrs);?>
                            <option value="<?php echo $size_attrs ?>" <?php echo $rfw_rss_image_size == $size_attrs?'selected="selected"':''; ?>><?php echo ucwords(str_replace(array('-','_'),' ',$size_attrs)); ?></option>                    
                          <?php endforeach; ?>
                          <option value="full" <?php echo $rfw_rss_image_size == 'full'?'selected="selected"':''; ?>><?php _e('Full Size'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">&nbsp;</th>
                    <td bordercolor="red">
                        <input type="submit" name="submit-bpu" class="button-primary" value="<?php _e('Save Changes') ?>" />
                    </td>
                </tr>
               
            </table><br />
<br />

            <p><?php echo $rfw_data['Description']; ?></p>
        <br />

            
</td>

</tr>
</tbody>
</table>
</td>
    </tr>
</table>

</form>



<form class="nav-tab-content hide" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<input type="hidden" name="rfw_tn" value="<?php echo esc_attr($_GET['t']); ?>" />
<?php wp_nonce_field( 'rfw_sc_action', 'rfw_sc_field' ); ?>
<table width="100%">
	<tr>
    	<td valign="top">          
        
        <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th><h5><?php _e('Create Shortcode Based Page'); ?></h5> <pre>[rfw-youtube-videos height=&quot;300px&quot; width=&quot;32%&quot; bgcolor=&quot;black&quot; fullscreen=&quot;false&quot; margin=&quot;1px 1px 1px 1px&quot;]</pre></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                   
                    	
                    	<textarea name="rfw_sc_ids" style="width:100%; height:200px"><?php echo $rfw_sc_ids; ?></textarea>
                        <br />
						<p><?php _e('Enter Youtube Video/Channel URL or ID'); ?>. <?php _e('One per line'); ?>.</p>
                    
					

                        <input type="submit" name="submit-bpu" class="button-primary" value="<?php _e('Save Changes') ?>" />
                    
                        
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            
            <br/>
        
        </td>
    </tr>
</table>

</form>


<form class="nav-tab-content hide" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
<input type="hidden" name="rfw_tn" value="<?php echo esc_attr($_GET['t']); ?>" />
<?php wp_nonce_field( 'rfw_settings_action', 'rfw_settings_field' ); ?>
<table width="100%">
	<tr>
    	<td valign="top">          
        
        <table class="wp-list-table widefat fixed bookmarks">
            	<thead>
                <tr>
                	<th><h5><?php _e('Enter XML tags hierarchy to reach custom tag for images:'); ?></h5></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>
                   
                    	
                    	<textarea name="rfw_custom_tag_patterns" style="width:100%; height:200px"><?php echo get_option('rfw_custom_tag_patterns', ''); ?></textarea>
                        <br />
						<p><?php _e('Example:'); ?> <strong>$item->data</strong>['<span style="color:blue">child</span>']['<span style="color:red">someCustomTagNode1</span>']['<span style="color:green">someCustomTagNode2</span>'][<span style="color:brown">0</span>]['<span style="color:tomato">someCustomTagFinalNode</span>']</p><br />
                        <p><?php _e('Instructions:'); ?><br />
                        <ol>
                            <li><a href="<?php admin_url('widgets.php'); ?>" target="_blank"><?php _e('Add RSS Feed Widget to sidebars'); ?></a></li>
                            <li><a href="<?php echo site_url(); ?>/?rfw-debug" target="_blank" title="<?php _e('Click here to debug'); ?>"><?php _e('Click here to debug'); ?></a></li>
                            <li><?php _e('Follow the XML tags hierarchy and consider it after item tag and syntax should be as follows:'); ?><br />
                            	<h4>child|someCustomTagNode1|someCustomTagNode2|0|someCustomTagFinalNode</h4>
							</li>
                            <li><?php _e('Copy/Paste the custom tag hierarchy in textarea above. Save and try to debug again, you will start getting the custom tag value.'); ?></li>
                            <li><a href="https://wordpress.org/support/plugin/rss-feed-widget/" target="_blank"><?php _e('Still need help? Click here to reach the development team.'); ?></a></li>                            
                        </ol>
                        </p>

                    
					

                        <input type="submit" <?php echo disabled(!$rfw_pro); ?> name="submit-bpu" class="button-primary" value="<?php echo $rfw_pro?__('Save Changes'):__('Get Premium Version'); ?>" />

						<?php if(!$rfw_pro): ?>
                        <br /><br />

                        <a href="<?php echo $rfw_premium_link; ?>" target="_blank"><?php echo __('Click here to get premium version'); ?></a>
                        <?php endif; ?>
                    
                        
                    </td>
                </tr>
                </tbody>
            </table>
            <br/>
            
            <br/>
        
        </td>
    </tr>
</table>

</form>

</div>        

<script type="text/javascript" language="javascript">
jQuery(document).ready(function($) {
	
	<?php if(isset($_POST['rfw_tn'])): ?>
	
		$('.nav-tab-wrapper .nav-tab:nth-child(<?php echo $_POST['rfw_tn']+1; ?>)').click();
	
	<?php endif; ?>

	
});	
</script>

<style type="text/css">
	#wpfooter{
		display:none;
	}
<?php if(!$rfw_pro): ?>

	#adminmenu li.current a.current {
		font-size: 12px !important;
		font-weight: bold !important;
		padding: 6px 0px 6px 12px !important;
	}
	#adminmenu li.current a.current,
	#adminmenu li.current a.current span:hover{
		color:#9B5C8F;
	}
	#adminmenu li.current a.current:hover,
	#adminmenu li.current a.current span{
		color:#fff;
	}	
<?php endif; ?>
	.woocommerce-message,
	.update-nag{
		display:none;
	}

</style>