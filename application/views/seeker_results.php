<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
		<link rel="stylesheet" href='<?= base_url().'css/style.css'; ?>' />
		<style>
            dl
            {
                border-style:ridge;
                border-width: 0px;	
            }
            dt
            {
            	background-color:#aaaaaa;
            	text-align:center;
            	padding: 5px;
            	text-align: center;
            }
            input
            {
            width:60px;	
            }
          
           </style>
	</head>
	
	<body>
		<div class="wrapper">
			<span class="identity">Welcome <?php echo $jobseeker->getFirst_name(); ?></span>
			<ul id="tabs">
  				<li><?php echo anchor('jobseekers/dashboard', '<strong> Search Jobs </strong>', 'title="Candidate Job Search"'); ?></li>
  				<li><?php echo anchor('jobseekers/build_cv', '<strong> Cv Builder </strong>', 'title="Professional CV Builder"'); ?></li>
  				<li><?php echo anchor('jobseekers/logout', '<strong> Sign Out</strong>', 'title="Logout"'); ?></li>
			</ul>
			<div class="tabContent">
				<h2 align="center">Below is the list of ads that match your search criteria</h2>
				<div align="center" class="container">
					<div style="width: 600px; text-align: left;">				
						<dl>
		      				<?php
		      				if ($results !=null)
		      				{
				             	foreach($results as $data)
			      				{
				      				echo "<dt><strong>$data->name</strong></dt>";
				      				echo "<dd>Salary: $data->salary_amount $data->salary_type</dd>"; 
				      				echo "<dd>Location: $data->location</dd>"; 
				      				echo "<dd>Contract Type: $data->contract_type</dd>"; 
				      				echo "<dd>Date: $data->start_date - $data->end_date</dd>"; 
				      				echo "<dd>Educational Level Required: $data->educational_level</dd>"; 
				      				echo "<dd>Minimum Experience: $data->years_of_experience</dd>"; 
				      				echo "<dd>Description: $data->description</dd>"; 
				      				echo "<dd><div align=right><input style='padding: 5px;' type='button' onclick='demonstrate()' value='Apply' /></div></dd>";
								}
							}
							else
							{
								echo "<dt><strong>No Matching Jobs Found</strong><dt>";
							}
							?>	
	            		</dl>
             <p align="center"><?php echo $links; ?></p>
             </div>
				</div>
			</div>
			<a style="color: #dedbde; text-decoration: none;" href="javascript:window.history.go(-1);"><strong>Back</strong></a>
	  	</div>
	  	<script>
	  		function demonstrate()
	  		{
	  			alert("Your details has been sent to the employer. Good luck!");
	  		}
	  	</script>
	</body>