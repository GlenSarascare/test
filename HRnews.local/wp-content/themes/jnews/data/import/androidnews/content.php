<?php

return array(

    // image
    'image' =>  array(
        'androidnews1' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget1.jpg',
        'androidnews2' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget2.jpg',
        'androidnews3' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget3.jpg',
        'androidnews4' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget4.jpg',
        'androidnews5' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget5.jpg',
        'androidnews6' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget6.jpg',
        'androidnews7' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget7.jpg',
        'androidnews8' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget8.jpg',
        'androidnews9' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget9.jpg',
        'androidnews10' => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget_bg.jpg',

        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',

        'logo' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo@2x.png',

        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/androidnews/logo@2x.png',

        'ad_300x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png',
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'apps' =>
                array(
                    'title' =>'Apps',
                    'description' => 'You can add some category description here.'
                ),
            'compares' =>
                array(
                    'title' =>'Compares',
                    'description' => 'You can add some category description here.'
                ),
            'devices' =>
                array(
                    'title' =>'Devices',
                    'description' => 'You can add some category description here.'
                ),
            'smartphones' =>
                array(
                    'title' =>'Smartphones',
                    'description' => 'You can add some category description here.',
                    'parent' => 'devices'
                ),
            'tablets' =>
                array(
                    'title' =>'Tablets',
                    'description' => 'You can add some category description here.',
                    'parent' => 'devices'
                ),
            'tv' =>
                array(
                    'title' =>'TV',
                    'description' => 'You can add some category description here.',
                    'parent' => 'devices'
                ),
            'wear' =>
                array(
                    'title' =>'Wear',
                    'description' => 'You can add some category description here.',
                    'parent' => 'devices'
                ),
            'games' =>
                array(
                    'title' =>'Games',
                    'description' => 'You can add some category description here.'
                ),
            'how-to' =>
                array(
                    'title' =>'How To',
                    'description' => 'You can add some category description here.'
                ),
            'news' =>
                array(
                    'title' =>'News',
                    'description' => 'You can add some category description here.'
                ),
            'photography' =>
                array(
                    'title' =>'Photography',
                    'description' => 'You can add some category description here.'
                ),
            'reviews' =>
                array(
                    'title' =>'Reviews',
                    'description' => 'You can add some category description here.'
                ),
            'security' =>
                array(
                    'title' =>'Security',
                    'description' => 'You can add some category description here.'
                ),
        ),

        'post_tag' => array(
            'android-9-pie' => array(
                'title' => 'Android 9 Pie',
            ),
            'buying-guides' => array(
                'title' => 'Buying Guides',
            ),
            'flagship' => array(
                'title' => 'Flagship',
            ),
            'foldable-phone' => array(
                'title' => 'Foldable Phone',
            ),
            'galaxy-s9' => array(
                'title' => 'galaxy-s9',
            ),
            'giveaways' => array(
                'title' => 'Giveaways',
            ),
            'pixel-3' => array(
                'title' => 'Pixel 3',
            ),
            'specifications' => array(
                'title' => 'Specifications',
            ),
            'xiaomi' => array(
                'title' => 'Xiaomi',
            )
        )
    ),

    // post & page
    'post' => array(
        'important-things-to-do-before-switching-from-iphone-x-to-google-pixel-3xl' => array(
            'title' => "Important things to do before switching from iPhone X to Google Pixel 3XL",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews1',
            'taxonomy' => array(
                'category' => 'apps,compares,devices,how-to,smartphones',
                'post_tag' => 'champions-league,doctor-terawan,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:smartphones:id}}')
            )
        ),
        'first-look-at-the-new-android-9-pie-on-the-samsung-galaxy-s9' => array(
            'title' => "First look at the new Android 9 \"Pie\" on the Samsung Galaxy S9",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews2',
            'taxonomy' => array(
                'category' => 'apps,news',
                'post_tag' => 'balinese-culture,market-stories,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}'),
                'post_subtitle' => 'Android 9 "Pie" is the ninth major update and the 16th version of the Android operating system.'
            )
        ),
        'pocophone-f1-review-cheapest-phones-with-the-flagship-snapdragon-845' => array(
            'title' => "Pocophone F1 review: Cheapest phones with the flagship Snapdragon 845",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews3',
            'taxonomy' => array(
                'category' => 'reviews,smartphones,tablets',
                'post_tag' => '2018-league,balinese-culture,chopper-bike,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'post_subtitle' => 'Xiaomi\'s new Pocophone F1 is here with flagship specs at an almost budget price.',
                'enable_review' => '1'
            )
        ),
        'oneplus-6t-review-maintaining-the-status-quo-at-the-moment' => array(
            'title' => "OnePlus 6T Review: Maintaining the status quo, at the moment",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews4',
            'taxonomy' => array(
                'category' => 'apps,compares,how-to,reviews,smartphones',
                'post_tag' => '2018-league,bali-united,balinese-culture,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'post_subtitle' => 'OnePlus is betting on what has worked in the past, but that may not be enough anymore.',
                'enable_review' => '1'
            )
        ),
        'google-pixel-3-camera-bug-brings-back-nexus-5-nightmares' => array(
            'title' => "Google Pixel 3 camera bug brings back Nexus 5 nightmares",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews5',
            'taxonomy' => array(
                'category' => 'apps,news,photography,security,smartphones',
                'post_tag' => '2018-league,balinese-culture,budget-travel,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}')
            )
        ),
        'fortnite-named-ultimate-game-of-the-year-at-the-golden-joystick-awards' => array(
            'title' => "‘Fortnite’ named Ultimate Game of the Year at the Golden Joystick awards",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews6',
            'taxonomy' => array(
                'category' => 'compares,games,news',
                'post_tag' => '2018-league,bali-united,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'samsung-galaxy-note-9-review-the-best-big-screen-phone' => array(
            'title' => "Samsung Galaxy Note 9 review: The Best Big-Screen Phone",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews7',
            'taxonomy' => array(
                'category' => 'compares,devices,reviews,tablets',
                'post_tag' => 'balinese-culture,budget-travel,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tablets:id}}'),
                'enable_review' => '1'
            )
        ),
        'blizzard-reportedly-working-on-warcraft-mobile-game-inspired-by-pokemon-go' => array(
            'title' => "Blizzard reportedly working on Warcraft mobile game inspired by Pokemon Go",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews8',
            'taxonomy' => array(
                'category' => 'games',
                'post_tag' => '2018-league,balinese-culture,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'samsung-galaxy-watch-vs-apple-watch-series-4-which-should-you-buy' => array(
            'title' => "Samsung Galaxy Watch vs. Apple Watch Series 4: Which should you buy?",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews9',
            'taxonomy' => array(
                'category' => 'apps,compares,wear',
                'post_tag' => 'champions-league,chopper-bike,istana-negara,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:wear:id}}')
            )
        ),
        'how-to-take-a-screenshot-edit-and-share-on-the-galaxy-s9-capture' => array(
            'title' => "How to take a screenshot, edit, and share on the Galaxy S9 CAPTURE",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews10',
            'taxonomy' => array(
                'category' => 'apps,how-to,news,smartphones',
                'post_tag' => 'champions-league,chopper-bike,istana-negara,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'google-working-on-fix-for-new-pixel-3-bug-renders-the-camera-useless' => array(
            'title' => "Google working on fix for new Pixel 3 bug renders the camera useless",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews1',
            'taxonomy' => array(
                'category' => 'apps,how-to,security',
                'post_tag' => 'balinese-culture,budget-travel,champions-league,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}')
            )
        ),
        'inkhunter-is-an-ar-app-for-trying-tattoos-before-you-ink-indelibly' => array(
            'title' => "InkHunter is an AR app for trying tattoos before you ink indelibly",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews2',
            'taxonomy' => array(
                'category' => 'apps,devices,photography,tv,wear',
                'post_tag' => 'bali-united,champions-league,istana-negara,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}')
            )
        ),
        'etoro-rolls-out-its-cryptocurrency-wallet-for-android-and-ios' => array(
            'title' => "eToro rolls out its cryptocurrency wallet for Android and iOS",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews3',
            'taxonomy' => array(
                'category' => 'apps,how-to,news,smartphones,tablets',
                'post_tag' => '2018-league,champions-league,istana-negara,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}')
            )
        ),
        'instagram-app-is-reportedly-crashing-for-some-android-users' => array(
            'title' => "Instagram app is reportedly crashing for some Android users",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews4',
            'taxonomy' => array(
                'category' => 'apps,devices,news,security',
                'post_tag' => 'budget-travel,doctor-terawan,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}')
            )
        ),
        'using-a-mind-reading-device-locked-in-patients-told-researchers-theyre-happy' => array(
            'title' => "Pixel AR Stickers update splits content packs, cuts App size",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews5',
            'taxonomy' => array(
                'category' => 'compares,photography,security,smartphones,tablets',
                'post_tag' => 'budget-travel,doctor-terawan,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:smartphones:id}}')
            )
        ),
        'this-chinese-rugged-phones-can-endure-anything-you-throw-at-them' => array(
            'title' => "This Chinese rugged phones can endure anything you throw at them",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews6',
            'taxonomy' => array(
                'category' => 'compares,news,security',
                'post_tag' => '2018-league,champions-league,national-exam,visit-bali',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=-rIk-RfELGE'
            )
        ),
        'at-long-last-twitter-is-finally-giving-our-chronological-timelines-back' => array(
            'title' => "At long last, Twitter is finally giving our chronological timelines back",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews7',
            'taxonomy' => array(
                'category' => 'apps,how-to,news,smartphones',
                'post_tag' => '2018-league,chopper-bike,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'altos-adventure-snowboarding-at-high-speed-has-never-been-so-relaxing-as-it-is' => array(
            'title' => "Alto's Adventure: Snowboarding at high speed has never been so relaxing as it is",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews8',
            'taxonomy' => array(
                'category' => 'games',
                'post_tag' => 'budget-travel,chopper-bike,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'htc-vive-review-the-most-immersive-vr-headset-on-the-market' => array(
            'title' => "HTC Vive Review: The most immersive VR Headset on the market",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews9',
            'taxonomy' => array(
                'category' => 'devices,reviews,wear',
                'post_tag' => 'balinese-culture,chopper-bike,istana-negara,national-exam',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'post_subtitle' => 'The best VR experience you can have right now, if you\'ve got the space.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=HHM-8I3EfTE',
                'enable_review' => '1'
            )
        ),
        'fortnite-battle-royale-for-android-version-6-30-update-overview' => array(
            'title' => "Fortnite Battle Royale for Android version 6.30 update overview",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews10',
            'taxonomy' => array(
                'category' => 'apps,games,how-to',
                'post_tag' => '2018-league,bali-united,champions-league,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'google-pixel-3-xl-running-android-q-appears-on-geekbench' => array(
            'title' => "Google Pixel 3 XL running Android Q appears on Geekbench",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews1',
            'taxonomy' => array(
                'category' => 'devices,news,security,tablets',
                'post_tag' => '2018-league,chopper-bike,doctor-terawan,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tablets:id}}')
            )
        ),
        'twitter-tweaks-video-again-adding-view-counts-for-some-users' => array(
            'title' => "Twitter tweaks video again, adding view counts for some users",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews2',
            'taxonomy' => array(
                'category' => 'apps,security,smartphones,tablets,wear',
                'post_tag' => 'bali-united,balinese-culture,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}')
            )
        ),
        'monument-valley-on-sacred-geometry-and-a-game-for-everyone' => array(
            'title' => "Monument Valley: on sacred geometry and a game for everyone",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews3',
            'taxonomy' => array(
                'category' => 'apps,games',
                'post_tag' => 'budget-travel,doctor-terawan,national-exam,visit-bali',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=59coXPzSyVQ'
            )
        ),
        'best-android-emulators-for-pc-mac-to-be-able-play-android-games' => array(
            'title' => "Best Android emulators for PC & Mac to be able play Android games",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews4',
            'taxonomy' => array(
                'category' => 'apps,games,how-to',
                'post_tag' => 'bali-united,chopper-bike,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}')
            )
        ),
        'take-better-pictures-on-your-phone-with-these-best-free-camera-apps' => array(
            'title' => "Take better pictures on your phone with these best FREE Camera Apps",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews5',
            'taxonomy' => array(
                'category' => 'apps,devices,how-to,photography',
                'post_tag' => '2018-league,budget-travel,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}')
            )
        ),
        'samsung-galaxy-a7-review-triple-camera-for-photography-enthusiasts' => array(
            'title' => "Samsung Galaxy A7 review: Triple-camera for photography enthusiasts",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews6',
            'taxonomy' => array(
                'category' => 'devices,reviews,smartphones',
                'post_tag' => '2018-league,balinese-culture,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'enable_review' => '1'
            )
        ),
        'xiaomi-mi-tv-4s-75-inch-with-4k-resolution-hdr-support-unveiled' => array(
            'title' => "Xiaomi Mi TV 4S 75-inch with 4K resolution, HDR support unveiled",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews7',
            'taxonomy' => array(
                'category' => 'devices,news,tablets,tv',
                'post_tag' => 'bali-united,chopper-bike,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}')
            )
        ),
        'roku-ultra-2018-is-half-off-at-just-50-but-its-selling-out-fast' => array(
            'title' => "Roku Ultra 2018 is half off at just $50, but it's selling out fast",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews8',
            'taxonomy' => array(
                'category' => 'devices,tv',
                'post_tag' => 'chopper-bike,doctor-terawan,istana-negara,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}')
            )
        ),
        'essential-phone-ph-1-review-we-deserve-more-than-this-unfinished-phone' => array(
            'title' => "Essential Phone PH-1 review:  We deserve more than this unfinished phone",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews9',
            'taxonomy' => array(
                'category' => 'apps,reviews,smartphones,tablets',
                'post_tag' => 'bali-united,champions-league,chopper-bike,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:smartphones:id}}'),
                'enable_review' => '1'
            )
        ),
        'samsung-gear-fit2-pro-review-waterproof-and-smarter-fitness-tracker' => array(
            'title' => "Samsung Gear Fit2 Pro review: Waterproof and smarter fitness tracker",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews10',
            'taxonomy' => array(
                'category' => 'compares,devices,reviews,wear',
                'post_tag' => 'bali-united,budget-travel,chopper-bike,doctor-terawan',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=i12bGgZVuqA',
                'enable_review' => '1'
            )
        ),
        'how-big-data-analytics-help-hotels-gain-customers-loyalty' => array(
            'title' => "How big data analytics help hotels gain customers' loyalty",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews1',
            'taxonomy' => array(
                'category' => 'apps,games,photography,wear',
                'post_tag' => 'bali-united,balinese-culture,budget-travel,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}')
            )
        ),
        'vainglorys-5v5-gameplay-has-landed-a-day-early-on-android' => array(
            'title' => "Vainglory's 5v5 gameplay has landed a day early on Android",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews2',
            'taxonomy' => array(
                'category' => 'games',
                'post_tag' => 'balinese-culture,champions-league,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'google-pixel-3-review-the-best-android-phone-with-best-camera-of-2018' => array(
            'title' => "Google Pixel 3 review: The best Android phone with best camera of 2018",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews3',
            'taxonomy' => array(
                'category' => 'compares,devices,reviews,smartphones,tablets',
                'post_tag' => '2018-league,budget-travel,champions-league,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'post_subtitle' => 'The Pixel 3\'s truly exceptional cameras and AI-powered call screening give it an edge on the other great phones.',
                'enable_review' => '1'
            )
        ),
        'honor-8x-review-the-best-looking-mid-range-smartphone-on-the-market' => array(
            'title' => "Honor 8X Review: The best looking mid-range smartphone on the market",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews4',
            'taxonomy' => array(
                'category' => 'compares,devices,reviews,smartphones',
                'post_tag' => 'balinese-culture,budget-travel,doctor-terawan,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'enable_review' => '1'
            )
        ),
        'brain-science-startup-neuroqore-hopes-its-magnets-will-cure-depression' => array(
            'title' => "Find My Device can now locate your phone inside buildings",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews5',
            'taxonomy' => array(
                'category' => 'apps,how-to,smartphones,tv',
                'post_tag' => 'balinese-culture,budget-travel,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:smartphones:id}}')
            )
        ),
        '500000-android-users-downloaded-malware-made-by-one-developer' => array(
            'title' => "500,000 Android users downloaded malware made by one developer",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews6',
            'taxonomy' => array(
                'category' => 'devices,news,security',
                'post_tag' => 'bali-united,champions-league,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}')
            )
        ),
        'huawei-watch-gt-cant-do-much-but-maybe-thats-a-good-thing' => array(
            'title' => "Huawei Watch GT: can't do much, but maybe that's a good thing",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews7',
            'taxonomy' => array(
                'category' => 'compares,devices,tablets,wear',
                'post_tag' => '2018-league,balinese-culture,chopper-bike,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:wear:id}}')
            )
        ),
        'nvidia-to-launch-65-inch-android-tv-with-4k-120hz-for-gaming' => array(
            'title' => "NVIDIA to launch 65-inch Android TV with 4K, 120Hz for gaming",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews8',
            'taxonomy' => array(
                'category' => 'devices,news,tablets,tv',
                'post_tag' => '2018-league,bali-united,balinese-culture,chopper-bike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:tv:id}}')
            )
        ),
        'samsung-galaxy-watch-review-safe-but-satisfying' => array(
            'title' => "Samsung Galaxy Watch review: Safe but satisfying",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews9',
            'taxonomy' => array(
                'category' => 'apps,devices,reviews,tablets,wear',
                'post_tag' => '2018-league,budget-travel,market-stories,national-exam',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:smartphones:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=0O3PKFEUR3k',
                'enable_review' => '1'
            )
        ),
        'lara-croft-go-a-minimalist-adventure-of-the-tomb-raider-in-the-puzzle-genre' => array(
            'title' => "Lara Croft GO - A Minimalist Adventure of the Tomb Raider in the Puzzle Genre",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews10',
            'taxonomy' => array(
                'category' => 'games',
                'post_tag' => 'bali-united,budget-travel,national-exam,visit-bali',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=fM0XMTqDY4Q'
            )
        ),
        'the-death-of-the-headphone-jack-innovation-or-unnecessary' => array(
            'title' => "The death of the headphone jack: Innovation or Unnecessary?",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews1',
            'taxonomy' => array(
                'category' => 'compares,devices,tv,wear',
                'post_tag' => 'champions-league,chopper-bike,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}')
            )
        ),
        'these-top-10-android-apps-and-games-you-shouldnt-miss-this-week' => array(
            'title' => "These Top 10 Android apps and games you shouldn't miss this week!",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews2',
            'taxonomy' => array(
                'category' => 'apps,games',
                'post_tag' => '2018-league,chopper-bike,istana-negara,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}')
            )
        ),
        'how-to-use-a-microsd-as-internal-storage-on-your-smartphone' => array(
            'title' => "How to use a MicroSD as internal storage on your smartphone",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews3',
            'taxonomy' => array(
                'category' => 'compares,how-to,security,smartphones,wear',
                'post_tag' => 'bali-united,champions-league,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:how-to:id}}')
            )
        ),
        'google-assistant-on-wear-os-watches-is-getting-much-more-useful' => array(
            'title' => "Google Assistant on Wear OS watches is getting much more useful",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews4',
            'taxonomy' => array(
                'category' => 'compares,devices,how-to,wear',
                'post_tag' => 'balinese-culture,champions-league,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:wear:id}}')
            )
        ),
        'how-to-protect-the-screen-of-your-android-device' => array(
            'title' => "How to protect the screen of your Android device",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'androidnews5',
            'taxonomy' => array(
                'category' => 'how-to,security,wear',
                'post_tag' => 'bali-united,champions-league,doctor-terawan,istana-negara'
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
                '_wpb_shortcodes_custom_css' => '.vc_custom_1542353782600{padding-top: 40px !important;background-color: #2f373e !important;}.vc_custom_1543217746065{margin-bottom: 15px !important;}.vc_custom_1542597765729{margin-top: -10px !important;margin-bottom: 40px !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0!important}.jeg_dark_playlist .jeg_video_playlist_list_wrapper{background:rgba(0,0,0,.2)}.jeg_vertical_playlist.jeg_dark_playlist .jeg_video_playlist_item{border:0}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => '',
                    'second_title' => '',
                    'header_type' => 'heading_6',
                    'header_background' => '',
                    'header_text_color' => '',
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
                    'date_custom' => 'Y\/m\/d',
                    'content_pagination' => 'nav_1',
                    'pagination_align' => 'center',
                    'show_navtext' => '0',
                    'show_pageinfo' => '0',
                    'post_offset' => '1',
                    'posts_per_page' => '9',
                    'include_post' => '',
                    'exclude_post' => '',
                    'include_category' => '',
                    'exclude_category' => '{{category:reviews:id}}',
                    'include_author' => '',
                    'include_tag' => '',
                    'exclude_tag' => '',
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_content{padding-top:0!important}.jeg_dark_playlist .jeg_video_playlist_list_wrapper{background:rgba(0,0,0,.2)}.jeg_vertical_playlist.jeg_dark_playlist .jeg_video_playlist_item{border:0}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1543282449357{margin-bottom: 20px !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:20px!important}@media only screen and (min-width:1024px){.jeg_pl_lg_box .jeg_post_title{font-size:32px;line-height:1.25em}}',
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_content{padding-top:20px!important}@media only screen and (min-width:1024px){.jeg_pl_lg_box .jeg_post_title{font-size:32px;line-height:1.25em}}'
                )
            )
        ),
        'footer' => array(
            'title' => 'Footer',
            'content' => 'footer.txt',
            'post_type' => 'footer',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1545296563297{padding-top: 30px !important;padding-bottom: 50px !important;}',
                '_elementor_data' => 'footer.json',
                '_elementor_edit_mode' => 'builder',
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
        'reviews' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Reviews',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:reviews:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'how-to' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'How To',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:how-to:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'apps' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Apps',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:apps:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'devices' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Devices',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:devices:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'compares' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Compares',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:compares:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'games' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Games',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:games:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'photography' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Photography',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:photography:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'security' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Security',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:security:id}}',
                'menu-item-status' => 'publish'
            )
        ),

        // mobile menu
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
                'menu-item-title' => 'Home - Layout 1',
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
                'menu-item-title' => 'Home - Layout 2',
                'menu-item-parent-id' => '{{menu:home-mobile:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-2:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'reviews-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Reviews',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:reviews:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'how-to-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'How To',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:how-to:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'apps-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Apps',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:apps:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'devices-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Devices',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:devices:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'games-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Games',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:games:id}}',
                'menu-item-status' => 'publish'
            )
        ),

        // footer menu
        'about' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'About',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'advertise' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Advertise',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'privacy-and-policy' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Privacy & Policy',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'contact' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contact',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),

        // Topbar menu
        'buying-guides' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Buying Guides',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'post_tag',
                'menu-item-object-id' => '{{post_tag:buying-guides:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'pixel-3-review' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Security',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'post',
                'menu-item-object-id' => '{{post:pixel-3-review:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'honor-8x-review' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Security',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'post',
                'menu-item-object-id' => '{{post:honor-8x-review:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'android-9-pie' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Android 9 Pie',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'post_tag',
                'menu-item-object-id' => '{{post_tag:android-9-pie:id}}',
                'menu-item-status' => 'publish'
            )
        ),



    ),

    'widget_position' => array(),

    'widget' => array(
        'widget.json',
    ),

    'customizer' => array(
        'style.json',
    ),

    'plugin' => array(
        'jnews-breadcrumb',
        'jnews-gallery',
        'jnews-jsonld',
        'jnews-meta-header',
        'jnews-review',
        'jnews-social-share',
        'jnews-split',
        'jnews-view-counter',
        'jnews-weather',
        'mailchimp-for-wp'
    )

);
