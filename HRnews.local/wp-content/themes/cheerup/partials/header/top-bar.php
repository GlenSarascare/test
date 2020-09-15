<?php
/**
 * Partial: Top bar template - displayed above logo
 */

if (Bunyad::options()->header_layout == 'full-top') {
	$navigation   = true;
	$social_icons = true;
}

if (Bunyad::options()->header_layout == 'alt') {
	$social_icons = true;
}

$navigation   = isset($navigation) ? $navigation : true;
$social_icons = isset($social_icons) ? $social_icons : false;

$scheme = ' light';
if (Bunyad::options()->topbar_style == 'dark') {
	$scheme = ' dark';
}

// Wrapper class
$wrap_class = Bunyad::options()->topbar_container == 'full' ? 'wrap wrap-full' : 'wrap';

?>

	<div class="top-bar<?php echo esc_attr($scheme); ?> cf">
	
		<div class="top-bar-content ts-contain" data-sticky-bar="<?php echo esc_attr(Bunyad::options()->topbar_sticky); ?>">
			<div class="<?php echo esc_attr($wrap_class); ?> cf">
			
			<span class="mobile-nav"><i class="tsi tsi-bars"></i></span>
			
			<?php 
			
			// Output social icons from paritals/header/social-icons.php if enabled
			Bunyad::core()->partial('partials/header/social-icons', compact('social_icons')); 
			
			?>

			<?php if ($navigation): ?>
				
				<?php if (has_nav_menu('cheerup-main')): ?>
						
				<nav class="navigation nav-relative<?php echo esc_attr($scheme); ?>">					
					<?php 
						wp_nav_menu([
							'theme_location' => 'cheerup-main', 
							'fallback_cb'    => '', 
							'walker'         => (class_exists('Bunyad_Menus') ? 'Bunyad_MenuWalker' : '')
						]); 
					?>
				</nav>
				
				<?php endif; ?>
				
			<?php endif; ?>
				
			
				<div class="actions">
					
					<?php do_action('bunyad_top_bar_right'); ?>
					
					<?php if (Bunyad::options()->header_cart_icon && class_exists('Bunyad_Theme_WooCommerce')): ?>
					
					<div class="cart-action cf">
						
						<?php echo Bunyad::get('woocommerce')->cart_link(); ?>
						
					</div>
					
					<?php endif; ?>
					
					
					<?php if (Bunyad::options()->topbar_search): ?>
					
					<div class="search-action cf">
					
						<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
						
							<button type="submit" class="search-submit"><i class="tsi tsi-search"></i></button>
							<input type="search" class="search-field" name="s" placeholder="<?php esc_attr_e('Search', 'cheerup')?>" value="<?php 
									echo esc_attr(get_search_query()); ?>" required />
							
						</form>
								
					</div>
					
					<?php endif; ?>
				
				</div>
				
			</div>			
		</div>
		
	</div>
