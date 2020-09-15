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

        'logo' => 'https://jegtheme.com/asset/jnews/demo/craft/logo.png',
        'logo2x' => 'https://jegtheme.com/asset/jnews/demo/craft/logo@2x.png',

        'mobile_logo' => 'https://jegtheme.com/asset/jnews/demo/craft/logo.png',
        'mobile_logo2x' => 'https://jegtheme.com/asset/jnews/demo/craft/logo@2x.png',

        'ad_300x250' => 'http://jegtheme.com/asset/jnews/demo/default/ad_300x250.jpg',
        'ad_345x345' => 'http://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
        'ad_728x90' => 'http://jegtheme.com/asset/jnews/demo/default/ad_728x90.png',
        'ad_300x600' => 'http://jegtheme.com/asset/jnews/demo/default/ad_300x600.jpg',
        'ad_970x250' => 'https://jegtheme.com/asset/jnews/demo/default/ad_970x250.jpg'
    ),

    // create taxonomy
    'taxonomy' => array(
        'category' => array(
            'beadwork' =>
                array(
                    'title' =>'Beadwork',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'craft' =>
                array(
                    'title' =>'Craft',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'decoration' =>
                array(
                    'title' =>'Decoration',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'diy' =>
                array(
                    'title' =>'DIY',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'food-and-receips' =>
                array(
                    'title' =>'Food &amp; Receips',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'hobbies' =>
                array(
                    'title' =>'Hobbies',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'kids-craft' =>
                array(
                    'title' =>'Kids Craft',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
                ),
            'lifehack' =>
                array(
                    'title' =>'Lifehacks',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
                ),
            'paper-craft' =>
                array(
                    'title' =>'Paper Craft',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
            'video' =>
                array(
                    'title' =>'Video',
                    'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.'
                ),
        ),
        'post_tag' => array(
            '5-minutes' => array(
                'title' => '5-minutes'
            ),
            'birthday' => array(
                'title' => 'birthday'
            ),
            'craft' => array(
                'title' => 'craft'
            ),
            'decoration' => array(
                'title' => 'decoration'
            ),
            'diy' => array(
                'title' => 'diy'
            ),
            'drone' => array(
                'title' => 'drone'
            ),
            'food' => array(
                'title' => 'food'
            ),
            'gift' => array(
                'title' => 'gift'
            ),
            'homemade' => array(
                'title' => 'homemade'
            ),
            'kids' => array(
                'title' => 'homemade'
            ),
            'occasions' => array(
                'title' => 'occasions'
            ),
            'paper' => array(
                'title' => 'paper'
            ),
            'party' => array(
                'title' => 'party'
            ),
            'simple' => array(
                'title' => 'simple'
            ),
            'tools' => array(
                'title' => 'tools'
            ),
            'valentine' => array(
                'title' => 'valentine'
            ),
        )
    ),

    // post & page
    'post' => array(
        'how-to-make-diy-with-simple-stuff' => array(
            'title' => "How to Make DIY with Simple Stuff",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'lifehack',
                'post_tag' => '5-minutes,diy,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'here-are-some-ideas-for-how-to-recycle-old-windows-as-decor' => array(
            'title' => "Here are Some Ideas for How to Recycle Windows as Home Decor",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'decoration,hobbies',
                'post_tag' => 'drone,homemade,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'beautiful-birthday-greeting-card-idea' => array(
            'title' => "Beautiful Birthday Greeting Card Idea with Simple Stuff",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'video',
                'post_tag' => 'birthday,homemade,simple',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=XFRC5YY74-E'
            )
        ),
        'reuse-the-guts-of-a-cheap-quadcopter-to-make-a-mini-strandbeest' => array(
            'title' => "Reuse the Guts of a Quadcopter to Make a Mini Strandbeest",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'kids-craft',
                'post_tag' => 'drone,homemade,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'wesome-diy-idea-from-dc-motor' => array(
            'title' => "Awesome DIY Idea From DC Motor - Study Case: Drone",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'video',
                'post_tag' => 'diy,homemade,tools',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=B3ofZL-eW74'
            )
        ),
        'bread-stencils-are-like-arts-crafts-all-over-again' => array(
            'title' => "How to Make Bread Stencils Are Like Arts & Crafts All Over Again",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'beadwork,food-and-receips',
                'post_tag' => 'diy,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'the-clever-ways-you-never-thought-to-display-your-plants' => array(
            'title' => "The Clever Ways You Never Thought to Display Your Plants",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'decoration,kids-craft',
                'post_tag' => 'diy,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'create-a-cabinet-of-curiousities-using-recycle-stuff' => array(
            'title' => "Create a Cabinet of Curiousities using Recycle Stuff",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'hobbies,lifehack,paper-craft',
                'post_tag' => 'diy,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'house-plants-for-people-who-are-bad-at-house-plants' => array(
            'title' => "House Plants for People Who Are Bad At House Plants",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'beadwork,craft,kids-craft',
                'post_tag' => 'drone,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'hang-on-the-wall-in-a-craft-room' => array(
            'title' => "Hang on the Wall in a Craft Room",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'decoration,hobbies,paper-craft',
                'post_tag' => 'decoration,paper,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'the-home-depot-decor-line-in-the-new-kids-bedroom' => array(
            'title' => "The Home Depot Decor Line In The New Kids Bedroom",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'kids-craft,lifehack',
                'post_tag' => 'food,gift,homemade'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'games'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'essential-suitcase-packing-tips-every-traveler-should-know' => array(
            'title' => "Essential Suitcase Packing Tips Every Traveler Should Know",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'beadwork,lifehack',
                'post_tag' => 'food,homemade,paper,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'apps')
            )
        ),
        'five-reasons-to-finally-buy-a-sewing-machine' => array(
            'title' => "Five Reasons to Finally Buy A Sewing Machine",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'craft,decoration,hobbies',
                'post_tag' => 'decoration,gift,paper,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'create-a-shadowbox-vignette-using-vintage-finds' => array(
            'title' => "Create a Shadowbox Vignette Using Vintage Finds",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'craft,decoration,diy,hobbies',
                'post_tag' => '5-minutes,decoration,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'photography'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'turn-a-printers-tray-into-a-vertical-planter' => array(
            'title' => "Turn a Printer's Tray Into a Vertical Planter",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'craft,decoration,diy,hobbies',
                'post_tag' => '5-minutes,decoration,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'the-neat-pain-free-way-to-peel-hard-boiled-eggs' => array(
            'title' => "The Neat, Pain-Free Way to Peel Hard Boiled Eggs",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'craft,diy,food-and-receips,lifehack',
                'post_tag' => 'decoration,simple,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'devices'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'organize-all-your-jewelry-and-scarves' => array(
            'title' => "Organize All Your Jewelry and Scarves",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'beadwork,craft,decoration,diy,lifehack',
                'post_tag' => 'decoration,simple,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'the-ultimate-easy-summer-crafts-for-your-kids-at-home' => array(
            'title' => "The Ultimate Easy Summer Crafts for Your Kids at Home",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'beadwork,diy,kids-craft,lifehack',
                'post_tag' => '5-minutes,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'DIYs for kiddos to inspire some creativity and entertainment.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'creative-ways-to-use-letterpress-drawers-you-might-never-known' => array(
            'title' => "Creative Ways to Use Letterpress Drawers You Might Never Known",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'beadwork,craft,diy,lifehack',
                'post_tag' => '5-minutes,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'wood-pallet-outdoor-table-with-succulent-garden' => array(
            'title' => "Wood Pallet Outdoor Table With Succulent Garden",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'beadwork,craft,diy,lifehack',
                'post_tag' => '5-minutes,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'Design tips to creating stylish non-gender bedrooms for kids of all ages.',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'how-to-upgrade-your-curtains-for-home-furniture' => array(
            'title' => "How to Upgrade Your Curtains for Home Furniture",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'beadwork,craft,diy,lifehack',
                'post_tag' => '5-minutes,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'A wonderful serenity has taken possession of my entire soul',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'diy-ways-to-revive-furniture-with-decorative-hardware' => array(
            'title' => "DIY Ways to Revive Furniture With Decorative Hardware",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'decoration,diy,lifehack',
                'post_tag' => '5-minutes,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'A wonderful serenity has taken possession of my entire soul',
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'simple-tricks-ingenious-ikea-billy-bookcase-hacks' => array(
            'title' => "Simple Tricks Ingenious IKEA BILLY Bookcase Hacks",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'decoration,diy,paper-craft',
                'post_tag' => '5-minutes,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'how-to-build-your-own-desk-for-less' => array(
            'title' => "How to Build Your Own Desk for Less from Furniture",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'diy,video',
                'post_tag' => 'homemade,simple,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'replace-your-nonstick-spray-with-this-clever-diy' => array(
            'title' => "Replace Your Nonstick Spray with This Clever DIY",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'food-and-receips,video',
                'post_tag' => 'food,homemade,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'diy-super-easy-way-to-make-a-dreamcatcher' => array(
            'title' => "DIY Super Easy Way to Make a Dreamcatcher",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'decoration,kids-craft,lifehack,video',
                'post_tag' => '5-minutes,diy,simple',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=PGpiHzxooTo'
            )
        ),
        'tulip-one-step-tie-dye-kit-for-kids' => array(
            'title' => "How to Create Tulip One-Step Tie-Dye Kit for Kids",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'craft,hobbies,kids-craft',
                'post_tag' => '5-minutes,kids,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'games'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'thanksgiving-paper-cone-gratitude-wreath-for-christmas-party' => array(
            'title' => "Thanksgiving Paper Cone Gratitude Wreath for Christmas Party",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'decoration,video',
                'post_tag' => '5-minutes,diy,party'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'make-your-own-masterpiece-with-this-easy-paper-art-diy' => array(
            'title' => "Make Your Own Masterpiece With This Easy Paper Art DIY",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'diy,kids-craft,paper-craft,video',
                'post_tag' => 'craft,gift,valentine'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'ambitious-cooking-projects-for-the-adventurous-cook-in-all-of-us' => array(
            'title' => "Ambitious Cooking Projects for the Adventurous Cook in All of Us",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'food-and-receips',
                'post_tag' => '5-minutes,food,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'diy-tools-organizer-organize-craft-supplies-in-a-more-stylish-way' => array(
            'title' => "DIY Tools Organizer: Organize Craft Supplies In A More Stylish Way",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'decoration,hobbies,paper-craft',
                'post_tag' => '5-minutes,craft,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'A wonderful serenity has taken possession of my entire soul.'
            )
        ),
        'diy-mens-halloween-costumes-every-cool-dad-will-appreciate' => array(
            'title' => "DIY Men’s Halloween Costumes Every Cool Dad Will Appreciate",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'craft,video',
                'post_tag' => 'homemade,occasions',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=HzWe3zP2Tcc'
            )
        ),
        '32-last-minute-diy-christmas-gifts-your-dad-will-actually-use' => array(
            'title' => "DIY Christmas Gifts Wrap Ideas For Your Best Mate",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'food-and-receips,paper-craft',
                'post_tag' => 'gift,occasions,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time.'
            )
        ),
        'turn-beautiful-photos-of-the-country-into-works-of-art' => array(
            'title' => "Turn Beautiful Photos of the Country Into Works of Art",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'decoration,paper-craft',
                'post_tag' => 'craft,diy,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'how-to-create-homemade-english-muffins' => array(
            'title' => "How to Create Homemade English Muffins",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'food-and-receips,paper-craft',
                'post_tag' => 'craft,gift,party'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'how-to-create-your-own-dyed-wall-hangings' => array(
            'title' => "How to Create Your Own Dyed Wall Hangings",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'craft,decoration,hobbies',
                'post_tag' => '5-minutes,occasions,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'easy-paper-flower-art-for-decoration' => array(
            'title' => "Easy Beach Theme Wall Decoration for Living Room",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'beadwork,craft,decoration,hobbies',
                'post_tag' => 'birthday,craft,diy'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'how-to-make-ice-cream-without-an-ice-cream-maker' => array(
            'title' => "How to Make Ice Cream Without an Ice Cream Maker",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'food-and-receips,hobbies',
                'post_tag' => '5-minutes,diy,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'devices')
            )
        ),
        'how-patterned-plants-can-spruce-up-your-winter' => array(
            'title' => "How Patterned Plants Can Spruce Up Your Winter",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'decoration,hobbies',
                'post_tag' => 'craft,party,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'photography')
            )
        ),
        'why-getting-crafty-guarantees-a-good-mood' => array(
            'title' => "Why Getting Crafty Guarantees a Good Mood",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'craft,kids-craft',
                'post_tag' => '5-minutes,craft,diy'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'how-to-make-a-quadcopter-at-home' => array(
            'title' => "How to Make a Quadcopter at Home",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'hobbies,kids-craft',
                'post_tag' => 'homemade,simple,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'photography')
            )
        ),
        'the-best-remote-controlled-camera-drones-for-beginners' => array(
            'title' => "6 Genius Little Ways I Repurpose Used Candle Jars",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'diy,kids-craft',
                'post_tag' => 'drone,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}')
            )
        ),
        'the-10-best-diy-blogs-for-endless-inspiration' => array(
            'title' => "The 10 Best DIY Blogs for Endless Inspiration",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'kids-craft',
                'post_tag' => 'drone,homemade,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'create-simple-dress-for-holiday-party' => array(
            'title' => "Create Simple Dress for Holiday Party",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news5',
            'taxonomy' => array(
                'category' => 'beadwork,diy',
                'post_tag' => '5-minutes,birthday,party'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'how-to-make-easy-box-gift-for-birthday' => array(
            'title' => "How to Make Easy Box Gift for Birthday",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news6',
            'taxonomy' => array(
                'category' => 'paper-craft',
                'post_tag' => 'birthday,gift,paper'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                'post_subtitle' => 'We celebrate great design all the time, but there\'s a specific part of it that we\'re addicted to: makeovers'
            )
        ),
        'cute-diy-craft-project-ideas-for-your-kids' => array(
            'title' => "Cute DIY Craft Project Ideas for Your Kids",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news7',
            'taxonomy' => array(
                'category' => 'kids-craft,paper-craft',
                'post_tag' => 'diy,kids,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'games')
            )
        ),
        'a-genius-one-ingredient-trick-to-make-all-those-eggs-way-more-exciting' => array(
            'title' => "One-Ingredient Trick to Make All Those Eggs Way More Exciting",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news8',
            'taxonomy' => array(
                'category' => 'food-and-receips',
                'post_tag' => 'food,homemade,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'threaded-spaghetti-hot-dogs-were-the-best-decision-ive-ever-made' => array(
            'title' => "Threaded Spaghetti Hot Dogs Were the Best Decision",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news9',
            'taxonomy' => array(
                'category' => 'diy,food-and-receips',
                'post_tag' => '5-minutes,food,homemade'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'tricks-you-can-do-with-your-food' => array(
            'title' => "Tricks You Can Do With Your Food - Study Case: Ice Cream",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news10',
            'taxonomy' => array(
                'category' => 'food-and-receips,video',
                'post_tag' => 'diy,homemade,tools',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => 'devices'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=EWIU09BnyoA'
            )
        ),
        'a-5-minutes-ritual-for-incredible-homemade-bread' => array(
            'title' => "A 5-Minutes Ritual for Incredible Homemade Bread",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news1',
            'taxonomy' => array(
                'category' => 'food-and-receips,lifehack',
                'post_tag' => '5-minutes,food,homemade'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        '10-stylish-ways-to-say-thank-you' => array(
            'title' => "10 Stylish Ways to Say Thank You",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news2',
            'taxonomy' => array(
                'category' => 'kids-craft',
                'post_tag' => 'drone,simple,tools'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'diy-halloween-decorations-that-are-so-easy-its-scary' => array(
            'title' => "DIY Halloween Decorations That Are So Easy It’s Scary",
            'content' => 'post1.txt',
            'post_type' => 'post',
            'featured_image' => 'news3',
            'taxonomy' => array(
                'category' => 'decoration,hobbies',
                'post_tag' => 'drone,homemade,simple'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=Jg-ZSi32vOQ'
            )
        ),
        'amazing-diy-idea-balloon-and-rope-lamp' => array(
            'title' => "Amazing DIY Idea Balloon And Rope Lamp",
            'content' => 'post2.txt',
            'post_type' => 'post',
            'featured_image' => 'news4',
            'taxonomy' => array(
                'category' => 'decoration,video',
                'post_tag' => 'homemade,party,simple',
                'post_format' => 'post-format-video'
            ),
            'metabox' => array(
                'jnews_primary_category' => array('id' => '{{category::id}}'),
                '_format_video_embed' => 'https://www.youtube.com/watch?v=WLtixn3gJcI'
            )
        ),

        // page
        'home-1' => array(
            'title' => 'Home 1',
            'content' => 'home1.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1556525328154{margin-top: 60px !important;padding-top: 60px !important;padding-bottom: 120px !important;background-color: #eff9f9 !important;}.vc_custom_1556514684405{margin-top: -120px !important;}.vc_custom_1557218888297{margin-top: -120px !important;}.vc_custom_1557219547346{margin-bottom: 0px !important;}.vc_custom_1556522149410{padding-top: 25px !important;padding-right: 30px !important;padding-bottom: 25px !important;padding-left: 30px !important;background-color: #eff9f9 !important;}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'header_type' => 'heading_6',
                    'layout' => 'no-sidebar',
                    'sidebar' => 'page-loop-sidebar',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '37',
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
                    'post_offset' => '6',
                    'posts_per_page' => '9',
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home1.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1556525328154{margin-top: 60px !important;padding-top: 60px !important;padding-bottom: 120px !important;background-color: #eff9f9 !important;}.vc_custom_1556514684405{margin-top: -120px !important;}.vc_custom_1557218888297{margin-top: -120px !important;}.vc_custom_1557219547346{margin-bottom: 0px !important;}.vc_custom_1556522149410{padding-top: 25px !important;padding-right: 30px !important;padding-bottom: 25px !important;padding-left: 30px !important;background-color: #eff9f9 !important;}'
                )
            )
        ),
        'home-2' => array(
            'title' => 'Home 2',
            'content' => 'home2.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_shortcodes_custom_css' => '.vc_custom_1557294076708{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #eff9f9 !important;}.vc_custom_1557303596084{margin-bottom: 0px !important;}.vc_custom_1557130057580{padding: 25px !important;background-color: #ffefdb !important;}.vc_custom_1557304019625{margin-bottom: 0px !important;}',
                '_wpb_post_custom_css' => '.jeg_blocklink{height:160px}.jeg_blocklink .jeg_block_content h3{font-size:16px;line-height:1}.jeg_blocklink .jeg_block_content{align-items:center}.jeg_blocklink .jeg_block_content>div{padding:18px 18px 16px}@media only screen and (max-width:1024px){.jeg_content{padding:0}.jeg_blocklink{margin-bottom:30px;height:140px}}@media only screen and (max-width:768px){.jeg_blocklink{height:120px}.jeg_blocklink .jeg_block_content>div{width:80%}}',
                'jnews_page_loop' => array(
                    'enable_page_loop' => '1',
                    'first_title' => 'LATEST POST',
                    'header_type' => 'heading_7',
                    'layout' => 'right-sidebar',
                    'sidebar' => 'home-2-loop',
                    'second_sidebar' => 'default-sidebar',
                    'sticky_sidebar' => '1',
                    'module' => '27',
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
                    'sort_by' => 'latest'
                ),
                '_elementor_data' => 'home2.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.vc_custom_1557294076708{padding-top: 20px !important;padding-bottom: 20px !important;background-color: #eff9f9 !important;}.vc_custom_1557303596084{margin-bottom: 0px !important;}.vc_custom_1557130057580{padding: 25px !important;background-color: #ffefdb !important;}.vc_custom_1557304019625{margin-bottom: 0px !important;}.jeg_blocklink{height:160px}.jeg_blocklink .jeg_block_content h3{font-size:16px;line-height:1}.jeg_blocklink .jeg_block_content>div{padding:18px 18px 16px}@media only screen and (max-width:1024px){.jeg_content{padding:0}.jeg_blocklink{margin-bottom:30px;height:140px}}@media only screen and (max-width:768px){.jeg_blocklink{height:120px}.jeg_blocklink .jeg_block_content>div{width:80%}}'
                )
            )
        ),
        'home-3' => array(
            'title' => 'Home 3',
            'content' => 'home3.txt',
            'post_type' => 'page',
            'metabox' => array(
                '_wp_page_template' => 'template-builder.php',
                '_wpb_post_custom_css' => '.jeg_postblock_26.jeg_pagination_loadmore .jeg_block_navigation{margin-top:0}@media only screen and (max-width:1024px){.jeg_content{padding:0}}',
                '_elementor_data' => 'home3.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.jeg_postblock_26.jeg_pagination_loadmore .jeg_block_navigation{margin-top:0}@media only screen and (max-width:1024px){.jeg_content{padding:0}}'
                )
            )
        ),
        'footer' => array(
            'title' => 'Footer',
            'content' => 'footer.txt',
            'post_type' => 'footer',
            'metabox' => array(
                '_wpb_post_custom_css' => '.craft-footer-left,.craft-footer-center,.craft-footer-right{text-align:center}@media (min-width:767px){.craft-footer-left{text-align:left}.craft-footer-center{text-align:center}.craft-footer-right{text-align:right}}',
                '_elementor_data' => 'footer.json',
                '_elementor_edit_mode' => 'builder',
                '_elementor_page_settings' => array(
                    'custom_css' => '.craft-footer-left,.craft-footer-center,.craft-footer-right{text-align:center}@media (min-width:767px){.craft-footer-left{text-align:left}.craft-footer-center{text-align:center}.craft-footer-right{text-align:right}}'
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

        'diy' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'DIY',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:diy:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'beadwork' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Beadwork',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:beadwork:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'craft' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Craft',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:craft:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'lifehack' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Lifehacks',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:lifehack:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'kids-craft' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Kids Craft',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:kids-craft:id}}',
                'menu-item-status' => 'publish'
            )
        ),
        'video' => array(
            'location' => 'main-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Video',
                'menu-item-type' => 'taxonomy',
                'menu-item-object' => 'category',
                'menu-item-object-id' => '{{category:video:id}}',
                'menu-item-status' => 'publish'
            )
        ),

        // Footer Menu
        'about-us-1' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'About Us',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'documentation' => array(
            'location' => 'footer-navigation',
            'menu-item-data' => array(
                'menu-item-title' => 'Documentation',
                'menu-item-type' => 'custom',
                'menu-item-url' => '#',
                'menu-item-status' => 'publish'
            )
        ),
        'buy-2' => array(
            'location' => 'footer-navigation',
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
        'home-2-loop',
        'archive-sidebar',
    ),

    'widget' => array(
        'widget.json',
    ),

    'customizer' => array(
        'style.json',
    ),

    'plugin' => array(
        'jnews-essential',
        'jnews-front-translation',
        'jnews-instagram',
        'jnews-jsonld',
        'jnews-meta-header',
        'jnews-social-login',
        'jnews-social-share',
        'jnews-split',
        'jnews-view-counter',
        'mailchimp-for-wp'
    )

);