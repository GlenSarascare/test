<?php
/**
 * Single Post Template: Creative Large Layout
 */

the_post();
rewind_posts(); // the_post() is used again by layout-cover

get_header();

if (have_posts()):
	the_post();
endif;

$classes = (array) $classes;

$image = 'cheerup-large-cover';
$image_attrs = ['title' => strip_tags(get_the_title()), 'sizes' => '100vw'];

// Center breadcrumbs for the spacious + full-width style, which has this class.
$center_breadcrumbs = in_array('the-post-modern', $classes);

?>

<div class="single-creative">

	<div class="cf">
		<?php 
			Bunyad::lazyload()->disable();
			Bunyad::core()->partial(
				'partials/single/featured-overlay', 
				[
					'image'       => $image,
					'image_attrs' => $image_attrs,
					'context'     => 'creative'
				]
			); 
			Bunyad::lazyload()->enable();
		?>
	</div>
	
	<?php 
		Bunyad::helpers()->breadcrumbs([
			'classes' => $center_breadcrumbs ? 'breadcrumbs-center'  : '',
		]); 
	?>

	<div class="main wrap">

		<div <?php
			// Setup article attributes
			Bunyad::markup()->attribs('post-cover-wrapper', array(
				'id'        => 'post-' . get_the_ID(),
				'class'     => join(' ', get_post_class($classes)),
			)); ?>>
	
		<div class="ts-row cf">
			<div class="col-8 main-content cf">

				<article class="the-post">
					
					<?php Bunyad::core()->partial('partials/single/post-content'); ?>
					
				</article> <!-- .the-post -->
	
			</div>
			
			<?php Bunyad::core()->theme_sidebar(); ?>
			
		</div> <!-- .ts-row -->
		
		</div>
	</div> <!-- .wrap -->

</div>

<?php get_footer(); ?>