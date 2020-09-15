<?php

$options = array();

$ads_size = array(
    'auto'                  =>  esc_attr__('Auto', 'jnews'),
    'hide'                  =>  esc_attr__('Hide', 'jnews'),
    '120x90'                =>  esc_attr__('120 x 90', 'jnews'),
    '120x240'               =>  esc_attr__('120 x 240', 'jnews'),
    '120x600'               =>  esc_attr__('120 x 600', 'jnews'),
    '125x125'               =>  esc_attr__('125 x 125', 'jnews'),
    '160x90'                =>  esc_attr__('160 x 90', 'jnews'),
    '160x600'               =>  esc_attr__('160 x 600', 'jnews'),
    '180x90'                =>  esc_attr__('180 x 90', 'jnews'),
    '180x150'               =>  esc_attr__('180 x 150', 'jnews'),
    '200x90'                =>  esc_attr__('200 x 90', 'jnews'),
    '200x200'               =>  esc_attr__('200 x 200', 'jnews'),
    '234x60'                =>  esc_attr__('234 x 60', 'jnews'),
    '250x250'               =>  esc_attr__('250 x 250', 'jnews'),
    '320x100'               =>  esc_attr__('320 x 100', 'jnews'),
    '300x250'               =>  esc_attr__('300 x 250', 'jnews'),
    '300x600'               =>  esc_attr__('300 x 600', 'jnews'),
    '320x50'                =>  esc_attr__('320 x 50', 'jnews'),
    '336x280'               =>  esc_attr__('336 x 280', 'jnews'),
    '468x15'                =>  esc_attr__('468 x 15', 'jnews'),
    '468x60'                =>  esc_attr__('468 x 60', 'jnews'),
    '728x15'                =>  esc_attr__('728 x 15', 'jnews'),
    '728x90'                =>  esc_attr__('728 x 90', 'jnews'),
    '970x90'                =>  esc_attr__('970 x 90', 'jnews'),
    '970x250'               =>  esc_attr__('970 x 250', 'jnews'),
    '240x400'               =>  esc_attr__('240 x 400', 'jnews'),
    '250x360'               =>  esc_attr__('250 x 360', 'jnews'),
    '580x400'               =>  esc_attr__('580 x 400', 'jnews'),
    '750x100'               =>  esc_attr__('750 x 100', 'jnews'),
    '750x200'               =>  esc_attr__('750 x 200', 'jnews'),
    '750x300'               =>  esc_attr__('750 x 300', 'jnews'),
    '980x120'               =>  esc_attr__('980 x 120', 'jnews'),
    '930x180'               =>  esc_attr__('930 x 180', 'jnews')
);

$options[] = array(
    'id'            => 'jnews_autoload_blog_alert',
    'type'          => 'jnews-alert',
    'default'       => 'warning',
    'label'         => esc_html__('Attention','jnews-auto-load-post' ),
    'description'   => wp_kses(__('<ul>
                    <li>All setting on single post customizer option or single post metabox overwritten by this option.</li>
                    <li>Several option will also disabled. Such as Sidebar on Mobile, Next Prev link, Popup for related post.</li>
                    <li>We disable autoload effect on customizer. But you can see it on your website.</li>
                </ul>','jnews-auto-load-post'), wp_kses_allowed_html()),
);

$options[] = array(
    'id'            => 'jnews_autoload_blog_header',
    'type'          => 'jnews-header',
    'label'         => esc_html__('Single Template & Layout','jnews-auto-load-post' ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_blog_template]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => '1',
    'type'          => 'jnews-radio-image',
    'label'         => esc_html__('Single Blog Post Template','jnews-auto-load-post' ),
    'description'   => esc_html__('Choose your single blog post template.','jnews-auto-load-post' ),
    'choices'       => array(
        '1' => '',
        '2' => '',
        '3' => '',
        '6' => '',
        '7' => '',
        '8' => '',
        '9' => '',
        '10' => '',
    ),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => true
        )
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_blog_layout]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => 'right-sidebar',
    'type'          => 'jnews-radio-image',
    'label'         => esc_html__('Single Blog Post Layout','jnews-auto-load-post' ),
    'description'   => esc_html__('Choose your single blog post layout.','jnews-auto-load-post' ),
    'choices'       => array(
	    'right-sidebar'         => '',
	    'left-sidebar'          => '',
	    'right-sidebar-narrow'  => '',
	    'left-sidebar-narrow'   => '',
	    'double-sidebar'        => '',
	    'double-right-sidebar'  => '',
	    'no-sidebar'            => '',
	    'no-sidebar-narrow'     => ''
    ),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => true
        )
    )
);

