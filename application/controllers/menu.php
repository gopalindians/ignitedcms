<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

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

	 /**
	  *  @Description: pull all the pages from the db
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function pull_all_pages()
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

		redirect('menu/build_menu','refresh');
		


	}

	public function index()
	{
		
	}

	public function build_menu()
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

		$data['html'] = $html;
		$data['title'] = 'Menu Builder';

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('menu/menu-main', $data);
		$this->load->view('menu/menu-footer');

	}



	public function save_to_database()
	{
		$html = trim($this->input->post('data1'));
        
        $this->load->model('Stuff_menu');
        $this->Stuff_menu->save_menu($html);

        //save parent child in other table
        $this->Stuff_menu->save_parent_child($html);
		
	}
	 /**
	  *  @Description: take array create parent child and store in database
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */
	public function display_list()
	{
		$this->db->select('*');
		$this->db->from('menu2');
		$this->db->order_by('id', 'asc');

		$query = $this->db->get();

		//convert query result to an array
		$query_array = $query->result_array();

		echo $this->make_tree($query_array,"null");		


	}

	 /**
	  *  @Description: make the tree from db result
	  *       @Params: db select
	  *
	  *  	 @returns: html tree
	  */
	public function  make_tree( $a, $level) 
	{
	   $r = '' ;
	   foreach ( $a as $i ) 
	   {
	       if ($i['father'] == $level ) 
	       {
	          $r = $r . "<li>" . $i['innerhtml'] . $this->make_tree( $a, $i['id'] ) . "</li>";
	       }
	   }
	     //avoid empty leafs
  		 return ($r==''?'':"<ul>". $r . "</ul>");
  	}
}

/* End of file menu.php */
/* Location: ./application/controllers/menu.php */