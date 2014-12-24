<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

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
	  *  @Description: page view
	  *       @Params: 
	  *
	  *  	 @returns: returns
	  */

	public function page_view()
	{

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('pages/page');
		$this->load->view('footer');

	}

	 /**
	  *  @Description: add another page to the db
	  *       @Params: _POST name
	  *
	  *  	 @returns: nada
	  */
	public function add_page()
	{
		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Page added!');

		$name = $this->input->post('name');

		$object = array('name' => $name );
		$this->db->insert('pages', $object);

		redirect('dashboard','refresh');

	}


	public function detail_view($id)
	{


	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */