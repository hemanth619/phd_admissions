<?php
require_once('QOB/qob.php');
require_once('backendFunctions.php');

	$connection = mysql_connect('localhost','root','isquarer') or die(mysql_error());
	$dbName=getDBName();
	$database = mysql_select_db($dbName) or die(mysql_error());
?>
