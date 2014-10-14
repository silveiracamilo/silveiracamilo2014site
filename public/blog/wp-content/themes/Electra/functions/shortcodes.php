<?php 
	
	/***********************************************************************************************/
	/* Shortcodes for cool stuff */
	/***********************************************************************************************/


/* Shorcode row (Template structure)
============================================*/
add_shortcode('row', 'row');

function row($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));
	
	return '<div class="row '.$addclass.'">'. do_shortcode($content) .'</div>';
}


/* Shorcode fluid (Template structure)
============================================*/
add_shortcode('fluid', 'fluid');

function fluid($atts, $content = null) {
	extract(shortcode_atts(array(
		'addclass' => ''
	), $atts));

	return '<div class="row-fluid '.$addclass.'">'. do_shortcode($content) .'</div>';
}

/* Shorcode span (Template structure)
============================================*/

add_shortcode('span', 'span');

function span($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '24',
		'addclass' => ''
	), $atts));

	$content = wpautop(trim($content));
	
	return '<div class="span'.$size.' '.$addclass.'">'. do_shortcode($content) .'</div>';
}

/* Shorcode alert (Typography)
============================================*/

	add_shortcode('alert', 'alert');

function alert($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'error',
		'addclass' => '',
		'title' => ''
	), $atts));
	
	return '<div class="alert '.$type.' '.$addclass.'">
				<h2>'.$title.' <b>'.$content.'</b></h2>
				<a href="#" class="close">&#10006;</a>
			</div>';
}
	
/* Shorcode column (Page element [include columns in pricing table])
============================================*/

	add_shortcode('column', 'column');

function column($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '6',
		'title' => 'Column title',
		'price' => '0',
		'currency' => '$',
		'button' => '',
		'button_text' => __('Buy it now', 'medpark'),
		'url' => '',
		'addclass' => ''
	), $atts));

	if($content){

		$var = explode(";", $content);
		$li = '';

		foreach ($var as $val) {
			$li .= '<li>'.do_shortcode($val).'</li>';
		}
	}

	$show_button = ($button === "on") ? '<a href="'.$url.'" class="button button-blue">'.$button_text.'</a>' : '';
	
	return '<div class="'.$addclass.' span'.$size.' pricing-table"><h2><b>'.$title.'</b></h2>
				<ul>
					'.$li.'
				</ul>
				'.$show_button.'
				<p class="price"><b>'.$currency.' '.$price.'</b></p>
			</div>';
}

/* Shorcode table (Page element [Pricing table])
============================================*/
	
	add_shortcode('table', 'table');

function table($atts,$content = null) {
	extract(shortcode_atts(array(), $atts));
	
	return '<div class="row">'.do_shortcode($content).'</div>';
}

/* Shorcode accordion (Page element)
============================================*/

add_shortcode('accordion', 'accordion');

function accordion($atts, $content = null) {
	extract(shortcode_atts(array('title' => ''), $atts));
	$content = str_replace('<br />', '', $content);

	$title = ($title) ? '<h4 class="fantastico fan-green">'.$title.'</h4>' : '';

	return  $title.'<ul class="medpark-acordion">'.do_shortcode($content).'</ul>';
}

add_shortcode('item', 'item');

function item($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'checked' => ''
	), $atts));

	$checked = ($checked == 'yes') ? 'checked="checked"' : '';
	
	return  '<li>
					<label>
						<input type="radio" name="medpark-accordeon" '. $checked .'>
						<b>'. $title .'</b>
						<span>'.do_shortcode($content).'</span>
					</label>
				</li>';
}

add_shortcode('testimonials', 'testimonials');

function testimonials($atts, $content = null) {
	extract(shortcode_atts(array('category' => '', 'title' => ''), $atts));

	 ob_start();
	
	the_widget('Medpark_Testimonials',  array('title' => $title, 'category' => $category, 'shortcode' => false));

	$wpfa_sample_output = ob_get_contents(); /* Captured output */

	  ob_end_clean(); /* Stop capture */

	  return $wpfa_sample_output;

}

add_shortcode('post_tabs', 'post_tabs');

