<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 
class Dashboard extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('signed_in'))
   {
     $session_data = $this->session->userdata('signed_in');
     $data['username'] = $session_data['username'];
     $this->load->view('dashboard', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }
}

?>
