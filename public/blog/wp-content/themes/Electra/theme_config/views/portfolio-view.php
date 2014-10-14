<?php 
    $side = tt_use_sidebar();

    if($side == 21 || $side == 12) {
        $row = 'row-fluid';
    }
?>
<div class="portfolio">

    <?php tt_portfolio_filters('electra_portfolio_tax'); ?>

    <div class="<?php echo (!empty($row)) ? $row : 'row' ?>">
    <?php foreach ($slides as $post): ?>
    <?php //var_dump($post); ?>
        <?php
            $categories     = $post['categories'];
            $options        = $post['options'];
            $post           = $post['post'];
        ?>
        <?php //var_dump(get_tags($post['post']->ID)); ?>

        <div class="<?php tt_portfolio_switcher(); ?> <?php echo implode(" ", array_keys($categories)) ?>">
        
            <div class="portfolio_item">
                <div class="item_hover">
                    <?php
                        if(!empty($post->post_title)) {
                            echo sprintf('<div class="item_title">%s</div>', $post->post_title);
                        }
                    ?>
                    <ul class="item_tags">
                        <?php foreach ($categories as $key => $value) : ?>
                            <?php echo sprintf('<li><a href="%1$s">%2$s</a></li>', get_term_link($key, 'electra_portfolio_tax'), ucfirst($value)) ?>
                        <?php endforeach; ?>
                    </ul>
                    <?php echo sprintf('<a href="%s" class="button_color">'.__('View', tt_domain_theme()).'</a>', get_permalink($post->ID)); ?>
                    
                </div>
                <div class="item_image">
                    <?php echo sprintf('<img src="%1$s" alt="%2$s" />', $options['cover_image'], $post->title); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>