function post_tabs($atts, $content = null) {
	extract(shortcode_atts(array('post' => 5, 'title' => ''), $atts));

	 ob_start();
	
	the_widget('Medpark_Recent_Posts',  array('title' => $title,'number_post' => $post));

	$wpfa_sample_output = ob_get_contents(); /* Captured output */

	  ob_end_clean(); /* Stop capture */

	  return $wpfa_sample_output;

}

add_shortcode('services', 'services');

function services ($atts, $content=null) {
	extract(shortcode_atts(array('post' => 3), $atts));

	 ob_start();

	 if ( !is_home() ) { 
				query_posts( array(
		      'post_type'		=> 'services',
		      'paged' 			=> ( get_query_var('paged') ? get_query_var('paged') : 1 ),
		      'post_status' 	=> array('publish'),
		      'orderby' 		=> 'date',
		      'posts_per_page' 	=> -1,
		 ));

	}

	$services = '';
	$i = 0;

	if (have_posts()) : while(have_posts()) : the_post();

	$checked = get_post_meta(get_the_id(), 'slide_options');
	$checked = (isset($checked[0]['check_featured'])) ? $checked[0]['check_featured'] : 0;

	if( $checked == 1 ):
		if($i < $post)  {
			$services = get_template_part('content', 'service-featured');
		}
		$i++;
	endif;
	
	endwhile; else :

		 _e('No posts were found.', 'medpark');
	
	endif;

	$services = ob_get_contents(); /* Captured output */

	  ob_end_clean(); /* Stop capture */

	return '<div class="row"><div class="span24 featured-section">
				<div class="row">
					<div class="span22 offset1">

						<ul class="row featured-services">'.$services.'
						</ul><!-- /.featured-services -->
			
					</div><!-- /.span12 -->					
					
				</div><!-- /.row -->
			</div><!-- /.span24 -->
			</div>';
}

add_shortcode('special', 'special');

function special($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '24',
		'addclass' => ''
	), $atts));
	
	return '<div class="row"><div class="span24 special-box"><div class="row">'.do_shortcode($content).'</div></div></div>';
}

add_shortcode('why_us', 'why_us');

function why_us($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '24',
		'addclass' => ''
	), $atts));
	
	return '<div class="row"><div class="span24 why-us"><div class="row">'.do_shortcode($content).'</div></div></div>';
}


add_shortcode('members', 'members');

function members ($atts, $content=null) {
	extract(shortcode_atts(array('post' => 3, 'title' => '', 'url' => ''), $atts));

	ob_start();

	$args = array();
	$users = get_users($args);
	$total_users_loop = $users;
	$i = 0;

	foreach ($total_users_loop as $k => $value) :
							
	$jobs = get_user_meta($value->ID);
	$avatar_usr = ($jobs['be_custom_avatar']) ? $jobs['be_custom_avatar'][0] : '';
	$job_usr = ($jobs['job']) ? $jobs['job'][0] : '';
	$show_usr = ($jobs['show_user']) ? $jobs['show_user'][0] : '';
	$facebook_usr = ($jobs['facebook_user']) ? $jobs['facebook_user'][0] : '';
	$twitter_usr = ($jobs['twitter_user']) ? $jobs['twitter_user'][0] : '';
						
	if(!empty($show_usr)) :

		if($i < $post):
							
						?>
		<li class="span6 offset1">
					<div class="row">
						<div class="span4 offset1 content-doctors">
							<h4>
								<a href="<?php echo $total_users_loop[$k]->user_url; ?>"><?php echo $total_users_loop[$k]->display_name; ?></a>
							</h4>

							<?php if(!empty($job_usr)) :  ?>
								<i><?php echo $job_usr; ?></i>
							<?php else : ?>
								<i><?php _e('Staff', 'medpark'); ?></i>
							<?php endif; ?>

							<figure>
								<a href="<?php echo $total_users_loop[$k]->user_url; ?>">
									<?php if (!empty($avatar_usr)) : ?>

									<img src="<?php echo $avatar_usr; ?>" alt="<?php echo ($jobs['first_name']) ? $jobs['first_name'][0] : ''; ?> <?php echo ($jobs['last_name']) ? $jobs['last_name'][0] : ''; ?>" width="150px">

									<?php else : ?>

									<img src="<?php echo THEMEROOT . '/img/photo_placeholder.png'; ?>" alt="user">

									<?php endif; ?>
								</a>

								<figcaption>

									<ul class="social-doctors">
										<?php if (!empty($facebook_usr)) : ?>
										<li class="facebook">
											<a href="<?php echo $facebook_usr; ?>"></a>
										</li>
										<?php endif; ?>

										<?php if (!empty($twitter_usr)) : ?>
										<li class="twitter">
											<a href="<?php echo $twitter_usr; ?>"></a>
										</li>
										<?php endif; ?>
									</ul>

								</figcaption>
							</figure>
						</div>

						<div class=" span6 about-doctors">
							<div class="row">
								<p class="span4 offset1">
									<?php echo ($jobs['description']) ? $jobs['description'][0] : ''; ?>
								</p>
							</div>
						</div>	

					</div>

				</li><!-- /.span6 --><?php
				$i++;
				endif;
				endif;
				endforeach;


	$wpfa_sample_output = ob_get_contents(); /* Captured output */

	ob_end_clean(); /* Stop capture */

	return '<div class="row"><div class="span24 our-doctors">
				<div class="row">
					<h3 class="meet-team span24">'.$title.'</h3>

					<div class="span22 offset1">
						
						<ul class="row doctors-list home-show">'.$wpfa_sample_output.'</ul><!-- /.row -->
						<div class="row">
							<div class="span4 offset9 helper-button">
								<a href="'.$url.'" class="button button-blue">'.__('View all', 'medpark').'</a>
							</div>
						</div>
					</div><!-- /.span22 -->
					
				</div><!-- /.row -->
			</div><!-- /.span24 -->
			</div>';
}

