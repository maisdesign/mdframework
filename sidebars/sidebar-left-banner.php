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
<!-- File sidebar-left-banner.php -->
<?php if ( is_active_sidebar( 'left-banner' )) { ?>
		<div id="left-banner" class="widget-area stickem" role="complementary">
			<?php dynamic_sidebar( 'left-banner' ); ?>
		</div><!-- #left-banner -->
	<?php }; ?>