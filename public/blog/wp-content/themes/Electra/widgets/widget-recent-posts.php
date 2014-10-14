<?php 

/***********************************************************************************************/
/* Widget that displays recent posts */
/***********************************************************************************************/

    class Medpark_Recent_Posts extends WP_Widget {

        public function __construct() {
            parent::__construct(
                'Medpark_Recent_Posts',
                'Medpark: Recent Posts',
                array('description' => __('Custom widget recent posts.', 'medpark'))
            ); 
        }

        public function form( $instance ) {

            $defaults = array(
               'title' => __('Recent Posts', 'medpark'),
               'number_post' =>5,
            );
            
            $instance = wp_parse_args((array) $instance, $defaults);
            
            ?>

            <!-- Title -->
            <p>
                <label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'medpark'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>

            <!-- Number of posts -->
             <p>
                <label for="<?php echo $this->get_field_id('number_post') ?>"><?php _e('Number of posts to show: ', 'medpark'); ?></label>
                <input type="text" class="small-text" id="<?php echo $this->get_field_id('number_post'); ?>" name="<?php echo $this->get_field_name('number_post'); ?>" value="<?php echo esc_attr($instance['number_post']); ?>" />
            </p>

            <?php
        }

        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved

            $instance = $old_instance;
            
            //Title

            $instance['title'] = strip_tags($new_instance['title']);

            $instance['number_post'] = $new_instance['number_post'];


            return $instance;
        }

        public function widget( $args, $instance ) {
        // outputs the content of the widget

            extract($args);
            
            // Get the Title
            $title = $instance['title'];

            $number_post = $instance['number_post'];

            ?>

            <div class="widget">
                <?php if(!empty($title)) : ?>
                    <h4 class="fantastico fan-blue"><?php echo $title; ?></h4>
                <?php endif; ?>

                <ul class="medpark-tabs">
                    <li>
                        <input type="radio" name="medpark-tabs"  id="medpark-tabs" checked="checked">
                        <label for="medpark-tabs"><b><?php _e('Recent', 'medpark'); ?></b></label>

                        <ul>
                        <?php
                            $args = array('numberposts' => $number_post, 'post_status' => 'publish', 'orderby' => 'post_date', 'order' => 'DESC');
                            $recent_posts = wp_get_recent_posts($args);
                            foreach ($recent_posts as $recent) :

                                $image = get_template_directory_uri() . '/img/photo_place.jpg';

                                if (has_post_thumbnail($recent["ID"])) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($recent["ID"]), array(150, 150));
                                    $image = $image[0];

                                }
                                ?> 

                                <li class="row-fluid">
                                    <figure class="span10">
                                         <a href="<?php echo $recent['guid'] ?>"><img src="<?php echo $image; ?>" alt="<?php echo $recent['post_title'] ?>"/></a>
                                    </figure>
                                    <p class="span14 title-widget-tab">
                                        <a href="<?php echo $recent['guid'] ?>"><?php echo $recent['post_title'] ?></a>
                                    </p>                                         
                                </li>
                        <?php endforeach;?>
                        </ul>
                    </li>
                    <li>
                        <input type="radio" name="medpark-tabs"  id="medpark-tabs2">
                        <label for="medpark-tabs2"><b><?php _e('Popular', 'medpark') ?></b></label>

                        <ul>
                        <?php
                            $args = array('numberposts' => $number_post, 'post_status' => 'publish', 'orderby' => 'comment_count', 'order' => 'DESC');
                            $recent_posts = wp_get_recent_posts($args);
                            foreach ($recent_posts as $recent) :
                                $image = get_template_directory_uri() . '/img/photo_place.jpg';

                                if (has_post_thumbnail($recent["ID"])) {
                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($recent["ID"]), array(150, 150));
                                    $image = $image[0];

                                }
                                ?> 
                                <li class="row-fluid">
                                    <figure class="span10">
                                         <a href="<?php echo $recent['guid'] ?>"><img src="<?php echo $image; ?>" alt="<?php echo $recent['post_title'] ?>"/></a>
                                    </figure>
                                    <p class="span14 title-widget-tab">
                                        <a href="<?php echo $recent['guid'] ?>"><?php echo $recent['post_title'] ?></a>
                                    </p>                                         
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>                               
            </div><!-- /.widget -->

            <?php 
            
            
        }

    }
    register_widget( 'Medpark_Recent_Posts' );
?>