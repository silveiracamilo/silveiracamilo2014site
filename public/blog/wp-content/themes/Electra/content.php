<div id="post-<?php the_ID(); ?>" <?php post_class('blog_ws'); ?>>
    <div class="blog_article">

        <?php tt_video_or_image_featured(); ?>

        <div class="entry-header">
             <?php if ( is_single() ) : ?>
                <h3><?php tt_empty_title(); ?></h3>
            <?php else : ?>
                <h3>
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php tt_empty_title(); ?></a>
                </h3>
            <?php endif; // is_single() ?>
        </div>

        <div class="entry-footer">
            <ul>
                <li><?php tt_author_link(); ?></li>
                <li><span class="blog_icon_3"><?php the_time( "d.m.Y" ); ?></span></li>
                <li><span class="blog_icon_4"> <?php echo get_the_category_list(', '); ?></span></li>

                <?php if ( comments_open() ) : ?>
                <li><?php tt_comment_link(); ?></li>
                <?php endif; ?>
            </ul>
        </div>

        <?php if ( is_search() ) : // Only display Excerpts for Search ?>
        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
        <?php else : ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div><!-- .entry-content -->
        <?php endif; ?>
        
        <?php tt_post_pagination('<div class="post-pagination">','</div>'); ?>            
        
        <?php if(is_single()): ?>
            <?php tt_share_this("Share"); ?>        
            <?php tt_post_tags(); ?>
        <?php endif; ?>
    
      
    </div>
    <div class="clear"></div>

</div>