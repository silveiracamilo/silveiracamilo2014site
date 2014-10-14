<?php
/*
	Template Name: Home
*/
?>

<?php global $electra_has_sidebar; ?>
<?php $electra_has_sidebar = tt_use_sidebar(); ?>

<?php get_header(); ?>
</div>
<?php
if ( class_exists('RevSliderFront')) {
    $rvslider = new RevSlider();
    $arrSliders = $rvslider->getArrSliders();
    if(!empty($arrSliders)){
        $electra_has_revslider = tt_meta('alias_slider');
    }
}
?>
<?php if(empty($electra_has_revslider)): ?>
<?php echo Tesla_slider::get_slider_html('electra_main'); ?>
<?php else: ?>
<div class="home_page_slider">
<?php putRevSlider( $electra_has_revslider ) ?>
</div>
<?php endif; ?>
<div class="container">
    <?php if($electra_has_sidebar): ?>
        <div class="row">
            <?php if($electra_has_sidebar===21): ?>
            <div class="span4 main-sidebar">
                <?php dynamic_sidebar('main-sidebar'); ?>
            </div>
            <?php endif; ?>
            <div class="span8">
                <div class="contect_bg">
    <?php endif; ?>
    <?php if(have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endif; ?>
    <?php if($electra_has_sidebar): ?>
                </div>
            </div>
            <?php if($electra_has_sidebar===12): ?>
            <div class="span4 main-sidebar">
                <?php dynamic_sidebar('main-sidebar'); ?>
            </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<div class="container">
<?php get_footer(); ?>