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
		$this->load->view('login');
	}
	
	public function route_login()
	{
		// Load form validation library
 		$this->load->library('form_validation');
  		
  		/***** Set Form Validation Rules *****/
  		$this->form_validation->set_rules('reg', 'Select', 'callback_reg_validate');
		$this->form_validation->set_rules('user', 'Username', 'trim|required|xss_clean');
  		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[4]|max_length[32]');
		/*************************************/
		
		if($this->form_validation->run() == FALSE)
  		{ // If any rule is defaulting... reload form with error details
   			$this->load->view('login');
  		}
  		else
  		{ // All rules followed... pass login parameters to the relevant controller
  			$username = $this->input->post('user');
  			$password = $this->input->post('password');
  			$ltype = $this->input->post('reg');
  			
  			if ($ltype === 'employer')
			{ // Employer Login
				$result = $this->employer->Login($username,$password);
			
				if ($result != -1)
				{
					// Login Successful Redirect to Dashboard
					$userID = $result->idEmployer;		// Fetch User's ID
					$userTag = $result->first_name;		// Fetch User's Firstname
					
					// create new session with user's details
					$session_array = array('id' => $userID, 'username' => $userTag);
	       			$this->session->set_userdata('signed_in', $session_array);
					
					redirect('dashboard', 'refresh');
				}
				else
				{
					redirect('login', 'refresh');
				}
			}
			else 
			{ // Job Seeker Login
				$result = $this->jobseeker->Login($username,$password);
			
				if ($result !== -1)
				{
					// Login Successful Redirect to Dashboard
					$userID = $result->idJobSeeker; // Fetch User's ID
					$userTag = $result->first_name; // Fetch User's Firstname
					
					// create new session with user's details
					$session_array = array('id' => $userID, 'username' => $userTag);
	       			$this->session->set_userdata('signed_in', $session_array);
					
					redirect('dashboard', 'refresh');
				}
				else
				{
					redirect('login', 'refresh');
				}
			}
		}
	}

	function reg_validate($regValue)
	{
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