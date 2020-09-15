<?php
/**
 * Main layout options
 */
$fields = [
	[
		'name'    => 'custom_width',
		'label'   => esc_html_x('Custom Layout Width/Space', 'Admin', 'cheerup'),
		'value'   => 0,
		'desc'    => esc_html_x('Adjust layout width or padding.', 'Admin', 'cheerup'),
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],

		[
			'name'    => '_n_the_notice',
			'type'    => 'message',
			'label'   => '',
			'text'    => esc_html_x('Careful! The default layouts are optimized for all devices. Change these only if you understand the implications.', 'Admin', 'cheerup'),
			'style'   => 'message-alert',
			'context' => [['key' => 'custom_width', 'value' => 1]]
		],
		[
			'name'    => 'layout_width',
			'label'   => esc_html_x('Layout Main Width', 'Admin', 'cheerup'),
			'desc'    => 'The max width to use. Images are adjusted based on this.',
			'value'   => 1170,
			'type'    => 'slider',
			// 'devices' => true,
			'input_attrs' => ['min' => 960, 'max' => 1920, 'step' => 5],
			'transport'   => 'refresh',
			'css'         => [
				'vars' => ['props' => ['--main-width' => '%spx']],
			],
			'context' => [['key' => 'custom_width', 'value' => 1]]
		],
		[
			'name'        => 'css_layout_width_resp',
			'label'       => esc_html_x('Layout Width Percent', 'Admin', 'cheerup'),
			'desc'        => 'Advanced! Recommended to be used only for mobile devices.',
			'value'       => '',
			'type'        => 'slider',
			'devices'     => true,
			'input_attrs' => ['min' => 20, 'max' => 100, 'step' => 1],
			'css'         => [
				'.wrap' => ['props' => ['width' => '%s%']],
			],
			'context' => [['key' => 'custom_width', 'value' => 1]]
		],
		[
			'name'        => 'css_layout_padding',
			'label'       => esc_html_x('Main Layout Padding', 'Admin', 'cheerup'),
			'desc'        => '',
			'value'       => ['main' => 35, 'medium' => 35, 'small' => 25],
			'type'        => 'slider',
			'devices'     => true,
			'classes'     => 'sep-bottom',
			'input_attrs' => ['min' => 0, 'max' => 250, 'step' => 1],
			'css'         => [
				'.ts-contain, .main' => [
					'all' => ['props' => 
						['padding-left' => '%spx', 'padding-right' => '%spx']
					],
					// We use root vars, so skip main and global.
					'main'   => [],
					'global' => [],
				],
				'vars' => ['props' => ['--wrap-padding' => '%spx']],

			],
			'context' => [['key' => 'custom_width', 'value' => 1]]
		],

	[
		'name'    => 'default_sidebar',
		'label'   => esc_html_x('Default Sidebar', 'Admin', 'cheerup'),
		'value'   => 'right',
		'desc'    => esc_html_x('This setting can be changed per post or page.', 'Admin', 'cheerup'),
		'type'    => 'radio',
		'options' => [
			'none'  => esc_html_x('No Sidebar', 'Admin', 'cheerup'),
			'right' => esc_html_x('Right Sidebar', 'Admin', 'cheerup') 
		],
	],

	[
		'name'    => 'sidebar_sticky',
		'label'   => esc_html_x('Sticky Sidebar', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => esc_html_x('Make the sidebar always stick around while scrolling.', 'Admin', 'cheerup'),
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],
	/**
	 * Group Sidebar Stylings
	 */
	[
		'name'  => '_g_sidebar_style',
		'label' => esc_html_x('Sidebar Styling', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
		// 'collapsed' => false,
	],

		// Fields
		[
			'name'    => 'sidebar_widgets_style',
			'label'   => esc_html_x('Widgets Style', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => '',
			'type'    => 'select',
			'options' => [
				''      => esc_html_x('Default Unboxed', 'Admin', 'cheerup'),
				'boxed' => esc_html_x('Boxed Widgets', 'Admin', 'cheerup'),
			],
			'group' => '_g_sidebar_style'
		],

		[
			'name'    => 'sidebar_titles_style',
			'label'   => esc_html_x('Widget Titles Style', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => 'block-head-widget',
			'type'    => 'select',
			'options' => $_common['sidebar_titles'],
			'group'   => '_g_sidebar_style'
		],

		[
			'name'    => '_n_sidebar_titles',
			'type'    => 'message',
			'label'   => '',
			'text'    => 'There are customizations active that may change the look of the selected titles style. <a href="#" class="preset-reset">Click here</a> to reset them to defaults.',
			'style'   => 'message-alert',
			'classes' => 'bunyad-cz-hidden',
			'group'   => '_g_sidebar_style'
		],
		
		[
			'name'  => 'css_sidebar_widget_border_color',
			'value' => '',
			'label' => esc_html_x('Widget Border Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.sidebar .widget-boxed' => ['props' => ['border-color' => '%s']]
			],
			'context' => [['key' => 'sidebar_widgets_style', 'value' => 'boxed']],
			'group' => '_g_sidebar_style'
		],

		[
			'name'  => 'css_sidebar_widget_box_pad',
			'value' => '',
			'label' => esc_html_x('Widget Box Spacing', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'number',
			'style' => 'inline-sm',
			'css'   => [
				'vars' => ['props' => ['--widget-boxed-pad' => '%spx']]
			],
			'context' => [['key' => 'sidebar_widgets_style', 'value' => 'boxed']],
			'group' => '_g_sidebar_style'
		],

		[
			'name'  => 'css_sidebar_title_bg',
			'value' => '',
			'label' => esc_html_x('Titles Background', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.sidebar .widget-title' => 
					['props' => ['background-color' => '%s']]
			],
			'group' => '_g_sidebar_style'
		],
			
		[
			'name'  => 'css_sidebar_title_color',
			'value' => '',
			'label' => esc_html_x('Titles Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.sidebar .widget-title' => ['props' => ['color' => '%s']]
			],
			'group' => '_g_sidebar_style'
		],

		[
			'name'       => 'css_sidebar_title_typo',
			'label'      => esc_html_x('Titles Typography', 'Admin', 'cheerup'),
			'desc'       => '',
			'value'      => '',
			'type'       => 'group',
			'group_type' => 'typography',
			'style'      => 'edit',
			'css'        => '.sidebar .widget-title .title',
			'group'      => '_g_sidebar_style'
		],

		[
			'name'  => 'css_sidebar_title_border_size',
			'label' => esc_html_x('Titles Border Thickness', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => '',
			'type'  => 'number',
			'style' => 'inline-sm',
			'css'   => [
				'.sidebar .widget-title' => ['props' => ['--block-head-bw' => '%dpx']],
			],
			'group' => '_g_sidebar_style'
		],

		// block-head-d Width
		[
			'name'  => 'css_sidebar_title_sep_width',
			'label' => esc_html_x('Titles Border Width', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => '',
			'type'  => 'number',
			'style' => 'inline-sm',
			'css'   => [
				'.sidebar .block-head-d .title:after' => ['props' => ['width' => '%dpx']],
			],
			'context' => [['key' => 'sidebar_titles_style', 'value' => 'block-head-d']],
			'group'   => '_g_sidebar_style'
		],


		// block-head-d and block-head-b
		[
			'name'  => 'css_sidebar_title_sep_distance',
			'label' => esc_html_x('Titles Border Distance', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => '',
			'type'  => 'number',
			'style' => 'inline-sm',
			'css'   => [
				'.sidebar .block-head-d, .sidebar .block-head-b' => ['props' => ['--sep-distance' => '%dpx']]
			],
			'context' => [['key' => 'sidebar_titles_style', 'value' => ['block-head-d', 'block-head-b']]],
			'group'   => '_g_sidebar_style'
		],

		[
			'name'  => 'css_sidebar_title_border_color',
			'label' => esc_html_x('Titles Border Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => '',
			'type'  => 'color',
			'css'   => [
				'.sidebar .widget-title' => ['props' => ['--block-head-bc' => '%s']],
			],
			'group' => '_g_sidebar_style'
		],

		[
			'name'  => 'css_sidebar_title_border_top',
			'label' => esc_html_x('Titles Border Top', 'Admin', 'cheerup'),
			'desc'  => 'Set a different border color for top border.',
			'value' => '',
			'type'  => 'color',
			'css'   => [
				'.sidebar .widget-title' => ['props' => ['border-top-color' => '%s']],
			],
			'context' => [['key' => 'sidebar_titles_style', 'value' => 'block-head-widget']],
			'group'   => '_g_sidebar_style'
		],

		[
			'name'    => 'css_sidebar_title_align',
			'label'   => esc_html_x('Titles Text Align', 'Admin', 'cheerup'),
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
				'.sidebar .widget-title' => ['props' => ['text-align' => '%s']]
			],
			'group' => '_g_sidebar_style'
		],

		[
			'name'    => 'css_sidebar_title_align',
			'label'   => esc_html_x('Titles Text Align', 'Admin', 'cheerup'),
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
				'.sidebar .widget-title'              => ['props' => ['text-align' => '%s']],
				'.sidebar .widget-title .title:after' => [
					'props' => [
						'condition' => [
							'left'  => ['margin-left' => '0'],
							'right' => ['margin-right' => '0'],
						]
					],
				]
			],
			'group' => '_g_sidebar_style'
		],

		[
			'name'    => 'css_sidebar_title_padding',
			'label'   => esc_html_x('Titles Padding', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => '',
			'type'    => 'dimensions',
			'devices' => true,
			'css'     => [
				'.sidebar .widget-title' => ['dimensions' => 'padding'],
			],
			'context' => [['compare' => '!=', 'key' => 'sidebar_titles_style', 'value' => 'block-head-b']],
			'group'   => '_g_sidebar_style'
		],

		[
			'name'  => 'css_sidebar_title_margin',
			'label' => esc_html_x('Titles Margin Below', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => 35,
			'type'  => 'slider',
			'css'   => [
				'.sidebar .widget-title' => ['props' => ['margin-bottom' => '%spx']],
			],
			'group' => '_g_sidebar_style'
		],

		[
			'name'    => 'css_sidebar_widget_margin',
			'value'   => 45,
			'label'   => esc_html_x('Widget Bottom Spacing', 'Admin', 'cheerup'),
			'desc'    => '',
			'type'    => 'slider',
			'devices' => true,
			'css'     => [
				'.sidebar .widget' => ['props' => ['margin-bottom' => '%spx']],
			],
			'group' => '_g_sidebar_style'
		],

	/**
	 * Group: Widget Posts
	 */
	[
		'name'  => '_g_widget_posts',
		'label' => esc_html_x('Widget: Latest Posts', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
		'group' => '_g_sidebar_style'
		// 'collapsed' => false,
	],

		[
			'name'    => 'css_widget_posts_image_w',
			'value'   => '',
			'label'   => esc_html_x('Image Width', 'Admin', 'cheerup'),
			'desc'    => '',
			'type'    => 'number',
			'style'   => 'inline',
			'css'     => [
				'.widget-posts .posts:not(.full) .post-thumb' => ['props' => ['width' => '%spx']],
			],
			'group' => '_g_widget_posts'
		],

		[
			'name'    => 'css_widget_posts_image_h',
			'value'   => '',
			'label'   => esc_html_x('Image Height', 'Admin', 'cheerup'),
			'desc'    => '',
			'type'    => 'number',
			'style'   => 'inline',
			'css'     => [
				'.widget-posts .posts:not(.full) .post-thumb' => ['props' => ['height' => '%spx']],
			],
			'group' => '_g_widget_posts'
		],


];

$fields_breadcrumbs = [
	

	/**
	 * Group Breadcrumbs
	 */
	[
		'name'  => '_g_breadcrumbs',
		'label' => esc_html_x('Breadcrumbs', 'Admin', 'cheerup'),
		'type'  => 'group',
		'desc'  => 'If Yoast SEO plugin breadcrumbs are enabled, the settings below will not apply.',
		'style' => 'collapsible',
		// 'collapsed' => false,
	],

		// Fields
		[
			'name'  => 'breadcrumbs_enable',
			'label' => esc_html_x('Enable Breadcrumbs', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => 0,
			'type'  => 'toggle',
			'style' => 'inline-sm',
			'group' => '_g_breadcrumbs'
		],
		[
			'name'    => 'breadcrumbs_search',
			'label'   => esc_html_x('On Search Page', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => 1,
			'type'    => 'checkbox',
			'group'   => '_g_breadcrumbs',
			'context' => [['key' => 'breadcrumbs_enable', 'value' => 1]]
		],
		[
			'name'    => 'breadcrumbs_single',
			'label'   => esc_html_x('On Post/Single', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => 1,
			'type'    => 'checkbox',
			'group'   => '_g_breadcrumbs',
			'context' => [['key' => 'breadcrumbs_enable', 'value' => 1]]
		],
		[
			'name'    => 'breadcrumbs_page',
			'label'   => esc_html_x('On Pages', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => 1,
			'type'    => 'checkbox',
			'group'   => '_g_breadcrumbs',
			'context' => [['key' => 'breadcrumbs_enable', 'value' => 1]]
		],
		[
			'name'    => 'breadcrumbs_archive',
			'label'   => esc_html_x('On Archives', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => 1,
			'type'    => 'checkbox',
			'group'   => '_g_breadcrumbs',
			'context' => [['key' => 'breadcrumbs_enable', 'value' => 1]]
		],
];

$fields = array_merge($fields, $fields_breadcrumbs);

$options['layout-main'] = [
	'sections' => [[
		'id'     => 'layout-main',
		'title'  => esc_html_x('Main Layout & Sidebar', 'Admin', 'cheerup'),
		'fields' => $fields
	]]
];

return $options;