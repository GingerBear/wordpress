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
define('DB_NAME', 'cnwm');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'mysql');

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
define('AUTH_KEY',         'En*F-YmK9mWe]-lHCwal Z8}l%}lhUcpF,O/EzxNDe;=?T^D|+4T3a^lK2M!kx8}');
define('SECURE_AUTH_KEY',  '-4~Eg$c%};Ja!-ooB5adY0iS`W-8@ `#?=%cj 3+$dhQo(M4UCa`c60_Euxvm6Fv');
define('LOGGED_IN_KEY',    '[;:#,K)$m0^lTol4rc$:PkZor6>Ct;=?B|e8}0bFe{ewnaF?T,bDfEMCs(oZ52.*');
define('NONCE_KEY',        'juaTVRs*!v)L)[+T/a+2Gl$b5=26}|+8(frEP3o S]B*&w)(ojrB~|axDY@LDBxZ');
define('AUTH_SALT',        ']`}y@`inWsgoa`t-.,&7/l]1,0}p@Vl[%Dt&B#/4z&EHWXEx[@B3iww*X1=MpNLV');
define('SECURE_AUTH_SALT', 'eZv9+n[<4yJ:APzc!sCPB7}H-)>|QjWTwFyAzGhBLjVWcNAm0k_2 )dii+*UT:.=');
define('LOGGED_IN_SALT',   'PTC HDm~S(JsB}N1Ad+,X_^O^u*W=yh:Nb$BF8218*:q?Qb~LywT:u-Z ?+G<UF|');
define('NONCE_SALT',       'IP+>BCy6lPnlv|Np%?ahXM3,gaJ4p)nnm~i3,o94aEVOsDwzF3A{9vuTDzdKFj6<');

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