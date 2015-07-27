<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct()
	{
		  parent::__construct();
		  {
			  	if($this->session->userdata('isloggedin')=='1')
			  	{
			  		$this->load->model('Stuff_permissions');
					$pass = $this->Stuff_permissions->has_permission("email");

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
	  *  @Description: the view file to save email settings
	  *       @Params: none
	  *
	  *  	 @returns: none
	  */
	public function index()
	{
		$this->db->select('*');
		$this->db->from('email');
		$this->db->where('id', 1);
		$this->db->limit(1);

		$query2 = $this->db->get();
		$data['query2'] = $query2;

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('email/email-view',$data);
		$this->load->view('footer');
	}

	 
	

	 /**
	  *  @Description: save smtp email settings to db
	  *       @Params: _POST $protocol; 
	  *				  $smtp_host;
	  *				  $smtp_port;
	  *				  $smtp_user;
	  *				  $smtp_pass;
	  *
	  *  	 @returns: nothing
	  */
	public function save_email_settings()
	{
		//get the _POST data and save to database
		$protocol  = $this->input->post('protocol');
		$smtp_host  = $this->input->post('smtp_host');
		$smtp_port  = $this->input->post('smtp_port');
		$smtp_user  = $this->input->post('smtp_user');
		$smtp_pass  = $this->input->post('smtp_pass');

		$object = array(
			'protocol' => $protocol, 
			'smtp_host' => $smtp_host,
			'smtp_port' => $smtp_port,
			'smtp_user' => $smtp_user,
			'smtp_pass' => $smtp_pass

			);
		$this->db->where('id', '1');
		$this->db->update('email', $object);

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Success</strong> Email Settings Saved');
		redirect("email", "refresh");
	}

	 /**
	  *  @Description: send a test email
	  *       @Params: _POST, email
	  *
	  *  	 @returns: success or fail
	  */
	public function test_email()
	{
		$this->load->model('Stuff_email');

		$email  = $this->input->post('email');

		$this->Stuff_email->my_email($email,'admin@ignitedcms.com','Test from IgnitedCMS',"Congratulations,your email works");

		$this->session->set_flashdata('type', '1');
		$this->session->set_flashdata('msg', '<strong>Please check your email.</strong>');

		redirect("email", "refresh");


	}

	 /**
	  *  @Description: test using php's mail function
	  *       @Params: _POST email2
	  *
	  *  	 @returns: returns
	  */
	public function php_mail_test()
	{
	  //use php's mail function
	  $config['protocol']  = "mail"; 
      
      $to = $this->input->post('email2');



	  $from = "admin@ignitedcms.com";
	  $to   = $to;
	  $body = "Congratulations, your email works";
	  $subject = "Test from IgnitedCMS";
	  


      $this->load->library('email');
      $this->email->initialize($config);
      $this->email->set_mailtype("html");

      $this->email->set_newline("\r\n");

      $this->email->from($from, 'Name');
      $this->email->to($to);   
      $this->email->subject($subject);   
      $this->email->message($body);

      
      // $this->email->attach($file);

      if($this->email->send())
      {
        //echo('Activation code has been successfully sent to your Email Address');
      }

      else
      {
        show_error($this->email->print_debugger());
      }    
      redirect("email", "refresh");

	}



}

/* End of file email.php */
/* Location: ./application/controllers/email.php */