<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assets extends CI_Controller {

	
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
	  *  @Description: the default view for asset management
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function asset_view()
	{
		
		$this->db->select('*');
		$this->db->from('assets');
		$query = $this->db->get();
		
		$data['query'] = $query;
		


		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('assets/main',$data);
		$this->load->view('footer');

	}

	 /**
	  *  @Description: upload the image insert into db
	  *       @Params: _POST filename
	  *
	  *  	 @returns: returns
	  */
	public function do_upload()
	{
		$config['upload_path'] = './img/uploads/';

            
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        

        $this->load->library('upload', $config);
        /**
             * @Description: unsuccessful
             * @params     : params
             * @returns    : return
             */
        if ( ! $this->upload->do_upload())
        {


			$this->session->set_flashdata('type', '0');
			$this->session->set_flashdata('msg', '<strong>Failed</strong> Make sure the file type is OK');
			
			redirect('assets/asset_view','refresh');

        }
        //successful
        else
        {
        	$mytry = $this->upload->data();
            $filename = $mytry['raw_name'].$mytry['file_ext'];

            //create a thumbnail
            $config['image_library'] = 'gd2';
			$config['source_image']	= "./img/uploads/$filename";
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	= 200;
			$config['height']	= 200;

			$this->load->library('image_lib', $config); 

			$this->image_lib->resize();


			//insert this bad boy into the database
			$thumb = $mytry['raw_name'] . '_thumb' . $mytry['file_ext'];

			$object = array('name' => $thumb );
			$this->db->insert('assets', $object);


			$this->session->set_flashdata('type', '1');
			$this->session->set_flashdata('msg', '<strong>Success</strong> Image uploaded');
			
			redirect('assets/asset_view','refresh');
		}

	}


}

/* End of file assets.php */
/* Location: ./application/controllers/assets.php */