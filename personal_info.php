<?php
	session_start();
	require_once('master_database_connection.php');
	$appNo = $_GET['app_no'];
	$arYr = str_split($_SESSION['year'],2);
	//echo $arYr[1];
	if($_SESSION['semester'] == "Even")
		$s = 'E';
	else
		$s = 'O';

	$appNoF = "DM".$arYr[1].$s."D".$appNo;
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $appNoF; ?>: Personal Info</title>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
		<script type="text/javascript" src="js/jquery.min.js"></script>	
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>	

		<link rel="stylesheet" type="text/css" href="align_css.css">
	</head>
	<body>
		<?php
			if(isset($_SESSION['adminUserName']))
			{		
		?>
		<p class="topMargin"><h1><center>Application No: <?php echo $appNoF; ?></center></h1></p>		

		<center>
		<?php include("print_close.php");?>
		</center>

		<ul class="nav nav-tabs content topMargin">
			<li role="presentation" class="active"><a href="personal_info.php?app_no=<?php echo $appNo;?>">Personal Info</a></li>	
			<li role="presentation"><a href="academic_info.php?app_no=<?php echo $appNo;?>">Academic Info</a></li>	
			<li role="presentation"><a href="experiences.php?app_no=<?php echo $appNo;?>">Experiences</a></li>	
			<li role="presentation"><a href="enclosures.php?app_no=<?php echo $appNo;?>">Enclosures</a></li>	
		</ul>		
		
		<?php
			include("semester_database_connection.php");
			sem_connection($_SESSION['dbName']);
			
			global $semDbConnection;

			$query = "select * from personal_info where userId = ".$appNo;
			$queryResult = mysqli_query($semDbConnection,$query);
			if($queryResult)
			{
				$array = mysqli_fetch_array($queryResult);
				if($array['physicallyChallenged'] == 0)
				{
					$pd = "No";
				}
				else
				{
					$pd = "Yes";
				}

				echo '
					<div class="topMargin content" >															
						<p class="col-md-6"><strong>Full Name</strong></p>
						<p class="col-md-6">'.$array['firstName'].' '.$array['lastName'].'</p>

						<p class="col-md-6"><strong>Gender</strong></p>
						<p class="col-md-6">'.$array['gender'].'</p>

						<p class="col-md-6"><strong>Date Of Birth</strong></p>	
						<p class="col-md-6">'.$array['dob'].'</p>

						<p class="col-md-6"><strong>Father\'s Name</strong></p>  	
						<p class="col-md-6">'.$array['fatherName'].'</p>

						<p class="col-md-6"><strong>Nationality</strong></p>  	
						<p class="col-md-6">'.$array['nationality'].'</p>

						<p class="col-md-6"><strong>Marital Status</strong></p>  	
						<p class="col-md-6">'.$array['maritalStatus'].'</p>

						<p class="col-md-6"><strong>Physically Challenged</strong></p> 	
						<p class="col-md-6">'.$pd.'</p>

						<p class="col-md-6"><strong>Community</strong></p>  	
						<p class="col-md-6">'.$array['community'].'</p>

						<p class="col-md-6"><strong>Personal Email-ID</strong></p>  	
						<p class="col-md-6">'.$array['primaryEmail'].'</p>

						<p class="col-md-6"><strong>Alternate Email-ID</strong></p>  	
						<p class="col-md-6">'.$array['alternateEmail'].'</p>

						<p class="col-md-12 topMargin"><strong><ins>Present Address</ins></strong></p>			  	
						<p class="col-md-6"><strong>Address</strong></p> 	
						<p class="col-md-6">'.$array['currentAddress'].'</p>

						<p class="col-md-6"><strong>District/City</strong></p>  	
						<p class="col-md-6">'.$array['currentDistrict'].'</p>

						<p class="col-md-6"><strong>State/UT</strong></p>  	
						<p class="col-md-6">'.$array['currentState'].'</p>

						<p class="col-md-6"><strong>Pincode</strong></p>  	
						<p class="col-md-6">'.$array['currentPincode'].'</p>

						<p class="col-md-6"><strong>Mobile</strong></p>			    	
						<p class="col-md-6">'.$array['mobileNumber'].'</p>

						<p class="col-md-12 topMargin"><strong><ins>Permanent Address</ins></strong></p>			  	
						<p class="col-md-6"><strong>Address</strong></p>  	
						<p class="col-md-6">'.$array['permanentAddress'].'</p>

						<p class="col-md-6"><strong>District/City</strong></p>  	
						<p class="col-md-6">'.$array['permanentDistrict'].'</p>

						<p class="col-md-6"><strong>State/UT</strong></p>  	
						<p class="col-md-6">'.$array['permanentState'].'</p>

						<p class="col-md-6"><strong>Pincode</strong></p>  	
						<p class="col-md-6">'.$array['permanentPincode'].'</p>						

						<p class="col-md-6"><strong>Mobile</strong></p>  
						<p class="col-md-6">'.$array['alternateMobileNumber'].'</p>

					</div>	
				';
			}
			else
			{
				echo mysql_error($semDbConnection);
			}
			

		?>
		<?php 
			}
			else
			{
				echo "<script>window.location = 'logout_anomaly.php';</script>";
			}		
		?>	
	</body>
</html>
	