add_shortcode('appointment_box', 'appointment_box');

function appointment_box($atts, $content = null) {
	extract(shortcode_atts(array(
		'size' => '24',
		'addclass' => ''
	), $atts));
	
	return '<div class="row"><div id="appointment" class="span24 appointment-section"><div class="row">'.do_shortcode($content).'</div></div></div>';
}

add_shortcode('appointment_info', 'appointment_info');

function appointment_info($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));

	$content = shortcode_unautop(trim($content));
	
	return '<div class="span5">'.do_shortcode($content).'</div>';
}

add_shortcode('appointment_form', 'appointment_form');

function appointment_form($atts, $content = null) {
	extract(shortcode_atts(array('button_name' => 'Submit'), $atts));

	$option = "";

	$jobs_list =  array();
	$filter_user = isset($_GET['job']) ? $_GET['job'] : 'all';
	$total_users_loop = get_users();

	foreach ($total_users_loop as $key => $val) {
		$page = get_user_meta($val->ID);
		$pager = ($page['show_user']) ? $page['show_user'][0] : '';
		$job_dr = ($page['job']) ? $page['job'][0] : '';

		if(!empty($pager)) {
			if(!empty($page['job'][0])){
				$jobs_list[] = $page['job'][0];
			}
		}

	}

	$jobs_list = array_unique($jobs_list);

	foreach ($jobs_list as $val) {
		$option .= '<option value="'.$val.'">'.$val.'</option>';
	}

	if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] )) { // Check what the post type is here instead
        
        // Setting the 'post_type' => $_POST['post_type'] in the $post array below causes 404
        // Just set it based on what is set in the above IF $_POST type == 'appointment'. 
        // and below do 'post_type' => 'appointment'
    
        // Do some minor form validation to make sure there is content
        if (isset ($_POST['appointment_name'])) { $title =  $_POST['appointment_name']; }
        if (isset ($_POST['appointment_message'])) { $description = $_POST['appointment_message']; }
        
        $tags = trim( $_POST['appointment_phone'] );
        // Get the array of selected categories as multiple cats can be selected

        $cat_id = get_cat_ID( $_POST['appointment_doctors']);
        
        // Add the content of the form to $post as an array
        $post = array(
            'post_title'    => $title,
            'post_content'  => $description,
            'tags_input'    => $tags,
            'post_category' => array($cat_id),
            'post_status'   => 'publish', // Choose: publish, preview, future, etc.
            'post_type'     => 'appointment' // Set the post type based on the IF is post_type X
        );
        $post_id = wp_insert_post($post);  // Pass  the value of $post to WordPress the insert function
                                // http://codex.wordpress.org/Function_Reference/wp_insert_post



         if($post_id) {
         	wp_set_object_terms($post_id, $_POST['appointment_doctors'], 'appointment_tax', false);

          }

          update_post_meta($post_id, 'slide_options',  array('appointment_email' => $_POST['appointment_email'], 'appointment_phone' => $_POST['appointment_phone'], 'appointment_date' => $_POST['appointment_date'], 'appointment_time' => $_POST['appointment_time']));

           $new_url = add_query_arg( 'success', 1, get_permalink() );
    		wp_redirect( $new_url, 303 );

    } // end IF
	
	return '<div class="span8 offset1 appointment-form">
				<form id="new_post" name="new_post" method="post" action="'.$_SERVER['REQUEST_URI'].'">
					<p>
						<input type="text" name="appointment_name" placeholder="Name" data-required="true">
					</p>
					<p>
						<input type="text" name="appointment_email" placeholder="E-mail" data-trigger="change" data-required="true" data-type="email">
					</p>
					<p>
						<input type="text" name="appointment_phone" placeholder="Phone">
					</p>
					<p>
						<input type="text" name="appointment_date" placeholder="Date" id="reservation" autocomplete="off" data-trigger="change" data-required="true">
					</p>
					<p>
						<input type="text" name="appointment_time" placeholder="Time" id="reservationtime"  autocomplete="off" data-trigger="change" data-required="true">
					</p>
					<p class="styled-select">
						<select name="appointment_doctors" data-required="true">'.$option.'</select>
					</p>
					<p>
						<textarea name="appointment_message" placeholder="Message" data-trigger="keyup" data-rangelength="[20,200]" data-required="true"></textarea>
					</p>
					<p>
						<input type="hidden" name="action" value="post" />
 						<button type="submit" name="submited_medpark" class="button button-blue">'.$button_name.'</button>
 						'.wp_nonce_field( 'new-post' ).'
					</p>
				</form>
			</div>';
}


