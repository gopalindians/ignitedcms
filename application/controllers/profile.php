<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
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
		
	}
	 /**
	  *  @Description: Save first and last name and password reset
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function my_profile_view()
	{



		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('profile/profile-view');
		$this->load->view('footer');

	}

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */