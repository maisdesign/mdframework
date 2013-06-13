<?php $contabox = 1;?>
<section class="bigboxarea screenshot x2">
<?php do {;
	$bigboxcat = of_get_option('big_box_category_'.$contabox);
	/* $numnews = of_get_option('number_news_box_'.$contanews);*/
	/* $offsetnews = of_get_option('news_box_skip_'.$contanews)*/;?>
	<aside class="fbox">
	<h2 class="news titolo articolo withlogo"><span><?php echo get_the_category_by_id($bigboxcat); ?></span></h2>
	<article class="content bigbox<?php echo $contabox;?>">
      <ul class="asidenews<?php echo $contabox;?>">
		<?php
			query_posts( array(
			'showposts'=>'5',
			/*'offset'=>$offsetnews,*/
			'cat' => $bigboxcat));
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
	  <span class="archiviocat">
	  <?php $category_link = get_category_link( $bigboxcat);?>
		<a class="withlogo" href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_the_category_by_id($bigboxcat); ?>">
			<?php echo __('Get to the Archive','mdframework');?>
		</a>
	</span>
	</aside><!-- .fbox -->
	<?php $contabox++;?>
<?php } while ($contabox <= 2);?>
</section><!-- SECTION .bigboxarea screenshot x2 -->