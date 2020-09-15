<?php
/**
 * Grid posts style used for several loops
 */

extract(array(
	'show_excerpt'    => Bunyad::options()->post_grid_show_excerpt,
	'show_footer'     => true,
	
	// Social only valid if show_footer is also true.
	'show_social'     => true,
	'show_read_more'  => Bunyad::options()->post_grid_read_more,

	'excerpt_length'  => Bunyad::options()->post_excerpt_grid,
	'grid_cols'       => 2,
	'title_size'      => '',
	'classes'         => get_post_class('grid-post'),
	'read_more_style' => 'read-more-' . Bunyad::options()->read_more_style,
	'align'           => Bunyad::options()->post_grid_align,

	'style'           => Bunyad::options()->post_grid_style,
	'masonry'         => Bunyad::options()->post_grid_masonry,
	'content_wrap'    => false,

), EXTR_SKIP);

/**
 * Base classes.
 */
$style_class = $style === 'grid' ? 'a' : str_replace('grid-', '', $style);
$classes     = array_merge(
	$classes,
	[
		$show_excerpt ? 'has-excerpt' : 'no-excerpt',
		'grid-post-c' . $grid_cols,
		$title_size ? 'title-' . $title_size : '',
		'grid-post-' . $style_class
	]
);

$meta_args = [];

// Match meta alignment to specified.
if ($align) {
	$meta_args['align'] = $align;
	$classes[] = 'grid-post-' . $align;
}

/**
 * Custom ratio - when a custom ratio is available, most of the images will fallback
 * to uncropped large or cheerup-full.
 */
$media_ratio   = Bunyad::helpers()->get_ratio('post_grid_ratio_c' . $grid_cols, 'post_grid_ratio');
$image_options = ['ratio' => $media_ratio];
$image         = 'cheerup-grid';

// 1 or 2 columns at max/1170px width.
if ($grid_cols !== 3 && Bunyad::helpers()->relative_width() == 100) {
	$image = 'cheerup-main';
	$image_options['width'] = (1/$grid_cols) * Bunyad::options()->layout_width;
}

// Masonry style.
if ($masonry) {

	$image = 'cheerup-masonry';

	// Force bg images for masonry.
	$image_options['bg_image'] = true;

	// Masonry shouldn't have custom ratio.
	$image_options['ratio'] = null;
	
	// 1 or 2 columns at max/1170px width.
	if ($grid_cols !== 3 && Bunyad::helpers()->relative_width() == 100) {
		$image = 'cheerup-full';
	}
}

/**
 * Content wrap is enabled selectively only for card layouts, as many skins apply margin-top 
 * on .post-meta, which won't collapse when wrapper is present - so both .post-thumb and .post-meta
 * margins apply when .content-wrap is added.
 */
if ($style === 'grid-c') {
	$content_wrap = true;
}

// Social isn't supported on any other style. grid-a is named 'grid' for legacy.
if ($style !== 'grid') {
	$show_social = false;
}

?>

<article <?php
	// hreview has to be first class because of rich snippet classes limit 
	Bunyad::markup()->attribs('grid-post-wrapper', array(
		'id'     => 'post-' . get_the_ID(),
		'class'  => $classes
	)); ?>>


	<div class="post-thumb">
		
		<?php
			Bunyad::media()->the_image($image, $image_options); 
		?>

		<?php get_template_part('partials/post-format'); ?>
		
		<?php Bunyad::helpers()->meta_cat_label(); ?>
		
	</div>
		
	<?php if ($content_wrap): ?>
	<div class="content-wrap">
	<?php endif; ?>
		<div class="meta-title">
		
			<?php Bunyad::helpers()->post_meta('grid', $meta_args); ?>
		
		</div>

		<?php if (!empty($show_excerpt)): ?>
		<div class="post-content post-excerpt cf">
			<?php

			// Excerpts or main content?
			echo Bunyad::posts()->excerpt(null, $excerpt_length, ['add_more' => false]);

			?>
				
		</div><!-- .post-content -->
		<?php endif; ?>
		
		<?php if ($show_read_more): ?>
			
			<a href="<?php the_permalink(); ?>" class="read-more-link <?php echo esc_attr($read_more_style); ?>">
				<?php echo esc_html(Bunyad::posts()->more_text); ?>
			</a>

		<?php endif; ?>

		<?php if ($show_footer && $show_social): ?>
		<div class="post-footer">
			
			<?php if (class_exists('CheerUp_Core')): ?>
				<?php 
					// See plugins/cheerup-core/social-share/views/social-share-inline.php
					Bunyad::get('cheerup_social')->render('social-share-inline');
				?>
			<?php endif;?>

		</div>
		<?php endif; ?>

<?php if ($content_wrap): ?>
	</div>
<?php endif; ?>
		
</article>
