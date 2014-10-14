<?php

class Electra_contact_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'electra_contact_widget',
                'Electra - Contact',
                array(
                    'description' => __('Displays contact information', 'electra'),
                    'classname' => 'electra_contact_widget',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
        $phone = $instance['phone'];
        $fax = $instance['fax'];
        $email = $instance['email'];
        $address = $instance['address'];

        $before_widget = str_replace('widget">', '">', $before_widget);
        echo $before_widget;
        if (!empty($title))
            echo $before_title . $title . $after_title;

        ?>
        <ul class="contact_widget">
            <li class="phone"><?php echo $phone; ?></li>
            <li class="fax"><?php echo $fax; ?></li>
            <li class="mail"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
            <li class="location"><?php echo $address; ?></li>
        </ul>
        <?php

        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = $new_instance['title'];
        $instance['phone'] = $new_instance['phone'];
        $instance['fax'] = $new_instance['fax'];
        $instance['email'] = $new_instance['email'];
        $instance['address'] = $new_instance['address'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('title' => '', 'phone' => '', 'fax' => '', 'email' => '', 'address' => ''));
        $title = esc_attr($instance['title']);
        $phone = esc_attr($instance['phone']);
        $fax = esc_attr($instance['fax']);
        $email = esc_attr($instance['email']);
        $address = esc_attr($instance['address']);
        ?>
        <p>
            <label><?php _e('Title:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
            <label><?php _e('Phone:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" /></label>
            <label><?php _e('Fax:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo $fax; ?>" /></label>
            <label><?php _e('E-mail:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label>
            <label><?php _e('Address:','electra'); ?><input class="widefat" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" /></label>
        </p>
        <?php
    }
}
