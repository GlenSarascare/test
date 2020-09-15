<?php

return array(
    
    // image
    'image' =>  array(
        'personalplanner1' => 'https://jegtheme.com/asset/jnews/demo/default/fashion1.jpg',
        'personalplanner2' => 'https://jegtheme.com/asset/jnews/demo/default/fashion2.jpg',
        'personalplanner3' => 'https://jegtheme.com/asset/jnews/demo/default/fashion3.jpg',
        'personalplanner4' => 'https://jegtheme.com/asset/jnews/demo/default/fashion4.jpg',
        'personalplanner5' => 'https://jegtheme.com/asset/jnews/demo/default/fashion5.jpg',
        'personalplanner6' => 'https://jegtheme.com/asset/jnews/demo/default/fashion6.jpg',
        'personalplanner7' => 'https://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
        'personalplanner8' => 'https://jegtheme.com/asset/jnews/demo/default/travel2.jpg',
        'personalplanner9' => 'https://jegtheme.com/asset/jnews/demo/default/travel3.jpg',
        'logo' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo@2x.png',
        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo@2x.png',
        'footer_logo' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo.png',
        'footer_logo2x' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo@2x.png',
        'sticky_logo' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo.png',
        'sticky_logo2x' => 'https://jegtheme.com/asset/jnews/demo/personalplanner/logo@2x.png',
        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',
        'ad_300x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png'
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'banking' =>
                array(
                    'title' =>'Banking',
                    'description' => 'You can add some category description here.'
                ),
            'insurance' =>
                array(
                    'title' =>'Insurance',
                    'description' => 'You can add some category description here.'
                ),
            'investing' =>
                array(
                    'title' =>'Investing',
                    'description' => 'You can add some category description here.'
                ),
            'retirement' =>
                array(
                    'title' =>'Retirement',
                    'description' => 'You can add some category description here.'
                ),
            'taxes' =>
                array(
                    'title' =>'Taxes',
                    'description' => 'You can add some category description here.'
                ),
        ),

        'post_tag' => array(
        )
    ),

    // post & page
    'post' => array(
        'best-tips-how-to-buy-a-family-home-without-the-stress' => array(
            'title' => "Best Tips: How to Buy a Family Home Without the Stress",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner1',
            'taxonomy' => array(
                'category' => 'banking,investing,retirement',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-to-prepare-your-money-for-the-coming-economic-slowdown' => array(
            'title' => "How to Prepare Your Money for the Coming Economic Slowdown",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner2',
            'taxonomy' => array(
                'category' => 'banking,insurance,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '4-reasons-why-you-should-read-your-bill-every-month' => array(
            'title' => "4 Reasons Why You Should Read Your Bill Every Month",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner3',
            'taxonomy' => array(
                'category' => 'banking,investing,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'should-you-stop-saving-and-investing-when-paying-off-debt' => array(
            'title' => "Should You Stop Saving and Investing When Paying Off Debt?",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner4',
            'taxonomy' => array(
                'category' => 'insurance,investing,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'study-wealthy-people-are-mean-entitled-and-narcissistic' => array(
            'title' => "Study: Wealthy People Are Mean, Entitled, and Narcissistic",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner5',
            'taxonomy' => array(
                'category' => 'insurance,investing,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'three-of-the-toughest-decisions-youll-face-in-retirement' => array(
            'title' => "Three of the Toughest Decisions You'll Face in Retirement",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner6',
            'taxonomy' => array(
                'category' => 'insurance,investing,retirement,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '5-surefire-ways-to-maintain-a-good-credit-score-in-retirement' => array(
            'title' => "5 Surefire Ways to Maintain a Good Credit Score in Retirement",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner7',
            'taxonomy' => array(
                'category' => 'investing,retirement,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '4-ways-to-find-income-while-waiting-for-full-retirement-age' => array(
            'title' => "4 Ways to Find Income While Waiting for Full Retirement Age",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner8',
            'taxonomy' => array(
                'category' => 'insurance,retirement,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'best-tips-how-much-you-should-spend-in-retirement' => array(
            'title' => "Best Tips: How Much You Should Spend in Retirement",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner9',
            'taxonomy' => array(
                'category' => 'investing,retirement,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-to-do-a-reconnaissance-trip-before-retiring-overseas' => array(
            'title' => "How to Do a Reconnaissance Trip Before Retiring Overseas",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner1',
            'taxonomy' => array(
                'category' => 'banking,retirement,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'heres-how-your-taxes-will-change-after-you-have-a-kid' => array(
            'title' => "Here's How Your Taxes Will Change After You Have a Kid",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner2',
            'taxonomy' => array(
                'category' => 'retirement,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'best-tips-things-you-can-learn-from-your-tax-return' => array(
            'title' => "Best Tips: Things You Can Learn From Your Tax Return",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner3',
            'taxonomy' => array(
                'category' => 'banking,insurance,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'what-you-need-to-know-about-canceled-debt-and-taxes' => array(
            'title' => "What You Need to Know About Canceled Debt and Taxes",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner4',
            'taxonomy' => array(
                'category' => 'banking,insurance,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '2017-federal-income-tax-brackets-and-marginal-rates' => array(
            'title' => "2017 Federal Income Tax Brackets and Marginal Rates",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner5',
            'taxonomy' => array(
                'category' => 'investing,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'would-you-rather-receive-a-refund-or-owe-more-taxes' => array(
            'title' => "Would You Rather Receive a Refund or Owe More Taxes?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner6',
            'taxonomy' => array(
                'category' => 'retirement,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '11-investing-tips-you-wish-could-tell-your-younger-self' => array(
            'title' => "11 Investing Tips You Wish Could Tell Your Younger Self",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner7',
            'taxonomy' => array(
                'category' => 'investing,retirement',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'the-easiest-way-to-invest-in-worlds-biggest-companies' => array(
            'title' => "The Easiest Way to Invest in World's Biggest Companies",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner8',
            'taxonomy' => array(
                'category' => 'insurance,investing',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'want-your-investments-better-stop-watching-the-news' => array(
            'title' => "Want Your Investments Better? Stop Watching the News",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner9',
            'taxonomy' => array(
                'category' => 'insurance,investing',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'the-secret-to-successful-investing-is-trusting-process' => array(
            'title' => "The Secret to Successful Investing Is Trusting Process",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner1',
            'taxonomy' => array(
                'category' => 'investing,retirement',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-an-exit-strategy-can-make-you-a-better-investor' => array(
            'title' => "How an Exit Strategy Can Make You a Better Investor",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner2',
            'taxonomy' => array(
                'category' => 'investing,retirement',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'a-new-bank-on-the-block-fee-free-banking-with-simple' => array(
            'title' => "A New Bank On The Block: Fee Free Banking with Simple",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner3',
            'taxonomy' => array(
                'category' => 'banking,investing',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'need-business-credit-build-your-personal-credit-first' => array(
            'title' => "Need Business Credit? Build Your Personal Credit First",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner4',
            'taxonomy' => array(
                'category' => 'banking,retirement',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'why-you-should-use-a-personal-loan-to-pay-down-debt' => array(
            'title' => "Why You Should Use a Personal Loan to Pay Down Debt",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner5',
            'taxonomy' => array(
                'category' => 'banking,investing',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'my-business-bank-accounts-checking-and-savings' => array(
            'title' => "My Business Bank Accounts: Checking and Savings",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner6',
            'taxonomy' => array(
                'category' => 'banking,insurance',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'a-new-bank-of-america-perk-free-museum-passes' => array(
            'title' => "A New Bank of America Perk: Free Museum Passes",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner7',
            'taxonomy' => array(
                'category' => 'banking,taxes',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '4-times-when-bundling-insurance-doesnt-make-sense' => array(
            'title' => "4 Times When Bundling Insurance Doesn't Make Sense",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner8',
            'taxonomy' => array(
                'category' => 'banking,insurance',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'best-tips-10-steps-to-financial-freedom-after-college' => array(
            'title' => "Best Tips: 10 Steps to Financial Freedom After College",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner9',
            'taxonomy' => array(
                'category' => 'insurance,investing',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'how-emergency-medical-coverage-could-save-your-vacation' => array(
            'title' => "How Emergency Medical Coverage Could Save Your Vacation",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner1',
            'taxonomy' => array(
                'category' => 'insurance,retirement',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        'affordable-health-insurance-tips-for-the-self-employed' => array(
            'title' => "Affordable Health Insurance Tips for the Self Employed",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner2',
            'taxonomy' => array(
                'category' => 'insurance,retirement',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),
        '8-rules-for-borrowing-money-from-friends-and-family' => array(
            'title' => "8 Rules for Borrowing Money From Friends and Family",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'personalplanner3',
            'taxonomy' => array(
                'category' => 'insurance,investing',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array()
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home',
            'content' => 'home.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1562204722366{border-radius: 1px !important;}.vc_custom_1562137282795{border-right-width: 1px !important;border-right-color: #eeeeee !important;border-right-style: solid !important;}.vc_custom_1562137313904{border-left-width: 1px !important;border-left-color: #eeeeee !important;border-left-style: solid !important;}.vc_custom_1562134479522{margin-top: -20px !important;}.vc_custom_1562134486127{margin-top: -20px !important;}.vc_custom_1562134495351{margin-top: -20px !important;}',
                '_wpb_post_custom_css' => '.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:18px;text-align:center}.jeg_postblock_23 .jeg_block_title{font-size:20px}.jeg_postblock_23 .jeg_post_excerpt{display:none}.jeg_postblock_23 .jeg_post_category{display:none}.jeg_postblock_23 .jeg_post_meta{text-align:center}.jeg_postblock_3 .jeg_pl_md_2{display:-webkit-flex;display:flex;align-items:center}.jeg_pl_md_3 .jeg_thumb,.jeg_postblock_3 .jeg_pl_md_2 .jeg_thumb{width:70%;flex:1 0 50%}.jeg_pl_md_3 .jeg_post_title,.jeg_postblock_3 .jeg_pl_md_2 .jeg_post_title{font-size:18px;text-align:center}.jeg_postblock_3 .jeg_post_excerpt{display:none}.jeg_postblock_3 .jeg_post_meta{text-align:center}.jeg_postblock_5 .jeg_pl_lg_2{display:-webkit-flex;display:flex;align-items:center}.jeg_postblock_5 .jeg_postblock_content{text-align:center}.jeg_postblock_5 .jeg_post_excerpt{display:none}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:65%;flex:1 0 65%}.jeg_sidebar .mc4wp-form{background:0 0;border:6px solid #dcd7e0;padding:25px}@media only screen and (min-width:1200px){.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:28px}.jeg_sidebar .mc4wp-form h3{font-size:24px}.jeg_sidebar .mc4wp-form{padding:32px 35px}}@media only screen and (max-width:768px){.jeg_pl_lg_3 .jeg_post_title,.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{margin-top:50px}.jeg_pl_md_3 .jeg_post_title,.jeg_postblock_3 .jeg_pl_md_2 .jeg_post_title{margin-top:0;font-size:16px}}@media only screen and (max-width:480px){.jeg_pl_lg_3 .jeg_thumb,.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:40%}.jeg_pl_lg_3 .jeg_post_title,.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{margin-top:0}.jeg_pl_md_3 .jeg_post_title,.jeg_postblock_3 .jeg_pl_md_2 .jeg_post_title{margin-top:0;font-size:14px;font-weight:700}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => '',
                    'second_title' => '',
                    'header_type' => 'heading_6',
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module'    => '9',
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
                    'sort_by' => 'latest',
                ),
                '_elementor_data' => 'home.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '.jeg_postblock_23 .jeg_pl_md_1 .jeg_post_title{font-size:18px;text-align:center}.jeg_postblock_23 .jeg_block_title{font-size:20px}.jeg_postblock_23 .jeg_post_excerpt{display:none}.jeg_postblock_23 .jeg_post_category{display:none}.jeg_postblock_23 .jeg_post_meta{text-align:center}.jeg_postblock_3 .jeg_pl_md_2{display:-webkit-flex;display:flex;align-items:center}.jeg_pl_md_3 .jeg_thumb,.jeg_postblock_3 .jeg_pl_md_2 .jeg_thumb{width:70%;flex:1 0 50%}.jeg_pl_md_3 .jeg_post_title,.jeg_postblock_3 .jeg_pl_md_2 .jeg_post_title{font-size:18px;text-align:center}.jeg_postblock_3 .jeg_post_excerpt{display:none}.jeg_postblock_3 .jeg_post_meta{text-align:center}.jeg_postblock_5 .jeg_pl_lg_2{display:-webkit-flex;display:flex;align-items:center}.jeg_postblock_5 .jeg_postblock_content{text-align:center}.jeg_postblock_5 .jeg_post_excerpt{display:none}.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:65%;flex:1 0 65%}.jeg_sidebar .mc4wp-form{background:0 0;border:6px solid #dcd7e0;padding:25px}@media only screen and (min-width:1200px){.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{font-size:28px}.jeg_sidebar .mc4wp-form h3{font-size:24px}.jeg_sidebar .mc4wp-form{padding:32px 35px}}@media only screen and (max-width:768px){.jeg_pl_lg_3 .jeg_post_title,.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{margin-top:50px}.jeg_pl_md_3 .jeg_post_title,.jeg_postblock_3 .jeg_pl_md_2 .jeg_post_title{margin-top:0;font-size:16px}}@media only screen and (max-width:480px){.jeg_pl_lg_3 .jeg_thumb,.jeg_postblock_5 .jeg_pl_lg_2 .jeg_thumb{width:40%}.jeg_pl_lg_3 .jeg_post_title,.jeg_postblock_5 .jeg_pl_lg_2 .jeg_post_title{margin-top:0}.jeg_pl_md_3 .jeg_post_title,.jeg_postblock_3 .jeg_pl_md_2 .jeg_post_title{margin-top:0;font-size:14px;font-weight:700}}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1562204722366{border-radius: 1px !important;}.vc_custom_1562137282795{border-right-width: 1px !important;border-right-color: #eeeeee !important;border-right-style: solid !important;}.vc_custom_1562137313904{border-left-width: 1px !important;border-left-color: #eeeeee !important;border-left-style: solid !important;}',
                '_wpb_post_custom_css' => '@media only screen and (min-width:1200px){.jeg_main_content .mc4wp-form{padding:35px}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => '',
                    'second_title' => '',
                    'header_type' => 'heading_6',
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'module'    => '27',
                    'excerpt_length' => '50',
                    'content_date' => 'default',
                    'date_custom' => 'Y/m/d',
                    'content_pagination' => 'nav_1',
                    'pagination_align' => 'center',
                    'show_navtext' => '0',
                    'show_pageinfo' => '0',
                    'post_offset' => '0',
                    'posts_per_page' => '6',
                    'sort_by' => 'latest',
                ),
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
	                'custom_css' => '@media only screen and (min-width:1200px){.jeg_main_content .mc4wp-form{padding:35px}}'
                )
            )
        ),
        'home-3' => array(
            'title' => 'Home 3',
            'content' => 'home3.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1562204722366{border-radius: 1px !important;}.vc_custom_1562204722366{border-radius: 1px !important;}.vc_custom_1562137282795{border-right-width: 1px !important;border-right-color: #eeeeee !important;border-right-style: solid !important;}.vc_custom_1562137313904{border-left-width: 1px !important;border-left-color: #eeeeee !important;border-left-style: solid !important;}.vc_custom_1562555765333{border-right-width: 1px !important;border-right-color: #eeeeee !important;border-right-style: solid !important;border-radius: 1px !important;}.vc_custom_1562555794548{border-right-width: 1px !important;border-right-color: #eeeeee !important;border-right-style: solid !important;border-radius: 1px !important;}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '0',
                    'first_title' => '',
                    'second_title' => '',
                    'header_type' => 'heading_6',
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'module'    => '27',
                    'excerpt_length' => '20',
                    'content_date' => 'default',
                    'date_custom' => 'Y/m/d',
                    'content_pagination' => 'nav_1',
                    'pagination_align' => 'center',
                    'show_navtext' => '0',
                    'show_pageinfo' => '0',
                    'post_offset' => '0',
                    'posts_per_page' => '6',
                    'sort_by' => 'latest',
                ),
                '_elementor_data' => 'home3.json',
                '_elementor_edit_mode' => 'builder',
            )
        )
    ),

    // menu location
    'menu_location' => array(
        'main-navigation' => array(
            'title' => 'Main Navigation',
            'location' => 'main-navigation'
        ),
        'footer-navigation' => array(
            'title' => 'Footer Navigation',
            'location' => 'main-navigation'
        ),
        'mobile-navigation' => array(
            'title' => 'Mobile Navigation',
            'location' => 'mobile_navigation'
        )
    ),

    // menu it self
    'menu' => array(

        // Main Menu
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
        'banking' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Banking',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:banking:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'investing' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Investing',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:investing:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'insurance' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Insurance',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:insurance:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'retirement' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Retirement',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:retirement:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'taxes' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Taxes',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:taxes:id}}',
                'menu-item-status' => 'publish'
            )
        ),

        // Mobile Menu
        'home-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Home',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-1:id}}',
                'menu-item-status' => 'publish'
            )
        ),
            'home-mobile-1' => array(
                'location' => 'mobile-navigation',
                'menu-item-data' => array(
                    'menu-item-title' => 'Home - Layout 1',
                    'menu-item-parent-id' => '{{menu:home:id}}',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => '{{post:home-1:id}}',
                    'menu-item-status' => 'publish'
                )
            ),
            'home-mobile-2' => array(
                'location' => 'mobile-navigation',
                'menu-item-data' => array(
                    'menu-item-title' => 'Home - Layout 2',
                    'menu-item-parent-id' => '{{menu:home:id}}',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => '{{post:home-2:id}}',
                    'menu-item-status' => 'publish'
                )
            ),
            'home-mobile-3' => array(
                'location' => 'mobile-navigation',
                'menu-item-data' => array(
                    'menu-item-title' => 'Home - Layout 3',
                    'menu-item-parent-id' => '{{menu:home:id}}',
                    'menu-item-type' => 'post_type',
                    'menu-item-object' => 'page',
                    'menu-item-object-id' => '{{post:home-3:id}}',
                    'menu-item-status' => 'publish'
                )
            ),
        'banking-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Banking',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:banking:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'investing-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Investing',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:investing:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'insurance-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Insurance',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:insurance:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'retirement-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Retirement',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:retirement:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'taxes-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Taxes',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:taxes:id}}',
                'menu-item-status' => 'publish'
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
        'jnews-like',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-split',
        'jnews-view-counter',
        'mailchimp-for-wp'
    )

);
