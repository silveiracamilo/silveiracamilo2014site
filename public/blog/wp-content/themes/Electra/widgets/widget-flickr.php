<?php

class Electra_flickr_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'electra_flickr_widget',
                'Electra - Flickr',
                array(
                    'description' => __('Displays a list of latest photos', 'electra'),
                    'classname' => 'electra_flickr_widget',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
        $user = $instance['user'];
        $nr = $instance['nr'];

        $before_widget = str_replace('widget">', '">', $before_widget);
        echo $before_widget;
        if (!empty($title))
            echo $before_title . $title . $after_title;

        echo '<ul class="flickr_widget" data-userid="'.$user.'" data-items="'.$nr.'">';

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['user'] = $new_instance['user'];
        $instance['nr'] = (int)$new_instance['nr'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'user'=>'97073871@N04', 'nr'=>4));
        $title = esc_attr($instance['title']);
        $user = esc_attr($instance['user']);
        $nr = $instance['nr'];
        ?>
        <p>
            <label><?php _e('Title:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label> 
            <label><?php _e('Flickr id:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" /></label> 
            <label for="<?php echo $this->get_field_id('nr'); ?>">
                <?php _e('Number of photos to show:','electra'); ?>
                <input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
            </label>
        </p>
        <?php
    }
}
