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

		$this->form_validation->set_rules('database', 'Database', 'trim|required|alpha');
		

		if ($this->form_validation->run() == FALSE)
		{
			 $data2['errors'] = 'Make sure database name contains only letters!';

		  $this->load->view('header');
		  $this->load->view('body');
		  $this->load->view('installer', $data2);
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
		\$db['default']['dbprefix'] = '';
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
			$sql="CREATE DATABASE IF NOT EXISTS $database";
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
	  *  @Description: if db file written test db connection!
	  *       @Params: params
	  *
	  *  	 @returns: returns
	  */
	public function create_tables()
	{
		
		$sql3 = "
      CREATE TABLE IF NOT EXISTS `pages` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `shortcodes` varchar(5000) NOT NULL,
        `name` varchar(50) NOT NULL,
        `inactive` int(11) NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
      ";

      $sql4 = "
		CREATE TABLE IF NOT EXISTS `user` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `name` varchar(100) NOT NULL,
		  `password` varchar(500) NOT NULL,
		  `joindate` date NOT NULL,
		  `logins` int(11) NOT NULL,
		  `is_logged_in` int(11) NOT NULL,
		  `isadmin` int(11) NOT NULL,
		  `companyid` int(11) NOT NULL,
		  `company` varchar(100) NOT NULL,
		  `email` varchar(50) NOT NULL,
		  `number` varchar(15) NOT NULL,
		  `activ_status` int(11) NOT NULL,
		  `activ_key` varchar(1000) NOT NULL,
		  `logo` varchar(500) NOT NULL,
		  `about` varchar(1000) NOT NULL,
		  `credits` int(11) NOT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

      	$sql5 = "
      	CREATE TABLE `menu` (
		`id` int(11) NOT NULL,
		  `html` varchar(5000) NOT NULL,
		  `array` varchar(5000) NOT NULL
		) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

		$sql6 = "
		CREATE TABLE `menu2` (
		  `id` varchar(50) NOT NULL,
		  `father` varchar(50) NOT NULL,
		  `tag` varchar(50) NOT NULL,
		  `innerhtml` varchar(500) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		$sql7 = "
		INSERT INTO `menu` (`id`, `html`, `array`) VALUES
		(1, '', '');";


		$sql8 = "
		CREATE TABLE `blog` (
		  `id` int(11) primary key NOT NULL AUTO_INCREMENT,
		  `title` varchar(300) NOT NULL,
		  `content` varchar(2000) NOT NULL,
		  `blog_date` datetime NOT NULL,
		  `userid` int(11) NOT NULL,
		  `picture` varchar(500) NOT NULL
		) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

		$sql9 = "
		CREATE TABLE `site` (
		`id` int(11) NOT NULL,
		  `site` varchar(200) NOT NULL,
		  `logo` varchar(200) NOT NULL
		) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

		$sql10 = "
		INSERT INTO `site` (`id`, `site`, `logo`) VALUES
		(1, '', 'ig2.png');";


		$sql11 = "
		CREATE TABLE `assets` (
		`id` int(11) NOT NULL,
		  `name` varchar(100) NOT NULL,
		  `inactive` int(11) NOT NULL
		) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

		$this->db->query($sql3);
		$this->db->query($sql4);
		$this->db->query($sql5);
		$this->db->query($sql6);
		$this->db->query($sql7);
		$this->db->query($sql8);
		$this->db->query($sql9);
		$this->db->query($sql10);
		$this->db->query($sql11);

		$this->load->view('header');
		$this->load->view('body');
		$this->load->view('installer/installer-3');
		$this->load->view('footer');

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