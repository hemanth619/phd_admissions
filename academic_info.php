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
		<title><?php echo $appNoF; ?>: Academic Info</title>

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
		<ul class="nav nav-tabs topMargin content">
			<li role="presentation"><a href="personal_info.php?app_no=<?php echo $appNo;?>">Personal Info</a></li>	
			<li role="presentation" class="active"><a href="academic_info.php?app_no=<?php echo $appNo;?>">Academic Info</a></li>	
			<li role="presentation"><a href="experiences.php?app_no=<?php echo $appNo;?>">Experiences</a></li>	
			<li role="presentation"><a href="enclosures.php?app_no=<?php echo $appNo;?>">Enclosures</a></li>	
		</ul>							
		
		<?php
			include("semester_database_connection.php");
			sem_connection($_SESSION['dbName']);
			
			global $semDbConnection;

			$query = "select * from qualifications where userId = ".$appNo;
			$queryResult = mysqli_query($semDbConnection,$query);
			if($queryResult)
			{
				$array = mysqli_fetch_array($queryResult);
				?>
				<div class=" col-md-4 col-md-offset-1 topMargin">
					<div class="panel panel-info">					
						<div class="panel-heading center">Class: 10</div>
						<div class="panel-body">						
							<div class="form-group betweenMargin">
								<div class="row">
									<label class="col-md-4">Institute Name</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['10_instituteName']; ?></p>	
								</div>															
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Degree Name</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['10_degreeName']; ?></p>						
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Grade Format</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['10_gradeFormat']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Aggregate</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['10_aggregate']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Year of Passing</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['10_yearOfPassing']; ?></p>						
								</div>							
							</div>																	
						</div>			
					</div>	
				</div>
				<div class=" col-md-4 col-md-offset-1 topMargin">
					<div class="panel panel-info">					
						<div class="panel-heading center">Class: 12</div>
						<div class="panel-body">						
							<div class="form-group betweenMargin">
								<div class="row">
									<label class="col-md-4">Institute Name</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['12_instituteName']; ?></p>	
								</div>															
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Degree Name</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['12_degreeName']; ?></p>						
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Grade Format</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['12_gradeFormat']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Aggregate</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['12_aggregate']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Year of Passing</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['12_yearOfPassing']; ?></p>						
								</div>							
							</div>																	
						</div>			
					</div>	
				</div>	
				<div class=" col-md-4 col-md-offset-1 topMargin">
					<div class="panel panel-info">					
						<div class="panel-heading center">Under Graduate(UG)</div>
						<div class="panel-body">						
							<div class="form-group betweenMargin">
								<div class="row">
									<label class="col-md-4">University/Institute Name</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['ug_instituteName']; ?></p>	
								</div>															
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Degree Name</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['ug_degreeName']; ?></p>						
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Discipline</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['ug_discipline']; ?></p>						
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Grade Format</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['ug_gradeFormat']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Aggregate</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['ug_aggregate']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Year of Passing</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['ug_yearOfPassing']; ?></p>						
								</div>							
							</div>																	
						</div>			
					</div>	
				</div>	
				<div class=" col-md-4 col-md-offset-1 topMargin">
					<div class="panel panel-info">					
						<div class="panel-heading center">Post Graduate(PG)</div>
						<div class="panel-body">						
							<div class="form-group betweenMargin">
								<div class="row">
									<label class="col-md-4">University/Institute Name</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['pg_instituteName']; ?></p>	
								</div>															
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Degree Name</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['pg_degreeName']; ?></p>						
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Discipline</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['pg_discipline']; ?></p>						
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Grade Format</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['pg_gradeFormat']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Aggregate</label>
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['pg_aggregate']; ?></p>							
								</div>							
							</div>
							<div class="form-group">
								<div class="row">
									<label class="col-md-4">Year of Passing</label>	
									<p class="col-md-1">:</p>
									<p class="col-md-4"><?php echo $array['pg_yearOfPassing']; ?></p>						
								</div>							
							</div>																	
						</div>		
					</div>	
				</div>		
			<?php
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
	