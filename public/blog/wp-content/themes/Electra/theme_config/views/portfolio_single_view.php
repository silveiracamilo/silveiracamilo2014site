<?php $slide = $slides[0]; ?>
<div class="container">
    <h1 class="headline"><?php echo get_the_title($slide['post']->ID); ?></h1>

    <div class="project">
        <div class="row">
            <div class="span7">
                <div class="project_image">
                    <img src="<?php echo $slide['options']['image'] ?>" alt="project" />
                </div>                        
            </div>
            <div class="span5">
                <div class="project_sidebar">
                    <h3><?php echo get_the_title($slide['post']->ID); ?></h3>
                    <h4><?php echo $slide['options']['date']; ?></h4>
                    <p><?php echo $slide['options']['description']; ?></p>

                    <ul class="project_details">
                        <li><span><?php echo implode(', ', array_values($slide['categories'])); ?></span>Category</li>
                        <li><span><?php echo $slide['options']['client'] ?></span>Client</li>                                    
                        <li><span><?php echo $slide['options']['budget'] ?></span>Budget</li>
                        <li><span><?php echo $slide['options']['time'] ?></span>Time</li>
                    </ul>
                    
                    <div class="project_image_more slide_content">
                        <ul class="project_image_arrows">
                            <li><a class="scroll_left slide_nav_back" href="#"></a></li> 
                            <li><a class="scroll_right slide_nav_next" href="#"></a></li> 
                        </ul>
                        <div class="clear"></div>
                        <div class="row slide_content_show">
                            <div class="slide_content_full">
                                <?php foreach($slide['options']['image_slider'] as $image) : ?>
                                    <div class="span4">
                                        <div class="hover">
                                            <span class="hover_effect"></span>
                                            <img src="<?php echo $image; ?>" alt="photo" />
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>


                    <div class="share">
                        Share
                        <ul class="share_icons">
                            <li><a href="#"><img src="images/social/facebook.png" alt="facebok" /></a></li>
                            <li><a href="#"><img src="images/social/twitter.png" alt="facebok" /></a></li>
                            <li><a href="#"><img src="images/social/googleplus.png" alt="facebok" /></a></li>
                            <li><a href="#"><img src="images/social/linkedin.png" alt="facebok" /></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>