<?php
	session_start();	
	include('master_database_connection.php');	
	if(isset($_SESSION['adminUserName']))
		$adminName = $_SESSION['adminUserName'];
	else	
		$adminName = -1;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome <?php echo $adminName; ?></title>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">


		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		

		<script type="text/javascript" src="js/jquery.min.js"></script>	
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>	

		<link rel="stylesheet" type="text/css" href="adminHomeCSS.css" media="screen, projection">
		<link rel="stylesheet" type="text/css" href="align_css.css" media="screen, projection">			
		
	</head>
	<body id="body">
		<?php 


			if(isset($_SESSION['adminUserName']))
			{

				include("adheader.php");

				$_SESSION['pageName'] = "adminHome.php";
				include("select_database.php");	
				
				if(isset($_SESSION['selected']))
				{
					$selectedStatus = $_SESSION['selected'];
					$activeStatus = $_SESSION['activeStatus'];
				}
				else
				{
					$selectedStatus = -1;
					$activeStatus = -1;
				}									

				function done_modal($msg)
				{
					echo '
					<div class="modal fade" id="done_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Alert!</h4>
								</div>
								<div class="modal-body">
									The database of '.$_SESSION['semester'].' semester of year '.$_SESSION['year'].' is SUCCESSFULLY '.$msg.'
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>							
								</div>
							</div>
						</div>
					</div>
					';

					echo "<script type='text/javascript'>$('#done_modal').modal('show')</script>";
				}			

				if(isset($_POST['deactivate_database']) && isset($_SESSION['selected']))
				{					
						
					$queryDA = "update db_list set activeStatus = 0 where dbName ='".$_SESSION["dbName"]."'";
					$queryResultDA = mysqli_query($masterDbConnection,$queryDA);				
					if($queryResultDA)
					{
						$_SESSION['activeStatus'] = 0;	
						$activeStatus = 0;	
						done_modal("deactivated");
					}
					else
					{
						echo mysqli_error();
					}									
				}
				if(isset($_POST['activate_database']) && isset($_SESSION['selected']))
				{
					$query = "select year,semester from db_list where activeStatus = 1";
					$queryResult = mysqli_query($masterDbConnection,$query);							
					if($queryResult)
					{
						$queryResultRows = mysqli_num_rows($queryResult);
						if($queryResultRows == 0)
						{
							$queryA = "update db_list set activeStatus = 1 where dbName ='".$_SESSION['dbName']."'";
							$queryResultA = mysqli_query($masterDbConnection,$queryA);							
							if($queryResultA)
							{
								$_SESSION['activeStatus'] = 1;
								$activeStatus = 1;	
								//echo $_SESSION['activeStatus'];
								done_modal("activated");
							}
							else
							{
								echo mysqli_error();
							}
						}
						else
						{
							$array = mysqli_fetch_array($queryResult);
							if($array['semester'] == 0)
							{
								$s = "Odd";
							}
							else
							{
								$s = "Even";
							}
							echo '
								<form method="post" action="adminHome.php">	
									<div class="modal fade" id="overwrite_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Alert!</h4>
												</div>
												<div class="modal-body">
													The database of '.$s.' semester of '.$array['year'].' year is already active. Press continue to deactivate the active database and activate the database of '.$_SESSION['semester'].' semester and '.$_SESSION['year'].' year. 
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="submit" name="overwrite" class="btn btn-primary" onclick="dismiss()">Continue</button>								
												</div>
											</div>
										</div>
									</div>									
								</form>	
							';		
											
							$_SESSION['ovYr'] = $array['year'];
							$_SESSION['ovSm'] = $array['semester'];						
							echo "<script type='text/javascript'>$('#overwrite_modal').modal('show')</script>";
							
						}
					}
					else
					{
						echo mysqli_error();
					}						
				}
				if(isset($_POST['overwrite']))			
				{				
					$queryD = "update db_list set activeStatus = 0 where semester = ".$_SESSION['ovSm']." and year = ".$_SESSION['ovYr'];
					$queryResultD = mysqli_query($masterDbConnection,$queryD);
					if($queryResultD)
					{
						if($_SESSION['semester'] == "Even")
						{
							$s = 1;
						}
						else
						{
							$s = 0;
						}

						$queryA = "update db_list set activeStatus = 1 where semester = ".$s." and year = ".$_SESSION['year'];
						//echo $queryA;
						$queryResultA = mysqli_query($masterDbConnection,$queryA);
						if($queryResultA)
						{
							$_SESSION['activeStatus'] = 1;
							$activeStatus = 1;	
							//echo $_SESSION['activeStatus'];
							done_modal("activated");
						}
						else
						{
							echo mysqli_error($masterDbConnection);
						}
					}
					else
					{
						echo mysqli_error($masterDbConnection);
					}
					unset($_SESSION['ovYr']);
					unset($_SESSION['ovSm']);
				}			
		?>					

				<ul class="nav nav-tabs content">
				 	<li role="presentation" class="active"><a href="adminHome.php">Home</a></li>		 	
					<li class="navbar-right" role="presentation" class="dropdown">				
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							Settings <span class="caret"></span>
						</a>
						<ul class="dropdown-menu" role="menu">	
							<li><a data-toggle="modal" data-target="#select">Change Database</a></li>
					 		<li><a href="change_password.php">Change Password</a></li>		
					 		<li><a href="log_out.php">Log Out</a></li>
						</ul>
					</li> 
					<?php
						if(isset($_SESSION['selected']))
						{					
							echo "<li class='navbar-right'>
									<a href='' data-toggle='modal' data-target='#select' style='color:black;";
									if($_SESSION['activeStatus'] == 0)
										echo "background-color:#ED6666;";
									else
										echo "background-color:#33CC33;";
									echo "'>".$_SESSION['year']."(".$_SESSION['semester'].")</a>
								</li>";					
						}
						else
						{
							echo "<li class='navbar-right' role='presentation'>
									<a href='' data-toggle='modal' data-target='#select' style='color:black;background-color:#FFFF99';>No DataBase Selected</a>
								</li>";
						}
					?> 
				</ul>	

				<h1 id="welcome_tag">Welcome <?php echo $adminName; ?></h1><br />

				<div id="all_options">
					<a href="set_criteria.php"><button class="options">Set Criteria</button></a>
					<a href="view_applications.php"><button class="options">View Applications</button></a>
					<a href="create_database.php"><button type="submit" name="create" class="options">Create Database</button></a>
					<button onclick="activate_db()" class="options">Activate Client</button>
					<button onclick="deactivate_db()" class="options">Deactivate Client</button>
				</div>	

				<div class="modal fade" id="already_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Alert!</h4>
							</div>
							<div class="modal-body">
								The database of <?php echo $_SESSION['semester'];?> semester of year <?php echo $_SESSION['year'];?> is already 
								<?php 
									//echo $_SESSION['activeStatus'];
									if($_SESSION['activeStatus'] == 1) 
										echo "activated"; 
									else 
										echo "deactivated";
								?>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>							
							</div>
						</div>
					</div>
				</div>
				
				
							
				<form action="adminHome.php" method="post">
					
					<div class="modal fade" id="activate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Activate Database</h4>
								</div>
								<div class="modal-body">
									Activate the database of <?php echo $_SESSION['semester'];?> semester of year <?php echo $_SESSION['year'];?>?																
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
									<button type="submit" name="activate_database" class="btn btn-primary">Yes</button>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="deactivate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Deactivate Database</h4>
								</div>
								<div class="modal-body">
									De-Activate the database of <?php echo $_SESSION['semester'];?> semester of year <?php echo $_SESSION['year'];?>?																
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
									<button type="submit" name="deactivate_database" class="btn btn-primary">Yes</button>
								</div>
							</div>
						</div>
					</div>							
				</form>	

		<?php 
			}
			else
			{
				echo "<script>window.location = 'logout_anomaly.php';</script>";
			}
			include("footer.php");
		?>
	</body>
