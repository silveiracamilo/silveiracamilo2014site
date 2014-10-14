<div class="row">
    <div class="span8">
        <div class="contect_bg">
            <div class="events_s">
                <div class="event">
                    <div class="event_cover">
                        <?php echo Tesla_slider::get_slider_html('electra_portfolio', array('post_id'=> get_the_ID(), 'output_id'=>'slider_port')); ?>
                    </div>
                    <div class="project_info">
                        <?php tt_prev_next(); ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="event_title">
                        <?php if ( is_single() ) : ?>
                            <?php tt_empty_title(); ?>
                        <?php endif; ?>
                        <span>
                        <?php echo date("d.m.Y", strtotime(tt_options('date_event', '', true))); ?>
                        </span>
                    </div>
                    <?php the_content(); ?>
                </div>

                <?php tt_share_this("Share"); ?>

               <?php echo Tesla_slider::get_slider_html('electra_events',array('post_id'=> get_the_ID(), 'output_id'=>'related_items')); ?>

            </div>
        </div>
    </div>

    <div class="span4 main-sidebar">
        <?php dynamic_sidebar('main-sidebar'); ?>
    </div>
</div>