<?php

class Electra_tabs_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'electra_tabs_widget',
                'Electra - Tabs',
                array(
                    'description' => __('Tabs with the latest post from specified categories', 'electra'),
                    'classname' => 'electra_tabs_widget tabs',
                )
        );
    }

    function widget($args, $instance) {
        global $electra_tabs;
        if(isset($electra_tabs))
            $electra_tabs++;
        else
            $electra_tabs = 0;
        extract($args);
        $categories = $instance['categories'];

        foreach ($categories as $key => $value) {
            if(!empty($value))
                $categories[$key] = get_category($value);
            else
                unset($categories[$key]);
        }

        $before_widget = str_replace('widget">', '">', $before_widget);
        echo $before_widget;
        if(count($categories)):
        ?>
            <ul class="tab_nav">
                <?php
                $first = true;
                foreach ($categories as $key => $value) {
                    echo '<li'.($first?' class="active"':'').'><a href="#tab-'.$key.'-'.$electra_tabs.'" data-toggle="tab">'.$value->name.'</a></li>';
                    if($first)
                        $first = false;
                }
                ?>
            </ul>
            <div class="clear"></div>
            <div class="tab-content">
                <?php
                $first = true;
                foreach ($categories as $key => $value) {
                    echo '<div class="tab-pane'.($first?' active':'').'" id="tab-'.$key.'-'.$electra_tabs.'">';
                    $args = array(
                        'numberposts' => $instance['number'],
                        'category' => $value->term_id,
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_type' => 'post',
                        'post_status' => 'publish',
                    );
                    $query = get_posts($args);
                    if(count($query))
                        foreach($query as $q){
                            setup_postdata($q);
                            echo '<div class="row-fluid">';
                            if(has_post_thumbnail($q->ID))
                                echo '<div class="span4">
                                        <div class="tab_image"><a href="'.get_permalink($q->ID).'">'.get_the_post_thumbnail($q->ID).'</a></div>
                                    </div>';
                            echo '<div class="span'.(has_post_thumbnail($q->ID)?'8':'12').'">
                                    <div class="tab_title"><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a>
                                    </div>'.get_the_excerpt().'</div>';
                            echo '</div>';
                        }
                    else
                        echo '<p>'.__('No posts.','electra').'</p>';
                    echo '</div>';
                    if($first)
                        $first = false;
                }
                wp_reset_postdata();
                ?>
            </div>
        <?php
        endif;
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $instance['number'] = (int)strip_tags($new_instance['number']);
        $instance['categories'] = $new_instance['categories'];

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('number' => 3, 'categories' => array('')));
        $number = esc_attr($instance['number']);
        $categories = $instance['categories'];
        $cats = get_categories(array('hide_empty'=>0));
        ?>
        <p>
            Select a category for each tab.
        </p>
        <?php foreach ($categories as $value): ?>
            <p class="electra_widget_option electra_widget_tabs">
                <?php $this->electra_option(array('cats'=>$cats,'value'=>$value,'disabled'=>false)); ?>
            </p>
        <?php endforeach; ?>
        <p class="electra_widget_template electra_widget_tabs">
            <?php $this->electra_option(array('cats'=>$cats,'value'=>'','disabled'=>true)); ?>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Max. nr of posts to show:','electra'); ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>
        <?php
    }

    private function electra_option($args){
        ?>
        <select class="widefat" name="<?php echo $this->get_field_name('categories'); ?>[]" <?php disabled($args['disabled']); ?>>
            <?php
            echo '<option value=""> - Choose a category - </option>';
            foreach ($args['cats'] as $c) {
                $option = '<option value="' . $c->cat_ID . '"' . selected($args['value'], $c->cat_ID, false) . '>';
                $option .= $c->cat_name;
                $option .= '</option>';
                echo $option;
            }
            ?>
        </select>
        <button type="button" class="electra_widget_remove">-</button>
        <button type="button" class="electra_widget_add">+</button>
        <?php
    }
}
