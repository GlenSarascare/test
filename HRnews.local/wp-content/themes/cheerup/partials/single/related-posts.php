<?php
/**
 * Partial: Related Posts
 */

// Variables only set if not already set
extract(array(
	'number'  => Bunyad::core()->get_sidebar() == 'none' ? Bunyad::options()->related_posts_number_full : Bunyad::options()->related_posts_number,
	'per_row' => Bunyad::options()->related_posts_grid,
), EXTR_SKIP);


// No sidebar? Only 2 related is too few - override
if (Bunyad::core()->get_sidebar() == 'none') {
	$per_row = 3;
	$number = $number < 3 ? 3 : $number;
}

// Use larger image when no sidebar
$post_image = Bunyad::core()->get_sidebar() == 'none' ? 'cheerup-main' : 'post-thumbnail';

// If 2 images per row, use larger
if (isset($per_row) && $per_row == 2) {
	$post_image = 'cheerup-grid';
}

// NOTE: Not included in extract to allow post_image calculation above 
if (empty($image)) {
	$image = $post_image;
}

?>

<?php if (is_single() && Bunyad::options()->related_posts): 

		$related = Bunyad::posts()->get_related($number);
		
		if (!$related) {
			return;
		}
?>

<section class="related-posts grid-<?php echo intval($per_row); ?>">

	<h4 class="section-head"><span class="title"><?php esc_html_e('Related Posts', 'cheerup'); ?></span></h4> 
	
	<div class="ts-row posts cf">
	
	<?php foreach ($related as $post): setup_postdata($post); ?>
		<article class="post col-4">

			<?php
				Bunyad::media()->the_image($image);
			?>
			
			<div class="content">
				
				<h3 class="post-title"><a href="<?php the_permalink(); ?>" class="post-link"><?php the_title(); ?></a></h3>

				<?php
					Bunyad::helpers()->post_meta(
						'related-posts',
						[
							'show_title' => false,
							'items_above' => [],
							'items_below' => ['date'],
							'align'       => '', // inherit
						]
					);
				?>

			</div>

		</article >
		
	<?php endforeach; wp_reset_postdata(); ?>
	
	</div>
	
</section>

<?php endif; ?>