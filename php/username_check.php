<?php
$servername="localhost";
$username="root";
$password="z";
$conn=  mysql_connect($servername,$username)or die(mysql_error());
mysql_select_db("test",$conn);
if(isset($_POST['userid'])){
    $userid = mysql_real_escape_string($_POST['userid']);
    if(!empty($userid)){
        $userid_query = mysql_query("select count(`name`) from users where `name` = '$userid' ");
        $userid_result = mysql_result($userid_query, 0);
        
        if($username_result == 0){
            echo 'Username Available !';
        }
        else {
            echo 'Username Not Available';
        }
    }
}
?>