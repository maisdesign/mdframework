<!-- File latest-video.php -->
<?php $lowlefcatid = of_get_option('low_left_category_forum');?>
<?php $lowlefcatnum = of_get_option('low_left_num_forum');?>
<?php $lowlefcatoffset = of_get_option('low_left_offset_forum');?>
<aside class="videoclan">
	<h2 class="titolo video withlogo"><?php echo get_the_category_by_id($lowlefcatid); ?></h2>
	<?php
		query_posts( array(
		'showposts'=>$lowlefcatnum,
		'offset'=>$lowlefcatoffset,
		'cat' => $lowlefcatid));
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
	endif; ?>
</aside>