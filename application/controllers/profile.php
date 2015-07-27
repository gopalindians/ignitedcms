<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  {
			  	//inlcude a better hashing library
            	include('./resources/password/password.php');


			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("profile");

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

	/**
	  *  @Description: Save first and last name and password reset
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function index()
	{
		$userid = $this->session->userdata('userid');

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id', $userid);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('profile/profile-view', $data);
		$this->load->view('footer');
	}
	 
	

	public function save_profile()
	{

		$id = $this->session->userdata('userid');

		//save the details to the database
		$fullname = $this->input->post('fullname');
		
		//to check email is not duplicated
		$email    = $this->input->post('email');

		$password = $this->input->post('password');

		//doesn't require a password change
		if(strlen($password) == 0)
		{

			$object = array('fullname' => $fullname, 'email' => $email );

			$this->db->where('id', $id);
			$this->db->update('user', $object);

			redirect("profile","refresh");


		}
		else{

			if($this->check_password($password) == true)
			{
				//password is ok
				$hashed_password = password_hash($password, PASSWORD_BCRYPT);
				

				$object2 = array('password' => $hashed_password,'fullname' => $fullname, 'email' => $email );
				$this->db->where('id', $id);
				$this->db->update('user', $object2);

				$this->session->set_flashdata('type', '1');
				$this->session->set_flashdata('msg', '<strong>Success</strong> Password updated!');

				redirect("profile","refresh");

			}
			else
			{
				$errors =
	              'Password is too simple <br/> 
	               Password must contain a number and Uppercase letter!<br/>
	               Password must be at least 6 characters long';



	               $this->session->set_flashdata('type', '0');
	               $this->session->set_flashdata('msg', "<strong>Failed</strong> $errors");


	               redirect("profile","refresh");
			}
		}

	}

	 /**
        *  @Description: make sure password is secure
        *                One number and Upper case letter
        *       @Params: params
        *
        *     @returns: returns
        */
      public function check_password($pwd)
      {
	        $error ="";       

	        if( strlen($pwd) < 6 ) 
	        {
	          $error .= "Password too short! ";
	        }


	        if( !preg_match("#[0-9]+#", $pwd) ) 
	        {
	          $error .= "Password must include at least one number! ";
	        }


	        if( !preg_match("#[a-zA-z]+#", $pwd) ) 
	        {
	          $error .= "Password must include at least one letter! ";
	        }


	        if($error)
	        {
	            return false;
	        } 
	        else 
	        {
	          return true;
	        }
      }




}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */