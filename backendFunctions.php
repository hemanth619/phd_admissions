<?php
include_once('QOB/qob.php');

function RedirectToURL($url)
{
    header("Location: $url");
    exit();
}

function getAppNoPrefix()
{
	$prefix=strtoupper(getDBName());
	return $prefix;
}

function getUserByID($userId)
{
	$con=QoB();

	$getUserSQL="SELECT *,personal_info.fullName as name From registered_users inner join personal_info on personal_info.userId=registered_users.userId WHERE userId=?";

	$values[]=array($userId => 's');

	$result=$con->fetchAll($getUserSQL,$values);

	if($con->error==""&&$result!="")
	{
		return $result;
	}
	else
	{
		notifyAdmin("Conn. Error : $con->error while fetching user by ID",$userId);
	}
}

function displayAlert($message)
{
	echo '<script>alert("'.$message.'")</script>';
}

function notifyAdmin($notification,$userIdentity)
	{
		$conn= getMasterDBQoBObject();

		$ip=$_SERVER['REMOTE_ADDR'];

		$notification="Notify: ".$notification.",  IP: ".$ip;

		$noteCrimeSQL="INSERT INTO adminNotif (userId, notif, ipAddress) VALUES(?,?,?)";

		$values1[0]=array($userIdentity =>'s');

		$values1[1]=array($notification => 's');

		$values[2]=array($ip=>'s');

		$result=$conn->insert($noteCrimeSQL,$values1);

		if($conn->error==""&&$result==true)
		{
			return true;
		}
		else
		{
			return false;
		}

	}

function getDBName()
{
	$con = mysqli_connect("localhost", "root", "isquarer", "phd_admission_master");
	$getDbNameSQL="SELECT dbname From db_list where activeStatus=1";
	$result=mysqli_query($con,$getDbNameSQL);
	if(mysqli_num_rows($result)==0)
	{
		//displayAlert("Admissions aren't open yet. Please Try again later.");
		return "NODB";
	}
	else
	{
		$row=mysqli_fetch_array($result);
		//var_dump($row);
		$dbName=$row['dbname'];
		//echo $dbName;
		return $dbName;
	}

}

function getMasterDBQoBObject()
{
	$con=QoB("localhost","root","root", "phd_admission_master");
	return $con;
}


function getMailerObject()
	{
		try
		{
			$mail = new PHPMailer(true);

			$mail->IsSMTP();

			$mail->IsHTML();

			$mail->Timeout    = 45;

			$mail->SMTPAuth   = true;                  // enable SMTP authentication

			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier

			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server

			$mail->Port       = 465;                  // set the SMTP port

			$mail->Username   = "phdadmissionsiiitdm@gmail.com";  // MAIL username

			$mail->Password   = "admissions6350";            // MAIL password

			$mail->Sender     = "phdadmissionsiiitdm@gmail.com";

			$mail->From       = "Webmaster IIITDMK";

			$mail->FromName   = "Ph.D Admissions Admin @ IIITDM-Kancheepuram";

		}
		catch(phpmailerException $e)
		{
			notifyAdmin($e->errorMessage()."!!!! MailSubject: ".$subject,$userId);
			return false;
		}
		return $mail;
	}


function sendEmail($mailerObject,$emailId,$content,$subject,$attachments="")
	{
		try
		{
			$mail= $mailerObject;// Mailer object declared as a parameter to avoid creating multiple unnecessary connection instances for each mail sent.

			$mail->Subject    = $subject;

			$mail->WordWrap   = 500; // set word wrap

			$mail->AddAddress($emailId); //attaches the receiver email address.

			$mail->Body       = $content;

			if($attachments!="")
			{
				$splitAttachments=explode(",",$attachments);

				$attachmentCount=count($splitAttachments);

				for($i=0;$i<$attachmentCount;$i++)
					{
						$mail->AddAttachment($splitAttachments[$i]);
					}
			}
			//$mail->isSMTP();
		
			$mail->send();

			$mail->ClearAddresses();

			return true;
		}
		catch(phpmailerException $e)
		{
			notifyAdmin($e->errorMessage()."!!!! MailSubject: ".$subject,$userId);
			return false;
		}

	}


function GetAbsoluteURLFolder()
    {
        $scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
        $scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
        return $scriptFolder;
    }


function generateRandomKey()
{
	$time=time();

	$randKey=hash("sha512", $time.RANDSALT);

	return $randKey;
}


