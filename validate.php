<?PHP
session_start();
require_once('db.php');
//require_once("./include/membersite_config.php");
require_once('QOB/qob.php');
require_once("helperFunctions.php");
require_once('backendFunctions.php');

/*if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

$t1 = $fgmembersite->UserFullName();*/

if(!isset($_SESSION['userId']))
{
	displayAlert("Please login to continue.");
	RedirectToURL("login.php");
	exit();
}
$userId=$_SESSION['userId'];
$sql1 = "select * from qualifications where userId='$userId'";
$result1=mysql_query($sql1) or die(mysql_error());
if(!$result1||mysql_num_rows($result1)<1)
{
	//echo 'empty result';
}
else
{
	//$qualificationsInfo=array();
	$qualificationsInfo = mysql_fetch_array($result1);
	{
		$univ_10 = $qualificationsInfo['10_instituteName'];
		$univ_12 = $qualificationsInfo['12_instituteName'];
		$univ_bd = $qualificationsInfo['ug_university'];
		$univ_pg = $qualificationsInfo['pg_university'];
		//$univ_o = $qualificationsInfo['o_univ'];
		$degree_10 = $qualificationsInfo['10_degreeName'];
		$degree_12 = $qualificationsInfo['12_degreeName'];
		$degree_bd = $qualificationsInfo['ug_degreeName'];
		$degree_pg = $qualificationsInfo['pg_degreeName'];
		//$degree_o = $qualificationsInfo['o_degree'];
		$marks_10 = $qualificationsInfo['10_aggregate'];
		$marks_12 = $qualificationsInfo['12_aggregate'];
		// $marks_bd = $qualificationsInfo['ug_aggregate'];
		// $marks_pg = $qualificationsInfo['pg_aggregate'];
		//$marks_o = $qualificationsInfo['o_marks'];
		$grade_10 = $qualificationsInfo['10_gradeFormat'];
		$grade_12 = $qualificationsInfo['12_gradeFormat'];
		$grade_bd = $qualificationsInfo['ug_gradeFormat'];
		$grade_pg = $qualificationsInfo['pg_gradeFormat'];
		//$grade_o = $qualificationsInfo['o_grade'];
		$year_10 = $qualificationsInfo['10_yearOfPassing'];
		$year_12 = $qualificationsInfo['12_yearOfPassing'];
		$year_bd = $qualificationsInfo['ug_yearOfPassing'];
		$year_pg = $qualificationsInfo['pg_yearOfPassing'];
		//$year_o = $qualificationsInfo['o_year'];
		// $bd_1 = $qualificationsInfo['bd_1'];
		// $bd_2 = $qualificationsInfo['bd_2'];
		// $bd_3 = $qualificationsInfo['bd_3'];
		// $bd_4 = $qualificationsInfo['bd_4'];
		// $bd_5 = $qualificationsInfo['bd_5'];
		// $bd_6 = $qualificationsInfo['bd_6'];
		// $bd_7 = $qualificationsInfo['bd_7'];
		// $bd_8 = $qualificationsInfo['bd_8'];
		// $bd_9 = $qualificationsInfo['bd_9'];
		// $bd_10 = $qualificationsInfo['bd_10'];
		// $md_1 = $qualificationsInfo['md_1'];
		// $md_2 = $qualificationsInfo['md_2'];
		// $md_3 = $qualificationsInfo['md_3'];
		// $md_4 = $qualificationsInfo['md_4'];
		
		$md_agr = $qualificationsInfo['ug_aggregate'];
		$bd_agr = $qualificationsInfo['pg_aggregate'];
		// $md_class = $qualificationsInfo['md_class'];
		// $bd_class = $qualificationsInfo['bd_class'];
	}
}	
		
$sql2 = "select * from experience where userId='$userId'";

