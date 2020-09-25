<?php

/**
 * @package  SocialMediaPlugin
 */

namespace Includes\Pages;

use Includes\Api\Callbacks\AdminCallbacks;
use Includes\Api\Callbacks\ManagerCallbacks;
use Includes\Api\SettingsApi;
use Includes\Base\BaseController;

/**
 *
 */
class Admin extends BaseController
{
    public $settings;
    public $account_name;
    public $account_url;
    public $fb_account_url;
    public $show_count;
    public $widget_size;
    public $callbacks;
    public $callbacks_mgr;
    public $pages = array();
    public $subpages = array();

    public function register()
    {

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();
        $this->setSubpages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Twitter')->addSubPages($this->subpages)->register();

    }

    public function setPages()
    {

        $this->pages = array(
            array(
                'page_title' => 'Social Media Plugin',
                'menu_title' => 'Social Media',
                'capability' => 'manage_options',
                'menu_slug' => 'twitterSettings',
                // 'callback' => function(){require_once('/opt/lampp/htdocs/wordpress/wp-content/plugins/socialLinksPlugin/templates/admin_page.php');},
                'callback' => array($this->callbacks, 'twitterSettings'),
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ),
        );
    }

    public function setSubpages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'twitterSettings',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'Facebook',
                'capability' => 'manage_options',
                'menu_slug' => 'facebookSettings',
                'callback' => array($this->callbacks, 'facebookSettings'),
            ),
            array(
                'parent_slug' => 'twitterSettings',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'LinkedIn',
                'capability' => 'manage_options',
                'menu_slug' => 'linkedInSettings',
                'callback' => array($this->callbacks, 'linkedInSettings'),
            ),
            array(
                'parent_slug' => 'twitterSettings',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Instagram',
                'capability' => 'manage_options',
                'menu_slug' => 'instagramSettings',
                'callback' => array($this->callbacks, 'instagramSettings'),
            ),
        );

    }

    public function setSettings()
    {
        $args = array(
            array(
                "option_group" => 'twitter_options_group',
                'option_name' => 'account_name',
                'callback' => array($this->callbacks, 'OptionsGroup'),
            ),
            array(
                "option_group" => 'twitter_options_group',
                'option_name' => 'account_url',
                'callback' => array($this->callbacks, 'OptionsGroup'),
            ),
            array(
                "option_group" => 'twitter_options_group1',
                'option_name' => 'widget_size',
                'callback' => array($this->callbacks, 'OptionsGroup'),
            ),

            array(
                "option_group" => 'twitter_options_group1',
                'option_name' => 'show_count',
                'callback' => array($this->callbacks, 'OptionsGroup'),
            ),

            array(
                'option_group' => 'twitter_options_group',
                'option_name' => 'tw_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),

            array(
                'option_group' => 'options_group',
                'option_name' => 'insta_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                "option_group" => 'facebook_options_group',
                'option_name' => 'fb_account_url',
                'callback' => array($this->callbacks, 'OptionsGroup'),
            ),
            array(
                'option_group' => 'facebook_options_group1',
                'option_name' => 'use_small_header',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize'),
            ),
            array(
                "option_group" => 'facebook_options_group1',
                'option_name' => 'fb_show_timeline',
                'callback' => array($this->callbacks, 'OptionsGroup'),
            ),
        );

        $this->settings->setSettings($args);
        // return $this->settings;

    }
    public function setSections()
    {
        $args = array(
            array(
                'id' => 'admin_twitter',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'AdminSections'),
                'page' => 'twitter_settings_page',
            ), array(
                'id' => 'admin_twitter',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'AdminSections'),
                'page' => 'twitter_settings_page1',
            ),
            array(
                'id' => 'alecaddd_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'alecaddd_plugin',
            ),
            array(
                'id' => 'admin_facebook',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'AdminSections'),
                'page' => 'facebook_settings_page',
            ),
            array(
                'id' => 'admin_facebook',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'AdminSections'),
                'page' => 'facebook_settings_page1',
            ),
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id' => 'account_name',
                'title' => 'Account Name',
                'callback' => array($this->callbacks, 'AccountName'),
                'page' => 'twitter_settings_page',
                'section' => 'admin_twitter',
                'args' => array(
                    'label_for' => 'account_name',
                    'class' => 'example-class',
                ),

            ),
            array(
                'id' => 'account_url',
                'title' => 'Account Url',
                'callback' => array($this->callbacks, 'AccountUrl'),
                'page' => 'twitter_settings_page',
                'section' => 'admin_twitter',
                'args' => array(
                    'label_for' => 'account_url',
                    'class' => 'example-class',
                ),

            ),
            array(
                'id' => 'widget_size',
                'title' => 'Select Widget\'s Size:',
                'callback' => array($this->callbacks, 'WidgetSize'),
                'page' => 'twitter_settings_page1',
                'section' => 'admin_twitter',
                'args' => array(
                    'label_for' => 'widget_size',
                    'class' => 'example-class',
                ),
            ),
            array(
                'id' => 'show_count',
                'title' => 'Show Followers Count:',
                'callback' => array($this->callbacks, 'ShowCount'),
                'page' => 'twitter_settings_page1',
                'section' => 'admin_twitter',
                'args' => array(
                    'label_for' => 'show_count',
                    'class' => 'example-class',
                ),
            ),
            array(
                'id' => 'tw_manager',
                'title' => 'Just an empty checkbox',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'twitter_settings_page',
                'section' => 'admin_twitter',
                'args' => array(
                    'label_for' => 'tw_manager',
                    'class' => 'ui-toggle',
                    // 'theFunction' => 'myFunction()',
                    // "option_name" => 'option_name',
                ),
            ),
            array(
                'id' => 'fb_account_url',
                'title' => 'Account Url',
                'callback' => array($this->callbacks, 'fbAccountUrl'),
                'page' => 'facebook_settings_page',
                'section' => 'admin_facebook',
                'args' => array(
                    'label_for' => 'fb_account_url',
                    'class' => 'example-class',
                ),

            ),
            array(
                'id' => 'use_small_header',
                'title' => 'Use Small Header',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'facebook_settings_page1',
                'section' => 'admin_facebook',
                'args' => array(
                    'label_for' => 'use_small_header',
                    'class' => 'ui-toggle',
                ),
            ),
            array(
                'id' => 'fb_show_timeline',
                'title' => 'Show timeline:',
                'callback' => array($this->callbacks, 'ShowTimeline'),
                'page' => 'facebook_settings_page1',
                'section' => 'admin_facebook',
                'args' => array(
                    'label_for' => 'fb_show_timeline',
                    'class' => 'example-class',
                ),
            ),
            array(
                'id' => 'insta_manager',
                'title' => 'Activate CPT Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'alecaddd_plugin',
                'section' => 'alecaddd_admin_index',
                'args' => array(
                    'label_for' => 'insta_manager',
                    'class' => 'ui-toggle',
                ),
            ),
        );
        define('FB_SHOW_TIMELINE', (get_option('fb_show_timeline') == 'timeline' ? "timeline" : "false"));
        echo FB_SHOW_TIMELINE;
        define('FB_USE_SMALL_HEADER', (get_option('use_small_header') == 1 ? "true" : "false"));
        // var_dump(array($args));
        define('WIDGET_SIZE', $this->widget_size = esc_attr(get_option('widget_size')));
        // echo WIDGET_SIZE;
        define('SHOW_COUNT', $this->show_count = esc_attr(get_option('show_count')));
        // echo SHOW_COUNT;
        define('ACCOUNT_NAME', $this->account_name = get_option($args[0]['id']));
        // echo $this->account_name;
        define('ACCOUNT_URL', $this->account_url = get_option($args[1]['id']));
        // echo $this->account_url;
        // echo var_dump($args);
        define('FB_ACCOUNT_URL', $this->fb_account_url = get_option('fb_account_url'));
        $this->settings->setFields($args);
    }
}
