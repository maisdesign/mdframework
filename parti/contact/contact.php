<body>

<div align="left" style="padding:30px;">

<form action="#" name="MYFORM" id="MYFORM">

	<label>Name</label>
	<input name="name" size="30" type="text" id="name">
	<br clear="all" />
	<label>Email</label>
	<input name="email" size="30" type="text" id="email">
	<br clear="all" />
	<label>Message</label>
	<textarea id="message" name="message"></textarea>
	<br clear="all" />
	
	
	<div id="wrap" align="center">
		<img src="<?php echo get_template_directory_uri();?>/parti/contact/get_captcha.php" alt="" id="captcha" />
		
		<br clear="all" />
		<input name="code" type="text" id="code">
	</div>
	<img src="<?php echo get_template_directory_uri();?>/parti/contact/refresh.jpg" width="25" alt="" id="refresh" />
		
	<br clear="all" /><br clear="all" />
	<label>&nbsp;</label>
	<input value="Send" type="submit" id="Send">


</form>
	
</div>
</body>
</html>