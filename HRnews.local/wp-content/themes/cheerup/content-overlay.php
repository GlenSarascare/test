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
	Bunyad::markup()->attribs('overlay-post-wrapper', array(
		'id'     => 'post-' . get_the_ID(),
		'class'  => join(' ', get_post_class('overlay-post')), 
	)); ?>>
	
	<?php Bunyad::media()->the_image($image); ?>
		
	<?php 
		Bunyad::helpers()->post_meta(
			'overlay-post', 
			[
				'items_above' => ['cat'],
				'items_below' => ['date'],
				'title_class' => 'post-title',
				'cat_style'   => 'labels',
				'text_labels' => [],
				'align'       => 'center',
			]
		);
	?>
		
</article>