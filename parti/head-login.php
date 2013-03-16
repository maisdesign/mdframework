<div class="slidingDiv">
	<div id="login-register-password">
		<?php global $user_ID, $user_identity; get_currentuserinfo(); if (!$user_ID) { ?>
			<ul class="tabs_login">
				<li class="active_login"><a href="#tab1_login"><?php _e('Login','mdframework');?></a></li>
				<li><a href="#tab2_login"><?php _e('Register','mdframework');?></a></li>
				<li><a href="#tab3_login"><?php _e('Forgot?','mdframework');?></a></li>
			</ul>
		<div class="tab_container_login">
			<div id="tab1_login" class="tab_content_login">
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
			</div>
			<div id="tab2_login" class="tab_content_login" style="display:none;">
				<h3><?php _e('Register for this site!','mdframework');?></h3>
				<p><?php _e('Sign up now for the good stuff.','mdframework');?></p>
				<form method="post" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login"><?php _e('Username','mdframework'); ?>: </label>
					<input type="text" name="user_login" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="101" />
				</div>
				<div class="password">
					<label for="user_email"><?php _e('Your Email','mdframework'); ?>: </label>
					<input type="text" name="user_email" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="25" id="user_email" tabindex="102" />
				</div>
				<div class="login_fields">
					<?php do_action('register_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Sign up!','mdframework'); ?>" class="user-submit" tabindex="103" />
					<?php $register = $_GET['register']; if($register == true) {;?> <?php _e('<p>Check your email for the password!</p>','mdframework'); } ?>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
			</div>
			<div id="tab3_login" class="tab_content_login" style="display:none;">
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
		</div>
	</div>
	<?php } else { // is logged in ?>
	<div class="sidebox">
		<h3><?php _e('Welcome,','mdframework');?> <?php echo $user_identity; ?></h3>
		<div class="usericon">
			<?php global $userdata; get_currentuserinfo(); echo get_avatar($userdata->ID, 60); ?>
		</div>
		<div class="userinfo">
			<p><?php _e('You&rsquo;re logged in as','mdframework');?> <strong><?php echo $user_identity; ?></strong></p>
			<p>
				<a href="<?php echo wp_logout_url('index.php'); ?>"><?php _e('Log out');?></a> | 
				<?php if (current_user_can('manage_options')) { 
					echo '<a href="' . admin_url() . '">' . _e('Admin','mdframework') . '</a>'; } else { 
					echo '<a href="' . admin_url() . 'profile.php">' . _e('Profile','mdframework') . '</a>'; } ?>
			</p>
		</div>
	</div>
	<?php } ?>
</div>
</div>