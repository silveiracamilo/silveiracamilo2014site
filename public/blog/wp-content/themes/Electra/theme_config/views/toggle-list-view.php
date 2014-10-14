<!-- START ACCORDION -->
<?php
global $electra_toggle_list;
if(isset($electra_toggle_list))
    $electra_toggle_list++;
else
    $electra_toggle_list = 0;
?>
<h3>/ <?php echo $shortcode['title']; ?> ? /</h3>
<div id="accordion-<?php echo $electra_toggle_list; ?>" class="accordion_v2">
    <?php foreach($slides as $i => $slide): ?>
    <div class="accordion-group">
        <div class="accordion-heading<?php echo !$i?' active':''; ?>">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-<?php echo $electra_toggle_list; ?>" href="#content-<?php echo $i.'-'.$electra_toggle_list; ?>">
                <span><?php echo get_the_title($slide['post']->ID); ?></span>
            </a>
        </div>
        <div id="content-<?php echo $i.'-'.$electra_toggle_list; ?>" class="accordion-body collapse<?php echo !$i?' in':''; ?>">
            <div class="accordion-inner"><?php echo $slide['post']->post_content; ?></div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<!-- END ACCORDION -->