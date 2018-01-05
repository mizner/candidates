<?php
/**
 * Plugin Name: (custom) MusicNow Core
 * Description:
 * Version: 0.01
 * Author: Pyxl Inc.
 * Author URI: https://pyxl.com
 * License: GPL
 */

namespace Pyxl\MNC;

defined( 'WPINC' ) || die;

define( __NAMESPACE__ . '\PATH', plugin_dir_path( __FILE__ ) );
define( __NAMESPACE__ . '\URI', plugin_dir_url( __FILE__ ) );

require_once 'lib/autoload.php';

add_action( 'plugins_loaded', function () {
	new PostTypeSupport\ContentEditor();
	new ACF\Page\Hero();
	new ACF\Page\Events();
	new ACF\Page\Donations();
	new ACF\Page\About();
	new GetMeta\EventRepeaterGrid();
	new Shortcode\EventGrid();
} );