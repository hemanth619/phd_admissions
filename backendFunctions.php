<?php
require_once("QOB/qob.php");

function getDBName()
	{
		$con = mysqli_connect(HOST, USER, PASSWORD, "phd_admission_master");
		$getDbNameSQL="SELECT dbName From db_list where activeStatus=1";
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
			$dbName=$row['dbName'];
			//echo $dbName;
			return $dbName;
		}

	}

function getMasterDBQoBObject()
	{
		$con=new QoB("localhost","root","isquarer", "phd_admission_master");

		return $con;
	}

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
		$con=new QoB();

		$getUserSQL="SELECT registered_users.*,personal_info.fullName as name From registered_users left join personal_info on personal_info.userId=registered_users.userId WHERE registered_users.userId=?";

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


function getUserByEmail($email)
	{
		$con=new QoB();

		$getUserSQL="SELECT registered_users.*,personal_info.fullName as name From registered_users left join personal_info on personal_info.userId=registered_users.userId WHERE registered_users.emailAddress=?";

		$values[]=array($email => 's');

		$result=$con->fetchAll($getUserSQL,$values);

		if($con->error==""&&$result!="")
		{
			return $result;
		}
		else
		{
			notifyAdmin("Conn. Error : $con->error while fetching user by ID",$email);

			return false;
		}
	}

function displayAlert($message)
	{
		echo '<script>alert("'.$message.'")</script>';
	}

function displayAlertAndRedirect($message,$url)
	{
		echo '<script>alert("'.$message.'"); window.location.href="'.$url.'"</script>';
	}

function notifyAdmin($notification,$userIdentity="")
	{
		$conn= getMasterDBQoBObject();

		$ip=$_SERVER['REMOTE_ADDR'];

		$childDBName=getAppNoPrefix();
		//echo $childDBName;

		$notification="DB: ".$childDBName."Notify: ".$notification.",  IP: ".$ip;

		$noteCrimeSQL="INSERT INTO suspicious (userId, notif, ipAddress) VALUES(?,?,?)";

		$values1[0]=array($userIdentity =>'s');

		$values1[1]=array($notification => 's');

		$values1[2]=array($ip=>'s');

		$result=$conn->insert($noteCrimeSQL,$values1);

		if($conn->error==""&&$result==true)
		{
			//echo "finished";
			return true;
		}
		else
		{
			
			//displayAlert($conn->error."in Notify Admin");
			//echo "Notify Error $conn->error";
			return false;
		}

	}


