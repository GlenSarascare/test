<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Class OriginCode_Gallery_Video_Frontend_Scripts
 */
class OriginCode_Gallery_Video_Frontend_Scripts {

	/**
	 * OriginCode_Gallery_Video_Frontend_Scripts constructor.
	 */
	public function __construct() {
		add_action( 'origincode_gallery_video_shortcode_scripts', array( $this, 'frontend_scripts' ), 10, 4 );
		add_action( 'origincode_gallery_video_shortcode_scripts', array( $this, 'frontend_styles' ), 10, 2 );
		add_action( 'origincode_gallery_video_localize_scripts', array( $this, 'localize_scripts' ), 10, 1 );
	}

	/**
	 * Enqueue styles
	 */
	public function frontend_styles( $id, $origincode_gallery_video_view ) {
		$origincode_gallery_video_get_option = origincode_gallery_video_get_default_general_options();
		wp_register_style( 'gallery-video-style2-os-css', plugins_url( '../../assets/style/style.css', __FILE__ ) );
		wp_enqueue_style( 'gallery-video-style2-os-css' );

        if ( get_option('origincode_gallery_video_lightbox_type') == 'old_type' ) {
            wp_register_style( 'lightbox-css', plugins_url( '../assets/style/lightbox.css', __FILE__ ) );
            wp_enqueue_style( 'lightbox-css' );

            wp_register_style( 'origincode_gallery_video_colorbox_css', untrailingslashit( origincode_gallery_video()->plugin_url() ) . '/assets/style/colorbox-' . $origincode_gallery_video_get_option['origincode_gallery_video_light_box_style'] . '.css' );
            wp_enqueue_style( 'origincode_gallery_video_colorbox_css' );
        } elseif (  get_option('origincode_gallery_video_lightbox_type') == 'new_type' ) {
            wp_register_style( 'origincode_gallery_video_resp_lightbox_css', untrailingslashit( origincode_gallery_video()->plugin_url() ) . '/assets/style/responsive_lightbox.css' );
            wp_enqueue_style( 'origincode_gallery_video_resp_lightbox_css' );

                    }


        wp_register_style( 'fontawesome-css', plugins_url( '../../assets/style/css/font-awesome.css', __FILE__ ) );
		wp_enqueue_style( 'fontawesome-css' );

		wp_enqueue_style( 'origincode_gallery_video_colorbox_css', untrailingslashit( OriginCode_Gallery_Video()->plugin_url() ) . '/assets/style/colorbox-' . $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_style' ] . '.css' );

		if ( $origincode_gallery_video_view == '1' ) {
			wp_register_style( 'animate-css', plugins_url( '../../assets/style/animate.min.css', __FILE__ ) );
			wp_enqueue_style( 'animate-css' );
			wp_register_style( 'liquid-slider-css', plugins_url( '../../assets/style/liquid-slider.css', __FILE__ ) );
			wp_enqueue_style( 'liquid-slider-css' );
		}
		if ( $origincode_gallery_video_view == '4' ) {
			wp_register_style( 'thumb_view-css', plugins_url( '../../assets/style/thumb_view.css', __FILE__ ) );
			wp_enqueue_style( 'thumb_view-css' );
		}
		if ( $origincode_gallery_video_view == '6' ) {
			wp_register_style( 'thumb_view-css', plugins_url( '../../assets/style/justified-gallery.css', __FILE__ ) );
			wp_enqueue_style( 'thumb_view-css' );
		}
	}

	/**
	 * Enqueue scripts
	 */
	public function frontend_scripts( $id, $origincode_gallery_video_view, $has_youtube, $has_vimeo ) {
		$view_slug = origincode_gallery_video_get_view_slag_by_id( $id );
        $origincode_gallery_video_get_option = origincode_gallery_video_get_default_general_options();
		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script( 'jquery' );
		}

        if (  get_option('origincode_gallery_video_lightbox_type') == 'old_type' ) {
            wp_register_script( 'jquery.vgcolorbox-js', plugins_url( '../../assets/js/jquery.colorbox.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
            wp_enqueue_script( 'jquery.vgcolorbox-js' );
        } elseif (  get_option('origincode_gallery_video_lightbox_type') == 'new_type' ) {
            wp_register_script( 'gallery-video-resp-lightbox-js', plugins_url( '../../assets/js/lightbox.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
            wp_enqueue_script( 'gallery-video-resp-lightbox-js' );

            wp_register_script( 'mousewheel-min-js', plugins_url( '../../assets/js/mousewheel.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
            wp_enqueue_script( 'mousewheel-min-js' );

            wp_register_script( 'froogaloop2-min-js', plugins_url( '../../assets/js/vimeo-video.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
            wp_enqueue_script( 'froogaloop2-min-js' );
        }

		wp_register_script( 'gallery-video-origincodemicro-min-js', plugins_url( '../../assets/js/jquery.block.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'gallery-video-origincodemicro-min-js' );

		wp_register_script( 'gallery-video-front-end-js-' . $view_slug, plugins_url( '../../assets/js/view-' . $view_slug . '.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'gallery-video-front-end-js-' . $view_slug );

		wp_register_script( 'gallery-video-custom-js', plugins_url( '../../assets/js/custom.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'gallery-video-custom-js' );

		if ( $origincode_gallery_video_view == '1' ) {
			wp_register_script( 'easing-js', plugins_url( '../../assets/js/jquery.easing.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'easing-js' );
			wp_register_script( 'touch_swipe-js', plugins_url( '../../assets/js/jquery.touch.swipe.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'touch_swipe-js' );
			wp_register_script( 'liquid-slider-js', plugins_url( '../../assets/js/jquery.liquid.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'liquid-slider-js' );
		}
		if ( $origincode_gallery_video_view == '4' ) {
			wp_register_script( 'thumb-view-js', plugins_url( '../../assets/js/thumb_view.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'thumb-view-js' );
			wp_register_script( 'lazyload-min-js', plugins_url( '../../assets/js/jquery.lazyload.min.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'lazyload--min-js' );
		}
		if ( $origincode_gallery_video_view == '6' ) {
			wp_register_script( 'video-jusiifed-js', plugins_url( '../../assets/js/justified-gallery.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
			wp_enqueue_script( 'video-jusiifed-js' );
		}


	}

	public function localize_scripts( $id ) {
		global $wpdb;
        $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."origincode_videogallery_galleries where id = '%d' order by id ASC",$id);
		$origincode_gallery_video        = $wpdb->get_results( $query );
		$admin_url      = admin_url( "admin-ajax.php" );
		$origincode_gallery_video_params = origincode_gallery_video_get_default_general_options();
        $query=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC",$id);
		$videos         = $wpdb->get_col( $query );
		$has_youtube    = 'false';
		$has_vimeo      = 'false';
		$view_slug      = $view_slug = origincode_gallery_video_get_view_slag_by_id( $id );
		foreach ( $videos as $video_row ) {
			if ( strpos( $video_row, 'youtu' ) !== false ) {
				$has_youtube = 'true';
			}
			if ( strpos( $video_row, 'vimeo' ) !== false ) {
				$has_vimeo = 'true';
			}
		}
		$origincode_gallery_video_get_option = origincode_gallery_video_get_default_general_options();
		$origincode_gallery_video_view = $origincode_gallery_video[0]->origincode_sl_effects;
        $lightbox     = array(
            'lightbox_transition'     => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_transition' ],
            'lightbox_speed'          => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_speed' ],
            'lightbox_fadeOut'        => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_fadeout' ],
            'lightbox_title'          => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_title' ],
            'lightbox_scalePhotos'    => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_scalephotos' ],
            'lightbox_scrolling'      => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_scrolling' ],
            'lightbox_opacity'        => ( $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_opacity' ] / 100 ) + 0.001,
            'lightbox_open'           => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_open' ],
            'lightbox_returnFocus'    => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_returnfocus' ],
            'lightbox_trapFocus'      => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_trapfocus' ],
            'lightbox_fastIframe'     => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_fastiframe' ],
            'lightbox_preloading'     => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_preloading' ],
            'lightbox_overlayClose'   => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_overlayclose' ],
            'lightbox_escKey'         => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_esckey' ],
            'lightbox_arrowKey'       => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_arrowkey' ],
            'lightbox_loop'           => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_loop' ],
            'lightbox_closeButton'    => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_closebutton' ],
            'lightbox_previous'       => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_previous' ],
            'lightbox_next'           => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_next' ],
            'lightbox_close'          => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_close' ],
            'lightbox_html'           => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_html' ],
            'lightbox_photo'          => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_photo' ],
            'lightbox_innerWidth'     => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_innerwidth' ],
            'lightbox_innerHeight'    => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_innerheight' ],
            'lightbox_initialWidth'   => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_initialwidth' ],
            'lightbox_initialHeight'  => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_initialheight' ],
            'lightbox_slideshow'      => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_slideshow' ],
            'lightbox_slideshowSpeed' => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_slideshowspeed' ],
            'lightbox_slideshowAuto'  => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_slideshowauto' ],
            'lightbox_slideshowStart' => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_slideshowstart' ],
            'lightbox_slideshowStop'  => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_slideshowstop' ],
            'lightbox_fixed'          => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_fixed' ],
            'lightbox_reposition'     => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_reposition' ],
            'lightbox_retinaImage'    => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_retinaimage' ],
            'lightbox_retinaUrl'      => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_retinaurl' ],
            'lightbox_retinaSuffix'   => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_retinasuffix' ],
            'lightbox_maxWidth'       => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_maxwidth' ],
            'lightbox_maxHeight'      => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_maxheight' ],
            'lightbox_sizeFix'        => $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_size_fix' ],
            'galleryVideoID'          => $id,
            'liquidSliderInterval'    => $origincode_gallery_video[0]->description
        );

        if ( $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_size_fix' ] == 'false' ) {
            $lightbox['lightbox_width'] = '';
        } else {
            $lightbox['lightbox_width'] = $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_width' ];
        }

        if ( $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_size_fix' ] == 'false' ) {
            $lightbox['lightbox_height'] = '';
        } else {
            $lightbox['lightbox_height'] = $origincode_gallery_video_get_option[ 'origincode_gallery_video_light_box_height' ];
        }

        $pos = $origincode_gallery_video_get_option[ 'origincode_gallery_video_lightbox_open_position' ];
        switch ( $pos ) {
            case 1:
                $lightbox['lightbox_top']    = '10%';
                $lightbox['lightbox_bottom'] = 'false';
                $lightbox['lightbox_left']   = '10%';
                $lightbox['lightbox_right']  = 'false';
                break;
            case 2:
                $lightbox['lightbox_top']    = '10%';
                $lightbox['lightbox_bottom'] = 'false';
                $lightbox['lightbox_left']   = 'false';
                $lightbox['lightbox_right']  = 'false';
                break;
            case 3:
                $lightbox['lightbox_top']    = '10%';
                $lightbox['lightbox_bottom'] = 'false';
                $lightbox['lightbox_left']   = 'false';
                $lightbox['lightbox_right']  = '10%';
                break;
            case 4:
                $lightbox['lightbox_top']    = 'false';
                $lightbox['lightbox_bottom'] = 'false';
                $lightbox['lightbox_left']   = '10%';
                $lightbox['lightbox_right']  = 'false';
                break;
            case 5:
                $lightbox['lightbox_top']    = 'false';
                $lightbox['lightbox_bottom'] = 'false';
                $lightbox['lightbox_left']   = 'false';
                $lightbox['lightbox_right']  = 'false';
                break;
            case 6:
                $lightbox['lightbox_top']    = 'false';
                $lightbox['lightbox_bottom'] = 'false';
                $lightbox['lightbox_left']   = 'false';
                $lightbox['lightbox_right']  = '10%';
                break;
            case 7:
                $lightbox['lightbox_top']    = 'false';
                $lightbox['lightbox_bottom'] = '10%';
                $lightbox['lightbox_left']   = '10%';
                $lightbox['lightbox_right']  = 'false';
                break;
            case 8:
                $lightbox['lightbox_top']    = 'false';
                $lightbox['lightbox_bottom'] = '10%';
                $lightbox['lightbox_left']   = 'false';
                $lightbox['lightbox_right']  = 'false';
                break;
            case 9:
                $lightbox['lightbox_top']    = 'false';
                $lightbox['lightbox_bottom'] = '10%';
                $lightbox['lightbox_left']   = 'false';
                $lightbox['lightbox_right']  = '10%';
                break;
        }

        $justified        = array(
            'imagemargin'            => $origincode_gallery_video_get_option[ 'origincode_gallery_video_ht_view8_element_padding' ],
            'imagerandomize'         => $origincode_gallery_video_get_option[ 'origincode_gallery_video_ht_view8_element_randomize' ],
            'imagecssAnimation'      => $origincode_gallery_video_get_option[ 'origincode_gallery_video_ht_view8_element_cssAnimation' ],
            'imagecssAnimationSpeed' => $origincode_gallery_video_get_option[ 'origincode_gallery_video_ht_view8_element_animation_speed' ],
            'imageheight'            => $origincode_gallery_video_get_option[ 'origincode_gallery_video_ht_view8_element_height' ],
            'imagejustify'           => $origincode_gallery_video_get_option[ 'origincode_gallery_video_ht_view8_element_justify' ],
            'imageshowcaption'       => $origincode_gallery_video_get_option[ 'origincode_gallery_video_ht_view8_element_show_caption' ]
        );
		$justified_params = array();
		foreach ( $justified as $name => $value ) {
			$justified_params[ $name ] = $value;
		}


        $lightbox_options = array(
            'origincode_gallery_video_lightbox_slideAnimationType'            => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideAnimationType'],
            'origincode_gallery_video_lightbox_lightboxView'                  => get_option('origincode_gallery_video_lightbox_lightboxView'),
            'origincode_gallery_video_lightbox_speed_new'                     => get_option('origincode_gallery_video_lightbox_speed_new'),
            'origincode_gallery_video_lightbox_width_new'                     => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_width_new'],
            'origincode_gallery_video_lightbox_height_new'                    => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_height_new'],
            'origincode_gallery_video_lightbox_videoMaxWidth'                 => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_videoMaxWidth'],
            'origincode_gallery_video_lightbox_overlayDuration'               => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_overlayDuration'],
            'origincode_gallery_video_lightbox_overlayClose_new'              => get_option('origincode_gallery_video_lightbox_overlayClose_new'),
            'origincode_gallery_video_lightbox_loop_new'                      => get_option('origincode_gallery_video_lightbox_loop_new'),
            'origincode_gallery_video_lightbox_escKey_new'                    => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_escKey_new'],
            'origincode_gallery_video_lightbox_keyPress_new'                  => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_keyPress_new'],
            'origincode_gallery_video_lightbox_arrows'                        => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_arrows'],
            'origincode_gallery_video_lightbox_mouseWheel'                    => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_mouseWheel'],
            'origincode_gallery_video_lightbox_showCounter'                   => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_showCounter'],
            'origincode_gallery_video_lightbox_nextHtml'                      => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_nextHtml'],
            'origincode_gallery_video_lightbox_prevHtml'                      => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_prevHtml'],
            'origincode_gallery_video_lightbox_sequence_info'                 => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_sequence_info'],
            'origincode_gallery_video_lightbox_sequenceInfo'                  => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_sequenceInfo'],
            'origincode_gallery_video_lightbox_slideshow_new'                 => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideshow_new'],
            'origincode_gallery_video_lightbox_slideshow_auto_new'            => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideshow_auto_new'],
            'origincode_gallery_video_lightbox_slideshow_speed_new'           => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideshow_speed_new'],
            'origincode_gallery_video_lightbox_slideshow_start_new'           => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideshow_start_new'],
            'origincode_gallery_video_lightbox_slideshow_stop_new'            => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_slideshow_stop_new'],
            'origincode_gallery_video_lightbox_watermark'                     => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark'],
            'origincode_gallery_video_lightbox_socialSharing'                 => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_socialSharing'],
            'origincode_gallery_video_lightbox_facebookButton'                => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_facebookButton'],
            'origincode_gallery_video_lightbox_twitterButton'                 => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_twitterButton'],
            'origincode_gallery_video_lightbox_googleplusButton'              => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_googleplusButton'],
            'origincode_gallery_video_lightbox_pinterestButton'               => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_pinterestButton'],
            'origincode_gallery_video_lightbox_linkedinButton'                => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_linkedinButton'],
            'origincode_gallery_video_lightbox_tumblrButton'                  => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_tumblrButton'],
            'origincode_gallery_video_lightbox_redditButton'                  => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_redditButton'],
            'origincode_gallery_video_lightbox_bufferButton'                  => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_bufferButton'],
            'origincode_gallery_video_lightbox_diggButton'                    => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_diggButton'],
            'origincode_gallery_video_lightbox_vkButton'                      => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_vkButton'],
            'origincode_gallery_video_lightbox_yummlyButton'                  => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_yummlyButton'],
            'origincode_gallery_video_lightbox_watermark_text'                => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_text'],
            'origincode_gallery_video_lightbox_watermark_textColor'           => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_textColor'],
            'origincode_gallery_video_lightbox_watermark_textFontSize'        => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_textFontSize'],
            'origincode_gallery_video_lightbox_watermark_containerBackground' => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_containerBackground'],
            'origincode_gallery_video_lightbox_watermark_containerOpacity'    => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_containerOpacity'],
            'origincode_gallery_video_lightbox_watermark_containerWidth'      => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_containerWidth'],
            'origincode_gallery_video_lightbox_watermark_position_new'        => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_position_new'],
            'origincode_gallery_video_lightbox_watermark_opacity'             => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_opacity'],
            'origincode_gallery_video_lightbox_watermark_margin'              => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_margin'],
            'origincode_gallery_video_lightbox_watermark_img_src_new'         => $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_img_src_new'],
        );

        if ( get_option('origincode_gallery_video_lightbox_type')== 'old_type' ) {
            wp_localize_script( 'jquery.vgcolorbox-js', 'lightbox_obj', $lightbox );
        }
        elseif ( get_option('origincode_gallery_video_lightbox_type') == 'new_type' ) {
            list($r,$g,$b) = array_map('hexdec',str_split($origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark_containerBackground'],2));
            $titleopacity=$origincode_gallery_video_get_option["origincode_gallery_video_lightbox_watermark_containerOpacity"]/100;
            $lightbox_options['origincode_gallery_video_lightbox_watermark_container_bg_color'] =  'rgba('.$r.','.$g.','.$b.','.$titleopacity.')';
            wp_localize_script( 'gallery-video-resp-lightbox-js', 'origincode_gallery_video_resp_lightbox_obj', $lightbox_options );
            wp_localize_script( 'gallery-video-custom-js', 'is_watermark', $origincode_gallery_video_get_option['origincode_gallery_video_lightbox_watermark'] );
            wp_localize_script( 'gallery-video-resp-lightbox-js', 'videoGalleryDisableRightClickLightbox', get_option( 'origincode_gallery_video_disable_right_click' ) );
        }
        wp_localize_script( 'gallery-video-custom-js', 'video_lightbox_type', get_option('origincode_gallery_video_lightbox_type') );

		wp_localize_script( 'gallery-video-front-end-js-' . $view_slug, 'param_obj', $origincode_gallery_video_params );
		wp_localize_script( 'gallery-video-front-end-js-' . $view_slug, 'adminUrl', $admin_url );
		wp_localize_script( 'gallery-video-front-end-js-' . $view_slug, 'hasYoutube', $has_youtube );
		wp_localize_script( 'gallery-video-front-end-js-' . $view_slug, 'hasVimeo', $has_vimeo );
		wp_localize_script( 'jquery.vgcolorbox-js', 'lightbox_obj', $lightbox );
		wp_localize_script( 'gallery-video-custom-js', 'galleryVideoId', $id );
		wp_localize_script( 'video-jusiifed-js', 'justified_obj', $justified );
        wp_localize_script( 'gallery-video-custom-js', 'origincode_gallery_video_view', $view_slug );

    }
}
