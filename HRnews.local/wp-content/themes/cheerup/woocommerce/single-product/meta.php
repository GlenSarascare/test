<?php
/**
 * Single Product Meta
 *
 * This template overrides woocommerce/templates/single-product/meta.php.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @version     3.0.0
 */

global $product;

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper">
			<span class="label"><?php echo esc_html_x('SKU:', 'woocommerce', 'cheerup'); ?></span> 
			<span class="sku"><?php echo ( $sku = $product->get_sku() ) ? esc_html( $sku ) : esc_html_x('N/A', 'woocommerce', 'cheerup'); ?></span>
		</span>

	<?php endif; ?>	
	
	<?php echo wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in"><span class="label">' .esc_html(_nx('Category:', 'Categories:', count($product->get_category_ids()) , 'woocommerce', 'cheerup'))  . '</span> ', '</span>'); ?>

	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as"><span class="label">' .esc_html(_nx('Tag:', 'Tags:', count($product->get_tag_ids()), 'woocommerce', 'cheerup')) . '</span> ', '</span>' ); ?>
	
	

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>