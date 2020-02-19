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
define( 'DB_NAME', 'theme' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')VKq4G.zUit$?=,tYO~3zaq|-6%+vrkS`%k5~C{2XFI@5C[*LrY~5RV-fK1(%yw7' );
define( 'SECURE_AUTH_KEY',  '~][I3drmkdzZmxVA*0tu&wi|XeDRbi f<p-yIgoAx_3/H$&urZR?]{;F-97Wy<UF' );
define( 'LOGGED_IN_KEY',    '!@Gn*7;JcWJ&{!<F$2ygNW>L^;8}%LB0Q=Gmf*^u)2pIdm+zKB`HiujD)Y!JI0|c' );
define( 'NONCE_KEY',        'BQ^f(eTb5p&/CS!(K?dr/3<W9jzDLCn?f.DeriueuC3$eZ^=a`wNEUO>tI:p4gDc' );
define( 'AUTH_SALT',        'd<P)#B6~x[|e!WKyUm89hALOn=jd_8{[3_6uiN~#o1X*Nrr+`1`)s:mlVs2mJJ<y' );
define( 'SECURE_AUTH_SALT', 'r..@6 ]Zgx-pCUnIImOyjN#+nkF|&^%/A7I%4(EKYz!Rv)yMktGLDpT#&1]Sv+CZ' );
define( 'LOGGED_IN_SALT',   'ix7G O^qGg<y9E[2peUNaU%pU0h`)%EK~mc.4>8zV4r0$DdaN<URxK-&ovDW<2vU' );
define( 'NONCE_SALT',       'Ji<{!&):+8]?wDZTrH59D3x2WE,)a*L-}/cIGT%wq@zJKoI3{gz|ditDZ@G<%a[&' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