$all_sidebar = apply_filters('jnews_get_sidebar_widget', null);

$options[] = array(
    'id'            => 'jnews_option[autoload_sidebar]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => 'default-sidebar',
    'type'          => 'jnews-select',
    'label'         => esc_html__('Single post sidebar','jnews-auto-load-post'),
    'description'   => esc_html__('Choose your post sidebar. If you need another sidebar, you can create from WordPress Admin &raquo; Appearance &raquo; Widget.','jnews-auto-load-post'),
    'multiple'      => 1,
    'choices'       => $all_sidebar,
    'active_callback'  => array(
        array(
            'setting'  => 'jnews_option[autoload_blog_layout]',
            'operator' => 'contains',
            'value'    => array('left-sidebar', 'right-sidebar', 'left-sidebar-narrow', 'right-sidebar-narrow', 'double-sidebar', 'double-right-sidebar'),
        )
    ),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => true
        )
    ),
    'wrapper_class' => array('first_child')
);

$options[] = array(
	'id'            => 'jnews_option[autoload_second_sidebar]',
	'transport'     => 'postMessage',
	'option_type'   => 'option',
	'default'       => 'default-sidebar',
	'type'          => 'jnews-select',
	'label'         => esc_html__('Single post second sidebar','jnews-auto-load-post'),
	'description'   => esc_html__('Choose your post second sidebar. If you need another sidebar, you can create from WordPress Admin &raquo; Appearance &raquo; Widget.','jnews-auto-load-post'),
	'multiple'      => 1,
	'choices'       => $all_sidebar,
	'active_callback'  => array(
		array(
			'setting'  => 'jnews_option[autoload_blog_layout]',
			'operator' => 'contains',
			'value'    => array('double-sidebar', 'double-right-sidebar'),
		)
	),
	'postvar'       => array(
		array(
			'redirect'  => 'single_post_tag',
			'refresh'   => true
		)
	),
	'wrapper_class' => array('first_child')
);

$options[] = array(
    'id'            => 'jnews_option[autoload_disable_comment]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => 'hide',
    'type'          => 'jnews-select',
    'label'         => esc_html__('Show / Hide Comment','jnews-auto-load-post'),
    'description'   => esc_html__('Choose if you want to hide comment on single post.','jnews-auto-load-post'),
    'choices'     => array(
        'hide'  => esc_attr__( 'Hide Comment', 'jnews-auto-load-post' ),
        'show'  => esc_attr__( 'Show Comment', 'jnews-auto-load-post' ),
    ),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
    'partial_refresh' => array (
        'jnews_option[autoload_disable_comment]' => array (
            'selector'        => '.jnews_comment_container',
            'render_callback' => function() {
                $single = JNews\Single\SinglePost::getInstance();
                $single->post_comment();
            },
        ),
    ),
);



$options[] = array(
    'id'            => 'jnews_option[autoload_content_header]',
    'type'          => 'jnews-header',
    'label'         => esc_html__('Autoload Content','jnews-auto-load-post' ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_content]',
    'transport'     => 'refresh',
    'option_type'   => 'option',
    'default'       => 'normal',
    'type'          => 'jnews-select',
    'label'         => esc_html__('Autoload Content Filter','jnews-auto-load-post'),
    'description'   => esc_html__('Choose which the most relevant content will autoload after current post.','jnews-auto-load-post'),
    'choices'     => array(
        'normal'    => esc_attr__( 'By Sequence', 'jnews-auto-load-post' ),
        'category'  => esc_attr__( 'By Category', 'jnews-auto-load-post' ),
        'tag'       => esc_attr__( 'By Tag', 'jnews-auto-load-post' ),
        'sidefeed'  => esc_attr__( 'By Sidefeed', 'jnews-auto-load-post' ),
    ),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => true
        )
    ),
);

