<header class="testata tsx" style="background:<?php echo of_get_option('hotel_colorpicker_header_background', 'no entry' ); ?>">
	<hgroup>
		<h1><?php echo get_option('blogname'); ?></h1>
		<h2><?php echo get_bloginfo ( 'description' ); ?></h2>
	</hgroup>
	<?php if ((of_get_option('example_showhidden')) == '1') {;?>
<section class="topslide">
	<ul class="rslides" id="slider3">
		<li><img src="<?php echo of_get_option('showhidden_slide_img_1');?>" alt="<?php echo of_get_option('alt_title_tag_slide_1');?>"></li>
		<li><img src="<?php echo of_get_option('showhidden_slide_img_2');?>" alt="<?php echo of_get_option('alt_title_tag_slide_2');?>"></li>
		<li><img src="<?php echo of_get_option('showhidden_slide_img_3');?>" alt="<?php echo of_get_option('alt_title_tag_slide_3');?>"></li>
		<li><img src="<?php echo of_get_option('showhidden_slide_img_4');?>" alt="<?php echo of_get_option('alt_title_tag_slide_4');?>"></li>
		<li><img src="<?php echo of_get_option('showhidden_slide_img_5');?>" alt="<?php echo of_get_option('alt_title_tag_slide_5');?>"></li>
    </ul>
	<?php $immi1 = of_get_option('showhidden_slide_img_1');?>
	<?php $immi2 = of_get_option('showhidden_slide_img_2');?>
	<?php $immi3 = of_get_option('showhidden_slide_img_3');?>
	<?php $immi4 = of_get_option('showhidden_slide_img_4');?>
	<?php $immi5 = of_get_option('showhidden_slide_img_5');?>
	<?php $immi1 = preg_replace('/\.jpg$/','',$immi1);
		$immi1 = $immi1.'-150x150.jpg';?>
	<?php $immi2 = preg_replace('/\.jpg$/','',$immi2);
		$immi2 = $immi2.'-150x150.jpg';?>
	<?php $immi3 = preg_replace('/\.jpg$/','',$immi3);
		$immi3 = $immi3.'-150x150.jpg';?>	
	<?php $immi4 = preg_replace('/\.jpg$/','',$immi4);
		$immi4 = $immi4.'-150x150.jpg';?>
	<?php $immi5 = preg_replace('/\.jpg$/','',$immi5);
		$immi5 = $immi5.'-150x150.jpg';?>
	<ul id="slider3-pager">
      <li><a href="#"><img src="<?php echo $immi1;?>" alt=""></a></li>
      <li><a href="#"><img src="<?php echo $immi2;?>" alt=""></a></li>
      <li><a href="#"><img src="<?php echo $immi3;?>" alt=""></a></li>
	  <li><a href="#"><img src="<?php echo $immi4;?>" alt=""></a></li>
	  <li><a href="#"><img src="<?php echo $immi5;?>" alt=""></a></li>
    </ul>
</section>
<?php }else{;?>
	<section id="youtube">
		<iframe width="560" height="315" src="<?php echo of_get_option('youtube_link');?>?autoplay=<?php echo of_get_option('autoplay_youtube');?>" frameborder="0" allowfullscreen></iframe>
	</section>
<?php };?>
</header>
<h2><?php echo $immi1;?></h2>