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
<?php if ( is_active_sidebar( 'right-banner' )) { ?>


		<div id="right-banner" class="widget-area stickem" role="complementary">


			<?php dynamic_sidebar( 'right-banner' ); ?>


		</div><!-- #right-banner -->


	<?php }; ?>