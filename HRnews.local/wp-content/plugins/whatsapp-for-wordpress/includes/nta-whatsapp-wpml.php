<?php

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class NTA_Whatsapp_Wpml
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
        global $sitepress;

        if ($sitepress !== null && get_class($sitepress) === 'SitePress') {
            $settings = $sitepress->get_setting('custom_posts_sync_option', array());
            $post_type = 'whatsapp-accounts';
            if (isset($settings[$post_type]) && ($settings[$post_type] == 1 || $settings[$post_type] == 2)) {
                $this->isActive = true;
                add_filter('njt_wa_get_post_type', array($this, 'getPostType'), 10, 1);
            }
        }
    }

    public function getPostType($args)
    {
        $args['suppress_filters'] = false;
        $args['language'] = ICL_LANGUAGE_CODE;
        return $args;
    }
}
