<?php get_header(); ?>
<?php tt_the_loop(false, 'portfolio-item'); ?>
<?php echo electra_recent_works(array()); ?>
<?php get_footer(); ?>