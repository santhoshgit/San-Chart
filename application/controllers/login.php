<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		$this->load->helper();
		$this->load->model('lemcon_model','lemcon',TRUE);
    }

   function index()
   {
	//This method will have the credentials validation
	$this->load->library('form_validation');
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_login_access');
		
	if($this->form_validation->run() == FALSE)
	{
	  //Field validation failed.
	  if($this->session->userdata('id'))
	  {
		 redirect('home', 'refresh');
	  }
	  else
	  {
		  $this->load->view('login');
	  }
	}
	else
	{
		 redirect('home', 'refresh');
	}
  }
  
  public function login_access($password)
 {
	$username = $this->input->post('username');
	$result = $this->lemcon->login_access($username, $password);
	if($result)
	{
	  $sess_array = array();
	  foreach($result as $row)
	  {
		$this->session->set_userdata('id', $row->user_id);
		$this->session->set_userdata('username', $row->username);
		$this->session->set_userdata('name', $row->name);
	  }
	  return true;
	}
	else
	{
	  $this->form_validation->set_message('login_access', 'Invalid username or password');
	  return false;
	}
  }
  
}

