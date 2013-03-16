<!-- File top-forum.php -->
<header class="forumtopmenu">
		<nav class="access" role="navigation">
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'forummenu' ) ); ?>
		</nav>
		<hgroup class="titolo">
			<div class="logo">
				<img class="reflect rheight20 ropacity40" src="<?php echo of_get_option('logo_image_forum');?>" alt="" />
			</div>
			<figure class="marchio">
				<h1 class="titoloforum"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h3 class="descrizione"><?php bloginfo('description'); ?></h3>
			</figure>
		</hgroup>
		<nav class="access" role="navigation">
			<div class="skip-link screen-reader-text">
				<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mdframework' ); ?>">
				<?php _e( 'Skip to content', 'mdframework' ); ?></a>
			</div>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	</header>
<!-- Fine file top-forum.php -->