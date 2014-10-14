<div class="our_partners slide_content">
        <h1 class="headline"><?php echo $shortcode['title'] ?></h1>
        <ul class="our_partners_scroll">
            <li><a class="scroll_left slide_nav_back" href="#"></a></li>
            <li><a class="scroll_right slide_nav_next" href="#"></a></li>
        </ul>
        <div class="clear"></div>
        <div class="row slide_content_show">
            <div class="slide_content_full">
                <?php foreach ($slides as $slide_nr => $slide) : ?>
                    <div class="span3"><a href="<?php echo $slide['options']['link']; ?>" target="_blank"><img src="<?php echo $slide['options']['image']; ?>" alt="partners" /></a></div>
                <?php endforeach; ?>
            </div>
        </div>
</div>