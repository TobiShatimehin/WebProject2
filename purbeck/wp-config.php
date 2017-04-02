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
define('DB_NAME', 'i7420725');

/** MySQL database username */
define('DB_USER', 'i7420725');

/** MySQL database password */
define('DB_PASSWORD', 'a18b8a4dded2d7ca3c42874d7027437d');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         ')[W*x)tgLwq5f}$lD]2Ww>9)>dOV~wWV,c(_DdtKW=.`_,Z5m#W-3rx$/+<!T$X?');
define('SECURE_AUTH_KEY',  ')?qm_/J#MEshU*-R)jHG98~(b:&Rue<`x(fLCm]AM~v+#hrd(dA;mK]]2VW=txJ(');
define('LOGGED_IN_KEY',    '6zUTj.9u`Cw09+mUlLHR~[A<[-d=Bw1@6lC> 0<6Rohm!II6=C$Z+U2MlgN0nPlj');
define('NONCE_KEY',        'OH)b9m}yx3Pq&eS5; ]#M7Ov#_=iX1ucBB#gEPbfz`9Y]6LAs6CvqMx=2Mo?clvf');
define('AUTH_SALT',        '<=7ZT1%R< LU$fOa$P:M*&;7-`V9)m|wEe%*OTnV@D$0-t/SDWYZuu.QJq_Y)E!m');
define('SECURE_AUTH_SALT', '!q$hFT:M&UOrf5Oi6`ZP#PjH|Yo>~wAN4qI`2#Wcd>p9(%0Sg1(#=xtoRi(n?:kc');
define('LOGGED_IN_SALT',   '_M0oD13*`EBoPe[|i<;6q(F<p%~9qW>_xhV{:X9.]gN,:2UD,i)U@EpW-t?Ln+(=');
define('NONCE_SALT',       'cA!0~L>d3xXOOL=>#0@S0-p>ptxBEC|:KxmEJ`3= 7WNnUB,y.S_@y;,%C[eW3p+');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
