<?php
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
class NTA_Whatsapp_Popup
{
    protected static $instance = null;
    protected $nta_WA_Post_Instance;

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        $availableAccount = get_option('nta_whatsapp_available_account');
        $showWidgetScreen = $this->check_Show_On_Screen();
        $this->nta_WA_Post_Instance = NTA_Whatsapp_PostType::getInstance();

        add_action('wp_enqueue_scripts', function () {
            wp_register_style('nta-css-popup', NTA_WHATSAPP_PLUGIN_URL . 'assets/css/style.css');
            wp_enqueue_style('nta-css-popup');

            wp_register_script('nta-js-popup', NTA_WHATSAPP_PLUGIN_URL . 'assets/js/main.js', ['jquery']);
            wp_localize_script('nta-js-popup', 'ntawaAjax', [
                'url' => admin_url('admin-ajax.php'),
            ]);
            wp_enqueue_script('nta-js-popup');
        });

        //Check available account and setting to show widget
        if ((int)$availableAccount > 0) {
            if (wp_is_mobile() && $showWidgetScreen['show_on_mobile'])
                add_action('wp_footer', [$this, 'show_popup_view']);
            else if (!wp_is_mobile() && $showWidgetScreen['show_on_desktop']){
                add_action('wp_footer', [$this, 'show_popup_view']);
            } else if ($showWidgetScreen['show_on_mobile'] && $showWidgetScreen['show_on_desktop']){
                add_action('wp_footer', [$this, 'show_popup_view']);
            }
        }

