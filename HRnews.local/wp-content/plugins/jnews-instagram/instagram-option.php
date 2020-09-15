<?php

$options = array();

$instagram_feed_show_active_callback = array (
    'setting'  => 'jnews_option[instagram_feed_enable]',
    'operator' => '!=',
    'value'    => 'hide',
);

$header_instagram_feed_refresh = array (
    'selector'        => '.jeg_header_instagram_wrapper',
    'render_callback' => function() {
        do_action('jnews_render_instagram_feed_header');
    }
);

$footer_instagram_feed_refresh = array (
    'selector'        => '.jeg_footer_instagram_wrapper',
    'render_callback' => function() {
        do_action('jnews_render_instagram_feed_footer');
    }
);

$options[] = array(
    'id'            => 'jnews_instagram_feed_section',
    'type'          => 'jnews-header',
    'section'       => 'jnews_instagram_feed_section',
    'label'         => esc_html__('Instagram Feed','jnews' ),
);

$options[] = array(
    'id'            => 'jnews_footer_instagram_alert',
    'type'          => 'jnews-alert',
    'default'       => 'info',
    'section'       => 'jnews_instagram_feed_section',
    'label'         => esc_html__('Footer Instagram Compatibility','jnews-instagram' ),
    'description'   => wp_kses(__("Footer Instagram only compatible with <strong>Footer Type 5</strong> and <strong>Footer Type 6</strong>.", 'jnews-instagram'), wp_kses_allowed_html()),
);

$options[] = array(
    'id'            => 'jnews_option[instagram_feed_enable]',
    'option_type'   => 'option',
    'transport'     => 'postMessage',
    'default'       => 'hide',
    'type'          => 'jnews-select',
    'section'       => 'jnews_instagram_feed_section',
    'label'         => esc_html__('Enable Instagram Feed','jnews-instagram'),
    'description'   => esc_html__('Show the Instagram feed only on header, footer or both.','jnews-instagram'),
    'multiple'        => 1,
    'choices'         => array(
        'only_header'   => esc_attr__( 'Only Header', 'jnews-instagram' ),
        'only_footer'   => esc_attr__( 'Only Footer', 'jnews-instagram' ),
        'both'          => esc_attr__( 'Header + Footer', 'jnews-instagram' ),
        'hide'          => esc_attr__( 'Hide ', 'jnews-instagram' ),
    ),
    'partial_refresh' => array (
        'jnews_header_instagram_enable' => $header_instagram_feed_refresh,
        'jnews_footer_instagram_enable' => $footer_instagram_feed_refresh,
    ),
);

$options[] = array(
	'id'            => 'jnews_option[instagram_feed_method]',
	'option_type'   => 'option',
	'transport'     => 'postMessage',
	'default'       => 'username',
	'type'          => 'jnews-select',
	'section'       => 'jnews_instagram_feed_section',
	'label'         => esc_html__('Fetch Method','jnews-instagram'),
	'description'   => esc_html__('Select fetch Instagram feed method that you want to use.','jnews-instagram'),
	'multiple'        => 1,
	'choices'         => array(
		'username'  => esc_attr__( 'Instagram Username (12 maximun image feed)', 'jnews-instagram' ),
		'api'       => esc_attr__( 'Instagram API (20 maximum image feed, get more by sending request)', 'jnews-instagram' ),
	),
	'partial_refresh' => array (
		'jnews_header_instagram_method' => $header_instagram_feed_refresh,
		'jnews_footer_instagram_method' => $footer_instagram_feed_refresh,
	),
);

$options[] = array(
    'id'              => 'jnews_option[footer_instagram_username]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'type'            => 'jnews-text',
    'default'         => '',
    'section'         => 'jnews_instagram_feed_section',
    'label'           => esc_html__('Instagram Username','jnews-instagram'),
    'description'     => esc_html__('Insert your Instagram username.','jnews-instagram'),
    'active_callback' => array(
        $instagram_feed_show_active_callback,
    ),
    'partial_refresh' => array (
        'jnews_header_instagram_username' => $header_instagram_feed_refresh,
        'jnews_footer_instagram_username' => $footer_instagram_feed_refresh,
    ),
);

