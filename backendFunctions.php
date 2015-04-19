<?php
//include_once('QOB/qob.php');

function RedirectToURL($url)
{
    header("Location: $url");
    exit();
}

function getAppNoPrefix()
{
	$prefix=strtoupper(getDBName());
	return $prefix;
}

function displayAlert($message)
{
	echo '<script>alert("'.$message.'")</script>';
}

function notifyAdmin($notification,$userIdentity)
	{
		$conn= getMasterDBQoBObject();

		$ip=$_SERVER['REMOTE_ADDR'];

		$notification="Notify: ".$notification.",  IP: ".$ip;

		$noteCrimeSQL="INSERT INTO suspicious (userId, suspicion, ipAddress) VALUES(?,?,?)";

		$values1[0]=array($userIdentity =>'s');

		$values1[1]=array($notification => 's');

		$values[2]=array($ip=>'s');

		$result=$conn->insert($noteCrimeSQL,$values1);

		if($conn->error==""&&$result==true)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

function getDBName()
{
	$con = mysqli_connect("localhost", "root", "root", "phd_admission_master");
	$getDbNameSQL="SELECT dbname From db_list where activeStatus=1";
	$result=mysqli_query($con,$getDbNameSQL);
	if(mysqli_num_rows($result)==0)
	{
		//displayAlert("Admissions aren't open yet. Please Try again later.");
		return "NODB";
	}
	else
	{
		$row=mysqli_fetch_array($result);
		//var_dump($row);
		$dbName=$row['dbname'];
		//echo $dbName;
		return $dbName;
	}

}

function getMasterDBQoBObject()
{
	$con=QoB("localhost","root","root", "phd_admission_master");
	return $con;
}



?>