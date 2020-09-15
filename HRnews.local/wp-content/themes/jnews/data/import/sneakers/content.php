<?php

return array(

	// image
	'image'         => array(
		'fashion1'    => 'https://jegtheme.com/asset/jnews/demo/default/fashion1.jpg',
		'fashion2'    => 'https://jegtheme.com/asset/jnews/demo/default/fashion2.jpg',
		'fashion3'    => 'https://jegtheme.com/asset/jnews/demo/default/fashion3.jpg',
		'fashion4'    => 'https://jegtheme.com/asset/jnews/demo/default/fashion4.jpg',
		'fashion5'    => 'https://jegtheme.com/asset/jnews/demo/default/fashion5.jpg',
		'fashion6'    => 'https://jegtheme.com/asset/jnews/demo/default/fashion6.jpg',
		'fashion7'    => 'https://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
		'fashion8'    => 'https://jegtheme.com/asset/jnews/demo/default/travel2.jpg',
		'fashion9'    => 'https://jegtheme.com/asset/jnews/demo/default/travel3.jpg',
		'fashion10'   => 'https://jegtheme.com/asset/jnews/demo/default/travel4.jpg',

		'favicon'     => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',
		'logo'        => 'https://jegtheme.com/asset/jnews/demo/sneakers/logo.png',
		'logo2x'      => 'https://jegtheme.com/asset/jnews/demo/sneakers/logo@2x.png',
		'logo_dark'   => 'https://jegtheme.com/asset/jnews/demo/sneakers/logo_dark.png',
		'logo_dark2x' => 'https://jegtheme.com/asset/jnews/demo/sneakers/logo_dark@2x.png',

		'ad_345x345'  => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
		'ad_300x600'  => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
		'ad_970x250'   => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x250.jpg'
	),

	// create taxonomy
	'taxonomy'      => array(
		'category' => array(
			'men'      => array(
				'title'       => 'Men',
				'description' => ''
			),
			'news'     => array(
				'title'       => 'News',
				'description' => ''
			),
			'sneakers' => array(
				'title'       => 'Sneakers',
				'description' => ''
			),
			'style'    => array(
				'title'       => 'Style',
				'description' => ''
			),
			'women'    => array(
				'title'       => 'Women',
				'description' => ''
			),
		),
	),

	// post & page
	'post'          => array(
		'usain-bolt-tweet-hints-that-j-cole-has-signed-with-puma'                 => array(
			'title'          => "Usain Bolt Tweet Hints That J. Cole Has Signed With PUMA",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion2',
			'taxonomy'       => array(
				'category' => 'men,news,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'marvel-and-adidas-are-dropping-a-collab-to-celebrate-avengers-endgame'   => array(
			'title'          => "Marvel and Adidas Are Dropping a Collab to Celebrate 'Avengers: Endgame'",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion3',
			'taxonomy'       => array(
				'category' => 'men,news,sneakers',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'release-roundup-sneakers-you-need-to-check-out-this-weekend'             => array(
			'title'          => "Release Roundup: Sneakers You Need To Check Out This Weekend",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion4',
			'taxonomy'       => array(
				'category' => 'men,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'why-k-swiss-let-one-of-instagrams-top-sneaker-influencers-design-a-shoe' => array(
			'title'          => "Why K-Swiss Let One of Instagram’s Top Sneaker Influencers Design a Shoe",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion5',
			'taxonomy'       => array(
				'category' => 'men,sneakers,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'jason-sudeikiss-wardrobe-has-caught-up-with-his-sneaker-collection'      => array(
			'title'          => "Jason Sudeikis's Wardrobe Has Caught Up With His Sneaker Collection",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion6',
			'taxonomy'       => array(
				'category' => 'men,news,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'raf-simons-and-adidas-are-still-making-great-weird-sneakers'             => array(
			'title'          => "Raf Simons and Adidas Are Still Making Great Weird Sneakers",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion7',
			'taxonomy'       => array(
				'category' => 'men,news,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'official-images-of-the-undefeated-x-adidas-ultra-boost-1-0'              => array(
			'title'          => "Official Images Of The Undefeated x adidas Ultra Boost 1.0",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion8',
			'taxonomy'       => array(
				'category' => 'men,sneakers,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'the-dc-shoes-kalis-og-returns-in-a-retro-friendly-color-scheme'          => array(
			'title'          => "The DC Shoes Kalis OG Returns In A Retro-Friendly Color Scheme",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion9',
			'taxonomy'       => array(
				'category' => 'news,sneakers,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'adidas-introduces-a-womens-nite-jogger-with-pastel-accents'              => array(
			'title'          => "Adidas Introduces A Women’s Nite Jogger With Pastel Accents",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion10',
			'taxonomy'       => array(
				'category' => 'sneakers,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'jnews_single_post'      => array(
					'override_template' => '1',
					'override'          => array(
						array(
							'template'                 => '1',
							'single_blog_custom'       => '',
							'parallax'                 => '1',
							'fullscreen'               => '0',
							'layout'                   => 'right-sidebar',
							'sidebar'                  => 'default-sidebar',
							'second_sidebar'           => 'default-sidebar',
							'sticky_sidebar'           => '1',
							'share_position'           => 'float',
							'share_float_style'        => 'share-monocrhome',
							'show_share_counter'       => '1',
							'show_view_counter'        => '1',
							'show_featured'            => '0',
							'show_post_meta'           => '1',
							'show_post_author'         => '1',
							'show_post_author_image'   => '1',
							'show_post_date'           => '1',
							'post_date_format'         => 'default',
							'post_date_format_custom'  => 'Y/m/d',
							'show_post_category'       => '1',
							'show_post_reading_time'   => '0',
							'post_reading_time_wpm'    => '300',
							'show_post_tag'            => '1',
							'show_prev_next_post'      => '1',
							'show_popup_post'          => '1',
							'number_popup_post'        => '1',
							'show_author_box'          => '0',
							'show_post_related'        => '0',
							'show_inline_post_related' => '0',
						)
					)
				)
			)
		),
		'violent-femmes-and-nike-reveal-a-stefan-janoski-collaboration'           => array(
			'title'          => "Violent Femmes And Nike Reveal A Stefan Janoski Collaboration",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion1',
			'taxonomy'       => array(
				'category' => 'men,news,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'reebok-teases-club-c-campaign-starring-a-new-class-of-creatives'         => array(
			'title'          => "Reebok Teases Club C Campaign, Starring a New Class of Creatives",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion2',
			'taxonomy'       => array(
				'category' => 'men,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'goat-is-now-accepting-drop-offs-from-sneaker-resellers-via-flight-club'  => array(
			'title'          => "GOAT Is Now Accepting Drop-Offs From Sneaker Resellers via Flight Club",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion3',
			'taxonomy'       => array(
				'category' => 'men,news,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'nike-reworks-air-max-97-with-heat-map-themed-colorway'                   => array(
			'title'          => "Nike Reworks Air Max 97 With Heat Map-Themed Colorway",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion4',
			'taxonomy'       => array(
				'category' => 'men,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'k-swiss-snapped-up-by-chinese-sportswear-giant-xtep-international'       => array(
			'title'          => "K-Swiss Snapped Up by Chinese Sportswear Giant Xtep International",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion5',
			'taxonomy'       => array(
				'category' => 'news,sneakers,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'adidas-sivasdescalzo-get-contrast-heavy-on-boost-equipped-sobakov'       => array(
			'title'          => "Adidas & sivasdescalzo Get Contrast-Heavy on BOOST-Equipped Sobakov",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion6',
			'taxonomy'       => array(
				'category' => 'men,news,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'skip-the-wait-and-cop-the-air-jordan-4-bred-before-the-drop'             => array(
			'title'          => "Skip the Wait and Cop the Air Jordan 4 \"Bred\" Before the Drop",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion7',
			'taxonomy'       => array(
				'category' => 'men,news,sneakers',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'undftd-adidas-debut-usa-themed-ultra-boost-sneakers'                     => array(
			'title'          => "UNDFTD & adidas Debut USA-Themed Ultra Boost Sneakers",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion8',
			'taxonomy'       => array(
				'category' => 'men,news,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'the-10-best-sneaker-stores-in-los-angeles'                               => array(
			'title'          => "The 10 Best Sneaker Stores in Los Angeles",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion9',
			'taxonomy'       => array(
				'category' => 'news,sneakers,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'kith-drapes-the-converse-chuck-70-in-monogram-print'                     => array(
			'title'          => "KITH Drapes the Converse Chuck 70 in Monogram Print",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion10',
			'taxonomy'       => array(
				'category' => 'men,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'adidas-futurecraft-loop-could-be-a-game-changer-for-sustainability'      => array(
			'title'          => "Adidas’ FUTURECRAFT.Loop Could Be a Game-changer for Sustainability",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion1',
			'taxonomy'       => array(
				'category' => 'news,sneakers,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'13-next-generation-dadcore-sneakers-your-feet-will-thank-you-for'        => array(
			'title'          => "13 Next Generation “Dadcore” Sneakers Your Feet Will Thank You For",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion2',
			'taxonomy'       => array(
				'category' => 'men,news,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'he-shoe-surgeon-douses-the-air-jordan-1-in-lux-rubberized-python'        => array(
			'title'          => "He Shoe Surgeon Douses the Air Jordan 1 in “Lux” Rubberized Python",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion3',
			'taxonomy'       => array(
				'category' => 'men,news,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'subtypes-new-flagship-store-is-a-sneakerheads-paradise'                  => array(
			'title'          => "Subtype’s New Flagship Store Is A Sneakerhead’s Paradise",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion4',
			'taxonomy'       => array(
				'category' => 'news,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'nike-introduces-the-react-presto-in-captivating-colorways'               => array(
			'title'          => "Nike Introduces the React Presto in Captivating Colorways",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion5',
			'taxonomy'       => array(
				'category' => 'men,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'nikes-vintage-inspired-city-pride-pack-drops-tomorrow'                   => array(
			'title'          => "Nike’s Vintage-Inspired “City Pride” Pack Drops Tomorrow",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion6',
			'taxonomy'       => array(
				'category' => 'men,sneakers,style',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'adidas-fiorucci-celebrate-women-with-playful-summer-collection'          => array(
			'title'          => "Adidas & Fiorucci Celebrate Women With Playful Summer Collection",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion7',
			'taxonomy'       => array(
				'category' => 'sneakers',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'the-14-best-sneakers-out-this-weekend-where-to-buy-them'                 => array(
			'title'          => "The 14 Best Sneakers Out This Weekend & Where to Buy Them",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion8',
			'taxonomy'       => array(
				'category' => 'sneakers,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'heres-how-to-cop-cactus-plant-flea-markets-nike-vapormax'                => array(
			'title'          => "Here’s How to Cop Cactus Plant Flea Market’s Nike VaporMax",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion9',
			'taxonomy'       => array(
				'category' => 'men,news,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'the-best-sneakers-you-can-buy-for-under-100'                             => array(
			'title'          => "The Best Sneakers You Can Buy For Under $100",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion10',
			'taxonomy'       => array(
				'category' => 'men,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),
		'adidas-reports-nearly-1bn-usd-2019-q1-operating-profits'                 => array(
			'title'          => "Supreme Reports Nearly $1bn USD 2019 Q1 Operating Profits",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion1',
			'taxonomy'       => array(
				'category' => 'men,news,style,women',
				'post_tag' => ''
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' )
			)
		),

		// page
		'home-1'                                                                  => array(
			'title'     => 'Home 1',
			'content'   => 'home1.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1563771653451{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #f7f7f7 !important;}.vc_custom_1563770903723{padding-top: 40px !important;}.vc_custom_1563774323013{padding-top: 40px !important;background-color: #000000 !important;}.vc_custom_1563776345518{padding-top: 40px !important;}.vc_custom_1563771569444{margin-bottom: 0px !important;}',
				'_wpb_post_custom_css'       => '.jeg_content{padding:0}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb .jeg_post_category{display:none}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:50%;padding-right:5px}.jeg_postblock_5 .jeg_post_excerpt{display:none}.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:16px;line-height:24px}@media only screen and (min-width:768px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:32px;line-height:40px}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{padding-right:15px}}@media only screen and (min-width:1025px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:40px;line-height:48px}.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:24px;line-height:32px}}.jeg_heroblock_13 .jeg_post_category{display:none}',
				'jnews_page_loop'            => array(
					'enable_page_loop'   => '1',
					'header_type'        => 'heading_6',
					'layout'             => 'no-sidebar',
					'sidebar'            => 'default-sidebar',
					'second_sidebar'     => 'default-sidebar',
					'sticky_sidebar'     => '1',
					'module'             => '23',
					'boxed'              => '0',
					'boxed_shadow'       => '0',
					'box_shadow'         => '0',
					'excerpt_length'     => '19',
					'content_date'       => 'default',
					'date_custom'        => 'Y/m/d',
					'content_pagination' => 'nav_2',
					'pagination_align'   => 'center',
					'show_navtext'       => '1',
					'show_pageinfo'      => '0',
					'post_offset'        => '0',
					'posts_per_page'     => '6',
					'include_category'   => '{{category:news:id}}',
					'sort_by'            => 'latest',
				),
				'_elementor_data'            => 'home1.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings' => array(
					'custom_css' => '.vc_custom_1563771653451{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #f7f7f7 !important;}.vc_custom_1563770903723{padding-top: 40px !important;}.vc_custom_1563774323013{padding-top: 40px !important;background-color: #000000 !important;}.vc_custom_1563776345518{padding-top: 40px !important;}.vc_custom_1563771569444{margin-bottom: 0px !important;}.jeg_content{padding:0}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb .jeg_post_category{display:none}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:50%;padding-right:5px}.jeg_postblock_5 .jeg_post_excerpt{display:none}.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:16px;line-height:24px}@media only screen and (min-width:768px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:32px;line-height:40px}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{padding-right:15px}}@media only screen and (min-width:1025px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:40px;line-height:48px}.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:24px;line-height:32px}}.jeg_heroblock_13 .jeg_post_category{display:none}'
				)
			)
		),
		'home-2'                                                                  => array(
			'title'     => 'Home 2',
			'content'   => 'home2.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'        => 'template-builder.php',
				'_wpb_post_custom_css'     => '.jeg_col_3o3.jeg_postblock_6 .jeg_post_excerpt{display:none}.jeg_col_3o3.jeg_postblock_6 .jeg_post_title{font-size:24px;line-height:32px}@media only screen and (max-width:767px){.jeg_col_3o3.jeg_postblock_6 .jeg_thumb{float:none;width:100%;margin-left:0;margin-bottom:20px}}@media only screen and (min-width:768px){.jeg_col_3o3.jeg_postblock_6 .jeg_post_title{font-size:24px;line-height:32px}.jeg_col_3o3.jeg_postblock_6 .jeg_post{display:flex;align-items:center}.jeg_col_3o3.jeg_postblock_6 .jeg_postblock_content{flex:1}.jeg_col_3o3.jeg_postblock_6 .jeg_thumb{order:2;width:60%}}@media only screen and (min-width:1025px){.jeg_col_3o3.jeg_postblock_6 .jeg_post_title{font-size:48px;line-height:56px}}',
				'jnews_page_loop'          => array(
					'enable_page_loop'   => '0',
					'first_title'        => 'Latest Post',
					'header_type'        => 'heading_6',
					'layout'             => 'right-sidebar',
					'sidebar'            => 'default-sidebar',
					'second_sidebar'     => 'default-sidebar',
					'sticky_sidebar'     => '1',
					'module'             => '3',
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
					'posts_per_page'     => '5',
					'sort_by'            => 'latest',
				),
				'_elementor_data'          => 'home2.json',
				'_elementor_edit_mode'     => 'builder',
				'_elementor_page_settings' => array(
					'custom_css' => '.jeg_col_3o3.jeg_postblock_6 .jeg_post_excerpt{display:none}.jeg_col_3o3.jeg_postblock_6 .jeg_post_title{font-size:24px;line-height:32px}@media only screen and (max-width:767px){.jeg_col_3o3.jeg_postblock_6 .jeg_thumb{float:none;width:100%;margin-left:0;margin-bottom:20px}}@media only screen and (min-width:768px){.jeg_col_3o3.jeg_postblock_6 .jeg_post_title{font-size:24px;line-height:32px}.jeg_col_3o3.jeg_postblock_6 .jeg_post{display:flex;align-items:center}.jeg_col_3o3.jeg_postblock_6 .jeg_postblock_content{flex:1}.jeg_col_3o3.jeg_postblock_6 .jeg_thumb{order:2;width:60%}}@media only screen and (min-width:1025px){.jeg_col_3o3.jeg_postblock_6 .jeg_post_title{font-size:48px;line-height:56px}}'
				)
			)
		),
		'home-3'                                                                  => array(
			'title'     => 'Home 3',
			'content'   => 'home3.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1564113299308{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #f7f7f7 !important;}.vc_custom_1564111383433{margin-bottom: 0px !important;}',
				'_wpb_post_custom_css'       => '.jeg_content{padding-bottom:0}.jeg_postblock_carousel_1 .jeg_post_meta{display:none}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:50%;padding-right:5px}.jeg_postblock_5 .jeg_post_excerpt{display:none}.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:16px;line-height:21px}@media only screen and (min-width:768px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:24px;line-height:32px}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:60%}.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:20px;line-height:28px}}@media only screen and (min-width:1025px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:40px;line-height:48px}.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:24px;line-height:32px}.jeg_postblock_carousel_1 .jeg_post_title{font-size:14px;line-height:22px}}',
				'jnews_page_loop'            => array(
					'enable_page_loop'   => '1',
					'first_title'        => 'LATEST NEWS',
					'header_type'        => 'heading_9',
					'layout'             => 'no-sidebar',
					'sidebar'            => 'default-sidebar',
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
					'show_navtext'       => '1',
					'show_pageinfo'      => '0',
					'post_offset'        => '0',
					'posts_per_page'     => '8',
					'include_category'   => '{{category:news:id}}',
					'sort_by'            => 'latest',
				),
				'_elementor_data'            => 'home3.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1564113299308{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #f7f7f7 !important;}.vc_custom_1564111383433{margin-bottom: 0px !important;}.jeg_content{padding-bottom:0}.jeg_postblock_carousel_1 .jeg_post_meta{display:none}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:50%;padding-right:5px}.jeg_postblock_5 .jeg_post_excerpt{display:none}.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:16px;line-height:21px}@media only screen and (min-width:768px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:24px;line-height:32px}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:60%}.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:20px;line-height:28px}}@media only screen and (min-width:1025px){.jeg_col_3o3.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:40px;line-height:48px}.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:24px;line-height:32px}.jeg_postblock_carousel_1 .jeg_post_title{font-size:14px;line-height:22px}}'
				)
			)
		),
		'footer'                                                                  => array(
			'title'     => 'Footer',
			'content'   => 'footer.txt',
			'post_type' => 'footer',
			'metabox'   => array(
				'_wpb_shortcodes_custom_css' => '.vc_custom_1560500542429{margin-top: 3px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #000000 !important;}.vc_custom_1563777667323{padding-right: 40px !important;}',
				'_wpb_post_custom_css' => '.jeg_footer.dark .btn,.jeg_footer.dark .button,.jeg_footer.dark input[type=submit],.jeg_footer .footer_dark .btn,.jeg_footer .footer_dark .button,.jeg_footer .footer_dark input[type=submit]{color:#000}.jeg_footer .jnews_5d03545320d67 input[type="submit"],.jeg_footer .jnews_5d03545320d67 .btn,.jeg_footer .jnews_5d03545320d67 .button{background-color:#efd07a}',
				'_elementor_data'            => 'footer.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1560500542429{margin-top: 3px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #000000 !important;}.vc_custom_1563777667323{padding-right: 40px !important;}.jeg_footer.dark .btn,.jeg_footer.dark .button,.jeg_footer.dark input[type=submit],.jeg_footer .footer_dark .btn,.jeg_footer .footer_dark .button,.jeg_footer .footer_dark input[type=submit]{color:#000}.jeg_footer .jnews_5d03545320d67 input[type="submit"],.jeg_footer .jnews_5d03545320d67 .btn,.jeg_footer .jnews_5d03545320d67 .button{background-color:#efd07a}'
				)
			)
		)

	),

	// menu location
	'menu_location' => array(
		'main-navigation'   => array(
			'title'    => 'Main Navigation',
			'location' => 'navigation'
		),
		'mobile-navigation' => array(
			'title'    => 'mobile Navigation',
			'location' => 'mobile_navigation'
		),
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

		'sneakers' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Sneakers',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:sneakers:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'style' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Style',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:style:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'men' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Men',
				'menu-item-parent-id' => '{{menu:style:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:men:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'women'           => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Women',
				'menu-item-parent-id' => '{{menu:style:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:women:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		// mobile menu
		// Mobile Menu
		'buy'             => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Buy JNews',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://bit.ly/get-jnews',
				'menu-item-status' => 'publish'
			)
		),
		'home-mobile'     => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Homepage',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-1:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'home-1-mobile'   => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home - Layout 1',
				'menu-item-parent-id' => '{{menu:home-mobile:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-1:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'home-2-mobile'   => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home - Layout 2',
				'menu-item-parent-id' => '{{menu:home-mobile:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-2:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'home-3-mobile'   => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home - Layout 3',
				'menu-item-parent-id' => '{{menu:home-mobile:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-3:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'news-mobile'     => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'News',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:news:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'sneakers-mobile' => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Sneakers',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:sneakers:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'style-mobile'    => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Style',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:style:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'men-mobile'      => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Men',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:men:id}}',
				'menu-item-status'    => 'publish'
			)
		),
		'women-mobile'    => array(
			'location'       => 'mobile-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Women',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:women:id}}',
				'menu-item-status'    => 'publish'
			)
		),
	),

	'widget_position' => array(
		'default-sidebar',
		'footer-widget-1',
		'footer-widget-3',
		'sidebar-widget',
	),

	'widget' => array(
		'widget.json',
	),

	'customizer' => array(
		'style.json',
	),

	'plugin' => array(
		'jnews-essential',
		'jnews-customizer-category',
		'jnews-front-translation',
		'jnews-gallery',
		'jnews-instagram',
		'jnews-meta-header',
		'jnews-social-share',
		'jnews-view-counter',
		'mailchimp-for-wp'
	)

);
