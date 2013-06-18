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
		<?php /* TODO = Aggiungere le altre opzioni di Layout */
			if (is_category()){
					$multicheck = of_get_option('which_part_in_category', 'none' );
				}elseif (is_tag()){
					$multicheck = of_get_option('which_part_in_tag', 'none' );
				}else{
					$multicheck = of_get_option('which_part_in_archive', 'none' );
				};
			$gridarchive = of_get_option('selezione_grid_archive');
		if ($gridarchive != 'normalgrid'){
		switch ($gridarchive){
			case '33grid':
				get_template_part('parti/forum/layout/33grid','');
				break;
			case 'nogrid':
				get_template_part('parti/forum/layout/nogrid','');
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