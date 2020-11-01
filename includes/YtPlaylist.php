<?php

class YtPlaylist {
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * @var YtPlaylist $loader  Maintains and registers all hooks for the plugin.
     */
    protected $loader;
    /**
     * The unique identifier of this plugin.
     * @var string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;
    /**
     * The current version of the plugin.
     * @var string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * YtPlaylist constructor.
     */
    public function __construct()
    {
        if (defined('YT_PLAYLIST_VERSION')){
            $this->version = YT_PLAYLIST_VERSION;
        }else{
            define('YT_PLAYLIST_VERSION','1.0.0');
        }
        $this->plugin_name = 'YT Playlist';

        $this->load_dependencies();

        $this->define_admin_hooks();

        $this->define_public_hooks();

        $this->define_yt_playlist_menu();
    }

    /**
     * Load the
     */
    private function load_dependencies()
    {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ).'includes/YtPlaylistLoader.php';
        /**
         * The class responsible for defining all menu and plugin view/layout to wordpress panel
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ).'includes/YtPlaylistMenu.php';
        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ).'admin/YtPlayListAdmin.php';
        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ).'public/YtPlayListPublic.php';

        /**
         * Initalize the plugin
         */
        $this->loader  = new YtPlaylistLoader();
    }
    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     */
    private function define_admin_hooks()
    {
        $plugin_admin = new YtPlayListAdmin($this->get_plugin_name(),$this->get_plugin_version());
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin , 'enqueue_scripts' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin , 'enqueue_styles' );
    }
    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     */
    private function define_public_hooks()
    {
        $plugin_public = new YtPlayListPublic($this->get_plugin_name(),$this->get_plugin_version());
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public , 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public , 'enqueue_scripts' );
    }
    /**
     * Register the plugin menu
     * of the plugin.
     */
    public function define_yt_playlist_menu()
    {
        $YtPlaylistMenu = new YtPlaylistMenu($this->get_plugin_name());
        $this->loader->add_action('admin_menu', $YtPlaylistMenu, 'add_menu_page');
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     */
    public function run()
    {
        $this->loader->run();
    }
    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @return  string  The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }
    /**
     * Retrieve the version number of the plugin.
     * @return  string   The version number of the plugin.
     */
    public function get_plugin_version()
    {
        return $this->version;
    }

}
