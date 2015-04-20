
<form action="<?php echo $_SESSION['pageName']?>" method="post">		

	<div class="modal fade" id="select_database" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Alert!</h4>
				</div>
				<div class="modal-body">
					No Database is selected, Select a database?
				</div>
				<div class="modal-footer">					
					<a 
					<?php
						if(($_SESSION['pageName'] == "view_applications.php") || ($_SESSION['pageName'] == "set_criteria.php"))
						{
							echo "href='adminHome.php'";
						}
					?>
					>
					<button type="button" class="btn btn-default" onclick="dismiss()" data-dismiss="modal">Cancel</button></a>
					<button data-toggle="modal" data-target="#select" type="button" data-dismiss="modal" name="select_database" class="btn btn-primary">Select</button>
				</div>
			</div>
		</div>
	</div>	

	<?php
		/*function alert_modal($msg)
		{				
			echo'
				<div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Alert!</h4>
							</div>
							<div class="modal-body">
								'.$msg.'
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>							
							</div>
						</div>
					</div>
				</div>
			';

			echo "<script type='text/javascript'>$('#alert_modal').modal('show')</script>";
		}*/

	

		//selected database means if some datbase is already active
		if(!isset($_POST['select']) && !isset($_SESSION['dbName']) && $_SESSION['pageName']!="create_database.php")
		{

			echo '
			<div class="modal fade" id="selected_database" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Alert!</h4>
						</div>
						<div class="modal-body">
			';						
				//echo "hello";
				$query = "select dbName,year,semester from db_list where activeStatus = 1";						
				$queryResult = mysqli_query($masterDbConnection,$query);
				if($queryResult)
				{
					$queryRows = mysqli_num_rows($queryResult);
					if($queryRows == 0)
					{
					  	echo "<script> $('#select_database').modal('show');</script>";					
					}
					else
					{

						$array = mysqli_fetch_array($queryResult);	
						$_SESSION['dbName'] = $array['dbName'];	
						$_SESSION['selected'] = $array['dbName'];	
						//echo '<p class="text-center col-md-offset-6 col-md-3">Selected Database: '.strtoupper($_SESSION['dbName']).'</p>';
			
						//echo $_SESSION['dbName'];
						if($array['semester'] == 1)
						{
							$sem = "Even";
						}
						else
						{
							$sem = "Odd";
						}
						$_SESSION['year'] = $array['year'];
						$_SESSION['semester'] = $sem;
						$_SESSION['activeStatus'] = 1;
						$msg = "Selected database is of ".$sem." semester of year ".$array["year"];
						echo "<script type='text/javascript'>$('#selected_database').modal('show')</script>";
					}
				}
				else
				{
					echo mysqli_error();
				}
				echo $msg;	
																													
					
				echo '
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
						<button data-toggle="modal" data-target="#select" type="button" data-dismiss="modal" name="change_database" class="btn btn-primary">Change</button>
					</div>
				</div>
			</div>
		</div>';
		}
	?>
</form>

<?php
	if(isset($_POST['select']))
	{										
		$year = $_POST['year'];	
		$semester = $_POST['semester'];

		if(empty(trim($year)))
		{
			//alert_modal("Fill in the year value!");
		}
		else if($year < intval(date("Y")) || strlen($year) > 4)
		{
			//alert_modal("Fill in the valid year!");
		}
	} 

	
?>

<form action="<?php echo $_SESSION['pageName']?>" method="post" id="modal_form">	

	<div class="modal fade" id="select" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Select Database</h4>
				</div>
				<div class="panel-body">
					<div class="modal-body">							
						<p style="color:red;">*require fields</p>
						<div class="form-group">
							<div class="row">
								<label class="col-md-3">Year*</label>																		
							</div>
							<input id="year" name="year" type="text" class="form-control" placeholder="Year"
								value=
									<?php
										if(isset($_POST['select']))
										{										
											echo $year;	
										} 
									?>							
							>
						</div>
						<div class="form-group topMargin">
							<div class="row">
								<label class="col-md-3">Semester*</label>												
							</div>
							<select id='semester' name='semester' class='discipline_options form-control'>
								<option value=1 <?php if(isset($_POST['select'])) if($semester == 1) echo "selected";?> >Even(E)</option>
								<option value=0 <?php if(isset($_POST['select'])) if($semester == 0) echo "selected";?> >Odd(O)</option>											
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<button type="submit" name="select" class="btn btn-primary" onclick="select_check()">Select</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</form>	
										

<?php
	if(isset($_POST['select']))
	{	
		$querySB = "select dbName,year,semester,activeStatus from db_list where year='".$year."' and semester='".$semester."'";
		$queryResultSB = mysqli_query($masterDbConnection,$querySB);
		if($queryResultSB)
		{
			$queryRowsSB = mysqli_num_rows($queryResultSB);
			if($queryRowsSB == 0)
			{						
				echo "<script>	
					alert('No database existing!');	
					$('#select').modal('show');
				</script>";
			}
			else
			{
				$array = mysqli_fetch_array($queryResultSB);

				$_SESSION['dbName'] = $array['dbName'];
				$_SESSION['selected'] = $array['dbName'];
				if($array['semester'] == 1)
				{
					$sem = "Even";
				}
				else
				{
					$sem = "Odd";
				}
				$_SESSION['year'] = $array['year'];
				$_SESSION['semester'] = $sem;
				$_SESSION['activeStatus'] = $array['activeStatus'];

				$msg = "Selected database is of ".$sem." semester of year ".$array["year"];
				echo '
				<div class="modal fade" id="chosen_database" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Alert!</h4>
							</div>
							<div class="modal-body">					
				';			echo $msg;
				echo '
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
								<button data-toggle="modal" data-target="#select" type="button" data-dismiss="modal" name="select_database" class="btn btn-primary">Change</button>
							</div>
						</div>
					</div>
				</div>
				';
				echo "<script type='text/javascript'>$('#chosen_database').modal('show')</script>";
			}
		}
		else
		{
			echo mysqli_error();
		}
	}
?>

<script type="text/javascript">
	function dismiss()
	{
		//alert("hi");
		$('#select_database').modal('hide');
	}
</script>