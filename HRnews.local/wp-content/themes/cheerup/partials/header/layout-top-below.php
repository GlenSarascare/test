<?php
/**
 * Header Layout Style 7: Top-bar below logo
 */
?>

<header id="main-head" class="main-head search-alt head-nav-below alt top-below">
	<div class="inner ts-contain">	
		<div class="wrap logo-wrap cf">
		
			<?php get_template_part('partials/header/title-logo'); ?>
			
		</div>
	</div>
		
	<?php Bunyad::core()->partial('partials/header/top-bar', array('social_icons' => true)); ?>
			
</header> <!-- .main-head -->