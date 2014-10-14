<?php
/*
	Template Name: Portfolio
*/
?>
<?php get_header(); ?>
<?php 
	
?>
	<?php 
		if(tt_use_sidebar() == 12) {
			?>
				<div class="row">
					<div class="span8">
						<div class="contect_bg">
							<?php echo Tesla_slider::get_slider_html('electra_portfolio', tt_portfolio_pagination()); ?>
						</div><br>
						<?php if(tt_pagination('electra_portfolio')): ?>
							<div class="pagination-box">
								<?php tt_pagination('electra_portfolio'); ?>			
							</div>
						<?php endif; ?>
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
							<?php echo Tesla_slider::get_slider_html('electra_portfolio', tt_portfolio_pagination()); ?>
						</div><br>
						<?php if(tt_pagination('electra_portfolio')): ?>
							<div class="pagination-box">
								<?php tt_pagination('electra_portfolio'); ?>			
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php
		}else {
			echo Tesla_slider::get_slider_html('electra_portfolio', tt_portfolio_pagination());
			if(tt_pagination('electra_portfolio')):
				?><div class="pagination-box"><?php
					tt_pagination('electra_portfolio'); ?>			
				</div><?php
			endif;
		}
	?>
<?php get_footer(); ?>