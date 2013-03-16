<?php
/*
Template Name: Forum Home
*/
get_header();
?>
<!-- File forum-home.php -->
<?php $class = 'forumcomplete';?>
<body <?php body_class($class); ?>>
<?php /*
<?php get_template_part('sidebars/sidebar-left-banner');?>
*/;?>
<section class="novesessanta">
	<header class="logintop">
		<?php get_template_part('parti/head','login');?>
	</header>
	<?php $selezione = of_get_option('select_sitewide_template', '' ); ?>
<!-- Choose your top -->
	<?php get_template_part('parti/top',$selezione);?>
<!-- Spice it up with a nice slider -->
	<?php get_template_part('parti/slider',$selezione);?>
<!-- Choose your content -->
	<?php get_template_part('parti/content',$selezione);?>
<!-- Choose your footer -->
	<?php get_template_part('parti/footer',$selezione);?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri();?>/js/reflection.js"></script>
	<?php /*
	<script type="text/javascript" charset="utf-8" src="<?php echo get_template_directory_uri();?>/js/stickyMojo.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		$('#left-banner').stickyMojo({footerID: '.homeforum', contentID: '.contenuti'});
		$('#right-banner').stickyMojo({footerID: '.homeforum', contentID: '.contenuti'});
		});
	</script>
	*/;?>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/loginstuff.js"></script>	
</section><!--novesessanta-->
<?php /*
<?php get_template_part('sidebars/sidebar-right-banner');?>
*/;?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		// Show social voter only if the browser is wide enough.
		if( $(window).width() >= 1030 )
			$('#left-banner').show();
 
		// Update when user resizes browser.
		$(window).resize(function() {
			if( $(window).width() < 1030 ) {
				$('#left-banner').hide();
			} else {
				$('#left-banner').show();
			}
		});
	});
</script>
</body>