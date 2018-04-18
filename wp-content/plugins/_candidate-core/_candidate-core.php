<?php
/**
 * Plugin Name: (custom) Candidate Core
 * Plugin URI: http://mizner.io
 * Description:
 * Version: 1.0
 * Author: Michael Mizner
 * Author URI: http://mizner.io
 * License: GPL
 */

namespace HG\CandidateCore;

defined('WPINC') || die;

define(__NAMESPACE__.'\PATH', plugin_dir_path(__FILE__));
define(__NAMESPACE__.'\URI', plugin_dir_url(__FILE__));

require_once 'lib/autoload.php';

add_action('plugins_loaded', function () {

    Plugins\Activate::init();
    RemoveDefaults\Page\SamplePage::init();
    RemoveDefaults\Post\HelloWorld::init();

    SetOption\PageOnFront::init();
    SetOption\ShowOnFront::init();

    ACF\Options\SiteGlobal::init();
    ACF\FieldGroups\GoogleAnalytics::init();
    ACF\FieldGroups\Mailchimp::init();
    ACF\FieldGroups\FrontPage::init();
    ACF\FieldGroups\Header::init();
    ACF\FieldGroups\Colors::init();
    ACF\FieldGroups\ActBlue::init();
    ACF\FieldGroups\Fonts::init();

    InsertPost\Page\FrontPage::init();
    InsertPost\Page\Volunteer::init();
    InsertPost\Page\Issues::init();
    InsertPost\Page\Contact::init();
    InsertPost\Page\About::init();

    InlineStyles\Colors::init();
    InlineStyles\GoogleFonts::init();

    Metabox\DisableSort::init();

    Enqueues\AdminCleanUp::init();
    Enqueues\GoogleFonts::init();
});
