<?php
/**
 * Global Color Options
 */

$notice_settings = <<<EOF
<p>Specific color and typography options are in most individual sections. 

Explore from Customizer: 
<a href="#"  class="focus-link is-with-nav" data-panel="bunyad-header">Header</a>, 
<a href="#" class="focus-link is-with-nav" data-panel="bunyad-posts-listings">Posts & Listings</a>, 
<a href="#" class="focus-link is-with-nav" data-section="bunyad-posts-single-design">Single Post / Page Design</a> and most of the other sections.</p>

EOF;

$fields = [

	/**
	 * Group: Global Colors
	 */
	[
		'name'  => '_g_colors_global',
		'label' => esc_html_x('Global Colors', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible',
		// 'collapsed' => false
	],

		[
			'name'  => 'css_main_color',
			'value' => '#07a3cc',
			'label' => esc_html_x('Main Theme Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'vars' => ['props' => ['--main-color' => '%s', '--main-color-rgb' => 'hexToRgb(%s)']]
			],
			'group' => '_g_colors_global',
		],
		
		[
			'name'  => 'css_site_bg',
			'value' => '#ffffff',
			'label' => esc_html_x('Site Background Color', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'body' => ['props' => ['background-color' => '%s']]
			],
			'group' => '_g_colors_global',
		],

		[
			'name'  => 'css_body_color',
			'value' => '',
			'label' => esc_html_x('Main Text Color', 'Admin', 'cheerup'),
			'desc'  => 'Body and text color. To change specific text colors such as excerpt and post body, check below and Posts & Listings.',
			'type'  => 'color',
			'css'   => [
				'body' => ['props' => ['color' => '%s']],
				'vars' => ['props' => ['--text-color' => '%s']],
			],
			'group' => '_g_colors_global',
		],

		[
			'name'  => 'css_posts_content_color',
			'value' => '#494949',
			'label' => esc_html_x('Content / Excerpts Color', 'Admin', 'cheerup'),
			'desc'  => 'Shared between excerpts, posts body, text.',
			'type'  => 'color',
			'css'   => [
				'vars' => ['props' => ['--text-color' => '%s']],
			],
			'group' => '_g_colors_global',
		],

		[
			'name'  => 'css_h_color',
			'value' => '#161616',
			'label' => esc_html_x('Headings Color', 'Admin', 'cheerup'),
			'desc'  => esc_html_x('Affects post titles, widget/block headings, h elements in posts etc. Can be overridden with more specific settings.', 'Admin', 'cheerup'),
			'type'  => 'color',
			'css'   => [
				'vars' => ['props' => ['--h-color' => '%s']],
			],
			'group' => '_g_colors_global',
		],

		[
			'name'  => 'css_posts_title_color',
			'value' => '',
			'label' => esc_html_x('Post Titles Color', 'Admin', 'cheerup'),
			'desc'  => esc_html_x('Changing this affects post title colors globally. See specifics in Single Post, Posts & Listings etc.', 'Admin', 'cheerup'),
			'type'  => 'color',
			'css'   => [
				'.post-title, 
				.post-title-alt, 
				.post-title a, 
				.post-title-alt a' 
						=> ['props' => ['color' => '%s']]
			],
			'group' => '_g_colors_global',
		],
	
	/**
	 * Group: Global Typography
	 */
	[
		'name'  => '_g_typo_global',
		'label' => esc_html_x('Global Typography', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible'
	],
		[
			'name'    => 'css_font_text',
			'label'   => esc_html_x('Primary Font', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => esc_html_x('Used for text mainly. Select from list or click and type your own Google Font name (or TypeKit if you have configured it).', 'Admin', 'cheerup'),
			'type'    => 'font-family',
			'css'     => [
				'vars' => ['props' => ['--text-font' => '%s', '--body-font' => '%s']]
			],
			'group' => '_g_typo_global',
		],
		
		[
			'name'    => 'css_font_secondary',
			'label'   => esc_html_x('Secondary Font', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => esc_html_x('Used for headings, meta, navigation and so on.', 'Admin', 'cheerup'),
			'type'    => 'font-family',
			'classes' => 'sep-bottom',
			'css'     => [
				'vars' => ['props' => [
					'--ui-font'    => '%s', 
					'--title-font' => '%s', 
					'--h-font'     => '%s',
					'--alt-font'   => '%s',
					'--alt-font2'  => '%s',
				]]
			],
			'group' => '_g_typo_global',
			
		],

		[
			'name'    => 'css_font_headings',
			'label'   => esc_html_x('Headings Font', 'Admin', 'cheerup'),
			'value'   => '',
			'desc'    => esc_html_x('Used for headings, post titles etc.', 'Admin', 'cheerup'),
			'type'    => 'font-family',
			'css'     => [
				'vars' => ['props' => [
					'--title-font' => '%s', 
					'--h-font'     => '%s',
				]]
			],
			'group' => '_g_typo_global',
			
		],
		
		
		[
			'name'             => 'css_font_post_titles',
			'label'            => esc_html_x('Post Titles Typography', 'Admin', 'cheerup'),
			'value'            => '',
			'desc'             => esc_html_x('Global post title, affects all. For more typography settings, go to Posts & Listings and edit for specifc layouts like Grid.', 'Admin', 'cheerup'),
			'type'             => 'group',
			'group_type'       => 'typography',
			'style'            => 'edit',
			'css'              => '.post-title, .post-title-alt',
			'controls_options' => [
				'family' => ['css'  => [
					'vars' => ['props' => ['--title-font' => '%s']]
				]],
			],
			'controls' => ['family', 'spacing', 'transform', 'weight', 'style'],
			'group'    => '_g_typo_global',
		],

		/**
		 * Group: Base Sizes
		 */
		[
			'name'    => '_g_base_sizes',
			'label'   => esc_html_x('Advanced: Base Sizes', 'Admin', 'cheerup'),
			'desc'    => 'These settings affect several post titles in several listings, blocks, sliders etc.',
			'type'    => 'group',
			'style'   => 'collapsible',
			'group'   => '_g_typo_global'
		],

			[
				'name'  => 'css_title_size_s',
				'value' => '',
				'label' => esc_html_x('Base: Small Title', 'Admin', 'cheerup'),
				'desc'  => '',
				'type'  => 'number',
				'style' => 'inline-sm',
				'css'   => [
					'vars' => ['props' => ['--title-size-s' => '%spx']]
				],
				'group'   => '_g_base_sizes'
			],

			[
				'name'  => 'css_title_size_n',
				'value' => '',
				'label' => esc_html_x('Base: Normal Title', 'Admin', 'cheerup'),
				'desc'  => '',
				'type'  => 'number',
				'style' => 'inline-sm',
				'css'   => [
					'vars' => ['props' => ['--title-size-n' => '%spx']]
				],
				'group'   => '_g_base_sizes'
			],

			[
				'name'  => 'css_title_size_m',
				'value' => '',
				'label' => esc_html_x('Base: Medium Title', 'Admin', 'cheerup'),
				'desc'  => '',
				'type'  => 'number',
				'style' => 'inline-sm',
				'css'   => [
					'vars' => ['props' => ['--title-size-m' => '%spx']]
				],
				'group'   => '_g_base_sizes'
			],

			[
				'name'  => 'css_title_size_l',
				'value' => '',
				'label' => esc_html_x('Base: Large Title', 'Admin', 'cheerup'),
				'desc'  => '',
				'type'  => 'number',
				'style' => 'inline-sm',
				'css'   => [
					'vars' => ['props' => ['--title-size-l' => '%spx']]
				],
				'group'   => '_g_base_sizes'
			],

			[
				'name'  => 'css_base_text_size',
				'value' => '',
				'label' => esc_html_x('Base: Text Size', 'Admin', 'cheerup'),
				'desc'  => 'Affects body text in some widgets, comments, author bio etc.',
				'type'  => 'number',
				'style' => 'inline-sm',
				'css'   => [
					'vars' => ['props' => ['--text-size' => '%spx']]
				],
				'group'   => '_g_base_sizes'
			],
			

	// // Group: Post Content
	// [
	// 	'name'  => '_g_post_content_body',
	// 	'label' => esc_html_x('Post/Page Body', 'Admin', 'cheerup'),
	// 	'desc'  => 'These settings apply to single posts & pages.',
	// 	'type'  => 'group',
	// 	'style' => 'collapsible',
	// ],

	/**
	 * Group: Google Font Settings
	 */
	[
		'name'  => '_g_google_fonts',
		'label' => esc_html_x('Google Font Settings', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible'
	],

		[
			'name'    => 'font_charset',
			'label'   => esc_html_x('Google Font Charsets', 'Admin', 'cheerup'),
			'desc'    => esc_html_x('Not generally required. Sometimes, an additional character sets maybe necessary.', 'Admin', 'cheerup'),
			'value'   => [],
			'type'    => 'checkboxes',
			'options' => [
				'latin'        => 'Latin',
				'latin-ext'    => 'Latin Extended',
				'cyrillic'     => 'Cyrillic',
				'cyrillic-ext' => 'Cyrillic Extended', 
				'greek'        => 'Greek',
				'greek-ext'    => 'Greek Extended',
				'vietnamese'   => 'Vietnamese',
				'hebrew'       => 'Hebrew',
				'devanagari'   => 'Devanagari',
				'thai'         => 'Thai',
				'korean'       => 'Korean',
			],
			'group' => '_g_google_fonts',
		],

		[
			'name'  => 'font_display',
			'label' => esc_html_x('Google Font Display Swap', 'Admin', 'cheerup'),
			'desc'  => sprintf(
				esc_html_x('%sRead details here%s. You can control how font is rendered while it loads. Swap is best if you have slow connection users. Block if you dont want to see a different font at all.', 'Admin', 'cheerup'),
				'<a href="https://plugins.theme-sphere.com/docs/sgf-pro/pages/font-display-behavior/#meaning-of-each-option" target="_blank">', '</a>'
			),
			'value'   => '',
			'type'    => 'select',
			'style'   => 'inline-sm',
			'options' => [
				''         => 'Default/Auto',
				'swap'     => 'Swap',
				'block'    => 'Block',
				'fallback' => 'Fallback',
				'optional' => 'Optional',
			],
			'group' => '_g_google_fonts',
		],


	/**
	 * Group: Typekit
	 */
	[
		'name'  => '_g_typekit',
		'label' => esc_html_x('Adobe Fonts / TypeKit', 'Admin', 'cheerup'),
		'type'  => 'group',
		'style' => 'collapsible'
	],

		[
			'name'  => 'typekit_id',
			'label' => esc_html_x('Adobe Fonts Kit ID', 'Admin', 'cheerup'),
			'value' => '',
			'desc'  => esc_html_x('Refer to the documentation to learn about using Typekit.', 'Admin', 'cheerup'),
			'type'  => 'text',
			'group' => '_g_typekit',
		],

	[
		'name'  => '_n_more_colors',
		'type'  => 'message',
		'label' => 'More Colors & Typography',
		'text'  => $notice_settings,
		'style' => 'message-info',
	],
];

$options['colors-fonts'] = [
	'sections' => [[
		'title'  => esc_html_x('Colors & Typography', 'Admin', 'cheerup'),
		'id'     => 'sphere-style',
		'fields' => $fields,
	]]
];

return $options;