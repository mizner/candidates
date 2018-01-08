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