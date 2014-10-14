<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'silveiracamilo2014';

if(!empty(getenv("CLEARDB_DATABASE_URL"))) {
	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

	$hostname = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$database = substr($url["path"],1);
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $database);

/** MySQL database username */
define('DB_USER', $username);

/** MySQL database password */
define('DB_PASSWORD', $password);

/** MySQL hostname */
define('DB_HOST', $hostname);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'C |Ij?u,atRmh%MGA]U;}1A=]BpvUVXCS}3Z)$J>QL6Z+L@oO-c]aE?X/yw::jq.');
define('SECURE_AUTH_KEY',  'n 2y(FH2JZuom&nJ-iIR9w$#0?B/OLd08ju~FY^G~E}qFk{E1Zci6lHS3-nwHHL2');
define('LOGGED_IN_KEY',    'b=IF~3qp)KUIo6gmjxxPFSBMcVZyl_0Fify=!7+F%7<XVgE-V8KS#%=-- FEs+>d');
define('NONCE_KEY',        'QGG~Y,=o9Q4A]#U[OIu/e{<A|,q9)>,ST{!1i}W>~Ld;K)9z&~-fzD$H63-GVjm:');
define('AUTH_SALT',        'nduE9y~,t{Sj? U2--kzmL3`F4t7:|FI@l5:{^s4@m%,KQUUVw=7M>I1S}9&-Rx$');
define('SECURE_AUTH_SALT', ';t?{(=FD,nNW{ALsYCKR;Ny?@<#eq_eW!;qY]N:-1,QN7RbYi27bm*+jd-Qh wLN');
define('LOGGED_IN_SALT',   '$QR7jI(`tWj-#-e_K?^]#Ip[wFb*7=]M`m-G|][|@%}er)J,)1w HmU~<OWmmBsK');
define('NONCE_SALT',       '/<6m2d$IJPbT>xGu|bFw(u9>|I-@EG+jqP_-V.X{$#fuM/h}s.c-|mIOT~-|psW`');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
