<?php

return array(

    // image
    'image' =>  array(
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

        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',
        'logo' => 'https://jegtheme.com/asset/jnews/demo/morningnews/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/morningnews/logo@2x.png',

        'ad_300x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png',
        'ad_vertical' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/ad_vertical.png',
        'ad_970x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x250.jpg'
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'business' => array(
                'title' =>'Business',
                'description' => 'You can add some category description here.',
            ),
            'entertainment' => array(
                'title' =>'Entertainment',
                'description' => 'You can add some category description here.'
            ),
            'fashion' => array(
                'title' =>'Fashion',
                'description' => 'You can add some category description here.',
            ),
            'food' => array(
                'title' =>'Food',
                'description' => 'You can add some category description here.'
            ),
            'health' => array(
                'title' =>'Health',
                'description' => 'You can add some category description here.'
            ),
            'lifestyle' => array(
                'title' =>'Lifestyle',
                'description' => 'You can add some category description here.'
            ),
            'national' => array(
                'title' =>'National',
                'description' => 'You can add some category description here.'
            ),
            'news' => array(
                'title' =>'News',
                'description' => 'You can add some category description here.',
            ),
            'opinion' => array(
                'title' =>'Opinion',
                'description' => 'You can add some category description here.',
            ),
            'politics' => array(
                'title' =>'Politics',
                'description' => 'You can add some category description here.'
            ),
            'science' => array(
                'title' =>'Science',
                'description' => 'You can add some category description here.'
            ),
            'tech' => array(
                'title' =>'Tech',
                'description' => 'You can add some category description here.'
            ),
            'travel' => array(
                'title' =>'Travel',
                'description' => 'You can add some category description here.'
            ),
            'world' => array(
                'title' =>'World',
                'description' => 'You can add some category description here.'
            ),

        ),
        'post_tag' => array(
            'afc-championship' => array(
                'title' => 'AFC Championship'
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
            'featured' => array(
                'title' => 'Featured'
            ),
            'jt-610-crash' => array(
                'title' => 'JT 610 Crash'
            ),
            'league-1' => array(
                'title' => 'League 1'
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
                'post_tag' => 'balinese-culture,budget-travel,champions-league,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'palembang-to-inaugurate-quake-proof-bridge-next-month' => array(
            'title' => "Palembang to inaugurate quake-proof bridge next month",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'politics',
                'post_tag' => '2018-league,bali-united,budget-travel,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Victory has a thousand fathers, but defeat is an orphan.'
            )
        ),
        'smelter-grade-alumina-production-reaches-2-million-tons-local-firm' => array(
            'title' => "Smelter-grade alumina production reaches 2 million tons: Local firm",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'business',
                'post_tag' => 'bali-united,balinese-culture,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'breaking-boeing-is-said-close-to-issuing-737-max-warning-after-crash' => array(
            'title' => "Breaking: Boeing Is Said Close To Issuing 737 Max Warning After Crash",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'business,national,news,politics',
                'post_tag' => '2018-league,budget-travel,chopper-bike,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Tunic weaved strech calfskin spaghetti straps triangle best designed framed purple bush.'
            )
        ),
        'renegotiations-for-jet-fighter-project-aim-to-ease-burden-on-state-budget' => array(
            'title' => "Renegotiations for jet fighter project aim to ease burden on state budget",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'business,national,opinion',
                'post_tag' => 'bali-united,champions-league,doctor-terawan,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'government-introduces-new-rules-for-public-university-admission' => array(
            'title' => "Government introduces new rules for public university admission",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'business,science',
                'post_tag' => 'budget-travel,champions-league,doctor-terawan,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'breaking-189-people-on-downed-lion-air-flight-ministry-says' => array(
            'title' => "BREAKING: 189 people on downed Lion Air flight, ministry says",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'business,national,news,politics',
                'post_tag' => 'bali-united,balinese-culture,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'I handle the business operations. With all due respect, Don Eladio.'
            )
        ),
        'indonesian-government-targets-16-6-tax-revenue-growth-in-2019' => array(
            'title' => "Indonesian Government Targets 16.6% Tax Revenue Growth In 2019",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'business,opinion,politics,world',
                'post_tag' => 'bali-united,balinese-culture,budget-travel,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Meanwhile, it has set a 12.11 percent tax-to-gross domestic product (GDP) ratio.'
            )
        ),
        'crashed-lion-air-jet-had-faulty-speed-readings-on-last-4-flights' => array(
            'title' => "Crashed Lion Air Jet Had Faulty Speed Readings on Last 4 Flights",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'national,news,opinion',
                'post_tag' => 'champions-league,chopper-bike,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                'post_subtitle' => 'The Lion Air plane that crashed in the Java Sea last week had faulty airspeed readings during its landing.'
            )
        ),
        'completion-of-jeneponto-wind-farm-accelerated-to-july' => array(
            'title' => "Completion Of Jeneponto Wind Farm Accelerated To July",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'science,tech,world',
                'post_tag' => 'balinese-culture,champions-league,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'police-officers-from-the-k9-unit-during-a-operation-to-find-victims' => array(
            'title' => "Police Officers From The K9 Unit During A Operation To Find Victims",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'national,news,science,tech',
                'post_tag' => '2018-league,budget-travel,champions-league,chopper-bike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                'post_subtitle' => 'Seven still missing as rescuers stop search for landslide victims.'
            )
        ),
        'celebrate-nyepi-in-true-bali-spirit-with-a-luxurious-day-of-silence' => array(
            'title' => "Celebrate Nyepi In True Bali Spirit With A Luxurious Day Of Silence",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'travel',
                'post_tag' => '2018-league,balinese-culture,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'The best way to pay for a lovely moment is to enjoy it.'
            )
        ),
        'proxima-grande-lands-her-first-billboard-number-two-single' => array(
            'title' => "Proxima Grande Lands Her First Billboard Number Two Single",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'entertainment,fashion',
                'post_tag' => 'budget-travel,istana-negara,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:wear:id}}'),
                'post_subtitle' => 'Strech lining hemline above knee burgundy glossy silk complete hid zip.'
            )
        ),
        'west-java-to-review-meykardah-project-amid-alleged-bribery-case' => array(
            'title' => "West Java to review Meykardah project amid alleged bribery case",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'business,lifestyle,tech,travel',
                'post_tag' => 'bali-united,budget-travel,chopper-bike,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'The best way to pay for a lovely moment is to enjoy it.'
            )
        ),
        'people-tiring-of-demonstration-except-protesters-in-jakarta' => array(
            'title' => "People Tiring of Demonstration, Except Protesters in Jakarta",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'national,news,politics',
                'post_tag' => '2018-league,champions-league,chopper-bike,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events.'
            )
        ),
        'bill-gates-iconic-donkey-game-arrives-on-iphone-apple-watch' => array(
            'title' => "Bill Gates' iconic donkey game arrives on iPhone, Apple Watch",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'business,entertainment,lifestyle,tech',
                'post_tag' => 'balinese-culture,champions-league,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'recommended-evening-workouts-if-youre-not-a-morning-person' => array(
            'title' => "Recommended Evening Workouts If You're Not A Morning Person",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'health,lifestyle,opinion',
                'post_tag' => 'balinese-culture,budget-travel,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Strech lining hemline above knee burgundy glossy silk complete hid zip.'
            )
        ),
        'limited-underwater-visibility-hampers-search-for-flight-jt610' => array(
            'title' => "Limited underwater visibility hampers search for flight JT610",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'national,news,opinion,tech',
                'post_tag' => 'bali-united,market-stories,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'nasa-astronauts-install-high-definition-cameras-during-spacewalk' => array(
            'title' => "NASA Astronauts Install High-Definition Cameras During Spacewalk",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'science,tech',
                'post_tag' => '2018-league,balinese-culture,budget-travel,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'finland-has-an-education-system-the-other-country-should-learn-from' => array(
            'title' => "Finland Has An Education System The Other Country Should Learn From",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'lifestyle,science,tech,world',
                'post_tag' => '2018-league,bali-united,budget-travel,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'blackpinks-jennie-announces-release-date-of-solo-debut' => array(
            'title' => "BLACKPINK’s Jennie announces release date of solo debut",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'entertainment,lifestyle,opinion',
                'post_tag' => 'balinese-culture,champions-league,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
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
        'instagram-is-testing-photo-albums-because-nothing-is-sacred-anymore' => array(
            'title' => "Uber's Turbulent Week: Kalanick Out, New Twist In Google Lawsuit",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'business,lifestyle,politics,tech',
                'post_tag' => 'balinese-culture,budget-travel,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'what-your-legs-could-be-telling-you-about-your-heart-health' => array(
            'title' => "What Your Legs Could Be Telling You About Your Heart Health",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'health',
                'post_tag' => 'bali-united,budget-travel,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'what-its-really-like-to-have-dinner-with-best-burger-in-new-york' => array(
            'title' => "What It's Really Like To Have Dinner with Best Burger In New York",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'food,health,travel',
                'post_tag' => '2018-league,budget-travel,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'alexander-wang-uniqlos-underwear-collection-is-available-to-cop-now' => array(
            'title' => "Alexander Wang & Uniqlo's Underwear Collection Is Available to Cop Now",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'fashion,lifestyle',
                'post_tag' => '2018-league,bali-united,champions-league,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'alibaba-introduces-cashier-less-offline-retail-concept-to-make-it-high-tech' => array(
            'title' => "Uniqlo to Open One of Region's Biggest Outlets in Bali",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,lifestyle',
                'post_tag' => '2018-league,chopper-bike,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}'),
                'post_subtitle' => 'Strech lining hemline above knee burgundy glossy silk complete hid zip.'
            )
        ),
        'hail-a-ride-hands-free-apple-opens-siri-to-outside-developers' => array(
            'title' => "Hail a Ride Hands-Free: Apple Opens Siri to Outside Developers",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'business,science,tech,world',
                'post_tag' => 'bali-united,champions-league,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'your-precious-eyes-arent-ready-for-these-new-sneaker-collection' => array(
            'title' => "Your Precious Eyes Aren't Ready For These New Sneaker Collection",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'fashion,lifestyle',
                'post_tag' => 'bali-united,doctor-terawan,istana-negara,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}'),
                'post_subtitle' => 'Tunic weaved strech calfskin spaghetti straps triangle best designed.'
            )
        ),
        'supreme-london-offers-reward-for-iding-man-who-damaged-store-sign' => array(
            'title' => "Supreme London Offers Reward for IDing Man Who Damaged Store Sign",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'business,fashion,news',
                'post_tag' => 'bali-united,budget-travel,chopper-bike,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}'),
                'post_subtitle' => 'Tunic weaved strech calfskin spaghetti straps triangle best designed.'
            )
        ),
        'classic-green-juice-that-can-help-your-skin-heal-more-quickly' => array(
            'title' => "Classic green juice that can help your skin heal more quickly",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'food,health,lifestyle',
                'post_tag' => 'balinese-culture,champions-league,chopper-bike,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'search-teams-recover-seats-wheels-from-indonesia-jet-crash-site' => array(
            'title' => "Search Teams Recover Seats, Wheels From Indonesia Jet Crash Site",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'national,news,politics',
                'post_tag' => 'bali-united,market-stories,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events.'
            )
        ),
        'marine-combat-veteran-kills-12-in-crowded-california-bar' => array(
            'title' => "Marine Combat Veteran Kills 12 In Crowded California Bar",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'business,news,politics,world',
                'post_tag' => '2018-league,champions-league,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                'post_subtitle' => 'I handle the business operations. With all due respect, Don Eladio.'
            )
        ),
        'mount-rinjani-to-be-closed-following-the-lombok-earthquake' => array(
            'title' => "Mount Rinjani to be closed following the Lombok earthquake",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'entertainment,lifestyle,national,news',
                'post_tag' => '2018-league,balinese-culture,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Self-belief and hard work will always earn you success.'
            )
        ),
        'offer-cheap-tickets-and-multiple-destinations-make-lion-air-favorite' => array(
            'title' => "Offer Cheap Tickets and Multiple Destinations Make Lion Air favorite",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'business,politics,travel,world',
                'post_tag' => '2018-league,budget-travel,champions-league,chopper-bike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'The best way to pay for a lovely moment is to enjoy it.'
            )
        ),
        'blizzard-is-interested-in-bringing-all-of-its-franchises-to-mobile' => array(
            'title' => "Blizzard Is Interested In Bringing All of Its Franchises To Mobile",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'business,entertainment,opinion',
                'post_tag' => '2018-league,budget-travel,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events'
            )
        ),
        'this-travel-essential-will-banish-holiday-headaches' => array(
            'title' => "This Travel Essential Will Banish Holiday Headaches",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'food,health,travel',
                'post_tag' => '2018-league,budget-travel,doctor-terawan,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events'
            )
        ),
        'here-are-10-countries-with-highest-population-in-the-world' => array(
            'title' => "Here Are 10 Countries With Highest Population In The World",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'entertainment,travel,world',
                'post_tag' => 'chopper-bike,istana-negara,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events'
            )
        ),
        'indonesian-coffees-recognized-in-french-gourmet-competition' => array(
            'title' => "Indonesian Coffees Recognized in French Gourmet Competition",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'business,food,news',
                'post_tag' => 'balinese-culture,champions-league,chopper-bike,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events.'
            )
        ),
        'first-ever-auction-of-ai-created-artwork-set-for-christies-gavel' => array(
            'title' => "First-ever auction of AI-created artwork set for Christie's gavel",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'entertainment,news,science,tech',
                'post_tag' => 'bali-united,chopper-bike,istana-negara,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Before anything else, preparation is the key to success.'
            )
        ),
        'do-you-need-more-than-a-smartphone-camera-when-traveling' => array(
            'title' => "Do You Need More Than A Smartphone Camera When Traveling?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'health,lifestyle,travel',
                'post_tag' => 'budget-travel,champions-league,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Victory has a thousand fathers, but defeat is an orphan.'
            )
        ),
        'here-are-6-top-brands-and-designers-to-look-out-for-the-next-year' => array(
            'title' => "Here Are 6 Top Brands And Designers To Look Out For The Next Year",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'fashion,lifestyle',
                'post_tag' => '2018-league,bali-united,champions-league,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}')
            )
        ),
        'the-chainsmokers-actually-make-a-great-nickelback-cover-band' => array(
            'title' => "The Chainsmokers Actually Make a Great Nickelback Cover Band",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'entertainment,opinion,tech',
                'post_tag' => '2018-league,balinese-culture,budget-travel,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'heres-every-accessory-in-virgil-ablohs-debut-louis-vuitton-collection' => array(
            'title' => "Here's Every Accessory in Virgil Abloh's Debut Louis Vuitton Collection",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'business,fashion,lifestyle',
                'post_tag' => '2018-league,balinese-culture,budget-travel,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}')
            )
        ),
        'j-k-rowling-is-shutting-down-readers-who-burned-all-their-harry-potter-books' => array(
            'title' => "Japan probe finds more universities discriminated against women",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'fashion,lifestyle,science,travel,world',
                'post_tag' => 'budget-travel,champions-league,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'keep-calm-and-curry-on-must-try-japanese-restaurants-in-bali' => array(
            'title' => "Keep Calm And Curry On: Must-Try Japanese Restaurants in Bali",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'food,health',
                'post_tag' => 'budget-travel,champions-league,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events.'
            )
        ),
        'romantic-or-casual-top-5-restaurants-to-celebrate-new-year-in-bali' => array(
            'title' => "Romantic or Casual, Top 5 Restaurants to Celebrate New Year in Bali",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'food,health,lifestyle',
                'post_tag' => 'bali-united,chopper-bike,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events.'
            )
        ),
        'these-delicious-balinese-street-foods-you-need-to-try-right-now' => array(
            'title' => "These Delicious Balinese Street Foods You need To Try Right Now",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'food,health,lifestyle',
                'post_tag' => 'budget-travel,chopper-bike,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events.'
            )
        ),
        'satay-western-marlina-the-murderer-to-represent-indonesia-at-the-oscars' => array(
            'title' => "Satay Western 'Marlina the Murderer' to represent Indonesia at the Oscars",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'entertainment,opinion,science',
                'post_tag' => '2018-league,doctor-terawan,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:wear:id}}'),
                'post_subtitle' => 'Walter always told me how lucky he was, prior to recent unfortunate events.'
            )
        ),
        'your-favorite-home-cook-needs-one-of-these-fun-gifts' => array(
            'title' => "Your Favorite Home Cook Needs One of These Fun Gifts",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'food,travel',
                'post_tag' => 'balinese-culture,budget-travel,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1541754201804{margin-bottom: 0px !important;}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'NEWS INDEX',
                    'second_title' => '',
                    'header_type' => 'heading_6',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'home-loop',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '3',
                    'excerpt_length' => '20',
                    'content_date' => 'default',
                    'date_custom' => 'Y\/m\/d',
                    'content_pagination' => 'nav_1',
                    'pagination_align' => 'center',
                    'post_offset' => '6',
                    'posts_per_page' => '5',
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => ''
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1541664253820{margin-bottom: 30px !important;padding-top: 30px !important;background-color: #eeeeee !important;}.vc_custom_1542161917374{margin-bottom: 30px !important;}.vc_custom_1542162286132{margin-bottom: 0px !important;}.vc_custom_1542080483320{margin-bottom: 30px !important;}.vc_custom_1541661132713{padding-left: 15px !important;}.vc_custom_1542162242285{margin-bottom: 0px !important;}.vc_custom_1542099405679{margin-bottom: -20px !important;}.vc_custom_1541661347263{margin-bottom: 10px !important;}.vc_custom_1542094860968{margin-bottom: 30px !important;}.vc_custom_1541668721368{margin-bottom: 30px !important;background-color: #f7f7f7 !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0}.jeg_socialcounter.col1 li{font-size:13px}',
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_content{padding-top:0}.jeg_socialcounter.col1 li{font-size:13px}'
                )
            ),
        ),
    ),

    // menu location
    'menu_location' => array(
        'footer-link' => array(
            'title' => 'Footer Links',
            'location' => 'footer_link'
        ),
        'footer-navigation' => array(
            'title' => 'Footer Navigation',
            'location' => 'footer_navigation'
        ),
        'main-navigation' => array(
            'title' => 'Main Navigation',
            'location' => 'navigation'
        ),
        'mobile-navigation' => array(
            'title' => 'Mobile Navigation',
            'location' => 'mobile_navigation'
        ),
        'top-navigation' => array(
            'title' => 'Top Bar Navigation',
            'location' => 'top_navigation'
        ),

    ),

    // menu it self
    'menu' => array(

        // Footer Links
        'home-1' => array(
            'location' => 'footer-link',
            'menu-item-data' => array(
                'menu-item-title' => 'Home Page 1',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-1:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'home-2' => array(
            'location' => 'footer-link',
            'menu-item-data' => array(
                'menu-item-title' => 'Home Page 2',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-2:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'buy-2' => array(
            'location' => 'footer-link',
            'menu-item-data' => array(
                'menu-item-title' => 'Purchase JNews',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'http://bit.ly/get-jnews',
                'menu-item-status' => 'publish'
            )
        ),
        'intro' => array(
            'location' => 'footer-link',
            'menu-item-data' => array(
                'menu-item-title' => 'Intro Page',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io',
                'menu-item-status' => 'publish'
            )
        ),
        'demo' => array(
            'location' => 'footer-link',
            'menu-item-data' => array(
                'menu-item-title' => 'JNews Demos',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io/#demo',
                'menu-item-status' => 'publish'
            )
        ),
        'contact-1' => array(
            'location' => 'footer-link',
            'menu-item-data' => array(
                'menu-item-title' => 'Contact Us',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),

        // Main Menu
        'news' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'News',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:news:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_2',
                    'category' => '{{category:news:id}}',
                    'number' => 6,
                    'trending_tag' => '{{taxonomy:post_tag:commentary:id}},{{taxonomy:post_tag:featured:id}},{{taxonomy:post_tag:event:id}},{{taxonomy:post_tag:editorial:id}}',
                ),
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
        'tech' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Tech',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:tech:id}}',
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
        'lifestyle' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Lifestyle',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:lifestyle:id}}',
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
            )
        ),
        'health' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Health',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:health:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'travel' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Travel',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:travel:id}}',
                'menu-item-status' => 'publish'
            )
        ),

        // Mobile menu
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
        'home-1-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Home Page 1',
                'menu-item-parent-id' => '{{menu:home-mobile:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-1:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'home-2-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Home Page 2',
                'menu-item-parent-id' => '{{menu:home-mobile:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-2:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'news-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'News',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:news:id}}',
                'menu-item-status' => 'publish'
            ),
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
        'food-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Food',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:food:id}}',
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
        'opinion-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Opinion',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:opinion:id}}',
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


        // Footer Menu
        'buy' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Buy JNews',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'http://bit.ly/get-jnews',
                'menu-item-status' => 'publish'
            )
        ),
        'landing' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Landing Page',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io',
                'menu-item-status' => 'publish'
            )
        ),
        'documentation' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Documentation',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'http://support.jegtheme.com/theme/jnews/',
                'menu-item-status' => 'publish'
            )
        ),
        'support-forum' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Support Forum',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'http://support.jegtheme.com/forums/forum/jnews/',
                'menu-item-status' => 'publish'
            )
        ),

        //top menu
        'about' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'About',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io',
                'menu-item-status' => 'publish'
            )
        ),
        'buy-1' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Get Jnews',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'http://bit.ly/get-jnews',
                'menu-item-status' => 'publish'
            )
        ),
        'contact' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contcat Us',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
    ),

    'widget_position' => array(
        'home-loop',
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
        'jnews-essential',
        'jnews-gallery',
        'jnews-jsonld',
        'jnews-meta-header',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-view-counter',
        'jnews-weather',
        'mailchimp-for-wp'
    )
);
