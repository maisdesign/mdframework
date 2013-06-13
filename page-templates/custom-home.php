<?php
/*
Template Name: Home Personalizzata
*/
get_header();
?>
<?php $grigliami = of_get_option('selezione_grid', 'no entry' ); ?>
<section class="contenitorepost <?php echo of_get_option('example_images', 'no entry' ); ?> <?php echo of_get_option('selezione_grid', 'no entry' ); ?>">
<?php // Loop 1
$first_query = new WP_Query('posts_per_page=3&cat=-6'); // exclude category
while($first_query->have_posts()) : $first_query->the_post();{;?>
<article class="postgriglia <?php echo of_get_option('example_images', 'no entry' ); ?>">
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php echo get_the_post_thumbnail($page->ID, 'thumbnail');
		if (($grigliami == 'noe33grid')||($grigliami == 'nogrid')($grigliami == 'nogvertical')){;		
		the_excerpt();}; ?>
	</div>
</article>
<?php } endwhile;
wp_reset_postdata();

// Loop 2
$second_query = new WP_Query('posts_per_page=3&cat=-6'); // exclude category
while($second_query->have_posts()) : $second_query->the_post();{;?>
<article class="postgriglia <?php echo of_get_option('example_images', 'no entry' ); ?>">
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php echo get_the_post_thumbnail($page->ID, 'thumbnail');
		if (($grigliami == 'nogridmiddle')||($grigliami == 'nogrid')||($grigliami == 'nogvertical')){;		
		the_excerpt();}; ?>
	</div>
</article>
<?php }endwhile;
wp_reset_postdata();

// Loop 3
$third_query = new WP_Query('posts_per_page=3&cat=-6'); // exclude category
while($third_query->have_posts()) : $third_query->the_post();{?>
<article class="postgriglia <?php echo of_get_option('example_images', 'no entry' ); ?>">
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php echo get_the_post_thumbnail($page->ID, 'thumbnail');
		if (($grigliami == '33grideno')||($grigliami == 'nogrid')||($grigliami == 'nogvertical')){;		
		the_excerpt();}; ?>
	</div>
</article>
<?php } endwhile;
wp_reset_postdata();
?>
</section>
<?php get_sidebar();?>
<?php get_footer();?>
