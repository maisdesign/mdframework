<!-- File Latest-videopanel.php -->
<?php if ( (of_get_option('forced_section'))){;?>
<!-- Nothing to do here -->
	<?php }else{;?>
<aside class="loopvideopanel">
				<?php
	$latestscreencat = of_get_option('big_box_category_2');
	/* $numnews = of_get_option('number_news_box_'.$contanews);*/
	/* $offsetnews = of_get_option('news_box_skip_'.$contanews)*/;?>
	<aside class="fbox">
	<h2 class="news titolo articolo withlogo"><span><a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_the_category_by_id($latestscreencat); ?>"><?php echo get_the_category_by_id($latestscreencat); ?></a></span></h2>
	<article class="content bigbox2">
      <ul class="asidenews2">
		<?php
			query_posts( array(
			'showposts'=>'5',
			/*'offset'=>$offsetnews,*/
			'cat' => $latestscreencat));
			if (have_posts()) :
			while (have_posts()) : the_post();
		?>
		<li>
		<div class="latestscreenshot">
		<p class="caption" href="<?php the_permalink() ?>"><?php the_title(); ?></p>		
			<?php getImage('1'); ?>
		</div>
		<?php /*
		<div class="riassuntonews">
			<?php the_excerpt(); ?>
		</div>
		*/;?>
		</li>
		<?php endwhile;
		endif; ?>
	  </ul>
	  </article>
	</aside><!-- .fbox -->
</section>
<?php };?>
<!-- END of File Latest-videopanel.php -->