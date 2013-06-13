<!-- Inizio search-forum -->
<section class="novesessanta customizemeforum">
	<section class="contenuti ucancustomize">
		<?php get_sidebar('forum');?>
		<section class="centrosito customcentrosito">
	<section id="primary customizeforum" class="site-content">
		<div id="content" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'mdframework' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			<?php mdframework_content_nav( 'nav-above' ); ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php mdframework_content_nav( 'nav-below' ); ?>
		<?php else : ?>
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'mdframework' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'mdframework' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->
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
<!-- Fine search-forum -->