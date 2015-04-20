<!DOCTYPE html>
<html>
	<head>
		<title>Logged Out</title>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">


		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>

		

		<script type="text/javascript" src="js/jquery.min.js"></script>	
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>	

		<link rel="stylesheet" type="text/css" href="adminHomeCSS.css" media="screen, projection">
		<link rel="stylesheet" type="text/css" href="align_css.css" media="screen, projection">			
		
	</head>
	<body>
		<?php
			include("adLoginHeader.php");
		?>
			<div class="col-md-offset-4 col-md-4 superExtraMargin">			
				<div class="panel panel-info">					
					<div class="panel-heading center">ERROR</div>
					<div class="panel-body">					
						<div class="form-group betweenMargin">
							<div class="row">
								<center><label>ACCESS DENIED</label></center>
							</div>	
							<div class="row">
								<label class="col-md-offset-4">You are logged out</label>
							</div>								
					</div>			
				</div>	
			</div>				
		<?php
			include("footer.php");

			header('refresh:2,url=adminLogin.php');
		?>
	</body>
</html>