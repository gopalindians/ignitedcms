<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {

	

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