<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/slideshows/opzione4/opzione4.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/slideshows/opzione4/assets/css/refineslide-theme-dark.css" />
<script src="<?php echo get_template_directory_uri();?>/slideshows/opzione4/assets/js/modernizr.js"></script>
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri();?>/slideshows/opzione4/assets/js/respond.min.js"></script>
	<![endif]-->
    <div class="group section-wrap upper" id="upper">
        <div class="wrap group">
            <div class="section-2 group">
				<ul id="images" class="rs-slider">
					<?php $firstcatid = of_get_option('top_slide_category_forum');?>	
					<?php $firstslidenum = of_get_option('slide_number_top');?>
					<?php $firstslideoffset = of_get_option('slide_skip_top');?>
					<?php
						$rstopleft = 'rs-top-left';$rsbottomright = 'rs-bottom-right';$rstopright = 'rs-top-right';$rsbottomleft = 'rs-bottom-left';$rsbottom = 'rs-bottom';$rstop = 'rs-top';$rsleft = 'rs-left';$rsright = 'rs-right';
						$posizionacaption = array($rstopleft, $rsbottomright, $rstopright, $rsbottomleft, $rsbottom, $rstop, $rsleft, $rsright);
						query_posts( array(
						'showposts'=>$firstslidenum,
						'offset'=>$firstslideoffset,
						'cat' => $firstcatid));
						if (have_posts()) :
						while (have_posts()) : the_post();
					?>	
				    <li class="group">
				        <a href="<?php the_permalink();?>">
							<?php
								$images = rwmb_meta( 'md_cfield_slideshow_top', 'type=plupload_image&size=homeslide' );
								if ($images){
									foreach ( $images as $image )
										{echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";}
									}else{;?>
				            <img src="<?php $image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
								echo $image_url[0]; ?>" alt="<?php the_title();?>" />
							<?php };?>
				        </a>
				        <div class="rs-caption <?php if (of_get_option('slideshow_caption_effects')==='random'){
						echo $posizionacaption[array_rand($posizionacaption)];
						}else{
							$caption = $posizionacaption[of_get_option('slideshow_caption_effects')];
						echo $caption;}?>">
				            <h3><?php the_title();?></h3>
				            <p><a class="colorami" href="<?php the_permalink();?>">
								<?php if ($images){
									foreach ( $images as $image ) {
										echo "{$image['alt']}";
										};
									}else{
										custom_excerpt('6');
								}; ?>
							</a></p>
				        </div>
				    </li>
					<?php endwhile;
					endif;
					wp_reset_query(); ?>
				</ul>
            </div> <!-- /.section-2 -->
        </div> <!-- /.wrap -->
    </div> <!-- /#upper -->
    <script src="<?php echo get_template_directory_uri();?>/slideshows/opzione4/assets/js/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/slideshows/opzione4/jquery.refineslide.js"></script>
    <script>
        jQuery(document).ready(function($) {
            var $upper = $('#upper');

            $('#images').refineSlide({
                transition : 'fade',
                onInit : function () {
                    var slider = this.slider,
                       $triggers = $('.translist').find('> li > a');

                    $triggers.parent().find('a[href="#_'+ this.slider.settings['transition'] +'"]').addClass('active');

                    $triggers.on('click', function (e) {
                       e.preventDefault();

                        if (!$(this).find('.unsupported').length) {
                            $triggers.removeClass('active');
                            $(this).addClass('active');
                            slider.settings['transition'] = $(this).attr('href').replace('#_', '');
                        }
                    });

                    function support(result, bobble) {
                        var phrase = '';

                        if (!result) {
                            phrase = ' not';
                            $upper.find('div.bobble-'+ bobble).addClass('unsupported');
                            $upper.find('div.bobble-js.bobble-css.unsupported').removeClass('bobble-css unsupported').text('JS');
                        }
                    }

                    support(this.slider.cssTransforms3d, '3d');
                    support(this.slider.cssTransitions, 'css');
                }
            });
        });
    </script>