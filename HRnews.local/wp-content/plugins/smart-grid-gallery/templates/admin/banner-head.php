<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$path_site2 = plugins_url( "../../assets/images/admin_images", __FILE__ );
?>

<div class="free_version_banner" >

    <img class="manual_icon" src="<?php echo $path_site2; ?>/logo.png" />
    <h1 class="plugin_heading">Origin Video Gallery</h1>
    <ul class="submenu">
        <li>
            <a target="_blank"  href="https://origincode.co/downloads/video-gallery/">
                <?php _e('Demo','origincode_contact');?>
            </a>
        </li>
        <li>
            <a target="_blank"  href="https://wordpress.org/support/plugin/">
                <?php _e('Support','origincode_contact');?>
            </a>
        </li>
        <li>
            <a target="_blank"  href="https://origincode.co/contact/">
                <?php _e('Contact','origincode_contact');?>
            </a>
        </li>
        <li>
            <a class="get_full_version" href="https://origincode.co/downloads/video-gallery/" target="_blank">
                <?php _e('Go Pro','origincode_contact');?>
            </a>
        </li>
    </ul>
</div>