<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: Create new users and define user management roles
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
		  		$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("users");

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

		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('permission_groups', 'permission_groups.groupID = user.permissiongroup');
		

		$query = $this->db->get();
		
		$data['query'] = $query;
		
		
		foreach ($query->result() as $row) 
		{
			// echo $row->name;
			// echo $row->email;
			// echo $row->groupName;
		}

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('users/user-view',$data); 
		$this->load->view('footer');
		
	}

	 /**
	  *  @Description: Add user view, assign username password and role
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function add_user_view()
	{
		
		$this->db->select('*');
		$this->db->from('permission_groups');
		$query = $this->db->get();
		
		$data['query'] = $query;
		




		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('users/add-user',$data); 
		$this->load->view('footer');


	}

	 /**
	  *  @Description: search the database for users or delete cannot delete admin!
	  *       @Params: _post search_term
	  *
	  *  	 @returns: returns
	  */
	public function search_users_or_delete()
	{
		//check if search or delete
		if($this->input->post('sbm') == "search") 
		{

			$search_term = $this->input->post('search_term');

			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('permission_groups', 'permission_groups.groupID = user.permissiongroup');
			$this->db->like('name', $search_term);

			$query = $this->db->get();
			

			$data['query'] = $query;
			


			$this->load->view('header');
			$this->load->view('body');
			$this->load->view('users/user-view',$data);
			$this->load->view('footer');
		}

		if($this->input->post('sbm') == "delete") 
		{
			//iterate over selected items and delete
			if (isset($_POST['chosen']))
			{
				$arrayName = $_POST['chosen'];

				foreach ($arrayName as $key => $value) {
					//echo $value;

					//delete the users in the db
					//but don't delete admin account!!!
					
					$this->load->model('Stuff_user');
					$this->Stuff_user->delete_user($value);

				}
				
			}
			
			//return to page view
			redirect("users","refresh");
		
		}
	}

	 /**
	  *  @Description: Save user, make sure duplicate username and email is not used!
	  *       @Params: _POST 
	  *
	  *  	 @returns: returns
	  */
	public function save_user()
	{
		$name     = $this->input->post('name');
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		$roles     = $this->input->post('roles');

		

		//do sanity if ok insert into database!
		$this->load->model('Stuff_user');
		if ($this->Stuff_user->add_user($name,$email,$password,$roles) == "*")
		{
			//success

			$hashed_password = crypt($password);

			$object = array(
				'name' => $name, 
				'email' => $email,
				'password' => $hashed_password,
				'permissiongroup' => $roles,
				'joindate'  => date("Y-m-d H:i:s")
				);
			$this->db->insert('user', $object);

			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> User created!');
			redirect("users","refresh");

		}
		else
		{
			//failure
			$error_message = $this->Stuff_user->add_user($name,$email,$password,$roles);
			$this->session->set_flashdata('type', '0');
			$this->session->set_flashdata('msg', "<strong>Failed</strong> $error_message");
			redirect("users/add_user_view","refresh");


		}

		

	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */