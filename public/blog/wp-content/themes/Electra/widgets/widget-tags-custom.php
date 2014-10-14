<?php 

/***********************************************************************************************/
/* Widget that displays Archive */
/***********************************************************************************************/

    class Medpark_Tags extends WP_Widget {

        public function __construct() {
            parent::__construct(
                'medpark_Tags',
                'Medpark: Tags',
                array('description' => __('Custom tags widget.', 'medpark'))
            ); 
        }

        public function form( $instance ) {

            $defaults = array(
               'title' => __('Tags', 'medpark')
            );
            
            $instance = wp_parse_args((array) $instance, $defaults);
            
            ?>

            <!-- Title -->
            <p>
                <label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'coolstuff'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>

            <?php
        }

        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved

            $instance = $old_instance;
            
            //Title

            $instance['title'] = strip_tags($new_instance['title']);

            return $instance;
        }

        public function widget( $args, $instance ) {
        // outputs the content of the widget

            extract($args);
            
            // Get the Title
            $title = $instance['title'];

            $tags = get_tags();

            ?>

            <div class="widget">
                <?php if(!empty($title)) : ?>
                <h4 class="fantastico fan-blue"><?php echo ($title) ? $title : __('Tags', 'medpark') ?></h4>
                <?php endif; ?>

                <ol class="tags-list">
                    <?php foreach ($tags as $tag): ?>

                    <?php echo "<li><a href='".get_tag_link( $tag->term_id )."'>{$tag->name}</a></li>" ?>
                        
                    <?php endforeach ?>
                </ol>
            </div><!-- /.widget -->
        

        <?php
            
            
        }

    }
    register_widget( 'Medpark_Tags' );
?>