function sendEmailConfirmationLink($userId)
{
	
    $user=getUserByID($userId);

    $con=QoB();

    $randomKey=generateRandomKey();

    $storeConfirmationLinkSQL="Insert into email_confirmation(userId,confirmationLink) Values(?,?)";

    $values[]=array($userId => 's');

    $values[]=array($randomKey => 's');

    $result=$con->insert($storeConfirmationLinkSQL,$values);

    if($con->error=="")
    {
    	$mailerObject=getMailerObject();

    	$subject="Confirm Your Email To Register For Ph.D Admissions@IIITDMK";

		$confirm_url = GetAbsoluteURLFolder().'/confirmreg.php?code='.$randomKey;
	        
	    $content ="Hello ".$user['name']."\r\n\r\n".
	    "Thanks for your registration with www.iiitdm.ac.in\r\n".
	    "Please click the link below or Enter $confirmcode in the page displayed after registration to confirm your email address.\r\n".
	    "$confirm_url\r\n".
	    "\r\n".
	    "Regards,\r\n".
	    "Webmaster\r\n".
	    "www.iiitdm.ac.in";

    	if(sendEmail($mailerObject,$user['emailAddress'],$content,$subject))
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    else
    {
    	notifyAdmin("Conn. Error: $con->error while storing confirmation Link in sendConfirmation",$userId);

    	return false;
    }
}


function resendEmailConfirmationLink($userId)
{

    $user=getUserByID($userId);

    $con=QoB();

    $invalidateOldConfirmationCodesSQL="UPDATE email_confirmation set isValid=0 WHERE userId=?";

    $values1[]=array($userId => 's');

    $result=$con->update($invalidateOldConfirmationCodesSQL, $values1);

    if($con->error=="")
    {
    	$randomKey=generateRandomKey();

	    $storeConfirmationLinkSQL="Insert into email_confirmation(userId,confirmationLink) Values(?,?)";

	    $values[]=array($userId => 's');

	    $values[]=array($randomKey => 's');

	    $result=$con->insert($storeConfirmationLinkSQL,$values);

	    if($con->error=="")
	    {
	    	$mailerObject=getMailerObject();

	    	$subject="Resend:: Confirm Your Email To Register For Ph.D Admissions@IIITDMK";

			$confirm_url = GetAbsoluteURLFolder().'/confirmreg.php?code='.$randomKey;
		        
		    $content ="Hello ".$user['name']."\r\n\r\n".
		    "This Email Confirmation mail has been resent as per your request. Please note that all the previous links you received have been invalidated.\r\n".
		    "Please click the link below or Enter $confirmcode in the page displayed after registration to confirm your Email Address.\r\n".
		    "$confirm_url\r\n".
		    "\r\n".
		    "Regards,\r\n".
		    "Webmaster\r\n".
		    "www.iiitdm.ac.in";

	    	if(sendEmail($mailerObject,$user['emailAddress'],$content,$subject))
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		return false;
	    	}
	    }
	    else
	    {
	    	notifyAdmin("Conn. Error: $con->error while storing confirmation Link in resend Confirmation",$userId);

	    	return false;
	    }
    }
    else
    {
    	notifyAdmin("Conn. Error: $con->error while invalidating old confirmation links",$userId);

    	return false;
    }
    
}

function sendResetPasswordLink()
{
	$user=getUserByID($userId);

    $con=QoB();

    $invalidateOldResetCodesSQL="UPDATE password_reset set isValid=0 WHERE userId=?";

    $values1[]=array($userId => 's');

    $result=$con->update($invalidateOldResetCodesSQL, $values1);

    if($con->error=="")
    {
    	$randomKey=generateRandomKey();

	    $storeConfirmationLinkSQL="Insert into password_reset(userId,resetLink) Values(?,?)";

	    $values[]=array($userId => 's');

	    $values[]=array($randomKey => 's');

	    $result=$con->insert($storeConfirmationLinkSQL,$values);

	    if($con->error=="")
	    {
	    	$mailerObject=getMailerObject();

	    	$subject="Reset your password for account at Ph.D Admissions@IIITDMK";

			$link = GetAbsoluteURLFolder().
                '/resetpwd.php?email='.
                urlencode($user['emailAddress']).'&code='.
                urlencode($randomKey);

	        $mailer->Body ="Hello ".$user['name']."\r\n\r\n".
	        "There was a request to reset your password at www.iiitdm.ac.in\r\n".
	        "Please click the link below to complete the request: \r\n".$link."\r\n".
	        "Regards,\r\n".
	        "Webmaster\r\n".
	        "www.iiitdm.ac.in";

	    	if(sendEmail($mailerObject,$user['emailAddress'],$content,$subject))
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		return false;
	    	}
	    }
	    else
	    {
	    	notifyAdmin("Conn. Error: $con->error while storing reset password Link",$userId);

	    	return false;
	    }
    }
    else
    {
    	notifyAdmin("Conn. Error: $con->error while invalidating old reset password links",$userId);

    	return false;
    }
}
?>