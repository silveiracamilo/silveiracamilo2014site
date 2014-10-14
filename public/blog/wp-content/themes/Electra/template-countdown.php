<?php
/*
	Template Name: Countdown
*/
?>
<?php get_header(); ?>
 <div class="countdown_page">
    <?php tt_countdown_title(); ?>
    <ul id="electra_countdown" class="countdown_timer" data-startdate="<?php tt_date_helper('countdown_start'); ?>" data-duedate="<?php tt_date_helper('countdown_end'); ?>">
        <li>
            <span class="countdown_progress days">
                <span class="filled"></span>
            </span>
            <b id="days">00</b>
            <span><?php _e( 'days', 'electra' ); ?></span>
        </li>
        <li>
            <span class="countdown_progress hours">
                <span class="filled"></span>                                        
            </span>
            <b id="hours">00</b>
            <span><?php _e('hours', 'electra'); ?></span>
        </li>
        <li>
            <span class="countdown_progress minutes">
                <span class="filled"></span>                                        
            </span>
            <b id="minutes">00</b>
            <span><?php _e('minutes', 'electra'); ?></span>
        </li>
        <li>
            <span class="countdown_progress seconds">
                <span class="filled"></span>                                        
            </span>
            <b id="seconds">00</b>
            <span><?php _e('seconds', 'electra'); ?></span>
        </li>
    </ul>

    <?php tt_countdown_form(); ?>

    <div class="countdown_text">
        <?php tt_the_loop(); ?>
    </div>

</div>
<?php get_footer(); ?>