<?php
/**
 * The template for displaying product widget entries
 *
 * This template overrides woocommerce/templates/content-widget-product.php.
 * 
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @version 3.5.5
 */

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}

?>

<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>

	<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<span class="image"><?php echo $product->get_image(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<span class="product-title"><?php echo wp_kses_post( $product->get_name() ); ?></span>
	</a>

	<?php if ( ! empty( $show_rating ) ) : ?>
		<?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	<?php endif; ?>

	<?php echo $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>

</li>

