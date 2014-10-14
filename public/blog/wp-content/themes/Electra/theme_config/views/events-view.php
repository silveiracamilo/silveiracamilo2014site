<?php 
    $side = tt_use_sidebar();

    if($side == 21 || $side == 12) {
        $row = 'row-fluid';
    }
?>
<div class="events">
    <?php tt_portfolio_filters('electra_events_tax'); ?>

    <div class="<?php echo (!empty($row)) ? $row : 'row' ?>">
        <?php foreach ($slides as $post): ?>
            <?php
                $categories     = $post['categories'];
                $options        = $post['options'];
                $post           = $post['post'];
                //var_dump($options);
            ?>                                          
            <div class="<?php tt_portfolio_switcher(); ?> <?php echo implode(" ", array_keys($categories)) ?>">
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
        <?php endforeach; ?>
    </div>
</div>