<?php
add_action('init', 'mdframework_custom_post', 1); /* Set priority to avoid plugin conflicts */

function mdframework_custom_post() { /* A unique name for our function */
 	$nomecp = 'Room';
	$labels = array( /* Used in the WordPress admin */
		'name' => _x(''.$nomecp.'s', 'post type general name'),
		'singular_name' => _x($nomecp, 'post type singular name'),
		'add_new' => _x('Add New', $nomecp),
		'add_new_item' => __('Add New'.$nomecp.''),
		'edit_item' => __('Edit'.$nomecp.''),
		'new_item' => __('New'.$nomecp.''),
		'view_item' => __('View'.$nomecp.''),
		'search_items' => __('Search'.$nomecp.'s'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash')
	);
	$args = array(
		'labels' => $labels, /* Set above */
		'public' => true, /* Make it publicly accessible */
		'hierarchical' => true, /* No parents and children here */
		'menu_position' => 5, /* Appear right below "Posts" */
		'has_archive' => ''.$nomecp.'s', /* Activate the archive */
		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'show_ui' => true,
        'show_in_menu' => true,
	);
	register_post_type( $nomecp, $args ); /* Create the post type, use options above */
}