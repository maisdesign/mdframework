<?php
/*
Template Name: Registration Front-End
*/
get_header(); ?>
<div id="container">
<div id="contents">
	<div id="content">
	<?php do_action( 'bp_before_register_page' ) ?>
	<div class="widget">
	<form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">
	
	
		
			
			<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>
				
				<h2 class="pagetitle widgettitle"><?php _e( 'Sign Up', 'mdframework' ) ?></h2>
				<div class="widget-content">
				<?php do_action( 'template_notices' ) ?>
	
				<p><?php _e( 'Registering for this site is easy, just fill in the fields below and we\'ll get a new account set up for you in no time.', 'mdframework' ) ?></p>

				<?php do_action( 'bp_before_account_details_fields' ) ?>
			
				<div class="register-section" id="basic-details-section">
			
					<?php /***** Basic Account Details ******/ ?>
		
					<h3><?php _e( 'Account Details', 'mdframework' ) ?></h3>
					<div class="editfield">
					<?php do_action( 'bp_signup_username_errors' ) ?>
						<div class='label'>
							<label for="signup_username"><?php _e( 'Username', 'mdframework' ) ?> <?php _e( '(required)', 'mdframework' ) ?></label>
						</div>
						<div class="input">
							<input type="text" name="signup_username" id="signup_username" value="<?php bp_signup_username_value() ?>" />
						</div>
						<br class="clear" />
					</div>
					<div class="editfield alt">
					<?php do_action( 'bp_signup_email_errors' ) ?>
						<div class='label'>
							<label for="signup_email"><?php _e( 'Email Address', 'mdframework' ) ?> <?php _e( '(required)', 'mdframework' ) ?></label>
						</div>
						<div class="input">
							<input type="text" name="signup_email" id="signup_email" value="<?php bp_signup_email_value() ?>" />
						</div>
						<br class="clear" />
					</div>
					<div class="editfield">
					<?php do_action( 'bp_signup_password_errors' ) ?>
						<div class='label'>
							<label for="signup_password"><?php _e( 'Choose a Password', 'mdframework' ) ?> <?php _e( '(required)', 'mdframework' ) ?></label>
						</div>
						
						<div class='input'>
							<input type="password" name="signup_password" id="signup_password" value="" />
						</div>
						<br class="clear" />
					</div>
					<div class="editfield alt">
						<?php do_action( 'bp_signup_password_confirm_errors' ) ?>
						<div class="label">
							<label for="signup_password_confirm"><?php _e( 'Confirm Password', 'mdframework' ) ?> <?php _e( '(required)', 'mdframework' ) ?></label>
						</div>
						<div class="input">
							<input type="password" name="signup_password_confirm" id="signup_password_confirm" value="" />
						</div>
						<br class="clear" />
					</div>
					
				</div>
			
				<?php do_action( 'bp_after_account_details_fields' ) ?>

				<?php do_action( 'bp_before_blog_details_fields' ) ?>


				<?php /***** Extra Profile Details ******/ ?>

				<div class="register-section" id="profile-details-section">
		
					<h3><?php _e( 'Profile Details', 'mdframework' ) ?></h3>
		
					<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
					<?php if ( function_exists( 'bp_has_profile' ) ) : if ( bp_has_profile( 'profile_group_id=1' ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

					<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

						<div class="editfield">

							<?php if ( 'textbox' == bp_get_the_profile_field_type() ) : ?>
								<div class="label">
									<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'mdframework' ) ?><?php endif; ?></label>
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
								</div>
								<div class="input">
									<input type="text" name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>" value="<?php bp_the_profile_field_edit_value() ?>" />
								</div>
							<?php endif; ?>

							<?php if ( 'textarea' == bp_get_the_profile_field_type() ) : ?>
								<div class="label">
									<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'mdframework' ) ?><?php endif; ?></label>
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
								</div>
								<div class="input">
									<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_edit_value() ?></textarea>
								</div>
							<?php endif; ?>

							<?php if ( 'selectbox' == bp_get_the_profile_field_type() ) : ?>
								<div class="label">
									<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'mdframework' ) ?><?php endif; ?></label>
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
								</div>
								<div class="input">
									<select name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>">
										<?php bp_the_profile_field_options() ?>
									</select>
								</div>
							<?php endif; ?>

							<?php if ( 'multiselectbox' == bp_get_the_profile_field_type() ) : ?>
								<div class="label">
									<label for="<?php bp_the_profile_field_input_name() ?>"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'mdframework' ) ?><?php endif; ?></label>
								<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
								</div>
								<div class="input">
									<select name="<?php bp_the_profile_field_input_name() ?>" id="<?php bp_the_profile_field_input_name() ?>" multiple="multiple">
										<?php bp_the_profile_field_options() ?>
									</select>
								</div>
							<?php endif; ?>

							<?php if ( 'radio' == bp_get_the_profile_field_type() ) : ?>

								<div class="editfield">
									<div class="label"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'mdframework' ) ?><?php endif; ?>
									</div>
		
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
									<div class="input">
									<?php bp_the_profile_field_options() ?>
		
										<?php if ( !bp_get_the_profile_field_is_required() ) : ?>
											<a class="clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name() ?>' );"><?php _e( 'Clear', 'mdframework' ) ?></a>
										<?php endif; ?>
									</div>	
								</div>

							<?php endif; ?>	

							<?php if ( 'checkbox' == bp_get_the_profile_field_type() ) : ?>

								
									<div class="label">
											<?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'mdframework' ) ?><?php endif; ?>
									</div>
									<div class="input">
										<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
										<?php bp_the_profile_field_options() ?>
									</div>
								

							<?php endif; ?>					

							<?php if ( 'datebox' == bp_get_the_profile_field_type() ) : ?>

								<div class="label">
									<label for="<?php bp_the_profile_field_input_name() ?>_day"><?php bp_the_profile_field_name() ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '(required)', 'mdframework' ) ?><?php endif; ?></label>
									<?php do_action( 'bp_' . bp_get_the_profile_field_input_name() . '_errors' ) ?>
								</div>
								<div class="input">
									<select name="<?php bp_the_profile_field_input_name() ?>_day" id="<?php bp_the_profile_field_input_name() ?>_day">
										<?php bp_the_profile_field_options( 'type=day' ) ?>
									</select>
		
									<select name="<?php bp_the_profile_field_input_name() ?>_month" id="<?php bp_the_profile_field_input_name() ?>_month">
										<?php bp_the_profile_field_options( 'type=month' ) ?>
									</select>
		
									<select name="<?php bp_the_profile_field_input_name() ?>_year" id="<?php bp_the_profile_field_input_name() ?>_year">
										<?php bp_the_profile_field_options( 'type=year' ) ?>
									</select>								
								</div>
							
							<?php endif; ?>	

							<?php do_action( 'bp_custom_profile_edit_fields' ) ?>
							<br class="clear" />
							<p class="description"><?php bp_the_profile_field_description() ?></p>
		
						</div>

					<?php endwhile; ?>

					<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_group_field_ids() ?>" />
		
				</div>
			
				<?php endwhile; endif;?>
				
				<?php endif; ?>
	
				<?php do_action( 'bp_after_signup_profile_fields' ) ?>
			
				<?php if ( bp_get_blog_signup_allowed() ) : ?>

					<?php do_action( 'bp_before_blog_details_fields' ) ?>

					<?php /***** Blog Creation Details ******/ ?>

					<div class="register-section" id="blog-details-section">
				
						<h3><?php _e( 'Blog Details', 'mdframework' ) ?></h3>
						<div class="editfield">
							<div class="label">
								<input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> />
							</div>
							<div class="input">
								<?php _e( 'Yes, I\'d like to create a new blog', 'mdframework' ) ?>
							</div>
							<br class="clear" />
						</div>

						<div id="blog-details">
							<div class="editfield">
								<div class="label">
									<label for="signup_blog_url"><?php _e( 'Blog URL', 'mdframework' ) ?> <?php _e( '(required)', 'mdframework' ) ?></label>
									<?php do_action( 'bp_signup_blog_url_errors' ) ?>
								</div>
								<div class="input">
									<?php if ( 'yes' == VHOST ) : ?>
										http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value() ?>" /> .<?php echo str_replace( 'http://', '', site_url() ) ?>
									<?php else : ?>
										<?php echo site_url() ?>/ <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value() ?>" />				
									<?php endif; ?>
								</div>
								<br class="clear" />
							</div>	
							<div class="editfield">
								<div class="label">
									<label for="signup_blog_title"><?php _e( 'Blog Title', 'mdframework' ) ?> <?php _e( '(required)', 'mdframework' ) ?></label>
									<?php do_action( 'bp_signup_blog_title_errors' ) ?>
								</div>
								<div class="input">
									<input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value() ?>" />
								</div>
								<br class="clear" />
							</div>	
							<div class="editfield">
								<div class="label">
									<?php _e( 'I would like my blog to appear in search engines, and in public listings around this site', 'mdframework' ) ?>:
								</div>
								<?php do_action( 'bp_signup_blog_privacy_errors' ) ?>
								<div class="input">
									<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes','mdframework' ) ?></label>
									<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No','mdframework' ) ?></label>
								</div>
							   <br class="clear" />
							</div>
						</div>
			
					</div>
			
					<?php do_action( 'bp_after_blog_details_fields' ) ?>

				<?php endif; ?>
			
				<?php do_action( 'bp_before_registration_submit_buttons' ) ?>
	
				<p class="submit">
					<input type="submit" name="signup_submit" id="signup_submit" value="<?php _e( 'Complete Sign Up', 'mdframework' ) ?> &rarr;" />
				</p>

				<?php do_action( 'bp_after_registration_submit_buttons' ) ?>

				<?php wp_nonce_field( 'bp_new_signup' ) ?>
				</div>
			<?php endif; // request-details signup step ?>
			
			<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>
		
				<h2 class="widgettitle pagetitle"><?php _e( 'Sign Up Complete!', 'mdframework' ) ?></h2>
				<div class="widget-content">

				<?php do_action( 'template_notices' ) ?>
		
				<p><?php _e( 'You have successfully created your account! To begin using this site you will need to activate your account via the email we have just sent to your address.', 'mdframework' ) ?></p>

				<?php if ( !(int)get_site_option( 'bp-disable-avatar-uploads' ) ) : ?>
				
					<?php if ( 'upload-image' == bp_get_avatar_admin_step() ) : ?>
		
						<h3><?php _e( 'Your Current Avatar', 'mdframework' ) ?></h3>
						<p><?php _e( "We've fetched an avatar for your new account. If you'd like to change this, why not upload a new one while you wait for your activation email?", 'mdframework' ) ?></p>
					
						<div id="signup-avatar">
							<?php bp_signup_avatar() ?>
						</div>
				
						<p>
							<input type="file" name="file" id="file" /> 
							<input type="submit" name="upload" id="upload" value="<?php _e( 'Upload Image', 'mdframework' ) ?>" />
							<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
							<input type="hidden" name="signup_email" id="signup_email" value="<?php bp_signup_email_value() ?>" />
							<input type="hidden" name="signup_username" id="signup_username" value="<?php bp_signup_username_value() ?>" />
						</p>

						<?php wp_nonce_field( 'bp_avatar_upload' ) ?>
			
					<?php endif; ?>
				
					<?php if ( 'crop-image' == bp_get_avatar_admin_step() ) : ?>
		
						<h3><?php _e( 'Crop Your New Avatar', 'mdframework' ) ?></h3>
			
						<img src="<?php bp_avatar_to_crop() ?>" id="avatar-to-crop" class="avatar" alt="<?php _e( 'Avatar to crop', 'mdframework' ) ?>" />
			
						<div id="avatar-crop-pane">
							<img src="<?php bp_avatar_to_crop() ?>" id="avatar-crop-preview" class="avatar" alt="<?php _e( 'Avatar preview', 'mdframework' ) ?>" />
						</div>

						<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php _e( 'Crop Image', 'mdframework' ) ?>" />
					
						<input type="hidden" name="signup_email" id="signup_email" value="<?php bp_signup_email_value() ?>" />
						<input type="hidden" name="signup_username" id="signup_username" value="<?php bp_signup_username_value() ?>" />
						<input type="hidden" name="signup_avatar_dir" id="signup_avatar_dir" value="<?php bp_signup_avatar_dir_value() ?>" />
					
						<input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src() ?>" />
						<input type="hidden" id="x" name="x" />
						<input type="hidden" id="y" name="y" />
						<input type="hidden" id="w" name="w" />
						<input type="hidden" id="h" name="h" />

						<?php wp_nonce_field( 'bp_avatar_cropstore' ) ?>
			
					<?php endif; ?>
				
				<?php else : ?>
				
					<p><?php _e( "We've fetched an avatar for your new account. If you'd like to change this you can use the <a href=\"http://gravatar.com\">Gravatar</a> service to upload a new one.", 'mdframework' ) ?></p>
					
				<?php endif; ?>
			</div>
			<?php endif; // completed-confirmation signup step ?>
		
			<?php do_action( 'bp_custom_signup_steps' ) ?>
		
			</form>
	
	
	<?php do_action( 'bp_after_register_page' ) ?>
	</div>
	

	</div>
	<?php get_sidebar();?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
