<?php
/**
 * @package  SocialMediaPlugin
 */
namespace Includes\Api\Widgets;

use WP_Widget;

/**
 *
 */
class MediaWidget extends WP_Widget
{

    public $widget_ID;

    public $widget_name;
    public $name;
    public $widget_options = array();
    public $control_options = array();

    public function __construct()
    {
        $this->widget_ID = 'social_media_widget';
        $this->widget_name = 'Activate Social Media';

        $this->widget_options = array(
            'classname' => $this->widget_ID,
            'description' => $this->widget_name,
            'customize_selective_refresh' => true,
        );

        // $this->control_options = array(
        //     'width' => 400,
        //     'height' => 350,
        // );
    }

    public function register()
    {
        parent::__construct($this->widget_ID, $this->widget_name, $this->widget_options, $this->control_options);

        add_action('widgets_init', array($this, 'widgetsInit'));
    }

    public function widgetsInit()
    {
        register_widget($this);
    }

    public function widget($args, $instance)
    {

        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        $text = $instance['text'];
        // The following variable is for a checkbox option type
        $twitterOnOff = $instance['twitterOnOff'] ? 'true' : 'false';

        echo $before_widget;

        if ($title) {
            echo $before_title . $title . $after_title;
        }

        // Retrieve the checkbox
        if ('on' == $instance['twitterOnOff']): ?><?
            echo '<a href="' . ACCOUNT_URL . '" class="twitter-follow-button" data-size="' . WIDGET_SIZE . '" data-show-count="' . SHOW_COUNT . '">Follow ' . ACCOUNT_NAME . '</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
           
        ?>
            <?php endif;?>
            <?
            if ('on' == $instance['twitterOnOff1']): ?><?
            echo '<a href="' . ACCOUNT_URL . '" class="twitter-follow-button" data-size="' . WIDGET_SIZE . '" data-show-count="' . SHOW_COUNT . '">Follow ' . ACCOUNT_NAME . '</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
            echo $args['before_widget'];
        ?>

            <?php endif;?>
            <?
            echo '<div class="fb-page" data-href="' . FB_ACCOUNT_URL . '" data-tabs="'.FB_SHOW_TIMELINE.'" data-width="" data-height="" data-small-header="'.FB_USE_SMALL_HEADER.'" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="eGF7j9vh"></script>';
?>
            <?php
echo $after_widget;
    }

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__("Enter Your Widget's Title", 'awps');

        $defaults = array('title' => __('About Us', 'wptheme'), 'twitterOnOff' => 'off',
            'twitterOnOff1' => 'off');
        $instance = wp_parse_args((array) $instance, $defaults); ?>

        <p>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
                <input class="widefat"  id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" placeholder="Enter Your Widget's Title" />
            </p>

        <p> Select which social media is active: </p>

    <!-- The checkbox -->
    <p>
        <input class="checkbox" type="checkbox" <?php checked($instance['twitterOnOff'], 'on');?> id="<?php echo $this->get_field_id('twitterOnOff'); ?>" name="<?php echo $this->get_field_name('twitterOnOff'); ?>" />
        <label for="<?php echo $this->get_field_id('twitterOnOff'); ?>">Show Twitter</label>
    </p>
    <p>
        <input class="checkbox" type="checkbox" <?php checked($instance['twitterOnOff1'], 'on');?> id="<?php echo $this->get_field_id('twitterOnOff1'); ?>" name="<?php echo $this->get_field_name('twitterOnOff1'); ?>" />
        <label for="<?php echo $this->get_field_id('twitterOnOff1'); ?>">Show Twitter1</label>
    </p>



        <?php

    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        // The update for the variable of the checkbox
        $instance['twitterOnOff'] = $new_instance['twitterOnOff'];
        $instance['twitterOnOff1'] = $new_instance['twitterOnOff1'];
        return $instance;
        return $instance;
    }
}