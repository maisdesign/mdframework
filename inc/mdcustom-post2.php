<?php
add_action( 'init', 'register_cpt_mdframework_price', 2 );

function register_cpt_mdframework_price() {

    $labels = array( 
        'name' => _x( 'Prices', 'mdframework_price' ),
        'singular_name' => _x( 'Price', 'mdframework_price' ),
        'add_new' => _x( 'Add New', 'mdframework_price' ),
        'add_new_item' => _x( 'Add New Price', 'mdframework_price' ),
        'edit_item' => _x( 'Edit Price', 'mdframework_price' ),
        'new_item' => _x( 'New Price', 'mdframework_price' ),
        'view_item' => _x( 'View Price', 'mdframework_price' ),
        'search_items' => _x( 'Search Prices', 'mdframework_price' ),
        'not_found' => _x( 'No prices found', 'mdframework_price' ),
        'not_found_in_trash' => _x( 'No prices found in Trash', 'mdframework_price' ),
        'parent_item_colon' => _x( 'Parent Price:', 'mdframework_price' ),
        'menu_name' => _x( 'Prices', 'mdframework_price' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Custom Posts to setup Price list for your services',
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category', 'post_tag', 'page-category', 'high', 'middle', 'low', 'special', 'last_minute' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'http://hotelarlino.fr/wp-content/themes/mdframework/images/price_tag.png',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'mdframework_price', $args );
}