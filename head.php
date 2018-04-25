<?php

use HG\CandidateCore\InlineScripts;
use HG\Candidate\InlineStyles;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Prefetch -->
    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <!-- Meta Tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    if (class_exists(InlineScripts\GoogleAnalytics::class)) {
        echo InlineScripts\GoogleAnalytics::render();
    }
    if (class_exists(InlineStyles\Fonts::class)) {
        echo InlineStyles\Fonts::render();
    }
    wp_head();
    ?>
</head>