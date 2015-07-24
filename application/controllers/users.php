<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: Define user management roles
  *       @Params: 
  *
  *  	 @returns: 
  */



class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		{
		  	if($this->session->userdata('isloggedin')=='1')
		  	{
		  		//allow access
		  	}
		  	else
		  	{
		  		redirect('installer','refresh');
		  	}
		}
	}

	public function index()
	{

		$userid = $this->session->userdata('userid');

		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('permission_groups', 'permission_groups.groupID = user.permissiongroup');
		$this->db->where('user.id', $userid);

		$query = $this->db->get();
		
		
		
		foreach ($query->result() as $row) 
		{
			echo $row->name;
			echo $row->email;
			echo $row->groupName;
		}
		
		
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */