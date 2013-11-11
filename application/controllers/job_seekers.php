<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_seekers extends CI_Controller
{
	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('jobseeker','',TRUE);
	}
	
	public function registration_form()
	{
		$this->load->view('registerseeker');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('signed_in');
   		session_destroy();
   		redirect('login', 'refresh');
	}
	
	public function registration()
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
	 			'0900099', // $this->input->post('user_name'), //phone_number,
	 			'1', // $this->input->post('user_name'), //eligibility_to_work,
	 			'Premium Zont Job Seeker Profile' // $this->input->post('user_name')  //description
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
				
				redirect('dashboard', 'refresh');
			}
  		}
 	}	
}