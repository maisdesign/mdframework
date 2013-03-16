<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php $partihead = of_get_option('seleziona_testata', 'no entry' );?>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
<style>
BODY {background:<?php echo of_get_option('colorpicker_body_background', 'no entry' ); ?>;}
HEADER {background:<?php echo of_get_option('colorpicker_header', 'no entry' ); ?>;}
NAV#access {background:<?php echo of_get_option('colorpicker_top_menu', 'no entry' ); ?>;}
#page {background:<?php echo of_get_option('colorpicker_content', 'no entry' ); ?>;}
#primary {background:<?php echo of_get_option('colorpicker_post', 'no entry' ); ?>;}
#secondary {background:<?php echo of_get_option('colorpicker_sidebar', 'no entry' ); ?>;}
.basso {background:<?php echo of_get_option('colorpicker_footer', 'no entry' ); ?>;}
</style>
</head>
<body <?php body_class(); ?>>
	<div id="page">

	<?php $partihead = of_get_option('seleziona_testata', 'no entry' ); ?>
		<?php get_template_part('parti/'.$partihead,'');?>	
		<nav id="access" role="navigation">
			<div class="skip-link screen-reader-text">
				<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mdframework' ); ?>">
				<?php _e( 'Skip to content', 'mdframework' ); ?></a>
			</div>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	<?php get_sidebar('2');?>	