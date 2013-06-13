<!-- File latest-news.php -->
<aside class="slotnews centrato">
<?php if (( is_active_sidebar( 'forum-lower-sidebar' ) )) { ?>

		<div id="forum-special" class="widget-area <?php echo $numsidebar; ?>" role="complementary">

			<?php dynamic_sidebar( 'forum-lower-sidebar' ); ?>

		</div><!-- #forum-special -->

	<?php }; ?>
</aside>
<!-- END of File latest-news.php -->