<?php $numboxnews = of_get_option('news_boxes_numbers');?>
<?php $contanews = 1 ;?>
<section class="loopnews">
<?php do {;
	$catnews = of_get_option('news_box_category_forum_'.$contanews);
	$numnews = of_get_option('number_news_box_'.$contanews);
	$offsetnews = of_get_option('news_box_skip_'.$contanews);?>
	<article class="content">
	<h2 class="news titolo articolo withlogo"><span><?php echo get_the_category_by_id($catnews); ?></span></h2>
      <ul id="conteggionews<?php echo $contanews;?>" class="contanews">
		<?php
			query_posts( array(
			'showposts'=>$numnews,
			'offset'=>$offsetnews,
			'cat' => $catnews));
			if (have_posts()) :
			while (have_posts()) : the_post();
		?>
		<li>
		<p class="caption" href="<?php the_permalink() ?>"><?php the_title(); ?></p>
		<div class="excerpt_thumbnail">
			<?php getImage('1'); ?>
		</div>
		<?php the_excerpt(); ?>
		</li>
		<?php endwhile;
		endif; ?>
	  </ul>
	</article>
	<?php $contanews++;?>
<?php } while ($contanews <= $numboxnews);?>
</section><!-- SECTION .loopnews -->