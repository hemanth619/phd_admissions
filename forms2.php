<html>
<?php
$servername="localhost";
    $username="root";
    $pwd="no";
    $conn=  mysql_connect($servername,$username)or die(mysql_error());
    mysql_select_db("test",$conn);
session_start();
print("<b><h1>Welcome $_SESSION[user] </h1>");
$t=$_SESSION['user'];
$sql="select id from users where name='$t'";
$result=mysql_query($sql,$conn) or die(mysql_error());
$temp='';
while($row = mysql_fetch_array($result))
  {
	  if($row['id'] >= 1 && $row['id'] < 10)
		  {
			echo "<h2>Your Application number is DM13D00$row[id]</h2>";
			$temp='DM13D00'.$row['id'];
		  }
	  else if($row['id'] >= 10 && $row['id'] < 100)
		  {
			echo "<h2>Your Application number is DM13D0$row[id]</h2>";
			$temp='DM13D0'.$row['id'];
			//echo "$temp";
		  }
	  else
		  {
			echo "<h2>Your Application number is DM13D$row[id]</h2>";
			$temp='DM13D'.$row['id'];
		  }

  }
  
$sql1 = "select * from qualifications where user_key='$t'";
 // $sql1="insert into personal_info(App_no) values ('$temp')";
  $result1=mysql_query($sql1,$conn) or die(mysql_error());
  while($row = mysql_fetch_array($result1))
  	{
		$univ_10 = $row['10_univ'];
		$univ_12 = $row['12_univ'];
		$univ_bd = $row['bd_univ'];
		$univ_pg = $row['pg_univ'];
		$univ_o = $row['o_univ'];
		$degree_10 = $row['10_degree'];
		$degree_12 = $row['12_degree'];
		$degree_bd = $row['bd_degree'];
		$degree_pg = $row['pg_degree'];
		$degree_o = $row['o_degree'];
		$marks_10 = $row['10_marks'];
		$marks_12 = $row['12_marks'];
		$marks_bd = $row['bd_marks'];
		$marks_pg = $row['pg_marks'];
		$marks_o = $row['o_marks'];
		$grade_10 = $row['10_grade'];
		$grade_12 = $row['12_grade'];
		$grade_bd = $row['bd_grade'];
		$grade_pg = $row['pg_grade'];
		$grade_o = $row['o_grade'];
		$year_10 = $row['10_year'];
		$year_12 = $row['12_year'];
		$year_bd = $row['bd_year'];
		$year_pg = $row['pg_year'];
		$year_o = $row['o_year'];
		$bd_1 = $row['bd_1'];
		$bd_2 = $row['bd_2'];
		$bd_3 = $row['bd_3'];
		$bd_4 = $row['bd_4'];
		$bd_5 = $row['bd_5'];
		$bd_6 = $row['bd_6'];
		$bd_7 = $row['bd_7'];
		$bd_8 = $row['bd_8'];
		$bd_9 = $row['bd_9'];
		$bd_10 = $row['bd_10'];
		$md_1 = $row['md_1'];
		$md_2 = $row['md_2'];
		$md_3 = $row['md_3'];
		$md_4 = $row['md_4'];
		$md_agr = $row['md_agr'];
		$bd_agr = $row['bd_agr'];
		$md_class = $row['md_class'];
		$bd_class = $row['bd_class'];
	}	
		
$sql2 = "select * from experience where user_ex='$t'";
  $result2=mysql_query($sql2,$conn) or die(mysql_error());
  while($row = mysql_fetch_array($result2))
  	{
		$org_1 = $row['org_1'];
		$org_2 = $row['org_2'];
		$org_3 = $row['org_3'];
		$org_4 = $row['org_4'];
		$org_5 = $row['org_5'];
		$des_1 = $row['des_1'];
		$des_2 = $row['des_2'];
		$des_3 = $row['des_3'];
		$des_4 = $row['des_4'];
		$des_5 = $row['des_5'];
		$per_1 = $row['per_1'];
		$per_2 = $row['per_2'];
		$per_3 = $row['per_3'];
		$per_4 = $row['per_4'];
		$per_5 = $row['per_5'];
		$work_1 = $row['work_1'];
		$work_2 = $row['work_2'];
		$work_3 = $row['work_3'];
		$work_4 = $row['work_4'];
		$work_5 = $row['work_5'];
	}	
		
