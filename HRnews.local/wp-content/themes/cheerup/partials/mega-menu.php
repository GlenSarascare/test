<?php 
/**
 * Mega Menu Category - Display recent posts from a parent category
 */

// Walker to create the left part of mega menu
$sub_walker = new Walker_Nav_Menu;
$have_sub_menu = !empty($sub_items) ? true : false;

if (!isset($sub_items)) {
	$sub_items = array();
}

?>

<div class="sub-menu mega-menu wrap">

	<?php if ($have_sub_menu): ?>
	
	<div class="column sub-cats">
		
		<ol class="sub-nav">
			<?php foreach ($sub_items as $nav_item): ?>
				
				<?php 
					
					ob_start();
					
					// Simulate a simpler walk - $escaped_output is passed-by-ref
					$escaped_output = '';
					$sub_walker->start_el($escaped_output, $nav_item, 0, $args);
					$sub_walker->end_el($escaped_output, $nav_item, $args);
					
					ob_end_clean();
					
					echo $escaped_output; // phpcs:ignore WordPress.Security.EscapeOutput -- Safe markup generated via WordPress default Walker_Nav_Menu::start_el()
				?>				
			<?php endforeach; ?>
			
			<li class="menu-item view-all menu-cat-<?php echo esc_attr($item->object_id); ?>"><a href="<?php echo esc_url($item->url); ?>"><?php 
				esc_html_e('View All', 'cheerup'); ?></a></li>
		</ol>
	
	</div>
	

	<?php endif; ?>
	
	<?php
		// Add main item (view all) as default
		array_push($sub_items, $item);
	?>

	<section class="column recent-posts">
	
		<?php foreach ($sub_items as $item): ?>
				
			<?php
				$query = new WP_Query(apply_filters(
					'bunyad_mega_menu_query_args', 
					array('cat' => $item->object_id, 'posts_per_page' => ($have_sub_menu ? 8 : 10),  'ignore_sticky_posts' => 1),
					'category'
				));
			?>
			
			<div class="ts-row posts cf" data-id="<?php echo esc_attr($item->object_id); ?>">
			
			<?php while ($query->have_posts()): $query->the_post(); ?>
			
				<div class="<?php echo ($have_sub_menu ? 'col-3' : 'column one-fifth'); ?> post">

					<?php
						Bunyad::media()->the_image('post-thumbnail');
					?>
					
					<a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
					
					<?php

						Bunyad::helpers()->post_meta(
							'mega-menu',
							[
								'items_above' => [],
								'items_below' => ['date'],
								'show_title'  => false,
								'align'       => ''
							]
						);
					?>

				</div>
			
			<?php endwhile; wp_reset_postdata();  ?>
			
			</div> <!-- .posts -->
		
		<?php endforeach; ?>
		
		<div class="navigate">
			<a href="#" class="show-prev"><i class="tsi tsi-angle-left"></i><span class="visuallyhidden"><?php esc_html_e('Previous', 'cheerup'); ?></span></a>
			<a href="#" class="show-next"><i class="tsi tsi-angle-right"></i><span class="visuallyhidden"><?php esc_html_e('Next', 'cheerup'); ?></span></a>
		</div>
		
	</section>

</div>