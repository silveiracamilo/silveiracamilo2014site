<?php get_header(); ?>
<div class="row">
	<div class="span7">
		<?php tt_the_loop(); ?>
		<div class="pagination-box">
			<?php tt_pagination(); ?>			
		</div>
	</div>
	
	<div class="span4 offset1 main-sidebar">
		<?php dynamic_sidebar('main-sidebar'); ?>
	</div>
</div>
<?php get_footer(); ?>