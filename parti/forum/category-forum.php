<!-- parti/forum/category-forum -->
<section class="novesessanta customizemeforum">
	<section class="contenuti ucancustomize">
		<?php get_sidebar('forum');?>
		<section class="centrosito customcentrosito">
			<section id="primary customizeforum" class="site-content">
				<div id="content" role="main">
					<?php if ( have_posts() ) : ?>
						<header class="archive-header">
							<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'mdframework' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
							<?php if ( category_description() ) : /* Show an optional category description */?>
							<div class="archive-meta"><?php echo category_description(); ?></div>
							<?php endif; ?>
						</header><!-- .archive-header -->
					<?php /* Start the Loop */
						$contagrid = 1;
						$_SESSION['contandocat'] = $contagrid;
						while ( have_posts() ) : the_post();
						/* Include the post format-specific template for the content. If you want to * this in a child theme then include a file called called content-___.php * (where ___ is the post format) and that will be used instead.
						*/
						get_template_part( 'parti/forum/content', 'archive-forum' );
						$contagrid++;
						$_SESSION['contandocat'] = $contagrid;
						endwhile;
						mdframework_content_nav( 'nav-below' );
					else :  get_template_part( 'content', 'none' ); endif; ?>
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
		};
		if (((of_get_option('lateral_boxes_content'))=='onlycustom')||((of_get_option('lateral_boxes_content'))=='customenormal')){
		$latboxes = of_get_option('lateral_boxes');
		switch($latboxes) {
			case 'split':
				echo '<!-- latest-screenshot ok -->';
				get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','screenshot');
				echo '<!-- latest-videopanel ok -->';
				get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','videopanel');
			break;
			case 'full':
				get_template_part('parti/'.$_SESSION['templatesidewide'].'/bigbox','');
				echo '</section>';
			break;
			default:
				get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','screenshot');
		};};
		if (((of_get_option('lateral_boxes_content'))=='normal')||((of_get_option('lateral_boxes_content'))=='customenormal')){;
			get_template_part('sidebars/sidebar-forum-special');
		};
			if( (of_get_option('lateral_boxes'))!= 'full'){
				echo '</section>';
			};
		get_sidebar();?>
	</section><!-- .contenuti -->
</section><!-- novessanta -->
<?php if (of_get_option('enabling_fixed_banners')){get_template_part('sidebars/sidebar-right-banner');}?>
<!-- FINE category-forum -->