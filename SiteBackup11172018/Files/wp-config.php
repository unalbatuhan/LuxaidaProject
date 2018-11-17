<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'lux3353_db');


/** MySQL database username */
define('DB_USER', 'lux3353_dbusr');


/** MySQL database password */
define('DB_PASSWORD', 'E{REOcTg7Kou');


/** MySQL hostname */
define('DB_HOST', 'localhost');


/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');


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
define('AUTH_KEY',         'Ti[4Bxp1^02U=1sj1TQie-`?|h/b:D&p,lrC9s289r532;|jHd[@AAo^3q*cBBB<');

define('SECURE_AUTH_KEY',  'r9{}2oi?}#,sqdV2G//28rmAL}i;d`i8dD!H}9M4+ZG >3N-b/`g+4,JqR|ZniKF');

define('LOGGED_IN_KEY',    'B*#/yq,WK~|Oj4@W>HV:dtKzjy rcN:0!{fzr<q-%W5IRItdEo^(k$bL>PKcD*$r');

define('NONCE_KEY',        '+DjR2;S/.I7$+Ks<B{qSlJMIlEPP8{]><2M-aYGt]brlA_2k]uUfY@%E/WI:jTws');

define('AUTH_SALT',        'nb9[.@E&3<{I^jIb4SNM1_zEZL:eNR+-OV%E:SP%f8Yu-|h=MeGNns5D=<bo64jl');

define('SECURE_AUTH_SALT', '9y.d8`6l~^Q?%Xi^!nI<OaEPQcfvQ3^r+vOH}?g80Q.aRTA@w~!h55ihfS4[?w 6');

define('LOGGED_IN_SALT',   '_k[o3&}Q`C){@QhsT:wa%/;76CH$6XX/.it;FG,WaqT@igBV?(;W=zJxC+bMvh+Z');

define('NONCE_SALT',       'iNd}]lV1wf$3MHfW19)line|cg3K5yAbsMI{kXUhqg:aV2[2D[@+h%ixy<0a]ml^');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lux_';


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);


define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'luxaida.com');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
/* That's all, stop editing! Happy blogging. */
define('WP_ALLOW_MULTISITE',true);

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** Auto WP Update Control*/
define( 'AUTOMATIC_UPDATER_DISABLED', true );
