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
<?php if ( is_active_sidebar( 'sidebar-forum' )) { ?>


		<div id="fourth" class="widget-area" role="complementary">


			<?php dynamic_sidebar( 'sidebar-forum' ); ?>


		</div><!-- #fourth -->


	<?php }; ?>