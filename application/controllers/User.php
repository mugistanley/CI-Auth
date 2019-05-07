<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends CI_Controller 
{
   
    function __construct()
    {
        parent::__construct(); 
				$this->load->library('session');
			  $this->load->helper('url');
				$this->load->library('form_validation');				
				$this->load->model('User_Model');		
    }
 
    public function index()
    {
      $isAuth=$this->session->userdata('logged_in');
			if(!isset($isAuth)||$isAuth=='')
			{
			  if($this->session->userdata('previous_route'))
			  {
			     $route = array_filter($this->session->userdata['previous_route']);
			  }
			  else
			  {
			    $route = 0;
			  }
			  
				$prevRoute = "";
				if($route!=0)
				{
			    		foreach($route as $path)
					{
					 $prevRoute.='/'.$path;
					}
					$prevRoute = ltrim ($prevRoute, '/');
				}
				else
				{
				  $prevRoute = "none";
				}
				$this->session->set_userdata('redirect_route', $prevRoute);
				//print_r($this->session->userdata['previous_route']);
				redirect('user/login/');
			}
			else
			{
			    $previousRoute = $this->session->userdata['redirect_route'];
				if($previousRoute!="none")
				{
					redirect($previousRoute);
				}
				else
				{
				$data['page'] = "user";
                 
				$this->load->view('user/cpanel',$data);
				}
			}
    }
		
		public function login()
    {       
			$this->load->view('user/login');				        
    }
		
		function init()
		{
			$this ->form_validation-> set_rules('username', 'Username', 'trim|required');
			$this ->form_validation-> set_rules('password', 'Password', 'trim|required|callback_checkDatabase');
	
			if ($this ->form_validation->run() == FALSE) 
			{				
				$this->session->set_flashdata('errors', validation_errors());
				redirect('user/login/');	
			} 
			else 
			{
				if(isset($this->session->userdata['redirect_route']) && $this->session->userdata['redirect_route']!='')
                {
                   $previousRoute = $this->session->userdata['redirect_route'];
                   redirect($previousRoute);
                }
                else
                {
                    redirect('dashboard/', 'refresh');	
                }
                             
			}
		}
		
		function checkDatabase() 
		{
				//query the database
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				
				$result = $this ->User_Model->login($username, $password);
				if($result) 
				{
					$id = '';
					$username = '';
					$role = '';
					foreach($result as $key=>$value)
					{
						 if($key=='id')
						 {
							 $id = $value;
						 }
						 if($key=='username')
						 {
							 $username = $value;
						 }
						 if($key=='role')
						 {
							 $role = $value;
						 }
					}		
							
					$sess_array = array
					(
						'id'=>$id, 
						'username'=>$username, 
						'role'=>$role->role
					);
					
					$this->session->set_userdata('logged_in', $sess_array);
					return TRUE;
				}
				else 
				{
					$this ->form_validation->set_message('checkDatabase', 'Invalid username or password');
					$this->session->set_flashdata('msg', 'Invalid username or password');
					return false;
				}
	}
		
		public function add()
    {
		$data['page'] = "user";
         $this->load->view('user/add',$data);  
    }
        
		public function edit($id)
    {
        if($this->getUsername()!='admin')
				{
					 $this->load->view('main');
				}
				else
				{
						$this->load->database();
						$this->load->model('User_Model');
						$user=$this->User_Model->get($id);
						$this->load->view('useredit',array('user'=>$user));
				}
    }
		
		public function editPassword($id)
    {       
			 $this->load->database();
			 $this->load->model('User_Model');
			 $user=$this->User_Model->get($id);
			 $this->load->view('usereditpassword',array('user'=>$user));			
    }
		
		public function updatePassword()
    {       
			 $this->load->database();
			 $this->load->model('User_Model');
			 $this->User_Model->updatePassword();
			 redirect('user/', 'refresh');
    }
		
    public function create()
    {
			 $this->load->model('User_Model');
			 $this->load->library('form_validation');
			 $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean|callback_checkUserAvailability');
			 $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|matches[confirmPassword]');
			 $this->form_validation->set_rules('confirmPassword', 'password confirmation', 'required|callback_checkConfirmPassword');
			 
			 
			 if($this->form_validation->run() == FALSE)
			 {
					$this->load->view('useradd');
			 }
			 else
			 {
					$this->load->model('User_Model');
										
					$username = $this->input->post('username');
					$password = $this->input->post('password');
					$role = $this->input->post('role');
									
					$this->User_Model->createUser($username,$password,$role);
					
					redirect('user/', 'refresh');
			 }								                          
	 }
		
		public function checkUserAvailability()
		{
			$username = $this->input->post('username');
			$returnValue = $this->User_Model->checkUserAvailability($username);
			if ($returnValue==1)
			{
				$this->form_validation->set_message(__FUNCTION__, 'User Already Exists:::');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
		public function checkConfirmPassword()
		{
			$password = $this->input->post('password');
			$confirmPassword = $this->input->post('confirmPassword');

			if($password!=$confirmPassword)
			{
				$this->form_validation->set_message(__FUNCTION__, 'Passwords Dont Match:::');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
		
    public function update()
    {
			$this->load->database();
			$this->load->model('User_Model');
			$this->User_Model->updateUser();
							
			$users=$this->User_Model->getLastTenEntries();
			$this->load->view('userlist',array('users'=>$users));                           
    }
		
    public function delete($id)
    {
			$this->load->database();
			$this->load->model('User_Model');
			$this->User_Model->deleteUser($id);
							
			$users=$this->User_Model->getLastTenEntries();
			$this->load->view('userlist',array('users'=>$users));                           
    }
		
		public function getUsername()
		{
			 $session_data = $this->session->userdata('logged_in');
			 $username = $session_data['username'];
			 return  $username;
		}
		
		function logout()
		{
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('/');
		}
}