<?PHP
session_start();
	include_once('db.php');
	require_once('QOB/qob.php');
	require_once('backendFunctions.php');
	/*require_once("./include/membersite_config.php");
	if(!$fgmembersite->CheckLogin())
	{
	    $fgmembersite->RedirectToURL("login.php");
	    exit;
	}*/

	if(!isset($_SESSION['userId']))
	{
		displayAlert("Please Login to continue");
		RedirectToURL("login.php");
	}
	//var_dump($_FILES);
?>

<!DOCTYPE html">
<html>
	<head >
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
		<title>Application Form</title>
		<!--<script src="Spry-UI-1.7/includes/SpryDOMUtils.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/SpryDOMEffects.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/SpryWidget.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/SpryPanelSet.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/SpryPanelSelector.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/SpryFadingPanels.js" type="text/javascript"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/SpryTabbedPanels2.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/plugins/TabbedPanels2/SpryFadingPanelsPlugin.js" type="text/javascript"></script>
		<script src="Spry-UI-1.7/includes/plugins/TabbedPanels2/SpryTabbedPanelsKeyNavigationPlugin.js" type="text/javascript"></script>
		 <link href="Spry-UI-1.7/css/TabbedPanels2/SpryTabbedPanels2.css" rel="stylesheet" type="text/css" /> -->

		<link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="default.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Matrialize CSS -->
        <link rel="stylesheet" type="text/css" href="css/materialize.min.css" />

        <!-- JQUERY JS-->
        <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

        <!-- Materialize JS -->
        <script type="text/javascript" src="js/materialize.min.js"></script>

	</head>

	<?php 
		/*$userName = $fgmembersite->UserFullName();
		$sqlQuery="select submit_status from fgusers3 where username='$userName'";
		$resultQuery=mysql_query($sqlQuery) or die(mysql_error());
		$row = mysql_fetch_array($resultQuery);
		$resultVal=$row[0];
		if($resultVal==1)
		{
			echo '<script type="text/javascript">window.location="thank-you.php";</script>';
		}
		print '<center><p>Welcome '.'<strong>'.$userName.'</strong>'.'</p></center>';
		$sqlQuery2="select id_user from fgusers3 where username='$userName'";
		$resultQuery2=mysql_query($sqlQuery2) or die(mysql_error());
		$applnNo='';
		while($row = mysql_fetch_array($resultQuery2))
		{
			if($row['id_user'] >= 1 && $row['id_user'] < 10)
			{
				$applnNo='DM14D00'.$row['id_user'];
			}
			else if($row['id_user'] >= 10 && $row['id_user'] < 100)
			{
				$applnNo='DM14D0'.$row['id_user'];
			}
			else
			{
				$applnNo='DM14D'.$row['id_user'];
			}
		}
		print '<center><h3>Application Number <font style="color:#36F">'.$applnNo.'</font></h3></center><br>';*/

		//TILL HERE CODE CORRECTION IS HERE
		$userId=$_SESSION['userId'];

		$sql1 = "select * from qualifications where userId='$userId'";
		 // $sql1="insert into personal_info(App_no) values ('$temp')";
		$result1=mysql_query($sql1) or die(mysql_error());
		if(!$result1||mysql_num_rows($result1)<1)
		{
			//echo 'empty result';
		}
		else
			{
				($row = mysql_fetch_array($result1));
		  	
				$univ_10 = $row['10_instituteName'];
				$univ_12 = $row['12_instituteName'];
				$univ_bd = $row['ug_university'];
				$univ_pg = $row['pg_university'];
				//$univ_o = $row['o_univ'];
				$degree_10 = $row['10_degreeName'];
				$degree_12 = $row['12_degreeName'];
				$degree_bd = $row['ug_degreeName'];
				$degree_pg = $row['pg_degreeName'];
				//$degree_o = $row['o_degree'];
				$marks_10 = $row['10_aggregate'];
				$marks_12 = $row['12_aggregate'];
				$marks_bd = $row['ug_aggregate'];
				$marks_pg = $row['pg_aggregate'];
				//$marks_o = $row['o_marks'];
				$grade_10 = $row['10_gradeFormat'];
				$grade_12 = $row['12_gradeFormat'];
				$grade_bd = $row['ug_gradeFormat'];
				$grade_pg = $row['pg_gradeFormat'];
				//$grade_o = $row['o_grade'];
				$year_10 = $row['10_yearOfPassing'];
				$year_12 = $row['12_yearOfPassing'];
				$year_bd = $row['ug_yearOfPassing'];
				$year_pg = $row['pg_yearOfPassing'];
				//$year_o = $row['o_year'];
				// $bd_1 = $row['bd_1'];
				// $bd_2 = $row['bd_2'];
				// $bd_3 = $row['bd_3'];
				// $bd_4 = $row['bd_4'];
				// $bd_5 = $row['bd_5'];
				// $bd_6 = $row['bd_6'];
				// $bd_7 = $row['bd_7'];
				// $bd_8 = $row['bd_8'];
				// $bd_9 = $row['bd_9'];
				// $bd_10 = $row['bd_10'];
				// $md_1 = $row['md_1'];
				// $md_2 = $row['md_2'];
				// $md_3 = $row['md_3'];
				// $md_4 = $row['md_4'];
				// $md_agr = $row['md_agr'];
				// $bd_agr = $row['bd_agr'];
				// $md_class = $row['md_class'];
				// $bd_class = $row['bd_class'];
			}	
				
		/*$sqlQuery2 = "select * from experience where user_ex='$userName'";
		$resultQuery2=mysql_query($sqlQuery2) or die(mysql_error());
		if(!$resultQuery2||mysql_num_rows($resultQuery2)<1)
		{
			//echo 'empty result';
		}
		else
			while($row = mysql_fetch_array($resultQuery2))
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
			}*/	
				
		$sql3 = "select * from personal_info where userId='$userId'";
		$result3=mysql_query($sql3) or die(mysql_error());
		($row = mysql_fetch_array($result3));
		  	//var_dump($row);
				$Full_Name = $row['fullName'];
				$gender = $row['gender'];
				$dob=$row['dob'];
				$fname = $row['fatherName'];
				$nation=$row['nationality'];
				$marital=$row['maritalStatus'];
				$pc=$row['physicallyChallenged'];
				$com=$row['community'];
				$minority=$row['minority'];
				$pemail = $row['primaryEmail'];
				$aemail = $row['alternateEmail'];
				$Temp_Address = $row['currentAddress'];
				//echo $Temp_Address;
				$T_District = $row['currentDistrict'];
				$T_pincode = $row['currentPincode'];
				$T_mobile_number_country_code = $row['mobileCountryCode'];
				$T_mobile_number = $row['mobileNumber'];
				$perm_Address = $row['permanentAddress'];
				//echo $perm_Address;
				$P_District = $row['permanentDistrict'];
				$P_pincode = $row['permanentPincode'];
				$P_mobile_number_country_code = $row['alternateMobileCountryCode'];
				$P_mobile_number = $row['alternateMobileNumber'];
				$tstate=$row['currentState'];
				$pstate=$row['permanentState'];
				
			
				
		//return  mysql_num_rows($result);
	?>
	<div class="fixed-action-btn" style="bottom: 25px; right: 24px;">
      <a class="btn-floating btn-large red">
        <i class="large mdi-navigation-unfold-more"></i>
      </a>
      <ul>
        <li><a class="btn-floating brown lighten-1" href="#personal_info_tab"><i class="large mdi-action-assignment-ind"></i></a></li>
        <li><a class="btn-floating yellow darken-1" href="#qualification_info_tab"><i class="large mdi-action-assignment"></i></a></li>
        <li><a class="btn-floating green" href="#Enclosures_info_tab"><i class="large mdi-editor-attach-file"></i></a></li>
        <li><a class="btn-floating blue" href="#decleration_info_tab"><i class="large mdi-action-done-all"></i></a></li>
      </ul>
    </div>

	<body>
		<?php require_once("header_logo.php"); ?>
		<div class="row" style="margin-top: 10px; margin-bottom: 0px; background-color: #90a4ae;">
			<div class="col s2 offset-s1" style="padding-top: 5px;">
				<div align="left">
					<a class="waves-effect waves-light btn blue lighten-1" href='change-pwd.php'>Change password</a>
				</div>
			</div>
			<div class="col s5 center" style="color: white;">
				<span style="font-size: 30px;">Ph.D Admission Portal</span>
			</div>
			<div class="col s2" style="padding-top: 5px;">
				<div align="right">
					<a class="waves-effect waves-light btn  red darken-2" href='logout.php'>Logout</a>
				</div>
			</div>
		</div>


		<div style="font-size: 20px; padding-top: 8px;"><center><strong>Application No: <?php echo ($_SESSION["applicationNo"]);?></strong></center> </div>

		<div class="row">
			<div class="col s11">
				<div class="mycontainer">
				<form name="form1" method="post" action="info.php" enctype="multipart/form-data">
	      				<div style="background-color: #5c6bc0; color: white;" id="personal_info_tab" >&nbsp;<i class="small mdi-action-assignment-ind"></i><span style="font-size: 26px;">&nbsp;Personal Info<span></div>
	      					<div><div class="divider"></div><div class="divider"></div><div class="divider"></div><div class="divider"></div>
								<table align="center" class="table hoverable" id="personal_info">
									<tr class="nospace">
										<td >Name<font color=red>&nbsp;*</font> :</td>
										<td ><a class="tooltipped" data-position="top" data-delay="300" data-tooltip="1) Name as recorded in the Matriculation/Secondary Examination Certificate. 2) Please do not use any prefix such as Mr. or Ms. etc."><div class="input-field "><input required="required" onkeypress="return isAlpha(event,errorName);" ondrop="return false;" onpaste="return false;" name='Full_Name' type='text' length='50' id='Full_Name' value="<?php if(isset($Full_Name)) echo $Full_Name;?>" size=40 ><label for="Full_Name">Full Name</label></div></a><span id="errorName" style="color: Red; display: none">* Special Characters & integers are not allowed</span>
										</td>
									</tr>
									      
									<tr  class="nospace">
										<td >
									    	Date Of Birth(dd-mm-yyyy)<font color=red>&nbsp;*</font> :        
									    </td>
										<td ><div class="row col s6">
											<input type="date" class="datepicker" id="date1" name="date1" value="<?php if(isset($dob)) echo ($dob) ?>" />
										</td></div>
									</tr>
									     
									<tr class="nospace">
									    <td >
									    	Gender<font color=red>&nbsp;*</font> :       
									    </td>
									    <td >
									    	<p class="pgender" id="pgender">
										    <input class="with-gap" checked value="Male" <?php if(isset($gender)&&$gender=='Male') echo 'checked="checked"'; ?> name="gender" type="radio" id="male"  />
				      						<label for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				      						<input class="with-gap" value="Female" <?php if(isset($gender)&&$gender=='Female') echo 'checked="checked"'; ?> name="gender" type="radio" id="female"  />
				      						<label for="female">Female</label>
				      						</p>       
									    </td>
									</tr>

									<tr class="nospace">
										<td >
									    	Father's / Husband's Name<font color=red>&nbsp;*</font> :        
									    </td>
										<td ><a class="tooltipped" data-position="top" data-delay="300" data-tooltip="Please do not use any prefix such as Shri or Dr. etc."><div class="input-field ">
									        <input name=fname onkeypress="return isAlpha(event,errorFatherName);" ondrop="return false;" onpaste="return false;" type='text' length='40'  id='fname' value="<?php if(isset($fname)) echo $fname;?>"><label for="fname">Father /Husband's Name</label></div></a><span id="errorFatherName" style="color: Red; display: none">* Special Characters & integers are not allowed</span>  
									    </td>
									</tr>

									<tr class="nospace">
										<td>
									    	Nationality<font color=red>&nbsp;*</font> :        
										</td>
									    <td colspan="2">
									    	<p name='Nationality' id='NationalityId'> 
									    	<!-- <input /> -->
									        <input type="radio" name="nation" checked class="with-gap" value='Indian'<?php if(isset($nation)&&$nation=='Indian') echo 'checked="checked"'; ?> id="india" /><label for="india">India</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									        <input type="radio" name="nation" class="with-gap" value='Outside India'<?php if(isset($nation)&&$nation=='Outside India') echo 'checked="checked"'; ?> id="outside" /><label for="outside">Outside India</label>
									        </p> 
									    </td>
									</tr>
										  <!-- Modified 10 Jan 2011-->
									<tr class="nospace">
										<td>
									    	Marital Status<font color=red>&nbsp;*</font> :       
									    </td>
									    <td >
									    	<select name='Marital_status' id='Marital_status'>
									        <!-- <option value='null' >Select Marital Status</option> -->
									        <option value='Unmarried' <?php if(isset($marital)&&$marital=='Unmarried') echo "selected"; ?>>Single</option>
									        <option value='Married' <?php if(isset($marital)&&$marital=='Married') echo "selected"; ?>>Married</option></select>        
									    </td>
									</tr>
										  <!-- Modified 10 Jan 2011-->
									<tr class="nospace">
										<td>
									    	Physically Challenged :
									    </td>
									    <td>
									    	<select name='Physically_challenged' id='Physically_challenged'>      <option value='No' <?php if(isset($pc)&&$pc=='No') echo "selected"; ?>>No</option>
											<option value='Yes'<?php if(isset($pc)&&$pc=='Yes') echo "selected"; ?>>Yes</option></select> 
										</td>
									</tr>

									<tr class="nospace">
									    <td >
									    	Community<font color=red>&nbsp;*</font> :        
									    </td>
									    <td ><a class="tooltipped" data-position="top" data-delay="300" data-tooltip="Candidates belonging to OBCs but coming in the ' Creamy Layer ' and thus not being entitled to OBC reservation should indicate their community as ' General '">
									    	<select name="community" id="community" >
									        	<option value='General' <?php if(isset($minority)&&$minority=='General') echo "selected"; ?>>General</option>
									            <option value='OBC' <?php if(isset($minority)&&$minority=='OBC') echo "selected"; ?>>OBC</option>
									            <option value='SC' <?php if(isset($minority)&&$minority=='SC') echo "selected"; ?>>SC</option>
									            <option value='ST' <?php if(isset($minority)&&$minority=='ST') echo "selected"; ?>>ST</option></select></a>    
										</td>
									</tr>
											  	  
									<tr class="nospace">
										<td>
									    	If you belong to Minority :
										</td>
										<td nowrap="nowrap">
									  		<select name="Minority" id="Minority" onChange="setMinotry(this.value)">
											<option value="No" selected=selected>No</option>
											<option value="Yes" >Yes</option>
											</select>
										</td>
									</tr>

									<tr class="nospace">
										<td >
									    	Personal Email-ID<font color=red>&nbsp;*</font> :        
										</td>
									    <td >
									    	<div class="input-field ">
									    	<input name='pemail' type="email" length='30' id="pemail" value="<?php if(isset($pemail)) echo $pemail;?>" size=40 title='Personal Email-ID' placeholder='someone@somemail.com' class='validate'></div>
										</td>
									</tr>

									<tr class="nospace">
										<td >
									    	Alternate Email-ID :        
										</td>
									    <td ><div class="input-field ">
									    	<input name='aemail' type="email" length='30' id="aemail" onblur="checkMails()" value="<?php if(isset($aemail)) echo $aemail;?>" size=40 title='Alternate Email-ID' placeholder='otherone@somemail.com' class='validate' /> </div>     
									   	</td>
									</tr>

									<tr class="nospace">
										<td >
									    	<strong>Present Address</strong>        
										</td>
									    <td>
									    	<span class="note">
												[Do not enter your name again in the address field]         
											</span>        
										</td>
									</tr>

									<tr class="nospace">
										<td>
									    	H.No/Street<font color=red>&nbsp;*</font> :        
									    </td>
									    <td ><div class="input-field">
									    	<input name='Temp_Address' type='text' placeholder="Enter your Address" id='Temp_Address' size='40' value="<?php if(isset($Temp_Address)) echo $Temp_Address;?>" length='250' /></div>       
									    </td>
									</tr>

									<tr class="nospace">
										<td>
									    	District/City<font color=red>&nbsp;*</font> :        
										</td>
										<td ><div class="input-field">
									    	<input name='T_District' type='text' id='T_District' size='30' value="<?php if(isset($T_District)) echo $T_District;?>" length='30' onkeypress='return isAlpha(event,errorTempDistrict)' /></div><span id="errorTempDistrict" style="color: Red; display: none">* Special Characters & integers are not allowed</span>        
										</td>
									</tr>

									<tr class="nospace">
										<td>
									    	State/UT<font color=red>&nbsp;*</font> :        
								    	</td>
								        <td ><div class="input-field ">								
											<select name="T_state" id="T_state">
											    <option value="" selected>[ Select State ]</option>
											    <option value="Andaman & Nicobar Island" <?php if(isset($tstate)&&$tstate=='Andaman & Nicobar Island') echo "selected"; ?>>Andaman & Nicobar Island</option>
											    <option value="Andhra Pradesh" <?php if(isset($tstate)&&$tstate=='Andhra Pradesh') echo "selected"; ?>>Andhra Pradesh</option>
											    <option value="Arunachal Pradesh" <?php if(isset($tstate)&&$tstate=='Arunachal Pradesh') echo "selected"; ?>>Arunachal Pradesh</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Assam') echo "selected"; ?>>Assam</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Bihar') echo "selected"; ?>>Bihar</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Chandigarh') echo "selected"; ?>>Chandigarh</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Chattisgarh') echo "selected"; ?>>Chattisgarh</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Dadar & Nagar Haveli') echo "selected"; ?>>Dadar & Nagar Haveli</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Daman & Diu') echo "selected"; ?>>Daman & Diu</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Delhi') echo "selected"; ?>>Delhi</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Goa') echo "selected"; ?>>Goa</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Gujarat') echo "selected"; ?>>Gujarat</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Haryana') echo "selected"; ?>>Haryana</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Himachal Pradesh') echo "selected"; ?>>Himachal Pradesh</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Jammu & Kashmir') echo "selected"; ?>>Jammu & Kashmir</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Jharkhand') echo "selected"; ?>>Jharkhand</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Karnataka') echo "selected"; ?>>Karnataka</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Kerela') echo "selected"; ?>>Kerela</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Lakshadweep') echo "selected"; ?>>Lakshadweep</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Madhya Pradesh') echo "selected"; ?>>Madhya Pradesh</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Maharashtra') echo "selected"; ?>>Maharashtra</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Manipur') echo "selected"; ?>>Manipur</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Meghalaya') echo "selected"; ?>>Meghalaya</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Mizoram') echo "selected"; ?>>Mizoram</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Nagaland') echo "selected"; ?>>Nagaland</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Orrisa') echo "selected"; ?>>Orrisa</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Others') echo "selected"; ?>>Others</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Pondichery') echo "selected"; ?>>Pondichery</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Punjab') echo "selected"; ?>>Punjab</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Rajasthan') echo "selected"; ?>>Rajasthan</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Sikkim') echo "selected"; ?>>Sikkim</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Tamil Nadu') echo "selected"; ?>>Tamil Nadu</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Tripura') echo "selected"; ?>>Tripura</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Uttar Pradesh') echo "selected"; ?>>Uttar Pradesh</option>
											    <option value="" <?php if(isset($tstate)&&$tstate=='Uttrakhand') echo "selected"; ?>>Uttrakhand</option>
												<option value="" <?php if(isset($tstate)&&$tstate=='West Bengal') echo "selected"; ?>>West Bengal</option>          
											</select></div>
										</td>
									</tr>

									<tr class="nospace">
									    <td>
									    	Pincode<font color=red>&nbsp;*</font> :        
								    	</td>
								        <td ><div class="input-field">
									        <input name="T_pincode" type="text" placeholder='Eg: 522007' id="T_pincode" size="6" length="6" value="<?php if(isset($T_pincode)) echo $T_pincode;?>" onkeypress="return isPinCode(event)" ></div><span id="errorPinCode" style="color: Red; display: none">* Pin Code Must be of length 6 </span>
								    	</td>
									</tr>

									<tr class="nospace">
								        <td>
											Mobile :        
										</td>
										<td ><div class="row">
												<div class="col s4">
													<div class="input-field"><input placeholder="countrycode Eg: 91" name="mobileCountryCode" size="3" length="3" type="text" id="T_mobile_number_country_code" value="<?php if(isset($T_mobile_number_country_code)) echo $T_mobile_number_country_code;?>" onkeypress="return isPinCode(event)">
													</div>
												</div>
												<div class="col s8">
													<div class="input-field">
										    	    <input placeholder="mobile number Eg:9988776655" name="T_mobile_number" size="10" length="10" type=text id="T_mobile_number" value="<?php if(isset($T_mobile_number)) echo $T_mobile_number;?>" onkeypress="return isPinCode(event)"></div>        
												</div>								    		
								    		</div>
								    	</td>
								    </tr>

								    <tr class="addpad">
								    	<td>
								    		<input type="checkbox" class="filled-in" id="filled-in-box"  />
      										<label for="filled-in-box">&nbsp;Is permentant Address Same as Present</label>
								    	</td>
								    	<td>
								    		
								    	</td>
								    </tr>

									<tr class="nospace">
										<td >
								 			<strong>Permanent Address</strong>        
										</td>
										<td >
									 		<span class="note">
									  			[Do not enter your name again in the address field]         
											</span>        
										</td>
									</tr>

									<tr class="nospace">
										<td>
											H.NO/Street<font color=red>&nbsp;*</font> : 
										</td>
										<td ><div class="input-field">
											<input name="perm_Address" placeholder="Permenent address" type="text" id="perm_Address" size="40" value="<?php if(isset($perm_Address)) echo $perm_Address ;?>" length="250"  /> </div>      
									 	</td>
									</tr>

									<tr class="nospace">
										<td>
									  		District/City<font color=red>&nbsp;*</font> :        
									  	</td>
										<td >
											<input name="P_District" type=text id="P_District" size="40" value="<?php if(isset($P_District)) echo $P_District;?>" onkeypress="return isAlpha(event,errorPermDistrict)" length="30" ><span id="errorPermDistrict" style="color: Red; display: none">* Special Characters & integers are not allowed</span>        
										</td>
									</tr>

									<tr class="nospace">
										<td>
											State/UT<font color=red>&nbsp;*</font> :        
										</td>
										<td >
											<select name="P_state" id="P_state">
												<option value="" >[ Select State ]</option>
												<option value="Andaman & Nicobar Island"  <?php if(isset($pstate)&&$pstate=='Andaman & Nicobar Island') echo "selected"; ?>>Andaman & Nicobar Island</option>
												<option value="Andhra Pradesh" <?php if(isset($pstate)&&$pstate=='Andhra Pradesh') echo "selected"; ?>>Andhra Pradesh</option>
												<option value="Arunachal Pradesh" <?php if(isset($pstate)&&$pstate=='Arunachal Pradesh') echo "selected"; ?>>Arunachal Pradesh</option>
												<option value="Assam" <?php if(isset($pstate)&&$pstate=='Assam') echo "selected"; ?>>Assam</option>
												<option <?php if(isset($pstate)&&$pstate=='Bihar') echo "selected"; ?>>Bihar</option>
												<option <?php if(isset($pstate)&&$pstate=='Chandigarh') echo "selected"; ?>>Chandigarh</option>
												<option <?php if(isset($pstate)&&$pstate=='Chattisgarh') echo "selected"; ?>>Chattisgarh</option>
												<option <?php if(isset($pstate)&&$pstate=='Dadar & Nagar Haveli') echo "selected"; ?>>Dadar & Nagar Haveli</option>
												<option <?php if(isset($pstate)&&$pstate=='Daman & Diu') echo "selected"; ?>>Daman & Diu</option>
												<option <?php if(isset($pstate)&&$pstate=='Delhi') echo "selected"; ?>>Delhi</option>
												<option <?php if(isset($pstate)&&$pstate=='Goa') echo "selected"; ?>>Goa</option>
												<option <?php if(isset($pstate)&&$pstate=='Gujarat') echo "selected"; ?>>Gujarat</option>
												<option <?php if(isset($pstate)&&$pstate=='Haryana') echo "selected"; ?>>Haryana</option>
												<option <?php if(isset($pstate)&&$pstate=='Himachal Pradesh') echo "selected"; ?>>Himachal Pradesh</option>
												<option <?php if(isset($pstate)&&$pstate=='Jammu & Kashmir') echo "selected"; ?>>Jammu & Kashmir</option>
												<option <?php if(isset($pstate)&&$pstate=='Jharkhand') echo "selected"; ?>>Jharkhand</option>
												<option <?php if(isset($pstate)&&$pstate=='Karnataka') echo "selected"; ?>>Karnataka</option>
												<option <?php if(isset($pstate)&&$pstate=='Kerela') echo "selected"; ?>>Kerela</option>
												<option <?php if(isset($pstate)&&$pstate=='Lakshadweep') echo "selected"; ?>>Lakshadweep</option>
												<option <?php if(isset($pstate)&&$pstate=='Madhya Pradesh') echo "selected"; ?>>Madhya Pradesh</option>
												<option <?php if(isset($pstate)&&$pstate=='Maharashtra') echo "selected"; ?>>Maharashtra</option>
												<option <?php if(isset($pstate)&&$pstate=='Manipur') echo "selected"; ?>>Manipur</option>
												<option <?php if(isset($pstate)&&$pstate=='Meghalaya') echo "selected"; ?>>Meghalaya</option>
												<option <?php if(isset($pstate)&&$pstate=='Mizoram') echo "selected"; ?>>Mizoram</option>
												<option <?php if(isset($pstate)&&$pstate=='Nagaland') echo "selected"; ?>>Nagaland</option>
												<option <?php if(isset($pstate)&&$pstate=='Orrisa') echo "selected"; ?>>Orrisa</option>
												<option <?php if(isset($pstate)&&$pstate=='Others') echo "selected"; ?>>Others</option>
												<option <?php if(isset($pstate)&&$pstate=='Pondichery') echo "selected"; ?>>Pondichery</option>
												<option <?php if(isset($pstate)&&$pstate=='Punjab') echo "selected"; ?>>Punjab</option>
												<option <?php if(isset($pstate)&&$pstate=='Rajasthan') echo "selected"; ?>>Rajasthan</option>
												<option <?php if(isset($pstate)&&$pstate=='Sikkim') echo "selected"; ?>>Sikkim</option>
												<option <?php if(isset($pstate)&&$pstate=='Tamil Nadu') echo "selected"; ?>>Tamil Nadu</option>
												<option <?php if(isset($pstate)&&$pstate=='Tripura') echo "selected"; ?>>Tripura</option>
												<option <?php if(isset($pstate)&&$pstate=='Uttar Pradesh') echo "selected"; ?>>Uttar Pradesh</option>
												<option <?php if(isset($pstate)&&$pstate=='Uttrakhand') echo "selected"; ?>>Uttrakhand</option>
												<option <?php if(isset($pstate)&&$pstate=='West Bengal') echo "selected"; ?>>West Bengal</option>          
											</select>
										</td>
									</tr>

									<tr class="nospace">
										<td>
											Pincode<font color='red'>&nbsp;*</font> :        
										</td>
										<td ><div class="input-field">
											<input name="P_pincode" placeholder="Eg: 522077" type='text' id="P_pincode" size="6" length="6" value="<?php if(isset($P_pincode)) echo $P_pincode;?>" onkeypress="return isNumber(event)"></div>      
										</td>
									</tr>
									<tr class="nospace">
										<td>
											Mobile :        
										</td>
										<td ><div class="row">
												<div class="col s4">
													<input placeholder="country code" name="alternateMobileCountryCode" type="text" id="P_mobile_country_code" size="10" length="10" value="<?php if(isset($P_mobile_number_country_code)) echo $P_mobile_number_country_code;?>"onkeypress="return isNumber(event)">
												</div>
												<div class="col s8">
													<input placeholder="mobile number Eg:9988776655" name="P_mobile_number" type="text" id="P_mobile_number" size="10" length="10" value="<?php if(isset($P_mobile_number)) echo $P_mobile_number;?>"onkeypress="return isNumber(event)">        
												</div>
											</div>										
										</td>
									</tr>
								</table>
							</div>

	      				<div id="qualification_info_tab" style="background-color: #43a047; color: white;">&nbsp;<i class="small mdi-action-assignment"></i><span style="font-size: 30px;">&nbsp;Academic Info</span></div>
						<div ><div class="divider"></div><div class="divider"></div><div class="divider"></div><div class="divider"></div><div >
						 	<div style="font-size:22px;padding-top: 4px; padding-bottom: 4px;"><strong><center>Qualifications</center></strong></div>
						 	<div id="acad_head">
								<table style="font-weight:bold;font-size:13px;">
							        <tr>
						                <td width="20%" bgcolor="#bdbdbd">&nbsp;&nbsp;<b>QUALIFICATION</b></td><td width="80%" bgcolor="#bdbdbd">&nbsp;&nbsp;Details of Universities/Institutions attended (from 10th standard onwards)#<br>
						        		</td>
						            </tr>        
						        </table>

						        <table style="font-weight:bold;font-size:12px;">
						       		<tr>
						       			<td>
						       				<font color="red">(Attested copies of certificates and mark sheets/grade cards will require if called for written test/Interview).</font>
										</td>
									</tr>
						        </table>

						        <table align="center" id="exp_table" style="font-weight:bold;font-size:13px;">
						            <tr>
						                <td width="13%"><b>Exam Passed</b></td>
						                <td width="20%"><b>Univerity/College/Board</b></td>
						                <td width="15%"><b>Discipline</b></td>
						                <td width="13%"><b>Grade Format</b></td>
						                <td width="6%"><b>Aggregate</b></td>
						                <td width="8%"><b>Year of passing</b></td>
						            </tr>
						            <tr >
						                <td width="13%">Class 10th OR Equi.<font color="red">&nbsp;*</font></td>
						                <td width="20%"><input type="text" name="univ_10" id="univ_10" value="<?php if(isset($univ_10)) echo $univ_10;?>" style="width:95%" length="95" onkeypress="return isAlpha(event,errorTenthClass);" title="95 Characters" /><span id="errorTenthClass" style="color: Red; display: none">* Special Characters & integers are not allowed</span></td>
						                <td width="15%"><input type="text" name="degree_10" id="degree_10" value="Class 10th OR Equi." style="width:93%"  readonly/></td>
						                
						                <td width="10%">
							                <select name="grade_10" id="grade_10" >
												<option value="MAR-100"<?php if(isset($grade_10)&&$grade_10=="MAR-100") echo "selected"; ?>>% out of 100</option> 
												<option value="CGP-10"<?php if(isset($grade_10)&&$grade_10=="CGP-10") echo "selected"; ?>>CGPA out of 10</option>
												<option value="CPI-4"<?php if(isset($grade_10)&&$grade_10=="CPI-4") echo "selected"; ?>>CPI out of 4</option>
												<option value="CPI-8"<?php if(isset($grade_10)&&$grade_10=="CPI-8") echo "selected"; ?>>CPI out of 8</option>
											</select>
										</td>
						                
						                <td width="6%"><input type="text" name="marks_10" id="marks_10" value="<?php if(isset($marks_10))echo $marks_10;?>" style="width:87%" length="6" onkeypress="return isPercentage(event)"  onblur="check(event);"/></td> 
						                <td width="10%"><input type="text" length="4" name="year_10" id="year_10" value="<?php if(isset($year_10)) echo $year_10;?>" style="width:92%" onkeypress="return isPinCode(event)" title="4 Characters" /></td>    
						            </tr>
						            <tr >
						                <td width="13%">Class 12th OR Equi.<font color="red">&nbsp;*</font></td>
						                <td width="20%"><input type="text" name="univ_12" id="univ_12" value="<?php if(isset($univ_12)) echo $univ_12;?>" style="width:95%" length="95" title="95 Characters" onkeypress="return isAlpha(event,errorTwelfthClass);" /><span id="errorTwelfthClass" style="color: Red; display: none">* Special Characters & integers are not allowed</span></td>
						                <td width="15%"><input type="text" name="degree_12" id="degree_12" value="Class 12th OR Equi." style="width:93%" readonly/></td>
						                
						            	<td width="9%">
							            	<select name="grade_12" id="grade_12" >
								               	
									    		<option value="MAR-100"<?php if(isset($grade_12)&&$grade_12=="MAR-100") echo "selected"; ?>>% out of 100</option>
												<option value="CGP-10"<?php if(isset($grade_12)&&$grade_12=="CGP-10") echo "selected"; ?>>CGPA out of 10</option>
												<option value="CPI-4"<?php if(isset($grade_12)&&$grade_12=="CPI-4") echo "selected"; ?>>CPI out of 4</option>
												<option value="CPI-8"<?php if(isset($grade_12)&&$grade_12=="CPI-8") echo "selected"; ?>>CPI out of 8</option>
							 				</select>
						          		 </td>
						                
						                <td width="8%"><input type="text" name="marks_12" id="marks_12" value="<?php if(isset($marks_12)) echo $marks_12;?>" style="width:87%" length="6" onkeypress="return isPercentage(event)" onblur="check1(event);"/></td>
						                <td width="10%"><input type="text" length="4" name="year_12" id="year_12" value="<?php if(isset($year_12)) echo $year_12;?>" style="width:92%" title="4 Characters" onkeypress="return isPinCode(event)"/></td>                
						            </tr>
						            <tr class="nopsace">
						                <td width="13%">BachelorDegree or Equi.<font color="red">*</font></td>
						                <td width="20%"><input class="validate[required]" type="text" name="bd_univ" id="bd_univ" value="<?php if(isset($univ_bd)) echo $univ_bd;?>" style="width:95%" length="95" title="95 Characters" onkeypress="return isAlpha(event,errorBachelor);"/><span id="errorBachelor" style="color: Red; display: none">* Special Characters & integers are not allowed</span></td>
						                <td width="15%"><input class="validate[required]" type="text" placeholder="Eg: Computer Science Engg" name="bd_degree" id="bd_degree" value="<?php if(isset($degree_bd)) echo $degree_bd;?>" style="width:93%" length="45" title="45 Characters" onkeypress="return isAlpha(event,errorBachelorDegree);" /><span id="errorBachelorDegree" style="color: Red; display: none">* Special Characters & integers are not allowed</span></td>
										<td width="9%">
											<select name="bd_grade" id="bd_grade" >
							                   
							        			<option value="MAR-100"<?php if(isset($grade_bd)&&$grade_bd=="MAR-100") echo "selected"; ?>>% out of 100</option>
								  				<option value="CGP-10"<?php if(isset($grade_bd)&&$grade_bd=="CGP-10") echo "selected"; ?>>CGPA out of 10</option>	
							        			<option value="CPI-4"<?php if(isset($grade_bd)&&$grade_bd=="CPI-4") echo "selected"; ?>>CPI out of 4</option>
							        			<option value="CPI-8"<?php if(isset($grade_bd)&&$grade_bd=="CPI-8") echo "selected"; ?>>CPI out of 8</option>
							         		</select>
						         		</td>
						                <td width="8%"><input type="text" name="bd_marks" id="bd_marks" value="<?php if(isset($marks_bd)) echo $marks_bd;?>" style="width:87%" length="6" onkeypress="return isPercentage(event)" onblur="check2(event);"/></td>
						                <td width="10%"><input type="text" name="bd_year" id="bd_year" value="<?php if(isset($year_bd)) echo $year_bd;?>" style="width:92%" length="4" title="4 Characters" onkeypress="return isPinCode(event)" /></td>
						            </tr>
						            <tr class="nopsace">
						                <td width="13%">Masters degree or Equi.</td>
						                <td width="20%"><input type="text" name="pg_univ" id="pg_univ" value="<?php if(isset($univ_pg)) echo $univ_pg;?>" style="width:95%" length="95" title="95 Characters" onkeypress="return isAlpha(event,errorMasters);"/><span id="errorMasters" style="color: Red; display: none">* Special Characters & integers are not allowed</span></td>
						                <td width="15%"><input type="text" name="pg_degree" placeholder="Eg: Mechanical Engg" id="pg_degree" value="<?php if(isset($degree_pg)) echo $degree_pg;?>" style="width:93%" length="45" title="45 Characters" onkeypress="return isAlpha(event,errorMastersDegree);" /><span id="errorMastersDegree" style="color: Red; display: none">* Special Characters & integers are not allowed</span></td>
						                <td width="9%">
							                <select name="pg_grade" id="pg_grade">
							    				<option value="MAR-100"<?php if(isset($grade_pg)&&$grade_pg=="MAR-100") echo "selected"; ?>>% out of 100</option>
							  					<option value="CGP-10"<?php if(isset($grade_pg)&&$grade_pg=="CGP-10") echo "selected"; ?>>CGPA out of 10</option>
							    				<option value="CPI-4"<?php if(isset($grade_pg)&&$grade_pg=="CPI-4") echo "selected"; ?>>CPI out of 4</option>
							    				<option value="CPI-8"<?php if(isset($grade_pg)&&$grade_pg=="CPI-8") echo "selected"; ?>>CPI out of 8</option>
								 			</select>
						    			</td>
						                <td width="8%"><input type="text" name="pg_marks" id="pg_marks" value="<?php if(isset($marks_pg)) echo $marks_pg;?>" style="width:87%" length="5" onkeypress="return isPercentage(event)" onblur="check3(event);"/></td>
						                <td width="10%"><input type="text" name="pg_year" id="pg_year" value="<?php if(isset($year_pg)) echo $year_pg;?>" style="width:92%" length="4" title="4 Characters" onkeypress="return isPinCode(event)" /></td>
						            </tr>
							   	</table>  
								<p style="text-align:center;color:black;font-size:20px;">Professional Experience<span id="errorOrg" style="color: Red; display: none">* Special Characters & integers are not allowed</span><span id="errorPeriod" style="color: Red; display: none">* Special Characters are not allowed</span></p>
								<br></br>

								<table class="striped responsive-table" align="center" id="proff_table" >
									<th id="pe1">Organization Name</th>
									<th id="pe2">Designation</th>
									<th id="pe3">Period</th>
									<th id="pe4">Nature of work</th>

									<tr>
										<td ><input type="text" placeholder="Name of the organisation" name="org_1" value="<?php if(isset($org_1)) echo $org_1;?>" length="95" onkeypress="return isAlphaNumeric(event,errorOrg);" ></td>
										<td ><input type="text" placeholder="Eg: Team lead, Assosiate" name="des_1" value="<?php if(isset($des_1)) echo $des_1;?>" length="75" onkeypress="return isAlpha(event,errorOrg);" ></td>
										<td ><input type="text" placeholder="Eg: 4 months, 3 Years."name="per_1" value="<?php if(isset($per_1)) echo $per_1;?>" length="10" onkeypress="return isAlphaNumeric(event,errorPeriod);" ></td>
										<td ><input type="text" placeholder="Eg: Design, App Development, Testing" name="work_1" value="<?php if(isset($work_1)) echo $work_1;?>" length="45" onkeypress="return isAlpha(event,errorOrg);" ></td>
								  	</tr>
									<tr>
										<td><input type="text" name="org_2" value="<?php if(isset($org_2)) echo $org_2;?>" length="95" onkeypress="return isAlphaNumeric(event,errorOrg);" ></td>
										<td><input type="text" name="des_2" value="<?php if(isset($des_2)) echo $des_2;?>" length="75" onkeypress="return isAlpha(event,errorOrg);" ></td>
										<td><input type="text" name="per_2" value="<?php if(isset($per_2)) echo $per_2;?>" length="10" onkeypress="return isAlphaNumeric(event,errorPeriod);" ></td>
										<td><input type="text" name="work_2" value="<?php if(isset($work_2)) echo $work_2;?>" length="45" onkeypress="return isAlpha(event,errorOrg);" ></td>
									</tr>
									<tr>
										<td><input type="text" name="org_3" value="<?php if(isset($org_3)) echo $org_3;?>" length="95" onkeypress="return isAlphaNumeric(event,errorOrg);"></td>
										<td><input type="text" name="des_3" value="<?php if(isset($des_3)) echo $des_3;?>" length="75" onkeypress="return isAlpha(event,errorOrg);" ></td>
										<td><input type="text" name="per_3" value="<?php if(isset($per_3)) echo $per_3;?>" length="10" onkeypress="return isAlphaNumeric(event,errorPeriod);" ></td>
										<td><input type="text" name="work_3" value="<?php if(isset($work_3)) echo $work_3;?>" length="45" onkeypress="return isAlpha(event,errorOrg);" ></td>
									</tr>
								</table> 
					    	</div>
						</div>
					</div>

					<br />
      				<div style="background-color: #fb8c00; color: white;" id="Enclosures_info_tab" >&nbsp;<i class=" small mdi-editor-attach-file"></i><span style="font-size: 26px;">Enclosures</span></div>
					<div ><div class="divider"></div><div class="divider"></div><div class="divider"></div><div class="divider"></div>
						<div id="enclo_wrap">
							<div align="left">
								<large><u>Note</u></large><br>
								<small><font color=red>1)Please upload .png file only and not exceeding 1MB.</font></small><br>
								<small><font color=red>2)Uploaded file should be of the format application.number_filename.<br>Eg:DM14D001_PP.png</font>
								</small><br>
								<small><font color=red>3)File name is according to the uploaded file name. </font></small><br><br>
								<table>

									<tr>
										<td>
											<?php 
												$applnNo=$_SESSION['applicationNo'];
												if (file_exists(__DIR__."/upload/" .$applnNo."_PP.jpg"))
												{
													echo '<img src="images/r.png" alt="Uploaded" height="20" width="20">';
												}

												else{
													echo '<img src="images/w.png" alt="Not uploaded" height="20" width="20">';
												}

											?>
										</td>
										<td>
											<label for="fileToUpload">Passport Photo<font color=red>*</font>:</label>
										</td>
										<td>
										      <div class="file-field input-field"><input class="file-path validate" type="text"/><div class="btn waves-effect waves-light"><span>Upload</span>
										      <input type="file" name="fileToUpload" id="fileToUpload" /></div></div>
										    
										</td>
										<td>
											<?php 
											if (file_exists("upload/" .$applnNo."_PP.jpg"))
											{
												echo $applnNo.'_PP.png';

												// echo '<script type="text/javascript">
												// document.getElementById("fileToUpload").disabled=true;
												// </script>';
											}
											?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>

					<br />

      				<div style="background-color: #795548; color: white;" id="decleration_info_tab">&nbsp;<i class="small mdi-image-filter-drama"></i>&nbsp;<span style="font-size: 26px;">Declaration<span></div>
					<div ><div class="divider"></div><div class="divider"></div><div class="divider"></div><div class="divider"></div>
						<div>
							<p>I hereby declare that I have carefully read the instructions and particulars relevant to this admission and that the entries made in this application form are correct to the best of my knowledge and belief. If selected for admission, I promise to abide by the rules and regulations of the Institute.
							I note that the decision of the institute is final in regard to selection for admission and assignment to a particular field of study.
							The Institute shall have the right to expel me from the Institute at any time after my admission, provided it is satisfied that I was admitted
							on false particulars furnished by me or my antecedents prove that my continuance in the Institute is not desirable. I agree that I shall abide by the
							decision of the Institute, which shall be final.</p>
							<div id="declare">
								<div align="left"> 
									<large><u>Note: </u></large><br>
									<small><font color=red>1)Once you submit,the application cannot be modified further. <br> </font></small>
									<small><font color=red>2)Once you click the submit button, you will prompted to download the PDF copy of the application.</font></small><br>
								</div>
									
								<div class="row ">
									<div class="input-field col s6 col-offset-6"><input type="text" name="regplace" length="45" title="45 characters" id="place" onkeypress="return isAlpha(event,errorDecPlace);"><span id="errorDecPlace" style="color: Red; display: none">* Special Characters & integers are not allowed</span>
									<label for="place">Place:</label></div>
								</div>

								<div class="row center">
									<div class="input-field col s6"><input type="text" name="regdate" autocomplete="off" disabled='true' value="<?php echo date("d/m/Y") ?>">
									<label for="date">Date:</label></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row" id="submit_button">
						<div class="col s3 offset-s3">
							<button class="btn waves-effect waves-light" type="submit" name="Save" value="Save">Save
							    <i class="mdi-content-save right"></i>
							</button>
						</div>
						</form>
					</div>
					<div style="margin-top: -62px !important;" class="row col s3 offset-s6">
				<form action = "validate.php" method="POST"> 
						
							<button class="btn waves-effect waves-light" type="submit" name="Submit" value="Submit">Submit
								<i class="mdi-content-send right"></i>
							</button>
				</form>
				</div>
				</div>
			</div>
			<div id="navtopbottom" class="col s1 center">
				<div style="top: 45px; right: 24px; postion: fixed; padding: 10px;">
			    	<a href="#personal_info_tab" class="btn-floating btn-large purple accent-3">
			        	<i style="font-size: 25px;" class="fa fa-chevron-circle-up"></i>
			    	</a>
			    </div>

			    <div style="right: 24px; postion: fixed;">
			    	<a href="#submit_button" class="btn-floating btn-large green accent-3">
			        	<i style="font-size: 25px;" class="fa fa-chevron-circle-down"></i>
			    	</a>
			    </div>
			</div>
		</div>

		<input type="hidden" value="<?php echo $applnNo ?>" name="appln_number">
		<script type="text/javascript">

			$(document).ready(function() {
		    	$('.tooltipped').tooltip({delay: 50});

		    	/*$('.collapsible').collapsible({
			      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
			    });*/

		    	$('.datepicker').pickadate({
		    		min: new Date(1980,1,1),
  					max: new Date(2015,31,31),
				    selectMonths: true, // Creates a dropdown to control month
				    selectYears: 35, // Creates a dropdown of 15 years to control year
				    today: '',
				    format: 'dd/mm/yyyy',
				    formatsubmit: 'dd/mm/yyyy',
  					clear: 'Clear selection',
  					close: 'Ok'
				  });

		    	$('select').material_select();

		    	var elementPosition = $('#navtopbottom').offset();

				$(window).scroll(function(){
				        if($(window).scrollTop() > elementPosition.top){
				              $('#navtopbottom').css('position','fixed').css('top','0');
				              $('#navtopbottom').css('position','fixed').css('right','0');
				        } else {
				            $('#navtopbottom').css('position','static');
				        }    
				});

				$('#filled-in-box').change(function(){
					 if($(this).is(":checked")) {
						
						var tempAddress = $('#Temp_Address').val();
					 	$('#perm_Address').val(tempAddress);

					 	var tempDistrict = $('#T_District').val();
					 	$('#P_District').val(tempDistrict);

					 	var tempState = $('#T_state').val();
					 	//console.log(tempState);
					 	$('#P_state').val(tempState);
					 	// $("#P_state").find("option").each(function(){
					 	// 	if($(this).val()==tempState)
					 	// 	{
					 	// 		alert($(this).html());
					 	// 		$(this).attr("selected","");
					 	// 	}
					 	// });

					 	var tempPin = $('#T_pincode').val();
					 	$('#P_pincode').val(tempPin);

					 	var tempCountryCode = $('#T_mobile_number_country_code').val();
					 	$('#P_mobile_country_code').val(tempCountryCode);

					 	var tempPhone = $('#T_mobile_number').val();
					 	$('#P_mobile_number').val(tempPhone);
					 }
				});

			});

			function checkMails(){
				var pmail = $('#pemail').val();
				var amail = $('#aemail').val();
				if(pmail == amail){
					$('#aemail').val('');
					$('#aemail').focus();
				}
			}

			function validateEmail(emailField){
		        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		        if (reg.test(emailField.value) == false) 
		        {
		            alert('Invalid Email Address');
		            return false;
		        }

		        return true;
			}

			var specialKeys = new Array();
		    specialKeys.push(8); //Backspace
		    specialKeys.push(9); //Tab
		    specialKeys.push(46); //Delete
		    specialKeys.push(36); //Home
		    specialKeys.push(35); //End
		    specialKeys.push(37); //Left
		    specialKeys.push(39); //Right
		    function isAlphaNumeric(e,pid) {
		        var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
		        var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
		        pid.style.display = ret ? "none" : "inline";
		        return ret;
		    }

			function isAlpha(e,pid) {
		        var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
		        var ret = ((keyCode == 32) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
		        //console.log(pid);
		        pid.style.display = ret ? "none" : "inline";
		        return ret;
		    }

			function isNumber(evt) {
			    evt = (evt) ? evt : window.event;
			    var charCode = (evt.which) ? evt.which : evt.keyCode;
			    if (charCode > 31 && charCode!=45 &&(charCode < 48 || charCode > 57)) {
			        return false;
			    }
			    return true;
			}

			function isPinCode(evt) {
			    evt = (evt) ? evt : window.event;
			    var charCode = (evt.which) ? evt.which : evt.keyCode;
			    if (charCode > 31 &&(charCode < 48 || charCode > 57)) {
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

		</script>
	</body>
	 <!--<input type='submit' name='Save' value='Save' />-->
</html>
