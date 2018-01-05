<!DOCTYPE html>
<!--[if IE 9]><html  <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
	<!-- Domains to Prefetch - Modify depending on needs -->
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="//use.typekit.net" rel="dns-prefetch">

	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Site Title -->
	<title><?php wp_title() ?></title>

	<!-- Analytics Testing Account -->
	<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-74035763-1', 'auto');
        ga('send', 'pageview');
	</script>

	<?php wp_head() ?>

</head>