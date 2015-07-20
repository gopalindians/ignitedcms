<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: defines all the help functions folder structure etc
  *       @Params: 
  *
  *  	 @returns: 
  */


class Help extends CI_Controller {
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

	 /**
	  *  @Description: load the default view
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function index()
	{
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('help/help-view');
		$this->load->view('footer');
		
	}

}

/* End of file help.php */
/* Location: ./application/controllers/help.php */