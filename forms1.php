<?PHP
	include('db.php');
	require_once("./include/membersite_config.php");

	if(!$fgmembersite->CheckLogin())
	{
	    $fgmembersite->RedirectToURL("login.php");
	    exit;
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
<title>Application Form</title>

<script src="Spry-UI-1.7/includes/SpryDOMUtils.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryDOMEffects.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryWidget.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryPanelSet.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryPanelSelector.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryFadingPanels.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/SpryTabbedPanels2.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/plugins/TabbedPanels2/SpryFadingPanelsPlugin.js" type="text/javascript"></script>
<script src="Spry-UI-1.7/includes/plugins/TabbedPanels2/SpryTabbedPanelsKeyNavigationPlugin.js" type="text/javascript"></script>
<link href="Spry-UI-1.7/css/TabbedPanels2/SpryTabbedPanels2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
/* BeginOAWidget_Instance_2138522: #TabbedPanels2 */

html
{
	background-color:#EEE;
}
/* TabbedPanelsTabGroup */
#TabbedPanels2 .TabbedPanelsTabGroup
{
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
#TabbedPanels2.VTabbedPanels .TabbedPanelsTab
{
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
</head>

<?php 
	$t = $fgmembersite->UserFullName();
	$sql3="select username from fgusers3 where name='$t'";
	$result3=mysql_query($sql3) or die(mysql_error());
	$row = mysql_fetch_array($result3);
	$t1=$row[0];
	print '<center><p>Welcome '.$t1.'</p></center>';

	$sql2="select id_user from fgusers3 where username='$t1'";
	$result2=mysql_query($sql2) or die(mysql_error());
	$temp='';
	while($row = mysql_fetch_array($result2))
	  {
		  if($row['id_user'] >= 1 && $row['id_user'] < 10)
			  {
				//echo "<h2>Your Application number is DM13D00$row[id]</h2>";
				$temp='DM14D00'.$row['id_user'];
			  }
		  else if($row['id_user'] >= 10 && $row['id_user'] < 100)
			  {
				//echo "<h2>Your Application number is DM13D0$row[id]</h2>";
				$temp='DM14D0'.$row['id_user'];
				//echo "$temp";
			  }
		  else
			  {
				//echo "<h2>Your Application number is DM13D$row[id]</h2>";
				$temp='DM14D'.$row['id_user'];
			  }
	  }
	print '<center><h3>Application Number <font style="color:#36F">'.$temp.'</font></h3></center><br>';
	$sql1 = "select * from qualifications where user_key='$t1'";
	 // $sql1="insert into personal_info(App_no) values ('$temp')";
	$result1=mysql_query($sql1) or die(mysql_error());
	if(!$result1||mysql_num_rows($result1)<1)
	{
		//echo 'empty result';
	}
	else
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
			
	$sql2 = "select * from experience where user_ex='$t1'";
	$result2=mysql_query($sql2) or die(mysql_error());
	if(!$result2||mysql_num_rows($result2)<1){
		//echo 'empty result';
	}
	else
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
			
	$sql3 = "select * from personal_info where user_name='$t1'";
	$result3=mysql_query($sql3) or die(mysql_error());
	  while($row = mysql_fetch_array($result3))
	  	{
			$Full_Name = $row['Full_Name'];
			$gender = $row['gender'];
			$dob=date("d-m-Y", strtotime($row['dob']));
			$fname = $row['fname'];
			$nation=$row['Nationality'];
			$marital=$row['Marital_status'];
			$pc=$row['Physically_challenged'];
			$com=$row['community'];
			$minority=$row['Minority'];
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
			$tstate=$row['T_state'];
			$pstate=$row['P_state'];
		}
	//return  mysql_num_rows($result);
?>
<div align="center">
	<?php print "\n<a href='logout.php'>Logout</a><br>\n";?>
</div>

<body>
	
<div id="TabbedPanels2">
<div>
  <h2>Personal Info</h2>
  <br>
<form name="form1" method="post" action="personal_info.php">
   
<table align="center" class="table" cellspacing="6" width="85%">
<tr>
<td width="40%" valign="top">Name<font color=red>*</font> :</td>
<td width="60%" colspan="2">
         <input name='Full_Name' type=text maxlength=50 id='Full_Name' value="<?php if(isset($Full_Name)) echo $Full_Name;?>" size=40 title= 'Name as recorded in Matriculation Certificate'><br><span class=note><b><u>Note 1</u>:</b> Name as recorded in the Matriculation/Secondary Examination Certificate.<br><b><u>Note 2</u>:</b> Please do not use any prefix such as Mr. or Ms. etc.</span> </td></tr>
         
<tr>
        <td valign="top">
          Gender<font color=red>*</font> :        </td>
        <td colspan="2">
        <select name='gender' id='gender' >
        <option value='null'>Select an option</option>
        <option value='Male' <?php if(isset($gender)&&$gender=='Male') echo "selected"; ?>>Male</option>
        <option value='Female' <?php if(isset($gender)&&$gender=='Female') echo "selected"; ?>
        >Female</option></select>        </td></tr>
      
      <tr>
        <td valign="top">
         Date Of Birth<font color=red>*</font> :        </td>
        <td colspan="2">

      <input type="text" id="date1" name="date1" autocomplete="off" value="<?php if(isset($dob)) echo $dob?>" onkeypress="return isNumber(event)"/>
       <span class="note">[Please enter the date in (dd-mm-YYYY) format.]</span> </td></tr>
      
 <tr>
        <td valign="top">
         Father's / Husband's Name<font color=red>*</font> :        </td>
        <td colspan="2">
         <input name=fname type=text maxlength=30 size=40 id=fname value="<?php if(isset($fname)) echo $fname;?>"><br>
        <span class="note">[Please do not use any prefix such as Shri or Dr. etc.]</span>        </td>
      </tr>
      <tr>
        <td>
         Nationality<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name='Nationality' id='Nationality'>
          <option value='null'>Select nationality</option>
          <option value='Indian'<?php if(isset($nation)&&$nation=='Indian') echo "selected"; ?>>Indian</option>
          <option value='Outside India'<?php if(isset($nation)&&$nation=='Outside India') echo "selected"; ?>>Outside India</option>
          </select>          </td>
      </tr>
	  <!-- Modified 10 Jan 2011-->
	        <tr>
        <td>
         Marital Status<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name='Marital_status' id='Marital_status'>
          <option value='0' >Select Marital Status</option>
          <option value='Unmarried' <?php if(isset($marital)&&$marital=='Unmarried') echo "selected"; ?>>Unmarried</option>
          <option value='Married' <?php if(isset($marital)&&$marital=='Married') echo "selected"; ?>>Married</option>
          <option value='Widow/Widower' <?php if(isset($marital)&&$marital=='Widow/Widower') echo "selected"; ?>>Widow/Widower</option>
          <option value='Divorcee' <?php if(isset($marital)&&$marital=='Divorcee') echo "selected"; ?>>Divorcee</option></select>            </td>
      </tr>
	  <!-- Modified 10 Jan 2011-->
      <tr>
        <td>
         Physically Challenged :        </td>
        <td>
      <select name='Physically_challenged' id='Physically_challenged'>      <option value='No' <?php if(isset($pc)&&$pc=='No') echo "selected"; ?>>No</option>
      <option value='Yes'<?php if(isset($pc)&&$pc=='Yes') echo "selected"; ?>>Yes</option></select>  </tr>
      <tr>
        <td valign="top">
         Community<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name="community" id="community" >
             <option value='General' <?php if(isset($minority)&&$minority=='General') echo "selected"; ?>>General</option>
             <option value='OBC' <?php if(isset($minority)&&$minority=='OBC') echo "selected"; ?>>OBC</option>
             <option value='SC' <?php if(isset($minority)&&$minority=='SC') echo "selected"; ?>>SC</option>
             <option value='ST' <?php if(isset($minority)&&$minority=='ST') echo "selected"; ?>>ST</option>          </select><br>
          <span class="note">[Candidates belonging to OBCs but
          coming in the ' Creamy Layer ' and thus not being entitled to
          OBC reservation should indicate their community as ' General ']          </span>        </td>
		  </tr>
		  	  
	        <tr>
        <td>
         If you belong to Minority :</td>
        <td nowrap="nowrap">
  		<select name="Minority" id="Minority" onChange="setMinotry(this.value)">
		<option value="No" selected=selected>No</option>
		<option value="Yes" >Yes</option>
		</select>
		</td>
      </tr>
	  <tr>
        <td width="40%" valign="top">
          Personal Email-ID<font color=red>*</font> :        </td>
        <td width="60%" colspan="2">
         <input name=pemail type=text maxlength=30 id=pemail value="<?php if(isset($pemail)) echo $pemail;?>" size=40 title='Personal Email-ID' onblur="validateEmail(this);" ><br>        </td>
      </tr>
	<tr>
        <td width="40%" valign="top">
          Alternate Email-ID<font color=red>*</font> :        </td>
        <td width="60%" colspan="2">
         <input name=aemail type=text maxlength=30 id=aemail value="<?php if(isset($aemail)) echo $aemail;?>" size=40 title='Alternate Email-ID' ><br>        </td>
      </tr>
      <tr class="formfieldheading">
        <td colspan="3">
         <strong>Present Address</strong>        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">
         <span class="note">
          [Do not enter your name again in the address field]         </span>        </td>
      </tr>
      <tr>
        <td>
         Address<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=Temp_Address type=text id=Temp_Address size=40 value="<?php if(isset($Temp_Address)) echo $Temp_Address;?>" maxlength=250 >        </td>
      </tr>
      <tr>
        <td>
          District/City<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=T_District type=text id=T_District size=40 value="<?php if(isset($T_District)) echo $T_District;?>" maxlength=50 onkeypress='return alphaonly(event,this)'>        </td>
      </tr>
      <tr>
        <td>
                State/UT<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name="T_state" id="T_state">
            <option value="0">[ Select State ]</option>
          <option value='1' <?php if(isset($tstate)&&$tstate=='1') echo "selected"; ?>>Andaman & Nicobar Island</option>
          <option value='2'<?php if(isset($tstate)&&$tstate=='2') echo "selected"; ?>>Andhra Pradesh</option>
          <option value='3'<?php if(isset($tstate)&&$tstate=='3') echo "selected"; ?>>Arunachal Pradesh</option>
          <option value='4'<?php if(isset($tstate)&&$tstate=='4') echo "selected"; ?>>Assam</option>
          <option value='5'<?php if(isset($tstate)&&$tstate=='5') echo "selected"; ?>>Bihar</option>
          <option value='6'<?php if(isset($tstate)&&$tstate=='6') echo "selected"; ?>>Chandigarh</option>
          <option value='7'<?php if(isset($tstate)&&$tstate=='7') echo "selected"; ?>>Chattisgarh</option>
          <option value='8'<?php if(isset($tstate)&&$tstate=='8') echo "selected"; ?>>Dadar & Nagar Haveli</option>
          <option value='9'<?php if(isset($tstate)&&$tstate=='9') echo "selected"; ?>>Daman & Diu</option>
          <option value='10'<?php if(isset($tstate)&&$tstate=='10') echo "selected"; ?>>Delhi</option>
          <option value='11'<?php if(isset($tstate)&&$tstate=='11') echo "selected"; ?>>Goa</option>
          <option value='12'<?php if(isset($tstate)&&$tstate=='12') echo "selected"; ?>>Gujarat</option>
          <option value='13'<?php if(isset($tstate)&&$tstate=='13') echo "selected"; ?>>Haryana</option>
          <option value='14'<?php if(isset($tstate)&&$tstate=='14') echo "selected"; ?>>Himachal Pradesh</option>
          <option value='15'<?php if(isset($tstate)&&$tstate=='15') echo "selected"; ?>>Jammu & Kashmir</option>
          <option value='16'<?php if(isset($tstate)&&$tstate=='16') echo "selected"; ?>>Jharkhand</option>
          <option value='17'<?php if(isset($tstate)&&$tstate=='17') echo "selected"; ?>>Karnataka</option>
          <option value='18'<?php if(isset($tstate)&&$tstate=='18') echo "selected"; ?>>Kerela</option>
          <option value='19'<?php if(isset($tstate)&&$tstate=='19') echo "selected"; ?>>Lakshadweep</option>
          <option value='20'<?php if(isset($tstate)&&$tstate=='20') echo "selected"; ?>>Madhya Pradesh</option>
          <option value='21'<?php if(isset($tstate)&&$tstate=='21') echo "selected"; ?>>Maharashtra</option>
          <option value='22'<?php if(isset($tstate)&&$tstate=='22') echo "selected"; ?>>Manipur</option>
          <option value='23'<?php if(isset($tstate)&&$tstate=='23') echo "selected"; ?>>Meghalaya</option>
          <option value='24'<?php if(isset($tstate)&&$tstate=='24') echo "selected"; ?>>Mizoram</option>
          <option value='25'<?php if(isset($tstate)&&$tstate=='25') echo "selected"; ?>>Nagaland</option>
          <option value='26'<?php if(isset($tstate)&&$tstate=='26') echo "selected"; ?>>Orrisa</option>
          <option value='27'<?php if(isset($tstate)&&$tstate=='27') echo "selected"; ?>>Others</option>
          <option value='28'<?php if(isset($tstate)&&$tstate=='28') echo "selected"; ?>>Pondichery</option>
          <option value='29'<?php if(isset($tstate)&&$tstate=='29') echo "selected"; ?>>Punjab</option>
          <option value='30'<?php if(isset($tstate)&&$tstate=='30') echo "selected"; ?>>Rajasthan</option>
          <option value='31'<?php if(isset($tstate)&&$tstate=='31') echo "selected"; ?>>Sikkim</option>
          <option value='32'<?php if(isset($tstate)&&$tstate=='32') echo "selected"; ?>>Tamil Nadu</option>
          <option value='33'<?php if(isset($tstate)&&$tstate=='33') echo "selected"; ?>>Tripura</option>
          <option value='34'<?php if(isset($tstate)&&$tstate=='34') echo "selected"; ?>>Uttar Pradesh</option>
          <option value='35'<?php if(isset($tstate)&&$tstate=='35') echo "selected"; ?>>Uttrakhand</option>
          <option value='36'<?php if(isset($tstate)&&$tstate=='36') echo "selected"; ?>>West Bengal</option>
                    </select>          </td>
      </tr>
      <tr>
        <td>
          Pincode<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=T_pincode type=text id=T_pincode size=6 maxlength=6 value="<?php if(isset($T_pincode)) echo $T_pincode;?>" onkeypress="return isNumber(event)">        </td>
      </tr>
	        <tr>
        <td>
          Phone with Area Code :        </td>
        <td colspan="2">
 <input name=T_phone_number type=text id=T_phone_number value="<?php if(isset($T_phone_number)) echo $T_phone_number;?>" onkeypress="return isNumber(event)">        </td>
      </tr>
      <tr>
        <td>
          Mobile :        </td>
        <td colspan="2">
        <input name=T_mobile_number type=text id=T_mobile_number value="<?php if(isset($T_mobile_number)) echo $T_mobile_number;?>" onkeypress="return isNumber(event)">        </td>
      </tr>
      <tr>
      </tr>
      <tr><td></td><td style=" font-style:italic"><input  id="cbn" type="checkbox" onClick="fn(); ">Select if both are same.</td></tr>
      <div id="addr">
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
         Address<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=perm_Address type=text id=perm_Address size=40 value="<?php if(isset($perm_Address)) echo $perm_Address ;?>"
		 maxlength=50 >        </td>
      </tr>
      <tr>
        <td>
          District/City<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=P_District type=text id=P_District size=40 value="<?php if(isset($P_District)) echo $P_District;?>" maxlength=30 >        </td>
      </tr>
      <tr>
        <td>
                State/UT<font color=red>*</font> :        </td>
        <td colspan="2">
          <select name="P_state" id="P_state">
          <option value="0">[ Select State ]</option>
          <option value='1' <?php if(isset($pstate)&&$pstate=='1') echo "selected"; ?>>Andaman & Nicobar Island</option>
          <option value='2'<?php if(isset($pstate)&&$pstate=='2') echo "selected"; ?>>Andhra Pradesh</option>
          <option value='3'<?php if(isset($pstate)&&$pstate=='3') echo "selected"; ?>>Arunachal Pradesh</option>
          <option value='4'<?php if(isset($pstate)&&$pstate=='4') echo "selected"; ?>>Assam</option>
          <option value='5'<?php if(isset($pstate)&&$pstate=='5') echo "selected"; ?>>Bihar</option>
          <option value='6'<?php if(isset($pstate)&&$pstate=='6') echo "selected"; ?>>Chandigarh</option>
          <option value='7'<?php if(isset($pstate)&&$pstate=='7') echo "selected"; ?>>Chattisgarh</option>
          <option value='8'<?php if(isset($pstate)&&$pstate=='8') echo "selected"; ?>>Dadar & Nagar Haveli</option>
          <option value='9'<?php if(isset($pstate)&&$pstate=='9') echo "selected"; ?>>Daman & Diu</option>
          <option value='10'<?php if(isset($pstate)&&$pstate=='10') echo "selected"; ?>>Delhi</option>
          <option value='11'<?php if(isset($pstate)&&$pstate=='11') echo "selected"; ?>>Goa</option>
          <option value='12'<?php if(isset($pstate)&&$pstate=='12') echo "selected"; ?>>Gujarat</option>
          <option value='13'<?php if(isset($pstate)&&$pstate=='13') echo "selected"; ?>>Haryana</option>
          <option value='14'<?php if(isset($pstate)&&$pstate=='14') echo "selected"; ?>>Himachal Pradesh</option>
          <option value='15'<?php if(isset($pstate)&&$pstate=='15') echo "selected"; ?>>Jammu & Kashmir</option>
          <option value='16'<?php if(isset($pstate)&&$pstate=='16') echo "selected"; ?>>Jharkhand</option>
          <option value='17'<?php if(isset($pstate)&&$pstate=='17') echo "selected"; ?>>Karnataka</option>
          <option value='18'<?php if(isset($pstate)&&$pstate=='18') echo "selected"; ?>>Kerela</option>
          <option value='19'<?php if(isset($pstate)&&$pstate=='19') echo "selected"; ?>>Lakshadweep</option>
          <option value='20'<?php if(isset($pstate)&&$pstate=='20') echo "selected"; ?>>Madhya Pradesh</option>
          <option value='21'<?php if(isset($pstate)&&$pstate=='21') echo "selected"; ?>>Maharashtra</option>
          <option value='22'<?php if(isset($pstate)&&$pstate=='22') echo "selected"; ?>>Manipur</option>
          <option value='23'<?php if(isset($pstate)&&$pstate=='23') echo "selected"; ?>>Meghalaya</option>
          <option value='24'<?php if(isset($pstate)&&$pstate=='24') echo "selected"; ?>>Mizoram</option>
          <option value='25'<?php if(isset($pstate)&&$pstate=='25') echo "selected"; ?>>Nagaland</option>
          <option value='26'<?php if(isset($pstate)&&$pstate=='26') echo "selected"; ?>>Orrisa</option>
          <option value='27'<?php if(isset($pstate)&&$pstate=='27') echo "selected"; ?>>Others</option>
          <option value='28'<?php if(isset($pstate)&&$pstate=='28') echo "selected"; ?>>Pondichery</option>
          <option value='29'<?php if(isset($pstate)&&$pstate=='29') echo "selected"; ?>>Punjab</option>
          <option value='30'<?php if(isset($pstate)&&$pstate=='30') echo "selected"; ?>>Rajasthan</option>
          <option value='31'<?php if(isset($pstate)&&$pstate=='31') echo "selected"; ?>>Sikkim</option>
          <option value='32'<?php if(isset($pstate)&&$pstate=='32') echo "selected"; ?>>Tamil Nadu</option>
          <option value='33'<?php if(isset($pstate)&&$pstate=='33') echo "selected"; ?>>Tripura</option>
          <option value='34'<?php if(isset($pstate)&&$pstate=='34') echo "selected"; ?>>Uttar Pradesh</option>
          <option value='35'<?php if(isset($pstate)&&$pstate=='35') echo "selected"; ?>>Uttrakhand</option>
          <option value='36'<?php if(isset($pstate)&&$pstate=='36') echo "selected"; ?>>West Bengal</option>          </select>          </td>
      </tr>
      <tr>
        <td>
          Pincode<font color=red>*</font> :        </td>
        <td colspan="2">
        <input name=P_pincode type=text id=P_pincode size=6 maxlength=6 value="<?php if(isset($P_pincode)) echo $P_pincode;?>" onkeypress="return isNumber(event)">        </td>
      </tr>
	        <tr>
        <td>
          Phone with Area Code :        </td>
        <td colspan="2">
  <!--<input name=area_code type=text id=area_code size=4 maxlength=5 value=''>  --> 
  <input name=P_phone_number type=text id=P_phone_number size=16 maxlength=17 value="<?php if(isset($P_phone_number)) echo $P_phone_number;?> "onkeypress="return isNumber(event)">        </td>
      </tr>
      <tr>
        <td>
          Mobile :        </td>
        <td colspan="2">
        <input name=P_mobile_number type=text id=P_mobile_number size=15 maxlength=15 value="<?php if(isset($P_mobile_number)) echo $P_mobile_number;?>"onkeypress="return isNumber(event)">        </td>
      </tr>
      </div>
</table>
<div align="center">
<input type='submit' name='Save' value='Save' />
</div>
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
                    <td width="20%"><input class="validate[required]" type="text" name="univ_10" id="univ_10" value="<?php if(isset($univ_10)) echo $univ_10;?>" style="width:95%" maxlength="95" title="95 Characters" /></td>
                    <td width="15%"><input class="validate[required]" type="text" name="degree_10" id="degree_10" value="Class 10th OR Equi." style="width:93%"  readonly/></td>
                    
                         <td width="9%"><select name="grade_10" id="grade_10" class="validate[required]">
				   <option value="MAR-100"<?php if(isset($grade_10)&&$grade_10=="MAR-100") echo "selected"; ?>>% out of 100</option> 
<?php 
?>
				   </select>
		</td>
                    
                    <td width="8%"><input type="text" name="marks_10" id="marks_10" value="<?php if(isset($marks_10))echo $marks_10;?>" style="width:87%" maxlength="6" onkeypress="return isPercentage(event)"  onblur="check(event);"/></td> 

               

                    <td width="10%"><input class="validate[required]" type="text" name="year_10" id="year_10" value="<?php if(isset($year_10)) echo $year_10;?>" style="width:92%" maxlength="95" title="95 Characters" /></td>
                  
                </tr>
                <tr>
                    <td width="13%">Class 12th OR Equi.<font color="red"> *</font></td>
                    <td width="20%"><input class="validate[required]" type="text" name="univ_12" id="univ_12" value="<?php if(isset($univ_12)) echo $univ_12;?>" style="width:95%" maxlength="95" title="95 Characters" /></td>
                    <td width="15%"><input class="validate[required]" type="text" name="degree_12" id="degree_12" value="Class 12th OR Equi." style="width:93%" readonly/></td>
                    
                    	<td width="9%"><select name="grade_12" id="grade_12" class="validate[required]">
                                   <option value="0">-- Select --</option>
	  	
        		<option value="MAR-100"<?php if(isset($grade_12)&&$grade_12=="MAR-100") echo "selected"; ?>>% out of 100</option>
				
	 	
        		</select>
               </td>
                    
                    <td width="8%"><input  class="validate[required]" type="text" name="marks_12" id="marks_12" value="<?php if(isset($marks_12)) echo $marks_12;?>" style="width:87%" maxlength="6" onkeypress="return isPercentage(event)" onblur="check1(event);"/></td>

	

                    <td width="10%"><input class="validate[required]" type="text" name="year_12" id="year_12" value="<?php if(isset($year_12)) echo $year_12;?>" style="width:92%" maxlength="95" title="95 Characters" /></td>
                     
                </tr>

                <tr>
                    <td width="13%">Bachelor Degree or Equi.<font color="red"> *</font></td>
                    <td width="20%"><input class="validate[required]" type="text" name="bd_univ" id="bd_univ" value="<?php if(isset($univ_bd)) echo $univ_bd;?>" style="width:95%" maxlength="95" title="95 Characters" /></td>
                    <td width="15%"><input class="validate[required]" type="text" name="bd_degree" id="bd_degree" value="<?php if(isset($degree_bd)) echo $degree_bd;?>" style="width:93%" maxlength="45" title="45 Characters" /></td>
                    
                    	 <td width="9%"><select name="bd_grade" id="bd_grade" class="validate[required]">
                                   <option value="0">-- Select --</option>
        
        <option value="MAR-100"<?php if(isset($grade_bd)&&$grade_bd=="MAR-100") echo "selected"; ?>>% out of 100</option>
				
				
	  <option value="CGP-10"<?php if(isset($grade_bd)&&$grade_bd=="CGP-10") echo "selected"; ?>>CGPA out of 10</option>
              
                      		
        		<option value="CPI-4"<?php if(isset($grade_bd)&&$grade_bd=="CPI-4") echo "selected"; ?>>CPI out of 4</option>
	 	
        		<option value="CPI-8"<?php if(isset($grade_bd)&&$grade_bd=="CPI-8") echo "selected"; ?>>CPI out of 8</option>
              
             </select>
              </td>
                    
                    
                    <td width="8%"><input class="validate[required]" type="text" name="bd_marks" id="bd_marks" value="<?php if(isset($marks_bd)) echo $marks_bd;?>" style="width:87%" maxlength="6" onkeypress="return isPercentage(event)" onblur="check2(event);"/></td>

	

                    <td width="10%"><input class="validate[required]" type="text" name="bd_year" id="bd_year" value="<?php if(isset($year_bd)) echo $year_bd;?>" style="width:92%" maxlength="95" title="95 Characters" /></td>

                </tr>
                <tr>
                    <td width="13%">Masters degree or Equi.</td>
                    <td width="20%"><input type="text" name="pg_univ" id="pg_univ" value="<?php if(isset($univ_pg)) echo $univ_pg;?>" style="width:95%" maxlength="95" title="95 Characters" "/></td>
                    <td width="15%"><input type="text" name="pg_degree" id="pg_degree" value="<?php if(isset($degree_pg)) echo $degree_pg;?>" style="width:93%" maxlength="45" title="45 Characters" "/></td>
                    
                     <td width="9%"><select name="pg_grade" id="pg_grade">
                                   <option value="0">-- Select --</option>
	
        
        <option value="MAR-100"<?php if(isset($grade_pg)&&$grade_pg=="MAR-100") echo "selected"; ?>>% out of 100</option>
				
				
	  <option value="CGP-10"<?php if(isset($grade_pg)&&$grade_pg=="CGP-10") echo "selected"; ?>>CGPA out of 10</option>
              
                      		
        		<option value="CPI-4"<?php if(isset($grade_pg)&&$grade_pg=="CPI-4") echo "selected"; ?>>CPI out of 4</option>
	 	
        		<option value="CPI-8"<?php if(isset($grade_pg)&&$grade_pg=="CPI-8") echo "selected"; ?>>CPI out of 8</option>
        
		 </select>
         </td>
                    
                    
                    <td width="8%"><input type="text" name="pg_marks" id="pg_marks" value="<?php if(isset($marks_pg)) echo $marks_pg;?>" style="width:87%" maxlength="5" onkeypress="return isPercentage(event)" onblur="check3(event);"/></td>
	
	  

                    <td width="10%"><input type="text" name="pg_year" id="pg_year" value="<?php if(isset($year_pg)) echo $year_pg;?>" style="width:92%" maxlength="95" title="95 Characters" /></td>
                   
                </tr>

		<tr>
                    <td width="13%">Others</td>
                    <td width="20%"><input type="text" name="o_univ" id="o_univ" value="<?php if(isset($univ_o)) echo $univ_o;?>" style="width:95%" maxlength="95" title="95 Characters" /></td>
                    <td width="15%"><input type="text" name="o_degree" id="o_degree" value="<?php if(isset($degree_o)) echo $degree_o;?>" style="width:93%" maxlength="45" title="45 Characters" /></td>
                    
                    <td width="9%"><select name="o_grade" id="o_grade">
     <option value="0">-- Select --</option>
        
        
        <option value="MAR-100"<?php if(isset($grade_o)&&$grade_o=="MAR-100") echo "selected"; ?>>% out of 100</option>
				
				
	  <option value="CGP-10"<?php if(isset($grade_o)&&$grade_o=="CGP-10") echo "selected"; ?>>CGPA out of 10</option>
              
                      		
        		<option value="CPI-4"<?php if(isset($grade_o)&&$grade_o=="CPI-4") echo "selected"; ?>>CPI out of 4</option>
	 	
        		<option value="CPI-8"<?php if(isset($grade_o)&&$grade_o=="CPI-8") echo "selected"; ?>>CPI out of 8</option>
        
        
        
        </select>
        </td>
                    
                    <td width="8%"><input type="text" name="o_marks" id="o_marks" value="<?php if(isset($marks_o)) echo $marks_o;?>" style="width:87%" maxlength="5" onkeypress="return isPercentage(event)" onblur="check4(event);"/></td>

	 

                    <td width="10%"><input type="text" name="o_year" id="o_year" value="<?php if(isset($year_o)) echo $year_o;?>" style="width:92%" maxlength="95" title="95 Characters" /></td>
                    
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
  <td>CGPA obtained(Out of 10)</td>
  <td><input type="text" name="bd_1" value="<?php if(isset($bd_1)) echo $bd_1;?>" min="0" maxlength="5" size="3" onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_2" value="<?php if(isset($bd_2)) echo $bd_2;?>" min="0" maxlength="5" size="3" onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_3" value="<?php if(isset($bd_3)) echo $bd_3;?>" min="0" maxlength="5" size="3" onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_4" value="<?php if(isset($bd_4)) echo $bd_4;?>" min="0" maxlength="5" size="3"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_5" value="<?php if(isset($bd_5)) echo $bd_5;?>" min="0" maxlength="5" size="3"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_6" value="<?php if(isset($bd_6)) echo $bd_6;?>" min="0" maxlength="5" size="3"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_7" value="<?php if(isset($bd_7)) echo $bd_7;?>" min="0" maxlength="5" size="3"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_8" value="<?php if(isset($bd_8)) echo $bd_8;?>" min="0" maxlength="5" size="3"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_9" value="<?php if(isset($bd_9)) echo $bd_9;?>" min="0" maxlength="5" size="3"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="bd_10" value="<?php if(isset($bd_10)) echo $bd_10;?>" min="0" maxlength="5" size="3"onkeypress="return isPercentage(event)"></td>
</tr>
</table>
<br>
<table border = "1" cellspacing = "0">
<th>Aggregate / Grade</th>
<th>Class</th>
<tr>
  <td><input type="text" name="bd_agr"  maxlength="5"value="<?php if(isset($bd_agr)) echo $bd_agr;?>" onkeypress="return isPercentage(event)" ></td>
  <td><input type="text" name="bd_class" value="<?php if(isset($bd_class)) echo $bd_class;?>" ></td>
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
  <td><p>CGPA obtained(Out of 10)</p></td>
  <td><input type="text" name="md_1" value="<?php if(isset($md_1)) echo $md_1;?>" min="0" maxlength="5"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="md_2" value="<?php if(isset($md_2)) echo $md_2;?>" min="0" maxlength="5"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="md_3" value="<?php if(isset($md_3)) echo $md_3;?>" min="0" maxlength="5"onkeypress="return isPercentage(event)"></td>
  <td><input type="text" name="md_4" value="<?php if(isset($md_4)) echo $md_4;?>" min="0" maxlength="5"onkeypress="return isPercentage(event)"></td>
</tr>
</table>
<br>
<table border = "1" cellspacing = "0">
<th>Aggregate / Grade</th>
<th>Class</th>
<tr>
  <td><input type="text" name="md_agr" value="<?php if(isset($md_agr)) echo $md_agr;?>" ></td>
  <td><input type="text" name="md_class" value="<?php if(isset($md_class)) echo $md_class;?>" ></td>
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
   <td><input type="text" name="org_1" value="<?php if(isset($org_1)) echo $org_1;?>" ></td>
  <td><input type="text" name="des_1" value="<?php if(isset($des_1)) echo $des_1;?>" ></td>
  <td><input type="text" name="per_1" value="<?php if(isset($per_1)) echo $per_1;?>" ></td>
  <td><input type="text" name="work_1" value="<?php if(isset($work_1)) echo $work_1;?>" ></td>
  </tr>
  <tr>
   <td><input type="text" name="org_2" value="<?php if(isset($org_2)) echo $org_2;?>" ></td>
  <td><input type="text" name="des_2" value="<?php if(isset($des_2)) echo $des_2;?>" ></td>
  <td><input type="text" name="per_2" value="<?php if(isset($per_2)) echo $per_2;?>" ></td>
  <td><input type="text" name="work_2" value="<?php if(isset($work_2)) echo $work_2;?>" ></td>
  </tr>
<tr>
   <td><input type="text" name="org_3" value="<?php if(isset($org_3)) echo $org_3;?>" ></td>
  <td><input type="text" name="des_3" value="<?php if(isset($des_3)) echo $des_3;?>" ></td>
  <td><input type="text" name="per_3" value="<?php if(isset($per_3)) echo $per_3;?>" ></td>
  <td><input type="text" name="work_3" value="<?php if(isset($work_3)) echo $work_3;?>" ></td>
  </tr>
<tr>
   <td><input type="text" name="org_4" value="<?php if(isset($org_4)) echo $org_4;?>" ></td>
  <td><input type="text" name="des_4" value="<?php if(isset($des_4)) echo $des_4;?>" ></td>
  <td><input type="text" name="per_4" value="<?php if(isset($per_4)) echo $per_4;?>" ></td>
  <td><input type="text" name="work_4" value="<?php if(isset($work_4)) echo $work_4;?>" ></td>
  </tr>
<tr>
   <td><input type="text" name="org_5" value="<?php if(isset($org_5)) echo $org_5;?>" ></td>
  <td><input type="text" name="des_5" value="<?php if(isset($des_5)) echo $des_5;?>" ></td>
  <td><input type="text" name="per_5" value="<?php if(isset($per_5)) echo $per_5;?>" ></td>
  <td><input type="text" name="work_5" value="<?php if(isset($work_5)) echo $work_5;?>" ></td>
  </tr>

</table>
<br></br> 
            <div align="center">
			<input type='submit' name='Save' value='Save' />
            </div>

 </form>
</div>
 <div>  
  <h2>Enclosures</h2>
  <div align="left">
   <form action="upload.php" method="post"
enctype="multipart/form-data">


<br>

<large><u>Note</u></large><br>
<small><font color=red>1)Please upload only .pdf or .png files only and not exceeding 1MB.</font></small><br>
<small><font color=red>2)Uploaded files should be of the format application.number_filename.<br> Eg:DM14D001_SSLC.pdf <br> Eg:DM14D001_MS.pdf <br> Eg:DM14D001_CC.pdf <br> Eg:DM14D001_DC.pdf <br> Eg:DM14D001_GC.pdf <br> 
Eg:DM14D001_PP.png <br>
 Eg:DM14D001_DS.png  </font></small><br>
<small><font color=red>3)File name is according to the uploaded file name. </font></small><br><br>
<table>
<tr>
<td>
<?php 
 if (file_exists("upload/" .$temp."_DD.pdf"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
		  
          //echo '<style type="text/css"#file1{width:90px;color:transparent;};</style>';

		 }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?>
 </td>
 <td>
<label for="file">Demand Draft<font color=red>*</font>:</label></td>
<td>
<input type="file" name="file[]" id="file1" ></td>
<td>
 <?php 
 if (file_exists("upload/" .$temp."_DD.pdf"))
	      {
	      echo $temp.'_DD.pdf';
		  echo '<script type="text/javascript">
		    //document.getElementById("file1").disabled=true;
		  </script>';
	      }
 ?></td></tr>
 <tr><td>
<?php 
 if (file_exists("upload/" .$temp."_SSLC.pdf"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
	      }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?></td>
 <td>
<label for="file">SSLC 1stPage/Matriculation Certificate<font color=red>*</font>:</label></td>
<td>
<input type="file" name="file[]" id="file2"></td>
<td>
<?php 
 if (file_exists("upload/" .$temp."_SSLC.pdf"))
	      {
	      echo $temp.'_SSLC.pdf';
		  echo '<script type="text/javascript">
		    //document.getElementById("file2").disabled=true;
		  </script>';
	      }
 ?></td></tr>
 <tr><td>
<?php 
 if (file_exists("upload/" .$temp."_MS.pdf"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
	      }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?></td>
 <td>
<label for="file">Marks Sheet/Grade Card<font color=red>*</font>:</label></td>
<td>
<input type="file" name="file[]" id="file3"></td>
<td>
<?php 
 if (file_exists("upload/" .$temp."_MS.pdf"))
	      {
	      echo $temp.'_MS.pdf';
		  echo '<script type="text/javascript">
		    //document.getElementById("file3").disabled=true;
		  </script>';
	      }
 ?></td></tr>
 <tr><td>
<?php 
 if (file_exists("upload/" .$temp."_CC.pdf"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
	      }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?></td>
 <td>
<label for="file">Community Certificate:</label></td>
<td>
<input type="file" name="file[]" id="file4"></td>
<td>
<?php 
 if (file_exists("upload/" .$temp."_CC.pdf"))
	      {
	      echo $temp.'_CC.pdf';
		  echo '<script type="text/javascript">
		    //document.getElementById("file4").disabled=true;
		  </script>';
	      }
 ?></td></tr>
 <tr><td></td><td>
<small>(For Applicable candidates<font color=red>*</font>) </small><br>
</td>
<tr><td>
<?php 
 if (file_exists("upload/" .$temp."_DC.pdf"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
	      }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?></td>
<td>
<label for="file">Doctor's Certificate:</label></td>
<td>
<input type="file" name="file[]" id="file5"></td>
<td>
<?php 
 if (file_exists("upload/" .$temp."_DC.pdf"))
	      {
	      echo $temp.'_DC.pdf';
		  echo '<script type="text/javascript">
		    //document.getElementById("file5").disabled=true;
		  </script>';
	      }
 ?>
</td></tr>
<tr><td></td><td>
<small>(For PH<font color=red>*</font>) </small><br></td></tr>
<tr><td>
<?php 
 if (file_exists("upload/" .$temp."_GC.pdf"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
	      }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?></td>
<td>
<label for="file">GATE Score/NET/etc.,<font color=red>*</font>:</label></td>
<td>
<input type="file" name="file[]" id="file6"></td>
<td>
<?php 
 if (file_exists("upload/" .$temp."_GC.pdf"))
	      {
	      echo $temp.'_GC.pdf';
		  echo '<script type="text/javascript">
		    //document.getElementById("file6").disabled=true;
		  </script>';
	      }
 ?></td></tr>
 <tr><td>
<?php 
 if (file_exists("upload/" .$temp."_PP.png"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
	      }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?></td>
 <td>
<label for="file">Passport Photo<font color=red>*</font>:</label></td>
<td>
<input type="file" name="file[]" id="file7"></td>
<td>
<?php 
 if (file_exists("upload/" .$temp."_PP.png"))
	      {
	      echo $temp.'_PP.png';
		  echo '<script type="text/javascript">
		    //document.getElementById("file7).disabled=true;
		  </script>';
	      }
 ?></td></tr>
 <tr><td>
<?php 
 if (file_exists("upload/" .$temp."_DS.png"))
	      {
	      echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
	      }
		  
else{
	      echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';}
		  
 ?></td>
 <td>
<label for="file">Digital Signature<font color=red>*</font>:</label></td>
<td>
<input type="file" name="file[]" id="file8"></td>
<td>
<?php 
 if (file_exists("upload/" .$temp."_DS.png"))
	      {
	      echo $temp.'_DS.png';
		  echo '<script type="text/javascript">
		    //document.getElementById("file8").disabled=true;
		  </script>';
	      }
 ?></td></tr>
 </table>

 <div align="center">
<input type='submit' name='Save' value='Save' />
</div>
</form>
  </div>
 </div>
  <div>
  <h2>Declaration</h2>
<p>I hereby declare that I have carefully read the instructions and particulars relevant to this admission and that the entries made in this application form are correct to the best of my knowledge and belief. If selected for admission, I promise to abide by the rules and regulations of the Institute.
I note that the decision of the institute is final in regard to selection for admission and assignment to a particular field of study.
The Institute shall have the right to expel me from the Institute at any time after my admission, provided it is satisfied that I was admitted
on false particulars furnished by me or my antecedents prove that my continuance in the Institute is not desirable. I agree that I shall abide by the
decision of the Institute, which shall be final.</p><br />
<div align="left"> 
<large><u>Note: </u></large><br>
<small><font color=red>1)Once you submit,the application cannot be modified further. <br> </font></small>
<small><font color=red>2)Once you click the submit button, you will prompted to download the PDF copy of the application.</font></small><br>
</div>
<FORM ACTION="validate.php" METHOD=post>
<table align="center">
<tr>
<td><label for="place">Place:</label></td>
<td><input type="text" name="regplace" id="place"></td></tr>

<tr><td><label for="date">Date:</label></td>
<td><input type="text" name="regdate" autocomplete="off" disabled='true' value="<?php echo date("d/m/Y") ?>"></td></tr>
<tr><td></td>
<td><input type="submit" name="submit" value="Submit"> </td></tr>
</table>
</form>
</div>
</div>
<input type="hidden" value="<?php echo $temp ?>" name="appln_number">
<script type="text/javascript">

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}


  function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && charCode!=45 &&(charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

 function isPercentage(evt) {
    evt = (evt) ? evt : window.event;
    var charCode1 = (evt.which) ? evt.which : evt.keyCode;
	
    if (charCode1 > 31 && charCode1!=46 &&(charCode1 < 48 || charCode1 > 57)) {
        return false;
    }
    return true;
	
	
}

function check(evt)
{
	var t=document.getElementById('marks_10').value;
	
	if(t<0 || t>100)
	alert('Percentage cannot be greater than 100 or less than 0.');
}
function check1(evt){
	var t1=document.getElementById('marks_12').value;
	if(t1<0 || t1>100)
	alert('Percentage cannot be greater than 100 or less than 0.');
}

function check2(evt)
{
	var t2=document.getElementById('bd_marks').value;
	
	var t4=document.getElementById('bd_grade').value;
	if(t4=="MAR-100")
	{
	    if(t2<0 || t2>100)
	      alert('Percentage cannot be greater than 100 or less than 0.');
	}
	
	else if(t4=="CGP-10")
	{
	    if(t2<0 || t2>10)
	      alert('CGP-10 cannot be greater than 10 or less than 0.');
	}
	else if(t4=="CPI-4")
	{
	    if(t2<0 || t2>4)
	      alert('CPI-4 cannot be greater than 4 or less than 0.');
	}
	
	else if(t4=="CPI-8")
	{
	    if(t2<0 || t2>8)
	      alert('CPI-8 cannot be greater than 8 or less than 0.');
	}
	
}
function check3(evt){
	
	var t5=document.getElementById('pg_grade').value;
	var t3=document.getElementById('pg_marks').value;
	
	if(t5=="MAR-100")
	{
	    if(t3<0 || t3>100)
	      alert('Percentage cannot be greater than 100 or less than 0.');
	}
	
	else if(t5=="CGP-10")
	{
	    if(t3<0 || t3>10)
	      alert('CGP-10 cannot be greater than 10 or less than 0.');
	}
	else if(t5=="CPI-4")
	{
	    if(t3<0 || t3>4)
	      alert('CPI-4 cannot be greater than 4 or less than 0.');
	}
	
	else if(t5=="CPI-8")
	{
	    if(t3<0 || t3>8)
	      alert('CPI-8 cannot be greater than 8 or less than 0.');
	}
	
	
}


function check4(evt){
	
	var t5=document.getElementById('o_grade').value;
	var t3=document.getElementById('o_marks').value;
	
	if(t5=="MAR-100")
	{
	    if(t3<0 || t3>100)
	      alert('Percentage cannot be greater than 100 or less than 0.');
	}
	
	else if(t5=="CGP-10")
	{
	    if(t3<0 || t3>10)
	      alert('CGP-10 cannot be greater than 10 or less than 0.');
	}
	else if(t5=="CPI-4")
	{
	    if(t3<0 || t3>4)
	      alert('CPI-4 cannot be greater than 4 or less than 0.');
	}
	
	else if(t5=="CPI-8")
	{
	    if(t3<0 || t3>8)
	      alert('CPI-8 cannot be greater than 8 or less than 0.');
	}
	
	
}
function fn()
{
	
        $('#addr :input').attr('disabled', true);
    /*} else {
        $('#addr :input').removeAttr('disabled');
    } */  
	
};

window.pressed = function(){
    var a = document.getElementById('aa');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose file";
    }
    else
    {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};

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