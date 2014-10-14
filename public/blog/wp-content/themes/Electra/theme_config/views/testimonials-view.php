<!-- START TESTIMONIALS -->
<ul class="testimonials clearfix">
    <li class="testimonials_title"><?php echo $shortcode['title']; ?></li>
    <li class="arrows_wrapper">
        <ul class="r_p_a">
            <li><a class="test_left arrow" data-trigger="prev" href="#"></a></li>
            <li><a class="test_right arrow" data-trigger="next" href="#"></a></li>
        </ul>
    </li>
    <?php foreach($slides as $i => $slide): ?>
    <li class="testimonial-item<?php echo !$i?' active':''; ?>">
        <span class="avatar"><?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?></span>
        <span class="testimonial_info"><?php echo get_the_title($slide['post']->ID); ?> <span><?php echo get_the_time('d.m.Y',$slide['post']->ID); ?></span></span>
        <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
    </li>
    <?php endforeach; ?>
</ul>
<!-- END TESTIMONIALS -->