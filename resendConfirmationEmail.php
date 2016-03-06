<?php
require_once("QOB/qob.php");
require_once("backendFunctions.php");
?>
<html>
	<body>
		<div align=center class="div1">

<?php
if(isset($_POST['Email']))
{
	$Email=$_POST['Email'];
	
	if(($user=getUserByEmail($Email))==false)
	{
		//var_dump($user);
		
		echo "<h3><strong>Entered Email Id is not registered. Please make sure you enter same Email Address you used for registration.</strong></h3><br/>";
	}
	else
	{
		if($user['emailConfirmationStatus']==1)
		{
			echo "<br/><h3><strong>Email Address entered is already confirmed. Go to <a href='login.php'>Login</a>Page</strong></h3><br/>";
		}
		else
		{
			if(resendEmailConfirmationLink($Email))
			{
				echo "<br/><h3><strong>Email Confirmation link sent to your EmailId($Email) successfully.</strong></h3><br/>";
			}
			else
			{
				echo "<h3><strong>Some unexpected error Occured. This may be due to server overload. Please try again later. Admin has been intimated.</strong></h3><br/>";
			}
		}
		
	}
}

?>

			<br/>
			
			<br/>
			
			<p> Enter your Email Address to resend the email confirmation link.</p>
			
			<form action="resendConfirmationEmail.php" method="POST">
				
				<p class=formtext>Email Address : <input type="text" name="Email"/></p>
    			
    			<input type="submit" class = "btn btn-large btn-success" value="Resend Confirmation Email"/>	
			
			</form>
		
		</div>'
	
	</body>

</html>
