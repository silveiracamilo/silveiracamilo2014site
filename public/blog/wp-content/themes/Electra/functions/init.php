<?php 
	require_once('theme-classes/class_tesla_includes.php');
	require_once('theme-classes/class_tesla_menu.php');

	$menu = array('Main menu');
	$tt_menu = new TeslaMenu($menu, 'tesla');

	$tt_includes = new TeslaIncludes();
 ?>