<?php

function elfsight_youtube_gallery_db_migrate() {
    global $wpdb;

    $youtube_gallery_table_name = $wpdb->prefix . 'elfsight_youtube_gallery_widgets';
    $yottie_table_name = $wpdb->prefix . 'elfsight_yottie_widgets';

    $youtube_gallery_table_exist = !!$wpdb->get_var('SHOW TABLES LIKE "' . $youtube_gallery_table_name . '"');
    $yottie_table_exist = !!$wpdb->get_var('SHOW TABLES LIKE "' . $yottie_table_name . '"');

    if (!$youtube_gallery_table_exist && $yottie_table_exist) {
        $wpdb->query('RENAME TABLE ' . $yottie_table_name . ' TO ' . $youtube_gallery_table_name . ';');
    }
}
