<?php

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 */

class YtPlaylistLoader
{
    /**
     * The array of actions registered with WordPress.
     * @var array
     */
    protected $actions;
    /**
     * The array of filters registered with WordPress.
     * @var array
     */
    protected $filters;

    /**
     * Initialize the collections used to maintain the actions and filters.
     * YtPlaylistLoader constructor.
     */
    public function __construct()
    {
        $this->actions = array();
        $this->filters = array();
    }

    /**
     * Add a new action to the collection to be registered with WordPress.
     *
     * @param $hook
     * @param $component
     * @param $callback
     * @param int $priority
     * @param int $accepted_args
     */
    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 )
    {
        $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
    }

    /**
     * A utility function that is used to register the actions and hooks into a single collection
     *
     * @param $actions
     * @param $hook
     * @param $component
     * @param $callback
     * @param $priority
     * @param $accepted_args
     * @return array
     */
    private function add($actions, $hook, $component, $callback, $priority, $accepted_args)
    {
        $actions[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args
        );
        return $actions;
    }
    /**
     * Register the filters and actions with WordPress.
     */
    public function run()
    {
        foreach ( $this->actions as $hook ){
            add_action( $hook['hook'], array( $hook['component'], $hook['callback']), $hook['priority'], $hook['accepted_args'] );
        }
    }
}
