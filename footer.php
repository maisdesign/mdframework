<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Options Framework Theme
 */
?>

	</div><!-- #page -->
<section class="basso <?php echo of_get_option('seleziona_footer', 'no entry' ); ?>">
<?php $footselect = of_get_option('seleziona_footer', 'no entry' ); ?>
	<?php if ( is_active_sidebar( 'footer-1' ) ) {;
		echo '<div id="footer-1" class="'.$footselect.'" >';
			dynamic_sidebar( 'footer-1' );
		echo '</div><!-- #footer-1 -->'; };
	if (( is_active_sidebar( 'footer-2' ))&&($footselect =='footer-3') ) {;
		echo '<div id="footer-2" class="'.$footselect.'" >';
			dynamic_sidebar( 'footer-2' );
		echo '</div><!-- #footer-2 -->'; };
	if (( is_active_sidebar( 'footer-3' ))&&($footselect !='totalfoot') ) {;
		echo '<div id="footer-3" class="'.$footselect.'" >';
			dynamic_sidebar( 'footer-3' );
		echo '</div><!-- #footer-3 -->'; };?>

</section>
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