</html>

<script type="text/javascript">
	function dismiss()
	{
		$('#overwrite_modal').modal('hide');
	}

	function deactivate_db(){
		//alert("hi");
		var adminUserName = '<?php echo $adminName;?>';
		if(adminUserName == -1)
		{
			window.location = 'logout_anomaly.php';
		}
		else
		{
			var selectedStatus = '<?php echo $selectedStatus;?>';
			if(selectedStatus == -1)
			{
				$('#select_database').modal('show');
			}
			else
			{
				var activeStatus = '<?php echo $activeStatus;?>';
				if(activeStatus == 0) 
					$('#already_modal').modal('show');
				else
					$('#deactivate').modal('show');
			}	
		}
		    
	}
	function activate_db(){	 
		
		var adminUserName = '<?php echo $adminName;?>';
		if(adminUserName == -1)
		{
			window.location = 'logout_anomaly.php';
		}
		else
		{
		    var selectedStatus = '<?php echo $selectedStatus;?>';
			if(selectedStatus == -1)
			{
				$('#select_database').modal('show');
			}
			else
			{
				var activeStatus = '<?php echo $activeStatus;?>';
				if(activeStatus == 1) 
					$('#already_modal').modal('show');
				else
					$('#activate').modal('show');
			}	
		} 
	}	
	$("#modal_form").submit(function(e) {
		//alert("hi");
		
		var year = document.getElementById('year').value;		
		if(year.length == 0)
		{
			alert("Fill in the year");
			e.preventDefault();
		}
		else if(year.length != 4 || isNaN(year)){
			alert("fill in the valid year!");
			e.preventDefault();
		}
	});
	
</script>