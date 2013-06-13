<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage MD_Framework
 * @since MD Framework 1.0
 */
?>
<?php $numsidebar = of_get_option('example_images', 'no entry' ); ?>
<?php if ( (is_active_sidebar( 'sidebar-4' )&&($numsidebar == 'trecol' ))) { ?>
		<div id="third" class="widget-area <?php echo $numsidebar; ?>" role="complementary">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div><!-- #third -->
	<?php }; ?>