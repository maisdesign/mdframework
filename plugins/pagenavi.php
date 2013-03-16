<?php
/*
* 
* Wordpress AJAX Pagination
*
* Original code by : Lester Chan
* 
* Code Rewritten/Modified by: Mohammed Ameenuddin Atif
* 
* License : same as for the wp-pagenavi plugin
*
*/

add_action('wp_head', 'ajaxevent');

function ajaxevent() {
?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/plugins/pagenavi.css" type="text/css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/plugins/jquery-1.3.2.min.js"></script>
<?php
	echo <<< ajax
	<script type="text/javascript">
function loadpage(page) {

jQuery.noConflict();

jQuery('#ajaxcontent').text('Loading...');	
	
jQuery.ajax({
		type: "GET",
		url: "/wp-ajax-post.php?p="+page,
		success: function(html){
     jQuery('#ajaxcontent').html(html);
   		}});
}
</script>
ajax;

}

function pagenavi($before = '', $after = '', $prelabel = '', $nxtlabel = '', $pages_to_show =
	5, $always_show = false) {
	global $request, $posts_per_page, $wpdb, $paged;
	if (empty($prelabel)) {
		$prelabel = '&laquo;';
	}
	if (empty($nxtlabel)) {
		$nxtlabel = '&raquo;';
	}
	$half_pages_to_show = round($pages_to_show / 2);


	$fromwhere = $matches[1];
	$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM wp_posts WHERE 1=1 AND wp_posts.post_type = 'post' AND (wp_posts.post_status = 'publish')");

	$max_page = ceil($numposts / $posts_per_page);
	if (empty($paged)) {
		$paged = 1;
	}
	if ($max_page > 1 || $always_show) {
		echo "$befor <div class=\"pagenavi\"><span class=\"utompage\">To Page:</span> <strong>";
		if ($paged >= ($pages_to_show - 1)) {
		}
		previous_posts_link($prelabel);
		for ($i = $paged - $half_pages_to_show; $i <= $paged + $half_pages_to_show; $i++) {
			if ($i >= 1 && $i <= $max_page) {
				if ($i == $paged) {
					echo "<span class=\"utompage\">$i</span>";
				} else {
					#. get_pagenum_link($i) .
					echo ' <a onclick="loadpage(' . $i . ')" href="#">' . $i . '</a> ';
				}
			}
		}
		next_posts_link($nxtlabel, $max_page);
		if (($paged + $half_pages_to_show) < ($max_page)) {
		}
		echo "</strong></div><div class\"clear\"></div>$after";
	}

}

?>