<?php
session_start();
include_once('backendFunctions.php');
include_once('helperFunctions.php');
include_once('db.php');
var_dump($_POST);
if(isset($_SESSION['email']))
{
	$userId=$_SESSION['userId'];
	$emptyPersonalInfo=true;
	$userId=$_SESSION['userId'];
	// if($_POST["fullName"]!="" || $_POST["gender"]!="" || $_POST["date1"] !=""  || 
	// 	$_POST["fname"]!="" || $_POST["Nationality"]!="" || $_POST["Marital_status"]!="" || 
	// 	$_POST["Physically_challenged"]!="" || $_POST["community"]!="" || $_POST["pemail"]!="" || 
	// 	$_POST["aemail"]!="" || $_POST["Temp_Address"]!="" || $_POST["T_District"]!="" || 
	// 	$_POST["T_state"]!="" || $_POST["T_pincode"]!="" || $_POST["T_phone_number"]!="" ||
	// 	$_POST["T_mobile_number"]!="" || $_POST["perm_Address"]!="" || $_POST["P_District"]!="" || 
	// 	$_POST["P_state"]!="" || $_POST["P_pincode"]!="" || $_POST["P_phone_number"]!="" ||
	// 	$_POST["P_mobile_number"]!="")
	//{
		$emptyPersonalInfo=false;
		if($_POST['date1'])
		{
		   $by= date("Y", strtotime($_POST['date1']));
		   $py=date("Y");
		   $age=$py-$by;
		}
		else
		{
			$age=0;
		} 
	    $sqlq="delete from personal_info where userId = '$userId'";
	    $res=mysql_query($sqlq) or die(mysql_error());	
	    $dob = ($_POST['date1']);
	    $sql="Insert into  personal_info(userId,fullName,gender,dob,age,fatherName,nationality,maritalStatus,physicallyChallenged,community,minority,primaryEmail,alternateEmail,currentAddress,currentDistrict,currentState,currentPincode,mobileNumber,permanentAddress,permanentDistrict,permanentState,permanentPincode,alternateMobileNumber) values ('$userId','$_POST[Full_Name]' , '$_POST[gender]' , '$dob' , '$age' ,'$_POST[fname]' , '$_POST[nation]' , '$_POST[Marital_status]' , '$_POST[Physically_challenged]' , '$_POST[community]' ,'$_POST[Minority]' , '$_POST[pemail]' , '$_POST[aemail]','$_POST[Temp_Address]' , '$_POST[T_District]' , '$_POST[T_state]' , '$_POST[T_pincode]', '$_POST[T_mobile_number]' , '$_POST[perm_Address]' , '$_POST[P_District]' , '$_POST[P_state]' , '$_POST[P_pincode]'  , '$_POST[P_mobile_number]')";
	    $result=mysql_query($sql) or die(mysql_error());
	    $message=validatePersonalInfoOnSave($_POST);

	    /*if(($message)=='')
	    {
	    	echo "<script>

			alert('Details saved Succesfully.');
			//showDialog('Sucess','Details saved succesfully.','error',2)
	        //alertify.alert('Details saved Succesfully.');
			
	        window.location.href='forms.php';
			</script>";
	    }
	    else
	    {
	    	$message= "Saved but few details entered needs to be changed\\n".$message;
	    	echo "<script>

			alert('$message');
			
			
	        window.location.href='forms.php';
			</script>";
	    }*/
	//}
	// if($_POST["univ_10"] || $_POST["degree_10"] || $_POST["marks_10"] || $_POST["grade_10"] || $_POST["year_10"] || $_POST["bd_univ"] || $_POST["bd_degree"] && $_POST["bd_marks"] || $_POST["bd_grade"] || $_POST["bd_year"] || $_POST["univ_12"] || $_POST["degree_12"] || $_POST["marks_12"] || $_POST["grade_12"] || $_POST["year_12"] || $_POST["bd_1"] || $_POST["bd_2"] ||$_POST["bd_3"] || $_POST["bd_4"] || $_POST["bd_5"] || $_POST["bd_6"] ||$_POST["bd_7"] || $_POST["bd_8"] || $_POST["bd_agr"] || $_POST["bd_class"] )
	//{
		//print("<b><h1>$temp</h1>");
	    $sqlq="delete from qualifications where userId = '$userId'";
	    $res=mysql_query($sqlq) or die(mysql_error());	
	    $sql1="insert into  qualifications(userId, 
	    	10_instituteName, 10_degreeName, 10_aggregate, 10_gradeFormat, 10_yearOfPassing,
	    	12_instituteName,12_degreeName,12_aggregate,12_gradeFormat,12_yearOfPassing, 
	    	ug_university,ug_degreeName,ug_aggregate,ug_gradeFormat,ug_yearOfPassing,
	    	pg_university,pg_degreeName,pg_aggregate,pg_gradeFormat,pg_yearOfPassing) values('$userId', 
	    	'$_POST[univ_10]' , '$_POST[degree_10]' , '$_POST[marks_10]' , '$_POST[grade_10]' , '$_POST[year_10]' , 
	    	'$_POST[univ_12]' , '$_POST[degree_12]' , '$_POST[marks_12]' , '$_POST[grade_12]' , '$_POST[year_12]' , 
	    	'$_POST[bd_univ]' , '$_POST[bd_degree]' , '$_POST[bd_marks]' , '$_POST[bd_grade]' , '$_POST[bd_year]' , 
	    	'$_POST[pg_univ]' , '$_POST[pg_degree]' , '$_POST[pg_marks]' , '$_POST[pg_grade]' , '$_POST[pg_year]' )";
	    $result1=mysql_query($sql1) or die(mysql_error());
	    
	  //   if(=='')
	  //   {
	  //   	// NO errors in qualifications. Alert to tell qualifications are saved succesfully 
	  //   	echo "<script>

			// alert('Details of qualifications saved Succesfully.');
			// //showDialog('Sucess','Details saved succesfully.','error',2)
	  //       //alertify.alert('Details saved Succesfully.');
			
	  //       window.location.href='forms.php';
			// </script>";
	  //   }
	  //   else
	  //   {
	  //   	$message= "Saved but few details entered needs to be changed\\n".$message;
	  //   	echo "<script>
			// alert('$message');
	  //       window.location.href='forms.php';
			// </script>";
	  //   }
		$sq="delete from experience where userId = '$userId'";
	    $rs=mysql_query($sq) or die(mysql_error());	

		 //$sql2="insert into  experience(user_ex,org_1,des_1,per_1,work_1,org_2,des_2,per_2,work_2,org_3,des_3,per_3,work_3,org_4,des_4,per_4,work_4,org_5,des_5,per_5,work_5) values('$t','$_POST[org_1]' , '$_POST[des_1]' , '$_POST[per_1]' , '$_POST[work_1]' , '$_POST[org_2]' , '$_POST[des_2]' , '$_POST[per_2]' , '$_POST[work_2]' , '$_POST[org_3]' , '$_POST[des_3]' , '$_POST[per_3]' , '$_POST[work_3]' , '$_POST[org_4]' , '$_POST[des_4]' , '$_POST[per_4]' , '$_POST[work_4]' , '$_POST[org_5]' , '$_POST[des_5]' , '$_POST[per_5]' , '$_POST[work_5]' )";
	    //$result2=mysql_query($sql2) or die(mysql_error());
	    $message.=validateQualificationsInfoOnSave($_POST);	
		// echo "<script>
		// 	alert('Details of Experience saved Succesfully.');
		// 	window.location.href='forms.php';
		// 	</script>";
	//}

	/*else 
	{
		
	echo "<script>
			alert('Invalid input please check again');
			window.location.href='forms.php';
			</script>";
	}	*/

	 if(($message)=='')
    {
    	displayAlert("Details Saved Succesfully!");
		
        RedirectToURL("forms.php");
    }
    else
    {
    	$message= "Saved but few details entered needs to be changed\\n".$message;
    	displayAlert($message);
    	RedirectToURL("forms.php");
    }
}
else
{
	echo "Please login To Continue... ";
	displayAlert("Please Login To Continue");
	RedirectToURL("login.php");
}

?>