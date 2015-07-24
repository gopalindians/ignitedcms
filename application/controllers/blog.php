<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		{
		  	if($this->session->userdata('isloggedin')=='1')
		  	{
		  		$this->load->model('Stuff_permissions');
				$pass = $this->Stuff_permissions->has_permission("blog");

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
	
	

	public function index()
	{
		$data['title'] = 'Blog';
		
		$this->db->select('*');
		$this->db->from('blog');
		$query = $this->db->get();
		
		

		$data['query'] = $query;

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('blog/default',$data); 
		$this->load->view('footer');

	}

	

	
	public function insert_blog_post()
	{

		$data['title'] = 'New Blog Post';
		$this->load->view('header');
        
        $this->load->view('body',$data);


        $this->load->view('blog/blog-add-post'); 
        $this->load->view('blog/footer-add-blog');

	}


	public function edit_blog_post($id)
	{
		$data['id'] = $id;

		$this->db->select('*');
	    $this->db->from('blog');
	    $this->db->where('id', $id);
	    $this->db->limit(1);

	    $query = $this->db->get();

	    $data['query'] = $query;



		$this->load->view('header');
        $this->load->view('body');

        $this->load->view('blog/blog-edit-post',$data); 
        $this->load->view('blog/footer-edit-blog');

	}

	public function search_blog()
	{

		$search_term = $this->input->post('search_term');

		$this->db->select('*');
		$this->db->from('blog');
		$this->db->like('title', $search_term);

		$query = $this->db->get();
		
		// foreach ($query->result() as $row) 
		// {
		// 	echo $row->name;
		// }

		$data['query'] = $query;

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('blog/default',$data); 
		$this->load->view('footer');


	}

	 /**
	  *  @Description: function to edit the blog post
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function actual_edit_blog_post($id)
	{
		//first check if the user can edit blog
		$username = $this->session->userdata('name');
		$content = $this->input->post('dummy');
		$title = $this->input->post('topicname');

	 	
	 		$data = array(
	               'title' => $title,
	               'content' => $content
	            );
	 		$this->db->where('id', $id);
	      	$this->db->update('blog', $data);
	      	

	      	$this->session->set_flashdata('type', '1');
	      	$this->session->set_flashdata('msg', '<strong>Success</strong> Post edited');

	      	redirect('blog', 'refresh');

	}

	 /**
	  *  @Description: delete blog post
	  *       @Params: GET id
	  *
	  *  	 @returns: returns
	  */
	public function delete_blog_post($id)
	{

		$this->db->delete('blog', array('id' => $id ));

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Post Deleted');
		redirect('blog', 'refresh');
		
	}

	public function actual_insert_blog_post()
	{
		$config['upload_path'] = './img/uploads/';

            
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        // $config['max_size'] = '1048';
        // $config['max_width'] = '120';
        // $config['max_height'] = '120';

        $this->load->library('upload', $config);
        /**
             * @Description: unsuccessful
             * @params     : params
             * @returns    : return
             */
        if ( ! $this->upload->do_upload())
        {

			$this->load->model('Stuff_blog');
			$query = $this->Stuff_blog->get_blog_posts();

			$data['blogs'] = $query;
			
			$errors =  $this->upload->display_errors();
			$this->session->set_flashdata('type', '0');
			$this->session->set_flashdata('msg', "<strong>Failed</strong> $errors");
			
			redirect('blog','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];

            $username = $this->session->userdata('name');

	 	

		 
			 	$content2 = $this->input->post('dummy');
			 	$title = $this->input->post('topicname');
				$userid = $this->session->userdata('userid');
			 	

			 	
				$data2 = array(
	               'title' => $title,
	               'content' => $content2,
	               'userid'  => '1',
	               'blog_date'  => date("Y-m-d H:i:s"),
	               'picture'	=> $filename
	                
	            );
	      	$this->db->insert('blog', $data2);

			

			$this->load->model('Stuff_blog');
			$query = $this->Stuff_blog->get_blog_posts();

			$data['blogs'] = $query;

			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Blog post has been added');
			
			redirect('blog','refresh');
			
			
        }
		
	}
}

/* End of file blog.php */
/* Location: ./application/controllers/blog.php */ 