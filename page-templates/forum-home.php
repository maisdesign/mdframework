<section class="novesessanta">
<?php if ((is_single()&&(!is_front_page()))){
	echo '<h2 style="color:#fff">Primo Step</h2>';
	get_template_part('parti/contenuto','single');
	}elseif ((is_front_page())){
	get_template_part('parti/contenuto','frontpage');}
	elseif((is_page())&&(!is_front_page())){
	echo '<h2 style="color:#fff">Terzo Step</h2>';
	get_template_part('parti/contenuto','page');};?>
</section><!--novesessanta-->
<?php /*
<?php get_template_part('sidebars/sidebar-right-banner');?>
*/;?>
<?php get_template_part('parti/javascript',$_SESSION['templatesidewide']);?>
<!-- Fine file Forum-home.php -->
</body>