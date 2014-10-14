<?php

class Electra_ads_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'electra_ads_widget',
                'Electra - Ads',
                array(
                    'description' => __('Displays a list of ads', 'electra'),
                    'classname' => 'electra_ads_widget',
                )
        );
    }

    function widget($args, $instance) {
        extract($args);
        $ads = $instance['ads'];

        echo $before_widget;
        $n = count($ads);
        if($n):
            $n--;
            foreach ($ads as $i => $value):
                if(!($i%2))
                    echo '<div class="row-fluid">';
                echo '<div class="span6"><a href="'.$value['url'].'"><img src="'.$value['image'].'" alt="ads" /></a></div>';
                if($i%2||!($n-$i))
                    echo '</div>';
            endforeach;
        endif;
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        $instance = array();
        $images = $new_instance['image'];
        $urls = $new_instance['url'];
        $ads = array();
        foreach ($images as $key => $value) {
            $ads[$key] = array('image'=>$value,'url'=>$urls[$key]);
        }
        $instance['ads'] = $ads;

        return $instance;
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array('ads' => array(array('image'=>'','url'=>''))));
        $ads = $instance['ads'];
        ?>
        <p>
            Set the image and url for each ad.
        </p>
        <?php foreach ($ads as $value): ?>
            <p class="electra_widget_option electra_widget_ads">
                <?php $this->electra_option(array('url'=>$value['url'],'image'=>$value['image'],'disabled'=>false)); ?>
            </p>
        <?php endforeach; ?>
        <p class="electra_widget_template electra_widget_ads">
            <?php $this->electra_option(array('url'=>'','image'=>'','disabled'=>true)); ?>
        </p>
        <?php
    }

    private function electra_option($args){
        if(empty($args['image']))
            $args['image'] = get_template_directory_uri().'/images/elements/ads_image.png';
        ?>
        <label><?php _e('Image:','electra'); ?><br/>
            <img src="<?php echo $args['image']; ?>" />
        </label>
        <br/>
        <label><?php _e('URL:','electra'); ?><br/>
            <input name="<?php echo $this->get_field_name('url'); ?>[]" type="text" value="<?php echo $args['url']; ?>" <?php disabled($args['disabled']); ?> />
        </label>
        <input name="<?php echo $this->get_field_name('image'); ?>[]" type="hidden" value="<?php echo $args['image']; ?>" <?php disabled($args['disabled']); ?> />
        <br/>
        <button type="button" class="electra_widget_remove">-</button>
        <button type="button" class="electra_widget_add">+</button>
        <?php
    }
}
