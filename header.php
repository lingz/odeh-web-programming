<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package odeh-web-programming
 */
?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="content" class="site-content">
