<!DOCTYPE html>
<html>
	<head>
		<title>Register as an employer</title>
		<link rel="stylesheet" href='<?= base_url().'css/desc.css'; ?>' />
	</head>
	<body>
		
		
     <div class="container">
	  <div class="inner_container">
	   	
		<div class="basic_details">
	        
	        <h1>Create Employer Account</h1>
		    <p>Please enter details you will be using to log in...</p>		
		    
		    <br />
		    <br />
			
			<?php echo validation_errors(); ?>
   			<?php echo form_open('employers/registration'); ?>
				
			<p>Email Address</p>
			<input type="text" name="email" autocomplete="off"/>
			<br />
			<br />
			
			<p>Confirm Email Address</p>
			<input type="text" name="confirm_email" autocomplete="off"/>
			<br />
			<br />
			
			<p>Password</p>
			<input type="password" name="password" autocomplete="off"/>
			<br />
			<br />
			
			<p>Confirm Password</p>
			<input type="password" name="confirm_password" autocomplete="off"/>
			<br />
			<br />
		
		</div>
		
		<hr />
		
		<div class="aditional_details">
			<p>Please enter some details about yourself</p>
			
			<br />
			<br />
			
			<p>Title</p>
			<select style="width:50px;" name="title">
				<option>Mr</option>
			    <option>Mrs</option>
			    <option>Miss</option>
			    <option>Dr</option>
			    <option>Other</option>	
		    </select>
		    
		    <br />
		    <br />
			
			<p>First Name</p>
			<input type="text" name="first_name" autocomplete="off"/>
			<br />
			<br />
			
			<p>Surname</p>
			<input type="text" name="surname" autocomplete="off"/>
			<br />
			<br />
			
			<p>Address Line1</p>
			<input type="text" name="address_line1" autocomplete="off"/>
			<br />
			<br />
		
			<p>Address Line2</p>
			<input type="text" name="address_line2" autocomplete="off"/>
			<br />
			<br />
			
			<p>Town</p>
			<input type="text" name="town" autocomplete="off"/>
			<br />
			<br />
			
			<p>Postcode</p>
			<input type="text" name="postode" autocomplete="off"/>
			<br />
			<br />
			
			<p>Phone number</p>
			<input type="text" name="phone" autocomplete="off"/>
			<br />
			<br />
			
			<p>Fax</p>
			<input type="text" name="fax" autocomplete="off"/>
			<br />
			<br />

            <p>Organisation name</p>
			<input type="text" name="organisation" autocomplete="off"/>
			<br />
			<br />
			
			<p>Organisation sector</p>
			<select  name="sector">
				<option>Chose a sector..</option>
				<option>Building</option>
			    <option>Aviation</option>
			    <option>Retail</option>
			    <option>Sales</option>
			    <option>Consultancy</option>
			    <option>Education</option>
			    <option>Engineering</option>
			    <option>Management</option>
			    <option>Marketing</option>
			    <option>Recruitment</option>
			    <option>Science</option>
			    <option>Other not listed</option>	
		    </select>
			
           <br />
           <br />
        
           <hr />
           
                <input style="width:100px" type="submit" value="Continue" />
                <input style="width:100px;" type="reset" value="Clear"/>
            
           </form>
         </div>		
		
	  </div>
	</div>
			
	</body>
</html>