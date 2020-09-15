<?php 
/**
 * Template Name: Homepage / Visual Composer
 */

get_header();

// Pages can have the slider active
if (Bunyad::posts()->meta('featured_slider')) {
	Bunyad::core()->partial('partials/featured-slider', array('options_src' => 'meta'));
}
else if (is_front_page() && Bunyad::options()->home_slider) {
	get_template_part('partials/featured-slider');
}

?>

<?php Bunyad::helpers()->breadcrumbs(); ?>

<div class="main wrap">

	<?php
		/**
		 * Legacy: Fixed blocks via Customize for home 
		 */
		if (is_front_page()):
			get_template_part('partials/home/fixed-blocks');	
		endif;
	?>

	<div class="ts-row cf">
		<div class="col-8 main-content cf">
		
		<?php while (have_posts()) : the_post(); ?>

		<div <?php
			// Setup article attributes 
			Bunyad::markup()->attribs('page-wrapper', array(
				'id'        => 'post-' . get_the_ID(),
				'data-id'   => get_the_ID(),
				'class'     => 'the-post the-page page-content'
			)); ?>>

			<?php if (Bunyad::posts()->meta('page_title') == 'yes'): ?>

			<header class="post-header the-post-header">
				<h1 class="post-title-alt the-page-title"><?php the_title(); ?></h1>
			</header>

			<?php endif; ?>
		
			<?php
				/**
				 * A wrapper for the_content() for some of our magic.
				 * 
				 * Note: the_content filter is applied.
				 * 
				 * @see the_content()
				 */
				Bunyad::posts()->the_content(null, false);
			
			?>
				
		</div>
	
		<?php endwhile; // end of the loop. ?>

		</div>
		
		<?php Bunyad::core()->theme_sidebar(); ?>
		
	</div> <!-- .ts-row -->
</div> <!-- .main -->

<?php get_footer(); ?>