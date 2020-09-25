<?php

/*
Plugin Name: SocialMediaLinks
Plugin URI: https://championsukplc.com
Description: Manages social media icons and links
Version: 1.0.0
Author: Jakub Ciurko
Author URI: https://ciurkoj.github.io/portfolio-v2/
 */

// use ParagonIE\Sodium\Core\Curve25519\Ge\P2;

defined('ABSPATH') or die("No access");
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

require_once "/opt/lampp/htdocs/wordpress/wp-content/plugins/socialLinksPlugin/includes/socialMediaLinks_class.php";

//Register Widget
function register_SocialMediaLinks()
{
    register_widget('SocialMediaLinks_Widget');

}

//Hook in function
add_action('widgets_init', 'register_SocialMediaLinks');

/**
 * The code that runs during plugin activation
 */
function activateSocialMediaPlugin()
{
    Includes\Base\Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivateSocialMediaPlugin()
{
    Includes\Base\Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activateSocialMediaPlugin');
register_deactivation_hook(__FILE__, 'deactivateSocialMediaPlugin');

if (class_exists('Includes\\Init')) {
    Includes\Init::register_services();
}
/*
use Includes\Base\Activate;
use Includes\Base\Deactivate;
use Includes\Pages\AdminPages;

if (!class_exists('SocialMedia_Widget')) {

class SocialMedia_Widget
{

public $plugin;

function __construct()
{
$this->plugin = plugin_basename(__FILE__);
}

function register()
{
add_action('admin_enqueue_scripts', array($this, 'enqueue'));

add_action('admin_menu', array($this, 'add_admin_pages'));

add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
}

public function settings_link($links)
{
//add custom setting link
$settings_link = '<a href="admin.php?page=social_media_plugin">Settings</a>';
array_push($links, $settings_link);
return $links;
}

public function add_admin_pages()
{
add_menu_page('Social Media Plugin', 'SocialMedia', 'manage_options', 'social_media_plugin', array($this, 'admin_index'), 'dashicons-store', 4);
}

public function admin_index()
{
// require template
require_once plugin_dir_path(__FILE__) . 'templates/admin_page.php';
}

protected function create_post_type()
{
add_action('init', array($this, 'custom_post_type'));
}

function custom_post_type()
{
register_post_type('book', ['public' => true, 'label' => 'Books']);
}

function enqueue()
{
// enqueue all our scripts
wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
wp_enqueue_script('mypluginscript', plugins_url('/assets/main.js', __FILE__));
}

function activate()
{
Activate::activate();
}
}

$socialMediaPlugin = new SocialMedia_Widget();
$socialMediaPlugin->register();

// activation
register_activation_hook(__FILE__, array($socialMediaPlugin, 'activate'));

// deactivation

register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));
}
 */
