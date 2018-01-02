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
define('DB_NAME', 'datn');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'wWiKK)b//1P]]|HOXA[3quum1^g[SJ^8bE(>;wXwopyzB d9lvbi:n&mE;#3rv>E');
define('SECURE_AUTH_KEY',  '>v,TNqc$C/:+owSM25;2Io)pOrI]=?k^eV pPTfA+A6[|VrN=[>cM}U4![zw{8It');
define('LOGGED_IN_KEY',    'TM!+|=H)[) }yId-*Ijo/dh+G7}p.25$rXH2-p#I%ertbZ,jlA@3#zQ7yNvT^o%.');
define('NONCE_KEY',        'H,A>6 58F{e.Dey1P{09*; Qy19]Z-d<JK5|7|7ap&D*AjDat-L`8| x=,`cfYyR');
define('AUTH_SALT',        '`DeWL:)2ed{!IGLr2R3q_S_Qz~$pCFG@qN{_+;JzUd7#j./a>}HLuoaY+S.+*te@');
define('SECURE_AUTH_SALT', 'Nno 1[fo-YK0HD{H]:NfJh}gw$mrsZ)xSAebPL;-n02PY!OT5tM*ArAqfuK<U+D ');
define('LOGGED_IN_SALT',   ' GoZ=qdyS$>+Mjm[!.9?k*#Al7GA3v<L uT?I%p[EbaK0qQlvWP4Cuu bwkrC]yl');
define('NONCE_SALT',       '<TUi1C(R5*RQgr{ZvtGChvOMSE;<%:4z K1*]<e!LmakFE5a4l|3 >4%1Vy)4W]#');

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
// Bật tính năng Debug logging vào tệp tin /wp-content/debug.log
//define ('WP_DEBUG_LOG', true);
//
//// Vô hiệu hoá hiển thị lỗi và cảnh báo
//define ('WP_DEBUG_DISPLAY', false);
//@ini_set ('display_errors', 0);
//
//// Sử dụng các phiên bản dev của tệp JS và CSS lõi (chỉ cần nếu bạn đang sửa đổi các tệp cốt lõi này)
//define ('SCRIPT_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

