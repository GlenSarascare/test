<?php
/**
 * Featured Grids Options
 */

$fields_shared = [
	[
		'name'    => 'feat_grid_overlay',
		'label'   => esc_html_x('Content Overlay Style', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => 'a',
		'type'    => 'select',
		'options' => [
			'a' => esc_html_x('Style A - Bottom Shade', 'Admin', 'cheerup'),
			'b' => esc_html_x('Style B - Full Overlay', 'Admin', 'cheerup'),
		],
	],

	[
		'name'    => 'feat_grid_overlay_pos',
		'label'   => esc_html_x('Content Position', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => 'bottom',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => [
			'bottom'     => esc_html_x('Bottom Left', 'Admin', 'cheerup'),
			'bot-center' => esc_html_x('Bottom Centered', 'Admin', 'cheerup'),
			'center'     => esc_html_x('Centered', 'Admin', 'cheerup'),
			'top-center' => esc_html_x('Top Centered', 'Admin', 'cheerup'),
			'top'        => esc_html_x('Top Left', 'Admin', 'cheerup'),
		],
	],
	
	[
		'name'    => 'feat_grid_meta_below',
		'label'   => esc_html_x('Meta Below Title', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => ['date', 'comments'],
		'type'    => 'checkboxes',
		'options' => $_common['meta_options'],
		// Not a global style, specific to checkboxes.
		'style'   => 'sortable',
	],

	[
		'name'    => 'feat_grid_meta_on_hover',
		'label'   => esc_html_x('Show Meta on Hover', 'Admin', 'cheerup'),
		'desc'    => esc_html_x('Hide post meta at bottom until hover.', 'Admin', 'cheerup'),
		'value'   => 0,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],

	[
		'name'    => 'feat_grid_cat_style',
		'label'   => esc_html_x('Category Style', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => [
			''       => esc_html_x('Default / Simple Text', 'Admin', 'cheerup'),
			'labels' => esc_html_x('Badge / BG Color', 'Admin', 'cheerup'),
		]
	],

	[
		'name'    => 'feat_grid_hover_effect',
		'label'   => esc_html_x('Hover Effect', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => '',
		'type'    => 'select',
		'style'   => 'inline-sm',
		'options' => [
			''           => esc_html_x('None', 'Admin', 'cheerup'),
			'hover-zoom' => esc_html_x('Zoom Image', 'Admin', 'cheerup'),
		]
	],

	/**
	 * Group: Slider Titles
	 */
	[
		'name'  => '_g_feat_grid_titles',
		'label' => esc_html_x('Titles / Headings', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

		[
			'name'       => 'css_feat_grid_titles',
			'label'      => esc_html_x('Family / Typography', 'Admin', 'cheerup'),
			'value'      => '',
			'desc'       => '',
			'type'       => 'group',
			'group_type' => 'typography',
			'style'      => 'edit',
			'controls'   => ['family', 'weight', 'style', 'transform', 'line_height', 'spacing'],
			'css'        => '.feat-grid .item .post-title',
			'group'      => '_g_feat_grid_titles',
		],

		[
			'name'        => 'css_feat_grid_titles_l',
			'value'       => '',
			'label'       => esc_html_x('Base: Large Title', 'Admin', 'cheerup'),
			'desc'        => esc_html_x('Used for larger slides / images.', 'Admin', 'cheerup'),
			'type'        => 'number',
			'style'       => 'inline-sm',
			'input_attrs' => ['max' => 100, 'min' => 9],
			'css'         => [
				'.feat-grid' => ['props' => ['--feat-grid-title-l' => '%spx']]
			],
			'group' => '_g_feat_grid_titles',
		],
		
		[
			'name'        => 'css_feat_grid_titles_m',
			'value'       => '',
			'label'       => esc_html_x('Base: Medium Title', 'Admin', 'cheerup'),
			'desc'        => esc_html_x('Most Common - applies to all medium slides.', 'Admin', 'cheerup'),
			'type'        => 'number',
			'style'       => 'inline-sm',
			'input_attrs' => ['max' => 100, 'min' => 9],
			'css'         => [
				'.feat-grid' => ['props' => ['--feat-grid-title-m' => '%spx']]
			],
			'group' => '_g_feat_grid_titles',
		],

		[
			'name'        => 'css_feat_grid_titles_s',
			'value'       => '',
			'label'       => esc_html_x('Base: Small Title', 'Admin', 'cheerup'),
			'desc'        => esc_html_x('Rarely used only for very small slides.', 'Admin', 'cheerup'),
			'type'        => 'number',
			'style'       => 'inline-sm',
			'input_attrs' => ['max' => 100, 'min' => 9],
			'css'         => [
				'.feat-grid' => ['props' => ['--feat-grid-title-s' => '%spx']]
			],
			'group' => '_g_feat_grid_titles',
		],
];

$fields_overlays = [
	/**
	 * Group: Style A
	 */
	[
		'name'  => '_g_grid_overlay_a',
		'label' => esc_html_x('Style A', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

		[
			'name'  => 'css_grid_oy_a_bg',
			'label' => esc_html_x('Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => '',
			'type'  => 'color',
			'css'   => [
				'.grid-overlay-a' => ['props' => ['--grad-color' => 'rgba(%s, var(--grad-opacity))']]
			],
			'group' => '_g_grid_overlay_a',
		],

		[
			'name'        => 'css_grid_oy_a_opacity',
			'label'       => esc_html_x('Opacity', 'Admin', 'cheerup'),
			'desc'        => '',
			'value'       => '',
			'type'        => 'number',
			'style'       => 'inline-sm',
			'input_attrs' => ['max' => 1, 'min' => 0, 'step' => 0.05],
			'css'         => [
				'.grid-overlay-a' => ['props' => ['--grad-opacity' => '%s']]
			],
			'group' => '_g_grid_overlay_a',
		],

	/**
	 * Group: Style B
	 */
	[
		'name'  => '_g_grid_overlay_b',
		'label' => esc_html_x('Style B', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

		[
			'name'  => 'css_grid_oy_b_bg',
			'label' => esc_html_x('Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'value' => '',
			'type'  => 'color',
			'css'   => [
				'.grid-overlay-b:before' => ['props' => ['background' => '%s']]
			],
			'group' => '_g_grid_overlay_b',
		],

		[
			'name'        => 'css_grid_oy_b_opacity',
			'label'       => esc_html_x('Opacity', 'Admin', 'cheerup'),
			'desc'        => '',
			'value'       => '',
			'type'        => 'number',
			'style'       => 'inline-sm',
			'input_attrs' => ['max' => 1, 'min' => 0, 'step' => 0.05],
			'css'         => [
				'.grid-overlay-b:before' => ['props' => ['opacity' => '%s']]
			],
			'group' => '_g_grid_overlay_b',
		],
];


/**
 * Main Sections, rest are added dynamically below.
 */
$sections = [
	[
		'id'     => 'feat-grids-message',
		'title'  => '',
		'desc'   => 'These are style settings for the featured grids. To activate a Home Slider / Featured Grid, go to Homepage > <a href="#" class="focus-link is-with-nav" data-section="bunyad-home-slider" data-nav-text="Featured Grids">Featured Area / Slider</a>.',
		'type'   => 'message',
		'fields' => [],
	],
	[
		'id'     => 'feat-grids-common',
		'title'  => esc_html_x('Common Settings', 'Admin', 'cheerup'),
		'fields' => $fields_shared,
	],
	[
		'id'     => 'feat-grids-overlays',
		'title'  => esc_html_x('Overlay Styles', 'Admin', 'cheerup'),
		'fields' => $fields_overlays,
	]
];


/**
 * Per Featured Grid Settings
 */
$grids_tpl = [
	[
		'name'  => 'css_fgrid_gap_{key}',
		'value' => '',
		'label' => esc_html_x('Grid Gap', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'number',
		'style' => 'inline-sm',
		'css'   => [
			'.feat-grid-{key}' => ['props' => ['--grid-gap' => '%dpx']],
		],
	],

	[
		'name'        => 'css_fgrid_custom_ratio_{key}',
		'label'       => esc_html_x('Custom Image Ratio', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'Calculated using width/height.',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'input_attrs' => ['min' => 0.25, 'max' => 3.5, 'step' => .1],
		'css'         => [
			'.feat-grid-{key}' => ['props' => ['--main-ratio' => '%s']]
		],
	],

	[
		'name'        => 'css_fgrid_custom_height_{key}',
		'label'       => esc_html_x('Advanced: Custom Height', 'Admin', 'cheerup'),
		'value'       => '',
		'desc'        => 'WARNING: Its better to use custom image ratio instead.',
		'type'        => 'slider',
		'input_attrs' => ['min' => 50, 'max' => 1000, 'step' => 10],
		'devices'     => true,
		'css'         => [
			'.feat-grid-{key} .item-main' => ['props' => ['height' => '%dpx', 'max-height' => 'initial']]
		],
	],

];

/**
 * Add all the grid options separately.
 */
$grids_fields = [];
foreach (['a', 'b', 'c', 'd', 'e', 'f', 'g'] as $key => $grid) {
	
	$grids_fields[$grid] = [];
	
	Bunyad::helpers()->repeat_options(
		$grids_tpl,
		[
			$grid => []
		],
		$grids_fields[$grid],
		['replace_in' => ['css']]
	);

	$number = $key + 1;
	$sections[] = [
		'title'  => sprintf(esc_html_x('Grid Style %s', 'Admin', 'cheerup'), $number),
		'id'     => 'feat-grids-style' . $number,
		'fields' => $grids_fields[$grid],
	];
}

$options['posts-feat-grids'] = [
	'id'       => 'posts-feat-grids',
	'title'    => esc_html_x('Featured Grids', 'Admin', 'cheerup'),
	'sections' => $sections,
	'desc'     => '',
];

return $options;