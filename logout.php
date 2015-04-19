<?php 
session_start();
include 'header2.php'; 
 
if(session_destroy())
{
 //Header("Location: index.php");
/*<button onclick="window.location.href='forms.php'">Back</button>
print"<h1>You have logged out successfully</h1>";
print "<h3><a href='login.php'>Back to login page</a></h3>";*/
?>
<meta http-equiv="refresh" content="0;index.php">
<?php

}
?>
<?php include 'copyright.php' ?>