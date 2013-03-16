<!-- File latest-article.php -->
<?php $numslshow = of_get_option('slideshows_numbers');?>
<?php if ($numslshow >= 1){;?>
	<?php get_template_part('parti/loop','slide');?>
<?php };?>
<?php $numboxnews = of_get_option('news_boxes_numbers');?>
<?php if ($numboxnews >= 1){;?>
	<?php get_template_part('parti/loop','news');?>
<?php };?>