<?php
	session_start();
	include('master_database_connection.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Welcome Admin</title>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">


		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		

		<script type="text/javascript" src="js/jquery.min.js"></script>	
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>	

		<link rel="stylesheet" type="text/css" href="change_password_css.css">	
		<link rel="stylesheet" type="text/css" href="align_css.css" media="screen, projection">

	</head>
	<body id="body">
		<?php include("adheader.php");?>
		
		<ul class="nav nav-tabs content">
		 	<li role="presentation" class="active"><a href="adminHome.php">Home</a></li>
			<li class="navbar-right" role="presentation" class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
					Settings <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">								 		
			 		<li><a href="log_out.php">Log Out</a></li>
				</ul>
			</li>  
		</ul>

		<?php
			if(isset($_POST['submit']))
			{
				$old_pass = $_POST['old_password'];
				$new_pass = $_POST['new_password'];
				$con_pass = $_POST['confirm_password'];

				if(empty(trim($old_pass)) && empty(trim($new_pass)))									
				{
					echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Fill all the fields!
						</div>";
				}
				elseif(empty(trim($old_pass)))									
				{
					echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Enter the old password!
						</div>";
				}
				elseif(empty(trim($new_pass)))									
				{
					echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Enter the new password and confirm it!
						</div>";
				}
				elseif(!empty(trim($new_pass)) && empty(trim($con_pass)))									
				{
					echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Renter the new password to confirm!
						</div>";
				}
				else
				{
					if(trim($new_pass) != trim($con_pass))
					{
						echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Old and New Passwords- Mismatch!
						</div>";
					}
					else
					{
						$userName = $_SESSION['adminUserName'];
						$query = "select adminPassword from admin where adminUserName='".$userName."'";
						$queryResult = mysqli_query($masterDbConnection,$query);
						if($queryResult)
						{
							$queryRows = mysqli_num_rows($queryResult);
							if($queryRows == 0)
							{
								echo "<script>alert('not exits')</script>";
							}
							else
							{
								$real_pass = mysqli_fetch_array($queryResult);
								if($real_pass['adminPassword'] != hash("sha512",$old_pass))
								{
									echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
										<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
										<span class='sr-only'>Error:</span>


										Your Password is WRONG!
										</div>";
								}
								else
								{
									$changed_password = -1;
									$query = "update admin set adminPassword='".hash("sha512",$new_pass)."' where adminUserName='".$userName."'";
									$queryResult = mysqli_query($masterDbConnection,$query);									
									if($queryResult)
									{
										$changed_password = 1;
										echo "<div class='col-md-offset-4 col-md-4 alert alert-success topMargin' role='alert'>
										<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
										<span class='sr-only'>Error:</span>


										Your Password has been changed succesfully
										</div>";
									}
									else
									{
										echo mysql_error();
									}
								}
							}	
						}						
						else
						{
							//query failed
							echo mysql_error().'</ br>';
						}					
					}
				}
			}
		?>

		<form class="col-md-offset-4 col-md-4 topMargin" method="post" action="change_password.php">
			<div class="panel panel-info">					
				<div class="panel-heading center">CHANGE PASSWORD</div>
				<div class="panel-body">
					<p class="requireTag">*require fields</p>
					<div class="form-group betweenMargin">
						<div class="row">
							<label class="col-md-4">Old Password*</label>																		
						</div>	
						<input type="password" class="form-control" name="old_password" placeholder="Old Password"
							value=
							<?php
								if(isset($_POST['submit']))
								{
									global $changed_password;
									if(!empty(trim($_POST['old_password'])) && $changed_password != 1)
									{
										echo $_POST['old_password'];
									}
								}
							?>							
						>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-6">New Password*</label>
							<label class="col-md-6"></label>
						</div>
						<input type="password" class="form-control" name="new_password" placeholder="New Password"
							value=
							<?php
								if(isset($_POST['submit']))
								{
									if(!empty(trim($_POST['new_password']))&& $changed_password != 1)
									{
										echo $_POST['new_password'];
									}
								}
							?>							
						>
					</div>	
					<div class="form-group">
						<div class="row">
							<label class="col-md-6">Confirm Password*</label>
							<label class="col-md-6"></label>
						</div>
						<input type="password" class="form-control" name="confirm_password" placeholder="Renter New Password"
							value=
							<?php
								if(isset($_POST['submit']))
								{
									if(!empty(trim($_POST['new_password'])) && !empty(trim($_POST['confirm_password']))&& $changed_password != 1)
									{
										echo $_POST['confirm_password'];
									}
								}
							?>							
						>
					</div>								
					<div class="center topMargin">
						<button name="submit" type="submit" class="btn btn-block btn-success">Change</button>	
					</div>					
				</div>			
			</div>			
		</form>	
	</body>
</html>