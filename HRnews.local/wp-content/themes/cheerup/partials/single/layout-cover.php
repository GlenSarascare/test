<?php
/**
 * Single Post Template: Cover Layout
 */

extract(array(
	'image' => 'cheerup-main-full',
	'class' => 'single-cover'
), EXTR_SKIP);

$classes = array_merge((array) $classes, array($class));

get_header(); 

// Only usable on a single post and requires the loop starting from a top
// pseudo-header of the post.
if (have_posts()):
	the_post();
endif;

?>

<?php Bunyad::helpers()->breadcrumbs(); ?>

<div class="main wrap">

	<div <?php
		// Setup article attributes
		Bunyad::markup()->attribs('post-cover-wrapper', array(
			'id'        => 'post-' . get_the_ID(),
			'class'     => join(' ', get_post_class($classes)),
		)); ?>>

		<header class="cf">
			
			<?php 
				Bunyad::core()->partial(
					'partials/single/featured-overlay',
					[
						'image'   => $image,
						'context' => 'cover',
					]
				); 
			?>
			
		</header><!-- .post-header -->


		<div class="ts-row cf">
			<div class="col-8 main-content cf">

				<article class="the-post">
				
					<?php get_template_part('partials/single/post-content'); ?>
						
				</article> <!-- .the-post -->

			</div>
			
			<?php Bunyad::core()->theme_sidebar(); ?>
			
		</div> <!-- .ts-row -->
	
	</div>
</div> <!-- .main -->

<?php get_footer(); ?>