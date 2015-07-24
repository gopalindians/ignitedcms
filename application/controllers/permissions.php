<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissions extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		{
		  	if($this->session->userdata('isloggedin')=='1')
		  	{
		  		$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("permissions");

				if($pass != true)
				{
					redirect('dashboard','refresh');
				}
		  	}
		  	else
		  	{
		  		redirect('installer','refresh');
		  	}
		}
	}

	public function index()
	{
		

	}

	 /**
	  *  @Description: the view file to assign permissions to groups
	  *       @Params: none
	  *
	  *  	 @returns: returns
	  */
	public function group_permissions_view()
	{
		$this->db->select('*');
		$this->db->from('permission_groups');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('permissions/group-perm',$data);
		$this->load->view('footer');


	}

	 /**
	  *  @Description: the view file to create a new group
	  *       @Params: none
	  *
	  *  	 @returns: returns
	  */
	public function new_group_view()
	{
		//get all the permissions
		$this->db->select('*');
		$this->db->from('permissions');
		$query = $this->db->get();
		
		$data['query'] =  $query;

		$this->load->helper('inflector');
		//Use CI inflector to pretty up output
		//eg convert site_settings to Site Settings with  humanize() function
		

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('permissions/group-perm-details',$data);
		$this->load->view('footer');

	}

	 /**
	  *  @Description: Save the new permission group and permission map
	  *       @Params: _post groupName, checkbox ids
	  *
	  *  	 @returns: returns
	  */

	public function save_permission_group()
	{

		$groupName = $this->input->post('groupName');

		$object = array('groupName' => $groupName );

		$this->db->insert('permission_groups', $object);

		//get and store the insert id
		$insert_id = $this->db->insert_id();


		foreach($_POST as $key => $value) 
    	{
    		//ignore the first one
    		if($key != "groupName")
    		{
    			if (isset($key))
	    		{
	    			//insert into db
	    			$object2 = array('groupID' => $insert_id, 'permissionID' => $key );
	    			$this->db->insert('permission_map', $object2);
	    		}
	    		

    		}	
    	}

    	redirect("permissions/group_permissions_view", "refresh");
	}


	 /**
	  *  @Description: load the view to update group permissions
	  *       @Params: group_id
	  *
	  *  	 @returns: nothing
	  */

	public function update_permission_view($group_id)
	{
		//get all the permissions
		$this->db->select('*');
		$this->db->from('permissions');
		$query = $this->db->get();
		
		$data['query'] =  $query;

		$this->load->helper('inflector');
		//Use CI inflector to pretty up output
		//eg convert site_settings to Site Settings with  humanize() function



		//get all the checked permissions from permission map
		$this->db->select('permissionID');
		$this->db->from('permission_map');
		$this->db->where('groupID', $group_id);

		$query2 = $this->db->get();

		//store this result in an array!
		$store = array();
		foreach($query2->result() as $row)
		{
			$store[] = array(
				'mvals' => $row->permissionID

				);
		}
		
		$data['store'] =  $store;
		$data['group_id'] = $group_id;
		
		

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('permissions/group-perm-update',$data);
		$this->load->view('footer');




	}

	public function update_permission_groups($group_id)
	{
		$this->db->select('permissionID');
		$this->db->from('permissions');

		$query = $this->db->get();
		
		foreach ($query->result() as $row) 
		{
			$id = $row->permissionID;

			if (isset($_POST[$id]))
			{

				if($this->check_duplicate($id,$group_id) == false)
				{
					$object = array('groupID' => $group_id, 'permissionID' => $id );
					$this->db->insert('permission_map', $object);

				}

				
			}
			else{

				$this->db->where('groupID', $group_id);
				$this->db->where('permissionID', $id);
				$this->db->delete('permission_map');
			}
		}

		redirect("permissions/update_permission_view/$group_id", "refresh");


	}

	 /**
	  *  @Description: checks to see if id already exists
	  *       @Params: permissionID	
	  *
	  *  	 @returns: true /false
	  */

	public function check_duplicate($permissionID,$group_id)
	{

		$this->db->select('*');
		$this->db->from('permission_map');
		$this->db->where('groupID', $group_id);
		$this->db->where('permissionID', $permissionID);

		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
		

	}



}

/* End of file permissions.php */
/* Location: ./application/controllers/permissions.php */