/* Shorcode tabs
============================================*/
function electra_tabs( $atts, $content = null ){
    extract(shortcode_atts(array(
        'title' => __('cool tab', 'electra'),
        'categories' => '',
        'nr' => 3
    ), $atts));
    global $electra_tabs;
    if(isset($electra_tabs))
        $electra_tabs++;
    else
        $electra_tabs = 0;
    $categories = explode(' ', $categories);
    foreach ($categories as $i => $value){
        $categories[$i] = get_category_by_slug($value);
        if(false===$categories[$i])
            unset($categories[$i]);
    }

    $output = $title!==''?'<h3>/ '.$title.' /</h3>':'';

    if(count($categories)):

        $output .='<div class="tabs"><ul class="tab_nav">';

        foreach ($categories as $i => $value)
            $output .= '<li'.(!$i?' class="active"':'').'><a href="#tab-'.$i.'-'.$electra_tabs.'" data-toggle="tab">'.$value->name.'</a></li>';

        $output .= '</ul><div class="clear"></div><div class="tab-content">';

        foreach ($categories as $i => $value) {
            $output .= '<div class="tab-pane'.(!$i?' active':'').'" id="tab-'.$i.'-'.$electra_tabs.'">';
            $args = array(
                'numberposts' => (int) $nr,
                'category' => $value->term_id,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish',
            );
            $query = get_posts($args);
            if(count($query))
                foreach($query as $q){
                    setup_postdata($q);
                    $output .= '<div class="row-fluid">';
                    if(has_post_thumbnail($q->ID))
                        $output .= '<div class="span4">
                                <div class="tab_image"><a href="'.get_permalink($q->ID).'">'.get_the_post_thumbnail($q->ID/*, 'thumbnail'*/).'</a></div>
                            </div>';
                    $output .= '<div class="span'.(has_post_thumbnail($q->ID)?'8':'12').'">
                            <div class="tab_title"><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a>
                            </div>'.get_the_excerpt().'</div>';
                    $output .= '</div>';
                }
            else
                $output .= '<p>'.__('No posts.','electra').'</p>';
            $output .= '</div>';
        }
        wp_reset_postdata();

        $output .= '</div></div>';

    endif;

    return $output;
}
add_shortcode( 'electra_tabs', 'electra_tabs' );


