<?php 
/**
 * The "posts list" listing style for tags, author archives etc.
 */

$query = !isset($query) ? $wp_query : $query;

// Set the grid template
$template = 'content-' . sanitize_file_name(Bunyad::options()->post_list_style);

// Conditionals
$show_excerpt = isset($show_excerpt) ? $show_excerpt : 1; 

?>

	<div class="posts-dynamic posts-container ts-row list">
		
		<div class="posts-wrap">
		<?php while ($query->have_posts()) : $query->the_post(); ?>
		
			<div class="col-12">
			
			<?php Bunyad::core()->partial($template, compact('show_excerpt')); ?>
			
			</div>
			
		<?php endwhile; ?>
		</div>
		
	</div>
							
	<?php Bunyad::core()->partial('partials/pagination', compact('query')); ?>