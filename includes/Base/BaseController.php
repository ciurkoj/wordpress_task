<?php
/**
 * @package  SocialMediaPlugin
 */
namespace Includes\Base;

class BaseController
{

    public $plugin_path;

    public $plugin_url;

    public $plugin;
    public function __construct()
    {
        $this->plugin_path = plugin_dir_path(dirname(__DIR__));
        $this->plugin_url = plugin_dir_url(dirname(__DIR__));
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/socialLinksPlugin.php';
        $this->managers = array(

            'media_widget' => 'Activate Media Widget',

        );
    }

    public function activated(string $key)
    {
        $option = get_option('twitterSettings');

        return isset($option[$key]) ? $option[$key] : false;
    }
}
