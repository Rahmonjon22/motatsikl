<?php
define( 'WP_CACHE', false ); // Added by WP Rocket

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
define( 'DB_NAME', 'mr_biketours' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'tD!cvbwR.XEJ$r5rAMT3b5OnK?GcO:gca6.NbzTH6y+@U|9rN7.?]yX8Y|h[RKdm' );
define( 'SECURE_AUTH_KEY',  '*mtMro`jN]yF~$[0j41d)a8raUB*@(lTN*6oW^eRD54Z3%@9ZMV<w) ,PnnW@z*/' );
define( 'LOGGED_IN_KEY',    ';.`B9y#i+m}8gW}g46m(Ns#9`}E-vlg{5[(b/.^Ux`!MKIw(I?wB#Bq<=<l9[zQr' );
define( 'NONCE_KEY',        'Sykzj!7Lwh:qVT1Scd1!m,[$#~6#r<IwHWX+jz50f3B,nJ.S=<d//iI]Wl!8%)1O' );
define( 'AUTH_SALT',        'F<~15[<[!0!`^GZWXr$w32$)uL8-BOZ1uzDXk-$_:^^G|R|<I,#pr4%C}LI~E3|{' );
define( 'SECURE_AUTH_SALT', 'z$T):I[R^OzCNU?]}j[a?p6RQP`X2HTizh>zQ>^<#3EGbB+6|{TBV/fkoFhwIoWi' );
define( 'LOGGED_IN_SALT',   '=DdG]MRe8z;2P(+:^vrH,I)>Jl3-8[$IHk,vHVVggH@U4KlWY1^Hmj@^!!,MQtyu' );
define( 'NONCE_SALT',       ',v2Na;;oct1]i<&pZdm<;.Rw:gbI l_JcpY.*^@QB7>RwPZ?PqQMR^3ea|8UK*bF' );

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
