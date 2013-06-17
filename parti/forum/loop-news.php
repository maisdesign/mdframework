<?php $numboxnews = of_get_option('news_boxes_numbers');?>
<?php $contanews = 1 ;?>
<section class="loopnews">
<?php do {;
	$catnews = of_get_option('news_box_category_forum_'.$contanews);
	$numnews = of_get_option('news_box_number_'.$contanews);
	$offsetnews = of_get_option('news_box_skip_'.$contanews);?>
	<h2 class="news titolo articolo withlogo"><span><?php echo get_the_category_by_id($catnews); ?></span></h2>
	<article class="content">
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
			<figure class="thumb-image-loop">
				<?php $images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=homepreview' );
								if ($images){
									foreach ( $images as $image )
										{echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";}
									}else{ getImage('1');}; ?>
			</figure>
			<div class="loop-thumb innews">
				<p class="caption">
					<a href="<?php the_permalink() ?>">
						<?php the_title(); ?>
					</a>
				</p>
				<div class="riassuntonews">
					<?php the_excerpt(); ?>
				</div>
			</div>
			<?php if (of_get_option('read_more_show_hide_button')){;?>
			<div class="leggialtro">
				<a href="<?php the_permalink();?>" title="<?php _e('Read the remaing part of: ','mdframework');the_title();?>">
					<?php _e('Read More >>','mdframework');?>
				</a>
			</div>
			<?php };?>
		</li>
		<?php endwhile;
		endif; ?>
	  </ul>
		<span class="archiviocat">
			<?php $category_link = get_category_link( $catnews );?>
			<a class="withlogo" href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_the_category_by_id($catnews); ?>">
			<?php echo __('Tutte le news','mdframework');?>
			</a>
		</span>	  
	</article>
	<?php $contanews++;?>
<?php } while ($contanews <= $numboxnews);?>
</section><!-- SECTION .loopnews -->