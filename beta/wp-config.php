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
define('DB_NAME', 'asquarg1_WPZ0V');

/** MySQL database username */
define('DB_USER', 'asquarg1_WPZ0V');

/** MySQL database password */
define('DB_PASSWORD', 'Sto[jf(.Eo=?tUUfX');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY', '8074303f79c29959c75acc22401e392b8a85b49e518fd8d19d6cee9f1a4b1d18');
define('SECURE_AUTH_KEY', '5bfd191273ff0e2f347888a7984e59d150d84bef1e1e2951afe0962e8e1b63ec');
define('LOGGED_IN_KEY', '669a404c988a723bb9ec6b3aa92dea3e20c7a985c7dc543544808dbb7731630e');
define('NONCE_KEY', 'cfb45cd26239cd8d0b03a8d620e97dcaa81012b9efc8dbdd4f22540b474c6566');
define('AUTH_SALT', '115caece7871e7651c57dc84ea36dd83afd84a32a2f96e542b5ce79f7d01e5a0');
define('SECURE_AUTH_SALT', 'f2fffae2b78e3b168f8eb275a222567888481e9a1db43d5d113bae06d9cacfa9');
define('LOGGED_IN_SALT', 'a501cbcd6746db338f019ebc5e7bc17b65de4b9a8349ef2747c5bd67d736adc4');
define('NONCE_SALT', 'a2c6804a39e63d716986ea4a5e33ef5206793b73d077ff66b2a39f3a60bd3cee');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'DQk_';
define('WP_CRON_LOCK_TIMEOUT', 120);
define('AUTOSAVE_INTERVAL', 300);
define('WP_POST_REVISIONS', 5);
define('EMPTY_TRASH_DAYS', 7);
define('WP_AUTO_UPDATE_CORE', true);

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
