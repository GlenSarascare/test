<?php

$options = array();

$options[] = array(
	'id'          => 'jnews_load_necessary_asset',
	'transport'   => 'refresh',
	'default'     => false,
	'type'        => 'jnews-toggle',
	'label'       => esc_html__( 'Optimize Assets', 'jnews' ),
	'description' => esc_html__( 'Only load necessary assets based on the current page.', 'jnews' ),
);

$options[] = array(
	'id'          => 'jnews_empty_base64',
	'transport'   => 'refresh',
	'default'     => false,
	'type'        => 'jnews-toggle',
	'label'       => esc_html__( 'Base64 Image', 'jnews' ),
	'description' => esc_html__( 'Use a base64 image for the empty image when using the lazy load image option.', 'jnews' ),
);

$options[] = array(
	'id'          => 'jnews_ajax_megamenu',
	'transport'   => 'refresh',
	'default'     => false,
	'type'        => 'jnews-toggle',
	'label'       => esc_html__( 'Ajax Mega Menu', 'jnews' ),
	'description' => esc_html__( 'Use ajax load for the mega menu category.', 'jnews' ),
);

$options[] = array(
	'id'          => 'jnews_disable_image_srcset',
	'transport'   => 'refresh',
	'default'     => false,
	'type'        => 'jnews-toggle',
	'label'       => esc_html__( 'Disable Image Srcset', 'jnews' ),
	'description' => esc_html__( 'Disable srcset on the image attribute.', 'jnews' ),
);

return $options;