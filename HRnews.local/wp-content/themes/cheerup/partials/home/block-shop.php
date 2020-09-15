<?php
/**
 * Latest from Shop section for the home-page
 */

if (!function_exists('is_woocommerce')) {
	return;
}

?>
	<div class="block products-block">
	
		<h3 class="block-head-legacy"><span class="title"><?php esc_html_e('From The Shop', 'cheerup'); ?></span></h3>
			
		<?php echo WC_Shortcodes::recent_products(array('per_page' => 4, 'columns' => 4)); ?>

		<span class="more">
			<a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="more-link"><?php 
				esc_html_e('More Products', 'cheerup'); ?></a>
		</span>
			
	</div>