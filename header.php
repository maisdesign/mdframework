<?php
/**
 * @package WordPress
 * @subpackage Options Framework Theme
 */
?><!DOCTYPE html>
<!-- File header.php -->
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<link rel="apple-touch-icon" href="<?php echo of_get_option('favicon_apple', '' ); ?>"/>
<link rel="shortcut icon" href="<?php echo of_get_option('favicon_normal', '' ); ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<title><?php wp_title( '|', true, 'right' ); ?></title><link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head() ;?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<!-- Css Google Font -->
<link href='<?php echo of_get_option('google_fonts_css_link'); ?>' rel='stylesheet' type='text/css'>
<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
<!-- Choose your head -->
<?php get_template_part('parti/head',$selezione);?>