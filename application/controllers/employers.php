<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employers extends CI_Controller
{
	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('employer','',TRUE);
		$this->load->model('sector','',TRUE);
		$this->load->model('job_ad','',TRUE);
		$this->load->model('job_title','',TRUE);
		$this->load->library("pagination");
	}
	
	public function form()
	{
		$sectors = new sector();
		$data['sectors'] = $sectors->SelectAll();
		$this->load->view('registeremployer', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata('signed_in');
   		redirect('login', 'refresh');
	}
	
	public function register()
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
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('organisation', 'Organisation Name', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... reload form with error details
   			$this->load->view('registeremployer');
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
   			$result = $this->employer->Insert
   			(
   				$this->input->post('first_name'),
	 			$this->input->post('surname'),
	 			$this->input->post('organisation'),
	 			$this->input->post('password'),
	 			$this->input->post('sector'),
	 			$this->input->post('town'),
				$this->input->post('address_line1'),
	 			$this->input->post('address_line2'),
	 			$this->input->post('postode'),
	 			$this->input->post('email'),
	 			$this->input->post('phone'),
	 			$this->input->post('fax')
			);
			
			if ($result != -1)
			{
				// Registration Successful Redirect to Dashboard (Automatically log the user in)
				
				$thisUser = new Employer($result);		// Initialize User Object :D
				$userID = $thisUser->getId();			// Fetch User's ID
				$userTag = $thisUser->getFirst_name();  // Fetch User's Firstname
				
				// create new session with user's details
				$session_array = array('id' => $userID, 'username' => $userTag);
       			$this->session->set_userdata('signed_in', $session_array);
				
				redirect('employers/dashboard', 'refresh');
			}
			else  
			{ // Registration Failed... Send info back to login page
				$data['register_failed'] = 'true';
				$this->load->view('registeremployer', $data);
			}
  		}
 	}

	public function dashboard()
	{
		if($this->session->userdata('signed_in'))
	   	{
	   		
			$session_data = $this->session->userdata('signed_in');
	     	$data['employer'] = new employer($session_data['id']);
	     	$this->load->view('employer_search', $data);
	   	}
	   	else
	   	{
			//If no session, redirect to login page
	     	redirect('login', 'refresh');
	   	}
	}
	
	public function adverts()
	{
		if($this->session->userdata('signed_in'))
	   	{
	   		$sectors = new sector();
			$session_data = $this->session->userdata('signed_in');
	     	$data['employer'] = new employer($session_data['id']);
			$data['sectors'] = $sectors->SelectAll();
	     	$this->load->view('employer_advert', $data);
	   	}
	   	else
	   	{
			//If no session, redirect to login page
	     	redirect('login', 'refresh');
	   	}
	}
	
	public function createAdvert()
	{
		$sect = new sector();
		$sectors = $sect->SelectAll();
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('title', 'title', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('location', 'location', 'trim|required|min_length[1]|xss_clean');
  		$this->form_validation->set_rules('start_date', 'start date', 'trim|required|min_length[1]|xss_clean');
  		$this->form_validation->set_rules('end_date', 'end date', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('salary_value', 'salary amount', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('salary_type', 'salary type', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('contract', 'contract type', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('education', 'education', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('experience', 'experience', 'trim|required|min_length[1]|xss_clean');
		$this->form_validation->set_rules('job_description', 'job description', 'trim|required|min_length[1]|xss_clean');
		/*************************************/

  		if($this->form_validation->run() == FALSE)
  		{
  			// If any rule is defaulting... redirect to cv page
  			$session_data = $this->session->userdata('signed_in');
	     	$data['employer'] = new employer($session_data['id']);
			$data['sectors'] = $sectors;
			$data['message'] = "Please Ensure the form is filled properly";
		    $this->load->view('employer_advert', $data);
  		}
  		else
  		{ // No defaulting rule... Try to insert user's details into the database
  		
  		  	// First insert new job title and retrieve its ID for Job Advert insert operation
  		  	$job_id = $this->job_title->Insert
		  	(
		  		$this->input->post('title'),
		  		$this->input->post('user_sector')
		  	);
		  	//
		  
   			$result = $this->job_ad->Insert
   			(
   				$this->input->post('start_date'),
	 			$this->input->post('end_date'),
	 			$this->input->post('location'),
	 			$this->input->post('job_description'),
	 			$this->input->post('salary_value'),
	 			$this->input->post('salary_type'),
				$this->input->post('education'),
	 			$this->input->post('experience'),
	 			$this->input->post('contract'),
	 			$this->input->post('user_id'),
	 			$this->input->post($job_id)
			);
			
			if ($result != -1)
			{
				// Advert Created Successfully Redirect to Create Advert Page
				$session_data = $this->session->userdata('signed_in');
	     		$data['employer'] = new employer($session_data['id']);
				$data['sectors'] = $sectors;
				$data['message'] = "Operation Successful... Your Job Advert is Now Available to Jobseekers";
				$this->load->view('employer_advert', $data);
			}
			else  
			{ // Failed to Create Job Advert... Send info back to login page
				$session_data = $this->session->userdata('signed_in');
	     		$data['employer'] = new employer($session_data['id']);
				$data['sectors'] = $sectors;
				$data['message'] = "Unable to Create Advert at this time... Please Try Again Later";
				$this->load->view('employer_advert', $data);
			}
  		}
	}

	public function searchCV()
	{
		// initialise an array 
		$search_config = array();
        $search_config["base_url"] = base_url() . "employers/searchCV";
        $search_config["total_rows"] = $this->job_ad->record_count();
        $search_config["per_page"] = 15;
        $search_config["uri_segment"] = 3;
 
        $this->pagination->initialize($search_config);
 // public function fetch_jobs($limit, $start)
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->job_ad->fetch_jobs($search_config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 		
 		// load view with search results
        $this->load->view("searchresults", $data);
	}
}