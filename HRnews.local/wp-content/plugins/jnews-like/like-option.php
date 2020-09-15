<?php

$options = array();

$single_post_tag = array(
    'redirect'  => 'single_post_tag',
    'refresh'   => false
);

$options[] = array(
    'id'            => 'jnews_single_like_header',
    'type'          => 'jnews-header',
    'section'       => 'jnews_like_section',
    'label'         => esc_html__('Like Option','jnews-like' ),
);

$options[] = array(
    'id'            => 'jnews_option[single_show_like]',
    'option_type'   => 'option',
    'transport'     => 'postMessage',
    'default'       => 'both',
    'type'          => 'jnews-select',
    'section'       => 'jnews_like_section',
    'label'         => esc_html__('Show Like Button','jnews-like'),
    'description'   => esc_html__('Adjust the post like button on post meta container.','jnews-like'),
    'multiple'      => 1,
    'choices'     => array(
        'both' => esc_attr__( 'Like + Dislike', 'jnews-like' ),
        'like' => esc_attr__( 'Only Like', 'jnews-like' ),
        'hide' => esc_attr__( 'Hide All', 'jnews-like' ),
    ),
    'partial_refresh' => array (
        'jnews_option[single_show_like]' => array (
            'selector'        => '.jeg_meta_like_container',
            'render_callback' => function() {
                return JNews_Like::getInstance()->get_element(get_the_ID());
            },
        )
    ),
    'postvar'       => array( $single_post_tag )
);

return $options;