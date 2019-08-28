<?php 

class Db {

	private $servername = "localhost";
	private $username 	= "root";
	private $pass 		= "1234567890";
	private $dbname 	= "naukri";
	public $con;
	public $query;
	public $output;	
	public $err = array();



	function __construct()
	{	
		$this->con = mysqli_connect($this->servername, $this->username, $this->pass, $this->dbname);
		
	}

	function dbconnection()
	{
		if( !$this->con ):
			return mysqli_connect_errno($this->con);
			exit();
		else:
			return $this->con;
		endif;
	}

	function sql($query)
	{
		$result = mysqli_query($this->con, $query);
		while($row=mysqli_fetch_assoc($result)):
			$resultset[] = $row;
		endwhile;
		if(!empty($resultset)):
			return $resultset;
		endif;
	}

	function numRows($query)
	{
		$result = mysqli_query($this->con, $query);		
		return $result;
	}


}




 ?>





