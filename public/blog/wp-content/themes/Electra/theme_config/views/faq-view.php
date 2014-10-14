<div id="accordion">
<?php $i = 0;  ?>
<?php foreach ($slides as $post): ?>
<?php $post = $post['post']; ?>
<?php $i++; ?>
		
    <div class="accordion-group">
        <div class="accordion-heading">
            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#content_<?php echo $i; ?>">
               <?php echo $post->post_title; ?>
                <span><?php _e('Answer', tt_domain_theme()) ?></span>
            </a>
        </div>
        <div id="content_<?php echo $i; ?>" class="accordion-body collapse">
            <div class="accordion-inner">
                 <?php echo $post->post_content; ?>
            </div>
        </div>
    </div>

<?php endforeach; ?>
</div>
