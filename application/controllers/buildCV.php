<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('./mpdf/mpdf.php');
class buildCV extends CI_Controller
{

	public function index()
	{
		parent::__construct();
 		$this->load->model('jobseeker','',TRUE);
		$this->load->model('work_experience','',TRUE);
		$this->load->model('educational_qualification','',TRUE);
		$this->load->model('professional_qualifications','',TRUE);
		$this->load->model('skill','',TRUE);
		$this->load->model('referee','',TRUE);
		
		$mpdf=new mPDF();
		
		if($this->session->userdata('signed_in'))
	   	{
	   		$session_data = $this->session->userdata('signed_in');
	     	$jobseekerData = new jobseeker($session_data['id']);
	   	}
	   	else
	   	{
			//If no session, redirect to login page
	     	redirect('login', 'refresh');
	   	}
		
		/***** Personal Details *****/
		$id = $jobseekerData->getId();
		$firstname = $jobseekerData->getFirst_name();
		$lastname = $jobseekerData->getLast_name();
		$email = $jobseekerData->getEmail();
		$phone = $jobseekerData->getPhone_number();
		$summary = $jobseekerData->getDescription();
		$interests = $jobseekerData->getInterests();
		/************************/
		
		/***** Educational Details *****/
		$education = new educational_qualification();
		$educationalData = $education -> SelectAllFromIdJobSeeker($id);
		/*******************************/
		
		/***** Experience Details *****/
		$experience = new work_experience();
		$experienceData = $experience -> getAllWorkExperiencesFromIdJobSeeker($id);
		/******************************/
		
		/***** Professional Qualification Details *****/
		$qualification = new professional_qualifications();
		$qualificationData = $qualification -> SelectAllFromIdJobSeeker($id);
		/******************************/
		
		/***** Skills Details *****/
		$skill = new skill();
		$skillData = $skill -> getAllSkillsFromIdJobSeeker($id);
		/******************************/
		
		/***** Referee Details *****/
		$referee = new referee();
		$refereeData = $referee -> getAllRefereesFromIdJobSeeker($id);
		/******************************/
		
		/***** Generate Cv Data *****/
		$styleData = "abbr,address,article,aside,audio,b,blockquote,body,canvas,caption,cite,code,dd,del,details,dfn,div,dl,dt,em,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,li,mark,menu,nav,object,ol,p,pre,q,samp,section,small,span,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,ul,var,video{border:0;font:inherit;font-size:100%;margin:0;padding:0;vertical-align:baseline}article{display:block}body{font-family:'Lucida Grande',Verdana,Arial,Sans-Serif;font-size:14px;color:#451989}.clear{clear:both}p{font-size:1em;line-height:1.4em;margin-bottom:20px;color:#000}#cv{width:100%;background:#fff;margin:30px auto}.mainDetails{padding:25px 35px;border-bottom:2px solid #451989;background:#ededed}#name h1{font-size:2.5em;font-weight:700;font-family:Rokkitt,Helvetica,Arial,sans-serif;margin-bottom:-6px}#name h2{font-size:2em;margin-left:2px;font-family:Rokkitt,Helvetica,Arial,sans-serif}#mainArea{padding:0 40px}#name{float:left}section{border-top:1px solid #dedede;padding:20px 0 0}section:first-child{border-top:0}section:last-child{padding:20px 0 10px}.sectionTitle{float:left;width:25%}.sectionContent{float:right;width:72.5%}.sectionTitle h1{font-family:Rokkitt,Helvetica,Arial,sans-serif;font-style:italic;font-size:1.5em;color:#451989}.sectionContent h2{font-family:Rokkitt,Helvetica,Arial,sans-serif;font-size:1.5em;margin-bottom:-2px}.subDetails{font-size:.8em;font-style:italic;margin-bottom:3px}";
		// Style Data Minified using Online CSS Minifier Tool available at http://cssminifier.com/
		
		$cvData = "<!DOCTYPE html>
		<html>
		<head>
		<title>&nbsp;</title>
		<style>$styleData</style>
		</head>
		<body>
		";
		$mpdf->WriteHTML($cvData);
		
		$cvData = "<div id='cv'>
			<div class='mainDetails'>
				<div id='name'>
					<h1>$firstname $lastname</h1>
					<h4>$email</h4>
					<h4>$phone</h4>
				</div>
				<div class='clear'></div>
			</div>
			";
		$mpdf->WriteHTML($cvData);
		
		if(!empty($summary))
		{
			$cvData = "<div id='mainArea'>
					<section>
							<div class='sectionTitle'>
								<h1>Profile Summary</h1>
							</div>
							
							<div class='sectionContent'>
								<article>
									<p>$summary</p>
								</article>
							</div>
						<div class='clear'></div>
					</section>
					";
			$mpdf->WriteHTML($cvData);
		}
		
		if(!empty($educationalData))
		{
			$cvData = "<section>
						<div class='sectionTitle'>
							<h1>Education</h1>
						</div>
						
						<div class='sectionContent'>";
						// Insert Education History
						foreach ($educationalData as $schoolDetails)
						{
							$cvData .= "<article>
											<h2>$schoolDetails->name_of_institution, $schoolDetails->country_of_origin</h2>
											<p class='subDetails'>$schoolDetails->start_date - $schoolDetails->end_date</p>
											<p>$schoolDetails->type $schoolDetails->course_name [$schoolDetails->result]</p>
										</article>
										
									   ";
						}
						$cvData .="						
						</div>
						<div class='clear'></div>
					</section>
					";
			$mpdf->WriteHTML($cvData);
		}
		
		if(!empty($experienceData))
		{
			$cvData = "<section>
						<div class='sectionTitle'>
							<h1>Work Experience</h1>
						</div>
						
						<div class='sectionContent'>";
						// Insert Work Experience
						foreach ($experienceData as $workDetails)
						{
							$cvData .= "<article>
											<h2>$workDetails->position_name at $workDetails->name_of_organisation</h2>
											<p class='subDetails'>$workDetails->start_date - $workDetails->end_date</p>
											<p>$workDetails->key_duties</p>
										</article>
									   ";
						}
						$cvData .="
						</div>
						<div class='clear'></div>
					</section>
					";
			$mpdf->WriteHTML($cvData);
		}
		
		if(!empty($qualificationData))
		{
			$cvData = "<section>
						<div class='sectionTitle'>
							<h1>Professional Qualifications</h1>
						</div>
						
						<div class='sectionContent'>";
						// Insert Professional Qualifications
						foreach ($qualificationData as $qualificationDetails)
						{
							$cvData .= "<article>
											<h2>$qualificationDetails->name</h2>
											<p class='subDetails'>$qualificationDetails->awarding_body ($qualificationDetails->year_obtained)</p>
											<p>[$qualificationDetails->result]</p>
										</article>
									   ";
						}
						$cvData .="
						</div>
						<div class='clear'></div>
					</section>
					";
			$mpdf->WriteHTML($cvData);
		}
		
		if(!empty($skillData))
		{
			$cvData = "<section>
						<div class='sectionTitle'>
							<h1>Professional Skills</h1>
						</div>
						
						<div class='sectionContent'>
							<article>
								<p class='subDetails'>";
								// Insert Professional Skills
								foreach ($skillData as $skillDetails)
								{
									$cvData .= "$skillDetails->name [$skillDetails->level]; ";
								}
						$cvData .="
								</p>
							</article>
						</div>
						<div class='clear'></div>
					</section>
					";
			$mpdf->WriteHTML($cvData);
		}
		
		if(!empty($interests))
		{
			$cvData = "<section>
						<article>
							<div class='sectionTitle'>
								<h1>Interests</h1>
							</div>
							
							<div class='sectionContent'>
							<!-- Insert Personal Interests -->
								<p>$interests</p>
							</div>
						</article>
						<div class='clear'></div>
					</section>
					";
			$mpdf->WriteHTML($cvData);
		}
		
		if(!empty($refereeData))
		{
		$cvData = "<section>
					<div class='sectionTitle'>
						<h1>Referees</h1>
					</div>
					
					<div class='sectionContent'>";
					// Insert Referee Details
					foreach ($refereeData as $refereeDetails)
					{
						$permission = $refereeDetails->permission_to_contact == 1? "Yes":"No";
						$cvData .= "<article>
										<h2>$refereeDetails->first_name $refereeDetails->last_name</h2>
										<p class='subDetails'>$refereeDetails->email; $refereeDetails->phone_number</p>
										<p>Relationship: $refereeDetails->relationship<br />Permission to Contact: $permission</p>
									</article>
								   ";
					}
					$cvData .="
					</div>
					<div class='clear'></div>
				</section>
				";
			$mpdf->WriteHTML($cvData);
		}
			$cvData = "</div>
		</div>
		</body>
		</html>";
		$mpdf->WriteHTML($cvData);
		/***********************/			
		
		/***** Save a copy of the PDF file to the server, Ask User to Download their Computer and Redirect Back to Cv Builer Page *****/
		$fileLocation = "./resumes/".$id.".pdf";
		$mpdf->Output($fileLocation, 'F');
		
		$downloadData =  file_get_contents($fileLocation);
		force_download($firstname."_".$lastname."_CV.pdf", $downloadData);
		
		redirect('jobseekers/build_cv', 'refresh');
		/****************************************************************************/
	}
}