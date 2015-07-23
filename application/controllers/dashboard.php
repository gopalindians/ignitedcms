<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		//test for permissions
		


		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('dashboard/dashboard_view');
		$this->load->view('footer');
		
	}


	

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */