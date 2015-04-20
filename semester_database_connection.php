<?php
	//$connection = mysql_connect('localhost','root','root') or die(mysql_error());
	//$database = mysql_select_db('phd_admission_master') or die(mysql_error());
	$semDbConnection = "";
	function sem_connection($semDbName)
	{
		$serverName = 'localhost';
		$userName = 'root';
		$password = 'root';
		// Create connection

		global $semDbConnection;
		
		$semDbConnection = mysqli_connect($serverName, $userName, $password, $semDbName);
		// Check connection
		if (!$semDbConnection) {
		    die("Connection failed: " . mysqli_connect_error());
		}		
	}
	
?>
