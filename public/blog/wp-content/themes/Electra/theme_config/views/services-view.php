<!-- START SERVICES -->
<?php if($shortcode['nr']) $slides = array_slice($slides, 0, (int)$shortcode['nr']); ?>
<div class="services">
    <h3>/ <?php echo $shortcode['title']; ?> /</h3>
    <?php
    foreach($slides as $i => $slide):
    if(!($i%3)):
        if($i)
            echo '</div>';
        echo '<div class="row-fluid">';
    endif;
    ?>
        <div class="span4">
            <div class="service">
                <span class="service_activ"></span>
                <div class="service_icon">
                    <img src="<?php echo $slide['options']['icon']; ?>" alt="serrvice" />
                </div>
                <?php if($shortcode['no_links']==='false'||!$shortcode['no_links']): ?>
                    <a href="<?php echo get_permalink($slide['post']->ID); ?>"><span><?php echo get_the_title($slide['post']->ID); ?></span></a>
                <?php else: ?>
                    <span><?php echo get_the_title($slide['post']->ID); ?></span>
                <?php endif; ?>
                <p><?php echo $slide['post']->post_excerpt; ?></p>
            </div>                                
        </div>
    <?php
    endforeach;
    echo '</div>';
    ?>  
</div>
<!-- END SERVICES -->