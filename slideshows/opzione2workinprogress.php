<?php $firstcatid = of_get_option('top_slide_category_forum');?>	
<?php $firstslidenum = of_get_option('slide_number_top');?>
<?php $firstslideoffset = of_get_option('slide_skip_top');?>
<div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
							</div>
							<div class="es-carousel">
								<ul>
			<?php
				query_posts( array(
				'showposts'=>$firstslidenum,
				'offset'=>$firstslideoffset,
				'cat' => $firstcatid));
				if (have_posts()) :
				while (have_posts()) : the_post();
			?>	
			<li>
				<a href="#"><img src="<?php getMiniimage('1'); ?>" data-large="<?php getImagenosizetags('1'); ?>" alt="<?php the_title();?>" data-description="<?php the_title();?>" /></a>
			</li>
		</div><!-- es-carousel -->
	</div><!-- es-carousel-wrapper -->
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