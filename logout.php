<?php 
session_start();
//include 'header2.php'; 

unset($_SESSION['userId']);
unset($_SESSION['email']);
unset($_SESSION['applicationNo']);
unset($_SESSION['UserFullName']);
$_SESSION=array();
session_destroy();

Header("Location: index.php");
/*<button onclick="window.location.href='forms.php'">Back</button>
print"<h1>You have logged out successfully</h1>";
print "<h3><a href='login.php'>Back to login page</a></h3>";*/
?>
<meta http-equiv="refresh" content="0;index.php">
<?php


?>
<?php include 'copyright.php' ?>