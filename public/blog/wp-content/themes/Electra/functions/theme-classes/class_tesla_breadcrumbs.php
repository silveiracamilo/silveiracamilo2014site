<?php

/**
* Tesla breadcrumbs
*/
class TeslaBreadcrumbs
{
	private $home, $sep;
	
	function __construct()
	{
		$this->home = 'Home';
		$this->sep = ' / ';
	}

	function the_breadcrumbs()
	{
		global $post;
		$breadcrumbs = '';

		if (!is_front_page()) {

			$breadcrumbs = "<a href='" . home_url() . "'>$this->home</a>";
 
            if (is_category() || is_single()) {
 
                $breadcrumbs .= $this->sep;
                $cats = get_the_category( $post->ID );
 
                foreach ( $cats as $cat ){
                 	$breadcrumbs .= $cat->cat_name;
                    $breadcrumbs .= $this->sep;
                }
                if (is_single()) {
                    $breadcrumbs .= get_the_title();
                }
            } elseif (is_page()) {
 
                if($post->post_parent){
                    $anc = get_post_ancestors( $post->ID );
                    $anc_link = get_page_link( $post->post_parent );
 
                    foreach ( $anc as $ancestor ) {
                        $breadcrumbs .= $this->sep . "<a href=".$anc_link.">".get_the_title($ancestor)."</a> ". $this->sep;
                    }

                    $breadcrumbs .= get_the_title();
 
                } else {
                    $breadcrumbs .= $this->sep;
                    $breadcrumbs .= get_the_title();
                }
            }
        }
    elseif (is_tag()) {$breadcrumbs = single_tag_title();}
    elseif (is_day()) {$breadcrumbs = "Archive: " . the_time('F jS, Y');}
    elseif (is_month()) {$breadcrumbs = "Archive: " .the_time('F, Y');}
    elseif (is_year()) {$breadcrumbs = "Archive: " . the_time('Y');}
    elseif (is_author()) {$breadcrumbs = "Author's archive: ";}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {$breadcrumbs ="Blogarchive: ";}
    elseif (is_search()) {$breadcrumbs = "Search results: "; }
		
	return $breadcrumbs;

	}

}