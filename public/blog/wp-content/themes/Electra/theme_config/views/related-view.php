<h3><?php _e('/ Related events /', 'electra') ?></h3>
<div class="row-fluid">
    <?php foreach ($slides as $post): ?>
    <?php
        $categories     = $post['categories'];
        $options        = $post['options'];
        $related        = $post['related'];
        $post           = $post['post'];
        $i = 0;
    ?>  
    <?php foreach($related as $rel_post): ?>
    <?php if($i < 2): ?>
    <?php
        $categories     = $rel_post['categories'];
        $options        = $rel_post['options'];
        $post           = $rel_post['post'];
    ?>
    <div class="span6">
            <div class="event">
                <div class="event_cover"><a href="<?php echo get_permalink($post->ID); ?>">
                    <?php echo sprintf('<img src="%1$s" alt="%2$s" />', $options['cover_image'], $post->title); ?>
                </a></div>
                <div class="event_title">
                    <?php 
                        echo sprintf('<a href="%1$s">%2$s</a> <span>%3$s</span>', get_permalink($post->ID), $post->post_title, date("d.m.Y", strtotime($options['date_event'])));
                    ?>
                </div>
                <?php echo wpautop($post->post_excerpt); ?>
                <?php 
                    if(!empty($post->post_content)) {
                        echo sprintf('<a class="button_white" href="%s">'.__('read more', 'electra').'</a>', get_permalink($post->ID));       
                    }
                ?>
            </div>
        </div>
    <?php $i++; endif; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>
</div>