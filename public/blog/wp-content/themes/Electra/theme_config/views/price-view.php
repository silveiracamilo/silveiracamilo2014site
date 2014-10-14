<?php $max = floor(12/(int)$shortcode['size']); ?>
<div class="row">
	<?php foreach($slides as $i => $slide): ?>
	<?php if($i&&!($i%$max)): ?>
</div>
<div class="row">
	<?php endif; ?>
    <div class="span<?php echo $shortcode['size']; ?>">
        <div class="pricing_table<?php if('2'===$shortcode['style']) echo '_2'; if(in_array('outlined', $slide['options']['outlined'])) echo ' favorite'; ?>">
            <div class="pt_header"><?php echo get_the_title($slide['post']->ID); ?></div>
        	<?php if('2'===$shortcode['style']): ?>
            <a href="<?php echo $slide['link']; ?>" class="pt_button"><?php _e('buy', 'electra'); ?></a>
        	<?php endif; ?>
            <div class="pt_price"><?php echo $slide['options']['price']; ?></div>
            <?php if(count($slide['options']['features'])): ?>
            <ul class="pt_data">
            	<?php foreach($slide['options']['features'] as $feature): ?>
                <li><?php echo $feature; ?></li>
            	<?php endforeach; ?>
            </ul>
        	<?php endif; ?>
        	<?php if('1'===$shortcode['style']): ?>
            <a href="<?php echo $slide['link']; ?>" class="pt_button"><?php _e('buy', 'electra'); ?></a>
        	<?php endif; ?>
        </div>
    </div>
	<?php endforeach; ?>
</div>