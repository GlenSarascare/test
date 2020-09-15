<?php
/**
 * Sliders / Featured Blocks Options
 */

$options = is_array($options) ? $options : [];

$fields = [
	[
		'name'  => '_n_home_slider',
		'type'  => 'message',
		'label' => '',
		'text'  => 'These are style settings for the sliders. To activate Home Slider, go to Homepage > <a href="#" class="focus-link is-with-nav" data-section="bunyad-home-slider">Featured Area / Slider</a>.',
		'style' => 'message-info',
	],
	[
		'name'       => 'css_slider_titles',
		'label'      => esc_html_x('Titles/Headings Typography', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'controls'   => ['family', 'weight', 'style', 'transform', 'line_height', 'spacing'],
		'css'        => '.common-slider .post-title, .common-slider .heading',
	],
];

$fields_beauty = [
	/**
	 * Group: Beauty Slider
	 */
	[
		'name'  => '_g_slider_beauty',
		'label' => esc_html_x('Beauty Slider', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'  => 'css_beauty_overlay_bg',
		'value' => '#fff',
		'label' => esc_html_x('Overlay Background', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.beauty-slider .overlay' => ['props' => ['background-color' => '%s']],
		],
		'group' => '_g_slider_beauty',
	],

	[
		'name'        => 'css_beauty_overlay_opacity',
		'value'       => 1,
		'label'       => esc_html_x('Overlay Opacity', 'Admin', 'cheerup'),
		'desc'        => '',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'input_attrs' => ['max' => 1, 'min' => 0, 'step' => 0.05],
		'css'         => [
			'.beauty-slider .overlay' => ['props' => ['background-color' => 'rgba({css_beauty_overlay_bg}, %s)']],
		],
		'group'       => '_g_slider_beauty',
	],
];

$fields_trendy = [
	/**
	 * Group: Trendy Slider
	 */
	[
		'name'  => '_g_slider_trendy',
		'label' => esc_html_x('Trendy Slider', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'  => 'css_trendy_overlay_bg',
		'value' => '#000',
		'label' => esc_html_x('Overlay Background', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.trendy-slider .overlay' => ['props' => ['background-color' => '%s']],
		],
		'group' => '_g_slider_trendy',
	],

	[
		'name'        => 'css_trendy_overlay_opacity',
		'value'       => 1,
		'label'       => esc_html_x('Overlay Opacity', 'Admin', 'cheerup'),
		'desc'        => '',
		'type'        => 'number',
		'style'       => 'inline-sm',
		'input_attrs' => ['max' => 1, 'min' => 0, 'step' => 0.05],
		'css'         => [
			'.trendy-slider .overlay' => ['props' => ['background-color' => 'rgba({css_trendy_overlay_bg}, %s)']],
		],
		'group'       => '_g_slider_trendy',
	],

	[
		'name'       => 'css_trendy_title',
		'label'      => esc_html_x('Post Title', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'devices'    => true,
		'controls'   => ['size', 'line_height'],
		'css'        => '.trendy-slider .post-title',
		'group'      => '_g_slider_trendy',
	],
];

$fields_fashion = [
	/**
	 * Group: Fashion Slider
	 */
	[
		'name'  => '_g_slider_fashion',
		'label' => esc_html_x('Fashion Slider', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'  => 'css_slider_fashion_overlay',
		'value' => 'rgba(255, 255, 255, 0.96)',
		'label' => esc_html_x('Overlay Color & Opacity', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color-alpha',
		'css'   => [
			'.fashion-slider .overlay' => ['props' => ['background' => '%s']],
		],
		'group' => '_g_slider_fashion',
	],

	[
		'name'       => 'css_slider_fashion_title',
		'label'      => esc_html_x('Post Title', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'devices'    => true,
		'controls'   => ['size', 'line_height'],
		'css'        => '.fashion-slider .post-title',
		'group'      => '_g_slider_fashion',
	],
];

$fields_stylish = [
	/**
	 * Group: Stylish Slider
	 */
	[
		'name'  => '_g_slider_stylish',
		'label' => esc_html_x('Stylish Slider', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'  => 'css_slider_stylish_overlay',
		'value' => 'rgba(0, 0, 0, 0.28)',
		'label' => esc_html_x('Overlay Color & Opacity', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color-alpha',
		'css'   => [
			'.stylish-slider .item:after' => ['props' => ['background' => '%s']],
		],
		'group' => '_g_slider_stylish',
	],

	[
		'name'       => 'css_slider_stylish_title',
		'label'      => esc_html_x('Post Title', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'devices'    => true,
		'controls'   => ['size', 'line_height'],
		'css'        => '.stylish-slider .heading',
		'group'      => '_g_slider_stylish',
	],
];

$fields_classic = [
	/**
	 * Group: Classic Slider
	 */
	[
		'name'  => '_g_slider_classic',
		'label' => esc_html_x('Classic Slider', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'  => 'css_slider_classic_overlay',
		'value' => 'rgba(0, 0, 0, 0.36)',
		'label' => esc_html_x('Overlay Color & Opacity', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color-alpha',
		'css'   => [
			'.classic-slider' => ['props' => ['--overlay-color' => '%s']],
		],
		'group' => '_g_slider_classic',
	],

	[
		'name'       => 'css_slider_classic_title',
		'label'      => esc_html_x('Post Title', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'devices'    => true,
		'controls'   => ['size', 'line_height'],
		'css'        => '.main-slider .heading',
		'group'      => '_g_slider_classic',
	],
];

$fields_full = [
	/**
	 * Group: Bold/Full-Width Slider
	 */
	[
		'name'  => '_g_slider_full',
		'label' => esc_html_x('Bold/Full-Width Slider', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
	],

	[
		'name'  => 'css_slider_full_overlay',
		'value' => '',
		'label' => esc_html_x('Overlay Color & Opacity', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color-alpha',
		'css'   => [
			'.large-slider .item:after, .bold-slider .item:after' => ['props' => ['background' => '%s']],
		],
		'group' => '_g_slider_full',
	],

	[
		'name'       => 'css_slider_full_title',
		'label'      => esc_html_x('Post Title', 'Admin', 'cheerup'),
		'value'      => '',
		'desc'       => '',
		'type'       => 'group',
		'group_type' => 'typography',
		'style'      => 'edit',
		'devices'    => true,
		'controls'   => ['size', 'line_height'],
		'css'        => '.large-slider .heading, .bold-slider .heading',
		'group'      => '_g_slider_full',
	],
];

$fields = array_merge(
	$fields,
	$fields_beauty,
	$fields_trendy,
	$fields_fashion,
	$fields_stylish,
	$fields_classic,
	$fields_full
);

$options['posts-sliders'] = [
	'sections' => [[
		'id'     => 'posts-sliders',
		'title'  => esc_html_x('Featured Sliders', 'Admin', 'cheerup'),
		'fields' => $fields,
	]],
];

return $options;