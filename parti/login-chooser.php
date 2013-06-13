<?php 
	$selezione = of_get_option('select_sitewide_template', '' );
	$checkinglogin = of_get_option('loginstyle_checker','');
	switch ($checkinglogin){
		case 'none':
			echo '';
		break;
		case 'vanish': 
			echo '<header class="logintop">';
				get_template_part('parti/'.$selezione.'/head','login');
			echo '</header>';
		break;
		case 'static':
			get_template_part('parti/'.$selezione.'/head','login2');
		break;
		case 'ibrid':
			get_template_part('parti/'.$selezione.'/head','loginibrid');
		break;		
};?>