<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permissions extends CI_Controller {


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
				redirect('login','refresh');
			}
		}
	}

	public function index()
	{
		

	}

}

/* End of file permissions.php */
/* Location: ./application/controllers/permissions.php */