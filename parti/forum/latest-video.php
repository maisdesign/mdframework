<!-- File latest-video.php -->
<?php $lowlefcatid = of_get_option('low_left_category_forum');?>
<?php $lowlefcatnum = of_get_option('low_left_num_forum');?>
<?php $lowlefcatoffset = of_get_option('low_left_offset_forum');?>
<aside class="videoclan">
	<h3 class="titolo video withlogo"><?php echo get_the_category_by_id($lowlefcatid); ?></h3>
	<div class="vecchiotorneo"><img src="<?php echo get_template_directory_uri();?>/images/up.png" alt="next"/></div>
	<div id="turnament">
	<?php
		query_posts( array(
		'showposts'=>$lowlefcatnum,
		'offset'=>$lowlefcatoffset,
		'cat' => $lowlefcatid));
		if (have_posts()) :
		while (have_posts()) : the_post();
	?>	
	<li>
	<a href="<?php the_permalink();?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
	<div class="tagsslide"><?php the_tags('',' • ','<br />'); ?></div>
	</li>
	<?php endwhile;
	endif; ?>
	</div>
	<div class="nuovotorneo"><img src="<?php echo get_template_directory_uri();?>/images/down.png" alt="previous"/></div>
</aside>
<!-- END of latest-video.php -->