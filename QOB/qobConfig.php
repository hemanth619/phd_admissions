<?php
include("backendFunctions.php");



/***************************CONNECTION DETAILS**************************/
//your server host name
define("HOST", "localhost");



//username of MySQL database
define("USER", "root");



//password of MySQL database
define("PASSWORD", "isquarer");

$dbName=getDBName();

if($dbName=="NODB")
{
	echo "Admissions are not yet open or have been closed. Please wait for the Call.";
	exit();
}
//choose your database
define("DB", $dbName);
/***************************CONNECTION DETAILS**************************/






/***************************COMMON PARAMETERS**************************/
//defining the default log file name
define("LOG_FILE", "./error.log");



//set the default time zone
define("TIME_ZONE", "Asia/Kolkata");
date_default_timezone_set(TIME_ZONE);



//defining the default log file name
define("C_TIME", time());

//SALT for password Hashing
define("PASSSALT", "13050412");





?>
