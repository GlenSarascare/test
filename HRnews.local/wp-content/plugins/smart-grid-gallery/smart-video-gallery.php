<?php

/*
Plugin Name: Video Gallery - Vimeo and YouTube Gallery
Plugin URI: https://origincode.co/downloads/video-gallery/
Description: Build your utmost YouTube Gallery right away with Our Video Gallery plugin.
Version: 1.1.1
Author: OriginCode
Author URI: https://origincode.co/
Domain Path: /languages/
License: GNU/GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

include_once( 'settings.php' );

if ( ! class_exists( 'OriginCode_Gallery_Video' ) ) :

    final class OriginCode_Gallery_Video {

        /**
         * Version of plugin
         * @var float
         */
        public $version = '1.1.1';
        /**
         * @var int
         */
        private $project_id = 5;

        /**
         * @var string
         */
        private $project_plan = 'free';

        /**
         * @var string
         */
        private $slug = 'gallery-video';

        /**
         * Instance of OriginCode_Gallery_Video_Admin class to manage admin
         * @var OriginCode_Gallery_Video_Admin instance
         */
        public $admin = null;

        /**
         * Instance of OriginCode_Gallery_Video_Template_Loader class to manage admin
         * @var OriginCode_Gallery_Video_Template_Loader instance
         */
        public $template_loader = null;

        /**
         * The single instance of the class.
         *
         * @var OriginCode_Gallery_Video
         */
        protected static $_instance = null;

        /**
         * Main OriginCode_Gallery_Video Instance.
         *
         * Ensures only one instance of OriginCode_Gallery_Video is loaded or can be loaded.
         *
         * @static
         * @see OriginCode_Gallery_Video()
         * @return OriginCode_Gallery_Video - Main instance.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        private function __clone() {
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'gallery-video' ), '2.1' );
        }

        /**
         * Unserializing instances of this class is forbidden.
         */
        private function __wakeup() {
            _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'gallery-video' ), '2.1' );
        }

        /**
         * OriginCode_Gallery_Video Constructor.
         */
        private function __construct() {
            $this->define_constants();
            $this->includes();
            $this->init_hooks();
            global $OriginCode_Gallery_Video_url,$OriginCode_Gallery_Video_path;
            $OriginCode_Gallery_Video_path = untrailingslashit( plugin_dir_path( __FILE__ ) );
            $OriginCode_Gallery_Video_url = plugins_url('', __FILE__ );
            do_action( 'OriginCode_Gallery_Video_loaded' );
        }

        /**
         * Hook into actions and filters.
         */
        private function init_hooks() {
            register_activation_hook( __FILE__, array( 'OriginCode_Gallery_Video_Install', 'install' ) );
            add_action( 'init', array( $this, 'init' ), 0 );
            add_action( 'plugins_loaded', array($this,'load_plugin_textdomain') );
            add_action( 'widgets_init', array( 'OriginCode_Gallery_Video_Widgets', 'init' ) );
            add_filter('cron_schedules',array($this,'custom_cron_job_recurrence'));
            add_action('origincode_video_gallery_vimeo_script', array($this, 'vimeo_script'));
            add_action('origincode_video_gallery_youtube_script', array($this, 'youtube_script'));
        }

        public function vimeo_script()
        {
            wp_enqueue_script('origincode_video_gallery_vimeo', $this->plugin_url().'/assets/js/vimeo.lib.min.js');
        }

        public function youtube_script()
        {
            wp_enqueue_script('origincode_video_gallery_youtube', $this->plugin_url().'/assets/js/youtube.lib.js');
        }

        /**
         * Define Video Gallery Constants.
         */
        private function define_constants() {
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_PLUGIN_URL', plugin_dir_url(__FILE__));
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_PLUGIN_FILE', __FILE__ );
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_VERSION', $this->version );
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_IMAGES_PATH', $this->plugin_path(). DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR );
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_IMAGES_URL', untrailingslashit($this->plugin_url() . '/assets/images/' ));
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_TEMPLATES_PATH', $this->plugin_path() . DIRECTORY_SEPARATOR . 'templates');
            $this->define( 'ORIGINCODE_GALLERY_VIDEO_TEMPLATES_URL', untrailingslashit($this->plugin_url()) . '/templates/');
        }

        /**
         * Define constant if not already set.
         *
         * @param  string $name
         * @param  string|bool $value
         */
        private function define( $name, $value ) {
            if ( ! defined( $name ) ) {
                define( $name, $value );
            }
        }

        /**
         * What type of request is this?
         * string $type ajax, frontend or admin.
         *
         * @return bool
         */
        private function is_request( $type ) {
            switch ( $type ) {
                case 'admin' :
                    return is_admin();
                case 'ajax' :
                    return defined( 'DOING_AJAX' );
                case 'cron' :
                    return defined( 'DOING_CRON' );
                case 'frontend' :
                    return  ! is_admin() && ! defined( 'DOING_CRON' );
            }
        }

        /**
         * Include required core files used in admin and on the frontend.
         */
        public function includes() {
            include_once( 'includes/functions/parameters.php' );
            include_once( 'includes/functions/functions.php' );
            if ( $this->is_request( 'admin' ) ) {
                include_once( 'includes/admin/admin-functions.php' );
            }
        }


        public function custom_cron_job_recurrence($schedules)
        {
            $schedules['origincode-video-gallery-weekly'] = array(
                'display' => __( 'Once per week', 'origincode-video-gallery' ),
                'interval' => 604800
            );
            return $schedules;
        }

        /**
         * Load plugin text domain
         */
        public function load_plugin_textdomain(){
            load_plugin_textdomain( 'gallery-video', false, $this->plugin_path() . '/languages/' );
        }

        /**
         * Init Image gallery when WordPress `initialises.
         */
        public function init() {
            // Before init action.
            do_action( 'before_OriginCode_Gallery_Video_init' );

            $this->template_loader = new OriginCode_Gallery_Video_Template_Loader();

            if ( $this->is_request( 'admin' ) ) {

                $this->admin = new OriginCode_Gallery_Video_Admin();

                new OriginCode_Gallery_Video_Admin_Assets();

            }

            new OriginCode_Gallery_Video_Frontend_Scripts();

            new OriginCode_Gallery_Video_Ajax();

            new OriginCode_Gallery_Video_Shortcode();

            // Init action.
            do_action( 'OriginCode_Gallery_Video_init' );
        }

        /**
         * Get Ajax URL.
         * @return string
         */
        public function ajax_url() {
            return admin_url( 'admin-ajax.php', 'relative' );
        }

        /**
         * Video Gallery Plugin Path.
         *
         * @var string
         * @return string
         */
        public function plugin_path(){
            return untrailingslashit( plugin_dir_path( __FILE__ ) );
        }

        /**
         * Video Gallery Plugin Url.
         * @return string
         */
        public function plugin_url(){
            return plugins_url('', __FILE__ );
        }

        /**
         * @return int
         */
        public function get_project_id()
        {
            return $this->project_id;
        }

        /**
         * @return string
         */
        public function get_project_plan()
        {
            return $this->project_plan;
        }

        public function get_slug()
        {
            return $this->slug;
        }
        /**
         * Get plugin version.
         *
         * @return string
         */
        public function get_version() {
            return $this->version;
        }

        public function template_path()
        {
            return apply_filters('origincode_gallery_video_template_path', 'gallery-video/');
        }
    }

endif;

function OriginCode_Gallery_Video(){
    return OriginCode_Gallery_Video::instance();
}

$GLOBALS['OriginCode_Gallery_Video'] = OriginCode_Gallery_Video();