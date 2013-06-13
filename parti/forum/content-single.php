<!-- File content-forum.php -->
	<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
	<!-- Choose your top -->
	<?php get_template_part('parti/top',$_SESSION['templatesidewide']);?>
<section class="contenuti ucancustomize"><!-- 100% -->
	<?php get_sidebar('forum');?><!-- 14% + 2% -->
	<section class="centrosito customcentrosito"><!-- 30% + 2% -->
		<?php 
				get_template_part('parti/single',$_SESSION['templatesidewide']);
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
	<?php get_sidebar();?><!-- 14% + 2% -->		
</section>