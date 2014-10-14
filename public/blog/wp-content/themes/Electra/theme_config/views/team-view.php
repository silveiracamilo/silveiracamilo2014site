<!-- START TEAM -->
<?php
global $electra_has_sidebar;
$wide = ('false'===$shortcode['wide']?false:(bool)$shortcode['wide'])&&!$electra_has_sidebar;
?>
<?php if($wide): ?></div><?php endif; ?>
<div class="our_team team_bg"<?php if($wide): ?> style="background: <?php echo $shortcode['background']; ?>;"<?php endif; ?>>
    <?php if($wide): ?><div class="container"><?php endif; ?>
        <h3>/ <?php echo $shortcode['title']; ?> /</h3>

        <?php if(count($slides)): $slide = $slides[0]; ?>

        <div class="single_team">
            <div class="row-fluid">
                <div class="span4">
                    <div class="single_team_cover"><?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?></div>
                </div>
                <div class="span8">
                    <div class="single_team_title"><?php echo get_the_title($slide['post']->ID); ?> <span><?php echo $slide['options']['position']; ?></span></div>
                    <?php echo apply_filters('the_content', $slide['post']->post_content); ?>

                    <?php if(count($slide['options']['social'])): ?>

                    <ul class="socials">

                    <?php foreach($slide['options']['social'] as $social): $social_type = key($social); $social_data = current($social); ?>

                        <?php if($social_type!=='custom'): ?>

                        <li><a href="<?php echo $social_data; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/socials/<?php echo $social_type; ?>.png" alt="<?php echo $social_type; ?>" title="<?php echo $social_type; ?>" /></a></li>

                        <?php else: ?>

                        <li><a href="<?php echo $social_data['url']; ?>"><img src="<?php echo $social_data['icon']; ?>" /></a></li>

                        <?php endif; ?>

                    <?php endforeach; ?>

                    </ul>

                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="all_team">
            <div class="row-fluid">

        <?php foreach($slides as $i => $slide): ?>

            <?php if($i&&!($i%6)): ?>
            </div>
            <div class="row-fluid">
            <?php endif; ?>

                <div class="span2">
                    <a href="#"><?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?></a>
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="single_team_cover"><?php echo get_the_post_thumbnail($slide['post']->ID, 'full'); ?></div>
                        </div>
                        <div class="span8">
                            <div class="single_team_title"><?php echo get_the_title($slide['post']->ID); ?> <span><?php echo $slide['options']['position']; ?></span></div>
                            <?php echo apply_filters('the_content', $slide['post']->post_content); ?>
                            <ul class="socials">

                                <?php foreach($slide['options']['social'] as $social): $social_type = key($social); $social_data = current($social); ?>

                                    <?php if($social_type!=='custom'): ?>

                                    <li><a href="<?php echo $social_data; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/socials/<?php echo $social_type; ?>.png" alt="<?php echo $social_type; ?>" title="<?php echo $social_type; ?>" /></a></li>

                                    <?php else: ?>

                                    <li><a href="<?php echo $social_data['url']; ?>"><img src="<?php echo $social_data['icon']; ?>" /></a></li>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </ul>
                        </div>
                    </div>
                </div>

        <?php endforeach; ?>

            </div>
        </div>

        <?php endif ?>

    <?php if($wide): ?></div><?php endif; ?>
</div>
<?php if($wide): ?><div class="container"><?php endif; ?>
<!-- END TEAM -->