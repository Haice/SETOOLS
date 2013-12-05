<!DOCTYPE html>
<html>
	<head>
		<title>Professional CV Builder</title>
		<link rel="stylesheet" href='<?= base_url().'css/style.css'; ?>' />
		<link rel="stylesheet" href='<?= base_url().'css/jquery.dataTables.css'; ?>' />
		<link rel="stylesheet" href='<?= base_url().'css/bootstrap.css'; ?>' />
		<script src='<?= base_url().'js/jquery-1.10.2.min.js'; ?>'></script>
		<script src='<?= base_url().'js/jquery.dataTables.min.js'; ?>'></script>
		<script src='<?= base_url().'js/bootstrap.min.js'; ?>'></script>
		<script src='<?= base_url().'js/zont.js'; ?>'></script>
	</head>
	
	<body>
		<div class="wrapper">
			<span class="identity">Welcome <?php echo $jobseeker->getFirst_name(); ?></span>
			<ul id="tabs">
  				<li><?php echo anchor('jobseekers/dashboard', '<strong> Search Jobs </strong>', 'title="Candidate Job Search"'); ?></li>
  				<li><a href="#" title="Professional CV Builder" class="selected"><strong> Cv Builder </strong></a></li>
  				<li><?php echo anchor('jobseekers/logout', '<strong> Sign Out</strong>', 'title="Logout"'); ?></li>
			</ul>
			<div class="tabContent">
				<h3 align="center">Creating a Cv Couldn't be any easier... Just complete all the fields below and watch your CV take shape instantly!</h3>
				<div class="container">
					<div class="inner-wrapper">
							<div id="summary">
								<?php echo form_open('jobseekers/updateSummary'); ?>
								<span id="section">Profile Summary</span><br />
								<input type="hidden" name="user_id" value="<?php echo $jobseeker->getId() ?>" />
								<textarea name="summary" rows="7" cols="90" placeholder="Tell the employer who you are, what you have to offer and what it is that you want. Make your intentions clear but don't give away too much as you want them to read the rest of your CV. Write no more than 5 lines.
