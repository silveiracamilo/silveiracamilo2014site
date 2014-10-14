<?php

/**
* 
*/
class TeslaMenu
{
	public $menu, $domain, $defaults;
	
	function __construct($menu, $domain)
	{
		$this->menu = $menu;
		$this->domain = $domain;

		add_action('init', array($this, 'register_menu'));
	}

	public function register_menu()
	{

		foreach ($this->menu as $value) {
			$menu[strtolower(str_replace(" ", "_", $value))] = __($value, $this->domain);
		}

		register_nav_menus($menu);
	}
}