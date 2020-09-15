<?php
/**
 * Override Visual Composer's text element 
 * 
 * Changes:
 *  1. Add post-content wrapper
 * 
 * Code from WPBakery Visual Composer
 */

$el_class = $css = $css_animation = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'wpb_text_column wpb_content_element ' . $this->getCSSAnimation( $css_animation );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

// Add single CSS class if needed
if (!empty($single_style)) {
	$css_class .= ' entry-content';
}

$output = '
	<div class="%s post-content">
		<div class="wpb_wrapper">
			%s
		</div>
	</div>
';

printf(
	$output, 
	esc_attr(trim($css_class)),
	wpb_js_remove_wpautop($content, true)
);