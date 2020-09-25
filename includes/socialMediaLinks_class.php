<?php
/**
 * Adds SocialMediaLinks widget.
 */

class SocialMediaLinks_Widget extends WP_Widget
{
    private $title = "meh";
    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {

        parent::__construct(
            'sml_widget', // Base ID
            esc_html__('Social Media Links', 'sml_domain'), // Name
            array('description' => esc_html__('Widget to display Social Media Links', 'sml_domain')) // Args
        );

    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */

    public function widget($args, $instance)
    {
        echo $args['before_widget']; // Whatever you want to display before widget (<div>, etc)

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Widget Content Output
        echo '<a href="' . $instance['channel_url'] . '" class="twitter-follow-button" data-size="' . $instance['size'] . '" data-show-count="' . $instance['count'] . '">Follow ' . $instance['channel_name'] . '</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
        echo '<div class="fb-like" data-href="https://www.facebook.com/TESLAOFFICIAL/" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="LKJzaICu"></script>';

        echo $args['after_widget']; // Whatever you want to display after widget (</div>, etc)
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */

    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Checkout our social media', 'sml_domain');

        $channel_name = !empty($instance['channel_name']) ? $instance['channel_name'] : esc_html__('', 'sml_domain');
        $channel_url = !empty($instance['channel_url']) ? $instance['channel_url'] : esc_html__('', 'sml_domain');

        $size = !empty($instance['size']) ? $instance['size'] : esc_html__('default', 'sml_domain');

        $count = !empty($instance['count']) ? $instance['count'] : esc_html__('default', 'sml_domain');

        ?>



      <!-- TITLE -->
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
          <?php esc_attr_e('Title:', 'sml_domain');?>
        </label>

        <input
          class="widefat"
          id="<?php echo esc_attr($this->get_field_id('title')); ?>"
          name="<?php echo esc_attr($this->get_field_name('title')); ?>"
          type="text"
          value="<?php echo esc_attr($title); ?>">
      </p>

      <!-- CHANNEL NAME -->
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('channel_name')); ?>">
          <?php esc_attr_e('Channel Name:', 'sml_domain');?>
        </label>

        <input
          class="widefat"
          id="<?php echo esc_attr($this->get_field_id('channel_name')); ?>"
          name="<?php echo esc_attr($this->get_field_name('channel_name')); ?>"
          type="text"
          value="<?php echo esc_attr($channel_name); ?>">
      </p>
        <!-- CHANNEL URL -->
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('channel_url')); ?>">
          <?php esc_attr_e('Channel URL:', 'sml_domain');?>
        </label>

        <input
          class="widefat"
          id="<?php echo esc_attr($this->get_field_id('channel_url')); ?>"
          name="<?php echo esc_attr($this->get_field_name('channel_url')); ?>"
          type="text"
          value="<?php echo esc_attr($channel_url); ?>">
      </p>


      <!-- SIZE -->
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('size')); ?>">
          <?php esc_attr_e('Size:', 'sml_domain');?>
        </label>

        <select
          class="widefat"
          id="<?php echo esc_attr($this->get_field_id('size')); ?>"
          name="<?php echo esc_attr($this->get_field_name('size')); ?>">
          <option value="default" <?php echo ($size == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="large" <?php echo ($size == 'large') ? 'selected' : ''; ?>>
            Large
          </option>

        </select>
      </p>

      <!-- SHOW COUNT -->
      <p>
        <label for="<?php echo esc_attr($this->get_field_id('count')); ?>">
          <?php esc_attr_e('Show Count:', 'sml_domain');?>
        </label>

        <select
          class="widefat"
          id="<?php echo esc_attr($this->get_field_id('count')); ?>"
          name="<?php echo esc_attr($this->get_field_name('count')); ?>">
          <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="false" <?php echo ($count == 'false') ? 'selected' : ''; ?>>
            Hidden
          </option>
        </select>
      </p>

      <p>Display some text when the checkbox is checked:</p>

        <label for="myCheck">Checkbox:</label>
        <input type="checkbox" id="myCheck" onclick="myFunction()">

        <p id="text" style="display:none">Checkbox is CHECKED!</p>

        <script type="application/javascript">
            function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
            }
        </script>

      <?php

    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        $instance['channel_name'] = (!empty($new_instance['channel_name'])) ? strip_tags($new_instance['channel_name']) : '';

        $instance['channel_url'] = (!empty($new_instance['channel_url'])) ? strip_tags($new_instance['channel_url']) : '';

        $instance['size'] = (!empty($new_instance['size'])) ? strip_tags($new_instance['size']) : '';

        $instance['count'] = (!empty($new_instance['count'])) ? strip_tags($new_instance['count']) : '';

        return $instance;
    }

    public function printe()
    {
        echo $this->$instance['title'];
    }

}
