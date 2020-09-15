<?php 
/**
 * Partial: Fixed blocks to display below slider on home
 */
?>

	<?php
		/**
		 * Show subscribe box at home?
		 */
		if (Bunyad::options()->home_subscribe):
	?>
	
	<div class="blocks">
		<?php get_template_part('partials/home/block-subscribe'); ?>
	</div>
		
	<?php endif; ?>


	<?php
		/**
		 * Show subscribe box at home?
		 */
		if (is_active_sidebar('cheerup-home-cta')):
	?>
	
	<div class="blocks">
		<?php dynamic_sidebar('cheerup-home-cta'); ?>
	</div>
		
	<?php endif; ?>
	

	<?php
		/**
		 * Show recent/popular posts carousel at home?
		 */
		if (Bunyad::options()->home_carousel):
	?>
	
	<div class="blocks">
		<?php get_template_part('partials/home/block-carousel'); ?>
	</div>
		
	<?php endif; ?>