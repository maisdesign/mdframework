<?php/** * The default template for displaying content. Used for both single and index/archive/search. * * @package WordPress * @subpackage MD_Framework * @since MD Framework 1.0 */?>	<!-- File Content.php -->	<?php $gridarchive = of_get_option('selezione_grid_archive');	if (is_archive()){		if (($gridarchive === 'normalgrid')){;?>				<article id="post-<?php the_ID()?>"<?php post_class()?>>			<?php } elseif ($gridarchive === '33grid'){;?>				<article id="post-<?php the_ID()?>"<?php post_class('grid33')?>>			<?php } elseif ($gridarchive === 'noe33grid'){;?>				<article id="post-<?php the_ID()?>"<?php post_class('noe33grid')?>>			<?php } elseif ($gridarchive === 'nogridmiddle'){;?>				<article id="post-<?php the_ID()?>"<?php post_class('nogridmiddle')?>>			<?php } elseif ($gridarchive === '33grideno'){;?>				<article id="post-<?php the_ID()?>"<?php post_class('grideno33')?>>			<?php } elseif ($gridarchive === 'nogrid'){;?>				<article id="post-<?php the_ID()?>"<?php post_class('nogrid')?>>			<?php } elseif ($gridarchive === 'nogvertical'){;?>				<article id="post-<?php the_ID();?>"<?php post_class('nogvertical');?>>			<?php } elseif ($gridarchive === 'biggrid'){;?>				<article id="post-<?php the_ID();?>"<?php post_class('biggrid');?>>		<?php };}elseif (is_single){;?>		<article id="post-<?php the_ID()?>"<?php post_class()?>>	<?php };?>		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>		<div class="featured-post">			<?php _e( 'Featured post', 'mdframework' ); ?>		</div>		<?php endif; ?>		<header class="entry-header">			<?php /* the_post_thumbnail(); */?>			<?php if ( is_single() ) : ?>			<h2 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a></h2>			<?php else : ?>			<h2 class="entry-title openlight">				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'mdframework' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>			</h2>			<?php endif; /* is_single() */?>			<?php if ( comments_open() ) : ?>				<div class="comments-link">					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'mdframework' ) . '</span>', __( '1 Reply', 'mdframework' ), __( '% Replies', 'mdframework' ) ); ?>				</div><!-- .comments-link -->			<?php endif; /* comments_open() */?>		</header><!-- .entry-header -->		<?php if ( is_search() ) : /* Only display Excerpts for Search */?>		<div class="entry-summary">			<?php the_excerpt(); ?>		</div><!-- .entry-summary -->		<?php else : ?>		<!-- File Content.php per gli archivi -->		<?php if (is_archive()){			$gridarchive = of_get_option('selezione_grid_archive');		if ($gridarchive != 'normalgrid'){		switch ($gridarchive){			case '33grid':				$contagrid = 1;				echo '<div class="immaginearchivio grid33 openlight'.$contagrid.'">';				getImagenosizetags('1');				echo '</div><div class="entry-content trentatre opened'.$contagrid.'" style="display:none"><div class="openedimage">';				getImagenosizetags('1');				echo '</div><!-- .openedimage --><div class="openedexcerpt">';				the_excerpt();				echo '</div><!-- openedexcerpt -->';				wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mdframework' ), 'after' => '</div>' ) );				echo'</div><!-- .entry-content -->';				echo "<script>				        jQuery(document).ready(function($) {            function launch() {                 $('.opened".$contagrid."').lightbox_me({centered: true, onLoad: function() { $('.opened".$contagrid."').find('input:first').focus()}});            }                        jQuery('.openlight".$contagrid."').click(function(e) {                $('.opened".$contagrid."').lightbox_me({centered: true, onLoad: function() {					$('.opened".$contagrid."').find('input:first').focus();				}});				                e.preventDefault();            });                                    $('table tr:nth-child(even)').addClass('stripe');        });    							</script>";				$contagrid++;				break;		};};} else{			echo'<div class="entry-content">'.the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'mdframework' ) ).wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'mdframework' ), 'after' => '</div>' ) ).'</div><!-- .entry-content -->';		};?>		<!-- File Content.php per gli archivi -->		<?php endif; ?>		<footer class="entry-meta">			<?php mdframework_entry_meta(); ?>			<?php edit_post_link( __( 'Edit', 'mdframework' ), '<span class="edit-link">', '</span>' ); ?>			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : /* If a user has filled out their description and this is a multi-author blog, show a bio on their entries. */?>				<div class="author-info">					<div class="author-avatar">						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'mdframework_author_bio_avatar_size', 68 ) ); ?>					</div><!-- .author-avatar -->					<div class="author-description">						<h2><?php printf( __( 'About %s', 'mdframework' ), get_the_author() ); ?></h2>						<p><?php the_author_meta( 'description' ); ?></p>						<div class="author-link">							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'mdframework' ), get_the_author() ); ?>							</a>						</div><!-- .author-link	-->					</div><!-- .author-description -->				</div><!-- .author-info -->			<?php endif; ?>		</footer><!-- .entry-meta -->	</article><!-- #post -->	<!-- Fine file content.php -->