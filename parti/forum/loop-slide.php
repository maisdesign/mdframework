<!-- File loop-slide.php -->
<?php $numslshow = of_get_option('slideshows_numbers');?>
<?php $contaslide = 1 ;?>
<?php do {;
	$catidslide = of_get_option('slide_category_forum_'.$contaslide);
	$numslider = of_get_option('number_slide_'.$contaslide);
	$numoffset = of_get_option('slide_skip_'.$contaslide);?>
	<section class="lscont">
		<h2 class="news titolo articolo withlogo topping"><span><?php echo get_the_category_by_id($catidslide); ?></span></h2>
		<article class="content">
		<ul id="slidernews<?php echo $contaslide;?>" class="slidingloop">
			<?php
				query_posts( array(
				'showposts'=>$numslider,
				'offset'=>$numoffset,
				'cat' => $catidslide));
				if (have_posts()) :
				while (have_posts()) : the_post();
			?>
			<li>
				<?php if ( !wp_is_mobile() ) {;?>
					<aside class="imgcontainerhome">
						<p class="caption" href="<?php the_permalink() ?>"><?php the_title(); ?></p>
						<div class="excerpt_thumbnail">
							<figure><?php getImagenosizetags('1'); ?></figure>
						</div>
					</aside>
				<?php };?>
				<article class="textcontainerhome">
					<?php the_excerpt(); ?>
				</article>
			</li>
			<?php endwhile;endif; ?>
		</ul>
		</article>
	</section>
	<?php $contaslide++;?>
<?php } while ($contaslide <= $numslshow);?>