$sql3 = "select * from personal_info where user_name='$t'";
  $result3=mysql_query($sql3,$conn) or die(mysql_error());
  while($row = mysql_fetch_array($result3))
  	{
		$Full_Name = $row['Full_Name'];
		/*$gender = $row['gender'];
		$Birth_date = $row['Birth_date'];
		$Birth_month = $row['Birth_month'];
		$Birth_year = $row['Birth_year'];
		*/$fname = $row['fname'];
		$pemail = $row['pemail'];
		$aemail = $row['aemail'];
		$Temp_Address = $row['Temp_Address'];
		$T_District = $row['T_District'];
		$T_pincode = $row['T_pincode'];
		$T_phone_number = $row['T_phone_number'];
		$T_mobile_number = $row['T_mobile_number'];
		$perm_Address = $row['perm_Address'];
		$P_District = $row['P_District'];
		$P_pincode = $row['P_pincode'];
		$P_phone_number = $row['P_phone_number'];
		$P_mobile_number = $row['P_mobile_number'];
		
	}
		
//return  mysql_num_rows($result);
?>
    
<meta charset="utf-8">
 <title>Application form</title>

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

<script type="text/xml">
<!--
<oa:widgets>
  <oa:widget wid="2138522" binding="#TabbedPanels2" />
</oa:widgets>
-->
</script>
<?php print "\n<a href='logout.php'>Logout</a><br>\n";?>
<body>
	
<div id="TabbedPanels2">
<div>
  <h2>Personal Info</h2>
  <br>
<form name="form1" method="post" action="personal_info.php">
    <input type=hidden name=exam_code id=exam_code value=CSP><input type=hidden name=year value=2013><input type=hidden name=notice_no value='04/2013-CSP-05/2013-IFoS'><input type=hidden name=notice_date value='05032013'>    <table align="center" class="table" cellspacing="6" width="85%">
      
	  
	 <input type="hidden" name="username" value="<?php if(isset($t)) echo $t; ?>" >
	  
	  
	  <tr>
        <td width="40%" valign="top">
          <img src="images/formbullet.gif">&nbsp;&nbsp;Name<font color=red>*</font> :        </td>
        <td width="60%" colspan="2">
         <input name='Full_Name' type=text maxlength=30 id='Full_Name' value="<?php echo $Full_Name;?>" size=40 title='Name as recorded in Matriculation Certificate' onkeypress='return alphaonly(event,this)'><br><span class=note><b><u>Note 1</u>:</b> Name as recorded in the Matriculation/Secondary Examination Certificate.<br><b><u>Note 2</u>:</b> Please do not use any prefix such as Mr. or Ms. etc.</span>        </td>
      </tr>
      <tr>
        <td valign="top">
          <img src="images/formbullet.gif">&nbsp;&nbsp;Gender<font color=red>*</font> :        </td>
        <td colspan="2">
        <select name='gender' id='gender' onChange='changefees()'><option value='Male'>Male</option><option value='Female'>Female</option></select>        </td>
      </tr>
      <tr>
        <td valign="top">
         <img src="images/formbullet.gif">&nbsp;&nbsp;Date Of Birth<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name='Birth_date' id='Birth_date'><option class=seldate value=0>Day</option><option value=01>01</option><option value=02>02</option><option value=03>03</option><option value=04>04</option><option value=05>05</option><option value=06>06</option><option value=07>07</option><option value=08>08</option><option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option></select>&nbsp;
          <select name="Birth_month" id="Birth_month">
            <option class=seldate value=0>Month</option><option value=01>Jan</option><option value=02>Feb</option><option value=03>Mar</option><option value=04>Apr</option><option value=05>May</option><option value=06>Jun</option><option value=07>Jul</option><option value=08>Aug</option><option value=09>Sep</option><option value=10>Oct</option><option value=11>Nov</option><option value=12>Dec</option>          </select>&nbsp;
          <select name='Birth_year' id='Birth_year'><option class=seldate value=0>Year</option><option value=1968>1968</option><option value=1969>1969</option><option value=1970>1970</option><option value=1971>1971</option><option value=1972>1972</option><option value=1973>1973</option><option value=1974>1974</option><option value=1975>1975</option><option value=1976>1976</option><option value=1977>1977</option><option value=1978>1978</option><option value=1979>1979</option><option value=1980>1980</option><option value=1981>1981</option><option value=1982>1982</option><option value=1983>1983</option><option value=1984>1984</option><option value=1985>1985</option><option value=1986>1986</option><option value=1987>1987</option><option value=1988>1988</option><option value=1989>1989</option><option value=1990>1990</option><option value=1991>1991</option><option value=1992>1992</option></select><br><span class=note>[Date of Birth as recorded in the Matriculation/Secondary Examination Certificate]</span>         </td>
      </tr>
 <tr>
        <td valign="top">
         <img src="images/formbullet.gif">&nbsp;&nbsp;Father's / Husband's Name<font color=red>*</font> :        </td>
        <td colspan="2">
         <input name=fname type=text maxlength=30 size=40 id=fname value="<?php echo $fname;?>"><br>
        <span class="note">[Please do not use any prefix such as Shri or Dr. etc.]</span>        </td>
      </tr>
      <!-- <tr>
        <td valign="top">
         <img src="images/formbullet.gif">&nbsp;&nbsp;Mother's Name<font color=red>*</font> :        </td>
        <td colspan="2">
         <input name=mname type=text maxlength=30 size=40 id=mname value='' onkeypress='return alphaonly(event,this)'><br>
        <span class="note">[Please do not use any prefix such as Smt or Dr. etc.]</span>        </td>
      </tr>-->
      <tr>
        <td>
         <img src="images/formbullet.gif">&nbsp;&nbsp;Nationality<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name='Nationality' id='Nationality'><option value='Indian'>Indian</option><option value='Non-Indian'>Others</option></select>          </td>
      </tr>
	  <!-- Modified 10 Jan 2011-->
	        <tr>
        <td>
         <img src="images/formbullet.gif">&nbsp;&nbsp;Marital Status<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name='Marital_status' id='Marital_status'><option value=0 class=selInstruct>Select Marital</option><option value='Unmarried' >Unmarried</option><option value='Married' >Married</option><option value='Widow/Widower' >Widow/Widower</option><option value='Divorcee' >Divorcee</option></select>            </td>
      </tr>
	  <!-- Modified 10 Jan 2011-->
      <tr>
        <td>
         <img src="images/formbullet.gif">&nbsp;&nbsp;Physically Challenged :        </td>
        <td>
      <select name='Physically_challenged' id='Physically_challenged'  onChange='phyhan(this.value);changefees0()'><option value='No'>No</option><option value='Yes'>Yes</option></select>
	  </td><!--<td id=ycategory nowrap='nowrap'style='display:none;'>If Yes Select the Category <font color=red>*</font><select name='hcategory' id='hcategory'><option value='0' class=selInstruct>[ Select ]</option><option value=1>Ortho</option><option value=2>Blind</option><option value=3>Deaf-Mute</option></select></td>  -->    </tr>
      <tr>
        <td valign="top">
         <img src="images/formbullet.gif">&nbsp;&nbsp;Community<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name="community" id="community" onChange="changefees1()">
             <option value='General'>General</option><option value='OBC'>OBC</option><option value='SC'>SC</option><option value='ST'>ST</option>          </select><br>
          <span class="note">[Candidates belonging to OBCs but
          coming in the ' Creamy Layer ' and thus not being entitled to
          OBC reservation should indicate their community as ' General ']          </span>        </td>
		  </tr>
		  	  
	        <tr>
        <td>
         <img src="images/formbullet.gif">&nbsp;&nbsp;If you belong to Minority :</td>
        <td nowrap="nowrap">
  		<select name="Minority" id="Minority" onChange="setMinotry(this.value)">
		<option value="No" selected=selected>No</option>
		<option value="Yes" >Yes</option>
		</select>
		</td>
		<!--  <td nowrap="nowrap" id="showminotry" style='display:none;'>     
