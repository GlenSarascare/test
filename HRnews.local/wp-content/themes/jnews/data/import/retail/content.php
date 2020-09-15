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

        'logo' => 'https://jegtheme.com/asset/jnews/demo/retail/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/retail/logo@2x.png',
        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/retail/logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/retail/logo@2x.png',

        'favicon' => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',

        'ad_300x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_345x345' => 'https://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_970x90' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x90.png',
        'ad_970x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x250.jpg'

    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'economy' => array(
                'title' => 'Economy',
                'description' => 'You can add some category description here.'
            ),
            'electrical' => array(
                'title' => 'Electrical',
                'description' => 'You can add some category description here.'
            ),
            'entertainment' => array(
                'title' => 'Entertainment',
                'description' => 'You can add some category description here.'
            ),
            'goverment' => array(
                'title' => 'Government',
                'description' => 'You can add some category description here.'
            ),
            'leisure' => array(
                'title' => 'Leisure',
                'description' => 'You can add some category description here.'
            ),
            'luxury-goods' => array(
                'title' => 'Luxury Goods',
                'description' => 'You can add some category description here.'
            ),
            'property' => array(
                'title' => 'Property',
                'description' => 'You can add some category description here.'
            ),
            'sport' => array(
                'title' => 'Sport',
                'description' => 'You can add some category description here.'
            ),
            'supermarkets' => array(
                'title' => 'Supermarkets',
                'description' => 'You can add some category description here.'
            ),
            'supply-chain' => array(
                'title' => 'Supply Chain',
                'description' => 'You can add some category description here.'
            ),
            'uncategorized' => array(
                'title' => 'Uncategorized',
                'description' => 'You can add some category description here.'
            ),
            'video' => array(
                'title' => 'Video',
                'description' => 'You can add some category description here.'
            )
        ),
        'post_tag' => array(
            'acquistion' => array(
                'title' => 'acquistion'
            ),
            'analysis' => array(
                'title' => 'analysis'
            ),
            'bag' => array(
                'title' => 'bag'
            ),
            'budget' => array(
                'title' => 'budget'
            ),
            'business' => array(
                'title' => 'business'
            ),
            'car' => array(
                'title' => 'car'
            ),
            'casino' => array(
                'title' => 'casino'
            ),
            'company' => array(
                'title' => 'company'
            ),
            'data' => array(
                'title' => 'data'
            ),
            'defisit' => array(
                'title' => 'defisit'
            ),
            'economic-growth' => array(
                'title' => 'economic growth'
            ),
            'electric' => array(
                'title' => 'electric'
            ),
            'energy' => array(
                'title' => 'energy'
            ),
            'entertainment' => array(
                'title' => 'entertainment'
            ),
            'fashion' => array(
                'title' => 'fashion'
            ),
            'finance' => array(
                'title' => 'finance'
            ),
            'football' => array(
                'title' => 'football'
            ),
            'forecast' => array(
                'title' => 'forecast'
            ),
            'government' => array(
                'title' => 'government'
            ),
            'grossing' => array(
                'title' => 'grossing'
            )
        )
    ),

    // post & page
    'post' => array(
        'largest-daily-percent-gain-for-stock-market-since-march-2009' => array(
            'title' => "Largest Daily Percent Gain for Stock Market since March 2009",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'economy,video',
                'post_tag' => 'defisit,market,stock',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=ZeR068seJ40'
            )
        ),
        'electrical-market-share-will-exceed-us-11-billion-by-2024' => array(
            'title' => "Electrical Market Share will Exceed US$ 11 Billion by 2024",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'electrical',
                'post_tag' => 'analysis,electric,market'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'aladdin-live-action-will-break-the-global-box-office-record-in-2019' => array(
            'title' => "Aladdin Live Action Will Break The Global Box Office Record In 2019",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'entertainment',
                'post_tag' => 'analysis,entertainment,market,movie'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'electrical-house-e-house-market-2018-global-analysis-opportunities-and-forecast-to-2025' => array(
            'title' => "Electrical House Market 2018 Global Analysis, Opportunities And Forecast To 2025",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'electrical',
                'post_tag' => 'analysis,forecast,market'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'saudi-arabia-pumps-up-stock-market-after-bad-news-including-khashoggi-murder' => array(
            'title' => "Saudi Arabia Pumps Up Stock Market After Bad News, Including Khashoggi Murder",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'goverment',
                'post_tag' => 'market,revenue,stocks'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'amazon-reprises-digital-day-deals-on-content-and-devices' => array(
            'title' => "Amazon Reprises 'Digital Day' Deals on Content and Devices",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'entertainment',
                'post_tag' => 'entertainment,music,technology'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'europe-shares-drop-as-retailers-fall-after-asos-cuts-outlook' => array(
            'title' => "Europe: Shares Drop as Retailers Fall After Asos Cuts",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'goverment',
                'post_tag' => 'fashion,retail,retailers'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'bangkok-project-boosts-tourism-in-top-retail-hub-on-70-at-2018' => array(
            'title' => "Bangkok Project Boosts Tourism In Top Retail Hub on 70% at 2018",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'leisure',
                'post_tag' => 'fashion,retail,retailers'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'black-friday-saw-online-electrical-sales-jump-by-205' => array(
            'title' => "Black Friday Saw Online Electrical Sales Jump by 205%",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'electrical,luxury-goods',
                'post_tag' => 'economic-growth,fashion,stocks'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'as-nike-nke-stock-declined-augustine-asset-management-has-trimmed-position-by-1-13-million' => array(
            'title' => "As Nike Stock Declined, The Management Has Trimmed Position by $1.13 Million",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'economy,goverment,property',
                'post_tag' => 'economic-growth,fashion,stocks'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'victorias-secret-appoints-john-mehas-as-ceo-amid-huge-profit-drop' => array(
            'title' => "Victoria’s Secret Appoints John Mehas as CEO Amid Huge Profit Drop",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'entertainment,leisure,sport',
                'post_tag' => 'economic-growth,fashion,luxury'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'turkey-posts-record-drop-in-retail-sales-as-economic-slump-deepens' => array(
            'title' => "Turkey Posts Record Drop in Retail Sales as Economic Slump Deepens",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'property,supermarkets',
                'post_tag' => 'entertainment,government,retailers'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'ontario-government-opts-for-phased-approach-to-retail-cannabis-stores' => array(
            'title' => "Ontario Government Opts for 'phased approach' to Retail Cannabis Stores",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'goverment,supermarkets',
                'post_tag' => 'entertainment,government,retailers'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'as-asian-games-commence-indonesia-hopes-for-economic-boost-looks-to-olympic-bid' => array(
            'title' => "As Asian Games Commence, Indonesia Hopes for Economic Growth",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'sport,supply-chain',
                'post_tag' => 'budget,economic-growth,sport'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'indonesia-marks-new-record-as-foreign-visitors-top-30-million-in-2018' => array(
            'title' => "Indonesia Marks New Record as Foreign Visitors Top 30 Million in 2018",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'leisure,sport,supply-chain',
                'post_tag' => 'entertainment,tourism,tourist'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'elon-musks-spacex-is-raising-500-million-in-funding' => array(
            'title' => "Elon Musk’s SpaceX Is Raising $500 Million in Funding to Space Rocket",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'electrical',
                'post_tag' => 'electric,energy,technology'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'australias-top-five-suburbs-for-investment-properties-under-500000-in-2019' => array(
            'title' => "Australia’s Top Five Suburbs for Investment Properties Under $500,000 in 2019",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'property,sport,supply-chain',
                'post_tag' => 'business,property,real-estate'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'atlantic-city-casino-revenue-increased-20-percent-in-november' => array(
            'title' => "Atlantic City Casino Revenue Increased 20 Percent in November",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'leisure,luxury-goods,property',
                'post_tag' => 'casino,entertainment,real-estate'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'tesla-big-batterys-first-year-lowers-electricity-prices-makes-money-is-not-on-fire' => array(
            'title' => "Tesla Big Battery’s First Year: Lowers Electricity Prices, Makes Money, Is Not On Fire",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'electrical,sport,supply-chain',
                'post_tag' => 'car,electric,luxury'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'global-recorded-music-revenues-expected-to-hit-18-9-billion-this-year' => array(
            'title' => "Global Recorded Music Retail Revenues Expected to Hit $18.9 Billion This Year",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'entertainment,luxury-goods,property',
                'post_tag' => 'entertainment,music,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'apple-1q-guidance-cut-could-make-the-stock-market-crash-apple-stock-crashing' => array(
            'title' => "Apple 1Q Guidance CUT Could Make The Stock Market Crash – Apple Stock Crashing",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'economy,video',
                'post_tag' => 'finance,market,stock',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=DM7a-sVO5Yk'
            )
        ),
        'the-uk-government-says-its-brexit-deal-wwill-hurt-the-economy' => array(
            'title' => "The UK Government Says its Brexit Deal Will Hurt the Stock Market",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'goverment,supermarkets,supply-chain',
                'post_tag' => 'luxury,super,taxes'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'global-luxury-goods-market-share-to-2023-lvmh-rolex-tiffany-and-kering' => array(
            'title' => "Global Luxury Goods Market Share to 2023: LVMH, Rolex, Tiffany and Kering",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'luxury-goods,property,sport',
                'post_tag' => 'luxury,super,taxes'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'working-to-bring-99-items-in-sub-18-gst-slab-president-barack-obama' => array(
            'title' => "Working to bring 99% items in sub-18% GST slab: President Barack Obama",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'economy,supermarkets,supply-chain',
                'post_tag' => 'market,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'india-becoming-worlds-fastest-growing-economy-shows-imf-data' => array(
            'title' => "India Becoming World's Fastest Growing Economy, Shows IMF Data",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'economy,supermarkets,supply-chain',
                'post_tag' => 'market,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'rise-of-chinese-rival-drove-hitachis-abb-power-grid-purchase' => array(
            'title' => "Rise of Chinese Rival Drove Hitachi's ABB Power Grid Purchase",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'electrical',
                'post_tag' => 'market,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'comparing-the-great-depression-to-the-stock-market-today' => array(
            'title' => "Comparing The Great Depression To The Stock Market Today",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'economy,video',
                'post_tag' => 'market,stock,supply-chain',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=eaWAM1LFytQ'
            )
        ),
        'myefo-reveals-billions-more-in-revenue-9-billion-in-fresh-election-tax-cuts' => array(
            'title' => "MYEFO Reveals Billions More in Revenue, $9 Billion in Tax Cuts",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'economy,goverment,property',
                'post_tag' => 'market,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'amazon-and-whole-foods-after-a-year-supermarkets-will-see-massive-changes' => array(
            'title' => "Amazon After A Year: Retail Market Will See Massive Changes",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'supermarkets',
                'post_tag' => 'market,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'retail-cannabis-sales-fuel-506-revenue-growth-for-hexo-corp-in-q1' => array(
            'title' => "Retail Cannabis Sales Fuel 506% Revenue Growth for HEXO Corp. in Q1",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'economy,luxury-goods,supply-chain',
                'post_tag' => 'entertainment,music,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'taylor-swift-strikes-a-blow-for-fellow-artists-as-digital-revenues-soar' => array(
            'title' => "Taylor Swift Strikes a Blow for Fellow Artists as Digital Revenues Soar",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'entertainment,leisure,luxury-goods,sport',
                'post_tag' => 'entertainment,music,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'tsmc-and-foxconn-revenues-up-contrary-to-dour-iphone-supply-chain-forecasts' => array(
            'title' => "Foxconn Revenues Up, Contrary to Dour iPhone Supply Chain Forecasts",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'supply-chain',
                'post_tag' => 'production,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'california-utility-electric-lines-damaged-where-the-camp-fire-started' => array(
            'title' => "Electrical Surgical Instruments Market Revenue, Price, Forecast to 2023",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'economy,electrical,property,sport',
                'post_tag' => 'entertainment,revenue,sport'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'electronics-and-electrical-ceramics-market-capacity-production-and-industry-growth-forecast-by-2023' => array(
            'title' => "Electrical Ceramics Market Production, and Industry Growth Forecast By 2023",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'economy,electrical,sport',
                'post_tag' => 'entertainment,revenue,sport'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'aff-suzuki-cup-2018-malaysia-get-heroes-welcome-upon-return' => array(
            'title' => "AFF Suzuki Cup 2018: Malaysia, as Host City Get $2.9 billion Revenue from Marchandise Sales",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'sport,supermarkets',
                'post_tag' => 'entertainment,revenue,sport'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'disneys-box-office-results-boost-studio-entertainment-unit' => array(
            'title' => "Disney's Box Office Results Boost Studio Entertainment Unit",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'entertainment,goverment,sport',
                'post_tag' => 'profit,revenue,tourism,tourists'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'tasmania-is-riding-a-tourism-wave-but-are-some-being-left-in-its-wake' => array(
            'title' => "Tasmania is Riding a Tourism Wave, But Are Some Being Left in Its Wake?",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'leisure,sport,supply-chain',
                'post_tag' => 'profit,revenue,tourism,tourists'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'target-hm-and-41-more-launch-charter-to-reduce-supply-chain-emissions' => array(
            'title' => "H&M and 41 More Launch Charter to Reduce Supply Chain Emissions",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'economy,goverment,supply-chain',
                'post_tag' => 'production,retailers,supermarket'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'a-turning-point-for-chinas-stance-on-counterfeit-luxury-goods' => array(
            'title' => "A Turning Point for China’s Stance on Counterfeit Luxury Goods",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'electrical,luxury-goods,property,supply-chain',
                'post_tag' => 'investment,market,profit'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'us-stock-market-will-we-see-a-bull-market-in-2019' => array(
            'title' => "US Stock Market: Will We See a Bull Market in 2019?",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'economy,video',
                'post_tag' => 'grossing,market,stock',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=rWB2LsqSgrE'
            )
        ),
        'italy-cuts-deficit-target-for-2019-to-2-04-to-avoid-eu-sanctions' => array(
            'title' => "Italy Cuts Deficit Target for 2019 to 2.04% to Avoid EU Sanctions",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'goverment,leisure,luxury-goods,property',
                'post_tag' => 'investment,market,profit'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'aberdeen-announce-85000-profit-as-turnover-and-wages-reach-record-highs' => array(
            'title' => "Aberdeen Announce £85,000 Profit as Turnover and Wages Reach Record Highs",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'sport,supermarkets,supply-chain',
                'post_tag' => 'industry,profit,sport'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'bohemian-rhapsody-is-now-the-highest-grossing-music-biopic-of-all-time' => array(
            'title' => "“Bohemian Rhapsody” is the Highest-Grossing Biopic of All Time",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'entertainment,leisure,property',
                'post_tag' => 'entertainment,movie,music'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'mid-engined-corvette-rumor-anticipated-car-delayed-thanks-to-electrical-issue' => array(
            'title' => "Corvette: Anticipated Car Delayed Thanks To Electrical Issue",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'electrical,entertainment,property,sport',
                'post_tag' => 'car,electric,luxury'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'outfitted-and-guided-experiences-drive-tourism-revenue-in-montana' => array(
            'title' => "Outfitted and Guided Experiences Drive Tourism Revenue in Montana",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'leisure,luxury-goods,supermarkets',
                'post_tag' => 'revenue,tourism,tourist'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'india-finds-a-new-way-to-tax-google-facebook' => array(
            'title' => "India's Prime Minister: We find a New Way to Tax Google, Facebook",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'goverment,property,supply-chain',
                'post_tag' => 'economic-growth,industry,taxes'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'lowest-retail-sales-growth-for-15-years-dash-chinas-hopes' => array(
            'title' => "Lowest Retail Sales Growth for 15 Years Dash China’s Hopes About Trade War",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'economy,supermarkets',
                'post_tag' => 'economic-growth,finance,retail'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'ismga-indias-global-sports-business-academy-with-industry-insider-faculty' => array(
            'title' => "India’s Global Sports Business with ‘industry insider’ Faculty",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'economy,electrical,sport',
                'post_tag' => 'business,industry,sport'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'greeces-tourism-growth-to-level-off-in-2019' => array(
            'title' => "Greece’s Tourism Growth to ‘Level Off in 2019’ According to Revenue",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'leisure,luxury-goods,sport',
                'post_tag' => 'revenue,tourism,tourists'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'tencent-music-chinas-largest-music-streaming-service-goes-public' => array(
            'title' => "Tencent Music: China's Largest Music-Streaming Service Goes Public",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'economy,entertainment',
                'post_tag' => 'finance,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'the-bulls-versus-bears-guide-to-the-world-economy-in-2019' => array(
            'title' => "The Bulls Versus Bears Guide to the World Economy in 2019",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'economy,property,supermarkets',
                'post_tag' => 'finance,profit,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'hitachi-reaches-deal-worth-up-to-7bn-for-abbs-power-grid-business' => array(
            'title' => "Hitachi Reaches Deal Worth up to $7bn for ABB's Power Grid",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'electrical,luxury-goods',
                'post_tag' => 'car,electric,finance'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'aquaman-box-office-how-much-has-dcs-movie-made-so-far' => array(
            'title' => "Aquaman Box Office: How Much has DC's Movie Made so Far?",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'entertainment',
                'post_tag' => 'grossing,movie,revenue'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'government-hails-4-1bn-surplus-as-myefo-reveals-budget-windfall' => array(
            'title' => "Government hails $4.1bn Surplus as Myefo Reveals Budget Windfall",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'economy,electrical,goverment,luxury-goods,supply-chain',
                'post_tag' => 'budget,defisit,profit'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'jose-mourinho-manchester-united-are-physically-and-technically-inferior-to-liverpool' => array(
            'title' => "Neymar Is Only 26 Years Old and Is One of the Richest Athletes in the World",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'sport,supermarkets',
                'post_tag' => 'economic-growth,tourism,tourists'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'tourism-majority-unaware-its-nzs-biggest-earner-survey-finds' => array(
            'title' => "Tourism: Majority Unaware It's NZ's Biggest Earner, Survey Finds",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'economy,electrical,leisure,supermarkets,supply-chain',
                'post_tag' => 'economic-growth,tourism,tourists'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'using-data-to-improve-supply-chain-operations' => array(
            'title' => "Using Data to Improve Supply Chain Operations in Small Company",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'property,sport,supply-chain',
                'post_tag' => 'bag,fashion,luxury'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'lvmh-moet-hennessy-louis-vuitton-lvmuy-rating-increased-to-hold-at-zacks-investment-research' => array(
            'title' => "LVMH Moet Hennessy Louis Vuitton Rating Increased to Hold",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'luxury-goods,supply-chain',
                'post_tag' => 'bag,fashion,luxury'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'the-decline-in-the-stock-market-is-really-just-getting-started-economist' => array(
            'title' => "The Decline in The Stock Market is Really Just Getting Started: Economist",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'economy,video',
                'post_tag' => 'finance,market,revenue',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Xjp1wNBdYrA'
            )
        ),
        'uk-property-market-at-weakest-since-2012-as-brexit-takes-toll' => array(
            'title' => "UK Property Market at Weakest since 2012 as Brexit Takes Toll",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'goverment,property,sport,supply-chain',
                'post_tag' => 'market,property,real-estate'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'city-council-considers-225000-for-property-related-legal-aid' => array(
            'title' => "City Council Considers $225,000 for Property-related Legal Aid",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'economy,entertainment,leisure,property',
                'post_tag' => 'property,real-estate,taxes'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'real-estate-math-how-to-tell-if-an-investment-property-is-a-good-buy' => array(
            'title' => "Real Estate Math: How To Tell If An Investment Property Is A Good Buy",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'goverment,leisure,luxury-goods,property',
                'post_tag' => 'finance,real-estate'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'unpaid-suppliers-workers-of-supermarket-chain-in-limbo-in-uae' => array(
            'title' => "Unpaid Suppliers, Workers of Supermarket Chain in Limbo in UAE",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'entertainment,goverment,leisure,luxury-goods,supermarkets',
                'post_tag' => 'stocks,supermarket,suppliers'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'carrefour-launches-first-ever-sail-thru-supermarket-in-dubai' => array(
            'title' => "Carrefour Launches First Ever \"Sail-Thru\" Supermarket in Dubai",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'electrical,entertainment,goverment,supermarkets',
                'post_tag' => 'acquistion,retailers,stocks'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'tescos-jacks-has-a-silly-name-but-its-a-better-bet-to-succeed-than-asburys' => array(
            'title' => "Tesco's Jack's Has a Silly Name but It's a Better Bet to Succeed than Asbury's",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'entertainment,goverment,leisure,supermarkets',
                'post_tag' => 'acquistion,retailers,stocks'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Don\'t cry because it\'s over, smile because it happened.'
            )
        ),
        'bitcoin-and-stock-market-prediction-for-2019-2018-recap-performance' => array(
            'title' => "Bitcoin And Stock Market Prediction for 2019 & (2018 Recap Performance)",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'economy,video',
                'post_tag' => 'acquistion,market,supermarket',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=ApKmIip8VIA'
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1557372879519{margin-bottom: 20px !important;}.vc_custom_1557373562712{background-color: #ffffff !important;}.vc_custom_1557372211622{margin-bottom: 0px !important;}',
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1557372879519{margin-bottom: 20px !important;}.vc_custom_1557373562712{background-color: #ffffff !important;}.vc_custom_1557372211622{margin-bottom: 0px !important;}'
                )
            ),
        ),

        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1557382591029{border-top-width: 3px !important;border-top-color: #3d348b !important;border-top-style: solid !important;}.vc_custom_1557384541840{background-color: #ffffff !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-bottom:20px}.jeg_postblock_carousel_3 .jeg_post_meta{display:none}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'Recent News',
                    'header_type' => 'heading_9',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'home-sidebar-2',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '3',
                    'boxed' => '1',
                    'boxed_shadow' => '1',
                    'box_shadow' => '0',
                    'excerpt_length' => '14',
                    'content_date' => 'default',
                    'date_custom' => 'Y/m/d',
                    'content_pagination' => 'nav_1',
                    'pagination_align' => 'left',
                    'show_navtext' => '1',
                    'show_pageinfo' => '1',
                    'post_offset' => '20',
                    'posts_per_page' => '8',
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1557382591029{border-top-width: 3px !important;border-top-color: #3d348b !important;border-top-style: solid !important;}.vc_custom_1557384541840{background-color: #ffffff !important;}.jeg_content{padding-bottom:20px}.jeg_postblock_carousel_3 .jeg_post_meta{display:none}'
                )
            )
        ),

        'home-3' => array(
            'title' => 'Home 3',
            'content' => 'home3.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_elementor_data' => 'home3.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => ''
                )
            )
        ),

        'contact' => array(
            'title' => 'Contact',
            'content' => 'contact.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_elementor_data' => 'contact.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => ''
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
        'footer-navigation' => array(
            'title' => 'Footer Navigation',
            'location' => 'footer_navigation'
        ),
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

        'goverment' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Government',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:goverment:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'economy' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Economy',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:economy:id}}',
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
        'sport' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Sport',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:sport:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'property' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Property',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:property:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'leisure' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Leisure',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:living:id}}',
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
                'menu-item-title' => 'advertise',
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
        'contact-us' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contact Us',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:contact:id}}',
                'menu-item-status' => 'publish'
            )
        ),
    ),

    'widget_position' => array(
        'default-sidebar',
        'footer-widget-1',
        'footer-widget-2',
        'footer-widget-3',
        'author-sidebar',
        'home-sidebar-1',
        'home-sidebar-2',
        'archive-sidebar',
    ),

    'widget' => array(
        'widget.json',
    ),

    'customizer' => array(
        'style.json',
    ),

    'plugin' => array(
        'contact-form-7',
        'jnews-instagram',
        'jnews-breadcrumb',
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
