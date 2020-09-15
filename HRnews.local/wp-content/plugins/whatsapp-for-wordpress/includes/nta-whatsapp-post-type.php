<?php
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class NTA_Whatsapp_PostType
{
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

        add_action('init', function () {

            $labels = array(
                'name' => __('WhatsApp Accounts'),
                'singular_name' => __('Whatsapp Account'),
                'add_new' => __('Add New Account', 'ninjateam-whatsapp'),
                'add_new_item' => __('Add New Account', 'ninjateam-whatsapp'),
                'edit_item' => __('Edit Account', 'ninjateam-whatsapp'),
                'new_item' => __('New Account', 'ninjateam-whatsapp'),
                'all_items' => __('All Accounts', 'ninjateam-whatsapp'),
                'view_item' => __('View Accounts', 'ninjateam-whatsapp'),
                'search_items' => __('Search Account', 'ninjateam-whatsapp'),
                'featured_image' => __('Avatar', 'ninjateam-whatsapp'),
                'set_featured_image' => __('Select an image', 'ninjateam-whatsapp'),
                'remove_featured_image' => __('Remove avatar', 'ninjateam-whatsapp'),
            );

            $args = array(
                'labels' => $labels,
                'description' => __('Manager Accounts', 'ninjateam-whatsapp'),
                'public' => false,
                'show_ui' => true,
                'has_archive' => true,
                'show_in_admin_bar' => false,
                'show_in_rest' => true,
                'show_in_menu' => 'nta_whatsapp',
                'menu_position' => 100,
                'query_var' => 'whatsapp-accounts',
                'supports' => array(
                    'title',
                    'thumbnail',
                ),
            );
            register_post_type('whatsapp-accounts', $args);
        });

        add_action('save_post', [$this, 'save_account'], 10, 2);

        add_action('add_meta_boxes', function () {
            add_meta_box('whatsapp-account-info', 'WhatsApp Account Information', [$this, 'meta_form_account'], 'whatsapp-accounts', 'normal');
            add_meta_box('whatsapp-button-style', 'Button Style', [$this, 'meta_form_button_style'], 'whatsapp-accounts', 'normal');
            $current_screen = get_current_screen();
            if ($current_screen->action != 'add') {
                add_meta_box('whatsapp-button-shortcode', 'Shortcode for this account', [$this, 'account_shortcode_form'], 'whatsapp-accounts', 'side');
            }
        });

        add_filter('manage_whatsapp-accounts_posts_columns', [$this, 'manager_accounts_columns'], 10, 1);

        add_action('manage_whatsapp-accounts_posts_custom_column', [$this, 'manager_accounts_show_columns'], 10, 2);
        add_filter('enter_title_here', 'my_title_place_holder', 20, 2);

        function my_title_place_holder($title, $post)
        {
            if ($post->post_type == 'whatsapp-accounts') {
                $my_title = "Account Name";
                return $my_title;
            }

            return $title;
        }

    }

    public function get_posts(){

        $defaultArgs = array(
            'post_type' => 'whatsapp-accounts',
            'post_status' => 'publish',
            'numberposts' => -1
        );

        $args = apply_filters('njt_wa_get_post_type', $defaultArgs);
        $account_list = get_posts($args);
        
        return $account_list;
    }

    public function save_account($post_id, $post)
    {
        if (!isset($_POST['form_account_nonce'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['form_account_nonce'], 'save_form_account')) {
            return;
        }

        $new_account = array(
            'nta_group_number' => sanitize_text_field($_POST['nta_group_number']),
            'nta_title' => sanitize_text_field($_POST['nta_title']),
            'nta_predefined_text' => sanitize_text_field($_POST['nta_predefined_text']),
            'nta_offline_text' => sanitize_text_field($_POST['nta_offline_text']),
            'nta_over_time' => sanitize_text_field($_POST['nta_over_time']),
            'nta_sunday' => isset($_POST['nta_sunday']) ? 'checked' : '',
            'nta_sunday_working' => sanitize_text_field($_POST['nta_sunday_hour_start']) . '-' . sanitize_text_field($_POST['nta_sunday_hour_end']),
            'nta_monday' => isset($_POST['nta_monday']) ? 'checked' : '',
            'nta_monday_working' => sanitize_text_field($_POST['nta_monday_hour_start']) . '-' . sanitize_text_field($_POST['nta_monday_hour_end']),
            'nta_tuesday' => isset($_POST['nta_tuesday']) ? 'checked' : '',
            'nta_tuesday_working' => sanitize_text_field($_POST['nta_tuesday_hour_start']) . '-' . sanitize_text_field($_POST['nta_tuesday_hour_end']),
            'nta_wednesday' => isset($_POST['nta_wednesday']) ? 'checked' : '',
            'nta_wednesday_working' => sanitize_text_field($_POST['nta_wednesday_hour_start']) . '-' . sanitize_text_field($_POST['nta_wednesday_hour_end']),
            'nta_thursday' => isset($_POST['nta_thursday']) ? 'checked' : '',
            'nta_thursday_working' => sanitize_text_field($_POST['nta_thursday_hour_start']) . '-' . sanitize_text_field($_POST['nta_thursday_hour_end']),
            'nta_friday' => isset($_POST['nta_friday']) ? 'checked' : '',
            'nta_friday_working' => sanitize_text_field($_POST['nta_friday_hour_start']) . '-' . sanitize_text_field($_POST['nta_friday_hour_end']),
            'nta_saturday' => isset($_POST['nta_saturday']) ? 'checked' : '',
            'nta_saturday_working' => sanitize_text_field($_POST['nta_saturday_hour_start']) . '-' . sanitize_text_field($_POST['nta_saturday_hour_end']),
        );

        $refer_url = sanitize_text_field($_POST['_wp_http_referer']);
        $add_new_action = strpos($refer_url, 'post-new.php');
        if ($add_new_action !== false) {
            $new_account['position'] = '0';
            $new_account['nta_active'] = 'none';
            $new_account['wo_active'] = 'none';
            $new_account['wo_position'] = '0';
        } else {
            $old_account = get_post_meta($post_id, 'nta_whatsapp_accounts', true);
            $new_account['position'] = $old_account['position'];
            $new_account['nta_active'] = $old_account['nta_active'];
            $new_account['wo_active'] = $old_account['wo_active'];
            $new_account['wo_position'] = $old_account['wo_position'];
        }

        if (isset($_POST['nta_button_available'])) {
            $new_account['nta_button_available'] = 'ON';
        }

        update_post_meta($post_id, 'nta_whatsapp_accounts', $new_account);

        //Save button style

        if ($_POST['nta_button_label'] != '' || $_POST['button_style'] != '' || $_POST['button_back_color'] != '' || $_POST['button_text_color'] != '') {
            $new_input['button-text'] = sanitize_text_field($_POST['nta_button_label']);
            $new_input['button_style'] = sanitize_text_field($_POST['button_style']);
            $new_input['button_back_color'] = sanitize_hex_color($_POST['button_back_color']);
            $new_input['button_text_color'] = sanitize_hex_color($_POST['button_text_color']);
            update_post_meta($post_id, 'nta_wabutton_style', $new_input);
        }
    }

    public function meta_form_account($post)
    {
        wp_nonce_field('save_form_account', 'form_account_nonce');
        $edit_account = get_post_meta($post->ID, 'nta_whatsapp_accounts', true);
        $edit_button_label = get_post_meta($post->ID, 'nta_wabutton_style', true);
        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-meta-accounts.php';
    }

    public function account_shortcode_form()
    {
        ?>
        <p>Copy the shortcode below and paste it into the editor to display the button.</p>
        <p><input type="text" id="nta-button-shortcode-copy" value="[njwa_button id=&quot;<?php echo esc_attr(get_the_ID()) ?>&quot;]" class="widefat" readonly=""></p>
        <p class="nta-shortcode-copy-status hidden" style="color: green"><strong>Copied!</strong></p>
        <?php
}

    public function meta_form_button_style($post)
    {
        $buttonStyle = get_post_meta($post->ID, 'nta_wabutton_style', true);
        if (empty($buttonStyle)) {
            $buttonStyle = array();
            $buttonStyle['button-text'] = '';
            $buttonStyle['button_style'] = '';
            $buttonStyle['button_back_color'] = '';
            $buttonStyle['button_text_color'] = '';
        }

        require NTA_WHATSAPP_PLUGIN_DIR . 'views/nta-whatsapp-meta-button-style.php';
    }

    public function manager_accounts_columns($columns)
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Account Name', 'ninjateam-whatsapp'),
            'nta_wa_avatar' => __('Avatar', 'ninjateam-whatsapp'),
            'nta_wa_number' => __('Number', 'ninjateam-whatsapp'),
            'nta_wa_title' => __('Title', 'ninjateam-whatsapp'),
            'activedays' => __('Active Days', 'ninjateam-whatsapp'),
            'shortcode' => __('Shortcode', 'ninjateam-whatsapp'),
        );
        return $columns;
    }

    public function manager_accounts_sortable_columns($columns)
    {

        $columns['number'] = __('Number', 'ninjateam-whatsapp');
        $columns['timeslot'] = __('Time Slot', 'ninjateam-whatsapp');

        return $columns;
    }

    public function manager_accounts_show_columns($name, $post_id)
    {
        $data_account = get_post_meta($post_id, 'nta_whatsapp_accounts', true);

        switch ($name) {
            case 'nta_wa_avatar':
                the_post_thumbnail('thumbnail', array('class' => 'img-size-table'));
                break;
            case 'nta_wa_number':
                echo esc_html($data_account['nta_group_number']);
                break;
            case 'nta_wa_title':
                echo esc_html($data_account['nta_title']);
                break;
            case 'activedays':
                echo esc_html(Helper::print_date($data_account));
                break;
            case 'shortcode':
                echo '<input type="text" class="nta-shortcode-table" name="country" value="[njwa_button id=&quot;' . esc_attr($post_id) . '&quot;]" readonly>';
                break;
        }
    }

}
