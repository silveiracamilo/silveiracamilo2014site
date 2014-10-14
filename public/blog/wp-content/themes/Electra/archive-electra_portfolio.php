<?php get_header(); ?>
	<?php $portfoilo_switcher = tt_meta('portfolio_view'); ?>
	<?php 
		if($portfoilo_switcher == 12) {
			?>
				<div class="row">
					<div class="span8">
						<div class="contect_bg">
							<?php echo Tesla_slider::get_slider_html('electra_portfolio'); ?>
						</div>
					</div>

					<div class="span4 main-sidebar">
						<?php dynamic_sidebar('main-sidebar'); ?>
					</div>
				</div>
			<?php
		} else if($portfoilo_switcher == 21) {
			?>
				<div class="row">
					<div class="span4 main-sidebar">
						<?php dynamic_sidebar('main-sidebar'); ?>
					</div>
					<div class="span8">
						<div class="contect_bg">
							<?php echo Tesla_slider::get_slider_html('electra_portfolio'); ?>
						</div>
					</div>
				</div>
			<?php
		}else {
			echo Tesla_slider::get_slider_html('electra_portfolio');
		}
	?>
<?php get_footer(); ?>