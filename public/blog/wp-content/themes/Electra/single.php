<?php get_header(); ?>

<?php $check = tt_single_switcher(wp_get_referer()); ?>
<?php if(!empty($check)): ?>
<div class="row">
    <div class="span12">
    	<?php tt_the_loop(); ?>
    	<?php comments_template(); ?> 
    </div>
</div>
<?php else: ?>
<div class="row">
    <div class="span7">
    	<?php tt_the_loop(); ?>
    	<?php comments_template(); ?> 
    </div>

    <div class="span4 offset1 main-sidebar">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php endif; ?>

<?php get_footer(); ?>