function getMailerObject($isHTML=FALSE)
	{
		try
		{
			$mail = new PHPMailer(true);

			$mail->IsSMTP();

			$mail->IsHTML($isHTML);

			$mail->Timeout    = 45;

			$mail->SMTPAuth   = true;                  // enable SMTP authentication

			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier

			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server

			$mail->Port       = 465;                  // set the SMTP port

			$mail->Username   = "phdadmissionsiiitdm@gmail.com";  // MAIL username

			$mail->Password   = "admissions6350";            // MAIL password

			$mail->Sender     = "phdadmissionsiiitdm@gmail.com";

			$mail->From       = "Ph.D Admissions Admin IIITDMK";

			$mail->FromName   = "Webmaster @ IIITDM-Kancheepuram";

		}
		catch(phpmailerException $e)
		{
			//echo "Mailer Error ".$e->errorMessage();
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
			//echo "SendMail Error ".$e->errorMessage();
			notifyAdmin($e->errorMessage()."!!!! MailSubject: ".$subject,$emailId);
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

function confirmUser($code)
	{
		$getUserByConfirmationLinkSQL="SELECT * FROM email_confirmation WHERE confirmationLink=?";

		$values[0]=array($code=>'s');

		$con=new QoB();

		$result=$con->fetchAll($getUserByConfirmationLinkSQL,$values);

		//var_dump($result);

		if($con->error=="")
		{
			$userId=$result['userId'];

			if($result['isValid']==1 && $result['confirmationStatus']==0)
			{
				$con->startTransaction();

				$confirmUserSQL="UPDATE registered_users SET emailConfirmationStatus=1 WHERE userId=?";

				$values[0] = array($userId=>'i');

				$result=$con->update($confirmUserSQL,$values);

				if($con->error=="")
				{
					$invalidateConfirmCodeSQL="UPDATE email_confirmation SET isValid=0, confirmationStatus=1 WHERE confirmationLink=?";

					$values[0]=array($code=>'s');

					$con->update($invalidateConfirmCodeSQL,$values);

					if($con->error=="")
					{
						$con->completeTransaction();

						displayAlertAndRedirect("Your Email Confirmation is successfull. Now you can proceed to Login.","login.php");

						//RedirectToURL("login.php");
					}
					else
					{
						$er=$con->error;

						$con->rollbackTransaction();

						notifyAdmin("Conn. Error $er while invalidating confirm code in confirm user.",$userId);

						displayAlert("Some Error Occured. Please Try Again.");
					}
				}
				else
				{
					$er=$con->error;

					$con->rollbackTransaction();

					notifyAdmin("Conn. Error $er while updating registrations in confirm user.",$userId);

					displayAlert("Some Error Occured. Please Try Again.");
				}

			}
			else
			{
				echo "<br/><h3><strong>Invalid Confirmation Link.Please use the latest link you received or Request a new one <a href='resendConfirmationEmail.php'>here</a></strong></h3><br/>";
			}
		}
	}



function sendEmailConfirmationLink($con,$user,$userId)
	{

		//displayAlert("In Send Email Confirmation".$userId);

	    //var_dump($user);

	    //displayAlert($user['emailAddress']);

	    //$con=new QoB();

	    //$con->startTransaction();

	    $email=$user['emailAddress'];

	    $randomKey=generateRandomKey();

	    $storeConfirmationLinkSQL="Insert into email_confirmation(userId,confirmationLink) Values(?,?)";

	    $values[]=array($userId => 's');

	    $values[]=array($randomKey => 's');

	    $result=$con->insert($storeConfirmationLinkSQL,$values);

	    if($con->error=="")
	    {
	    	$mailerObject=getMailerObject(TRUE);

	    	$subject="Confirm Your Email - Ph.D Admissions@IIITDMK";

			$confirm_url = GetAbsoluteURLFolder().'/confirmreg.php?code='.$randomKey;
		        
		    $content =
		    "Thank you for your interest in Ph.D. Programme at IIITDM-Kancheepuram<br/><br/>".
		    "Please click here <a href='$confirm_url'> here </a> <br/><br/> or <br/><br/> Enter the following <br/><br/>Code : $randomKey <br/><br/> in the page displayed after registration to confirm your email address.".
		    "<br/>".
		    "<br/>".
		    "Regards,<br/>".
		    "Webmaster<br/>".
		    "www.iiitdm.ac.in";

	    	if(sendEmail($mailerObject,$user['emailAddress'],$content,$subject))
	    	{
	    		//$con->completeTransaction();

	    		return true;
	    	}
	    	else
	    	{
	    		//$con->rollbackTransaction();

	    		return false;
	    	}
	    }
	    else
	    {
	    	notifyAdmin("Conn. Error: $con->error while storing confirmation Link in sendConfirmation",$userId);

	    	return false;
	    }
	}


function resendEmailConfirmationLink($email)
	{

	    $user=getUserByEmail($email);

	    //var_dump($user);

	    $userId=$user['userId'];

	    $con=new QoB();

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
			    "Please click the link below or Enter $randomKey in the page displayed after registration to confirm your Email Address.\r\n".
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

function sendResetPasswordLink($emailId)
	{
		$user=getUserByEmail($emailId);

		$userId=$user['userId'];

	    $con=new QoB();

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
	                urlencode($user['emailAddress']).'&token='.
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

function getResetPassRecord($extHash)
	{
		$conn=new QoB();

		$fetchUserSQL="SELECT * FROM password_reset WHERE resetLink= ?";

		$values[0]=array($extHash=>'s');

		$result=$conn->fetchAll($fetchUserSQL,$values);

		if($conn->error==""&&$result!="")
		{	
			return $result;
		}
		else
		{
			return false;
		}
	}
?>