<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
 	{
 		parent::__construct();
		$this->load->model('employer','',TRUE);
		$this->load->model('jobseeker','',TRUE);
	}

	public function index()
	{
		$this->session->unset_userdata('signed_in');
		$this->load->view('login');
	}
	
	public function route_login()
	{
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('reg', 'Select', 'callback_validate_reg');
		$this->form_validation->set_rules('user', 'Username', 'trim|required|xss_clean');
  		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[32]');
		/*************************************/
		
		if($this->form_validation->run() == FALSE)		// If any rule is defaulting... reload form with error details
  		{
   			$this->load->view('login');
  		}
  		else 		// All rules followed...
  		{
  			$username = $this->input->post('user');
  			$password = $this->input->post('password');
  			$ltype = $this->input->post('reg');
  			
  			if ($ltype === 'employer')		// Employer Login
			{
				$result = $this->employer->Login($username,$password);
				if ($result != null)		// Login Successful Initialize session and Redirect to Dashboard
				{
					$userID = $result->idEmployer;
					$userTag = $result->first_name;
					$session_array = array('id' => $userID, 'username' => $userTag);
	       			$this->session->set_userdata('signed_in', $session_array);
					redirect('employers/dashboard', 'refresh');
				}
				else // Login Failed... Send info back to login page
				{
					$data['login_failed'] = 'true';
					$this->load->view('login', $data);
				}
			}
			else // Job Seeker Login 
			{ 
				$result = $this->jobseeker->Login($username,$password);
				if ($result !== -1)		// Login Successful Initialize session and Redirect to Dashboard
				{
					$userID = $result->idJobSeeker; // Fetch User's ID
					$userTag = $result->first_name; // Fetch User's Firstname
					$session_array = array('id' => $userID, 'username' => $userTag);
	       			$this->session->set_userdata('signed_in', $session_array);
					redirect('jobseekers/dashboard', 'refresh');
				}
				else
				{ // Login Failed... Send info back to login page
					$data['login_failed'] = 'true';
					$this->load->view('login', $data);
				}
			}
		}
	}

	function validate_reg($regValue)
	{
		// return ($regValue === 'You are')? false : true; // User did not select role
		
    	if($regValue === 'You are') // User did not select role
    	{
	        $this->form_validation->set_message('reg_validate', 'Please select a role before logging in.');
    	    return false;
    	}
    	else
    	{
        	return true;
    	}
	}
}