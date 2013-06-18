<section class="novesessanta customizemeforum">
	<section class="contenuti ucancustomize">
		<?php get_sidebar('forum');?>
		<section class="centrosito customcentrosito">
			<div id="primary customizeforum" class="site-content <?php echo of_get_option('example_images', 'no entry' ); ?>"><!-- Sono una pagina -->
				<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
						<?php comments_template( '', true ); ?>
					<?php endwhile; /* end of the loop. */?>
				</div><!-- #content -->
			</div><!-- #primary -->
<!-- Inserimento Carousel -->
				<?php if (of_get_option('carousel_switch')){get_template_part('/parti/forum/carousel');};?>
			<!-- Fine Inserimento Carousel -->
			<section class="vidandnews">
				<!-- latest-video ok --><!-- latest-news ok -->
				<?php get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','video');
					get_template_part('parti/'.$_SESSION['templatesidewide'].'/latest','news');
					/* <?php get_template_part('parti/latest','news2');?>*/
				;?>
			</section>
		</section><!-- Centrosito -->
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
	</section><!-- contenuti -->
</section><!--novesessanta-->
<?php if (of_get_option('enabling_fixed_banners')){get_template_part('sidebars/sidebar-right-banner');}?>
<!-- Fine page-forum -->