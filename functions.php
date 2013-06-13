<?php
/**
 * MD Framework functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change c first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage MD_Framework
 * @since MD Framework 1.0
 */
/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;
/**
 * Sets up theme defaults and registers the various WordPress features that
 * MD Framework supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since MD Framework 1.0
 */
function mdframework_setup() {
	/*
	 * Makes MD Framework available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on MD Framework, use a find and replace
	 * to change 'mdframework' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mdframework', get_template_directory() . '/languages' );
	/* This theme styles the visual editor with editor-style.css to match the theme style.*/
	add_editor_style();
	/* Adds RSS feed links to <head> for posts and comments.*/
	add_theme_support( 'automatic-feed-links' );
	/* This theme supports a variety of post formats.*/
	add_theme_support( 'post-formats', array( 'aside','gallery','link','image','quote','status','video','audio','chat' ) );
	/* This theme uses wp_nav_menu() in one location.*/
	register_nav_menu( 'primary', __( 'Primary Menu', 'mdframework' ) );
	register_nav_menu( 'forummenu', __( 'Forum Top Menu', 'mdframework' ) );
	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );
	/* This theme uses a custom image size for featured images, displayed on "standard" posts.*/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); /* Unlimited height, soft crop*/
}
add_action( 'after_setup_theme', 'mdframework_setup' );
/* Add more image sizes */
add_image_size( 'category-thumb', 150, 75 ); /* 150*75 pixels wide cropped Archive pages */
add_image_size( 'homeslide', 960, 300, true ); //(Home TOP Slideshow)
add_image_size( 'homeslide', 270, 150, true ); //(Home Previews)
/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );
/**
 * Enqueues scripts and styles for front-end.
 *
 * @since MD Framework 1.0
 */
function mdframework_scripts_styles() {
	global $wp_styles;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'mdframework-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'mdframework-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */
	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'mdframework' ) ) {
		$subsets = 'latin,latin-ext';
		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'mdframework' );
		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';
		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'mdframework-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}
	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'mdframework-style', get_stylesheet_uri() );
	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'mdframework-ie', get_template_directory_uri() . '/css/ie.css', array( 'mdframework-style' ), '20121010' );
	$wp_styles->add_data( 'mdframework-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'mdframework_scripts_styles' );
/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since MD Framework 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function mdframework_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	/* Add the site name.*/
	$title .= get_bloginfo( 'name' );
	/* Add the site description for the home/front page.*/
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	/* Add a page number if necessary.*/
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'mdframework' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'mdframework_wp_title', 10, 2 );
/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since MD Framework 1.0
 */
function mdframework_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'mdframework_page_menu_args' );
/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since MD Framework 1.0
 */
