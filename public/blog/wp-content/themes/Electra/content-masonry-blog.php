<?php 
    global $more;
    $more = 0; 
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(tt_masonry_columns()); ?>>
    <div class="blog_article">
        <div class="entry-cover">
            <?php tt_video_or_image_featured(); ?>
        </div>
        <div class="entry-header">
            <?php if ( is_single() ) : ?>
                <h3><?php tt_empty_title(); ?></h3>
            <?php else : ?>
                <h3>
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php tt_empty_title(); ?></a>
                </h3>
            <?php endif; // is_single() ?>
            <span><?php the_time( "d.m.Y" ); ?></span>
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
        <div class="entry-footer">
            <ul>
                <?php if ( comments_open() ) : ?>
                    <li  class="comm_last"><?php tt_comment_link(); ?></li>
                <?php endif; ?>
                <li><?php tt_author_link(); ?></li>
            </ul>
        </div>
    </div> 
</div>