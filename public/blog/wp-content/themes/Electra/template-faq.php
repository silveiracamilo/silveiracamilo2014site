<?php
/*
	Template Name: FAQ
*/
?>
<?php get_header(); ?>
<div class="row">
    <div class="span8">
        <div class="contect_bg">
			<?php echo Tesla_slider::get_slider_html('electra_faq'); ?>
        </div>
    </div>

    <div class="span4 main-sidebar">
         <?php dynamic_sidebar('main-sidebar'); ?>
    </div>
</div>
<?php get_footer(); ?>