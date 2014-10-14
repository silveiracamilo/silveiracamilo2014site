<?php

/**
* Tesla include scripts and stylesheets
*
*This class do wp_enqueue_scripts;
*/

class TeslaIncludes
{
	public $js_dir = "js";
	public $css_dir = "css";
	public $main_js = "options";
	private $file_arr = array('share_this' => 'http://w.sharethis.com/button/buttons.js');
	public $styles = array('bootstrap', 'style');
	private $font = "://fonts.googleapis.com/css?family=Enriqueta:400,700|Open+Sans:400italic,700italic,400,600,700";
	private $tesla_font_changer = '';
	
	function __construct()
	{
		add_action("wp_enqueue_scripts",array($this, 'load_scripts'));
		add_action("wp_enqueue_scripts",array($this, 'load_stylesheet'));
	}

	private function get_scrips()
	{
		$files = scandir(get_template_directory() . '/' . $this->js_dir);

		foreach($files as $file)
		{
			$file_parts = pathinfo($file);

			if($file_parts['extension'] == "js")
		    	$file_arr[$file_parts['filename']] = $file;
		}
		return($file_arr);
	}

	public function load_scripts()
	{
		foreach ($this->file_arr as $key => $value) {
			wp_enqueue_script($key, $value, array('jquery'), false, true);
		} 

		foreach ($this->get_scrips() as $name => $script)
		{
			if($this->main_js != $name)
				wp_enqueue_script($name, get_template_directory_uri() . '/'. $this->js_dir .'/'. $script, array('jquery'), false, true);
		}
		
		wp_enqueue_script($this->main_js, get_template_directory_uri() . '/'. $this->js_dir .'/'. $this->main_js .'.js', array('jquery'), false, true);
		
		if ( is_singular() ) 
			wp_enqueue_script( "comment-reply" );

	}

	public function load_stylesheet()
	{
		$protocol = is_ssl() ? 'https' : 'http';
		$font = $protocol . $this->font;
		wp_enqueue_style( 'custom-font', $font);
		wp_enqueue_style( 'theme-style', get_stylesheet_uri() );

		if(!empty($this->tesla_font_changer)){
	        $font = str_replace(' ', '+', $this->tesla_font_changer);
	        wp_enqueue_style( 'tesla-custom-font', "$protocol://fonts.googleapis.com/css?family=$font");
	    }

		foreach ($this->styles as $style) {
			wp_enqueue_style( $style . '-style', get_template_directory_uri() . '/' . $this->css_dir . '/' . $style . '.css');			
		}
	}
}