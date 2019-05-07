<?php
Class User_Model extends CI_Model
{
 
    var $id = '';
		var $username = '';
		var $password = '';
		var $salt = '';
		var $role = '';
	  var $status = '';
		var $lastLogin = '';
		var $createdOn = '';
		var $lastModified = '';

    function __construct()
    {
      // Call the Model constructor
      parent::__construct();
			$this->load->database();
    }
	
	  function getCurrentUsers()
    {
        $role = 1;
			  $sql = "SELECT * FROM user,profile WHERE role != ? AND user.id = profile.userId";
        $query =$this->db->query($sql, array($role));        
        //echo $this->db->last_query();
        return $query->result();
    }
	
	  function editDevice()
    {
			  $id=$this->input->post('id');
			  $client=$this->input->post('client');
				$userId=1;
				$type=$this->input->post('type');
				$serial=$this->input->post('serial');
				$deviceId=$this->input->post('deviceId');
				$phonenumber=$this->input->post('phonenumber');
				$latitude=$this->input->post('latitude');
				$longitude=$this->input->post('longitude');
				$closeAddress=$this->input->post('closeAddress');
				$modifiedOn=$this->returnTime();
			
				$data = array(
						'client'=>$client,
						'userId'=>$userId,
						'type'=>$type,
						'serial'=>$serial,
						'deviceId'=>$deviceId,
						'phonenumber'=>$phonenumber,
						'latitude'=>$latitude,
						'longitude'=>$longitude,
						'closeAddress'=>$closeAddress,
						'modifiedOn'=>$modifiedOn
				);

				$this->db->where('id',$this->input->post('id'));
			  $this->db->update('device',$data);
    }
	
	  function updateProfile()
		{
			 $data = array(
						'firstname'=>$this->input->post('firstname'),
						'lastname'=>$this->input->post('lastname'),
						'email'=>$this->input->post('email'),
				 		'userId'=>$this->getLastInsertedUserId(),
						'phonenumber'=>$this->input->post('phonenumber'), 
						'phonenumberB'=>$this->input->post('phonenumberB'),
						'company'=>$this->input->post('company'),  
						'country'=>$this->input->post('country'), 
						'city'=>$this->input->post('city'), 
						'road'=>$this->input->post('road'), 
						'plotNumber'=>$this->input->post('plotNumber'), 
				    'gender'=>$this->input->post('gender'), 
				    'dob'=>$this->input->post('dob'),
						'modifiedOn'=>$this->returnTime()
				);

				$this->db->where('id',$this->input->post('id'));
			  $this->db->update('profile',$data);
		}
	
	  function createProfile()
		{
			 $data = array(
						'firstname'=>$this->input->post('firstname'),
						'lastname'=>$this->input->post('lastname'),
						'email'=>$this->input->post('email'),
				 		'userId'=>$this->getLastInsertedUserId(),
						'phonenumber'=>$this->input->post('phonenumber'), 
						'phonenumberB'=>$this->input->post('phonenumberB'), 
						'company'=>$this->input->post('company'),  
						'country'=>$this->input->post('country'), 
						'city'=>$this->input->post('city'), 
						'road'=>$this->input->post('road'), 
						'plotNumber'=>$this->input->post('plotNumber'), 
				    'gender'=>$this->input->post('gender'), 
				    'dob'=>$this->input->post('dob'),
						'createdOn'=>$this->returnTime(),
						'modifiedOn'=>'0000-00-00 00:00:00'
				);

				$this->db->insert('profile',$data);
		}
    
    function getLastTenEntries()
    {
        $query = $this->db->get('user', 100);
        return $query->result();
    }
		
    function get($id)
		{
        $sql = "SELECT * FROM user WHERE id = ?";
        $query =$this->db->query($sql, array($id));        
        //echo $this->db->last_query();
        return $query->result();
    }
	
		function getProfile($userId)
		{
        $sql = "SELECT * FROM profile WHERE userId = ?";
        $query =$this->db->query($sql, array($userId));        
        //echo $this->db->last_query();
        return $query->result();
		}
		
		function searchUser($term)
		{
			 $dig = $term. '%';
			 $sql = "select * FROM user WHERE username LIKE ?";
			 $query = $this->db->query($sql, array($dig));
			 return $query->result();
		}

    function createUser($username,$password,$role)
    {
       	$this->username = $username;
				$this->salt = uniqid(mt_rand(), true);	
				$this->password = SHA1($password.$this->salt);				
				$this->role = $role;				
				
				$this->lastLogin = '0000-00-00 00:00:00';	
				$this->createdOn = $this->returnTime();			
				$this->lastModified = '0000-00-00 00:00:00';
								      
        $this->db->insert('user', $this);
    }
		
		function getPasswordMatch() 
		{			  
				if($_POST['password']==$_POST['password_confirm'])
				{
					 return 1;
				}
				else
				{
					return 0;
				}
    }

    function updateUser()
    {
        $this->id = $_POST['id'];
				$this->username = $_POST['username'];
				$this->activated = $_POST['activated'];
				$this->password = SHA1($_POST['password']);
				$this->salt = $_POST['salt'];
				$this->activationDate = $_POST['activationDate'];
				$this->deactivationDate = $_POST['deactivationDate'];
				$this->lastLogin = $_POST['lastLogin'];
				$this->companyId = $_POST['companyId'];

        $this->db->update('user', $this, array('id' => $_POST['id']));
    }
		
		function updatePassword()
    {
				$this->id = $_POST['id'];
				$password = $_POST['password'];
				$this->salt = uniqid(mt_rand(), true);	
        $this->password = SHA1($password.$this->salt);
				
				$data=array('password'=>$this->password,'salt'=>$this->salt);
				$this->db->where('id',$this->id);
				$this->db->update('user',$data);
		}
		
		function updatePasswordAjax()
    {
				$this->id = $_POST['id'];
				$password = $_POST['password'];
				$this->salt = uniqid(mt_rand(), true);	
        $this->password = SHA1($password.$this->salt);
				
				$data=array('password'=>$this->password,'salt'=>$this->salt);
				$this->db->where('id',$this->id);
				$this->db->update('user',$data);
				return "done";
    }
		
		function updateUserRole($roleId,$profileId)
    {				
				$data=array('role'=>$roleId);
				$this->db->where('profileId',$profileId);
				$this->db->update('user',$data);
    }
		
    function deleteUser($id)
    {
			  $this->db->delete('user', array('id' => $id));
			  return "complete";
    }
		
		function getUserSalt($username) 
		{
			$this->db->select('salt');
			$this->db->from('user');
			$this->db->where('username', $username);
			$this->db->limit(1);
	
			$query = $this->db->get();
	 
			if($query->num_rows()==1)
			{
				$row = $query->row('salt');
				return $row;
			}
			else
			{
				return 0;
			}
    }
		
		
		function checkUserAvailability($username) 
		{
			$this->db->select('username');
			$this->db->from('user');
			$this->db->where('username', $username);
			$this->db->limit(1);
	
			$query = $this->db->get();
	 
			if($query->num_rows() == 1)
			{
				return 1;
			}
			else
			{
				return 0;
			}
    }
		
		function checkUserPost()
		{
		 	 if(!filter_var($_POST['username'], FILTER_VALIDATE_EMAIL))
			 {
					return 1;
			 } 
			 else 
			 {
					return 0;   
			 }
		}
		
		
		function login($username,$password)
		{
			if($this->getUserSalt($username)!=0)
			{
				 $salt = $this->getUserSalt($username);
				 $this->db->select('id, username,role');
				 $this->db->from('user');
				 $this->db->where('username', $username);
				 $this->db->where('password', SHA1($password.$salt));
				 $this->db->limit(1);
			
				 $query = $this->db->get();
			
				 if($query->num_rows()>0)
				 {
					 $result = $query->result();			
					 return $result;
				 }
				 else
				 {
					 return false;
				 }
			}				
		}
		
		function returnTime()
		{
			date_default_timezone_set('Africa/Nairobi');
			$dateToday = date("Y-m-d").",".date("H:i:s");
			return $dateToday;
		}
		
		function getModeUserSession()
		{
			 $currSession = $this->session->userdata('logged_in');
			 return $currSession;
		}	
		
		function getModeUsername()
		{
			 $currSession = $this->session->userdata('logged_in');
			 if(is_array($currSession) && count($currSession)>1)
			 {
			  $username = $currSession['username']->username;
			 }
			 else
			 {
			  $username = "";
			 }			 
			 return $username;
		} 
	
	  function getModeUserId()
		{
			 $currSession = $this->session->userdata('logged_in');
			
			 if(is_array($currSession) && count($currSession)>1)
			 {
			  $userId = $currSession['id']->id;
			 }
			 else
			 {
			  $userId = "";
			 }
			 return $userId;
		} 
	
	   function updateUserStatus($id)
		{				
			$id = $this->input->post('id');	
			//$codeA = $this->input->post('codeA');
			$status = $this->input->post('status');
		 
		  if($status=='0')
			{
				$activated = 1;
			}
		  else if($status=='1')
		  {
			  $activated = 0;
		  }
			
			$data=array(
			//'codeA'=>$codeA,
			'status'=>$activated,
		  'lastModified'=>$this->returnTime());
			
			$this->db->where('id',$id);
			$this->db->update('user',$data);
			return "complete";
		}
	
	  function getModeUserRole()
		{
			 $currSession = $this->session->userdata('logged_in');
			 $role = $currSession['role'];
			 return $role;
		}
	
	  function getLastInsertedUserId() 
		{
			$query = $this->db->query('SELECT max(id) as maxid FROM user');
     
			$maxId = 1;
			if ($query->num_rows() > 0) 
			{
				$row = $query->row();
        $maxId = $row->maxid;
			} 
			return $maxId;
    }
}
?>
