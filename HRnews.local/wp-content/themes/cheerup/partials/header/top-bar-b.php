<?php
/**
 * Partial: Top bar template - alternate style with latest posts and icons 
 */

// Defaults, can be overriden
extract(array(
	'social_icons' => true,
	'search_icon'  => false,
	'search_modal' => false,
	'posts_ticker' => Bunyad::options()->topbar_ticker,
	'posts_ticker_number' => Bunyad::options()->topbar_ticker_number,
	'posts_ticker_tags'   => Bunyad::options()->topbar_ticker_tag,
), EXTR_SKIP);

$top_menu = Bunyad::options()->topbar_top_menu;

$scheme = ' light';
if (Bunyad::options()->topbar_style == 'dark') {
	$scheme = ' dark';
}

// Wrapper class
$wrap_class = Bunyad::options()->topbar_container == 'full' ? 'wrap wrap-full' : 'wrap';

// Force disable ticker if top menu is enabled
if ($top_menu) {
	$posts_ticker = false;
}

?>

	<div class="top-bar<?php echo esc_attr($scheme); ?> top-bar-b cf">
	
		<div class="top-bar-content ts-contain" data-sticky-bar="<?php echo esc_attr(Bunyad::options()->topbar_sticky); ?>">
			<div class="<?php echo esc_attr($wrap_class); ?> cf">
			
			<span class="mobile-nav"><i class="tsi tsi-bars"></i></span>
			
			<?php if ($posts_ticker): ?>
			
			<div class="posts-ticker">
				<span class="heading"><?php echo esc_html(Bunyad::options()->topbar_ticker_text); ?></span>

				<ul>
					<?php 
					
					$args = array(
						'orderby'        => 'date', 
						'order'          => 'desc', 
						'posts_per_page' => $posts_ticker_number
					);

					// Limit to tag
					$tags = trim($posts_ticker_tags);
					if ($tags) {
						$args['tag_slug__in'] = array_map('trim', explode(',', $tags));
					}

					$query = new WP_Query(apply_filters('bunyad_ticker_query_args', $args)); 
						
					?>
					
					<?php while($query->have_posts()): $query->the_post(); ?>
					
						<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
					
					<?php endwhile; ?>
					
					<?php wp_reset_postdata(); ?>
				</ul>
			</div>
			
			<?php endif; ?>
			
			<?php if ($top_menu): ?>
			
				<?php if (has_nav_menu('cheerup-top-menu')): ?>
						
				<nav class="navigation nav-relative<?php echo esc_attr($scheme); ?> nav-secondary">
					<?php 
						wp_nav_menu([
							'theme_location' => 'cheerup-top-menu', 
							'fallback_cb'    => '', 
							'walker'         => (class_exists('Bunyad_Menus') ? 'Bunyad_MenuWalker' : '')
						]); 
					?>
				</nav>
				
				<?php endif; ?>
			
			<?php endif; ?>
			
			
			<?php if ($search_icon): ?>
				
			<div class="actions">
				<div class="search-action cf">
			
				<?php if ($search_modal): // Search modal just needs a link ?>

					<a href="#" title="<?php esc_attr_e('Search', 'cheerup'); ?>" class="search-link search-submit"><i class="tsi tsi-search"></i></a>

				<?php else: ?>

					<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
					
						<button type="submit" class="search-submit"><i class="tsi tsi-search"></i></button>
						<input type="search" class="search-field" name="s" placeholder="<?php esc_attr_e('Search', 'cheerup')?>" value="<?php 
								echo esc_attr(get_search_query()); ?>" required />
						
					</form>

				<?php endif; ?>
							
				</div>
			</div>
			
			<?php endif; ?>
			
			
			<?php 
			
			// Output social icons from paritals/header/social-icons.php if enabled
			Bunyad::core()->partial('partials/header/social-icons', compact('social_icons')); 
			
			?>
				
			</div>			
		</div>
		
	</div>
