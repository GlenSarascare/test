<?php
/**
 * Header & Nav Options
 */

$options = is_array($options) ? $options : [];

// Define some commonly used contexts.
$contexts = [
	'headers_with_social' => [
		'key'   => 'header_layout', 
		'value' => [
			'nav-below', 'full-top', 'nav-below-b', 'alt', 'top-below', 'compact', 'simple'
		]
	],
	// Header with separated navbar
	'headers_separate_nav' => [
		'key'   => 'header_layout', 
		'value' => ['nav-below', 'nav-below-b']
	]
];

/**
 * Fields: General headers options
 */
$fields_general = [
	[
		'name'    => 'header_layout',
		'label'   => esc_html_x('Header Layout Style', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			''             => esc_html_x('Style 1: Classic Default', 'Admin', 'cheerup'),
			'nav-below'    => esc_html_x('Style 2: Nav Below Logo', 'Admin', 'cheerup'),
			'full-top'     => esc_html_x('Style 3: Full-width Top', 'Admin', 'cheerup'),
			'logo-ad'      => esc_html_x('Style 4: Logo Left + Ad', 'Admin', 'cheerup'),
			'nav-below-b'  => esc_html_x('Style 5: Special Topbar + Nav Below Logo', 'Admin', 'cheerup'),
			'alt'          => esc_html_x('Style 6: Default + Social Icons + Search Icon', 'Admin', 'cheerup'),
			'top-below'    => esc_html_x('Style 7: Nav Below Logo with Social Icons', 'Admin', 'cheerup'),
			'compact'      => esc_html_x('Style 8: Topbar + Logo & Nav (Compact)', 'Admin', 'cheerup'),
			'simple'       => esc_html_x('Style 9: Logo + Nav + Icons (Full-width)', 'Admin', 'cheerup'),
			'simple-boxed' => esc_html_x('Style 10: Logo + Nav + Icons (Boxed)', 'Admin', 'cheerup'),
		],
	],

	[
		'name'    => '_n_header_layout',
		'type'    => 'message',
		'label'   => '',
		'text'    => 'There are customizations active that may change the look of the selected header style. <a href="#" class="preset-reset">Click here</a> to reset them to defaults.',
		'style'   => 'message-alert',
		'classes' => 'bunyad-cz-hidden',
	],

	
	[
		'name'              => 'header_ad',
		'label'             => esc_html_x('Header Ad Code', 'Admin', 'cheerup'),
		'value'             => '',
		'desc'              => '',
		'type'              => 'textarea',
		'context'           => ['control' => ['key' => 'header_layout', 'value' => ['logo-ad', 'compact']]],
		'sanitize_callback' => ''
	],
	
	[
		'name'    => 'nav_style',
		'label'   => esc_html_x('Navigation Style', 'Admin', 'cheerup'),
		'value'   => 'light',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			'light' => esc_html_x('Light', 'Admin', 'cheerup'),
			'dark'  => esc_html_x('Dark', 'Admin', 'cheerup')
		],
			
		// Only show this setting if header_layout is nav_below type
		'context' => ['control' => ['key' => 'header_layout', 'value' => ['nav-below', 'nav-below-b']]],
	],

	[
		'name'    => 'topbar_sticky',
		'label'   => esc_html_x('Sticky Top Bar/Navigation', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => esc_html_x('Make topbar or navigation sticky on scrolling.', 'Admin', 'cheerup'),
		'type'    => 'select',
		'options' => [
			''      => esc_html_x('Disabled', 'Admin', 'cheerup'),
			1       => esc_html_x('Enabled - Normal', 'Admin', 'cheerup'),
			'smart' => esc_html_x('Enabled - Smart (Show when scrolling to top)', 'Admin', 'cheerup'),
		],
		// 'group' => '_g_topbar',
	],

	[
		'name'    => 'topbar_search',
		'label'   => esc_html_x('Show Search', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => '',
		'type'    => 'toggle',
		'style'   => 'inline-sm',
		'classes' => 'sep-top mb-small'
	],
		
	[
		'name'    => 'search_style',
		'label'   => esc_html_x('Search Style', 'Admin', 'cheerup'),
		'value'   => 'modal',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			'modal'   => esc_html_x('Full-screen Modal', 'Admin', 'cheerup'),
			'overlay' => esc_html_x('Small Overlay', 'Admin', 'cheerup'),
		],
		'context' => ['control' => ['key' => 'header_layout', 'value' => ['nav-below-b', 'compact', 'simple', 'simple-boxed']]],
	],

	[
		'name'    => 'header_cart_icon',
		'label'   => esc_html_x('Shopping Cart Icon', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => esc_html_x('Only works when WooCommerce is installed.', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],

	[
		'name'  => '_g_header_design',
		'label' => esc_html_x('General Design', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

		// Top border for simple-boxed header style
		[
			'name'  => 'css_header_top_border',
			'value' => '',
			'label' => esc_html_x('Top Border Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.main-head.simple-boxed' => ['props' => ['border-top-color' => '%s']],
			],
			'context' => [['key' => 'header_layout', 'value' => ['simple-boxed']]],
			'group'   => '_g_header_design',
		],
		[
			'name'  => 'css_header_bottom_border',
			'value' => '',
			'label' => esc_html_x('Bottom Border Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.main-head, .main-head.dark' => ['props' => ['border-bottom-color' => '%s']]
			],
			'group' => '_g_header_design',
		],
		// [
		// 	'name'  => 'css_header_search',
		// 	'value' => '#fff',
		// 	'label' => esc_html_x('Search Icon Color (Light Bg)', 'Admin', 'cheerup'),
		// 	'desc'  => 'When on a light background.',
		// 	'type'  => 'color',
		// 	'css'   => [
		// 		'.main-head .light .search-submit, .main-head .light .search-link .fa' => ['props' => ['color' => '%s !important']]
		// 	],
		// 	'context' => [
		// 		['key' => 'nav_style', 'value' => 'light'], 
		// 		['key' => 'topbar_style', 'value' => 'light', 'relation' => 'OR'], 
		// 	],
		// 	'group' => '_g_header_design',
		// ],
		[
			'name'  => 'css_header_search',
			'value' => '',
			'label' => esc_html_x('Search Icon Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.main-head .search-submit, .main-head .search-link .tsi' => ['props' => ['color' => '%s !important']]
			],
			'group' => '_g_header_design',
		],
		[
			'name'  => 'css_topbar_search_text',
			'value' => '',
			'label' => esc_html_x('Search Text Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.main-head .search-field' => ['props' => ['color' => '%s']]
			],
			'context' => [['key' => 'topbar_style', 'value' => 'light']],
			'group'   => '_g_header_design',
		],
		[
			'name'  => 'css_topbar_search_text_dark',
			'value' => '',
			'label' => esc_html_x('Search Text Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.main-head .search-field' => ['props' => ['color' => '%s']]
			],
			'context' => [['key' => 'topbar_style', 'value' => 'dark']],
			'group'   => '_g_header_design',
		],

		function_exists('is_shop') ? [
			'name'    => 'css_header_cart_color',
			'label'   => esc_html_x('Cart Icon Color', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'color',
			'css'     => [
				'.main-head:not(._) .cart-link, .navigation .menu .nav-icons' => ['props' => ['color' => '%s']]
			],
			'group'   => '_g_header_design',
			'context' => [['key' => 'header_cart_icon', 'value' => 1]]
		] : [],

		function_exists('is_shop') ? [
			'name'    => 'css_header_cart_sep',
			'label'   => esc_html_x('Cart Icon Separator', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'color',
			'css'     => [
				'.cart-action' => ['props' => ['color' => '%s']]
			],
			'group'   => '_g_header_design',
			'context' => [['key' => 'header_cart_icon', 'value' => 1]]
		] : [],
		
		[
			'name'    => 'css_header_bg_image',
			'label'   => esc_html_x('Header Background', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'upload',
			'options' => ['type' => 'image'],
			'bg_type' => ['value' => 'no-repeat'],
			'css'     => [
				'.main-head .logo-wrap' => [
					'props' => [
						'background-image'    => 'url(%s)', 
						'background-position' => 'top center'
					]
				]
			],
			// 'context' => [
			// 	['key' => 'header_layout', 'value' => ['logo-ad', 'compact'] ] 
			// ],
			'group' => '_g_header_design',
		],

		[
			'name'    => 'css_header_bg_full',
			'label'   => esc_html_x('Header Background Full Width', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'upload',
			'options' => ['type'  => 'image'],
			'bg_type' => ['value' => 'cover-nonfixed'],
			'css'     => [
				'.main-head > .inner' => ['props' => [
					'background-image' => 'url(%s)',
				]]
			],
			'group' => '_g_header_design',
		],
	
	/**
	 * Group: Topbar
	 */
	[
		'name'  => '_g_topbar',
		'label' => esc_html_x('Top Bar', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

		[
			'name'    => 'topbar_style',
			'label'   => esc_html_x('Style', 'Admin', 'cheerup'),
			'value'   => 'light',
			'desc'    => '',
			'type'    => 'select',
			'options' => [
				'light' => esc_html_x('Light', 'Admin', 'cheerup'),
				'dark'  => esc_html_x('Dark / Contrast', 'Admin', 'cheerup')
			],
			'style'   => 'inline',
			'context' => ['control' => ['key' => 'header_layout', 'value' => ['simple', 'simple-boxed'], 'compare' => '!=']],
			'group'   => '_g_topbar',
		],

		[
			'name'    => 'topbar_container',
			'label'   => esc_html_x('Layout', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'select',
			'options' => [
				''     => esc_html_x('Normal Container', 'Admin', 'cheerup'),
				'full' => esc_html_x('Full Width', 'Admin', 'cheerup'),
			],
			'style'   => 'inline',
			'context' => ['control' => ['key' => 'header_layout', 'value' => ['full-top', 'simple', 'simple-boxed'], 'compare' => '!=']],
			'group'   => '_g_topbar',
		],

		[
			'name'        => 'css_topbar_height',
			'label'       => esc_html_x('Max Height', 'Admin', 'cheerup'),
			'value'       => '',
			'desc'        => '',
			'type'        => 'number',
			'style'       => 'inline-sm',
			'input_attrs' => ['min' => 20, 'max' => 150, 'step' => 1],
			'css'         => [
				'.main-head .top-bar' => ['props' => ['--topbar-height' => '%spx']]
			],
			'context' => ['control' => ['key' => 'header_layout', 'value' => ['simple', 'simple-boxed'], 'compare' => '!=']],
			'group'   => '_g_topbar',
		],

		[
			'name'    => 'topbar_ticker',
			'label'   => esc_html_x('Posts Ticker', 'Admin', 'cheerup'),
			'value'   => 1,
			'desc'    => '',
			'type'    => 'toggle',
			'style'   => 'inline-sm',
			'context' => ['control' => ['key' => 'header_layout', 'value' => ['nav-below-b', 'compact']]],
			'group'   => '_g_topbar',
		],			

		[
			'name'    => 'topbar_ticker_text',
			'label'   => esc_html_x('Posts Ticker Label', 'Admin', 'cheerup'),
			'value'   => 'Latest Posts:',
			'desc'    => '',
			'type'    => 'text',
			'context' => ['control' => ['key' => 'topbar_ticker', 'value' => 1]],
			'group'   => '_g_topbar',
		],

		[
			'name'    => 'topbar_ticker_number',
			'label'   => esc_html_x('Posts Ticker Number', 'Admin', 'cheerup'),
			'value'   => 8,
			'desc'    => '',
			'type'    => 'number',
			'style'   => 'inline-sm',
			'context' => ['control' => ['key' => 'topbar_ticker', 'value' => 1]],
			'group'   => '_g_topbar',
		],

		[
			'name'    => 'topbar_ticker_tag',
			'label'   => esc_html_x('Posts Ticker Tag', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => 'Enter a tag to limit posts to a tag.',
			'type'    => 'text',
			'style'   => 'inline-sm',
			'context' => ['control' => ['key' => 'topbar_ticker', 'value' => 1]],
			'group'   => '_g_topbar',
		],

		[
			'name'    => 'topbar_top_menu',
			'label'   => esc_html_x('Enable Topbar Navigation', 'Admin', 'cheerup'),
			'value'   => 0,
			'desc'    => esc_html_x('Enabling this will disable topbar posts ticker.', 'Admin', 'cheerup'),
			'type'    => 'toggle',
			'style'   => 'inline-sm',
			'classes' => 'sep-bottom',
			'context' => ['control' => ['key' => 'header_layout', 'value' => ['nav-below-b', 'compact']]],
			'group'   => '_g_topbar',
		],

		[
			'name'  => 'css_topbar_no_shadow',
			'label' => esc_html_x('Remove Shadow', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'checkbox',
			'value' => 0,
			'css'   => [
				'.top-bar-content' => ['props' => ['box-shadow' => 'none']]
			],
			'context' => [['key' => 'topbar_style', 'value' => 'light']],
			'group'   => '_g_topbar',
		]
];

// Topbar: Background
$top_bar_bg = [
	'name'    => 'css_topbar_bg_light',
	'label'   => esc_html_x('Background Color', 'Admin', 'cheerup'),
	'value'   => '',
	'desc'    => '',
	'type'    => 'color',
	// 'style'   => 'inline-sm',
	'css'     => [
		// Higher specifity as a skin may override it.
		'.top-bar.light'   => ['props' => ['--topbar-bg' => '%s', '--topbar-bc' => '%s']],
		'.top-bar-content' => ['props' => []],
	],
	'context' => [
		'control' => [
			'key'   => 'topbar_style',
			'value' => 'light'
		]
	],
	'group' => '_g_topbar',
];

$fields_general[] = $top_bar_bg;
$fields_general[] = array_replace($top_bar_bg, [
	'name'    => 'css_topbar_bg_dark',
	'css'     => [
		'.top-bar.dark' => ['props' => ['--topbar-dark-bg' => '%s', '--topbar-bc' => '%s']],
	],
	'context' => [
		'control' => [
			'key'   => 'topbar_style',
			'value' => 'dark'
		]
	],
]);

/**
 * Group: Social Icons
 */
$fields_general[] = [
	'name'  => '_g_header_social',
	'label' => esc_html_x('Social Icons', 'Admin', 'cheerup'),
	'type'  => 'group',
	'style' => 'collapsible',
];


// -- Social Icons color
$icons_color = [
	'name'  => 'css_topbar_social',
	'value' => '',
	'label' => esc_html_x('Icons Color', 'Admin', 'cheerup'),
	'desc'  => '',
	'type'  => 'color',
	'css'   => [
		// 
		'.main-head .top-bar, .search-alt .dark, .main-head.compact .dark .social-icons' => ['props' => ['--topbar-social-color' => '%s']],
		'vars'                                                                           => ['props' => ['--topbar-social-color' => '%s']],
	],
	'context' => [
		'control' => [
			'key'   => 'topbar_style',
			'value' => 'light'
		]
	],
	'group' => '_g_header_social'
];

$fields_general[] = $icons_color;
$fields_general[] = array_replace($icons_color, [
	'name'    => 'css_topbar_social_dark',
	'context' => [
		'control' => [
			'key'   => 'topbar_style',
			'value' => 'dark'
		]
	],
]);

// -- Social Icons size
$icons_color = [
	'name'  => 'css_topbar_social_size',
	'value' => '',
	'label' => esc_html_x('Icons Size', 'Admin', 'cheerup'),
	'desc'  => '',
	'type'  => 'slider',
	'css'   => [
		'.main-head .social-icons a' => ['props' => ['font-size' => '%spx']],
	],
	'devices' => true,
	'context' => [
		'control' => [
			'key'     => 'header_layout',
			'value'   => ['simple', 'simple-boxed'],
			'compare' => '!='
		]
	],
	'group' => '_g_header_social'
];
$fields_general[] = $icons_color;

// Separate icons size setting for simple and simple-boxed
$fields_general[] = array_replace($icons_color, [
	'name'    => 'css_header_social_size',
	'context' => [
		'control' => [
			'key'     => 'header_layout',
			'value'   => ['simple', 'simple-boxed'],
		]
	],
]);

$fields_general[] = [
	'label'   => esc_html_x('Services to Show', 'Admin', 'cheerup'),
	'name'    => 'topbar_social',
	'value'   => ['facebook', 'twitter', 'instagram'],
	'desc'    => sprintf(
		esc_html_x('NOTE: Configure these icons URLs from %1$sSocial Media Links%2$s.', 'Admin', 'cheerup'),
		'<a href="#" class="focus-link is-with-nav" data-section="bunyad-misc-social">',
		'</a>'
	),
	'type'    => 'checkboxes',

	// Show only if header layout is default
	'context' => [$contexts['headers_with_social']],
	'options' => [
		'facebook'   => esc_html_x('Facebook', 'Admin', 'cheerup'),
		'twitter'    => esc_html_x('Twitter', 'Admin', 'cheerup'),
		'gplus'      => esc_html_x('Google Plus', 'Admin', 'cheerup'),
		'instagram'  => esc_html_x('Instagram', 'Admin', 'cheerup'),
		'pinterest'  => esc_html_x('Pinterest', 'Admin', 'cheerup'),
		'vimeo'      => esc_html_x('Vimeo', 'Admin', 'cheerup'),
		'bloglovin'  => esc_html_x('BlogLovin', 'Admin', 'cheerup'),
		'rss'        => esc_html_x('RSS', 'Admin', 'cheerup'),
		'youtube'    => esc_html_x('Youtube', 'Admin', 'cheerup'),
		'dribbble'   => esc_html_x('Dribbble', 'Admin', 'cheerup'),
		'tumblr'     => esc_html_x('Tumblr', 'Admin', 'cheerup'),
		'linkedin'   => esc_html_x('LinkedIn', 'Admin', 'cheerup'),
		'flickr'     => esc_html_x('Flickr', 'Admin', 'cheerup'),
		'soundcloud' => esc_html_x('SoundCloud', 'Admin', 'cheerup'),
		'lastfm'     => esc_html_x('Last.fm', 'Admin', 'cheerup'),
		'vk'         => esc_html_x('VKontakte', 'Admin', 'cheerup'),
		'steam'      => esc_html_x('Steam', 'Admin', 'cheerup'),		
	],
	'group' => '_g_header_social'
];


/**
 * Fields: Navigation
 */
$fields_nav[] = [
	'name'    => 'css_nav_font',
	'label'   => esc_html_x('Menu Font Family', 'Admin', 'cheerup'),
	'value'   => '',
	'type'    => 'font-family',
	'css'     => [
		'.navigation' => ['props' => ['font-family' => '%s']],
	]
];

$nav_typo = [
	[
		'name'             => 'css_nav_typo_{key}',
		'label'            => esc_html_x('Top-Level Typography', 'Admin', 'cheerup'),
		'desc'             => '',
		'type'             => 'group',
		'group_type'       => 'typography',
		'style'            => 'edit',
		'css'              => '',
		'devices'          => false,
		'controls'         => ['family', 'size', 'weight', 'style', 'transform', 'spacing'],
		'controls_options' => [
			'size' => [
				'css' => [
					'{selector}' => [
						'all' => ['props' => ['font-size' => '%spx']],
					
						// Scale down with min of 10px.
						'large' => ['props' => ['font-size' => 'calc(10px + (%spx - 10px) * .7)'], 'value_key' => 'global']
					]
				]
			],
		],
		// value is provided below with overrides.
		'context' => [['key' => 'header_layout']],
	],
	[
		'name'       => 'css_drop_typo_{key}',
		'label'      => esc_html_x('Dropdown Typography', 'Admin', 'cheerup'),
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '',
		'devices'    => false,
		'context'    => [['key' => 'header_layout']],
	],
	[
		'name'    => 'css_nav_space_{key}',
		'label'   => esc_html_x('Space Between Items', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'number',
		'style'   => 'inline-sm',
		'context' => [['key' => 'header_layout']],
	],
];

Bunyad::helpers()->repeat_options(
	$nav_typo,
	[
		'inline' => [
			'context'    => [['value' => ['simple', 'simple-boxed', 'compact']]],
			'fields_css' => [
				'.navigation.inline .menu > li > a',
				'.navigation.inline .menu > li li a',
				[
					'.navigation.inline' => ['props' => ['--nav-items-space' => '%spx']]
				],
			],
		],
		'default' => [
			'context'    => [['value' => ['simple', 'simple-boxed', 'compact'], 'compare' => '!=']],
			'fields_css' => [
				'.navigation:not(.inline) .menu > li > a',
				'.navigation:not(.inline) .menu > li li a',
				[
					'.navigation:not(.inline)' => ['props' => ['--nav-items-space' => '%spx']]
				]
			],
		],
	],
	$fields_nav,
	['replace_in' => []]
);

$fields_nav[] = [
	'name'  => 'css_nav_arrows',
	'label' => esc_html_x('Hide Dropdown Arrows', 'Admin', 'cheerup'),
	'desc'  => 'Hide dropdown arrows at top-level menu.',
	'type'  => 'checkbox',
	'value' => 0,
	// 'style' => 'inline-sm',
	'css'   => [
		'.navigation .menu > li > a:after' => ['props' => ['display' => 'none']]
	]
];

$fields_nav[] = [
	'name'       => 'css_mega_titles_typo',
	'value'      => '',
	'label'      => esc_html_x('Mega Menu: Titles Typography', 'Admin', 'cheerup'),
	'desc'       => '',
	'type'       => 'group',
	'group_type' => 'typography',
	'style'      => 'edit',
	'css'        => '.mega-menu .recent-posts .post-title',
];

/**
 * Group: Colors
 */
$fields_nav[] = [
	'name'  => '_g_nav_colors',
	'label' => esc_html_x('Navigation Colors ', 'Admin', 'cheerup'),
	'type'  => 'group',
	'style' => 'collapsible',
];

$nav_colors = [
	[
		'name'  => 'css_nav_bg_{key}',
		'value' => '',
		'label' => esc_html_x('Nav Background', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.navigation.has-bg:not(._)' => ['props' => [
				'background-color' => '%s',
				'border-color'     => '%s'
			]],
		],
		'context' => [$contexts['headers_separate_nav']],
		'group'   => '_g_nav_colors',
	],
	[
		'name'    => 'css_nav_color_{key}',
		'value'   => '',
		'label'   => esc_html_x('Top-level Links Color', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],
	[
		'name'    => 'css_nav_hover_{key}',
		'value'   => '',
		'label'   => esc_html_x('Top-level Hover', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],
	[
		'name'    => 'css_nav_active_{key}',
		'value'   => '',
		'label'   => esc_html_x('Top-level Active', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],
	[
		'name'    => 'css_nav_arrow_color_{key}',
		'value'   => '',
		'label'   => esc_html_x('Arrow Color', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],
];

Bunyad::helpers()->repeat_options(
	$nav_colors,
	[
		'dark' => [
			'context' => [
				// Adding 1 here as a context already exists at 0
				1 => [
					'key'             => 'nav_style', 
					'value'           => 'dark',
					'skipParentCheck' => true
				]
			],
			'fields_css' => [
				['vars' => ['props' => ['--nav-dark-bg' => '%s']]],
				['.navigation.dark' => ['props' => ['--nav-color' => '%s']]],
				['.navigation.dark' => ['props' => [
					'--nav-hover-color'      => '%s', 
					'--nav-blip-hover-color' => '%s'
				]]],
				['.navigation.dark' => ['props' => ['--nav-active-color' => '%s']]],
				['.navigation.dark' => ['props' => ['--nav-blip-color' => '%s']]],
			]
		],
		'light' => [
			'context' => [
				1 => [
					'key'             => 'nav_style', 
					'value'           => 'light',
					'skipParentCheck' => true
				],
			],
			'fields_css' => [
				[],
				['vars' => ['props' => ['--nav-color' => '%s']]],
				['vars' => ['props' => [
					'--nav-hover-color'      => '%s', 
					'--nav-blip-hover-color' => '%s'
				]]],
				['vars' => ['props' => ['--nav-active-color' => '%s']]],
				['vars' => ['props' => ['--nav-blip-color' => '%s']]],
			]
		],
	],
	$fields_nav,
	['replace_in' => []]
);

// -- Colors: Drops
$nav_colors_drops = [
	[
		'name'    => 'css_drop_bg_{key}',
		'value'   => '',
		'label'   => esc_html_x('Dropdown Background', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],
	[
		'name'    => 'css_drop_color_{key}',
		'value'   => '',
		'label'   => esc_html_x('Dropdown Links', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],
	[
		'name'    => 'css_drop_active_{key}',
		'value'   => '',
		'label'   => esc_html_x('Dropdown Links Hover/Active', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],

	[
		'name'  => 'css_mega_title_color_{key}',
		'value' => '',
		'label' => esc_html_x('Mega Menu: Post Titles', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.navigation .mega-menu .recent-posts .post-title' => ['props' => ['color' => '%s']]
		],
		'group'   => '_g_nav_colors',
	],

	[
		'name'    => 'css_drop_sep_{key}',
		'value'   => '',
		'label'   => esc_html_x('Separator Lines', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'color',
		'group'   => '_g_nav_colors',
	],
];

Bunyad::helpers()->repeat_options(
	$nav_colors_drops,
	[
		'dark' => [
			'context' => [
				// Adding 1 here as a context already exists at 0
				1 => [
					'key'             => 'nav_style', 
					'value'           => 'dark',
					'skipParentCheck' => true
				]
			],
			'fields_css' => [
				['.navigation.dark' => ['props' => ['--nav-drop-bg' => '%s']]],
				[
					'.navigation.dark' => ['props' => ['--nav-drop-color' => '%s']],
					// '.navigation.dark .mega-menu .recent-posts .post-title' => ['props' => ['color' => '%s']]
				],
				[
					'.navigation.dark' => ['props' => ['--nav-drop-active-color' => '%s']],
					// '.navigation.dark .mega-menu .recent-posts .post-title:hover' => ['props' => ['color' => '%s']]
				],
				[],
				['.navigation.dark' => ['props' => ['--nav-drop-sep-color' => '%s']]],
			]
		],
		'light' => [
			'context' => [
				1 => [
					'key'             => 'nav_style', 
					'value'           => 'light',
					'skipParentCheck' => true
				],
			],
			'fields_css' => [
				[
					'.navigation'                                       => ['props' => ['--nav-drop-bg' => '%s']],
					'.navigation .menu ul, .navigation .menu .sub-menu' => [
						'props' => ['border-color' => '%s']
					],
				],
				[
					'.navigation' => ['props' => ['--nav-drop-color' => '%s']],
					// '.mega-menu .recent-posts .post-title' => ['props' => ['color' => '%s']],
				],
				[
					'.navigation' => ['props' => ['--nav-drop-active-color' => '%s']],
					// '.mega-menu .recent-posts .post-title:hover' => ['props' => ['color' => '%s']]
				],
				[],
				['vars' => ['props' => ['--nav-drop-sep-color' => '%s']]],
			]
		],
	],
	$fields_nav,
	['replace_in' => []]
);

/**
 * Combined settings
 */
$options['header'] = [
	'title'    => esc_html_x('Header/Logo & Nav', 'Admin', 'cheerup'),
	'id'       => 'header',
	'sections' => [
		[
			'id'     => 'header-topbar',
			'title'  => esc_html_x('General & Top Bar', 'Admin', 'cheerup'),
			'fields' => $fields_general,
		],

		[
			'id'     => 'header-nav',
			'title'  => esc_html_x('Navigation Design', 'Admin', 'cheerup'),
			'desc'   => esc_html_x('These settings only apply to desktop navigation.', 'Admin', 'cheerup'),
			'fields' => $fields_nav,
		],
		
		[
			'id'     => 'header-logo',
			'title'  => esc_html_x('Logos', 'Admin', 'cheerup'),
			'fields' => [
		
				[
					'name'    => 'image_logo',
					'value'   => '',
					'label'   => esc_html_x('Logo Image', 'Admin', 'cheerup'),
					'desc'    => esc_html_x('Highly recommended to use a logo image in PNG format.', 'Admin', 'cheerup'),
					'type'    => 'upload',
					'options' => [
						'type'  => 'image',
					],
				],
				
				[
					'name'    => 'image_logo_2x',
					'label'   => esc_html_x('Logo Image Retina (2x)', 'Admin', 'cheerup'),
					'value'   => '',
					'desc'    => esc_html_x('This will be used for higher resolution devices like iPhone/Macbook.', 'Admin', 'cheerup'),
					'type'    => 'upload',
					'options' => [
						'type'  => 'image',
					],
				],
				
				[
					'name'    => 'mobile_logo_2x',
					'value'   => '',
					'label'   => esc_html_x('Mobile Logo Retina (2x - Optional)', 'Admin', 'cheerup'),
					'desc'    => esc_html_x('Use a different logo for mobile devices. Upload a logo twice the normal width and height.', 'Admin', 'cheerup'),
					'type'    => 'upload',
					'options' => [
						'type'  => 'media',
					],
				],

				[
					'name'    => 'css_logo_padding_top',
					'value'   => '',
					'label'   => esc_html_x('Logo Padding Top', 'Admin', 'cheerup'),
					'desc'    => '',
					'type'    => 'number',
					'context' => ['control' => ['key' => 'header_layout', 'value' => ['simple', 'simple-boxed', 'compact'], 'compare' => '!=']],
					'css'     => [
						'.main-head:not(.simple):not(.compact):not(.logo-left) .title' => [
							'props' => ['padding-top' => '%spx !important']
						]
					],
				],

				[
					'name'    => 'css_logo_padding_bottom',
					'value'   => '',
					'label'   => esc_html_x('Logo Padding Bottom', 'Admin', 'cheerup'),
					'desc'    => '',
					'type'    => 'number',
					'context' => ['control' => ['key' => 'header_layout', 'value' => ['simple', 'simple-boxed', 'compact'], 'compare' => '!=']],
					'css'     => [
						'.main-head:not(.simple):not(.compact):not(.logo-left) .title' => [
							'props' => ['padding-bottom' => '%spx !important']
						]
					],
				],
		
			], // fields
		
		], // section
					
	], // sections	
];

return $options;