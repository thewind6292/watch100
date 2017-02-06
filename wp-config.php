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
define('DB_NAME', '2017tt_watch100');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');
// define('DB_PASSWORD', '');
/** MySQL hostname */
define('DB_HOST', '192.168.2.17');
// define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'h!$M=[2z;U>AZB33r4qF04X L|Ty$C5AdvRpOx>_$,a{lZmQ`j@!=.NkT}F07&{g');
define('SECURE_AUTH_KEY',  ', {#mm5!C^,Zg$>Dqrk1PCL/=S>LY@R~(r?/|J/Gz~i5A#4-[{z[b?$kq7Y{bg=Q');
define('LOGGED_IN_KEY',    '`Q+1K!%UXZg!5pwj[r|ab~z9a4v]W,_^lpZHq 5XH]br,P9%K1/(FrHOvnJ83c[B');
define('NONCE_KEY',        '<Na<W7 @|(`+(50|+]DT|?q$I6)1T]m{<cpjL7tq^GpFf*)zjkZG`NSXK_ih;.L*');
define('AUTH_SALT',        'w$l7$?aN6|-iZJug[8CfeBtT e?]iGtO2%&|7TTLL7Lxu^1S},1|A~O`TwCQBAiF');
define('SECURE_AUTH_SALT', '1G`[oU|iqY#EC!{[,/ Bpnx&sUJ-R7*1JADJ5QS9SLJr2W`&@{}V6(Ir>0gz[aHN');
define('LOGGED_IN_SALT',   'Rj]MSqf$VbYK`%zyOXE*;@44G]67!GD$}Gh.N_3vWAuwF_uTW|6ok`6$A~rox~jY');
define('NONCE_SALT',       'wt$XN?2+Mt#(Dm)K0u%Tz.!wVyOOl=:SM|B)5v(de&$=w?scxbyGW}*h:sj+i#6j');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
