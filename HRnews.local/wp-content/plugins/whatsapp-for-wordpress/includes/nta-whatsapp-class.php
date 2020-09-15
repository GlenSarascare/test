<?php

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class NTA_Whatsapp
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
        NTA_Whatsapp_Shortcode::getInstance();
        NTA_Whatsapp_Popup::getInstance();
        NTA_Whatsapp_Setting::getInstance();
        NTA_Whatsapp_PostType::getInstance();
        NTA_Whatsapp_Woocommerce::getInstance();
        NTA_Whatsapp_Wpml::getInstance();
        NTA_ADS::getInstance();
    }

    public function activation_hook()
    {

    }

    public function deactivation_hook()
    {

    }
}
