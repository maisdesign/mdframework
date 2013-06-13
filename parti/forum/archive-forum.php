<!-- File archive-forum -->
<section class="novesessanta customizemeforum">
	<section class="contenuti ucancustomize">
		<?php get_sidebar('forum');?>
		<section class="centrosito customcentrosito">
			<section id="primary customizeforum" class="site-content">
				<div id="content" role="main">
					<?php if ( have_posts() ) : ?>
						<header class="archive-header">
							<h2 class="archive-title"><?php
								if ( is_day() ) :
								printf( __( 'Daily Archives: %s', 'mdframework' ), '<span>' . get_the_date() . '</span>' );
								elseif ( is_month() ) :
								printf( __( 'Monthly Archives: %s', 'mdframework' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'mdframework' ) ) . '</span>' );
								elseif ( is_year() ) :
								printf( __( 'Yearly Archives: %s', 'mdframework' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'mdframework' ) ) . '</span>' );
								else :
								_e( 'Archives', 'mdframework' );
								endif;
							?></h2>
						</header><!-- .archive-header -->
					<?php /* Start the Loop */
						while ( have_posts() ) : the_post();
						/* Include the post format-specific template for the content. If you want to * this in a child theme then include a file called called content-___.php * (where ___ is the post format) and that will be used instead. */
							get_template_part( 'parti/forum/content', 'archive-forum' );
						endwhile;
						mdframework_content_nav( 'nav-below' );
					?>
					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
					<?php endif; ?>
				</div><!-- #content -->
			</section><!-- #primary -->
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