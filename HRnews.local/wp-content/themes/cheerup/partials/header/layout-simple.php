<?php
/**
 * Header Layout Style 9: Simple Full Width header
 */

$classes = (!empty($classes) ? $classes : 'simple');
$classes .= ' has-search-' . Bunyad::options()->search_style;

?>

<header id="main-head" class="main-head head-nav-below <?php echo esc_attr($classes); ?>">

	<div class="inner inner-head ts-contain" data-sticky-bar="<?php echo esc_attr(Bunyad::options()->topbar_sticky); ?>">
		<div class="wrap">
		
			<div class="left-contain">
				<span class="mobile-nav"><i class="tsi tsi-bars"></i></span>	
			
				<?php get_template_part('partials/header/title-logo'); ?>
			
			</div>
				
				
			<div class="navigation-wrap inline">
				<?php if (has_nav_menu('cheerup-main')): ?>
				
				<nav class="navigation inline simple <?php echo esc_attr(Bunyad::options()->nav_style); ?>" data-sticky-bar="<?php echo esc_attr(Bunyad::options()->topbar_sticky); ?>">
					<?php 
						wp_nav_menu([
							'theme_location' => 'cheerup-main', 
							'fallback_cb'    => '', 
							'walker'         => (class_exists('Bunyad_Menus') ? 'Bunyad_MenuWalker' : '')
						]); 
					?>
				</nav>
				
				<?php endif; ?>
			</div>
			
			<div class="actions">
			
				<?php 
				
				// Output social icons from paritals/header/social-icons.php if enabled
				Bunyad::core()->partial('partials/header/social-icons', array('social_icons' => true)); 
				
				?>
				
				<?php if (Bunyad::options()->topbar_search): ?>
				
					<a href="#" title="<?php esc_attr_e('Search', 'cheerup'); ?>" class="search-link"><i class="tsi tsi-search"></i></a>
					
					<div class="search-box-overlay">
						<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
						
							<button type="submit" class="search-submit"><i class="tsi tsi-search"></i></button>
							<input type="search" class="search-field" name="s" placeholder="<?php esc_attr_e('Type and press enter', 'cheerup'); ?>" value="<?php 
									echo esc_attr(get_search_query()); ?>" required />
									
						</form>
					</div>
				
				<?php endif; ?>
				
				<?php if (Bunyad::options()->header_cart_icon && class_exists('Bunyad_Theme_WooCommerce')): ?>
				
					<div class="cart-action cf">
						<?php echo Bunyad::get('woocommerce')->cart_link(); ?>
					</div>
				
				<?php endif; ?>
			
			</div>
		</div>
	</div>

</header> <!-- .main-head -->