<!-- File head-forum.php -->
<style>
	BODY{<?php $background = of_get_option('forum_custom_background');
            if ($background) {
                if ($background['image']) {
                    echo 'background:url('.$background['image']. ') !important';
                }else {
                    echo 'background:'.$background['color']. ' !important;';
                }	
            } else {
                echo "background:#333 !important";
            }; ?>}
	.access{background:<?php echo of_get_option('forum_menu_background', '#111' ); ?> !important}
	.current-menu-item{background:<?php echo of_get_option('forum_menu_selected_background', '#111' ); ?> !important}
	.current-menu-item:hover{background:<?php echo of_get_option('forum_menu_selected_background_hover', '#111' ); ?> !important}
	.forumtopmenu{background:<?php echo of_get_option('forum_header_background', '#111' ); ?> !important}
	.content,.videopanel,.slotnews{background:<?php echo of_get_option('article_background', '#111' ); ?> !important}
	H3.widget-title,.withlogo{background:<?php echo of_get_option('article_title_background', '#111' ); ?> !important}
	.access UL UL A{background:<?php echo of_get_option('forum_menu_sub_item', '' ); ?>}
	.access LI:hover > A, .access UL UL :hover > A {background:<?php echo of_get_option('forum_menu_sub_item_active', '' ); ?>}
	H3.widget-title:before,.withlogo:before{content:url(<?php echo of_get_option('before_article_title_logo', '' ); ?>);}
	DIV.widget-area ASIDE.widget{background:<?php echo of_get_option('single_widget_background','#FFF');?> !important}
	SECTION.screenshot ASIDE.screenpanel, SECTION.screenshot ASIDE.videopanel{background:<?php echo of_get_option('screenshot_sidebar_background','#FFF');?> !important}
	.videoclan{background:<?php echo of_get_option('videoclan_area_background','#FFF');?> !important}
	.slotnews{background:<?php echo of_get_option('slotnews_area_background','#FFF');?>}
	FOOTER.homeforum{background:<?php echo of_get_option('footer_area_background','#FFF');?>}
	H2.withlogo, H3.widget-title, A.withlogo{-moz-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>;-webkit-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>;-o-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>;text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>}
	<?php echo of_get_option('menu_custom_css_code_textarea','');?>
	<?php if( (of_get_option('lateral_boxes'))== 'full'){;?>
	.fillme.screenshot.x2.bigboxarea{background:<?php echo of_get_option('screenshot_sidebar_background','#FFF');?> !important}
	<?php };?>
</style>
 <meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
 <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/forumhome.css" />
 <link href='<?php echo get_template_directory_uri();?>/css/responsiveslides.css' rel='stylesheet' type='text/css'>
 </head>
<!-- Fine file head-forum.php -->