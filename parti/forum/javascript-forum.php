<!-- Inizio javascript-forum.php -->
<?php/*
	if (!wp_script_is('jquery', 'queue')){
wp_enqueue_script('jquery');
};*/
/*<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>*/
?>
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
	<?php 
	$selezione = of_get_option('select_sitewide_template', '' );
	$checkinglogin = of_get_option('loginstyle_checker','');
	switch ($checkinglogin){
		case 'none':
			echo '';
		break;
		case 'vanish': 
			echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/loginstuff.js"></script>';
		break;
		case 'static':
			echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/loginstuff2.js"></script>';
		break;
		case 'ibrid':
			echo '<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />';
			echo '<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>';
			echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/loginibrid.js"></script>';		
		break;		
};?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		/* Show social voter only if the browser is wide enough.*/
		if( $(window).width() >= 1030 )
			$('#left-banner').show();
 
		/* Update when user resizes browser.*/
		$(window).resize(function() {
			if( $(window).width() < 1030 ) {
				$('#left-banner').hide();
			} else {
				$('#left-banner').show();
			}
		});
	});
</script>
<!-- Inserisci if Carousel qui -->

	<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.carouFredSel-6.2.0-packed.js"></script>
<!-- optionally include helper plugins -->
	<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.transit.min.js"></script>
	<script type="text/javascript" language="javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.ba-throttle-debounce.min.js"></script>
	
	<?php /* TODO sistemare opzioni lateral_boxes_decision per renderle compatibili con ogni configurazione */
	if ((of_get_option('lateral_boxes_decision'))=='firstslide'){;?>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			var $c = $('#carousel'),
				$v = $('#turnament'),
				$sb1 = $('.asidenews1'),
				$w = $(window);
				$v.carouFredSel({
					align: false,
					direction: "down",
					width: "variable",
					/*height: "100%",*/
					items: {
					visible: 1,
					height: 50
					},
					scroll: {
					duration: 1500,
					easing: 'linear',
					pauseOnHover: 'immediate'
					},
					prev: {
					button: ".vecchiotorneo",
					pauseOnHover: true,
					key: "down"
					},
					next: {
					button: ".nuovotorneo",
					pauseOnHover: true,
					key: "up"
					}});
				$sb1.carouFredSel({
					align: false,
					direction: "down",
					width: "variable",
					/*height: "100%",*/
					items: {
					visible: 1,
					height: 200
					},
					scroll: {
					duration: 1500,
					easing: 'linear',
					pauseOnHover: 'immediate'
					},
					prev: {
					button: ".firstold",
					pauseOnHover: true,
					key: "down"
					},
					next: {
					button: ".firstnew",
					pauseOnHover: true,
					key: "up"
					}});
				$c.carouFredSel({
					width: "100%",
					align: false,
					scroll: {
						items: 1,
						duration: 4000,
						timeoutDuration: 0,
						easing: 'linear',
						pauseOnHover: 'immediate'
					},
					prev: {
					button: "#nextclan",
					key: "right",
					pauseOnHover: true
					},
					next: {
					button: "#prevclan",
					key: "left",
					pauseOnHover: true
					}
				});
			});
		</script>
<?php } elseif ((of_get_option('lateral_boxes_decision'))=='secondslide'){;?>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			var $c = $('#carousel'),
				$v = $('#turnament'),
				$sb2 = $('.asidenews2'),
				$w = $(window);
				$v.carouFredSel({
					align: false,
					direction: "down",
					width: "variable",
					/*height: "100%",*/
					items: {
					visible: 1,
					height: 50
					},
					scroll: {
					duration: 1500,
					easing: 'linear',
					pauseOnHover: 'immediate'
					},
					prev: {
					button: ".vecchiotorneo",
					pauseOnHover: true,
					key: "down"
					},
					next: {
					button: ".nuovotorneo",
					pauseOnHover: true,
					key: "up"
					}});
				$sb2.carouFredSel({
					align: false,
					direction: "down",
					width: "variable",
					/*height: "100%",*/
					items: {
					visible: 1,
					height: 200
					},
					scroll: {
					duration: 1500,
					easing: 'linear',
					pauseOnHover: 'immediate'
					},
					prev: {
					button: ".secold",
					pauseOnHover: true,
					key: "down"
					},
					next: {
					button: ".secnew",
					pauseOnHover: true,
					key: "up"
					}});
				$c.carouFredSel({
					width: "100%",
					align: false,
					scroll: {
						items: 1,
						duration: 4000,
						timeoutDuration: 0,
						easing: 'linear',
						pauseOnHover: 'immediate'
					},
					prev: {
					button: "#nextclan",
					key: "right",
					pauseOnHover: true
					},
					next: {
					button: "#prevclan",
					key: "left",
					pauseOnHover: true
					}
				});
			});
		</script>
