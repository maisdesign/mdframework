<?php/** * The Template for displaying all single posts. * * @package WordPress * @subpackage MD_Framework * @since MD Framework 1.0 */get_header(); ?><!-- File single.php --><?php $selezione = of_get_option('select_sitewide_template', '' ); ?><!-- Choose your head --><?php get_template_part('parti/content',$selezione);?><?php get_footer(); ?>