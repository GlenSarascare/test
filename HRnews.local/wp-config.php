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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hrnews.local' );

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
define( 'AUTH_KEY',         '|kAX;Q[lY#e1jnm7%B1q@WOC*[W@glqc7/A]U&5<FZo;yZ9UPQ/KAseh`!HA[-7:' );
define( 'SECURE_AUTH_KEY',  'rKBPPWv3VUzfL:6Xz5+v];&U/Y?Elrya7H`5u~$Ut]6]7QO=(s}77jN4y[kc8nem' );
define( 'LOGGED_IN_KEY',    'u+^K/{=B1wb>J;}HjM4JG_)42_lfs!alolo^1qe0)zm27RXKWo,vanhI%,T:73Bj' );
define( 'NONCE_KEY',        'mYhQlD4Mv&kMK`;z-fk5@Q1coLO`OHP3<L^H_uDFoPyt^:#IS/Bon2;AR{$d9~%x' );
define( 'AUTH_SALT',        '7cky;8lb+2a9xbgjitPLx%_x%}_Km{5`jNc]^ox.3RFkzQ?;@;|~RnnEl:d^4f+;' );
define( 'SECURE_AUTH_SALT', ',Ke-zFV4ck;gmvFuTNC[([qM<ZZ%qj2t[/={2pv1K<l8{ /3,7-YyeO{l4Vzj~pi' );
define( 'LOGGED_IN_SALT',   'JJ]=YY$H&,Rm{Yh@|v;.b.on]+{+X-b7>b`uBfE~_1^WUgvP:5r:BG]xc<ij0J!2' );
define( 'NONCE_SALT',       'x#mmmV%cT|~X%)}NM+w>Zq5H|V$=MIx.$%`v]IesW^%1(2iO5d(G-N#XMOraEg^8' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
