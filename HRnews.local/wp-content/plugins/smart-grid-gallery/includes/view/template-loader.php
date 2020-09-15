<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class OriginCode_Gallery_Video_Template_Loader
{
    /**
     * @param $template_name
     * @param string $template_path
     * @param string $default_path
     *
     * @return mixed
     */
    public static function locate_template( $template_name, $template_path = '', $default_path = '' ) {
        if ( ! $template_path ) {
            $template_path = OriginCode_Gallery_Video()->template_path();
        }
        if ( ! $default_path ) {
            $default_path = OriginCode_Gallery_Video()->plugin_path() . '/templates/';
        }
        /**
         * Look within passed path within the theme - this is priority.
         */
        $template = locate_template(
            array(
                trailingslashit( $template_path ) . $template_name,
                $template_name
            )
        );
        /**
         * Get default template
         */
        if ( ! $template ) {
            $template = $default_path . $template_name;
        }
        /**
         * Return what we found.
         */
        return apply_filters( 'shop_ct_locate_template', $template, $template_name, $template_path );
    }
    /**
     * @param $template_name
     * @param array $args
     * @param string $template_path
     * @param string $default_path
     */
    public static function get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
        if ( $args && is_array( $args ) ) {
            extract( $args );
        }
        $located = self::locate_template( $template_name, $template_path, $default_path );
        if ( ! file_exists( $located ) ) {
            _doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '1.0' );
            return;
        }
        // Allow 3rd party plugin filter template file from their plugin.
        $located = apply_filters( 'shop_ct_get_template', $located, $template_name, $args, $template_path, $default_path );
        do_action( 'shop_ct_before_template_part', $template_name, $template_path, $located, $args );
        include( $located );
        do_action( 'shop_ct_after_template_part', $template_name, $template_path, $located, $args );
    }
    /**
     * @param $template_name
     * @param array $args
     * @param string $template_path
     * @param string $default_path
     * @return string
     */
    public static function get_template_buffer($template_name, $args = array(), $template_path = '', $default_path = ''){
        ob_start();
        self::get_template($template_name, $args, $template_path, $default_path);
        return ob_get_clean();
    }








    /**
     * Load the Plugin shortcode's frontend
     *
     * @param $images
     * @param $origincode_gallery_video_get_option
     * @param $gallery
     */
    public function load_front_end($videos, $origincode_gallery_video_get_option, $origincode_gallery_video)
    {
        $origincode_gallery_videoID = $origincode_gallery_video[0]->id;
        global $wpdb, $post;
        $view = $origincode_gallery_video[0]->origincode_sl_effects;
        $arrowfolder = ORIGINCODE_GALLERY_VIDEO_IMAGES_URL . '/arrows';
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
        $view_slug = origincode_gallery_video_get_view_slag_by_id($origincode_gallery_videoID);
        $disp_type = $origincode_gallery_video[0]->display_type;
        $num = $origincode_gallery_video[0]->content_per_page;
        $total = intval(((count($videos) - 1) / $num) + 1);
        $total_videos = count($videos);
        $pattern = '/-/';
        $pID = $post->ID;
        $path_site = ORIGINCODE_GALLERY_VIDEO_IMAGES_URL;
        if (isset($_GET['page-video' . $origincode_gallery_videoID . $pID])) {
            $page = absint($_GET['page-video' . $origincode_gallery_videoID . $pID]);
        } else {
            $page = '';
        }
        $page = intval($page);
        if (empty($page) or $page < 0) {
            $page = 1;
        }
        if ($page > $total) {
            $page = $total;
        }
        $start = $page * $num - $num;
        $query = $wpdb->prepare("SELECT * FROM " . $wpdb->prefix . "origincode_videoorigincode_gallery_videos where videogallery_id = '%d' order by ordering ASC LIMIT " . $start . "," . $num, $origincode_gallery_videoID);
        $page_videos = $wpdb->get_results($query);
        if ($disp_type == 2) {
            $page_videos = $videos;
            $count_page = 9999;
        }
        $has_youtube = false;
        $has_vimeo = false;
        foreach ($videos as $video) {
            if (strpos($video->image_url, 'youtu') !== false) {
                $has_youtube = true;
            }
            if (strpos($video->image_url, 'vimeo') !== false) {
                $has_vimeo = true;
            }
        }
        $sliderheight = $origincode_gallery_video[0]->sl_height - 2 * $origincode_gallery_video_get_option['origincode_gallery_video_slider_slideshow_border_size'];
        $sliderwidth = $origincode_gallery_video[0]->sl_width - 2 * $origincode_gallery_video_get_option['origincode_gallery_video_slider_slideshow_border_size'];
        $slidereffect = $origincode_gallery_video[0]->videogallery_list_effects_s;
        $slidepausetime = ($origincode_gallery_video[0]->description + $origincode_gallery_video[0]->param);
        $sliderpauseonhover = $origincode_gallery_video[0]->pause_on_hover;
        $sliderposition = $origincode_gallery_video[0]->sl_position;
        $slidechangespeed = $origincode_gallery_video[0]->param;
        $trim_slider_title_position = trim($origincode_gallery_video_get_option['origincode_gallery_video_slider_title_position']);
        $slideshow_title_position = explode('-', $trim_slider_title_position);
        $trim_slider_description_position = trim($origincode_gallery_video_get_option['origincode_gallery_video_slider_description_position']);
        $slideshow_description_position = explode('-', $trim_slider_description_position);
        switch ($view) {
            case 0:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'content-popup' . DIRECTORY_SEPARATOR . 'content-popup-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'content-popup' . DIRECTORY_SEPARATOR . 'content-popup-view.css.php';
                break;
            case 1:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'content-slider' . DIRECTORY_SEPARATOR . 'content-slider-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'content-slider' . DIRECTORY_SEPARATOR . 'content-slider-view.css.php';
                break;
            case 3:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'slider' . DIRECTORY_SEPARATOR . 'slider-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'slider' . DIRECTORY_SEPARATOR . 'slider-view.css.php';
                break;
            case 4:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . 'thumbnails-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'thumbnails' . DIRECTORY_SEPARATOR . 'thumbnails-view.css.php';
                break;
            case 5:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'lightbox-gallery' . DIRECTORY_SEPARATOR . 'lightbox-gallery-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'lightbox-gallery' . DIRECTORY_SEPARATOR . 'lightbox-gallery-view.css.php';
                break;
            case 6:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'justified' . DIRECTORY_SEPARATOR . 'justified-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'justified' . DIRECTORY_SEPARATOR . 'justified-view.css.php';
                break;
            case 7:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'blog-style-gallery' . DIRECTORY_SEPARATOR . 'blog-style-gallery-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'blog-style-gallery' . DIRECTORY_SEPARATOR . 'blog-style-gallery-view.css.php';
                break;
            case 8:
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'playlist' . DIRECTORY_SEPARATOR . 'playlist-view.php';
                require ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'front-end' . DIRECTORY_SEPARATOR . '' . DIRECTORY_SEPARATOR . 'playlist' . DIRECTORY_SEPARATOR . 'playlist-view.css.php';
                break;
        }


    }
}