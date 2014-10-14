<?php
define('THEME_NAME', 'electra');
define('THEME_PRETTY_NAME', 'Electra');

//Load Textdomain
add_action('after_setup_theme', 'theme_textdomain_setup');
function theme_textdomain_setup(){
	load_theme_textdomain('electra', get_template_directory() . '/languages');
}

//content width
if (!isset($content_width))
    $content_width = 960;

//============Theme support=======
//post-thumbnails
add_theme_support('post-thumbnails');
//add feed support
add_theme_support('automatic-feed-links');