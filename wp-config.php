<?php
/**
 * This uses config.json for environment variables
 *
 * @param string $json
 *
 * @return array|mixed|object|string
 */
function get_config( $json = '/config.json' ) {
	$raw  = file_get_contents( __DIR__ . $json );
	$json = json_decode( $raw );

	return $json;
}

$config = get_config();

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	define( 'DB_HOST', $config->dev_host . ':' . $config->dev_port );
	define( 'HTTP_HOST', $_SERVER['HTTP_HOST'] );
} else {
	// Fixes https problems.
	if ( strpos( $_SERVER['HTTP_X_FORWARDED_PROTO'], 'https' ) !== false ) {
		$_SERVER['HTTPS'] = 'on';
	}
	define( 'DB_HOST', 'localhost' );
	define( 'HTTP_HOST', $_SERVER['HTTP_HOST'] );
}

define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY', '.-sDA^xN>QXA+J&;S bR`3%;7)T+Dp,EU6vD2EcDlVE3NPf@@H*`{JkWt>~3Z82f' );
define( 'SECURE_AUTH_KEY', 'bAr}qJc3lTQ)xSG&5glFY61^!ycL_$VPn1DPVa:><};).faY/7#,l5b-k>j$ih>1' );
define( 'LOGGED_IN_KEY', 'h+zUb$H)e~[8t.;wC7Nfnc9I@S[f#~>z?F)+mo:a*l~Mo=T3Q[{{E~U^Ux*fW<#R' );
define( 'NONCE_KEY', '({7ue,x]%0XZ7l5[I-W(Pe{1l4=,M5E8M=x{6OYwiG*hStx%j:KKE/o;E%x$&iJ!' );
define( 'AUTH_SALT', '[xU+TpyR,o}up#F$0{}!?qq0&wKrXYlhU0qGx~]y(+~OnJ)]bwE7|Cac@0GK^1q+' );
define( 'SECURE_AUTH_SALT', 'Vgh2X|/`_TdIqX=m6|1.q-jz`]e&^|YSP=S4OiZ=VIsbi+YESrs6,Vj^aZp32<}N' );
define( 'LOGGED_IN_SALT', '+h*v6@Ec@b{UyI#$Xy.5T8a48a%wRR0pIPtH|?gY0LT=35Y*T--1M|^>N:PlS+ @' );
define( 'NONCE_SALT', '=XFky[*a#>s$5-|-knh%i=f/G|TEE-zT8v:J#Fu?IB1gQG.;_G[zK4STvQ-N:h}W' );

$table_prefix = 'wp_';

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'JETPACK_DEV_DEBUG', true );

define( 'WP_DEFAULT_THEME', '_s' );

// Define Site URL: WordPress in a subdirectory.
defined( 'WP_SITEURL' ) or define( 'WP_SITEURL', 'http://' . HTTP_HOST . '/core' );
defined( 'WP_HOME' ) or define( 'WP_HOME', 'http://' . HTTP_HOST );

// Define path and url for wp-content
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', WP_HOME . '/content' );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';