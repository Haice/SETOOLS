<!DOCTYPE html>
<html>
	<head>
		<title>Create Job Adverts</title>
		<link rel="stylesheet" href='<?= base_url().'css/style.css'; ?>' />
	</head>
	
	<body>
		<div class="wrapper">
			<span class="identity">Welcome <?php echo $employer->getFirst_name(); ?> [<?php echo anchor('employers/logout', 'logout'); ?>]</span>
			<ul id="tabs">
  				<li><?php echo anchor('employers/dashboard', '<strong> Search Candidates </strong>', 'title="Employer Candidate Search"'); ?></li>
  				<li><a class="selected" title="Manage Job Adverts" href="#"><strong> Job Adverts </strong></a></li>
			</ul>
			<div class="tabContent">
				<h2 align="center">Create Job Adverts</h2>
				<div class="container">
					<?php echo form_open('employers/createAdvert'); ?>
						<div class="left" style="margin: 0 50px 0 0;">
							<div style="float: left;">
							Job Title: <input style="width: 300px;" type="text" name="title"/><br /><br />
							Location: <input style="width: 300px;" type="text" name="location" placeholder="E.g. Surbiton, Surrey UK"/>
							</div>
							<div class="clear"><br /></div>
							<div style="float: left;">
							Start Date: <input type="date" name="start_date" placeholder="MM/DD/YYYY" />
							</div>
							<div class="clear"><br /></div>
							
							<div style="float: left;">
							End Date: <input type="date" name="end_date" placeholder="MM/DD/YYYY" />
							</div>
							<div class="clear"><br /></div>
							
							<div style="float: left;">
							Salary: <input style="width: 100px;" type="text" name="salary_value"/>
							<span style="color:black;">
	   		   					<input type="radio" name="salary_type" value="Hourly">Hourly
               					<input type="radio" name="salary_type" value="Daily">Daily
               					<input type="radio" name="salary_type" value="Annually">Annually<br />
           					</span></div>
							<div class="clear"><br /></div>
							
							<div style="float: left;">
							Contract Type:
							<span style="color:black;">
	   		   					<input type="radio" name="contract" value="Part_time">Part-time
				               	<input type="radio" name="contract" value="Temporary">Temporary
				               	<input type="radio" name="contract" value="Permanent">Permanent
				            </span></div>
							<div class="clear"><br /></div>
						</div>
						<div class="middle">
							Sector:<br />
							<span style="color: black;">
								<?php
									foreach ($sectors as $sector)
									{
										echo "<input type='radio' name='sector' value='$sector->idSector'>$sector->name<br />
								";
									}
								?>
	   		   				</span><br />
						</div>
						<div class="left" style="margin: 0; text-align: left;">
							<span id="section">Educational level</span>
               				<select name="education">
               					<option value="">Choose...</option>
			                 	<option value="Post Graduate">Postgraduate Qualification</option>
			                 	<option value="Bsc.">Bachelors degree</option>
			                 	<option value="Vocational">Vocational qualification</option>
			                 	<option value="High School">High/Secondary school</option>
							</select>
							<br /><br />
							<span id="section">Minimum Experience</span>
            	  			<span style="color:black;">
            	  				<input type="radio" name="experience" value="">None<br />
								<input type="radio" name="experience" value="1">1 Year<br />
								<input type="radio" name="experience" value="2">2 Years<br />
								<input type="radio" name="experience" value="3">3 Years<br />
								<input type="radio" name="experience" value="4">4 Years<br />
								<input type="radio" name="experience" value="5">5 Years<br />
								<input type="radio" name="experience" value="6">6 Years<br />
								<input type="radio" name="experience" value="7">7 Years<br />
								<input type="radio" name="experience" value="8">8 Years<br />
								<input type="radio" name="experience" value="9">9 Years<br />
								<input type="radio" name="experience" value="10">10+ Years
							</span>
						</div>
						<div class="clear"></div>
						<br />
						<div align="center">
						<span class="clear" id="section">Job Description</span>
						<textarea name="job_description" rows="10" cols="110" placeholder="Brief description of the duties and responsibilities expected of the applicant... Additional requirements and person specifications can also be included here."></textarea>
						</div><br />
						<input type="hidden" name="user_id" value="<?php echo $employer->getId() ?>" />
						<input type="hidden" name="user_sector" value="<?php echo $employer->getSector() ?>" />
						<div style="margin-right: 30px;" align="right">
							<input style="padding: 4px; width:100px;" type="reset" value="Clear"/>	
							<input style="padding: 4px; width:100px" name="search" type="submit" value="Create" />
						</div>
					</form>
				</div>
			</div>
	  	</div>
	  	<?php
	  		if (isset($message))
			{
				echo "<script>
					  	alert('$message');
					  </script>";
			}
		?>
	</body>