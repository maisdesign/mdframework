<?php
/**
 * @package WordPress
 * @subpackage Options Framework Theme
 */
?><!DOCTYPE html>
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
<!-- File head-forum.php -->
<?php
$filename = 'adaptive-images.php';
if (file_exists($filename)) {;?>
<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
<?php }else{echo '<!-- Il file non esiste -->';};?>
<!-- Inizio sessione Articlebox e CheckPage-->
<?php
	if (
			(
				(
				(of_get_option('number_news_box_5'))
				||
				(of_get_option('number_news_box_4'))
				||
				(of_get_option('number_news_box_3'))
				||
				(of_get_option('number_news_box_2'))
				||
				(of_get_option('number_news_box_1'))
				)
				>= 2
			)
		)
		{$_SESSION['articlebox'] = true ;};
	$_SESSION['templatesidewide'] = of_get_option('select_sitewide_template', '' );
?>
<?php 
 /* starting the session */
 session_start();
 if (isset($_POST['submit'])) { 
 $_SESSION['user_login'] = $_POST['user_login'];
 }
?>
<!-- Fine sessioni Articlebox e CheckPage-->
<link rel="apple-touch-icon" href="<?php echo of_get_option('favicon_apple', '' ); ?>"/>
<link rel="shortcut icon" href="<?php echo of_get_option('favicon_normal', '' ); ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
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
 <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/<?php echo $_SESSION['templatesidewide'];?>/<?php echo $_SESSION['templatesidewide'];?>home.css" />
	<?php /*
		global $wp_query;
		$postid = $wp_query->post->ID;
		if (is_single()){
			if (get_post_meta($post->ID, 'table_css_js_enable', true)){echo'<!-- PostMetaTableFiles -->';}else{echo '<!-- Disattivato-->';};
			if (($_SESSION[articlebox])){
				$class = array('forumcomplete','articlebox','singolare');
			};
		};
		if (($_SESSION[articlebox])&&(!is_single())){
				$class = array('forumcomplete','articlebox');
			};
			*/
	?>
	<?php if (of_get_option('custom_css_file')){
		$nomefilecustomcss = of_get_option('custom_css_file');
		echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_template_directory_uri().'/'.$nomefilecustomcss.'.css" />';};?>
		<script>
		var val = "Sonotuopadre";
	var ec = new evercookie();
	getC(0);
			/* Evercookie */
			function getC(dont){
		ec.get("uid", function(best, all) {
			document.getElementById('idtag').innerHTML = best;
			var txt = document.getElementById('cookies');
			txt.innerHTML = '';
			for (var item in all)
			txt.innerHTML += item + ' mechanism: ' + (val == all[item] ? '<b>' + all[item] + '</b>' : all[item]) + '<br>';
			if (!dont)
				getC(1);
		}, dont);
	}
	</script>
</head>
 <body <?php body_class($class); ?>>
 <?php $_SESSION['loggami'] = $_POST['copiami'];?>
	<?php if (of_get_option('enabling_fixed_banners')){get_template_part('sidebars/sidebar-left-banner');};?>
	<?php get_template_part('parti/login','chooser');?>
	<?php if ((of_get_option('admin_bar_deactivator'))&&((of_get_option('loginstyle_checker'))==='ibrid')){
		echo '<div class="bordonero"></div>';
	};?>