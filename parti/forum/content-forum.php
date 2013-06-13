<!-- File content-forum.php -->
<section class="contenuti ucancustomize"><!-- 100% -->
	<?php get_sidebar('forum');?><!-- 14% + 2% -->
	<section class="centrosito customcentrosito"><!-- 30% + 2% -->
		<?php 	get_template_part('parti/latest','article');
			if (of_get_option('carousel_switch', '' )){
				get_template_part('parti/carousel','');
			}?>
			<section class="vidandnews">
				<?php get_template_part('parti/latest','video');?><!-- 31% +2% -->
				<?php get_template_part('parti/latest','news');?><!-- 31% +2% -->
				<?php /*
					<?php get_template_part('parti/latest','news2');?><!-- 31% +2% -->
				*/;?>
			</section>
		<!-- File footer-forum.php -->
	</section><!-- Centrosito -->
		<?php $numslshow = of_get_option('slideshows_numbers');?>
		<?php if ($numslshow >= 3){;?>
			<?php if( (of_get_option('lateral_boxes'))== 'full'){;?>
				<section class="fillme screenshot x2 bigboxarea"><!-- 14% + 2% -->
			<?php }else{;?>
				<section class="screenshot x2"><!-- 14% + 2% -->
			<?php };?>
		<?php }else{;?>
			<?php if( (of_get_option('lateral_boxes'))== 'full'){;?>
				<section class="fillme screenshot x2 bigboxarea"><!-- 14% + 2% -->
			<?php }else{;?>
				<section class="screenshot"><!-- 14% + 2% -->
			<?php };?>
		<?php };?>
		<?php if( (of_get_option('lateral_boxes'))== 'split'){;?>
			<?php get_template_part('parti/latest','screenshot');?>
			<?php get_template_part('parti/latest','videopanel');?>
		<?php }else{;?>
			<?php get_template_part('parti/latest','screenshot');?>
		<?php };?>
		<?php if( (of_get_option('lateral_boxes'))== 'full'){;?>
			</section>
		<?php };?>
			<?php get_template_part('sidebars/sidebar-forum-special');?>
		<?php if( (of_get_option('lateral_boxes'))!= 'full'){;?>
		</section>
		<?php };?>
	<?php get_sidebar();?><!-- 14% + 2% -->		
</section>