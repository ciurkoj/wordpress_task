<?php

/**
 * @package  SocialMediaPlugin
 */

namespace Includes\Api\Callbacks;

use Includes\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public $AccountName = "No name";

    public function get_variables()
    {
        return $this->AccountName;
    }
    public function twitterSettings()
    {

        return require_once "$this->plugin_path" . "templates/twitterSettings.php";
        // return require_once("/opt/lampp/htdocs/wordpress/wp-content/plugins/socialLinksPlugin/templates/admin_page.php");
    }

    public function facebookSettings()
    {
        return require_once "$this->plugin_path/templates/facebookSettings.php";
    }

    public function linkedInSettings()
    {
        return require_once "$this->plugin_path/templates/linkedInSettings.php";
    }

    public function instagramSettings()
    {
        return require_once "$this->plugin_path/templates/instagramSettings.php";
    }

    public function OptionsGroup($input)
    {
        return $input;
    }

    public function AdminSections()
    {
        echo 'Check out this section';
    }
    public function TextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">';
    }

    public function FirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
    }
    public function AccountName()
    {
        $value = esc_attr(get_option('account_name'));

        echo '<input type="text" class="regular-text" name="account_name" value="' . $value . '" placeholder="Enter account name">';

    }
    public function AccountUrl()
    {
        $value = esc_attr(get_option('account_url'));
        echo '<input type="text" class="regular-text" name="account_url" value="' . $value . '" placeholder="Enter account\'s url address">';

    }

    public function WidgetSize()
    {
        $widget_size = esc_attr(get_option('widget_size'));
        echo ' <select
          class="widefat"
          id="widget_size"
          name="widget_size">
          <option value="default" ' . ($widget_size == 'default' ? 'selected' : '') . '>
            Default
          </option>
          <option value="large" ' . ($widget_size == 'large' ? 'selected' : '') . '>
            Large
          </option>
        </select>';
    }

    public function ShowCount()
    {
        $show_count = esc_attr(get_option('show_count'));

//  ' . ($show_count == 'false') ? 'selected' : '' . '
        //' . ($show_count == 'default') ? 'selected' : '' . '
        echo ' <select
          class="widefat"
          id="show_count"
          name="show_count">
          <option value="default" ' . ($show_count == 'default' ? 'selected' : '') . '>
            Default
          </option>
          <option value="false" ' . ($show_count == 'false' ? 'selected' : '') . '>
            Hidden
          </option>
        </select>';

    }
}
