<?PHP
include('db.php');
require_once("./include/membersite_config.php");
require_once("helperFunctions.php");
if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<html>
<head></head>
<body style="background-color:#666"></body>
<?php
 
	$t = $fgmembersite->UserFullName();
	if($_POST["univ_10"] || $_POST["degree_10"] || $_POST["marks_10"] || $_POST["grade_10"] || $_POST["year_10"] || $_POST["bd_univ"] || $_POST["bd_degree"] && $_POST["bd_marks"] || $_POST["bd_grade"] || $_POST["bd_year"] || $_POST["univ_12"] || $_POST["degree_12"] || $_POST["marks_12"] || $_POST["grade_12"] || $_POST["year_12"] || $_POST["bd_1"] || $_POST["bd_2"] ||$_POST["bd_3"] || $_POST["bd_4"] || $_POST["bd_5"] || $_POST["bd_6"] ||$_POST["bd_7"] || $_POST["bd_8"] || $_POST["bd_agr"] || $_POST["bd_class"] )
	{
		//print("<b><h1>$temp</h1>");
	    $sqlq="delete from qualifications where user_key = '$t'";
	    $res=mysql_query($sqlq) or die(mysql_error());	
	    $sql1="insert into  qualifications(user_key,10_univ,10_degree,10_marks,10_grade,10_year,12_univ,12_degree,12_marks,12_grade,12_year,bd_univ,bd_degree,bd_marks,bd_grade,bd_year,pg_univ,pg_degree,pg_marks,pg_grade,pg_year,o_univ,o_degree,o_marks,o_grade,o_year,bd_1,bd_2,bd_3,bd_4,bd_5,bd_6,bd_7,bd_8,bd_9,bd_10,bd_agr,bd_class,md_1,md_2,md_3,md_4,md_agr,md_class) values('$t','$_POST[univ_10]' , '$_POST[degree_10]' , '$_POST[marks_10]' , '$_POST[grade_10]' , '$_POST[year_10]' , '$_POST[univ_12]' , '$_POST[degree_12]' , '$_POST[marks_12]' , '$_POST[grade_12]' , '$_POST[year_12]' , '$_POST[bd_univ]' , '$_POST[bd_degree]' , '$_POST[bd_marks]' , '$_POST[bd_grade]' , '$_POST[bd_year]' , '$_POST[pg_univ]' , '$_POST[pg_degree]' , '$_POST[pg_marks]' , '$_POST[pg_grade]' , '$_POST[pg_year]' , '$_POST[o_univ]' , '$_POST[o_degree]' , '$_POST[o_marks]' , '$_POST[o_grade]' , '$_POST[o_year]' ,'$_POST[bd_1]' ,'$_POST[bd_2]' ,'$_POST[bd_3]' ,'$_POST[bd_4]' ,'$_POST[bd_5]' ,'$_POST[bd_6]' ,'$_POST[bd_7]' ,'$_POST[bd_8]' ,'$_POST[bd_9]' ,'$_POST[bd_10]' ,'$_POST[bd_agr]' ,'$_POST[bd_class]' ,'$_POST[md_1]' ,'$_POST[md_2]' ,'$_POST[md_3]' ,'$_POST[md_4]' ,'$_POST[md_agr]' ,'$_POST[md_class]' )";
	    $result1=mysql_query($sql1) or die(mysql_error());
	    if(($message=validateQualificationsInfoOnSave($_POST))=='')
	    {
	    	/* NO errors in qualifications. Alert to tell qualifications are saved succesfully */
	    	echo "<script>

			alert('Details of qualifications saved Succesfully.');
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
	    }
		$sq="delete from experience where user_ex = '$t'";
	    $rs=mysql_query($sq) or die(mysql_error());	

		 $sql2="insert into  experience(user_ex,org_1,des_1,per_1,work_1,org_2,des_2,per_2,work_2,org_3,des_3,per_3,work_3,org_4,des_4,per_4,work_4,org_5,des_5,per_5,work_5) values('$t','$_POST[org_1]' , '$_POST[des_1]' , '$_POST[per_1]' , '$_POST[work_1]' , '$_POST[org_2]' , '$_POST[des_2]' , '$_POST[per_2]' , '$_POST[work_2]' , '$_POST[org_3]' , '$_POST[des_3]' , '$_POST[per_3]' , '$_POST[work_3]' , '$_POST[org_4]' , '$_POST[des_4]' , '$_POST[per_4]' , '$_POST[work_4]' , '$_POST[org_5]' , '$_POST[des_5]' , '$_POST[per_5]' , '$_POST[work_5]' )";
	    $result2=mysql_query($sql2) or die(mysql_error());	
		echo "<script>
			alert('Details of Experience saved Succesfully.');
			window.location.href='forms.php';
			</script>";
	}
	else
	{
		 echo "<script>alert('Invalid input please check again');
			window.location.href='forms.php';
			</script>";
	}
?>
</html>