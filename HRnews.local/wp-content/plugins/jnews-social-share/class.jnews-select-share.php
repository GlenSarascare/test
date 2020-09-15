<?php
/**
 * @author Jegtheme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'JNews_Select_Share' ) ){
    class JNews_Select_Share
    {
        /**
         * @var JNews_Select_Share
         */
        private static $instance;
        /**
         * @var false|int
         */
        private $post_id;

        /**
         * @return JNews_Select_Share
         */
        public static function getInstance()
        {
            if (null === static::$instance)
            {
                static::$instance = new static();
            }
            return static::$instance;
        }

        /**
         * JNews_Select_Share constructor.
         */
        private function __construct() {
            $this->post_id = get_the_ID();
            $this->setup_hook();
        }

        public function setup_hook() {
            add_action('wp_print_styles', array( $this, 'load_asset' ) );
            add_action('wp_footer', array( $this, 'render_select_share' ));
        }

        public function load_asset(){
	        if ( is_singular( 'post' ) || ( vp_metabox( 'jnews_single_page.share_position', 'top' ) !== 'hide' ) ) {
		        wp_enqueue_style( 'jnews-select-share', JNEWS_SOCIAL_SHARE_URL . '/assets/css/plugin.css', null, null );
		        wp_enqueue_script( 'jnews-select-share', JNEWS_SOCIAL_SHARE_URL . '/assets/js/plugin.js', array('jquery'), null, true );

		        //Localize
		        $json_arr['is_customize_preview'] = is_customize_preview();
		        wp_localize_script( 'jnews-select-share', 'jnews_select_share', $json_arr );
	        }
        }

        public function render_select_share(){
            if ( is_singular( 'post' ) ) {
                $output = '';
                $shares = $this->build_select_share();

                if (!empty($shares)) {
                    foreach ($shares as $share) {
                        $output .= $this->build_social_button($share['social_share']);
                    }
                }
                if ( get_theme_mod( 'jnews_select_share', true ) ) {
                    echo "<div id=\"selectShareContainer\">
                        <div class=\"selectShare-inner\">
                            <div class=\"select_share jeg_share_button\">              
                                {$output}
                            </div>
                            <div class=\"selectShare-arrowClip\">
                                <div class=\"selectShare-arrow\"></div>      
                            </div> 
                        </div>      
                      </div>";
                }
            }
        }

        protected function build_select_share() {
            $button = array(
                array(
                    'social_share'  => 'facebook',
                ),
                array(
                    'social_share'  => 'twitter',
                ),
            );
            return apply_filters('jnews_select_share_button_list', $button);
        }

        /**
         * @param $social
         * @return string
         */
        protected function get_button_class($social)
        {
            switch ($social) {
                case 'facebook' :
                    $button_class = 'jeg_btn-facebook';
                    break;
                case 'twitter' :
                    $button_class = 'jeg_btn-twitter';
                    break;
                case 'pinterest' :
                    $button_class = 'jeg_btn-pinterest';
                    break;
                case 'stumbleupon' :
                    $button_class = 'jeg_btn-stumbleupon';
                    break;
                case 'linkedin' :
                    $button_class = 'jeg_btn-linkedin';
                    break;
                case 'reddit' :
                    $button_class = 'jeg_btn-reddit';
                    break;
                case 'tumblr' :
                    $button_class = 'jeg_btn-tumbrl';
                    break;
                case 'buffer' :
                    $button_class = 'jeg_btn-buffer';
                    break;
                case 'vk' :
                    $button_class = 'jeg_btn-vk';
                    break;
                case 'whatsapp' :
                    $button_class = 'jeg_btn-whatsapp';
                    break;
                case 'wechat' :
                    $button_class = 'jeg_btn-wechat';
                    break;
                case 'line' :
                    $button_class = 'jeg_btn-line';
                    break;
                case 'hatena' :
                    $button_class = 'jeg_btn-hatena';
                    break;
                case 'qrcode' :
                    $button_class = 'jeg_btn-qrcode';
                    break;
                case 'email' :
                    $button_class = 'jeg_btn-email';
                    break;
                default :
                    $button_class = '';
                    break;
            }
            return $button_class;
        }

        /**
         * @param $social
         * @return string
         */
        protected function get_icon_class($social)
        {
            switch ($social) {
                case 'facebook' :
                    $icon_class = 'fa fa-facebook-official';
                    break;
                case 'twitter' :
                    $icon_class = 'fa fa-twitter';
                    break;
                case 'pinterest' :
                    $icon_class = 'fa fa-pinterest';
                    break;
                case 'stumbleupon' :
                    $icon_class = 'fa fa-stumbleupon';
                    break;
                case 'linkedin' :
                    $icon_class = 'fa fa-linkedin';
                    break;
                case 'reddit' :
                    $icon_class = 'fa fa-reddit';
                    break;
                case 'tumblr' :
                    $icon_class = 'fa fa-tumblr';
                    break;
                case 'buffer' :
                    $icon_class = 'fa fa-buffer';
                    break;
                case 'vk' :
                    $icon_class = 'fa fa-vk';
                    break;
                case 'whatsapp' :
                    $icon_class = 'fa fa-whatsapp';
                    break;
                case 'wechat' :
                    $icon_class = 'fa fa-wechat';
                    break;
                case 'line' :
                    $icon_class = 'fa fa-line';
                    break;
                case 'hatena' :
                    $icon_class = 'fa fa-hatena';
                    break;
                case 'qrcode' :
                    $icon_class = 'fa fa-qrcode';
                    break;
                case 'email' :
                    $icon_class = 'fa fa-envelope';
                    break;
                default:
                    $icon_class = 'fa fa-' . $social;
                    break;
            }

            return $icon_class;
        }


        /**
         * @param $social
         * @param $post_id
         * @return string
         */
        public static function get_select_share_data($social, $post_id)
        {
            $image      = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
            $image_url  = $image ? $image[0] : '';
            $title      = JNews_Share_Bar::get_share_title($post_id);
            $url        = apply_filters( 'jnews_get_permalink', jnews_encode_url($post_id) );

            switch ($social) {
                case 'facebook' :
                    $button_url = 'http://www.facebook.com/sharer.php?u=[url]&quote=[selected_text]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'twitter' :
                    $title = JNews_Share_Bar::get_share_twitter_title($post_id);
                    $button_url = 'https://twitter.com/intent/tweet?text=[selected_text]&url=[url]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'pinterest' :
                    $button_url = 'https://www.pinterest.com/pin/create/bookmarklet/?pinFave=1&url=[url]&media=[image_url]&description=[selected_text]';
                    $data = array(
                        'image_url' => $image_url,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'stumbleupon' :
                    $button_url = 'http://www.stumbleupon.com/submit?url=[url]&title=[selected_text]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'linkedin' :
                    $button_url = 'https://www.linkedin.com/shareArticle?url=[url]&title=[selected_text]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'reddit' :
                    $button_url = 'https://reddit.com/submit?url=[url]&title=[selected_text]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'tumblr' :
                    $button_url = 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=[url]&caption=[selected_text]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'buffer' :
                    $button_url = 'https://buffer.com/add?text=[selected_text]&url=[url]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'whatsapp' :
                    $button_url = '//api.whatsapp.com/send?text=[selected_text]%0A[url]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'line' :
	                $button_url = 'https://social-plugins.line.me/lineit/share?url=[url]&text=[selected_text]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'hatena' :
                    $button_url = 'http://b.hatena.ne.jp/bookmarklet?url=[url]&btitle=[selected_text]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                case 'email' :
                    $button_url = 'mailto:?subject=[selected_text]&amp;body=[url]';
                    $data = array(
                        'image_url' => null,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
                default:
                    $button_url = $url;
                    $data = array(
                        'image_url' => $image_url,
                        'title'     => $title,
                        'post_url'       => $url,
                        'button_url'=> $button_url
                    );
                    break;
            }

            return $data;
        }

        /**
         * @param $social
         * @return string
         */
        protected function build_social_button($social) {

            $button_data     = self::get_select_share_data($social, $this->post_id);
            $button_class   = $this->get_button_class($social);
            $icon_class     = $this->get_icon_class($social);

            $button = "<button class=\"select-share-button {$button_class}\" data-url=\"{$button_data['button_url']}\" data-post-url=\"{$button_data['post_url']}\" data-image-url=\"{$button_data['image_url']}\" data-title=\"{$button_data['title']}\" ><i class=\"{$icon_class}\"></i></a>";

            return $button;
        }
    }
}