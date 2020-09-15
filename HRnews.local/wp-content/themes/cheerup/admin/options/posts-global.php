<?php
/**
 * Global Posts Options
 */

$fields = [
	[
		'name'    => 'posts_likes',
		'label'   => esc_html_x('Enable Post Likes', 'Admin', 'cheerup'),
		'value'   => 1,
		'desc'    => '',
		'type'    => 'checkbox',
		'classes' => 'sep-bottom',
	],

	/**
	 * Group: Category Badges.
	 */
	[
		'name'  => '_g_cat_badges',
		'label' => esc_html_x('Category Badges (Over Images)', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
		// 'collapsed' => false
	],
		[
			'name'    => 'meta_cat_labels',
			'label'   => esc_html_x('Category Badge Over Image', 'Admin', 'cheerup'),
			'value'   => 0,
			'desc'    => 'Category label over image in supported listings: Grid style. Can be enabled globally or per block in pagebuilder.',
			'type'    => 'toggle',
			'style'   => 'inline-sm',
			'group'   => '_g_cat_badges',
		],
		[
			'name'       => 'css_cat_badges_typo',
			'label'      => esc_html_x('Badges: Typography', 'Admin', 'cheerup'),
			'desc'       => 'Applies when enabled above or in a specific listing.',
			'value'      => '',
			'type'       => 'group',
			'group_type' => 'typography',
			'style'      => 'edit',
			'css'        => '.cat-label a, .post-meta .cat-labels .category',
			'group'   => '_g_cat_badges',
		],
		[
			'name'       => 'css_cat_badges_bg',
			'label'      => esc_html_x('Badges: BG Color', 'Admin', 'cheerup'),
			'desc'       => '',
			'value'      => '',
			'type'       => 'color',
			'css'        => [
				'.cat-label a, .post-meta .cat-labels .category' => ['props' => ['background-color' => '%s']]
			],
			'group'   => '_g_cat_badges',
		],
		[
			'name'       => 'css_cat_badges_color',
			'label'      => esc_html_x('Badges: Text Color', 'Admin', 'cheerup'),
			'desc'       => '',
			'value'      => '',
			'type'       => 'color',
			'css'        => [
				'.cat-label a, .post-meta .cat-labels .category' => ['props' => ['color' => '%s']]
			],
			'group'   => '_g_cat_badges',
		],
		[
			'name'    => 'css_cat_badges_pad',
			'label'   => esc_html_x('Badges: Padding', 'Admin', 'cheerup'),
			'desc'    => '',
			'value'   => '',
			'type'    => 'dimensions',
			'devices' => true,
			'css'     => [
				'.cat-label a, .post-meta .cat-labels .category' => ['dimensions' => 'padding'],
			],
			'group'   => '_g_cat_badges',
		],

	[
		'name'    => 'post_meta_style',
		'label'   => esc_html_x('Global Meta Style', 'Admin', 'cheerup'),
		'value'   => 'a',
		'type'    => 'select',
		'desc'    => esc_html_x('The style preset - each have separate settings below. The Meta Style can also be set per listing/block - find in Blocks and Featured Grid. settings', 'Admin', 'cheerup'),
		'options' => [
			'a'  => esc_html_x('Style 1', 'Admin', 'cheerup'),
			'b'  => esc_html_x('Style 2', 'Admin', 'cheerup'),
			'c'  => esc_html_x('Style 3', 'Admin', 'cheerup'),
		]
	],

	[
		'name'    => 'post_meta_modified_date',
		'label'   => esc_html_x('Use Modified Date', 'Admin', 'cheerup'),
		'desc'    => 'Show modified date instead of posted date.',
		'value'   => 0,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],

	[
		'name'    => 'post_meta_above',
		'label'   => esc_html_x('Items Above Title', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => ['cat'],
		'type'    => 'checkboxes',
		'options' => $_common['meta_options'],
		// Not a global style, specific to checkboxes.
		'style'   => 'sortable',
	],

	[
		'name'    => 'post_meta_below',
		'label'   => esc_html_x('Items Below Title', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => ['date', 'comments'],
		'type'    => 'checkboxes',
		'options' => $_common['meta_options'],
		// Not a global style, specific to checkboxes.
		'style'   => 'sortable',
	],

	[
		'name'    => 'post_meta_align',
		'label'   => esc_html_x('Default Alignment', 'Admin', 'cheerup'),
		'desc'    => 'Will not affect some special cases where left alignment is forced.',
		'value'   => 'center',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'classes' => 'sep-top',
		'options' => [
			'center' => esc_html_x('Center', 'Admin', 'cheerup'),
			'left'   => esc_html_x('Left', 'Admin', 'cheerup'),
		],
	],
	[

		'name'    => 'post_meta_all_cats',
		'label'   => esc_html_x('Show All Categories', 'Admin', 'cheerup'),
		'desc'    => 'Whether to show all or just one primary category. Single Article has its own <a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-single-general">separate setting</a>.',
		'value'   => 0,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],
	[
		'name'    => 'post_meta_labels_enable',
		'label'   => esc_html_x('Extra Text Labels', 'Admin', 'cheerup'),
		'desc'    => 'Show "In", "By" text etc.',
		'value'   => 1,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],
	[
		'name'    => 'post_meta_labels',
		'label'   => esc_html_x('Text Labels', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => ['in', 'by'],
		'type'    => 'checkboxes',
		'options' => [
			'in' => '"In" before category',
			'by' => '"By" before author',
		],
		'context' => [['key' => 'post_meta_labels_enable', 'value' => 1]]
	],
	[
		'name'    => 'post_meta_disabled',
		'label'   => esc_html_x('Force Disable Items', 'Admin', 'cheerup'),
		'desc'    => 'Items can be set per block/listing etc. Using this setting will force disable these items in all places.',
		'value'   => '',
		'type'    => 'checkboxes',
		'style'   => 'cols-2',
		'classes' => 'sep-bottom',
		'options' => $_common['meta_options'],
	],
	[
		'name'       => 'css_post_meta_typo',
		'label'      => esc_html_x('Meta Font', 'Admin', 'cheerup'),
		'desc'       => '',
		'value'      => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'controls'   => ['family'],
		'css'        => '.post-meta, .cat-label a'
	],

	// [
	// 	'name'  => 'css_post_meta',
	// 	'value' => '',
	// 	'label' => esc_html_x('Meta Items Color', 'Admin', 'cheerup'),
	// 	'desc'  => '',
	// 	'type'  => 'color',
	// 	'css'   => [
	// 		'.post-meta, 
	// 		.post-meta .meta-item,
	// 		.post-meta .comments,
	// 		.post-meta time' => ['props' => ['color' => '%s']]
	// 	],
	// 	'group' => '_g_colors_global',
	// ],
	// [
	// 	'name'  => 'css_post_meta_cat',
	// 	'value' => '',
	// 	'label' => esc_html_x('Meta Category Color', 'Admin', 'cheerup'),
	// 	'desc'  => '',
	// 	'type'  => 'color',
	// 	'css'   => [
	// 		'.post-meta .post-cat > a' => ['props' => ['color' => '%s']]
	// 	],
	// 	'group' => '_g_colors_global',
	// ],


	// array(
	// 	'name' => 'meta_date',
	// 	'label'   => esc_html_x('Meta: Show Date', 'Admin', 'cheerup'),
	// 	'value'   => 1,
	// 	'desc'    => '',
	// 	'type'    => 'checkbox',
	// ),

	// array(
	// 	'name' => 'meta_category',
	// 	'label'   => esc_html_x('Meta: Show Category', 'Admin', 'cheerup'),
	// 	'value'   => 1,
	// 	'desc'    => '',
	// 	'type'    => 'checkbox',
	// ),

	// array(
	// 	'name'    => 'post_comments',
	// 	'label'   => esc_html_x('Meta: Show Comment Count', 'Admin', 'cheerup'),
	// 	'desc'    => 'Only applies to Style 2.',
	// 	'value'   => 1,
	// 	'type'    => 'checkbox',
	// 	'classes' => 'sep-bottom',
	// 	// 'context' => array('control' => array('key' => 'meta_style', 'value' => 'style-b'))
	// ),		

];

/**
 * Group: Meta Design
 */
$meta_tpl = [
	[
		'name'       => 'css_meta_{key}_typo',
		'label'      => esc_html_x('Typography', 'Admin', 'cheerup'),
		'desc'       => '',
		'value'      => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'css'        => '.post-meta-{key} .meta-item, .post-meta-{key} .post-date, .post-meta-{key} .text-in'
	],
	[
		'name'             => 'css_meta_{key}_cat_typo',
		'label'            => esc_html_x('Category Typography', 'Admin', 'cheerup'),
		'desc'             => 'Does not apply to category badges.',
		'value'            => '',
		'type'             => 'group',
		'group_type'       => 'typography',
		'style'            => 'edit',
		'css'              => '.post-meta-{key} .post-cat > a',
		'controls_options' => [

			// Size has to change for .text-in label to match.
			'size' => [
				'css' => [
					'.post-meta-{key} .text-in, .post-meta-{key} .post-cat > a' => [
						'props' => ['font-size' => '%spx']
					],
				]
			]
		]
	],
	[
		'name'    => 'post_meta_{key}_align',
		'label'   => esc_html_x('Default Alignment', 'Admin', 'cheerup'),
		'desc'    => 'Will not affect some special cases where left alignment is forced.',
		'value'   => 'center',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => [
			'default' => esc_html_x('Default', 'Admin', 'cheerup'),
			'center'  => esc_html_x('Center', 'Admin', 'cheerup'),
			'left'    => esc_html_x('Left', 'Admin', 'cheerup'),
		],
	],
	[
		'name'  => 'css_meta_{key}_color',
		'value' => '',
		'label' => esc_html_x('Items Color', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.post-meta-{key}, 
			.post-meta-{key} .meta-item,
			.post-meta-{key} .comments,
			.post-meta-{key} .post-date' => ['props' => ['color' => '%s']]
		],
	],
	[
		'name'  => 'css_meta_{key}_cat_color',
		'value' => '',
		'label' => esc_html_x('Category Color', 'Admin', 'cheerup'),
		'desc'  => 'Does not apply to category badges.',
		'type'  => 'color',
		'css'   => [
			'.post-meta-{key} .post-cat > a' => ['props' => ['color' => '%s']]
		],
	],
	[
		'name'  => 'post_meta_{key}_divider',
		'label' => esc_html_x('Divider Line', 'Admin', 'cheerup'),
		'desc'  => 'Adds a small divider line below. Supported by some listings like grid, large post etc.',
		'value' => 0,
		'type'  => 'toggle',
		'style' => 'inline-sm',
	],
	[
		'name'  => 'css_meta_{key}_nosep',
		'label' => esc_html_x('Disable Separators', 'Admin', 'cheerup'),
		'desc'  => 'Remove separator blip between items.',
		'value' => 0,
		'type'  => 'toggle',
		'style' => 'inline-sm',
		'css'   => [
			'.post-meta-{key} .meta-sep:before' => ['props' => ['font-size' => '0px']]
		],
	],
];

/**
 * Add all the meta design options separately for style 1/2/3.
 */
foreach (['a', 'b', 'c'] as $key => $group) {
	$fields[] = [
		'name'    => '_g_meta_' . $group,
		'label'   => sprintf(esc_html_x('Meta Design: Style %s', 'Admin', 'cheerup'), $key + 1),
		'desc'    => '',
		'type'    => 'group',
		'style'   => 'collapsible'
	];

	Bunyad::helpers()->repeat_options(
		$meta_tpl,
		[
			// Add 'group' to every option.
			$group => [
				'group' => '_g_meta_' . $group,
				'skip'  => 
					// Skip divider setting for a only.
					($group == 'a' 
						?  []
						: ['post_meta_{key}_divider']
					)
				,
				'overrides' =>
					// Set align to left for c only.
					($group !== 'c' 
						? []
						: ['post_meta_{key}_align' => ['value' => 'left']]
					)
			]
		],
		$fields,
		['replace_in' => ['css', 'controls_options', 'context']]
	);

}

$options['posts-global'] = [
	'sections'    => [[
		'id'     => 'posts-global',
		'title'  => esc_html_x('Global Posts Settings', 'Admin', 'cheerup'),
		'fields' => $fields
	]]
];

return $options;