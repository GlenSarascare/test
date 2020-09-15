<?php

return array(

	// image
	'image'         => array(
		'fashion1'  => 'https://jegtheme.com/asset/jnews/demo/default/fashion1.jpg',
		'fashion2'  => 'https://jegtheme.com/asset/jnews/demo/default/fashion2.jpg',
		'fashion3'  => 'https://jegtheme.com/asset/jnews/demo/default/fashion3.jpg',
		'fashion4'  => 'https://jegtheme.com/asset/jnews/demo/default/fashion4.jpg',
		'fashion5'  => 'https://jegtheme.com/asset/jnews/demo/default/fashion5.jpg',
		'fashion6'  => 'https://jegtheme.com/asset/jnews/demo/default/fashion6.jpg',
		'fashion7'  => 'https://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
		'fashion8'  => 'https://jegtheme.com/asset/jnews/demo/default/travel2.jpg',
		'fashion9'  => 'https://jegtheme.com/asset/jnews/demo/default/travel3.jpg',
		'fashion10' => 'https://jegtheme.com/asset/jnews/demo/default/travel4.jpg',

		'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',
		'logo'    => 'https://jegtheme.com/asset/jnews/demo/coffeenews/logo.png',
		'logo2x'  => 'https://jegtheme.com/asset/jnews/demo/coffeenews/logo@2x.png',
		'footer'    => 'https://jegtheme.com/asset/jnews/demo/coffeenews/footer.png',
		'footer2x'  => 'https://jegtheme.com/asset/jnews/demo/coffeenews/footer@2x.png',
		'headerbg'  => 'https://jegtheme.com/asset/jnews/demo/coffeenews/coffeenews-header.jpg',

		'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
		'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
		'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
	),

	// create taxonomy
	'taxonomy'      => array(
		'category' => array(
			'coffee'      => array(
				'title'       => 'Coffee',
				'description' => ''
			),
			'farming'     => array(
				'title'       => 'Farming',
				'description' => ''
			),
			'how-to' => array(
				'title'       => 'How To',
				'description' => ''
			),
			'inspiration'    => array(
				'title'       => 'Inspiration',
				'description' => ''
			),
			'news'    => array(
				'title'       => 'News',
				'description' => ''
			),
		),
	),

	// post & page
	'post'          => array(
		'costa-rica-a-classic-origin-at-a-crossroads' => array(
			'title' => "Costa Rica: A Classic Origin at a Crossroads",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion3',
			'taxonomy' => array(
				'category' => 'coffee,farming,inspiration',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'ethical-shopping-guide-fair-trade-and-organic' => array(
			'title' => "Ethical Shopping Guide: Fair Trade and Organic",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion4',
			'taxonomy' => array(
				'category' => 'coffee,how-to,inspiration',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'how-to-make-coffee-the-scientific-way' => array(
			'title' => "How to Make Coffee Robusta the Scientific Way?",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion5',
			'taxonomy' => array(
				'category' => 'coffee,how-to,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'what-can-you-expect-from-vilnius-coffee-festival-2019' => array(
			'title' => "What Can You Expect from Vilnius Coffee Festival 2019?",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion6',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'calculating-water-benefits-on-modern-coffee-farms' => array(
			'title' => "Calculating Water Benefits on Modern Coffee Farms",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion7',
			'taxonomy' => array(
				'category' => 'coffee,farming,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'central-america-coffee-land-to-shrink-as-globe-warms' => array(
			'title' => "Central America Coffee Land to Shrink as Globe Warms",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion8',
			'taxonomy' => array(
				'category' => 'coffee,farming,inspiration',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'carbon-footprint-of-vietnamese-robusta-problem-and-potential' => array(
			'title' => "Footprint of Vietnamese Robusta Potential",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion9',
			'taxonomy' => array(
				'category' => 'coffee,farming,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'starbucks-supplying-2-million-coffee-seeds-to-puerto-rico' => array(
			'title' => "Starbucks Supplying 2 Million Coffee Seeds to Puerto Rico",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion10',
			'taxonomy' => array(
				'category' => 'coffee,how-to,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'best-cafes-to-visit-in-budapest' => array(
			'title' => "Best Cafés to Visit in South Budapest",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion1',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'how-to-make-coffee-icecream-in-your-own-home' => array(
			'title' => "How to Make Coffee Icecream in Your Own Home",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion2',
			'taxonomy' => array(
				'category' => 'coffee,how-to,inspiration',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'panama-canal-authority-opens-coffee-processing-plant' => array(
			'title' => "Panama Canal Authority Opens Coffee Processing Plant",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion3',
			'taxonomy' => array(
				'category' => 'coffee,farming,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'simple-roast-makes-it-look-easy-in-auburn-new-york' => array(
			'title' => "Simple Roast Makes It Look Easy in Auburn, New York",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion4',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'coffee-is-the-worlds-second-most-valuable-commodity' => array(
			'title' => "Coffee is the World’s Second Most Valuable Commodity",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion5',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'how-to-measure-strength-of-coffee' => array(
			'title' => "How to Measure Strength of Coffee?",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion6',
			'taxonomy' => array(
				'category' => 'coffee,how-to,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'rich-farmer-poor-farmer-perspective-on-profitability-in-coffee-farming' => array(
			'title' => "Rich Farmer, Poor Farmer: Perspective on Profitability in Coffee Farming",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion7',
			'taxonomy' => array(
				'category' => 'coffee,farming,inspiration',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'a-cup-of-coffee-with-tim-wendelboe' => array(
			'title' => "A Cup of Coffee with Tim Wendelboe",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion8',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'barista-edition-a-guide-to-dairy-free-milks' => array(
			'title' => "Barista Edition: A Guide to Dairy-Free Milks",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion9',
			'taxonomy' => array(
				'category' => 'coffee,how-to,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'colombian-coffee-grown-on-sunny-slopes-of-andes' => array(
			'title' => "Colombian Coffee – Grown on Sunny Slopes of Andes",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion10',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'coffee-culture-and-cafes-in-france' => array(
			'title' => "Coffee Culture and Cafés in France",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion1',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'coffee-is-most-effective-if-consumed-in-the-morning' => array(
			'title' => "Coffee is Most Effective if Consumed in the Morning",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion2',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'opinion-without-action-the-future-of-coffee-is-not-secure' => array(
			'title' => "Opinion: Without Action, The Future of Coffee Is Not Secure",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion3',
			'taxonomy' => array(
				'category' => 'coffee,farming,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'coffee-farmers-face-increasing-pressure-to-migrate' => array(
			'title' => "Coffee Farmers Face Increasing Pressure To Migrate",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion4',
			'taxonomy' => array(
				'category' => 'coffee,farming,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'green-coffee-movement-royal-coffee-in-tokyo' => array(
			'title' => "Green Coffee Movement: Royal Coffee In Tokyo",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion5',
			'taxonomy' => array(
				'category' => 'coffee,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'coffee-culture-in-turkey' => array(
			'title' => "Coffee Culture in Turkey",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion6',
			'taxonomy' => array(
				'category' => 'coffee,inspiration,news',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'new-film-on-gender-equity-in-coffee-seeking-support' => array(
			'title' => "New Film on Gender Equity in Coffee Seeking Support",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion7',
			'taxonomy' => array(
				'category' => 'coffee,how-to',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'how-to-make-cold-brew-coffee' => array(
			'title' => "How to Make Cold Brew Coffee?",
			'content' => 'post2.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion8',
			'taxonomy' => array(
				'category' => 'coffee,how-to,inspiration',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),
		'7' => array(
			'title' => "Mulled Wine with a Coffee Twist",
			'content' => 'post1.txt',
			'post_type' => 'post',
			'featured_image' => 'fashion9',
			'taxonomy' => array(
				'category' => 'coffee,how-to',
				'post_tag' => ''
			),
			'metabox' => array(
				'jnews_primary_category' => array('id' => '{{category::id}}')
			)
		),

		// page
		'home-1'                                             => array(
			'title'     => 'Home Layout 1',
			'content'   => 'home1.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1559107674532{margin-bottom: 40px !important;background-color: #f9f9f9 !important;}.vc_custom_1559022479255{margin-bottom: 30px !important;}.vc_custom_1572934905013{margin-bottom: 0px !important;}.vc_custom_1559107701238{padding-top: 30px !important;}',
				'_wpb_post_custom_css'       => '.jeg_content { padding-top : 0; } .jeg_postblock_10 .jeg_pl_lg_4 .jeg_post_title { font-size : 28px; } .jeg_postblock_22 .jeg_pl_md_5 .jeg_post_title { font-size : 18px; } .jegwidgetpopular .jeg_pl_sm .jeg_post_title { font-size : 16px; } @media only screen and (min-width : 1024px) { .jeg_slider_type_4 .jeg_slide_caption .jeg_post_title { font-size : 48px; margin-top: 20px; } }',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_data'          => 'home1.json',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1559107674532{margin-bottom: 40px !important;background-color: #f9f9f9 !important;}.vc_custom_1559022479255{margin-bottom: 30px !important;}.vc_custom_1572934905013{margin-bottom: 0px !important;}.vc_custom_1559107701238{padding-top: 30px !important;}.jeg_content { padding-top : 0; } .jeg_postblock_10 .jeg_pl_lg_4 .jeg_post_title { font-size : 28px; } .jeg_postblock_22 .jeg_pl_md_5 .jeg_post_title { font-size : 18px; } .jegwidgetpopular .jeg_pl_sm .jeg_post_title { font-size : 16px; } @media only screen and (min-width : 1024px) { .jeg_slider_type_4 .jeg_slide_caption .jeg_post_title { font-size : 48px; margin-top: 20px; } }'
				)
			)
		),
		'home-2'                                             => array(
			'title'     => 'Home Layout 2',
			'content'   => 'home2.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'        => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1559104896848{margin-bottom: 30px !important;}.vc_custom_1560306647762{margin-bottom: 30px !important;}.vc_custom_1560822011382{border-top-width: 5px !important;border-right-width: 5px !important;border-bottom-width: 5px !important;border-left-width: 5px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;border-left-color: #f1dec9 !important;border-left-style: solid !important;border-right-color: #f1dec9 !important;border-right-style: solid !important;border-top-color: #f1dec9 !important;border-top-style: solid !important;border-bottom-color: #f1dec9 !important;border-bottom-style: solid !important;}',
				'_wpb_post_custom_css'     => '.jeg_postblock_23 .jeg_post_title { font-size : 20px; } .jeg_inline_subscribeform .mc4wp-form .jeg_mc4wp_heading { font-family: "Playfair Display"; } .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title, .jeg_pl_lg_3 .jeg_post_title { font-size : 28px; } .jegwidgetpopular .jeg_pl_sm .jeg_post_title { font-size :16px; } .jeg_heroblock_13 .jeg_post_title { font-size : 44px; line-height : 1.2em; } @media only screen and (max-width: 1024px) { .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title {font-size : 22px;} } @media only screen and (max-width: 768px) { .jeg_heroblock_13 .jeg_post_title {font-size :30px;} .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title, .jeg_pl_lg_3 .jeg_post_title {font-size :20px;} } @media only screen and (max-width: 480px) { .jeg_heroblock_13 .jeg_post_title {font-size :20px;} .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title {font-size : 18px;} } ',
				'jnews_page_loop'          => array(
					'enable_page_loop'   => '1',
					'first_title'        => 'LATEST POST',
					'header_type'        => 'heading_7',
					'layout'             => 'right-sidebar',
					'sidebar'            => 'sidebar',
					'second_sidebar'     => 'default-sidebar',
					'sticky_sidebar'     => '1',
					'module'             => '5',
					'boxed'              => '0',
					'boxed_shadow'       => '0',
					'box_shadow'         => '0',
					'excerpt_length'     => '20',
					'content_date'       => 'default',
					'date_custom'        => 'Y/m/d',
					'content_pagination' => 'nav_1',
					'pagination_align'   => 'center',
					'show_navtext'       => '0',
					'show_pageinfo'      => '0',
					'post_offset'        => '0',
					'posts_per_page'     => '8',
					'sort_by'            => 'latest',
				),
				'_elementor_data'          => 'home2.json',
				'_elementor_edit_mode'     => 'builder',
				'_elementor_page_settings' => array(
					'custom_css' => '.vc_custom_1559104896848{margin-bottom: 30px !important;}.vc_custom_1560306647762{margin-bottom: 30px !important;}.vc_custom_1560822011382{border-top-width: 5px !important;border-right-width: 5px !important;border-bottom-width: 5px !important;border-left-width: 5px !important;padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;border-left-color: #f1dec9 !important;border-left-style: solid !important;border-right-color: #f1dec9 !important;border-right-style: solid !important;border-top-color: #f1dec9 !important;border-top-style: solid !important;border-bottom-color: #f1dec9 !important;border-bottom-style: solid !important;}.jeg_postblock_23 .jeg_post_title { font-size : 20px; } .jeg_inline_subscribeform .mc4wp-form .jeg_mc4wp_heading { font-family: "Playfair Display"; } .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title, .jeg_pl_lg_3 .jeg_post_title { font-size : 28px; } .jegwidgetpopular .jeg_pl_sm .jeg_post_title { font-size :16px; } .jeg_heroblock_13 .jeg_post_title { font-size : 44px; line-height : 1.2em; } @media only screen and (max-width: 1024px) { .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title {font-size : 22px;} } @media only screen and (max-width: 768px) { .jeg_heroblock_13 .jeg_post_title {font-size :30px;} .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title, .jeg_pl_lg_3 .jeg_post_title {font-size :20px;} } @media only screen and (max-width: 480px) { .jeg_heroblock_13 .jeg_post_title {font-size :20px;} .jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title {font-size : 18px;} }'
				)
			)
		),
		'home-3'                                             => array(
			'title'     => 'Home Layout 3',
			'content'   => 'home3.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1564369558971{margin-bottom: 40px !important;background-color: #f7f7f7 !important;}.vc_custom_1572946562320{margin-top: 10px !important;margin-bottom: 10px !important;}',
				'_wpb_post_custom_css'       => '.jeg_postblock_17 .jeg_post_category { display : none; } @media only screen and (min-width : 1024px) { .jeg_slider_type_2 .jeg_slide_caption .jeg_post_title { font-size : 48px; } .jeg_postblock_17 .jeg_pl_md_1 .jeg_post_title { font-size : 18px; } .jeg_postblock_17 .jeg_pl_sm .jeg_post_title { font-size : 16px; } .jeg_postblock_carousel_3 .jeg_post_title { font-size : 15px; } }',
				'jnews_page_loop'            => array(
					'enable_page_loop'   => '1',
					'first_title'        => 'Latest Post',
					'header_type'        => 'heading_6',
					'layout'             => 'right-sidebar',
					'sidebar'            => 'page-loop',
					'second_sidebar'     => 'default-sidebar',
					'sticky_sidebar'     => '1',
					'module'             => '27',
					'boxed'              => '0',
					'boxed_shadow'       => '0',
					'box_shadow'         => '0',
					'excerpt_length'     => '20',
					'content_date'       => 'default',
					'date_custom'        => 'Y/m/d',
					'content_pagination' => 'nav_1',
					'pagination_align'   => 'center',
					'show_navtext'       => '0',
					'show_pageinfo'      => '0',
					'post_offset'        => '0',
					'posts_per_page'     => '6',
					'sort_by'            => 'latest',
				),
				'_elementor_data'            => 'home3.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1564369558971{margin-bottom: 40px !important;background-color: #f7f7f7 !important;}.vc_custom_1572946562320{margin-top: 10px !important;margin-bottom: 10px !important;}.jeg_postblock_17 .jeg_post_category { display : none; } @media only screen and (min-width : 1024px) { .jeg_slider_type_2 .jeg_slide_caption .jeg_post_title { font-size : 48px; } .jeg_postblock_17 .jeg_pl_md_1 .jeg_post_title { font-size : 18px; } .jeg_postblock_17 .jeg_pl_sm .jeg_post_title { font-size : 16px; } .jeg_postblock_carousel_3 .jeg_post_title { font-size : 15px; } }'
				)
			)
		)
	),

	// menu location
	'menu_location' => array(
		'main-navigation'   => array(
			'title'    => 'Main Navigation',
			'location' => 'navigation'
		)
	),

	// menu it self
	'menu'          => array(

		// main menu
		'home'   => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-1:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'home-1' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home - Layout 1',
				'menu-item-parent-id' => '{{menu:home:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-1:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'home-2' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home - Layout 2',
				'menu-item-parent-id' => '{{menu:home:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-2:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'home-3' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home - Layout 3',
				'menu-item-parent-id' => '{{menu:home:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-3:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'news' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'News',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:news:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'coffee' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Coffee',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:coffee:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'farming' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Farming',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:farming:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'inspiration' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Inspiration',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:inspiration:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'how-to' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'How To',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:how-to:id}}',
				'menu-item-status'    => 'publish'
			)
		)
	),

	'widget_position' => array(
		'Sidebar',
		'Sidebar Single Post',
		'home 3',
		'Page Loop'
	),

	'widget' => array(
		'widget.json',
	),

	'customizer' => array(
		'style.json',
	),

	'plugin' => array(
		'jnews-essential',
		'jnews-front-translation',
		'jnews-gallery',
		'jnews-instagram',
		'jnews-meta-header',
		'jnews-social-share',
		'jnews-jsonld',
		'jnews-like',
		'jnews-view-counter',
		'jnews-customizer-category'
	)
);
