<!-- File forced-lateral.php -->
<aside class="forcedlateral top">
<?php	$latestscreencat = of_get_option('big_box_category_1');?>
	<h2 class="news titolo articolo withlogo">
		<span>
			<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_the_category_by_id($latestscreencat); ?>"><?php echo get_the_category_by_id($latestscreencat); ?></a>
		</span>
	</h2>
	<div class="contain theforce">
		<ul class="loopforced lf1">
			<?php
			query_posts( array(
			'showposts'=>'5',
			'cat' => $latestscreencat));
			if (have_posts()) :
			while (have_posts()) : the_post();
			$feeltheforce == 1;
			?>
				<li class="listforce" id="jedyitem<?php echo $feeltheforce;?>">
					<?php getImage10080('1'); ?>
					<p class="describe theforce" id="iamyourfather<?php echo $feeltheforce;?>">Descrizione dell'immagine</p>
				</li>
				<?php $feeltheforce++;?>
			<?php endwhile;endif; ?>
			
		</ul>
	</div>
</aside>
<aside class="forcedlateral bottom">
	<?php $latestscreencat = of_get_option('big_box_category_2');?>
	<h2 class="news titolo articolo withlogo">
		<span>
			<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_the_category_by_id($latestscreencat); ?>">
				<?php echo get_the_category_by_id($latestscreencat); ?>
			</a>
		</span>
	</h2>
	<div class="contain theforce">
		<ul class="loopforced lf1">
			<?php
			query_posts( array(
			'showposts'=>'5',
			'cat' => $latestscreencat));
			if (have_posts()) :
			while (have_posts()) : the_post();
			$jedypower == 1;
			?>
				<li class="listforce" id="jedyitem<?php echo $jedypower;?>">
					<?php getImage10080('1'); ?>
					<p class="describe theforce" id="iamyourfather<?php echo $jedypower;?>">Descrizione dell'immagine</p>
				</li>
				<?php $jedypower++;?>
			<?php endwhile;endif; wp_reset_query(); ?>
			
		</ul>
	</div>
	