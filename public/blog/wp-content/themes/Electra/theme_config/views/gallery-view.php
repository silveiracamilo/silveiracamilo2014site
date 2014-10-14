<?php 
    $side = tt_use_sidebar();

    if($side == 21 || $side == 12) {
        $row = 'row-fluid';
    }
?>
<div class="gallery">

    <?php tt_portfolio_filters('electra_gallery_tax'); ?>

    <div class="<?php echo (!empty($row)) ? $row : 'row' ?>">
    <?php foreach ($slides as $post): ?>
    <?php //var_dump($post); ?>
        <?php
            $categories     = $post['categories'];
            $options        = $post['options'];
            $post           = $post['post'];

            $full = $options['full_image'];

            if(empty($full)) {
                $full = $options['cover_image'];
            }
        ?>
        <?php //var_dump(get_tags($post['post']->ID)); ?>

        <div class="<?php tt_portfolio_switcher(); ?> <?php echo implode(" ", array_keys($categories)) ?>">
        
            <div class="gallery_item">
                <div class="item_hover">
                    <?php echo sprintf('<a href="%1$s" title="%2$s" class="item_zoom swipebox"></a>', $full, $post->post_title); ?>                    
                </div>
                <div class="item_image">
                    <?php echo sprintf('<img src="%1$s" alt="%2$s" />', $options['cover_image'], $post->title); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>