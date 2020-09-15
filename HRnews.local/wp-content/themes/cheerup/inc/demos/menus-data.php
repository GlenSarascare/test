<?php
/**
 * Sample menus data.
 */
$demo_id    = isset($demo_id) ? $demo_id : '';

$menus_data = [
	'cheerup-main' => [
		'location' => 'cheerup-main',
		'label'    => 'Main Menu',
		'items'    => [
			'home' => [
				'title'   => 'Home',
				'url'     => '{base_url}',
			],
			'features' => [
				'title'   => 'Features',
				'url'     => '#',
				'items'   => [
					'example-post' => [
						'title'  => 'Example Post',
						'type'   => 'post',

					],
					'typography' => [
						'title'  => 'Typography',
						'type'   => 'page',
						'slug'   => 'typography',
					],
					'contact' => [
						'title'  => 'Contact',
						'type'   => 'page',
						'slug'   => 'contact-me',
					],
					'view-all' => [
						'title'  => 'View All On Demos',
						'url'    => 'https://theme-sphere.com/demo/cheerup-landing/',
						'target' => '_blank'
					],
				]
			],
			'fashion' => [
				'type' => 'category',
				'slug' => 'fashion',
				'meta' => [
					'mega_menu' => 'category'
				],
			],
			'about' => [
				'title' => 'About',
				'type'  => 'page',
				'slug'  => 'about-shane'
			],
			'lifestyle' => [
				'type' => 'category',
				'slug' => 'lifestyle',
				'meta' => [
					'mega_menu' => 'category'
				],
				'items' => [
					'cat-1' => [
						'type' => 'category',
						'slug' => 'travel',
					],
					'cat-2' => [
						'type' => 'category',
						'slug' => 'fashion',
					],
					'cat-3' => [
						'type' => 'category',
						'slug' => 'beauty'
					],
				]
			],
			'buy-now' => [
				'title'  => 'Buy Now',
				'url'    => 'https://theme-sphere.com/buy/go.php?theme=cheerup',
				'target' => '_blank'
			]
		]
	]
];

/**
 * Extra menu data for magazine demo.
 */
if ($demo_id === 'magazine') {
	
	$homes = [
		'home-2' => [
			'title'  => 'Home 2',
			'type'   => 'page',
			'slug'   => 'homepage-2',
		],
		'home-3' => [
			'title'  => 'Home 3',
			'type'   => 'page',
			'slug'   => 'homepage-3',
		],
		'home-4' => [
			'title'  => 'Home 4',
			'type'   => 'page',
			'slug'   => 'homepage-4',
		],
		'home-5' => [
			'title'  => 'Home 5',
			'type'   => 'page',
			'slug'   => 'homepage-5',
		],
	];

	$extra = [
		'cheerup-main' => [
			'location' => 'cheerup-main',
			'label'    => 'Main Menu',
			'items'    => [
				'home' => [
					'items' => $homes
				]
			]
		]
	];

	$menus_data = array_replace_recursive($menus_data, $extra);
}

return $menus_data;