$options[] = array(
	'id'            => 'jnews_footer_instagram_redirect',
	'type'          => 'jnews-alert',
	'default'       => 'alert',
	'section'       => 'jnews_instagram_feed_section',
	'label'         => esc_html__('Info :','jnews-instagram' ),
	'description'   => sprintf(__('You will be asked to enter redirect URI when you configure the app. Please use this url: %s', 'jnews-instagram'), get_admin_url() . 'widgets.php'),
	'active_callback' => array(
		$instagram_feed_show_active_callback,
		array (
			'setting'  => 'jnews_option[instagram_feed_method]',
			'operator' => '==',
			'value'    => 'api',
		)
	),
);

$options[] = array(
	'id'              => 'jnews_option[footer_instagram_clientid]',
	'option_type'     => 'option',
	'transport'       => 'postMessage',
	'type'            => 'jnews-text',
	'default'         => '',
	'section'         => 'jnews_instagram_feed_section',
	'label'           => esc_html__('Instagram Client ID','jnews-instagram'),
	'description'     => sprintf(__('You need to create an Instagram application to get your Instagram Client ID <a href="%s" target="_blank">here</a>.', 'jnews-instagram'), 'https://www.instagram.com/developer/'),
	'active_callback' => array(
		$instagram_feed_show_active_callback,
		array (
			'setting'  => 'jnews_option[instagram_feed_method]',
			'operator' => '==',
			'value'    => 'api',
		)
	),
	'partial_refresh' => array (
		'jnews_header_instagram_clientid' => $header_instagram_feed_refresh,
		'jnews_footer_instagram_clientid' => $footer_instagram_feed_refresh,
	),
);

$options[] = array(
	'id'              => 'jnews_option[footer_instagram_access_token]',
	'option_type'     => 'option',
	'transport'       => 'postMessage',
	'type'            => 'jnews-text',
	'default'         => '',
	'section'         => 'jnews_instagram_feed_section',
	'label'           => esc_html__('Instagram Access Token','jnews-instagram'),
	'description'     => sprintf(__('Get your Instagram Access Token by clicking this <a class="%s" href="%s" target="_blank">link</a> and refer to next page URL.', 'jnews-instagram'), 'jnews_instagram_access_token instagram', get_admin_url() . 'widgets.php'),
	'active_callback' => array(
		$instagram_feed_show_active_callback,
		array (
			'setting'  => 'jnews_option[instagram_feed_method]',
			'operator' => '==',
			'value'    => 'api',
		)
	),
	'partial_refresh' => array (
		'jnews_header_instagram_access_token' => $header_instagram_feed_refresh,
		'jnews_footer_instagram_access_token' => $footer_instagram_feed_refresh,
	),
);

$options[] = array(
    'id'              => 'jnews_option[footer_instagram_row]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'default'         => 1,
    'type'            => 'jnews-slider',
    'section'         => 'jnews_instagram_feed_section',
    'label'           => esc_html__('Number Of Rows','jnews-instagram'),
    'description'     => esc_html__('Number of rows for footer Instagram feed.','jnews-instagram'),
    'choices'         => array(
        'min'  => '1',
        'max'  => '2',
        'step' => '1',
    ),
    'active_callback' => array(
        array (
            'setting'  => 'jnews_option[instagram_feed_enable]',
            'operator' => 'in',
            'value'    => array( 'only_footer', 'both' ),
        )
    ),
    'partial_refresh' => array (
        'jnews_footer_instagram_row' => $footer_instagram_feed_refresh,
    ),
);

$options[] = array(
    'id'              => 'jnews_option[footer_instagram_column]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'default'         => 8,
    'type'            => 'jnews-slider',
    'section'         => 'jnews_instagram_feed_section',
    'label'           => esc_html__('Number Of Columns','jnews-instagram'),
    'description'     => esc_html__('Number of Instagram feed columns.','jnews-instagram'),
    'choices'         => array(
        'min'  => '5',
        'max'  => '10',
        'step' => '1',
    ),
    'active_callback' => array(
        $instagram_feed_show_active_callback,
    ),
    'partial_refresh' => array (
        'jnews_header_instagram_column' => $header_instagram_feed_refresh,
        'jnews_footer_instagram_column' => $footer_instagram_feed_refresh,
    ),
);

