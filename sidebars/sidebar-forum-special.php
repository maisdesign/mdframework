<!-- File sidebar-forum-special.php -->
<?php if( (of_get_option('lateral_boxes'))== 'full'){;
	if (((of_get_option('lateral_boxes_content'))!='onlycustom')&&((of_get_option('lateral_boxes_content'))!='customenormal')){;?>
		<section class="fillme specialforum" style="width:100%;margin:0;">
		<?php } else {;?>
		<section class="fillme specialforum">
		<?php };?>
<?php };?>
<?php if (( is_active_sidebar( 'forum-special' ) )) { ?>

		<div id="forum-special" class="widget-area <?php echo $numsidebar; ?>" role="complementary">

			<?php dynamic_sidebar( 'forum-special' ); ?>

		</div><!-- #forum-special -->

	<?php }; ?>
<!-- END of File sidebar-forum-special.php -->