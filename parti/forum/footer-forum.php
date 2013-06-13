<!-- footer-forum.php -->
<?php get_template_part('parti/'.$_SESSION['templatesidewide'].'/javascript',$_SESSION['templatesidewide']);?>
<!-- wp_footer -->
<?php wp_footer();?>
<!--
<div style="float:left;width:100%;border:1px solid #000;">
	<h2>Variabili cPost</h2>
	<?php
		$singcpost = of_get_option('custom_posts_name_s_n1');
		$plurcpost = of_get_option('custom_posts_name_p_n1');
		$desccpost = of_get_option('custom_posts_name_d_n1');
		$imgcpost  = of_get_option('custom_posts_name_i_n1');
		echo $singcpost.'<br />'.$plurcpost.'<br />'.$desccpost.'<br />'.$imgcpost;
	?></div>
-->
</body>