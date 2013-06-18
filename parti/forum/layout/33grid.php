<?php if (is_category()){
	$multicheck = of_get_option('which_part_in_category', 'none' );
}elseif (is_tag()){
	$multicheck = of_get_option('which_part_in_tag', 'none' );
}else{
	$multicheck = of_get_option('which_part_in_archive', 'none' );
};?>
<div class="immaginearchivio grid33 openlight<?php echo $_SESSION['contandocat'];?>">
	<?php if (($multicheck['preview'])==='1' ) {
		$images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=150px' );
			if ($images){
				foreach ( $images as $image )
					{
						echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
					}
			}else{
				getImagenosizetags('1');
				};
		};?>
</div>
<div class="entry-content trentatre opened<?php echo $_SESSION['contandocat'];?> whileopen" style="display:none">
	<div class="openedimage">
		<?php $images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=150px' );
			if ($images){
				foreach ( $images as $image )
					{
						echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
					};
			}else{
				getImagenosizetags('1');
			};?>
	</div><!-- .openedimage -->
	<div class="openedexcerpt">
		<?php /* TODO inserire opzione lunghezza excerpt */
				echo '<p class="excerptpara">'.mdlimitableexcerpt(140);?><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php _e('Read More >>','mdframework');?></a></p>
	</div><!-- openedexcerpt -->
	<div class="infocontainer">
		<?php mdframework_entry_meta();?>
	</div><!-- infocontainer -->
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mdframework' ), 'after' => '</div>' ) );?>
</div><!-- .entry-content -->
<script>
	jQuery(document).ready(function($) {
		function launch() {
			$('.opened".$_SESSION['contandocat']."').lightbox_me({centered: true, onLoad: function() { $('.opened".$_SESSION['contandocat']."').find('input:first').focus()}});
		}
	jQuery('.openlight".$_SESSION['contandocat']."').click(function(e) {
		$('.opened".$_SESSION['contandocat']."').lightbox_me({centered: true, onLoad: function() {
			$('.opened".$_SESSION['contandocat']."').find('input:first').focus();
		}});
		e.preventDefault();
	});
		$('table tr:nth-child(even)').addClass('stripe');
	});		
</script>";