<!-- Inizio BigBox.php -->
<?php // $bigboxcat = of_get_option('big_box_category_1');?>
<?php $contabox = 1; ?>
<section class="bigboxarea screenshot x2">
<?php do {;
	$bigboxcat = of_get_option('big_box_category_'.$contabox);
	$category_link = get_category_link( $bigboxcat);
	$numnews = of_get_option('how_many_posts_in_lateral_slide_'.$contabox);
	$multicheck = of_get_option('which_part_in_lateral_slide_'.$contabox);
	/* $offsetnews = of_get_option('news_box_skip_'.$contanews)*/;?>
	<aside class="fbox">
		<h2 class="news titolo articolo withlogo textfill ridimensionami" >
			<span>
				<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_the_category_by_id($bigboxcat); ?>">
					<?php echo get_the_category_by_id($bigboxcat); ?>
				</a>
			</span>
		</h2>
		<article class="content bigbox<?php echo $contabox;?>">
		<?php/* if ($contabox === 1){
		if((of_get_option('lateral_boxes_decision'))=='firstslide'){
			echo'<div class="firstnew"><a href="#"><img src="'.get_template_directory_uri().'/images/up.png" alt="next slide"/></a></div>';
			}
		elseif((of_get_option('lateral_boxes_decision'))=='bothslide'){
			echo'<div class="slidandoprev"><a href="#"><img src="'.get_template_directory_uri().'/images/up.png" alt="next slide"/></a></div>';
		};}
		elseif ($contabox === 2){
			if((of_get_option('lateral_boxes_decision'))=='secondslide'){
			echo'<div class="secnew"><a href="#"><img src="'.get_template_directory_uri().'/images/down.png" alt="next slide"/></a></div>';
			}
		elseif((of_get_option('lateral_boxes_decision'))=='bothslide'){
			echo'<div class="slidandoprev"><a href="#"><img src="'.get_template_directory_uri().'/images/down.png" alt="next slide"/></a></div>';
		};};*/?>
			<div class="asidenews<?php echo $contabox;?> slidando">
				<?php
					query_posts( array(
					'showposts'=>$numnews,
					/*'offset'=>$offsetnews,*/
					'cat' => $bigboxcat));
					if (have_posts()) :
					while (have_posts()) : the_post();
				?>
				<div>
					<div class="latestscreenshot">
					<?php if (($multicheck['title'])==='1' ) {;?>
						<p class="caption" href="<?php the_permalink() ?>"><?php the_title(); ?></p>		
					<?php };if (($multicheck['preview'])==='1' ) {
							$images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=homepreview' );
								if ($images){
									foreach ( $images as $image )
										{if (($multicheck['title'])==='0' ) {
											echo '<a href="';
												the_permalink();
											echo'" title="';
											the_title();
											echo'">';
										};
										echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
										if (($multicheck['title'])==='0' ) {
											echo '</a>';
										};
										}
									}else{
										if (($multicheck['title'])==='0' ) {
											echo '<a href="';
												the_permalink();
											echo'" title="';
											the_title();
											echo'">';
										};
										getImage('1');
										if (($multicheck['title'])==='0' ) {
											echo '</a>';
										};
									};
							};?>
						<?php if (($multicheck['content'])==='1' ) {;?><p class="exclatsli"><?php the_excerpt();echo '</p>';};?>
					</div>
					<?php /*
						<div class="riassuntonews">
						<?php the_excerpt(); ?>
						</div>
					*/;?>
				</div>
				<?php endwhile;	endif; ?>
			</div>
		<?php/* if ($contabox === 1){
		if((of_get_option('lateral_boxes_decision'))=='firstslide'){
			echo'<div class="firstold"><a href="#"><img src="'.get_template_directory_uri().'/images/up.png" alt="next slide"/></a></div>';
			}
		elseif((of_get_option('lateral_boxes_decision'))=='bothslide'){
			echo'<div class="slidandonew"><a href="#"><img src="'.get_template_directory_uri().'/images/up.png" alt="next slide"/></a></div>';
		};}
		elseif ($contabox === 2){
			if((of_get_option('lateral_boxes_decision'))=='secondslide'){
			echo'<div class="secold"><a href="#"><img src="'.get_template_directory_uri().'/images/down.png" alt="next slide"/></a></div>';
			}
		elseif((of_get_option('lateral_boxes_decision'))=='bothslide'){
			echo'<div class="slidandonew"><a href="#"><img src="'.get_template_directory_uri().'/images/down.png" alt="next slide"/></a></div>';
		};
		};*/?>
		</article>
	</aside><!-- .fbox -->
	<?php $contabox++;?>
<?php } while ($contabox <= 2);?>
</section><!-- SECTION .bigboxarea screenshot x2 -->
<!-- Fine BigBox.php -->