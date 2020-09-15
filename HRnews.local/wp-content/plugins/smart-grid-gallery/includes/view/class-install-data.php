<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_Install {

	/**
	 * Check Gallery Video version and run the updater is required.
	 *
	 * This check is done on all requests and runs if the versions do not match.
	 */
	public static function check_version() {
		if(get_option( 'origincode_gallery_video_version' ) !== OriginCode_Gallery_Video()->version ){
			self::install();
			update_option( 'origincode_gallery_video_version',OriginCode_Gallery_Video()->version );
		}
	}
    /**
     * Install  Gallery Image.
     */
    public static function install() {
        if ( ! defined( 'ORIGINCODE_GALLERY_VIDEO_INSTALLING' ) ) {
            define( 'ORIGINCODE_GALLERY_VIDEO_INSTALLING', true );
        }
        self::create_tables();

        self::install_options();

        do_action( 'origincode_gallery_video_installed' );
    }

    public static function install_options() {

        if( !get_option( 'origincode_gallery_video_lightbox_type' ) ) {
            if (!get_option( 'origincode_gallery_video_version' )) {
                update_option( 'origincode_gallery_video_lightbox_type', 'new_type' );
            }
            else {
                update_option( 'origincode_gallery_video_lightbox_type', 'old_type' );
            }
        }

        $lightbox_new_options = array(
            'origincode_gallery_video_lightbox_lightboxView'                               => 'view1',
            'origincode_gallery_video_lightbox_speed_new'                                  => '600',
            'origincode_gallery_video_lightbox_overlayClose_new'                           => 'true',
            'origincode_gallery_video_lightbox_loop_new'                                   => 'true',
        );

        if(!get_option( 'origincode_gallery_video_lightbox_lightboxView' )) {
            foreach ($lightbox_new_options as $name => $value) {
                add_option( $name, $value);
            }
        }
        global $wpdb;
        if ( ! get_option( 'origincode_gallery_video_disable_right_click' ) ) {
            update_option( 'origincode_gallery_video_disable_right_click', 'off' );
        }
        $imagesAllFieldsInArray = $wpdb->get_results( "DESCRIBE " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos", ARRAY_A );
        $forUpdate              = 0;
        foreach ( $imagesAllFieldsInArray as $portfoliosField ) {
            if ( $portfoliosField['Field'] == 'thumb_url' ) {
                $forUpdate = 1;
            }
        }
        if ( $forUpdate != 1 ) {
            $wpdb->query( "ALTER TABLE " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos ADD thumb_url text DEFAULT NULL" );
        }
        $imagesAllFieldsInArray2 = $wpdb->get_results( "DESCRIBE " . $wpdb->prefix . "origincode_videogallery_galleries", ARRAY_A );
        $fornewUpdate            = 0;
        foreach ( $imagesAllFieldsInArray2 as $portfoliosField2 ) {
            if ( $portfoliosField2['Field'] == 'display_type' ) {
                $fornewUpdate = 1;
            }
        }
        if ( $fornewUpdate != 1 ) {
            $wpdb->query( "ALTER TABLE " . $wpdb->prefix . "origincode_videogallery_galleries ADD display_type integer DEFAULT '2' " );
            $wpdb->query( "ALTER TABLE " . $wpdb->prefix . "origincode_videogallery_galleries ADD content_per_page integer DEFAULT '5' " );
        }
        $table_name = $wpdb->prefix . 'origincode_videogallery_params';
        if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) == $table_name ) {
            $query                      = "SELECT name,value FROM " . $table_name;
            $video_gallery_table_params = $wpdb->get_results( $query );
        }
        $table_name_galleries = $wpdb->prefix . "origincode_videogallery_galleries";
        $table_name_videos = $wpdb->prefix . "origincode_videoorigincode_gallery_videos";
        if(function_exists('issetTableColumn')) {
            if ( ! issetTableColumn( $table_name_galleries, 'autoslide' ) ) {
                $wpdb->query( "ALTER TABLE " . $table_name_galleries . " ADD autoslide varchar(3) DEFAULT 'on'");
            }
            if ( ! issetTableColumn( $table_name_videos, 'show_controls' ) ) {
                $wpdb->query( "ALTER TABLE " . $table_name_videos . " 
                ADD COLUMN show_controls varchar(3) DEFAULT 'on',
                ADD COLUMN show_info varchar(3) DEFAULT 'on' " );
            }
        }
    }


	private static function create_tables() {
		global $wpdb;

		$sql_origincode_videoorigincode_gallery_videos = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "origincode_videoorigincode_gallery_videos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `videogallery_id` varchar(200) DEFAULT NULL,
  `description` text,
  `image_url` text,
  `sl_url` varchar(128) DEFAULT NULL,
  `sl_type` text NOT NULL,
  `link_target` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` tinyint(4) unsigned DEFAULT NULL,
  `published_in_sl_width` tinyint(4) unsigned DEFAULT NULL,
  `thumb_url` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
)   DEFAULT CHARSET=utf8 AUTO_INCREMENT=5";

		$sql_origincode_videogallery_galleries = "
CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "origincode_videogallery_galleries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `sl_height` int(11) unsigned DEFAULT NULL,
  `sl_width` int(11) unsigned DEFAULT NULL,
  `pause_on_hover` text,
  `videogallery_list_effects_s` text,
  `description` text,
  `param` text,
  `sl_position` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `published` text,
   `origincode_sl_effects` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
)   DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ";

		$table_name = $wpdb->prefix . "origincode_videoorigincode_gallery_videos";
		$sql_2      = "
INSERT INTO 

`" . $table_name . "` (`id`, `name`, `videogallery_id`, `description`, `image_url`, `sl_url`, `sl_type`, `link_target`, `ordering`, `published`, `published_in_sl_width`) VALUES
(1, 'Birdy - People Help The People', '1', '<p>People Help The People by Cherry Ghost performed by Birdy from her self titled debut album.</p>', 'https://www.youtube.com/embed/OmLNs6zQIHo', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 0, 1, NULL),
(2, 'Dakar Trail', '1', '<p>The Dakar Rally is an annual rally raid organised by the Amaury Sport Organisation. Most events since the inception in 1978 were from Paris, France, to Dakar, Senegal, but due to security threats in Mauritania, which led to the cancellation of the 2008 rally, races since 2009 have been held in South America.</p>', 'http://player.vimeo.com/video/122404144', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 1, 1, NULL),
(3, 'Leonard in Slow Motion', '1', '<h6>Leonard in Slow Motion </h6><p>Slow motion is an effect in film-making whereby time appears to be slowed down. It was invented by the Austrian priest August Musger in the early 20th century.</p>', 'http://player.vimeo.com/video/100656498', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 2, 1, NULL),
(4, 'Flying Into Doha - First Impressions of Qatar', '1', '<p>Qatar officially the State of Qatar, is a country located in Western Asia, occupying the small Qatar Peninsula on the northeastern coast of the Arabian Peninsula. Whether the sovereign state should be regarded as a constitutional monarchy or an absolute monarchy is disputed. Its sole land border is with neighbouring Gulf Cooperation Council monarchy Saudi Arabia to the south, with the rest of its territory surrounded by the Persian Gulf.</p>', 'https://www.youtube.com/embed/CPY6GyXCF5A', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 3, 1, NULL),
(5, 'Wastelander Panda Prologue', '1', '<h6>Wastelander Panda Prologue</h6><p>The giant panda also known as panda bear or simply panda, is a bear native to south central China. It is easily recognized by the large, distinctive black patches around its eyes, over the ears, and across its round body. The name giant panda is sometimes used to distinguish it from the red panda. Though it belongs to the order Carnivora, the giant panda is a folivore, with bamboo shoots and leaves making up more than 99% of its diet.</p>', 'http://player.vimeo.com/video/35546493', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 4, 1, NULL),
(6, 'Ocean!', '1', '<p>An ocean is a body of water that composes much of a planets hydrosphere. On Earth, an ocean is one of the major conventional divisions of the World Ocean. These are, in descending order by area, the Pacific, Atlantic, Indian, Southern (Antarctic), and Arctic Oceans.</p>', 'http://player.vimeo.com/video/25323516', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 5, 1, NULL),
(7, 'SpaceX launch to the International Space Station', '1', '<p>Space Exploration Technologies Corp., doing business as SpaceX, is a private US aerospace manufacturer and space transportation services company headquartered in Hawthorne, California. It was founded in 2002 by Elon Musk with the goal of reducing space transportation costs to enable the colonization of Mars.SpaceX has developed the Falcon launch vehicle family and the Dragon spacecraft family.</p>', 'https://www.youtube.com/embed/CfRULatzLZQ', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 6, 1, NULL),
(8, 'Journey Through The Universe', '1', '<h6>Journey Through The Universe - HD Documentary</h6><p>The Universe is all of space and time and their contents, including planets, stars, galaxies, and all other forms of matter and energy. While the spatial size of the entire Universe is unknown, it is possible to measure the size of the observable universe, which is currently estimated to be 93 billion light-years in diameter.</p>', 'https://www.youtube.com/embed/mO3Q4bRQZ3k', 'https://origincode.co/downloads/video-gallery/', 'video', 'on', 7, 1, NULL)";

		$table_name = $wpdb->prefix . "origincode_videogallery_galleries";
		$sql_3      = "

INSERT INTO `$table_name` (`id`, `name`, `sl_height`, `sl_width`, `pause_on_hover`, `videogallery_list_effects_s`, `description`, `param`, `sl_position`, `ordering`, `published`, `origincode_sl_effects`) VALUES
(1, 'First Video Gallery', 375, 600, 'on', 'random', '4000', '1000', 'center', 1, '300', '5')";


		$wpdb->query( $sql_origincode_videoorigincode_gallery_videos );
		$wpdb->query( $sql_origincode_videogallery_galleries );


		if ( ! $wpdb->get_var( "select count(*) from " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos" ) ) {
			$wpdb->query( $sql_2 );
		}
		if ( ! $wpdb->get_var( "select count(*) from " . $wpdb->prefix . "origincode_videogallery_galleries" ) ) {
			$wpdb->query( $sql_3 );
		}
		
	}

	/**
	 * Update DataBase
	 */

}