$options[] = array(
    'id'              => 'jnews_option[footer_instagram_sort_type]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'default'         => 'most_recent',
    'type'            => 'jnews-select',
    'section'         => 'jnews_instagram_feed_section',
    'label'           => esc_html__('Sort Feed Type','jnews-instagram'),
    'description'     => esc_html__('Sort the Instagram feed in a set order.','jnews-instagram'),
    'multiple'        => 1,
    'choices'         => array(
        'most_recent'   => esc_attr__( 'Most Recent', 'jnews-instagram' ),
        'least_recent'  => esc_attr__( 'Least Recent', 'jnews-instagram' ),
        'most_like'     => esc_attr__( 'Most Liked', 'jnews-instagram' ),
        'least_like'    => esc_attr__( 'Least Liked', 'jnews-instagram' ),
        'most_comment'  => esc_attr__( 'Most Commented ', 'jnews-instagram' ),
        'least_comment' => esc_attr__( 'Least Commented ', 'jnews-instagram' ),
    ),
    'active_callback' => array(
        $instagram_feed_show_active_callback,
    ),
    'partial_refresh' => array (
        'jnews_header_instagram_sort_type' => $header_instagram_feed_refresh,
        'jnews_footer_instagram_sort_type' => $footer_instagram_feed_refresh,
    ),
);

$options[] = array(
    'id'              => 'jnews_option[footer_instagram_hover_style]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'default'         => 'zoom',
    'type'            => 'jnews-select',
    'section'         => 'jnews_instagram_feed_section',
    'label'           => esc_html__('Hover Style','jnews-instagram'),
    'description'     => esc_html__('Choose hover effect style.','jnews-instagram'),
    'multiple'        => 1,
    'choices'         => array(
        'normal'      => esc_attr__( 'Normal', 'jnews-instagram' ),
        'icon'        => esc_attr__( 'Show Icon', 'jnews-instagram' ),
        'like'        => esc_attr__( 'Show Like Count', 'jnews-instagram' ),
        'comment'     => esc_attr__( 'Show Comment Count', 'jnews-instagram' ),
        'zoom'        => esc_attr__( 'Zoom', 'jnews-instagram' ),
        'zoom-rotate' => esc_html__('Zoom Rotate', 'jnews'),
        ' '           => esc_attr__( 'No Effect', 'jnews-instagram' ),
    ),
    'active_callback' => array(
        $instagram_feed_show_active_callback,
    ),
    'partial_refresh' => array (
        'jnews_header_instagram_hover_style' => $header_instagram_feed_refresh,
        'jnews_footer_instagram_hover_style' => $footer_instagram_feed_refresh,
    ),
);

$options[] = array(
    'id'              => 'jnews_option[footer_instagram_follow_button]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'type'            => 'jnews-text',
    'default'         => '',
    'section'         => 'jnews_instagram_feed_section',
    'label'           => esc_html__('Follow Button Text','jnews-instagram'),
    'description'     => esc_html__('Leave empty if you wont show it.','jnews-instagram'),
    'active_callback' => array(
        $instagram_feed_show_active_callback,
    ),
    'partial_refresh' => array (
        'jnews_header_instagram_follow_button' => $header_instagram_feed_refresh,
        'jnews_footer_instagram_follow_button' => $footer_instagram_feed_refresh,
    ),
);

$options[] = array(
    'id'              => 'jnews_option[footer_instagram_newtab]',
    'option_type'     => 'option',
    'transport'       => 'postMessage',
    'type'            => 'jnews-toggle',
    'section'         => 'jnews_instagram_feed_section',
    'label'           => esc_html__('Open New Tab','jnews-instagram'),
    'description'     => esc_html__('Open Instagram profile page on new tab.','jnews-instagram'),
    'active_callback' => array(
        $instagram_feed_show_active_callback,
    ),
    'partial_refresh' => array (
        'jnews_header_instagram_newtab' => $header_instagram_feed_refresh,
        'jnews_footer_instagram_newtab' => $footer_instagram_feed_refresh,
    ),
);

return $options;