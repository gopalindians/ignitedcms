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
	  *  @Description: list all current pages
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */

	public function show_pages()
	{
		$this->db->select('*');
		$this->db->from('pages');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('pages/all-pages',$data);
		$this->load->view('footer');


	}

	 /**
	  *  @Description: description
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function delete_page($id)
	{
		
		$this->db->where('id', $id);
		$this->db->delete('pages');


		redirect('dashboard','refresh');
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

	 /**
	  *  @Description: go to page builder
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function detail_view($id)
	{
		include('./resources/shortcodes/my_codes.php');
		
		$this->db->select('shortcodes');
		$this->db->from('pages');
		$this->db->where('id', $id);

		$query = $this->db->get();
		
		$shorttag = "";
		foreach ($query->result() as $row) 
		{
			$shorttag = $row->shortcodes;
		}

		//get all asset images
		$this->db->select('*');
		$this->db->from('assets');

		$query2 = $this->db->get();
		
		$data['query2'] = $query2;
		

		
		$data['content'] = do_shortcode($shorttag);

		$data['id'] = $id;

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('builder/builder',$data);
		$this->load->view('builder/footer',$data);

	}

}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */