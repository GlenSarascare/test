<?php
/**
 * Post & Listings Option
 */

$options = is_array($options) ? $options : [];

/**
 * General / Shared Settings.
 */
$fields_common = [
	// [
	// 	'name' => '_n_listings_info',
	// 	'type'  => 'message',
	// 	'label' => 'Applies to Listings & Archives',
	// 	'text'  => 'The settings in this section apply to any of the home listings, posts blocks, and listings in categories/archives.',
	// 	'style' => 'message-info',
	// ],
	[
		'name'    => 'pagination_style',
		'label'   => esc_html_x('Pagination Style', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'radio',
		'options' => [
			''          => esc_html_x('Older / Newer', 'Admin', 'cheerup'),
			'numbers'   => esc_html_x('Page Numbers', 'Admin', 'cheerup'),
			'load-more' => esc_html_x('Load More', 'Admin', 'cheerup'),
		],
	],
	[
		'name'    => 'post_format_icons',
		'label'   => esc_html_x('Show Post Format Icons', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => esc_html_x('Post format icons (video, gallery) can be enabled on a few listing styles such as list and grid.', 'Admin', 'cheerup'),
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],
	[
		'name'    => 'post_read_more_text',
		'label'   => esc_html_x('Read More Text', 'Admin', 'cheerup'),
		'value'   => esc_html__('Read More', 'cheerup'),
		'desc'    => esc_html_x('Text used on all read more buttons and links.', 'Admin', 'cheerup'),
		'type'    => 'text',
		// 'style'   => 'inline-sm',
	],
	[
		'name'  => '_n_listings_meta',
		'type'  => 'message',
		'label' => 'Post Meta Settings',
		'text'  => 'While some post meta settings are available locally, most are in the global settings. You can find them in 
			<a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-global">Global Posts Settings</a>',
		'style' => 'message-info',
	],

	/**
	 * Group: Design General
	 */
	[
		'name'      => '_g_listings_design',
		'label'     => esc_html_x('Design: General', 'Admin', 'cheerup'),
		'desc'      => 'Most override settings from global <a href="#" class="focus-link is-with-nav" data-section="sphere-style">Colors & Fonts</a>.',
		'type'      => 'group',
		'style'     => 'collapsible',
		'collapsed' => false,

	],
		[
			'name'  => 'css_excerpts_color',
			'value' => '',
			'label' => esc_html_x('Excerpts Color', 'Admin', 'cheerup'),
			// 'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.post-excerpt' => ['props' => ['color' => '%s']],
			],
			'group' => '_g_listings_design',
		],
		[
			'name'       => 'css_excerpts_typo',
			'value'      => '',
			'label'      => esc_html_x('Excerpts Typography', 'Admin', 'cheerup'),
			'desc'       => '',
			'type'       => 'group',
			'group_type' => 'typography',
			'style'      => 'edit',
			'css'        => '.post-excerpt',
			'group'      => '_g_listings_design',
		],


	/**
	 * Group: Design Read More
	 */
	[
		'name'  => '_g_design_read_more',
		'label' => esc_html_x('Design: Read More', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],
	
		[
			'name'    => 'read_more_style',
			'label'   => esc_html_x('Read More Style', 'Admin', 'cheerup'),
			'value'   => 'btn',
			'desc'    => '',
			'type'    => 'select',
			'options' => [
				'basic' => esc_html_x('Text Style', 'Admin', 'cheerup'),
				'btn'   => esc_html_x('Button Style', 'Admin', 'cheerup'),
			],
			'classes' => 'sep-below',
			'group'   => '_g_design_read_more',
		],

		[
			'name'    => '_n_read_more_style',
			'type'    => 'message',
			'label'   => '',
			'text'    => 'There are customizations active that may change the look of the selected style. <a href="#" class="preset-reset">Click here</a> to reset them to defaults.',
			'style'   => 'message-alert',
			'classes' => 'bunyad-cz-hidden',
			'group'   => '_g_design_read_more',
		],

		[
			'name'    => 'css_read_more_bg',
			'label'   => esc_html_x('Button Background', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'color',
			'css'     => [
				'.read-more-btn' => ['props' => ['background-color' => '%s']]
			],
			'group'    => '_g_design_read_more',
			'context'  => [['key' => 'read_more_style', 'value' => 'basic', 'compare' => '!=']],
			// 'preserve' => true,
		],

		[
			'name'    => 'css_read_more_border',
			'label'   => esc_html_x('Border Color', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'color',
			'css'     => [
				'.read-more-btn, .read-more-basic' => ['props' => ['border-color' => '%s']]
			],
			'group'   => '_g_design_read_more',
		],

		[
			'name'    => 'css_read_more_text',
			'label'   => esc_html_x('Text Color', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'color',
			'css'     => [
				'.read-more-btn, .read-more-basic' => ['props' => ['color' => '%s']]
			],
			'group'   => '_g_design_read_more',
		],

		[
			'name'    => 'css_read_more_hover',
			'label'   => esc_html_x('Hover Color', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'color',
			'css'     => [
				'.read-more-btn:hover, .read-more-basic:hover' => ['props' => ['color' => '%s']]
			],
			'group'   => '_g_design_read_more',
		],

		[
			'name'    => 'css_read_more_bg_hover',
			'label'   => esc_html_x('Button Hover Background', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'color',
			'css'     => [
				'.read-more-btn:hover' => ['props' => [
					'background'   => '%s', 
					'border-color' => '%s'
				]]
			],
			'context'  => [['key' => 'read_more_style', 'value' => 'basic', 'compare' => '!=']],
			'preserve' => true,
			'group'    => '_g_design_read_more',
		],

		[
			'name'       => 'css_read_more_typo',
			'label'      => esc_html_x('Font & Typography', 'Admin', 'cheerup'),
			'value'      => '',
			'desc'       => '',
			'type'       => 'group',
			'group_type' => 'typography',
			'style'      => 'edit',
			'devices'    => true,
			'css'        => '.read-more-btn, .read-more-basic',
			'group'      => '_g_design_read_more',
		],

		[
			'name'    => 'css_read_more_padding',
			'label'   => esc_html_x('Button Padding', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => '',
			'type'    => 'dimensions',
			'devices' => true,
			'css'     => [
				'.read-more-btn' => ['dimensions' => 'padding']
			],
			'context'  => [['key' => 'read_more_style', 'value' => 'basic', 'compare' => '!=']],
			'preserve' => true,
			'group'    => '_g_design_read_more',
		],
];

/**
 * Large Posts Styles
 */
$fields_large = [
	/**
	 * Group: Listing: Classic / Large
	 */
	// [
	// 	'name'  => '_g_listings_classic',
	// 	'label' => esc_html_x('Listing: Classic / Large', 'Admin', 'cheerup'),
	// 	'type'  => 'group',
	// 	'style' => 'collapsible',
	// ],

		[
			'name'    => 'post_large_style',
			'label'   => esc_html_x('Large Posts Style', 'Admin', 'cheerup'),
			'value'   => 'large',
			'desc'    => esc_html_x('When using a listing that uses large post, there are two styles to choose from.', 'Admin', 'cheerup'),
			'type'    => 'select',
			'options' => [
				'large'   => esc_html_x('Style 1: Default - Title Below', 'Admin', 'cheerup'),
				'large-b' => esc_html_x('Style 2: Title Above', 'Admin', 'cheerup'),
				'large-c' => esc_html_x('Style 3: Overlay Bottom & No Excerpt', 'Admin', 'cheerup'),
			],
		],
		[
			'name'    => 'post_body',
			'label'   => esc_html_x('Post Body', 'Admin', 'cheerup'),
			'value'   => 'full',
			'type'    => 'radio',
			'desc'    => esc_html_x('Note: Only applies to Blog Listing style. Both support WordPress <!--more--> teaser.', 'Admin', 'cheerup'),
			'options' => [
				'full'    => esc_html_x('Full Post', 'Admin', 'cheerup'),
				'excerpt' => esc_html_x('Excerpts', 'Admin', 'cheerup'),
			],
		],
		[
			'name'    => 'post_large_featured_crop',
			'label'   => esc_html_x('Crop Featured Image', 'Admin', 'cheerup'),
			'value'   => 0,
			'desc'    => esc_html_x('Crop featured image for consistent sizing. For single post/article page crop settings, go to Customizer > Single Post Page.', 'Admin', 'cheerup'),
			'type'    => 'toggle',
			'style'   => 'inline-sm',
		],
		[
			'name'    => 'post_large_featured_ratio',
			'label'   => esc_html_x('Image Aspect Ratio', 'Admin', 'cheerup'),
			'desc'    => 'Does not apply to Cover and Creative style.',
			'value'   => '',
			'type'    => 'select',
			'style'   => 'inline-sm',
			'options' => $_common['ratio_options'],
			'context' => [['key' => 'post_large_featured_crop', 'value' => 1]],
		],
		[
			'name'        => 'post_large_featured_ratio_custom',
			'label'       => esc_html_x('Custom Ratio', 'Admin', 'cheerup'),
			'value'       => '',
			'desc'        => 'Calculated using width/height.',
			'type'        => 'number',
			'style'       => 'inline-sm',
			'classes'     => 'sep-bottom',
			'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
			'css'         => [
				'.large-post .ratio-is-custom' => ['props' => ['padding-bottom' => 'calc(100% / %s)']]
			],
			'transport' => 'refresh',
			'context'   => [
				['key' => 'post_large_featured_ratio', 'value' => 'custom'],
				['key' => 'post_large_featured_crop', 'value' => 1]
			],
		],

		[
			'name'    => 'post_footer_blog',
			'label'   => esc_html_x('Enable Post Footer', 'Admin', 'cheerup'),
			'value'   => 1,
			'desc'    => esc_html_x('Post footer is the extra info shown below post such as author, read more, and social icons.', 'Admin', 'cheerup'),
			'type'    => 'toggle',
			'style'   => 'inline-sm',
		],
			[
				'name'    => 'post_footer_author',
				'label'   => esc_html_x('Show Author', 'Admin', 'cheerup'),
				'value'   => 1,
				'type'    => 'toggle',
				'style'   => 'inline-sm',
				'context' => [['key' => 'post_footer_blog', 'value' => 1]],
			],	
			[
				'name'    => 'post_footer_read_more',
				'label'   => esc_html_x('Show Read More', 'Admin', 'cheerup'),
				'value'   => 1,
				'type'    => 'toggle',
				'style'   => 'inline-sm',
				'context' => [['key' => 'post_footer_blog', 'value' => 1]],
			],			
			[
				'name'    => 'post_footer_social',
				'label'   => esc_html_x('Show Social', 'Admin', 'cheerup'),
				'value'   => 1,
				'type'    => 'toggle',
				'style'   => 'inline-sm',
				'context' => [['key' => 'post_footer_blog', 'value' => 1]],
			],

		[
			'name'    => 'post_excerpt_blog',
			'label'   => esc_html_x('Excerpt Words', 'Admin', 'cheerup'),
			'value'   => 150,
			'type'    => 'number',
			'desc'    => '',
			'style'   => 'inline-sm',
			'classes' => 'sep-bottom',
			'context' => [['key' => 'post_body', 'value' => 'excerpt']]
		],

		[
			'name'    => 'css_post_large_title',
			'label'   => esc_html_x('Post Title Size', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => '',
			'type'    => 'slider',
			'devices' => true,
			'css'     => [
				'.large-post .post-title-alt' => [
					// Only for devices. Skip for desktop, for both limited or not.
					'all'    => ['props' => ['font-size' => '%spx']],
					'global' => [],
				],
				'vars' => ['props' => ['--large-post-title' => '%spx']],
			],
		],

		[
			'name'    => 'css_post_large_title_c',
			'label'   => esc_html_x('Post Title (Style 3)', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => '',
			'type'    => 'slider',
			'devices' => true,
			'css'     => [
				'.large-post-c .post-title-alt' => [
					// Only for devices. Skip for desktop, for both limited or not.
					'all'    => ['props' => ['font-size' => '%spx']],
					'global' => [],
				],
				'.large-post-c' => [
					// Only apply to global or desktop.
					'global' => ['props' => ['--large-post-title' => '%spx']],
					'all'    => [],
				],
			],
		],

		[
			'name'       => 'css_post_large_title_typo',
			'label'      => esc_html_x('Title Typography', 'Admin', 'cheerup'),
			'value'      => '',
			'desc'       => '',
			'type'       => 'group',
			'group_type' => 'typography',
			'style'      => 'edit',
			'css'        => '.large-post .post-title-alt',
			'controls'   => ['spacing', 'transform', 'weight', 'style'],
		],

		[
			'name'  => 'css_post_large_body_typo',
			'label' => esc_html_x('Excerpt/Body Typography', 'Admin', 'cheerup'),
			'value' => '',
			'desc'  => sprintf(
				'By default, inherits from %1$sSingle Post%2$s settings. Recommended to use those.',
				'<a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-single-design">',
				'</a>'
			),
			'type'       => 'group',
			'group_type' => 'typography',
			'style'      => 'edit',
			'css'        => '.large-post .post-content',
			'controls'   => ['family', 'size', 'weight', 'line_height', 'spacing'],
		],

		[
			'name'        => 'css_post_large_gap_below',
			'label'       => esc_html_x('Gap Below Posts', 'Admin', 'cheerup'),
			'value'       => '',
			'desc'        => '',
			'type'        => 'slider',
			'devices'     => true,
			'css'         => [
				'.posts-dynamic .large-post, .large-post' => ['props' => ['margin-bottom' => '%spx']]
			],
		],

];

/**
 * Grid / Masonry
 */
$fields_grid = [
	[
		'name'    => 'post_grid_style',
		'label'   => esc_html_x('Grid Posts Style', 'Admin', 'cheerup'),
		'value'   => 'grid',
		'desc'    => esc_html_x('When using a listing that uses grid posts, there are two types of grid posts to choose from', 'Admin', 'cheerup'),
		'type'    => 'select',
		'options' => [
			'grid'   => esc_html_x('Style 1: Default - With Social', 'Admin', 'cheerup'),
			'grid-b' => esc_html_x('Style 2: Centered Text & Read More', 'Admin', 'cheerup'),
			'grid-c' => esc_html_x('Style 3: Cards', 'Admin', 'cheerup')
		],
	],
	[
		'name'    => 'post_grid_masonry',
		'label'   => esc_html_x('Enable Masonry', 'Admin', 'cheerup'),
		'value'   => 0,
		'desc'    => esc_html_x('Enabling masonry makes grid posts display with uncropped images creating a dynamic look.', 'Admin', 'cheerup'),
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],
	[
		'name'    => 'post_grid_equals',
		'label'   => esc_html_x('Equal Columns Height', 'Admin', 'cheerup'),
		'value'   => 0,
		'desc'    => '',
		'type'    => 'toggle',
		'style'   => 'inline-sm',
		'context' => [
			['key' => 'post_grid_masonry', 'value' => 0], 
			['key' => 'post_grid_style', 'value' => 'grid-c']
		]
	],
	[
		'name'    => 'post_grid_align',
		'label'   => esc_html_x('Align Content', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			''       => esc_html_x('Default', 'Admin', 'cheerup'),
			'left'   => esc_html_x('Left', 'Admin', 'cheerup'),
			'center' => esc_html_x('Center', 'Admin', 'cheerup'),
		],
		'css'     => [
			'.grid-post, .grid-post .post-excerpt' => ['props' => ['text-align' => '%s']],
		],
		'transport' => 'refresh',
	],

	//
	// Aspect Ratios
	//

	[
		'name'    => 'post_grid_ratio',
		'label'   => esc_html_x('Image Aspect Ratio', 'Admin', 'cheerup'),
		'desc'    => 'Note: Does not apply when Masonry enabled.',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => $_common['ratio_options'],
	],
	[
		'name'        => 'post_grid_ratio_custom',
		'label'       => esc_html_x('Custom Ratio', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'Calculated using width/height.',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'classes'     => 'sep-bottom',
		'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
		'css'         => [
			'.grid-post .ratio-is-custom' => ['props' => ['padding-bottom' => 'calc(100% / %s)']]
		],
		'transport' => 'refresh',
		'context'   => [['key' => 'post_grid_ratio', 'value' => 'custom']],
	],

	[
		'name'    => 'post_grid_ratio_c2',
		'label'   => esc_html_x('Aspect Ratio - 2 Column', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => $_common['ratio_options'],
	],
	[
		'name'        => 'post_grid_ratio_c2_custom',
		'label'       => esc_html_x('Custom Ratio - 2 Column', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'Calculated using width/height.',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'classes'     => 'sep-bottom',
		'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
		'css'         => [
			'.grid-post-c2 .ratio-is-custom' => ['props' => ['padding-bottom' => 'calc(100% / %s)']]
		],
		'transport' => 'refresh',
		'context'   => [['key' => 'post_grid_ratio_c2', 'value' => 'custom']],
	],

	[
		'name'    => 'post_grid_ratio_c3',
		'label'   => esc_html_x('Aspect Ratio - 3 Column', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => $_common['ratio_options'],
	],
	[
		'name'        => 'post_grid_ratio_c3_custom',
		'label'       => esc_html_x('Custom Ratio - 3 Column', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'Calculated using width/height.',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'classes'     => 'sep-bottom',
		'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
		'css'         => [
			'.grid-post-c3 .ratio-is-custom' => ['props' => ['padding-bottom' => 'calc(100% / %s)']]
		],
		'transport' => 'refresh',
		'context'   => [['key' => 'post_grid_ratio_c3', 'value' => 'custom']],
	],
	// -- Aspect Ratios.

	/**
	 * Group: Grid Spacing
	 */
	[
		'name'  => '_g_post_grid_spacing',
		'label' => esc_html_x('Grid Spacings', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],
		[
			'name'        => 'css_post_grid_gap',
			'label'       => esc_html_x('Gap On Sides', 'Admin', 'cheerup'),
			'value'       => '',
			'desc'        => 'Space between posts on the right.',
			'type'        => 'slider',
			'classes'     => 'sep-top',
			'devices'     => true,
			// 'input_attrs' => ['min' => 1, 'max' => 3.5, 'step' => 1],
			'css'         => [
				'.posts-dynamic.grid' => ['props' => ['--grid-gutter' => '%spx']]
			],
			'group'      => '_g_post_grid_spacing',
		],

		[
			'name'        => 'css_post_grid_gap_c3',
			'label'       => esc_html_x('Gap On Sides - 3 Col', 'Admin', 'cheerup'),
			'value'       => '',
			'desc'        => '',
			'type'        => 'slider',
			'devices'     => true,
			// 'input_attrs' => ['min' => 1, 'max' => 3.5, 'step' => 1],
			'css'         => [
				'.posts-dynamic.has-grid-3' => ['props' => ['--grid-gutter' => '%spx']]
			],
			'group'      => '_g_post_grid_spacing',
		],

		[
			'name'        => 'css_post_grid_gap_below',
			'label'       => esc_html_x('Gap Below Posts', 'Admin', 'cheerup'),
			'value'       => '',
			'desc'        => '',
			'type'        => 'slider',
			'devices'     => true,
			'css'         => [
				'.posts-dynamic .grid-post' => ['props' => ['margin-bottom' => '%spx']],
				'.posts-dynamic:not(.is-mixed)' => ['props' => ['margin-bottom' => '-%spx']]
			],
			'group'      => '_g_post_grid_spacing',
		],

	/**
	 * Group: Post Meta
	 */
	[
		'name'  => '_g_post_grid_meta',
		'label' => esc_html_x('Post Meta', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

];

Bunyad::helpers()->repeat_options(
	$_common['listing_meta_tpl'],
	['grid' => [
		'group' => '_g_post_grid_meta',
	]],
	$fields_grid,
	['replace_in' => ['context']]
);

$fields_grid = array_merge($fields_grid, [
	[
		'name'    => 'post_footer_grid',
		'label'   => esc_html_x('Post Footer (Social + Likes)', 'Admin', 'cheerup'),
		'desc'    => esc_html_x('Area below posts for Social Icons.', 'Admin', 'cheerup'),
		'value'   => 1,
		'type'    => 'checkbox',
		// 'style'   => 'inline-sm',
		'context' => [['key' => 'post_grid_style', 'value' => 'grid']]
	],
	[
		'name'    => 'post_grid_read_more',
		'label'   => esc_html_x('Read More Button', 'Admin', 'cheerup'),
		'desc'    => sprintf(
			'Enables read more button. Button text can be set from %1$sCommon Shared Settings%2$s.',
			'<a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-listings-common">',
			'</a>'
		),
		'value'   => 0,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],
	[
		'name'    => 'post_grid_show_excerpt',
		'label'   => esc_html_x('Show Excerpt', 'Admin', 'cheerup'),
		'value'   => 1,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],

	[
		'name'    => 'post_excerpt_grid',
		'label'   => esc_html_x('Excerpt Words', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => 28,
		'type'    => 'number',
		'style'   => 'inline-sm',
	],
	[
		'name'    => 'css_post_grid_title',
		'label'   => esc_html_x('Post Title Size', 'Admin', 'cheerup'),
		'desc'    => 'Affects sizes in all columns, unless overriden below.',
		'value'   => '',
		'type'    => 'number',
		'style'   => 'inline-sm',
		'classes' => 'sep-top',
		'css'     => [
			'vars' => ['props' => ['--grid-post-title' => '%spx']]
		],
	],
	[
		'name'    => 'css_post_grid_c2_title',
		'label'   => esc_html_x('Post Title - 2 Column', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.grid-post-c2' => [
				// Only apply to global or desktop.
				'global' => ['props' => ['--grid-post-title' => '%spx']],
				'all'    => [],
			],
			'.grid-post-c2 .post-title-alt' => [
				// Only for devices. Skip for desktop, for both limited or not.
				'all'    => ['props' => ['font-size' => '%spx']],
				'global' => [],
			]
		],
	],
	[
		'name'    => 'css_post_grid_c3_title',
		'label'   => esc_html_x('Post Title - 3 Column', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.grid-post-c3' => [
				// Only apply to global or desktop.
				'global' => ['props' => ['--grid-post-title' => '%spx']],
				'all'    => [],
			],
			'.grid-post-c3 .post-title-alt' => [
				// Only for devices. Skip for desktop, for both limited or not.
				'all'    => ['props' => ['font-size' => '%spx']],
				'global' => [],
			]
		],
	],

	[
		'name'       => 'css_post_grid_title_typo',
		'label'      => esc_html_x('Title Typography', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '.grid-post .post-title-alt',
		'controls'   => ['spacing', 'transform', 'weight', 'style'],
		'group'      => '_g_typo_global',
	],

	[
		'name'    => 'css_post_grid_shadow',
		'label'   => esc_html_x('Disable Box Shadow', 'Admin', 'cheerup'),
		'value'   => 0,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
		'classes' => 'sep-top',
		'css'   => [
			'.grid-post-c' => ['props' => ['box-shadow' => 'none']]
		],
		'context' => [['key' => 'post_grid_style', 'value' => 'grid-c']],
	],

	[
		'name'    => 'css_post_grid_shadow',
		'label'   => esc_html_x('Box Shadow Size', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'number',
		'style'   => 'inline-sm',
		'input_attrs' => ['min' => 0, 'max' => 100, 'step' => 1],
		'css'   => [
			'.grid-post-c' => ['props' => ['--shad-weight' => '%spx']]
		],
		'context' => [['key' => 'post_grid_style', 'value' => 'grid-c']],
	],
	[
		'name'    => 'css_post_grid_shadow_intensity',
		'label'   => esc_html_x('Box Shadow Intensity', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'number',
		'style'   => 'inline-sm',
		'input_attrs' => ['min' => 0, 'max' => 1, 'step' => .01],
		'css'   => [
			'.grid-post-c' => ['props' => ['--shad-intensity' => '%s']]
		],
		'context' => [['key' => 'post_grid_style', 'value' => 'grid-c']],
	],
	[
		'name'    => 'css_post_grid_border_color',
		'label'   => esc_html_x('Box Border Color', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'color',
		// 'style'   => 'inline-sm',
		'css'   => [
			'.grid-post-c' => ['props' => ['border-color' => '%s']]
		],
		'context' => [['key' => 'post_grid_style', 'value' => 'grid-c']],
	],
	[
		'name'    => 'css_post_grid_border',
		'label'   => esc_html_x('Box Border Width', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'number',
		'style'   => 'inline-sm',
		'css'   => [
			'.grid-post-c' => ['props' => ['border-width' => '%spx']]
		],
		'context' => [['key' => 'post_grid_style', 'value' => 'grid-c']],
	],
]);

/**
 * List Posts
 */
$fields_list = [
	[
		'name'    => 'post_list_style',
		'label'   => esc_html_x('List Posts Style', 'Admin', 'cheerup'),
		'value'   => 'list',
		'desc'    => esc_html_x('When using a listing that uses list posts, there are two types of grid posts to choose from', 'Admin', 'cheerup'),
		'type'    => 'select',
		'options' => [
			'list'   => esc_html_x('Style 1: Default - With Social', 'Admin', 'cheerup'),
			'list-b' => esc_html_x('Style 2: Spacious & Read More', 'Admin', 'cheerup')
		],
	],						
	[
		'name'    => 'post_footer_list',
		'label'   => esc_html_x('Post Footer (Social + Likes)', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => esc_html_x('Area below posts that shows likes count & social icons.', 'Admin', 'cheerup'),
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],

	[
		'name'    => 'post_list_ratio',
		'label'   => esc_html_x('Image Aspect Ratio', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => $_common['ratio_options'],
	],
	[
		'name'        => 'post_list_ratio_custom',
		'label'       => esc_html_x('Custom Ratio', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'Calculated using width/height.',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'classes'     => 'sep-bottom',
		'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
		'css'         => [
			'.list-post .ratio-is-custom' => ['props' => ['padding-bottom' => 'calc(100% / %s)']]
		],
		'transport' => 'refresh',
		'context'   => [['key' => 'post_list_ratio', 'value' => 'custom']],
	],

	[
		'name'        => 'post_list_media_max_width',
		'label'       => esc_html_x('Image Width %', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => '',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'classes'     => 'sep-bottom',
		'input_attrs' => ['min' => 1, 'max' => 100, 'step' => 1],
		'css'         => [
			'.list-post .post-thumb' => [
				'@media (min-width: 541px)' => [
					'props'     => ['width' => '%s%', 'max-width' => 'initial'],
					'value_key' => 'main'
				],
			]
		],
	],
	[
		'name'    => 'post_excerpt_list',
		'label'   => esc_html_x('Excerpt Words', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => 24,
		'type'    => 'number',
		'style'   => 'inline-sm',
	],

	[
		'name'    => 'css_post_list_title',
		'label'   => esc_html_x('Post Title Size', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'number',
		'style'   => 'inline-sm',
		'css'     => [
			'.list-post' => ['props' => ['--list-post-title' => '%spx']]
		],
	],

	[
		'name'       => 'css_post_list_title_typo',
		'label'      => esc_html_x('Title Typography', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '.list-post .post-title',
		'controls'   => ['spacing', 'transform', 'weight', 'style'],
		'group'      => '_g_typo_global',
	],

	/**
	 * Group: Post Meta
	 */
	[
		'name'  => '_g_post_list_meta',
		'label' => esc_html_x('Post Meta', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],
];

Bunyad::helpers()->repeat_options(
	$_common['listing_meta_tpl'],
	[
		'list' => [
			'group' => '_g_post_list_meta',
		]
	],
	$fields_list,
	['replace_in' => ['context']]
);

/**
 * Block Headings
 */
$block_headings = [
	/**
	 * Group: Block Heading Styles
	 */
	[
		'name'  => '_g_block_headings',
		'label' => esc_html_x('Design: Block Headings', 'Admin', 'cheerup'),
		'desc'  => 'These settings apply to Page Builder blocks headings, Homepage Posts Carousel Title, Sidebar Titles (can be overridden from Main Layout & Sidebar > Sidebar Styling) and so on - depending on chosen heading style.',
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'      => 'block_head_style',
		'label'     => esc_html_x('Edit Heading Style', 'Admin', 'cheerup'),
		'desc'      => 'Choose a heading style to edit its styles.',
		'value'     => '',
		'type'      => 'select',
		'transport' => 'postMessage',
		'options'   => ['' => 'Select'] + $_common['heading_options'],
		'group'     => '_g_block_headings',
	]

];

/**
 * Note: Preserve is added, as repeat_options() uses 'context'. These fields are only 
 * displayed after chosen in "Select Heading Style". But, they're global options, 
 * hence always have to be apply.
 */ 
$heading_fields_tpl = [
	[
		'name'  => 'css_bhead_bg_{key}',
		'value' => '',
		'label' => esc_html_x('Heading Background', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.block-head-{key}' => ['props' => ['background-color' => '%s']],
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],
		
	[
		'name'  => 'css_bhead_color_{key}',
		'value' => '',
		'label' => esc_html_x('Heading Color', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.block-head-{key}' => ['props' => ['color' => '%s']]
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],

	[
		'name'       => 'css_bhead_typo_{key}',
		'label'      => esc_html_x('Heading Typography', 'Admin', 'cheerup'),
		'desc'       => '',
		'value'      => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '.block-head-{key} .title',
		'preserve'   => true,
		'group'      => '_g_block_headings',
	],

	[
		'name'  => 'css_bhead_border_{key}',
		'label' => esc_html_x('Heading Border Thickness', 'Admin', 'cheerup'),
		'desc'  => '',
		'value' => '',
		'type'  => 'number',
		'style' => 'inline-sm',
		'css'   => [
			'.block-head-{key}' => ['props' => ['--block-head-bw' => '%dpx']],
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],

	// block-head-d Width
	[
		'name'  => 'css_bhead_sep_width_{key}',
		'label' => esc_html_x('Heading Border Width', 'Admin', 'cheerup'),
		'desc'  => '',
		'value' => '',
		'type'  => 'number',
		'style' => 'inline-sm',
		'css'   => [
			'.block-head-{key} .title:after' => ['props' => ['width' => '%dpx']],
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],


	// block-head-d and block-head-b
	[
		'name'  => 'css_bhead_sep_distance_{key}',
		'label' => esc_html_x('Heading Border Distance', 'Admin', 'cheerup'),
		'desc'  => '',
		'value' => '',
		'type'  => 'number',
		'style' => 'inline-sm',
		'css'   => [
			'.block-head-{key}' => ['props' => ['--sep-distance' => '%dpx']],
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],	

	[
		'name'  => 'css_bhead_border_color_{key}',
		'label' => esc_html_x('Heading Border Color', 'Admin', 'cheerup'),
		'desc'  => '',
		'value' => '',
		'type'  => 'color',
		'css'   => [
			'.block-head-{key}' => ['props' => ['--block-head-bc' => '%s']],
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],

	[
		'name'    => 'css_bhead_align_{key}',
		'label'   => esc_html_x('Heading Text Align', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline',
		'options' => [
			''       => esc_html_x('Default', 'Admin', 'cheerup'),
			'left'   => esc_html_x('Left', 'Admin', 'cheerup'),
			'center' => esc_html_x('Center', 'Admin', 'cheerup'),
			'right'  => esc_html_x('Right', 'Admin', 'cheerup'),
		],
		'css'   => [
			'.block-head-{key}'              => ['props' => ['text-align' => '%s']],
			'.block-head-{key} .title:after' => [
				'props' => [
					'condition' => [
						'left'  => ['margin-left' => '0'],
						'right' => ['margin-right' => '0'],
					]
				],
			]
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],

	[
		'name'    => 'css_bhead_padding_{key}',
		'label'   => esc_html_x('Heading Padding', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'dimensions',
		'devices' => true,
		'css'     => [
			'.block-head-{key}' => ['dimensions' => 'padding'],
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],

	[
		'name'  => 'css_bhead_margin_bot_{key}',
		'label' => esc_html_x('Heading Margin Below', 'Admin', 'cheerup'),
		'desc'  => '',
		'value' => 35,
		'type'  => 'slider',
		'css'   => [
			'.block-head-{key}' => ['props' => ['margin-bottom' => '%spx']],
		],
		'preserve' => true,
		'group'    => '_g_block_headings',
	],
];

Bunyad::helpers()->repeat_options(
	$heading_fields_tpl,
	[
		'widget' => [
			'context' => [['key' => 'block_head_style', 'value' => 'block-head-widget']],
			'skip'    => ['css_bhead_sep_distance_{key}', 'css_bhead_sep_width_{key}'],
		],

		'legacy' => [
			'context' => [['key' => 'block_head_style', 'value' => 'block-head-legacy']],
			'skip'    => [
				'css_bhead_bg_{key}', 
				'css_bhead_border_{key}', 
				'css_bhead_align_{key}', 
				'css_bhead_sep_distance_{key}', 
				'css_bhead_sep_width_{key}'
			]
		],

		'b' => [
			'context' => [['key' => 'block_head_style', 'value' => 'block-head-b']],
			'skip'    => ['css_bhead_padding_{key}', 'css_bhead_sep_width_{key}']
		],

		'c' => [
			'context' => [['key' => 'block_head_style', 'value' => 'block-head-c']],
			'skip'    => ['css_bhead_sep_distance_{key}', 'css_bhead_sep_width_{key}']
		],

		'd' => [
			'context' => [['key' => 'block_head_style', 'value' => 'block-head-d']],
		],
	],
	$block_headings,
	['replace_in' => ['css']]
);

$fields_common = array_merge($fields_common, $block_headings);

/**
 * Sections setup.
 */
$sections = [
	[
		'id'     => 'posts-listings-common',
		'title'  => esc_html_x('Common Shared Settings', 'Admin', 'cheerup'),
		'desc'   => 'The settings in this section apply to any of the home listings, posts blocks, and listings in categories & archives.',
		'fields' => $fields_common,
	],
	[
		'id'     => 'posts-listings-large',
		'title'  => esc_html_x('Listing: Classic / Large', 'Admin', 'cheerup'),
		'desc'   => '',
		'fields' => $fields_large,
	],

	[
		'id'     => 'posts-listings-grid',
		'title'  => esc_html_x('Listing: Grid / Masonry', 'Admin', 'cheerup'),
		'desc'   => '',
		'fields' => $fields_grid,
	],

	[
		'id'     => 'posts-listings-list',
		'title'  => esc_html_x('Listing: List Posts', 'Admin', 'cheerup'),
		'desc'   => '',
		'fields' => $fields_list,
	],

];

$options['posts-listings'] = [
	'id'       => 'posts-listings',
	'title'    => esc_html_x('Post Listings & Blocks', 'Admin', 'cheerup'),
	'sections' => $sections,
	'desc'     => '',
];

return $options;