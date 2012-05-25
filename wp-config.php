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

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'marianne');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'N_uG&77!c7qvgX1e=.j#8GLA}Bcj1b6^|e1e>~m[n=A;wyV%mWF$?P<pcmAJQ9s9');
define('SECURE_AUTH_KEY',  '@~1]>Z2jw%9/e Ff%9s7## n6.d)Td4Eg]IHjdH+k4@Sq-7qX??W.+#`C@z02o@f');
define('LOGGED_IN_KEY',    'lt5ANu=q|iO{GpJO:bmr/zQ0s/;;PkXUn?B]we?zls_}W3D{2S2j7=qri<[bGCd&');
define('NONCE_KEY',        'o$S;LIJLT`_0HRc2`I}f3K^2PEdr+n/Bk,yNyNc(R/w#rl}N]8+=f<w$l#h/@B~~');
define('AUTH_SALT',        'Onw7Wh-y@AYqoG_dW!^m|TSL._/w]qEPxt0KF,?0Bwc#Y5RY$ _Lzw=grr3?#pVu');
define('SECURE_AUTH_SALT', 'l$hIwml,0I;X{i%qLMM?p[qnF8D`bSR|U{auK:;GeUd=@a%P}8N3Y,wYAptJ0SuU');
define('LOGGED_IN_SALT',   'WO!$)97RJ1,2;RYJrfkkX].<8t|a~.!$3e ?wzT;.)3Z|J$aeH2IK[eOfdU`Q%D^');
define('NONCE_SALT',       'M+ObX^MXNrP<1H]rmTV5e9w_#4AGxh?5~^l8b!/!y)D$]r@;&IFLhkd#J?4V3y#R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
