<?php

return [

	// image
	'image'           => [
		'news1'         => 'https://jegtheme.com/asset/jnews/demo/default/news1.jpg',
		'news2'         => 'https://jegtheme.com/asset/jnews/demo/default/news2.jpg',
		'news3'         => 'https://jegtheme.com/asset/jnews/demo/default/news3.jpg',
		'news4'         => 'https://jegtheme.com/asset/jnews/demo/default/news4.jpg',
		'news5'         => 'https://jegtheme.com/asset/jnews/demo/default/news5.jpg',
		'news6'         => 'https://jegtheme.com/asset/jnews/demo/default/news6.jpg',
		'news7'         => 'https://jegtheme.com/asset/jnews/demo/default/news7.jpg',
		'news8'         => 'https://jegtheme.com/asset/jnews/demo/default/news8.jpg',
		'news9'         => 'https://jegtheme.com/asset/jnews/demo/default/news9.jpg',
		'news10'        => 'https://jegtheme.com/asset/jnews/demo/default/news10.jpg',
		'news11'        => 'https://jegtheme.com/asset/jnews/demo/default/news11.jpg',
		'news12'        => 'https://jegtheme.com/asset/jnews/demo/default/news12.jpg',

		'favicon'       => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',
		'logo'          => 'https://jegtheme.com/asset/jnews/demo/bloomnews/logo.png',
		'logo2x'        => 'https://jegtheme.com/asset/jnews/demo/bloomnews/logo@2x.png',
		'logo_dark'     => 'https://jegtheme.com/asset/jnews/demo/bloomnews/logo_dark.png',
		'logo_dark2x'   => 'https://jegtheme.com/asset/jnews/demo/bloomnews/logo_dark@2x.png',

		'ad_300x250'    => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
		'ad_728x90'     => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
	],

	// create taxonomy
	'taxonomy'        => [
		'category' => [
			'business'      => [
				'title'       => 'Business',
				'description' => 'You can add some category description here.',
			],
			'entertainment' => [
				'title'       => 'Entertainment',
				'description' => 'You can add some category description here.',
			],
			'lifestyle'     => [
				'title'       => 'Lifestyle',
				'description' => 'You can add some category description here.',
			],
			'fashion'       => [
				'title'       => 'Fashion',
				'description' => 'You can add some category description here.',
			],
			'food'          => [
				'title'       => 'Food',
				'description' => 'You can add some category description here.',
			],
			'health'        => [
				'title'       => 'Health',
				'description' => 'You can add some category description here.',
			],
			'travel'        => [
				'title'       => 'Travel',
				'description' => 'You can add some category description here.',
			],
			'sports'        => [
				'title'       => 'Sports',
				'description' => 'You can add some category description here.',
			],
			'world'         => [
				'title'       => 'World',
				'description' => 'You can add some category description here.',
			],
		],
		'post_tag' => [
			'explore-bali'   => [
				'title' => 'Explore Bali',
			],
			'market-stories' => [
				'title' => 'Market Stories',
			],
			'pandemic'       => [
				'title' => 'Pandemic',
			],
			'premium'        => [
				'title' => 'Premium',
			],
			'stay-home'      => [
				'title' => 'Stay Home',
			],
			'united-stated'  => [
				'title' => 'United Stated',
			],
			'vaccine'        => [
				'title' => 'Vaccine',
			],
			'work-from-home' => [
				'title' => 'Work From Home',
			],
			'wuhan'          => [
				'title' => 'Wuhan',
			],
		],
	],

	// post & page
	'post'            => [
		'economists-see-few-monetary-policy-changes-with-powell-leading-fed' => [
			'title'          => 'Economists See Few Monetary Policy Changes With Powell Leading Fed',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news12',
			'taxonomy'       => [
				'category' => 'business,health,lifestyle,world',
				'post_tag' => 'pandemic,stay-home,united-stated,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:entertainment:id}}' ],
				'post_subtitle'          => 'A budget tells us what we can\'t afford, but it doesn\'t keep us from buying it.',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'jekardah-nightlife-offers-many-hotspots-for-people-with-alternative-lifestyles' => [
			'title'          => 'Jekardah Nightlife Offers Many Hotspots for People with Alternative Lifestyles',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news12',
			'taxonomy'       => [
				'category' => 'entertainment,lifestyle,travel',
				'post_tag' => 'pandemic,premium,united-stated,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:sports:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'these-foods-to-absolutely-avoid-if-you-want-clear-glowing-skin' => [
			'title'          => 'These Foods to Absolutely Avoid If You Want Clear, Glowing Skin',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news3',
			'taxonomy'       => [
				'category' => 'entertainment,food,health,lifestyle',
				'post_tag' => 'pandemic,stay-home,vaccine,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:health:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'instagram-is-testing-photo-albums-because-nothing-is-sacred-anymore' => [
			'title'          => 'Instagram Is Testing Photo Albums, Because Nothing Is Sacred Anymore',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news1',
			'taxonomy'       => [
				'category' => 'entertainment,food,lifestyle',
				'post_tag' => 'market-stories,pandemic,stay-home,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:lifestyle:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'fashion-stories-from-around-the-web-you-might-have-missed' => [
			'title'          => 'Fashion Stories From Around The Web You Might Have Missed',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news12',
			'taxonomy'       => [
				'category' => 'entertainment,fashion,lifestyle',
				'post_tag' => 'explore-bali,pandemic,stay-home,united-stated',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:food:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'chinese-rooftopper-films-his-own-death-during-skyscraper-stunt' => [
			'title'          => "Chinese 'Rooftopper' Films His Own Death During Skyscraper Stunt",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news8',
			'taxonomy'       => [
				'category' => 'health,lifestyle,sports,travel,world',
				'post_tag' => 'stay-home,united-stated,vaccine,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:fashion:id}}' ],
				'post_subtitle'          => 'Website schema using JSON LD which is recommended by Google.',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'indonesias-largest-fleet-of-taxis-teams-up-to-beat-ride-hailing-apps' => [
			'title'          => 'Indonesia’s Largest Fleet of Taxis Teams Up To Beat Ride-Hailing Apps',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news6',
			'taxonomy'       => [
				'category' => 'business,lifestyle,sports,travel,world',
				'post_tag' => 'explore-bali,market-stories,premium,united-stated',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:food:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'tips-for-staying-happy-during-lockdown'          => [
			'title'          => 'Tips for staying happy during lockdown',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news3',
			'taxonomy'       => [
				'category' => 'fashion,health,lifestyle,sports',
				'post_tag' => 'explore-bali,premium,united-stated,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:travel:id}}' ],
				'post_subtitle'          => 'Happiness is a direction, not a place.',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'a-new-point-of-sales-startup-race-is-brewing-in-indonesia' => [
			'title'          => 'A New Point-of-Sales Startup Race is Brewing in Indonesia',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news5',
			'taxonomy'       => [
				'category' => 'food,health,lifestyle,travel',
				'post_tag' => 'pandemic,stay-home,vaccine,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:health:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'travel-and-transportation-during-the-coronavirus-pandemic' => [
			'title'          => 'Travel and Transportation During The Coronavirus Pandemic',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news12',
			'taxonomy'       => [
				'category' => 'business,entertainment,lifestyle,travel',
				'post_tag' => 'explore-bali,pandemic,united-stated,vaccine',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:sports:id}}' ],
				'post_subtitle'          => 'When the pandemic is going to be over',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'elton-john-tells-noel-gallagher-what-he-thinks-about-his-new-album' => [
			'title'          => 'Elton John Tells Noel Gallagher What He Thinks About His New Album',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news10',
			'taxonomy'       => [
				'category' => 'entertainment,fashion,lifestyle,travel',
				'post_tag' => 'explore-bali,premium,stay-home,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:lifestyle:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'will-it-be-safe-to-travel-this-summer-heres-your-options' => [
			'title'          => "Will It Be Safe to Travel This Summer? Here's Your Options",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news3',
			'taxonomy'       => [
				'category' => 'food,lifestyle,travel,world',
				'post_tag' => 'market-stories,stay-home,united-stated,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:fashion:id}}' ],
				'post_subtitle'          => 'When the pandemic is going to be over',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'cleaners-vs-disinfectants-what-you-need-to-know' => [
			'title'          => 'Cleaners Vs. Disinfectants: What You Need to Know',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news4',
			'taxonomy'       => [
				'category' => 'health,lifestyle,travel,world',
				'post_tag' => 'explore-bali,premium,vaccine,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:travel:id}}' ],
				'post_subtitle'          => 'When the pandemic is going to be over',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'these-tie-dye-swimsuits-we-cant-wait-to-wear-this-summer' => [
			'title'          => "These Tie-Dye Swimsuits We Can't Wait to Wear This Summer",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news6',
			'taxonomy'       => [
				'category' => 'entertainment,fashion,lifestyle',
				'post_tag' => 'market-stories,premium,united-stated,vaccine',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:food:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'barack-obama-and-family-visit-balinese-paddy-fields-during-vacation' => [
			'title'          => 'Barack Obama and Family Visit Balinese Paddy Fields During Vacation',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news8',
			'taxonomy'       => [
				'category' => 'entertainment,lifestyle,travel,world',
				'post_tag' => 'explore-bali,stay-home,united-stated,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:sports:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'this-easy-cardio-swap-will-help-you-train-for-a-half-marathon' => [
			'title'          => 'This Easy Cardio Swap Will Help You Train for A Half Marathon',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news2',
			'taxonomy'       => [
				'category' => 'health,sports',
				'post_tag' => 'explore-bali,market-stories,united-stated,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:travel:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'john-browny-could-have-been-the-super-bowl-mvp-if-the-gagak-hadnt-blown-it' => [
			'title'          => 'John Browny Could Have Been The Super Bowl MVP If The Gagak Hadn’t Blown It',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news1',
			'taxonomy'       => [
				'category' => 'entertainment,sports',
				'post_tag' => 'explore-bali,pandemic,vaccine,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:world:id}}' ],
				'post_subtitle'          => 'Automatic import will install plugin, import dummy content & style to replicate demo completely.',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'hannah-donker-talks-being-the-weeknds-love-interest-in-secrets' => [
			'title'          => 'Hannah Donker talks being The Weeknd’s love interest in ‘Secrets’',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news1',
			'taxonomy'       => [
				'category' => 'business,entertainment,fashion,health',
				'post_tag' => 'explore-bali,market-stories,premium,vaccine',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:lifestyle:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'betterment-moves-beyond-robo-advising-with-human-financial-planners' => [
			'title'          => 'Betterment Moves Beyond Robo-Advising with Human Financial Planners',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news12',
			'taxonomy'       => [
				'category' => 'entertainment,lifestyle,sports,travel',
				'post_tag' => 'pandemic,premium,stay-home,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:entertainment:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'what-your-legs-could-be-telling-you-about-your-heart-health' => [
			'title'          => 'What Your Legs Could Be Telling You About Your Heart Health',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news2',
			'taxonomy'       => [
				'category' => 'food,health,lifestyle,sports',
				'post_tag' => 'explore-bali,premium,stay-home,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:travel:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'high-street-retailers-pin-hopes-on-discount-splurge-in-black-friday-fever' => [
			'title'          => 'High Street Retailers Pin Hopes On Discount Splurge In Black Friday Fever',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news3',
			'taxonomy'       => [
				'category' => 'business,travel,world',
				'post_tag' => 'pandemic,premium,work-from-home,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:world:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'bitcoin-is-definitely-not-a-fraud-ceo-of-mobile-only-bank-revolut-says' => [
			'title'          => 'Bitcoin Is ‘Definitely Not A Fraud,’ CEO of Mobile-Only Bank Revolut Says',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news11',
			'taxonomy'       => [
				'category' => 'business,food,world',
				'post_tag' => 'explore-bali,pandemic,stay-home,united-stated',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:entertainment:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'u-s-online-sales-surge-shoppers-throng-stores-on-thanksgiving-evening' => [
			'title'          => 'U.S. Online Sales Surge, Shoppers Throng Stores On Thanksgiving Evening',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news3',
			'taxonomy'       => [
				'category' => 'business,entertainment,fashion,lifestyle,sports',
				'post_tag' => 'explore-bali,market-stories,stay-home,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:entertainment:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'the-victorias-secret-2016-show-was-straight-out-of-game-of-thrones' => [
			'title'          => 'The Victoria’s Secret 2016 Show Was Straight Out Of ‘Game of Thrones’',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news6',
			'taxonomy'       => [
				'category' => 'business,fashion,lifestyle,travel,world',
				'post_tag' => 'pandemic,united-stated,vaccine,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:food:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'california-fires-this-is-what-happens-when-you-breathe-in-smoke' => [
			'title'          => 'California Fires: This Is What Happens When You Breathe In Smoke',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news2',
			'taxonomy'       => [
				'category' => 'health,world',
				'post_tag' => 'premium,stay-home,work-from-home,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:travel:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'united-and-city-dispute-the-blame-for-manchester-derby-tunnel-bust-up' => [
			'title'          => 'United And City Dispute The Blame for Manchester Derby Tunnel Bust-up',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news8',
			'taxonomy'       => [
				'category' => 'entertainment,sports',
				'post_tag' => 'premium,stay-home,vaccine,work-from-home',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:world:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'trump-ambassador-beat-and-kidnapped-woman-in-watergate-cover-up-reports' => [
			'title'          => 'Trump Ambassador Beat And ‘Kidnapped’ Woman In Watergate Cover-up: Reports',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'news8',
			'taxonomy'       => [
				'category' => 'business,travel,world',
				'post_tag' => 'market-stories,premium,united-stated,wuhan',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:world:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
			],
		],
		'watch-as-flares-are-set-off-in-the-crowd-to-mark-liam-gallaghers-arrival-in-glasgow' => [
			'title'          => 'Watch As Flares Are Set Off In The Crowd To Mark Liam Gallagher’s Arrival In Glasgow',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'news6',
			'taxonomy'       => [
				'category'    => 'entertainment,fashion,lifestyle,world',
				'post_tag'    => 'premium,stay-home,vaccine,wuhan',
				'post_format' => 'post-format-video',
			],
			'metabox'        => [
				'jnews_primary_category' => [ 'id' => '{{category:lifestyle:id}}' ],
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
				'jnews_single_post'      => [
					'override_template' => '1',
					'override'          => [
						[
							'template'                 => '8',
							'parallax'                 => '1',
							'fullscreen'               => '0',
							'layout'                   => 'right-sidebar',
							'sidebar'                  => 'default-sidebar',
							'sticky_sidebar'           => '1',
							'share_position'           => 'top',
							'share_float_style'        => 'share-monocrhome',
							'show_share_counter'       => '1',
							'show_view_counter'        => '1',
							'show_featured'            => '1',
							'show_post_meta'           => '1',
							'show_post_author'         => '1',
							'show_post_author_image'   => '1',
							'show_post_date'           => '1',
							'show_post_category'       => '1',
							'show_post_tag'            => '1',
							'show_prev_next_post'      => '1',
							'show_popup_post'          => '1',
							'number_popup_post'        => '1',
							'show_author_box'          => '0',
							'show_post_related'        => '1',
							'show_inline_post_related' => '0',
						],
					],
				],
			],
		],

		// page
		'home'                                            => [
			'title'     => 'Home',
			'content'   => 'home.txt',
			'post_type' => 'page',
			'metabox'   => [
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1589477376708{background-color: #232a30 !important;}',
				'jnews_page_loop'            => [
					'enable_page_loop'   => '1',
					'first_title'        => 'Latest Post',
					'header_type'        => 'heading_6',
					'layout'             => 'right-sidebar',
					'sidebar'            => 'home-loop',
					'sticky-sidebar'     => '1',
					'module'             => '5',
					'excerpt_length'     => '20',
					'content_date'       => 'default',
					'content_pagination' => 'nav_1',
					'pagination_align'   => 'center',
				],
				'_elementor_data'            => 'home.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => [
					'custom_css' => '.vc_custom_1589477376708{background-color: #232a30 !important;}',
				],
			],
		],
		'pricing'                                         => [
			'title'     => 'Pricing',
			'content'   => 'pricing.txt',
			'post_type' => 'page',
			'metabox'   => [
				'_wp_page_template'    => 'template-builder.php',
				'_elementor_data'      => 'pricing.json',
				'_elementor_edit_mode' => 'builder',
			],
		],

	],

	// menu location
	'menu_location'   => [
		'main-navigation'   => [
			'title'    => 'Main Navigation',
			'location' => 'navigation',
		],
		'mobile-navigation' => [
			'title'    => 'Mobile Navigation',
			'location' => 'mobile_navigation',
		],
		'top-navigation'    => [
			'title'    => 'Top Bar Navigation',
			'location' => 'top_navigation',
		],
	],

	// menu it self
	'menu'            => [

		// main menu
		'home'           => [
			'location'       => 'main-navigation',
			'menu-item-data' => [
				'menu-item-title'     => 'Home',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home:id}}',
				'menu-item-status'    => 'publish',
			],
		],

		'world'          => [
			'location'       => 'main-navigation',
			'menu-item-data' => [
				'menu-item-title'     => 'World',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:world:id}}',
				'menu-item-status'    => 'publish',
			],
		],
		'lifestyle'      => [
			'location'       => 'main-navigation',
			'menu-item-data' => [
				'menu-item-title'     => 'Lifestyle',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:lifestyle:id}}',
				'menu-item-status'    => 'publish',
			],
			'metabox'        => [
				'menu_item_jnews_mega_menu' => [
					'type'         => 'category_2',
					'category'     => '{{category:lifestyle:id}}',
					'number'       => '6',
					'trending_tag' => '{{taxonomy:post_tag:covid-19:id}},{{taxonomy:post_tag:donald-trump:id}},{{taxonomy:post_tag:pandemic:id}},{{taxonomy:post_tag:shopie-turner:id}},{{taxonomy:post_tag:corona-virus:id}}',
				],
			],
		],
		'business'       => [
			'location'       => 'main-navigation',
			'menu-item-data' => [
				'menu-item-title'     => 'Business',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:business:id}}',
				'menu-item-status'    => 'publish',
			],
		],
		'entertainment'  => [
			'location'       => 'main-navigation',
			'menu-item-data' => [
				'menu-item-title'     => 'Entertainment',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:entertainment:id}}',
				'menu-item-status'    => 'publish',
			],
		],
		'sports'         => [
			'location'       => 'main-navigation',
			'menu-item-data' => [
				'menu-item-title'     => 'Sports',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:sports:id}}',
				'menu-item-status'    => 'publish',
			],
		],

		// Mobile Menu
		'home-mobile'    => [
			'location'       => 'mobile-navigation',
			'menu-item-data' => [
				'menu-item-title'     => 'Home',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home:id}}',
				'menu-item-status'    => 'publish',
			],
		],
		'landing-mobile' => [
			'location'       => 'mobile-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Landing Page',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://jnews.io/landing/',
				'menu-item-status' => 'publish',
			],
		],
		'buy-mobile'     => [
			'location'       => 'mobile-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Buy JNews',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
				'menu-item-status' => 'publish',
			],
		],
		'support-mobile' => [
			'location'       => 'mobile-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Support Forum',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
				'menu-item-status' => 'publish',
			],
		],
		'contact-mobile' => [
			'location'       => 'mobile-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Contact Us',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://themeforest.net/user/jegtheme?ref=jegtheme',
				'menu-item-status' => 'publish',
			],
		],

		// Top Bar menu
		'landing-top'    => [
			'location'       => 'top-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Landing Page',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://jnews.io/landing/',
				'menu-item-status' => 'publish',
			],
		],
		'shop-top'       => [
			'location'       => 'top-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Shop',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://jnews.io/landing/',
				'menu-item-status' => 'publish',
			],
		],
		'contact-top'    => [
			'location'       => 'top-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Contact',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://themeforest.net/user/jegtheme?ref=jegtheme',
				'menu-item-status' => 'publish',
			],
		],
		'buy-top'        => [
			'location'       => 'top-navigation',
			'menu-item-data' => [
				'menu-item-title'  => 'Buy JNews',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
				'menu-item-status' => 'publish',
			],
		],

	],

	'widget_position' => [
		'Home Loop',
		'Home',
		'Archives',
	],

	'widget'          => [
		'widget.json',
	],

	'customizer'      => [
		'style.json',
	],

	'plugin'          => [
		'classic-editor',
		'jnews-essential',
		'jnews-customizer-category',
		'jnews-breadcrumb',
		'jnews-front-translation',
		'jnews-jsonld',
		'jnews-paywall',
		'jnews-social-share',
		'jnews-view-counter',
		'woocommerce',
	],

];
