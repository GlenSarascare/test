<?php 
/**
 * The homepage listing
 */

// Set sidebar from settings
Bunyad::core()->set_sidebar(Bunyad::options()->home_sidebar);

// Home template from settings
$loop     = '';
$template = (!Bunyad::options()->home_layout ? 'default' : Bunyad::options()->home_layout);

// All simple loops are handled by the default home
if (strstr($template, 'loop-')) {
	$loop = $template;
	$template = 'default';
}

// Normalize grid-N to normal grid template
$template = str_replace('-2', '', $template);


// Output the header
get_header();


/**
 * Show slider on home?
 */
if (Bunyad::options()->home_slider) {
	get_template_part('partials/featured-slider');
}

?>

<div class="main wrap">

	<?php get_template_part('partials/home/fixed-blocks'); ?>

	<?php 
	
	// Static front? When "Home Page" page template is used
	if (!is_home() && is_front_page()):
		
		get_template_part('partials/home/front-page');
	
	else:

		/**
		 * Render the home layout template. Default is partials/home/default.php
		 * 
		 * Pass $loop and $template to the template's local scope
		 */
		Bunyad::core()->partial(
			'partials/home/' . sanitize_file_name($template), 
			compact('loop', 'template')
		);

	endif;
	?>
	
</div> <!-- .main -->

<?php get_footer(); ?>