function mdframework_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'mdframework' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Second Sidebar just in case of a three coloumn template', 'mdframework' ),
		'id' => 'sidebar-4',
		'description' => __( 'Appears when a 3 coloumn template in choosen', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar specific for forum style homepage', 'mdframework' ),
		'id' => 'sidebar-forum',
		'description' => __( 'Appears on a Forum Style Template when needed', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Left Banner Area', 'mdframework' ),
		'id' => 'left-banner',
		'description' => __( 'Left Banner Area', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Right Banner Area', 'mdframework' ),
		'id' => 'right-banner',
		'description' => __( 'Right Banner Area', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'mdframework' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'mdframework' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Left Widget', 'mdframework' ),
		'id' => 'footer-1',
		'description' => __( 'First widgetized area on the left of Footer', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Center Widget', 'mdframework' ),
		'id' => 'footer-2',
		'description' => __( 'Second widgetized area in the middle of Footer', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'First Hotel HomePage Widget', 'mdframework' ),
		'id' => 'hotel-home-1',
		'description' => __( 'Insert here the text you would like to see on Hotel Style HomePage First Spot ', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Second Hotel HomePage Widget', 'mdframework' ),
		'id' => 'hotel-home-2',
		'description' => __( 'Insert here the text you would like to see on Hotel Style HomePage Second Spot ', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Third Hotel HomePage Widget', 'mdframework' ),
		'id' => 'hotel-home-3',
		'description' => __( 'Insert here the text you would like to see on Hotel Style HomePage Third Spot ', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Forum Special Sidebar', 'mdframework' ),
		'id' => 'forum-special',
		'description' => __( 'In Forum Link template this would be the place for latest Forum Topics', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Forum Lower Sidebar', 'mdframework' ),
		'id' => 'forum-lower-sidebar',
		'description' => __( 'In Forum Template this will be a low Widgetized Area next to the Bottom Slideshow', 'mdframework' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'mdframework_widgets_init' );
if ( ! function_exists( 'mdframework_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since MD Framework 1.0
 */
function mdframework_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'mdframework' ); ?></h3>
			<div class="nav-previous alignleft"><span><?php next_posts_link( __( '<span class="meta-nav indietro"></span> Older posts', 'mdframework' ) ); ?></span></div>
			<div class="nav-next alignright"><span><?php previous_posts_link( __( 'Newer posts <span class="meta-nav avanti"></span>', 'mdframework' ) ); ?></span></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;
if ( ! function_exists( 'mdframework_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own mdframework_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since MD Framework 1.0
 */
function mdframework_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		/* Display trackbacks differently than normal comments. */
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'mdframework' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'mdframework' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		/* Proceed with normal comments. */
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						/* If current post author is also comment author, make it known visually. */
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'mdframework' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'mdframework' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'mdframework' ); ?></p>
			<?php endif; ?>
			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'mdframework' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'mdframework' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; /* end comment_type check */
}
endif;
if ( ! function_exists( 'mdframework_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own mdframework_entry_meta() to override in a child theme.
 *
 * @since MD Framework 1.0
 */
function mdframework_entry_meta() {
	/* Translators: used between list items, there is a space after the comma.*/
	$categories_list = get_the_category_list( __( ', ', 'mdframework' ) );
	/* Translators: used between list items, there is a space after the comma. */
	$tag_list = get_the_tag_list( '', __( ', ', 'mdframework' ) );
	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'mdframework' ), get_the_author() ) ),
		get_the_author()
	);
	/* Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.*/
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'mdframework' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'mdframework' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'mdframework' );
	}
	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;
/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since MD Framework 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function mdframework_body_class( $classes ) {
	$background_color = get_background_color();
	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';
	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}
	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';
	/* Enable custom font class only if the font CSS is queued to load.*/
	if ( wp_style_is( 'mdframework-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';
	if ( ! is_multi_author() )
		$classes[] = 'single-author';
	return $classes;
}
add_filter( 'body_class', 'mdframework_body_class' );
/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since MD Framework 1.0
 */
function mdframework_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'mdframework_content_width' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since MD Framework 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function mdframework_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'mdframework_customize_register' );
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since MD Framework 1.0
 */
function mdframework_customize_preview_js() {
	wp_enqueue_script( 'mdframework-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'mdframework_customize_preview_js' );
/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
};
/* Funzione Immagini */
function autoset_featured() {
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
    if (!$already_has_thumb) {
        $attached_image = get_children( 
            "post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" 
        );
        if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {
                set_post_thumbnail($post->ID, $attachment_id);/* the size of the thumbnail is defined in a function above*/
            }
        }
    }
}  /* end function */
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');

/*Compatibilità BuddyPress */
add_theme_support( 'buddypress' );
/* Elementi menu personalizzati */
if ( (of_get_option('loginstyle_checker',''))== 'vanish' ){;
if ((of_get_option('how_many_menu',''))>=2){
function new_nav_menu_items($items, $args) {
    if( $args->theme_location == 'forummenu' ){
        $loglink = '<li class="show_hide"><a href="#">' . __('Open Login Form','mdframework') . '</a></li>';
        $items = $items . $loglink;
    }
    return $items;
};
};
if ((of_get_option('how_many_menu',''))==1){
	function new_nav_menu_items($items, $args) {
    if( $args->theme_location == 'primary' ){
        $loglink = '<li class="show_hide"><a href="#">' . __('Open Login Form','mdframework') . '</a></li>';
        $items = $items . $loglink;
    }
    return $items;
};
};
add_filter( 'wp_nav_menu_items', 'new_nav_menu_items', 10, 2 );
};
/* Aggiunta Font personalizzati */
/* 
 * Note: Options Typography is a child theme of Options Framework Theme
 * So all the functions from the parent theme are also inherited
 */
 /**
 * Returns an array of system fonts
 * Feel free to edit this, update the font fallbacks, etc.
 */
function options_typography_get_os_fonts() {
	/* OS Font Defaults */
	$os_faces = array(
		'Arial, sans-serif' => 'Arial',
		'"Avant Garde", sans-serif' => 'Avant Garde',
		'Cambria, Georgia, serif' => 'Cambria',
		'Copse, sans-serif' => 'Copse',
		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',
		'Georgia, serif' => 'Georgia',
		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
		'Tahoma, Geneva, sans-serif' => 'Tahoma'
	);
	return $os_faces;
}
/**
 * Returns a select list of Google fonts
 * Feel free to edit this, update the fallbacks, etc.
 */
function options_typography_get_google_fonts() {
	/* Google Font Defaults */
	$google_faces = array(
		'Arvo, serif' => 'Arvo',
		'Copse, sans-serif' => 'Copse',
		'Droid Sans, sans-serif' => 'Droid Sans',
		'Droid Serif, serif' => 'Droid Serif',
		'Lobster, cursive' => 'Lobster',
		'Nobile, sans-serif' => 'Nobile',
		'Open Sans, sans-serif' => 'Open Sans',
		'Oswald, sans-serif' => 'Oswald',
		'Pacifico, cursive' => 'Pacifico',
		'Rokkitt, serif' => 'Rokkit',
		'PT Sans, sans-serif' => 'PT Sans',
		'Quattrocento, serif' => 'Quattrocento',
		'Raleway, cursive' => 'Raleway',
		'Ubuntu, sans-serif' => 'Ubuntu',
		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz',
		'Black Ops One, cursive' => 'Black Ops One',
		'Keania One , cursive'=> 'Keania One',
		'Anton, sans-serif' => 'Anton'
	);
	return $google_faces;
}
/* 
 * Outputs the selected option panel styles inline into the <head>
 */
function options_typography_styles() {
 	/* It's helpful to include an option to disable styles.  If this is selected */
 	/* no inline styles will be outputted into the <head> */
 	if ( !of_get_option( 'disable_styles' ) ) {
		$output = '';
		$input = '';
		if ( of_get_option( 'body_font' ) ) {
			$output .= options_typography_font_styles( of_get_option( 'body_font' ) , 'body');
		}
		if ( of_get_option( 'site_title_font' ) ) {
			$output .= options_typography_font_styles( of_get_option( 'site_title_font' ) , '#site-title');
		}
		if ( of_get_option( 'header_font' ) ) {
			$output .= options_typography_font_styles( of_get_option( 'header_font' ) , 'h1,h2,h3,h4,h5,h6');
		}
		if ( of_get_option( 'link_color' ) ) {
			$output .= 'a {color:' . of_get_option( 'link_color' ) . '}';
		}
		if ( of_get_option( 'link_hover_color' ) ) {
			$output .= 'a:hover {color:' . of_get_option( 'link_hover_color' ) . '}';
		}
		if ( of_get_option( 'google_font' ) ) {
			$input = of_get_option( 'google_font' );
			$output .= options_typography_font_styles( of_get_option( 'google_font' ) , '.google-font');
		}
		if ( of_get_option( 'google_mixed' ) ) {
			$input = of_get_option( 'google_mixed' );
			$output .= options_typography_font_styles( of_get_option( 'google_mixed' ) , '.google-mixed');
		}
		if ( of_get_option( 'google_mixed_2' ) ) {
			$input = of_get_option( 'google_mixed_2' );
			$output .= options_typography_font_styles( of_get_option( 'google_mixed_2' ) , '.google-mixed-2');
		}
		if ( of_get_option( 'head_font_forum' ) ) {
			$input = of_get_option( 'head_font_forum' );
			$output .= options_typography_font_styles( of_get_option( 'head_font_forum' ) , 'h1.titoloforum A');
		}
		if ( of_get_option( 'home_side_font_forum' ) ) {
			$input = of_get_option( 'home_side_font_forum' );
			$output .= options_typography_font_styles( of_get_option( 'home_side_font_forum' ) , 'H2.withlogo, H3.widget-title, A.withlogo,ASIDE.fbox H2.news.titolo.articolo.withlogo A');
		}
		if ( of_get_option( 'menu_font_forum' ) ) {
			$input = of_get_option( 'menu_font_forum' );
			$output .= options_typography_font_styles( of_get_option( 'menu_font_forum' ) , 'NAV.access DIV.menu-header .menu LI.menu-item A');
		}
		if ( (of_get_option('forced_section'))){
		if ( of_get_option( 'sidebox_font_forum' ) ) {
			$input = of_get_option( 'sidebox_font_forum' );
			$output .= options_typography_font_styles( of_get_option( 'sidebox_font_forum' ) , '.forcedlateral H2 SPAN A');
		}}
		if ( $output != '' ) {
			$output = "\n<style>\n" . $output . "</style>\n";
			echo $output;
		}
	}
}
add_action('wp_head', 'options_typography_styles');
/* 
 * Returns a typography option in a format that can be outputted as inline CSS
 */
function options_typography_font_styles($option, $selectors) {
		$output = $selectors . ' {';
		$output .= ' color:' . $option['color'] .'; ';
		$output .= 'font-family:' . $option['face'] . '; ';
		$output .= 'font-weight:' . $option['style'] . '; ';
		/*$output .= 'font-size:' . $option['size'] . '; ';*/
		$output .= '}';
		$output .= "\n";
		return $output;
}
/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
if ( !function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		/* Define all the options that possibly have a unique Google font */
		$google_font = of_get_option('google_font', 'Rokkitt, serif');
		$google_mixed = of_get_option('google_mixed', false);
		$google_mixed_2 = of_get_option('google_mixed_2', 'Arvo, serif');
		/* Get the font face for each option and put it in an array */
		$selected_fonts = array(
			$google_font['face'],
			$google_mixed['face'],
			$google_mixed_2['face'] );
		/* Remove any duplicates in the list */
		$selected_fonts = array_unique($selected_fonts);
		/* Check each of the unique fonts against the defined Google fonts */
		/* If it is a Google font, go ahead and call the function to enqueue it */
		foreach ( $selected_fonts as $font ) {
			if ( in_array( $font, $all_google_fonts ) ) {
				options_typography_enqueue_google_font($font);
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );
/**
 * Enqueues the Google $font that is passed
 */
function options_typography_enqueue_google_font($font) {
	$font = explode(',', $font);
	$font = $font[0];
	/* Certain Google fonts need slight tweaks in order to load properly */
	/* Like our friend "Raleway" */
	if ( $font == 'Raleway' )
		$font = 'Raleway:100';
	$font = str_replace(" ", "+", $font);
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}

/* Modifiche al template in base alle sidebar presenti */

function mdframework_has_sidebar($classes) {
    if (is_active_sidebar('sidebar-1')) {
        /*  add 'class-name' to the $classes array */
        $classes[] = 'sidebar-1';
    }
	if (is_active_sidebar('sidebar-forum')) {
        /*  add 'class-name' to the $classes array */
        $classes[] = 'forumside';
    }
	if (is_active_sidebar('left-banner')) {
        /*  add 'class-name' to the $classes array */
        $classes[] = 'left-banner-sidebar';
    }
	if (is_active_sidebar('right-banner')) {
        /*  add 'class-name' to the $classes array */
        $classes[] = 'right-banner-sidebar';
    }
	if (is_active_sidebar('forum-special')) {
      /*  add 'class-name' to the $classes array */
        $classes[] = 'forum-special-sidebar';
    }
	if ((!(is_active_sidebar('sidebar-1')))&&(!(is_active_sidebar('sidebar-forum')))&&(!(is_active_sidebar('left-banner')))&&(!(is_active_sidebar('right-banner')))&&(!(is_active_sidebar('forum-special')))){
		$classes[] = 'senzasidebar';
	}
    /* return the $classes array */
    return $classes;
}
add_filter('body_class','mdframework_has_sidebar');

/* Modifica il Read More */

/* Changing excerpt more */
   function new_excerpt_more($more) {
   global $post;
   return '… <a href="'. get_permalink($post->ID) . '">' . __('Read More &raquo;','mdramework') . '</a>';
   }
   add_filter('excerpt_more', 'new_excerpt_more');
   
/* Collega Thumbnail al post */
add_filter( 'post_thumbnail_html', 'my_post_image_html', 10, 3 );

function my_post_image_html( $html, $post_id, $post_image_id ) {

  $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';
  return $html;

}

/* Preleva la prima immagine da ogni post, per mostrarla usa: <?php getImage('1'); ?> */

function getImage($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '/width="960px" height="300px"/',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
}

/* Prima immagine con dimensioni di 100px*100px */

function getImage100($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '/width="100px" height="100px"/',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
}

/* Prima immagine con dimensioni di 200px*200px */

function getImage200($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
/* $titolo = the_title(); */
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '/width="200px" height="200px"/',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
};
/* Prima immagine con dimensioni di 100px*80px */

function getImage10080($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
/* $titolo = the_title(); */
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '/width="100px" height="80px"/',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
};
/* Prima immagine con Width 240px e no Height TAG */

function getImagenoHeightsize($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
/* $titolo = the_title(); */
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '/width="240px"/',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
};
/* Prima immagine senza Width ne Height TAG */

function getImagenosizetags($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
/* $titolo = the_title(); */
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '//',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
};

/* Prima Immagine Mini 50*50 */
function getMiniimage($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
/* $titolo = the_title(); */
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '/width="50px" height="50px"/',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
};

/* Prima Immagine Mini 960*300 */
function getimage960300($num) {
global $more;
$more = 1;
$link = get_permalink();
$content = get_the_content();
$count = substr_count($content, '<img');
$start = 0;
for($i=1;$i<=$count;$i++) {
$imgBeg = strpos($content, '<img', $start);
$post = substr($content, $imgBeg);
$imgEnd = strpos($post, '>');
$postOutput = substr($post, 0, $imgEnd+1);
/* $titolo = the_title(); */
$postOutput = preg_replace('/width="([0-9]*)" height="([0-9]*)"/', '/width="960px" height="300px"/',$postOutput);
$image[$i] = $postOutput;
$start=$imgEnd+1;
}
if(stristr($image[$num],'<img')) { echo ''.$image[$num].""; }
$more = 0;
};

/* altra funzione per le immagini */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ /* Defines a default image */
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}
/* Funzione Immagini con echo */
function gpi_find_image_id($post_id) {
    if (!$img_id = get_post_thumbnail_id ($post_id)) {
        $attachments = get_children(array(
            'post_parent' => $post_id,
            'post_type' => 'attachment',
            'numberposts' => 1,
            'post_mime_type' => 'image'
        ));
        if (is_array($attachments)) foreach ($attachments as $a)
            $img_id = $a->ID;
    }
    if ($img_id)
        return $img_id;
    return false;
};
function find_img_src($post) {
    if (!$img = gpi_find_image_id($post->ID))
        if ($img = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches))
            $img = $matches[1][0];
    if (is_int($img)) {
        $img = wp_get_attachment_image_src($img);
        $img = $img[0];
    }
    return $img;
};
/* Mantieni HTML in Excerpt 
function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content. 
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content. 
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
     
    $allowed_tags = '<p>,<a>,<em>,<strong>,<img>,<video>'; 
    $text = strip_tags($text, $allowed_tags);
     
    $excerpt_word_count = 55; 
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
     
    $excerpt_end = '[...]'; 
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');
*/

/* Excerpt con lunghezza personalizzata */
/* Per utilizzare richiamare: <?php custom_excerpt('12'); ?> */
/* Dove ad esempio '12' è il numero di parole da conservare */
function custom_excerpt($excerpt_length) {
    $content = get_the_content();
        $text = strip_shortcodes( $content );
        //$text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $text = strip_tags($text);
        $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
        if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
        } else {
            $text = implode(' ', $words);
        }

    echo $text;
};

/* YouTube Page Template */
/**
 * video ID
 */
function wptuts_get_yt_ID( $uri ) {
	
	/* how long YT ID's are */
	$id_len = 11;
	
	/* where to start looking */
	$id_begin = strpos( $uri, '?v=' );
	/* if the id isn't at the beginning of the uri for some reason */
	if( $id_begin === FALSE )
		$id_begin = strpos( $uri, "&v=" );
	/* all else fails */
	if( $id_begin === FALSE )
		wp_die( 'YouTube video ID not found. Please double-check your URL.' );
	/* now go to the proper start */
	$id_begin +=3;
	
	/* get the ID */
	$yt_ID = substr( $uri, $id_begin, $id_len);
	
	return $yt_ID;		
}

/**
 * Enqueue videos js
 */
add_action( 'wp_enqueue_scripts', 'wptuts_enqueue_video_js' );
function wptuts_enqueue_video_js() {
	if ( is_page_template( 'page-cats.php' ) )
		wp_enqueue_script( 'video_js', get_template_directory_uri() . '/js/video.js', array( 'jquery' ) );
}

/* Modifiche ai commenti */

/*Rimuovi link */
remove_filter('comment_text', 'make_clickable', 9);
/*Rimuovi campo URL*/
function remove_comment_fields($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields');
/* Aggiungi campi ai commenti */
/*Aggiunge campo età */
/*
function add_comment_fields($fields) {
 
    $fields['age'] = '<p class="comment-form-age"><label for="age">' . __( 'Age' ) . '</label>' .
        '<input id="age" name="age" type="text" size="30" /></p>';
    return $fields;
 
}
add_filter('comment_form_default_fields','add_comment_fields');

function add_comment_meta_values($comment_id) {
 
    if(isset($_POST['age'])) {
        $age = wp_filter_nohtml_kses($_POST['age']);
        add_comment_meta($comment_id, 'age', $age, false);
    }
 
}
add_action ('comment_post', 'add_comment_meta_values', 1);
*/
/* Mostrare campo età : <?php echo "Comment authors age: ".get_comment_meta( $comment->comment_ID, 'age', true ); ?> */

/* Modifiche alla DashBoard */

/*Modifiche al titolo predefinito dei post */
function title_text_input( $title ){
     return $title = __("Gimme a title and I'll leverage the Wor(l)d","mdramework");
}
add_filter( 'enter_title_here', 'title_text_input' );

/*Modifica footer DashBoard */
function remove_footer_admin () {
    echo "Sito Web Ottimizzato da MaisDesign";
} 

add_filter('admin_footer_text', 'remove_footer_admin'); 


/* Messaggi di aiuto personalizzati */
/*
function my_admin_help($text, $screen) {
	/* Check we're only on my Settings page*/
	/*
	if (strcmp($screen, MY_PAGEHOOK) == 0 ) {

		$text = 'Here is some very useful information to help you use this plugin...';
		return $text;
	}
	/* Let the default WP Dashboard help stuff through on other Admin pages */
	/*
	return $text;
}

add_action( 'contextual_help', 'my_admin_help' );
*/

/* Aggiunge altri moduli al profilo */
function my_user_contactmethods($user_contactmethods){
  $user_contactmethods['twitter'] = 'Twitter Username';
  $user_contactmethods['facebook'] = 'Facebook Username';

  return $user_contactmethods;
}

add_filter('user_contactmethods', 'my_user_contactmethods');

/* Aggiunge Thumbnail ai feed */
function cwc_rss_post_thumbnail($content) {
    global $post;
    if(has_post_thumbnail($post->ID)) {
        $content = '<p>' . get_the_post_thumbnail($post->ID) .
        '</p>' . get_the_content();
    }

    return $content;
}
add_filter('the_excerpt_rss', 'cwc_rss_post_thumbnail');
add_filter('the_content_feed', 'cwc_rss_post_thumbnail');

/* Abilita PHP nei Widget */
function php_text($text) {
 if (strpos($text, '<' . '?') !== false) {
 ob_start();
 eval('?' . '>' . $text);
 $text = ob_get_contents();
 ob_end_clean();
 }
 return $text;
}
add_filter('widget_text', 'php_text', 99);

/* Widget personalizzati lato Admin */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo __('<p>Welcome to <a href="http://maisdesign.it" title="WebDesign SEO Catania">MDFRAMEWORK</a>! Need help? Contact the developer <a href="mailto:marco@maisdesign.it">here</a>.','mdframework');
}

/* Aggiunge link login/logout al menu 
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function add_login_logout_link($items, $args) {
 
        ob_start();
        wp_loginout('index.php');
        $loginoutlink = ob_get_contents();
        ob_end_clean();
 
        $items .= '<li>'. $loginoutlink .'</li>';
 
    return $items;
}
*/
/* Aggiunge box di ricerca nel menu 
add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items, $args) {
 
        ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();
 
        $items .= '<li>' . $searchform . '</li>';
 
    return $items;
}*/

/* It adds a CheckBox to Publish Post 
add_action( 'post_submitbox_misc_actions', 'table_css_js_enable' );
function table_css_js_enable($post)
{
    $value = get_post_meta($post->ID, '_table_css_js_enable', true);
    echo '<div class="misc-pub-section misc-pub-section-last">
         <span id="timestamp">'
         . '<label><input type="checkbox"' . (!empty($value) ? ' checked="checked" ' : null) . 'value="1" name="table_css_js_enable" />'.__('  Are you creating a table?','mdframework').'</label>'
    .'</span></div>';
}

function save_postdata($postid)
{   
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return false;
    if ( !current_user_can( 'edit_page', $postid ) ) return false;
    if(empty($postid) || $_POST['post_type'] != 'article' ) return false;

    if($_POST['action'] == 'editpost'){
        delete_post_meta($postid, 'table_css_js_enable');
    }

    add_post_meta($postid, 'table_css_js_enable', $_POST['table_css_js_enable']);
}*/

/*Defines Custom Post Folder */
define( 'MDCP_URL', trailingslashit( get_stylesheet_directory_uri() . '/inc' ) );
define( 'MDCP_DIR', trailingslashit( TEMPLATEPATH . '/inc' ) );

/* Include Custom-posts settings */
if (of_get_option('custom_custom_post_creator')){
	$quanticpost = of_get_option('how_many_custom_posts');
//require_once MDCP_DIR . 'mdcustom-post.php';
//require_once MDCP_DIR . 'mdcustom-post2.php';
require_once MDCP_DIR . 'cpost/cpost_if_'.$quanticpost.'.php';
};

/* Call Googles HTML5 Shim, but only for users on old versions of IE*/
function wpfme_IEhtml5_shim () {
	global $is_IE;
	if ($is_IE)
	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'wpfme_IEhtml5_shim');


/* Remove the version number of WP
 Warning - this info is also available in the readme.html file in your root directory - delete this file!*/
remove_action('wp_head', 'wp_generator');


/*ADDS GOOGLE ANALYTICS CODE TO FOOTER */
function mdframework_google_analytics() {
	$gacustom = of_get_option('google_analytics_custom_code');
	echo '<script>'.$gacustom.'</script>';
}
add_action('wp_footer', 'mdframework_google_analytics');

/*Aggiunge pulsanti all'editor */
	function add_more_buttons($buttons) {
 $buttons[] = 'hr';
 $buttons[] = 'del';
 $buttons[] = 'sub';
 $buttons[] = 'sup';
 $buttons[] = 'fontselect';
 $buttons[] = 'fontsizeselect';
 $buttons[] = 'cleanup';
 $buttons[] = 'styleselect';
 return $buttons;
}
add_filter("mce_buttons_3", "add_more_buttons");

/* Post correlati
Aggiungere:  <div id="related-posts"> <?php show_related_posts();?> </div>
per mostrarli
	*/
function show_related_posts() {
		global $post;
		$tags = wp_get_post_tags($post->ID);
		if($tags) {
  		_e('<h3>Post correlati</h3>') . "\n";
  		$first_tag = $tags[0]->term_id;
  		$args = array(
    		'tag__in' => array($first_tag),
    		'post__not_in' => array($post->ID),
    		'showposts'=> 5,
    		'caller_get_posts'=>1
   		);
  	$my_query = new WP_Query($args);
  		if( $my_query->have_posts() ) {
  		    echo '<ul>' . "\n";
    		while ($my_query->have_posts()) : $my_query->the_post(); ?>
      		<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
      	<?php
    		endwhile;
    		echo '</ul>' . "\n";
    		 wp_reset_query();
  		}
  	  }
}

/* Thumbnail di default */
	add_filter( 'post_thumbnail_html', 'webeing_default_thumb', 10, 5 );
function webeing_default_thumb( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
        $width = "";
        $height =  "";
 
        if( '' == $html ) {
            global $_wp_additional_image_sizes;
 
            $dimensions = '';
            if ( is_array( $size ) ){
                $width = $size[0];
                $height = $size[1];
            }
            else{
                if( isset( $_wp_additional_image_sizes[$size] ) ) {
                    $width = $_wp_additional_image_sizes[$size]['width'];
                    $height = $_wp_additional_image_sizes[$size]['height'];
                }
            }
            $dimensions = 'width="'.$width.'" height="'.$height.'" ';
            $html = '<img src="http://placehold.it/'.$width.'x'.$height.'" />';
        }
        return $html;
}

/* Galleria Thumbnail post più commentati 
Usare: <?php most_popular_post_thumbnail(); ?> per mostrarli
	*/
	
function most_popular_post_thumbnail() {
    $current_month = date('n');
    if($current_month==1){ $last_month=12; }else{ $last_month=$current_month-1; }
    $args = array(
        'posts_per_page' => 4,
        'monthnum'       => $last_month,
        'orderby'        => 'comment_count',
     );
    echo '<h1>Post popolari</h1><div class="popular-posts">';
	query_posts($args);
	while (have_posts()) : the_post();
   	echo '<a href="<?php the_permalink(); ?>" title="'.the_title().'">'.the_post_thumbnail( "thumbnail" ).'</a>';
	endwhile;
	echo '</div>';
	wp_reset_query();
};

/* Guida stradale automatica
	Usare: <?php auto_maps_form_submit_mdframework(); ?> per mostrarla
	*/
	function auto_maps_form_submit_mdframework(){
		echo '<form action="http://maps.google.com/maps" method="get" target="_blank">
				<label for="saddr">Enter your location</label>
				<input type="text" name="saddr" />
				<input type="hidden" name="daddr" value="'.of_get_option("code_maps_form_submit_mdframework").'" />
				<input type="submit" value="Get directions" />
			</form>';
	};
/* Inserisci le immagini nel Tag <figure> */
	function html5_insert_image($html, $id, $caption, $title, $align, $url) {
  $html5 = "<figure id='post-$id media-$id' class='align-$align'>";
  $html5 .= "<img src='$url' alt='$title' />";
  if ($caption) {
    $html5 .= "<figcaption>$caption</figcaption>";
  }
  $html5 .= "</figure>";
  return $html5;
}
add_filter( 'image_send_to_editor', 'html5_insert_image', 10, 9 );

/* Deregistra jQuery 
	wp_deregister_script('jquery');*/

/* Aggiunge colonna per il nome del template usato nelle pagine */
	add_action('manage_pages_columns', 'add_page_text_column');
add_action('manage_pages_custom_column','show_page_template_column',10,2);

function add_page_text_column($page_columns) {
  $page_columns['page_template'] = "Page template";
  return $page_columns;
}

function show_page_template_column($column_name, $post_id){
if( $column_name == 'page_template' ) {
	$page_template 	= get_post_meta($post_id, '_wp_page_template', true); // file name		
	if( !$page_template )
       	echo '<em>'.__('default').'</em>';
	echo $page_template;
}
}

/* lista tutte le funzioni */
	function list_hooked_functions($tag=false){
 global $wp_filter;
 if ($tag) {
  $hook[$tag]=$wp_filter[$tag];
  if (!is_array($hook[$tag])) {
  trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
  return;
  }
 }
 else {
  $hook=$wp_filter;
  ksort($hook);
 }
 echo '<pre>';
 foreach($hook as $tag => $priority){
  echo "<br />&gt;&gt;&gt;&gt;&gt;\t<strong>$tag</strong><br />";
  ksort($priority);
  foreach($priority as $priority => $function){
  echo $priority;
  foreach($function as $name => $properties) echo "\t$name<br />";
  }
 }
 echo '</pre>';
 return;
}
	/* Admin bar deactivator */
	if (of_get_option('admin_bar_deactivator')){
		/*function remove_admin_bar_space () {
			remove_action( 'wp_head', '_admin_bar_bump_cb' );
		}
		add_action( 'admin_bar_init', 'remove_admin_bar_space' );
		show_admin_bar(false);*/
		if ( !is_admin() ) {  
			remove_action( 'init', '_wp_admin_bar_init' );  
		}  
	};
/* Text Resizer Script */
/*
function md_resizer_script_embed() {
	wp_enqueue_script(
		'textresizer',
		get_template_directory_uri() . '/js/textresizer.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'md_resizer_script_embed' );
*/
function md_resizer_fit_script_embed() {
	wp_enqueue_script(
		'jquery.fittext',
		get_template_directory_uri() . '/js/jquery.fittext.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'md_resizer_fit_script_embed' );

/*
function md_resizer_fit_rm_script_embed() {
	wp_enqueue_script(
		'jquery.rm',
		get_template_directory_uri() . '/js/jquery.rm.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'md_resizer_fit_rm_script_embed' );

function md_resizer_inflate_script_embed() {
	wp_enqueue_script(
		'inflate',
		get_template_directory_uri() . '/js/inflateText.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'md_resizer_inflate_script_embed' );


function md_bigtext_script_embed() {
	wp_enqueue_script(
		'jquery.slabtext.min',
		get_template_directory_uri() . '/js/bigtext.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'md_bigtext_script_embed' );

function md_resizer_fit_slab_script_embed() {
	wp_enqueue_script(
		'jquery.slabtext.min',
		get_template_directory_uri() . '/js/jquery.slabtext.min.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'md_resizer_fit_slab_script_embed' );
*/
function md_resizer_expandtext_script_embed() {
	wp_enqueue_script(
		'expandtext',
		get_template_directory_uri() . '/js/jquery.expandtext.js',
		array( 'jquery' )
	);
}

add_action( 'wp_enqueue_scripts', 'md_resizer_expandtext_script_embed' );

/* Hex to RGB - RGB to Hex */
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   /*return implode(",", $rgb); // returns the rgb values separated by commas*/
   return $rgb; // returns an array with the rgb values
};
/* Custom Fields */
// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( TEMPLATEPATH . '/meta-box' ) );
// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';
// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
include RWMB_DIR . '/enabled/config-meta-boxes.php';