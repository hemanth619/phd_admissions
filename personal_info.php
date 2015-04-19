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
<head>
<style type="text/css">

</style>

</head>
<body style="background-color:#666">

</body>
<?php
$t1 = $fgmembersite->UserFullName();

$sql2="select id_user from fgusers3 where username='$t1'";
$result2=mysql_query($sql2) or die(mysql_error());
$applicationNumber='';
while($row = mysql_fetch_array($result2))
  {
	  if($row['id_user'] >= 1 && $row['id_user'] < 10)
		  {
			//echo "<h2>Your Application number is DM13D00$row[id]</h2>";
			$applicationNumber='DM14D00'.$row['id_user'];
		  }
	  else if($row['id_user'] >= 10 && $row['id_user'] < 100)
		  {
			//echo "<h2>Your Application number is DM13D0$row[id]</h2>";
			$applicationNumber='DM14D0'.$row['id_user'];
			//echo "$applicationNumber";
		  }
	  else
		  {
			//echo "<h2>Your Application number is DM13D$row[id]</h2>";
			$applicationNumber='DM14D'.$row['id_user'];
		  }
		  

  }
//personal email!=Alternate Email
//

/*if($_POST['Full_Name']!="")
{
	$fullName=$_POST['Full_Name'];
	if(!hasOnlyAlphabets($fullName))
	{
		$k='Enter a Valid name';
	}
}*/




if($_POST["Full_Name"]!="" || $_POST["gender"]!="" || $_POST["date1"] !=""  || $_POST["fname"]!="" || $_POST["Nationality"]!="" || $_POST["Marital_status"]!="" || $_POST["Physically_challenged"]!="" || $_POST["community"]!="" || $_POST["pemail"]!="" || $_POST["aemail"]!="" || $_POST["Temp_Address"]!="" || $_POST["T_District"]!="" || $_POST["T_state"]!="" || $_POST["T_pincode"]!="" || $_POST["T_phone_number"]!="" ||$_POST["T_mobile_number"]!="" || $_POST["perm_Address"]!="" || $_POST["P_District"]!="" || $_POST["P_state"]!="" || $_POST["P_pincode"]!="" || $_POST["P_phone_number"]!="" ||$_POST["P_mobile_number"]!="")
{
	if($_POST['date1'])
	{
	   $by= date("Y", strtotime($_POST['date1']));
	   $py=date("Y");
	   $age=$py-$by;
	}
	else{$age=0;} 
    $sqlq="delete from personal_info where user_name = '$t1'";
    $res=mysql_query($sqlq) or die(mysql_error());	
    $dob = ($_POST['date1']);
    $sql="insert into  personal_info(user_name,App_no,Full_Name,gender,dob,age,fname,Nationality,Marital_status,Physically_challenged,community,Minority,pemail,aemail,Temp_Address,T_District,T_state,T_pincode,T_phone_number,T_mobile_number,perm_Address,P_District,P_state,P_pincode,P_phone_number,P_mobile_number) values 
	
('$t1','$applicationNumber','$_POST[Full_Name]' , '$_POST[gender]' , '$dob' , '$age' ,'$_POST[fname]' , '$_POST[Nationality]' , '$_POST[Marital_status]' , '$_POST[Physically_challenged]' , '$_POST[community]' ,'$_POST[Minority]' , '$_POST[pemail]' , '$_POST[aemail]','$_POST[Temp_Address]' , '$_POST[T_District]' , '$_POST[T_state]' , '$_POST[T_pincode]', '$_POST[T_phone_number]' , '$_POST[T_mobile_number]' , '$_POST[perm_Address]' , '$_POST[P_District]' , '$_POST[P_state]' , '$_POST[P_pincode]' , $_POST[P_phone_number] , '$_POST[P_mobile_number]')";
    $result=mysql_query($sql) or die(mysql_error());
    $message=validatePersonalInfoOnSave($_POST);	
    if(($message)=='')
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
    }



    
}
else {
echo "<script>
		alert('Invalid input please check again');
		window.location.href='forms.php';
		</script>";}


?>

</html>