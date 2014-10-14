<?php 

/***********************************************************************************************/
/* Widget that displays Archive */
/***********************************************************************************************/

    class Medpark_Testimonials extends WP_Widget {

        public function __construct() {
            parent::__construct(
                'medpark_Testimonials',
                'Medpark: Testimonials',
                array('description' => __('Custom testimonials widget.', 'medpark'))
            ); 
        }

        public function form( $instance ) {

            $defaults = array(
               'title' => __('Testimonials', 'medpark'),
               'category' => __('Category', 'medpark'),
               'shortcode' => true
            );

            $taxonomy = 'testimonials_tax';
            $tax_terms = get_terms($taxonomy);
            
            $instance = wp_parse_args((array) $instance, $defaults);
            
            ?>

            <!-- Title -->
            <p>
                <label for="<?php echo $this->get_field_id('title') ?>"><?php _e('Title:', 'medpark'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('category') ?>"><?php _e('Category:', 'medpark'); ?></label>
                <select class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>">
                    <?php foreach($tax_terms as $tax_term): ?>
                        <option value="<?php echo $tax_term->name; ?>" <?php if($tax_term->name == esc_attr($instance['category'])) {echo 'selected';} ?>><?php echo $tax_term->name; ?></option>
                    <?php endforeach; ?>
                </select>   
            </p>

            <?php 
        }

        public function update( $new_instance, $old_instance ) {
            // processes widget options to be saved

            $instance = $old_instance;
            
            //Title

            $instance['title'] = strip_tags($new_instance['title']);
            $instance['category'] = strip_tags($new_instance['category']);
            $instance['shortcode'] = true;

            return $instance;
        }

        public function widget( $args, $instance ) {
        // outputs the content of the widget

            extract($args);
            
            // Get the Title
            $title = $instance['title'];
            $category = $instance['category'];
            $shortcode = $instance['shortcode'];
            
            wp_reset_query();
            $c = query_posts( array(
                'post_type'       => 'testimonials',
                'post_status'     => array('publish'),
                'orderby'         => 'date',
                'posts_per_page'  => -1,

            ));

            ?>

            <div class="widget">
                <?php if(!empty($title)): ?>
                    <h4 class="fantastico fan-blue"><?php echo ($title) ? $title : __('Testimonials', 'medpark') ?></h4>
                <?php endif; ?>
                <?php 
                    $public_post = wp_count_posts('testimonials'); 
                    $public_post = $public_post->publish;
                    $count = 0;
                ?>

                <?php if($shortcode == true) : ?>

                <div class="testimonials-widget">
                    <ul class="testimonials-sliders">
                        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
                        <?php $meta = get_post_meta(get_the_ID()); ?>
                        <?php $meta = unserialize($meta['slide_options'][0]) ?>
                        <?php $post_cat = get_the_terms(get_the_ID(), 'testimonials_tax'); ?>

                        <?php 
                            foreach ($post_cat as $key => $val) {
                                if($val->object_id == get_the_ID()) {
                                    $post_cat = $val->name;
                                }
                            } 

                        ?>

                        <?php if( $category == $post_cat) : ?>
                        <?php $count++; ?>
                        <li class="row">
                            <figure class="span7">

                                <a href="<?php echo $meta['url']; ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                                <figcaption>
                                    <h4>
                                        <a href="<?php echo $meta['url']; ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <em><?php echo $meta['job']; ?></em>
                                </figcaption>
                            </figure>
                            <div class="testimonial-message span5 offset1">
                                <?php the_content(); ?>
                                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( "d M Y" ); ?></time>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endwhile; endif; ?>
                    </ul>

                    <?php if($public_post > 1 && $count > 1 ) : ?>
                        <ul class="testimonials-nav">
                            <li class="prev">
                                <a href="#">&#8249;</a>
                            </li>
                            <li class="next">
                                <a href="#">&#8250;</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

            <?php else: ?>

                <div class="testimonials-widget wide-box">
                    <ul class="testimonials-sliders">
                        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
                        <?php $meta = get_post_meta(get_the_ID()); ?>
                        <?php $meta = unserialize($meta['slide_options'][0]) ?>
                        <?php $post_cat = get_the_terms(get_the_ID(), 'testimonials_tax'); ?>

                        <?php 
                            foreach ($post_cat as $key => $val) {
                                if($val->object_id == get_the_ID()) {
                                    $post_cat = $val->name;
                                }
                            } 

                        ?>

                        <?php if( $category == $post_cat || $category == '') : ?>
                        <?php $count++; ?>
                        <li class="row">
                            <figure class="span12">

                                <a href="<?php echo $meta['url']; ?>">
                                    <?php the_post_thumbnail(); ?>
                                </a>
                                <figcaption>
                                    <h4>
                                        <a href="<?php echo $meta['url']; ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <em><?php echo $meta['job']; ?></em>
                                </figcaption>
                            </figure>
                            <div class="testimonial-message span10 offset1">
                                <?php the_content(); ?>
                                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( "d M Y" ); ?></time>
                            </div>
                        </li>
                        <?php endif; ?>
                        <?php endwhile; endif; ?>
                    </ul>

                    <?php if($public_post > 1 && $count > 1 ) : ?>
                        <ul class="testimonials-nav">
                            <li class="prev">
                                <a href="#">&#8249;</a>
                            </li>
                            <li class="next">
                                <a href="#">&#8250;</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

            </div><!-- /.widget -->

            <?php 
                 wp_reset_query();
        
              
        }

    }
    register_widget( 'Medpark_Testimonials' );
?>