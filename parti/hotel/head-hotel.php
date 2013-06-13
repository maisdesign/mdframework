
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/homehotel.css" />
<style>
BODY {background:<?php echo of_get_option('hotel_colorpicker_body_background', '' ); ?>;}
#page {background:<?php echo of_get_option('hotel_colorpicker_content_background', '' ); ?>;}
HEADER {background:<?php echo of_get_option('hotel_colorpicker_header_background', '' ); ?>;}
NAV#access {background:<?php echo of_get_option('hotel_colorpicker_top_menu', '' ); ?>;}
.basso {background:<?php echo of_get_option('hotel_colorpicker_footer_background', '' ); ?>;}
SECTION.firstareahotel{background:<?php echo of_get_option('hotel_colorpicker_first_area_background', '' ); ?>;}
SECTION.secondareahotel{background:<?php echo of_get_option('hotel_colorpicker_second_area_background', '' ); ?>;}
ARTICLE.firstcat{background:<?php echo of_get_option('hotel_colorpicker_foot1_background','');?>;}
ARTICLE.secondcat{background:<?php echo of_get_option('hotel_colorpicker_foot2_background','');?>;}
ARTICLE.thirdcat{background:<?php echo of_get_option('hotel_colorpicker_foot3_background','');?>;}
</style>
<?php if ((of_get_option('example_showhidden')) == '1') {;?>
<!-- Slideshow -->
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/responsiveslides.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
/*
      // Slideshow 1
      $("#slider1").responsiveSlides({
		pager: true,
        maxwidth: 800,
        speed: 800
      });

      // Slideshow 2
      $("#slider2").responsiveSlides({
        auto: false,
        pager: true,
        speed: 300,
        maxwidth: 540
      });
*/
      // Slideshow 3
      $("#slider3").responsiveSlides({
        manualControls: '#slider3-pager',
        maxwidth: 956
      });
/*
      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: false,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });
*/
    });
  </script>
<?php };?>
</head>