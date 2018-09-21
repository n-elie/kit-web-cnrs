<?php
define('WP_AUTO_UPDATE_CORE', false);// Ce paramètre a été défini par WordPress Toolkit pour empêcher les mises à jour automatiques de WordPress. Ne le modifiez pas pour éviter les conflits avec la fonction de mise à jour automatique de WordPress Toolkit.
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
define('DB_NAME', 'nom_de_la_base_de_donnees');
/** MySQL database username */
define('DB_USER', 'nom_de_l_utilisateur_de_la_base_de_donnees');
/** MySQL database password */
define('DB_PASSWORD', 'mot_de_passe_de_la_base_de_donnees');
/** MySQL hostname */
define('DB_HOST', 'adresse_serveur_de_base_de_donnees:3306');
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');
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
define('AUTH_KEY',         'L!S7l8kQ5gLGhBU6UK#)dLMP(dZzc8(@HdGcX9(EpL^UffWjl70nMXd7)(TC*@nP');
define('SECURE_AUTH_KEY',  'ggn!RDlo552dMyso@z!t^ANC@%SQDFNYoKS5%f5%YA(&vTeGmimkn#ag4gKxcA*A');
define('LOGGED_IN_KEY',    'db@gJ^UuJ#osVFxQz4QWGwjZb88W1CLa6P%#jMRW58JYiWI4f(s#1AJ2btwEmqQV');
define('NONCE_KEY',        'PeUhP5WRkMMd7yU2qq4dkx#575aDoUQcXAZQTZfOQxkBuzLwqNcfYy5SMsqFhVuM');
define('AUTH_SALT',        'UGr02BmvP)8c7TuPhU%qQe1S#EKgap3vED*fi@Kt8Gz3Ozp6OVzigvVo#I^l!9BX');
define('SECURE_AUTH_SALT', 'N8utRcarXn7BHSR1QrLrYL9#er*1ZWhVYWwsy6908#qki)orEtF5%Ll&Uaz5O(Og');
define('LOGGED_IN_SALT',   '1N^y2!Qa3a*XjuI#x1Q^Rmb5Hhl9G%OOsfBPsaLC8ACRHz@elPkDeWpGE5PxU!#C');
define('NONCE_SALT',       '9elL)O2UW(rT%lvB22df0tbKHU)TWd49&lHqMRW6l*!v)KTtme7q7h9BzK8SAYQI');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'w9p8MmNkS5ng_';
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
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
define( 'WP_ALLOW_MULTISITE', true );
define ('FS_METHOD', 'direct');
