
<html>
	<head>
		<title> Admin page </title>
		<?php include 'header.php' ?>
	</head>
	<body>
		<ul id="nav">
		    <?php include 'menu.php' ?>
		</ul>
		<div id="page" class="container">
			<div id="logo">
				<img src="images/logo.jpg" width="180" height="150" alt="IIITD&M logo" />
			</div>
			<div id="content">
				<div id="onecolumn">
				
			<form id='admin' action="select.php" method='post' accept-charset='UTF-8'>
				<p>Enter the criterion for selection</p>
				<label for='name' >Set Criteria for B.Tech(CGPA out of 10): </label><br>
				<input  class="validate[required]" type="text" name="marks_10" id="marks_10" value="" maxlength="5" onkeypress="return alpha(event);" onblur="return beta(this.id,this.value);"/><br>
				<label for='name' >Set Criteria for M.Tech(CGPA out of 10): </label><br>
				<input  class="validate[required]" type="text" name="mmarks_10" id="mmarks_10" value="" maxlength="5" onkeypress="return alpha(event);" onblur="return beta(this.id,this.value);"/><br>
				<input type="hidden" name="do" value='act' />
				<input type="submit" name="submit" value="Submit"> 
							   
				<br>
				<?php
				/*
				if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
				 
				$mar1=$_POST['marks_100'];
				$mar2=$_POST['marks_10'];
				$mar3=$_POST['marks_8'];
				$mar4=$_POST['marks_4'];
				$mar5=$_POST['mmarks_100'];
				$mar6=$_POST['mmarks_10'];
				$mar7=$_POST['mmarks_8'];
				$mar8=$_POST['mmarks_4'];
				 
				 }
				print("<h2>Selection criteria for B.Tech</h2>");
				 echo "Percentage: $mar1<br>";
				echo "CGPA out of 10: $mar2<br>";
				echo "CPI out of 8: $mar3<br>";
				echo "CPI out of 4: $mar4<br>";

				print("<h2>Selection criteria for M.Tech</h2>");
				 echo "Percentage: $mar5<br>";
				echo "CGPA out of 10: $mar6<br>";
				echo "CPI out of 8: $mar7<br>";
				echo "CPI out of 4: $mar8<br>";

					$servername="localhost";
				   $username="root";
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
					
					// Loop the recordset $rs
					//$x=$_POST['mar'];
					//echo $x;
					while($row = mysql_fetch_array($result)) {
						//print_r($row);
					   // Name of the person
					   if($row['bd_grade']=="MAR-100" && $row['bd_marks']>=$mar1)
					   {
							if($row['pg_grade']=="MAR-100" && $row['pg_marks']>=$mar5)
							{
							$strName = $row['App_no'] ;

							// Create a link to person.php with the id-value in the URL
							$strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

							// List link
							echo "<li>" . $strLink . "</li>";
							}
							else if($row['pg_grade']=="CGP-10" && $row['pg_marks']>=$mar6)
							{
							$strName = $row['App_no'] ;

							// Create a link to person.php with the id-value in the URL
							$strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

							// List link
							echo "<li>" . $strLink . "</li>";
							}
							else if($row['pg_grade']=="CPI-8" && $row['pg_marks']>=$mar7)
							{
							$strName = $row['App_no'] ;

							// Create a link to person.php with the id-value in the URL
							$strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

							//		 List link
							echo "<li>" . $strLink . "</li>";
							}
							else if($row['pg_grade']=="CPI-4" && $row['pg_marks']>=$mar8)
							{
							$strName = $row['App_no'] ;

							// Create a link to person.php with the id-value in the URL
							$strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

							// List link
							echo "<li>" . $strLink . "</li>";
							}
							
							}
					   else if($row['bd_grade']=="CGP-10" && $row['bd_marks']>=$mar2)
					   {
						if($row['pg_grade']=="MAR-100" && $row['pg_marks']>=$mar5)
					   {
					  $strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
					   }
					   	else if($row['pg_grade']=="CGP-10" && $row['pg_marks']>=$mar6)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
					   	else if($row['pg_grade']=="CPI-8" && $row['pg_marks']>=$mar7)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
						else if($row['pg_grade']=="CPI-4" && $row['pg_marks']>=$mar8)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
						

					}
					   else if($row['bd_grade']=="CPI-8" && $row['bd_marks']>=$mar3)
					   {
						if($row['pg_grade']=="MAR-100" && $row['pg_marks']>=$mar5)
					   {
					  $strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
					   }
					   	else if($row['pg_grade']=="CGP-10" && $row['pg_marks']>=$mar6)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
					   	else if($row['pg_grade']=="CPI-8" && $row['pg_marks']>=$mar7)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
						else if($row['pg_grade']=="CPI-4" && $row['pg_marks']>=$mar8)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
						

					}
					  else if($row['bd_grade']=="CPI-4" && $row['bd_marks']>=$mar1)
					   {
						if($row['pg_grade']=="MAR-100" && $row['pg_marks']>=$mar5)
					   {
					  $strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
					   }
					   	else if($row['pg_grade']=="CGP-10" && $row['pg_marks']>=$mar6)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
					   	else if($row['pg_grade']=="CPI-8" && $row['pg_marks']>=$mar7)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}
						else if($row['pg_grade']=="CPI-4" && $row['pg_marks']>=$mar8)
						{
						$strName = $row['App_no'] ;

					   // Create a link to person.php with the id-value in the URL
					   $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

					    // List link
					   echo "<li>" . $strLink . "</li>";
						}

						}
					else
						Print("Empty list<br>");


					  }

					// Close the database connection
					mysql_close();

				*/
				?>



				<a href='view_list.php'>View all the candidates who have applied</a>

				<!---
				<label for='name' >CGPA Criteria for M.Tech: </label><br>
				<input type=text name=m_c id=m_c value=''/><br/>

				-->
			</form>
		</div>	
	</body>
<html>
