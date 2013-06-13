<!-- File single-forum.php -->
<section class="novesessanta customizemeforum">
	<section class="contenuti ucancustomize">
		<?php get_sidebar('forum');?>
		<section class="centrosito customcentrosito">
			<div id="primary customizeforum" class="site-content <?php echo of_get_option('example_images', 'no entry' ); ?>">
				<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', get_post_format() ); ?>
					<nav class="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'mdframework' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav indietro">' . _x( '  ', 'Previous post link', 'mdframework' ) . '</span> %title' ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav avanti">' . _x( '  ', 'Next post link', 'mdframework' ) . '</span>' ); ?></span>
					</nav><!-- .nav-single -->
					<?php comments_template( '', true ); ?>
					<!-- <div style="float:left;width:100;background:#fff;color:#111" class="trova il meta">
					<?php

  $custom_field_keys = get_post_custom_keys();
  foreach ( $custom_field_keys as $key => $value ) {
    $valuet = trim($value);
      if ( '_' == $valuet{0} )
      continue;
    echo $key . " => " . $value . "<br />";
  };
  $postid = get_the_ID();
	$meta_values = get_post_meta($postid, 'select-player', true);
	echo $meta_values;
  if ($meta_values === 'option-1'){
	echo 'Cerchiamo player';
  }elseif ($meta_values === 'option-2'){
	echo 'Non cerchiamo nessuno';
  }else{
	echo 'Non so cosa cerchiamo';
	};?>
	</div> -->
					<?php endwhile; /* end of the loop. */?>
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
<!-- Fine single-forum -->