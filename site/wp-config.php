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
define( 'DB_NAME', 'myblog' );

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
define( 'AUTH_KEY',         'V/.[:MUr~O%e!MSyh06w.Gc4j ME_nstiOZvvI(}|=|FUp|Qycs;WwgcsFKbv><Z' );
define( 'SECURE_AUTH_KEY',  'uBO/WK9m,Z#J*Hu$YGl*nL0{iK9ekdw?&Hpv>`?EU6TV*v3:;BQZia@-2}IQ)lrc' );
define( 'LOGGED_IN_KEY',    'gGq44Y%EdKbBQ5Y4nW6a$=V?9~mT Kcu}I9=I{z>TDrr7N*[5jfm49l@ni=O0_F`' );
define( 'NONCE_KEY',        ',%dcxV=nH*L#A&W.!8su5)7.<ELL8E}E0oB(w4z/; NYr,=Z,wH!?fw1j8iV+GiE' );
define( 'AUTH_SALT',        'WeoV^S>LJV;VRbj4U,Kq`W]g<k/C:&86lZr4NXo_?;&!c~UeOCd|ip{qXl&L{:J/' );
define( 'SECURE_AUTH_SALT', 'U<myP/t6f bnE|0)EMu{88F2x4FJlbKWqm v.KG-LnJe#EK5EH$ou#4Uo|?,8O6B' );
define( 'LOGGED_IN_SALT',   'ZDBc8l~x`D)~+:Fm&,Zzl#T7.gO^-_sw~~s11S8YirVDg0.GXKBw3V8a-$,l4U/P' );
define( 'NONCE_SALT',       '!Y*s`7%N{._Wyu@#?unu[(U,_a7x`h6J?*lw ]=#}2>wEeF]qFh_KZL4D3Y;:gq^' );

define('JWT_AUTH_SECRET_KEY', '<%SPCJj!mYeAH&)Xj|1O5sF)5nYzdeX1iaq_V+=7}`dWRmjUd.jnqPoZP@#om~:(');
define('JWT_AUTH_CORS_ENABLE', true);
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
