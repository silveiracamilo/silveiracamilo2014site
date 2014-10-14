<!-- START SKILLS -->
<div class="skills">
    <h3>/ <?php echo $shortcode['title']; ?> /</h3>
    <?php foreach($slides as $i => $slide): ?>
    <div class="skill_cover">
        <div class="skill"><?php echo $slide['post']->post_content; ?></div>
        <span><?php echo get_the_title($slide['post']->ID); ?></span>
    </div>
    <?php endforeach; ?>
    <div class="clear"></div>
</div>
<!-- END SKILLS -->