<?php
/**
 * WooCommerce Main Template Catch-All 
 */


// Change sidebar for shop page
Bunyad::registry()->sidebar = 'cheerup-shop';

?>

<?php get_header(); ?>

<?php 
/**
 * An expansion of woocommerce_content() using same structure and filters
 */
?>
		
<?php if (is_singular('product')): ?>
	
	<?php Bunyad::helpers()->breadcrumbs(); ?>

	<div class="main wrap">
	
		<div class="ts-row cf">
			<div class="col-8 main-content cf">
			
				<?php woocommerce_content(); ?>
				
			</div>
			
			<?php Bunyad::core()->theme_sidebar(); ?>
			
		</div> <!-- .ts-row -->
	</div> <!-- .main -->
			

<?php else: // An archive ?>
		
	<?php if (apply_filters('woocommerce_show_page_title', true)): ?>
	
	<div class="archive-head">

		<span class="sub-title"><?php esc_html_e('Browsing', 'cheerup'); ?></span>
		<h2 class="title"><?php woocommerce_page_title(); ?></h2>

		<i class="background"><?php esc_html_e('Browsing', 'cheerup'); ?></i>
		
		<div class="text description"><?php do_action('woocommerce_archive_description'); ?></div>

		<?php Bunyad::helpers()->breadcrumbs(); ?>

	</div>
	
	<?php endif; ?>
	
	<div class="main wrap">

		<div class="ts-row cf">
			<div class="col-8 main-content cf">

			<?php
				if ( woocommerce_product_loop() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action( 'woocommerce_no_products_found' );
				}
			?>

		</div>
		
		<?php Bunyad::core()->theme_sidebar(); ?>
		
		</div> <!-- .ts-row -->
	</div> <!-- .main -->
		
<?php endif; // archive ?>


<?php get_footer(); ?>