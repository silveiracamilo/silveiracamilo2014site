<?php
/*
	Template Name: Events
*/
?>
<?php get_header(); ?>

	<?php 
		if(tt_use_sidebar() == 12) {
			?>
				<div class="row">
					<div class="span8">
						<div class="contect_bg">
							<?php echo Tesla_slider::get_slider_html('electra_events', tt_portfolio_pagination()); ?>
						</div><br>
						<?php tt_pagination('electra_events'); ?>			
					</div>

					<div class="span4 main-sidebar">
						<?php dynamic_sidebar('main-sidebar'); ?>
					</div>
				</div>
			<?php
		} else if(tt_use_sidebar() == 21) {
			?>
				<div class="row">
					<div class="span4 main-sidebar">
						<?php dynamic_sidebar('main-sidebar'); ?>
					</div>

					<div class="span8">
						<div class="contect_bg">
							<?php echo Tesla_slider::get_slider_html('electra_events', tt_portfolio_pagination()); ?>
						</div><br>
						<?php tt_pagination('electra_events'); ?>
					</div>
				</div>
			<?php
		}else {
			echo Tesla_slider::get_slider_html('electra_events', tt_portfolio_pagination());
			tt_pagination('electra_gallery');			
		}
	?>
<?php get_footer(); ?>