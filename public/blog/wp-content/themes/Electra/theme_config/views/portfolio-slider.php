<div class="slider">
    <div class="rs_mainslider">
        <ul class="rs_mainslider_items">
        <?php foreach ($slides as $post): ?>
            <?php
                $categories     = $post['categories'];
                $options        = $post['options'];
                $post           = $post['post'];

                //var_dump($post);


                if(!empty($options['image_slider'])) {
                    foreach ($options['image_slider'] as $i => $option) {
                        if($i == 0){
                            echo sprintf('<li class="rs_mainslider_items_active"><img class="rs_mainslider_items_image" src="%1$s" alt="%2$s" /></li>', $option, $post->post_name);
                        }else {
                            echo sprintf('<li><img class="rs_mainslider_items_image" src="%1$s" alt="%2$s" /></li>', $option, $post->post_name);
                        }                    
                    }
                }

            ?>
        <?php endforeach; ?>
        </ul>
        <div class="rs_mainslider_left_container rs_center_vertical_container">
            <div class="rs_mainslider_left rs_center_vertical"></div>
        </div>
        <div class="rs_mainslider_right_container rs_center_vertical_container">
            <div class="rs_mainslider_right rs_center_vertical"></div>
        </div>
        <div class="rs_mainslider_dots_container rs_center_horizontal_container">
            <ul class="rs_mainslider_dots rs_center_horizontal">
            </ul>
        </div>
    </div>
</div>