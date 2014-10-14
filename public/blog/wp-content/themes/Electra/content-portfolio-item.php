<div id="post-<?php the_ID(); ?>" <?php post_class('single_portfolio'); ?>>
    <div class="project_info">
        <?php tt_prev_next(); ?>
        <?php if ( is_single() ) : ?>
            <h3><?php tt_empty_title(); ?></h3>
        <?php endif; ?>
        <?php tt_options('short_description', '<p>%s</p>'); ?>
    </div>

    <div class="row">
        <div class="span7">
            <div class="project_img">
                <!--  =====  START SLIDER  =====  -->
                <?php echo Tesla_slider::get_slider_html('electra_portfolio', array('post_id'=> get_the_ID(), 'output_id'=>'slider_port')); ?>
                <!--  =====  END SLIDER  =====  -->
            </div>
        </div>
        <div class="span5">
            <h3>Details</h3>
            <ul class="project_details">
                <li><span><?php _e('Name :', tt_domain_theme()) ?></span> <?php tt_author_link(); ?></li>
                <?php if( has_term( '', 'electra_portfolio_tax' )): ?>
                <li><span><?php _e('Category :', tt_domain_theme()) ?></span> <?php tt_term('electra_portfolio_tax'); ?></li>
                <?php endif; ?>
                <li><span><?php _e('Date :', tt_domain_theme()) ?></span> <?php the_time( "d.m.Y" ); ?></li>
                <?php if(has_tag()): ?>
                <li><span><?php _e('Tags :', tt_domain_theme()); ?></span><?php tt_post_tags(' ', ' , ', ' '); ?></li>
                <?php endif; ?>
            </ul>

            <h3>Description</h3>
            <?php the_content(); ?>
            <?php tt_share_this(__("Share",'electra')); ?>
        </div>
    </div>
</div>