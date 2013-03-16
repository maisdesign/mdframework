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
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'mdframework' ) );	register_nav_menu( 'forummenu', __( 'Forum Top Menu', 'mdframework' ) );
	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'mdframework_setup' );
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
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	// Add a page number if necessary.
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
	register_sidebar( array(		'name' => __( 'Sidebar specific for forum style homepage', 'mdframework' ),		'id' => 'sidebar-forum',		'description' => __( 'Appears on a Forum Style Template when needed', 'mdframework' ),		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		'after_widget' => '</aside>',		'before_title' => '<h3 class="widget-title">',		'after_title' => '</h3>',	) );	register_sidebar( array(		'name' => __( 'Left Banner Area', 'mdframework' ),		'id' => 'left-banner',		'description' => __( 'Left Banner Area', 'mdframework' ),		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		'after_widget' => '</aside>',		'before_title' => '<h3 class="widget-title">',		'after_title' => '</h3>',	) );	register_sidebar( array(		'name' => __( 'Right Banner Area', 'mdframework' ),		'id' => 'right-banner',		'description' => __( 'Right Banner Area', 'mdframework' ),		'before_widget' => '<aside id="%1$s" class="widget %2$s">',		'after_widget' => '</aside>',		'before_title' => '<h3 class="widget-title">',		'after_title' => '</h3>',	) );
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
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'mdframework' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'mdframework' ) ); ?></div>
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
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'mdframework' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'mdframework' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
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
	endswitch; // end comment_type check
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
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'mdframework' ) );
	// Translators: used between list items, there is a space after the comma.
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
	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
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
	// Enable custom font class only if the font CSS is queued to load.
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
}
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
                set_post_thumbnail($post->ID, $attachment_id);// the size of the thumbnail is defined in a function above
            }
        }
    }
}  //end function
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');
/* 
 * Temporary notice, will be removed once file uploader
 * is stable
 */
