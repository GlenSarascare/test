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

        'logo' => 'https://jegtheme.com/asset/jnews/demo/popnews/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/popnews/logo@2x.png',

        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/popnews/logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/popnews/logo@2x.png',

        'ad_300x250' => 'http://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_345x345' => 'http://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'http://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'http://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x250.jpg'
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'beauty' =>
                array(
                    'title' =>'Beauty',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'celebrity' =>
	            array(
		            'title' =>'Celebrity',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
	            ),
            'culture' =>
	            array(
		            'title' =>'Culture',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
	            ),
            'entertainment' =>
	            array(
		            'title' =>'Entertainment',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
	            ),
            'fashion' =>
	            array(
		            'title' =>'Fashion',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
	            ),
            'living' =>
	            array(
		            'title' =>'Living',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
	            ),
            'health' =>
	            array(
		            'title' =>'Health',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
		            'parent' => 'living'
	            ),
            'travel' =>
	            array(
		            'title' =>'Travel',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
                    'parent' => 'living'
	            ),
            'world' =>
	            array(
		            'title' =>'World',
		            'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
	            ),
        ),
        'post_tag' => array(
            'arya-stark' => array(
                'title' => 'Arya Stark'
            ),
            'avengers-endgame' => array(
                'title' => 'Avengers: Endgame'
            ),
            'billboard' => array(
                'title' => 'Billboard'
            ),
            'game-of-thrones' => array(
                'title' => 'Game of Thrones'
            ),
            'holliwood' => array(
                'title' => 'Holliwood'
            ),
            'movie' => array(
                'title' => 'Movie'
            ),
            'music' => array(
                'title' => 'Music'
            ),
            'shopie-turner' => array(
                'title' => 'Shopie Turner'
            ),
            'tv-shows' => array(
                'title' => 'TV Shows'
            ),
        )
    ),

    // post & page
    'post' => array(
        'velicia-huston-on-growing-up-and-growing-older-in-hollywood' => array(
            'title' => "Velicia Huston On growing up and growing older in Hollywood",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'entertainment',
                'post_tag' => '2018-league,budget-travel,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}'),
                'post_subtitle' => 'The cost of beating Oprah at the Oscars, and why Jack Nicholson doesn’t act anymore.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'cobra-kai-season-2-is-a-fun-tragic-journey-that-leaves-you-wanting-more' => array(
            'title' => "'Cobra Kai' Season 2 is a Fun, Tragic Journey That Leaves You Wanting More",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'entertainment',
                'post_tag' => 'bali-united,budget-travel,champions-league,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'this-years-go-to-tropical-vacation-spot-is-baha-mar-in-the-bahamas' => array(
            'title' => "This Year's Go-To Tropical Vacation Spot Is Baha Mar in the Bahamas",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'living,travel',
                'post_tag' => '2018-league,bali-united,doctor-terawan,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'these-gucci-baroque-sets-are-the-ultimate-spring-head-turners' => array(
            'title' => "These Gucci Baroque Sets Are the Ultimate Spring Head-Turners",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'culture,fashion,living',
                'post_tag' => 'bali-united,budget-travel,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'supreme-reveals-full-jean-paul-gaultier-collection-dropping-this-week' => array(
            'title' => "Supreme Reveals Full Jean Paul Gaultier Collection, Dropping This Week",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'fashion',
                'post_tag' => 'balinese-culture,champions-league,chopper-bike,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}'),
                'post_subtitle' => 'Great news for the HYPEBEAST wannabe',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'your-blonde-hair-needs-these-purple-shampoos-for-sure' => array(
            'title' => "Your Blonde Hair Needs These Purple Shampoos, For Sure",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'beauty,health',
                'post_tag' => '2018-league,balinese-culture,chopper-bike,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'exactly-what-to-eat-for-a-week-to-lose-weight-the-healthy-way' => array(
            'title' => "Exactly What to Eat For a Week to Lose Weight, The Healthy Way",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'health',
                'post_tag' => 'balinese-culture,budget-travel,champions-league,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                'post_subtitle' => 'A diet that will help you lose weight',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'i-went-to-a-couples-resort-with-my-mom-and-it-was-actually-super-chill' => array(
            'title' => "I Went to a Couples Resort With My Mom And It Was Actually Super Chill",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'travel',
                'post_tag' => 'champions-league,doctor-terawan,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'these-things-you-should-know-before-getting-lip-injections' => array(
            'title' => "These Things You Should Know Before Getting Lip Injections",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'beauty,health',
                'post_tag' => 'budget-travel,champions-league,doctor-terawan,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'the-most-outrageous-kim-khasyian-outfits-of-all-time' => array(
            'title' => "The Most Outrageous Kim Khasyian Outfits of All Time",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'celebrity,culture,fashion',
                'post_tag' => 'balinese-culture,chopper-bike,istana-negara,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}'),
                'post_subtitle' => 'OMG! this is just hilarious.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'our-picks-of-the-best-workwear-style-jackets-for-every-budget' => array(
            'title' => "Our Picks of the Best Workwear-Style Jackets for Every Budget",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'fashion,travel',
                'post_tag' => 'bali-united,budget-travel,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'these-7-creams-will-turn-your-feet-into-silky-little-nuggets' => array(
            'title' => "These 7 Creams Will Turn Your Feet Into Silky Little Nuggets",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'beauty,health',
                'post_tag' => '2018-league,bali-united,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'travis-scott-is-the-latest-person-to-ride-the-baggy-cargo-pants-wave' => array(
            'title' => "Travis Scott Is the Latest Person to Ride the Baggy Cargo Pants Wave",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'culture,fashion,living',
                'post_tag' => 'budget-travel,istana-negara,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'how-to-avoid-avengers-endgame-spoilers-online' => array(
            'title' => "How to Avoid Avengers: Endgame Spoilers Online",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'culture,entertainment,living',
                'post_tag' => 'balinese-culture,chopper-bike,doctor-terawan,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}'),
                'post_subtitle' => 'Avengers: Endgame Is Truly A Marvel',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'kim-kardashian-shares-her-perspective-on-the-college-cheating-scandal' => array(
            'title' => "Kim Kardashian Shares Her Perspective on the College Cheating Scandal",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'celebrity,entertainment,fashion',
                'post_tag' => 'balinese-culture,budget-travel,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'so-this-is-ginger-beer-co-beer-and-its-brewed-with-sweet-orange' => array(
            'title' => "So This Is 'Ginger Beer Co' Beer and It’s Brewed With Sweet Orange",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'culture,health,living,travel',
                'post_tag' => '2018-league,champions-league,chopper-bike,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'here-is-the-ultimate-road-trip-playlist-to-kick-tour-travels-into-high-gear' => array(
            'title' => "Here is The Ultimate Road Trip Playlist To Kick Tour Travels Into High Gear",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'culture,entertainment,travel',
                'post_tag' => 'balinese-culture,budget-travel,champions-league,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'you-need-to-read-this-before-getting-lash-extensions' => array(
            'title' => "You Need to Read This Before Getting Lash Extensions",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'beauty,celebrity,culture',
                'post_tag' => 'bali-united,chopper-bike,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                'post_subtitle' => 'You need to read this before booking your appointment.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        '10-shoes-to-wear-if-you-love-walking-and-hate-being-uncomfy' => array(
            'title' => "10 Shoes to Wear if You Love Walking and Hate Being Uncomfy",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'fashion,living,travel',
                'post_tag' => 'balinese-culture,chopper-bike,istana-negara,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'i-was-not-expecting-maisie-williamss-response-to-that-game-of-thrones-scene' => array(
            'title' => "I Was Not Expecting Maisie Williams's Response to That Game Of Thrones Scene",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'celebrity,culture,entertainment',
                'post_tag' => '2018-league,bali-united,budget-travel,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'your-instant-pot-will-come-in-handy-for-all-these-healthy-recipes' => array(
            'title' => "Your Instant Pot Will Come in Handy For All These Healthy Recipes",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'beauty,health,living',
                'post_tag' => '2018-league,balinese-culture,doctor-terawan,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        '6-perfect-places-to-watch-the-sunrise-in-bali-while-you-honeymoon' => array(
            'title' => "6 Perfect Places To Watch The Sunrise in Bali While You Honeymoon",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'culture,living,travel',
                'post_tag' => 'budget-travel,champions-league,istana-negara,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'fashion-girls-these-are-the-17-chic-flats-everyone-will-want-in-2019' => array(
            'title' => "Fashion Girls! These Are the 17 Chic Flats Everyone Will Want in 2019",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'celebrity,entertainment,fashion',
                'post_tag' => 'bali-united,balinese-culture,doctor-terawan,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'what-your-legs-could-be-telling-you-about-your-heart-health' => array(
            'title' => "What Your Legs Could Be Telling You About Your Heart Health",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'beauty,culture,health',
                'post_tag' => 'bali-united,balinese-culture,market-stories,national-exam'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'the-important-things-you-learn-when-you-move-to-a-foreign-country' => array(
            'title' => "The Important Things You Learn When You Move to a Foreign Country",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'culture,living,travel',
                'post_tag' => '2018-league,bali-united,budget-travel,chopper-bike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:security:id}}'),
                'post_subtitle' => 'What Is It Like to Move to Another Country?',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'the-softest-prettiest-highlighters-you-should-already-be-using' => array(
            'title' => "The Softest, Prettiest Highlighters You Should Already Be Using",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'beauty,health,living',
                'post_tag' => 'balinese-culture,champions-league,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:devices:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'miguel-delivers-a-party-for-the-end-of-the-world-on-war-leisure' => array(
            'title' => "Miguel Delivers a Party for the End of the World on ‘War & Leisure’",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'celebrity,entertainment,travel',
                'post_tag' => 'bali-united,balinese-culture,chopper-bike,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'blue-fear-re-releasing-their-iconic-blue-denim-jacket' => array(
            'title' => "BLUE & FEAR Re-Releasing Their Iconic Blue Denim Jacket",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'culture,fashion',
                'post_tag' => '2018-league,bali-united,champions-league,chopper-bike'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'twitter-proves-adidas-superstars-still-dominate-fashionable-footwear' => array(
            'title' => "Twitter Proves Adidas Superstars Still Dominate Fashionable Footwear",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'culture,fashion,living',
                'post_tag' => '2018-league,balinese-culture,budget-travel,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'new-gucci-campaign-takes-pre-fall-2019-collection-to-ancient-sicilian-ruins' => array(
            'title' => "New Gucci Campaign Takes Pre-Fall 2019 Collection to Ancient Sicilian Ruins",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'culture,fashion',
                'post_tag' => 'budget-travel,champions-league,doctor-terawan,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0',
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
                            'share_position' => 'float',
                            'share_float_style' => 'share-normal',
                            'show_share_counter' => '1',
                            'show_view_counter' => '1',
                            'show_featured' => '0',
                            'show_post_meta' => '1',
                            'show_post_author' => '0',
                            'show_post_author_image' => '0',
                            'show_post_date' => '1',
                            'post_date_format' => 'default',
                            'post_date_format_custom' => 'Y/m/d',
                            'show_post_category' => '0',
                            'show_post_reading_time' => '1',
                            'post_reading_time_wpm' => '300',
                            'show_post_tag' => '1',
                            'show_prev_next_post' => '0',
                            'show_popup_post' => '1',
                            'number_popup_post' => '1',
                            'show_author_box' => '1',
                            'show_post_related' => '0',
                            'show_inline_post_related' => '1',
                        )
                    ),
                    'override_image_size' => '1',
                    'image_override' => array(
                        array(
                            'single_post_thumbnail_size' => 'no-crop',
                            'single_post_gallery_size' => 'crop-500',
                        )
                    )
                )
            )
        ),
        'california-fires-this-is-what-happens-when-you-breathe-in-smoke' => array(
            'title' => "California Fires: This Is What Happens When You Breathe In Smoke",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'beauty,health,living',
                'post_tag' => 'bali-united,champions-league,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:games:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'economists-see-few-monetary-policy-changes-with-powell-leading-fed' => array(
            'title' => "Game of Thrones Is a Bleak Extended Metaphor for Overparenting",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'celebrity,entertainment,fashion,living',
                'post_tag' => 'chopper-bike,doctor-terawan,national-exam,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}'),
                'post_subtitle' => 'A budget tells us what we can\'t afford, but it doesn\'t keep us from buying it.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'jekardah-nightlife-offers-many-hotspots-for-people-with-alternative-lifestyles' => array(
            'title' => "Kuta Offers Many Hotspots for People with Alternative Lifestyles",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'culture,living,travel',
                'post_tag' => 'chopper-bike,doctor-terawan,istana-negara,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'these-foods-to-absolutely-avoid-if-you-want-clear-glowing-skin' => array(
            'title' => "These Foods to Absolutely Avoid If You Want Clear, Glowing Skin",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'beauty,health,living',
                'post_tag' => 'balinese-culture,champions-league,market-stories,visit-bali'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:reviews:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'instagram-is-testing-photo-albums-because-nothing-is-sacred-anymore' => array(
            'title' => "Instagram Is Testing Photo Albums, Because Nothing Is Sacred Anymore",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'culture,entertainment,living',
                'post_tag' => '2018-league,bali-united,budget-travel,istana-negara'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:compares:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        '10-fashion-stories-from-around-the-web-you-might-have-missed-this-week' => array(
            'title' => "10 Fashion Stories From Around The Web You Might Have Missed This Week",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'entertainment,fashion,living',
                'post_tag' => 'bali-united,balinese-culture,budget-travel,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:photography:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'exclusive-selena-gomez-reveals-why-she-reconnected-with-justin-bieber' => array(
            'title' => "Exclusive: Selena Gomez Reveals Why She Reconnected with Justin Bieber",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'beauty,celebrity,entertainment,living',
                'post_tag' => 'bali-united,balinese-culture,budget-travel,market-stories'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:news:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),
        'elton-john-tells-noel-gallagher-what-he-thinks-about-his-new-album' => array(
            'title' => "Elton John Tells Noel Gallagher What He Thinks About His New Album",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'celebrity,culture,entertainment,fashion',
                'post_tag' => '2018-league,bali-united,chopper-bike,doctor-terawan'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category:apps:id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=YdJc7-ZEuT0'
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1556786165305{padding-top: 40px !important;padding-bottom: 10px !important;background-color: #eeeeee !important;}.vc_custom_1556783080348{margin-bottom: 0px !important;}.vc_custom_1556778210995{margin-top: 0px !important;}.vc_custom_1556784492979{margin-top: 0px !important;margin-bottom: 20px !important;}.vc_custom_1556855521508{margin-bottom: 0px !important;}.vc_custom_1556778909754{padding: 25px !important;border: 4px solid #000000 !important;}.vc_custom_1556788093270{margin-top: 0px !important;margin-bottom: 20px !important;}.vc_custom_1556790860799{margin-top: 0px !important;margin-bottom: 20px !important;}.vc_custom_1556790815112{margin-top: 0px !important;margin-bottom: 20px !important;}',
                '_wpb_post_custom_css' => '.jeg_postblock_12 .jeg_post_title{font-size:32px}.jeg_postblock_29 .jeg_post_title{font-size:18px;line-height:1.6;font-weight:700}.jeg_postblock_4 .jeg_post_title{font-size:21px}@media only screen and (max-width:480px){.jeg_postblock_12 .jeg_post_title{font-size:18px!important}.jeg_postblock_4 .jeg_post_title{font-size:16px}}.jeg_postblock_27.jeg_col_2o3 .jeg_post_title{font-size:24px}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'LATEST STORIES',
                    'header_type' => 'heading_8',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'home',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '5',
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
                    'post_offset' => '3',
                    'posts_per_page' => '10',
                    'sort_by' => 'latest'
                ),
                'jnews_single_page' => array(
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'show_post_featured' => '1',
                    'show_post_meta' => '0',
                    'share_position' => 'top',
                    'share_color' => 'share-monocrhome'
                ),
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1556786165305{padding-top: 40px !important;padding-bottom: 10px !important;background-color: #eeeeee !important;}.vc_custom_1556783080348{margin-bottom: 0px !important;}.vc_custom_1556778210995{margin-top: 0px !important;}.vc_custom_1556784492979{margin-top: 0px !important;margin-bottom: 20px !important;}.vc_custom_1556855521508{margin-bottom: 0px !important;}.vc_custom_1556778909754{padding: 25px !important;border: 4px solid #000000 !important;}.vc_custom_1556788093270{margin-top: 0px !important;margin-bottom: 20px !important;}.vc_custom_1556790860799{margin-top: 0px !important;margin-bottom: 20px !important;}.vc_custom_1556790815112{margin-top: 0px !important;margin-bottom: 20px !important;}.jeg_postblock_12 .jeg_post_title{font-size:32px}.jeg_postblock_29 .jeg_post_title{font-size:18px;line-height:1.6;font-weight:700}.jeg_postblock_4 .jeg_post_title{font-size:21px}@media only screen and (max-width:480px){.jeg_postblock_12 .jeg_post_title{font-size:18px!important}.jeg_postblock_4 .jeg_post_title{font-size:16px}}.jeg_postblock_27.jeg_col_2o3 .jeg_post_title{font-size:24px}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1556862768417{margin-bottom: 30px !important;padding-top: 15px !important;padding-bottom: 15px !important;background-color: #f7f7f7 !important;}.vc_custom_1556856863587{margin-bottom: 0px !important;}.vc_custom_1556616570270{margin-top: 0px !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0}.jeg_heroblock_13.jeg_hero_style_7 .jeg_post_title{font-size:32px;line-height:1.4}@media only screen and (max-width:1024px){.jeg_heroblock_13.jeg_hero_style_7 .jeg_postblock_content{width:70%}.jeg_heroblock_13.jeg_hero_style_7 .jeg_post_title{font-size:26px}}@media only screen and (max-width:480px){.jeg_heroblock_13.jeg_hero_style_7 .jeg_post_title{font-size:16px}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'LATEST STORIES',
                    'header_type' => 'heading_8',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'home',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '5',
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
                    'post_offset' => '3',
                    'posts_per_page' => '10',
                    'sort_by' => 'latest'
                ),
                'jnews_single_page' => array(
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'show_post_featured' => '1',
                    'show_post_meta' => '0',
                    'share_position' => 'top',
                    'share_color' => 'share-monocrhome'
                ),
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1556862768417{margin-bottom: 30px !important;padding-top: 15px !important;padding-bottom: 15px !important;background-color: #f7f7f7 !important;}.vc_custom_1556856863587{margin-bottom: 0px !important;}.vc_custom_1556616570270{margin-top: 0px !important;}.jeg_content{padding-top:0}.jeg_heroblock_13.jeg_hero_style_7 .jeg_post_title{font-size:32px;line-height:1.4}@media only screen and (max-width:1024px){.jeg_heroblock_13.jeg_hero_style_7 .jeg_postblock_content{width:70%}.jeg_heroblock_13.jeg_hero_style_7 .jeg_post_title{font-size:26px}}@media only screen and (max-width:480px){.jeg_heroblock_13.jeg_hero_style_7 .jeg_post_title{font-size:16px}}'
                )
            )
        ),
        'home-3' => array(
            'title' => 'Home 3',
            'content' => 'home3.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1556867794290{margin-bottom: 30px !important;background-color: #f7f7f7 !important;background-position: 0 0 !important;background-repeat: repeat !important;}.vc_custom_1556868392220{margin-bottom: 30px !important;padding-top: 20px !important;padding-bottom: 20px !important;background-color: #eeeeee !important;}.vc_custom_1556866939926{margin-top: 15px !important;margin-bottom: 15px !important;}.vc_custom_1556867775129{margin-bottom: 30px !important;}.vc_custom_1556769382872{margin-bottom: 15px !important;}.vc_custom_1556868233361{margin-bottom: 0px !important;}.vc_custom_1556769358525{padding: 25px !important;border: 4px solid #000000 !important;}.vc_custom_1556770031137{margin-bottom: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}.vc_custom_1556769389665{margin-bottom: 15px !important;}.vc_custom_1556868796898{margin-bottom: 0px !important;}.vc_custom_1556769389665{margin-bottom: 15px !important;}',
                '_wpb_post_custom_css' => '.jeg_content{padding-top:0}.jeg_heroblock_13 .jeg_post_title{font-size:32px;line-height:1.4}.jeg_postblock_10 .jeg_post_title{font-size:30px;line-height:1.4em;margin-bottom:.5em}.jeg_postblock_6 .jeg_post{border-bottom:1px solid #eee;margin-bottom:30px}@media only screen and (min-width:736px){.jeg_postblock_6 .jeg_post_title{font-size:24px!important}}@media only screen and (min-width:1024px){.jeg_postblock_6 .jeg_post_title{font-size:30px!important;line-height:1.45em;margin-bottom:.5em}}.jeg_postblock_5.highlight .jeg_post{display:flex;align-items:center}.jeg_postblock_5.highlight .jeg_thumb{width:50%;flex:1 0 auto}.jeg_postblock_5.highlight .jeg_postblock_content{padding:20px 40px 0 20px}.jeg_postblock_5.highlight .jeg_post_title{font-size:28px}@media only screen and (min-width:567px){.jeg_postblock_37.jeg_col_3o3 .jeg_post{width:33.333333333%}}@media only screen and (max-width:768px){.jeg_postblock_5.highlight .jeg_post_title{font-size:24px}.jeg_postblock_5.highlight .jeg_post_excerpt p{display:none}.jeg_postblock_6 .jeg_readmore{display:none}}@media only screen and (max-width:736px){.jeg_postblock_5.highlight .jeg_post_title{font-size:18px}.jeg_postblock_5.highlight .jeg_postblock_content{padding:20px 20px 20px 10px}}@media only screen and (max-width:667px){.jeg_postblock_5.highlight .jeg_readmore{display:none}}@media only screen and (max-width:667px){.jeg_postblock_5.highlight .jeg_post_title{font-size:13px}.jeg_postblock_5.highlight .jeg_postblock_content{padding:0 10px 0 0}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'LATEST STORIES',
                    'header_type' => 'heading_8',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'home',
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
                    'post_offset' => '5',
                    'posts_per_page' => '10',
                    'sort_by' => 'latest'
                ),
                'jnews_single_page' => array(
                    'layout' => 'no-sidebar',
                    'sidebar' => 'default-sidebar',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'show_post_featured' => '1',
                    'show_post_meta' => '0',
                    'share_position' => 'top',
                    'share_color' => 'share-monocrhome'
                ),
                '_elementor_data' => 'home3.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1556867794290{margin-bottom: 30px !important;background-color: #f7f7f7 !important;background-position: 0 0 !important;background-repeat: repeat !important;}.vc_custom_1556868392220{margin-bottom: 30px !important;padding-top: 20px !important;padding-bottom: 20px !important;background-color: #eeeeee !important;}.vc_custom_1556866939926{margin-top: 15px !important;margin-bottom: 15px !important;}.vc_custom_1556867775129{margin-bottom: 30px !important;}.vc_custom_1556769382872{margin-bottom: 15px !important;}.vc_custom_1556868233361{margin-bottom: 0px !important;}.vc_custom_1556769358525{padding: 25px !important;border: 4px solid #000000 !important;}.vc_custom_1556770031137{margin-bottom: 0px !important;border-top-width: 0px !important;border-right-width: 0px !important;border-bottom-width: 0px !important;border-left-width: 0px !important;padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;}.vc_custom_1556769389665{margin-bottom: 15px !important;}.vc_custom_1556868796898{margin-bottom: 0px !important;}.vc_custom_1556769389665{margin-bottom: 15px !important;}.jeg_content{padding-top:0}.jeg_heroblock_13 .jeg_post_title{font-size:32px;line-height:1.4}.jeg_postblock_10 .jeg_post_title{font-size:30px;line-height:1.4em;margin-bottom:.5em}.jeg_postblock_6 .jeg_post{border-bottom:1px solid #eee;margin-bottom:30px}@media only screen and (min-width:736px){.jeg_postblock_6 .jeg_post_title{font-size:24px!important}}@media only screen and (min-width:1024px){.jeg_postblock_6 .jeg_post_title{font-size:30px!important;line-height:1.45em;margin-bottom:.5em}}.jeg_postblock_5.highlight .jeg_post{display:flex;align-items:center}.jeg_postblock_5.highlight .jeg_thumb{width:50%;flex:1 0 auto}.jeg_postblock_5.highlight .jeg_postblock_content{padding:20px 40px 0 20px}.jeg_postblock_5.highlight .jeg_post_title{font-size:28px}@media only screen and (min-width:567px){.jeg_postblock_37.jeg_col_3o3 .jeg_post{width:33.333333333%}}@media only screen and (max-width:768px){.jeg_postblock_5.highlight .jeg_post_title{font-size:24px}.jeg_postblock_5.highlight .jeg_post_excerpt p{display:none}.jeg_postblock_6 .jeg_readmore{display:none}}@media only screen and (max-width:736px){.jeg_postblock_5.highlight .jeg_post_title{font-size:18px}.jeg_postblock_5.highlight .jeg_postblock_content{padding:20px 20px 20px 10px}}@media only screen and (max-width:667px){.jeg_postblock_5.highlight .jeg_readmore{display:none}}@media only screen and (max-width:667px){.jeg_postblock_5.highlight .jeg_post_title{font-size:13px}.jeg_postblock_5.highlight .jeg_postblock_content{padding:0 10px 0 0}}'
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

        'celebrity' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Celebrity',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:celebrity:id}}',
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
        'beauty' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Beauty',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:beauty:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'culture' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Culture',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:culture:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'fashion' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Fashion',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:fashion:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'living' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Living',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:living:id}}',
                'menu-item-status' => 'publish'
            ),
            'metabox' => array(
                'menu_item_jnews_mega_menu' => array(
                    'type' => 'category_2',
                    'category' => '{{category:living:id}}',
                    'number' => 6,
                    'trending_tag' => '{{taxonomy:post_tag:game-of-thrones:id}},{{taxonomy:post_tag:avengers-endgame:id}},{{taxonomy:post_tag:billboard:id}},{{taxonomy:post_tag:holliwood:id}},{{taxonomy:post_tag:music:id}}',
                ),
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
        'home-3-mobile' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Home - Layout 3',
                'menu-item-parent-id' => '{{menu:home-mobile:id}}',
                'menu-item-type' => 'post_type',
                'menu-item-object' => 'page',
                'menu-item-object-id' => '{{post:home-3:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'landing' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Landing Page',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io/landing/',
                'menu-item-status' => 'publish'
            )
        ),
        'buy' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Buy JNews',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
                'menu-item-status' => 'publish'
            )
        ),
        'support' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Support Forum',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
                'menu-item-status' => 'publish'
            )
        ),
        'pre' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Pre-sale Question',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://themeforest.net/item/jnews-one-stop-solution-for-web-publishing/20566392/comments?ref=jegtheme',
                'menu-item-status' => 'publish'
            )
        ),
        'contact' => array(
            'location' => 'mobile-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contact Us',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://themeforest.net/user/jegtheme?ref=jegtheme',
                'menu-item-status' => 'publish'
            )
        ),

        // Footer Menu
        'about-us-1' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'About Us',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'landing-2' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'http://jnews.io',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io/',
                'menu-item-status' => 'publish'
            )
        ),
        'buy-2' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Buy JNews',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
                'menu-item-status' => 'publish'
            )
        ),

        // Topbar Menu
        'landing-1' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Landing Page',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io/landing/',
                'menu-item-status' => 'publish'
            )
        ),
        'shop' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Shop',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://jnews.io/landing/',
                'menu-item-status' => 'publish'
            )
        ),
        'contact-1' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Contact',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'buy-1' => array(
            'location' => 'top-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Buy JNews',
                'menu-item-type' => 'custom',
                'menu-item-url' => 'https://themeforest.net/item/jnews-wordpress-blog-news-magazine-newspaper-theme/20566392?ref=jegtheme&license=regular&open_purchase_for_item_id=20566392',
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
        'jnews-auto-load-post',
        'jnews-essential',
	    'jnews-customizer-category',
        'jnews-front-translation',
	    'jnews-instagram',
        'jnews-jsonld',
        'jnews-meta-header',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-view-counter',
        'mailchimp-for-wp'
    )

);