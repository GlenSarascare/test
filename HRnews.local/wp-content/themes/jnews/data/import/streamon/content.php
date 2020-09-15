<?php

return array(

	// image
	'image'           => array(
		'video1'      => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget1.jpg',
		'video2'      => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget2.jpg',
		'video3'      => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget3.jpg',
		'video4'      => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget4.jpg',
		'video5'      => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget5.jpg',
		'video6'      => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget6.jpg',
		'video7'      => 'https://jegtheme.com/asset/jnews/demo/gadget-review/gadget7.jpg',

		'travel1'     => 'https://jegtheme.com/asset/jnews/demo/motorcycle/moto1.jpg',
		'travel2'     => 'https://jegtheme.com/asset/jnews/demo/motorcycle/moto2.jpg',
		'travel3'     => 'https://jegtheme.com/asset/jnews/demo/motorcycle/moto3.jpg',
		'travel4'     => 'https://jegtheme.com/asset/jnews/demo/motorcycle/moto4.jpg',
		'travel5'     => 'https://jegtheme.com/asset/jnews/demo/motorcycle/moto5.jpg',
		'travel6'     => 'https://jegtheme.com/asset/jnews/demo/motorcycle/moto6.jpg',

		'webp1'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp1.webp',
		'webp2'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp2.webp',
		'webp3'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp3.webp',
		'webp4'       => 'https://jegtheme.com/asset/jnews/demo/playit/webp4.webp',

		'favicon'     => 'https://jegtheme.com/asset/jnews/demo/default/favicon.png',

		'logo'        => 'https://jegtheme.com/asset/jnews/demo/streamon/logo.png',
		'logo2x'      => 'https://jegtheme.com/asset/jnews/demo/streamon/logo@2x.png',

		'ad_345x345'  => 'http://jegtheme.com/asset/jnews/demo/default/ad_345x345.jpg',
		'ad_1140x160' => 'https://jegtheme.com/asset/jnews/demo/streamon/ad_1140x160.jpg',
	),

	// create taxonomy
	'taxonomy'        => array(
		'category' => array(
			'travel'        => array(
				'title'       => 'Travel',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel2:id}}',
			),
			'technology'    => array(
				'title'       => 'Technology',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel3:id}}',
			),
			'news'          => array(
				'title'       => 'News',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel1:id}}',
			),
			'music'         => array(
				'title'       => 'Music',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel2:id}}',
			),
			'movie'         => array(
				'title'       => 'Movie',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel3:id}}',
			),
			'howto-style'   => array(
				'title'       => 'Howto & Style',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel1:id}}',
			),
			'gaming'        => array(
				'title'       => 'Gaming',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel2:id}}',
			),
			'entertainment' => array(
				'title'       => 'Entertainment',
				'description' => 'Category descriptions show here. You can change the description on each category from the WordPress administration panel.',
				'term_image'  => '{{image:travel3:id}}',
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
		'teslas-chinese-factory-just-delivered-its-first-cars' => array(
			'title'          => 'Canon woos pro photographers with EOS-1D X Mark III',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:music:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=Hxl--qaWCg8',
				'jnews_video_option'     => array(
					'video_duration' => '00:17:40',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'another-director-leaves-the-uncharted-movie'      => array(
			'title'          => 'New Bill And Ted Face The Music Image Pairs The Duo With Their Daughters',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'gaming,movie,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=6XI3tKLBNz4',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:57',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'coachella-coming-to-celebrate-20-years-in-the-desert' => array(
			'title'          => "Coachella Coming to Celebrate '20 Years in the Desert'",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=-ihAae7MHfQ',
				'jnews_video_option'     => array(
					'video_duration' => '00:07:58',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'niki-la-la-lost-you-official-music-video'         => array(
			'title'          => 'Sam Smith Encourages Fans to Love Their Bodies in Inspiring New Post',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=DIU3xPdhCBI',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:40',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'top-1-fanny-global-gameplay-mobile-legends-bang-bang' => array(
			'title'          => "Gollum 'doesn't look like Andy Serkis' in Daedalic's new Lord of the Rings game",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=jBcBtW5xJsk',
				'jnews_video_option'     => array(
					'video_duration' => '00:12:19',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'10-old-trends-that-everyone-is-wearing-again-in-2020' => array(
			'title'          => '10 Time Management Tips That Work',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=xwsLuxlbY2w',
				'jnews_video_option'     => array(
					'video_duration' => '00:13:46',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'get-ready-for-apples-new-8k-vr-ar-headset-in-2020' => array(
			'title'          => 'Australia bushfires: What countries have offered international aid?',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=yNdWtNlJEzw',
				'jnews_video_option'     => array(
					'video_duration' => '00:12:47',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'life-fast-draw-young-the-story-of-yung-lenox'     => array(
			'title'          => 'Christian Bale In Talks To Join Thor: Love And Thunder',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=cB-wN3Jr_-o&t=46s',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:07',
				),
			),
		),
		'travelers-guide-to-monte-carlo-monaco'            => array(
			'title'          => "Traveler's Guide to Monte Carlo, Monaco",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=zB42rJ6WE78',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:24',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'emma-watson-talks-about-turning-30-to-british-vogue' => array(
			'title'          => '5 Secrets for Making Your Cleaning Business a Success',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=p4miETh5M14',
				'jnews_video_option'     => array(
					'video_duration' => '00:13:39',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'diablo-4-will-bring-back-elective-mode-blizzard-confirms' => array(
			'title'          => 'Soma studio Frictional Games may be teasing its next horrific thing',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'post_subtitle'          => 'The copy warned the Little Blind Text.',
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=FD0h-s6NUeM',
				'jnews_video_option'     => array(
					'video_duration' => '05:03:34',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'how-to-get-around-rome-on-the-cheap-in-2019'      => array(
			'title'          => 'How to Get Around Rome on the Cheap in 2019',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=DnL-zJ5DcQw',
				'jnews_video_option'     => array(
					'video_duration' => '00:18:00',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'glastonbury-introduces-new-campsite-to-reduce-waste' => array(
			'title'          => 'Pink donates $500,000 to help with Australia’s catastrophic bushfires',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'entertainment,music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=EMUxmNTywjI',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:40',
				),
			),
		),
		'netflixs-the-witcher-season-1-review-roundup'     => array(
			'title'          => 'Joker Breaks Comic Book Movie Golden Globes Record',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=n1eNG1bKrGA',
				'jnews_video_option'     => array(
					'video_duration' => '00:10:01',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'climate-change-could-devastate-ski-tourism'       => array(
			'title'          => 'Climate Change Could Devastate Ski Tourism',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=7dowxccu9To',
				'jnews_video_option'     => array(
					'video_duration' => '00:15:07',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'english-soccer-is-hopelessly-addicted-to-jose-mourinho' => array(
			'title'          => 'Things new boss Carlo Ancelotti must address at Everton',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=evLZErCs-Hk',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:01',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'the-10-best-games-to-play-on-your-new-playstation-4' => array(
			'title'          => 'Vice Cry Remastered brings the Vice City map to GTA 5',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=w1kToVI5pc4',
				'jnews_video_option'     => array(
					'video_preview' => '{{image:webp3:src}}',
				),
			),
		),
		'uk-election-2019-who-won-and-what-happens-now'    => array(
			'title'          => 'SpaceX sends 60 more Starlink satellites into orbit',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=PeVVw_eTs4g',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:25',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'the-night-comes-for-us-official-trailer-hd'       => array(
			'title'          => 'Shang-Chi Director Explains Why He Joined The MCU',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=96wkD0xTacI',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:39',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'dua-lipas-boots-are-straight-out-of-the-mesozoic-era' => array(
			'title'          => '3 Ways Over-Delivering Value Gives Entrepreneurs an Advantage',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=RGt0cjhoUe8',
				'jnews_video_option'     => array(
					'video_duration' => '01:35:58',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'amazon-sees-alexa-devices-more-than-double-in-just-one-year' => array(
			'title'          => 'Amazon sees Alexa devices more than double in just one year',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:music:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=_czhNhBXOD0',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:22',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'robert-pattinson-brings-back-the-super-skinny-tie' => array(
			'title'          => 'Why It Makes Sense to Build a Brand Around a Singular Idea',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=ycD-6vLYASA',
				'jnews_video_option'     => array(
					'video_duration' => '00:09:41',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'dialog-dini-hari-tentang-rumahku-official-music-video' => array(
			'title'          => 'Dialog Dini Hari - Tentang Rumahku (Official Music Video)',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=kEbxIfmvJE0',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:06',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'only-beyonce-could-make-opera-gloves-cool'        => array(
			'title'          => 'The Best Dating Apps on the Market to Help You Find Love Today',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'entertainment,howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=CzQUqRoEgd4',
				'jnews_video_option'     => array(
					'video_duration' => '00:13:50',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'pokemon-go-is-bringing-back-all-community-day-pokemon' => array(
			'title'          => "Kentucky Route Zero's final episode is coming soon",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'gaming,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=6NnFmPxKinU',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:07',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'why-jokers-depiction-of-mental-illness-is-dangerously-misinformed' => array(
			'title'          => 'Will The Next Star Wars Movies Be Set In The High Republic Era?',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=mJxfuL74CLs',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:13',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'life-in-paris-one-month-down-in-2019'             => array(
			'title'          => 'Life in Paris: One Month Down in 2019',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=tKXrpRrj7Ow',
				'jnews_video_option'     => array(
					'video_duration' => '00:09:21',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'league-of-legends-season-10-with-new-2020-warriors-cinematic' => array(
			'title'          => 'League of Legends Season 10 with new 2020 Warriors cinematic.',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=By3pW3boux0',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:21',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'dua-lipa-teases-new-album-as-new-era-begins'      => array(
			'title'          => 'It looks like My Chemical Romance are teasing a UK show',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=lleP4Uf10wU',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:28',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'hawaii-5-nonprofits-you-can-support-while-traveling' => array(
			'title'          => 'Hawaii: 5 Nonprofits You Can Support While Traveling',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=wMRFzWVV35Y',
				'jnews_video_option'     => array(
					'video_duration' => '00:14:04',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'google-pixel-4-xl-review-the-best-android-experience' => array(
			'title'          => 'CES 2020: Sony announces electric car concept',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:music:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=yxQYSR8D56Y',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:41',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'this-man-owned-that-starbucks-cup-in-game-of-thrones' => array(
			'title'          => 'New Mutants Trailer: What The Hell Is Happening In This Movie?',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=gl39GBkwiCE',
				'jnews_video_option'     => array(
					'video_duration' => '00:10:08',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'6-sci-fi-gadgets-in-movie-we-wish-actually-existed' => array(
			'title'          => '6 Sci-fi Gadgets in Movie We Wish Actually Existed',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'entertainment,gaming,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://video.jnews.io/wp-content/uploads/2020/01/self-hosted-video.mp4',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:20',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'boost-your-events-visibility-with-jazz-near-yous-spotlight-service' => array(
			'title'          => "Boost Your Event's Visibility With Jazz Near You's Spotlight Service",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://vimeo.com/371351778',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:04',
				),
			),
		),
		'what-you-missed-in-el-camino-a-breaking-bad-movie' => array(
			'title'          => 'The Walking Dead’s Rick Grimes Movie Will ‘Heighten’ The Stakes',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=okR95T6QNtM',
				'jnews_video_option'     => array(
					'video_duration' => '00:12:13',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'kaia-gerber-whats-in-my-bag-video-vogue'          => array(
			'title'          => 'How to clean your appliances so they last longer',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=lUFD5CQyFT0',
				'jnews_video_option'     => array(
					'video_duration' => '00:06:12',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'golf-are-you-ready-for-the-u-s-open-don-cheadle-is' => array(
			'title'          => 'Golf: Are You Ready for the U.S. Open? Don Cheadle Is!',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.dailymotion.com/video/x7q8u8m',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:15',
				),
			),
		),
		'niki-lowkey-official-visualizer-music-video'      => array(
			'title'          => 'NIKI – lowkey (Official Visualizer Music Video)',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=mxyucLe9YE4',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:52',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'apple-airpods-pro-first-look-a-big-improvement'   => array(
			'title'          => 'Samsung’s new Ballie robot is like a real-life mini BB-8',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:music:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=4t66KO0uE7Y',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:40',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'how-to-spend-your-time-in-thailand-a-suggested-itinerary' => array(
			'title'          => 'How to Spend Your Time in Thailand: A Suggested Itinerary',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=kkYyESKiOOg',
				'jnews_video_option'     => array(
					'video_duration' => '00:28:58',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'a-golf-lovers-ideal-stay-in-the-dominican-republic' => array(
			'title'          => "A Golf Lover's Ideal Stay in the Dominican Republic",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=tDCe58s4JU8',
				'jnews_video_option'     => array(
					'video_duration' => '00:01:06',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'white-sands-monument-is-our-newest-national-park' => array(
			'title'          => 'The Best Winter Travel Destination in Every State',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=gTyvEgLiiOI',
				'jnews_video_option'     => array(
					'video_duration' => '00:12:08',
				),
			),
		),
		'the-netherlands-nixes-holland-as-a-nickname'      => array(
			'title'          => "The Netherlands Nixes 'Holland' as a Nickname",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=K8GPB4c9mVs',
				'jnews_video_option'     => array(
					'video_duration' => '00:41:04',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'will-destinations-ever-rule-the-world'            => array(
			'title'          => 'Will Destinations Ever Rule the World?',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'travel',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category::id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=OHAWwaYu2H0',
				'jnews_video_option'     => array(
					'video_duration' => '00:07:08',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'harley-davidsons-electric-balance-bike-is-for-future-riders' => array(
			'title'          => 'Sony reveals PlayStation 5 logo and shares PSVR sales milestone',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'movie,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:music:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=JCFys3AYHyg',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:39',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'liv-tyler-just-got-a-major-hair-makeover-for-fall' => array(
			'title'          => 'Why Star is Wearing Same Thing all Award Season',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=S0gY8eV8KV8',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:48',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'fintech-summit-and-expo-to-begin-on-september-23' => array(
			'title'          => 'Tennis: Smoke delays unlikely at Australian Open, say organisers',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=RswH-5SrPQo',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:37',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'gundala-director-joko-anwar-lets-imaginations-go-wild' => array(
			'title'          => "Why Ghostbusters: Afterlife Didn't Bring Back The Original Ecto-1",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=3nMAgHSEeXs',
				'jnews_video_option'     => array(
					'video_duration' => '00:06:09',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'dua-lipa-lost-in-your-light-feat-miguel-official-video' => array(
			'title'          => 'Rihanna Blessed Our 2020 With a Makeup-Free Selfie',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=KONe4SNFA64',
				'jnews_video_option'     => array(
					'video_duration' => '00:10:29',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'stranger-things-3-the-game-arrives-on-ios-and-android' => array(
			'title'          => 'Fortnite was the highest-earning game of the year again',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'gaming,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=KOq5w-icRBM',
				'jnews_video_option'     => array(
					'video_duration' => '00:11:11',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'how-would-you-dress-if-you-werent-online'         => array(
			'title'          => 'Japanese Artisans Sharpen their Traditional Skills',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'entertainment,howto-style',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=XrEY_TAt-Lw',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:01',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'one-handed-guitarist-finds-great-success-as-musician' => array(
			'title'          => "That Drake/Future Collab Is Finally Coming 'Soon Soon'",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'howto-style,music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=yRndgPxKFsM',
				'jnews_video_option'     => array(
					'video_duration' => '00:05:08',
				),
			),
		),
		'these-are-the-spookiest-halloween-movies-on-netflix' => array(
			'title'          => 'Spider-Man’s Iron Spider Suit Could Have Looked Way Different',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=qxLn69ptWX8',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:31',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'fedex-pilot-detained-in-china-for-item-found-in-luggage' => array(
			'title'          => 'A school looking after its children – and their families',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'news,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=uc5LDWk_49g',
				'jnews_video_option'     => array(
					'video_duration' => '00:22:31',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'trump-whistleblower-saga-threatens-to-blow-up-2020-campaign' => array(
			'title'          => 'Could killing of Iranian general help Trump get re-elected?',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=V5j7_euZbPk',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:21',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'john-mayer-shares-new-single-carry-me-away'       => array(
			'title'          => 'Beyoncé Looked Like a Golden Goddess at the Globes: See the Pics',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video6',
			'taxonomy'       => array(
				'category'    => 'music,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:technology:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=Xl_HFHemrkI',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:35',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'ps4-pro-will-make-more-games-look-better-on-older-tvs' => array(
			'title'          => 'Intel’s Horseshoe Bend concept is a look at the future of foldable PCs',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video7',
			'taxonomy'       => array(
				'category'    => 'gaming,technology',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:music:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=TpVGMdbu2bE',
				'jnews_video_option'     => array(
					'video_duration' => '00:04:17',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),
		'kendall-jenners-birkenstocks-have-gone-international' => array(
			'title'          => 'Balloon trip gives passengers a real bird’s eye view of the desert',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video1',
			'taxonomy'       => array(
				'category'    => 'howto-style,news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:howto-style:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=FoAoR-gSPJQ',
				'jnews_video_option'     => array(
					'video_duration' => '00:02:01',
				),
			),
		),
		'the-deeper-significance-of-the-mall-on-stranger-things' => array(
			'title'          => 'Jumanji: The Next Level Just Quietly Passed Another Big Box Office Milestone',
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video2',
			'taxonomy'       => array(
				'category'    => 'entertainment,movie',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:news:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=FuUB_FPa0h0',
				'jnews_video_option'     => array(
					'video_duration' => '00:03:47',
					'video_preview'  => '{{image:webp4:src}}',
				),
			),
		),
		'2019-ubud-writers-readers-festival-8-reasons-why-you-should-come' => array(
			'title'          => 'China pneumonia: Sars ruled out as dozens fall ill in Wuhan',
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video3',
			'taxonomy'       => array(
				'category'    => 'news',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:travel:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=oVMxoBNYASw',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:53',
					'video_preview'  => '{{image:webp1:src}}',
				),
			),
		),
		'nintendo-switch-unboxing-review-indonesia'        => array(
			'title'          => "After nearly a decade, Stalker: Call of Pripyat's Gunslinger mod is in open beta",
			'content'        => 'post2.txt',
			'post_type'      => 'post',
			'featured_image' => 'video4',
			'taxonomy'       => array(
				'category'    => 'entertainment,gaming',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:movie:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=B0qXOAPcLyk',
				'jnews_video_option'     => array(
					'video_duration' => '00:09:13',
					'video_preview'  => '{{image:webp2:src}}',
				),
			),
		),
		'getting-cheap-airfare-for-last-minute-travel'     => array(
			'title'          => "Ricki Lake reveals 'quiet hell' of hair loss as she shows off buzz cut",
			'content'        => 'post1.txt',
			'post_type'      => 'post',
			'featured_image' => 'video5',
			'taxonomy'       => array(
				'category'    => 'entertainment,music',
				'post_tag'    => 'dua-lipa,mtv,music,video',
				'post_format' => 'post-format-video',
			),
			'metabox'        => array(
				'jnews_primary_category' => array( 'id' => '{{category:gaming:id}}' ),
				'_format_video_embed'    => 'https://www.youtube.com/watch?v=syaGe7sZOdE',
				'jnews_video_option'     => array(
					'video_duration' => '00:00:29',
					'video_preview'  => '{{image:webp3:src}}',
				),
			),
		),

		// page
		'home-1'                                           => array(
			'title'     => 'Home 1',
			'content'   => 'home1.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'        => 'template-builder.php',
				'_wpb_post_custom_css'     => '.jeg_content{padding-top:10px}',
				'_elementor_data'          => 'home1.json',
				'_elementor_edit_mode'     => 'builder',
				'_elementor_page_settings' => array(
					'custom_css' => '.jeg_content{padding-top:10px}',
				),
			),
		),
		'home-2'                                           => array(
			'title'     => 'Home 2',
			'content'   => 'home2.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1578450156684{padding-top: 50px !important;padding-bottom: 15px !important;background-color: #f5f1fe !important;}',
				'_wpb_post_custom_css'       => '.jeg_content{padding-top:20px}.jeg_postblock_video_2.jeg_col_1o3 .jeg_post_title{font-size:16px}',
				'_elementor_data'            => 'home2.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1578450156684{padding-top: 50px !important;padding-bottom: 15px !important;background-color: #f5f1fe !important;}.jeg_content{padding-top:20px}.jeg_postblock_video_2.jeg_col_1o3 .jeg_post_title{font-size:16px}',
				),
			),
		),
		'home-3'                                           => array(
			'title'     => 'Home 3',
			'content'   => 'home3.txt',
			'post_type' => 'page',
			'metabox'   => array(
				'_wp_page_template'          => 'template-builder.php',
				'_wpb_shortcodes_custom_css' => '.vc_custom_1578452204258{padding-top: 10px !important;padding-bottom: 10px !important;background-color: #0f0f0f !important;}.vc_custom_1578450705067{margin-bottom: 0px !important;}',
				'_wpb_post_custom_css'       => '.jeg_content{padding-top:0}',
				'_elementor_data'            => 'home3.json',
				'_elementor_edit_mode'       => 'builder',
				'_elementor_page_settings'   => array(
					'custom_css' => '.vc_custom_1578452204258{padding-top: 10px !important;padding-bottom: 10px !important;background-color: #0f0f0f !important;}.vc_custom_1578450705067{margin-bottom: 0px !important;}.jeg_content{padding-top:0}',
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
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'post',
				'menu-item-object-id' => '{{post:amazon-sees-alexa-devices-more-than-double-in-just-one-year:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		'vimeo-video'                  => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Vimeo Video',
				'menu-item-parent-id' => '{{menu:features:id}}',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'post',
				'menu-item-object-id' => '{{post:boost-your-events-visibility-with-jazz-near-yous-spotlight-service:id}}',
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
				'menu-item-object-id' => '{{post:golf-are-you-ready-for-the-u-s-open-don-cheadle-is:id}}',
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
		// end child features

		// Trending
		'trending'                     => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Trending',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:trending:id}}',
				'menu-item-status'    => 'publish',
			),
		),

		// Latest
		'latest'                       => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'Latest',
				'menu-item-type'      => 'post_type',
				'menu-item-object'    => 'page',
				'menu-item-object-id' => '{{post:latest:id}}',
				'menu-item-status'    => 'publish',
			),
		),

		// Category
		'category'                     => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'  => 'Category',
				'menu-item-type'   => 'custom',
				'menu-item-url'    => '#',
				'menu-item-status' => 'publish',
			),
		),

		// category child
		'news'                         => array(
			'location'       => 'main-navigation',
			'menu-item-data' => array(
				'menu-item-title'     => 'News',
				'menu-item-parent-id' => '{{menu:category:id}}',
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
				'menu-item-parent-id' => '{{menu:category:id}}',
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
				'menu-item-parent-id' => '{{menu:category:id}}',
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
				'menu-item-parent-id' => '{{menu:category:id}}',
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
				'menu-item-parent-id' => '{{menu:category:id}}',
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
				'menu-item-parent-id' => '{{menu:category:id}}',
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
				'menu-item-parent-id' => '{{menu:category:id}}',
				'menu-item-type'      => 'taxonomy',
				'menu-item-object'    => 'category',
				'menu-item-object-id' => '{{category:gaming:id}}',
				'menu-item-status'    => 'publish',
			),
		),
		// end category child


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
		'trending-2'                   => array(
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
		'latest-2'                     => array(
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
		'jnews-jsonld',
		'jnews-meta-header',
		'jnews-social-login',
		'buddypress',
		'buddypress-followers',
		'mailchimp-for-wp',
	),

);
