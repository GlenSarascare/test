<?php
/**
 * Auto Update API
 *
 * @author      WaspThemes
 * @category    Core
 * @version     1.2
*/

// Don't run this file directly.
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

// Formating version
function yp_version($v){
    $v = preg_replace('/[^0-9]/s', '', $v);
    if(strlen($v) == 2){
        return $v."0";
    }elseif(strlen($v) == 1){
        return $v."00";
    }else{
        return $v;
    }
}

// Defining plugin version
define("YP_FORMATTED_VERSION", yp_version(YP_VERSION));


// Getting purchase code
function yp_setting_purchase_code(){

    if(defined("YP_THEME_MODE")){
        define("YP_PURCHASE_CODE","YELLOW_PENCIL_THEME_LICENSE"); // Extended theme mode
    }else{
        define("YP_PURCHASE_CODE",get_option('yp_purchase_code')); // personal user information
    }

}
add_action("admin_init","yp_setting_purchase_code");


// Basic update
function yp_install_plugin($plugin){

    if(current_user_can("update_plugins")){

        // by this point, the $wp_filesystem global should be working, so let's use it to create a file
        global $wp_filesystem;
        
        // Initialize the WP filesystem, no more using 'file-put-contents' function
        if (empty($wp_filesystem)) {
            require_once(ABSPATH . '/wp-admin/includes/file.php');
            WP_Filesystem();
        }

        // plugin array; name, download uri, install path
        $plugin = $plugin[0];

        // Plugins path
        $path = ABSPATH.'wp-content/plugins/';

        // Zip file path
        $zip = $path.$plugin['name'].'.zip';

        // The plugin folder
        $install = $plugin['install'];

        // delete zip file
        if($wp_filesystem->exists($zip)){
            $wp_filesystem->delete($zip);
        }

        // trying to download zip file
        $response = wp_remote_get( 
            $plugin['uri'], 
            array( 
                'timeout'  => 300, 
                'stream'   => true, 
                'filename' => $zip 
            ) 
        );

        // Problem with download zip file
        if (is_wp_error($response)){

            // delete zip file
            if($wp_filesystem->exists($zip)){
                $wp_filesystem->delete($zip);
            }

            // stop if cannot rename
            return false;

        }

        // Change folder name
        if(!rename($path . "waspthemes-yellow-pencil", $path . "waspthemes-yellow-pencil-old")){

            // delete zip file
            if($wp_filesystem->exists($zip)){
                $wp_filesystem->delete($zip);
            }

            // stop if cannot rename
            return false;

        }

        // If Unzip zip file
        if(unzip_file($zip, $path)){

            // be sure, this unzipped (waspthemes-yellow-pencil/yellow-pencil.zip is available)
            if($wp_filesystem->exists($path . $install)){

                // delete the -old folder
                yp_delete_plugin($path."waspthemes-yellow-pencil-old");

                // Force active the plugin
                yp_plugin_activate($install);

                // delete zip file
                if($wp_filesystem->exists($zip)){
                    $wp_filesystem->delete($zip);
                }

            // if unzip is unsucessful
            }else{

                // rename -old as default and stop installing
                rename($path . "waspthemes-yellow-pencil-old", $path . "waspthemes-yellow-pencil");
                return false;

            }

        }

        // show result
        return true;

    }

}


// deletes all plugin folder's content
function yp_delete_plugin($plugin) {

    global $wp_filesystem;

    // if folder
    if(is_dir($plugin)){

        // All files
        $files = glob( $plugin . '*', GLOB_MARK);

        // loop
        foreach($files as $file){
            yp_delete_plugin($file);      
        }

        // delete folder
        $wp_filesystem->rmdir($plugin);

    // if file, delete
    } elseif(is_file($plugin)){
        $wp_filesystem->delete($plugin);
    }

}


// Response code
function yp_get_http_response_code($url){

    if( ini_get('allow_url_fopen') ) {
        $headers = @get_headers($url);
        return substr($headers[0], 9, 3);
    }else{
        return null;
    }

}

