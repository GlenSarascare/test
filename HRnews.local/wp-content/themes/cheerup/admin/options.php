<?php
/**
 * Theme Settings - All the relevant options.
 *
 * Note: At normal runtime, options-short.php is used instead. All options are only loaded in
 * customizer or the dynamic CSS generator.
 *
 * @see Bunyad_Options
 * @see Bunyad_Theme_Customizer
 */

/**
 * Commonly used configs.
 */
$_common = include get_theme_file_path('admin/options/common-data.php');
$options = [];

// Get the options
$files = [
	'intro',
	'privacy-gdpr',
	'colors-fonts',
	'layout-main',
	'homepage',
	'header',
	'footer',
	'layout-pages',
	'archives',
	'header',
	'posts-global',
	'posts-listings',
	'posts-sliders',
	'posts-feat-grids',
	'posts-single',
	'misc',
];

foreach ($files as $file) {
	require get_theme_file_path('admin/options/' . $file . '.php');
}

// Examples:
/*
$options['panel'] = [
'title' => esc_html_x('Title', 'Admin', 'cheerup'),
'id'    => 'homepage',
'classes' => 'spacing-below',
'add_heading' => 'Section Heading',
'add_heading_after' => true,
'sections' =>
];
 */

return [

	$options['intro'],
	[
		'sections' => [
			[
				'id'     => 'bunyad-select-skin',
				'title'  => esc_html_x('Skins & Demos', 'Admin', 'cheerup'),
				'desc'   => '',
				'fields' => [

					[
						'name'  => 'import_info',
						'label' => esc_html_x('Import Theme Demos', 'Admin', 'cheerup'),
						'type'  => 'content',
						'text'  => '',
					],

					[
						'name'    => 'predefined_style',
						'label'   => esc_html_x('Select the Skin', 'Admin', 'cheerup'),
						'value'   => '',
						'desc'    => 'This applies skin styles like colors, fonts etc. If you want all the content or full settings of a demo, import a theme demo (see above info).',
						'type'    => 'radio',
						'options' => [
							''          => esc_html_x('Default', 'Admin', 'cheerup'),
							'general'   => esc_html_x('General', 'Admin', 'cheerup'),
							'beauty'    => esc_html_x('Beauty', 'Admin', 'cheerup'),
							'trendy'    => esc_html_x('Trendy', 'Admin', 'cheerup'),
							'miranda'   => esc_html_x('Miranda / Lifestyle', 'Admin', 'cheerup'),
							'rovella'   => esc_html_x('Rovella', 'Admin', 'cheerup'),
							'travel'    => esc_html_x('Travel', 'Admin', 'cheerup'),
							'magazine'  => esc_html_x('Magazine', 'Admin', 'cheerup'),
							'bold'      => esc_html_x('Bold Blog', 'Admin', 'cheerup'),
							'fashion'   => esc_html_x('Fashion', 'Admin', 'cheerup'),
							'mom'       => esc_html_x('Mom / Parents', 'Admin', 'cheerup'),
							'fitness'   => esc_html_x('Fitness', 'Admin', 'cheerup'),
							'lifestyle' => esc_html_x('Lifestyle Mag', 'Admin', 'cheerup'),
						],
					],

					[
						'name'  => 'installed_demo',
						'value' => '',
						'type'  => 'ignore',
					]
				], // fields

			], // section

		], // sections

	], // pseudo panel

	// Core Layouts
	[
		'id'          => 'h-core-layouts',
		'add_heading' => esc_html_x('Core Layouts', 'Admin', 'cheerup'),
		'sections'    => [],
	],
	$options['colors-fonts'],
	$options['layout-main'],
	$options['homepage'],
	$options['header'],
	$options['footer'],

	[
		'id'          => 'h-posts',
		'add_heading' => esc_html_x('Posts & Listings', 'Admin', 'cheerup'),
		'sections'    => [],
	],
	$options['posts-global'],
	$options['posts-single'],
	$options['posts-listings'],
	$options['posts-sliders'],
	$options['posts-feat-grids'],

	[
		'sections' => [[
			'id'     => 'posts-pinterest',
			'title'  => esc_html_x('Pinterest on Images', 'Admin', 'cheerup'),
			'fields' => [

				[
					'name'  => 'pinit_button',
					'label' => esc_html_x('Show Pin It On Hover?', 'Admin', 'cheerup'),
					'value' => 0,
					'desc'  => esc_html_x('When enabled, on single posts and large posts body, pin it button will show on hover (only works on non-touch devices).', 'Admin', 'cheerup'),
					'type'  => 'checkbox',
				],

				[
					'name'  => 'pinit_button_label',
					'label' => esc_html_x('Show Label', 'Admin', 'cheerup'),
					'value' => 0,
					'type'  => 'checkbox',
				],

				[
					'name'  => 'pinit_button_text',
					'label' => esc_html_x('Button Label', 'Admin', 'cheerup'),
					'value' => esc_html__('Pin It', 'cheerup'),
					'type'  => 'text',
				],

				[
					'name'    => 'pinit_show_on',
					'label'   => esc_html_x('Show On:', 'Admin', 'cheerup'),
					'value'   => ['single'],
					'type'    => 'checkboxes',
					'options' => [
						'single'  => esc_html_x('Single Post Images', 'Admin', 'cheerup'),
						'listing' => esc_html_x('Listings/Categories: Featured Images', 'Admin', 'cheerup'),
					],
				],

			], // fields
		]], // section
	],

	// Other Layouts
	[
		'id'          => 'h-other-layouts',
		'add_heading' => esc_html_x('Other Layouts', 'Admin', 'cheerup'),
		'sections'    => [],
	],

	$options['layout-pages'],
	$options['archives'],

	// Misc Features
	[
		'id'          => 'h-misc-features',
		'add_heading' => esc_html_x('Misc. Features', 'Admin', 'cheerup'),
		'sections'    => [],
	],
	$options['misc-social'],
	$options['misc-performance'],
	$options['misc-woocommerce'],
	$options['misc-other'],
	$options['privacy-gdpr'],

	[
		// 'id' => 'reset-customizer',
		// 'add_heading' => esc_html_x('WP Core & Others', 'Admin', 'cheerup'),
		// 'add_heading_after' => true,
		'sections' => [
			[
				'id'      => 'reset-customizer',
				'title'   => esc_html_x('Reset Settings', 'Admin', 'cheerup'),
				'classes' => 'spacing-below',
				'fields'  => [
					[
						'name'        => 'reset_customizer',
						'value'       => esc_html_x('Reset All Settings', 'Admin', 'cheerup'),
						'desc'        => esc_html_x('Clicking the Reset button will revert all settings in the customizer except for menus, widgets and site identity.', 'Admin', 'cheerup'),
						'type'        => 'button',
						'input_attrs' => [
							'class' => 'button reset-customizer',
						],
					],
				],
			],
		], // sections
	], // panel
];
