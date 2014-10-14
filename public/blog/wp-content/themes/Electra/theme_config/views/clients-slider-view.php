<!-- START CLIENTS -->
<div class="clients">
    <h3>/ <?php echo $shortcode['title']; ?> /</h3>
    <div class="clients_box">
        <ul class="r_p_a">
            <li><a class="test_left" href="#"></a></li>
            <li><a class="test_right" href="#"></a></li>
        </ul>

        <div class="clients-box row">
            <ul class="client_box" data-num-items="6">
                <?php foreach($slides as $i => $slide): ?>
                <li class="span2"><a href="<?php echo $slide['post']->post_content!==''?$slide['post']->post_content:'#'; ?>"><?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>                            

    </div>
</div>
<!-- END CLIENTS -->