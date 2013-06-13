<!-- File carousel con switch -->
<?php
$carouselico = of_get_option('carousel_icons');
switch ($carouselico) 
{ 
        case 'figo': $iconprev = 'prev';
        break; 
        case 'black': $iconprev = 'backblacksimple';
        break; 
        case 'white': $iconprev = 'backwhite';
        break; 
};?>
<div id="prevclan">
	<a href="#" title="<?php __('Previous','mdframework');?>"><img src="<?php echo get_template_directory_uri();?>/images/<?php echo $iconprev;?>.png" /></a>
</div>
<div class="contenitorecarosello">
<div id="wrapper">	
	<div id="carousel">
	<?php $catnews = of_get_option('select_category_carousel');$numcar = of_get_option('number_category_carousel');?>
	<?php $carouselPosts = new WP_Query("showposts=".$numcar."&cat=".$catnews.""); while($carouselPosts->have_posts()) : $carouselPosts->the_post();?>
			<div>
				<img src="<?php echo catch_that_image();?>" alt="<?php the_title();?>" width="200px" height="200px" />
				<span>
					<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
				</span>
			</div>
		<?php endwhile; ?>
	</div>
</div>
</div>
<?php
$carouselico = of_get_option('carousel_icons');
switch ($carouselico) 
{ 
        case 'figo': $iconnext = 'next';
        break; 
        case 'black': $iconnext = 'playblacksimple';
        break; 
        case 'white': $iconnext = 'playwhite';
        break; 
};?>
<div id="nextclan">
	<a href="#" title="<?php __('Next','mdframework');?>"><img src="<?php echo get_template_directory_uri();?>/images/<?php echo $iconnext;?>.png"/></a>
</div>