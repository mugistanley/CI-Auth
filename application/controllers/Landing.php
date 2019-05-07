<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	
	public function index()
	{
		$data['page'] = 'landing';
		$this->load->helper('url');
		$this->load->view('landing',$data);
	}
	
}
