<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/humanvoi/public_html/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'humanvoi_wp_0evo9' );

/** Database username */
define( 'DB_USER', 'humanvoi_wp_yu87m' );

/** Database password */
define( 'DB_PASSWORD', 'Ahmad8585@' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISABLE_WP_CRON', true);

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '366A|Eu!k834442MrQ49aF|J(5Fgx|_#-83;:R8&5h(#deE479Zja5926lDYe0Tc');
define('SECURE_AUTH_KEY', '4WqAc|#N94hSeD11m570B7~3~9l+~#YZf+0gl[9jh~8IF2_28zSA~3H)qE7b;m(U');
define('LOGGED_IN_KEY', '1(:xU8_8JE23LJD)AkbEtWL4sUGU5u16ADNVbi2_:jYfY84]9w[thJF#)VCBXzPa');
define('NONCE_KEY', 's43!kH~l8yh%Q_CRe4sd2T)6o%R@H)Os5mO#tzcB63:Q8S/]S~7xN5p+X]dL(/2/');
define('AUTH_SALT', ')6t@U06D:U_@#r~&O3Ps]1@&9GLlt9[0+p7i9kS4R7kB16+nY2(6oWqWWw!uA2~[');
define('SECURE_AUTH_SALT', '3K4S:4@(kI+G0j5U6_x|K]c2!-d4z2mxu27yTQG6u0:x8@w@dw*8@~57k:ruPVl~');
define('LOGGED_IN_SALT', '_S-8kM;S!2b6)8qP|ov:1Hl07H2Ccs&*F)5Y/RQg+Xd8LA8ZcMMa8#0bI!UiGnE0');
define('NONCE_SALT', '07;E%xxVUs2ErSqI_QQa]Kosl:!B2YK@nw7~lH1nBxf!%+Ww(0+Z2l);Ou7~!F;0');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'F1AZHo4_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';