$result2=mysql_query($sql2) or die(mysql_error());
if(!$result2||mysql_num_rows($result2)<1){
      //echo 'empty result';
}
else
{
	//$experienceInfo=array();
	$experienceInfo = mysql_fetch_array($result2);
	{
		$org_1 = $experienceInfo['org_1'];
		$org_2 = $experienceInfo['org_2'];
		// $org_3 = $experienceInfo['org_3'];
		// $org_4 = $experienceInfo['org_4'];
		// $org_5 = $experienceInfo['org_5'];
		$des_1 = $experienceInfo['des_1'];
		$des_2 = $experienceInfo['des_2'];
		// $des_3 = $experienceInfo['des_3'];
		// $des_4 = $experienceInfo['des_4'];
		// $des_5 = $experienceInfo['des_5'];
		$per_1 = $experienceInfo['per_1'];
		$per_2 = $experienceInfo['per_2'];
		// $per_3 = $experienceInfo['per_3'];
		// $per_4 = $experienceInfo['per_4'];
		// $per_5 = $experienceInfo['per_5'];
		$work_1 = $experienceInfo['work_1'];
		$work_2 = $experienceInfo['work_2'];
		// $work_3 = $experienceInfo['work_3'];
		// $work_4 = $experienceInfo['work_4'];
		// $work_5 = $experienceInfo['work_5'];
	}	
		
}
	
		
	$sql3 = "select * from personal_info where userId='$userId'";
	//echo $sql3;
	$result3=mysql_query($sql3) or die(mysql_error());
	//var_dump($result3);
	//$personalInfo=array();
	$personalInfo = mysql_fetch_array($result3);
	{
		$Full_Name = $personalInfo['fullName'];
		$gender = $personalInfo['gender'];
		$dob = $personalInfo['dob'];
		$fname = $personalInfo['fatherName'];
		$nation=$personalInfo['nationality'];
		$marital=$personalInfo['maritalStatus'];
		$pc=$personalInfo['physicallyChallenged'];
		$com=$personalInfo['community'];
		$minority=$personalInfo['minority'];
		$pemail = $personalInfo['primaryEmail'];
		$aemail = $personalInfo['alternateEmail'];
		$Temp_Address = $personalInfo['currentAddress'];
		$T_District = $personalInfo['currentDistrict'];
		$T_pincode = $personalInfo['currentPincode'];
		//$T_phone_number = $personalInfo['T_phone_number'];
		$T_mobile_number = $personalInfo['mobileNumber'];
		$perm_Address = $personalInfo['permanentAddress'];
		$P_District = $personalInfo['permanentDistrict'];
		$P_pincode = $personalInfo['permanentPincode'];
		//$P_phone_number = $personalInfo['P_phone_number'];
		$P_mobile_number = $personalInfo['alternateMobileNumber'];
		$tstate=$personalInfo['currentState'];
		$pstate=$personalInfo['permanentState'];
		$transactionNo=$personalInfo['transactionNo'];
		//var_dump($personalInfo);
	}

	var_dump($personalInfo);
	


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Validate</title>
	</head>

	<body>
	<?php

	if(!isset($Full_Name) || !isset($gender) || !isset($dob)  || !isset($fname)  || !isset($nation) || !isset($marital) || !isset($pc) || !isset($com) || !isset($pemail)  || !isset($Temp_Address) || !isset($T_District) || !isset($tstate) || !isset($T_pincode)  || !isset($perm_Address) || !isset($P_District) || !isset($pstate) || !isset($P_pincode) || !isset($transactionNo))
	{
		echo '<a href="forms.php">Personal Information</a> not saved. Please save the information before you submit.';
		echo '</head> <body></body></html>'; 
		exit();
	}

	if(!isset($univ_10) || !isset($univ_12) || !isset($univ_bd) || !isset($univ_pg) || !isset($degree_10) || !isset($degree_12) || !isset($degree_bd) || !isset($degree_pg) || !isset($marks_10) || !isset($marks_12) ||
	// !isset($marks_bd) || !isset($marks_pg) ||
	 !isset($grade_10) || !isset($grade_12) || !isset($grade_bd) || !isset($grade_pg) || !isset($year_10) || !isset($year_12)|| !isset($year_bd)|| !isset($year_pg)||
	 //!isset($bd_2) ||!isset($bd_3) ||!isset($bd_4) ||!isset($bd_5) ||!isset($bd_6) ||!isset($bd_7) ||!isset($bd_8) ||
	 !isset($bd_agr) || 
	 //!isset($bd_class) || !isset($md_1) ||!isset($md_2) ||!isset($md_3) ||!isset($md_4) ||
	 !isset($md_agr) 
	 //|| !isset($md_class)
	 )
	{
		/*echo "<script>
			alert('Errors in Academic Information');
			window.location.href='forms.php';
			</script>";*/
		echo '<a href="forms.php">Academic Information</a> not saved. Please save the information before you submit.';
		echo '</head> <body></body></html>';
		exit();
	}




	if($Full_Name=="" || $gender=="" || ($dob=='1970-01-01')  || $fname==""  || $nation="" || $marital=="" || $pc=="" || ($com=="") || ($pemail=="")  || ($Temp_Address=="") || ($T_District=="") || ($tstate=="") || ($T_pincode=="")  ||($perm_Address=="") || ($P_District=="") || ($pstate=="") || ($P_pincode=="" || $transactionNo==""))
	{
		    echo "<br />";
			echo '<center><span style="font-size: 24px;"><a href="forms.php">Some fields are empty in personal information. Make sure you have filled in all the required fields.</a></span></center>';
			echo '</head> <body></body></html>';
			/*echo "<script>
			alert('Errors in Personal Information');
			window.location.href='forms.php';
			</script>";*/
			//window.location.href='forms.php';
	}
	else if(($univ_10=="") || ($univ_12=="") || ($univ_bd=="") || ($univ_pg=="") || ($degree_10=="") || ($degree_12=="") || ($degree_bd=="") || ($degree_pg=="") || ($marks_10=="") || ($marks_12=="") ||
		// ($marks_bd=="") || ($marks_pg=="") || 
		($grade_10=="") || ($grade_12=="") || ($grade_bd=="") || ($grade_pg=="") || ($year_10=="") || ($year_12=="")|| ($year_bd=="")|| ($year_pg=="")||
		//($bd_2=="") ||($bd_3=="") ||($bd_4=="") ||($bd_5=="") ||($bd_6=="") ||($bd_7=="") ||($bd_8=="") ||
		($bd_agr=="") || 
		//($bd_class=="") || ($md_1=="") ||($md_2=="") ||($md_3=="") ||($md_4=="") ||
		($md_agr=="") 
		//|| ($md_class=="")
		)
	{
		    echo "<br />";
			echo '<center><span style="font-size: 24px;">Some Fields are empty in <a href="forms.php">Academic Information</a></span></center>';
			echo '</head> <body></body></html>';
			//if(!isset($univ_pg)) echo 'crap';
			//window.location.href='forms.php';
			/*echo "<script>
			alert('Errors in Academic Information');
			window.location.href='forms.php';
			</script>";*/
	}
	else
	{

		/*if(($Full_Name!="") && ($gender!="") && ($dob!="")  && ($fname!="") && ($nation!="") && ($marital!="") && ($pc!="") && ($com!="") && ($pemail!="")  && ($Temp_Address!="") && ($T_District!="") && ($tstate!="") && ($T_pincode!="")  &&($perm_Address!="") && ($P_District!="") && ($pstate!="") && ($P_pincode!="") && ($univ_10!="") && ($univ_12!="") && ($univ_bd!="") && ($univ_pg!="") && ($degree_10!="") && ($degree_12!="") && ($degree_bd!="") && ($degree_pg!="") && ($marks_10!="") && ($marks_12!="") && ($marks_bd!="") && ($marks_pg!="") && ($grade_10!="") && ($grade_12!="") && ($grade_bd!="") && ($grade_pg!="") && ($year_10!="") && ($year_12!="")&& ($year_bd!="")&& ($year_pg!="")&&($bd_2!="") &&($bd_3!="") &&($bd_4!="") &&($bd_5!="") &&($bd_6!="") &&($bd_7!="") &&($bd_8!="") &&($bd_agr!="") && ($bd_class!="") && ($md_1!="") &&($md_2!="") &&($md_3!="") &&($md_4!="") &&($md_agr!="") && ($md_class!=""))*/
		$message='';
		
		//1
	
		$fullName=$personalInfo['fullName'];
		if(!hasOnlyAlphabets($fullName))
		{
			$message='Enter a Valid name. Only Alphabets\\n';
		}

	
		if($personalInfo['gender']!='Male' && $personalInfo['gender']!='Female')
		{
			$message.='Enter Gender\\n';
		}
		//2
	
		$currentTimestamp=time();
		//var_dump($personalInfo);
		echo $personalInfo['dob']." is the dob";
		if(($dob=dateStringToTimestamp($personalInfo['dob']))==false)
		{
			$message.="Enter a Valid date\\n";
		}
		else if($dob>=$currentTimestamp)
		{
			$message.="Date of Birth cant be greater than current date.\\n";
		}
	
		//3
	
		if(!hasOnlyAlphabets($personalInfo['fatherName']))
		{
			$message.="Enter a Valid Father's Name. Only Alphabets are Allowed.\\n";
		}
	

	
		if(!(filter_var($personalInfo['primaryEmail'], FILTER_VALIDATE_EMAIL)))
		{
			$message.="Enter a valid Primary Email Address.\\n";
		}
	
	
	
		//$check=true;
		if($personalInfo['alternateEmail']!='')
		{
			if(!(filter_var($personalInfo['alternateEmail'], FILTER_VALIDATE_EMAIL)))
			{
				$message.="Enter a valid Alternate Email Address.\\n";
				//$check=false;
			}


			if($personalInfo['primaryEmail']==$personalInfo['alternateEmail'])
			{
				$message.="Primary and Alternate Email Can't be same. Fill in different one else leave it.\\n";
				//$check=false;
			}
		}
		

	
		if(!hasOnlyCharacters('0-9-',$personalInfo['currentPincode']))
		{
			$message.="Please Enter  Valid Pincode. Numerics Only.\\n";
		}
	

		// if($personalInfo['T_phone_number']!='')
		// {

		// 	if(!hasOnlyNumbers($personalInfo['T_phone_number']))
		// 	{
		// 		$message.="Please Enter Valid phone number. Enter Only Numbers.\\n";
		// 	}
		// }

		if($personalInfo['mobileNumber']!='')
		{
			if(!hasOnlyNumbers($personalInfo['mobileNumber']))
			{
				$message.="Please Enter Valid mobile number. Enter Only Numbers.\\n";
			}
		}


	
		if(!hasOnlyCharacters('0-9-',$personalInfo['permanentPincode']))
		{
			$message.="Enter Valid Pincode in Permanent Address.\\n";
		}
	

		// if($personalInfo['P_phone_number']!='')
		// {
		// 	if(!hasOnlyNumbers($personalInfo['P_phone_number']))
		// 	{
		// 		$message.="Enter valid phone number in Permanent Address. Enter Only Numbers.\\n";
		// 	}
		// }

		if($personalInfo['alternateMobileNumber']!='')
		{
			if(!hasOnlyNumbers($personalInfo['mobileNumber']))
			{
				$message.="Enter Valid mobile number in Permanent Address. Enter Only Numbers.\\n";
			}
		}

		//Personal Info validation code ends
		//Experience validation code begins

		if($experienceInfo['org_1']!='')
		{
			if(!hasOnlyAlphaNumerics($experienceInfo['org_1']))
			{
				$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 1.\\n";
			}
		}

		if($experienceInfo['des_1']!='')
		{
			if(trim($experienceInfo['org_1'])=="")
			{
				$message.="You cant enter a Designation Without Organisation in Work experience 1.<br/>";
			}
			if(!hasOnlyAlphabets($experienceInfo['des_1']))
			{
				$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 1.\\n";
			}
		}

		if($experienceInfo['per_1']!='')
		{
			if(trim($experienceInfo['org_1'])=="")
			{
				$message.="You cant enter Work Period Without Organisation in Work experience 1.<br/>";
			}
			if(!hasOnlyAlphaNumerics($experienceInfo['per_1']))
			{
				$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 1.\\n";
			}
		}

		if($experienceInfo['work_1']!='')
		{
			if(trim($experienceInfo['org_1'])=="")
			{
				$message.="You cant enter nature of work Without Organisation in Work experience 1.<br/>";
			}
			if(!hasOnlyAlphaNumerics($experienceInfo['work_1']))
			{
				$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 1.\\n";
			}
		}



		//Work Exp 2

		if($experienceInfo['org_2']!='')
		{
			if(!hasOnlyAlphaNumerics($experienceInfo['org_2']))
			{
				$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 2.\\n";
			}
		}

		if($experienceInfo['des_2']!='')
		{
			if(trim($experienceInfo['org_2'])=="")
			{
				$message.="You cant enter a Designation Without Organisation in Work experience 2.<br/>";
			}
			if(!hasOnlyAlphabets($experienceInfo['des_2']))
			{
				$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 2.\\n";
			}
		}

		if($experienceInfo['per_2']!='')
		{
			if(trim($experienceInfo['org_2'])=="")
			{
				$message.="You cant enter Period Of work Without Organisation in Work experience 2.<br/>";
			}
			if(!hasOnlyAlphaNumerics($experienceInfo['per_2']))
			{
				$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 2.\\n";
			}
		}

		if($experienceInfo['work_2']!='')
		{
			if(trim($experienceInfo['org_2'])=="")
			{
				$message.="You cant enter Nature of work Without Organisation in Work experience 2.<br/>";
			}
			if(!hasOnlyAlphaNumerics($experienceInfo['work_2']))
			{
				$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 2.\\n";
			}
		}

		//work exp 3

		// if($experienceInfo['org_3']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['org_3']))
		// 	{
		// 		$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 3.\\n";
		// 	}
		// }

		// if($experienceInfo['des_3']!='')
		// {
		// 	if(!hasOnlyAlphabets($experienceInfo['des_3']))
		// 	{
		// 		$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 3.\\n";
		// 	}
		// }

		// if($experienceInfo['per_3']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['per_3']))
		// 	{
		// 		$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 3.\\n";
		// 	}
		// }

		// if($experienceInfo['work_3']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['work_3']))
		// 	{
		// 		$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 3.\\n";
		// 	}
		// }


		// //work exp 4
		// if($experienceInfo['org_4']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['org_4']))
		// 	{
		// 		$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 4.\\n";
		// 	}
		// }

		// if($experienceInfo['des_4']!='')
		// {
		// 	if(!hasOnlyAlphabets($experienceInfo['des_4']))
		// 	{
		// 		$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 4.\\n";
		// 	}
		// }

		// if($experienceInfo['per_4']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['per_4']))
		// 	{
		// 		$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 4.\\n";
		// 	}
		// }

		// if($experienceInfo['work_4']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['work_4']))
		// 	{
		// 		$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 4.\\n";
		// 	}
		// }

		// //work exp 5

		// if($experienceInfo['org_5']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['org_5']))
		// 	{
		// 		$message.="Enter a Valid Organisation name. Only Alphanumerics are Allowed in Work Experience 5.\\n";
		// 	}
		// }

		// if($experienceInfo['des_5']!='')
		// {
		// 	if(!hasOnlyAlphabets($experienceInfo['des_5']))
		// 	{
		// 		$message.="Enter A valid Designation. Only Alphabets are Allowed in Work Experience 5.\\n";
		// 	}
		// }

		// if($experienceInfo['per_5']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['per_5']))
		// 	{
		// 		$message.="Enter A valid Experience Period. Only Alpha Numerics are Allowed in Work Experience 5.\\n";
		// 	}
		// }

		// if($experienceInfo['work_5']!='')
		// {
		// 	if(!hasOnlyAlphaNumerics($experienceInfo['work_5']))
		// 	{
		// 		$message.="Only Alpha Numerics are allowed in Nature Of work in work Experience 5.\\n";
		// 	}
		// }


		//Qualifications Validation Starts
	
		$univName_10 = $qualificationsInfo["10_instituteName"];
		if(!hasOnlyAlphabets($univName_10))
		{
			$message = $message."Enter the valid class 10 Board name. Only Alphabhets.\\n";
		}
	
		if(($qualificationsInfo["10_gradeFormat"]!='MAR-100') && ($qualificationsInfo["10_gradeFormat"]!='CGP-10') && ($qualificationsInfo["10_gradeFormat"]!='CPI-4') && ($qualificationsInfo["10_gradeFormat"]!='CPI-8') )
		{
			$message = $message."Enter valid Grading Format for 10th or Equivalent Degree.\\n";
		}
	
		$marks_10 = $qualificationsInfo["10_aggregate"];
		if(!isValidPercentage($marks_10))
		{
			$message = $message."Enter valid percentage for class 10.\\n";
		}
	
	
		$passYear_10 = $qualificationsInfo["10_yearOfPassing"];
		if(!hasOnlyNumbers($passYear_10))
		{
			$message = $message."Enter valid year of passsing for class 10th.\\n";
		}
	
		/*********  CLASS 12 Validation  ************/
	
		$univName_12 = $qualificationsInfo["12_instituteName"];
		if(!hasOnlyAlphabets($univName_12))
		{
			$message = $message."Enter the valid class 12th Board name. Only Alphabhets.\\n";
		}
	
		if(($qualificationsInfo["12_gradeFormat"]!='MAR-100') && ($qualificationsInfo["12_gradeFormat"]!='CGP-10') && ($qualificationsInfo["12_gradeFormat"]!='CPI-4') && ($qualificationsInfo["12_gradeFormat"]!='CPI-8') )
		{
			$message = $message."Enter valid Grading Format for class 12th or Equivalent Degree.\\n";
		}
	
		$marks_12 = $qualificationsInfo["12_aggregate"];
		if(!isValidPercentage($marks_12))
		{
			$message = $message."Enter valid percentage for class 12.\\n";
		}
	
	
		$passYear_12 = $qualificationsInfo["12_yearOfPassing"];
		if(!hasOnlyNumbers($passYear_12))
		{
			$message = $message."Enter valid year of passsing for Board 12.\\n";
		}
	
		/************ bachelor degree validation  ***************/
	
		$bd_univName = $qualificationsInfo["ug_university"];
		if(!hasOnlyAlphabets($bd_univName))
		{
			$message = $message."Enter the valid Bachelor Degree University name. Only Alphabhets.\\n";
		}
	
	
		$bd_degree = $qualificationsInfo["ug_degreeName"];
		if(!hasOnlyAlphaNumerics($bd_degree))
		{
			$message = $message."Enter the Valid Bachelor Degree Equivalent.\\n";
		}
	
		if(($qualificationsInfo["ug_gradeFormat"]!='MAR-100') && ($qualificationsInfo["ug_gradeFormat"]!='CGP-10') && ($qualificationsInfo["ug_gradeFormat"]!='CPI-4') && ($qualificationsInfo["ug_gradeFormat"]!='CPI-8') )
		{
			$message = $message."Enter valid Grading Format for Bachelor degree.\\n";
		}
	
		// $bd_marks = $qualificationsInfo["bd_marks"];
		// if(!isValidPercentage($bd_marks)){
		// 	$message = $message."Enter valid percentage for Bachelor Degree.\\n";
		// }
	
	
		$passYear_bd = $qualificationsInfo["ug_yearOfPassing"];
		if(!hasOnlyNumbers($passYear_bd))
		{
			$message = $message."Enter valid year of passsing for Bachelor Degree.\\n";
		}
	
		/**************  Masters degree validation  ****************/
		if($qualificationsInfo["pg_university"]!='')
		{
			$pg_univName = $qualificationsInfo["pg_university"];
			if(!hasOnlyAlphabets($pg_univName)){
				$message = $message."Enter the valid Masters Degree University name. Only Alphabhets.\\n";
			}
		}
		if($qualificationsInfo["pg_degreeName"]!='')
		{
			$pg_degree = $qualificationsInfo["pg_degreeName"];
			if(!hasOnlyAlphaNumerics($pg_degree)){
				$message = $message."Enter the Valid Masters Degree Equivalent.\\n";
			}
		}
		if(($qualificationsInfo["pg_gradeFormat"]!='MAR-100') && ($qualificationsInfo["pg_gradeFormat"]!='CGP-10') && ($qualificationsInfo["pg_gradeFormat"]!='CPI-4') && ($qualificationsInfo["pg_gradeFormat"]!='CPI-8') )
		{
			$message = $message."Enter valid Grade Format for Masters degree.\\n";
		}
		// if($qualificationsInfo["pg_marks"]!=''){
		// 	$pg_marks = $qualificationsInfo["pg_marks"];
		// 	if(!isValidPercentage($pg_marks)){
		// 		$message = $message."Enter valid percentage for Masters Degree.\\n";
		// 	}
		//}
		if($qualificationsInfo["pg_yearOfPassing"]!='')
		{
			$passYear_pg = $qualificationsInfo["pg_yearOfPassing"];
			if(!hasOnlyNumbers($passYear_pg))
			{
				$message = $message."Enter valid year of passsing for masters degree.\\n";
			}
		}
		// /**************   Other degree validation  ********************/
		// if($qualificationsInfo["o_univ"]!=''){
		// 	$o_univName = $qualificationsInfo["o_univ"];
		// 	if(!hasOnlyAlphabets($o_univName)){
		// 		$message = $message."Enter the valid others Degree University name. Only Alphabhets.\\n";
		// 	}
		// }
		// if($qualificationsInfo["o_degree"]!=''){
		// 	$o_degree = $qualificationsInfo["o_degree"];
		// 	if(!hasOnlyAlphaNumerics($o_degree)){
		// 		$message = $message."Enter the Valid others Degree Equivalent.\\n";
		// 	}
		// }
		// if(($qualificationsInfo["o_grade"]!='% out of 100') || ($qualificationsInfo["o_grade"]!='CGPA out of 10') || ($qualificationsInfo["o_grade"]!='CPI out of 4') || ($qualificationsInfo["o_grade"]!='CPI out of 8') ){
		// 	$message = $message."Enter valid Evalution of marks for others.\\n";
		// }
		// if($qualificationsInfo["o_marks"]!=''){
		// 	$o_marks = $qualificationsInfo["o_marks"];
		// 	if(!isValidPercentage($o_marks)){
		// 		$message = $message."Enter valid percentage for other Degree.\\n";
		// 	}
		// }
		// if($qualificationsInfo["o_year"]!=''){
		// 	$passYear_o = $qualificationsInfo["o_year"];
		// 	if(!hasOnlyNumbers($passYear_o)){
		// 		$message = $message."Enter valid year of passsing for other.\\n";
		// 	}
		// }
		// /************* B.tech CGPA validation *************/
		
		// 	$bd_cgpa1 = $qualificationsInfo["bd_1"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech I sem.\\n";
		// 	}
		
		
		// 	$bd_cgpa2 = $qualificationsInfo["bd_2"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech II sem.\\n";
		// 	}
		
		
		// 	$bd_cgpa3 = $qualificationsInfo["bd_3"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech III sem.\\n";
		// 	}
		
		
		// 	$bd_cgpa4 = $qualificationsInfo["bd_4"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech IV sem.\\n";
		// 	}
		
		
		// 	$bd_cgpa5 = $qualificationsInfo["bd_5"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech V sem.\\n";
		// 	}
		
		
		// 	$bd_cgpa6 = $qualificationsInfo["bd_6"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech VI sem.\\n";
		// 	}
		
		
		// 	$bd_cgpa7 = $qualificationsInfo["bd_7"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech VII sem.\\n";
		// 	}
		
		
		// 	$bd_cgpa8 = $qualificationsInfo["bd_8"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech VIII sem.\\n";
		// 	}
		
		// if($qualificationsInfo["bd_9"]!=''){
		// 	$bd_cgpa9 = $qualificationsInfo["bd_9"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech IX sem.\\n";
		// 	}
		// }
		// if($qualificationsInfo["bd_10"]!=''){
		// 	$bd_cgpa10 = $qualificationsInfo["bd_10"];
		// 	if(!isValidPercentage($bd_cgpa1)){
		// 		$message = $message."Enter valid percentage for B.E/B.tech X sem.\\n";
		// 	}
		// }
	
		$bd_cgpaagr = $qualificationsInfo["ug_aggregate"];
		if(!isValidPercentage($bd_cgpaagr))
		{
			$message = $message."Enter valid aggregate percentage for B.E/B.tech.\\n";
		}
	
	
		// $bd_agrclass = $qualificationsInfo["bd_class"];
		// if(!hasOnlyAlphaNumerics($bd_agrclass)){
		// 	$message = $message."Enter valid class for B.E/B.tech.\\n";
		// }
	
	
		// $md_cgpa1 = $qualificationsInfo["md_1"];
		// if(!isValidPercentage($md_cgpa1)){
		// 	$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		// }
	
	
		// $md_cgpa2 = $qualificationsInfo["md_2"];
		// if(!isValidPercentage($md_cgpa2)){
		// 	$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		// }
	
	
		// $md_cgpa3 = $qualificationsInfo["md_3"];
		// if(!isValidPercentage($md_cgpa3)){
		// 	$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		// }
	
	
		// $md_cgpa4 = $qualificationsInfo["md_4"];
		// if(!isValidPercentage($md_cgpa4)){
		// 	$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		// }
	
	
		$md_cgpaagr = $qualificationsInfo["pg_aggregate"];
		if(!isValidPercentage($md_cgpaagr))
		{
			$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		}
	
	
		// $md_agrClass = $qualificationsInfo["md_class"];
		// if(!hasOnlyAlphaNumerics($md_agrClass)){
		// 	$message = $message."Enter valid aggregate percentage for M.E/M.tech.\\n";
		// }
	


		if($message=='')
		{
			$submitPlace=$_POST['regplace'];
			$sql5 ="update registered_users set applicationSubmitStatus='1',submitPlace='$submitPlace' where userId='$userId'";
		    $result4=mysql_query($sql5) or die(mysql_error());
			echo "<script>
				alert('Application submitted Succesfully');
				window.location.href='thank-you.php';
				</script>";
		}
		else
		{
			// echo "<script>
			// 	alert('Some Fields are empty! Please make sure you have entered all the required fields.');
			// 	window.location.href='forms.php';
			// 	</script>";
			echo "<script>
				alert('$message');
				
				</script>";
		}
	}
	

		
	?>

	
	</body>
</html>