<html>
	<head>
	 <title>Retrieve data from database</title>

	</head>
	<body>
	<dl>
	<?php
  	// Connect to database server
  	$servername="localhost";
    $username="root";
    $pwd="z";
    $conn=  mysql_connect($servername,$username)or die(mysql_error());
    mysql_select_db("test",$conn);
  	
  	// Get data from the database depending on the value of the id in the URL
  	//print "$_GET[id]";
  	$strSQL = "SELECT * FROM list where id= " .$_GET["id"];
  	$rs=mysql_query($strSQL,$conn) or die(mysql_error());	
  	//$rs = mysql_query($strSQL);
  	
  	// Loop the recordset $rs
  	while($row = mysql_fetch_array($rs)) 
    {

      		// Write the data of the person
      	/*	echo "<dt>Name:</dt><dd>" . $row["FirstName"] . " " . $row["LastName"] . "</dd>";
      		echo "<dt>Phone:</dt><dd>" . $row["Phone"] . "</dd>";
      		echo "<dt>Birthdate:</dt><dd>" . $row["BirthDate"] . "</dd>";*/
      	
        echo "<dt>Application number</dt><dd>" . $row['App_no'] . "</dd>";
        echo "<dt>Full Name</dt><dd>". $row['Full_Name'] . "</dd>";
        echo "<dt>Gender</dt><dd>" . $row['gender'] . "</dd>";
        echo "<dt>Date of Birth</dt><dd>" .$row['dob']. "</dd>";
        echo "<dt>Email-ID</dt><dd>" . $row['email'] . "</dd>";
        echo "<dt>Father's Name\Husband's Name</dt><dd>" . $row['fname'] . "</dd>";
        echo "<dt>Nationality</dt><dd>" . $row['Nationality'] . "</dd>";
        echo "<dt>Marital status</dt><dd>" . $row['Marital_status'] . "</dd>";
        echo "<dt>Physically challenged</dt><dd>" .$row['Physically_challenged'] . "</dd>";
        echo "<dt>Community</dt><dd>" . $row['community'] . "</dd>";
        echo "<dt>Minority</dt><dd>" . $row['Minority'] . "</dd>";
        echo "<dt>Permanent email id</dt><dd>" . $row['pemail'] . "</dd>";
        echo "<dt>Alternate email id</dt><dd>" . $row['aemail'] . "</dd>";
        echo "<dt>Temprary Address</dt><dd>" . $row['Temp_Address'] .",". $row['T_District'] .",". $row['T_state'] . "," . $row['T_pincode'] ."</dd>";
       // echo "<dt>Full Name</dt><dd>" . $row['T_District'] . "</td>";
        //echo "<td>" . $row['T_state'] . "</td>";
        //echo "<td>" . $row['T_pincode'] . "</td>";
        echo "<dt>Phone number</dt><dd>" . $row['T_phone_number'] . "</dd>";
        echo "<dt>mobile number</dt><dd>" . $row['T_mobile_number'] . "</dd>";
        echo "<dt>Permanent Address</dt><dd>". $row['perm_Address'] .",". $row['P_District'] .",". $row['P_state'] . "," . $row['P_pincode'] ."</dd>";

      //  echo "<td>" . $row['perm_Address'] . "</td>";
        //echo "<td>" . $row['P_District'] . "</td>";
        //echo "<td>" . $row['P_state'] . "</td>";
        //echo "<td>" . $row['P_pincode'] . "</td>";
        echo "<dt>Phone number</dt><dd>" . $row['P_phone_number'] . "</dd>";
        echo "<dt>Mobile number</dt><dd>" . $row['P_mobile_number'] . "</dd>";
        print "Details of 10th standard";
        echo "<dt>University/college</dt><dd>" . $row['10_univ'] . "</dd>";
        echo "<dt>Degree</dt><dd>" . $row['10_degree'] . "</dd>";
        echo "<dt>Marks</dt><dd>". $row['10_marks'] . "</dd>";
        echo "<dt>Grading method</dt><dd>". $row['10_grade'] . "</dd>";
        echo "<dt>Year of passing</dt><dd>". $row['10_year'] . "</dd>";
       
        print "Details of 12th standard";
        echo "<dt>University/college</dt><dd>" . $row['12_univ'] . "</dd>";
        echo "<dt>Degree</dt><dd>" . $row['12_degree'] . "</dd>";
        echo "<dt>Marks</dt><dd>". $row['12_marks'] . "</dd>";
        echo "<dt>Grading method</dt><dd>". $row['12_grade'] . "</dd>";
        echo "<dt>Year of passing</dt><dd>". $row['12_year'] . "</dd>";
       
        print "Details of Bachelor's degree";
        echo "<dt>University/college</dt><dd>" . $row['bd_univ'] . "</dd>";
        echo "<dt>Degree</dt><dd>" . $row['bd_degree'] . "</dd>";
        echo "<dt>Marks</dt><dd>". $row['bd_marks'] . "</dd>";
        echo "<dt>Grading method</dt><dd>". $row['bd_grade'] . "</dd>";
        echo "<dt>Year of passing</dt><dd>". $row['bd_year'] . "</dd>";

        print "Details of Master's degree";
        echo "<dt>University/college</dt><dd>" . $row['pg_univ'] . "</dd>";
        echo "<dt>Degree</dt><dd>" . $row['pg_degree'] . "</dd>";
        echo "<dt>Marks</dt><dd>". $row['pg_marks'] . "</dd>";
        echo "<dt>Grading method</dt><dd>". $row['pg_grade'] . "</dd>";
        echo "<dt>Year of passing</dt><dd>". $row['pg_year'] . "</dd>";
        
        print "Details of other degree";
        echo "<dt>University/college</dt><dd>" . $row['o_univ'] . "</dd>";
        echo "<dt>Degree</dt><dd>" . $row['o_degree'] . "</dd>";
        echo "<dt>Marks</dt><dd>". $row['o_marks'] . "</dd>";
        echo "<dt>Grading method</dt><dd>". $row['o_grade'] . "</dd>";
        echo "<dt>Year of passing</dt><dd>". $row['o_year'] . "</dd>";
       
      /*
       echo "<td>" . $row['12_univ'] . "</td>";
        echo "<td>" . $row['12_degree'] . "</td>";
        echo "<td>" . $row['12_marks'] . "</td>";
        echo "<td>" . $row['12_grade'] . "</td>";
        echo "<td>" . $row['12_year'] . "</td>";
        echo "<td>" . $row['bd_univ'] . "</td>";
        echo "<td>" . $row['bd_degree'] . "</td>";
        echo "<td>" . $row['bd_marks'] . "</td>";
        echo "<td>" . $row['bd_grade'] . "</td>";
        echo "<td>" . $row['bd_year'] . "</td>";
        echo "<td>" . $row['pg_univ'] . "</td>";
        echo "<td>" . $row['pg_degree'] . "</td>";
        echo "<td>" . $row['pg_marks'] . "</td>";
        echo "<td>" . $row['pg_grade'] . "</td>";
        echo "<td>" . $row['pg_year'] . "</td>";
        echo "<td>" . $row['o_univ'] . "</td>";
        echo "<td>" . $row['o_degree'] . "</td>";
        echo "<td>" . $row['o_marks'] . "</td>";
        echo "<td>" . $row['o_grade'] . "</td>";
        echo "<td>" . $row['o_year'] . "</td>";
        echo "<td>" . $row['bd_1'] . "</td>";
        echo "<td>" . $row['bd_2'] . "</td>";
        echo "<td>" . $row['bd_3'] . "</td>";
        echo "<td>" . $row['bd_4'] . "</td>";
        echo "<td>" . $row['bd_5'] . "</td>";
        echo "<td>" . $row['bd_6'] . "</td>";
        echo "<td>" . $row['bd_7'] . "</td>";
        echo "<td>" . $row['bd_8'] . "</td>";
        echo "<td>" . $row['bd_9'] . "</td>";
        echo "<td>" . $row['bd_10'] . "</td>";
         echo "<td>" . $row['bd_agr'] . "</td>";
        echo "<td>" . $row['bd_class'] . "</td>";
         echo "<td>" . $row['md_1'] . "</td>";
        echo "<td>" . $row['md_2'] . "</td>";
        echo "<td>" . $row['md_3'] . "</td>";
        echo "<td>" . $row['md_4'] . "</td>";
         echo "<td>" . $row['md_agr'] . "</td>";
        echo "<td>" . $row['md_class'] . "</td>";
      */
  	}

  	// Close the database connection
  	mysql_close();
	?>
	</dl>
	<p><a href="adminform1.php">Return to the list</a></p>
	</body>
</html>
