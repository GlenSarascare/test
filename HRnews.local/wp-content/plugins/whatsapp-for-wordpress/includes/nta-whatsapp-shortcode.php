<?php

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class NTA_Whatsapp_Shortcode
{
    protected static $instance = null;
    protected $accountID;

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        add_shortcode('njwa_time_work', [$this, 'nta_get_time_backwork_shortcode']);
        add_shortcode('njwa_button', [$this, 'nta_whatsapp_button_shortcode']);
        add_shortcode('njwa_page_title', [$this, 'nta_page_title']);
        add_shortcode('njwa_page_url', [$this, 'nta_page_url']);
        add_shortcode('njwa_time_work_wg', [$this, 'nta_get_time_backworkWidget_shortcode']);
    }

    public function nta_whatsapp_button_shortcode($id)
    {
        extract($id);
        $check_account_status = get_post_status($id);
        if ($check_account_status == false || $check_account_status != 'publish') {
            return '';
        }
        $this->accountID = $id;
        $mainStyle = array();
        $buttonStyle = get_post_meta($id, 'nta_wabutton_style', true);
        $data_posts = get_the_title($id);
        $data_meta = get_post_meta($id, 'nta_whatsapp_accounts', true);
        $buttonSetting = get_option('nta_wabutton_setting');
        $back_time = Helper::get_back_time($data_meta);
        $avatar = get_the_post_thumbnail_url($id);
        $content = '';

        //Check redirect on mobile or desktop
        $link_to_app = 'web';
        $new_page_open = 'target="_blank"';
        if (wp_is_mobile()) {
            $link_to_app = 'api';
            $new_page_open = '';
        }

        //create link in button
        $href = '';

        if (strpos($data_meta['nta_group_number'], 'chat.whatsapp.com')) {
            $href .= 'target="_blank"';
            $href .= ' href="' . esc_url($data_meta['nta_group_number']) . '"';
        } else {
            $href = $new_page_open;
            $href .= ' href="https://';
            $href .= $link_to_app . '.whatsapp.com/send?phone=';
            $number = preg_replace('/[^0-9]/', '', $data_meta['nta_group_number']);
            $href .= $number;
            $href .= ($data_meta['nta_predefined_text'] != '' ? '&text=' . do_shortcode($data_meta['nta_predefined_text']) : '');
            $href .= '"';
        }

        if (empty($buttonStyle)) {
            if (empty($buttonSetting)) {
                $mainStyle['button-text'] = 'Need help? Chat via Whatsapp';
                $mainStyle['button_style'] = 'round';
                $mainStyle['button_back_color'] = '#2DB742';
                $mainStyle['button_text_color'] = '#fff';
            } else {
                if ($buttonSetting['button-text'] == '') {
                    $mainStyle['button-text'] = 'Need help? Chat via Whatsapp';
                } else {
                    $mainStyle['button-text'] = $buttonSetting['button-text'];
                }
                $mainStyle['button_style'] = $buttonSetting['button_style'];
                $mainStyle['button_back_color'] = $buttonSetting['button_back_color'];
                $mainStyle['button_text_color'] = $buttonSetting['button_text_color'];
            }
        } else {
            if ($buttonStyle['button-text'] == '') {
                if ($buttonSetting['button-text'] == '') {
                    $mainStyle['button-text'] = 'Need help? Chat via Whatsapp';
                } else {
                    $mainStyle['button-text'] = $buttonSetting['button-text'];
                }
            } else {
                $mainStyle['button-text'] = $buttonStyle['button-text'];
            }

            $mainStyle['button_style'] = $buttonStyle['button_style'];

            $mainStyle['button_back_color'] = $buttonStyle['button_back_color'];
            $mainStyle['button_text_color'] = $buttonStyle['button_text_color'];

            if (!empty($buttonSetting) && $buttonStyle['button_back_color'] == '') {
                $mainStyle['button_back_color'] = $buttonSetting['button_back_color'];
            }

            if (!empty($buttonSetting) && $buttonStyle['button_text_color'] == '') {
                $mainStyle['button_text_color'] = $buttonSetting['button_text_color'];
            }
        }

        add_action('wp_enqueue_scripts', [$this, 'nta_whatsapp_button_style']);
        wp_register_style('nta-wabutton-style', '');
        wp_enqueue_style('nta-wabutton-style');
        $custom_css = "
                #nta-wabutton-$id .wa__stt_online{
                        background: " . $mainStyle['button_back_color'] . ";
                }

                #nta-wabutton-$id .wa__stt_online{
                        color: " . $mainStyle['button_text_color'] . ";
                }

                #nta-wabutton-$id .wa__stt_online .wa__cs_name{
                        color: " . $mainStyle['button_text_color'] . ";
                        opacity: 0.8;
                }

                #nta-wabutton-$id p{
                        display: none;
                }
                ";
        wp_add_inline_style('nta-wabutton-style', $custom_css);

        if ($avatar == false) {
            if ($back_time == 'online') {
                $content = '<div id="nta-wabutton-' . $id . '" style="margin: 30px 0 30px;">';
                $content .= '<a ' . $href;
                $content .= ' class="wa__button ' . ($mainStyle['button_style'] == 'round' ? 'wa__r_button' : 'wa__sq_button') . ' wa__stt_online wa__btn_w_icon ' . (empty($data_posts) ? 'wa__button_text_only' : '') . '">';
                $content .= '<div class="wa__btn_icon">';
                $content .= '<img src="' . NTA_WHATSAPP_PLUGIN_URL . 'assets/img/whatsapp_logo.svg" alt="img"/></div>';
                $content .= '<div class="wa__btn_txt">';
                if (!empty($data_posts)) {
                    $content .= '<div class="wa__cs_info"><div class="wa__cs_name">' . $data_posts . '</div>';
                    $content .= '<div class="wa__cs_status">' . __('Online', 'ninjateam-whatsapp') . '</div></div>';
                }
                $content .= '<div class="wa__btn_title">' . $mainStyle['button-text'] . '</div>';
                $content .= '</div></a></div>';
            } else {
                $content = '<div id="nta-wabutton-' . $id . '" style="margin: 30px 0 30px;">
				<div class="wa__button ' . ($mainStyle['button_style'] == 'round' ? 'wa__r_button' : 'wa__sq_button') . ' wa__stt_offline  wa__btn_w_icon ' . (empty($data_posts) ? 'wa__button_text_only_me' : '') . '">';
                $content .= '<div class="wa__btn_icon">';
                $content .= '<img src="' . NTA_WHATSAPP_PLUGIN_URL . 'assets/img/whatsapp_logo_gray.svg" alt=""/></div>';
                $content .= '<div class="wa__btn_txt">';
                if (!empty($data_posts)) {
                    $content .= '<div class="wa__cs_info"><div class="wa__cs_name">' . $data_posts . '</div>';
                    $content .= '<div class="wa__cs_status">' . __('Offline', 'ninjateam-whatsapp') . '</div></div>';
                }
                $content .= '<div class="wa__btn_title">' . $mainStyle['button-text'] . '</div>';
                $content .= '<div class="wa__btn_status">' . ($back_time == 'offline' ? $data_meta['nta_over_time'] : do_shortcode($data_meta['nta_offline_text'])) . '</div></div></div></div>';
            }
        } else {
            if ($back_time == 'online') {
                $content = '<div id="nta-wabutton-' . $id . '" style="margin: 30px 0 30px;">';
                $content .= '<a ' . $href;
                $content .= ' class="wa__button ' . ($mainStyle['button_style'] == 'round' ? 'wa__r_button' : 'wa__sq_button') . ' wa__stt_online wa__btn_w_img ' . (empty($data_posts) ? 'wa__button_text_only' : '') . '">';
                $content .= '<div class="wa__cs_img">';
                $content .= '<div class="wa__cs_img_wrap" style="background: url(' . $avatar . ') center center no-repeat; background-size: cover;"></div></div>';
                $content .= '<div class="wa__btn_txt">';
                if (!empty($data_posts)) {
                    $content .= '<div class="wa__cs_info"><div class="wa__cs_name">' . $data_posts . '</div>';
                    $content .= '<div class="wa__cs_status">' . __('Online', 'ninjateam-whatsapp') . '</div></div>';
                }

                $content .= '<div class="wa__btn_title">' . $mainStyle['button-text'] . '</div>';
                $content .= '</div></a></div>';
            } else {
                $content = '<div id="nta-wabutton-' . $id . '" style="margin: 30px 0 30px;">
			<div class="wa__button ' . ($mainStyle['button_style'] == 'round' ? 'wa__r_button' : 'wa__sq_button') . ' wa__stt_offline wa__btn_w_img ' . (empty($data_posts) ? 'wa__button_text_only_me' : '') . '">';
                $content .= '<div class="wa__cs_img">';
                $content .= '<div class="wa__cs_img_wrap" style="background: url(' . $avatar . ') center center no-repeat; background-size: cover;"></div></div>';
                $content .= '<div class="wa__btn_txt">';
                if (!empty($data_posts)) {
                    $content .= '<div class="wa__cs_info"><div class="wa__cs_name">' . $data_posts . '</div>';
                    $content .= '<div class="wa__cs_status">' . __('Offline', 'ninjateam-whatsapp') . '</div></div>';
                }
                $content .= '<div class="wa__btn_title">' . $mainStyle['button-text'] . '</div>';
                $content .= '<div class="wa__btn_status">' . ($back_time == 'offline' ? $data_meta['nta_over_time'] : do_shortcode($data_meta['nta_offline_text'])) . '</div></div></div></div>';
            }
        }

        return $content;
    }

    public function nta_get_time_backwork_shortcode()
    {
        //extract($postID);
        $account = get_post_meta($this->accountID, 'nta_whatsapp_accounts', true);
        return Helper::get_back_time($account);
    }

    public function nta_get_time_backworkWidget_shortcode($id)
    {
        extract($id);
        $this->accountID = $id;
        $content = '';
        $data_meta = get_post_meta($id, 'nta_whatsapp_accounts', true);
        $content = do_shortcode($data_meta['nta_offline_text']);
        return $content;
    }

    public function nta_page_title()
    {
        $page_title = ltrim(wp_title('', false));
        return $page_title;
    }

    public function nta_page_url()
    {
        global $wp;
        return home_url(add_query_arg(array(), $wp->request));
    }

}
