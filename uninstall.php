<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//delete the table when uninstall the plugin
global $wpdb;
$tableName = 'yt_playlist';
$wpdb->query("DROP TABLE IF EXISTS $wpdb->prefix.$tableName");
