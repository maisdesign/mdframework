<?php
	/* IF 1 Start */
add_action( 'init', 'register_cpt_cpost_mdframework_1' );

function register_cpt_cpost_mdframework_1() {
	$singcpost = of_get_option('custom_posts_name_s_n1');
    $plurcpost = of_get_option('custom_posts_name_p_n1');
    $desccpost = of_get_option('custom_posts_name_d_n1');
    $imgcpost  = of_get_option('custom_posts_name_i_n1');
    $labels = array( 
        'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New '.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit '.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New '.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View '.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search '.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No '.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No '.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent '.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );

    $args = array( 
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

    register_post_type( $singcpost, $args );
}
/* IF 1 END */
	/* IF 2 Start */
add_action( 'init', 'register_cpt_cpost_mdframework_2' );

function register_cpt_cpost_mdframework_2() {
	$singcpost = of_get_option('custom_posts_name_s_n2');
    $plurcpost = of_get_option('custom_posts_name_p_n2');
    $desccpost = of_get_option('custom_posts_name_d_n2');
    $imgcpost  = of_get_option('custom_posts_name_i_n2');
    $labels = array( 
        'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New '.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit '.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New '.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View '.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search '.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No '.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No '.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent '.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );

    $args = array( 
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

    register_post_type( $singcpost, $args );
}
/* IF 2 END */
	/* IF 3 Start */
add_action( 'init', 'register_cpt_cpost_mdframework_3' );

function register_cpt_cpost_mdframework_3() {
	$singcpost = of_get_option('custom_posts_name_s_n3');
    $plurcpost = of_get_option('custom_posts_name_p_n3');
    $desccpost = of_get_option('custom_posts_name_d_n3');
    $imgcpost  = of_get_option('custom_posts_name_i_n3');
    $labels = array( 
        'name' => _x( $plurcpost, $singcpost ),
        'singular_name' => _x( $singcpost, $singcpost ),
        'add_new' => _x( 'Add New', $singcpost ),
        'add_new_item' => _x( 'Add New '.$singcpost.'', $singcpost ),
        'edit_item' => _x( 'Edit '.$singcpost.'', $singcpost ),
        'new_item' => _x( 'New '.$singcpost.'', $singcpost ),
        'view_item' => _x( 'View '.$singcpost.'', $singcpost ),
        'search_items' => _x( 'Search '.$plurcpost.'', $singcpost ),
        'not_found' => _x( 'No '.$plurcpost.' found', $singcpost ),
        'not_found_in_trash' => _x( 'No '.$plurcpost.' found in Trash', $singcpost ),
        'parent_item_colon' => _x( 'Parent '.$singcpost.':', $singcpost ),
        'menu_name' => _x( $plurcpost, $singcpost ),
    );

    $args = array( 
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

    register_post_type( $singcpost, $args );
}
/* IF 3 END */
	;?>