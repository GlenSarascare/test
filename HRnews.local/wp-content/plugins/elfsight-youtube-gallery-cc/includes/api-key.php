<?php

if (!defined('ABSPATH')) exit;


function elfsight_youtube_gallery_get_api_key(){
    return get_option('elfsight_youtube_gallery_api_key', '');
}

if (is_array($elfsight_youtube_gallery_config['settings']) && is_array($elfsight_youtube_gallery_config['preferences'])) {
    array_push($elfsight_youtube_gallery_config['settings']['properties'], array(
        'id' => 'key',
        'name' => esc_html__('API key'),
        'type' => 'hidden',
        'defaultValue' => elfsight_youtube_gallery_get_api_key()
    ));
}

function elfsight_youtube_gallery_shortcode_options_filter($options) {
    $apiKey = get_option('elfsight_youtube_gallery_api_key', '');

    if (is_array($options)) {
        $options['key'] = $apiKey;
    }

    return $options;
}
add_filter('elfsight_youtube_gallery_shortcode_options', 'elfsight_youtube_gallery_shortcode_options_filter');

function elfsight_youtube_gallery_widget_options_filter($options_json) {
    $options = json_decode($options_json, true);

    if (is_array($options)) {
        unset($options['key']);
    }

    return json_encode($options);
}
add_filter('elfsight_youtube_gallery_widget_options', 'elfsight_youtube_gallery_widget_options_filter');
