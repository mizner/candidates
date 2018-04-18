<?php

namespace Mizner\Candidate;

define(__NAMESPACE__.'\PATH', dirname(__FILE__).'/');
define(__NAMESPACE__.'\URI', trailingslashit(get_template_directory_uri()));
define(__NAMESPACE__.'\VERISON', '1.0.0');

require_once 'lib/autoload.php';
add_action('after_setup_theme', function () {
    Setup::init();
    MarkupHelper::init();
    Enqueues::init();
});
