<!DOCTYPE html>
<html>
	<head>
		<title>Register as an employer</title>
		<link rel="stylesheet" href='<?= base_url().'css/desc.css'; ?>' />
	<style>
		    .container
		    {
		        min-height:750px;
		    }
			.inner_container
			{
		       min-height:700px;
			}
		</style>
	</head>
	<body>
		
		
     <div class="container">
	  <div class="inner_container">
		<div class="basic_details">
	        
	        <h1>Create Employer Account</h1>
		    <p>Please enter details you will be using to log in...</p>		
		    
		    <br />
		    <br />
			
   			<?php echo form_open('employers/register'); ?>
			<p>Email Address: <input type="text" name="email" autocomplete="off"/></p>
			<br />
			<br />
			
			<p>Confirm Email Address: <input type="text" name="confirm_email" autocomplete="off"/></p>
			<br />
			<br />
			
			<p>Password: <input type="password" name="password" autocomplete="off"/></p>
			<br />
			<br />
			
			<p>Confirm Password: <input type="password" name="confirm_password" autocomplete="off"/></p>
			<br />
			<br />
		</div>
		
		<hr />
		
		<div class="aditional_details">
			<p>Please enter some details about yourself</p>
			
			<br />
			<br />
			
			<p>Title: 
			<select style="width:50px;" name="title">
				<option>Mr</option>
			    <option>Mrs</option>
			    <option>Miss</option>
			    <option>Dr</option>
			    <option>Other</option>	
		    </select></p>
		    
		    <br />
		    <br />
			
			<p>First Name: <input type="text" name="first_name"/></p>
			<br />
			<br />
			
			<p>Surname: <input type="text" name="surname"/></p>
			<br />
			<br />
			
			<p>Address Line1: <input type="text" name="address_line1"/></p>
			<br />
			<br />
		
			<p>Address Line2: <input type="text" name="address_line2"/></p>
			<br />
			<br />
			
			<p>Town: <input type="text" name="town"/></p>
			<br />
			<br />
			
			<p>Postcode: <input type="text" name="postode"/></p>
			<br />
			<br />
			
			<p>Phone number: <input type="text" name="phone"/></p>
			<br />
			<br />
			
			<p>Fax: <input type="text" name="fax"/></p>
			<br />
			<br />

            <p>Organisation name: <input type="text" name="organisation"/></p>
			<br />
			<br />
			
			<p>Organisation sector
			<select name="sector">
				<option>Chose a sector..</option>
				<?php
					foreach ($sectors as $sector)
					{
						echo "<option value='$sector->idSector'>$sector->name</option>";
					}
				?>	
		    </select></p>
			
           <br />
           <br />
        
           <hr />
           
                <input style="width:100px" type="submit" value="Continue" />
                <input style="width:100px;" type="reset" value="Clear"/>
            
           </form>
         </div>		
		
	  </div>
	</div>
<?php
	/** Display errors resulting from login attempt **/
		$val_error = preg_replace("/[\\n\\r]+/", " ", strip_tags(validation_errors()));
		
		if ($val_error != null)
			echo "<script> alert('$val_error'); </script>";
		
		if(isset($register_failed))
			echo "<script> alert('An Error Occured... Please Try again Later'); </script>";
?>	
	</body>
</html>