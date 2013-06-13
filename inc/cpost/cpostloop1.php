<?php
	$numcpost = 1;
	add_action( 'init', 'register_cpt_1_mdframework_price', $numcpost );
	$singcpost = of_get_option('custom_posts_name_s_n1');
	$plurcpost = of_get_option('custom_posts_name_p_n1');
	$desccpost = of_get_option('custom_posts_name_d_n1');
	$imgcpost = of_get_option('custom_posts_name_i_n1');
	function register_cpt_1_mdframework_price(){
		$labels = array( 
			'name' => _x( $plurcpost, 'mdframework_custom_created_post1' ),
			'singular_name' => _x( $singcpost, 'mdframework_custom_created_post1' ),
			'add_new' => _x( 'Add New', 'mdframework_custom_created_post1' ),
			'add_new_item' => _x( 'Add New'.$singcpost.'', 'mdframework_custom_created_post1' ),
			'edit_item' => _x( 'Edit'.$singcpost.'', 'mdframework_custom_created_post1' ),
			'new_item' => _x( 'New'.$singcpost.'', 'mdframework_custom_created_post1' ),
			'view_item' => _x( 'View'.$singcpost.'', 'mdframework_custom_created_post1' ),
			'search_items' => _x( 'Search'.$plurcpost.'', 'mdframework_custom_created_post1' ),
			'not_found' => _x( 'No '.$plurcpost.' found', 'mdframework_custom_created_post1' ),
			'not_found_in_trash' => _x( 'No '.$plurcpost.' found in Trash', 'mdframework_custom_created_post1' ),
			'parent_item_colon' => _x( 'Parent '.$singcpost.':', 'mdframework_custom_created_post1' ),
			'menu_name' => _x( $singcpost, 'mdframework_custom_created_post1' ),
		);
		$args = array( 
			'labels' => $labels,
			'hierarchical' => true,
			'description' => $desccpost,
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
			'taxonomies' => array( 'category', 'post_tag', 'page-category', 'high', 'middle', 'low', 'special', 'last_minute' ),
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
	register_post_type( 'mdframework_custom_created_post_1'', $args );
	};?>