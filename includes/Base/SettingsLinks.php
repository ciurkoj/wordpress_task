<?php 
/**
 * @package  SocialMediaPlugin
 */
namespace Includes\Base;

/**
* 
*/
class SettingsLinks
{
	public function register() {
        add_filter('plugin_action_links_'.PLUGIN, array($this, 'settings_link'));
	}
	
    public function settings_link($links) {
        //add custom setting link
        $settings_link = '<a href="admin.php?page=social_media_plugin">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
     
}