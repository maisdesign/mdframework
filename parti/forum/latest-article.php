<!-- File latest-article.php -->
<?php $numslshow = of_get_option('slideshows_numbers');?>
<?php if ($numslshow >= 1){;?>
	<!-- loop-slide ok -->
	<?php get_template_part('parti/'.$_SESSION['templatesidewide'].'/loop','slide');?>
	<!-- Fine loop-slide ok -->
<?php };?>
<?php $numboxnews = of_get_option('news_boxes_numbers');?>
<?php if ($numboxnews >= 1){;?>
	<!-- loop-news ok -->
	<?php get_template_part('parti/'.$_SESSION['templatesidewide'].'/loop','news');?>
	<!-- Fine loop-news ok -->
<?php };?>
<!-- Fine file latest-article.php -->