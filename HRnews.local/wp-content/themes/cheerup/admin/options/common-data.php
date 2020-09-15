<?php
/**
 * Shared configs / common data.
 */
$_common = [
	'heading_options' => [
		'block-head-widget' => esc_html_x('Boxed Heading', 'Admin', 'cheerup'),
		'block-head-b'      => esc_html_x('Unboxed + Separator (Style B)', 'Admin', 'cheerup'),
		'block-head-c'      => esc_html_x('Simple Large (Style C)', 'Admin', 'cheerup'),
		'block-head-d'      => esc_html_x('Unboxed + Small Separator (Style D)', 'Admin', 'cheerup'),
		'block-head-legacy' => esc_html_x('Fancy Centered Heading (Legacy)', 'Admin', 'cheerup'),
	],

	'ratio_options' => [
		''       => esc_html_x('Default', 'Admin', 'cheerup'),
		'4-3'    => esc_html_x('4:3 Standard', 'Admin', 'cheerup'),
		'16-9'   => esc_html_x('16:9 Wide', 'Admin', 'cheerup'),
		'3-2'    => esc_html_x('3:2 Rectangle', 'Admin', 'cheerup'),
		'1-1'    => esc_html_x('1:1 Square', 'Admin', 'cheerup'),
		'3-4'    => esc_html_x('3:4 Tall', 'Admin', 'cheerup'),
		'2-3'    => esc_html_x('2:3 Taller', 'Admin', 'cheerup'),
		'custom' => esc_html_x('Custom', 'Admin', 'cheerup'),
	],

	'meta_options' => [
		'cat'       => esc_html_x('Category', 'Admin', 'cheerup'),
		'author'    => esc_html_x('Author', 'Admin', 'cheerup'),
		'date'      => esc_html_x('Date', 'Admin', 'cheerup'),
		'comments'  => esc_html_x('Comments', 'Admin', 'cheerup'),
		'read_time' => esc_html_x('Read Time', 'Admin', 'cheerup'),
	]
];

if (shortcode_exists('wprm-recipe-jump') || class_exists('WP_Recipe_Maker')) {
	$_common['meta_options'] += [
		'jump_recipe' => esc_html_x('Jump Recipe (Posts Only)', 'Admin', 'cheerup'),
	];
}

$_common['sidebar_titles'] = $_common['heading_options'];
unset($_common['sidebar_titles']['block-head-legacy']);

/**
 * Common meta fields template.
 */
$_common['listing_meta_tpl'] = [
	[
		'name'  => '_n_lmeta_{key}',
		'type'  => 'message',
		'label' => '',
		'text'  => 'These override the global settings. Find all post meta setings in 
			<a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-global">Global Posts Settings</a>',
		'style' => 'message-info',
	],
	[
		'name'    => 'post_meta_{key}_global',
		'label'   => esc_html_x('Post Meta: Global Items', 'Admin', 'cheerup'),
		'desc'    => 'Use global settings for post meta.',
		'value'   => 1,
		'type'    => 'toggle',
		'style'   => 'inline-sm',
	],
	[
		'name'    => 'post_meta_{key}_above',
		'label'   => esc_html_x('Items Above Title', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => ['cat'],
		'type'    => 'checkboxes',
		'options' => $_common['meta_options'],
		// Not a global style, specific to checkboxes.
		'style'   => 'sortable',
		'context' => [['key' => 'post_meta_{key}_global', 'value' => 0]]
	],

	[
		'name'    => 'post_meta_{key}_below',
		'label'   => esc_html_x('Items Below Title', 'Admin', 'cheerup'),
		'desc'    => '',
		'value'   => ['date', 'comments'],
		'type'    => 'checkboxes',
		'options' => $_common['meta_options'],
		// Not a global style, specific to checkboxes.
		'style'   => 'sortable',
		'context' => [['key' => 'post_meta_{key}_global', 'value' => 0]]
	],

	[
		'name'    => 'post_meta_{key}_style',
		'label'   => esc_html_x('Post Meta Style', 'Admin', 'cheerup'),
		'value'   => 'default',
		'type'    => 'select',
		'desc'    => esc_html_x('Design style for post meta.', 'Admin', 'cheerup'),
		'options' => [
			'default' => esc_html_x('Default / Global', 'Admin', 'cheerup'),
			'a'       => esc_html_x('Style 1', 'Admin', 'cheerup'),
			'b'       => esc_html_x('Style 2', 'Admin', 'cheerup'),
			'c'       => esc_html_x('Style 3', 'Admin', 'cheerup'),
		]
	],
];

return $_common;