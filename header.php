<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
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