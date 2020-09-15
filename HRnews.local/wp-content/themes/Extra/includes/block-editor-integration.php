<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Enqueue styles for block editor
 *
 * @since ??
 */
function et_extra_block_editor_styles() {
	wp_enqueue_style(
		'extra-block-editor-style',
		get_theme_file_uri( 'includes/admin/styles/editor-blocks.css' ),
		array(),
		et_get_theme_version()
	);
}
add_action( 'enqueue_block_editor_assets', 'et_extra_block_editor_styles' );

/**
 * Setup page layout content width options for block editor
 *
 * @since ??
 *
 * @param array $content_widths
 *
 * @return array
 */
function et_extra_gb_content_widths( $content_widths = array() ) {
	// Customizer value
	$content_width = absint( et_get_option( 'content_width', 1280 ) );
	$sidebar_width = absint( et_get_option( 'sidebar_width', 25 ) );

	// Content width when no sidebar exist
	$no_sidebar = $content_width;

	// Content width when sidebar exist (default). Extra actually uses percentage based fluid
	// layout. Default content area is basically 75% of max-width 1280px, with 60px * 2 horizontal
	// padding and 12px column gutter
	$padding     = 60 * 2;
	$gutter      = 12;
	$has_sidebar = $content_width - ( ( $content_width / 100 ) * $sidebar_width ) - $padding - $gutter;

	// Min content width (small smartphone width)
	$min = 320;

	// Max content width (15" laptop * 2)
	$max = 2880;

	// Current content width
	$saved   = get_post_meta( get_the_ID(), '_et_gb_content_width', true);
	$current = $saved ? $saved : $has_sidebar;

	return array(
		'current' => $current,
		'default' => $has_sidebar,
		'min'     => $min,
		'max'     => $max,
		'none'    => $no_sidebar,
		'left'    => $has_sidebar,
		'right'   => $has_sidebar,
	);
}
add_filter( 'et_gb_content_widths', 'et_extra_gb_content_widths' );

/**
 * Setup selectors for Extra
 *
 * @since ??
 *
 * @param array $selectors
 *
 * @return array
 */
function et_extra_gb_selectors( $selectors ) {
	$selectors['pageLayoutSelect'] = '.extra-admin-input[name="_extra_sidebar_location"]';

	return $selectors;
}
add_filter( 'et_gb_selectors', 'et_extra_gb_selectors' );