        add_action('wp_head', [$this, 'popup_style_setting']);
        add_action('wp_footer', function(){
            ?>
            <script type="text/javascript">
                function isMobileWA()
                {
                    return (/Android|webOS|iPhone|iPad|iPod|Windows Phone|IEMobile|Mobile|BlackBerry/i.test(navigator.userAgent) ); 
                }
                var elm = jQuery('a[href*="whatsapp.com"]');
                jQuery.each(elm, function(index, value){
                    var item = jQuery(value).attr('href');
                    if(item.indexOf('chat') != -1){
                        //nothing
                    } else if (item.indexOf('web.whatsapp') != -1 && isMobileWA()){
                        var itemLink = item;
                        var newLink = itemLink.replace('web.whatsapp', 'api.whatsapp');
                        jQuery(value).attr("href", newLink);
                    } else if (item.indexOf('api.whatsapp') != -1 && !isMobileWA()){
                        var itemLink = item;
                        var newLink = itemLink.replace('api.whatsapp', 'web.whatsapp');
                        jQuery(value).attr("href", newLink);
                    } 
                });
            </script>
            <?php
        }, 100);
    }

    public function check_Show_On_Screen(){
        $setting = get_option('nta_whatsapp_setting');
        if ($setting == false){
            return array('show_on_desktop' => true, 'show_on_mobile' => true);
        }

        $showOnDesktop = false;
        $showOnMobile = false;
        if (isset($setting['show_on_desktop']) && $setting['show_on_desktop'] == 'ON'){
            $showOnDesktop = true;
        }

        if (isset($setting['show_on_mobile']) && $setting['show_on_mobile'] == 'ON'){
            $showOnMobile = true;
        }

        return array('show_on_desktop' => $showOnDesktop, 'show_on_mobile' => $showOnMobile);
    }

    public function check_Show_Pages_Widget(){
        global $wp_query;
        
        //$post_id = (isset($wp_query->post) ? $wp_query->post->ID : '');
        // global $post;
        
        // $post_id = $post->ID ? $post->ID : '';
        // if (empty($post_id)) {
        //     return false;
        // }
        $post_id = get_the_ID(); 

        $option = get_option("nta_whatsapp_setting");
        if ($option && isset($option['display-pages'])) {
            $type = $option['display-pages'];
            if(isset($option['nta-wa-hide-pages']) && $type == 'hide')
            {
                $all_page = $option['nta-wa-hide-pages'];
                if( is_array( $all_page ) && is_page() && in_array($post_id, $all_page)) {
                    return false;
                }
            }
            else if(isset($option['nta-wa-show-pages']) && $type == 'show')
            {
                $all_page = $option['nta-wa-show-pages'];
                if( is_array( $all_page ) && is_page() && in_array($post_id, $all_page)) {
                    return true;
                }else{
                    return false;
                }
            }
        }

        return true;
    }

    public function show_popup_view()
    {
        if ($this->check_Show_Pages_Widget() == false){
            return;
        }

        $option = get_option('nta_whatsapp_setting');
        if (empty($option)) {
            $option['widget_name'] = 'Start a Conversation';
            $option['widget_description'] = 'Hi! Click one of our member below to chat on <strong>Whatsapp</strong>';
            $option['widget_label'] = 'Need Help? <strong>Chat with us</strong>';
            $option['widget_responseText'] = 'The team typically replies in a few minutes.';
            $option['widget_gdpr'] = 'Please accept our <a href="https://ninjateam.org/privacy-policy/">privacy policy</a> first to start a conversation.';
        } else {
            $option['widget_responseText'] = Helper::getValueOrDefault($option,'widget_responseText', 'The team typically replies in a few minutes.');
            $option['widget_gdpr'] = Helper::getValueOrDefault($option,'widget_gdpr', 'Please accept our <a href="https://ninjateam.org/privacy-policy/">privacy policy</a> first to start a conversation.');
        }
        
        //Show GDPR alert
        $option['widget_gdpr_status'] = false;
        
        if (isset($_COOKIE["nta-wa-gdpr"]) && $_COOKIE["nta-wa-gdpr"] == 'accept'){
            $option['widget_gdpr_status'] = true;
        };

        if (!isset($option['show_gdpr'])) {
            $option['widget_gdpr_status'] = true;
        }

        //Show Account Data
        $account_list = $this->nta_WA_Post_Instance->get_posts();

        $account_list_view = array();
        foreach ($account_list as $account) {
            $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);

            if ($get_data['nta_active'] != 'none') {
                $account_list_view[$account->ID] = array(
                    'account_id' => $account->ID,
                    'post_title' => $account->post_title,
                    'nta_group_number' => $get_data['nta_group_number'],
                    'nta_predefined_text' => $get_data['nta_predefined_text'],
                    'nta_over_time' => $get_data['nta_over_time'],
                    'nta_title' => $get_data['nta_title'],
                    'nta_active' => $get_data['nta_active'],
                    'nta_offline_text' => $get_data['nta_offline_text'],
                    'nta_sunday' => $get_data['nta_sunday'],
                    'nta_sunday_working' => $get_data['nta_sunday_working'],
                    'nta_monday' => $get_data['nta_monday'],
                    'nta_monday_working' => $get_data['nta_monday_working'],
                    'nta_tuesday' => $get_data['nta_tuesday'],
                    'nta_tuesday_working' => $get_data['nta_tuesday_working'],
                    'nta_wednesday' => $get_data['nta_wednesday'],
                    'nta_wednesday_working' => $get_data['nta_wednesday_working'],
                    'nta_thursday' => $get_data['nta_thursday'],
                    'nta_thursday_working' => $get_data['nta_thursday_working'],
                    'nta_friday' => $get_data['nta_friday'],
                    'nta_friday_working' => $get_data['nta_friday_working'],
                    'nta_saturday' => $get_data['nta_saturday'],
                    'nta_saturday_working' => $get_data['nta_saturday_working'],
                    'position' => $get_data['position'],
                    'avatar' => get_the_post_thumbnail_url($account->ID),
                    'nta_button_available' => isset($get_data['nta_button_available']) ? 'ON' : 'OFF'
                );
            }
        }
        usort($account_list_view, function ($first, $second) {
            return $first['position'] > $second['position'];
        });

        //Check redirect on mobile or desktop
        $link_to_app = 'web';
        if (wp_is_mobile()) {
            $link_to_app = 'api';
        }
        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-widget-view.php';
    }

    public function popup_style_setting()
    {
        $option = get_option('nta_whatsapp_setting');
        if (empty($option)) {
            $option['text_color'] = '#fff';
            $option['back_color'] = '#2db742';
            $option['widget_position'] = 'right';
        }
        ?>
        <style>
            .wa__stt_offline{
                pointer-events: none;
            }

            .wa__button_text_only_me .wa__btn_txt{
                padding-top: 16px !important;
                padding-bottom: 15px !important;
            }

            .wa__popup_content_item .wa__cs_img_wrap{
                width: 48px;
                height: 48px;
            }

            .wa__popup_chat_box .wa__popup_heading{
                background: <?php echo $option['back_color'] ?>;
            }

            .wa__btn_popup .wa__btn_popup_icon{
                background: <?php echo $option['back_color'] ?>;
            }

            .wa__popup_chat_box .wa__stt{
                border-left: 2px solid  <?php echo $option['back_color'] ?>;
            }

            .wa__popup_chat_box .wa__popup_heading .wa__popup_title{
                color: <?php echo $option['text_color'] ?>;
            }

            .wa__popup_chat_box .wa__popup_heading .wa__popup_intro{
                color: <?php echo $option['text_color'] ?>;
                opacity: 0.8;
            }

            .wa__popup_chat_box .wa__popup_heading .wa__popup_intro strong{

            }

            <?php if ($option['widget_position'] == 'left'): ?>
                .wa__btn_popup{
                    left: 30px;
                    right: unset;
                }

                .wa__btn_popup .wa__btn_popup_txt{
                    left: 100%;
                }

                .wa__popup_chat_box{
                    left: 25px;
                }
            <?php endif;?>

        </style>

        <?php
}

}
