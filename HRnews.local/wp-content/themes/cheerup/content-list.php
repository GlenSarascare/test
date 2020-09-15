<?php
/**
 * Content Template is used for every post format and used on single posts
 * 
 * It is also used on archives called via loop.php
 */

 // Set default excerpt value, if not set
if (!isset($excerpt_length)) {

	// Full width requires more words in the excerpt
	$excerpt = Bunyad::options()->post_excerpt_list;
	$words   = Bunyad::helpers()->relative_width() > 67 ? round($excerpt * 2) : $excerpt;
}

// Set defaults if not set
extract(array(
	'show_excerpt'   => true,
	'show_read_more' => false,
	'show_social'    => true,
	'excerpt_length' => $words,
	'image'          => 'cheerup-list',
	'style'          => 'a',
), EXTR_SKIP);

/**
 * Custom ratio - when a custom ratio is available, most of the images will fallback
 * to uncropped large or cheerup-full.
 */
$media_ratio   = Bunyad::helpers()->get_ratio('post_list_ratio');
$image_options = ['ratio' => $media_ratio];

// Have a max width? Calculate real numbers for size hints.
$custom_width = (float) Bunyad::options()->post_list_media_max_width;
if ($custom_width) {
	$wrapper = Bunyad::options()->layout_width * Bunyad::helpers()->relative_width() / 100;
	$image_options['width'] = $wrapper * $custom_width / 100;
}

// If read more is enabled, set style.
if ($show_read_more) {
	$read_more_style = 'read-more-' . Bunyad::options()->read_more_style;
}

$classes = [
	'list-post',
	'list-post-' . $style
];

if (Bunyad::helpers()->relative_width() > 67) {
	$classes[] = "list-post-{$style}-full";
	$image .= '-full';
}

?>

<article <?php
	// setup the tag attributes
	Bunyad::markup()->attribs('list-post-wrapper', array(
		'id'        => 'post-' . get_the_ID(),
		'class'     => $classes
	)); ?>>
	
	<div class="post-thumb">

		<?php 
			Bunyad::media()->the_image($image, $image_options); 
		?>

		<?php get_template_part('partials/post-format'); ?>
		
		<?php //Bunyad::helpers()->meta_cat_label(); ?>
	</div>


	<div class="content">
	
		<?php 
			Bunyad::helpers()->post_meta(
				'list', 
				[
					'title_class' => 'post-title',
					'align' => 'left'
				]
			); 
		?>
		
		<?php if ($show_excerpt): ?>
		
		<div class="post-content post-excerpt cf">
					
			<?php
		
			// Get excerpt with read more button added
			echo Bunyad::posts()->excerpt(null, $excerpt_length, array('add_more' => false));
			
			?>
				
		</div>
		
		<?php endif; ?>
			
		<?php if (Bunyad::options()->post_footer_list): ?>
		<div class="post-footer">
		
			<?php if ($show_read_more): ?>
				<a href="<?php the_permalink(); ?>" class="read-more-link <?php echo esc_attr($read_more_style); ?>">
					<?php echo esc_html(Bunyad::posts()->more_text); ?>
				</a>
			<?php endif; ?>

			<?php if ($show_social && class_exists('CheerUp_Core')): ?>
				<?php 
					// See plugins/cheerup-core/social-share/views/social-share-inline.php
					Bunyad::get('cheerup_social')->render('social-share-inline');
				?>
			<?php endif;?>
					
		</div>
		<?php endif; ?>
		
	</div> <!-- .content -->

	
		
</article>