<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Zont, a site dedicated to both job seekers and employers</title>
	<link rel="stylesheet" href='<?= base_url().'css/logincss.css'; ?>' /> <!-- Link to css file-->
	
	<script>
		function register()
		{
			var id = document.getElementById("reg").value;
			
			if(id === "jobseeker")
				document.location.href='<?= site_url().'/jobseekers/form'; ?>'; // Redirect to Job Seeker Registration
			else if(id === "employer")
				document.location.href='<?= site_url().'/employers/form'; ?>'; // Redirect to Employer Registration
			else alert("Please, register as job seeker or organisation/employer!");
		}
		
		function logMeIn() // Checks That Role is Selected Before Submitting Form Data
		{
			var id = document.getElementById("reg").value;
			
			(id === "jobseeker" || id === "employer")? document.login_form.submit() : alert("Please, login as job seeker or organisation/employer!");
		}
	</script>
</head>

<body>
<div class="log_in">
	<div class="submenu">
		<div class="welcome">
			<h1>Welcome To Zont</h1>
			<p>Are you looking for a job?Are you <br /> headhunting? If so, this is the place for <br /> you!</p>
		</div>
		<?php echo form_open('login/route_login', 'name="login_form"'); ?>
		<div class="login_selection"> 
			<select id="reg" name="reg">
				<option value="">You are...</option>
				<option value="jobseeker">Looking for a job</option>
				<option value="employer">Looking to employ</option>
			</select>
		</div>
	<br />
	
	    <div class="user">
          <form name="input" action="" method="get">
          <p style="color: #f1f0ee;">Username: </p> <input class="login_field" type="text" name="user" autocomplete="off">
          <br/>
          <p style="color: #f1f0ee;">Password: </p> <input class="login_field" type="password" name="password" autocomplete="off">
          <br />
          <br />
          <input class ="login_button" type="button" onclick="register()" value="Register">
          <input class="login_button" type="button" onclick="logMeIn()" value="Login">
          </form>
        </div>
    </div>
</div>
<?php
	/** Display errors resulting from login attempt **/
		$val_error = preg_replace("/[\\n\\r]+/", " ", strip_tags(validation_errors()));
		
		if ($val_error != null)
			echo "<script> alert('$val_error'); </script>";
		
		if(isset($login_failed))
			echo "<script> alert('Invalid Username and or Password'); </script>";
?>
</body>
</html>