<?php
/**
 * Template Name: YouTube Page template
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php 
$uri = of_get_option('youtube_rss_page_template' );
$feed = fetch_feed( $uri );

if ( is_wp_error( $feed ) ) {
	return false;
} else {
	$maxitems = $feed->get_item_quantity( 10 );
	$rss_items = $feed->get_items( 0, $maxitems );
	
	if ( $maxitems == 0 ) :
		return false;
	else : 
		if ( is_array( $rss_items ) ) : ?>
		<div id="videos">
			<div class="video_player">
			<?php
			$i = 0;
			foreach ( $rss_items as $item ) :
				if ( $i++ > 0 )
					break;
				$id = wptuts_get_yt_ID( $item->get_permalink() );
			?>
				<iframe width="610" height="344" src="http://www.youtube.com/embed/<?php echo $id; ?>" frameborder="0" allowfullscreen></iframe>
			<?php endforeach; ?>
			</div>
			<ul class="video_thumbs">
			<?php
			foreach ( $rss_items as $item ) :
				$id = wptuts_get_yt_ID( $item->get_permalink() );
				$enclosure = $item->get_enclosure();
			?>
				<li>
					<p><a href="http://www.youtube.com/embed/<?php echo $id; ?>"><img src="<?php echo esc_url( $enclosure->get_thumbnail() ); ?>" width="290" height="164" /></a></p>
					<p><a href="http://www.youtube.com/embed/<?php echo $id; ?>"><?php esc_html_e( $item->get_title() ); ?></a></p>
				</li>
			<?php endforeach; ?>
			</ul>
		</div>
		<?php endif;
	endif;
}		
?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>