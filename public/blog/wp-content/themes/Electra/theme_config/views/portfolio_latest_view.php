<div class="container">
    <h1 class="headline"><?php echo $shortcode['title'] ?></h1>
    <div class="image_grid">

        <ul class="image_box_loops">
            <?php foreach ($slides as $slide_nr => $slide) : ?>
                <li>
                    <a href="<?php echo get_permalink($slide['post']->ID); ?>">
                        <div class="image_box active">
                            <div class="image_box_hover<?php if($slide_nr % 2 == 0) echo ' hover_2'?>">
                                <h4><?php echo implode(' ', array_keys($slide['categories'])); ?></h4>
                                <p><?php echo get_the_title($slide['post']->ID); ?></p>
                            </div> 
                            <div class="image_box_img">
                                <span class="image_hover_effect"></span>
                                <img src="<?php echo $slide['options']['image']; ?>" alt="work" />
                            </div>                                           
                        </div>
                    </a>
                </li>
                <?php
                    $nr = $slide_nr +1;
                    $separator = "res_1";
                    $separator .= ($nr % 3 == 0)? " res_2" : '';
                    $separator .= ($nr % 5 == 0)? " res_3" : '';
                    $separator .= ($nr % 9 == 0)? " res_5" : '';

                 ?>
                <li class="<?php echo $separator ?>"><div class="image_box_space"></div></li>
            <?php endforeach; ?>
        </ul>
        <br/>
        <br/>
        <div class="clear"></div>
    </div>
</div>