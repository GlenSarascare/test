<?php 
/**
 * Assorted Template for home: Large + Sidebar, Shop Block, Posts grid + Sidebar
 */

Bunyad::registry()->grid_cols = Bunyad::core()->get_sidebar() == 'none' ? 3 : 2;

// Force 2 columns for the grid-2 template
if ($template == 'full-grid-2') {
	Bunyad::registry()->grid_cols = 2;
}

?>

<?php if (!is_paged()): // Only show grid block if 2nd page ?>

	<div class="ts-row cf blocks">
		<div class="col-8 cf">
		
			<div class="block posts-large">
			
			<?php if (!is_paged()): ?>
			
				<?php while (have_posts()) : the_post(); ?>
					
					<?php get_template_part('content-large', get_post_format()); ?>
					
					<?php break; // for first post only ?>
					
				<?php endwhile; ?>
				
			<?php endif; ?>
			
			</div>
			
		</div>
		
		<?php
		
		// Use split sidebar
		Bunyad::registry()->sidebar = 'cheerup-split-top';
		
		get_sidebar('dynamic'); // Should always display - do not replace with Bunyad::core()->theme_sidebar(); 
		
		// Restore to default
		Bunyad::registry()->set('sidebar', null);
		
		?>
	</div>
	
	
	<div class="blocks">
		
		<?php get_template_part('partials/home/block-shop'); ?>
		
	</div>
	
<?php endif; ?>

	<?php // DON'T REMOVE: .main-content needed here for "load more" pagination to work ?>
	<div class="main-content">	
		
		<div class="ts-row cf blocks">
			<div class="col-8 cf">
				
				<?php Bunyad::helpers()->loop('loop-grid'); ?>
				
				<?php get_template_part('pagination'); ?>
				
			</div>
			
			
			<?php Bunyad::core()->theme_sidebar(); ?>
				
		</div>
		
	</div>