If Yes Select the Religion<font color=red>*</font>&nbsp;
		  <select name='minority_code' id='minority_code'><option value=0 class=selInstruct>[Select]</option><option value="1" >Muslim</option><option value="2" >Christian</option><option value="3" >Sikh</option><option value="4" >Buddhist</option><option value="5" >Zoroastrian</option></select>    

		  </td>-->
      </tr>
	  <tr>
        <td width="40%" valign="top">
          <img src="images/formbullet.gif">&nbsp;&nbsp;Personal Email-ID<font color=red>*</font> :        </td>
        <td width="60%" colspan="2">
         <input name=pemail type=text maxlength=30 id=pemail value="<?php echo $pemail;?>" size=40 title='Personal Email-ID' onkeypress='return alphaonly(event,this)'><br>        </td>
      </tr>
	<tr>
        <td width="40%" valign="top">
          <img src="images/formbullet.gif">&nbsp;&nbsp;Alternate Email-ID<font color=red>*</font> :        </td>
        <td width="60%" colspan="2">
         <input name=aemail type=text maxlength=30 id=aemail value="<?php echo $aemail;?>" size=40 title='Alternate Email-ID' onkeypress='return alphaonly(event,this)'><br>        </td>
      </tr>
      <tr class="formfieldheading">
        <td colspan="3">
         <strong>Temporary Address</strong>        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">
         <span class="note">
          [Do not enter your name again in the address field]         </span>        </td>
      </tr>
      <tr>
        <td>
         <img src="images/formbullet.gif">&nbsp;&nbsp;Address<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=Temp_Address type=text id=Temp_Address size=40 value="<?php echo $Temp_Address;?>" maxlength=250 onkeypress='return noQuotes(event, this)'>        </td>
      </tr>
      <!--<tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Line 2<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=add2 type=text id=add2 size=40 value='' maxlength=50 onkeypress='return noQuotes(event, this)'>        </td>
      </tr>
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Line 3 :        </td>
        <td colspan="2">
        <input name=po type=text id=po size=40 value='' maxlength=50 onkeypress='return noQuotes(event, this)'>        </td>
      </tr>-->
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;District/City<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=T_District type=text id=T_District size=40 value="<?php echo $T_District;?>" maxlength=50 onkeypress='return alphaonly(event,this)'>        </td>
      </tr>
      <tr>
        <td>
                <img src="images/formbullet.gif">&nbsp;&nbsp;State/UT<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name="T_state" id="T_state">
            <option value="0">[ Select State ]</option>
          <option value='Andaman & Nicobar Island'>Andaman & Nicobar Island</option><option value='Andhra Pradesh'>Andhra Pradesh</option><option value='Arunachal Pradesh'>Arunachal Pradesh</option><option value='Assam'>Assam</option><option value='Bihar'>Bihar</option><option value='Chandigarh'>Chandigarh</option><option value='Chattisgarh'>Chattisgarh</option><option value='Dadar & Nagar Haveli'>Dadar & Nagar Haveli</option><option value='Daman & Diu'>Daman & Diu</option><option value='Delhi'>Delhi</option><option value='Goa'>Goa</option><option value='Gujarat'>Gujarat</option><option value='Haryana'>Haryana</option><option value='Himachal Pradesh'>Himachal Pradesh</option><option value='Jammu & Kashmir'>Jammu & Kashmir</option><option value='Jharkhand'>Jharkhand</option><option value='Karnataka'>Karnataka</option><option value='Kerela'>Kerela</option><option value='Lakshadweep'>Lakshadweep</option><option value='Madhya Pradesh'>Madhya Pradesh</option><option value='Maharashtra'>Maharashtra</option><option value='Manipur'>Manipur</option><option value='Meghalaya'>Meghalaya</option><option value='Mizoram'>Mizoram</option><option value='Nagaland'>Nagaland</option><option value='Orrisa'>Orrisa</option><option value='Others'>Others</option><option value='Pondichery'>Pondichery</option><option value='Punjab'>Punjab</option><option value='Rajasthan'>Rajasthan</option><option value='Sikkim'>Sikkim</option><option value='Tamil Nadu'>Tamil Nadu</option><option value='Tripura'>Tripura</option><option value='Uttar Pradesh'>Uttar Pradesh</option><option value='Uttrakhand'>Uttrakhand</option><option value='West Bengal'>West Bengal</option>          </select>          </td>
      </tr>
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Pincode<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=T_pincode type=text id=T_pincode size=4 maxlength=6 value="<?php echo $T_pincode;?>">        </td>
      </tr>
	        <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Phone with Area Code :        </td>
        <td colspan="2">
 <!-- <input name=area_code type=text id=area_code size=4 maxlength=5 value=''>  --> <input name=T_phone_number type=text id=T_phone_number value="<?php echo $T_phone_number;?>">        </td>
      </tr>
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Mobile :        </td>
        <td colspan="2">
        <input name=T_mobile_number type=text id=T_mobile_number value="<?php echo $T_mobile_number;?>">        </td>
      </tr>
      <tr>
      </tr>
      <tr class="formfieldheading">
        <td colspan="3">
         <strong>Permanent Address</strong>        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">
         <span class="note">
          [Do not enter your name again in the address field]         </span>        </td>
      </tr>
      <tr>
        <td>
         <img src="images/formbullet.gif">&nbsp;&nbsp;Address<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=perm_Address type=text id=perm_Address size=40 value="<?php echo $perm_Address ;?>"
		 maxlength=30 onkeypress='return noQuotes(event, this)'>        </td>
      </tr>
      <!--<tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Line 2<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=add2 type=text id=add2 size=40 value='' maxlength=30 onkeypress='return noQuotes(event, this)'>        </td>
      </tr>
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Line 3 :        </td>
        <td colspan="2">
        <input name=po type=text id=po size=40 value='' maxlength=30 onkeypress='return noQuotes(event, this)'>        </td>
      </tr>-->
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;District/City<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=P_District type=text id=P_District size=40 value="<?php echo $P_District;?>" maxlength=30 onkeypress='return alphaonly(event,this)'>        </td>
      </tr>
      <tr>
        <td>
                <img src="images/formbullet.gif">&nbsp;&nbsp;State/UT<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name="P_state" id="P_state">
          <option value="0">[ Select State ]</option>
          <option value='Andaman & Nicobar Island'>Andaman & Nicobar Island</option><option value='Andhra Pradesh'>Andhra Pradesh</option><option value='Arunachal Pradesh'>Arunachal Pradesh</option><option value='Assam'>Assam</option><option value='Bihar'>Bihar</option><option value='Chandigarh'>Chandigarh</option><option value='Chattisgarh'>Chattisgarh</option><option value='Dadar & Nagar Haveli'>Dadar & Nagar Haveli</option><option value='Daman & Diu'>Daman & Diu</option><option value='Delhi'>Delhi</option><option value='Goa'>Goa</option><option value='Gujarat'>Gujarat</option><option value='Haryana'>Haryana</option><option value='Himachal Pradesh'>Himachal Pradesh</option><option value='Jammu & Kashmir'>Jammu & Kashmir</option><option value='Jharkhand'>Jharkhand</option><option value='Karnataka'>Karnataka</option><option value='Kerela'>Kerela</option><option value='Lakshadweep'>Lakshadweep</option><option value='Madhya Pradesh'>Madhya Pradesh</option><option value='Maharashtra'>Maharashtra</option><option value='Manipur'>Manipur</option><option value='Meghalaya'>Meghalaya</option><option value='Mizoram'>Mizoram</option><option value='Nagaland'>Nagaland</option><option value='Orrisa'>Orrisa</option><option value='Others'>Others</option><option value='Pondichery'>Pondichery</option><option value='Punjab'>Punjab</option><option value='Rajasthan'>Rajasthan</option><option value='Sikkim'>Sikkim</option><option value='Tamil Nadu'>Tamil Nadu</option><option value='Tripura'>Tripura</option><option value='Uttar Pradesh'>Uttar Pradesh</option><option value='Uttrakhand'>Uttrakhand</option><option value='West Bengal'>West Bengal</option>          </select>          </td>
      </tr>
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Pincode<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=P_pincode type=text id=P_pincode size=4 maxlength=6 value="<?php echo $P_pincode;?>">        </td>
      </tr>
	        <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Phone with Area Code :        </td>
        <td colspan="2">
  <!--<input name=area_code type=text id=area_code size=4 maxlength=5 value=''>  --> <input name=P_phone_number type=text id=P_phone_number size=16 maxlength=17 value="<?php echo $P_phone_number;?>">        </td>
      </tr>
      <tr>
        <td>
          <img src="images/formbullet.gif">&nbsp;&nbsp;Mobile :        </td>
        <td colspan="2">
        <input name=P_mobile_number type=text id=P_mobile_number size=15 maxlength=15 value="<?php echo $P_mobile_number;?>">        </td>
      </tr>
