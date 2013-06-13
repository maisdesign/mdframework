<!-- File contentuto-frontpage.php -->
<section class="novesessanta customizemeforum">
	<section class="contenuti ucancustomize">
		<?php get_sidebar('forum');?>
		<section class="centrosito customcentrosito">
			<?php	get_template_part('parti/latest','article');?>
			<section class="vidandnews">
				<?php get_template_part('parti/latest','video');
					get_template_part('parti/latest','news');
					/* <?php get_template_part('parti/latest','news2');?>*/
				;?>
			</section>
		</section><!-- Centrosito -->
		<?php $numslshow = of_get_option('slideshows_numbers');
		switch ($numslshow) {
			case 5:
			case 4:
			case 3:
				if( (of_get_option('lateral_boxes'))== 'full'){
					echo'<section class="fillme screenshot x2 bigboxarea">';
				}else{
					echo'<section class="screenshot x2">';
				};
			break;
			default:
				if( (of_get_option('lateral_boxes'))== 'full'){
					echo '<section class="fillme screenshot x2 bigboxarea">';
				}else{
					echo'<section class="screenshot">';
				};
			break;				
		};$latboxes = of_get_option('lateral_boxes');
		switch($latboxes) {
			case 'split':
				get_template_part('parti/latest','screenshot');
				get_template_part('parti/latest','videopanel');
			break;
			case: 'full':
				echo '</section>';
			break;
			default:
				get_template_part('parti/latest','screenshot');
		};
			get_template_part('sidebars/sidebar-forum-special');
			if( (of_get_option('lateral_boxes'))!= 'full'){
				echo '</section>';
			};
		get_sidebar();?>
	</section><!-- contenuti -->
</section><!--novesessanta-->