$options[] = array(
	'id'            => 'jnews_option[autoload_limit]',
	'transport'     => 'postMessage',
	'option_type'   => 'option',
	'default'       => '10',
	'type'          => 'jnews-number',
	'choices'     => array(
		'min'  => '1',
		'max'  => '999',
		'step' => '1',
	),
	'label'         => esc_html__('Autoload Content Limit','jnews-auto-load-post'),
	'description'   => esc_html__('Set limit for autoload post.','jnews-auto-load-post'),
	'postvar'       => array(
		array(
			'redirect'  => 'single_post_tag',
			'refresh'   => true
		)
	),
);


$image_ads_callback = array(
    array(
        'setting'  => 'jnews_option[autoload_ads_enable]',
        'operator' => '==',
        'value'    => true,
    ),
    array(
        'setting'  => 'jnews_option[autoload_ads_type]',
        'operator' => '==',
        'value'    => 'image',
    )
);

$google_ads_callback = array(
    array(
        'setting'  => 'jnews_option[autoload_ads_enable]',
        'operator' => '==',
        'value'    => true,
    ),
    array(
        'setting'  => 'jnews_option[autoload_ads_type]',
        'operator' => '==',
        'value'    => 'googleads',
    )
);

$shortcode_ads_callback = array(
    array(
        'setting'  => 'jnews_option[autoload_ads_enable]',
        'operator' => '==',
        'value'    => true,
    ),
    array(
        'setting'  => 'jnews_option[autoload_ads_type]',
        'operator' => '==',
        'value'    => 'shortcode',
    )
);

$script_ads_callback = array(
    array(
        'setting'  => 'jnews_option[autoload_ads_enable]',
        'operator' => '==',
        'value'    => true,
    ),
    array(
        'setting'  => 'jnews_option[autoload_ads_type]',
        'operator' => '==',
        'value'    => 'code',
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_header]',
    'type'          => 'jnews-header',
    'label'         => esc_html__('Autoload Ads Separator','jnews-auto-load-post' ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_enable]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => false,
    'type'          => 'jnews-toggle',
    'label'         => esc_html__('Enable Advertisement','jnews-auto-load-post'),
    'description'   => esc_html__('Show advertisement as separator on autoload post.','jnews-auto-load-post'),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_type]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => 'googleads',
    'type'          => 'jnews-radio',
    'label'         => esc_html__('Advertisement Type','jnews-auto-load-post'),
    'description'   => esc_html__('Choose which type of advertisement you want to use.','jnews-auto-load-post'),
    'multiple'      => 1,
    'choices'       => array(
        'image'         => esc_attr__( 'Image Ads', 'jnews-auto-load-post' ),
        'googleads'     => esc_attr__( 'Google Ads', 'jnews-auto-load-post' ),
        'code'          => esc_attr__( 'Script Code', 'jnews-auto-load-post' ),
        'shortcode'     => esc_attr__( 'Shortcode', 'jnews-auto-load-post' ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'jnews_option[autoload_ads_enable]',
            'operator' => '==',
            'value'    => true,
        )
    ),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_image]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => '',
    'type'          => 'jnews-image',
    'label'         => esc_html__('Advertisement Image Desktop','jnews-auto-load-post'),
    'description'   => esc_html__('Upload your ads image that will be shown on the desktop view.','jnews-auto-load-post'),
    'active_callback'  => $image_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
);

$options[] = array(
	'id'            => 'jnews_option[autoload_ads_image_tablet]',
	'transport'     => 'postMessage',
	'option_type'   => 'option',
	'default'       => '',
	'type'          => 'jnews-image',
	'label'         => esc_html__('Advertisement Image Tablet','jnews-auto-load-post'),
	'description'   => esc_html__('Upload your ads image that will be shown on the tablet view.','jnews-auto-load-post'),
	'active_callback'  => $image_ads_callback,
	'postvar'       => array(
		array(
			'redirect'  => 'single_post_tag',
			'refresh'   => false
		)
	),
);

