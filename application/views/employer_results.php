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
            #button
            {
			    text-decoration: none;
			    background-color: #EEEEEE;
			    color: #333333;
			    margin-bottom: 10px;
			    padding: 2px 6px 2px 6px;
			    border-top: 1px solid #CCCCCC;
			    border-right: 1px solid #333333;
			    border-bottom: 1px solid #333333;
			    border-left: 1px solid #CCCCCC;
			}
          
           </style>
	</head>
	
	<body>
		<div class="wrapper">
			<span class="identity">Welcome <?php echo $employer->getFirst_name(); ?></span>
			<ul id="tabs">
  				<li><?php echo anchor('employers/dashboard', '<strong> Search Candidates </strong>', 'title="Employer Candidate Search"'); ?></li>
  				<li><?php echo anchor('employers/adverts', '<strong> Job Adverts </strong>', 'title="Manage Job Adverts"'); ?></li>
  				<li><?php echo anchor('employers/logout', '<strong> Sign Out</strong>', 'title="Logout"'); ?></li>
			</ul>
			<div class="tabContent">
				<h2 align="center">Below is the list of candidates that match your search criteria</h2>
				<div align="center" class="container">
					<div style="width: 600px; text-align: left;">				
						<dl>
		      				<?php
		      				if ($results !=null)
		      				{
				             	foreach($results as $data)
			      				{
			      					$eligible = $data->eligibility_to_work;
									if ($eligible == 1)
										$eligibility = "Yes";
									else
										$eligibility = "No";
				      				echo "<dt><strong>$data->title $data->first_name $data->last_name</strong></dt>";
									echo "<dd>Candidate's Summary: $data->description</dd>";
				      				echo "<dd>Location: $data->town, $data->country</dd>"; 
				      				echo "<dd>Eligibility To Work: $eligibility</dd>";
				      				echo "<dd><div align=right><a id='button' href='../../resumes/$data->idJobSeeker.pdf' download='$data->first_name-$data->last_name.pdf'>Download CV</a></div></dd>";
								}
							}
							else
							{
								echo "<dt><strong>No Matching Candidates Found</strong><dt>";
							}
							?>	
	            		</dl>
             <p align="center"><?php echo $links; ?></p>
             </div>
				</div>
			</div>
			<a style="color: #dedbde; text-decoration: none;" href="javascript:window.history.go(-1);"><strong>Back</strong></a>
	  	</div>
	</body>