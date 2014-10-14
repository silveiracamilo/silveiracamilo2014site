<?php
  if ( post_password_required() )
	 return;
?>
<?php tt_comment_form(); ?>

<div id="comments" class="comments-area">

  <?php if ( have_comments() ) : ?>
    <h3><?php tt_list_comments_title(); ?></h3>
    <ul class="commentlist"><?php tt_display_comments(); ?></ul>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
      <nav class="navigation comment-navigation" role="navigation">
        <ul>
          <li class="nav-previous">
            <?php previous_comments_link( __( '&larr; Older Comments', tt_domain_theme() ) ); ?>
          </li>
          <li class="nav-next">
            <?php next_comments_link( __( 'Newer Comments &rarr;', tt_domain_theme() ) ); ?>
          </li>
        </ul>
      </nav><!-- .comment-navigation -->
    <?php endif; // Check for comment navigation ?>
    <?php tt_comment_closed(); ?>
  <?php endif; ?>
</div>