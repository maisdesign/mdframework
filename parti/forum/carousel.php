<!-- File Carousel.php -->
<?php
$iconprev = of_get_option('carousel_icons');
;?>
<div id="prevclan">
	<a href="#" title="<?php __('Previous','mdframework');?>"><img src="<?php echo get_template_directory_uri();?>/images/<?php echo $iconprev;?>-prev.png" /></a>
</div>
<div class="contenitorecarosello">
<div id="wrapper">	
	<div id="carousel">
	<?php $catnews = of_get_option('select_category_carousel');$numcar = of_get_option('number_category_carousel');?>
	<?php $carouselPosts = new WP_Query("showposts=".$numcar."&cat=".$catnews.""); while($carouselPosts->have_posts()) : $carouselPosts->the_post();?>
			<div>
				<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}else{
						getImage200('1');
					};
				?>
				<span>
					<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
				</span>
			</div>
		<?php endwhile; ?>
	</div>
</div>
</div>
<div id="nextclan">
	<a href="#" title="<?php __('Next','mdframework');?>"><img src="<?php echo get_template_directory_uri();?>/images/<?php echo $iconprev;?>-next.png"/></a>
</div>
<!-- FINE File Carousel.php -->