// Getting version
function yp_getting_ver_from_changelog(){

    $version = 0;
    $pluginVersion = YP_FORMATTED_VERSION;

    // Changelog URL
    $url = "https://waspthemes.com/yellow-pencil/inc/changelog.txt";

    // If page found.
    if(yp_get_http_response_code($url) == 200){

        // Getting Changelog
        $changelog = wp_remote_get($url, array( 'sslverify' => false ));
        $changelog = wp_remote_retrieve_body( $changelog );

        // If have data.
        if(!empty($changelog)){

            // Get First line.
            $last_update = substr($changelog, 0, 32);

            // Part of first line.
            $array = explode('(',$last_update);

            // Only version.
            $version = yp_version($array['0']);

            if($version > $pluginVersion){
                            
                // Add to datebase, because have a new update.
                if(get_option('yp_update_status') !== false ){
                    update_option( 'yp_update_status', 'true');
                    update_option( 'yp_last_check_version', $pluginVersion);
                    update_option( 'yp_available_version', $version);
                }else{
                    add_option( 'yp_update_status', 'true');
                    add_option( 'yp_last_check_version', $pluginVersion);
                    add_option( 'yp_available_version', $version);
                }
                
                    return true;
                            
            }else{
                            
                // Update database, because not have a new update.
                if(get_option('yp_update_status') !== false ){
                    update_option( 'yp_update_status', 'false');
                }else{
                    add_option( 'yp_update_status', 'false');
                }
                
                return false;
                
            }
                
        } // If has data.
                
    } // IF URL working.

}


// check changelog in background
function yp_update_checker(){

    // Update available just for pro users.
    if(defined('WTFV') == true && current_user_can("edit_theme_options") == true && check_admin_referer("yp_update_checker_nonce")){
        
        // download changelog and check if update available
        yp_getting_ver_from_changelog();

    }

    // die
    die();
    
}

add_action('wp_ajax_yp_update_checker', 'yp_update_checker', 9999);



// Getting plugin download uri from Envato
function yp_get_download_uri_by_purchase(){

    // Checks download uri
    $download_uri = 'https://waspthemes.com/yellow-pencil/auto-update/download.php?purchase_code='.YP_PURCHASE_CODE;

    // Getting plugin download url
    $data = wp_remote_get($download_uri, array( 'sslverify' => false ));
    $data = wp_remote_retrieve_body( $data );

    if($data == ''){
        die('Unknown error.');
    }
    
    // Data is the download URL
    return $data;

}


// Active new version.
function yp_plugin_activate($installer){

    if(current_user_can("activate_plugins")){

        $current = get_option('active_plugins');
        $plugin = plugin_basename(trim($installer));

        if(!in_array($plugin, $current)){
            $current[] = $plugin;
            sort($current);
            do_action('activate_plugin', trim($plugin));
            update_option('active_plugins', $current);
            do_action('activate_'.trim($plugin));
            do_action('activated_plugin', trim($plugin));
            return true;
        }else{
            return false;
        }

    }

}

// show update message.
function yp_update_message(){

    // Update available just for pro users.
    if(defined('WTFV') == true){

        // get screen
        $screen = get_current_screen();
        $base = $screen->base;

        $lastCheckVer = get_option('yp_last_check_version');
        $isUpdate = get_option('yp_update_status');
        $available = get_option('yp_available_version');

        if($isUpdate != 'true' && current_user_can("update_plugins") == true && YP_PURCHASE_CODE == '' && strstr($base,"yellow-pencil") == false){
            ?>
            <div class="update-nag yp-update-info-bar">
                Would you like to receive automatic updates? Please <a style='box-shadow:none !important;-webkit-box-shadow:none !important;-moz-box-shadow:none !important;' href='<?php echo admin_url('admin.php?page=yellow-pencil-license'); ?>'>activate your copy</a> of YellowPencil.
            </div>
        <?php
        }
        
        if($isUpdate == 'true' && $lastCheckVer == YP_FORMATTED_VERSION && $available > YP_FORMATTED_VERSION && current_user_can("update_plugins") == true && YP_PURCHASE_CODE != ''){

            $versionDots = str_split($available);
            $versionView = join('.', $versionDots);
            
            ?>
            <div class="update-nag yp-update-info-bar">
                YellowPencil <a target="_blank" href="https://yellowpencil.waspthemes.com/changelog/"><?php echo $versionView; ?></a> is available! Please <a style="box-shadow:none !important;-webkit-box-shadow:none !important;-moz-box-shadow:none !important;" href="#" class="yp_update_link">update now.</a>
            </div>
            <?php
                
        }elseif($isUpdate == 'true' && $lastCheckVer == YP_FORMATTED_VERSION && $available > YP_FORMATTED_VERSION && current_user_can("update_plugins") == true && strstr($base,"yellow-pencil") == false){

            ?>
            <div class="update-nag yp-update-info-bar">
                New updates are available for YellowPencil! Please activate your copy to receive automatic updates. <a style="box-shadow:none !important;-webkit-box-shadow:none !important;-moz-box-shadow:none !important;" href="<?php echo admin_url('admin.php?page=yellow-pencil-license'); ?>">Activate now!</a>
            </div>
            <?php

        }

    }

}

