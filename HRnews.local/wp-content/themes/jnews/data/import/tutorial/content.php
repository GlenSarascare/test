<?php

return array(

    // image
    'image' =>  array(
        'tutorial1' => 'https://jegtheme.com/asset/jnews/demo/default/news1.jpg',
        'tutorial2' => 'https://jegtheme.com/asset/jnews/demo/default/news2.jpg',
        'tutorial3' => 'https://jegtheme.com/asset/jnews/demo/default/news3.jpg',
        'tutorial4' => 'https://jegtheme.com/asset/jnews/demo/default/news4.jpg',
        'tutorial5' => 'https://jegtheme.com/asset/jnews/demo/default/news5.jpg',
        'tutorial6' => 'https://jegtheme.com/asset/jnews/demo/default/news6.jpg',
        'tutorial7' => 'https://jegtheme.com/asset/jnews/demo/default/news7.jpg',
        'tutorial8' => 'https://jegtheme.com/asset/jnews/demo/default/news8.jpg',
        'tutorial9' => 'https://jegtheme.com/asset/jnews/demo/default/news9.jpg',
        'tutorial10' => 'https://jegtheme.com/asset/jnews/demo/default/news10.jpg',
        'tutorial11' => 'https://jegtheme.com/asset/jnews/demo/default/news11.jpg',
        'tutorial12' => 'https://jegtheme.com/asset/jnews/demo/default/news12.jpg',
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
        'tutorial_bg' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget_bg.jpg',
        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',
        'logo' => 'https://jegtheme.com/asset/jnews/demo/tutorial/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/tutorial/logo@2x.png',
        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/tutorial/logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/tutorial/logo@2x.png',
        'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png',
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'design' =>
                array(
                    'title' =>'Design',
                    'description' => 'You can add some category description here.'
                ),
            'gadget' =>
                array(
                    'title' =>'Gadget',
                    'description' => 'You can add some category description here.'
                ),
            'news' =>
                array(
                    'title' =>'News',
                    'description' => 'You can add some category description here.'
                ),
            'technology' =>
                array(
                    'title' =>'Technology',
                    'description' => 'You can add some category description here.'
                ),
            'coding' =>
                array(
                    'title' =>'Coding',
                    'description' => 'You can add some category description here.',
                    'parent' => 'technology'
                ),
            'hosting' =>
                array(
                    'title' =>'Hosting',
                    'description' => 'You can add some category description here.',
                    'parent' => 'technology'
                ),
        ),

        'post_tag' => array(
            'apple' => array(
                'title' => 'Apple',
            ),
            'artificial-intelligence' => array(
                'title' => 'Artificial Intelligence',
            ),
            'branding' => array(
                'title' => 'Branding',
            ),
            'css' => array(
                'title' => 'CSS',
            ),
            'gaming' => array(
                'title' => 'Gaming',
            ),
            'javascript' => array(
                'title' => 'Javascript',
            ),
            'laravel' => array(
                'title' => 'Laravel',
            ),
            'photoshop' => array(
                'title' => 'Photoshop',
            ),
            'php' => array(
                'title' => 'PHP',
            ),
            'server' => array(
                'title' => 'Server',
            ),
            'smartphone' => array(
                'title' => 'Smartphone',
            ),
            'typography' => array(
                'title' => 'Typography',
            ),
            'user-experience' => array(
                'title' => 'User Experience',
            ),
            'web-design' => array(
                'title' => 'Web Design',
            )
        )
    ),

    // post & page
    'post' => array(
        'create-device-mockups-in-browser-with-devicemock' => array(
            'title' => "Create Device Mockups in Browser with DeviceMock",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial1',
            'taxonomy' => array(
                'category' => 'design,gadget,technology',
                'post_tag' => 'photoshop,php,typography,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'creating-a-local-server-accessible-from-a-public-address' => array(
            'title' => "Creating A Local Server From A Public Address",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial2',
            'taxonomy' => array(
                'category' => 'coding,hosting,technology',
                'post_tag' => 'artificial-intelligence,branding,photoshop,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'professional-gaming-can-build-a-career-in-it' => array(
            'title' => "Professional Gaming & Can Build A Career In It",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial3',
            'taxonomy' => array(
                'category' => 'coding,hosting,technology',
                'post_tag' => 'gaming,laravel,smartphone,typography'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '3-css-properties-you-should-know' => array(
            'title' => "3  CSS Properties You Should Know",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial4',
            'taxonomy' => array(
                'category' => 'coding,design,news,technology',
                'post_tag' => 'apple,javascript,server,smartphone'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'the-psychology-of-price-in-ux' => array(
            'title' => "The Psychology of Price in UX",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial5',
            'taxonomy' => array(
                'category' => 'design,news,technology',
                'post_tag' => 'artificial-intelligence,server,smartphone,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-to-design-for-3d-printing' => array(
            'title' => "How to Design for 3D Printing",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial6',
            'taxonomy' => array(
                'category' => 'design,news,technology',
                'post_tag' => 'branding,laravel,photoshop,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '5-key-features-to-expect-in-future-smartphones' => array(
            'title' => "5 Key to Expect Future Smartphones",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial7',
            'taxonomy' => array(
                'category' => 'gadget,news,technology',
                'post_tag' => 'laravel,smartphone,user-experience,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'is-the-human-designer-facing-extinction' => array(
            'title' => "Is the Designer Facing Extinction?",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial8',
            'taxonomy' => array(
                'category' => 'design,news,technology',
                'post_tag' => 'apple,css,photoshop,typography'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'everything-you-need-to-know-about-oneplus-one' => array(
            'title' => "Everything To Know About OnePlus",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial9',
            'taxonomy' => array(
                'category' => 'gadget,news,technology',
                'post_tag' => 'apple,css,gaming,photoshop'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-to-auto-unlock-macos-with-apple-watch-series-4' => array(
            'title' => "How to Unlock macOS Watch Series 4",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial10',
            'taxonomy' => array(
                'category' => 'gadget,news,technology',
                'post_tag' => 'apple,branding,javascript,laravel'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'beginners-guide-to-wordpress-multisite-with-mamp' => array(
            'title' => "Guide to WordPress Post Revisions",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial11',
            'taxonomy' => array(
                'category' => 'coding,hosting,news',
                'post_tag' => 'css,javascript,server,smartphone'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'build-responsive-sortable-grid-layouts-with-this-script' => array(
            'title' => "Responsive Grid Layouts With Script",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial12',
            'taxonomy' => array(
                'category' => 'coding,design,technology',
                'post_tag' => 'laravel,smartphone,user-experience,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-to-use-es6-template-literals-in-javascript' => array(
            'title' => "How to Use ES6 Template Literals in JavaScript",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial1',
            'taxonomy' => array(
                'category' => 'coding,design,technology',
                'post_tag' => 'branding,javascript,photoshop,server'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-to-choose-the-right-hosting-for-your-blog' => array(
            'title' => "How To Choose The Right Hosting For Your Blog",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial2',
            'taxonomy' => array(
                'category' => 'hosting,news,technology',
                'post_tag' => 'css,photoshop,smartphone,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'teach-your-kids-to-code-with-tynker' => array(
            'title' => "Teach Your Kids to Code Playground with Tynker",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial3',
            'taxonomy' => array(
                'category' => 'coding,news,technology',
                'post_tag' => 'branding,laravel,photoshop,smartphone'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'explore-open-source-laravel-projects-with-open-laravel' => array(
            'title' => "Explore Open Source Laravel Projects with Open Laravel",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial4',
            'taxonomy' => array(
                'category' => 'coding,hosting,technology',
                'post_tag' => 'apple,javascript,user-experience,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'getting-started-with-javascript-promises' => array(
            'title' => "Getting Started with JavaScript Promises",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial5',
            'taxonomy' => array(
                'category' => 'coding,design,news',
                'post_tag' => 'gaming,server,user-experience,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'introducing-css-new-font-display-property' => array(
            'title' => "Introducing CSS' New Font-Display Property",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial6',
            'taxonomy' => array(
                'category' => 'coding,design,technology',
                'post_tag' => 'apple,photoshop,server,typography'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'surface-studio-vs-imac-which-should-you-pick' => array(
            'title' => "Surface Studio vs iMac – Which Should You Pick?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial7',
            'taxonomy' => array(
                'category' => 'gadget,news,technology',
                'post_tag' => 'php,server,user-experience,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'busting-the-myth-behind-unlimited-web-hosting' => array(
            'title' => "Busting The Myth Behind ‘Unlimited’ Web Hosting",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial8',
            'taxonomy' => array(
                'category' => 'coding,hosting,technology',
                'post_tag' => 'artificial-intelligence,branding,gaming,php'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'streamlining-ux-with-anticipatory-design' => array(
            'title' => "Streamlining UX with Anticipatory Design",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial9',
            'taxonomy' => array(
                'category' => 'design,news,technology',
                'post_tag' => 'gaming,photoshop,php,user-experience'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'pulling-apart-svgs-with-reusable-webgl-components-using-react-three-fiber' => array(
            'title' => "Pulling Apart SVGs Components Using React-three-fiber",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial10',
            'taxonomy' => array(
                'category' => 'coding,design,news',
                'post_tag' => 'artificial-intelligence,javascript,server,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'ai-basics-natural-languange-processing-with-node-js' => array(
            'title' => "AI Basics: Natural Languange Processing with Node.js",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial11',
            'taxonomy' => array(
                'category' => 'coding,hosting,technology',
                'post_tag' => 'branding,photoshop,server,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '5-ways-to-connect-wireless-headphones-to-tv-2' => array(
            'title' => "Make Local Web Server Accessible Online With Localtunnel",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial12',
            'taxonomy' => array(
                'category' => 'coding,hosting,technology',
                'post_tag' => 'branding,laravel,typography,user-experience'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '5-ways-to-connect-wireless-headphones-to-tv' => array(
            'title' => "5 Ways to Connect Wireless Headphones to TV",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial1',
            'taxonomy' => array(
                'category' => 'gadget,news,technology',
                'post_tag' => 'css,gaming,smartphone,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-to-pick-your-next-tech-fokus' => array(
            'title' => "How To Pick Your Next Technology Fokus",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial2',
            'taxonomy' => array(
                'category' => 'coding,news,technology',
                'post_tag' => 'apple,laravel,photoshop,server'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '3-tips-for-creating-a-effective-user-flow' => array(
            'title' => "3 Tips For Creating a Effective User Flow",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'tutorial3',
            'taxonomy' => array(
                'category' => 'design,news,technology',
                'post_tag' => 'branding,server,user-experience,web-design'
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),

        // page
        'home' => array(
            'title' => 'Home',
            'content' => 'home.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1557825018239{margin-top:10px!important}.vc_custom_1558317045049{margin-bottom:-5px!important}.vc_custom_1557978593696{margin-top:-10px!important}',
                '_wpb_post_custom_css' => '.jeg_hero_style_4 .jeg_post_category a{padding:7px 6px 7px 7px}.jeg_postblock_36 .jeg_post_category a{padding:7px 6px 7px 7px}@media only screen and (max-width:768px){.vc_sep_width_100{display:none}.jeg_vc_content .vc_inner{display:none}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'header_type' => 'heading_5',
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '36',
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
                    'posts_per_page' => '6', 
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.vc_custom_2363771603128{margin-bottom:0!important}.jeg_ad_module{margin-bottom:0}.elementor-widget-wp-widget-jnews_module_element_ads{margin-bottom:0!important}.elementor-divider{padding-top:25px!important;padding-bottom:25px!important}.vc_custom_1557825018239{margin-top:10px!important}.vc_custom_1558317045049{margin-bottom:-5px!important}.vc_custom_1557978593696{margin-top:-10px!important}.jeg_hero_style_4 .jeg_post_category a{padding:7px 6px 7px 7px}.jeg_postblock_36 .jeg_post_category a{padding:7px 6px 7px 7px}@media only screen and (max-width:768px){.vc_sep_width_100{display:none}.jeg_vc_content .vc_inner{display:none}}'
                )
            )
        ),
        'home-1' => array(
            'title' => 'Home Layout 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1557825018239{margin-top:10px!important}.vc_custom_1560238121288{margin-bottom:-5px!important}.vc_custom_1560244749430{margin-top:-5px!important;margin-bottom:22px!important}',
                '_wpb_post_custom_css' => '.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:18px}.jeg_heroblock .jeg_post_meta,.jeg_heroblock .jeg_post_meta .fa,.jeg_heroblock .jeg_post_meta a,.jeg_heroblock .jeg_post_title a,.jeg_heroblock .jeg_postblock_content{color:#f1f7ed}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'header_type' => 'heading_5',
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '23',
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
                    'posts_per_page' => '6', 
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.vc_custom_3746161414208{margin-bottom:0!important}.jeg_ad_module{margin-bottom:0}.elementor-widget-wp-widget-jnews_module_element_ads{margin-bottom:0!important}.elementor-divider{padding-top:25px!important;padding-bottom:25px!important}.jeg_postblock_31 .jeg_pl_sm_2 .jeg_post_title{font-size:18px}.jeg_heroblock .jeg_post_meta,.jeg_heroblock .jeg_post_meta .fa,.jeg_heroblock .jeg_post_meta a,.jeg_heroblock .jeg_post_title a,.jeg_heroblock .jeg_postblock_content{color:#f1f7ed}.vc_custom_1557825018239{margin-top:10px!important}.vc_custom_1560238121288{margin-bottom:-5px!important}.vc_custom_1560244749430{margin-top:-5px!important;margin-bottom:22px!important}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home Layout 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1564632404937{border-bottom-width:1px!important;border-bottom-color:#eee!important;border-bottom-style:solid!important}.vc_custom_1564713366714{margin-top:0!important;margin-bottom:30px!important;background-color:#f7f7f7!important}.vc_custom_1564367539700{background-color:#f7f7f7!important}.vc_custom_1564632698092{margin-top:40px!important;margin-bottom:24px!important}.vc_custom_1583218506376{margin-bottom:-100px!important}.vc_custom_1564993354865{margin-top:-15px!important}.vc_custom_1564369763852{margin-top:50px!important}.vc_custom_1565062466323{margin-top:0!important}',
                '_wpb_post_custom_css' => '.jeg_slider_type_4 .jeg_post_category a{padding:7px 6px 7px 7px}.jeg_postblock_33 .jeg_post_category a{padding:7px 6px 7px 7px}.jeg_postblock_1.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:40px}.jeg_postblock_1 .jeg_readmore{display:none}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:48px;line-height:56px}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_thumb{width:50%;margin-right:40px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:40px}.jeg_postblock_22 .jeg_post_title{font-size:18px;line-height:24px}.jeg_postblock_21 .jeg_pl_sm .jeg_post_title{font-size:18px}.jeg_postblock_13.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:40px}.jeg_postblock_13 .jeg_readmore{display:none}.jeg_postblock_carousel_1 .jeg_post_title{font-size:18px}.jeg_postblock_5 .jeg_readmore:hover {color: #6200ea;}.jeg_postblock_5 .jeg_readmore{background:var(--j-bg-color,#fff);box-shadow:none}@media only screen and (max-width:1024px){.jeg_otb .jeg_postblock_5{margin-bottom:-70px!important}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:38px;line-height:40px}}@media only screen and (max-width:768px){.jeg_otb .jeg_postblock_5{margin-bottom:0!important}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_thumb{margin-right:20px}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:30px;line-height:36px}.jeg_postblock_21 .jeg_pl_sm .jeg_post_title{font-size:16px}.jeg_postblock_13.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:33px;line-height:40px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:0}.jeg_postblock_carousel_1{margin-bottom:30px}}@media only screen and (max-width:667px){.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:26px;line-height:30px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:0}}@media only screen and (max-width:480px){.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_thumb{margin-right:15px}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:20px;line-height:23px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:0}.jeg_postblock_13.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:28px;line-height:36px}}',
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.vc_custom_8992226901103 .jeg_pl_lg_2{margin-bottom:0} @media only screen and (min-width:1024px){.vc_custom_7869555142674 .elementor-column-wrap{padding-top:0!important}div.elementor-column-wrap.elementor-element-populated{padding-top:0!important}.vc_custom_5128737317690{padding-top:10px!important}.vc_custom_5128737317690 .elementor-heading-title{padding-top:10px;padding-bottom:10px}.vc_custom_8992226901103{margin-bottom:-120px}.vc_custom_8191248456736{margin-top:120px}}h1.elementor-heading-title{margin:.67em 0 .5em !important}.elementor-widget-jnews_block_5_elementor{margin-top:50px}.vc_custom_5317091944350{margin-top:0}.vc_custom_8487642926889{margin-bottom:0!important}.vc_custom_1367916103083 .elementor-heading-title{margin-top:0!important}.vc_custom_2251875194331{padding-top:10px}.vc_custom_1583218506376{margin-bottom:-100px!important}.vc_custom_1564993354865{margin-top:-15px!important}.vc_custom_1564369763852{margin-top:50px!important}.vc_custom_1565062466323{margin-top:0!important}.jeg_slider_type_4 .jeg_post_category a{padding:7px 6px 7px 7px}.jeg_postblock_33 .jeg_post_category a{padding:7px 6px 7px 7px}.jeg_postblock_1.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:40px}.jeg_postblock_1 .jeg_readmore{display:none}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:48px;line-height:56px}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_thumb{width:50%;margin-right:40px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:40px}.jeg_postblock_22 .jeg_post_title{font-size:18px;line-height:24px}.jeg_postblock_21 .jeg_pl_sm .jeg_post_title{font-size:18px}.jeg_postblock_13.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:40px}.jeg_postblock_13 .jeg_readmore{display:none}.jeg_postblock_carousel_1 .jeg_post_title{font-size:18px}.jeg_postblock_5 .jeg_readmore:hover {color: #6200ea;}.jeg_postblock_5 .jeg_readmore{background:var(--j-bg-color,#fff);box-shadow:none}@media only screen and (max-width:1024px){.jeg_otb .jeg_postblock_5{margin-bottom:-70px}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:38px;line-height:40px}}@media only screen and (max-width:768px){.jeg_otb .jeg_postblock_5{margin-bottom:0}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_thumb{margin-right:20px}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:30px;line-height:36px}.jeg_postblock_21 .jeg_pl_sm .jeg_post_title{font-size:16px}.jeg_postblock_13.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:33px;line-height:40px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:0}.jeg_postblock_carousel_1{margin-bottom:30px}}@media only screen and (max-width:667px){.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:26px;line-height:30px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:0}}@media only screen and (max-width:480px){.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_thumb{margin-right:15px}.jeg_postblock_5.jeg_col_3o3 .jeg_pl_lg_2 .jeg_post_title{font-size:20px;line-height:23px}.jeg_otb .jeg_postblock_5.jeg_col_3o3 .jeg_postblock_content{padding-top:0}.jeg_postblock_13.jeg_col_1o3 .jeg_pl_lg_1 .jeg_post_title{font-size:28px;line-height:36px}}.vc_custom_1564632404937{border-bottom-width:1px;border-bottom-color:#eee;border-bottom-style:solid}.vc_custom_1564713366714{margin-top:0;margin-bottom:30px;background-color:#f7f7f7}.vc_custom_1564367539700{background-color:#f7f7f7}.vc_custom_1564632698092{margin-top:40px;margin-bottom:24px}'
                )
            )
        ),
        'home-3' => array(
            'title' => 'Home Layout 3',
            'content' => 'home3.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1583220364272{margin-bottom:0!important}.vc_custom_1583220842274{margin-bottom:0!important}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0}@media screen and (min-width:768px){.jeg_postblock_38.jeg_col_3o3 .jeg_post{padding:4% 0}.jeg_postblock_38 .jeg_post_title{font-size:32px}}',
                '_elementor_data' => 'home3.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.vc_custom_1583220364272{margin-bottom:0!important}.vc_custom_1583220842274{margin-bottom:0!important}.jeg_content{padding-top:0}@media screen and (min-width:768px){.jeg_postblock_38.jeg_col_3o3 .jeg_post{padding:4% 0}.jeg_postblock_38 .jeg_post_title{font-size:32px}}'
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
                'footer-navigation',
                'mobile-navigation'
            )
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
                'menu-item-object-id' => '{{post:home:id}}',
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
        'technology' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Technology',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:technology:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_1',
                    'category' => '{{category:technology:id}}',
                    'number' => 9,
                ),
            )
        ),
        'gadget' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Gadget',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:gadget:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_1',
                    'category' => '{{category:gadget:id}}',
                    'number' => 9,
                ),
            )
        ),
        'design' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Design',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:design:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_1',
                    'category' => '{{category:design:id}}',
                    'number' => 9,
                ),
            )
        ),

    ),

    'widget_position' => array(
        'Sidebar Widget'
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
        'jnews-gallery',
        'jnews-like',
        'jnews-meta-header',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-view-counter'
    )

);
