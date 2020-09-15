<?php

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class NTA_Whatsapp_Woocommerce
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
        $woo_button_setting = get_option('nta_wa_woobutton_setting');
        $availableAccount = get_option('nta_whatsapp_available_woo_account');
        $this->nta_WA_Post_Instance = NTA_Whatsapp_PostType::getInstance();

        if ((int)$availableAccount == 0 || $woo_button_setting == false || !isset($woo_button_setting['nta_woo_button_status'])) {
            return;
        } else {
            if ($woo_button_setting['nta_woo_button_position'] == 'after_atc') {
                add_action('woocommerce_after_add_to_cart_button', [$this, 'insert_wa_woobutton']);
            } elseif ($woo_button_setting['nta_woo_button_position'] == 'before_atc') {
                add_action('woocommerce_before_add_to_cart_button', [$this, 'insert_wa_woobutton']);
            } elseif ($woo_button_setting['nta_woo_button_position'] == 'after_short_description') {
                //add_filter('woocommerce_short_description', [$this, 'showAfterShortDescription']);
                $this->showAfterShortDescription();
            } elseif ($woo_button_setting['nta_woo_button_position'] == 'after_long_description') {
                add_filter('the_content', [$this, 'showAfterLongDescription']);
            }
        }
    }

    public function showAfterShortDescription()
    {
        add_action('woocommerce_single_product_summary', 'woo_custom_single_product_summary', 2);

        function woo_custom_single_product_summary()
        {
            global $product;

            remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
            add_action('woocommerce_single_product_summary', 'woo_custom_single_excerpt', 20);
        }

        function woo_custom_single_excerpt()
        {
            global $post, $product;

            $short_description = apply_filters('woocommerce_short_description', $post->post_excerpt);

            if (!$short_description) {
                return;
            }

            $btn_content = '';
            $account_list = $this->nta_WA_Post_Instance->get_posts();
            $account_list_view = array();
            foreach ($account_list as $account) {
                $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);

                if ($get_data['wo_active'] == 'active') {
                    $account_list_view[$account->ID] = array(
                        'account_id' => $account->ID,
                        'wo_position' => $get_data['wo_position'],
                    );
                }
            }
            usort($account_list_view, function ($first, $second) {
                return $first['wo_position'] > $second['wo_position'];
            });

            foreach ($account_list_view as $row) {
                $btn_content .= '<div class="nta-woo-products-button">' . do_shortcode('[njwa_button id="' . $row['account_id'] . '"]') . '</div>';
            };

            // The custom text
            $custom_text = $btn_content;

            ?>
               <div class="woo-product-details_short-description">
                   <?php echo $short_description . $custom_text; ?>
               </div>
            <?php
        }
    }

    // public function showAfterShortDescription($post_excerpt)
    // {
    //     if (!is_single()) {
    //         return $post_excerpt;
    //     }
    //     $btn_content = '';
    //     $account_list = get_posts([
    //         'post_type' => 'whatsapp-accounts',
    //         'post_status' => 'publish',
    //         'numberposts' => -1,
    //     ]);
    //     $account_list_view = array();
    //     foreach ($account_list as $account) {
    //         $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);

    //         if ($get_data['wo_active'] == 'active') {
    //             $account_list_view[$account->ID] = array(
    //                 'account_id' => $account->ID,
    //                 'wo_position' => $get_data['wo_position'],
    //             );
    //         }
    //     }
    //     usort($account_list_view, function ($first, $second) {
    //         return $first['wo_position'] > $second['wo_position'];
    //     });

    //     foreach ($account_list_view as $row) {
    //         $btn_content .= '<div class="nta-woo-products-button">' . do_shortcode('[njwa_button id="' . $row['account_id'] . '"]') . '</div>';
    //     }
    //     return $post_excerpt . $btn_content;
    // }

    public function showAfterLongDescription($content)
    {
        if ('product' !== get_post_type() || !is_single()) {
            return $content;
        }
        $btn_content = '';
    
        $account_list = $this->nta_WA_Post_Instance->get_posts();
        $account_list_view = array();
        foreach ($account_list as $account) {
            $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);

            if ($get_data['wo_active'] == 'active') {
                $account_list_view[$account->ID] = array(
                    'account_id' => $account->ID,
                    'wo_position' => $get_data['wo_position'],
                );
            }
        }
        usort($account_list_view, function ($first, $second) {
            return $first['wo_position'] > $second['wo_position'];
        });

        foreach ($account_list_view as $row) {
            $btn_content .= '<div class="nta-woo-products-button">' . do_shortcode('[njwa_button id="' . $row['account_id'] . '"]') . '</div>';
        }
        $btn = '<a href="#">hello</a>';
        return $content . $btn_content;
    }

    public function insert_wa_woobutton()
    {
        $account_list = $this->nta_WA_Post_Instance->get_posts();
        $account_list_view = array();
        foreach ($account_list as $account) {
            $get_data = get_post_meta($account->ID, 'nta_whatsapp_accounts', true);

            if ($get_data['wo_active'] == 'active') {
                $account_list_view[$account->ID] = array(
                    'account_id' => $account->ID,
                    'wo_position' => $get_data['wo_position'],
                );
            }
        }
        usort($account_list_view, function ($first, $second) {
            return $first['wo_position'] > $second['wo_position'];
        });

        foreach ($account_list_view as $row) {
            echo '<div class="nta-woo-products-button">' . do_shortcode('[njwa_button id="' . $row['account_id'] . '"]') . '</div>';
        }
    }

}
