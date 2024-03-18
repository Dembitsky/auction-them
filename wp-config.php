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
define( 'DB_NAME', 'disingde_wp602' );

/** Database username */
define( 'DB_USER', 'disingde_wp602' );

/** Database password */
define( 'DB_PASSWORD', '.6dupSn8(7' );

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
define( 'AUTH_KEY',         '4mkgmhru4nvl2dnuwtszkwzuacfn2lawchcrsnujja1afwzrndidzxrz99yxirww' );
define( 'SECURE_AUTH_KEY',  'huyd2unvzxuzj8afq5y97tnxyzkyh87qubqpyb5wgzjz1xuj9wbrsobyzogkhpzj' );
define( 'LOGGED_IN_KEY',    '0hwcyflmk2j0cdiu1wkfdeyy47wlyrvgeaiwlwshuc4h1rkzxlwds8l59pd9lvn0' );
define( 'NONCE_KEY',        'nlvqnyupfkkiygxuiicsfrpx4anr2a8wh14gecvlxwss5l6xyd92xyil0kdqxm9b' );
define( 'AUTH_SALT',        'uixvo173hghfbjildoktqxd8vwwujvejajqtsljdnqyyzor7mgb2dvworplj2cgk' );
define( 'SECURE_AUTH_SALT', 'xgbiemnzak4eqbfqte1xiesquhxzsmtqbsml9gyalvlk3gcghaiiryk20teeecls' );
define( 'LOGGED_IN_SALT',   'zkixczjdpvyvhgyjazcb4sendjmstzevdxqwjbvzygkaj1nv9eu1xg5pwru3kx3r' );
define( 'NONCE_SALT',       'zp0oeuec5d9jlkykbt1frnawgk2azobb1sbxq3mepnl8domk5m1se0fyxaxqmqvd' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpqk_';

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
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', true);

/* Add any custom values between this line and the "stop editing" line. */

/** Memory Limit */
define('WP_MEMORY_LIMIT', '512M');
define( 'WP_MAX_MEMORY_LIMIT', '512M' );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