/* Shorcode columns
============================================*/
function electra_column_first( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'style' => '',
            'margin' => 0
        ), $atts));
    $size = (int)$size;
    return '<div class="row-fluid"><div class="span'.$size.($margin?' offset'.$margin:'').'" style="'.$style.'">'.do_shortcode($content).'</div>';
}
function electra_column( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'style' => '',
            'margin' => 0
        ), $atts));
    $size = (int)$size;
    return '<div class="span'.$size.($margin?' offset'.$margin:'').'" style="'.$style.'">'.do_shortcode($content).'</div>';
}
function electra_column_last( $atts, $content = null ){
    extract(shortcode_atts(array(
            'size' => 4,
            'style' => '',
            'margin' => 0
        ), $atts));
    $size = (int)$size;
    return '<div class="span'.$size.($margin?' offset'.$margin:'').'" style="'.$style.'">'.do_shortcode($content).'</div></div>';
}
add_shortcode( 'electra_column_first', 'electra_column_first' );
add_shortcode( 'electra_column', 'electra_column' );
add_shortcode( 'electra_column_last', 'electra_column_last' );


/* Shorcode recent posts
============================================*/
function electra_recent_posts( $atts, $content = null ){
    extract(shortcode_atts(array(
        'title' => __('recent posts', 'electra'),
        'nr' => 4,
        'wide' => true,
        'size' => 3,
        'mode' => 'normal'
    ), $atts));

    $max = floor(12/(int)$size);

    global $electra_has_sidebar;
    $wide = ('false'===$wide?false:(bool)$wide)&&!$electra_has_sidebar;

    $output = '';

    $output .= 
    ($wide?'</div>':'').
    '<div class="recent_posts electra_recent_posts_'.$mode.($wide?' container_wide':'').'">'.
        ($wide?'<div class="container">':'').
        	(''!==$title?'<h3>/ '.$title.' /</h3>':'');

    $args = array(
        'numberposts' => $nr,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__not_in' => get_option( 'sticky_posts' )
    );
    $query = get_posts($args);
    if(count($query)){
    	switch($mode){
    		case 'list':
    			foreach($query as $i => $q){

    				setup_postdata($q);

    				$output .= '<div class="row-fluid">';

    				if(has_post_thumbnail($q->ID)){

    					$output .= '<div class="span3">'.get_the_post_thumbnail($q->ID).'</div>';

    					$output .= '<div class="span9">';

    					$output .= '<h4><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a></h4>';

    					$output .= $q->post_excerpt!==''?apply_filters('get_the_excerpt',$q->post_excerpt):get_the_excerpt();

    					$output .= '</div>';

    				}else{

						$output .= '<div class="span12">';

    					$output .= '<h4><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a></h4>';

    					$output .= $q->post_excerpt!==''?apply_filters('get_the_excerpt',$q->post_excerpt):get_the_excerpt();

    					$output .= '</div>';

    				}

    				$output .= '</div>';

    			}
    			break;
    		case 'masonry':
    			global $post;
    			$post_backup = $post;
    			$output .= '<div class="row electra_masonry">';
    			foreach($query as $i => $q){
    				$post = $q;
    				setup_postdata($post);
    				$output .= 
    				'<div id="post-'.get_the_ID().'" class="'.implode(' ',get_post_class('span'.$size)).'">
    				    <div class="blog_article">
    				        <div class="entry-cover">
    				            '.tt_video_or_image_featured(true).'
    				        </div>
    				        <div class="entry-header">
				                <h3>
				                    <a href="'.get_permalink().'" rel="bookmark">'.tt_empty_title(true).'</a>
				                </h3>
    				            <span>'.get_the_time( "d.m.Y" ).'</span>
    				        </div>
				            <div class="entry-content">
				                '.get_the_excerpt().'
				            </div><!-- .entry-summary -->
    				        <div class="entry-footer">
    				            <ul>
    				                '.(comments_open()?'<li  class="comm_last"><?php tt_comment_link(); ?></li>':'').'
    				                <li>'.tt_author_link(true).'</li>
    				            </ul>
    				        </div>
    				    </div> 
    				</div>';
    			}
			    wp_reset_postdata();
			    $post = $post_backup;
			    $output .= '</div>';
    			break;
    		case 'normal':
    		default:
				$output .= 
			        '<div class="row-fluid">';
			    foreach($query as $i => $q){
			        setup_postdata($q);

			        if($i&&!($i%$max))
			        	$output .= '</div><div class="row-fluid">';

			        $output .= 
			            '<div class="span'.$size.'">
			                <div class="recent_post">';

			        if(has_post_thumbnail($q->ID))
			        	$output .= 
			                    '<div class="recent_post_cover">
			                        <a href="'.get_permalink($q->ID).'">'.get_the_post_thumbnail($q->ID).'</a>
			                    </div>';

			        $output .= 
			                    '<div class="recent_post_title"><a href="'.get_permalink($q->ID).'">'.get_the_title($q->ID).'</a></div>
			                    '.($q->post_excerpt!==''?$q->post_excerpt:get_the_excerpt()).'
			                </div>
			            </div>';
			    }
			    wp_reset_postdata();
				$output .= 
			        '</div>';
    			break;
    	}
    }

    $output .= 
        ($wide?'</div>':'').
    '</div>'.
    ($wide?'<div class="container">':'');

    return $output;
}
add_shortcode( 'electra_recent_posts', 'electra_recent_posts' );


