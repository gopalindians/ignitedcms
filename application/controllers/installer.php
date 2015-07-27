<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Installer extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  {
	  	//the magic goes here!
	  }
	}

	 /**
	  *  @Description: check if database has been written to!
	  *       @Params: none
	  *
	  *  	 @returns: true/false
	  */
	public function check_if_written()
	{
		$string = read_file('./application/config/database.php');

		//echo $string;

		$lines = explode("\n", $string);

		$is_written = false;

		foreach ($lines as $line) 
		{

			if (strpos($line,"['default']['database']") !== false) 
			{
    
				//echo '<pre>';
				$line2 = trim($line);

				//why 32? This is the character count
				//when there is nothing written on the
				//database name line

				if (strlen($line2) > 32 )
				{
					//database has been written
					$is_written = true;
				}
			}
		}

		return $is_written;
	}



	public function index()
	{
		if($this->check_if_written()==true)
		{
			redirect("installer/login", "refresh");
			

		}
		else
		{

			$this->load->view('header');
			$this->load->view('body');
			$this->load->view('installer/installer');
			$this->load->view('footer');
		}	
	}

	

	public function write_file()
	{

		$hostname = $this->input->post('hostname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$database = $this->input->post('database');
		$prefix   = $this->input->post('prefix');

		$this->form_validation->set_rules('database', 'Database', 'trim|required|alpha');
		

		if ($this->form_validation->run() == FALSE)
		{
			 $data2['errors'] = 'Make sure database name contains only letters!';

		  $this->load->view('header');
		  $this->load->view('body');
		  $this->load->view('installer/installer', $data2);
		  $this->load->view('footer');
		}
		else{		

		
		


		$data = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		/*
		| -------------------------------------------------------------------
		| DATABASE CONNECTIVITY SETTINGS
		| -------------------------------------------------------------------
		| This file will contain the settings needed to access your database.
		|
		| For complete instructions please consult the 'Database Connection'
		| page of the User Guide.
		|
		| -------------------------------------------------------------------
		| EXPLANATION OF VARIABLES
		| -------------------------------------------------------------------
		|
		|	['hostname'] The hostname of your database server.
		|	['username'] The username used to connect to the database
		|	['password'] The password used to connect to the database
		|	['database'] The name of the database you want to connect to
		|	['dbdriver'] The database type. ie: mysql.  Currently supported:
						 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
		|	['dbprefix'] You can add an optional prefix, which will be added
		|				 to the table name when using the  Active Record class
		|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
		|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
		|	['cache_on'] TRUE/FALSE - Enables/disables query caching
		|	['cachedir'] The path to the folder where cache files should be stored
		|	['char_set'] The character set used in communicating with the database
		|	['dbcollat'] The character collation used in communicating with the database
		|				 NOTE: For MySQL and MySQLi databases, this setting is only used
		| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
		|				 (and in table creation queries made with DB Forge).
		| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
		| 				 can make your site vulnerable to SQL injection if you are using a
		| 				 multi-byte character set and are running versions lower than these.
		| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
		|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
		|	['autoinit'] Whether or not to automatically initialize the database.
		|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
		|							- good for ensuring strict SQL while developing
		|
		| The \$active_group variable lets you choose which connection group to
		| make active.  By default there is only one group (the 'default' group).
		|
		| The \$active_record variables lets you determine whether or not to load
		| the active record class
		*/

		\$active_group = 'default';
		\$active_record = TRUE;

		\$db['default']['hostname'] = '$hostname';
		\$db['default']['username'] = '$username';
		\$db['default']['password'] = '$password';
		\$db['default']['database'] = '$database';
		\$db['default']['dbdriver'] = 'mysql';
		\$db['default']['dbprefix'] = '$prefix';
		\$db['default']['pconnect'] = TRUE;
		\$db['default']['db_debug'] = TRUE;
		\$db['default']['cache_on'] = FALSE;
		\$db['default']['cachedir'] = '';
		\$db['default']['char_set'] = 'utf8';
		\$db['default']['dbcollat'] = 'utf8_general_ci';
		\$db['default']['swap_pre'] = '';
		\$db['default']['autoinit'] = TRUE;
		\$db['default']['stricton'] = FALSE;


		/* End of file database.php */
		/* Location: ./application/config/database.php */";



		$con = mysqli_connect("$hostname","$username","$password","");

		// Check connection
		if (mysqli_connect_errno()) {
		

	  	  $data2['errors'] = 'Database credentials are wrong dude!';

		  $this->load->view('header');
		  $this->load->view('body');
		  $this->load->view('installer/installer', $data2);
		  $this->load->view('footer');
		}
		else
		{
			$sql="CREATE DATABASE $database";
			if (mysqli_query($con,$sql)) 
			{
			    //echo "Database my_db created successfully";
			    if ( ! write_file('./application/config/database.php', $data))
				{
				     echo 'Unable to write the file do you have permissions!';
				}
				else
				{
					//echo 'File written!';

					$data2['success'] = 'All good dude!';

					$this->load->view('header');
					$this->load->view('body');
					$this->load->view('installer/installer-2',$data2);
					$this->load->view('footer');
					
				}
			} 
			else 
			{
			  //echo "Error creating database: " . mysqli_error($con);
			  $data2['errors'] = 'Database already exists!';

			  $this->load->view('header');
			  $this->load->view('body');
			  $this->load->view('installer/installer', $data2);
			  $this->load->view('footer');


			}

			mysqli_close($con);

			
			
			}
		}

	}

	 /**
	  *  @Description: A more elegant way to create our tables
	  *       @Params: none but needs ignitedcsm.sql file
	  *
	  *  	 @returns: none
	  */
	public function create_tables()
	{
		$file = file_get_contents("ignitedcms.sql");

		//explode it into an array
		$file_array = explode(';', $file);

		$prefix = $this->db->dbprefix;

		//execute the exploded text content 
		foreach($file_array as $query) 
		{
			//this allows us to set the table prefix
			$query = str_replace("TABLE `", "TABLE `$prefix", $query);
			$this->db->query($query);
			
		}

		$sql1 = "
		INSERT INTO `".$prefix."menu` (`id`, `html`, `array`) VALUES
		(1, '', '');";

		$sql2 = "
		INSERT INTO `".$prefix."site` (`id`, `site`, `logo`,`color`) VALUES
		(1, '', 'ig2.png','');";
		
		$sql3 = "
		INSERT INTO `".$prefix."email`(`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`) VALUES 
		(1,'','','','','');";

		$sql4 = "
		INSERT INTO `".$prefix."permissions` (`permissionID`, `permission`,`order_position`) VALUES
		(1, 'pages',3),
		(2, 'blog',5),
		(3, 'email',6),
		(4, 'menu',4),
		(5, 'permissions',8),
		(6, 'profile',1),
		(7,'assets',7),
		(8,'site_settings',2),
		(9,'users',9),
		(10,'database',10);";

		$sql5 = "
		INSERT INTO `".$prefix."permission_map`(`groupID`, `permissionID`) VALUES 
		(1,1),
		(1,2),
		(1,3),
		(1,4),
		(1,5),
		(1,6),
		(1,7),
		(1,8),
		(1,9),
		(1,10);";

		$sql6 = "
		INSERT INTO `".$prefix."permission_groups`(`groupID`, `groupName`) VALUES 
		(1,'Administrators');";


		$this->db->query($sql1);
		$this->db->query($sql2);
		$this->db->query($sql3);
		$this->db->query($sql4);
		$this->db->query($sql5);
		$this->db->query($sql6);

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('installer/installer-3');
		$this->load->view('footer');
		
	}


	 

	 /**
	  *  @Description: set time local
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */

	 public function set_time_local()
	 {


	 	$this->load->view('header');
		$this->load->view('body');
		$this->load->view('installer/installer-4');
		$this->load->view('footer');


	 }


	  /**
	   *  @Description: save time local setting to config file
	   *       @Params: _post time
	   *
	   *  	 @returns: returns
	   */
	  public function save_time_local()
	  {

	  	//To do: write over config file

	  	redirect('installer/login', 'refresh');



	  }




	 /**
	  *  @Description: general login function
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function login()
	{


		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('login');
		$this->load->view('footer');

		

	}

}

/* End of file installer.php */
/* Location: ./application/controllers/installer.php */