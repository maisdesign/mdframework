<!-- File content-forum.php -->
<?php if ( is_single() ) {;?>
	<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
	<!-- Choose your top -->
	<?php get_template_part('parti/top',$selezione);?>
<?php };?>
<section class="contenuti"><!-- 100% -->
	<?php get_sidebar('forum');?><!-- 14% + 2% -->
	<section class="centrosito"><!-- 30% + 2% -->
		<?php if (!is_single()) {;?>
			<?php get_template_part('parti/latest','article');?><!-- 100% -->
			<?php get_template_part('parti/carousel','');?>
			<section class="vidandnews">
				<?php get_template_part('parti/latest','video');?><!-- 31% +2% -->
				<?php get_template_part('parti/latest','news');?><!-- 31% +2% -->
				<?php /*
					<?php get_template_part('parti/latest','news2');?><!-- 31% +2% -->
				*/;?>
			</section>
		<?php } else{;?>
			<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
		<!-- Choose your single -->
			<?php get_template_part('parti/single',$selezione);?>
		<?php };?>
		<!-- File footer-forum.php -->
	</section><!-- Centrosito -->
	<?php if ( !is_single() ) {;?>
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
	<?php };?>
	<?php get_sidebar();?><!-- 14% + 2% -->		
</section>