<?php

return array(

	// image
	'image'           => array(
		'video1'      => 'https://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
		'video2'      => 'https://jegtheme.com/asset/jnews/demo/default/fashion2.jpg',
		'video3'      => 'https://jegtheme.com/asset/jnews/demo/default/fashion3.jpg',
		'video4'      => 'https://jegtheme.com/asset/jnews/demo/default/fashion4.jpg',
		'video5'      => 'https://jegtheme.com/asset/jnews/demo/default/fashion5.jpg',
		'video6'      => 'https://jegtheme.com/asset/jnews/demo/default/fashion6.jpg',
		'video7'      => 'https://jegtheme.com/asset/jnews/demo/default/fashion1.jpg',

		'travel1'     => 'https://jegtheme.com/asset/jnews/demo/default/travel1.jpg',
		'travel2'     => 'https://jegtheme.com/asset/jnews/demo/default/travel2.jpg',
		'travel3'     => 'https://jegtheme.com/asset/jnews/demo/default/travel3.jpg',
		'travel4'     => 'https://jegtheme.com/asset/jnews/demo/default/travel4.jpg',
		'travel5'     => 'https://jegtheme.com/asset/jnews/demo/default/travel5.jpg',
		'travel6'     => 'https://jegtheme.com/asset/jnews/demo/default/travel6.jpg',

		'webp1'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp1.webp',
		'webp2'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp2.webp',
		'webp3'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp3.webp',
		'webp4'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp4.webp',

		'favicon'     => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',

		'logo'        => 'https://jegtheme.com/asset/jnews/demo/playit/logo.png',
		'logo2x'      => 'https://jegtheme.com/asset/jnews/demo/playit/logo@2x.png',
		'logo_alt'    => 'https://jegtheme.com/asset/jnews/demo/playit/logo_alt.png',
		'logo_alt2x'  => 'https://jegtheme.com/asset/jnews/demo/playit/logo_alt@2x.png',

		'ad_345x345'  => 'http://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
		'ad_1140x160' => 'https://jegtheme.com/asset/jnews/demo/playit/ad_1140x160.jpg',
	),

	// create taxonomy
	'taxonomy'        => array(
		'category' => array(
			'comedy'        => array(
				'title'       => 'Comedy',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel1:id}}',
			),
			'entertainment' => array(
				'title'       => 'Entertainment',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel2:id}}',
			),
			'gaming'        => array(
				'title'       => 'Gaming',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel3:id}}',
			),
			'howto-style'   => array(
				'title'       => 'Howto & Style',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel4:id}}',
			),
			'movie'         => array(
				'title'       => 'Movie',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel5:id}}',
			),
			'music'         => array(
				'title'       => 'Music',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel6:id}}',
			),
			'news'          => array(
				'title'       => 'News',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel1:id}}',
			),
			'technology'    => array(
				'title'       => 'Technology',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel2:id}}',
			),
		),
		'post_tag' => array(
			'dua-lipa' => array(
				'title' => 'Dua Lipa',
			),
			'mtv'      => array(
				'title' => 'MTV',
			),
			'music'    => array(
				'title' => 'Music',
			),
			'video'    => array(
				'title' => 'Video',
			),
		),
	),

	// post & page
	'post'            => array(
		'6-sci-fi-gadgets-in-movie-we-wish-actually-existed' => array(
			'title'          => '6 Sci-fi Gadgets in Movie We Wish Actually Existed',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'movie,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://video.jnews.io/wp-content/uploads/2020/01/self-hosted-video.mp4',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:20',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'the-10-best-games-to-play-on-your-new-playstation-4' => array(
			'title'          => 'The 10 best games to play on your new PlayStation 4',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=FzVa6G8_jEg',
				'jnews_video_option'     => array(
					'video_duration' => '00:09:32',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'teslas-chinese-factory-just-delivered-its-first-cars' => array(
			'title'          => 'Tesla’s Chinese factory just delivered its first cars',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:photography:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=P0VxLJWt1iA',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:37',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'another-director-leaves-the-uncharted-movie'      => array(
			'title'          => 'Another director leaves the Uncharted movie',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'gaming,movie,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=n0z588yNnqo',
				'jnews_video_option'     => array(
					'video_duration' => '01:55:37',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'didi-kempot-cidro-for-sobat-ambyar-official-music-video' => array(
			'title'          => 'Didi Kempot - Cidro for Sobat Ambyar (Official Music Video)',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=0ADwyqBL5ds',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:21',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'niki-la-la-lost-you-official-music-video'         => array(
			'title'          => 'NIKI - La La Lost You (Official Music Video)',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=ErmgY5GX_wI',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:27',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'netflixs-the-witcher-season-1-review-roundup'     => array(
			'title'          => "Netflix's The Witcher Season 1 Review Roundup",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=ndl1W4ltcmg',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:21',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'top-1-fanny-global-gameplay-mobile-legends-bang-bang' => array(
			'title'          => 'TOP 1 Fanny Global Gameplay - Mobile Legends: Bang Bang',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=L4HyZjc0jTM',
				'jnews_video_option'     => array(
					'video_duration' => '00:17:07',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'10-old-trends-that-everyone-is-wearing-again-in-2020' => array(
			'title'          => '10 Old Trends That Everyone Is Wearing Again in 2020',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=UZecxsKdGc4',
				'jnews_video_option'     => array(
					'video_duration' => '00:07:02',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'get-ready-for-apples-new-8k-vr-ar-headset-in-2020' => array(
			'title'          => "Get Ready for Apple's New 8K VR/AR Headset in 2020",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=6p1e_JSol8s',
				'jnews_video_option'     => array(
					'video_duration' => '00:23:25',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'life-fast-draw-young-the-story-of-yung-lenox'     => array(
			'title'          => 'Life Fast, Draw Young: The story of Yung Lenox',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://vimeo.com/381093397',
				'jnews_video_option'     => array(
					'video_duration' => '00:16:03',
				),
			),
		),
		'how-to-style-a-classic-white-blazer-according-to-celebs' => array(
			'title'          => 'How to: Style a Classic White Blazer, According to Celebs',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.dailymotion.com/video/x7q8ymw',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:22',
				),
			),
		),
		'diablo-4-will-bring-back-elective-mode-blizzard-confirms' => array(
			'title'          => 'Diablo 4 will bring back Elective Mode, Blizzard confirms',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'post_subtitle'          => 'The copy warned the Little Blind Text.',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=9bRWIdOMfro',
				'jnews_video_option'     => array(
					'video_duration' => '00:09:21',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'emma-watson-talks-about-turning-30-to-british-vogue' => array(
			'title'          => 'Emma Watson Talks About Turning 30 to British Vogue',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=cQynYGDpyiw',
				'jnews_video_option'     => array(
					'video_duration' => '00:30:01',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'uk-election-2019-who-won-and-what-happens-now'    => array(
			'title'          => 'UK Election 2019: Who won and what happens now?',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=D9a6efZU32k',
				'jnews_video_option'     => array(
					'video_duration' => '00:49:06',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'the-night-comes-for-us-official-trailer-hd'       => array(
			'title'          => 'The Night Comes For Us - Official Trailer [HD]',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=KDVfuxS8ry8',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:33',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'dua-lipas-boots-are-straight-out-of-the-mesozoic-era' => array(
			'title'          => 'Dua Lipa’s Boots Are Straight Out of the Mesozoic Era',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=e6vdPKJuf2M',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:22',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'switch-fishing-using-joy-con-as-futuristic-fishing-rod' => array(
			'title'          => 'Switch fishing using Joy-Con as futuristic fishing rod',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=WI5ffVjCLfA',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:07',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'when-we-finally-find-aliens-they-might-smell-terrible' => array(
			'title'          => 'When We Finally Find Aliens, They Might Smell Terrible',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:photography:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=zuqlUDnxWhA',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:31',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'robert-pattinson-brings-back-the-super-skinny-tie' => array(
			'title'          => 'Robert Pattinson Brings Back the Super Skinny Tie',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=ln_a2YbjpAo',
				'jnews_video_option'     => array(
					'video_duration' => '00:08:29',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'mount-batur-black-lava-4wd-jeep-adventure'        => array(
			'title'          => 'Mount Batur Black Lava 4WD Jeep Adventure',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=qTKa74L_jfM',
				'jnews_video_option'     => array(
					'video_duration' => '00:09:46',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'only-beyonce-could-make-opera-gloves-cool'        => array(
			'title'          => 'Only Beyoncé Could Make Opera Gloves Cool',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'entertainment,howto-style,music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=civgUOommC8',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:31',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'glastonbury-introduces-new-campsite-to-reduce-waste' => array(
			'title'          => 'Glastonbury introduces new campsite to reduce waste',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'entertainment,music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=mrJikvqZ9IQ',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:48',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'pokemon-go-is-bringing-back-all-community-day-pokemon' => array(
			'title'          => 'Pokémon Go is bringing back all Community Day Pokémon',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'gaming,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=xUFMnmChNgw',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:36',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'dua-lipa-teases-new-album-as-new-era-begins'      => array(
			'title'          => 'Dua Lipa teases new album as "new era" begins',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=oygrmJFKYZY',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:02',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'google-pixel-4-xl-review-the-best-android-experience' => array(
			'title'          => 'Google Pixel 4 XL review: The best Android experience',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:photography:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=mfbSqTB74xM',
				'jnews_video_option'     => array(
					'video_duration' => '00:18:44',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'this-man-owned-that-starbucks-cup-in-game-of-thrones' => array(
			'title'          => 'This man owned that Starbucks cup in Game of Thrones',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=R5oYt_J9OJE',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:04',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'call-of-duty-modern-warfares-highway-of-death-controversy' => array(
			'title'          => 'Call of Duty: Modern Warfare’s Highway of Death controversy',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'entertainment,gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=vtSy0XWzqkQ',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:05',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'the-20-best-songs-of-2019-editors-picks'          => array(
			'title'          => "The 20 Best Songs of 2019 (Editors' Picks)",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=DyDfgMOUjCI',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:26',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'what-you-missed-in-el-camino-a-breaking-bad-movie' => array(
			'title'          => 'What you missed in El Camino: A Breaking Bad Movie',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=i5YFJiHooXM',
				'jnews_video_option'     => array(
					'video_duration' => '00:06:25',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'kaia-gerber-whats-in-my-bag-video-vogue'          => array(
			'title'          => "Kaia Gerber \"What's In My Bag\" Video Vogue",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=wf20jIIyKA8',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:31',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'death-stranding-release-date-reveal-trailer'      => array(
			'title'          => 'Death Stranding – Release Date Reveal Trailer',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=piIgkJWDuQg',
				'jnews_video_option'     => array(
					'video_duration' => '00:08:53',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'niki-lowkey-official-visualizer-music-video'      => array(
			'title'          => 'NIKI - lowkey (Official Visualizer Music Video)',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=mxyucLe9YE4',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:52',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'apple-airpods-pro-first-look-a-big-improvement'   => array(
			'title'          => 'Apple AirPods Pro first look: A big improvement',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:photography:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=IC9urbiVp4M',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:00',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'why-jokers-depiction-of-mental-illness-is-dangerously-misinformed' => array(
			'title'          => "Why Joker's depiction of mental illness is dangerously misinformed",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=zAGVQLHvwOY',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:25',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'english-soccer-is-hopelessly-addicted-to-jose-mourinho' => array(
			'title'          => 'English Soccer Is Hopelessly Addicted to José Mourinho',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=4wAG5ZUJ4eI',
				'jnews_video_option'     => array(
					'video_duration' => '00:12:19',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'harley-davidsons-electric-balance-bike-is-for-future-riders' => array(
			'title'          => 'Harley-Davidson’s Electric Balance Bike is for Future Riders',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'movie,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:photography:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=OGOsyM_Kifk',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:01',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'liv-tyler-just-got-a-major-hair-makeover-for-fall' => array(
			'title'          => 'Liv Tyler Just Got A Major Hair Makeover For Fall',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=lsFPbgK1v9I',
				'jnews_video_option'     => array(
					'video_duration' => '00:07:28',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'fintech-summit-and-expo-to-begin-on-september-23' => array(
			'title'          => 'Fintech Summit and Expo to Begin on September 23',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=-EoNrg_DR3s',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:48',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'gundala-director-joko-anwar-lets-imaginations-go-wild' => array(
			'title'          => "Gundala Director Joko Anwar Lets 'Imaginations Go Wild'",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=8rauD1vxMCw',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:01',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'dua-lipa-lost-in-your-light-feat-miguel-official-video' => array(
			'title'          => 'Dua Lipa - Lost In Your Light feat. Miguel (Official Video)',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=r-AuLm7S3XE',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:36',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'stranger-things-3-the-game-arrives-on-ios-and-android' => array(
			'title'          => "'Stranger Things 3: The Game' arrives on iOS and Android",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'gaming,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=m0mU87qNCAw',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:18',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'how-would-you-dress-if-you-werent-online'         => array(
			'title'          => 'How Would You Dress If You Weren’t Online?',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'entertainment,howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=806T3OvSt-U',
				'jnews_video_option'     => array(
					'video_duration' => '00:13:20',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'one-handed-guitarist-finds-great-success-as-musician' => array(
			'title'          => 'One Handed Guitarist Finds Great Success As Musician',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'howto-style,music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=JmDy7Jt_8Ck',
				'jnews_video_option'     => array(
					'video_duration' => '00:47:59',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'these-are-the-spookiest-halloween-movies-on-netflix' => array(
			'title'          => 'These Are the Spookiest Halloween Movies on Netflix',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=NfpXeLVzJIw',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:49',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'fedex-pilot-detained-in-china-for-item-found-in-luggage' => array(
			'title'          => 'FedEx Pilot Detained in China for Item Found in Luggage',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=VC-59i_P29g',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:37',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'trump-whistleblower-saga-threatens-to-blow-up-2020-campaign' => array(
			'title'          => 'Trump Whistleblower Saga Threatens to Blow Up 2020 Campaign',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=_x0TrItt5xk',
				'jnews_video_option'     => array(
					'video_duration' => '00:10:54',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'john-mayer-shares-new-single-carry-me-away'       => array(
			'title'          => 'John Mayer Shares New Single "Carry Me Away"',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'music,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:apps:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=6YDwBktDthA',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:01',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'ps4-pro-will-make-more-games-look-better-on-older-tvs' => array(
			'title'          => 'PS4 Pro will make more games look better on older TVs',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'gaming,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:photography:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=UDOJp0hsn6w',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:26',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'kendall-jenners-birkenstocks-have-gone-international' => array(
			'title'          => 'Kendall Jenner’s Birkenstocks Have Gone International',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'howto-style,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:games:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=lsFPbgK1v9I',
				'jnews_video_option'     => array(
					'video_duration' => '00:07:28',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'the-deeper-significance-of-the-mall-on-stranger-things' => array(
			'title'          => 'The Deeper Significance of the Mall on Stranger Things',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:devices:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=XcnHOQ-cHa0',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:58',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'2019-ubud-writers-readers-festival-8-reasons-why-you-should-come' => array(
			'title'          => '2019 Ubud Writers & Readers Festival: 8 reasons why you should come',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=OzF71zNSTuU',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:41',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'nintendo-switch-unboxing-review-indonesia'        => array(
			'title'          => 'Nintendo Switch Unboxing & Review Indonesia!',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'entertainment,gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:how-to:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=_vmaTzmtSyA',
				'jnews_video_option'     => array(
					'video_duration' => '00:10:36',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'getting-cheap-airfare-for-last-minute-travel'     => array(
			'title'          => 'Getting Cheap Airfare For Last Minute Travel',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'entertainment',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:security:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=BKA3fp7oLAQ',
				'jnews_video_option'     => array(
					'video_duration' => '00:08:33',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),

		// page
		'home-1'                                           => array(
			'title'     => 'Home 1',
			'content'   => 'home1.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1573194281196{margin-bottom: 40px !important;background-color: #f9f9f9 !important;}.vc_custom_1574308581900{margin-top: 10px !important;margin-bottom: 10px !important;}',
				'_elementor_data'            => 'home1.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1573194281196{margin-bottom: 40px !important;background-color: #f9f9f9 !important;}.vc_custom_1574308581900{margin-top: 10px !important;margin-bottom: 10px !important;}',
				),
			),
		),
		'home-2'                                           => array(
			'title'     => 'Home 2',
			'content'   => 'home2.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1573197595367{margin-bottom: 40px !important;border-bottom-width: 1px !important;border-bottom-color: #eeeeee !important;border-bottom-style: solid !important;}',
				'_wpb_post_custom_css'       => '@media screen and (min-width:1025px){.jeg_postblock_video_carousel_1 .jeg_post_title{font-size:18px}}',
				'_elementor_data'            => 'home2.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1573197595367{margin-bottom: 40px !important;border-bottom-width: 1px !important;border-bottom-color: #eeeeee !important;border-bottom-style: solid !important;} @media screen and (min-width:1025px){.jeg_postblock_video_carousel_1 .jeg_post_title{font-size:18px}}',
				),
			),
		),
		'home-3'                                           => array(
			'title'     => 'Home 3',
			'content'   => 'home3.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1574653151622{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #000000 !important;}.vc_custom_1577693373196{margin-bottom: 0px !important;}',
				'_wpb_post_custom_css'       => '.jeg_content{padding-top:0}',
				'_elementor_data'            => 'home3.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1574653151622{padding-top: 40px !important;padding-bottom: 40px !important;background-color: #000000 !important;}.vc_custom_1577693373196{margin-bottom: 0px !important;} .jeg_content{padding-top:0}',
				),
			),
		),
		'latest'                                           => array(
			'title'     => 'Latest',
			'content'   => 'latest.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'    => 'template-builder.php',
				'_elementor_data'      => 'latest.json',
				'_elementor_edit_mode' => 'builder',
			),
		),
		'trending'                                         => array(
			'title'     => 'Trending',
			'content'   => 'trending.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'    => 'template-builder.php',
				'_elementor_data'      => 'trending.json',
				'_elementor_edit_mode' => 'builder',
			),
		),
		'footer'                                           => array(
			'title'     => 'Footer',
			'content'   => 'footer.txt',
			'post_type' => 'footer',
			'metabox'   => array(
				'_wpb_shortcodes_custom_css' => '.vc_custom_1573191637272{padding-top: 20px !important;padding-bottom: 20px !important;}@media (max-width:766px){.vc_custom_1573191637272{text-align:center}}',
				'_wpb_post_custom_css'       => '.jeg_menu_footer li:not(:last-child):after{display:none}.jeg_menu_footer li a{font-size:12px;margin-right:1em}.jeg_menu_footer li a:hover{text-decoration:underline}.jeg_footer .socials_widget.nobg .fa{font-size:14px}',
				'_elementor_data'            => 'footer.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1573191637272{padding-top:20px!important;padding-bottom:20px!important}@media (max-width:766px){.vc_custom_1573191637272{text-align:center}}.jeg_menu_footer li:not(:last-child):after{display:none}.jeg_menu_footer li a{font-size:12px;margin-right:1em}.jeg_menu_footer li a:hover{text-decoration:underline}.jeg_footer .socials_widget.nobg .fa{font-size:14px}',
				),
			),
		),
	),


	// menu location
	'menu_location'   => array(
		'main-navigation'     => array(
			'title'    => 'Main Navigation',
			'location' => 'navigation',
		),
		'footer-navigation'   => array(
			'title'    => 'Footer Navigation',
			'location' => 'footer_navigation',
		),
		'sidefeed-navigation' => array(
			'title'    => 'Sidefeed Navigation',
			'location' => 'sidefeed_navigation',
		),
	),

	// menu it self
	'menu'            => array(

		/**
		 * Main Menu
		 */
		// Home
		'home'                         => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Home',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => '{{url:home}}',
				'menu-item-status' => 'publish',
			),
		),
		// child home
		'home-1'                       => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home Layout 1',
				'menu-item-parent-id' => '{{menu:home:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-1:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'home-2'                       => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home Layout 2',
				'menu-item-parent-id' => '{{menu:home:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-2:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'home-3'                       => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home Layout 3',
				'menu-item-parent-id' => '{{menu:home:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-3:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		// end child home

		// Browse
		'browse'                       => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Browse',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => '#',
				'menu-item-status' => 'publish',
			),
		),
		// child browse
		'news'                         => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'News',
				'menu-item-parent-id' => '{{menu:browse:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:news:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'movie'                        => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Movie',
				'menu-item-parent-id' => '{{menu:browse:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:movie:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'music'                        => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Music',
				'menu-item-parent-id' => '{{menu:browse:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:music:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'technology'                   => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Technology',
				'menu-item-parent-id' => '{{menu:browse:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:technology:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'howto-style'                  => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Howto & Style',
				'menu-item-parent-id' => '{{menu:browse:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:howto-style:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'entertainment'                => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Entertainment',
				'menu-item-parent-id' => '{{menu:browse:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:entertainment:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'gaming'                       => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Gaming',
				'menu-item-parent-id' => '{{menu:browse:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:gaming:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		// end child browse

		// Features
		'features'                     => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Features',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => '#',
				'menu-item-status' => 'publish',
			),
		),
		// child features
		'youtube-video'                => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Youtube Video',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => '{{post:niki-lowkey-official-visualizer-music-video:url}}',
				'menu-item-status'    => 'publish',
			),
		),
		'vimeo-video'                  => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Vimeo Video',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => '{{post:life-fast-draw-young-the-story-of-yung-lenox:url}}',
				'menu-item-status'    => 'publish',
			),
		),
		'dailymotion-video'            => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Dailymotion Video',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'post',
				'menu-item-object-id' => '{{post:how-to-style-a-classic-white-blazer-according-to-celebs:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'self-hosted-video'            => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Self-hosted Video',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'post',
				'menu-item-object-id' => '{{post:6-sci-fi-gadgets-in-movie-we-wish-actually-existed:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'user-profile'                 => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'User Profile',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => '{{url:home:members/me/}}',
				'menu-item-status'    => 'publish',
			),
		),
		'playlists'                    => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Playlists',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => '{{url:home:members/me/playlist/}}',
				'menu-item-status'    => 'publish',
			),
		),
		'user-created-playlist'        => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'User-created Playlist',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => '{{url:home:watch-later}}',
				'menu-item-status'    => 'publish',
			),
		),
		'favorite-playlist-private'    => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Favorite Playlist (Private)',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => '{{url:home:favorite}}',
				'menu-item-status'    => 'publish',
			),
		),
		'watch-later-playlist-private' => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Watch Later Playlist (Private)',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => '{{url:home:watch-later}}',
				'menu-item-status'    => 'publish',
			),
		),
		'all-jnews-features'           => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'All JNews Features',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'custom',
				'menu-item-url'       => 'https://jnews.io',
				'menu-item-status'    => 'publish',
			),
		),

		// Footer Menu
		'about'                        => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'About',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => '#',
				'menu-item-status' => 'publish',
			),
		),
		'buy'                          => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Buy JNews',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://bit.ly/get-jnews',
				'menu-item-status' => 'publish',
			),
		),
		'request-a-demo'               => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Request A Demo',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => 'https://docs.google.com/forms/d/e/1FAIpQLSfHEypFc-tY8BzGdEQU9ECf3bld_Een7_bSStoo8ICR8UG0eA/viewform?entry.1558582620&entry.1060472253&entry.1295994925',
				'menu-item-status' => 'publish',
			),
		),
		'privacy-policy'               => array(
			'location'       => 'footer-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Contact',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => '#',
				'menu-item-status' => 'publish',
			),
		),

		// Sidefeed Menu
		'home-sidefeed'                => array(
			'location'       => 'sidefeed-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Home',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-1:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'trending'                     => array(
			'location'       => 'sidefeed-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Trending',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:trending:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'recommended'                  => array(
			'location'       => 'sidefeed-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Recommended',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:home-2:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'latest'                       => array(
			'location'       => 'sidefeed-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Latest',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:latest:id}}',
				'menu-item-status'    => 'publish',
			),
		),
	),


	'widget_position' => array(
		'default-sidebar',
		'jnews-bp-home',
		'sidefeed',
		'sidefeed-footer',
		'single-post',
		'user-profile-sidebar',
	),

	'widget'          => array(
		'widget.json',
	),

	'customizer'      => array(
		'style.json',
	),

	'plugin'          => array(
		'jnews-essential',
		'jnews-frontend-submit',
		'jnews-like',
		'jnews-social-share',
		'jnews-video',
		'jnews-view-counter',
		'jnews-instagram',
		'jnews-jsonld',
		'jnews-meta-header',
		'jnews-social-login',
		'buddypress',
		'buddypress-followers',
		'mailchimp-for-wp',
	),

);
