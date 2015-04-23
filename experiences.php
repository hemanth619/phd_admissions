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
			<li role="presentation"><a href="personal_info.php?app_no=<?php echo $appNo;?>">Personal Info</a></li>	
			<li role="presentation"><a href="academic_info.php?app_no=<?php echo $appNo;?>">Academic Info</a></li>	
			<li role="presentation" class="active"><a href="experiences.php?app_no=<?php echo $appNo;?>">Experiences</a></li>	
			<li role="presentation"><a href="enclosures.php?app_no=<?php echo $appNo;?>">Enclosures</a></li>	
		</ul>		
		
		<?php
			include("semester_database_connection.php");
			sem_connection($_SESSION['dbName']);
			
			global $semDbConnection;

			$query = "select * from experience where userId = ".$appNo;
			$queryResult = mysqli_query($semDbConnection,$query);
			if($queryResult)
			{
				$array = mysqli_fetch_array($queryResult);
			
				if(!empty($array['org_1']))
				{
				?>
					<div class=" col-md-4 col-md-offset-1 topMargin">
						<div class="panel panel-info">					
							<div class="panel-heading center">Experience: 1</div>
							<div class="panel-body">						
								<div class="form-group betweenMargin">
									<div class="row">
										<label class="col-md-4">Organisation</label>
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['org_1']; ?></p>	
									</div>															
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-md-4">Designation</label>	
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['des_1']; ?></p>						
									</div>							
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-md-4">Period</label>	
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['per_1']; ?></p>						
									</div>							
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-md-4">Nature of Work</label>
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['work_1']; ?></p>							
									</div>							
								</div>																						
							</div>			
						</div>	
					</div>	
				<?php
				}

				if(!empty($array['org_2']))
				{
				?>
					<div class=" col-md-4 col-md-offset-1 topMargin">
						<div class="panel panel-info">					
							<div class="panel-heading center">Experience: 2</div>
							<div class="panel-body">						
								<div class="form-group betweenMargin">
									<div class="row">
										<label class="col-md-4">Organisation</label>
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['org_2']; ?></p>	
									</div>															
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-md-4">Designation</label>	
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['des_2']; ?></p>						
									</div>							
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-md-4">Period</label>	
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['per_2']; ?></p>						
									</div>							
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-md-4">Nature of Work</label>
										<p class="col-md-1">:</p>
										<p class="col-md-4"><?php echo $array['work_2']; ?></p>							
									</div>							
								</div>																						
							</div>			
						</div>	
					</div>	
				

				<?php
				}
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
	