<?php
/**
 * The admin-specific functionality of the plugin.
 * Enqueue the admin-specific stylesheet and JavaScript.
 */
class YtPlayListAdmin {

    private $plugin_name;

    private $plugin_version;

    /**
     * Initialize the class and set its properties.
     * YtPlayListAdmin constructor.
     * @param $plugin_name
     * @param $plugin_version
     */
    public function __construct($plugin_name,$plugin_version){
        $this->plugin_name = $plugin_name;
        $this->plugin_version = $plugin_version;
    }

    /**
     *  Register the stylesheets for the admin area.
     */
    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name,plugin_dir_url(__FILE__).'css/yt-playlist-admin-style.css',array(),$this->plugin_version,'all');
    }

    /**
     * Register the JavaScript for the admin area.
     */
    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name,plugin_dir_url(__FILE__).'js/yt-playlist-admin-script.js',array('jquery'),$this->plugin_version,false);
    }
}
