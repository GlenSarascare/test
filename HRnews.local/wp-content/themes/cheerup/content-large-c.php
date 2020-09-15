<?php
/**
 * Content template to be used for large overlay posts in listings
 */

// Which image to use
if (Bunyad::helpers()->relative_width() == 100) {
	$image = 'cheerup-main-full';
}
else {
	$image = 'cheerup-main';
}

?>

<article <?php
	// Setup article attributes
	Bunyad::markup()->attribs('large-post-wrapper', array(
		'id'     => 'post-' . get_the_ID(),
		'class'  => join(' ', get_post_class('post-main large-post large-post-c')),
	)); ?>>

	<header class="post-header cf">

		<?php get_template_part('partials/content/featured'); ?>

		<div class="meta-title">
			<?php
				Bunyad::helpers()->post_meta('large-c', ['cat_labels_inline' => true]); 
			?>
		</div>

	</header><!-- .post-header -->
		
</article>