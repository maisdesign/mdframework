
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/slideshows/opzione5/skin-4/style.css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione5/raphael-min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/slideshows/opzione5/jquery.easing.js"></script>
<script src="<?php echo get_template_directory_uri();?>/slideshows/opzione5/iview.js"></script>
<script>
	jQuery(document).ready(function($) {
				$('#iview').iView({
					pauseTime: 7000,
					pauseOnHover: true,
					directionNav: false,
					directionNavHide: false,
					controlNav: true,
					controlNavNextPrev: false,
					controlNavThumbs: true,
					timer: "Bar",
					timerDiameter: 120,
					timerPadding: 3,
					timerStroke: 4,
					timerBarStroke: 0,
					timerColor: "#0F0",
					timerPosition: "bottom-right",
					timerX: 15,
					timerY: 60
				});
			});
		</script>
		<div id="iview">
			<?php $firstcatid = of_get_option('top_slide_category_forum');?>	
					<?php $firstslidenum = of_get_option('slide_number_top');?>
					<?php $firstslideoffset = of_get_option('slide_skip_top');?>
					<?php
						$caption1 = 'caption1';$caption2 = 'caption2';$caption3 = 'caption3';$caption4 = 'caption4';$caption5 = 'caption5';$caption6 = 'caption6';$caption7 = 'caption7';$blackcaption = 'blackcaption';
						$expandDown = 'expandDown';$expandRight = 'expandRight';$expandLeft = 'expandLeft';$wipeRight = 'wipeRight';$wipeLeft = 'wipeLeft';$wipeUp = 'wipeUp'; $wipeDown = 'wipeDown';$fade = 'fade';
						$slicetopfade = 'slice-top-fade,slice-right-fade';$zigzagdroptop = 'zigzag-drop-top,zigzag-drop-bottom';$striprightfade = 'strip-right-fade,strip-left-fade';
						/* Inzio 3 array */
						$tipocaption = array($caption1, $caption2, $caption3, $caption4, $caption5, $caption6, $caption7);
						$effettocaption = array($expandDown, $expandRight, $expandLeft, $wipeRight, $wipeLeft, $wipeUp, $wipeDown, $fade);
						$effettoimmagine = array($slicetopfade,$zigzagdroptop,$striprightfade);
						/*Fine array */
						query_posts( array(
						'showposts'=>$firstslidenum,
						'offset'=>$firstslideoffset,
						'cat' => $firstcatid));
						if (have_posts()) :
						while (have_posts()) : the_post();
					?>	
					<div class="zonaimmagine" data-iview:thumbnail="<?php $image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'thumbnail', true);
								echo $image_url[0]; ?>" data-iview:image="<?php $image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
								echo $image_url[0]; ?>" data-iview:transition="<?php echo $effettoimmagine[array_rand($effettoimmagine)];?>">
					<div class="iview-caption <?php echo $tipocaption[array_rand($tipocaption)];?>" data-x="<?php $valx = rand(1,900);echo $valx;?>" data-y="<?php $valy = rand(1,450);echo $valy;?>" data-transition="<?php echo $effettocaption[array_rand($effettocaption)];?>" <?php $paridis = rand(); if (is_int($paridis/2)){ echo'data-easing="easeInOutElastic"';};?>><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
			</div>
			<?php endwhile;
					endif;
					wp_reset_query(); ?>
		</div>