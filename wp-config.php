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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'www_kabobot_cn' );

/** Database username */
define( 'DB_USER', 'www_kabobot_cn' );

/** Database password */
define( 'DB_PASSWORD', 'HyjbmnhQNs' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'fKX` lD=-b^:,M.W>(e&=4>m{)bN/$lW e(;>r?0xsSZ_<}lqAp~]&p=fv%?uQSu' );
define( 'SECURE_AUTH_KEY',  's=jxiL_R{PzCa(t9HFEM:wbkHC;^o?^SyYwI+MVt)f{4q`Jg>^GZx)x#7ZqI&bA}' );
define( 'LOGGED_IN_KEY',    '-HJur;qt_6#]T+76#vvc$KtK)1exJZwwE73WS/rD&(-EU uEERec)xV%66Ws<O9i' );
define( 'NONCE_KEY',        'w?Fugdv>{&U`dz%Vwk.8BCjs|s;IUE$u*+I6MF+yZhF [v(5vZzu**pNXD)>(S@~' );
define( 'AUTH_SALT',        'BM5qJQp(Xg+aWp.gtA,88626Mc{+cH9A*=.XM;Ys uAS|4uE#W1~U#K,OI+LmVs^' );
define( 'SECURE_AUTH_SALT', ']y^;ov>G+PpcP|Pbav{osr/r,y}RZSw`DO{JEpQ2Z#E6|QVv9Ja=i;&BiEImMY~q' );
define( 'LOGGED_IN_SALT',   ';Avy]$E56Lwh9y[3Mi::1-o>r-% ;d;-@e]9cTsG@4XFkd4uX$9vPWXq,yuF%-od' );
define( 'NONCE_SALT',       'j=Qx$q.UXf_`pjC]!q?L]EZm2tJQZ..OdX*gx$]no3*&{wslZ<G,3I$Yn)pL]^&$' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
