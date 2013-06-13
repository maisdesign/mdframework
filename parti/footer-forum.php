<?php /* Inserire IF qui 
<footer class="homeforum">
		<div class="ftwg wg2"> 
			In nunc turpis, suscipit sed tempor in, venenatis in ante. Aliquam iaculis tincidunt leo eget adipiscing. Phasellus metus justo, mollis at vestibulum id, ullamcorper id nisi. Morbi consequat, est ac semper congue, odio velit tristique ligula, nec laoreet diam eros at odio. Sed sed risus ut lorem ultrices rhoncus at et tortor. Integer turpis nulla, volutpat et elementum id, rhoncus non arcu. Nam quis sem augue. Nunc tempor rutrum enim eget euismod.
		</div>
		<div class="ftwg wg2">
			In nunc turpis, suscipit sed tempor in, venenatis in ante. Aliquam iaculis tincidunt leo eget adipiscing. Phasellus metus justo, mollis at vestibulum id, ullamcorper id nisi. Morbi consequat, est ac semper congue, odio velit tristique ligula, nec laoreet diam eros at odio. Sed sed risus ut lorem ultrices rhoncus at et tortor. Integer turpis nulla, volutpat et elementum id, rhoncus non arcu. Nam quis sem augue. Nunc tempor rutrum enim eget euismod.
		</div>
		<div class="ftwg wg3">
			In nunc turpis, suscipit sed tempor in, venenatis in ante. Aliquam iaculis tincidunt leo eget adipiscing. Phasellus metus justo, mollis at vestibulum id, ullamcorper id nisi. Morbi consequat, est ac semper congue, odio velit tristique ligula, nec laoreet diam eros at odio. Sed sed risus ut lorem ultrices rhoncus at et tortor. Integer turpis nulla, volutpat et elementum id, rhoncus non arcu. Nam quis sem augue. Nunc tempor rutrum enim eget euismod.
		</div>
		<div class="ftwg wg4">
			In nunc turpis, suscipit sed tempor in, venenatis in ante. Aliquam iaculis tincidunt leo eget adipiscing. Phasellus metus justo, mollis at vestibulum id, ullamcorper id nisi. Morbi consequat, est ac semper congue, odio velit tristique ligula, nec laoreet diam eros at odio. Sed sed risus ut lorem ultrices rhoncus at et tortor. Integer turpis nulla, volutpat et elementum id, rhoncus non arcu. Nam quis sem augue. Nunc tempor rutrum enim eget euismod.
		</div>
	</footer>
*/;?>
<?php
if ( get_post_meta($post->ID, 'footer_scripts', true) )
echo do_shortcode(get_post_meta($post->ID, 'footer_scripts', $single = true));
?>