/*
function optionsframework_admin_notice(){
    echo '<div class="updated">
       <p>Options Framework Development Version: Help test the <a href="https://github.com/devinsays/options-framework-plugin/issues/135#issuecomment-12031802">new file uploader</a></p>
    </div>';
}
add_action( 'admin_notices', 'optionsframework_admin_notice' );*//*Compatibilità BuddyPress */add_theme_support( 'buddypress' );/* Elementi menu personalizzati */function new_nav_menu_items($items, $args) {    if( $args->theme_location == 'forummenu' ){        $loglink = '<li class="show_hide"><a href="#">' . __('Open Login Form','mdframework') . '</a></li>';        $items = $items . $loglink;    }    return $items;}add_filter( 'wp_nav_menu_items', 'new_nav_menu_items', 10, 2 );/* Aggiunta Font personalizzati *//*  * Note: Options Typography is a child theme of Options Framework Theme * So all the functions from the parent theme are also inherited */ /** * Returns an array of system fonts * Feel free to edit this, update the font fallbacks, etc. */function options_typography_get_os_fonts() {	// OS Font Defaults	$os_faces = array(		'Arial, sans-serif' => 'Arial',		'"Avant Garde", sans-serif' => 'Avant Garde',		'Cambria, Georgia, serif' => 'Cambria',		'Copse, sans-serif' => 'Copse',		'Garamond, "Hoefler Text", Times New Roman, Times, serif' => 'Garamond',		'Georgia, serif' => 'Georgia',		'"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',		'Tahoma, Geneva, sans-serif' => 'Tahoma'	);	return $os_faces;}/** * Returns a select list of Google fonts * Feel free to edit this, update the fallbacks, etc. */function options_typography_get_google_fonts() {	// Google Font Defaults	$google_faces = array(		'Arvo, serif' => 'Arvo',		'Copse, sans-serif' => 'Copse',		'Droid Sans, sans-serif' => 'Droid Sans',		'Droid Serif, serif' => 'Droid Serif',		'Lobster, cursive' => 'Lobster',		'Nobile, sans-serif' => 'Nobile',		'Open Sans, sans-serif' => 'Open Sans',		'Oswald, sans-serif' => 'Oswald',		'Pacifico, cursive' => 'Pacifico',		'Rokkitt, serif' => 'Rokkit',		'PT Sans, sans-serif' => 'PT Sans',		'Quattrocento, serif' => 'Quattrocento',		'Raleway, cursive' => 'Raleway',		'Ubuntu, sans-serif' => 'Ubuntu',		'Yanone Kaffeesatz, sans-serif' => 'Yanone Kaffeesatz',		'Black Ops One, cursive' => 'Black Ops One',
		'Keania One , cursive'=> 'Keania One',
		'Anton, sans-serif' => 'Anton'	);	return $google_faces;}/*  * Outputs the selected option panel styles inline into the <head> */function options_typography_styles() { 	// It's helpful to include an option to disable styles.  If this is selected 	// no inline styles will be outputted into the <head> 	if ( !of_get_option( 'disable_styles' ) ) {		$output = '';		$input = '';		if ( of_get_option( 'body_font' ) ) {			$output .= options_typography_font_styles( of_get_option( 'body_font' ) , 'body');		}		if ( of_get_option( 'site_title_font' ) ) {			$output .= options_typography_font_styles( of_get_option( 'site_title_font' ) , '#site-title');		}		if ( of_get_option( 'header_font' ) ) {			$output .= options_typography_font_styles( of_get_option( 'header_font' ) , 'h1,h2,h3,h4,h5,h6');		}		if ( of_get_option( 'link_color' ) ) {			$output .= 'a {color:' . of_get_option( 'link_color' ) . '}';		}		if ( of_get_option( 'link_hover_color' ) ) {			$output .= 'a:hover {color:' . of_get_option( 'link_hover_color' ) . '}';		}		if ( of_get_option( 'google_font' ) ) {			$input = of_get_option( 'google_font' );			$output .= options_typography_font_styles( of_get_option( 'google_font' ) , '.google-font');		}		if ( of_get_option( 'google_mixed' ) ) {			$input = of_get_option( 'google_mixed' );			$output .= options_typography_font_styles( of_get_option( 'google_mixed' ) , '.google-mixed');		}		if ( of_get_option( 'google_mixed_2' ) ) {			$input = of_get_option( 'google_mixed_2' );			$output .= options_typography_font_styles( of_get_option( 'google_mixed_2' ) , '.google-mixed-2');		}		if ( of_get_option( 'head_font_forum' ) ) {			$input = of_get_option( 'head_font_forum' );			$output .= options_typography_font_styles( of_get_option( 'head_font_forum' ) , 'h1.titoloforum A');		}
		if ( of_get_option( 'home_side_font_forum' ) ) {
			$input = of_get_option( 'home_side_font_forum' );
			$output .= options_typography_font_styles( of_get_option( 'home_side_font_forum' ) , 'H2.withlogo, H3.widget-title, A.withlogo');
		}		if ( $output != '' ) {			$output = "\n<style>\n" . $output . "</style>\n";			echo $output;		}	}}add_action('wp_head', 'options_typography_styles');/*  * Returns a typography option in a format that can be outputted as inline CSS */function options_typography_font_styles($option, $selectors) {		$output = $selectors . ' {';		$output .= ' color:' . $option['color'] .'; ';		$output .= 'font-family:' . $option['face'] . '; ';		$output .= 'font-weight:' . $option['style'] . '; ';		$output .= 'font-size:' . $option['size'] . '; ';		$output .= '}';		$output .= "\n";		return $output;}/** * Checks font options to see if a Google font is selected. * If so, options_typography_enqueue_google_font is called to enqueue the font. * Ensures that each Google font is only enqueued once. */if ( !function_exists( 'options_typography_google_fonts' ) ) {	function options_typography_google_fonts() {		$all_google_fonts = array_keys( options_typography_get_google_fonts() );		// Define all the options that possibly have a unique Google font		$google_font = of_get_option('google_font', 'Rokkitt, serif');		$google_mixed = of_get_option('google_mixed', false);		$google_mixed_2 = of_get_option('google_mixed_2', 'Arvo, serif');		// Get the font face for each option and put it in an array		$selected_fonts = array(			$google_font['face'],			$google_mixed['face'],			$google_mixed_2['face'] );		// Remove any duplicates in the list		$selected_fonts = array_unique($selected_fonts);		// Check each of the unique fonts against the defined Google fonts		// If it is a Google font, go ahead and call the function to enqueue it		foreach ( $selected_fonts as $font ) {			if ( in_array( $font, $all_google_fonts ) ) {				options_typography_enqueue_google_font($font);			}		}	}}add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );/** * Enqueues the Google $font that is passed */function options_typography_enqueue_google_font($font) {	$font = explode(',', $font);	$font = $font[0];	// Certain Google fonts need slight tweaks in order to load properly	// Like our friend "Raleway"	if ( $font == 'Raleway' )		$font = 'Raleway:100';	$font = str_replace(" ", "+", $font);	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );}

/* Modifiche al template in base alle sidebar presenti */

function mdframework_has_sidebar($classes) {
    if (is_active_sidebar('sidebar-1')) {
        // add 'class-name' to the $classes array
        $classes[] = 'sidebar-1';
    }
	if (is_active_sidebar('sidebar-forum')) {
        // add 'class-name' to the $classes array
        $classes[] = 'forumside';
    }
	if (is_active_sidebar('left-banner')) {
        // add 'class-name' to the $classes array
        $classes[] = 'left-banner-sidebar';
    }
	if (is_active_sidebar('right-banner')) {
        // add 'class-name' to the $classes array
        $classes[] = 'right-banner-sidebar';
    }
	if ((!(is_active_sidebar('sidebar-1')))&&(!(is_active_sidebar('sidebar-forum')))&&(!(is_active_sidebar('left-banner')))&&(!(is_active_sidebar('right-banner')))){
		$classes[] = 'senzasidebar';
	}
    // return the $classes array
    return $classes;
}
add_filter('body_class','mdframework_has_sidebar');

/* Modifica il Read More */

// Changing excerpt more
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