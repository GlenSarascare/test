<?php
/**
 * Call CheerUp Advertisement widget
 */

// This shortcode can be rendered after import when VC is inactive, but relies on it.
if (!Bunyad::get('cheerup_vc')) {
	return;
}

if (!empty($code)) {
	$atts['ad_code'] = Bunyad::get('cheerup_vc')->textarea_decode($code);
}

$type = 'CheerUp_Widgets_Ads';
$args = array();

$classes = "block";

if (!empty($css) && function_exists('vc_shortcode_custom_css_class')) {
	$classes .= apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '), $tag, $atts);
}

?>

<div class="<?php echo esc_attr($classes); ?>">
	<?php the_widget($type, $atts, $args); ?>
</div>

