<?php
/**
 * Blog Block
 * 
 * @var array  $atts  Shortcode attribs.
 * @var string $tag   Shortcode used, example: highlights.
 * 
 * @var CheerUp_Block $block  Block object from the plugin.
 * @var WP_Query      $query  Query setup by block object.
 * 
 * @see CheerUp_Block::process()
 * @see CheerUp_ShortCodes::_render()
 */

/**
 * Determine the listing style to use
 */
$tag = str_replace('_', '-', $tag);

// Default to shortcode tag if type isn't defined, but not for base shortcode blog.
if (empty($type) && $tag !== 'blog') {
	$type = $tag;
}

if (empty($type) OR $type == 'loop-default') {
	$type = Bunyad::options()->category_loop;
}

// Loop template
$template = empty($type) ? 'loop' : $type;

// Add VC design CSS class if needed
$extra_class = '';
if (!empty($css) && function_exists('vc_shortcode_custom_css_class')) {
	$extra_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $tag, $atts);
}

// Save current options so that can they can be restored later
$options = Bunyad::options()->get_all();
$data    = compact(
	'block', 'query', 'atts', 'grid_style', 'pagination', 
	'pagination_type', 'show_excerpt', 'excerpt_length', 'show_footer',
	'show_read_more'
);

if (isset($grid_cols)) {
	$data += ['grid_cols' => $grid_cols];
}

if (!empty($grid_style)) {

	// Show footer on grid-b meant read_more was enabled, before 7.0.
	// So tie it to show_footer for VC.
	// if ($show_footer && $grid_style == 'grid-b' && !isset($data['show_read_more']))  {
	// 	$data['show_read_more'] = true;
	// }
}

// Enable/Disable category label overlays unless using global setting.
if (isset($show_cat_labels) && $show_cat_labels !== '') {
	Bunyad::options()->meta_cat_labels = $show_cat_labels;
}

?>

	<section <?php Bunyad::markup()->attribs('blog-block', array('class' => array('cf block', $tag, $extra_class), 'data-id' => $block->block_id)); ?>>
	
		<?php echo $block->output_heading();  // XSS ok. HTML generated by CheerUp_Block::output_heading()  ?>
		
		<div class="block-content">
		<?php
		
			// Get our loop template with include to preserve local variable scope.
			Bunyad::helpers()->loop($template, $data);
		
		?>
		</div>
	
	</section>

<?php 

// Reset
wp_reset_postdata(); 

// Restore modified options
Bunyad::options()->set_all($options);
