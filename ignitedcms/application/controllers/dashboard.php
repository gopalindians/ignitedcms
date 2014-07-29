<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
	  parent::__construct();
	  {
	  	//this is where the magic happens
	  }
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('dashboard/dashboard');
		$this->load->view('footer');
		
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */