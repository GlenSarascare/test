<?php 
/**
 * One Large + X Small Grid listing style for tags, author archives etc.
 * 
 * Used for several combination of loops:
 * 
 *  - First large then grid
 *  - First large then list
 *  - 1 Large + 2 Grid
 *  - 1 Large + 2 List
 *  - 1 Overlay Large + 2 Grid 
 */

// Default vars - define above or via caller to override
extract(array(
	'query'  => $wp_query,
		
	// Type of posts to display for the "one large" part
	'large'  => Bunyad::options()->post_large_style,
		
	// Type of posts to display for the the small part
	'type'   => 'grid',

	// Every $number post will be of the large_type, counting from first
	// post onwards. 0 disables it.
	'number' => 3,

	'grid_cols'      => 2,
	'grid_style'     => Bunyad::options()->post_grid_style,
	'grid_masonry'   => Bunyad::options()->post_grid_masonry,

	// Does not apply to large post.
	'show_excerpt'   => true,
	'excerpt_length' => '',
	'show_footer'    => Bunyad::options()->post_footer_grid,
	
	'loop' => '',
	
), EXTR_SKIP);


// Vars to pass on to partial such as content-grid.
$partial_vars = [
	'show_footer' => $show_footer,
];

// Content template to use for non-large posts
$template = 'content-' . sanitize_file_name($type);
$classes  = array(
	'posts-dynamic posts-container ts-row', 
	$type, 
	'count-' . $number
);

if ($large > 0) {
	$classes[] = 'is-mixed';
}

/**
 * Grid specific settings
 */
if ($type == 'grid') {

	// Set the grid template.
	$grid_template = 'content-grid';
	$classes[]     = 'has-grid-' . $grid_cols;

	// Is masonry?
	if ($type == 'grid' && $grid_masonry) {
		$classes[] = 'masonry';
	}

	if (Bunyad::options()->post_grid_equals) {
		$classes[] = 'has-grid-eq';
	}
	
	// For calls not done via a block, we'll rely on global configs for excerpts.
	$show_excerpt = isset($props['show_excerpt']) ? $show_excerpt : Bunyad::options()->post_grid_show_excerpt;

	// If set, otherwise default to global.
	if (!empty($grid_style)) {
		$partial_vars['style'] = $grid_style;
	}

	// Explicit as show_read_more can be '' or '0' as well.
	if (isset($props['show_read_more']) && $props['show_read_more'] !== '') {
		$partial_vars['show_read_more'] = $props['show_read_more'];
	}
}

/**
 * List specific
 */
if ($type == 'list') {
	$template = 'content-' . sanitize_file_name(Bunyad::options()->post_list_style);
}

$wrap_open = false;
$i = 0;

// Mixed Layout?
if ($number > 0) {
	$classes[] = 'mixed';
}

// First large? Add ?first_normal for "load more" pagination
$first_normal = false;
if (strstr($loop, '1st-')) {
	$first_normal = true;
}

// Remove excerpt_length unless valid, since content-xyz templates have defaults set.
if (!empty($excerpt_length)) {
	$partial_vars['excerpt_length'] = $excerpt_length;
}

?>

	<div <?php Bunyad::markup()->attribs('loop-dynamic', array('class' => $classes)); ?>>
			
		<?php while ($query->have_posts()): $query->the_post();
				
				$is_large_post = !empty($number) && $i % $number === 0;
		?>
			
			<?php if ($i === 0 OR $is_large_post): // 1st or Large Post ?>
			
				<?php
				// Close wrapper if open
				if ($wrap_open):
					$wrap_open = false;
					echo '</div>';
				endif; 
				?>
			
				<?php if ($is_large_post): ?>
				<div class="col-12 large">
					<?php get_template_part('content-' . sanitize_file_name($large), get_post_format()); ?>
				</div>
				<?php endif; ?>
				
				<?php
				// Open wrapper if not the last post
				// OR if it's one grid/list post 
				if ($query->current_post + 1 < $query->post_count OR (!$is_large_post && $query->post_count == 1)):
					$wrap_open = true;
					echo '<div class="posts-wrap">';
				endif;
				?>
				
			<?php endif; ?>
			
			<?php if (!$is_large_post): // A grid or list post? ?>
			
				<?php if ($type == 'grid'): // Grid post next ?>
				
					<div class="column col-<?php echo (12 / $grid_cols); ?>">	
						<?php 
							Bunyad::core()->partial(
								$grid_template, 
								$partial_vars + compact('show_excerpt', 'grid_cols', 'show_footer')
							); 
						?>
					</div>
					
				<?php else: ?>
				
					<div class="col-12">
						<?php 
							Bunyad::core()->partial(
								$template, 
								$partial_vars + compact('show_excerpt')
							); 
						?>
					</div>
					
				<?php endif; ?>
					
			<?php endif; $i++; ?>
			
		<?php endwhile; ?>
		
		<?php 
		// Trailing open wrapper? close it
		if ($wrap_open) {
			echo '</div>';
		}
		?>

	</div>
	
	<?php wp_reset_postdata(); ?>

	<?php
		
		$data = compact('query', 'first_normal');
		if (isset($pagination)) {
			$data += compact('pagination');
		}

		if (isset($pagination_type)) {
			$data += compact('pagination_type');
		}
		
		Bunyad::core()->partial('partials/pagination', $data); 
	?>