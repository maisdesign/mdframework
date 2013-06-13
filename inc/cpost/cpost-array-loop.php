<?php
$numcpost = of_get_option('how_many_custom_posts');

do {

    add_action( 'init', 'register_cpt_mdframework_price', $numcpost );
    --$numcpost;

} while ( $numcpost > 0 );

function register_cpt_mdframework_price( $numcpost ) {

    $singcpost = of_get_option('custom_posts_name_s_n'.$numcpost.'');
    $plurcpost = of_get_option('custom_posts_name_p_n'.$numcpost.'');
    $desccpost = of_get_option('custom_posts_name_d_n'.$numcpost.'');
    $imgcpost  = of_get_option('custom_posts_name_i_n'.$numcpost.'');

    $labels = array();
        // labels for $numcpost = 1
    $labels[1] = array(/*typo was here*/
            'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New'.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit'.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New'.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View'.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search'.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No'.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No'.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent'.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );

        // labels for $numcpost = 2
    $labels[2] = array(
        'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New'.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit'.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New'.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View'.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search'.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No'.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No'.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent'.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );

	$labels[3] = array(
        'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New'.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit'.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New'.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View'.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search'.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No'.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No'.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent'.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );

	$labels[4] = array(
        'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New'.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit'.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New'.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View'.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search'.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No'.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No'.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent'.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );

	$labels[5] = array(
        'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New'.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit'.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New'.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View'.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search'.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No'.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No'.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent'.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );
    $args = array();

        // args for $numcpost = 1
    $args[1] = array(
            'labels' => $labels,
        'hierarchical' => true,
        'description' => $desccpost,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'customtax1', 'customtax2', 'customtax3' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => $imgcpost,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'   
    );

        // args for $numbercpost = 2
    $args[2] = array(
            'labels' => $labels,
        'hierarchical' => true,
        'description' => $desccpost,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'customtax1', 'customtax2', 'customtax3' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => $imgcpost,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
        // ...
    );
	
	// args for $numbercpost = 3
    $args[3] = array(
            'labels' => $labels,
        'hierarchical' => true,
        'description' => $desccpost,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'customtax1', 'customtax2', 'customtax3' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => $imgcpost,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
        // ...
    );
	
	// args for $numbercpost = 4
    $args[4] = array(
            'labels' => $labels,
        'hierarchical' => true,
        'description' => $desccpost,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'customtax1', 'customtax2', 'customtax3' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => $imgcpost,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
        // ...
    );
	
	// args for $numbercpost = 5
    $args[5] = array(
            'labels' => $labels,
        'hierarchical' => true,
        'description' => $desccpost,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'customtax1', 'customtax2', 'customtax3' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => $imgcpost,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
        // ...
    );

    register_post_type( 'mdframework_custom_created_post_'.$numcpost, $args[$numcpost] );
}