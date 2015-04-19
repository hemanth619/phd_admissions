<?php
include_once("backendFunctions.php");
?>
<html>
	<body>
		<div align=center class="div1">

<?php
if(isset($_POST['Email']))
{
	$Email=$_POST['Email'];
	
	if(($user=getUserFromEmail($Email))==false)
	{
		var_dump($user);
		
		echo "<h3><strong>Entered Email Id is not registered. Please make sure you enter same Email Address you used for registration.</strong></h3><br/>";
	}
	else
	{
		if(sendResetPasswordLink($Email))
		{
			echo "<br/><h3><strong>Password reset link sent to your EmailId($Email) successfully.</strong></h3><br/>";
		}
		else
		{
			echo "<h3><strong>Some unexpected error Occured. This may be due to server overload. Please try again later. Admin has been intimated.</strong></h3><br/>";
		}
	}
}

?>

			<br/>
			
			<br/>
			
			<p> Enter your Email Address to receive the Reset Password Link.</p>
			
			<form action="forgotPassword.php" method="POST">
				
				<p class=formtext>Email ID : <input type="text" name="Email"/></p>
    			
    			<input type="submit" class = "btn btn-large btn-success" value="Send Reset Password Link"/>	
			
			</form>
		
		</div>'
	
	</body>

</html>
