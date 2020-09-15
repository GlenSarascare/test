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
		'logo'    => 'https://jegtheme.com/asset/jnews/demo/relationships/logo.png',
		'logo2x'  => 'https://jegtheme.com/asset/jnews/demo/relationships/logo@2x.png',

		'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
		'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
		'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
		'ad_970x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x250.jpg'
	),

	// create taxonomy
	'taxonomy'      => array(
		'category' => array(
			'consultations'      => array(
				'title'       => 'Consultations',
				'description' => ''
			),
			'counseling'     => array(
				'title'       => 'Counseling',
				'description' => ''
			),
			'friendship' => array(
				'title'       => 'Friendship',
				'description' => ''
			),
			'relationship'    => array(
				'title'       => 'Relationship',
				'description' => ''
			),
			'singlehood'    => array(
				'title'       => 'Singlehood',
				'description' => ''
			),
		),
	),

	// post & page
	'post'          => array(
		'3-ways-to-make-date-night-for-your-relationship'    => array(
			'title'          => "3 Ways to Make Date Night For Your Relationship",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion1',
			'taxonomy'       => array(
				'category' => 'consultations,friendship,relationship',
				'post_tag' => 'feelings,happiness,life,love'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'when-pain-masquerades-crazy-in-relationships'       => array(
			'title'          => "When Pain Masquerades Crazy in Relationships",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion2',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'dating,feelings,happiness,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'being-compassionate-knowing-the-difference'         => array(
			'title'          => "Being Compassionate: Knowing the Difference",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion3',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,singlehood',
				'post_tag' => 'couple,friendship,happiness,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'intimacy-in-relationships-what-does-it-even-mean'   => array(
			'title'          => "Intimacy in Relationships : What does it even mean?",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion4',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'feelings,friendship,sad,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'daily-challenge-to-finding-happiness-with-yourself' => array(
			'title'          => "Daily Challenge to Finding Happiness With Yourself",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion5',
			'taxonomy'       => array(
				'category' => 'consultations,friendship,relationship',
				'post_tag' => 'couple,feelings,friendship,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'how-we-know-we-are-in-a-committed-relationship'     => array(
			'title'          => "How we know we are in a Committed Relationship?",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion6',
			'taxonomy'       => array(
				'category' => 'consultations,friendship,relationship',
				'post_tag' => 'dating,friendship,happiness,love'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'managing-conflict-solvable-vs-perpetual-problems'   => array(
			'title'          => "Managing Conflict: Solvable vs. Perpetual Problems",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion7',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,friendship',
				'post_tag' => 'friendship,happiness,life,love'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'how-to-have-a-stress-reducing-conversation'         => array(
			'title'          => "How to Have A Stress-Reducing Conversation",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion8',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'friendship,love,sad,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'avoiding-the-trap-how-to-stop-judging-yourself'     => array(
			'title'          => "Avoiding The Trap: How To Stop Judging Yourself",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion9',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'happiness,life,sad,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'positive-parenting-accept-feelings-limit-actions'   => array(
			'title'          => "Positive Parenting: Accept Feelings, Limit Actions",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion10',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,relationship',
				'post_tag' => 'couple,friendship,happiness,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'research-reveals-secret-to-happily-ever-after'      => array(
			'title'          => "Research Reveals Secret to “Happily Ever After”",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion1',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'couple,dating,life,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'one-fight-all-couples-have-before-tying-the-knot'   => array(
			'title'          => "One Fight All Couples Have Before Tying the Knot",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion2',
			'taxonomy'       => array(
				'category' => 'consultations,friendship,relationship',
				'post_tag' => 'dating,feelings,friendship,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'how-wedding-crisis-strengthened-my-marriage'        => array(
			'title'          => "How Wedding Crisis Strengthened My Marriage",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion3',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'dating,friendship,happiness,love'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'how-forgiveness-can-transform-your-marriage'        => array(
			'title'          => "How Forgiveness Can Transform Your Marriage",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion4',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,relationship',
				'post_tag' => 'couple,life,love,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'how-to-have-a-new-years-relationship-check-in'      => array(
			'title'          => "How to Have a New Year’s Relationship Check-in",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion5',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'feelings,life,love,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'hurt-feelings-not-mean-you-did-something-wrong'     => array(
			'title'          => "Hurt Feelings Not Mean You Did Something Wrong",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion6',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'couple,feelings,happiness,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'its-time-to-stop-stigma-around-couples-therapy'     => array(
			'title'          => "It’s Time to Stop Stigma Around Couples Therapy",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion7',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'friendship,happiness,love,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'3-key-things-that-will-make-or-break-your-marriage' => array(
			'title'          => "3 Key Things That Will Make or Break Your Marriage",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion8',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'dating,life,love,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'be-the-change-you-wish-to-see-in-your-relationship' => array(
			'title'          => "Be the Change You Wish to See in Your Relationship",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion9',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'couple,feelings,love,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'this-one-thing-is-the-biggest-predictor-of-divorce' => array(
			'title'          => "This One Thing is the Biggest Predictor of Divorce",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion10',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'dating,friendship,love,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'make-intentional-choices-to-connect-with-family'    => array(
			'title'          => "Make Intentional Choices to Connect with Family",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion1',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'couple,dating,feelings,love'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'make-your-new-years-resolutions-a-family-affair'    => array(
			'title'          => "Make Your New Year’s Resolutions a Family Affair",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion2',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,relationship',
				'post_tag' => 'couple,feelings,happiness,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'we-will-grieve-forever-because-we-love-forever'     => array(
			'title'          => "We Will Grieve Forever Because We Love Forever",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion3',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'couple,feelings,happiness,life'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'connecting-with-your-pain-could-save-your-life-2'   => array(
			'title'          => "Connecting with Your Pain Could Save Your Life",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion4',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,relationship',
				'post_tag' => 'dating,friendship,love,sad'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'connecting-with-your-pain-could-save-your-life'     => array(
			'title'          => "How New Parents Keep Their Love Alive and Well",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion5',
			'taxonomy'       => array(
				'category' => 'consultations,friendship,relationship',
				'post_tag' => 'couple,feelings,friendship,happiness'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'stop-creating-gratitude-lists-and-do-this-instead'  => array(
			'title'          => "Stop Creating Gratitude Lists and Do This Instead",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion6',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,relationship',
				'post_tag' => 'couple,feelings,happiness,love'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'if-youre-too-busy-for-date-night-youre-too-busy'    => array(
			'title'          => "If You’re Too Busy for Date Night, You’re Too Busy",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion7',
			'taxonomy'       => array(
				'category' => 'consultations,friendship,relationship',
				'post_tag' => 'dating,happiness,sad,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'pursue-your-partner-at-every-stage-of-marriage'     => array(
			'title'          => "Pursue Your Partner at Every Stage of Marriage",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion8',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'feelings,friendship,sad,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'a-review-of-the-research-on-domestic-violence'      => array(
			'title'          => "A Review of the Research on Domestic Violence",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion9',
			'taxonomy'       => array(
				'category' => 'consultations,counseling,singlehood',
				'post_tag' => 'feelings,friendship,happiness,life'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),
		'i-found-the-one-and-were-in-an-open-marriage'       => array(
			'title'          => "I Found the One, and We’re in an Open Marriage",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'fashion10',
			'taxonomy'       => array(
				'category' => 'counseling,friendship,relationship',
				'post_tag' => 'feelings,love,sad,soulmate'
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'post_subtitle'          => 'It is difficult to choose right or wrong in love because love is blind.'
			)
		),

		// page
		'home-1'                                             => array(
			'title'     => 'Home Layout 1',
			'content'   => 'home1.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1563268021904{margin-top: 10px !important;padding-top: 30px !important;background-color: #f7f7f7 !important;}.vc_custom_1563265425873{margin-top: 50px !important;}.vc_custom_1572926012033{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #f7f7f7 !important;}.vc_custom_1563265425873{margin-top: 50px !important;}.vc_custom_1564132174642{margin-top: 30px !important;margin-bottom: 60px !important;padding-top: 50px !important;padding-bottom: 10px !important;background-color: #f7f7f7 !important;}.vc_custom_1572926116641{margin-bottom: 0px !important;}',
				'_wpb_post_custom_css'       => '.jeg_header .jeg_bottombar { border-bottom: 0;} @media screen and (min-width: 768px) { .jeg_content {padding-top: 20px;} } @media screen and (min-width: 1025px) { .jeg_postblock_17 .jeg_pl_md_1 .jeg_post_title {font-size : 18px;} .jeg_pl_sm .jeg_post_title {font-size : 16px;} .jeg_postblock_5 .jeg_post_title {font-size : 26px;} .jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title {font-size : 18px;} }',
				'jnews_page_loop'            => array(
					'enable_page_loop'   => '1',
					'header_type'        => 'heading_8',
					'layout'             => 'right-sidebar',
					'sidebar'            => 'page-loop',
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
					'posts_per_page'     => '6',
					'sort_by'            => 'latest',
				),
				'_elementor_data'            => 'home1.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => ''
				)
			)
		),
		'home-2'                                             => array(
			'title'     => 'Home Layout 2',
			'content'   => 'home2.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'        => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1572926682122{padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;background: #fed1d3 url(https://jnews.io/relationships/wp-content/uploads/sites/68/2019/07/bg.mail_.jpg?id=386) !important;}',
				'_wpb_post_custom_css'     => '.jeg_header .jeg_bottombar { border-bottom: 0; } @media screen and (min-width: 768px) { .jeg_content { padding-top: 20px; } } @media screen and (min-width: 1025px) { .jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title {font-size : 18px;} } @media screen and (min-width: 1200px) { .jeg-vc-wrapper .jeg_inline_subscribeform { padding-right: 18% !important; } }',
				'jnews_page_loop'          => array(
					'enable_page_loop'   => '1',
					'first_title'        => '',
					'header_type'        => 'heading_6',
					'layout'             => 'no-sidebar',
					'sidebar'            => 'default-sidebar',
					'second_sidebar'     => 'default-sidebar',
					'sticky_sidebar'     => '1',
					'module'             => '23',
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
				'_elementor_data'          => 'home2.json',
				'_elementor_edit_mode'     => 'builder',
				'_elementor_page_settings' => array(
					'custom_css' => ''
				)
			)
		),
		'home-3'                                             => array(
			'title'     => 'Home Layout 3',
			'content'   => 'home3.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_post_custom_css'       => '.jeg_header .jeg_bottombar { border-bottom: 0; } @media screen and (min-width: 768px) { .jeg_content { padding-top: 20px; } }',
				'jnews_page_loop'            => array(
					'enable_page_loop'   => '1',
					'first_title'        => 'Most Popular',
					'header_type'        => 'heading_8',
					'layout'             => 'right-sidebar',
					'sidebar'            => 'single-post',
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
					'posts_per_page'     => '5',
					'sort_by'            => 'latest',
				),
				'_elementor_data'            => 'home3.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => ''
				)
			)
		),
		'footer'                                             => array(
			'title'     => 'Footer',
			'content'   => 'footer.txt',
			'post_type' => 'footer',
			'metabox'   => array(
				'_wpb_shortcodes_custom_css' => '.vc_custom_1572925162042{padding-top: 30px !important;padding-bottom: 20px !important;background-color: #fed1d2 !important;}.vc_custom_1564393917015{padding-top: 30px !important;padding-bottom: 30px !important;background-color: #ffffff !important;}',
				'_wpb_post_custom_css'       => '.jeg_footer .jeg_ad_module {margin-bottom: 0;}',
				'_elementor_data'            => 'footer.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => ''
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
		'footer-navigation' => array(
            'title' => 'Footer Navigation',
            'location' => 'footer_navigation'
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

		'relationship' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Relationship',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:relationship:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'consultations' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Consultations',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:consultations:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'friendship' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Friendship',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:friendship:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'singlehood' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Singlehood',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:singlehood:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'counseling' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Counseling',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:counseling:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'counseling-mobile' => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Counseling',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:counseling:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'consultations-mobile' => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Consultations',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:consultations:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'relationship-mobile' => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Relationship',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:relationship:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'friendship-mobile' => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Friendship',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:friendship:id}}',
				'menu-item-status'    => 'publish'
			)
		),

		'singlehood-mobile' => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Singlehood',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:singlehood:id}}',
				'menu-item-status'    => 'publish'
			)
		)
	),

	'widget_position' => array(
		'Sidebar',
		'Home 2',
		'Single Post',
		'Home 3',
		'Home 1',
		'Page Loop',
		'Archive Page'
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
		'jnews-view-counter',
		'mailchimp-for-wp'
	)
);
