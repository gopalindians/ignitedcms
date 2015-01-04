<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Shortcodes extends CI_Controller {

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
		//default route
	}

	


	 /**
	  *  @Description: save to pages
	  *       @Params: _POST pageid
	  *
	  *  	 @returns: returns
	  */
	public function save_to_database()
	{
		$pageid = $this->input->post('pageid');

		$shorttag = $this->input->post('shorttag');

		$object = array('shortcodes' => $shorttag );

		$this->db->where('id', $pageid);
		$this->db->update('pages', $object);

	}
	 /**
	  *  @Description: this previews and renders the page you have built
	  *       @Params: page id
	  *
	  *  	 @returns: returns
	  */
	public function preview_page($id)
	{
		include('./resources/shortcodes/my_codes_render.php');

		

		$this->db->select('shortcodes');
		$this->db->from('pages');
		$this->db->where('id', $id);

		$query = $this->db->get();
		
		$shorttag = "";
		foreach ($query->result() as $row) 
		{
			$shorttag = $row->shortcodes;
		}
		

		//grab the menu send to view
		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();

		$data['menu'] = $menu;

		$data['content'] = do_shortcode($shorttag);

		$this->load->view('sitepreview/header');
		$this->load->view('sitepreview/body',$data);
		$this->load->view('builder/page_preview',$data);
		$this->load->view('sitepreview/footer');

	}

	//add text box

	public function box()
	{
		$lorem = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
		
		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode("[col foo=4]".$lorem."[/col]");

	}

	//add image block
	public function image()
	{
		$id = $this->input->post('id');

		//get the img url
		$this->db->select('fullsize');
		$this->db->from('assets');
		$this->db->where('id', $id);
		$this->db->limit(1);

		$query = $this->db->get();
		
		$url = "";
		foreach ($query->result() as $row) 
		{
			$url= $row->fullsize;
		}
		
		$url = base_url("img/uploads/$url");

		include('./resources/shortcodes/my_codes.php');
		echo do_shortcode("[img foo=4]".$url."[/img]");

	}




}

/* End of file shortcodes.php */
/* Location: ./application/controllers/shortcodes.php */