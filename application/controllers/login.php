<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
      
      public function __construct()
      {
          parent::__construct();
          {
            //this is where the magic happens

            //inlcude a better hashing library
            include('./resources/password/password.php');
          }
      }


      public function index()
      {

      }

      
      
      public function validate_login()
      {
            

            $data['errors'] = '';

            //------------------------------
            //  POST vars
            //------------------------------

            $name = $this->input->post('name');
            $password = $this->input->post('password');

            $this->db->where('name', $name);

            $query = $this->db->get('user');

            //check if user exists
            if($query->num_rows() == 1)
            {
              $query = $this->db->get_where('user', array('name' => $name));

              $hashed_password = "";
              $userid = "";
              foreach ($query->result() as $row)
              {

                  $hashed_password = $row->password;
                  $userid = $row->id;
              }

              if (password_verify($password, $hashed_password))
              {
                      //set the user's permissions
                      $this->load->model('Stuff_permissions');
                      $perms = $this->Stuff_permissions->get_permissions($userid);

                      $array = array(
                        'name' => $name,
                        'userid' => $userid,
                        'isloggedin' => '1',
                        'permissions' => $perms

                      );

                      //update the login count
                      $this->db->set('logins','logins+1', false);
                      $this->db->where('name', $name);
                      $this->db->update('user');
                      
                      $this->session->set_userdata( $array );
                      //login successful
                      redirect('dashboard','refresh');
              }
              else
              {
                  $data['errors'] =   'Password is incorrect, check your caps lock is not on!';
                  $this->load->view('header');
                  $this->load->view('body');
                  $this->load->view('login', $data);
                  $this->load->view('footer');
              }
            }
            else
            {
                $data['errors'] = 'User Does not exist';
                $this->load->view('header');
                $this->load->view('body');
                $this->load->view('login', $data);
                $this->load->view('footer');
            
            }
 
      }


       /**
        *  @Description: make sure password is secure
        *                One number and at least 6 characters long
        *       @Params: string password
        *
        *     @returns: returns
        */
      public function check_password($pwd)
      {
        $error ="";       

        if( strlen($pwd) < 6 ) 
        {
          $error .= "Password too short! ";
        }


        if( !preg_match("#[0-9]+#", $pwd) ) 
        {
          $error .= "Password must include at least one number! ";
        }


        if( !preg_match("#[a-zA-z]+#", $pwd) ) 
        {
          $error .= "Password must include at least one letter! ";
        }


        if($error)
        {
            return false;
        } 
        else 
        {
          return true;
        }
      }



      public function validate_details()
      {
            //$url = site_url();
            //-------------------------------
            //  POST vars
            //-------------------------------
            $site = $this->input->post('site');
            $password = $this->input->post('password1');
            //$email = $this->input->post('email');


            

            //check if password is secure
            if($this->check_password($password)==false)
            {
              $data['errors'] =
                  'Password is too simple <br/> 
                   Password must contain a number and Uppercase letter!<br/>
                   Password must be at least 6 characters long';

                   $this->load->view('header');
                   $this->load->view('body');
                   $this->load->view('installer/installer-3', $data);
                   $this->load->view('footer');

            }
            else{

            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
             

            $data = array(
               'name' => 'admin' ,
               'password' => $hashed_password ,
               'isadmin' => '1',
               'permissiongroup' => '1',
               'joindate'  => date("Y-m-d H:i:s")
            );

            //insert into the db
            $this->db->insert('user', $data);

            //update site title

            $object = array('site' => $site );
            $this->db->where('id', '1');
            $this->db->update('site', $object);


            redirect('installer/set_time_local','refresh'); 
          }
  
      }


       /**
        *  @Description: destroy session and logout
        *       @Params: params
        *
        *     @returns: returns
        */
      public function logout()
      {
        $this->session->sess_destroy();

        redirect("installer/login", "refresh");
  
      }

     

     

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */ ?>