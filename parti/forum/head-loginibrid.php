<section class="ibridtoplogin">
		<ol>
			<li class="ibridzone searchibrid">
				<?php get_search_form(); ?>
			</li>
			<li class="ibridzone logger">
				<h3><a href="#" class="tadaa"><?php if ( is_user_logged_in()){_e('Logout','mdframework');}else{_e('Login / Register','mdframework');};?></a></h3>
			</li>
			<?php if ( is_user_logged_in()){;?>
			<li class="ibridzone profilami">
				<h3><a href="<?php echo get_admin_url(); ?>profile.php" ><?php _e('Profile','mdframework');?></a></h3>
			</li>
			<?php };?>
		</ol>
</section><!--ibridtoplogin-->
<section class="magicamente" style="display:none">
	<div class="smorta"><a href="#">X</a></div>
	<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>
	<div id="tabs">
		<ul>
			<li>
				<a href="#tabs-1"><?php _e('Login','mdframework');?></a>
			</li>
			<li>
				<a href="#tabs-2"><?php _e('Register','mdframework');?></a>
			</li>
			<li>
				<a href="#tabs-3"><?php _e('Forgot?','mdframework');?></a>
			</li>
		</ul>
		<!-- Login tab start -->
			<div id="tabs-1">
				<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>
					<h3><?php _e('Success!','mdframework');?></h3>
					<p><?php _e('Check your email for the password and then return to log in.','mdframework');?></p>
				<?php } elseif ($reset == true) { ?>
					<h3><?php _e('Success!','mdframework');?></h3>
					<p><?php _e('Check your email to reset your password.','mdframework');?></p>
				<?php } else { ?>
					<h3><?php _e('Have an account?','mdframework');?></h3>
					<p><?php _e('Log in or sign up! It&rsquo;s fast &amp; <em>free!</em>','mdframework');?></p>
				<?php } ?>
				<form method="post" action="<?php echo home_url(); ?>/wp-login.php" class="wp-user-form">
					<div class="username">
						<label for="user_login"><?php _e('Username','mdframework'); ?>: </label>
						<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
					</div>
					<div class="password">
						<label for="user_pass"><?php _e('Password','mdframework'); ?>: </label>
						<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
					</div>
					<div class="login_fields">
						<div class="rememberme">
							<label for="rememberme">
								<input type="checkbox" name="rememberme" value="forever" checked="checked" id="rememberme" tabindex="13" /> <?php _e('Remember me','mdframework');?>
							</label>
						</div>
						<?php do_action('login_form'); ?>
						<input type="submit" name="user-submit" value="<?php _e('Login','mdframework'); ?>" tabindex="14" class="user-submit" />
						<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
						<input type="hidden" name="user-cookie" value="1" />
					</div>
				</form>
			</div><!-- <div id="tabs-1"> -->
			<!-- Registration Tab Start -->
			<div id="tabs-2">
				 <div id="register-form">  
					<h3><?php _e('Register for this site!','mdframework');?></h3>
					<p><?php _e('Sign up now for the good stuff.','mdframework');?></p>
					
					<form id="registrazione" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
						<div class="username">
							<label for="user_login"><?php _e('Username','mdframework'); ?>: </label>			
							<input type="text" name="user_login" value="Username" id="user_login" class="input vercingetorige" /> 
						</div>
						<div class="password">
							<label for="user_email"><?php _e('Your Email','mdframework'); ?>: </label>
							<input type="text" name="user_email" value="E-Mail" id="user_email" class="input"  /> 
						</div>
						<div class="login_fields">
							<?php do_action('register_form'); ?>  
							<?php $value='Ciao';setcookie ("testcookie", $value,time()+3600);?>
							<input type="submit" value="<?php _e('Sign up!','mdframework'); ?>" id="register" name="submit"/> 
						
							<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
						</div>
				</div>
			</form> 
			</div><!-- <div id="tabs-2"> -->
			<!-- Forgot Tab Start -->
			<div id="tabs-3">
				<h3><?php _e('Lose something?','mdframework');?></h3>
				<p><?php _e('Enter your username or email to reset your password.','mdframework');?></p>
				<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login" class="hide"><?php _e('Username or Email','mdframework'); ?>: </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
				</div>
				<div class="login_fields">
					<?php do_action('login_form', 'resetpass'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Reset my password','mdframework'); ?>" class="user-submit" tabindex="1002" />
					<?php $reset = $_GET['reset']; if($reset == true) { _e('<p>A message will be sent to your email address.</p>','mdframework'); } ?>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
			</div><!-- <div id="tabs-3"> -->
	
	<?php } else { /* is logged in */?>
	<div id="tabs-1">
		<h3><?php _e('Welcome,','mdframework');?> <?php echo $user_identity; ?></h3>
		<div class="usericon">
			<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>
		</div>
		<div class="userinfo">
			<p><?php _e('You&rsquo;re logged in as','mdframework');?> <strong><?php echo $user_identity; ?></strong></p>
			<p>
				<a href="<?php echo wp_logout_url('index.php'); ?>"><?php _e('Log out','mdframework');?></a> | 
				<?php $url = admin_url();
					if (current_user_can('manage_options')) { 
					echo '<a href="' . $url . '">' . __('Admin','mdframework') . '</a>'; } else { 
					echo '<a href="' . $url . 'profile.php">' . __('Profile','mdframework') . '</a>'; } ?>
			</p>
		</div>
	</div>
	<?php } ?>
</section><!--.magicamente-->