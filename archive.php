<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, MD Framework already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage MD_Framework
 * @since MD Framework 1.0
 */if (of_get_option('enabling_test_homepage')){		get_template_part('parti/test','options');	}else{ $_SESSION['templatesidewide'] = of_get_option('select_sitewide_template', '' );		switch ($_SESSION['templatesidewide']) {    case 'forum':        get_template_part('parti/'.$_SESSION['templatesidewide'].'/head',$_SESSION['templatesidewide']);/*Usually <head></head><body>*/		get_template_part('parti/'.$_SESSION['templatesidewide'].'/top',$_SESSION['templatesidewide']);/*<header></header><hgroup></hgroup><nav></nav>*/		get_template_part('parti/'.$_SESSION['templatesidewide'].'/archive',$_SESSION['templatesidewide']);/*All the goodies */		get_template_part('parti/'.$_SESSION['templatesidewide'].'/footer',$_SESSION['templatesidewide']);/*End of the page */        break;    case 'blog':        get_template_part('parti/'.$_SESSION['templatesidewide'].'/head',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/top',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/archive',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/footer',$_SESSION['templatesidewide']);        break;    case 'hotel':        get_template_part('parti/'.$_SESSION['templatesidewide'].'/head',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/top',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/archive',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/footer',$_SESSION['templatesidewide']);        break;	case 'ecommerce':        get_template_part('parti/'.$_SESSION['templatesidewide'].'/head',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/top',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/archive',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/footer',$_SESSION['templatesidewide']);        break;	case 'base':        get_template_part('parti/'.$_SESSION['templatesidewide'].'/head',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/top',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/archive',$_SESSION['templatesidewide']);		get_template_part('parti/'.$_SESSION['templatesidewide'].'/footer',$_SESSION['templatesidewide']);        break;	default:		get_header();	}; };?><!-- Fine archive.php -->