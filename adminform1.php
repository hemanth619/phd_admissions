<?php
    $servername="localhost";
    $username="root";
    $pwd="z";
    $conn=  mysql_connect($servername,$username)or die(mysql_error());
    mysql_select_db("test",$conn);
    session_start();
     print("<b><h1>Welcome $_SESSION[user] </h1>");
     $t=$_SESSION['user'];
     $sql="select id from admin where name='$t'";
    $result=mysql_query($sql,$conn) or die(mysql_error());
    $temp=''; 
	
	$sqlc = "select * from criterion";
 // $sql1="insert into personal_info(App_no) values ('$temp')";
  $resultc=mysql_query($sqlc,$conn) or die(mysql_error());
  if(!$resultc||mysql_num_rows($resultc)<1){//echo 'empty result';
  }
  else
  while($row = mysql_fetch_array($resultc))
  	{
	   $sc1=$row['sc1'];
       $sc2=$row['sc2'];
	   $sc3=$row['sc3'];
       
	   
       $obc1=$row['obc1'];
       $obc2=$row['obc2'];
	   $obc3=$row['obc3'];
       
	   
       $gn1=$row['gn1'];
       $gn2=$row['gn2'];
	   $gn3=$row['gn3'];
	   
	   }
?>
 <html>   
<meta charset="utf-8">
 <title>Admin form</title>

<!-- CSS-->
<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">

<!-- JavaScript -->

<script src="Spry-UI-1.7/includes/SpryDOMUtils.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryDOMEffects.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryWidget.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryPanelSet.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryPanelSelector.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryFadingPanels.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryTabbedPanels2.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/plugins/TabbedPanels2/SpryFadingPanelsPlugin.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/plugins/TabbedPanels2/SpryTabbedPanelsKeyNavigationPlugin.js" type="text/javascript"></script>
<link href="Spry-UI-1.7/css/TabbedPanels2/SpryTabbedPanels2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/* BeginOAWidget_Instance_2138522: #TabbedPanels2 */


/* TabbedPanelsTabGroup */
#TabbedPanels2 .TabbedPanelsTabGroup {
	top: 1px;
	left: 0px;

	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
	background-color: transparent;

	border-left: solid 0px inherit;
	border-bottom: solid 0px inherit;
	border-top: solid 0px inherit;
	border-right: solid 0px inherit;

	padding: 0px 0px 0px 0px;
}

/* TabbedPanelsTab */
#TabbedPanels2.TabbedPanels .TabbedPanelsTab,
#TabbedPanels2.VTabbedPanels .TabbedPanelsTab {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
	background-color: #DDD;

	border-left: solid 1px #CCC;
	border-bottom: solid 1px #999;
	border-top: solid 1px #999;
	border-right: solid 1px #999;

	padding: 4px 10px 4px 10px;
}

#TabbedPanels2.TabbedPanels .TabbedPanelsTab a,
#TabbedPanels2.VTabbedPanels .TabbedPanelsTab a {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
}

/* TabbedPanelsTabHover */
#TabbedPanels2.TabbedPanels .TabbedPanelsTabHover,
#TabbedPanels2.VTabbedPanels .TabbedPanelsTabHover {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
	background-color: #EEE;

	border-left: solid 1px #CCC;
	border-bottom: solid 1px #999;
	border-top: solid 1px #999;
	border-right: solid 1px #999;

	padding: 4px 10px 4px 10px;
}

#TabbedPanels2.TabbedPanels .TabbedPanelsTabHover a,
#TabbedPanels2.VTabbedPanels .TabbedPanelsTabHover a {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
}

/* TabbedPanelsTabSelected */
#TabbedPanels2.TabbedPanels .TabbedPanelsTabSelected,
#TabbedPanels2.VTabbedPanels .TabbedPanelsTabSelected {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
	background-color: #EEE;

	border-left: solid 1px #CCC;
	border-bottom: solid 1px #EEE;
	border-top: solid 1px #999;
	border-right: solid 1px #999;

	padding: 4px 10px 4px 10px;
}

#TabbedPanels2.TabbedPanels .TabbedPanelsTabSelected a, 
#TabbedPanels2.VTabbedPanels .TabbedPanelsTabSelected a {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
}

/* TabbedPanelsTabFocused */
#TabbedPanels2.TabbedPanels .TabbedPanelsTabFocused, 
#TabbedPanels2.VTabbedPanels .TabbedPanelsTabFocused {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
	background-color: #EEE;

	border-left: solid 1px #CCC;
	border-bottom: solid 1px #EEE;
	border-top: solid 1px #999;
	border-right: solid 1px #999;

	padding: 4px 10px 4px 10px;
}

#TabbedPanels2.TabbedPanels .TabbedPanelsTabFocused a, 
#TabbedPanels2.VTabbedPanels .TabbedPanelsTabFocused a {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
}


/* TabbedPanelsContentGroup */
#TabbedPanels2 .TabbedPanelsContentGroup {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
	background-color: #EEE;

	border-left: solid 1px #CCC;
	border-bottom: solid 1px #CCC;
	border-top: solid 1px #999;
	border-right: solid 1px #999;

	padding: 0px 0px 0px 0px;
}

