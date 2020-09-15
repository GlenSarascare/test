<?php
/**
 * Header Layout Style 8: Top Bar + Compact Header
 */

$classes = (!empty($classes) ? $classes : 'compact');
$classes .= ' has-search-' . Bunyad::options()->search_style;

?>

<header id="main-head" class="main-head head-nav-below <?php echo esc_attr($classes); ?>">

	<?php 
		Bunyad::core()->partial('partials/header/top-bar-b', array(
			'search_icon'  => true,
			'search_modal' => Bunyad::options()->search_style,
		)); 
	?>

	<div class="inner inner-head ts-contain" data-sticky-bar="<?php echo esc_attr(Bunyad::options()->topbar_sticky); ?>">	
		<div class="wrap cf">

			<?php get_template_part('partials/header/title-logo'); ?>				
				
			<div class="navigation-wrap inline">
				<?php if (has_nav_menu('cheerup-main')): ?>
				
				<nav class="navigation inline <?php echo esc_attr(Bunyad::options()->nav_style); ?>" data-sticky-bar="<?php echo esc_attr(Bunyad::options()->topbar_sticky); ?>">
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
		</div>
	</div>

</header> <!-- .main-head -->

<?php if (Bunyad::options()->header_ad): ?>

<div class="widget-a-wrap">
	<div class="the-wrap head">
		<?php echo do_shortcode(Bunyad::options()->header_ad); ?>
	</div>
</div>

<?php endif; ?>