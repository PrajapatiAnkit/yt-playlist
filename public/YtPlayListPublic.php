<?php
/**
 * The admin-specific functionality of the plugin.
 * Enqueue the public-specific stylesheet and JavaScript.
 */
class YtPlayListPublic {

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
     * Register the stylesheets for the public-facing side of the site.
     */
    public function enqueue_styles() {
        wp_enqueue_style($this->plugin_name,plugin_dir_url(__FILE__).'css/yt-playlist-style.css',array(),$this->plugin_version,'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     */
    public function enqueue_scripts() {
        wp_enqueue_script($this->plugin_name,plugin_dir_url(__FILE__).'js/yt-playlist-script.js',array('jquery'),$this->plugin_version,false);
    }
}
