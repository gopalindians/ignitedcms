<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /**
  *  @Description: Sanity check for adding a user, eg passwords, duplicate emails etc
  *       @Params: 
  *
  *  	 @returns: 
  */


class Stuff_user extends CI_Model {

	 /**
	  *  @Description: add new user 
	  *       @Params: name (username must be unique),email (unique),password,permissiongroup id
	  *
	  *  	 @returns: string ("*" or "Fail message") * indicates success
	  */
	public function add_user($name,$email,$password,$permissiongroup)
	{
		$pass = "*";

		//check if unique username
		$this->db->select('name');
		$this->db->from('user');
		$this->db->where('name', $name);

		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			$pass = $pass . "<br/>Username exists please choose another!";
		}
		


		//check if unique email
		//check if unique username
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('email', $email);

		$query2 = $this->db->get();
		
		if ($query2->num_rows() > 0)
		{
			$pass = $pass . "<br/>Email account already exists please choose another!";
		}

		//check if password is secure
		if($this->check_password($password) == false)
		{
			$pass = $pass . "<br/>Password does not meet minimum requirements!";
		}

		//check if valid permission group
		$this->db->select('groupID');
		$this->db->from('permission_groups');
		$this->db->where('groupID', $permissiongroup);

		$query3 = $this->db->get();
		
		//important use equal here!!!!
		if ($query3->num_rows() == 0)
		{
			$pass = $pass . "<br/>You have not selected a role!";
		}
		

		return $pass;


	}

	 /**
        *  @Description: make sure password is secure
        *                One number and Upper case letter
        *       @Params: params
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

       /**
        *  @Description: delete user except admin!!
        *       @Params: userid
        *
        *  	 @returns: nothing
        */
      public function delete_user($userid)
      {

      	 $this->db->select('isadmin');
      	 $this->db->from('user');
      	 $this->db->where('id', $userid);
      	 $this->db->limit(1);

      	 $query = $this->db->get();
      	 
      	 $is_admin = 0;
      	 foreach ($query->result() as $row) 
      	 {
      	 	$is_admin = $row->isadmin;
      	 }

      	 //if not admin then proceed to delete user
      	 if ($is_admin != 1)
      	 {
      	 	$this->db->where('id', $userid);
      	 	$this->db->delete('user');


      	 }
      	 


      }


}

/* End of file stuff_user.php */
/* Location: ./application/models/stuff_user.php */