</table>
<input type='submit' name='Save' value='Save' />
 </form>
</div>

    <div>
  <h2>Academic Info</h2>
 <br>
  <form name="form3" method="post" action="academic_info.php">
 <p style="text-align:center;font-family:arial;color:black;font-size:24px;">Qualifications and Experience.</p>
 <!--<a style="text-align:left;font-family:arial;color:red;font-size:20px;" href='qualification.html'>Fill the details of qualifications</a><br>-->
<table border="2" width="100%" style="font-weight:bold;font-size:13px;font-family:Times New Roman", Times, serif;>
                <tr>
                    <td width="20%" bgcolor="#bdbdbd">&nbsp;&nbsp;<b>QUALIFICATION</b></td><td width="80%" bgcolor="#bdbdbd">&nbsp;&nbsp;Details of Universities/Institutions attended (from 10th standard onwards)#<br></td>
                </tr>
            </table>

            <table border="0" width="100%" style="font-weight:bold;font-size:12px;font-family:Times New Roman", Times, serif;>
               <tr><td><font color="red">(Attested copies of certificates and mark sheets/grade cards will require if called for written test/Interview).</font></td></tr>
            </table>

            <table border="0" width="100%" style="font-weight:bold;font-size:12px;font-family:Times New Roman", Times, serif;>
                <tr>
                    <td width="13%"><b>Exam Passed</b></td>
                    <td width="20%"><b>Univerity/College/Board</b></td>
                    <td width="15%"><b>Degree(with discipline)</b></td>
                    <td width="8%"><b>%/CGPA/CPI</b></td>
                    <td width="9%"><b>Grade Format</b></td>
                    <!--<td width="15%"><b>Subjects taken</b></td>-->
                    <td width="10%"><b>Year of passing</b></td>
                    <!--<td width="10%"><b>Status</b></td>-->
                </tr>
                <tr>
                    <td width="13%">Class 10th OR Equi.<font color="red"> *</font></td>
                    <td width="20%"><input class="validate[required]" type="text" name="univ_10" id="univ_10" value="<?php echo $univ_10;?>" style="width:95%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="15%"><input class="validate[required]" type="text" name="degree_10" id="degree_10" value="Class 10th OR Equi." style="width:93%"  readonly/></td>
                    <td width="8%"><input  class="validate[required]" type="text" name="marks_10" id="marks_10" value="<?php echo $marks_10;?>" style="width:87%" maxlength="5" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td> 

                    <td width="9%"><select name="grade_10" id="grade_10" class="validate[required]">
				   <option value="<?php echo $grade_10;?>">-- Select --</option>
	
				   <option value="MAR-100">% out of 100</option> 
	
				   <option value="CGP-10">CGPA out of 10</option> 
	
				   <option value="CPI-4">CPI out of 4</option> 
	
				   <option value="CPI-8">CPI out of 8</option> 
	
				   </select>
		</td>

                    <td width="10%"><input class="validate[required]" type="text" name="year_10" id="year_10" value="<?php echo $year_10;?>" style="width:92%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                  <!--  <td width="10%"><input class="validate[required]" type="text" name="year:1" id="year-1" value="" style="width:92%" maxlength="4" onkeypress="return alpha(event);" onblur="return beta(this.id,this.value);"/></td>
                    <td width="10%"><select name="status:1" id="status-1" style="width:94px">
				     <option value="Passed">Passed</option>
				     </select>
		    </td>-->
                </tr>
                <tr>
                    <td width="13%">Class 12th OR Equi.<font color="red"> *</font></td>
                    <td width="20%"><input class="validate[required]" type="text" name="univ_12" id="univ_12" value="<?php echo $univ_12;?>" style="width:95%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="15%"><input class="validate[required]" type="text" name="degree_12" id="degree_12" value="Class 12th OR Equi." style="width:93%" readonly/></td>
                    <td width="8%"><input  class="validate[required]" type="text" name="marks_12" id="marks_12" value="<?php echo $marks_12;?>" style="width:87%" maxlength="5" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>

		<td width="9%"><select name="grade_12" id="grade_12" class="validate[required]">
                                   <option value="<?php echo $grade_12;?>">-- Select --</option>
	  	
        		<option value="MAR-100">% out of 100</option>
				
				<option value="CGP-10">CGPA out of 10</option>
	 	
        		<option value="CPI-4">CPI out of 4</option>
	 	
        		<option value="CPI-8">CPI out of 8</option>
	 	
        		</select>
               </td>

                    <td width="10%"><input class="validate[required]" type="text" name="year_12" id="year_12" value="<?php echo $year_12;?>" style="width:92%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"`/></td>
                     <!--<td width="10%"><input class="validate[required]" type="text" name="year:2" id="year-2" value="" style="width:92%" maxlength="4" onkeypress="return alpha(event);" onblur="return beta(this.id,this.value);"/></td>
		     <td width="10%"><select name="status:2" id="status-2" style="width:94px">
                                     <option value="Passed">Passed</option>
                                     </select>
                    </td> -->
                </tr>

                <tr>
                    <td width="13%">Bachelor Degree or Equi.<font color="red"> *</font></td>
                    <td width="20%"><input class="validate[required]" type="text" name="bd_univ" id="bd_univ" value="<?php echo $univ_bd;?>" style="width:95%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="15%"><input class="validate[required]" type="text" name="bd_degree" id="bd_degree" value="<?php echo $degree_bd;?>" style="width:93%" maxlength="45" title="45 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="8%"><input class="validate[required]" type="text" name="bd_marks" id="bd_marks" value="<?php echo $marks_bd;?>" style="width:87%" maxlength="5" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>

		 <td width="9%"><select name="bd_grade" id="bd_grade" class="validate[required]">
                                   <option value="<?php echo $grade_bd;?>">-- Select --</option>
        
			  <option value="CGP-10">CGPA out of 10</option>
             </select>
              </td>

                    <td width="10%"><input class="validate[required]" type="text" name="bd_year" id="bd_year" value="<?php echo $year_bd;?>" style="width:92%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>

                    <!--<td width="10%"><input class="validate[required]" type="text" name="year:3" id="year-3" value="" style="width:92%" maxlength="4" onkeypress="return alpha(event);" onblur="return beta(this.id,this.value);"/></td>
                    <td width="10%"><select name="status:3" id="status-3" onchange="check_state(this.value);" class="validate[required]">
                                     <option value="">-- Select --</option>
                                     <option value="Passed">Passed</option>
                                     <option value="Appeared">Appeared</option>
                                     </select>
                    </td>-->
                </tr>
                <tr>
                    <td width="13%">Masters degree or Equi.</td>
                    <td width="20%"><input type="text" name="pg_univ" id="pg_univ" value="<?php echo $univ_pg;?>" style="width:95%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="15%"><input type="text" name="pg_degree" id="pg_degree" value="<?php echo $degree_pg;?>" style="width:93%" maxlength="45" title="45 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="8%"><input type="text" name="pg_marks" id="pg_marks" value="<?php echo $marks_pg;?>" style="width:87%" maxlength="5" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
	
	   <td width="9%"><select name="pg_grade" id="pg_grade">
                                   <option value="<?php echo $grade_pg;?>">-- Select --</option>
	
			<option value="CGP-10">CGPA out of 10</option>
        
		 </select>
         </td>

                    <td width="10%"><input type="text" name="pg_year" id="pg_year" value="<?php echo $year_pg;?>" style="width:92%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                   <!-- <td width="10%"><input type="text" name="year:4" id="year-4" value="" style="width:92%" maxlength="4" onkeypress="return alpha(event);" onblur="return beta(this.id,this.value);"/></td>
		    <td width="10%"><select name="status:4" id="status-4">
                                     <option value="">-- Select --</option>
                                     <option value="Passed">Passed</option>
                                     <option value="Appeared">Appeared</option>
                                     </select>
                    </td>-->
                </tr>

		<tr>
                    <td width="13%">Others</td>
                    <td width="20%"><input type="text" name="o_univ" id="o_univ" value="<?php echo $univ_o;?>" style="width:95%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="15%"><input type="text" name="o_degree" id="o_degree" value="<?php echo $degree_o;?>" style="width:93%" maxlength="45" title="45 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <td width="8%"><input type="text" name="o_marks" id="o_marks" value="<?php echo $marks_o;?>" style="width:87%" maxlength="5" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>

	 <td width="9%"><select name="o_grade" id="o_grade">
                                   <option value="<?php echo $grade_o;?>">-- Select --</option>
        
			<option value="CGP-10">CGPA out of 10</option>
        
        </select>
        </td>

                    <td width="10%"><input type="text" name="o_year" id="o_year" value="<?php echo $year_o;?>" style="width:92%" maxlength="95" title="95 Characters" onKeyPress="return alpha(event);" onBlur="return beta(this.id,this.value);"/></td>
                    <!--<td width="10%"><input type="text" name="year:5" id="year-5" value="" style="width:92%" maxlength="4" onkeypress="return alpha(event);" onblur="return beta(this.id,this.value);"/></td>
		    <td width="10%"><select name="status:5" id="status-5">
                                     <option value="">-- Select --</option>
                                     <option value="Passed">Passed</option>
                                     <option value="Appeared">Appeared</option>
                                     </select>
                    </td>-->
                </tr>
            </table>  
            <br><br>
			<p style="text-align:left;font-family:arial;color:black;font-size:20px;">B.E/B.Tech/B.S/B.Sc/Other equivalent</p>
<br></br>

			<table border = "1" cellspacing = "0">
<th>Semester</th>
<th>I</th>
<th>II</th>
<th>III</th>
<th>IV</th>
<th>V</th>
<th>VI</th>
<th>VII</th>
<th>VIII</th>
<th>IX</th>
<th>X</th>
<tr>
  <td>CGPA obtained</td>
  <td><input type="number" name="bd_1" value="<?php echo $bd_1;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_2" value="<?php echo $bd_2;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_3" value="<?php echo $bd_3;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_4" value="<?php echo $bd_4;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_5" value="<?php echo $bd_5;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_6" value="<?php echo $bd_6;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_7" value="<?php echo $bd_7;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_8" value="<?php echo $bd_8;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_9" value="<?php echo $bd_9;?>" min="0" max="100"></td>
  <td><input type="number" name="bd_10" value="<?php echo $bd_10;?>" min="0" max="100"></td>
</tr>
</table>
<br>
<table border = "1" cellspacing = "0">
<th>Aggregate / Grade</th>
<th>Class</th>
<tr>
  <td><input type="text" name="bd_agr" value="<?php echo $bd_agr;?>" ></td>
  <td><input type="text" name="bd_class" value="<?php echo $bd_class;?>" ></td>
</tr>
</table>
<br></br>

<p style="text-align:left;font-family:arial;color:black;font-size:20px;">M.E/M.Tech/M.S/M.Sc/Other equivalent</p>
<br></br>
<table border = "1" cellspacing = "0">
<th>Semester</th>
<th>I</th>
<th>II</th>
<th>III</th>
<th>IV</th>
<tr>
  <td>% of marks obtained</td>
  <td><input type="number" name="md_1" value="<?php echo $md_1;?>" min="0" max="100"></td>
  <td><input type="number" name="md_2" value="<?php echo $md_2;?>" min="0" max="100"></td>
  <td><input type="number" name="md_3" value="<?php echo $md_3;?>" min="0" max="100"></td>
  <td><input type="number" name="md_4" value="<?php echo $md_4;?>" min="0" max="100"></td>
</tr>
</table>
<br>
<table border = "1" cellspacing = "0">
<th>Aggregate / Grade</th>
<th>Class</th>
<tr>
  <td><input type="text" name="md_agr" value="<?php echo $md_agr;?>" ></td>
  <td><input type="text" name="md_class" value="<?php echo $md_class;?>" ></td>
</tr>
</table>
<br></br>
			<p style="text-align:left;font-family:arial;color:black;font-size:20px;">Professional Experience</p>
<br></br>

			<table border = "1" cellspacing = "0">
<th>Organization Name</th>
<th>Designation</th>
<th>Period</th>
<th>Nature of work</th>

<tr>
   <td><input type="text" name="org_1" value="<?php echo $org_1;?>" ></td>
  <td><input type="text" name="des_1" value="<?php echo $des_1;?>" ></td>
  <td><input type="text" name="per_1" value="<?php echo $per_1;?>" ></td>
  <td><input type="text" name="work_1" value="<?php echo $work_1;?>" ></td>
  </tr>
  <tr>
   <td><input type="text" name="org_2" value="<?php echo $org_2;?>" ></td>
  <td><input type="text" name="des_2" value="<?php echo $des_2;?>" ></td>
  <td><input type="text" name="per_2" value="<?php echo $des_2;?>" ></td>
  <td><input type="text" name="work_2" value="<?php echo $work_2;?>" ></td>
  </tr>
<tr>
   <td><input type="text" name="org_3" value="<?php echo $org_3;?>" ></td>
  <td><input type="text" name="des_3" value="<?php echo $des_3;?>" ></td>
  <td><input type="text" name="per_3" value="<?php echo $des_3;?>" ></td>
  <td><input type="text" name="work_3" value="<?php echo $work_3;?>" ></td>
  </tr>
<tr>
   <td><input type="text" name="org_4" value="<?php echo $org_4;?>" ></td>
  <td><input type="text" name="des_4" value="<?php echo $des_4;?>" ></td>
  <td><input type="text" name="per_4" value="<?php echo $des_4;?>" ></td>
  <td><input type="text" name="work_4" value="<?php echo $work_4;?>" ></td>
  </tr>
<tr>
   <td><input type="text" name="org_5" value="<?php echo $org_5;?>" ></td>
  <td><input type="text" name="des_5" value="<?php echo $des_5;?>" ></td>
  <td><input type="text" name="per_5" value="<?php echo $des_5;?>" ></td>
  <td><input type="text" name="work_5" value="<?php echo $work_5;?>" ></td>
  </tr>

</table>
<br></br>
			<input type='submit' name='Save' value='Save' />
                       <!-- <button onclick="window.location.href='forms.php'">Back</button>-->

 </form>
</div>
 <div>  
  <h2>Enclosures</h2>
  <div align="left">
   <form action="upload.php" method="post"
enctype="multipart/form-data">

 <?php 
 if (file_exists("upload/" .$temp."_DD.pdf"))
	      {
	      echo $_FILES["file"]["name"][$i] . " already exists. ";
	      }
 ?>
<br>

<large><u>Note</u></large><br>
<small><font color=red>1)Please upload only .pdf or .png files only and not exceeding 1MB.</font></small><br>
<small><font color=red>2)Uploaded files should be of the format application.number_filename.<br> Eg:DM13D001_SSLC.pdf <br> Eg:DM13D001_MS.pdf <br> Eg:DM13D001_CC.pdf <br> Eg:DM13D001_DC.pdf <br> Eg:DM13D001_GC.pdf <br> Eg:DM13D001_PP.pdf <br> Eg:DM13D001_DS.pdf  </font></small><br>
<small><font color=red>3)File name is according to the uploaded file name. </font></small><br><br>
<label for="file">Demand Draft<font color=red>*</font>:</label>
<input type="file" name="file[]" id="file[]"><br>
<label for="file">SSLC 1stPage/Matriculation Certificate<font color=red>*</font>:</label>
<input type="file" name="file[]" id="file[]"><br>
<label for="file">Marks Sheet/Grade Card<font color=red>*</font>:</label>
<input type="file" name="file[]" id="file[]"><br>
<label for="file">Community Certificate:</label>
<input type="file" name="file[]" id="file[]"><br>
<small>(For Applicable candidates<font color=red>*</font>) </small><br>
<label for="file">Doctor's Certificate:</label>
<input type="file" name="file[]" id="file[]"><br>
<small>(For PH<font color=red>*</font>) </small><br>
<label for="file">GATE Score/NET/etc.,<font color=red>*</font>:</label>
<input type="file" name="file[]" id="file[]"><br>
<label for="file">Passport Photo<font color=red>*</font>:</label>
<input type="file" name="file[]" id="file[]"><br>
<label for="file">Digital Signature<font color=red>*</font>:</label>
<input type="file" name="file[]" id="file[]"><br>
<input type='submit' name='Save' value='Save' />
</form>
  </div>
 </div>
  <div>
  <h2>Declaration</h2>
<p>I hereby declare that I have carefully read the instructions and particulars relevant to this admission and that the entries made in this application form are correct to the best of my knowledge and belief. If selected for admission, I promise to abide by the rules and regulations of the Institute.
I note that the decision of the institute is final in regard to selection for admission and assignment to a particular field of study.
The Institute shall have the right to expel me from the Institute at any time after my admission, provided it is satisfied that I was admitted
on false particulars furnished by me or my antecedents prove that my continuance in the Institute is not desirable. I agree that I shall abide by the
decision of the Institute, which shall be final.</p>
<label for="place">Place:</label>
<input type="text" name="regplace" id="place"><br>
<label for="date">Date:</label>
<input type="date" name="regdate" id="date"><br> 
<input type="submit" name="submit" value="Submit"> 

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