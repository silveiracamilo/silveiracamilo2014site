<?php get_header(); ?>

<?php global $electra_has_sidebar; ?>
<?php $electra_has_sidebar = tt_use_sidebar(); ?>

<?php if($electra_has_sidebar): ?>

<div class="row">

	<?php if($electra_has_sidebar===21): ?>
	<div class="span4 main-sidebar">
		<?php dynamic_sidebar('main-sidebar'); ?>
	</div>
	<?php endif; ?>

	<div class="span<?php echo ($electra_has_sidebar?'7':'12').($electra_has_sidebar===21?' offset1':''); ?>">

<?php endif; ?>

		<?php //tt_the_loop(); ?>
		<?php while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>

		<div class="pagination-box">
			<?php tt_pagination(); ?>
		</div>

<?php if($electra_has_sidebar): ?>

	</div>

	<?php if($electra_has_sidebar===12): ?>
	<div class="span4 offset1 main-sidebar">
		<?php dynamic_sidebar('main-sidebar'); ?>
	</div>
	<?php endif; ?>

</div>

<?php endif; ?>

<?php get_footer(); ?>