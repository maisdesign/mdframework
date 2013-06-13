<link href='<?php echo get_template_directory_uri();?>/slideshows/opzione2/opzione2.css' rel='stylesheet' type='text/css'>
<noscript>
	<style>
		.es-carousel ul{
		display:block;
		}
	</style>
</noscript>
<script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">	
	<div class="rg-image-wrapper">
		{{if itemsCount > 1}}
		<div class="rg-image-nav">
			<a href="#" class="rg-image-nav-prev">Previous Image</a>
			<a href="#" class="rg-image-nav-next">Next Image</a>
		</div>
		{{/if}}
		<div class="rg-image"></div>
		<div class="rg-loading"></div>
		<div class="rg-caption-wrapper">
			<div class="rg-caption" style="display:none;">
				<p></p>
			</div>
		</div>
	</div>
</script>
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
						<a href="<?php the_permalink();?>">
							<img src="<?php $image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
								echo $image_url[0]; ?>" width="65px" height="50px"data-large="<?php $image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
							echo $image_url[0]; ?>" alt="<?php the_title();?>" data-description="<?php the_title();?>" />
						</a>
					</li>
					<?php endwhile;
						endif;
					wp_reset_query(); ?>
				</ul>
			</div><!-- es-carousel -->
		</div><!-- es-carousel-wrapper -->
	<!-- End Elastislide Carousel Thumbnail Viewer -->
	</div><!-- rg-thumbs -->
</div><!-- rg-gallery -->
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione2/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione2/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione2/jquery.elastislide.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione2/gallery.js"></script>