/* TabbedPanelsContentVisible */
#TabbedPanels2 .TabbedPanelsContentVisible {
	font-family: inherit;
	font-weight: inherit;
	font-size: inherit;
	color: inherit;
	background-color: transparent;

	border-left: solid 0px #CCC;
	border-bottom: solid 0px #CCC;
	border-top: solid 0px #999;
	border-right: solid 0px #999;

	padding: 4px 12px 4px 12px;
}

#TabbedPanels2.BTabbedPanels .TabbedPanelsTab {
	border-bottom: solid 1px #999;
	border-top: solid 1px #999;
}

#TabbedPanels2.BTabbedPanels .TabbedPanelsTabSelected {
	border-top: solid 1px #999;
}

#TabbedPanels2.VTabbedPanels .TabbedPanelsTabGroup {
	width: 10em;
	height: 20em;
	top: 1px;
	left: 0px;
}

#TabbedPanels2.VTabbedPanels .TabbedPanelsTabSelected {
	background-color: #EEE;
	border-bottom: solid 1px #EEE;
}

#TabbedPanels2.table{
    
}

/* EndOAWidget_Instance_2138522 */
</style>
<script type="text/javascript">
var e1=0,e2=0,e3=0,e11=0,e21=0,e31=0,e12=0,e22=0,e32=0;
</script>
<script type="text/xml">
/*
<oa:widgets>
  <oa:widget wid="2138522" binding="#TabbedPanels2" />
</oa:widgets>
*/
</script>

<?php print "\n<a href='logout.php'>Logout</a><br>\n";?>
<body>
	
<div id="TabbedPanels2">

<div>
  <h2>Control Panel</h2>
<form id='admin' action="select.php" method='post' accept-charset='UTF-8'>
<p>Choose criterion for selection.</p>

<div align="left">
<label for='name'  style="font-size:16px">Set Criteria for SC/ST Category </label><br><br>
<table>
<tr>
<td><input type="checkbox" name="sc" value="0" onClick="enabler1();"/>B.Tech CGPA</td>
<td><input type="text" id="sc_1" name="sc_1" style="width:30%" value="<?php if(isset($sc1)) echo $sc1;?>" hidden="true"></td>
</tr>
<tr>
<td><input type="checkbox" name="sc" value="1" onClick="enabler2();" />M.Tech CGPA</td>
<td><input type="text" id="sc_2"  name="sc_2" style="width:30%" value="<?php if(isset($sc2)) echo $sc2;?>" hidden="true"></td>
</tr>
<tr>
<td><input type="checkbox" name="sc" value="2" onClick="enabler3();"/>Age</td>
<td><input type="text" id="sc_3" name="sc_3" style="width:30%" value="<?php if(isset($sc3)) echo $sc3;?>" hidden="true"></td>
</tr>
</table>
</div>
<br>
<div align="left">
<label for='name' style="font-size:16px">Set Criteria for OBC Category </label><br><br>
<table>
<tr>
<td><input type="checkbox" name="obc" value="0" onClick="enabler11();"/>B.Tech CGPA</td>
<td><input type="text" id="obc_1" name="obc_1" style="width:30%" value="<?php if(isset($obc1)) echo $obc1;?>" hidden="true"></td>
</tr>
<tr>
<td><input type="checkbox" name="obc" value="1" onClick="enabler21();" />M.Tech CGPA</td>
<td><input type="text" id="obc_2" name="obc_2" style="width:30%" value="<?php if(isset($obc2)) echo $obc2;?>" hidden="true"></td>
</tr>
<tr>
<td><input type="checkbox" name="obc" value="2" onClick="enabler31();"/>Age</td>
<td><input type="text" id="obc_3"  name="obc_3" style="width:30%" value="<?php if(isset($obc3)) echo $obc3;?>" hidden="true"></td>
</tr>
</table>
</div>
<br>
<div align="left">
<label for='name' style="font-size:16px">Set Criteria for General Category </label><br><br>
<table>
<tr>
<td><input type="checkbox" name="gn" value="0" onClick="enabler12();"/>B.Tech CGPA</td>
<td><input type="text" id="gn_1" name="gn_1" style="width:30%" value="<?php if(isset($gn1)) echo $gn1;?>" hidden="true"></td>
</tr>
<tr>
<td><input type="checkbox" name="gn" value="1" onClick="enabler22();" />M.Tech CGPA</td>
<td><input type="text" id="gn_2" name="gn_2" style="width:30%" value="<?php if(isset($gn2)) echo $gn2;?>" hidden="true"></td>
</tr>
<tr>
<td><input type="checkbox" name="gn" value="2" onClick="enabler32();"/>Age</td>
<td><input type="text" id="gn_3" name="gn_3" style="width:30%" value="<?php if(isset($gn3)) echo $gn3;?>" hidden="true"></td>
</tr>
</table>
</div>


