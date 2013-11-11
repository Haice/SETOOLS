<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Zont, a site dedicated to both job seekers and employers</title>
	
	<script>
		function register()
		{
			var id = document.getElementById("reg").value;
			
			if(id === "jobseeker")
			document.location.href='<?= site_url().'/job_seekers/registration_form'; ?>';
			
			else if(id === "employer")
			document.location.href='<?= site_url().'/employers/registration_form'; ?>';
			
			else alert("Please, register as job seeker or organisation/employer!");
		}
	</script>
	<style>
	
		.log_in
		{
		margin: auto;
		width: 400px;
		height: 350px;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		position:absolute;
		text-align:center;
		border-style: none;
		border-width: small;
		background-color:#4C6A77;
		color:#451989;
		}
		
		.submenu
		{
		margin: auto;
		width: 370px;
		height: 320px;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		position:absolute;
		text-align:center;
		border-style: none;
		border-width: small;
		background-color:#b8b6ba;
		color:#451989;
		font: 17px arial,sans-serif;
		}
		
		.user
		{
		margin: auto;
		width: 250px;
		height: 120px;
		left: 0;
		right: 0;
		position:absolute;
		text-align:center;
		border-style: none;
		border-width: small;
		border-radius: 10px;
		background-color:#4C6A77;
		color:#451989;
		font: 17px arial,sans-serif;
		}
		
		h1
		{
		text-decoration:underline;
		font: 30px arial,sans-serif;
		}
		
		.login_button
		{
		border-radius: 10px;		
		height: 30px;
		width: 100px;
		color:#451989;
		text-align:center;
		font: 17px arial,sans-serif;
		}
		
		p
		{
			display:inline;
		}
		
		.login_field
		{
			width:100px;
			display:inline;
		}
		
	</style>
</head>

<body>
	<div align="center"><?php echo validation_errors(); ?></div>
<div class="log_in">
	<div class="submenu">
		<div class="welcome">
			<h1>Welcome To Zont</h1>
			<p>Are you looking for a job?Are you <br /> headhunting? If so, this is the place for <br /> you!</p>
		</div>
   		<?php echo form_open('login/route_login'); ?>
		<div class="login_selection"> 
			<select id="reg" name="reg">
				<option value="You are">You are...</option>
				<option value="jobseeker">A Job Seeker</option>
				<option value="employer">An Employer</option>
			</select>
		</div>
	
	<br />
	
	    <div class="user">
          <p>Username:</p> <input class="login_field" type="text" name="user" autocomplete="off">
          <br/>
          <p>Password:</p> <input class="login_field" type="password" name="password" autocomplete="off">
          <br />
          <br />
          <input class ="login_button" type="button" onclick="register()" value="Register">
          <input class="login_button" type="submit" value="Login">
          </form>
        </div>
    </div>
</div>
 
</body>
</html>