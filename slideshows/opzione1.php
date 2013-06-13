<link href='<?php echo get_template_directory_uri();?>/slideshows/opzione1/responsiveslides.css' rel='stylesheet' type='text/css'>
<script src="<?php echo get_template_directory_uri();?>/slideshows/opzione1/responsiveslides.min.js"></script>
<script>
    /* You can also use "$(window).load(function() {"*/
    jQuery(document).ready(function($){
	  $(".slidingloop").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
		pause: true,           /* Boolean: Pause on hover, true or false*/
		pauseControls: true,    /* Boolean: Pause when hovering controls, true or false*/
		prevText: "<<",   /* String: Text for the "previous" button*/
		nextText: ">>",       /* String: Text for the "next" button*/
		maxwidth: "960",           /* Integer: Max-width of the slideshow, in pixels*/
        speed: 1000        
      });
	  /*
      $("#slidernews1").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
		pause: true,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "<<",   // String: Text for the "previous" button
		nextText: ">>",       // String: Text for the "next" button
		maxwidth: "960",           // Integer: Max-width of the slideshow, in pixels
        speed: 1000        
      });
      $("#slidernews2").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
		pause: true,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "<<",   // String: Text for the "previous" button
		nextText: ">>",       // String: Text for the "next" button
		maxwidth: "960",           // Integer: Max-width of the slideshow, in pixels  
        speed: 1000        
      });
	  $("#slidernews3").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
		pause: true,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "<<",   // String: Text for the "previous" button
		nextText: ">>",       // String: Text for the "next" button
		maxwidth: "960",           // Integer: Max-width of the slideshow, in pixels  
        speed: 1000        
      });
	  $("#slidernews4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
		pause: true,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "<<",   // String: Text for the "previous" button
		nextText: ">>",       // String: Text for the "next" button
		maxwidth: "960",           // Integer: Max-width of the slideshow, in pixels  
        speed: 1000        
      });
	  $("#slidernews5").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
		pause: true,           // Boolean: Pause on hover, true or false
		pauseControls: true,    // Boolean: Pause when hovering controls, true or false
		prevText: "<<",   // String: Text for the "previous" button
		nextText: ">>",       // String: Text for the "next" button
		maxwidth: "960",           // Integer: Max-width of the slideshow, in pixels  
        speed: 1000        
      });
	  */
	  /* Slideshow TOP*/
      $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        maxwidth: 960,
        namespace: "large-btns"
      });
    });
  </script>
<?php $firstcatid = of_get_option('top_slide_category_forum');?>	
<?php $firstslidenum = of_get_option('slide_number_top');?>
<?php $firstslideoffset = of_get_option('slide_skip_top');?>
<div class="topslidingcont">
	<div class="callbacks_container customizeslidertop">
		<ul class="rslides" id="slider4">
			<?php
				query_posts( array(
				'showposts'=>$firstslidenum,
				'offset'=>$firstslideoffset,
				'cat' => $firstcatid));
				if (have_posts()) :
				while (have_posts()) : the_post();
			?>	
			<li>
				<?php getImage('1'); ?>
				<p class="caption">
					<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</p>
			</li>
			<?php endwhile;
			endif;
			wp_reset_query(); ?>
		</ul>
	</div>
</div><!-- .topslidingcont -->