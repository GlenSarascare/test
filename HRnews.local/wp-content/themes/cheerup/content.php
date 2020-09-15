<?php
/**
 * Content Template is used on single posts for the default post style.
 */

$classes = array_merge((array) $classes, array('the-post', 'single-default'));

?>

<article <?php
	// Setup article attributes
	Bunyad::markup()->attribs('post-wrapper', array(
		'id'        => 'post-' . get_the_ID(),
		'class'     => join(' ', get_post_class($classes)),
	)); ?>>
	
	<header class="post-header the-post-header cf">
			
		<?php 
			Bunyad::helpers()->post_meta(
				'single', 
				[
					'is_single' => true,
					'add_class' => 'the-post-meta',
					'cat_labels_inline' => true,
				]
			); 
		?>

		<?php get_template_part('partials/single/featured'); ?>
		
	</header><!-- .post-header -->

	<?php 
		$data = [];
		if (isset($spacious_style)) {
			$data['spacious_style'] = $spacious_style;
		}
		
		Bunyad::core()->partial('partials/single/post-content', $data); 
	?>
		
</article> <!-- .the-post -->