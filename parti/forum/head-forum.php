<!DOCTYPE html>
<!--[if IE 6]><html id="ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<!-- File head-forum.php -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Inizio sessione Articlebox e CheckPage-->
<?php
	if ((((of_get_option('number_news_box_5'))||(of_get_option('number_news_box_4'))||(of_get_option('number_news_box_3'))||(of_get_option('number_news_box_2'))||(of_get_option('number_news_box_1')))>= 2)){$_SESSION['articlebox'] = true ;};	$_SESSION['templatesidewide'] = of_get_option('select_sitewide_template', '' );
 /* starting the session */
 session_start();
 if (isset($_POST['submit'])) { 
 $_SESSION['user_login'] = $_POST['user_login'];
 }
?>
<!-- Fine sessioni Articlebox e CheckPage-->
<link rel="apple-touch-icon" href="<?php echo of_get_option('favicon_apple', '' ); ?>"/>
<link rel="shortcut icon" href="<?php echo of_get_option('favicon_normal', '' ); ?>">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head() ;?>
<!-- Css Google Font -->
<link href='<?php echo of_get_option('google_fonts_css_link'); ?>' rel='stylesheet' type='text/css'>
<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
<!-- Choose your head -->
<!-- File head-forum.php -->
<style>
	<?php get_template_part('css/'.$_SESSION['templatesidewide'].'/head',''.$_SESSION['templatesidewide'].'-css');?>
</style>
 <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo $_SESSION['templatesidewide'];?>/<?php echo $_SESSION['templatesidewide'];?>home.css" />
	<?php if (of_get_option('custom_css_file')){
		$nomefilecustomcss = of_get_option('custom_css_file');
		echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/'.$nomefilecustomcss.'.css" />';};?>
</head>
 <body <?php body_class($class); ?>>
 <?php $_SESSION['loggami'] = $_POST['copiami'];?>
	<?php if (of_get_option('enabling_fixed_banners')){get_template_part('sidebars/sidebar-left-banner');};?>
	<?php get_template_part('parti/login','chooser');?>
	<?php if ((of_get_option('admin_bar_deactivator'))&&((of_get_option('loginstyle_checker'))==='ibrid')){
		echo '<div class="bordonero"></div>';
	};?>