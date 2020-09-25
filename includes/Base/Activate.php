<?php

/**
 * @package  SocialMediaPlugin
 */

namespace Includes\Base;

class Activate
{
    public static function activate()
    {

        flush_rewrite_rules();

        $default = array();

        if (!get_option('twitterSettings')) {
            update_option('twitterSettings', $default);
        }

        if (!get_option('alecaddd_plugin_cpt')) {
            update_option('alecaddd_plugin_cpt', $default);
        }

        if (!get_option('alecaddd_plugin_tax')) {
            update_option('alecaddd_plugin_tax', $default);
        }
    }
}
