<?php
	session_start();
	include('master_database_connection.php');

	if(isset($_SESSION['adminUserName']))
	{
		echo "<script type='text/javascript'>window.location = 'adminHome.php';</script>";
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">


		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

		<script src="js/jquery.min.js" type="text/javascript"></script>	
		<script src="js/jquery-ui.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="adminLoginCSS.css" media="screen, projection">	
		<!-- <script type="text/javascript" src="adminLogin.js"></script> -->

	</head>
	<body id="body">
		<?php include("adLoginHeader.php");?>
		
						
	
		<?php
			if(isset($_POST['submit']))
			{			
				$userName = $_POST['userName'];					
				$pass = $_POST['password'];	
				if(empty(trim($userName)) && empty(trim($pass)))									
				{
					echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Enter your User Name and password!
						</div>";
				}
				elseif(empty(trim($userName)))									
				{
					echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Enter your User Name!
						</div>";
				}
				elseif(empty(trim($pass)))									
				{
					echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
						<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
						<span class='sr-only'>Error:</span>


						Enter your password!
						</div>";
				}				
				else
				{
					$query = "select adminUserName,adminPassword from admin where adminUserName='".$userName."'";
					$queryResult = mysqli_query($masterDbConnection,$query);
					if($queryResult)
					{
						$result = mysqli_num_rows($queryResult);
						if($result ==0)
						{
							echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
								<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
								<span class='sr-only'>Error:</span>


								".$userName." is not an ADMIN!
								</div>";
						}
						else
						{
							$userNamePassword = mysqli_fetch_array($queryResult);
							if($userNamePassword['adminPassword'] != hash("sha512",$pass))
							{
								echo "<div class='col-md-offset-4 col-md-4 alert alert-danger topMargin' role='alert'>
									<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
									<span class='sr-only'>Error:</span>


									Wrong password!
									</div>";
							}
							else
							{
								$_SESSION['adminUserName'] = $userNamePassword['adminUserName'];											
								echo "<script type='text/javascript'>window.location = 'adminHome.php';</script>";
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
		?>	

		<form class="col-md-offset-4 col-md-4 topMargin" method="post" action="adminLogin.php">
			<div class="panel panel-info">					
				<div class="panel-heading center">LOGIN</div>
				<div class="panel-body">
					<p class="requireTag">*require fields</p>
					<div class="form-group betweenMargin">
						<div class="row">
							<label class="col-md-4">User Name*</label>																		
						</div>	
						<input id="userName" name="userName" type="text" class="form-control" placeholder="UserName"
							value=
								<?php
									if(isset($_POST['submit']))
									{										
										echo $userName;	
									} 
								?>							
						>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-md-6">Password*</label>							
						</div>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>							
					<div class="center topMargin">
						<button name="submit" type="submit" class="btn btn-block btn-success">Submit</button>	
					</div>					
				</div>			
			</div>			
		</form>	
		<?php include("footer.php");?>	
	</body>
</html>