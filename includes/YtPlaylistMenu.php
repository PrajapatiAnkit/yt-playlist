<?php


class YtPlaylistMenu
{
    private $plugin_name;

    /**
     * Initialize the class and set its properties.
     * YtPlayListAdmin constructor.
     * @param $plugin_name
     */
    public function __construct($plugin_name){
        $this->plugin_name = $plugin_name;
    }

    /**
     * Register the menu for the admin-facing side of the site.
     */
    public function add_menu_page()
    {
        add_menu_page(
            $this->plugin_name,
            $this->plugin_name,
            'manage_options',
            'yt-playlist',
            array( __CLASS__, 'yt_playlist_plugin_template_callback' ),
//            plugins_url( 'yt-playlist/admin/images/yt-playlist-menu-icon.png' ),
            'dashicons-video-alt2',
            30
        );
    }

    /**
     * Plugin template goes here
     */
    public function yt_playlist_plugin_template_callback()
    {
        require_once plugin_dir_path( dirname( __FILE__ ) ).'admin/yt-playlist-admin-display.php';
    }
}
