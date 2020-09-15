<?php
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class NTA_Whatsapp_Setting
{

    protected $option;
    protected $option_group = 'nta_whatsapp_group';
    protected $option_button_group = 'nta_whatsapp_button_group';
    protected $option_woo_button_group = 'nta_wa_woo_button_group';
    protected $nta_WA_Post_Instance;
    protected static $instance = null;

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->option = get_option('nta_whatsapp_setting');
        $this->nta_WA_Post_Instance = NTA_Whatsapp_PostType::getInstance();
        add_action('admin_init', [$this, 'register_setting']);
        add_action('admin_init', function () {
            add_settings_section(
                'page_selected_accounts_section', '', [$this, 'page_selected_accounts_section_callback'], 'floating-widget-whatsapp-1'
            );

            add_settings_section(
                'page_display_settings_section', '', [$this, 'page_display_settings_section_callback'], 'floating-widget-whatsapp-2'
            );

            add_settings_section('nta_page_settings', '', [$this, 'nta_page_settings_callback'], 'nta_page_settings-1');
            add_settings_section('nta_woocommerce_button', '', [$this, 'nta_woocommerce_button_callback'], 'nta_page_settings-2');
        });

        add_action('admin_menu', function () {
            $all_accounts_link = 'edit.php?post_type=whatsapp-accounts';
            $edit_account_link = 'post-new.php?post_type=whatsapp-accounts';

            add_menu_page('NTA Whatsapp', 'WhatsApp', 'manage_options', 'nta_whatsapp', [$this, 'create_page_setting_widget'], NTA_WHATSAPP_PLUGIN_URL . 'images/whatsapp-menu.svg');
            add_submenu_page('nta_whatsapp', __('Add New account', 'ninjateam-whatsapp'), __('Add New account', 'ninjateam-whatsapp'), 'edit_posts', $edit_account_link);
            add_submenu_page('nta_whatsapp', __('Floating Widget', 'ninjateam-whatsapp'), __('Floating Widget', 'ninjateam-whatsapp'), 'edit_posts', 'floating-widget-whatsapp', [$this, 'tab_menu_page']);
            add_submenu_page('nta_whatsapp', __('Settings', 'ninjateam-whatsapp'), __('Settings', 'ninjateam-whatsapp'), 'manage_options', 'nta_whatsapp', [$this, 'create_page_setting_widget']);
        });

        add_action('admin_enqueue_scripts', function () {
            wp_register_style('nta-css', NTA_WHATSAPP_PLUGIN_URL . 'scripts/css/style.css');
            wp_enqueue_style('nta-css');
            wp_enqueue_style('wp-color-picker');

            wp_register_script('nta-js', NTA_WHATSAPP_PLUGIN_URL . 'scripts/js/admin-scripts.js', ['jquery', 'wp-color-picker']);
            wp_localize_script('nta-js', 'nta', [
                'url' => admin_url('admin-ajax.php'),
                'njt_wa_nonce' => wp_create_nonce('ajax-nonce')
            ]);

            //wp_enqueue_script('nta-js-sortable', NTA_WHATSAPP_PLUGIN_URL . 'scripts/js/jquery-ui.min.js');
            wp_enqueue_script('nta-js-sortable', NTA_WHATSAPP_PLUGIN_URL . 'scripts/js/jquery.validate.min.js');
            wp_enqueue_script('jquery-ui-sortable');
            wp_enqueue_script('jquery-ui-autocomplete');
            wp_enqueue_script('nta-js');
        });

        add_action('wp_ajax_save_account_position', [$this, 'save_account_position']);
        add_action('wp_ajax_load_accounts_ajax', [$this, 'load_accounts_ajax']);
        add_action('wp_ajax_remove_account', [$this, 'remove_account']);
        add_action('wp_ajax_add_account', [$this, 'add_account']);
    }

    public function page_display_settings_section_callback()
    {
        $option_group = 'nta_whatsapp_group';
        $option = get_option('nta_whatsapp_setting');
        if (!$option) {
            $option = array();
            $option['widget_name'] = 'Start a Conversation';
            $option['widget_position'] = 'right';
            $option['widget_label'] = 'Need Help? <strong>Chat with us</strong>';
            $option['widget_responseText'] = 'The team typically replies in a few minutes.';
            $option['text_color'] = '#fff';
            $option['back_color'] = '#2db742';
            $option['widget_description'] = 'Hi! Click one of our member below to chat on <strong>Whatsapp</strong>';
            $option['widget_gdpr'] = 'Please accept our <a href="https://ninjateam.org/privacy-policy/">privacy policy</a> first to start a conversation.';
            $option['show_on_desktop'] = 'ON';
            $option['show_on_mobile'] = 'ON';
            $option['nta-wa-hide-pages'] = '';
            $option['nta-wa-show-pages'] = '';
            $option['display-pages'] = 'hide';
        } else {
            $option['widget_name'] = Helper::getValueOrDefault($option,'widget_name', 'Start a Conversation');
            $option['widget_position'] = Helper::getValueOrDefault($option,'widget_position', 'right');
            $option['widget_label'] = Helper::getValueOrDefault($option,'widget_label', 'Need Help? <strong>Chat with us</strong>');
            $option['widget_responseText'] = Helper::getValueOrDefault($option,'widget_responseText', 'The team typically replies in a few minutes.');
            $option['text_color'] = Helper::getValueOrDefault($option,'text_color', '#fff');
            $option['back_color'] = Helper::getValueOrDefault($option,'back_color', '#2db742');
            $option['widget_description'] = Helper::getValueOrDefault($option,'widget_description', 'Hi! Click one of our member below to chat on <strong>Whatsapp</strong>');
            $option['widget_gdpr'] = Helper::getValueOrDefault($option,'widget_gdpr', 'Please accept our <a href="https://ninjateam.org/privacy-policy/">privacy policy</a> first to start a conversation.');
            $option['nta-wa-hide-pages'] = Helper::getValueOrDefault($option,'nta-wa-hide-pages', '');
            $option['nta-wa-show-pages'] = Helper::getValueOrDefault($option,'nta-wa-show-pages', '');
            $option['display-pages'] = Helper::getValueOrDefault($option,'display-pages', 'hide');
        }

        $get_pages_query = new WP_Query(array("posts_per_page" => -1, "post_type" => "page", "post_status" => "publish"));

        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-display-settings.php';
    }

    public function page_selected_accounts_section_callback()
    {
        $account_list = $this->nta_WA_Post_Instance->get_posts();
        $account_list_view = array();
        foreach ($account_list as $account) {
            $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);

            if ($get_data['nta_active'] != 'none') {
                $account_list_view[$account->ID] = array(
                    'account_id' => $account->ID,
                    'post_title' => $account->post_title,
                    'nta_title' => $get_data['nta_title'],
                    'nta_active' => $get_data['nta_active'],
                    'nta_sunday' => $get_data['nta_sunday'],
                    'nta_monday' => $get_data['nta_monday'],
                    'nta_tuesday' => $get_data['nta_tuesday'],
                    'nta_wednesday' => $get_data['nta_wednesday'],
                    'nta_thursday' => $get_data['nta_thursday'],
                    'nta_friday' => $get_data['nta_friday'],
                    'nta_saturday' => $get_data['nta_saturday'],
                    'position' => $get_data['position'],
                    'avatar' => get_the_post_thumbnail_url($account->ID),
                );
            }
        }
        usort($account_list_view, function ($first, $second) {
            return $first['position'] > $second['position'];
        });

        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-selected-accounts.php';
    }

    public function nta_page_settings_callback()
    {
        $option_group = 'nta_whatsapp_button_group';
        $option = get_option('nta_wabutton_setting');
        if (!$option) {
            $option = array();
            $option['button-text'] = 'Need help? Chat via Whatsapp';
            $option['button_style'] = 'round';
            $option['button_back_color'] = '#2db742';
            $option['button_text_color'] = '#fff';
        }
        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-settings.php';
    }

    public function nta_woocommerce_button_callback()
    {
        $option_group = 'nta_wa_woo_button_group';

        $account_list = $this->nta_WA_Post_Instance->get_posts();
        $account_list_view = array();
        foreach ($account_list as $account) {
            $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);

            if ($get_data['wo_active'] != 'none') {
                $account_list_view[$account->ID] = array(
                    'account_id' => $account->ID,
                    'post_title' => $account->post_title,
                    'nta_title' => $get_data['nta_title'],
                    'nta_active' => $get_data['nta_active'],
                    'nta_sunday' => $get_data['nta_sunday'],
                    'nta_monday' => $get_data['nta_monday'],
                    'nta_tuesday' => $get_data['nta_tuesday'],
                    'nta_wednesday' => $get_data['nta_wednesday'],
                    'nta_thursday' => $get_data['nta_thursday'],
                    'nta_friday' => $get_data['nta_friday'],
                    'nta_saturday' => $get_data['nta_saturday'],
                    'wo_position' => $get_data['wo_position'],
                    'avatar' => get_the_post_thumbnail_url($account->ID),
                );
            }
        }
        usort($account_list_view, function ($first, $second) {
            return $first['wo_position'] > $second['wo_position'];
        });

        $woo_button_setting = get_option('nta_wa_woobutton_setting');
        if (!$woo_button_setting) {
            $woo_button_setting['nta_woo_button_position'] = 'after_atc';
        }
        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-woocommerce-button.php';
    }

    public function create_page_setting_widget()
    {
        if (isset($_GET['tab'])) {
            $active_tab = sanitize_text_field($_GET['tab']);
            
        } else {
            $active_tab = 'tab_one';
        }
        ?>
        <div class="wrap">
            <h1>Settings</h1>

            <?php settings_errors();?>

            <h2 class="nav-tab-wrapper nta-tab-wrapper">
                <a href="?page=nta_whatsapp&tab=tab_one" class="nav-tab nta-selected-tab <?php echo $active_tab == 'tab_one' ? 'nav-tab-active' : ''; ?>">Settings</a>
                <a href="?page=nta_whatsapp&tab=tab_two" class="nav-tab nta-display-setting-tab <?php echo $active_tab == 'tab_two' ? 'nav-tab-active' : ''; ?>">WooCommerce Button</a>
            </h2>
            <div class="nta-tabs-content">
                <form name="post" method="post" action="options.php" id="post" autocomplete="off">
                    <?php
        if ($active_tab == 'tab_one') {
            do_settings_sections('nta_page_settings-1');
        } elseif ($active_tab == 'tab_two') {
            do_settings_sections('nta_page_settings-2');
        }
        ?>
                </form>
            </div>
        </div>
        <?php
}

    public function tab_menu_page()
    {
        if (isset($_GET['tab'])) {
            $active_tab = sanitize_text_field($_GET['tab']);
        } else {
            $active_tab = 'tab_one';
        }
        ?>
        <div class="wrap">
            <h1>Floating Widget</h1>

            <?php settings_errors();?>

            <h2 class="nav-tab-wrapper nta-tab-wrapper">
                <a href="?page=floating-widget-whatsapp&tab=tab_one" class="nav-tab nta-selected-tab <?php echo $active_tab == 'tab_one' ? 'nav-tab-active' : ''; ?>">Selected Accounts</a>
                <a href="?page=floating-widget-whatsapp&tab=tab_two" class="nav-tab nta-display-setting-tab <?php echo $active_tab == 'tab_two' ? 'nav-tab-active' : ''; ?>">Display Settings</a>
            </h2>
            <div class="nta-tabs-content">
                <div id="form-selected-account" autocomplete="off">
                    <?php
        if ($active_tab == 'tab_one') {
            do_settings_sections('floating-widget-whatsapp-1');
        } elseif ($active_tab == 'tab_two') {
            do_settings_sections('floating-widget-whatsapp-2');
        }
        ?>
                </div>
            </div>
        </div>
        <?php
}

    public function create_page_add_account()
    {
        $option_group = $this->option_group;
        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-add-accounts.php';
    }

    public function register_setting()
    {
        register_setting(
            $this->option_group, 'nta_whatsapp_setting', [$this, 'save_setting']
        );
        register_setting(
            $this->option_button_group, 'nta_wabutton_setting', [$this, 'save_button_setting']
        );
        register_setting(
            $this->option_woo_button_group, 'nta_wa_woobutton_setting', [$this, 'save_woobutton_setting']
        );
    }

    public function save_woobutton_setting($input)
    {
        $new_input = [];

        $new_input['nta_woo_button_position'] = sanitize_text_field($_POST['nta_woo_button_position']);
        if (isset($_POST['nta_woo_button_status'])) {
            $new_input['nta_woo_button_status'] = 'ON';
        }
        return $new_input;
    }

    public function save_button_setting($input)
    {
        $new_input = [];

        $new_input['button-text'] = sanitize_text_field($_POST['button-text']);
        $new_input['button_style'] = sanitize_text_field($_POST['button_style']);
        $new_input['button_back_color'] = sanitize_hex_color($_POST['button_back_color']);
        $new_input['button_text_color'] = sanitize_hex_color($_POST['button_text_color']);

        return $new_input;
    }

    public function save_setting($input)
    {
        $new_input = [];
        $new_input['widget_name'] = sanitize_text_field($_POST['widget_name']);
        $new_input['widget_label'] = wp_kses_post(wp_unslash($_POST['widget_label'])); // It can be an html tag
        $new_input['text_color'] = sanitize_hex_color($_POST['text_color']);
        $new_input['back_color'] = sanitize_hex_color($_POST['back_color']);
        $new_input['widget_position'] = sanitize_text_field($_POST['widget_position']);
        $new_input['widget_description'] = wp_kses_post(wp_unslash($_POST['widget_description']));
        $new_input['widget_gdpr'] = wp_kses_post(wp_unslash($_POST['widget_gdpr']));
        $new_input['widget_responseText'] = sanitize_text_field($_POST['widget_responseText']);
        $new_input['display-pages'] = sanitize_text_field($_POST['nta-wa-display-pages']);
            
        if (isset($_POST['nta-wa-hide-pages'])){
            $new_input['nta-wa-hide-pages'] = Helper::sanitize_array($_POST['nta-wa-hide-pages']);
        }

        if (isset($_POST['nta-wa-show-pages'])){
            $new_input['nta-wa-show-pages'] = Helper::sanitize_array($_POST['nta-wa-show-pages']);
        }

        if (isset($_POST['show_on_desktop'])) {
            $new_input['show_on_desktop'] = 'ON';
        }
        if (isset($_POST['show_on_mobile'])) {
            $new_input['show_on_mobile'] = 'ON';
        }

        if (isset($_POST['show_gdpr'])) {
            $new_input['show_gdpr'] = 'ON';
        }
        return $new_input;
    }

    public function save_account_position()
    {
        if (isset($_POST['update'])) {
            foreach ($_POST['positions'] as $pos) {
                $index = $pos[0];
                $newPosision = $pos[1];
                $old_meta_value = get_post_meta($index, 'nta_whatsapp_accounts', true);
                $clone_meta_value = $old_meta_value;
                if ($_POST['update'] == 'woo') {
                    $clone_meta_value['wo_position'] = $newPosision;
                } else {
                    $clone_meta_value['position'] = $newPosision;
                }
                if (update_post_meta($index, 'nta_whatsapp_accounts', $clone_meta_value) == false) {
                    wp_send_json_error(json_encode(array('status' => "error")));
                    return;
                };
            }

            $res_out = json_encode(array('status' => "success"));
            wp_send_json_success($res_out);
        }
    }

    public function load_accounts_ajax()
    {
        if (isset($_POST['load'])) {
            $account_list = $this->nta_WA_Post_Instance->get_posts();	
			$account_list_view = array();
			
            foreach ($account_list as $account) {
                $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);
                $account_list_view[] = array(
                    'label' => $account->post_title,
                    'image_url' => NTA_WHATSAPP_PLUGIN_URL,
                    'account_id' => $account->ID,
                    'nta_title' => $get_data['nta_title'],
                    'nta_active' => $get_data['nta_active'],
                    'nta_sunday' => $get_data['nta_sunday'],
                    'nta_monday' => $get_data['nta_monday'],
                    'nta_tuesday' => $get_data['nta_tuesday'],
                    'nta_wednesday' => $get_data['nta_wednesday'],
                    'nta_thursday' => $get_data['nta_thursday'],
                    'nta_friday' => $get_data['nta_friday'],
                    'nta_saturday' => $get_data['nta_saturday'],
                    'nta_active' => $get_data['nta_active'],
                    'wo_active' => $get_data['wo_active'],
                    'avatar' => get_the_post_thumbnail_url($account->ID),
                );
            }
			
            wp_send_json_success($account_list_view);
        }
    }

    public function remove_account()
    {
        if (isset($_POST['remove'])) {
            $id = sanitize_text_field($_POST['remove_id']);
            $old_meta_value = get_post_meta($id, 'nta_whatsapp_accounts', true);
            $clone_meta_value = $old_meta_value;
            $type_account = '';
            if ($_POST['remove'] == 'all') {
                $clone_meta_value['nta_active'] = 'none';
                $clone_meta_value['position'] = '0';
                $count = get_option('nta_whatsapp_available_account');
                $type_account = 'nta_whatsapp_available_account';
                if($count == false){
                    $count = 0;
                }else{
                    $count--;
                }
            } else {
                $clone_meta_value['wo_active'] = 'none';
                $clone_meta_value['wo_position'] = '0';
                $count = get_option('nta_whatsapp_available_woo_account');
                $type_account = 'nta_whatsapp_available_woo_account';
                if($count == false){
                    $count = 0;
                }else{
                    $count--;
                }
            }

            if (update_post_meta($id, 'nta_whatsapp_accounts', $clone_meta_value) == false) {
                wp_send_json_error(json_encode(array('status' => "error")));
                return;
            }else{
                update_option($type_account, $count);
            };
            $res_out = json_encode(array('status' => "success"));
            wp_send_json_success($res_out);
        }
    }

    public function add_account()
    {
        if (isset($_POST['add'])) {
            $id = sanitize_text_field($_POST['account_id']);
            $old_meta_value = get_post_meta($id, 'nta_whatsapp_accounts', true);
            $clone_meta_value = $old_meta_value;
            $type_account = '';
            if ($_POST['add'] == 'all') {
                $clone_meta_value['nta_active'] = 'active';
                $count = get_option('nta_whatsapp_available_account');
                $type_account = 'nta_whatsapp_available_account';
                if($count == false){
                    $count = 1;
                }else{
                    $count++;
                }
            } else {
                $clone_meta_value['wo_active'] = 'active';
                $count = get_option('nta_whatsapp_available_woo_account');
                if($count == false){
                    $count = 1;
                }else{
                    $count++;
                }
                $type_account = 'nta_whatsapp_available_woo_account';
            }
            if (update_post_meta($id, 'nta_whatsapp_accounts', $clone_meta_value) == false) {
                wp_send_json_error(json_encode(array('status' => "error")));
                return;
            } else{
                update_option($type_account, $count);
            };
            $clone_meta_value['index'] = $id;
            $clone_meta_value['account_name'] = sanitize_text_field($_POST['account_name']);
            $clone_meta_value['image_url'] = NTA_WHATSAPP_PLUGIN_URL;
            $clone_meta_value['avatar'] = get_the_post_thumbnail_url($id);
            $res_out = json_encode(array('status' => "success"));
            wp_send_json_success($clone_meta_value);
        }
    }
}
