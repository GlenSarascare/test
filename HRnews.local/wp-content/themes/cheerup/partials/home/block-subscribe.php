<?php 
/**
 * Subscribe box for home-page
 */

?>

	<div class="block cf subscribe-box">
	
		<form method="post" action="<?php echo esc_url(Bunyad::options()->home_subscribe_url); ?>">
			<label class="text"><?php echo esc_html(Bunyad::options()->home_subscribe_label); ?></label>
			
			<div class="fields">
				<input type="text" name="FNAME" class="input name" placeholder="<?php esc_attr_e('Your name..', 'cheerup'); ?>" required />
				<input type="email" name="EMAIL" class="input email" placeholder="<?php esc_attr_e('Your email..', 'cheerup'); ?>" required />
				<input type="submit" value="<?php echo esc_attr(Bunyad::options()->home_subscribe_btn_label); ?>" name="subscribe" class="button" />
			</div>
		</form>
	
	</div>