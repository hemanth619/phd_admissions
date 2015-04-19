<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED^E_STRICT);

require_once('backendFunctions.php');
?>

<html>
	
	<body>
		
		<div align=center class="div1">

<?php

if(!isset($_POST['password']))
{
	if(isset($_GET['token']))
	{
		$extHash=$_GET['token'];
		
		if(($resetRecord=getResetPassRecord($extHash))==false)
		{
			//var_dump($user);
			echo "<h3><strong>Some Error Occurred. Request new Reset Password Link <a href='forgotPassword.php'>here.</a></strong></h3><br/>";
		}
		else
		{
			if($resetRecord['isValid']==1)
			{
				$userId=$resetRecord['userId'];

				echo '
						<br/>
						
						<br/>
						
						<p> Enter new password for your account. Atleast 8 Characters</p>
						
						<form action="resetPassword.php" method="POST">

							<p class=formtext>New Password : <input type="password" name="password"/></p>
							
							<p class=formtext>Confirm New Password : <input type="password" name="confirmPassword"/></p>
							
							<input type="hidden" name= "confirmationCode" value="'.$extHash.'" /> 
			    			
			    			<input type="submit" class = "btn btn-large btn-success" value="Change Password"/>	
						
						</form>
					
					</div>
				
				</body>
			
			</html>';
			}
			else
			{
				echo "<h3><strong>Invalid Password Reset Link. Request new Reset Password Link <a href='forgotPassword.php'>here.</a></strong></h3><br/>";
				
				exit();
			}
		}
	}
	else
	{
	
	?>
		
		<br/><br/>	
		
		<h2><strong>Enough Of Mischief!! Go to <a href="index.php">homepage</a></strong></h2><br/>
		
		</div>
	
	</body>

</html>
	
	<?php
		exit();	
	}
}
else
{
	$newPassword=$_POST['password'];
	
	$confirmPassword=$_POST['confirmPassword'];
	
	$extHash=$_POST['confirmationCode'];
	//var_dump($_POST);
	if($newPassword!=$confirmPassword)
	{
		echo "<h3><strong>Passwords Doesn't match. Retry.</strong></h3><br/>";
	}
	else
	{
		if(strlen($newPassword)<8)
		{
			echo "<h3><strong>Password length should be atleast 8 characters.</strong></h3><br/>";
		}
		else
		{
			if(($resetRecord=getResetPassRecord($extHash))==false)
			{
				//var_dump($user);
				echo "<h3><strong>Some Error Occurred. Request new Reset Password Link <a href='forgotPassword.php'>here.</a></strong></h3><br/>";
				
				exit();
			}
			else
			{
				if($resetRecord['isValid']==1)
				{
					$conn=new QoB();
					
					$userId=$resetRecord['userId'];
					
					$invalidateExtHashSQL="UPDATE password_reset SET isValid=0 WHERE resetLink=?";
					
					$values2[0]=array($extHash => 's');
					
					$conn->update($invalidateExtHashSQL,$values2);
					
					if($conn->error=="")
					{
						$newPasswordHash=hash("sha512", $newPassword.PASSSALT);
						
						$values[0]=array($newPasswordHash => 's');
						
						$values[1]=array($userId => 's');
						
						$resetPasswordSQL="UPDATE registered_users SET password=? WHERE userId=?";
						
						$result=$conn->update($resetPasswordSQL,$values);
						
						if($conn->error=="")
						{
							echo "<h3><strong>Password changed successfully. Go back to <a href='index.php'>homepage.</a></strong></h3><br/>";
							
							exit();
						}
						else
						{
							notifyAdmin("Conn Error:".$conn->error." in resetting Password",$userId);
							
							echo "<h3><strong>Some error occurred in resetting password. May be due to Server Overload. Please Try after sometime. Admin has been intimated.</strong></h3><br/><br/>";
						}
					}
					else
					{
						notifyAdmin("Conn Error:".$conn->error." while invalidating extHash in reset Password",$userId);
						
						echo "<h3><strong>Some error occurred in resetting password. May be due to Server Overload. Please Try after sometime. Admin has been intimated.</strong></h3><br/><br/>"; 
					}
				}
				else
				{
					echo "<h3><strong>Invalid Password Reset Link. Request new Reset Password Link <a href='forgotPassword.php'>here.</a></strong></h3><br/>";
					
					exit();
				}
			}
		}
		
	}
	

	echo '
			<br/>
			
			<br/>
			
			<p> Enter new password for your account: '.$userId.'. Atleast 8 characters.</p>
			
			<form action="resetPassword.php" method="POST">

				<p class=formtext>New Password : <input type="password" name="password"/></p>
				
				<p class=formtext>Confirm New Password : <input type="password" name="confirmPassword"/></p>
				
				<input type="hidden" name="confirmationCode" value="'.$extHash.'"/> 
    			
    			<input type="submit" class = "btn btn-large btn-success" value="Change Password"/>	
			
			</form>
		
		</div>
	
	</body>

</html>';


}

			
?>

			
