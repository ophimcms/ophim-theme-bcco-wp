<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
    <link href="<?= get_template_directory_uri() ?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?= get_template_directory_uri() ?>/assets/css/all.css" rel="preload" media="all" as="style" onload="this.onload=null;this.rel=&#039;stylesheet&#039;">
    <link href="<?= get_template_directory_uri() ?>/assets/css/custom.css" rel="preload" media="all" as="style" onload="this.onload=null;this.rel=&#039;stylesheet&#039;">
</head>
<body>
<nav id="main-mobile-nav"></nav>
<div class="page-wrapper">
    <?php include_once THEME_URL.'/templates/header.php' ?>
    <?php if(get_option('ophim_is_ads') == 'on') { ?>
        <div id=top_addd style="text-align: center"></div>
    <?php } ?>

