<?php
/**
 * Plugin Name:       YT Playlist
 * Plugin URI:        http://codingbirdsonline.com/plugins/yt-playlist
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Author:            Ankit Prajapati
 * Author URI:        https://ankit.codingbirdsonline.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       yt-playlist
 * Domain Path:       /languages
 */

/**
 * If this file is called directly, abort.
 */
if (! defined('WPINC')) {
   die;
}
define( 'YT_PLAYLIST_PLUGIN_VERSION', '1.0.0' );

require plugin_dir_path(__FILE__).'includes/YtPlaylist.php';


function run_yt_playlist()
{
    $ytPlayList = new YtPlaylist();
    $ytPlayList->run();
}

run_yt_playlist();

