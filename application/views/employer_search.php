<!DOCTYPE html>
<html>
	<head>
		<title>Search Candidates</title>
		<link rel="stylesheet" href='<?= base_url().'css/style.css'; ?>' />
	</head>
	
	<body>
		<div class="wrapper">
			<span class="identity">Welcome <?php echo $employer->getFirst_name(); ?> [<?php echo anchor('employers/logout', 'logout'); ?>]</span>
			<ul id="tabs">
  				<li><a class="selected" title="Employer Candidate Search" href="#"><strong> Search Candidates </strong></a></li>
  				<li><?php echo anchor('employers/adverts', '<strong> Job Adverts </strong>', 'title="Manage Job Adverts"'); ?></li>
			</ul>
			<div class="tabContent">
				<h2 align="center">Search Candidates on Zont</h2>
				<div class="container">
					<form name="input" action="" method="get">
						<div class="left">
							Keyword: <input type="text" name="keyword"/><br /><br />
							
							Job: <input type="text" name="job"/><br /><br />
							
							Location: <input type="text" name="location"/><br /><br />
							
							<div style="float: left;">Salary: </div>
							<div style="text-align: right;">
								<input style="width:65px;" type="text" name="min_salary" placeholder="Min" /> -
								<input style="width:65px;" type="text"name="max_salary" placeholder="Max" />
							</div>
							<span style="color:black;">
	   		   					<input type="checkbox" name="salary" value="Hourly">Hourly
               					<input type="checkbox" name="salary" value="Daily">Daily
               					<input type="checkbox" name="salary" value="Annually">Annually<br />
           					</span><br/>
            					   		
	   						<div style="float: left;">Contract Type: </div>
	   						<div style="text-align: right;">
	   						<span style="color:black;">
	   		   					<input type="checkbox" name="contract" value="Part_time">Part-time<br />
				               	<input type="checkbox" name="contract" value="Temporary">Temporary
				               	<input type="checkbox" name="contract" value="Permanent">Permanent
				            </span></div>
						</div>
						<div class="middle">
							<span id="section">Sector</span>
	   		   				<span style="color: black;">
					   		    <input type="checkbox" name="sector" value="Finance">Finance<br />
				                <input type="checkbox" name="sector" value="Aviation">Aviation<br /> 
				                <input type="checkbox" name="sector" value="Consultancy">Consultancy<br />
				                <input type="checkbox" name="sector" value="Education">Education<br /> 
				               	<input type="checkbox" name="sector" value="IT">Information Technology<br />
				               	<input type="checkbox" name="sector" value="Engineering">Engineering<br /> 
				               	<input type="checkbox" name="sector" value="Management">Management<br />
				                <input type="checkbox" name="sector" value="Marketing">Marketing<br /> 
				               	<input type="checkbox" name="sector" value="Recruitment">Recruitment<br />
				               	<input type="checkbox" name="sector" value="Retail">Retail<br /> 
				               	<input type="checkbox" name="sector" value="Sales">Sales<br />
				               	<input type="checkbox" name="sector" value="Science">Science<br /> 
							</span><br />
               				
               				<span id="section">Educational level</span>
               				<select name="Educational level">
               					<option value="">Choose...</option>
			                 	<option value="postgrad">Postgraduate Qualification</option>
			                 	<option value="bsc">Bachelors degree</option>
			                 	<option value="vocational">Vocational qualification</option>
			                 	<option value="high">High/Secondary school</option>
							</select>
						</div>
						<div class="right">
							<span id="section">Years of work experience</span>
            	  			<span style="color:black;">
            	  				<input type="radio" name="experience" value="none">None<br />
								<input type="radio" name="experience" value="one">1 Year<br />
								<input type="radio" name="experience" value="two">2 Years<br />
								<input type="radio" name="experience" value="three">3 Years<br />
								<input type="radio" name="experience" value="four">4 Years<br />
								<input type="radio" name="experience" value="five">5 Years<br />
								<input type="radio" name="experience" value="six">6 Years<br />
								<input type="radio" name="experience" value="seven">7-10 Years<br />
								<input type="radio" name="experience" value="eleven">11-15 Years<br />
								<input type="radio" name="experience" value="fifteen">15+ Years<br />
							</span><br />
						</div>
						
						<div class="clear"></div>
						
						<div style="margin-right: 30px;" align="right">
							<input style="padding: 4px; width:100px;" type="reset" value="Clear"/>	
							<input style="padding: 4px; width:100px" name="search" type="submit" value="Search" />
						</div>
					</form>
				</div>
			</div>
	  	</div>
	</body>