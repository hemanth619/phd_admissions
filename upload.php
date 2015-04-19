<?PHP
session_start();
include('db.php');
require_once("./include/membersite_config.php");
if(!isset($_SESSION['userId']))
{
	displayAlert("Please Login to Continue");
	RedirectToURL("login.php");
}
else
{
	$applicationNo=$_SESSION['applicationNo'];
	$filename=$_FILES["file"]["name"];
	if(($filename!=$applicationNo."_PP.png" && $filename!=$applicationNo."_PP.PNG"))
	{
		displayAlert("$filename not in Specified Format.");
		RedirectToURL("forms.php");
		exit();
	}

	if(($_FILES["file"]["type"] == "image/png")	&& ($_FILES["file"]["size"] < 1048576))
	{
		if ($_FILES["file"]["error"] > 0)
		{
			//echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
			displayAlert($_FILES["file"]["error"]);
		}
		else
		{
			   
			if(file_exists("upload/" . $_FILES["file"]["name"]))
			{
				unlink("upload/" . $_FILES["file"]["name"]);
			}
			  
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"][$i]);
			//echo "Stored in: " . "upload/" . $_FILES["file"]["name"][$i];
			//$filename=$_FILES["file"]["name"][$i];
			//echo "<script>alert('$filename Uploaded Succesfully');window.location.href='forms.php';	</script>";
			displayAlert("$filename Uploaded Successfully");
			RedirectToURL("forms.php");
		
		}
	  }
	else
	{
		//$filename=$_FILES["file"]["name"];
		echo "<script>
		alert('$filename not uploaded.Please follow instructions');
		window.location.href='forms.php';
		</script>";
	}
			
}


/*if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}

?>
<html>
<head></head>
<body style="background-color:#666"></body>
<?php
$k = 0;	  
$userName = $fgmembersite->UserFullName();
$sqlQuery2="select id_user from fgusers3 where username='$userName'";
$resultQuery2=mysql_query($sqlQuery2) or die(mysql_error());
$applnNo='';
while($row = mysql_fetch_array($resultQuery2)){
	if($row['id_user'] >= 1 && $row['id_user'] < 10){
		$applnNo='DM14D00'.$row['id_user'];
	}
	else if($row['id_user'] >= 10 && $row['id_user'] < 100){
		$applnNo='DM14D0'.$row['id_user'];
	}
	else{
		$applnNo='DM14D'.$row['id_user'];
	}
}

for ($i=0; $i<=7; $i++)
  {


	if($_FILES["file"]["name"][$i]!='')
	{
		$k++;
			$allowedDocs = array("pdf");
			$allowedExts=array("png");
		$filename=$_FILES["file"]["name"][$i];
		$extension = end(explode(".", $_FILES["file"]["name"][$i]));

		if($i==0&&($filename!=$applnNo."_DD.pdf"&&$filename!=$applnNo."_DD.PDF"))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}
			else if($i==1&&($filename!=$applnNo."_SSLC.pdf"&&$filename!=$applnNo."_SSLC.PDF"))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}
			else if($i==2&&($filename!=$applnNo."_MS.pdf"&&$filename!=$applnNo."_MS.PDF"))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}
			else if($i==3&&($filename!=$applnNo."_CC.pdf"&&$filename!=$applnNo."_CC.PDF"))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}
			else if($i==4&&($filename!=$applnNo."_DC.pdf"&& $filename!=$applnNo."_DC.PDF"))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}
			else if($i==5&&($filename!=$applnNo."_GC.pdf" && $filename!=$applnNo."_GC.PDF"))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}
			else if($i==6&&($filename!=$applnNo."_PP.png" && $filename!=$applnNo."_PP.PNG"))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}
			else if($i==7&&($filename!=$applnNo."_DS.png" && $filename!=$applnNo."_DS.PNG" ))
			{
				echo "<script>
					   alert('$filename not in specified file name format');
					   window.location.href='forms.php';
					   </script>";
				exit();
			}

		if($i<6)
		{
			

			if (($_FILES["file"]["type"][$i] == "application/pdf")	&& ($_FILES["file"]["size"][$i] < 1048576) 	&& in_array($extension, $allowedDocs))
			{
				if ($_FILES["file"]["error"][$i] > 0)
				{
					echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br>";
				}
				else
				{
					   
					if(file_exists("upload/" . $_FILES["file"]["name"][$i]))
					{
						unlink("upload/" . $_FILES["file"]["name"][$i]);
					}
					  
					  move_uploaded_file($_FILES["file"]["tmp_name"][$i],
					  "upload/" . $_FILES["file"]["name"][$i]);
					   //echo "Stored in: " . "upload/" . $_FILES["file"]["name"][$i];

					  $filename=$_FILES["file"]["name"][$i];
					   echo "<script>
					   alert('$filename Uploaded Succesfully');
					   window.location.href='forms.php';
					   </script>";
					  //}
				
				}
			  }
			else
			  {
			  	$filename=$_FILES["file"]["name"][$i];
				echo "<script>
				alert('$filename not uploaded.Please follow instructions');
				window.location.href='forms.php';
				</script>";
			  }


		}
		else
		{
			if ( ($_FILES["file"]["type"][$i] == "image/png")	&& ($_FILES["file"]["size"][$i] < 1048576) 	&& in_array($extension, $allowedExts))
			{
				if ($_FILES["file"]["error"][$i] > 0)
				{
					echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br>";
				}
				else
				{
					   
					if(file_exists("upload/" . $_FILES["file"]["name"][$i]))
					{
						unlink("upload/" . $_FILES["file"]["name"][$i]);
					}
					  
					  move_uploaded_file($_FILES["file"]["tmp_name"][$i],
					  "upload/" . $_FILES["file"]["name"][$i]);
					   //echo "Stored in: " . "upload/" . $_FILES["file"]["name"][$i];
					  $filename=$_FILES["file"]["name"][$i];
					   echo "<script>
					   alert('$filename Uploaded Succesfully');
					   window.location.href='forms.php';
					   </script>";
					  //}
				
				}
			  }
			else
			  {
			  	$filename=$_FILES["file"]["name"][$i];
				echo "<script>
				alert('$filename not uploaded.Please follow instructions');
				window.location.href='forms.php';
				</script>";
			  }
		}	
	}
	
  }
  if($k==0)
  {
  	echo "<script>
			alert('No new files added.');
			window.location.href='forms.php';
			</script>";
  }
?>
</html>*/