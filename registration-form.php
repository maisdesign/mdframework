<div id="register-form">  
			<h3><?php _e('Register for this site! Nuovo form','mdframework');?></h3>
			<p><?php _e('Sign up now for the good stuff.','mdframework');?></p>
            <form action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
				<div class="username">
					<label for="user_login"><?php _e('Username','mdframework'); ?>: </label>			
					<input type="text" name="user_login" value="Username" id="user_login" class="input" /> 
				</div>
				<div class="password">
					<label for="user_email"><?php _e('Your Email','mdframework'); ?>: </label>
					<input type="text" name="user_email" value="E-Mail" id="user_email" class="input"  /> 
				</div>
				<div class="login_fields">
					<?php do_action('register_form'); ?>  
					<input type="submit" value="<?php _e('Sign up!','mdframework'); ?>" id="register" />  
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
				</div>