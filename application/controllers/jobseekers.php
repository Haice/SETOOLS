<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobseekers extends CI_Controller
{
	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('jobseeker','',TRUE);
		$this->load->model('work_experience','',TRUE);
		$this->load->model('educational_qualification','',TRUE);
		$this->load->model('professional_qualifications','',TRUE);
		$this->load->model('skill','',TRUE);
		$this->load->model('referee','',TRUE);
		$this->load->model('sector','',TRUE);
		$this->load->model('job_title','',TRUE);
	}


	
	public function form()		// Handles Registration Form
	{
		$this->load->view('registerseeker');
	}


	
	public function register()		// Handles Registration Process
 	{
 		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('confirm_email', 'email confirmation', 'trim|required|matches[email]');
  		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[32]');
  		$this->form_validation->set_rules('confirm_password', 'password confirmation', 'trim|required|matches[password]');
		$this->form_validation->set_rules('first_name', 'firstname', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('surname', 'surname', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('address_line1', 'first line of address', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('town', 'town', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('postode', 'postcode', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('phone', 'phone number', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... reload form with error details
   			$this->load->view('registerseeker');
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
   			$result = $this->jobseeker->Insert
   			(
				$this->input->post('email'), //username
	 			$this->input->post('password'), //password,
	 			$this->input->post('title'), //title,
	 			$this->input->post('first_name'), //first_name,
	 			$this->input->post('surname'), //last_name,
	 			$this->input->post('dob'), //date_of_birth,
	 			$this->input->post('address_line1'), //address1,
	 			$this->input->post('address_line2'), //address2,
	 			$this->input->post('town'), //town,
	 			$this->input->post('postode'), //postcode,
	 			$this->input->post('Country'), //country,
	 			$this->input->post('email'), //email,
	 			$this->input->post('phone'), //phone_number,
	 			$this->input->post('eligibility'), //eligibility_to_work,
	 			$this->input->post('summary')  // Description
			);
			
			if ($result != -1)
			{
				// Registration Successful Redirect to Dashboard (Automatically log the userin)
				$thisUser = new JobSeeker($result); // Initialize User Object :D
				$userID = $thisUser->getId(); // Fetch User's ID
				$userTag = $thisUser->getFirst_name(); // Fetch User's Firstname
				
				// create new session with user's details
				$session_array = array('id' => $userID, 'username' => $userTag);
       			$this->session->set_userdata('signed_in', $session_array);
				
				redirect('jobseekers/dashboard', 'refresh');
			}
			else  
			{ // Registration Failed... Send info back to login page
				$data['register_failed'] = 'true';
				$this->load->view('registerseeker', $data);
			}
  		}
 	}



	public function dashboard()		// Handles Job Seeker's Landing Page
	{
		if($this->session->userdata('signed_in'))
	   	{
			$session_data = $this->session->userdata('signed_in');
	     	$data['jobseeker'] = new jobseeker($session_data['id']);
	     	$this->load->view('seeker_search', $data);
	   	}
	   	else
	   	{
			//If no session, redirect to login page
	     	redirect('login', 'refresh');
	   	}
	}


	
	public function build_cv()		// Handles Cv Builder Page
	{
	 	if($this->session->userdata('signed_in'))
	   	{
			$data = $this->pre_load();
			
	     	$this->load->view('seeker_cv', $data);
	   	}
	   	else
	   	{
			//If no session, redirect to login page
	     	redirect('login', 'refresh');
	   	}
	}



	public function updateSummary()		// Cv Builder Page - Updates Profile Summary Update
	{
		$result = $this->jobseeker->UpdateDescription
		(
			$this->input->post('user_id'), //idJobSeeker
			$this->input->post('summary') //description
		);
		
		if ($result != -1)
		{
			// Summary Updated successfully Redirect to cvPage and Display Message
			$data = $this->pre_load();
			$data['message'] = "Summary Updated";
			
	     	$this->load->view('seeker_cv', $data);
		}
		else  
		{
			$data = $this->pre_load();
			$data['message'] = "Unable to Save Changes at this time";
			
	     	$this->load->view('seeker_cv', $data);
		}
	}
	
	

	public function addExperience()		// Cv Builder Page - Handles new Work Experience
	{
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('organisation_name', 'Organisation Name', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('date_from', 'Start Date', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('date_to', 'End Date', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('job_description', 'Job Description/Duties', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('organisation_location', 'Organisation Location', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('position_held', 'Position Held', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... redirect to cv page
   			$data = $this->pre_load();
			
			$data['message'] = "Please Ensure the form is filled properly";
			
		    $this->load->view('seeker_cv', $data);
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
   			$result = $this->work_experience->Insert
   			(
				$this->input->post('position_held'), //position_name
	 			$this->input->post('date_from'), //start_date
	 			$this->input->post('date_to'), //end_date
	 			$this->input->post('organisation_name'), //name_of_organisation
	 			$this->input->post('organisation_location'), //organisation_location,
	 			$this->input->post('job_description'), //key_duties,_name,
	 			$this->input->post('user_id'),  //idJobSeeker
	 			$this->input->post('job_id') //idJobTitle
			);
			
			if ($result != -1)
			{
				// Work Experience added successfully Redirect to cvPage and Display Message
				$data = $this->pre_load();
				$data['message'] = "Work Experience Saved Successfully";
				
		     	$this->load->view('seeker_cv', $data);
			}
			else  
			{
				$data = $this->pre_load();
				$data['message'] = "Unable to Save Changes at this time";
				
		     	$this->load->view('seeker_cv', $data);
			}
  		}
	}

	public function deleteExperience($id)		// Cv Builder Page - Handles Deletion of Work Experience
	{
		$result = $this->work_experience->Delete($id);
		$data = $this->pre_load();
		$data['message'] = "Work Experience Deleted Successfully";
		$this->load->view('seeker_cv', $data);
	}


	
	public function addEducation()		// Cv Builder Page - Handles new Educational Qualification
	{
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('university', 'University/School Name', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('end_date', 'End Date', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('course', 'Course of Study', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('qualification', 'Qualification Achieved', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('grade', 'Qualification Achieved', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... redirect to cv page
   			$data = $this->pre_load();
			
			$data['message'] = "Please Ensure the form is filled properly";
			
		    $this->load->view('seeker_cv', $data);
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
   			$result = $this->educational_qualification->Insert
   			(
				$this->input->post('qualification'), //type
	 			$this->input->post('course'), //course_name
	 			$this->input->post('university'), //name_of_institution
	 			$this->input->post('country'), //country_of_origin
	 			$this->input->post('start_date'), //start_date
	 			$this->input->post('end_date'), //end_date
	 			$this->input->post('grade'),  //result
	 			$this->input->post('user_id')  //idJobSeeker
			);
			
			if ($result != -1)
			{
				// Education Record added successfully Redirect to cvPage and Display Message
				$data = $this->pre_load();
				$data['message'] = "New Education Record Saved";
				
		     	$this->load->view('seeker_cv', $data);
			}
			else  
			{
				$data = $this->pre_load();
				$data['message'] = "Unable to Save Changes at this time";
				
		     	$this->load->view('seeker_cv', $data);
			}
  		}
	}

	public function deleteEducation($id)		// Cv Builder Page - Handles Deletion of Educational Qualification
	{
		$result = $this->educational_qualification->Delete($id);
		$data = $this->pre_load();
		$data['message'] = "Education Record Deleted Successfully";
		$this->load->view('seeker_cv', $data);
	}


	
	public function addQualification()		// Cv Builder Page - Handles new Professional Qualification
	{
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('qualification_name', 'Qualification Name', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('awarded_by', 'Awarding Body', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('date_obtained', 'Date Obtained', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('sector', 'Industry/Sector', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... redirect to cv page
   			$data = $this->pre_load();
			
			$data['message'] = "Please Ensure the form is filled properly";
			
		    $this->load->view('seeker_cv', $data);
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
   			$result = $this->professional_qualifications->Insert
   			(
				$this->input->post('qualification_name'), //type
	 			$this->input->post('awarded_by'), //awarding_body
	 			$this->input->post('date_obtained'), //year_obtained
	 			$this->input->post('result'), //result
	 			$this->input->post('sector'), //idSector
	 			$this->input->post('user_id')  //idJobSeeker
			);
			
			if ($result != -1)
			{
				// Qualification added successfully Redirect to cvPage and Display Message
				$data = $this->pre_load();
				$data['message'] = "Professional Qualification Saved";
				
		     	$this->load->view('seeker_cv', $data);
			}
			else  
			{
				$data = $this->pre_load();
				$data['message'] = "Unable to Save Changes at this time";
				
		     	$this->load->view('seeker_cv', $data);
			}
  		}
	}

	public function deleteQualification($id)		// Cv Builder Page - Handles Deletion of Professional Qualification
	{
		$result = $this->professional_qualifications->Delete($id);
		$data = $this->pre_load();
		$data['message'] = "Professional Qualification Deleted Successfully";
		$this->load->view('seeker_cv', $data);
	}


	
	public function addSkill()		// Cv Builder Page - Handles new Professional Skill
	{
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('qualification_name', 'Skill Name', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('level', 'Skill Level', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... redirect to cv page
   			$data = $this->pre_load();
			
			$data['message'] = "Please Ensure the form is filled properly";
			
		    $this->load->view('seeker_cv', $data);
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
   			$result = $this->skill->Insert
   			(
				$this->input->post('qualification_name'), //name
	 			$this->input->post('level'), //level
	 			$this->input->post('user_id')  //idJobSeeker
			);
			
			if ($result != -1)
			{
				// Qualification added successfully Redirect to cvPage and Display Message
				$data = $this->pre_load();
				$data['message'] = "Professional Skill Saved";
				
		     	$this->load->view('seeker_cv', $data);
			}
			else  
			{
				$data = $this->pre_load();
				$data['message'] = "Unable to Save Changes at this time";
				
		     	$this->load->view('seeker_cv', $data);
			}
  		}
	}

	public function deleteSkill($id)		// Cv Builder Page - Handles Deletion of Professional Skill
	{
		$result = $this->skill->Delete($id);
		$data = $this->pre_load();
		$data['message'] = "Professional Qualification Deleted Successfully";
		$this->load->view('seeker_cv', $data);
	}



	public function updateInterests()		// Cv Builder Page - Updates Interests
	{
		$result = $this->jobseeker->UpdateInterest
		(
			$this->input->post('user_id'), //idJobSeeker
			$this->input->post('interests') //description
		);
		
		if ($result != -1)
		{
			// Summary Updated successfully Redirect to cvPage and Display Message
			$data = $this->pre_load();
			$data['message'] = "Interests Updated";
			
	     	$this->load->view('seeker_cv', $data);
		}
		else  
		{
			$data = $this->pre_load();
			$data['message'] = "Unable to Save Changes at this time";
			
	     	$this->load->view('seeker_cv', $data);
		}
	}
	
	

	public function addReferee()		// Cv Builder Page - Handles new Referee
	{
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('referee_lastname', 'Last Name', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('referee_firstname', 'First Name', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('referee_email', 'Email', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('referee_phone', 'Phone Number', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('referee_relationship', 'Relationship', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... redirect to cv page
   			$data = $this->pre_load();
			
			$data['message'] = "Please Ensure the form is filled properly - Remember to Verify Email Address";
			
		    $this->load->view('seeker_cv', $data);
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
  			$permission = $this->input->post('referee_permission');
  			$permission == null? $permission = 0 : 1;
  			
   			$result = $this->referee->Insert
   			(
				$this->input->post('referee_title'), //title
	 			$this->input->post('referee_firstname'), //first_name
	 			$this->input->post('referee_lastname'), //last_name
	 			$this->input->post('referee_email'), //email
	 			$this->input->post('referee_phone'), //phone_number
	 			$this->input->post('referee_relationship'), //relationship
	 			$permission, //permission_to_contact
	 			$this->input->post('user_id')  //idJobSeeker
			);
			
			if ($result != -1)
			{
				// Qualification added successfully Redirect to cvPage and Display Message
				$data = $this->pre_load();
				$data['message'] = "Referee Details Saved";
				
		     	$this->load->view('seeker_cv', $data);
			}
			else  
			{
				$data = $this->pre_load();
				$data['message'] = "Unable to Save Changes at this time";
				
		     	$this->load->view('seeker_cv', $data);
			}
  		}
	}

	public function deleteReferee($id)		// Cv Builder Page - Handles Deletion of Referee
	{
		$result = $this->referee->Delete($id);
		$data = $this->pre_load();
		$data['message'] = "Referee Details Deleted Successfully";
		$this->load->view('seeker_cv', $data);
	}




	public function logout()		// Handles Logout
	{
		$this->session->unset_userdata('signed_in');
		redirect('login', 'refresh');
	}



	
	function pre_load()		// Cv Builder Page - Handles Job Seeker's Pre-Stored Data 
	{
		$session_data = $this->session->userdata('signed_in');
		$seeker_id = $session_data['id'];
     	$load['jobseeker'] = new jobseeker($seeker_id);
		
		$work = new work_experience();
		$load['experience'] = $work -> getAllWorkExperiencesFromIdJobSeeker($seeker_id);
		
		$education = new educational_qualification();
		$load['education'] = $education -> SelectAllFromIdJobSeeker($seeker_id);
		
		$qualification = new professional_qualifications();
		$load['professional'] = $qualification -> SelectAllFromIdJobSeeker($seeker_id);
		
		$skill = new skill();
		$load['skills'] = $skill -> getAllSkillsFromIdJobSeeker($seeker_id);
		
		$referee = new referee();
		$load['referees'] = $referee -> getAllRefereesFromIdJobSeeker($seeker_id);
		
		$sectors = new sector();
		$load['sectors'] = $sectors->SelectAll();
		
		$titles = new job_title();
		$load['jobs'] = $titles->getAllJobTitles();
		
		return $load;
	}
}