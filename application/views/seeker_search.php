<!DOCTYPE html>
<html>
	<head>
		<title>Candidate Job Search</title>
		<link rel="stylesheet" href='<?= base_url().'css/style.css'; ?>' />
	</head>
	
	<body>
		<div class="wrapper">
			<span class="identity">Welcome <?php echo $jobseeker->getFirst_name(); ?></span>
			<ul id="tabs">
  				<li><a href="#" title="Candidate Job Search" class="selected"><strong> Search Jobs </strong></a></li>
  				<li><?php echo anchor('jobseekers/build_cv', '<strong> Cv Builder </strong>', 'title="Professional CV Builder"'); ?></li>
  				<li><?php echo anchor('jobseekers/logout', '<strong> Sign Out</strong>', 'title="Logout"'); ?></li>
			</ul>
			<div class="tabContent">
				<h2 align="center">Search Jobs on Zont</h2>
				<div class="container">
					<?php echo form_open('jobseekers/searchJobs'); ?>
						<div class="left" style="margin-left: 150px;">
							Keywords: <input style="width:180px;" type="text" name="keywords" placeholder=" e.g. Employer Name"/><br /><br />
							
							Job Title: <input style="width:180px;" type="text" name="job"/><br /><br />
							
							Location: <input style="width:180px;" type="text" name="location"/><br /><br />
							
							<div style="float: left;">Minimum Salary: </div>
							<div style="text-align: right;">
								<!-- <input style="width:65px;" type="text" name="min_salary" placeholder="Min" /> -->
								&pound; <input style="width:108px;" type="text"name="salary" placeholder=" " />
							</div>
							<span style="color:black;">
	   		   					<input type="radio" name="salary_type" value="Hourly">Hourly
               					<input type="radio" name="salary_type" value="Daily">Daily
               					<input type="radio" name="salary_type" value="Annually">Annually<br />
           					</span><br/>
            					   		
	   						<div style="float: left;">Contract Type: </div>
	   						<div style="text-align: right;">
	   						<span style="color:black;">
	   		   					<input type="radio" name="contract" value="Part-Time">Part-Time
				               	<input type="radio" name="contract" value="Temporary">Temporary
				               	<input type="radio" name="contract" value="Permanent">Permanent
				            </span></div>
						</div>
						<div class="middle">
							<span id="section">Educational level</span>
               				<select name="educational_level">
               					<option value="">Choose...</option>
			                 	<option value="Post Graduate">Postgraduate Qualification</option>
			                 	<option value="Bsc.">Bachelors degree</option>
			                 	<option value="Vocational">Vocational qualification</option>
			                 	<option value="High School">High/Secondary school</option>
							</select><br /><br />
							
							<span id="section">Years of work experience</span>
            	  			<span style="color:black;">
            	  				<input type="radio" name="experience" value="None">None<br />
								<input type="radio" name="experience" value="One Year">1 Year<br />
								<input type="radio" name="experience" value="Two Years">2 Years<br />
								<input type="radio" name="experience" value="Three Years">3 Years<br />
								<input type="radio" name="experience" value="Four Years">4 Years<br />
								<input type="radio" name="experience" value="Five Years">5 Years<br />
								<input type="radio" name="experience" value="Six Years">6 Years<br />
								<input type="radio" name="experience" value="Seven to Ten Years">7-10 Years<br />
								<input type="radio" name="experience" value="Eleven to Fifteen">11-15 Years<br />
								<input type="radio" name="experience" value="Above Fifteen">15+ Years<br />
							</span><br /><br />
						</div>
						<div class="right">
							
						</div>
						
						<div class="clear"></div>
						
						<div style="margin-right: 30px;" align="center">
							<input style="padding: 4px; width:100px;" type="reset" value="Clear"/>	
							<input style="padding: 4px; width:100px" name="search" type="submit" value="Search" />
						</div>
					</form>
				</div>
			</div>
			<a style="color: #dedbde; text-decoration: none;" href="javascript:window.history.go(-1);"><strong>Back</strong></a>
	  	</div>
	</body>