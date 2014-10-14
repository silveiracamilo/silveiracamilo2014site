<?php

    /*==== Include Tesla Framework ====*/
    require_once(TEMPLATEPATH . '/tesla_framework/tesla.php');


    /*==== Include helper classes ====*/
    require_once('functions/theme-classes/class_tesla_menu.php');
    require_once('functions/theme-classes/class_tesla_breadcrumbs.php');
    
    /*==== Domain theme ====*/
    function tt_domain_theme() {
        $domain = 'tesla';
        return $domain;
    }

    /*==== Include scripts ====*/
    TT_ENQUEUE::add_js('http://w.sharethis.com/button/buttons.js');     //takes array also
    TT_ENQUEUE::$base_gfonts = array('://fonts.googleapis.com/css?family=Enriqueta:400,700|Open+Sans:400italic,700italic,400,600,700');
    TT_ENQUEUE::$gfont_changer = array(
        _go('logo_text_font')
    );
    TT_ENQUEUE::$main_css = 'style.css';

    /*==== Init menu ====*/
    $menu = array('Main menu'); //Register menu
    $tt_menu = new TeslaMenu($menu, tt_domain_theme());

    function tt_menu($menu_name) {

        $defaults = array(
                    'theme_location'  => strtolower(str_replace(" ", "_", $menu_name)),
                    'menu'            => '',
                    'container'       => 'div',
                    'container_class' => 'menu',
                    'container_id'    => '',
                    'menu_class'      => 'menu',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                );

        wp_nav_menu( $defaults );
    }

    /*==== Init theme support ====*/
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(940, '', false);
    add_theme_support('automatic-feed-links');


    /*==== Bredcrumbs ====*/
    function tt_breadcrumbs() {
        $tt_breadcrumbs = new TeslaBreadcrumbs();
        echo $tt_breadcrumbs->the_breadcrumbs();
    }

    function tt_title_breadcrumbs() {
        if(is_home()) {
            _e('Blog', tt_domain_theme());
        }else if(is_404()) {
            _e('Error 404', tt_domain_theme());            
        }else {
            the_title();
        }
    }

    /*==== Empty Title ====*/
    function tt_empty_title($echo = false) {

        $the_title = get_the_title();

        if($echo){

            if(!empty($the_title))
                return get_the_title();
            else
                return __('Missing post title', 'electra');

        }else{

            if(!empty($the_title))
                the_title();
            else
                _e('Missing post title', 'electra');

        }
    }

    /*==== The loop helper ====*/
    function tt_the_loop($arg = false, $file = false, $error = false){
        if(!empty($arg))
            query_posts($arg);

        if ( have_posts() ){
            while ( have_posts() ) {
                the_post();
                if(!empty($file)) {
                    get_template_part( 'content', $file );                    
                }
                else{
                    $template = get_page_template_slug();
                    if($template === 'template-countdown.php') {
                        the_content();
                    } else {
                        get_template_part( 'content', get_post_format() );                   
                    }
                }
            }
        }else{
            if(!empty($error))
                get_template_part( 'content', $error );
        }

        //wp_reset_query();       
    }

    /*==== More link ====*/
    function tt_more_link() {
        $title = "Read more";
        $class = "button_white read-more";

        $link = sprintf('&nbsp;<a href="%s#more-%s" class="%s">%s</a>',get_permalink(), $GLOBALS["post"]->ID, $class, __($title, tt_domain_theme()));
        return $link;
    }

    add_filter("the_content_more_link", 'tt_more_link');

    /*==== Post pagination ====*/
    function tt_post_pagination($wrapper = '',$wrapper_end='') {

        $args = array(
            'before'           => $wrapper . '<ul class="page-numbers"> <li><b>Pages:</b></li>',
            'after'            => '</ul>' . $wrapper_end,
            'link_before'      => '<li>',
            'link_after'       => '</li>',
            'next_or_number'   => 'number',
            'nextpagelink'     => __('Next page', tt_domain_theme()),
            'previouspagelink' => __('Previous page', tt_domain_theme()),
            'pagelink'         => '%',
            'echo'             => 0
        );

        $links = wp_link_pages( $args );
        $links = str_replace('</li></a>', '</a>', $links);
        $links = str_replace('><li>', '>', $links);
        $links = str_replace('<a', '<li><a', $links);
        $links = str_replace('a>', 'a></li>', $links);
        echo $links;
    }

    /*==== Comment link ====*/
    function tt_comment_link() {

        $zero       = __('Coments', tt_domain_theme()) . ' (0)';
        $one        = __('Coments', tt_domain_theme()) . ' (1)';
        $more       = __('Coments', tt_domain_theme()) . ' (%)';
        $css_class  = 'blog_icon_1';
        $none       = '';

        comments_popup_link( $zero, $one, $more, $css_class, $none );
    }

    /*==== Author link ====*/
    function tt_author_link($echo = false) {

        $author_url     = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
        $author_name    = get_the_author();
        $css_class      = "blog_icon_2";

        if($echo){

            return '<a class="' . $css_class . '" href="' . $author_url . '">' . $author_name . '</a>';

        }else{

            echo '<a class="' . $css_class . '" href="' . $author_url . '">' . $author_name . '</a>';

        }
    }

    /*==== pagination ====*/
    function tt_pagination($custom = false) {

        global $wp_query;

        $big = 999999999; // need an unlikely integer
        $total_pages = $wp_query->max_num_pages;
        $current_page = max( 1, get_query_var( 'paged' ) );

        if(!empty($custom)){
            $total_pages =  wp_count_posts( $custom );
            $total_pages = $total_pages->publish;
            if(tt_meta('portfolio_items_per_page') == 0) {
                 $total_pages = 0;
            } else {
                $total_pages = ceil($total_pages / tt_meta('portfolio_items_per_page'));                
            }
        }

        $args = array(
                'base'              => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format'            => '?page=%#%',
                'total'             => $total_pages,
                'current'           => $current_page,
                'show_all'          => False,
                'end_size'          => 1,
                'mid_size'          => 2,
                'prev_next'         => True,
                'prev_text'         => __('Prev', tt_domain_theme()),
                'next_text'         => __('Next', tt_domain_theme()),
                'type'              => 'list',
                'add_args'          => False,
                'add_fragment'      => ''
            );

        if ( $total_pages > 1 ){
            echo '<div class="pagination-box">';
            echo paginate_links( $args );
            echo '</div>';            
        }

    }

    /*==== register sidebars ====*/
    if (function_exists('register_sidebar')){
        register_sidebar(array(
            'name'              => 'Main Sidebar',
            'id'                => 'main-sidebar',
            'description'       => 'This sidebar is located on the left or the right side of the main content area.',
            'class'             => '',
            'before_widget'     => '<div id="%1$s" class="%2$s widget">',
            'after_widget'      => '</div>',
            'before_title'      => '<h3>',
            'after_title'       => '</h3>'
        ));
        register_sidebar(array(
            'name' => 'Footer Sidebar - Left',
            'id' => 'footer-sidebar-left',
            'description' => 'This sidebar is located in the footer area.',
            'class' => '',
            'before_widget' => '<div id="%1$s" class="%2$s widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>'
        ));
        register_sidebar(array(
            'name' => 'Footer Sidebar - Middle',
            'id' => 'footer-sidebar-middle',
            'description' => 'This sidebar is located in the footer area.',
            'class' => '',
            'before_widget' => '<div id="%1$s" class="%2$s widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>'
        ));
        register_sidebar(array(
            'name' => 'Footer Sidebar - Right',
            'id' => 'footer-sidebar-right',
            'description' => 'This sidebar is located in the footer area.',
            'class' => '',
            'before_widget' => '<div id="%1$s" class="%2$s widget">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title">',
            'after_title' => '</div>'
        ));
    }

    /*==== register widgets ====*/
    function tt_register_widgets(){
        require_once 'widgets/widget-tabs.php';
        require_once 'widgets/widget-ads.php';
        require_once 'widgets/widget-twitter.php';
        require_once 'widgets/widget-flickr.php';
        require_once 'widgets/widget-subscription.php';
        require_once 'widgets/widget-contact.php';
        register_widget('Electra_tabs_widget');
        register_widget('Electra_ads_widget');
        register_widget('Electra_twitter_widget');
        register_widget('Electra_flickr_widget');
        register_widget('Electra_subscription_widget');
        register_widget('Electra_contact_widget');
    }
    add_action('widgets_init', 'tt_register_widgets');

    /*==== load scripts and styles ====*/
    function electra_admin_scripts($hook_suffix) {
        if ('widgets.php' == $hook_suffix || 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix) {
            wp_enqueue_media();
            wp_enqueue_style('electra-admin-widgets', get_template_directory_uri().'/admin/admin.css',false,null);
            wp_enqueue_script('electra-admin-widgets', get_template_directory_uri().'/admin/admin.js', array('jquery'),null,true);
        }
    }
    function electra_scripts($hook_suffix) {
        wp_enqueue_script('jquery');
    }
    if(is_admin())
        add_action('admin_enqueue_scripts', 'electra_admin_scripts');
    else
        add_action('wp_enqueue_scripts', 'electra_scripts');

    /*==== theme features ====*/
    add_theme_support('post-thumbnails');

    /*==== Comments patern ====*/
    function tt_comment_form() {
        $user = wp_get_current_user();
        $user_identity = $user->exists() ? $user->display_name : '';

        $fields = array(
                'author'    => '<p>
                                    <label for="name">' . __( 'Name', tt_domain_theme() ) . '</label>
                                </p>
                                <input class="input_line" id="name" name="name" type="text" />',

                'email'     => '<p>
                                    <label for="email">' . __( 'E-mail', tt_domain_theme() ) . '</label>
                                </p>
                                <input class="input_line" id="email" name="email" type="text" />',

                'url'       => '<p>
                                    <label for="website">' . __( 'Website', tt_domain_theme() ) . '</label>
                                </p>
                                <input class="input_line" id="website" name="website" type="text" />'
            );

        $custom_input = '<input name="submit" type="submit" id="submit" class="button_white" value="'.__('Send', tt_domain_theme()).'" />';

        $comment_field = '<p>
                            <label for="comment">' . __( 'Comment', tt_domain_theme() ) . '</label>
                                <span class="logged-in-as">'.
                                    sprintf(
                                    __( 'Logged in as <a href="%1$s">%2$s</a>.
                                    <a href="%3$s" title="Log out of this account">Log out?</a>', tt_domain_theme()),
                                    get_edit_user_link(),
                                    $user_identity,
                                    wp_logout_url() ).'
                                </span>
                        </p>
                        <textarea id="comment" name="comment" class="input_area" aria-required="true"></textarea>';

        $must_log_in = '<p class="logged-in-as">' 
                            . sprintf( 
                                __( 'Logged in as <a href="%1$s">%2$s</a>. 
                                <a href="%3$s" title="Log out of this account">Log out?</a>', tt_domain_theme()), 
                                get_edit_user_link(),
                                $user_identity,
                                wp_logout_url() ) . '</p>';

        $logged_in_as = '';

        $comment_notes_before = '<p class="comment-notes">' 
                                    . __( 'If you want to share your opinion, leave a comment.', tt_domain_theme() ) .
                                '</p>';

        $comment_notes_after = '<div class="form-allowed-tags">' 
                                    .  __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:' , tt_domain_theme()) .
                                    ' <pre>' . allowed_tags() . '</pre>' .
                                '</div>'. $custom_input;

        $id_form            = 'commentform';
        $id_submit          = 'custom_submit';
        $title_reply        = __( 'Leave a comment', tt_domain_theme() );
        $title_reply_to     = __( 'Leave a comment to %s', tt_domain_theme() );
        $cancel_reply_link  = __( 'Cancel reply', tt_domain_theme() );
        $label_submit       = '';
        $format             = 'html5';

        $args = array(
                'fields'                    => apply_filters( 'comment_form_default_fields', $fields ),
                'comment_field'             => $comment_field,
                'must_log_in'               => $must_log_in,
                'logged_in_as'              => $logged_in_as,
                'comment_notes_before'      => $comment_notes_before,
                'comment_notes_after'       => $comment_notes_after,
                'id_form'                   => $id_form,
                'id_submit'                 => $id_submit,
                'title_reply'               => $title_reply,
                'title_reply_to'            => $title_reply_to,
                'cancel_reply_link'         => $cancel_reply_link,
                'label_submit'              => $label_submit,
                'format'                    => $format
            );

        comment_form($args);
    }

    /*==== Comments list title ====*/
    function tt_list_comments_title() {
        printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'comments title', tt_domain_theme() ),
          number_format_i18n( get_comments_number() ));
    }

    /*==== Display comments ====*/
    function tt_display_comments() {
        $args = array(
            'walker'            => null,
            'max_depth'         => '',
            'style'             => 'ul',
            'callback'          => 'tt_comment_template',
            'end-callback'      => null,
            'type'              => 'all',
            'reply_text'        => 'Reply',
            'page'              => '',
            'per_page'          => '',
            'avatar_size'       => 85,
            'reverse_top_level' => null,
            'reverse_children'  => '',
            'format'            => 'html5', //or html5 @since 3.6
            'short_ping'        => true // @since 3.6
        );

        wp_list_comments($args);
    }

    /*==== Comment template ====*/
    function tt_comment_template($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }

        echo '<' . $tag . ' '; 
        comment_class(empty( $args['has_children'] ) ? '' : 'parent');
        echo ' id="comment-';
        comment_ID();
        echo '">';

        if ( 'div' != $args['style'] ) {
            echo ' <div id="div-comment-';
            comment_ID();
            echo '" class="comment">';
        }
        
        echo '<span class="avatar">';
        if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] );
        edit_comment_link(__('Edit'),'  ','' );
        echo '</span>';
        echo '<span class="comment_info">';
        echo get_comment_author_link();
        echo '<span>';
        printf( __('%1$s at %2$s', tt_domain_theme()), get_comment_date(),  get_comment_time());
        echo '</span>';
        comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));
        echo '</span>';
        if ($comment->comment_approved == '0') {
            echo '<em class="comment-awaiting-moderation">' . _e('Your comment is awaiting moderation.') .'</em><br />';
        }
        comment_text();

        if ( 'div' != $args['style'] ) {
            echo '</div>';
        }
    }

    /*==== Comment are closed ====*/
    function tt_comment_closed() {
        if ( ! comments_open() && get_comments_number() ) {
            echo '<p class="no-comments">';
                _e( 'Comments are closed.' , tt_domain_theme());
            echo '</p>';
        }
    }

    /*==== Display post tags ====*/
    function tt_post_tags($before = false, $sep = false, $after = false) {
         $before    = ($before == false) ? '<div class="tags_cloud">' : $before;
         $sep       = ($sep == false) ? '' : $sep;
         $after     = ($after == false) ? '</div>' : $after;
        
        if(has_tag()) {
            the_tags($before, $sep, $after);
        }
    }

    /*==== Function Call custom meta boxex ====*/
    function tt_video_or_image_featured($echo = false) {
        global $post;
        $embed_code = get_post_meta($post->ID , THEME_NAME . '_video_embed', true);
        $patern = '<div class="entry-cover">%s</div>';

        if($echo){

            if(!empty($embed_code)) {
                return sprintf($patern, $embed_code);
            }else {
                if( has_post_thumbnail() && ! post_password_required() ){
                    return sprintf($patern, get_the_post_thumbnail());
                }
            }

        }else{

            if(!empty($embed_code)) {
                printf($patern, $embed_code);
            }else {
                if( has_post_thumbnail() && ! post_password_required() ){
                    printf($patern, get_the_post_thumbnail());
                }
            }

        }
    }

    /*==== Social icons ====*/
    function tt_social_icon($before, $after, $format) {
        $output = $before;
        $electra_social = array_filter(array(
            'facebook'      => _go('social_platforms_facebook'),
            'twitter'       => _go('social_platforms_twitter'),
            'linkedin'      => _go('social_platforms_linkedin'),
            'rss'           => _go('social_platforms_rss'),
            'pinterest'     => _go('social_platforms_pinterest'),
            'flickr'        => _go('social_platforms_flickr'),
            'googleplus'    => _go('social_platforms_google')
        ));
        if(!empty($electra_social)):
            foreach ($electra_social as $key => $value):
                $output .= sprintf($format,$key,$value);
            endforeach;
        endif;
        $output .= $after;
        return $output;
    }

    /*==== Share This plugin ====*/
    function tt_share_this($title = false) {
        $social_share = _go('share_this');

        if($social_share){

            $output = sprintf('<div class="share_it"><span>%1$s</span><div><ul class="socials_2">', $title);

            if(!empty($social_share)) {
                foreach ($social_share as $key => $value) {
                    $output .= sprintf('<li class="st_%1$s_large" displayText="%2$s"></li>', strtolower($value), ucwords($value) );
                }
            }

            $output .= '</ul></div></div>';

            echo $output;
        }
    }

    /*==== 404 error message ====*/
    function tt_404_content() {
        $title      = _go('404_title');
        $img        = _go('404_img');
        $mess       = _go('404_mess');
        $output     = '';

        if(!empty($title)) {
            $output .= sprintf('<h1>%s</h1>', $title);         
        }

        if(!empty($img)) {
            $output .= sprintf('<img src="%s" alt="error 404" />', $img);
        }

        if(!empty($mess)) {
            $output .= sprintf('<div class="error_text">%s</div>', $mess);         
        }

        echo $output;
    }

    /*==== Breadcrumb image ====*/
    function tt_breadcrumb_img() {
        global $post;
        $image          = get_post_meta($post->ID);
        $image_data     = (!empty($image[THEME_NAME . '_custom_breadcrumbs_img'][0])) ? unserialize($image[THEME_NAME . '_custom_breadcrumbs_img'][0]) : null;
        $custom_img     = (!empty($image[THEME_NAME . '_custom_breadcrumbs_img'][0])) ? $image_data['url'] : '';
        $image          = (!empty($image[THEME_NAME . '_use_breadcrumbs_img'][0])) ? $image[THEME_NAME . '_use_breadcrumbs_img'][0] : '';

        if(empty($custom_img)) {
            if(!empty($image)) {
                echo sprintf('<span><img src="%1$s/images/elements/%2$s.png" alt="right sidebar" /></span>', get_template_directory_uri(), $image);
            }            
        }else {
            echo sprintf('<span><img src="%1$s" alt="right sidebar" /></span>', $custom_img);
        }
    }

    /*==== Breadcrumb switcher ====*/
    function tt_breadcrumb_switcher() {
        global $post;
        $switcher   = get_post_meta($post->ID);
        $switcher   = (!empty($switcher[THEME_NAME . '_show_breadcrumbs'][0])) ? $switcher[THEME_NAME . '_show_breadcrumbs'][0] : '';

        if(!empty($switcher)) {
            return 1;
        }
    }

    /*==== Next/Prev single portfolio ====*/
    function tt_prev_next () {
        $items  = wp_count_posts('electra_portfolio');
        $items  = $items->publish;

        if($items > 1){
            echo '<ul class="project_pag">';
            previous_post_link('<li>%link</li>', 'Prev');
            next_post_link('<li>%link</li>', 'Next');
            echo '</ul>';
        }
    }

    /*==== Call custom meta ====*/
    function tt_meta($meta = '', $check = false) {
        global $post;
        $id = $post->ID;

        if($check) {
            global $posts;
            $id = (!empty($posts[0])) ? $posts[0]->ID : $id;
        }

        if(''!==$meta){

            $meta_box = get_post_meta( $id, THEME_NAME.'_'.$meta, true);

            if(''===$meta_box){

                $meta_box = get_post_meta( $id, 'tesla_theme_'.$meta, true);

            }

        }else{

            $meta_box = get_post_meta( $id, $meta, true);

        }

        return $meta_box;
    }

    /*==== Call meta 'slider option' ====*/
    function tt_options($name, $pattern = false, $return = false) {
        $meta = tt_meta('slide_options');
        $meta = $meta[$name];

        if(!empty($meta)){
            if(!empty($pattern)) {
                echo sprintf($pattern, $meta);
            }else {
                if(!empty($return)){
                    return $meta;
                }else {
                    echo $meta;
                }
            }
        }
    }

    /*==== Call custom terms ====*/
    function tt_term($name) {
        $terms  = get_terms($name);
        $sep    = '&nbsp;,&nbsp;';
        $ter    = '';
        $i      = 0;

        if(!empty($terms)) {
            foreach ($terms as $term) {
                if($i > 0){ $ter .= $sep; }                
                $ter .= ucfirst( $term->name );
                $i++;
            }
       }

       echo $ter;
    }

    /*==== Shortcodes ====*/
    require_once get_template_directory().'/functions/shortcodes.php';

    /*==== Portfolio switcher ====*/
    function tt_portfolio_switcher() {
        $portfoilo_switcher     = tt_meta('portfolio_view');
        $size                   = 'span12';

        if($portfoilo_switcher == 0) {
            $size = 'span12';
        }else if($portfoilo_switcher == 2) {
            $size = 'span6';
        }else if($portfoilo_switcher == 3) {
            $size = 'span4';
        }else if($portfoilo_switcher == 4) {
            $size = 'span3';
        }

        echo $size;
    }

    /*=== Portfolio Filters ====*/
    function tt_portfolio_filters($meta) {
        $filters = get_terms($meta);
        $fil_arr = array();
        $fill_switcher = tt_meta('show_filters');
        $output = '';

        if(!empty($filters)) {
            foreach ($filters as $filter) {
                $fil_arr[$filter->slug] = $filter->name;
            }
        }
        
        if(!empty($fil_arr)){
            $output = ' <ul class="filter"><li><a class="active" href="#">'.__('All', tt_domain_theme()).'</a></li>';
            
            foreach ($fil_arr as $key => $val) {
                $output .= sprintf(' <li>/<a href="#" data-category="%1$s">%2$s</a></li>', $key, $val);
            }
            
            $output .= '</ul>';
        }


        if($fill_switcher == 'on' && !empty($fill_switcher)){
            echo $output;            
        }else {
            return;
        }

    }

    /*==== Use sidebar ====*/
    function tt_use_sidebar() {
        $use_sidebar = tt_meta('page_sidebar');

        if( $use_sidebar == 12) {
            return 12;
        }else if($use_sidebar == 21){
            return 21;
        }
    }

    /*==== Setup the pagination for the potfolio ====*/
    function tt_portfolio_pagination() {
        $meta       = tt_meta('portfolio_items_per_page');
        $paged      = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $settings   = '';

        if($meta > 0 && !empty($meta)){
            $settings = array('query' => array('paged' => $paged, 'posts_per_page' => $meta));
        }

        return $settings;
    }

    /*==== Enable masonry blog ====*/
    function tt_masonry_blog() {
        $column = (int)tt_meta('blog_columns_num');

        if($column > 1) {
            return true;
        }
        return false;
    }

    function tt_masonry_columns() {
        $column     = (int)tt_meta('blog_columns_num', true);
        $col        = 'span4';
        if($column == 2){
            $col = 'span6';
        } else if($column == 3) {
            $col = 'span4';
        } else if ($column == 4) {
            $col = 'span3';
        }

        return $col;
    }

    /*==== Contact map title ====*/
    function tt_option_check($id = false, $pattern = false) {
        if(!empty($id) && !empty($pattern)) {
            $title = _go($id);
            if(!empty($title)) {
                echo sprintf($pattern, $title);            
            }            
        }
    }

    /*==== Contact form ====*/
    function tt_contact_form() {
        $check = _go('contact_form');
        $email = _go('email_contact');
        $form  = '';
        $arg   = array(
                'name'      => __('Name', tt_domain_theme()),
                'email'     => __('E-mail', tt_domain_theme()),
                'website'   => __('Website', tt_domain_theme()),
                'message'   => __('Message', tt_domain_theme()),
            );
        
        if(!empty($check) && !empty($email)) {
            tt_option_check('contact_form_title', '<h3>%s</h3>');
            tt_option_check('contact_form_intro', '<p>%s</p>');

            $form = '<form class="contact_form">';
            foreach ($arg as $key => $val) {
                $form .= sprintf('<p>%s</p>', $val);

                if($key == 'message') {
                    $form .= sprintf('<textarea name="%s" class="contact_area"></textarea>', $key);
                }else {
                    $form .= sprintf('<input type="text" name="%s" class="contact_line" />', $key);
                }
            }
            $form .= ' <input type="submit" value="'. __('send', tt_domain_theme()) .'" class="contact_button">';
            $form .= '</form>';
        }
        echo $form;
    }

    /*==== Ajax send contact form ====*/
    function tt_ajax_contact_form () {
        $receiver_mail = _go('email_contact');
        $mail_title    = ( ! empty( $_POST[ 'website' ] )) ? $_POST[ 'name' ] . __(' from ', tt_domain_theme()) . $_POST[ 'website' ] : ' ';

        /* SECTION II - CODE */

        if ( !empty( $_POST[ 'name' ] ) && !empty( $_POST [ 'email' ] ) && !empty( $_POST [ 'message' ] ) ) {
            $email   = $_POST[ 'email' ];
            $message = $_POST[ 'message' ];
            $message = wordwrap( $message, 70, "\r\n" );
            $subject = $mail_title;
            $header = __('From: ', tt_domain_theme()) . $_POST[ 'name' ] . "\r\n";
            $header .= __('Reply-To: ', tt_domain_theme()) . $email;
            if ( @mail( $receiver_mail, $subject, $message, $header ) )
                $result = __('Message successfully sent.', tt_domain_theme());
            else
                $result = __('Message could not be sent.', tt_domain_theme());
        } else {
            $result  = __('Please fill all the fields in the form.', tt_domain_theme());
        }
        die($result);
    }
    add_action('wp_ajax_tt_ajax_contact_form', 'tt_ajax_contact_form');           // for logged in user  
    add_action('wp_ajax_nopriv_tt_ajax_contact_form', 'tt_ajax_contact_form');    // if user not logged in

    /*==== Contact info area ====*/
    function tt_contact_info() {
        $arr = array(
                'phone'      => _go('contact_phone'),
                'fax'        => _go('contact_fax'),
                'mail'      => _go('email_contact'),
                'location'   => _go('contact_address')
            );
        $info = '';

        if(!empty($arr)) {
            $info = '<ul class="contact_widget_2">';
            foreach ($arr as $key => $val) {
                if(!empty($val)) {
                    if($key == 'email') {
                        $info .= sprintf('<li class="%1$s"><a href="mailto:%2$s">%2$s</a></li>', $key, $val);
                    }else {
                        $info .= sprintf('<li class="%1$s">%2$s</li>', $key, $val);                    
                    }                    
                }
            }

            $info .= '</ul>';
            
        }      
        echo $info;
    }

    /*==== Custom CSS / Color changer / Site background ====*/
    function electra_css(){
        $background_image = _go('bg_image');
        $background_position = _go('bg_image_position');
        $background_repeat = _go('bg_image_repeat');
        $background_attachment = _go('bg_image_attachment');
        $background_color = _go('bg_color');

        if(is_page()){

            $tt_page_background = tt_meta('page_background');

            if(!empty($tt_page_background)){

                $background_image = $tt_page_background['url'];
                $background_position = 'Center';
                $background_repeat = 'Tile';
                $background_attachment = 'Fixed';
                $background_color = 'transparent';

            }

        }

        echo '<style type="text/css">';
        echo '.electra_custom_background{';
        if(!empty($background_image))
            echo 'background-image: url('.$background_image.');';
        if(!empty($background_position)){
            echo 'background-position: ';
            switch($background_position){
                case 'Left':
                    echo 'top left';
                    break;
                case 'Center':
                    echo 'top center';
                    break;
                case 'Right':
                    echo 'top right';
                    break;
                default:
                    break;
            }
            echo ';';
        }
        if(!empty($background_repeat)){
            echo 'background-repeat: ';
            switch($background_repeat){
                case 'No Repeat':
                    echo 'no-repeat';
                    break;
                case 'Tile':
                    echo 'repeat';
                    break;
                case 'Tile Horizontally':
                    echo 'repeat-x';
                    break;
                case 'Tile Vertically':
                    echo 'repeat-y';
                    break;
                default:
                    break;
            }
            echo ';';
        }
        if(!empty($background_attachment)){
            echo 'background-attachment: ';
            switch($background_attachment){
                case 'Scroll':
                    echo 'scroll';
                    break;
                case 'Fixed':
                    echo 'fixed';
                    break;
                default:
                    break;
            }
            echo ';';
        }
        if(!empty($background_color))
            echo 'background-color: '.$background_color.';';
        echo '}';
        $default = _go('site_color');
        if(empty($default))
            $default = '#22948f';
        ?>
        a:hover {
            color: <?php echo $default; ?>;
        }
        .logo img {
            background-color: <?php echo $default; ?>;
        }
        .color_scheme select:focus {
            border-color: <?php echo $default; ?>;
        }
        .color_scheme li span.color_1 {
            background-color: <?php echo $default; ?>;
        }
        .widget ul li a:hover {
            color: <?php echo $default; ?>;
        }
        .attention_message h2 span {
            color: <?php echo $default; ?>;
        }
        .boxed_fluid.black_version .blog_article .entry-header a:hover,
        .boxed_fluid.black_version .contect_bg .accordion_v2 .accordion-heading.active span {
            color: <?php echo $default; ?>;
        }
        .header .menu ul li.current_page_item a,
        .header .menu ul li a:hover,
        .header .menu ul li:hover a {
            border-bottom-color: <?php echo $default; ?>;
        }
        .header .menu ul li .children li .children li a:hover,
        .header .menu ul li .sub-menu li .sub-menu li a:hover,
        .header .menu ul li .children li:hover a,
        .header .menu ul li .sub-menu li:hover a,
        .header .menu ul li .children li a:hover, 
        .header .menu ul li .sub-menu li a:hover {
            color: <?php echo $default; ?>;
        }
        .header .menu ul li .children li:hover .children,
        .header .menu ul li .sub-menu li:hover .sub-menu {
            border-top-color: <?php echo $default; ?>;
        }
        .filter li a.active,
        .filter li a:hover {
            color: <?php echo $default; ?>;
            border-bottom-color: <?php echo $default; ?>;
        }
        .portfolio .portfolio_item .item_hover .item_tags li a {
            color: <?php echo $default; ?>;
        }
        .tabs .tab_nav li.active a {
            border-top-color: 5px solid <?php echo $default; ?>;
        }
        .tabs .tab-content .tab_title a:hover {
            color: <?php echo $default; ?>;
        }
        .button_color {
            background-color: <?php echo $default; ?>;
        }
        .error_404 .error_text span span {
            color: <?php echo $default; ?>;
        }
        .pricing_table_2 .pt_button {
            background-color: <?php echo $default; ?>;
        }
        .accordion-heading.active span {
            color: <?php echo $default; ?>;
        }
        .skills .skill_cover .skill {
            background-color: <?php echo $default; ?>;
        }
        .input_button {
            background-color: <?php echo $default; ?>;
        }
        .page-numbers li a.active,
        .page-numbers li a:hover {
            color: <?php echo $default; ?>;
            border-bottom-color: <?php echo $default; ?>;
        }
        .share_it .socials_2 li a:hover {
            background-color: <?php echo $default; ?>;
        }
        .contact_widget li a:hover {
            color: <?php echo $default; ?>;
        }
        .contact_widget_2 li a:hover {
            color: <?php echo $default; ?>;
        }
        .twitter_widget li a {
            color: <?php echo $default; ?>;
        }
        .blog_article .entry-header a:hover {
            color: <?php echo $default; ?>;
        }
        .blog_article .entry-footer ul li a:hover {
            color: <?php echo $default; ?>;
        }
        .blog_ws .blog_article .button_white:hover {
            background-color: <?php echo $default; ?>;
            border-color: <?php echo $default; ?>;
        }
        .event .event_title a:hover {
            color: <?php echo $default; ?>;
        }
        .boxed_fluid.black_version .our_team_bg .our_team {
            background-color: <?php echo $default; ?>;
        }
        .recent_posts .recent_post .recent_post_title a:hover {
            color: <?php echo $default; ?>;
        }
        .service .service_activ {
            background-color: <?php echo $default; ?>;
        }
        .related_services h3 a:hover {
            color: <?php echo $default; ?>;
        }
        .custom-content-reveal span.custom-content-close {
            background-color: <?php echo $default; ?>;
        }
        .custom-content-reveal h4 {
            border-top-color: <?php echo $default; ?>;
        }
        .custom-content-reveal a {
            color: <?php echo $default; ?>;
        }
        .fc-calendar .fc-row > div.fc-content:hover:after{
            color: <?php echo $default; ?>;
        }
        .color_scheme select:focus {
            border-color: <?php echo $default; ?>;
        }
        .input_button,
        .logo img,
        .skills .skill_cover .skill,
        .share_it .socials_2 li a:hover,
        .pricing_table_2 .pt_button,
        .custom-content-reveal span.custom-content-close,
        .service .service_activ,
        .our_team_bg,
        .button_color {
            background-color: <?php echo $default; ?>;
        }
        .boxed_fluid.black_version .blog_article .entry-header a:hover,
        .boxed_fluid.black_version .contect_bg .accordion_v2 .accordion-heading.active span,
        .widget ul li a:hover,
        a:hover,
        .blog_article .entry-header a:hover,
        .twitter_widget li a,
        .blog_article .entry-footer ul li a:hover,
        .contact_widget_2 li a:hover,
        .contact_widget li a:hover,
        .accordion-heading.active span,
        .error_404 .error_text span span,
        .header .menu ul li .children li .children li a:hover,
        .header .menu ul li .sub-menu li .sub-menu li a:hover,
        .header .menu ul li .children li:hover a,
        .header .menu ul li .sub-menu li:hover a,
        .event .event_title a:hover,
        .fc-calendar .fc-row > div.fc-content:hover:after,
        .custom-content-reveal a,
        .related_services h3 a:hover,
        .recent_posts .recent_post .recent_post_title a:hover,
        .header .menu ul li .children li a:hover,
        .header .menu ul li .sub-menu li a:hover,
        .portfolio .portfolio_item .item_hover .item_tags li a,
        .tabs .tab-content .tab_title a:hover {
            color: <?php echo $default; ?>;
        }
        .header .menu ul li.current_page_item a,
        .header .menu ul li a:hover,
        .header .menu ul li:hover a {
            border-bottom-color: <?php echo $default; ?>;
        }
        .tabs .tab_nav li.active a,
        .custom-content-reveal h4,
        .header .menu ul li .children li:hover .children,
        .header .menu ul li .sub-menu li:hover .sub-menu {
            border-top-color: <?php echo $default; ?>;
        }
        .page-numbers li a.active,
        .page-numbers li a:hover,
        .filter li a.active,
        .filter li a:hover {
            color: <?php echo $default; ?>;
            border-bottom-color: <?php echo $default; ?>;
        }
        .blog_ws .blog_article .button_white:hover {
            background-color: <?php echo $default; ?>;
            border-color: <?php echo $default; ?>;
        }
        .footer .widget ul li {
            color: <?php echo $default; ?>;
        }
        #wp-calendar tfoot td a:hover {
            color: <?php echo $default; ?>;
        }
        <?php
        echo _go('custom_css');
        echo '</style>';
    }
    add_action('wp_head','electra_css',1000);

    /*==== Register plugins ====*/
    if ( is_admin() && current_user_can( 'install_themes' ) ) {
        require_once( get_template_directory() . '/lib/tgm-plugin-activation/register-plugins.php' );
    }

    /*==== Custom form title ====*/
    function tt_cutom_form_title($pattern = '<h3>%s</h3>') {
        $title = _go('custom_form_title');

        if(!empty($title)) {
            echo sprintf($pattern, $title);            
        }else {
            return;
        }
    }

    /*==== Custom form fields ====*/
    function tt_form_fields($fields) {
        $output     = '';
        $span       = 'span12';
        $i          = 0;

        if(!empty($fields)) {
            foreach ($fields as $key => $val) {
                $i++;
                if(!empty($val['custom_input_type'])) {
                    if($val['custom_input_size'] === '12') {
                        $span = 'span12';
                    } else if($val['custom_input_size'] === '6') {
                        $span = 'span6';
                    }
                }

                $output .= '<div class="row-fluid"><div class="'.$span.'">';
                    if(!empty($val['custom_input_label'])){
                        $output .= sprintf('<p>%s</p>', $val['custom_input_label']);                    
                    }
                    if(!empty($val['custom_input_type'])) {
                        $type = $val['custom_input_type'];
                        $n = 'field_'. $i;

                        if($type === 'text' || $type === 'email') {
                            $output .= sprintf(' <input type="text" name="%1$s" value="%2$s" placeholder="%3$s"  class="input_line" />', $n, $val['custom_form_value'], $val['custom_form_placeholder']);
                        }
                        if($type === 'select') {
                            $n = 'field_'. $i;
                            if(!empty($val['custom_form_value'])) {
                                $options    = '';
                                $content    = str_replace(', ', ',', $val['custom_form_value']);
                                $content    = explode(',', $content);
                                $content    = array_filter($content);
                                $j          = 0;

                                if(!empty($val['custom_form_placeholder'])) {
                                    $options .= sprintf('<option value="0">%2$s</option>', $j, $val['custom_form_placeholder']);
                                }

                                foreach ($content as $key => $val) {
                                    $j++;
                                    $options .= sprintf('<option value="%1$s">%2$s</option>', $val, $val);
                                }
                            }
                            $output .= sprintf('<select name="%1$s" class="select_line">%2$s</select>', $n, $options);
                        }
                        if($type === 'textarea') {
                            $output .= sprintf(' <textarea name="%1$s" value="%2$s" placeholder="%3$s" class="input_area"></textarea>', $i, $val['custom_form_value'], $val['custom_form_placeholder']);
                        }
                    }
                 $output .= '</div></div>';
            }

        }
        return $output;
    }

    /*==== Custom form builder ====*/
    function tt_custom_form_builder() {
        $fields = _go_repeated('Form builder');
        $output = '';
        $left = array();
        $right = array();
        $offset = 'offset2';
        $before_submit = _go('custom_form_info');
        $button = _go('custom_form_button');

        if(!empty($fields)) {
            $output = '<form class="project_form"><div class="row">';
            foreach ($fields as $key => $val) {
                if($val['custom_input_position'] == '1') {
                    $left[] = $val;
                }else {
                    $right[] = $val;                    
                }
            }

            $output .= ' <div class="span5">';
            if(!empty($left)) {
                $output .= tt_form_fields($left);
            }else {
                $offset = 'offset7';
            }
            $output .= ' </div>'; 
            if(!empty($right)) {
                $output .= ' <div class="span5 '.$offset.'">';
                $output .= tt_form_fields($right);
                $output .= ' </div>';
            }
            $output .= ' <div class="span5 offset7">';
            if(!empty($before_submit)) {
                $output .= sprintf('<h5>%s</h5>', $before_submit);                
            }
            if(empty($button)) {
                $button = 'send';
            }
            $output .= sprintf('<input type="submit" value="%s" class="input_button">', $button);
            $output .= ' </div>';
            $output .= '</form></div>';
        }

        return $output;
    }

     /*==== Ajax send contact form ====*/
    function tt_ajax_custom_form () {
        $receiver_mail = _go('custom_form_email');
        $mail_title    = '"'._go('custom_form_title').'" - form was sent';
        $fields        = _go_repeated('Form builder');
        $i = '';

        $message = '<table><tbody>';
            foreach ($fields as $key => $val) {
                $i++;
                $message .= sprintf('<tr><td>%1$s</td><td>%2$s</td></tr>', $val['custom_input_label'], $_POST['field_'.$i]);
            }
        $message .= '</tbody></table>';

        $header = 'Submited form from -' . get_bloginfo('name');

        if ( @mail( $receiver_mail, $mail_title, $message, $header ) )
                $result = __('Message successfully sent.', tt_domain_theme());
            else
                $result = __('Message could not be sent.', tt_domain_theme());

        die($result);
    }
    add_action('wp_ajax_tt_ajax_custom_form', 'tt_ajax_custom_form');           // for logged in user  
    add_action('wp_ajax_nopriv_tt_ajax_custom_form', 'tt_ajax_custom_form');    // if user not logged in

    /*==== Countdown title ====*/
    function tt_countdown_title() {
        $title = tt_meta('countdown_title');

        if(!empty($title)) {
            echo sprintf('<div class="countdown_title">%s</div>', $title);
        }
    }

    /*==== Countdown search box ====*/
    function tt_countdown_form() {
        $check = tt_meta('countdown_search');

        if(empty($check)) {
            get_search_form();
        }
    }

    /*==== Countdown date helper ====*/
    function tt_date_helper($id) {
        $date = tt_meta($id);
        
        if(!empty($date)) {
            echo date("m/d/Y", strtotime($date));            
        }
    }

    /*==== Tracking code ====*/
    function tt_footer(){
        echo _go('tracking_code');
    }
    add_action('wp_footer','tt_footer',1000);

    /*==== Single page switcher ====*/
    function tt_single_switcher($url = false) {
        $the_query = new WP_Query(array(
            'post_type'  => 'page',  /* overrides default 'post' */
            'meta_key'   => '_wp_page_template',
            'meta_value' => 'template-blog.php'
            ));
        $posts = $the_query->posts;
        $id = array();
        $meta = array();

        foreach ($posts as $key => $val) {
            $id[] = $val->ID;        
        }

        foreach($id as $value) {
            $meta[] = get_post_meta( $value, THEME_NAME . '_single_blog_opt', true);
        }

        $arr_switcher   = array_combine($id, $meta);
        $curr_id        = parse_url($url);
        parse_str($curr_id['query'], $curr_id);
        $curr_id        = $curr_id['page_id'];

        if(array_key_exists($curr_id, $arr_switcher)) {
            return $option = $arr_switcher[$curr_id];
        }
    }

    /*==== Add evets on the calendar ====*/
    function tt_events_calendar(){
        # Load the posts  
        wp_reset_query();
        $s = query_posts(array(
                          'post_type'=> 'electra_calendar'
                          )
        );

        $ev = array();
        foreach ($s as $key => $val) {
            $meta =  $meta_box = get_post_meta($val->ID, 'slide_options', true);
            $ev[date('m-d-Y', strtotime($meta['date_calendar']))] = $val->post_content;
        }
        $events = json_encode($ev);
        die($events);
    }

    add_action('wp_ajax_tt_events_calendar', 'tt_events_calendar');           // for logged in user  
    add_action('wp_ajax_nopriv_tt_events_calendar', 'tt_events_calendar');    // if user not logged in

?>