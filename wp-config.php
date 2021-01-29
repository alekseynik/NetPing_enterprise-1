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
define( 'DB_NAME', 'npdb' );

/** MySQL database username */
define( 'DB_USER', 'aleksey' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Prewed1234' );

/** MySQL hostname */
define( 'DB_HOST', 'npdbsite.mysql.database.azure.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '~9B_al=iIu&lbq^&nLjJ%vv.)P_Sz1,<sVl8^+D]sO<tJfWtsdX[>g#k!rQW1BnU' );
define( 'SECURE_AUTH_KEY',   'vjFn#,F;dD.(W<^&Z }IUk*3T{)?|.WJ(erlz(7OCL:^H:S=YWe}-v}7#~^GPNa0' );
define( 'LOGGED_IN_KEY',     '(-G$q(|Ah?WX;v(X_wz<`2D/dKLkloXoak{Q@=0,GpONC0EGM[cy$C^YaX#FIGi7' );
define( 'NONCE_KEY',         '-~E=i 7?-d)tOQbTke402g%(EM~@Wn-9w)nZg^ i9z$m^E(g.;ByejRSsII4)gZW' );
define( 'AUTH_SALT',         'hUB`b3)qZA~ )Vz%*JFAin,c9h?Jfe}#[u2?(6E<2fXHwxckI00CHAV&Q&ox [u3' );
define( 'SECURE_AUTH_SALT',  ':Iz?F[.6A6o:?jw5.u|&f|ns_vvSTMOR)|tX?dYN,*%uy$5]N<o:_Vkwu/[piST/' );
define( 'LOGGED_IN_SALT',    'MVSP_WV->yeI,)SqXh0br9^tGF@_/27?q@IZ^i8yErT-+a<Bo[!NOwvy}Ot3r3|z' );
define( 'NONCE_SALT',        'h0AG7y}jpLkEDwS<~8}4Es>bc~q~jqOK_t9Hq,EZ9($n<km`MGiPrc3W_W(mUQ&N' );
define( 'WP_CACHE_KEY_SALT', 'N#|kc!uHw`*mE[M>B(2uA:p7@R[3eSu^WA$5ti-hZk/:a3?uv{HWxPXWx=#ySdd ' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
