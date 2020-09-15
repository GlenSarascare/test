<?php
/**
 * Footer settings
 */

$contexts = [
	'footers_dark' => [
		'key'   => 'footer_layout',
		'value' => ['bold', 'classic', 'stylish', 'stylish-b', 'contrast']
	]
];

/**
 * Fields: Upper footer
 */
$fields_upper = [
	[
		'name'    => 'footer_layout',
		'value'   => '',
		'label'   => esc_html_x('Select layout', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'select',
		'options' => [
			''           => esc_html_x('Default Light', 'Admin', 'cheerup'),
			'contrast'   => esc_html_x('Dark Contrast', 'Admin', 'cheerup'),
			'alt'        => esc_html_x('Alternate Light', 'Admin', 'cheerup'),
			'stylish'    => esc_html_x('Stylish Dark', 'Admin', 'cheerup'),
			'stylish-b'  => esc_html_x('Stylish Dark Alt', 'Admin', 'cheerup'),
			'classic'    => esc_html_x('Magazine / Classic Dark', 'Admin', 'cheerup'),
			'bold'       => esc_html_x('Bold Dark (Footer Links Supported)', 'Admin', 'cheerup'),
			'bold-light' => esc_html_x('Bold Light (Footer Links Supported)', 'Admin', 'cheerup')
		]
	],
		
	[
		'name'  => 'footer_upper',
		'value' => 1,
		'label' => esc_html_x('Enable Upper Footer', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'checkbox'
	],
	
	[
		'name'    => 'footer_logo',
		'value'   => '',
		'label'   => esc_html_x('Footer Logo', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'upload',
		'options' => [
			'type' => 'image'
		],
		'context' => ['control' => ['key' => 'footer_layout', 'value' => ['contrast', 'stylish', 'stylish-b']]],
	],
	
	[
		'name'    => 'footer_logo_2x',
		'value'   => '',
		'label'   => esc_html_x('Footer Logo Retina (2x)', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'upload',
		'options' => [
			'type' => 'image'
		],
		'context' => ['control' => ['key' => 'footer_layout', 'value' => ['contrast', 'stylish', 'stylish-b']]],
	],

	[
		'name'  => 'css_footer_upper_bg',
		'value' => '',
		'label' => esc_html_x('Upper Footer Background', 'Admin', 'cheerup'),
		'desc'  => '',
		'type'  => 'color',
		'css'   => [
			'.main-footer .upper-footer' => ['props' => ['background-color' =>  '%s', 'border-top' => 'none']]
		]
	],

	[
		'name'    => 'css_footer_bg',
		'value'   => '',
		'label'   => esc_html_x('Footer Background Image', 'Admin', 'cheerup'),
		'desc'    => '',
		'type'    => 'upload',
		'options' => [
			'type' => 'image'
		],
		'context' => ['control' => ['key' => 'footer_layout', 'value' => ['stylish', 'stylish-b', 'classic']]],
		'bg_type' => ['value' => 'cover-nonfixed'],
		'css'     => [
			'.main-footer .bg-wrap:before' => ['props' => ['background-image' =>  'url(%s)']]
		],
	],
		
	[
		'name'        => 'css_footer_bg_opacity',
		'label'       => esc_html_x('Bg Image Opacity', 'Admin', 'cheerup'),
		'value'       => 0,
		'desc'        => esc_html_x('An opacity of 0.2 is recommended.', 'Admin', 'cheerup'),
		'type'        => 'slider',
		'input_attrs' => ['min' => 0, 'max' => 1, 'step' => 0.1],
		'css'         => [
			'.main-footer .bg-wrap:before' => ['props' => ['opacity' => '%s']],
			'.main-footer .lower-footer:not(._)'   => ['props' => ['background' => 'none']],
		],
		'context' => [
			['key' => 'footer_layout', 'value' => ['stylish', 'stylish-b', 'classic']]
		],
	]
];

Bunyad::helpers()->repeat_options(
	[
		[
			'name'  => 'css_footer_post_title_{key}',
			'value' => '',
			'label' => esc_html_x('Post Titles in Widgets', 'Admin', 'cheerup'),
			'desc'  => '',
			'type'  => 'color',
			'css'   => [
				'.main-footer .post-title, .main-footer .product-title'	=> [
					'props' => ['color' => '%s !important']
				]
			],
		]
	],
	[
		'dark' => [
			'context' => [$contexts['footers_dark']],
		],
		'light' => [
			'context' => [
				$contexts['footers_dark'] + ['compare' => '!=']
			],
		]
	],
	$fields_upper,
	['replace_in' => []]
);

/**
 * Fields: Instagram
 */
$fields_insta = [
	[
		'name'  => '_n_footer_insta',
		'type'  => 'message',
		'label' => 'Instagram Widget',
		'text'  => 'To get the Instagram Area to show images, you have to add the Instagram widget first.
			 <a href="https://cheerup.theme-sphere.com/documentation/#footer-instagram" target="_blank">Learn More</a>.',
		'style' => 'message-info',
	],

	[
		'name'  => 'css_insta_overlay',
		'label' => esc_html_x('Hide Follow Me Overlay', 'Admin', 'cheerup'),
		'type'  => 'checkbox',
		'value' => 0,
		'css'   => [
			'.mid-footer a.overlay' => ['props' => ['display' => 'none']]
		]
	],

	[
		'name'    => 'css_midfoot_padding',
		'label'   => esc_html_x('Padding/Spacing', 'Admin', 'cheerup'),
		'type'    => 'dimensions',
		'value'   => 0,
		'devices' => true,
		'css'     => [
			'.mid-footer' => ['dimensions' => 'padding']
		]
	],

	[
		'name'        => 'css_midfoot_insta_cols',
		'label'       => esc_html_x('Total Columns', 'Admin', 'cheerup'),
		'desc'        => 'For example, 7 columns to display 7 images in a row.',
		'type'        => 'slider',
		'input_attrs' => ['min' => 2, 'max' => 15],
		'value'       => '',
		'devices'     => true,
		'css'         => [
			'.mid-footer' => [
				'props' => ['--mf-insta-cols' => '%d'],
			],
		]
	],

	[
		'name'        => 'css_midfoot_insta_items_row',
		'label'       => esc_html_x('Total Rows', 'Admin', 'cheerup'),
		'type'        => 'slider',
		'input_attrs' => ['min' => 1, 'max' => 4],
		'value'       => '',
		'devices'     => true,
		'css'         => [
			'.mid-footer' => [
				'props' => ['--mf-insta-rows' => '%d'],
			],
		]
	],


];


$sections = [
						
	[
		'id'     => 'footer-upper',
		'title'  => esc_html_x('General & Upper Footer', 'Admin', 'cheerup'),
		'fields' => $fields_upper
	], // section

	[
		'id'     => 'footer-insta',
		'title'  => esc_html_x('Instagram Area', 'Admin', 'cheerup'),
		'fields' => $fields_insta
	], // section
	
	[
		'id'     => 'footer-lower',
		'title'  => esc_html_x('Lower Footer', 'Admin', 'cheerup'),
		'fields' => [
	
			[
				'name'  => 'footer_lower',
				'value' => 1,
				'label' => esc_html_x('Enable Lower Footer', 'Admin', 'cheerup'),
				'desc'  => '',
				'type'  => 'checkbox'
			],
			
			[
				'name'    => 'footer_links',
				'value'   => 0,
				'label'   => esc_html_x('Enable Footer Links', 'Admin', 'cheerup'),
				'desc'    => esc_html_x('After ticking here, save and add a menu from Appearance > Menus and assign it to footer links.', 'Admin', 'cheerup'),
				'type'    => 'checkbox',
				'context' => ['control' => ['key' => 'footer_layout', 'value' => ['bold', 'bold-light']]],
			],
			
			[
				'name'  => 'footer_copyright',
				'value' => '&copy; 2020 ThemeSphere. Designed by <a href="http://theme-sphere.com">ThemeSphere</a>.', // Example copyright message in Customizer
				'label' => esc_html_x('Copyright Message', 'Admin', 'cheerup'),
				'desc'  => '',
				'type'  => 'text'
			],
			
			[
				'name'    => 'footer_back_top',
				'value'   => 1,
				'label'   => esc_html_x('Show Back to Top', 'Admin', 'cheerup'),
				'desc'    => '',
				'type'    => 'checkbox',
				'context' => ['control' => ['key' => 'footer_layout', 'value' => '']]
			],
				
			[
				'label'   => esc_html_x('Footer Social Icons', 'Admin', 'cheerup'),
				'name'    => 'footer_social',
				'value'   => ['facebook', 'twitter', 'instagram'],
				'desc'    => sprintf(
					esc_html_x('NOTE: Configure these icons URLs from %1$sSocial Media Links%2$s.', 'Admin', 'cheerup'),
					'<a href="#" class="focus-link is-with-nav" data-section="bunyad-misc-social">',
					'</a>'
				),
				'type'    => 'checkboxes',
			
				// Show only if header layout is default
				'context' => ['control' => ['key' => 'footer_layout', 'value' => ['contrast', 'alt', 'stylish', 'stylish-b', 'bold']]],
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
			],

			[
				'name'  => 'css_footer_lower_bg',
				'value' => '',
				'label' => esc_html_x('Lower Footer Background', 'Admin', 'cheerup'),
				'desc'  => '',
				'type'  => 'color',
				'css'   => [
					'.main-footer .lower-footer' => ['props' => ['background-color' =>  '%s', 'border-top' => 'none']]
				],
			],
	
		], // fields
	], // section
];

$options['footer'] = [
	'title'    => esc_html_x('Footer Settings', 'Admin', 'cheerup'),
	'id'       => 'footer',
	'desc'     => esc_html_x('Middle footer is activated by adding an instagram widget.', 'Admin', 'cheerup'),
	'sections' => $sections
];

return $options;