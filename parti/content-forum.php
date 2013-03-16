<!-- File content-forum.php -->
<?php if ( is_single() ) {;?>
	<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
	<!-- Choose your top -->
	<?php get_template_part('parti/top',$selezione);?>
<?php };?>
<section class="contenuti"><!-- 100% -->
	<?php get_sidebar('forum');?><!-- 14% + 2% -->
	<section class="centrosito"><!-- 30% + 2% -->
		<?php if ( !is_single() ) {;?>
			<?php get_template_part('parti/latest','article');?><!-- 100% -->
		<?php } else{;?>
			<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
		<!-- Choose your single -->
			<?php get_template_part('parti/single',$selezione);?>
		<?php };?>
	</section><!-- Centrosito -->
	<?php if ( !is_single() ) {;?>
		<?php $numslshow = of_get_option('slideshows_numbers');?>
		<?php if ($numslshow >= 3){;?>
			<section class="screenshot x2"><!-- 14% + 2% -->
		<?php }else{;?>
			<section class="screenshot"><!-- 14% + 2% -->
		<?php };?>
			<?php get_template_part('parti/latest','screenshot');?>
			<?php get_template_part('parti/latest','videopanel');?>
		</section>
	<?php };?>
	<?php get_sidebar();?><!-- 14% + 2% -->		
</section>