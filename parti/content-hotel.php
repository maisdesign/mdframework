<div id="primary" class="site-content <?php echo of_get_option('example_images', 'no entry' ); ?>">
		<div id="content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'mdframework' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'mdframework' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'mdframework' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php $partibody = of_get_option('example_images', 'no entry' );
if (!($partibody == 'unacol')){ 
	get_sidebar();
};?>