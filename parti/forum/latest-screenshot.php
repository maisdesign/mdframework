<!-- File Latest-screenshot.php -->
<?php if( (of_get_option('lateral_boxes'))== 'full'){;?>
<?php get_template_part('parti/'.$_SESSION['templatesidewide'].'/bigbox','');?>
<?php }else{;?>
	<?php if ( (of_get_option('forced_section'))){;?>
		<?php get_template_part('parti/'.$_SESSION['templatesidewide'].'/forced','lateral');?>
	<?php }else{;?>
	<aside class="loopscreenpanel">
		<?php
		$latestscreencat = of_get_option('big_box_category_1');
		/* $numnews = of_get_option('number_news_box_'.$contanews);*/
		/* $offsetnews = of_get_option('news_box_skip_'.$contanews)*/;?>
		<aside class="fbox">
		<h2 class="news titolo articolo withlogo"><span><a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_the_category_by_id($latestscreencat); ?>"><?php echo get_the_category_by_id($latestscreencat); ?></a></span></h2>
		<article class="content bigbox1">
			<ul class="asidenews1">
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
				endif;
				wp_reset_query(); ?>
			</ul>
	  </article>
	</aside><!-- .fbox -->
</section>
</aside>
<?php };};?>
<!-- END of File Latest-screenshot.php -->