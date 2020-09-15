<?php 
/**
 * Default Page Template
 */

// Use woocommerce/page.php for WooCommerce pages
if (function_exists('is_woocommerce') && ( (is_cart() || is_checkout()) || is_account_page() )) {
	return get_template_part('woocommerce/page');
}

get_header();

// Pages can have the slider active
if (Bunyad::posts()->meta('featured_slider')) {
	Bunyad::core()->partial('partials/featured-slider', array('options_src' => 'meta'));
}

$classes = array('the-post');

// Modern style for full-width pages
if (Bunyad::core()->get_sidebar() == 'none') {
	array_push($classes, 'the-post-modern content-spacious-full');
}

$classes[] = 'the-page';

?>

<?php Bunyad::helpers()->breadcrumbs(); ?>

<div class="main wrap">

	<div class="ts-row cf">
		<div class="col-8 main-content cf">
		
		<?php while (have_posts()) : the_post(); ?>

		<article <?php
			// Setup article attributes 
			Bunyad::markup()->attribs('page-wrapper', array(
				'id'        => 'post-' . get_the_ID(),
				'class'     => join(' ', get_post_class($classes)),
			)); ?>>
			
			<header class="post-header the-post-header cf">
				<?php if (!Bunyad::posts()->meta('featured_disable')): ?>
				
				<div class="featured">
				
					<?php if (has_post_thumbnail()): ?>
					
						<?php 
							/**
							 * Normal featured image when no post format
							 */
							
							// Link to image
							$url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); 
							$url = $url[0];
							
							// Whether to use an uncropped (original aspect ratio) image.
							if (!Bunyad::options()->single_featured_crop) {
								$image = Bunyad::helpers()->relative_width() > 67 ? 'cheerup-full' : 'cheerup-main-uc';
							}
							else {
								$image = Bunyad::helpers()->relative_width() > 67 ? 'cheerup-main-full' : 'cheerup-main';
							}

							Bunyad::media()->the_image(
								$image,
								[
									'link' => $url,
									'bg_image' => false,
								]
							);
						
						?>
											
					<?php endif; // normal featured image ?>
				</div>
				
				<?php endif; // featured check ?>
		

				<?php if (Bunyad::posts()->meta('page_title') != 'no'): ?>
					
				<h1 class="post-title-alt the-page-title"><?php the_title(); ?></h1>

				<?php endif; ?>
				
			</header><!-- .post-header -->			
		
			<div class="post-content entry-content cf">
				
				<?php
					/**
					 * A wrapper for the_content() for some of our magic.
					 * 
					 * Note: the_content filter is applied.
					 * 
					 * @see the_content()
					 */
					Bunyad::posts()->the_content(null, false, ['ignore_more' => true]);
				
				?>
					
			</div><!-- .post-content -->
				
			<?php if (comments_open()): ?>
		
			<div class="comments">
				<?php comments_template('', true); ?>
			</div>
			
			<?php endif;?>
				
		</article>
	
		<?php endwhile; // end of the loop. ?>

		</div>
		
		<?php Bunyad::core()->theme_sidebar(); ?>
		
	</div> <!-- .ts-row -->
</div> <!-- .main -->

<?php get_footer(); ?>