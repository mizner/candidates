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

    switch_theme('candidate');

    Escape\WYSIWYG::init();

    Plugins\Activate::init();
    RemoveDefaults\Page\SamplePage::init();
    RemoveDefaults\Post\HelloWorld::init();

    SetOption\PageOnFront::init();
    SetOption\ShowOnFront::init();

    ACF\Options\SiteGlobal::init();

    ACF\FieldGroups\GoogleAnalytics::init();
    ACF\FieldGroups\Mailchimp::init();
    ACF\FieldGroups\Header::init();
    ACF\FieldGroups\Footer::init();
    ACF\FieldGroups\Colors::init();
    ACF\FieldGroups\ActBlue::init();
    ACF\FieldGroups\Fonts::init();
    ACF\FieldGroups\FrontPage::init();
    ACF\FieldGroups\Volunteer::init();
    ACF\FieldGroups\Issues::init();
    ACF\FieldGroups\About::init();
    ACF\FieldGroups\CTAGlobal::init();
    ACF\FieldGroups\SocialMedia::init();
	ACF\FieldGroups\PageBackgroundOptions::init();
	ACF\FieldGroups\PageSingleBackgroundOptions::init();

    InsertPost\Page\FrontPage::init();
    InsertPost\Page\Volunteer::init();
    InsertPost\Page\Issues::init();
    InsertPost\Page\Contact::init();
    InsertPost\Page\About::init();

    InlineStyles\Colors::init();
    InlineStyles\GoogleFonts::init();
	InlineStyles\Page\BackgroundOptions::init();

    Metabox\DisableSort::init();
    Metabox\Remove\FeaturedImage::init();

    Enqueues\AdminCleanUp::init();
    Enqueues\GoogleFonts::init();

    CreateNavMenu\PrimaryNavigation::init();

    Redirect\Page\Donate::init();
});
