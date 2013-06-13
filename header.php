<?php
/**
 * @package WordPress
 * @subpackage Options Framework Theme
 */
?><!DOCTYPE html>
<!-- File header.php -->
<?php session_start();?>
<!-- Inizio sessione Articlebox e CheckPage-->
<?php if ((((of_get_option('number_news_box_5'))||(of_get_option('number_news_box_4'))||(of_get_option('number_news_box_3'))||(of_get_option('number_news_box_2'))||(of_get_option('number_news_box_1')))>= 2)){$_SESSION['articlebox'] = true ;};?>
<!-- Determinazione e sessione -->
	<?php
	$_SESSION['templatesidewide'] = of_get_option('select_sitewide_template', '' );
	?>
<!-- Fine Nuova determinazione -->
<!-- Fine sessioni Articlebox e CheckPage-->
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
<?php if ( is_page_template('page-templates/youtuberss.php') ){;?>
	<link href='<?php echo get_template_directory_uri(); ?>/css/videopagetemplate.css' rel='stylesheet' type='text/css'>
<?php };?>
<!-- Css Google Font -->
<link href='<?php echo of_get_option('google_fonts_css_link'); ?>' rel='stylesheet' type='text/css'>
<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
<!-- Choose your head -->
<?php get_template_part('parti/head',$selezione);?>
<?php if ( is_page_template('page-templates/youtuberss.php') ){;?>
	</head>
	<body <?php body_class(); ?>>
<?php };?>