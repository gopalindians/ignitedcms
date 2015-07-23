<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stuff_permissions extends CI_Model {

	 /**
	  *  @Description: This function returns all the pages the user has access to
	  *                in a comma separated string
	  *       @Params: params
	  *
	  *  	 @returns: pages,blog... etc
	  */
	public function get_permissions($userid)
	{
		

		$this->db->select('permissiongroup');
		$this->db->from('user');
		$this->db->where('id', $userid);

		$query = $this->db->get();
		

		$groupID = "";
		foreach ($query->result() as $row) 
		{
			$groupID =  $row->permissiongroup;
		}

		//this user has access to

		$this->db->select('*');
		$this->db->from('permissions');
		$this->db->join('permission_map', 'permission_map.permissionID = permissions.permissionID');
		$this->db->where('permission_map.groupID', $groupID);

		$query2 = $this->db->get();
		
		$permissions = "";

		foreach ($query2->result() as $row) 
		{
			$permissions = $permissions .$row->permission . ",";
			
		}

		return $permissions;

	}

	 /**
	  *  @Description: see if user has permission to controller
	  *       @Params: controller name
	  *
	  *  	 @returns: true or false
	  */
	public function has_permission($name_of_controller)
	{
		$perms = $this->session->userdata('permissions');

		$array = explode(",", $perms);

		$pass = false;
		foreach ($array as $key) {
			if($name_of_controller == $key)
			{
				$pass = true;
			}
		}

		return $pass;


	}

}

/* End of file stuff_permissions.php */
/* Location: ./application/models/stuff_permissions.php */