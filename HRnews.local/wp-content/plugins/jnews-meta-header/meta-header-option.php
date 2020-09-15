<?php

$options = array();

$options[] = array(
    'id'            => 'jnews_social_meta_header',
    'type'          => 'jnews-header',
    'section'       => 'jnews_social_meta_section',
    'label'         => esc_html__('Social Meta Setting','jnews-meta-header' ),
);

$options[] = array(
	'id'            => 'jnews_option[social_meta_method]',
	'option_type'   => 'option',
	'transport'     => 'postMessage',
	'default'       => 'jnews',
	'type'          => 'jnews-select',
	'label'         => esc_html__('Social Meta Method', 'jnews-meta-header'),
	'description'   => wp_kses(__('Choose which social meta method you want to use. <br/> Each breadcrumb script will need you to install its respective plugin.','jnews-meta-header'), wp_kses_allowed_html()),
	'choices'       => array(
		'jnews'		=> 'JNews Meta Header',
		'yoast'		=> 'Yoast SEO Meta Header',
	)
);

$options[] = array(
    'id'              => 'jnews_option[social_meta_fb_app_id]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'type'            => 'jnews-text',
    'default'         => '',
    'section'         => 'jnews_social_meta_section',
    'label' => esc_attr__( 'FB App ID', 'jnews' ),
    'description' => wp_kses(sprintf(__("The unique ID that lets Facebook know the identity of your site. You can create your Facebook App ID <a href='%s' target='_blank'>here</a>.", "jnews"), "https://developers.facebook.com/docs/apps/register"), wp_kses_allowed_html()),
);

return $options;