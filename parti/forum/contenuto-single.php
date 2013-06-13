<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
<!-- Choose your top -->
	<?php get_template_part('parti/top',$_SESSION['templatesidewide']);?>
<!-- Spice it up with a nice slider -->
	<?php get_template_part('parti/slider',$_SESSION['templatesidewide']);?>
<!-- Choose your content -->
<!-- Fine file head-forum.php -->
		<?php get_template_part('parti/content',$_SESSION['templatesidewide'].'-single');?>
<!-- Choose your footer -->
	<?php get_template_part('parti/footer',$_SESSION['templatesidewide']);?>