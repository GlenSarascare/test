<?php
    $social_array   = array(
        "url"           => "fa-globe",
        "facebook"      => "fa-facebook-official",
        "twitter"       => "fa-twitter",
        "linkedin"      => "fa-linkedin",
        "pinterest"     => "fa-pinterest",
        "behance"       => "fa-behance",
        "github"        => "fa-github",
        "flickr"        => "fa-flickr",
        "tumblr"        => "fa-tumblr",
        "dribbble"      => "fa-dribbble",
        "soundcloud"    => "fa-soundcloud",
        "instagram"     => "fa-instagram",
        "vimeo"         => "fa-vimeo",
        "youtube"       => "fa-youtube-play",
        "vk"            => "fa-vk",
        "reddit"        => "fa-reddit",
        "weibo"         => "fa-weibo",
        "rss"           => "fa-rss"
    );

    $socials = "";

	if(is_single()) {
		$author_id = get_post_field( 'post_author', get_the_ID() );
	} else {
		$author_id = get_queried_object()->ID;
	}

    foreach ($social_array as $key => $value) {
        if( get_the_author_meta( $key, $author_id  )){
            $socials = $socials . "<a target='_blank' href='".get_the_author_meta( $key, $author_id  )."' class='".$key."'><i class='fa ".$value."'></i> </a>";
        }
    }

    echo jnews_sanitize_by_pass( $socials );
