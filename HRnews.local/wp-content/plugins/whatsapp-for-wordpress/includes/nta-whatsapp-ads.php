<?php
if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
class NTA_ADS
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
        if (!defined('NJT_FILEBIRD_VERSION')) {
            $option = get_option('njt_wa_ads');
            if(!$option || time() >= $option['date']){
                add_action('admin_notices', array($this, 'renderNotice'));
                add_action('wp_ajax_njt_wa_ads_save', array($this, 'save_ads_status'));
            }
        }
    }

    public function save_ads_status(){
        $isMyAjax = isset($_POST['action']) && sanitize_text_field($_POST['action']) == 'njt_wa_ads_save';
        if($isMyAjax){
            $nonce = sanitize_text_field($_POST['nonce']);
            if (!wp_verify_nonce( $nonce, 'ajax-nonce' ) ){
                wp_send_json_error(array('status' => 'Nonce error'));
                return;
            }
        }
        //Save after 30 days
        $arr = ['date' => time() + (30*60*60*24)];
        update_option('njt_wa_ads', $arr);
        wp_send_json_success();
    }

    public function renderNotice(){
        if (function_exists('get_current_screen')) {
            $screen = get_current_screen();
            if ($screen->id != 'upload' && $screen->id != 'plugins'){
                return;
            } 
        }
        ?>
        <div class="notice notice-info is-dismissible" id="njt-wa-ads-wrapper">
            <p>
                <?php _e('To easily manage your files in WordPress media library with folders, please try to use FileBird plugin.', 'ninjateam-whatsapp')?>
                <div>
                    <a class="button button-primary" target="_blank" href="<?php echo esc_url('https://1.envato.market/FileBird3') ?>">
                        <strong><?php _e('Get FileBird Now', 'ninjateam-whatsapp')?></strong>
                    </a>
                    <a class="button button-secondary" href="javascript:;" id="njt-wa-ads">
                        <?php _e('No, thanks', 'ninjateam-whatsapp')?>
                    </a>
                </div>
            </p>
        </div>
        <script>
        jQuery( document ).ready(function() {
            jQuery('#njt-wa-ads').click(function(){
                jQuery.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    dataType: 'json',
                        data: {
                            'action': 'njt_wa_ads_save',
                            'nonce': window.nta.njt_wa_nonce
                        }}).done(function (result) {
                            if (result.success) {
                                jQuery('#njt-wa-ads-wrapper').hide('slow')
                            }
                            else{
                                console.log("Error", result.data.status)
                            }
                });
            })
        });
        </script>
        <?php
    }
}
