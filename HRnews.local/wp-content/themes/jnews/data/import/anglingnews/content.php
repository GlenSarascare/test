<?php

return array(

    // image
    'image' =>  array(
        'angling1' => 'https://jegtheme.com/asset/jnews/demo/default/news1.jpg',
        'angling2' => 'https://jegtheme.com/asset/jnews/demo/default/news2.jpg',
        'angling3' => 'https://jegtheme.com/asset/jnews/demo/default/news3.jpg',
        'angling4' => 'https://jegtheme.com/asset/jnews/demo/default/news4.jpg',
        'angling5' => 'https://jegtheme.com/asset/jnews/demo/default/news5.jpg',
        'angling6' => 'https://jegtheme.com/asset/jnews/demo/default/news6.jpg',
        'angling7' => 'https://jegtheme.com/asset/jnews/demo/default/news7.jpg',
        'angling8' => 'https://jegtheme.com/asset/jnews/demo/default/news8.jpg',
        'angling9' => 'https://jegtheme.com/asset/jnews/demo/default/news9.jpg',
        'angling10' => 'https://jegtheme.com/asset/jnews/demo/default/news10.jpg',
        'angling11' => 'https://jegtheme.com/asset/jnews/demo/default/news11.jpg',
        'angling12' => 'https://jegtheme.com/asset/jnews/demo/default/news12.jpg',
        'sport1' => 'https://jegtheme.com/asset/jnews/demo/default/sport1.jpg',
        'sport2' => 'https://jegtheme.com/asset/jnews/demo/default/sport2.jpg',
        'sport3' => 'https://jegtheme.com/asset/jnews/demo/default/sport3.jpg',
        'tech1' => 'https://jegtheme.com/asset/jnews/demo/default/tech1.jpg',
        'tech2' => 'https://jegtheme.com/asset/jnews/demo/default/tech2.jpg',
        'tech3' => 'https://jegtheme.com/asset/jnews/demo/default/tech3.jpg',
        'fashion1' => 'https://jegtheme.com/asset/jnews/demo/default/fashion1.jpg',
        'fashion2' => 'https://jegtheme.com/asset/jnews/demo/default/fashion2.jpg',
        'fashion3' => 'https://jegtheme.com/asset/jnews/demo/default/fashion3.jpg',
        'fashion4' => 'https://jegtheme.com/asset/jnews/demo/default/fashion4.jpg',
        'fashion5' => 'https://jegtheme.com/asset/jnews/demo/default/fashion5.jpg',
        'fashion6' => 'https://jegtheme.com/asset/jnews/demo/default/fashion6.jpg',
        'travel1' => 'https://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
        'travel2' => 'https://jegtheme.com/asset/jnews/demo/default/travel2.jpg',
        'travel3' => 'https://jegtheme.com/asset/jnews/demo/default/travel3.jpg',
        'travel4' => 'https://jegtheme.com/asset/jnews/demo/default/travel4.jpg',
        'travel5' => 'https://jegtheme.com/asset/jnews/demo/default/travel5.jpg',
        'travel6' => 'https://jegtheme.com/asset/jnews/demo/default/travel6.jpg',
        'angling_bg' => 'https://jegtheme.com/asset/jnews/demo/anglingnews/bg-logo.jpg',
        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',
        'logo' => 'https://jegtheme.com/asset/jnews/demo/anglingnews/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/anglingnews/logo@2x.png',
        'footer_logo' => 'https://jegtheme.com/asset/jnews/demo/anglingnews/footer-logo.png',
        'footer_logo2x' => 'https://jegtheme.com/asset/jnews/demo/anglingnews/footer-logo@2x.png',
        'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png',
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'contest' =>
                array(
                    'title' =>'Contest',
                    'description' => 'You can add some category description here.'
                ),
            'environment' =>
                array(
                    'title' =>'Environment',
                    'description' => 'You can add some category description here.'
                ),
            'freshwater' =>
                array(
                    'title' =>'Freshwater',
                    'description' => 'You can add some category description here.'
                ),
            'gear' =>
                array(
                    'title' =>'Gear',
                    'description' => 'You can add some category description here.'
                ),
            'news' =>
                array(
                    'title' =>'News',
                    'description' => 'You can add some category description here.'
                ),
        ),

        'post_tag' => array(
            'bass' => array(
                'title' => 'Bass',
            ),
            'nature' => array(
                'title' => 'Nature',
            ),
            'pike' => array(
                'title' => 'Pike',
            ),
            'trout-fishing' => array(
                'title' => 'Throut Fishing',
            ),
            'angling' => array(
                'title' => 'Angling',
            ),
            'boat' => array(
                'title' => 'Boat',
            ),
            'summer' => array(
                'title' => 'Summer',
            ),
            'lake' => array(
                'title' => 'Lake',
            )
        )
    ),

    // post & page
    'post' => array(
        'tips-for-catching-fish-in-river-systems' => array(
            'title' => "Tips for Catching Fish in River Systems",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'angling1',
            'taxonomy' => array(
                'category' => 'environment,gear,news',
                'post_tag' => 'bass,nature,pike,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'the-lowdown-on-fishing-with-tip-downs' => array(
            'title' => "The Lowdown on Fishing with Tip Downs",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'angling2',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'angling,bass,fishing,nature'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'giving-back-to-support-youth-anglers' => array(
            'title' => "Giving Back to Support Youth Anglers",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'angling3',
            'taxonomy' => array(
                'category' => 'freshwater,news',
                'post_tag' => 'angling,bass,nature,pike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'double-rig-system-for-open-water-crappie' => array(
            'title' => "Double Rig System for Open Water Crappie",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'angling4',
            'taxonomy' => array(
                'category' => 'environment,gear,news',
                'post_tag' => 'boat,fishing,summer,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'basic-essentials-for-first-time-anglers' => array(
            'title' => "Basic Essentials for First Time Anglers",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'angling5',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'angling,fishing,nature,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'fly-angler-prevails-at-2018-cuda-bowl' => array(
            'title' => "Fly Angler Prevails at 2018 Cuda Bowl",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'angling6',
            'taxonomy' => array(
                'category' => 'contest,gear,news,freshwater',
                'post_tag' => 'angling,fishing,lake,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'the-most-radical-guides-in-america' => array(
            'title' => "The Most Radical Guides in America?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'angling7',
            'taxonomy' => array(
                'category' => 'gear,news',
                'post_tag' => 'angling,bass,nature,pike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'the-progressive-method-of-fly-casting' => array(
            'title' => "The Progressive Method of Fly Casting",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'angling8',
            'taxonomy' => array(
                'category' => 'contest,environment,news,freshwater',
                'post_tag' => 'boat,fishing,nature,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'are-youth-really-the-future-of-fishing' => array(
            'title' => "Are Youth Really the Future of Fishing?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'angling9',
            'taxonomy' => array(
                'category' => 'contest,environment,gear,freshwater',
                'post_tag' => 'angling,bass,fishing,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'new-zealand-fly-fishing-lord-of-the-rings' => array(
            'title' => "New Zealand Fly Fishing: Lord of the Rings",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'angling10',
            'taxonomy' => array(
                'category' => 'environment,news',
                'post_tag' => 'angling,bass,boat,nature'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'your-guide-to-international-fly-fishing' => array(
            'title' => "Your Guide To International Fly Fishing",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'angling11',
            'taxonomy' => array(
                'category' => 'environment,freshwater',
                'post_tag' => 'fishing,nature,summer,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'paradise-in-the-wild-of-the-indian-ocean' => array(
            'title' => "Paradise in the Wild of the Indian Ocean",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'angling12',
            'taxonomy' => array(
                'category' => 'contest,environment,gear,news',
                'post_tag' => 'angling,bass,nature,pike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '5-best-trout-fishing-spots-in-the-world' => array(
            'title' => "5 Best Trout Fishing Spots in the World",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'sport1',
            'taxonomy' => array(
                'category' => 'environment,gear,freshwater',
                'post_tag' => 'angling,boat,fishing,pike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'wild-and-wet-winter-steelhead-handling' => array(
            'title' => "Wild and Wet Winter - Steelhead Handling",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'sport2',
            'taxonomy' => array(
                'category' => 'environment,freshwater',
                'post_tag' => 'fishing,nature,pike,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'patagonia-announces-worn-wear-fish-tour' => array(
            'title' => "Patagonia Announces Worn Wear Fish Tour",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'sport3',
            'taxonomy' => array(
                'category' => 'contest,gear,freshwater',
                'post_tag' => 'bass,boat,pike,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '5-proven-wet-fly-methods-for-steelhead' => array(
            'title' => "5 Proven Wet-Fly Methods for Steelhead",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tech1',
            'taxonomy' => array(
                'category' => 'environment,gear,freshwater',
                'post_tag' => 'angling,bass,boat,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'sink-flies-faster-for-winter-steelheads' => array(
            'title' => "Sink Flies Faster for Winter Steelheadsf",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tech2',
            'taxonomy' => array(
                'category' => 'environment,news',
                'post_tag' => 'boat,lake,pike,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'two-caddis-patterns-for-every-situation' => array(
            'title' => "Two caddis patterns for every situation",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tech3',
            'taxonomy' => array(
                'category' => 'environment,gear,freshwater',
                'post_tag' => 'nature,pike,summer,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'new-fly-reels-fresh-and-salt-water' => array(
            'title' => "New Fly Reels: Fresh and Salt Water",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'fashion1',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'angling,nature,pike,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'new-fly-rods-the-next-generation' => array(
            'title' => "New Fly Rods: The Next Generation",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'fashion2',
            'taxonomy' => array(
                'category' => 'contest,environment,gear,freshwater',
                'post_tag' => 'angling,boat,lake,pike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'top-fly-anglers-you-should-following' => array(
            'title' => "Top Fly Anglers You Should Following",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'fashion3',
            'taxonomy' => array(
                'category' => 'gear,news',
                'post_tag' => 'angling,fishing,nature,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'fly-fishing-bluegill-and-other-panfish' => array(
            'title' => "Fly Fishing Bluegill and Other Panfish",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'fashion4',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'angling,fishing,lake,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'flashing-permit-equals-feeding-permit' => array(
            'title' => "Flashing Permit Equals Feeding Permit",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'fashion5',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'fishing,lake,pike,trout-fishing'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'fishing-the-super-slam-on-catalina' => array(
            'title' => "Fishing the 'Super Slam' on Catalina",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'fashion6',
            'taxonomy' => array(
                'category' => 'gear,freshwater',
                'post_tag' => 'bass,fishing,lake,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'the-quest-for-the-golden-mahseer' => array(
            'title' => "The Quest for the Golden Mahseer",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'travel1',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'angling,boat,lake,pike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'great-lakes-steelhead-on-dry-flies' => array(
            'title' => "Great Lakes Steelhead On Dry Flies",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'travel2',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'angling,bass,fishing,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'effectively-presenting-flies-steelhead' => array(
            'title' => "Effectively Presenting Flies Steelhead",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'travel3',
            'taxonomy' => array(
                'category' => 'gear,news,freshwater',
                'post_tag' => 'angling,bass,nature,pike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'alpine-lakes-for-remote-monsters' => array(
            'title' => "Alpine Lakes for Remote Monsters",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'travel4',
            'taxonomy' => array(
                'category' => 'environment,news,freshwater',
                'post_tag' => 'angling,fishing,lake,nature'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'like-father-like-son-inherit-the-salt' => array(
            'title' => "Like Father, Like Son: Inherit the Salt",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'travel5',
            'taxonomy' => array(
                'category' => 'gear',
                'post_tag' => 'angling,boat,pike,summer,freshwater'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'fly-fishing-for-taimen-in-mongolia' => array(
            'title' => "Fly Fishing for Taimen in Mongolia",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'travel6',
            'taxonomy' => array(
                'category' => 'environment,freshwater',
                'post_tag' => 'bass,boat,lake,summer'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1563422407255{background-color: #f7f7f7 !important;}.vc_custom_1564460897663{margin-top: 30px !important;}.vc_custom_1582685368454{padding-top: 40px !important;padding-bottom: 40px !important;background-image: url({{image:travel1:url:full}}) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1563441795119{margin-top: 30px !important;}.vc_custom_1564461054749{margin-bottom: 0px !important;}.vc_custom_1582685248331{padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;}.vc_custom_1563437873846{padding-right: 30px !important;padding-left: 30px !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0}.vc_btn3.vc_btn3-style-custom{background-image:none}',
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.jeg_content{padding:0 0 40px}.vc_custom_1564461054749{margin-bottom:0}.vc_custom_1563422407255{background-color: #f7f7f7 !important;}.vc_custom_1564460897663{margin-top: 30px !important;}.vc_custom_1582685368454{padding-top: 40px !important;padding-bottom: 40px !important;background-image: url({{image:travel1:url:full}}) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1563441795119{margin-top: 30px !important;}.vc_custom_1564461054749{margin-bottom: 0px !important;}.vc_custom_1582685248331{padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;background-color: #ffffff !important;}.vc_custom_1563437873846{padding-right: 30px !important;padding-left: 30px !important;}.jeg_content{padding-top:0}.vc_btn3.vc_btn3-style-custom{background-image:none}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home Layout 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1564983910392{margin-top: 10px !important;}.vc_custom_1563517420272{background-color: #f7f7f7 !important;}.vc_custom_1563517666739{margin-top: 40px !important;}.vc_custom_1564376239075{padding-top: 10px !important;padding-bottom: 10px !important;background: #040303 url({{image:travel2:url:full}}) !important;}.vc_custom_1563519965461{margin-top: 40px !important;}.vc_custom_1564984213198{margin-top: 10px !important;margin-bottom: 10px !important;}.vc_custom_1565151777685{margin-bottom: -40px !important;}.vc_custom_1563761180168{padding-top: 40px !important;}',
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.vc_custom_1564984213198{margin-bottom:0}.vc_custom_1564983910392{margin-top: 10px !important;}.vc_custom_1563517420272{background-color: #f7f7f7 !important;}.vc_custom_1563517666739{margin-top: 40px !important;}.vc_custom_1564376239075{padding-top: 10px !important;padding-bottom: 10px !important;background: #040303 url({{image:travel2:url:full}}) !important;}.vc_custom_1563519965461{margin-top: 40px !important;}.vc_custom_1564984213198{margin-top: 10px !important;margin-bottom: 10px !important;}.vc_custom_1565151777685{margin-bottom: -40px !important;}.vc_custom_1563761180168{padding-top: 40px !important;}'
                )
            )
        ),
        'home-3' => array(
            'title' => 'Home Layout 3',
            'content' => 'home3.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1563775722696{margin-bottom: 30px !important;padding-top: 50px !important;background-image: url({{image:travel3:url:full}}) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0}@media only screen and (max-width:1024px){.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:15px}}@media only screen and (max-width:768px){.jeg_postblock_31 .jeg_pl_sm_2{margin-bottom:0}.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:13px}}@media only screen and (max-width:667px){.jeg_postblock_31 .jeg_pl_sm_2{margin-bottom:20px}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'Latest Post',
                    'header_type' => 'heading_5',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'sidebar-widget',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '3',
                    'boxed' => '0',
                    'boxed_shadow' => '0',
                    'box_shadow' => '0',
                    'excerpt_length' => '20',
                    'content_date' => 'default',
                    'date_custom' => 'Y/m/d',
                    'content_pagination' => 'nav_1',
                    'pagination_align' => 'center',
                    'show_navtext' => '0',
                    'show_pageinfo' => '0',
                    'post_offset' => '0',
                    'posts_per_page' => '10',
                    'sort_by' => 'latest',
                ),
                '_elementor_data' => 'home3.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.jeg_content{padding-top:0}@media only screen and (max-width:1024px){.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:15px}}@media only screen and (max-width:768px){.jeg_postblock_31 .jeg_pl_sm_2{margin-bottom:0}.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:13px}}@media only screen and (max-width:667px){.jeg_postblock_31 .jeg_pl_sm_2{margin-bottom:20px}}.vc_custom_1563775722696{margin-bottom: 30px !important;padding-top: 50px !important;background-image: url({{image:travel3:url:full}}) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.jeg_content{padding-top:0}@media only screen and (max-width:1024px){.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:15px}}@media only screen and (max-width:768px){.jeg_postblock_31 .jeg_pl_sm_2{margin-bottom:0}.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:13px}}@media only screen and (max-width:667px){.jeg_postblock_31 .jeg_pl_sm_2{margin-bottom:20px}}'
                )
            )
        ),
        'footer' => array(
            'title' => 'Footer 1',
            'content' => 'footer1.txt',
            'post_type' => 'footer',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1583209166582{background-color: #f7f7f7 !important;}.vc_custom_1583209297017{background-color: #1d242c !important;}.vc_custom_1564473367953{padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;}.vc_custom_1564470897103{border-right-width: 1px !important;padding-top: 40px !important;padding-bottom: 40px !important;border-right-color: #e7e6e7 !important;border-right-style: solid !important;border-radius: 1px !important;}.vc_custom_1564471491726{padding-top: 20px !important;padding-bottom: 20px !important;}',
                '_wpb_post_custom_css' => '.footer-holder .widget_meta{padding-left:15%}.jeg_footer input[type=submit]{color:#1d242c}@media only screen and (max-width:667px){.footer-holder .widget_meta{padding-left:0;padding-bottom:30px}}',
                '_elementor_data' => 'footer1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.jeg_aligncenter .elementor-widget-wrap{padding-top:45px}.vc_custom_6691272865421{margin-bottom:0!important}.vc_custom_9424542245114 h5{color:#0a7f8c;font-size:18px;font-weight:700}.vc_custom_9424542245114 li a{color:#000}.vc_custom_9424542245114 li{margin:0 0 7px}.vc_custom_9424542245114 li a:hover{color:#0a7f8c}.vc_custom_9237663479616 h5{color:#0a7f8c;font-size:18px;font-weight:700}@media only screen and (min-width:768px){.vc_custom_9424542245114 .elementor-widget-wrap{margin:0 0 0 39.375px}}.vc_custom_7202080435464 a{color:#fff}.vc_custom_7202080435464 p{margin:0 0 0;padding:10px}.footer-holder .widget_meta{padding-left:15%}.jeg_footer input[type=submit]{color:#1d242c}@media only screen and (max-width:667px){.footer-holder .widget_meta{padding-left:0;padding-bottom:30px}}.vc_custom_1583209166582{background-color: #f7f7f7 !important;}.vc_custom_1583209297017{background-color: #1d242c !important;}.vc_custom_1564473367953{padding-top: 30px !important;padding-right: 30px !important;padding-bottom: 30px !important;padding-left: 30px !important;}.vc_custom_1564470897103{border-right-width: 1px !important;padding-top: 40px !important;padding-bottom: 40px !important;border-right-color: #e7e6e7 !important;border-right-style: solid !important;border-radius: 1px !important;}.vc_custom_1564471491726{padding-top: 20px !important;padding-bottom: 20px !important;}'
                )
            )
        )
    
    ),

    // menu location
    'menu_location' => array(
        'main-navigation' => array(
            'title' => 'menu 1',
            'location' => array(
                'main-navigation',
                'mobile-navigation'
            )
        ),
        'topbar-navigation' => array(
            'title' => 'Top Bar',
            'location' => 'topbar_navigation'
        ),
    ),

    // menu it self
    'menu' => array(

        // main menu
        'home' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Home',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-1:id}}',
                'menu-item-status' => 'publish'
            )
        ),
            'home-1' => array(
                'location' => 'main-navigation',
                'menu-item-data' => array(
                    'menu-item-title' => 'Home - Layout 1',
                    'menu-item-parent-id' => '{{menu:home:id}}',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => '{{post:home-1:id}}',
                    'menu-item-status' => 'publish'
                )
            ),
            'home-2' => array(
                'location' => 'main-navigation',
                'menu-item-data' => array(
                    'menu-item-title' => 'Home - Layout 2',
                    'menu-item-parent-id' => '{{menu:home:id}}',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => '{{post:home-2:id}}',
                    'menu-item-status' => 'publish'
                )
            ),
            'home-3' => array(
                'location' => 'main-navigation',
                'menu-item-data' => array(
                    'menu-item-title' => 'Home - Layout 3',
                    'menu-item-parent-id' => '{{menu:home:id}}',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => '{{post:home-3:id}}',
                    'menu-item-status' => 'publish'
                )
            ),
        'news' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'News',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:news:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'freshwater' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Freshwater',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:freshwater:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'gear' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Gear',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:gear:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'contest' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contest',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:contest:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'environment' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Environment',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:environment:id}}',
                'menu-item-status' => 'publish'
            )
        ),

        // footer & topbar menu
        'about' => array(
            'location' => 'topbar-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'About',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'contact' => array(
            'location' => 'topbar-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contact Us',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        )

    ),

    'widget_position' => array(
        'Home 1',
        'Sidebar Widget',
        'Single post'
    ),

    'widget' => array(
        'widget.json',
    ),

    'customizer' => array(
        'style.json',
    ),

    'plugin' => array(
        'jnews-customizer-category',
        'jnews-option-category',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-split',
        'jnews-view-counter'
    )

);
