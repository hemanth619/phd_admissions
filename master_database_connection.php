<?php
	//$connection = mysql_connect('localhost','root','root') or die(mysql_error());
	//$database = mysql_select_db('phd_admission_master') or die(mysql_error());

	$serverName = 'localhost';
	$userName = 'root';
	$password = 'root';
	$masterDbName = "phd_admission_master";

	// Create connection
	$masterDbConnection = mysqli_connect($serverName, $userName, $password, $masterDbName);
	// Check connection
	if (!$masterDbConnection) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>
