<!--content-archive-forum.php -->
<?php $gridarchive = of_get_option('selezione_grid_archive');
		if (($gridarchive === 'normalgrid')){;?>
				<article id="post-<?php the_ID()?>"<?php post_class()?>>
			<?php } elseif ($gridarchive === '33grid'){;?>
				<article id="post-<?php the_ID()?>"<?php post_class('grid33')?>>
			<?php } elseif ($gridarchive === 'noe33grid'){;?>
				<article id="post-<?php the_ID()?>"<?php post_class('noe33grid')?>>
			<?php } elseif ($gridarchive === 'nogridmiddle'){;?>
				<article id="post-<?php the_ID()?>"<?php post_class('nogridmiddle')?>>
			<?php } elseif ($gridarchive === '33grideno'){;?>
				<article id="post-<?php the_ID()?>"<?php post_class('grideno33')?>>
			<?php } elseif ($gridarchive === 'nogrid'){;?>
				<article id="post-<?php the_ID()?>"<?php post_class('nogrid')?>>
			<?php } elseif ($gridarchive === 'nogvertical'){;?>
				<article id="post-<?php the_ID();?>"<?php post_class('nogvertical');?>>
			<?php } elseif ($gridarchive === 'biggrid'){;?>
				<article id="post-<?php the_ID();?>"<?php post_class('biggrid');?>>
			<?php }elseif (is_single){;?>
				<article id="post-<?php the_ID()?>"<?php post_class()?>>
			<?php };?>
			<!-- open entry-header -->
	<header class="entry-header">
			<h2 class="entry-title openlight">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'mdframework' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'mdframework' ) . '</span>', __( '1 Reply', 'mdframework' ), __( '% Replies', 'mdframework' ) ); ?>
				</div><!-- .comments-link -->
			<?php endif; /* comments_open() */?>
		</header><!-- .entry-header -->
		<?php 
			$gridarchive = of_get_option('selezione_grid_archive');
		if ($gridarchive != 'normalgrid'){
		switch ($gridarchive){
			case '33grid':
				echo '<div class="immaginearchivio grid33 openlight'.$_SESSION['contandocat'].'">';
				$images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=150px' );
								if ($images){
									foreach ( $images as $image )
										{echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";}
									}else{
				getImagenosizetags('1');};
				echo '</div><div class="entry-content trentatre opened'.$_SESSION['contandocat'].' whileopen" style="display:none"><div class="openedimage">';
				$images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=150px' );
								if ($images){
									foreach ( $images as $image )
										{echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";}
									}else{
				getImagenosizetags('1');};
				echo '</div><!-- .openedimage --><div class="openedexcerpt">';
				the_excerpt();
				echo '</div><!-- openedexcerpt --><div class="infocontainer">';
				mdframework_entry_meta();
				echo '</div><!-- infocontainer -->';
				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mdframework' ), 'after' => '</div>' ) );
				echo'</div><!-- .entry-content -->';
				echo "<script>
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
				break;
			case 'nogrid':
				echo '<div class="immaginearchivio nogrid">';
				$images = rwmb_meta( 'md_cfield_preview_custom', 'type=plupload_image&size=category-thumb' );
								if ($images){
									foreach ( $images as $image )
										{echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";}
									}else{
				getImagenosizetags('1');};
				echo '</div><div class="entry-content trentatre nogrid">'/*<div class="nogrid excerpt">*/;
				/*the_excerpt();*/
				echo /*</div><!-- nogrid excerpt -->*/'<div class="infocontainer nogrid">';
				mdframework_entry_meta();
				edit_post_link( __( 'Edit', 'mdframework' ), '<span class="edit-link">', '</span>' );
				echo '</div><!-- infocontainer nogrid-->';
				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mdframework' ), 'after' => '</div>' ) );
				echo'</div><!-- .entry-content -->';
				break;
		};};
		if ($gridarchive != 'nogrid'){;?>
		<footer class="entry-meta">
			<?php mdframework_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'mdframework' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		<?php };?>
	</article><!-- #post -->
	<!--FINE content-archive-forum.php -->