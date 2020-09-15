<?php

return array(

    // image
    'image' => array(
        'news1' => 'https://jegtheme.com/asset/jnews/demo/default/news1.jpg',
        'news2' => 'https://jegtheme.com/asset/jnews/demo/default/news2.jpg',
        'news3' => 'https://jegtheme.com/asset/jnews/demo/default/news3.jpg',
        'news4' => 'https://jegtheme.com/asset/jnews/demo/default/news4.jpg',
        'news5' => 'https://jegtheme.com/asset/jnews/demo/default/news5.jpg',
        'news6' => 'https://jegtheme.com/asset/jnews/demo/default/news6.jpg',
        'news7' => 'https://jegtheme.com/asset/jnews/demo/default/news7.jpg',
        'news8' => 'https://jegtheme.com/asset/jnews/demo/default/news8.jpg',
        'news9' => 'https://jegtheme.com/asset/jnews/demo/default/news9.jpg',
        'news10' => 'https://jegtheme.com/asset/jnews/demo/default/news10.jpg',

        'logo' => 'https://jegtheme.com/asset/jnews/demo/reportase/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/reportase/logo@2x.png',
        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/reportase/logo_mobile.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/reportase/logo_mobile@2x.png',

        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',

        'ad_300x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png'
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'business' =>
                array(
                    'title' => 'Business',
                    'description' => 'You can add some category description here.'
                ),
            'entertainment' =>
                array(
                    'title' => 'Entertainment',
                    'description' => 'You can add some category description here.'
                ),
            'lifestyle' =>
                array(
                    'title' => 'Lifestyle',
                    'description' => 'You can add some category description here.'
                ),
            'fashion' =>
                array(
                    'title' => 'Fashion',
                    'description' => 'You can add some category description here.',
                    'parent' => 'lifestyle'
                ),
            'food' =>
                array(
                    'title' => 'food',
                    'description' => 'You can add some category description here.',
                    'parent' => 'lifestyle'
                ),
            'health' =>
                array(
                    'title' => 'Health',
                    'description' => 'You can add some category description here.',
                    'parent' => 'lifestyle'
                ),
            'travel' =>
                array(
                    'title' => 'Travel',
                    'description' => 'You can add some category description here.',
                    'parent' => 'lifestyle'
                ),
            'national' =>
                array(
                    'title' => 'National',
                    'description' => 'You can add some category description here.'
                ),
            'opinion' =>
                array(
                    'title' => 'Opinion',
                    'description' => 'You can add some category description here.'
                ),
            'politics' =>
                array(
                    'title' => 'Politics',
                    'description' => 'You can add some category description here.'
                ),
            'science' =>
                array(
                    'title' => 'Science',
                    'description' => 'You can add some category description here.'
                ),
            'sports' =>
                array(
                    'title' => 'Sports',
                    'description' => 'You can add some category description here.'
                ),
            'tech' =>
                array(
                    'title' => 'Tech',
                    'description' => 'You can add some category description here.'
                ),
            'world' =>
                array(
                    'title' => 'World',
                    'description' => 'You can add some category description here.'
                ),

        ),
        'post_tag' => array(
            'afc-championship' => array(
                'title' => 'AFC Championship'
            ),
            'climate-change' => array(
                'title' => 'Climate Change'
            ),
            'commentary' => array(
                'title' => 'Commentary'
            ),
            'crime' => array(
                'title' => 'Crime'
            ),
            'editorial' => array(
                'title' => 'Editorial'
            ),
            'event' => array(
                'title' => 'Event'
            ),
            'golden-globes' => array(
                'title' => 'Golden globes'
            ),
            'jt-610-crash' => array(
                'title' => 'JT 610 Crash'
            ),
            'live-report' => array(
                'title' => 'Live Report'
            ),
            'palu-quake' => array(
                'title' => 'Palu Quake'
            ),
            'post-script' => array(
                'title' => 'Post Script'
            ),
            'presidential-election' => array(
                'title' => 'Presidential Election'
            ),
        )
    ),

    // post & page
    'post' => array(
        'estimated-cost-of-central-sulawesi-disaster-reaches-nearly-1b' => array(
            'title' => "Estimated cost of Central  Sulawesi disaster reaches nearly $1B",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'national',
                'post_tag' => 'crime,editorial,event,jt-610-crash'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:national:id}}')
            )
        ),
        'philippines-to-cancel-landings-1-5b-casino-project' => array(
            'title' => "Philippines to cancel Landing's $1.5B casino project",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'business,world',
                'post_tag' => 'climate-change,event,jt-610-crash,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:business:id}}')
            )
        ),
        'smelter-grade-alumina-production-reaches-2-million-tons-local-firm' => array(
            'title' => "Smelter-grade alumina production reaches 2 million tons: Local firm",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'business,national',
                'post_tag' => 'climate-change,commentary,golden-globes,live-report'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'government-introduces-new-rules-for-public-university-admission' => array(
            'title' => "Government introduces new rules for public university admission",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'business,national,politics',
                'post_tag' => 'golden-globes,jt-610-crash,live-report,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'the-deadpool-creator-liefeld-praises-the-night-comes-for-us' => array(
            'title' => "The 'Deadpool' creator Liefeld praises \"The Night Comes for Us\"",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,opinion,travel',
                'post_tag' => 'crime,event,golden-globes,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:opinion:id}}')
            )
        ),
        'unilever-to-continue-producing-teabags-after-sariwangi-bankrupt' => array(
            'title' => "Unilever to continue producing teabags after Sariwangi bankrupt",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'business,fashion,lifestyle,politics,travel',
                'post_tag' => 'event,golden-globes,palu-quake,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'palembang-to-inaugurate-quake-proof-bridge-next-month' => array(
            'title' => "Palembang to inaugurate quake-proof bridge next month",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'health,national,opinion,politics',
                'post_tag' => 'afc-championship,climate-change,editorial,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:national:id}}'),
                'post_subtitle' => 'Victory has a thousand fathers, but defeat is an orphan.'
            )
        ),
        'agrarian-ministry-distributes-6-2m-land-certificates' => array(
            'title' => "Agrarian Ministry distributes 6.2m land certificates",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'lifestyle,national,politics,travel,world',
                'post_tag' => 'climate-change,crime,live-report,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:national:id}}'),
                'post_subtitle' => 'The best way to pay for a lovely moment is to enjoy it.',
                'jnews_single_post' => array(
                    'override_template' => '1',
                    'override' => array(
                        array(
                            'template' => '5',
                            'single_blog_custom' => '',
                            'parallax' => '1',
                            'fullscreen' => '0',
                            'layout' => 'right-sidebar',
                            'sidebar' => 'default-sidebar',
                            'second_sidebar' => 'default-sidebar',
                            'sticky_sidebar' => '1',
                            'share_position' => 'topbottom',
                            'share_float_style' => 'share-monocrhome',
                            'show_share_counter' => '1',
                            'show_view_counter' => '1',
                            'show_featured' => '1',
                            'show_post_meta' => '1',
                            'show_post_author' => '1',
                            'show_post_author_image' => '1',
                            'show_post_date' => '1',
                            'post_date_format' => 'default',
                            'post_date_format_custom' => 'Y/m/d',
                            'show_post_category' => '0',
                            'show_post_tag' => '1',
                            'show_prev_next_post' => '0',
                            'show_popup_post' => '1',
                            'number_popup_post' => '2',
                            'show_author_box' => '1',
                            'show_post_related' => '1',
                            'show_inline_post_related' => '1',
                        )
                    )
                )
            )
        ),
        'renegotiations-for-jet-fighter-project-aim-to-ease-burden-on-state-budget' => array(
            'title' => "Renegotiations for jet fighter project aim to ease burden on state budget",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'business,politics',
                'post_tag' => 'afc-championship,climate-change,event,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'police-to-deploy-more-than-5800-personnel-for-imf-world' => array(
            'title' => "Police to deploy more than 5,800 personnel for IMF-World",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'national,science,tech',
                'post_tag' => 'afc-championship,commentary,editorial,golden-globes'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:national:id}}')
            )
        ),
        'west-java-to-review-meykardah-project-amid-alleged-bribery-case' => array(
            'title' => "West Java to review Meykardah project amid alleged bribery case",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'business,science,tech',
                'post_tag' => 'afc-championship,golden-globes,live-report,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tech:id}}'),
                'post_subtitle' => 'The best way to pay for a lovely moment is to enjoy it.'
            )
        ),
        'government-targets-16-6-tax-revenue-growth-in-2019' => array(
            'title' => "Government targets 16.6% tax revenue growth in 2019",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'health,politics,science',
                'post_tag' => 'editorial,event,golden-globes,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Meanwhile, it has set a 12.11 percent tax-to-gross domestic product (GDP) ratio.'
            )
        ),
        'bill-gates-iconic-donkey-game-arrives-on-iphone-apple-watch' => array(
            'title' => "Bill Gates' iconic donkey game arrives on iPhone, Apple Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'business,entertainment,tech',
                'post_tag' => 'climate-change,commentary,editorial,live-report'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tech:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'indonesias-largest-fleet-of-taxis-teams-up-to-beat-ride-hailing-apps' => array(
            'title' => "Indonesia's Largest Fleet Of Taxis Teams Up To Beat Ride-hailing Apps",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'business,lifestyle,national,tech,travel',
                'post_tag' => 'climate-change,editorial,live-report,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:business:id}}')
            )
        ),
        'minister-susi-declares-ship-sinking-policy-success' => array(
            'title' => "Minister Susi declares ship-sinking policy success",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'business,national,politics,tech',
                'post_tag' => 'afc-championship,editorial,golden-globes,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'finland-has-an-education-system-the-other-country-should-learn-from' => array(
            'title' => "Finland Has An Education System The Other Country Should Learn From",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'business,national,science',
                'post_tag' => 'commentary,crime,jt-610-crash,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:science:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'blackpinks-jennie-announces-release-date-of-solo-debut' => array(
            'title' => "BLACKPINK’s Jennie announces release date of solo debut",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,lifestyle,opinion',
                'post_tag' => 'crime,editorial,golden-globes,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:business:id}}'),
                'jnews_single_post' => array(
                    'override_template' => '1',
                    'override' => array(
                        array(
                            'template' => '5',
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
                            'show_featured' => '1',
                            'show_post_meta' => '1',
                            'show_post_author' => '1',
                            'show_post_author_image' => '1',
                            'show_post_date' => '1',
                            'post_date_format' => 'default',
                            'post_date_format_custom' => 'Y/m/d',
                            'show_post_category' => '0',
                            'show_post_tag' => '1',
                            'show_prev_next_post' => '1',
                            'show_popup_post' => '1',
                            'number_popup_post' => '2',
                            'show_author_box' => '1',
                            'show_post_related' => '1',
                            'show_inline_post_related' => '1',
                        )
                    )
                )
            )
        ),
        'seven-workouts-scientifically-proven-to-burn-the-most-calories' => array(
            'title' => "Seven workouts scientifically proven to burn the most calories",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'health,lifestyle,sports',
                'post_tag' => 'climate-change,commentary,crime,golden-globes'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:sports:id}}'),
                'post_subtitle' => 'Victory has a thousand fathers, but defeat is an orphan.'
            )
        ),
        'instagram-is-testing-photo-albums-because-nothing-is-sacred-anymore' => array(
            'title' => "Uber's Turbulent Week: Kalanick Out, New Twist In Google Lawsuit",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'business,science,tech,travel',
                'post_tag' => 'afc-championship,jt-610-crash,palu-quake,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:business:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'johann-gutenberg-faces-tough-questions-during-news-conference' => array(
            'title' => "Johann Gutenberg faces tough questions during news conference",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'business,health,opinion,politics',
                'post_tag' => 'climate-change,commentary,crime,jt-610-crash'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'alibaba-introduces-cashier-less-offline-retail-concept' => array(
            'title' => "Alibaba introduces cashier-less offline retail concept",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'lifestyle,travel,world',
                'post_tag' => 'event,jt-610-crash,live-report,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:lifestyle:id}}'),
                'post_subtitle' => 'Alibaba’s cashier-less convenience store is another high-tech attempt to shape the future of offline retail.'
            )
        ),
        'hail-a-ride-hands-free-apple-opens-siri-to-outside-developers' => array(
            'title' => "Hail a Ride Hands-Free: Apple Opens Siri to Outside Developers",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,lifestyle,science,tech',
                'post_tag' => 'afc-championship,crime,jt-610-crash,live-report'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tech:id}}')
            )
        ),
        'classic-green-juice-that-can-help-your-skin-heal-more-quickly' => array(
            'title' => "Classic green juice that can help your skin heal more quickly",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'food,health,lifestyle,science',
                'post_tag' => 'climate-change,editorial,jt-610-crash,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),
        'mount-rinjani-to-be-closed-following-the-lombok-earthquake' => array(
            'title' => "Mount Rinjani to be closed following the Lombok earthquake",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'entertainment,lifestyle,national,sports',
                'post_tag' => 'editorial,golden-globes,palu-quake,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:travel:id}}'),
                'post_subtitle' => 'Self-belief and hard work will always earn you success.'
            )
        ),
        'new-zealand-man-goes-missing-during-mount-merbabu-hike' => array(
            'title' => "New Zealand man goes missing during Mount Merbabu hike",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'politics,science,world',
                'post_tag' => 'climate-change,crime,editorial,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:world:id}}'),
                'post_subtitle' => 'The best way to pay for a lovely moment is to enjoy it.'
            )
        ),
        'five-fintech-sectors-expected-to-grow-fast-in-next-five-years' => array(
            'title' => "Five fintech sectors expected to grow fast in next five years",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'business,health,science,world',
                'post_tag' => 'afc-championship,editorial,jt-610-crash,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:business:id}}')
            )
        ),
        'here-are-10-of-the-most-populated-cities-in-the-world' => array(
            'title' => "Here are 10 of the most populated cities in the world",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'national,politics,travel',
                'post_tag' => 'commentary,crime,jt-610-crash,live-report'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:national:id}}')
            )
        ),
        'asian-games-two-indonesian-skateboarders-secure-ticket-to-final' => array(
            'title' => "Asian Games: Two Indonesian skateboarders secure ticket to final",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'health,sports',
                'post_tag' => 'commentary,crime,editorial,live-report'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:sports:id}}'),
                'post_subtitle' => 'Self-belief and hard work will always earn you success.'
            )
        ),
        'cafe-in-north-jakarta-introduces-an-unique-birthday-cake' => array(
            'title' => "Cafe in North Jakarta introduces an unique birthday cake",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'business,food,health,lifestyle',
                'post_tag' => 'event,jt-610-crash,palu-quake,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),
        'romantic-or-casual-8-restaurants-to-celebrate-valentines' => array(
            'title' => "Romantic or casual, 8 restaurants to celebrate Valentine's",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'food,lifestyle,travel',
                'post_tag' => 'afc-championship,climate-change,event,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),
        'bank-indonesia-to-issue-cross-border-qr-code-payment-regulation' => array(
            'title' => "Bank Indonesia to issue cross-border QR code payment regulation",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'business,food,opinion,tech,world',
                'post_tag' => 'commentary,editorial,event,jt-610-crash'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:world:id}}')
            )
        ),
        'meet-indonesias-first-female-longboard-surfer-elly-whittaker' => array(
            'title' => "Meet Indonesia's first female longboard surfer: Elly Whittaker",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'national,sports',
                'post_tag' => 'afc-championship,climate-change,editorial,jt-610-crash'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:sports:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'bantar-gebang-residents-ask-for-increase-in-smelly-money' => array(
            'title' => "Bantar Gebang residents ask for increase in 'smelly money'",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'entertainment,lifestyle,opinion,tech',
                'post_tag' => 'commentary,crime,editorial,event'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:opinion:id}}')
            )
        ),
        'baking-industry-growth-set-to-rise-on-more-stable-economy' => array(
            'title' => "Baking industry growth set to rise on more stable economy",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'business,entertainment,food,lifestyle',
                'post_tag' => 'climate-change,event,live-report,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),
        'two-golds-one-bronze-from-indonesian-downhill-cyclists' => array(
            'title' => "Two golds, one bronze from Indonesian downhill cyclists",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'national,sports',
                'post_tag' => 'afc-championship,editorial,golden-globes,live-report'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:sports:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'first-ever-auction-of-ai-created-artwork-set-for-christies-gavel' => array(
            'title' => "First-ever auction of AI-created artwork set for Christie's gavel",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'sports,tech',
                'post_tag' => 'commentary,live-report,palu-quake,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:sports:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'indonesian-archers-collect-silver-and-bronze-at-asian-games' => array(
            'title' => "Indonesian archers collect silver and bronze at Asian Games",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'national,sports',
                'post_tag' => 'commentary,crime,jt-610-crash,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:sports:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'the-chainsmokers-actually-make-a-great-nickelback-cover-band' => array(
            'title' => "The Chainsmokers Actually Make a Great Nickelback Cover Band",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,health,lifestyle,opinion,science',
                'post_tag' => 'climate-change,event,live-report,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:opinion:id}}')
            )
        ),
        'nike-invented-self-lacing-sneakers-because-the-future-is-now' => array(
            'title' => "Nike Invented Self-Lacing Sneakers Because the Future Is Now",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'fashion,lifestyle,sports',
                'post_tag' => 'commentary,crime,editorial,event'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:fashion:id}}')
            )
        ),
        'man-blows-himself-up-on-empty-belgium-football-field' => array(
            'title' => "Man Blows Himself Up On Empty Belgium Football Field",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,health,lifestyle,sports',
                'post_tag' => 'golden-globes,jt-610-crash,live-report,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:sports:id}}'),
                'post_subtitle' => 'Victory has a thousand fathers, but defeat is an orphan.'
            )
        ),
        'j-k-rowling-is-shutting-down-readers-who-burned-all-their-harry-potter-books' => array(
            'title' => "Japan probe finds more universities discriminated against women",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'fashion,lifestyle,science,travel,world',
                'post_tag' => 'afc-championship,editorial,golden-globes,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:world:id}}')
            )
        ),
        'jack-ma-confirmed-as-chinese-communist-party-member' => array(
            'title' => "Jack Ma confirmed as Chinese communist party member",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'politics,world',
                'post_tag' => 'afc-championship,crime,event,jt-610-crash'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:travel:id}}')
            )
        ),
        'why-do-some-holidaymakers-like-to-dress-to-impress' => array(
            'title' => "Why do some holidaymakers like to dress to impress?",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'health,lifestyle,science,travel,world',
                'post_tag' => 'afc-championship,climate-change,commentary,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:lifestyle:id}}')
            )
        ),
        '28-drown-in-india-bus-crash-many-of-them-children' => array(
            'title' => "28 drown in India bus crash, many of them children",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'national,opinion,sports,tech,world',
                'post_tag' => 'afc-championship,crime,jt-610-crash,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:world:id}}')
            )
        ),
        'no-smartphones-by-the-river-pool-ayana-resort-bali' => array(
            'title' => "No smartphones by the River Pool: Ayana Resort Bali",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'lifestyle,travel,world',
                'post_tag' => 'afc-championship,climate-change,event,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:travel:id}}')
            )
        ),
        'in-a-hurry-try-this-wrapped-food-for-lunch-while-you-on-the-go' => array(
            'title' => "In a hurry? Try this wrapped food for lunch while you on the go",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'food,health,lifestyle,travel',
                'post_tag' => 'climate-change,editorial,golden-globes,live-report'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),
        'expert-tips-important-tips-to-improve-your-breakfast-routine' => array(
            'title' => "Expert Tips: Important tips to improve your breakfast routine",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'entertainment,food,health,lifestyle',
                'post_tag' => 'climate-change,golden-globes,post-script,presidential-election'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),
        'satay-western-marlina-the-murderer-to-represent-indonesia-at-the-oscars' => array(
            'title' => "Satay Western 'Marlina the Murderer' to represent Indonesia at the Oscars",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'entertainment,opinion,science',
                'post_tag' => 'afc-championship,crime,event,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:opinion:id}}')
            )
        ),
        'britain-goes-wild-for-burgundy-wine-served-at-royal-wedding' => array(
            'title' => "Britain goes wild for Burgundy wine served at royal wedding",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'food,health,lifestyle,national',
                'post_tag' => 'commentary,golden-globes,jt-610-crash,post-script'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),
        'oka-antara-plays-police-detective-in-new-crime-series-brata' => array(
            'title' => "Oka Antara plays police detective in new crime series 'Brata'",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,lifestyle,opinion,travel',
                'post_tag' => 'climate-change,crime,event,palu-quake'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:opinion:id}}')
            )
        ),
        'superstar-pastry-chefs-food-porn-has-instagram-drooling' => array(
            'title' => "Superstar pastry chef's 'food porn' has Instagram drooling",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'business,food,health,lifestyle,national',
                'post_tag' => 'afc-championship,climate-change,commentary,golden-globes'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:food:id}}')
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1540539458806{margin-bottom: 30px !important;}.vc_custom_1540538055519{margin-bottom: 0px !important;}.vc_custom_1543387512241{padding-top: 15px !important;padding-right: 15px !important;padding-bottom: 15px !important;padding-left: 15px !important;background-color: #f5f5f5 !important;}.vc_custom_1540535315762{border-top-width: 4px !important;background-color: #fdfceb !important;border-top-color: #005a75 !important;border-top-style: solid !important;}.vc_custom_1540537976701{margin-bottom: 20px !important;}.vc_custom_1543371966919{margin-bottom: 10px !important;}',
                '_wpb_post_custom_css' => '.jeg_postblock_carousel_3 .jeg_post_meta{display:none}.jeg_postblock_15 .jeg_post_title{font-weight:700}.jeg_postblock_15 .jeg_post_meta{display:none}.jeg_main_content .mc4wp-form{border:0!important}.jeg-heading{position:relative;z-index:1}@media only screen and (max-width:1023px) and (min-width:768px){.jeg_pl_xs_4 .jeg_post_title{font-size:11px}}',
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_postblock_carousel_3 .jeg_post_meta{display:none}.jeg_postblock_15 .jeg_post_title{font-weight:700}.jeg_postblock_15 .jeg_post_meta{display:none}.jeg_main_content .mc4wp-form{border:0!important}.jeg-heading{position:relative;z-index:1}@media only screen and (max-width:1023px) and (min-width:768px){.jeg_pl_xs_4 .jeg_post_title{font-size:11px}}'
                )
            ),
        ),

        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1534241447028{margin-bottom: 30px !important;}.vc_custom_1539682333948{padding-top: 40px !important;padding-bottom: 40px !important;}',
                '_wpb_post_custom_css' => '.jeg_postblock_16 .jeg_pl_lg_5 .jeg_post_title{font-size:34px;margin-top:20px}.jeg_postblock_16 .jeg_post_excerpt{font-size:15px}.jeg_postblock_16 .jeg_readmore{display:none}.jeg_postblock_15 .jeg_post_title{font-weight:700}.jeg_postblock_15 .jeg_post_meta{display:none}@media only screen and (min-width:668px){.jeg_breakingnews_title .fa{display:none}.jeg_breakingnews_title{padding:0 15px}}.vc_btn3.vc_btn3-style-custom{background-image:none!important;padding-left:30px!important;padding-right:30px!important;font-size:13px;font-weight:700;margin-top:10px}',
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_postblock_16 .jeg_pl_lg_5 .jeg_post_title{font-size:34px;margin-top:20px}.jeg_postblock_16 .jeg_post_excerpt{font-size:15px}.jeg_postblock_16 .jeg_readmore{display:none}.jeg_postblock_15 .jeg_post_title{font-weight:700}.jeg_postblock_15 .jeg_post_meta{display:none}@media only screen and (min-width:668px){.jeg_breakingnews_title .fa{display:none}.jeg_breakingnews_title{padding:0 15px}}.vc_btn3.vc_btn3-style-custom{background-image:none!important;padding-left:30px!important;padding-right:30px!important;font-size:13px;font-weight:700;margin-top:10px}'
                )
            )
        ),

        'contact' => array(
            'title' => 'Contact',
            'content' => 'contact.txt',
            'post_type' => 'page',
            'metabox' => array(
                'jnews_single_page' => array(
                    'layout' => 'no-sidebar',
                )
            ),
        ),
    ),

    // menu location
    'menu_location' => array(
        'main-navigation' => array(
            'title' => 'Main Navigation',
            'location' => 'navigation'
        ),
        'mobile-navigation' => array(
            'title' => 'Mobile Navigation',
            'location' => 'mobile_navigation'
        ),
        'footer-navigation' => array(
            'title' => 'Footer Navigation',
            'location' => 'footer_navigation'
        ),
    ),

    // menu it self
    'menu' => array(

        // Main Menu
        'world' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'World',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:world:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'opinion' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Opinion',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:opinion:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'national' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'National',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:national:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'politics' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Politics',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:politics:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'business' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Business',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:business:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'science' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Science',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:science:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'entertainment' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Entertainment',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:entertainment:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_1',
                    'category' => '{{category:entertainment:id}}',
                    'number' => 10,
                    'trending_tag' => '{{taxonomy:post_tag:golden-globes:id}},{{taxonomy:post_tag:mr-robot:id}},{{taxonomy:post_tag:motogp-2017:id}},{{taxonomy:post_tag:climate-change:id}},{{taxonomy:post_tag:flat-earth:id}}',
                ),
            )
        ),
        'lifestyle' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Lifestyle',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:lifestyle:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_2',
                    'category' => '{{category:lifestyle:id}}',
                    'number' => 10,
                    'trending_tag' => '{{taxonomy:post_tag:golden-globes:id}},{{taxonomy:post_tag:mr-robot:id}},{{taxonomy:post_tag:motogp-2017:id}},{{taxonomy:post_tag:climate-change:id}},{{taxonomy:post_tag:flat-earth:id}}',
                ),
            )
        ),

        // Footer & Topbar Menu
        'landing-page' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Landing Page',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'all-features' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'All Features',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#styleeditor',
                'menu-item-status' => 'publish'
            )
        ),
        'get-jnews' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Get JNews',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'http://bit.ly/get-jnews',
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


        // Mobile Menu
        'home-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Homepages',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-1:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'homepage-layout-1' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Homepage Layout 1',
                'menu-item-parent-id' => '{{menu:home-mobile:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-1:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'homepage-layout-2' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Homepage Layout 2',
                'menu-item-parent-id' => '{{menu:home-mobile:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-2:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'politics-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Politics',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:politics:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'world-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'World',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:world:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'business-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Business',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:business:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'science-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Science',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:science:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'national-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'National',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:national:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'entertainment-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Entertainment',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:entertainment:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'sports-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Sports',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:sports:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'fashion-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Fashion',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:fashion:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'lifestyle-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Lifestyle',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:lifestyle:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'travel-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Travel',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:travel:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'tech-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Tech',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:tech:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'health-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Health',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:health:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'food-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Food',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:food:id}}',
                'menu-item-status' => 'publish'
            )
        )

    ),

    'widget_position' => array(
        'Archive Left',
        'Archive Right'
    ),

    'widget' => array(
        'widget.json',
    ),

    'customizer' => array(
        'style.json',
    ),

    'plugin' => array(
        'contact-form-7',
        'jnews-breadcrumb',
        'jnews-gallery',
        'jnews-jsonld',
        'jnews-meta-header',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-split',
        'jnews-view-counter',
        'jnews-weather',
        'mailchimp-for-wp'
    )

);