"><?php echo $jobseeker->getDescription(); ?></textarea>
							</div>
							<div align="right"><input style="margin: 5px; padding: 4px; width: 100px" type="submit" value="Save Changes" /></div>
							</form><br />
							
							<div id="experience" style="overflow: hidden;">
								<span id="section">Work Experience</span><br />
								<?php echo $this->load->view('modals/experience_form'); ?>
								<table class="datatable">
						  			<thead>
							  			<tr>
								  			<th>Organisation Name</th>
								  			<th>Position Held</th>
								  			<th width="5%">Actions</th>
							  			</tr>
						  			</thead>   
						  			<tbody>
						  				<?php
						  					foreach ($experience as $work)
						  					{
						  						echo"<tr>
								  					 	<td>$work->name_of_organisation</td>
								  						<td>$work->position_name</td>
								  						<td><input class='delExperience' style='padding: 4px;' id='$work->idWorkExperience' type='button' value='Delete' /></td>
							  						 </tr>
						  							";
											}
						  				?>
						  			</tbody>
					  			</table>
					  			<div align="right"><input style="margin: 5px; padding: 4px;" class="addExperience" type="button" value="Add Experience" /></div>
							</div><br />
							
							<div id="education" style="overflow: hidden;">
								<span id="section">Education</span><br />
								<?php echo $this->load->view('modals/education_form'); ?>
								<table class="datatable">
						  			<thead>
							  			<tr>
								  			<th>Institution Name</th>
								  			<th>Course Title</th>
								  			<th width="5%">Actions</th>
							  			</tr>
						  			</thead>   
						  			<tbody>
						  				<?php
						  					foreach ($education as $school)
						  					{
						  						echo"<tr>
								  					 	<td>$school->name_of_institution</td>
								  						<td>$school->course_name</td>
								  						<td><input class='delEducation' style='padding: 4px;' id='$school->idEducationalQualification' type='button' value='Delete' /></td>
							  						 </tr>
						  							";
											}
						  				?>
						  			</tbody>
					  			</table>
					  			<div align="right"><input style="margin: 5px; padding: 4px;" class="addEducation" type="button" value="Add Education" /></div>
							</div><br />
							
							<div id="qualifications" style="overflow: hidden;">
								<span id="section">Professional Qualifications</span><br />
								<?php echo $this->load->view('modals/qualification_form'); ?>
								<table class="datatable">
						  			<thead>
							  			<tr>
								  			<th>Qualification Name</th>
								  			<th>Awarding Body</th>
								  			<th width="5%">Actions</th>
							  			</tr>
						  			</thead>   
						  			<tbody>
						  				<?php
						  					foreach ($professional as $qualification)
						  					{
						  						echo"<tr>
								  					 	<td>$qualification->name</td>
								  						<td>$qualification->awarding_body</td>
								  						<td><input class='delQualification' style='padding: 4px;' id='$qualification->idProfessionalQualifications' type='button' value='Delete' /></td>
							  						 </tr>
						  							";
											}
						  				?>
						  			</tbody>
					  			</table>
					  			<div align="right"><input style="margin: 5px; padding: 4px;" class="addQualification" type="button" value="Add Qualification" /></div>
							</div><br/>
							
							<div id="skills" style="overflow: hidden;">
								<span id="section">Professional Skills</span><br />
								<?php echo $this->load->view('modals/skill_form'); ?>
								<table class="datatable">
						  			<thead>
							  			<tr>
								  			<th>Skill Name</th>
								  			<th>Level</th>
								  			<th width="5%">Actions</th>
							  			</tr>
						  			</thead>   
						  			<tbody>
						  				<?php
						  					foreach ($skills as $skill)
						  					{
						  						echo"<tr>
								  					 	<td>$skill->name</td>
								  						<td>$skill->level</td>
								  						<td><input class='delSkill' style='padding: 4px;' id='$skill->idSkill' type='button' value='Delete' /></td>
							  						 </tr>
						  							";
											}
						  				?>
						  			</tbody>
					  			</table>
					  			<div align="right"><input style="margin: 5px; padding: 4px;" class="addSkill" type="button" value="Add Skill" /></div>
							</div><br/>
							
							<div id="interests" style="overflow: hidden;">
								<?php echo form_open('jobseekers/updateInterests'); ?>
								<span id="section">Personal Interests</span><br />
								<input type="hidden" name="user_id" value="<?php echo $jobseeker->getId() ?>" />
								<textarea name="interests" rows="7" cols="90" placeholder="Tell the truth... Tell the employer what you do in your spare time, and remember to show your skills!!"><?php echo $jobseeker->getInterests(); ?></textarea>
							</div>
							<div align="right"><input style="margin: 5px; padding: 4px; width: 100px" type="submit" value="Save Changes" /></div>
							</form><br />
							
							<div id="referees" style="overflow: hidden;">
								<span id="section">Referee Details</span><br />
								<?php echo $this->load->view('modals/referee_form'); ?>
								<table class="datatable">
						  			<thead>
							  			<tr>
								  			<th>Referee Name</th>
								  			<th>Relationship</th>
								  			<th width="5%">Actions</th>
							  			</tr>
						  			</thead>
						  			<tbody>
						  				<?php
						  					foreach ($referees as $referee)
						  					{
						  						echo"<tr>
								  					 	<td>$referee->first_name $referee->last_name</td>
								  						<td>$referee->relationship</td>
								  						<td><input class='delReferee' style='padding: 4px;' id='$referee->idReferee' type='button' value='Delete' /></td>
							  						 </tr>
						  							";
											}
						  				?>
						  			</tbody>
					  			</table>
					  			<div align="right"><input style="margin: 5px; padding: 4px;" class="addReferee" type="button" value="Add Referee" /></div>
							</div><br />
							
							<div align="center">
								<p>Great, you're nearly done, just click on the 'Build My CV'<br /> button on the right to view your CV in a PDF format...</p>
									<input style="padding: 4px; width:100px" onclick="location.href='<?= site_url().'/buildCV'; ?>'" type="button" value="Build My CV" />
							</div>
					</div>
				</div>
			</div>
			<a style="color: #dedbde; text-decoration: none;" href="javascript:window.history.go(-1);"><strong>Back</strong></a>
	  	</div>
	  	<!-- Placed at the bottom to ensure page is loaded before message is displayed -->
	  	<?php
	  		if (isset($message))
			{
				echo "<script>
					  	alert('$message');
						document.location.href='".site_url()."/jobseekers/build_cv';
					  </script>";
			}
		?>
	</body>
	</html>