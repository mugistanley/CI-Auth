<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
  {
		 parent::__construct(); 
		 $this->load->database();
		 $this->load->library('session');    
		 $this->load->helper('url');
		 $this->load->model('User_Model');
  }
	
	public function index()
	{
		$username = $this->User_Model->getModeUsername();
		$role = $this->User_Model->getModeUserRole();
	  $userId = $this->User_Model->getModeUserId();
	  $isAuth = $this->session->userdata('logged_in');
	  if(!isset($isAuth)||$isAuth=='')
	  {
		 $this->getCurrentRoute();
		 redirect('user/', 'refresh');
	  }
		else
		{
			$data['page'] = 'dashboard';
			$data['username'] = $username;
			$data['role'] = $role;
      $data['userId'] = $userId;
			$this->load->view('dashboard',$data);
		}
	}
	
	/*
	public function index()
	{
		 $this->getCurrentRoute();
		 redirect('user/', 'refresh');
	}
	*/
	
	public function getCurrentRoute()
  {	  
		if(isset($_SERVER['PATH_INFO']))
		{
			$previousRoute = $this->url_elements = explode('/', $_SERVER['PATH_INFO']); 			
	  $this->session->set_userdata('previous_route', $previousRoute);
		}
  }
	
}
