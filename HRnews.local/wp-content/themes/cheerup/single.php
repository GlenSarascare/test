<?php 
/**
 * Singular Template
 * 
 * The single template is selected based on your global Theme Settings or the post 
 * setting. 
 * 
 * Template files for the post layouts are as follows:
 * 
 * Classic: Located below in the code conditional
 * Post Cover: partials/single/layout-cover.php
 */

/**
 * Spacious layout for full-width
 */
$spacious_style = Bunyad::posts()->meta('layout_spacious');
$classes = array();

// Spacious style at full width is essentially dynamic full width
if ($spacious_style && Bunyad::core()->get_sidebar() === 'none') {
	$classes[] = 'the-post-modern';
}

/**
 * Determine template to use
 */

$template = Bunyad::posts()->meta('layout_template');

// Only few template uses an individual template file - others are minor 
// variations based on classes adjusted on wrappers.
if (!in_array($template, array('cover', 'creative', 'magazine'))) {
	$template = 'classic';
}

// Creative doesn't support video or audio - revert to classic
if ($template == 'creative' && in_array(get_post_format(), array('video', 'audio'))) {
	$template = 'classic';		
}

if ($template != 'classic') {	
	Bunyad::core()->add_body_class('layout-' . $template);

	return Bunyad::core()->partial(
		'partials/single/layout-' . $template,
		compact('classes')
	);
}

?>

<?php get_header(); ?>
<?php Bunyad::helpers()->breadcrumbs(); ?>

<div class="main wrap">

	<div class="ts-row cf">
		<div class="col-8 main-content cf">
		
			<?php while (have_posts()) : the_post(); ?>

				<?php Bunyad::core()->partial('content', compact('classes'), 'single'); ?>
	
			<?php endwhile; // end of the loop. ?>

		</div>
		
		<?php Bunyad::core()->theme_sidebar(); ?>
		
	</div> <!-- .ts-row -->
</div> <!-- .main -->

<?php get_footer(); ?>