// Begin to update for Pro version.
function yp_update_now(){

    if(check_admin_referer("yp_update_plugin_nonce")){

        $lastCheckVer = get_option('yp_last_check_version');
        $isUpdate = get_option('yp_update_status');
        $available = get_option('yp_available_version');
        
        if($isUpdate == 'true' && $lastCheckVer == YP_FORMATTED_VERSION && $available > YP_FORMATTED_VERSION && current_user_can("update_plugins") == true && YP_PURCHASE_CODE != ''){
            
            // Getting the download uri.
            $uri = yp_get_download_uri_by_purchase();

            // Update.
            $re = yp_install_plugin(array(
                array('name' => 'yellow_pencil_update_pack', 'uri' => $uri, 'install' => 'waspthemes-yellow-pencil/yellow-pencil.php'),
            ));

            if(!$re){
                wp_die("The server doesn't support automatic updates. Please update manually.");
            }
            
        }

        wp_die("Updated.");

    }

}


// Update javascript
function yp_update_javascript() { ?>
    <script type="text/javascript" >
    jQuery(document).ready(function($) {

        <?php

        // Update available just for pro users.
        if(defined('WTFV') == true && current_user_can("edit_theme_options") == true){
            
            // Get time
            $timeStamp = current_time('timestamp', 1);

            // if already check time or this first run
            if(intval($timeStamp-intval(get_option('yp_checked_data'))) > 86400 || get_option('yp_checked_data') === false){

                // Action nonce
                $nonce = wp_create_nonce('yp_update_checker_nonce');

                // Send in background
                echo "// Update Checker API\n\t\t";
                echo 'jQuery.post("'.admin_url('admin-ajax.php?action=yp_update_checker&_wpnonce='.$nonce).'");';
                echo "\n";

                // Update time again
                if (!update_option( 'yp_checked_data', $timeStamp)){
                    add_option( 'yp_checked_data', $timeStamp);
                }
                    
            }
            
        }

        ?>

        // Update API
        jQuery(".yp_update_link").click(function(){

            var notice = jQuery(this).parent();

            // Updating.
            notice.addClass("yp-updating");
            notice.html(" Updating...");

            var data = {
                'action': 'yp_update_now',
                '_wpnonce': '<?php echo wp_create_nonce("yp_update_plugin_nonce"); ?>'
            };

            jQuery.post(ajaxurl,data, function(response) {

                jQuery(".yp-update-info-bar").html(" " + response);
                notice.removeClass("yp-updating");

                if(response == "Updated."){
                    notice.addClass("yp-updated");
                }else{
                    notice.addClass("yp-failed-update");
                }

            });

        });


        // Disable activation btn
        jQuery(".yp-product-activation").on("click",function(){
            jQuery(this).addClass("disabled");
        });

    });
    </script><?php
}

// Admin update script
add_action( 'admin_footer', 'yp_update_javascript' );

// Alert update
add_action( 'admin_notices', 'yp_update_message' );

// Ajax action.
add_action( 'wp_ajax_yp_update_now', 'yp_update_now' );
