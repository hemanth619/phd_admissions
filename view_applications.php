<?php
	session_start();
	include('master_database_connection.php');
?>
<!DOCTYPE html>

<html>
	<head>
		<title>View Applications</title>
		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		

		<script type="text/javascript" src="js/jquery.min.js"></script>	
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>	
		
		<link rel="stylesheet" type="text/css" href="view_applicationsCSS.css">
	</head>
	<body id="body">
		<?php
			if(isset($_SESSION['adminUserName']))
			{

			include("adheader.php");
			$_SESSION['pageName'] = "view_applications.php";
			include("select_database.php");	
		?>		
		<ul class="nav nav-tabs content">
			<li role="presentation"><a href="adminHome.php">Home</a></li>	
			<li role="presentation"><a href="set_criteria.php">Set Criteria</a></li>		
			<li role="presentation" class="active"><a href="view_applications.php">View Applications</a></li>
			<li role="presentation"><a href="create_database.php">Create Database</a></li>
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
		
		<?php
			$_SESSION['pageName'] = "view_applications.php"; 			
			include("select_database.php");			
		?>

		<?php				
			if(isset($_SESSION['selected']))
			{

				echo '
					<div class="panel-group content" id="accordion" role="tablist" aria-multiselectable="true">		
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#first_step" aria-expanded="true" aria-controls="collapseOne">
										Choose Discipline:
									</a>
								</h4>
							</div>
							<div id="first_step" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<form method="post" action="view_applications.php">
										<div class="col-md-4 col-md-offset-4">
											<div class="panel panel-info content">
												<div class="panel-heading center">Course</div>
												<div class="panel-body">																					
													<div class="form-group">																																	
														<select id="discipline" name="discipline" class="discipline_options form-control">

															<option value="Computer Engineering"';
															if(isset($_POST["submit"])) 
																if($_POST["discipline"] == "Computer Engineering") 
																	echo "selected";
															echo '>Computer Engineering</option>

															<option value="Electronics"';
															if(isset($_POST["submit"])) 
																if($_POST["discipline"] == "Electronics") 
																	echo "selected";
															echo '>Electronics</option>

															<option value="Mechanical"';
															if(isset($_POST["submit"])) 
																if($_POST["discipline"] == "Mechanical") 
																	echo "selected";
															echo '>Mechanical</option>

															<option value="Mathematics"'; 
															if(isset($_POST["submit"])) 
																if($_POST["discipline"] == "Mathematics") 
																	echo "selected";
															echo '>Mathematics</option>

															<option value="Physics"';
															if(isset($_POST["submit"])) 
																if($_POST["discipline"] == "Physics") 
																	echo "selected";
															echo '>Physics</option>

														</select>												
													</div>			

													<div class="center extraMargin">
														<button  name="submit" type="submit" class="btn btn-block btn-success">Submit</button>	
													</div>					
												</div>											
											</div>
										</div>
									</form>	
								</div>
							</div>
						</div>		
					';				
			}

			if(isset($_POST['submit']) && isset($_SESSION['selected']))
			{	
				include("semester_database_connection.php");
				sem_connection($_SESSION['dbName']);
				
				global $semDbConnection;
				//echo $semDbConnection;
				//echo $_POST['discipline'];
				$FetchApplicationSQL="select pi.userId,pi.firstName,pi.lastName From registered_users as ru inner join personal_info as pi on pi.userId=ru.userId where ru.discipline='".$_POST['discipline']."' and ru.applicationSubmitStatus = 1";
				$result=mysqli_query($semDbConnection,$FetchApplicationSQL);	

				if($result)
				{
					$resultRows = mysqli_num_rows($result);
					if($resultRows == 0)			
					{
						echo "<script>alert('No application Submitted')</script>";
					}
					else
					{
						echo "<script>$('#first_step').collapse('hide');</script>";						
						echo '
						<div class="panel panel-default collapseMargin">
							<div class="panel-heading" role="tab" id="headingOne">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#second_step" aria-expanded="true" aria-controls="collapseOne">
										Submitted Applications:
									</a>
								</h4>
							</div>
							<div id="second_step" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">	
									<p class="col-md-offset-5 col-md-4">Total no. of Applications received: '. $resultRows.'</p>													
									<table class="table table-striped extraMargin">
										<tr>
											<td><strong><center>Sr. No.</center></strong></td>
											<td><strong><center>Application No.</center></strong></td>
											<td><strong>Full Name</strong></td>
										</tr>';
										$count=1;
										while($array=mysqli_fetch_array($result))
										{
											echo '<tr>
											<td ><center>'.$count.'.</center></td>
											<td ><a data-toggle="tooltip" data-placement="left" title="Show full details" target="_blank" href=personal_info.php?app_no='.$array['userId'].'
												>
												<center>'.$array['userId'].'</center></a></td>
											<td >'.$array['firstName']." ".$array['lastName'].'</td>
											</tr>';
											$count++;
										}
										
									echo '</table>
								</div>	
							</div>									
						</div>
					</div>	
					';
					}
				}
				else
				{
					//query failed
					echo mysqli_error($semDbConnection).'</ br>';
				}
								
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

<script type="text/javascript">

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