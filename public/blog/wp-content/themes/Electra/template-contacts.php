<?php
/*
	Template Name: Contact
*/
?>
<?php get_header(); ?>
<div class="row">
<div class="span7">
    <?php tt_option_check('map_title', '<h3>%s</h3>'); ?>    
    <?php tt_gmap('contact_map','map','map'); ?>
</div>
<div class="span5">
    <?php tt_option_check('contact_info_title', '<h3>%s</h3>'); ?>    
    <?php tt_contact_info(); ?>
    <?php tt_contact_form(); ?>
</div>
</div>
<?php get_footer(); ?>