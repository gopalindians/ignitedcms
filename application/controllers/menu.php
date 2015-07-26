<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("menu");

					if($pass != true)
					{
						redirect('dashboard','refresh');
					}
			  	}
			  	else
			  	{
			  		redirect('installer','refresh');
			  	}
		  }
	}

	 /**
	  *  @Description: drag and drop for building menu
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function index()
	{
		//get previous menu
		$this->db->select('html');
		$this->db->from('menu');
		$this->db->where('id', '1');
		$this->db->limit(1);

		$query = $this->db->get();

		
		$html = "";
		foreach ($query->result() as $row) {
			$html = $row->html;
		}

		//get all the pages
		$this->db->select('*');
		$this->db->from('pages');

		$query2 = $this->db->get();
		
		$data['query2'] = $query2;

		$data['html'] = $html;
		$data['title'] = 'Menu Builder';

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('menu/menu-main', $data);
		$this->load->view('menu/menu-footer');	
	}


	 /**
	  *  @Description: Add page to menu
	  *       @Params: _POST page ids
	  *
	  *  	 @returns: 
	  */
	 public function add_page_to_menu()
	 {
	 	//loop through all pages and check if page id is passed
	 	$this->db->select('*');
		$this->db->from('pages');

		$query = $this->db->get();
		

		//get the existing menu
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('id', "1");
		$this->db->limit(1);

		$html_string = "";

		$query2 = $this->db->get();
		
		foreach ($query2->result() as $row) 
		{
			$html_string = $row->html;
		}
		
		
		foreach ($query->result() as $row) 
		{
			$id = $row->id;

			if (isset($_POST[$id]))
			{
				$unique_id = random_string('alnum', 16);

				$name = $row->name;
				$url = $row->id;
				$object = array('father' => 'null', 'innerhtml' => "$name|$url" );
				$this->db->insert('menu2', $object);

				$html_string = $html_string . 
				"<li class='dd-item dd3-item' id='id$unique_id'>
				<div class='dd-handle dd3-handle'></div>
				<div class='dd3-content'>$name</div>
				<div class='url' style='display:none;'>$url</div>
				<div class='dd-edit' ><i id='remove' u_id='id$unique_id'class='fa fa-trash-o'></i></div>
				</li>";

			}
		}
		$object2 = array('html' => $html_string );
		$this->db->where('id', '1');
		$this->db->update('menu', $object2);

		redirect('menu','refresh');
	 }




	 /**
	  *  @Description: DEPRECATED  pull all the pages from the db
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function deprecated_pull_all_pages()
	{	
		
		//first empty menu2
		$this->db->select('*');
		$this->db->from('menu2');
		$query = $this->db->get();
		
		foreach ($query->result() as $row) 
		{
			$this->db->where('id', $row->id);
			$this->db->delete('menu2');
		}


		$this->db->select('id,name');
		$this->db->from('pages');

		$query2 = $this->db->get();
		
		

		$html_string = "";

		foreach ($query2->result() as $row) 
		{
			$unique_id = random_string('alnum', 16);

			$name = $row->name;
			$url = $row->id;
			$object = array('father' => 'null', 'innerhtml' => "$name|$url" );
			$this->db->insert('menu2', $object);

			$html_string = $html_string . 
			"<li class='dd-item dd3-item' id='id$unique_id'>
			<div class='dd-handle dd3-handle'></div>
			<div class='dd3-content'>$name</div>
			<div class='url' style='display:none;'>$url</div>
			<div class='dd-edit' ><i id='remove' u_id='id$unique_id'class='fa fa-trash-o'></i></div>
			</li>";
			
		}

		//insert this into menu
		$object2 = array('html' => $html_string );
		$this->db->where('id', '1');
		$this->db->update('menu', $object2);

		redirect('menu','refresh');
		


	}

	



	 /**
	  *  @Description: save the menu order to database
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

	public function save_to_database()
	{
		$html = trim($this->input->post('data1'));
        
        $this->load->model('Stuff_menu');
        $this->Stuff_menu->save_menu($html);

        //save parent child in other table
        $this->Stuff_menu->save_parent_child($html);
		
	}
	 


     /**
      *  @Description: preview the superfish menu, need to add first 
      *                class to be class="sf-menu" done via jquery
      *       @Params: params
      *
      *  	 @returns: returns
      */
	public function preview()
	{
		

		//grab the menu and sent to view
		$this->load->model('Stuff_menu');
		$menu = $this->Stuff_menu->make_menu();



		$data['menu'] = $menu;
		$this->load->view('sitepreview/header');
		$this->load->view('sitepreview/body',$data);
		$this->load->view('sitepreview/footer');	

	}

	 



}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */