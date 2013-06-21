BODY{<?php if (of_get_option('super_background')){
		$background = of_get_option('super_background');
	}else{
		$background = of_get_option('forum_custom_background');
		};
            if ($background) {
                if ($background['image']) {
                    echo 'background:'.$background['color'].' url('.$background['image'].') '.$background['repeat'].' '.$background['position'].' '.$background['attachment'].' !important';
                }else {
                    echo 'background:'.$background['color']. ' !important;';
                }	
            } else {
                echo "background:#333 !important";
            }; ?>}
	.access{background:<?php echo of_get_option('forum_menu_background', '#111' ); ?> !important}
	.current-menu-item{background:<?php //echo of_get_option('forum_menu_selected_background', '#111' ); ?> !important}
	.current-menu-item:hover{background:<?php //echo of_get_option('forum_menu_selected_background_hover', '#111' ); ?> !important}
	.forumtopmenu{background:<?php echo of_get_option('forum_header_background', '#111' ); ?> !important}
	.content,.videopanel,.slotnews,HTML BODY SECTION.contenuti.zonapage SECTION.centrosito ARTICLE,HTML BODY SECTION.contenuti SECTION.centrosito DIV#content ARTICLE,.lscont{background:<?php echo of_get_option('article_background', '#111' ); ?> !important}
	H3.widget-title,.withlogo{background:<?php echo of_get_option('article_title_background', '#111' ); ?> !important}
	.access UL UL A{background:<?php echo of_get_option('forum_menu_sub_item', '' ); ?>}
	.access LI:hover > A, .access UL UL :hover > A {background:<?php echo of_get_option('forum_menu_sub_item_active', '' ); ?>}
	<?php if (of_get_option('before_article_title_logo')){;?>
	H3.widget-title:before,.withlogo:before{content:url(<?php echo of_get_option('before_article_title_logo', '' ); ?>);}
	<?php };?>
	<?php /*
	DIV.widget-area ASIDE.widget,.content.bigbox1,.content.bigbox2{background:<?php echo of_get_option('single_widget_background','#FFF');?> !important}
	*/;?>
	SECTION.screenshot ASIDE.screenpanel, SECTION.screenshot ASIDE.videopanel{background:<?php echo of_get_option('screenshot_sidebar_background','#FFF');?> !important}
	.videoclan,.slotnews,.slotnews DIV.widget-area ASIDE.widget{background:<?php echo of_get_option('article_background', '#111' ); ?> !important}
	<?php /* .videoclan{background:<?php echo of_get_option('videoclan_area_background','#FFF');?>
	.slotnews{background:<?php echo of_get_option('slotnews_area_background','#FFF');?>} */;?>
	FOOTER.homeforum{background:<?php echo of_get_option('footer_area_background','#FFF');?>}
	H2.withlogo, H3.widget-title, A.withlogo,H3.withlogo, ASIDE.fbox H2.news.titolo.articolo.withlogo A{-moz-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>;-webkit-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>;-o-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>;text-shadow:1px 1px 1px <?php echo of_get_option('text_shadow_font_home_side','#E64E4E');?>}
	<?php if ( (of_get_option('forced_section'))){;?>
		.forcedlateral H2 SPAN A{-moz-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadows_sidebox_color','#E64E4E');?>;-webkit-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadows_sidebox_color','#E64E4E');?>;-o-text-shadow:1px 1px 1px <?php echo of_get_option('text_shadows_sidebox_color','#E64E4E');?>;text-shadow:1px 1px 1px <?php echo of_get_option('text_shadows_sidebox_color','#E64E4E');?>}
		<?php $fbst = of_get_option('slotnews_box_shadow','#AAA');$fbsb = of_get_option('videoclan_box_shadow','#AAA');?> 
		ASIDE.forcedlateral.top{background:<?php echo of_get_option('screenshot_sidebar_background','#FFF');?> !important;-moz-box-shadow: 1px 1px 1px <?php echo $fbst;?>;-webkit-box-shadow: 1px 1px 1px <?php echo $fbst;?>;-o-box-shadow: 1px 1px 1px <?php echo $fbst;?>;box-shadow: 1px 1px 1px <?php echo $fbst;?>;}
		ASIDE.forcedlateral.bottom{background:<?php echo of_get_option('videoclan_area_background','#FFF');?> !important;-moz-box-shadow: 1px 1px 1px <?php echo $fbsb;?>;-webkit-box-shadow: 1px 1px 1px <?php echo $fbsb;?>;-o-box-shadow: 1px 1px 1px <?php echo $fbsb;?>;box-shadow: 1px 1px 1px <?php echo $fbsb;?>;}
	<?php };?>
	<?php echo of_get_option('menu_custom_css_code_textarea','');?>
	<?php if( (of_get_option('lateral_boxes'))== 'full'){;
	/*
		.fillme.screenshot.x2.bigboxarea,.forcedlateral .top{background:<?php echo of_get_option('screenshot_sidebar_background','#FFF');?> !important}
	*/
	};?>
	.rslides IMG{height:<?php echo of_get_option('top_slide_height_size','300');?>px !important;}
	#content ARTICLE.hentry HEADER.entry-header{background:<?php echo of_get_option('article_title_color');?>;}
SECTION.novesessanta,.contenuti{background:<?php echo of_get_option('colorpicker_novessanta');?>}
 .contenitorecarosello{background:<?php echo of_get_option('carousel_background_choseme');?>}
 <?php if (of_get_option('styling_slideshow_selector') === 'opzione4'){ $traspvalue = of_get_option('slideshow_transparency_chooser'); $ristrasp = $traspvalue - 15;$ristrasp2 = $traspvalue + 10;?>
 .rs-caption { background: url(<?php echo get_template_directory_uri();?>/slideshows/opzione4/img/black<?php echo $traspvalue ;?>.png); 
background: rgba(0, 0, 0, 0.<?php echo $traspvalue ;?>);
background: -moz-linear-gradient(top, rgba(0, 0, 0, .<?php echo $ristrasp;?>), rgba(0, 0, 0, .<?php echo $ristrasp2;?>));
background: -webkit-linear-gradient(top, rgba(0, 0, 0, .<?php echo $ristrasp;?>), rgba(0, 0, 0, .<?php echo $ristrasp2;?>));
background: -o-linear-gradient(top, rgba(0, 0, 0, .<?php echo $ristrasp;?>), rgba(0, 0, 0, .<?php echo $ristrasp2;?>));
background: -ms-linear-gradient(top, rgba(0, 0, 0, .<?php echo $ristrasp;?>), rgba(0, 0, 0, .<?php echo $ristrasp2;?>));
background: linear-gradient(top, rgba(0, 0, 0, .<?php echo $ristrasp;?>), rgba(0, 0, 0, .<?php echo $ristrasp2;?>));
}
<?php };/*
.fillme .content{background:none !important;}
.fillme{background:none !Important;}*/;?>
<?php 
$sidebarcolor = of_get_option('colorpicker_sidebar');
$rgb = hex2rgb($sidebarcolor);
/*echo '<!-- Echo RGB '.$sidebarcolor.' -->';*/
$r = $rgb[0];$g = $rgb[1];$b = $rgb[2];
if (of_get_option('sidebar_transparency_chooser')){
$transpsidebar = of_get_option('sidebar_transparency_chooser');
echo '.fillme{background:rgb('.$r.','.$g.','.$b.');}';
echo '.fillme{background:rgba('.$r.','.$g.','.$b.','.'0.'.$transpsidebar.');}';
}else{ echo '.fillme{background:rgb('.$r.','.$g.','.$b.');}';};?>