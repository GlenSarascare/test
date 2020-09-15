<?php
/**
 * Single Posts Options
 */

$fields_general = [
	[
		'name'    => 'post_layout_template',
		'label'   => esc_html_x('Default Post Style', 'Admin', 'cheerup'),
		'value'   => 'classic',
		'type'    => 'radio',
		'options' => [
			'classic'  => esc_html_x('Classic', 'Admin', 'cheerup'),
			'creative' => esc_html_x('Creative - Large Style', 'Admin', 'cheerup'),
			'cover'    => esc_html_x('Creative - Overlay Style', 'Admin', 'cheerup'),
			'magazine' => esc_html_x('Magazine/News Style', 'Admin', 'cheerup'),
		],
	],

	[
		'name'  => 'post_layout_spacious',
		'label' => esc_html_x('Spacious / Narrow Style?', 'Admin', 'cheerup'),
		'value' => 1,
		'desc'  => esc_html_x('Enable to add extra left/right spacing to text to create a dynamic spacious feel. Especially great when used with Full Width.', 'Admin', 'cheerup'),
		'type'  => 'toggle',
		'style' => 'inline-sm',
	],

	[
		'name'    => 'single_sidebar',
		'label'   => esc_html_x('Single Post/Page Sidebar', 'Admin', 'cheerup'),
		'desc'    => esc_html_x('Default is from Main Layout settings. This setting can also be changed per post or page.', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'select',
		'options' => [
			''      => esc_html_x('Default / Global', 'Admin', 'cheerup'),
			'none'  => esc_html_x('No Sidebar', 'Admin', 'cheerup'),
			'right' => esc_html_x('Right Sidebar', 'Admin', 'cheerup'),
		],
	],

	[
		'name'    => 'single_featured_crop',
		'label'   => esc_html_x('Crop Featured Image', 'Admin', 'cheerup'),
		'value'   => 0,
		'desc'    => esc_html_x('Crop featured image for consistent sizing. Does not apply to Cover and Creative style.', 'Admin', 'cheerup'),
		'type'    => 'toggle',
		'style'   => 'inline-sm',
		'classes' => 'sep-top',
	],

	[
		'name'    => 'single_featured_ratio',
		'label'   => esc_html_x('Image Aspect Ratio', 'Admin', 'cheerup'),
		'desc'    => 'Does not apply to Cover and Creative style.',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => $_common['ratio_options'],
		'context' => [['key' => 'single_featured_crop', 'value' => 1]],
	],
	[
		'name'        => 'single_featured_ratio_custom',
		'label'       => esc_html_x('Custom Ratio', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'Calculated using width/height.',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
		'css'         => [
			'.single .featured .ratio-is-custom' => ['props' => ['padding-bottom' => 'calc(100% / %s)']]
		],
		'transport' => 'refresh',
		'context'   => [
			['key' => 'single_featured_ratio', 'value' => 'custom'],
			['key' => 'single_featured_crop', 'value' => 1]
		],
	],


	[
		'name'  => 'single_tags',
		'label' => esc_html_x('Show Post Tags', 'Admin', 'cheerup'),
		'value' => 1,
		'desc'  => '',
		'type'  => 'checkbox',
		'classes' => 'sep-top',
	],

	[
		'name'  => 'show_featured',
		'label' => esc_html_x('Show Featured Image Area', 'Admin', 'cheerup'),
		'value' => 1,
		'desc'  => esc_html_x('Stops displaying the featured image in large posts. Can also be set per post while adding/edit a post.', 'Admin', 'cheerup'),
		'type'  => 'checkbox',
	],

	[
		'name'  => 'single_all_cats',
		'label' => esc_html_x('All Categories in Meta', 'Admin', 'cheerup'),
		'value' => 0,
		'desc'  => esc_html_x('If unchecked, only the Primary Category is displayed.', 'Admin', 'cheerup'),
		'type'  => 'checkbox',
	],

	[
		'name'  => 'single_navigation',
		'label' => esc_html_x('Show Next/Previous Post', 'Admin', 'cheerup'),
		'value' => 0,
		'desc'  => '',
		'type'  => 'checkbox',
	],

	// [
	//     'name'  => '_g_single_content',
	//     'label' => esc_html_x('Content Colors/Style', 'Admin', 'cheerup'),
	//     'type'  => 'group',
	//     'style' => 'collapsible',
	// ],

	/**
	 * Group: Author Box
	 */
	[
		'name'  => '_g_author_box',
		'label' => esc_html_x('Author Box', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],
	[
		'name'  => 'author_box',
		'label' => esc_html_x('Show Author Box', 'Admin', 'cheerup'),
		'value' => 1,
		'desc'  => '',
		'type'  => 'checkbox',
		'group' => '_g_author_box',
	],
	[
		'name'    => 'author_box_style',
		'label'   => esc_html_x('Author Box Style', 'Admin', 'cheerup'),
		'value'   => '',
		'type'    => 'select',
		'options' => [
			''             => esc_html_x('Default / Auto', 'Admin', 'cheerup'),
			'author-box'   => esc_html_x('Modern Style', 'Admin', 'cheerup'),
			'author-box-b' => esc_html_x('Classic Style', 'Admin', 'cheerup'),
		],
		'context' => [['key' => 'author_box', 'value' => 1]],
		'group'   => '_g_author_box',
	],

	// [
	//     'name'  => '_g_single_related',
	//     'label' => esc_html_x('Related Posts', 'Admin', 'cheerup'),
	//     'type'  => 'group',
	//     'style' => 'collapsible',
	// ],
];

$fields_design = [
	[
		'name'       => 'css_single_body_typo',
		'label'      => esc_html_x('Body Typography', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '.entry-content',
		'controls'   => ['family', 'size', 'weight', 'line_height', 'spacing'],
		'group'      => '_g_post_content_body',
	],
	[
		'name'       => 'css_single_h_typo',
		'label'      => esc_html_x('H1-H6 Typography', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '.post-content h1, .post-content h2, .post-content h3, .post-content h4, .post-content h5, .post-content h6',
		'controls'   => ['family', 'weight', 'line_height', 'spacing', 'transform'],
		'group'      => '_g_post_content_body',
	],
	[
		'name'  => 'css_single_body_color',
		'value' => '',
		'label' => esc_html_x('Body Color', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.entry-content' => ['props' => ['color' => '%s']],
		],
		'group' => '_g_post_content_body',
	],
	[
		'name'  => 'css_single_h_color',
		'value' => '',
		'label' => esc_html_x('Body Headings Color', 'Admin', 'cheerup'),
		'desc'  => esc_html_x('Does not affect post/page title. Only the h1-h6 within post body.', 'Admin', 'cheerup'),
		'type'  => 'color',
		'css'   => [
			'.post-content' => ['props' => ['--h-color' => '%s']],
		],
		'group' => '_g_post_content_body',
	],

	/**
	 * Group: Heading Sizes
	 */
	[
		'name'  => '_g_single_content_headings',
		'label' => esc_html_x('Heading Sizes', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
		'group' => '_g_post_content_body',
	],

	[
		'name'    => 'css_font_post_h1',
		'label'   => esc_html_x('Post Body H1', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'classes' => 'sep-top',
		'css'     => [
			'.post-content h1' => ['props' => ['font-size' => '%dpx']],
		],
		'group'   => '_g_single_content_headings',
	],

	[
		'name'    => 'css_font_post_h2',
		'label'   => esc_html_x('Post Body H2', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.post-content h2' => ['props' => ['font-size' => '%dpx']],
		],
		'group'   => '_g_single_content_headings',
	],

	[
		'name'    => 'css_font_post_h3',
		'label'   => esc_html_x('Post Body H3', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.post-content h3' => ['props' => ['font-size' => '%dpx']],
		],
		'group'   => '_g_single_content_headings',
	],

	[
		'name'    => 'css_font_post_h4',
		'label'   => esc_html_x('Post Body H4', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.post-content h4' => ['props' => ['font-size' => '%dpx']],
		],
		'group'   => '_g_single_content_headings',
	],

	[
		'name'    => 'css_font_post_h5',
		'label'   => esc_html_x('Post Body H5', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.post-content h5' => ['props' => ['font-size' => '%dpx']],
		],
		'group'   => '_g_single_content_headings',
	],

	[
		'name'    => 'css_font_post_h6',
		'label'   => esc_html_x('Post Body H6', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.post-content h6' => ['props' => ['font-size' => '%dpx']],
		],
		'group'   => '_g_single_content_headings',
	],
];

/**
 * Fields: Social Sharing
 */
$fields_social = [

	/**
	 * Group: Social Share
	 */
	[
		'name'  => '_g_single_share',
		'label' => esc_html_x('Bottom Social Share', 'Admin', 'cheerup'),
		'type'  => 'group',
		'desc'  => 'Show social share buttons below posts.',
		'style' => 'collapsible',
	],
	[
		'name'  => 'single_share',
		'label' => esc_html_x('Show Share Buttons', 'Admin', 'cheerup'),
		'value' => 1,
		'desc'  => '',
		'type'  => 'toggle',
		'style' => 'inline-sm',
		'group' => '_g_single_share',
	],
	[
		'name'    => 'single_share_services',
		'label'   => esc_html_x('Share Services', 'Admin', 'cheerup'),
		'value'   => ['facebook', 'twitter', 'pinterest', 'email'],
		'desc'    => '',
		'type'    => 'checkboxes',
		'style'   => 'sortable',
		'options' => [
			'facebook'  => esc_html_x('Facebook', 'Admin', 'cheerup'),
			'twitter'   => esc_html_x('Twitter', 'Admin', 'cheerup'),
			'pinterest' => esc_html_x('Pinterest', 'Admin', 'cheerup'),
			'linkedin'  => esc_html_x('LinkedIn', 'Admin', 'cheerup'),
			'tumblr'    => esc_html_x('Tumblr', 'Admin', 'cheerup'),
			'vk'        => esc_html_x('VKontakte', 'Admin', 'cheerup'),
			'email'     => esc_html_x('Email', 'Admin', 'cheerup'),
		],
		'context' => [['key' => 'single_share', 'value' => 1]],
		'group'   => '_g_single_share',
	],

	/**
	 * Group: Sticky Social
	 */
	[
		'name'  => '_g_share_float',
		'label' => esc_html_x('Sticky Social Share', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'  => 'single_share_float',
		'label' => esc_html_x('Enable Sticky Social Buttons', 'Admin', 'cheerup'),
		'value' => 0,
		'desc'  => 'Show floating/sticky social buttons on left of the posts.',
		'type'  => 'toggle',
		'style' => 'inline-sm',
		'group' => '_g_share_float',
	],
	[
		'name'    => 'share_float_text',
		'label'   => esc_html_x('Share Text', 'Admin', 'cheerup'),
		'value'   => esc_html__('Share', 'cheerup'),
		'desc'    => '',
		'type'    => 'text',
		'context' => [['key' => 'single_share_float', 'value' => 1]],
		'group'   => '_g_share_float',
	],

	[
		'name'    => 'share_float_style',
		'label'   => esc_html_x('Share Style', 'Admin', 'cheerup'),
		'value'   => 'a',
		'type'    => 'select',
		'options' => [
			'a' => esc_html_x('Squares', 'Admin', 'cheerup'),
			'b' => esc_html_x('Circles', 'Admin', 'cheerup'),
		],
		'context' => [['key' => 'single_share_float', 'value' => 1]],
		'group'   => '_g_share_float',
	],
	[
		'name'    => 'share_float_services',
		'label'   => esc_html_x('Share Services', 'Admin', 'cheerup'),
		'value'   => ['facebook', 'twitter', 'pinterest', 'email'],
		'desc'    => '',
		'type'    => 'checkboxes',
		'style'   => 'sortable',
		'options' => [
			'facebook'  => esc_html_x('Facebook', 'Admin', 'cheerup'),
			'twitter'   => esc_html_x('Twitter', 'Admin', 'cheerup'),
			'pinterest' => esc_html_x('Pinterest', 'Admin', 'cheerup'),
			'linkedin'  => esc_html_x('LinkedIn', 'Admin', 'cheerup'),
			'tumblr'    => esc_html_x('Tumblr', 'Admin', 'cheerup'),
			'vk'        => esc_html_x('VKontakte', 'Admin', 'cheerup'),
			'email'     => esc_html_x('Email', 'Admin', 'cheerup'),
		],
		'context' => ['control' => ['key' => 'single_share_float', 'value' => 1]],
		'group'   => '_g_share_float',
	],
];

/**
 * Fields: Related Posts
 */
$fields_related = [
	[
		'name'  => 'related_posts',
		'label' => esc_html_x('Show Related Posts', 'Admin', 'cheerup'),
		'value' => 1,
		'desc'  => 'Show related posts below the post.',
		'type'  => 'toggle',
		'style' => 'inline-sm',
		// 'group'   => '_g_single_related',
	],
	[
		'name'    => 'related_posts_by',
		'label'   => esc_html_x('Related Posts Match By', 'Admin', 'cheerup'),
		'value'   => 'cat_tags',
		'desc'    => '',
		'type'    => 'radio',
		'options' => [
			''         => esc_html_x('Categories', 'Admin', 'cheerup'),
			'tags'     => esc_html_x('Tags', 'Admin', 'cheerup'),
			'cat_tags' => esc_html_x('Both', 'Admin', 'cheerup'),

		],
		'context' => [['key' => 'related_posts', 'value' => 1]],
		// 'group'   => '_g_single_related',
	],
	[
		'name'    => 'related_posts_number',
		'label'   => esc_html_x('Related Posts Number', 'Admin', 'cheerup'),
		'value'   => 3,
		'desc'    => '',
		'type'    => 'number',
		'context' => [['key' => 'related_posts', 'value' => 1]],
		// 'group'   => '_g_single_related',
	],
	[
		'name'        => 'related_posts_number_full',
		'label'       => esc_html_x('Number on Full Width Posts', 'Admin', 'cheerup'),
		'value'       => 3,
		'desc'        => '',
		'type'        => 'number',
		'input_attrs' => ['min' => 3, 'max' => 30, 'step' => 1],
		'context'     => [['key' => 'related_posts', 'value' => 1]],
		// 'group'   => '_g_single_related',
	],
	[
		'name'    => 'related_posts_grid',
		'label'   => esc_html_x('Related Posts Columns', 'Admin', 'cheerup'),
		'value'   => 3,
		'desc'    => 'NOTE: Does not affect Full Width posts as 3 columns are required there.',
		'type'    => 'select',
		'options' => [
			3 => esc_html_x('3 Columns', 'Admin', 'cheerup'),
			2 => esc_html_x('2 Columns', 'Admin', 'cheerup'),
		],
		'context' => [['key' => 'related_posts', 'value' => 1]],
		// 'group'   => '_g_single_related',
	],
];

/**
 * Section: Post Style: Default
 */
$fields_default = [
	[
		'name'    => 'css_post_single_title',
		'label'   => esc_html_x('Post Title Size', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.single-default .post-title-alt' => ['props' => ['font-size' => '%dpx']],
		],
	],

	/**
	 * Group: Post Meta
	 */
	[
		'name'      => '_g_single_default_meta',
		'label'     => esc_html_x('Post Meta', 'Admin', 'cheerup'),
		'desc'      => '',
		'type'      => 'group',
		'collapsed' => false,
		'style'     => 'collapsible',
	],
];

Bunyad::helpers()->repeat_options(
	$_common['listing_meta_tpl'],
	['single' => [
		'group' => '_g_single_default_meta',
	]],
	$fields_default,
	['replace_in' => ['context']]
);

/**
 * Section: Post Style: Creative
 */
$fields_creative = [
	[
		'name'  => 'post_creative_parallax',
		'label' => esc_html_x('Enable Parallax?', 'Admin', 'cheerup'),
		'value' => 1,
		'desc'  => 'Enable parallax effect in the post featured area.',
		'type'  => 'toggle',
		'style' => 'inline-sm',
	],
	[
		'name'        => 'css_post_creative_height',
		'label'       => esc_html_x('Featured Area Height', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => '',
		'type'        => 'slider',
		'input_attrs' => ['min' => 50, 'max' => 1500, 'step' => 1],
		'devices'     => true,
		'css'         => [
			'.single-creative .featured' => ['props' => ['height' => '%spx']],
		],
	],
	[
		'name'        => 'css_post_creative_overlay_opacity',
		'label'       => esc_html_x('Overlay Opacity', 'Admin', 'cheerup'),
		'value'       => '0.3',
		'desc'        => '',
		'type'        => 'number',
		'input_attrs' => ['min' => 0, 'max' => 1, 'step' => 0.05],
		'style'       => 'inline-sm',
		'css'         => [
			'.single-creative .featured:before' => ['props' => ['opacity' => '%s']],
		],
	],

	[
		'name'  => 'css_post_creative_overlay_color',
		'label' => esc_html_x('Overlay Color', 'Admin', 'cheerup'),
		'value' => '#0f0f0f',
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.single-creative .featured:before' => ['props' => ['background' => '%s']],
		],
	],

	[
		'name'    => 'css_post_creative_title',
		'label'   => esc_html_x('Post Title Size', 'Admin', 'cheerup'),
		'value'   => '',
		'desc'    => '',
		'type'    => 'slider',
		'devices' => true,
		'css'     => [
			'.single-creative .featured .post-title' => ['props' => ['font-size' => '%dpx']],
		],
	],
];

$options['posts-single'] = [
	'title'    => esc_html_x('Single Post Page', 'Admin', 'cheerup'),
	'id'       => 'posts-single',
	'sections' => [
		[
			'id'     => 'posts-single-general',
			'title'  => esc_html_x('General & Post Style', 'Admin', 'cheerup'),
			'fields' => $fields_general,
		],
		[
			'id'     => 'posts-single-design',
			'title'  => esc_html_x('Design - Single Post / Page', 'Admin', 'cheerup'),
			'fields' => $fields_design,
		],
		[
			'id'     => 'posts-single-social',
			'title'  => esc_html_x('Social Sharing', 'Admin', 'cheerup'),
			'fields' => $fields_social,
		],
		[
			'id'     => 'posts-single-related',
			'title'  => esc_html_x('Related Posts', 'Admin', 'cheerup'),
			'fields' => $fields_related,
		],
		[
			'id'     => 'posts-style-default',
			'title'  => esc_html_x('Post Style: Default', 'Admin', 'cheerup'),
			'desc'   => 'These are specific settings that only apply to the Default Post Style. See General for more.',
			'fields' => $fields_default,
		],
		[
			'id'     => 'posts-style-creative',
			'title'  => esc_html_x('Post Style: Creative', 'Admin', 'cheerup'),
			'desc'   => 'These are specific settings that only apply to the Creative Post Style. See General for more.',
			'fields' => $fields_creative,
		],
	],
];

return $options;