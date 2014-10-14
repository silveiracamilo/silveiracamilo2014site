<?php $slide = $slides[0]; ?>
<div class="blog_ws">
    <div>
    	<p><?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?></p>
    	<h3><?php echo get_the_title($slide['post']->ID); ?></h3>
        <div>
        	<?php echo apply_filters('the_content', $slide['post']->post_content); ?>
        </div>

		<?php tt_share_this(__("Share",'electra')); ?>

    </div>

    <?php if(!empty($slide['related'])): ?>

    <h3><?php _e('related services','electra'); ?></h3>

    <div class="related_services">

    	<?php $keys = array_rand($slide['related'], min(3, count($slide['related']))); ?>

    	<?php $related = $slide['related']; ?>

    	<div class="row-fluid">

	    	<?php foreach($keys as $i): ?>

	            <div class="span4">
                    <img src="<?php echo $related[$i]['options']['related']; ?>" />
	                <h3><a href="<?php echo get_permalink($related[$i]['post']->ID); ?>"><?php echo get_the_title($related[$i]['post']->ID); ?></a></h3>
	                <p><?php echo $related[$i]['post']->post_excerpt; ?></p>
	            </div>

	    	<?php endforeach; ?>

        </div>

    </div>

	<?php endif; ?>

</div>