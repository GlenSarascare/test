<?php

return array(

    // image
    'image' =>  array(
        'freebie1' => 'https://jegtheme.com/asset/jnews/demo/default/fashion1.jpg',
        'freebie2' => 'https://jegtheme.com/asset/jnews/demo/default/fashion2.jpg',
        'freebie3' => 'https://jegtheme.com/asset/jnews/demo/default/fashion3.jpg',
        'freebie4' => 'https://jegtheme.com/asset/jnews/demo/default/fashion4.jpg',
        'freebie5' => 'https://jegtheme.com/asset/jnews/demo/default/fashion5.jpg',
        'freebie6' => 'https://jegtheme.com/asset/jnews/demo/default/fashion6.jpg',
        'freebie7' => 'https://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
        'freebie8' => 'https://jegtheme.com/asset/jnews/demo/default/travel2.jpg',
        'freebie9' => 'https://jegtheme.com/asset/jnews/demo/default/travel3.jpg',
        'freebie10' => 'https://jegtheme.com/asset/jnews/demo/default/travel4.jpg',

        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',

        'logo' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo@2x.png',

        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo@2x.png',

        'ad_300x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png',
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'fonts' =>
                array(
                    'title' =>'Fonts',
                    'description' => ''
                ),
            'icons' =>
                array(
                    'title' =>'Icons',
                    'description' => ''
                ),
            'illustrations' =>
                array(
                    'title' =>'Illustrations',
                    'description' => ''
                ),
            'templates' =>
                array(
                    'title' =>'Templates',
                    'description' => ''
                ),
            'mockups' =>
                array(
                    'title' =>'Mockups',
                    'description' => ''
                ),
            'ui-kits' =>
                array(
                    'title' =>'UI-Kits',
                    'description' => ''
                ),

        ),

        'post_tag' => array(
            '2018-blog-theme' => array(
                'title' => '2018 Blog Theme'
            ),
            'adobe-xd' => array(
	            'title' => 'Adobe XD'
            ),
            'clean' => array(
	            'title' => 'Clean'
            ),
            'diy-fashion' => array(
	            'title' => 'DIY Fashion'
            ),
            'featured' => array(
	            'title' => 'Featured'
            ),
            'iphone-xs' => array(
	            'title' => 'iPhone Xs'
            ),
            'life' => array(
                'title' => 'Life'
            ),
            'macbook' => array(
                'title' => 'Macbook'
            ),
            'mobile' => array(
                'title' => 'Mobile'
            ),
            'modern' => array(
                'title' => 'Modern'
            ),
            'my-adventure' => array(
                'title' => 'My Adventure'
            ),
            'psd' => array(
                'title' => 'PSD'
            ),
            'sketch' => array(
                'title' => 'Sketch'
            ),
            'tips' => array(
                'title' => 'Tips'
            ),
            'web' => array(
                'title' => 'Web'
            ),
            'wordpress-blog-theme' => array(
	            'title' => 'WordPress Blog Theme'
            ),
        )
    ),

    // post & page
    'post' => array(
        'macbook-pro-2018-mockup' => array(
            'title' => "Macbook Pro 2018 Mockup",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie1',
            'taxonomy' => array(
                'category' => 'mockups,templates',
                'post_tag' => 'budget-travel,chopper-bike,national-exam,visit-bali',
                'post_format' => 'post-format-gallery'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'clay-iphone-mockup' => array(
            'title' => "Clay iPhone Mockup",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie2',
            'taxonomy' => array(
                'category' => 'icons,mockups,ui-kits',
                'post_tag' => 'balinese-culture,budget-travel,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}'),
                'jnews_single_post' => array(
                    'override_template' => '1',
                    'override' => array(
                        array(
                            'template' => '2',
                            'single_blog_custom' => '',
                            'parallax' => '1',
                            'fullscreen' => '0',
                            'layout' => 'right-sidebar',
                            'sidebar' => 'default-sidebar',
                            'second_sidebar' => 'default-sidebar',
                            'sticky_sidebar' => '1',
                            'share_position' => 'bottom',
                            'share_float_style' => 'share-monocrhome',
                            'show_share_counter' => '1',
                            'show_view_counter' => '1',
                            'show_featured' => '0',
                            'show_post_meta' => '1',
                            'show_post_author' => '0',
                            'show_post_author_image' => '0',
                            'show_post_date' => '1',
                            'post_date_format' => 'default',
                            'post_date_format_custom' => 'Y/m/d',
                            'show_post_category' => '1',
                            'show_post_tag' => '1',
                            'show_prev_next_post' => '0',
                            'show_popup_post' => '1',
                            'number_popup_post' => '3',
                            'show_author_box' => '0',
                            'show_post_related' => '1',
                            'show_inline_post_related' => '0',
                        )
                    )
                )
            )
        ),
        'multi-purpose-web-template' => array(
            'title' => "Multi-Purpose Web Template",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie3',
            'taxonomy' => array(
                'category' => 'mockups,templates,ui-kits',
                'post_tag' => '2018-league,bali-united,budget-travel,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'creative-portfolio-website-ui-kit' => array(
            'title' => "Creative Portfolio Website UI-Kit",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie4',
            'taxonomy' => array(
                'category' => 'mockups,templates,ui-kits',
                'post_tag' => 'bali-united,champions-league,istana-negara,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}'),
                'jnews_single_post' => array(
                    'override_template' => '1',
                    'override' => array(
                        array(
                            'template' => '2',
                            'single_blog_custom' => '',
                            'parallax' => '1',
                            'fullscreen' => '0',
                            'layout' => 'right-sidebar',
                            'sidebar' => 'default-sidebar',
                            'second_sidebar' => 'default-sidebar',
                            'sticky_sidebar' => '1',
                            'share_position' => 'bottom',
                            'share_float_style' => 'share-monocrhome',
                            'show_share_counter' => '1',
                            'show_view_counter' => '1',
                            'show_featured' => '0',
                            'show_post_meta' => '1',
                            'show_post_author' => '0',
                            'show_post_author_image' => '0',
                            'show_post_date' => '1',
                            'post_date_format' => 'default',
                            'post_date_format_custom' => 'Y/m/d',
                            'show_post_category' => '1',
                            'show_post_tag' => '1',
                            'show_prev_next_post' => '0',
                            'show_popup_post' => '1',
                            'number_popup_post' => '3',
                            'show_author_box' => '0',
                            'show_post_related' => '1',
                            'show_inline_post_related' => '0',
                        )
                    )
                )
            )
        ),
        'free-colorful-wavy-background' => array(
            'title' => "Free Colorful Wavy Background",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie5',
            'taxonomy' => array(
                'category' => 'fonts,icons,illustrations',
                'post_tag' => 'bali-united,budget-travel,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:devices:id}}')
            )
        ),
        'tropical-floral-pattern' => array(
            'title' => "Tropical Floral Pattern",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie6',
            'taxonomy' => array(
                'category' => 'illustrations,templates,ui-kits',
                'post_tag' => 'bali-united,balinese-culture,budget-travel,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:devices:id}}')
            )
        ),
        'bromello-modern-script-typeface' => array(
            'title' => "Bromello Modern Script Typeface",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie7',
            'taxonomy' => array(
                'category' => 'fonts,icons,illustrations',
                'post_tag' => 'budget-travel,chopper-bike,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'free-psd-web-ui-kit' => array(
            'title' => "Free PSD Web UI-Kit",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie8',
            'taxonomy' => array(
                'category' => 'mockups,templates,ui-kits',
                'post_tag' => 'champions-league,chopper-bike,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'a5-fashion-magazine-template' => array(
            'title' => "A5 Fashion Magazine Template",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie9',
            'taxonomy' => array(
                'category' => 'illustrations,mockups,templates',
                'post_tag' => '2018-league,balinese-culture,champions-league,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'clean-minimalist-desk-mockup' => array(
            'title' => "Clean Minimalist Desk Mockup",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie10',
            'taxonomy' => array(
                'category' => 'icons,illustrations,mockups',
                'post_tag' => 'bali-united,balinese-culture,doctor-terawan,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:devices:id}}')
            )
        ),
        'h1-sans-serif-typeface' => array(
            'title' => "H1 Sans Serif Typeface",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie1',
            'taxonomy' => array(
                'category' => 'fonts,illustrations',
                'post_tag' => '2018-league,bali-united,champions-league,chopper-bike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'hanging-poster-mockup' => array(
            'title' => "Hanging Poster Mockup",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie2',
            'taxonomy' => array(
                'category' => 'illustrations,mockups,templates',
                'post_tag' => '2018-league,champions-league,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'space-vector-typography' => array(
            'title' => "Space Vector Typography",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie3',
            'taxonomy' => array(
                'category' => 'fonts,icons,illustrations',
                'post_tag' => 'balinese-culture,budget-travel,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'free-handwritten-script-font' => array(
            'title' => "Free Handwritten Script Font",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie4',
            'taxonomy' => array(
                'category' => 'fonts,illustrations,mockups',
                'post_tag' => 'bali-united,chopper-bike,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'macbook-pro-angled-mockup' => array(
            'title' => "Macbook Pro Angled Mockup",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie5',
            'taxonomy' => array(
                'category' => 'icons,mockups,templates',
                'post_tag' => '2018-league,budget-travel,chopper-bike,visit-bali',
                'post_format' => 'post-format-gallery'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'typer-modern-serif-typeface' => array(
            'title' => "Typer Modern Serif Typeface",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie6',
            'taxonomy' => array(
                'category' => 'fonts,illustrations,mockups',
                'post_tag' => 'bali-united,budget-travel,istana-negara,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'free-multi-devices-mockup' => array(
            'title' => "FREE Multi Devices Mockup",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie7',
            'taxonomy' => array(
                'category' => 'mockups,templates,ui-kits',
                'post_tag' => 'balinese-culture,chopper-bike,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'free-photoshop-text-style' => array(
            'title' => "Free Photoshop Text Style",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie8',
            'taxonomy' => array(
                'category' => 'fonts,illustrations',
                'post_tag' => 'bali-united,champions-league,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:devices:id}}')
            )
        ),
        'magazine-cover-template' => array(
            'title' => "Magazine Cover Template",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie9',
            'taxonomy' => array(
                'category' => 'icons,mockups,templates',
                'post_tag' => 'budget-travel,doctor-terawan,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'spray-photoshop-brush-kit' => array(
            'title' => "Spray Photoshop Brush Kit",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie10',
            'taxonomy' => array(
                'category' => 'icons,illustrations',
                'post_tag' => 'balinese-culture,champions-league,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'beach-vibes-only' => array(
            'title' => "Realistic Cup Mockup",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie1',
            'taxonomy' => array(
                'category' => 'fonts,mockups,ui-kits',
                'post_tag' => 'bali-united,balinese-culture,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'realistic-holding-iphone-x-mockup' => array(
            'title' => "Realistic Holding iPhone X Mockup",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie2',
            'taxonomy' => array(
                'category' => 'fonts,icons,mockups',
                'post_tag' => '2018-league,bali-united,budget-travel,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}')
            )
        ),
        'old-telephone-illustration' => array(
            'title' => "Old Telephone Illustration",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie3',
            'taxonomy' => array(
                'category' => 'icons,illustrations',
                'post_tag' => '2018-league,budget-travel,chopper-bike,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:devices:id}}'),
                'jnews_single_post' => array(
                    'override_template' => '1',
                    'override' => array(
                        array(
                            'template' => '2',
                            'single_blog_custom' => '',
                            'parallax' => '1',
                            'fullscreen' => '0',
                            'layout' => 'right-sidebar',
                            'sidebar' => 'default-sidebar',
                            'second_sidebar' => 'default-sidebar',
                            'sticky_sidebar' => '1',
                            'share_position' => 'bottom',
                            'share_float_style' => 'share-monocrhome',
                            'show_share_counter' => '1',
                            'show_view_counter' => '1',
                            'show_featured' => '0',
                            'show_post_meta' => '1',
                            'show_post_author' => '0',
                            'show_post_author_image' => '0',
                            'show_post_date' => '1',
                            'post_date_format' => 'default',
                            'post_date_format_custom' => 'Y/m/d',
                            'show_post_category' => '1',
                            'show_post_tag' => '1',
                            'show_prev_next_post' => '0',
                            'show_popup_post' => '1',
                            'number_popup_post' => '3',
                            'show_author_box' => '0',
                            'show_post_related' => '1',
                            'show_inline_post_related' => '0',
                        )
                    )
                )
            )
        ),
        'iphone-back-case-mockup' => array(
            'title' => "iPhone Back Case Mockup",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie4',
            'taxonomy' => array(
                'category' => 'icons,mockups,templates',
                'post_tag' => 'bali-united,budget-travel,chopper-bike,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'stationery-brand-template' => array(
            'title' => "Stationery Brand Template",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie5',
            'taxonomy' => array(
                'category' => 'illustrations,mockups,ui-kits',
                'post_tag' => 'chopper-bike,istana-negara,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'jnews_single_post' => array(
                    'override_template' => '1',
                    'override' => array(
                        array(
                            'template' => '2',
                            'single_blog_custom' => '',
                            'parallax' => '1',
                            'fullscreen' => '0',
                            'layout' => 'right-sidebar',
                            'sidebar' => 'default-sidebar',
                            'second_sidebar' => 'default-sidebar',
                            'sticky_sidebar' => '1',
                            'share_position' => 'bottom',
                            'share_float_style' => 'share-monocrhome',
                            'show_share_counter' => '1',
                            'show_view_counter' => '1',
                            'show_featured' => '0',
                            'show_post_meta' => '1',
                            'show_post_author' => '0',
                            'show_post_author_image' => '0',
                            'show_post_date' => '1',
                            'post_date_format' => 'default',
                            'post_date_format_custom' => 'Y/m/d',
                            'show_post_category' => '1',
                            'show_post_tag' => '1',
                            'show_prev_next_post' => '0',
                            'show_popup_post' => '1',
                            'number_popup_post' => '3',
                            'show_author_box' => '0',
                            'show_post_related' => '1',
                            'show_inline_post_related' => '0',
                        )
                    )
                )
            )
        ),
        'modern-handwritten-script-typeface' => array(
            'title' => "Modern Handwritten Script Typeface",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'freebie6',
            'taxonomy' => array(
                'category' => 'fonts,icons,mockups',
                'post_tag' => 'balinese-culture,chopper-bike,doctor-terawan,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1546424569068{padding-right: 15px !important;padding-left: 15px !important;}.vc_custom_1546424387300{padding-right: 15px !important;padding-left: 15px !important;}.vc_custom_1546423842286{padding-top: 20px !important;padding-right: 40px !important;padding-bottom: 20px !important;padding-left: 40px !important;}.vc_custom_1546424900451{margin-bottom: 20px !important;padding-top: 5px !important;padding-bottom: 5px !important;}.vc_custom_1546424924083{margin-bottom: 20px !important;}.vc_custom_1546424911229{margin-bottom: 20px !important;padding-top: 5px !important;padding-bottom: 5px !important;}',
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_midbar {border-bottom: 0;}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1546503073437{margin-top: -30px !important;margin-bottom: 40px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #def5fc !important;}.vc_custom_1546504392614{margin-top: 30px !important;margin-bottom: 0px !important;border-top-width: 1px !important;padding-top: 50px !important;border-top-color: #eeeeee !important;border-top-style: solid !important;}',
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_midbar {border-bottom: 0;}'
                ),
                '_wpb_post_custom_css' => '@media (max-width:766px){.jnews .btn-become-member{text-align:left!important;padding:20px 0 20px 0px!important}}'
            )
        ),
        'footer' => array(
            'title' => 'Footer',
            'content' => 'footer.txt',
            'post_type' => 'footer',
            'metabox' => array(
                '_elementor_data' => 'footer.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => ''
                ),
                '_wpb_shortcodes_custom_css' => '.vc_custom_1546426266128{padding-top: 90px !important;padding-bottom: 70px !important;background-color: #eff4ff !important;}.vc_custom_1546501881850{padding-top: 40px !important;padding-bottom: 40px !important;}.vc_custom_1546595162891{padding-top: 20px !important;padding-right: 20px !important;padding-bottom: 20px !important;padding-left: 20px !important;}.vc_custom_1546595168943{padding-top: 20px !important;padding-right: 20px !important;padding-bottom: 20px !important;padding-left: 20px !important;}',
                '_wpb_post_custom_css' => '@media (max-width:1024px){.jnews .hero-blue{margin-top:-30px!important;margin-bottom:20px!important;padding:40px 0 40px 0px!important}.jnews .hero-blue h2{font-size:24px!important}.jnews .hero-blue p{font-size:16px!important}}'
            )
        )

    ),


    // menu location
    'menu_location' => array(
        'main-navigation' => array(
            'title' => 'Main Navigation',
            'location' => 'navigation'
        ),
        'footer-navigation' => array(
	        'title' => 'Footer Navigation',
	        'location' => 'footer_navigation'
        ),
    ),

    // menu it self
    'menu' => array(

        // Main Menu
        'mockups' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Mockups',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:mockups:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_1',
                    'category' => '{{category:fashion:id}}',
                    'number' => 7
                ),
            )
        ),
        'fonts' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Fonts',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:fonts:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'illustrations' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Illustrations',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:illustrations:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'icons' => array(
	        'location' => 'main-navigation',
	        'menu-item-data' => array(
		        'menu-item-title' => 'Icons',
		        'menu-item-type' => 'taxonomy',
		        'menu-item-object' => 'category',
		        'menu-item-object-id' => '{{category:icons:id}}',
		        'menu-item-status' => 'publish'
	        )
        ),
        'ui-kits' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'UI-Kits',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:ui-kits:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'templates' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Templates',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:templates:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'layouts' => array(
	        'location' => 'main-navigation',
	        'menu-item-data' => array(
		        'menu-item-title' => 'Layouts',
		        'menu-item-type' => 'post_type',
		        'menu-item-object' => 'page',
		        'menu-item-object-id' => '{{post:home-1:id}}',
		        'menu-item-status' => 'publish'
	        )
        ),
        'homepage-layout-1' => array(
	        'location' => 'main-navigation',
	        'menu-item-data' => array(
                'menu-item-title' => 'Homepage Layout 1',
                'menu-item-parent-id' => '{{menu:layouts:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-1:id}}',
                'menu-item-status' => 'publish'
	        )
        ),
        'homepage-layout-2' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Homepage Layout 2',
                'menu-item-parent-id' => '{{menu:layouts:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-2:id}}',
                'menu-item-status' => 'publish'
            )
        ),

	    // Footer Menu
        'buy-jnews' => array(
	        'location' => 'footer-navigation',
	        'menu-item-data' => array(
		        'menu-item-title' => 'Buy JNews',
		        'menu-item-type' => 'custom',
		        'menu-item-url' => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
		        'menu-item-status' => 'publish'
	        )
        ),
        'home-1' => array(
	        'location' => 'footer-navigation',
	        'menu-item-data' => array(
		        'menu-item-title' => 'Home 1',
		        'menu-item-type' => 'post_type',
		        'menu-item-object' => 'page',
		        'menu-item-object-id' => '{{post:home-1:id}}',
		        'menu-item-status' => 'publish'
	        )
        ),
        'home-2' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Home 2',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-2:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'contact' => array(
	        'location' => 'footer-navigation',
	        'menu-item-data' => array(
		        'menu-item-title' => 'Contact',
		        'menu-item-type' => 'post_type',
		        'menu-item-object' => 'page',
		        'menu-item-object-id' => '{{post:contact:id}}',
		        'menu-item-status' => 'publish'
	        )
        ),
    ),

    'widget_position' => array(
        'contact',
    ),

    'widget' => array(
        'widget.json',
    ),

    'customizer' => array(
        'style.json',
    ),

    'plugin' => array(
        'jnews-essential',
        'jnews-gallery',
        'jnews-instagram',
        'jnews-jsonld',
        'jnews-meta-header',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-view-counter',
        'mailchimp-for-wp'
    )

);
