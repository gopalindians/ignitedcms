<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_preview extends CI_Controller {

	public function index()
	{
		$this->load->view('sitepreview/header');
		$this->load->view('sitepreview/body');
		$this->load->view('sitepreview/footer');		
	}

}

/* End of file site_preview.php */
/* Location: ./application/controllers/site_preview.php */