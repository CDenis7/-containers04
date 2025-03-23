<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',         'yd!oE6L%5E8-ssNyK5/p~ro_cdfk~k*D|J:;@gOb<C6ddV(KUHo?Hi^kp71g(C5`' );
define( 'SECURE_AUTH_KEY',  'v<#J_?rom2[_+[J }t]ap+rH`U[2mogcQ+JC,IA)>zdxb:Nb+9gl,si/pU,D6KDd' );
define( 'LOGGED_IN_KEY',    'LX>ZX)Y#:J!WP_t)h8V!WI<LTAsNOB_{GAhgV@c6BFM&YHH}{(UEs1~WGT|]:22Z' );
define( 'NONCE_KEY',        'y:K6OdQkm0n;|`NUQ[aSX+95PB|v+W)DAEC,AI5PKLkS=K~R3-v2pm*LbYe)S6+>' );
define( 'AUTH_SALT',        'pgrY|) *ux[~qZ{mzYBy(rh:hL8< k_qNA;J7oBF+wI!|q>rC-9EYuE6=4n@317;' );
define( 'SECURE_AUTH_SALT', '*MkV.jrP0kK/Xjx?9ms;pdnwWXAYP>xf*hKLBz<5vK|AinBQG2rU8%pHsYr0h4Yj' );
define( 'LOGGED_IN_SALT',   ';M$g9aDP>T`j(Gn-J8:S:_A]] h+D?Z,!{9n/K574?kP86mYoA?%OAb2m/K@E>#b' );
define( 'NONCE_SALT',       'Ql^zIqTeZ~EH=qm+1-rYV^i$zx&xE@HEBO2.GEX1G,Sb~*MCi][z q*A{zUnJ0i6' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
