<?php if (is_category()){
	$multicheck = of_get_option('which_part_in_category', 'none' );
}elseif (is_tag()){
	$multicheck = of_get_option('which_part_in_tag', 'none' );
}else{
	$multicheck = of_get_option('which_part_in_archive', 'none' );
};
 if (($multicheck['preview'])==='1' ) {;?>
	<div class="immaginearchivio nogrid">
	<?php $images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=category-thumb' );
		if ($images){
			foreach ( $images as $image ){
				echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
			}
		}else{
			getImagenosizetags('1');
		};?>
	</div>
<?php };?>
<div class="entry-content trentatre nogrid">
	<?php if (($multicheck['content'])==='1' ) {;?>
		<div class="nogrid excerpt">
			<?php /* TODO inserire opzione lunghezza excerpt */
				echo '<p class="excerptpara">'.mdlimitableexcerpt(140);?><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php _e('Read More >>','mdframework');?></a></p>
		</div><!-- nogrid excerpt -->
	<?php };?>
	<div class="infocontainer nogrid">
		<?php if (($multicheck['meta'])==='1' ) { mdframework_entry_meta();}; edit_post_link( __( 'Edit', 'mdframework' ), '<span class="edit-link">', '</span>' );?>
	</div><!-- infocontainer nogrid-->
	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mdframework' ), 'after' => '</div>' ) );?>
</div><!-- .entry-content -->