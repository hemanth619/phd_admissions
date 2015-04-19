<html>
  <style>
    body {background-color:#EAEAEA;
    text-align:center;}
  </style>
  
  <body>
    <?php

       if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
       
       $sc1=$_POST['sc_1'];
       $sc2=$_POST['sc_2'];
	   $sc3=$_POST['sc_3'];
       
	   
       $obc1=$_POST['obc_1'];
       $obc2=$_POST['obc_2'];
	   $obc3=$_POST['obc_3'];
       
	   
       $gn1=$_POST['gn_1'];
       $gn2=$_POST['gn_2'];
	   $gn3=$_POST['gn_3'];
        $servername="localhost";
       $username="root";
       $pwd="z";
       $conn=  mysql_connect($servername,$username)or die(mysql_error());
       mysql_select_db("test",$conn);
	   
        $sqlc="insert into criterion (sc1,sc2,sc3,obc1,obc2,obc3,gn1,gn2,gn3) values ('$sc1','$sc2','$sc3','$obc1','$obc2','$obc3','$gn1','$gn2','$gn3')";
       $resultc=mysql_query($sqlc,$conn) or die(mysql_error());	
       }
       print("<h2>Selection criteria for SC/ST</h2>");
       
       echo "B.Tech CGPA: $sc1<br>";
	   echo "M.Tech CGPA: $sc2<br>";
	   echo "Age: $sc3<br>";
       
       
       print("<h2>Selection criteria for OBC</h2>");
       
       echo "B.Tech CGPA: $obc1<br>";
	   echo "M.Tech CGPA: $obc2<br>";
	   echo "Age: $obc3<br>";
	   
	   
       print("<h2>Selection criteria for General Category</h2>");
       
       echo "B.Tech CGPA: $gn1<br>";
	   echo "M.Tech CGPA: $gn2<br>";
	   echo "Age: $gn3<br>";
       
       $servername="localhost";
       $username="root";
       $pwd="z";
       $conn=  mysql_connect($servername,$username)or die(mysql_error());
       mysql_select_db("test",$conn);
       //$sql1="create view list as join "
       $sql="select * from list order by id";
       $result=mysql_query($sql,$conn) or die(mysql_error());	
       
       while($row = mysql_fetch_array($result))
       {
       if($row['community']=='SC' || $row['community']=='ST')
	   {
       if($row['bd_agr']>=$sc1 && $row['md_agr']>=$sc2 && $row['age'] <= $sc3)
    {
    $strName = $row['App_no'] ;
    
    // Create a link to person.php with the id-value in the URL
    $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";
    
    // List link
    echo "<li>" . $strLink . "</li>";
    
    }
    }
    }
	   while($row = mysql_fetch_array($result))
       {
       if($row['community']=='OBC')
	   {
       if($row['bd_agr']>=$obc1 && $row['md_agr']>=$obc2 && $row['age'] <= $obc3)
    {
    $strName = $row['App_no'] ;
    
    // Create a link to person.php with the id-value in the URL
    $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";
    
    // List link
    echo "<li>" . $strLink . "</li>";
    
    }
    }
    }
	   while($row = mysql_fetch_array($result))
       {
       if($row['community']=='General')
	   {
       if($row['bd_agr']>=$gn1 && $row['md_agr']>=$gn2 && $row['age'] <= $gn3)
    {
    $strName = $row['App_no'] ;
    
    // Create a link to person.php with the id-value in the URL
    $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";
    
    // List link
    echo "<li>" . $strLink . "</li>";
    
    }
    }
    }
	
$sqlq1 = 'delete from selected';

$result = mysql_query($sqlq1, $conn) or die( "Could not execute sql: $sqlq1");
		
    $sql1="select * from list where community='SC' and bd_agr>=$sc1 and md_agr>=$sc2 and age<=$sc3 UNION select * from list where community='ST' and bd_agr>=$sc1 and md_agr>=$sc2 and age<=$sc3 UNION select * from list where community='OBC' and bd_agr>=$obc1 and md_agr>=$obc2 and age<=$obc3 UNION select * from list where community='General' and bd_agr>=$gn1 and md_agr>=$gn2 and age<=$gn3";
    $result1=mysql_query($sql1,$conn) or die(mysql_error());
echo '<br><br><br>';
   while($row = mysql_fetch_array($result1))
      {
   $sqlq="insert into selected(Appl,Name,email_id,community,age,ug_agr,pg_agr) values('$row[App_no]','$row[Full_Name]','$row[email]','$row[community]','$row[age]','$row[bd_agr]','$row[md_agr]')";
      $resultq=mysql_query($sqlq,$conn) or die(mysql_error()); 
	  }
    // Close the database connection
    //	mysql_close();

    
    ?>
    
    <?php print "\n<a href='new2.php'> All selected Candidates List </a><br><br>\n";?>
    <?php print "\n<a href='genlist.php'> General Category List </a>&nbsp;\n";?>
    <?php print "\n<a href='sclist.php'> SC Category List</a>&nbsp;\n";?>
    <?php print "\n<a href='stlist.php'> ST Category List </a>&nbsp\n";?>
    <?php print "\n<a href='obclist.php'> OBC Category List </a><br><br>\n";?>
    
    <?php print "\n<a href='adminform1.php'> Back </a><br>\n";?>
  </body>
</html>