<?php } elseif ((of_get_option('lateral_boxes_decision'))=='bothslide'){;?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var $c = $('#carousel'),
				$v = $('#turnament'),
				$sld = $('.slidando'),
				$w = $(window);
				$v.carouFredSel({
					align: false,
					direction: "down",
					width: "variable",
					/*height: "100%",*/
					items: {
					visible: 1,
					height: 50
					},
					scroll: {
					duration: 1500,
					easing: 'linear',
					pauseOnHover: 'immediate'
					},
					prev: {
					button: ".slidandoprev",
					pauseOnHover: true,
					key: "down"
					},
					next: {
					button: ".slidandonew",
					pauseOnHover: true,
					key: "up"
					}});
				$sld.carouFredSel({
					align: false,
					direction: "down",
					width: "variable",
					/*height: "100%",*/
					items: {
					visible: 1,
					height: 200
					},
					scroll: {
					duration: 1500,
					easing: 'linear',
					pauseOnHover: 'immediate'
					},
					prev: {
					button: ".vecchiotorneo",
					pauseOnHover: true,
					key: "down"
					},
					next: {
					button: ".nuovotorneo",
					pauseOnHover: true,
					key: "up"
					}});
				$c.carouFredSel({
					width: "100%",
					align: false,
					scroll: {
						items: 1,
						duration: 4000,
						timeoutDuration: 0,
						easing: 'linear',
						pauseOnHover: 'immediate'
					},
					prev: {
					button: "#nextclan",
					key: "right",
					pauseOnHover: true
					},
					next: {
					button: "#prevclan",
					key: "left",
					pauseOnHover: true
					}
				});
			});
		</script>
<?php } elseif ((of_get_option('lateral_boxes_decision'))=='bothstill'){;?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			var $c = $('#carousel'),
				$v = $('#turnament'),
				$w = $(window);
				$v.carouFredSel({
					align: false,
					direction: "down",
					width: "variable",
					/*height: "100%",*/
					items: {
					visible: 1,
					height: 50
					},
					scroll: {
					duration: 1500,
					easing: 'linear',
					pauseOnHover: 'immediate'
					},
					prev: {
					button: ".vecchiotorneo",
					pauseOnHover: true,
					key: "down"
					},
					next: {
					button: ".nuovotorneo",
					pauseOnHover: true,
					key: "up"
					}});
				$c.carouFredSel({
					width: "100%",
					align: false,
					scroll: {
						items: 1,
						duration: 4000,
						timeoutDuration: 0,
						easing: 'linear',
						pauseOnHover: 'immediate'
					},
					prev: {
					button: "#nextclan",
					key: "right",
					pauseOnHover: true
					},
					next: {
					button: "#prevclan",
					key: "left",
					pauseOnHover: true
					}
				});
			});
		</script>
					<?php };?>
<?php $gridarchive = of_get_option('selezione_grid_archive');
	if ($gridarchive === '33grid'){
		echo '<script type="text/javascript" language="javascript" src="'.get_template_directory_uri().'/js/jquery.lightbox_me.js"></script>';
		/*echo "<script>
				
        jQuery(document).ready(function($) {
            function launch() {
                 $('.opened').lightbox_me({centered: true, onLoad: function() { $('.opened').find('input:first').focus()}});
            }
            
            jQuery('.openlight').click(function(e) {
                $('.opened').lightbox_me({centered: true, onLoad: function() {
					$('.opened').find('input:first').focus();
				}});
				
                e.preventDefault();
            });
            
            
            $('table tr:nth-child(even)').addClass('stripe');
        });
    
		
		
			</script>";*/
	};?>
	<script>
	/*
	jQuery(document).ready(function ($) {
			$("p").addClass("fittext inflateme slab");
			$("A").addClass("fittext inflateme slab");
			$("h1").addClass("fittext inflateme slab");
			$("h2").addClass("fittext inflateme slab");
			$("h3").addClass("fittext inflateme slab");
			$("h4").addClass("fittext inflateme slab");
			$("h5").addClass("fittext inflateme slab");
			$("h6").addClass("fittext inflateme slab");	
				$(window).resize(function(){
				$('.fittext').expandText();
			}).trigger('resize');
			
			});
	*/
</script>
<!-- Fine javascript-forum.php -->