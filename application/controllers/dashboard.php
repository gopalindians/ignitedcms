<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		$this->db->select('*');
		$this->db->from('pages');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('dashboard/dashboard',$data);
		$this->load->view('footer');
		
	}


	 /**
	  *  @Description: save site settings like logo and site name
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function site_settings()
	{
		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('sitesettings/main');
		$this->load->view('footer');
		
	}

	 /**
	  *  @Description: save site settings to database
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function save_site_settings()
	{
		$config['upload_path'] = './img/uploads/';

            
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        // $config['max_size'] = '1048';
        $config['max_width'] = '200';
        // $config['max_height'] = '120';

        $this->load->library('upload', $config);
        /**
             * @Description: unsuccessful
             * @params     : params
             * @returns    : return
             */
        if ( ! $this->upload->do_upload())
        {
        	$err = $this->upload->display_errors();
			
			$this->session->set_flashdata('type', '0');
			$this->session->set_flashdata('msg', "<strong>Failed</strong> $err");
			
			redirect('dashboard/site_settings','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];

            
            $site = $this->input->post('site');
            $logo = $filename;

            $object = array('site' => $site, 'logo' => $logo );
            $this->db->where('id', '1');
            $this->db->update('site', $object);
            

			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Saved!');
			
			redirect('dashboard/site_settings','refresh');
			
			
        }

	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */