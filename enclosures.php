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
		<title><?php echo $appNoF; ?>: Enclosures</title>

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
		<?php include("print_close.php");?>
		<ul class="nav nav-tabs content topMargin">
			<li role="presentation"><a href="personal_info.php?app_no=<?php echo $appNo;?>">Personal Info</a></li>	
			<li role="presentation"><a href="academic_info.php?app_no=<?php echo $appNo;?>">Academic Info</a></li>	
			<li role="presentation"><a href="experiences.php?app_no=<?php echo $appNo;?>">Experiences</a></li>	
			<li role="presentation" class="active"><a href="enclosures.php?app_no=<?php echo $appNo;?>">Enclosures</a></li>	
		</ul>		
		
		<?php
			include("semester_database_connection.php");
			sem_connection($_SESSION['dbName']);
			
			global $semDbConnection;
			?>
			<div class=" col-md-4 col-md-offset-4 topMargin">
				<div class="panel panel-info">					
					<div class="panel-heading center">Profile Picture</div>
					<div class="panel-body">						
						<div class="form-group betweenMargin">
							<div class="row">
										
							<?php					
								if(file_exists("upload/".$appNo."_PP.jpg"))
								{
									echo "<img src='upload/".$appNo."_PP.jpg'";
								}
							 	else
							 	{
							 		echo "<p class='text-center'>No picture found!</p>";
							 	}
							?>	
							</div>							
						</div>																	
					</div>			
				</div>	
			</div>				
		<?php 
			}
			else
			{
				echo "<script>window.location = 'logout_anomaly.php';</script>";
			}			
		?>	
	</body>
</html>
	