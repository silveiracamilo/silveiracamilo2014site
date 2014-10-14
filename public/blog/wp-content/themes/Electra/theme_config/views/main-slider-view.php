<!--  =====  START SLIDER  =====  -->
<div class="slider">
    <div class="rs_mainslider">
        <ul class="rs_mainslider_items">
        	<?php
        	$first = true;
        	foreach($slides as $slide):
    		?>
            <li class="<?php echo $first?'rs_mainslider_items_active':''; ?>">
            	<?php echo get_the_post_thumbnail($slide['post']->ID, 'full', array('class'=>'rs_mainslider_items_image')); ?>
                <div class="rs_mainslider_items_text">
                	<?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                </div>
            </li>
        	<?php
        	if($first)
        		$first = false;
        	endforeach;
        	?>
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
<!--  =====  END SLIDER  =====  -->