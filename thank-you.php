<?php
session_start();
require_once('QOB/qob.php');
require_once('backendFunctions.php');

if(!isset($_SESSION['userId']))
{
	displayAlertAndRedirect("Please Login to continue.","login.php");
}

?>

<html>
<head>
      <title>Final Submission.</title>
</head>

<body>
<center>
<h2 >Your Form has been Submitted Successfully</h2>
<a href="applnform.php">Download the application</a><br><br>

<a href="logout.php">Logout</a>
</center>

</body>
</html>