/* Shorcode recent works
============================================*/
function electra_recent_works( $atts, $content = null ){
    extract(shortcode_atts(array(
        'title' => __('recent works', 'electra'),
        'nr' => 4,
        'wide' => true,
        'hide_more' => false,
        'size' => 3
    ), $atts));

    $max = floor(12/(int)$size);

    global $electra_has_sidebar;
    $wide = ('false'===$wide?false:(bool)$wide)&&!$electra_has_sidebar;

    $hide_more = 'false'===$hide_more?false:(bool)$hide_more;

    $output = '';

    $output .=
    ($wide?'</div>':'').
    '<div class="recent_works'.($wide?' container_wide':'').'">'.
        ($wide?'<div class="container">':'').
            (''!==$title?'<h3>/ '.$title.' /</h3>':'').
            '<div class="portfolio">';

    $args = array(
        'numberposts' => $nr,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'post_type' => 'electra_portfolio'
    );
    $query = get_posts($args);

    if(count($query)){
    	$output .= 
                '<div class="row-fluid">';
    	foreach($query as $i => $q){
    		if($i&&!($i%$max))
            	$output .= '</div><div class="row-fluid">';

            $tags = get_the_terms($q->ID,'electra_portfolio_tax');
            $image = get_post_meta($q->ID,'slide_options',true);
            if($image['cover_image']==='')
            	$image = 'holder.js/240x240/auto';
            else
            	$image = wp_get_attachment_url($image['cover_image']);

    		$output .= 
                    '<div class="span'.$size.'">
                        <div class="portfolio_item">
                            <div class="item_hover">
                                <div class="item_title">'.get_the_title($q->ID).'</div>';

            if($tags){
            	$output .= 
                                '<ul class="item_tags">';

                foreach ($tags as $j => $t) {
                	$output .= 
                                    '<li><a href="'.get_term_link($t).'">'.$t->name.'</a></li>';
                }

            	$output .= 
                                '</ul>';
            }

            $output .= 
                                '<a href="'.get_permalink($q->ID).'" class="button_color">'.__('view','electra').'</a>
                            </div>
                            <div class="item_image"><img src="'.$image.'" /></div>
                        </div>
                    </div>';
    	}
    	$output .= 
                '</div>';
    }

    $output .= 
            '</div>'.
            (!$hide_more?'<a href="'.get_post_type_archive_link('electra_portfolio').'" class="button_white">'.__('see all','electra').'</a>':'').
            '<div class="clear"></div>'.
        ($wide?'</div>':'').
    '</div>'.
    ($wide?'<div class="container">':'');

    return $output;
}
add_shortcode( 'electra_recent_works', 'electra_recent_works' );