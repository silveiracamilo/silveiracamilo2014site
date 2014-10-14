<?php

class Electra_subscription_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'electra_subscription_widget',
                'Electra - Subscription',
                array(
                    'description' => __('Displays a form for e-mail subscription', 'electra'),
                    'classname' => 'electra_subscription_widget',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

        echo $before_widget;
        if (!empty($title))
            echo $before_title . $title . $after_title;

        ?>
        <form id="newsletter" class="newsletter_widget subscribe-form" method="post" action="" data-tt-subscription>
            <input type="submit" value="" class="newsletter_button" />
            <input type="text" name="email" placeholder="<?php _e('Enter e-mail adress','electra'); ?>" class="newsletter_line" data-tt-subscription-required data-tt-subscription-type="email" />
            <div id="result_container"></div>
        </form>
        <?php

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => ''));
        $title = esc_attr($instance['title']);
        ?>
        <p>
            <label><?php _e('Title:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
        </p>
        <?php
    }
}
