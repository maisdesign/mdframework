<!-- File top-forum.php -->
<?php if (of_get_option('background_ads_enabler')){;
	get_template_part('parti/backgroundad','');
	echo '<header class="forumtopmenu">';
}else{;
	echo '<header class="forumtopmenu"';
		if (of_get_option('instead_header_image')){
			echo 'style="margin:200px auto !important;">';
		}else{echo 'style="margin:50px auto !important;">';};
};?>
	<?php if ((of_get_option('how_many_menu',''))==2){;?>
		<nav class="access" role="navigation">
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'forummenu' ) ); ?>
		</nav>
	<?php };?>
		<?php if (of_get_option('instead_header_image')){	
				$site_title = get_bloginfo( 'name' );			
				echo '<figure id="insteadofheader"><a href="'.home_url().'" title="'.$site_title.'"><img src="'.of_get_option('instead_header_image').'" alt="'.$site_title.'" /></a></figure>';
				}else{;?>
		<hgroup class="titolo textfill">
			<div class="logo">
				<img class="<?php if (of_get_option('reflect_effect_activator')){echo 'reflect rheight20 ropacity40';};?>" src="<?php echo of_get_option('logo_image_forum');?>" alt="" />
			</div>
			<figure class="marchio">
				<section class="conttitolo">
					<h1 class="titoloforum <?php // if (of_get_option('reflect_effect_activator')){echo 'riflettente rheight40 ropacity40';};?>"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
					<div class="sottotitolo"></div>
				</section>
				<section class="contdesc">
					<h3 class="descrizione <?php if (of_get_option('reflect_effect_activator')){echo 'riflettentedesc';};?>"><?php bloginfo('description'); ?></h3>
				</section>
			</figure>
		</hgroup>
		<?php };?>
	<?php if ((of_get_option('how_many_menu',''))>=1){;?>
		<nav class="access" role="navigation">
			<div class="skip-link screen-reader-text">
				<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'mdframework' ); ?>">
				<?php _e( 'Skip to content', 'mdframework' ); ?></a>
			</div>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
	<?php };?>
	<!-- TODO inserire IF qui per breadcrumbs -->
	<div class="mdbreadcrumb">
		<?php breadcrumbs();?>
	</div>
	</header>
<!-- Fine file top-forum.php -->