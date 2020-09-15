<?php
/**
 * Modify the Widgetized Sidebar to include theme sidebar configurations
 */

global $wp_registered_sidebars;

/**
 * Shortcode attributes
 * @var $atts
 * @var $title
 * @var $el_class
 * @var $sidebar_id
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Widget_sidebar
 */

$title = $el_class = $sidebar_id = '';
extract(shortcode_atts(array(
    'title' => '',
    'width' => '1/1',
    'el_class' => '',
    'sidebar_id' => '',
	'is_sidebar' => 1,
	'is_sticky' => '',
), $atts));

if ( '' === $sidebar_id ) {
	return null;
}

$el_class = $this->getExtraClass( $el_class );

if (empty($wp_registered_sidebars[$sidebar_id])) {
	echo esc_html_x('Edit this block and set a valid sidebar.', 'Admin', 'cheerup');
	return;
}

/** 
 * Add before_title and after_title to be compatible with the theme 
 */
if ($is_sidebar) {
	$old_sidebar = $wp_registered_sidebars[$sidebar_id];

	if (!empty($old_sidebar)) {
		
		// Copy sidebar settings from primary.
		$sidebar = array_merge($old_sidebar, $wp_registered_sidebars['cheerup-primary']);
		$wp_registered_sidebars[$sidebar_id] = $sidebar;
	}
}

// Add sidebar class
if (!empty($atts['is_sidebar'])) {
	$el_class = 'sidebar wpb_content_element' . $el_class;
}
else {
	$el_class = 'wpb_widgetised_column wpb_content_element' . $el_class;	
}
 

// Add sticky class if needed
if (!empty($atts['is_sticky'])) {
	$el_class .= ' sticky-col';
}

ob_start();
dynamic_sidebar($sidebar_id);
$sidebar_value = ob_get_contents();
ob_end_clean();

// Restore old sidebar configurations.
if (isset($old_sidebar)) {
	$wp_registered_sidebars[$sidebar_id] = $old_sidebar;
}

$sidebar_value = trim( $sidebar_value );
$sidebar_value = ( '<li' === substr( $sidebar_value, 0, 3 ) ) ? '<ul>' . $sidebar_value . '</ul>' : $sidebar_value;

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $el_class, $this->settings['base'], $atts );

$output = '
	<div class="' . esc_attr( $css_class ) . '">
		<div class="wpb_wrapper">
			' . wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_widgetised_column_heading' ) ) . '
			' . $sidebar_value . '
		</div>
	</div>
';

echo $output;