<?php
//define TeslaThemesFramework directory name
define('TTF', dirname(__FILE__));
//Load framework constants
require_once TTF . '/config/constants.php';

//Load theme details
require_once TT_THEME_DIR . '/theme_config/theme-details.php';

define('THEME_OPTIONS', THEME_NAME . '_options');

//Load main framework classes
require_once TTF . '/extensions/twitteroauth/twitteroauth.php';
require_once TTF . '/core/teslaframework.php';
require_once TTF . '/core/tesla_admin.php';
require_once TTF . '/core/tt_load.php';
if(file_exists(TTF . '/core/tt_security.php'))
	require_once TTF . '/core/tt_security.php';
else
	exit();
require_once TTF . '/core/tt_enqueue.php';
TT_ENQUEUE::init_enqueue();
//Admin load
$TTA = new Tesla_admin;
//Slider
require_once TTF . '/core/tesla_slider.php';
Tesla_slider::init();
//Subscription
require_once TTF . '/core/tt_subscription.php';
TT_Subscription::subscription_init();