<script type="text/javascript">
function enabler1()
{
	e1++;
	if(e1%2!=0)
		document.getElementById("sc_1").hidden=false;
	else
	    document.getElementById("sc_1").hidden=true;  
	
};
function enabler2()
{
	e2++;
	if(e2%2!=0)
		document.getElementById("sc_2").hidden=false;
	else
	    document.getElementById("sc_2").hidden=true;  
	
};
function enabler3()
{
	e3++;
	if(e3%2!=0)
		document.getElementById("sc_3").hidden=false;
	else
	    document.getElementById("sc_3").hidden=true;  
	
};

function enabler11()
{
	e11++;
	if(e11%2!=0)
		document.getElementById("obc_1").hidden=false;
	else
	    document.getElementById("obc_1").hidden=true;  
	
};
function enabler21()
{
	e21++;
	if(e21%2!=0)
		document.getElementById("obc_2").hidden=false;
	else
	    document.getElementById("obc_2").hidden=true;  
	
};
function enabler31()
{
	e31++;
	if(e31%2!=0)
		document.getElementById("obc_3").hidden=false;
	else
	    document.getElementById("obc_3").hidden=true;  
	
};

function enabler12()
{
	e12++;
	if(e12%2!=0)
		document.getElementById("gn_1").hidden=false;
	else
	    document.getElementById("gn_1").hidden=true;  
	
};
function enabler22()
{
	e22++;
	if(e22%2!=0)
		document.getElementById("gn_2").hidden=false;
	else
	    document.getElementById("gn_2").hidden=true;  
	
};
function enabler32()
{
	e32++;
	if(e32%2!=0)
		document.getElementById("gn_3").hidden=false;
	else
	    document.getElementById("gn_3").hidden=true;  
	
};
</script>
<br>

<input type="hidden" name="do" value='act' />
<input type="submit" name="submit" value="Submit"> 
			   
<br>
<!---
<label for='name' >CGPA Criteria for M.Tech: </label><br>
<input type=text name=m_c id=m_c value=''/><br/>

-->
</form>

<div>
  <h2>Candidate Details</h2>
 <br>
 <?php
  $servername="localhost";
       $username="root";
       $pwd="z";
       $conn=  mysql_connect($servername,$username)or die(mysql_error());
       mysql_select_db("test",$conn);
     
 $sql1="select * from list";
    $result1=mysql_query($sql1,$conn) or die(mysql_error());
   // print"<h1>candidate Details:</h1>";
    echo "<table border='1'align='center'>
      <tr>
	<th>Application number</th>
	<th>Full name</th>
	<th>Email-ID</th>
	<th>Community</th>
	<th>Age</th>
	<th>UG grade</th>
	<th>PG grade</th>
	<th>Address for communication</th>
      </tr>";
	while($row = mysql_fetch_array($result1))
      {
      echo "<tr>";
	echo "<td>" .$row['App_no'] . "</td>";
	echo "<td>" . $row['Full_Name'] . "</td>";
	echo "<td>" . $row['email'] . "</td>";
	echo "<td>" . $row['community'] . "</td>";
	echo "<td>" . $row['age'] . "</td>";
	echo "<td>" . $row['bd_agr'] . "</td>";
	echo "<td>" . $row['md_agr'] . "</td>";
	echo "<td>" . $row['Temp_Address'] . "</td>";
	
	echo "</tr>";
	}
      echo "</table>";
    
	?>
 <!--
<ul>

	 <?php
	//$servername="localhost";
   //$username="root";
//$pwd="z";
  //  $conn=  mysql_connect($servername,$username)or die(mysql_error());
    //mysql_select_db("test",$conn);
	//$sql1="create view list as join "
    //$sql="select * from list order by id";
    //$result=mysql_query($sql,$conn) or die(mysql_error());	
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
//	while($row = mysql_fetch_array($result)) {
		//print_r($row);
	   // Name of the person
	//  $strName = $row['App_no'] ;

	   // Create a link to person.php with the id-value in the URL
	  // $strLink = "<a href = 'cand_details.php?id=" . $row['id'] ."'>" . $strName . "</a>";

	    // List link
	   //echo "<li>" . $strLink . "</li>";

	  //}

	// Close the database connection
	//mysql_close();
	?>
 */
	</ul>
 -->
</div>


</div>


<script type="text/javascript">
// BeginOAWidget_Instance_2138522: #TabbedPanels2

		var TabbedPanels2 = new Spry.Widget.TabbedPanels2("TabbedPanels2", {
			injectionType: "replace",
			widgetID: "TabbedPanels2",
			autoPlay: false,
			defaultTab: 0,
			enableKeyboardNavigation: true,
			hideHeader: true,
			tabsPosition: "top",
			event:"click",
			stopOnUserAction: true,
			displayInterval: 5000,
			minDuration: 300,
			maxDuration: 500,
			stoppedMinDuration: 100,
			stoppedMaxDuration: 200,
			plugIns:[]
		});

// EndOAWidget_Instance_2138522
</script>
</body>
 <!--<input type='submit' name='Save' value='Save' />-->
 


</html>