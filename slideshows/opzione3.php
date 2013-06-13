<noscript>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri();?>/slideshows/opzione3/noscript.css" />
</noscript>
<link href='<?php echo get_template_directory_uri();?>/slideshows/opzione3/opzione3.css' rel='stylesheet' type='text/css'>
<div id="ei-slider" class="ei-slider">
	<ul class="ei-slider-large">
	<?php $firstcatid = of_get_option('top_slide_category_forum');
	$firstslidenum = of_get_option('slide_number_top');
	$firstslideoffset = of_get_option('slide_skip_top');?>
		<?php
			query_posts( array(
			'showposts'=>$firstslidenum,
			'offset'=>$firstslideoffset,
			'cat' => $firstcatid));
			if (have_posts()) :
			while (have_posts()) : the_post();
		?>	
		<li>
			<img src="<?php $image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
								echo $image_url[0]; ?>" alt="<?php the_title();?>" />
			<div class="ei-title">
				<h2><a class="colorami" href="<?php the_permalink();?>"><?php the_title();?></a></h2>
				<h3><a class="colorami" href="<?php the_permalink();?>"><?php custom_excerpt('6'); ?></a></h3>
			</div>
		</li>
		<?php endwhile;
			endif;
			wp_reset_query(); ?>
	</ul><!-- ei-slider-large -->
	<ul class="ei-slider-thumbs">
		<li class="ei-slider-element">Current</li>
		<?php
			query_posts( array(
			'showposts'=>$firstslidenum,
			'offset'=>$firstslideoffset,
			'cat' => $firstcatid));
			if (have_posts()) :
			while (have_posts()) : the_post();
		?>	
		<li>
			<img src="<?php $image_id = get_post_thumbnail_id();
				$image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
				echo $image_url[0]; ?>" alt="<?php the_title();?>" />
		</li>
		<?php endwhile;
			endif;
			wp_reset_query(); ?>
	</ul><!-- ei-slider-thumbs -->
</div><!-- ei-slider -->
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione3/jquery.eislideshow.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione3/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione3/jquery.lettering.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#ei-slider').eislideshow({
			animation           : 'sides', // sides || center
    // if true the slider will automatically 
    // slide, and it will only stop if the user 
    // clicks on a thumb
    autoplay            : true,
    // interval for the slideshow
    slideshow_interval  : 3000,
    // speed for the sliding animation
    speed           : 800,
    // easing for the sliding animation
    easing          : '',
    // percentage of speed for the titles animation. 
    // Speed will be speed * titlesFactor
    titlesFactor        : 0.60,
    // titles animation speed
    titlespeed          : 800,
    // titles animation easing
    titleeasing         : '',
    // maximum width for the thumbs in pixels
    thumbMaxWidth       : 150
		});
	});
	jQuery(document).ready(function($) {
	    $(".colorami").lettering();
	  });
</script>