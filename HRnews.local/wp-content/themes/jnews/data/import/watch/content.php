<?php

return array(

    // image
    'image' =>  array(
        'news1'    => 'http://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
        'news2'    => 'http://jegtheme.com/asset/jnews/demo/default/fashion2.jpg',
        'news3'    => 'http://jegtheme.com/asset/jnews/demo/default/fashion3.jpg',
        'news4'    => 'http://jegtheme.com/asset/jnews/demo/default/fashion4.jpg',
        'news5'    => 'http://jegtheme.com/asset/jnews/demo/default/fashion5.jpg',
        'news6'    => 'http://jegtheme.com/asset/jnews/demo/default/fashion6.jpg',
        'news7'    => 'http://jegtheme.com/asset/jnews/demo/default/fashion1.jpg',
        'news8'    => 'http://jegtheme.com/asset/jnews/demo/default/travel2.jpg',
        'news9'    => 'http://jegtheme.com/asset/jnews/demo/default/travel3.jpg',

        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',

        'logo' => 'https://jegtheme.com/asset/jnews/demo/watch/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/watch/logo@2x.png',

        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/watch/mobile_logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/watch/mobile_logo@2x.png',

        'sticky_logo' => 'https://jegtheme.com/asset/jnews/demo/watch/sticky_logo.png',
        'sticky_logo2x' => 'https://jegtheme.com/asset/jnews/demo/watch/sticky_logo@2x.png',

        'ad_300x250' => 'http://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_345x345' => 'http://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'http://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'http://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x250.jpg',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png'

    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'grand-seiko' => array(
                'title' => 'Grand Seiko',
                'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
            ),
            'jaeger-lecoultre' => array(
                'title' => 'Jaeger-Lecoultre',
                'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
            ),
            'montblanc' => array(
                'title' => 'Montblanc',
                'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
            ),
            'review' => array(
                'title' => 'Review',
                'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
            ),
            'rolex' => array(
                'title' => 'Rolex',
                'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
            ),
            'tag-heuer' => array(
                'title' => 'Tag Heuer',
                'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
            ),
            'tudor' => array(
                'title' => 'Tudor',
                'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
            ),
        ),
        'post_tag' => array(
        )
    ),

    // post & page
    'post' => array(
        'jacob-co-billionaire-watch-a-suitable-watch-for-every-sport-activities' => array(
            'title' => "Jacob & Co. Billionaire, a Suitable Watch for Every Sport Activities",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'introducing-patek-philippe-ref-1518-in-stainless-steel' => array(
            'title' => "Introducing Patek Philippe Ref. 1518 in Stainless Steel",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'montblanc',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'the-seven-best-watches-of-2017-you-problaby-forget-about' => array(
            'title' => "The Seven Best Watches of 2017 You Probably Forget About",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'rolex',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'review-rolex-daytona-ref-6263-oyster-albino' => array(
            'title' => "Review: Rolex Daytona Ref. 6263 Oyster Albino",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'review,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.',
                'enable_review' => '1'
            )
        ),
        'a-week-on-the-wrist-vacheron-constantin-tour-de-iile-watch' => array(
            'title' => "A Week on the Wrist Vacheron Constantin Tour de I’Ile Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'grand-seiko',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'jaeger-lecoultre-is-the-official-watch-sponsor-for-the-90th-academy-awards' => array(
            'title' => "Jaeger-Lecoultre is The Official Watch Sponsor for the 90th Academy Awards",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'everything-you-want-to-know-about-patek-philippe-sky-moon-tourbillon-reference-6002' => array(
            'title' => "Everything You Want to Know About Patek Philippe Sky Moon Tourbillon",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'why-isnt-montblanc-considered-to-be-expensive-watch' => array(
            'title' => "Why Isn't Montblanc Considered to be Expensive Watch?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'montblanc',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'a-closer-look-at-hublot-black-caviar-big-bang-the-newest-tudor-sport-watch' => array(
            'title' => "A Closer Look at Hublot Caviar Big Bang, The Newest Tudor Sport Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'a-closer-look-at-hublot-black-caviar-big-bang-the-newest-tudor-watch' => array(
            'title' => "Business News: United States Watch Export Ep Up to 10.8% in 2019",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'rolex',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'review-breguet-marie-antoinette-grande-complication-pocket-watch-2' => array(
            'title' => "Review: Jaeger-LeCoultre Hybris Mechanica Grande Sonnerie",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre,montblanc,review',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.',
                'enable_review' => '1'
            )
        ),
        'what-is-the-most-valuable-watch-brand-in-the-world' => array(
            'title' => "What is the Most Valuable Watch Brand in the World?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'rolex,tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'former-president-barack-obama-seen-wearing-patek-philippe-henry' => array(
            'title' => "President Barack Obama Seen Wearing Patek Philippe Henry",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'montblanc,tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'ellen-degeneres-wearing-vacheron-constantin-tour-de-iile-in-cars-getting-coffee' => array(
            'title' => "Review: Graff Diamond's Hallucination, the Newest Tudor Series",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre,rolex',
                'post_tag' => '',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=x3HG7Pp5VEI'
            )
        ),
        'ellen-degeneres-wearing-vacheron-constantin-tour-de-iile-on-comedian-in-cars-getting-coffee' => array(
            'title' => "Ellen DeGeneres Wearing Vacheron Tour de I’Ile In Cars Getting Coffee",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'tag-heuer,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'greubel-forsey-art-piece-is-the-coolest-watch-of-this-week-new-york-auctions' => array(
            'title' => "Greubel Forsey Art Piece is the Coolest Watch of This Week New York Auctions",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'grand-seiko,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'bradley-cooper-wearing-a-richard-mille-rm-56-02-sapphire-to-golden-globes' => array(
            'title' => "Bradley Cooper Wearing a Richard Mille Sapphire to Golden Globes",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre,rolex',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'james-bonds-jaeger-lecoultre-hybris-mechanica-grande-sonnerie-wrist-watch-sold-for-92500' => array(
            'title' => "James Bond's Jaeger-LeCoultre Sonnerie Wrist Watch Sold for £92,500",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'grand-seiko,tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'a-pocket-watch-series-by-montblanc-featuring-chinese-zodiac' => array(
            'title' => "A Pocket Watch Series by Montblanc featuring Chinese Zodiac",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'montblanc,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'hugh-jackman-is-the-new-rolex-brand-ambassador-for-europe' => array(
            'title' => "Hugh Jackman is the New Rolex Brand Ambassador for Europe",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre,rolex',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'full-throttle-with-franck-muller-aeternitas-mega-4-a-2-7-million-watch' => array(
            'title' => "Full Throttle with Franck Muller Aeternitas Mega 4, a $2.7 Million Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'grand-seiko,tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'review-the-grand-seiko-spring-drive-snowflake-sbga211' => array(
            'title' => "Review: The Grand Seiko Spring Drive Snowflake SBGA211",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'grand-seiko,jaeger-lecoultre,review',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'enable_review' => '1'
            )
        ),
        'lange-sohne-grand-complication-the-most-fancy-wrist-watch-in-2019' => array(
            'title' => "Lange & Söhne Grand Complication, The Most Fancy Wrist Watch in 2019",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'montblanc,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'top-20-most-expensive-tudor-watch-in-2018' => array(
            'title' => "Top 20 Most Expensive Tudor Watch in 2018",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'montblanc,rolex',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'hands-on-rolex-daytona-ref-6263-oyster-albino-a-4-million-fancy-watch' => array(
            'title' => "Hands On Rolex Daytona Ref. 6263 Oyster Albino, a $4 Million Fancy Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'rolex,tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'the-value-preposition-of-ulysse-nardin-hannibal-minute-repeater-tourbillon' => array(
            'title' => "The Value Preposition of Ulysse Nardin Hannibal Minute Repeater Tourbillon",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'grand-seiko,jaeger-lecoultre',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'in-depth-taking-audemars-piguet-royal-oak-grande-into-the-colorado-backcountry' => array(
            'title' => "In Depth Taking Audemars Piguet Royal Oak Grande Into The Colorado Backcountry",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'grand-seiko,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'introduction-chopard-l-u-c-all-in-one-janus-watch-a-374000-watch-2' => array(
            'title' => "Introduction: George Daniel Co-Axial Chronograph, a £463,000 Watch",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'grand-seiko,rolex',
                'post_tag' => '',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=yYa6JUhRExA'
            )
        ),
        'introduction-chopard-l-u-c-all-in-one-janus-watch-a-374000-watch' => array(
            'title' => "Introduction, Chopard L.U.C All-in-One 'Janus Watch' a £374,000 Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'montblanc,tudor',
                'post_tag' => '',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=VMPGFWtmTeM'
            )
        ),
        'is-smartwatch-gonna-replace-traditional-watch-in-2019' => array(
            'title' => "Is Smartwatch Gonna Replace Traditional Watch in 2019?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'rolex,tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'introduction-maitres-du-temps-chapter-one-round-transparence' => array(
            'title' => "Introduction: Maitres Du Temps Chapter One Round Transparence",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre,montblanc',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        '10-things-to-know-about-rolex' => array(
            'title' => "10 Things to Know About Rolex, the Oldest Watch Company",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'grand-seiko,tag-heuer',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'review-breguet-marie-antoinette-grande-complication-pocket-watch' => array(
            'title' => "Review: Breguet Marie-Antoinette Grande Complication Pocket Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre,review',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.',
                'enable_review' => '1'
            )
        ),
        'the-rise-of-classic-rolex-watch' => array(
            'title' => "The Rise of Classic Rolex Watch in 2019",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'grand-seiko,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        '10-things-you-need-to-know-before-buying-fancy-watch' => array(
            'title' => "10 Things You Need to Know Before Buying Fancy Watch",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'rolex,tudor',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        '10-mens-watches-vintage-you-should-start-collecting-now' => array(
            'title' => "10 Men's Watches Vintage You Should Start Collecting Now",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'montblanc,rolex',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Yesterday is gone. Tomorrow has not yet come. We have only today. Let us begin.'
            )
        ),
        'review-the-rolex-sky-dweller-in-stainless-steel' => array(
            'title' => "Review: The Rolex Sky-Dweller In Stainless Steel",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'jaeger-lecoultre,review',
                'post_tag' => ''
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'enable_review' => '1'
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1548907844478{background-image: url(https://jnews.local/watch/wp-content/uploads/sites/5/2019/01/johannes-weissmuller-411960-unsplash-1.jpg?id=419) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1557972878271{margin-bottom: 10px !important;}.vc_custom_1557820959829{margin-bottom: 30px !important;}.vc_custom_1557973507851{margin-top: 20px !important;}',
                '_wpb_post_custom_css' => '@media only screen and (min-width:1025px){.jeg_content{padding-top:0}}@media only screen and (min-width:1024px){.jeg_postblock_9 .jeg_post_title{font-size:24px;line-height:38px}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'header_type' => 'heading_6',
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '5',
                    'boxed' => '0',
                    'boxed_shadow' => '0',
                    'box_shadow' => '0',
                    'excerpt_length' => '30',
                    'content_date' => 'default',
                    'date_custom' => 'Y/m/d',
                    'content_pagination' => 'nav_2',
                    'pagination_align' => 'center',
                    'show_navtext' => '1',
                    'show_pageinfo' => '0',
                    'post_offset' => '0',
                    'posts_per_page' => '5',
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1548907844478{background-image: url(https://jnews.local/watch/wp-content/uploads/sites/5/2019/01/johannes-weissmuller-411960-unsplash-1.jpg?id=419) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1557972878271{margin-bottom: 10px !important;}.vc_custom_1557820959829{margin-bottom: 30px !important;}.vc_custom_1557973507851{margin-top: 20px !important;}@media only screen and (min-width:1025px){.jeg_content{padding-top:0}}@media only screen and (min-width:1024px){.jeg_postblock_9 .jeg_post_title{font-size:24px;line-height:38px}}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1557809523534{padding-top: 15px !important;padding-bottom: 15px !important;background-color: #f5f5f5 !important;}.vc_custom_1557974102296{margin-bottom: 0px !important;}.vc_custom_1557815821768{margin-bottom: 30px !important;}.vc_custom_1557974572977{margin-bottom: 30px !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0}.jeg_pl_lg_card:last-child{margin-bottom:0}.jeg_pl_lg_card .jeg_postblock_content{text-align:center}@media screen and (min-width:481px){.jeg_pl_lg_card .jeg_postblock_content{margin:-70px auto 0;padding:24px 80px;max-width:80%}}.jeg_postblock_12 .jeg_post_title,.jeg_postblock_12 .jeg_post_meta{margin-bottom:8px}',
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1557809523534{padding-top: 15px !important;padding-bottom: 15px !important;background-color: #f5f5f5 !important;}.vc_custom_1557974102296{margin-bottom: 0px !important;}.vc_custom_1557815821768{margin-bottom: 30px !important;}.vc_custom_1557974572977{margin-bottom: 30px !important;}.jeg_content{padding-top:0}.jeg_pl_lg_card:last-child{margin-bottom:0}.jeg_pl_lg_card .jeg_postblock_content{text-align:center}@media screen and (min-width:481px){.jeg_pl_lg_card .jeg_postblock_content{margin:-70px auto 0;padding:24px 80px;max-width:80%}}.jeg_postblock_12 .jeg_post_title,.jeg_postblock_12 .jeg_post_meta{margin-bottom:8px}'
                )
            )
        ),
        'home-3' => array(
            'title' => 'Home 3',
            'content' => 'home3.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1557824007510{padding-top: 50px !important;padding-bottom: 20px !important;background-color: #f7f7f7 !important;}.vc_custom_1557824142990{margin-bottom: 10px !important;}.vc_custom_1557823607980{margin-bottom: 0px !important;}.vc_custom_1557824017098{margin-bottom: 0px !important;}',
                '_wpb_post_custom_css' => '@media only screen and (min-width:1025px){.jeg_content{padding-top:0}}.jeg_pl_lg_card:last-child{margin-bottom:0}.jeg_pl_lg_card .jeg_postblock_content{text-align:center}@media screen and (min-width:481px){.jeg_pl_lg_card .jeg_postblock_content{margin:-70px auto 0;padding:24px 80px;max-width:80%}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'LATEST STORIES',
                    'header_type' => 'heading_9',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'home-layout-3',
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
                    'posts_per_page' => '8',
                    'exclude_category' => '1',
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home3.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1557824007510{padding-top: 50px !important;padding-bottom: 20px !important;background-color: #f7f7f7 !important;}.vc_custom_1557824142990{margin-bottom: 10px !important;}.vc_custom_1557823607980{margin-bottom: 0px !important;}.vc_custom_1557824017098{margin-bottom: 0px !important;}@media only screen and (min-width:1025px){.jeg_content{padding-top:0}}.jeg_pl_lg_card:last-child{margin-bottom:0}.jeg_pl_lg_card .jeg_postblock_content{text-align:center}@media screen and (min-width:481px){.jeg_pl_lg_card .jeg_postblock_content{margin:-70px auto 0;padding:24px 80px;max-width:80%}}'
                )
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

        'review' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Review',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:review:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'rolex' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Rolex',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:rolex:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'tag-heuer' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Tag Heuer',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:tag-heuer:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'montblanc' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Montblanc',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:montblanc:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'other-brand' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Other Brand',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'grand-seiko' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Grand Seiko',
                'menu-item-parent-id' => '{{menu:other-brand:id}}',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:grand-seiko:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'jaeger-lecoultre' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Jaeger-Lecoultre',
                'menu-item-parent-id' => '{{menu:other-brand:id}}',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:jaeger-lecoultre:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'tudor' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Tudor',
                'menu-item-parent-id' => '{{menu:other-brand:id}}',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:tudor:id}}',
                'menu-item-status' => 'publish'
            )
        ),

        // Footer Menu
        'about-us-1' => array(
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
        'contact-us-1' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contact Us',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
    ),


    'widget_position' => array(
        'default-sidebar',
        'footer-widget-1',
        'footer-widget-2',
        'footer-widget-3',
        'footer-widget-4',
        'home',
    ),

    'widget' => array(
        'widget.json',
    ),

    'customizer' => array(
        'style.json',
    ),

    'plugin' => array(
        'jnews-breadcrumb',
        'jnews-essential',
        'jnews-front-translation',
        'jnews-instagram',
        'jnews-jsonld',
        'jnews-meta-header',
        'jnews-review',
        'jnews-social-share',
        'jnews-view-counter',
        'mailchimp-for-wp'
    )

);