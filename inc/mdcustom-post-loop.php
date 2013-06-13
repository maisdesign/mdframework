<?php 
	$numcpost = of_get_option('how_many_custom_posts');
	/*Defines Custom Post Folder */
	define( 'MDCP_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc' ) );
	define( 'MDCP_DIR', trailingslashit( TEMPLATEPATH . '/inc' ) );
	do {
		require_once MDCP_DIR . '/cpost/cpostloop'.$numcpost.'.php';
		--$numcpost;
	}while ($numcpost > 0);?>