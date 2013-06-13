<!-- File image-forum -->
<section class="novesessanta customizemeforum">
	<section class="contenuti ucancustomize">
		<?php get_sidebar('forum');?>
		<section class="centrosito customcentrosito">
			<div id="primary customizeforum" class="site-content <?php echo of_get_option('example_images', 'no entry' ); ?>">
				<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
							<footer class="entry-meta">
								<?php
									$metadata = wp_get_attachment_metadata();
									printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>.', 'mdframework' ),
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() ),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
									get_the_title( $post->post_parent )
								);?>
								<?php edit_post_link( __( 'Edit', 'mdframework' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-meta -->
						<nav id="image-navigation" class="navigation" role="navigation">
							<span class="previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'mdframework' ) ); ?></span>
							<span class="next-image"><?php next_image_link( false, __( 'Next &rarr;', 'mdframework' ) ); ?></span>
						</nav><!-- #image-navigation -->
					</header><!-- .entry-header -->
					<div class="entry-content">
						<div class="entry-attachment">
							<div class="attachment">
<?php
/**
 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
 */
$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
foreach ( $attachments as $k => $attachment ) :
	if ( $attachment->ID == $post->ID )
		break;
endforeach;
$k++;
/* If there is more than 1 attachment in a gallery*/
if ( count( $attachments ) > 1 ) :
	if ( isset( $attachments[ $k ] ) ) :
		/* get the URL of the next image attachment*/
		$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
	else :
		/* or get the URL of the first image attachment*/
		$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
	endif;
else :
	/* or, if there's only 1 image, get the URL of the image*/
	$next_attachment_url = wp_get_attachment_url();
endif;
?>
								<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
									<?php $attachment_size = apply_filters( 'mdframework_attachment_size', array( 960, 960 ) );echo wp_get_attachment_image( $post->ID, $attachment_size );?>
								</a>
								<?php if ( ! empty( $post->post_excerpt ) ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							</div><!-- .attachment -->
						</div><!-- .entry-attachment -->
						<div class="entry-description">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mdframework' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-description -->
					</div><!-- .entry-content -->
				</article><!-- #post -->
				<?php comments_template(); ?>
			<?php endwhile; // end of the loop. ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<section class="vidandnews">
				<!-- latest-video ok --><!-- latest-news ok -->
				<?php get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','video');
					get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','news');
					/* <?php get_template_part('parti/latest','news2');?>*/
				;?>
			</section>
		</section><!-- .centrosito -->
		<?php $numslshow = of_get_option('slideshows_numbers');
		switch ($numslshow) {
			case 5:
			case 4:
			case 3:
				if( (of_get_option('lateral_boxes'))== 'full'){
					echo'<section class="fillme screenshot x2 bigboxarea">';
				}else{
					echo'<section class="screenshot x2">';
				};
			break;
			default:
				if( (of_get_option('lateral_boxes'))== 'full'){
					echo '<section class="fillme screenshot x2 bigboxarea">';
				}else{
					echo'<section class="screenshot">';
				};
			break;				
		};$latboxes = of_get_option('lateral_boxes');
		switch($latboxes) {
			case 'split':
				echo '<!-- latest-screenshot ok -->';
				get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','screenshot');
				echo '<!-- latest-videopanel ok -->';
				get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','videopanel');
			break;
			case 'full':
				echo '</section>';
			break;
			default:
				get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','screenshot');
		};
			get_template_part('sidebars/sidebar-forum-special');
			if( (of_get_option('lateral_boxes'))!= 'full'){
				echo '</section>';
			};
		get_sidebar();?>
	</section><!-- .contenuti -->
</section><!-- novessanta -->
<?php if (of_get_option('enabling_fixed_banners')){get_template_part('sidebars/sidebar-right-banner');}?>
<!-- Fine file image-forum -->