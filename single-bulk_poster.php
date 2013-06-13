<?php
/*
	Se volessimo usare il titolo del Custom Post basterebbe usare the_title() all'interno del loop di WP
Esempio:
	$args = array( 'post_type' => 'bulk_poster', 'posts_per_page' => 1 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	the_title();
	echo '<div class="entry-content">';
	the_content();
	echo '</div>';
endwhile;

// Ovviamente il tuo codice andrà dentro il ciclo while
*/;?>