$options[] = array(
	'id'            => 'jnews_option[autoload_ads_image_phone]',
	'transport'     => 'postMessage',
	'option_type'   => 'option',
	'default'       => '',
	'type'          => 'jnews-image',
	'label'         => esc_html__('Advertisement Image Phone','jnews-auto-load-post'),
	'description'   => esc_html__('Upload your ads image that will be shown on the phone view.','jnews-auto-load-post'),
	'active_callback'  => $image_ads_callback,
	'postvar'       => array(
		array(
			'redirect'  => 'single_post_tag',
			'refresh'   => false
		)
	),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_link]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => '',
    'type'          => 'jnews-text',
    'label'         => esc_html__('Advertisement Link','jnews-auto-load-post'),
    'description'   => esc_html__('Please put where this advertisement image will be heading.','jnews-auto-load-post'),
    'active_callback'  => $image_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_text]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => '',
    'type'          => 'jnews-text',
    'label'         => esc_html__('Alternate Text','jnews-auto-load-post'),
    'description'   => esc_html__('Insert alternate text for advertisement image.','jnews-auto-load-post'),
    'active_callback'  => $image_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_open_tab]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => false,
    'type'          => 'jnews-toggle',
    'label'         => esc_html__('Open in New Tab','jnews-auto-load-post'),
    'description'   => esc_html__('Enable open in new tab when advertisement image is clicked.','jnews-auto-load-post'),
    'active_callback'  => $image_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_google_publisher]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => '',
    'type'          => 'jnews-text',
    'label'         => esc_html__('Google Publisher ID','jnews-auto-load-post'),
    'description'   => esc_html__('Insert data-ad-client / google_ad_client content.','jnews-auto-load-post' ),
    'active_callback'  => $google_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    ),
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_google_id]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => '',
    'type'          => 'jnews-text',
    'label'         => esc_html__('Google Ad Slot ID','jnews-auto-load-post'),
    'description'   => esc_html__('Insert data-ad-slot / google_ad_slot content.','jnews-auto-load-post' ),
    'active_callback'  => $google_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_google_desktop]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => 'auto',
    'type'          => 'jnews-select',
    'label'         => esc_html__('Desktop Ad Size','jnews-auto-load-post'),
    'description'   => esc_html__('Choose ad size to be shown on desktop, recommended to use auto.','jnews-auto-load-post' ),
    'choices'       => $ads_size,
    'active_callback'  => $google_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_google_tab]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => 'auto',
    'type'          => 'jnews-select',
    'label'         => esc_html__('Tab Ad Size','jnews-auto-load-post'),
    'description'   => esc_html__('Choose ad size to be shown on tablet, recommended to use auto.','jnews-auto-load-post' ),
    'choices'       => $ads_size,
    'active_callback'  => $google_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_google_phone]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => 'auto',
    'type'          => 'jnews-select',
    'label'         => esc_html__('Phone Ad Size', 'jnews-auto-load-post'),
    'description'   => esc_html__('Choose ad size to be shown on phone, recommended to use auto.', 'jnews-auto-load-post'),
    'choices'       => $ads_size,
    'active_callback'  => $google_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_code]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'sanitize'      => 'jnews_sanitize_by_pass',
    'default'       => '',
    'type'          => 'jnews-textarea',
    'label'         => esc_html__('Ads Script Code', 'jnews-auto-load-post'),
    'description'   => esc_html__('Put your ad\'s script code right here.', 'jnews-auto-load-post'),
    'active_callback'  => $script_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_shortcode]',
    'transport'     => 'postMessage',
    'option_type'   => 'option',
    'default'       => '',
    'type'          => 'jnews-textarea',
    'label'         => esc_html__('Ads Shortcode', 'jnews-auto-load-post'),
    'description'   => esc_html__('Put your ad\'s shortcode right here.', 'jnews-auto-load-post'),
    'active_callback'  => $shortcode_ads_callback,
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    )
);

$options[] = array(
    'id'            => 'jnews_option[autoload_ads_text]',
    'option_type'   => 'option',
    'transport'     => 'postMessage',
    'default'       => false,
    'type'          => 'jnews-toggle',
    'label'         => esc_html__('Show Advertisement Text','jnews'),
    'active_callback'  => array(
        array(
            'setting'  => 'jnews_option[autoload_ads_enable]',
            'operator' => '==',
            'value'    => true,
        )
    ),
    'postvar'       => array(
        array(
            'redirect'  => 'single_post_tag',
            'refresh'   => false
        )
    )
);


return $options;
