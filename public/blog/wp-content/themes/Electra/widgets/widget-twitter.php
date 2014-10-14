<?php

class Electra_twitter_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'electra_twitter_widget',
                'Electra - Twitter',
                array(
                    'description' => __('Displays a list of latest tweets', 'electra'),
                    'classname' => 'electra_twitter_widget',
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

        echo twitter_generate_output($user, $nr, '', array($this, 'tweet_output'),'<ul class="twitter_widget">','</ul>');

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
        $instance = wp_parse_args((array) $instance, array('title' => '', 'user'=>'teslathemes', 'nr'=>3));
        $title = esc_attr($instance['title']);
        $user = esc_attr($instance['user']);
        $nr = $instance['nr'];
        ?>
        <p>
            <label><?php _e('Title:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label> 
            <label><?php _e('Twitter user:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('user'); ?>" type="text" value="<?php echo $user; ?>" /></label> 
            <label for="<?php echo $this->get_field_id('nr'); ?>">
                <?php _e('Number of tweets to show:','electra'); ?>
                <input id="<?php echo $this->get_field_id('nr'); ?>" name="<?php echo $this->get_field_name('nr'); ?>" type="text" value="<?php echo $nr; ?>" size="3" />
            </label>
        </p>
        <p>
            <em>You will also need to set up the Twitter API keys in the theme's options.</em>
        </p>
        <?php
    }

    public function tweet_output($i, $text, $date){
        return '<li>'.$text.'<span>'.$date.'</date></li>';
    }
}
