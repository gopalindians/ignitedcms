<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_preview extends CI_Controller {

	public function index()
	{
			
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

		//for iphones
		$small_menu = $this->Stuff_menu->make_small_menu();

		$data['menu'] = $menu;
		$data['small_menu'] = $small_menu;

		$data['content'] = do_shortcode($shorttag);

		$this->load->view('sitepreview/header');
		$this->load->view('sitepreview/body',$data);
		$this->load->view('builder/page_preview',$data);
		$this->load->view('sitepreview/footer');

	}

	 /**
	  *  @Description: preview the blogs on the actual site
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function blog_preview()
	{
		

		$this->load->model('Stuff_blog');
		$query = $this->Stuff_blog->get_blog_posts();

		$data['blogs'] = $query;

		//grab the menu send to view
		$this->load->model('Stuff_menu');
		$menu4 = $this->Stuff_menu->make_menu();

		//for iphones
		$small_menu = $this->Stuff_menu->make_small_menu();

		
		$data['small_menu'] = $small_menu;

		$data['menu'] = $menu4;
		
		$this->load->view('sitepreview/header');
		$this->load->view('sitepreview/body',$data);
		$this->load->view('blog/blog',$data); 
		$this->load->view('sitepreview/footer');

	}

}

/* End of file site_preview.php */
/* Location: ./application/controllers/site_preview.php */