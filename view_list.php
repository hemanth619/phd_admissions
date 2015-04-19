<html>
	<head>
	<title>Retrieve data from the database</title>
	</head>
	<body>

	<ul>

	<?php
	$servername="localhost";
   $username="root";
$pwd="z";
    $conn=  mysql_connect($servername,$username)or die(mysql_error());
    mysql_select_db("test",$conn);
	//$sql1="create view list as join "
    $sql="select * from list order by id";
    $result=mysql_query($sql,$conn) or die(mysql_error());	
/*
	// Connect to database server
	mysql_connect("mysql.myhost.com", "user", "sesame") or die (mysql_error ());

	// Select database
	mysql_select_db("mydatabase") or die(mysql_error());

	// SQL query
	$strSQL = "SELECT * FROM people ORDER BY FirstName DESC";

	// Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($strSQL);
	*/
	// Loop the recordset $rs
	while($row = mysql_fetch_array($result)) {
		//print_r($row);
	   // Name of the person
	  $strName = $row['App_no'] ;

	   // Create a link to person.php with the id-value in the URL
	   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

	    // List link
	   echo "<li>" . $strLink . "</li>";

	  }

	// Close the database connection
	mysql_close();
	?>

	</ul>
	</body>
	</html>
