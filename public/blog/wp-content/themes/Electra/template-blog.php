<?php
/*
	Template Name: Blog
*/
?>
<?php get_header(); ?>
<?php 
	$args = array(
		'post_type'    		=> 'post',
		'post_status'  		=> 'publish',
		'paged'        		=>  (get_query_var('paged')) ? get_query_var('paged') : 1
	);

?>
<?php if(tt_masonry_blog()): ?>

<div class="blog_m">
    <div class="row">
		<?php tt_the_loop($args, 'masonry-blog'); ?>
    </div>
	<?php tt_pagination(); ?>
</div>
<?php else : ?>	
<div class="row">
	<?php if(tt_use_sidebar() == 12): ?>

		<div class="span7">
			<?php tt_the_loop($args); ?>
			<?php tt_pagination(); ?>
		</div>

		<div class="span4 offset1 main-sidebar">
			<?php dynamic_sidebar('main-sidebar'); ?>
		</div>

	<?php elseif(tt_use_sidebar() == 21): ?>

		<div class="span4 main-sidebar">
			<?php dynamic_sidebar('main-sidebar'); ?>
		</div>
		<div class="span7 offset1">
			<?php tt_the_loop($args); ?>
			<?php tt_pagination(); ?>			
			</div>
		</div>

	<?php else: ?>

		<div class="span12">
			<div class="blog_fw">
				<?php tt_the_loop($args, 'full-blog'); ?>
			</div>
			<?php tt_pagination(); ?>
		</div>

	<?php endif; ?>
</div>
<?php endif; ?>


<?php get_footer(); ?>