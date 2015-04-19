<?PHP
include_once("backendFunctions.php");

if(isset($_SESSION['userId']))
{
  if(isset($_POST['submit']))
  {
    $userId=$_SESSION['userId'];

    $oldPassword=$_POST['oldpwd'];

    $newPassword=$_POST['newpwd'];
    
    $confirmNewPassword=$_POST['confirmNewPassword'];

    if($newPassword==$confirmNewPassword)
    {
      $oldPasswordHash=hash("sha512",$oldPassword.PASSSALT);

      $user=getUserByID($userId);

      if($user['password']==$oldPasswordHash)
      {
        $newPasswordHash=hash("sha512", $newPassword.PASSSALT);

        $values[]=array($newPasswordHash => 's');

        $values[]=array($userId => 's');

        $changePasswordSQL="UPDATE registered_users SET password=? WHERE userId=?";

        $con=QoB();

        $result=$con->update($changePasswordSQL,$values);

        if($con->error=="")
        {
          displayAlert("Password changed successfully.");

          RedirectToURL("forms.php");
        }
        else
        {
          displayAlert("Some Error occured. Please Try Again Later. Admin will be notified.");

          notifyAdmin("Conn. Error : $con->error while Changing Password", $userId);

          RedirectToURL("forms.php");
        }
      }
      else
      {
        displayAlert("Old password doesnt match. Try again.");
      }
    }
    else
    {
      displayAlert("Passwords in New Password and Confirm New Password fields doesn't match. Try Again.");
    }
  }
}
else
{
  displayAlert("Please login to continue.");

  RedirectToURL("login.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  <head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title>Change password</title>
    <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
    <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
    <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
    <script src="scripts/pwdwidget.js" type="text/javascript"></script>       
  </head>

  <body>
    <!-- Form Code Start -->
    <div id='fg_membersite'>
      <form id='changepwd' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
        <fieldset >
          <legend>Change Password</legend>
          <input type='hidden' name='submitted' id='submitted' value='1'/>
          <div class='short_explanation'>* required fields</div>
          <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>
          
          <div class='container'>
            <label for='oldpwd' >Old Password*:</label><br/>
            <div class='pwdwidgetdiv' id='oldpwddiv' ></div><br/>
            <noscript>
              <input type='password' name='oldpwd' id='oldpwd' maxlength="50" />
            </noscript>    
            <span id='changepwd_oldpwd_errorloc' class='error'></span>
          </div>

          <div class='container'>
            <label for='newpwd' >New Password*:</label><br/>
            <div class='pwdwidgetdiv' id='newpwddiv' ></div>
            <noscript>
              <input type='password' name='newpwd' id='newpwd' maxlength="50" /><br/>
            </noscript>
            <span id='changepwd_newpwd_errorloc' class='error'></span>
          </div>
          <br/>
          <br/>
          <br/>
          <div class='container'>
              <input type='submit' name='Submit' value='Submit' />
          </div>
        </fieldset>
      </form>
      <!-- client-side Form Validations:
      Uses the excellent form validation script from JavaScript-coder.com-->

      <script type='text/javascript'>
        // <![CDATA[
        var pwdwidget = new PasswordWidget('oldpwddiv','oldpwd');
        pwdwidget.enableGenerate = false;
        pwdwidget.enableShowStrength=false;
        pwdwidget.enableShowStrengthStr =false;
        pwdwidget.MakePWDWidget();
        
        var pwdwidget = new PasswordWidget('newpwddiv','newpwd');
        pwdwidget.MakePWDWidget();
        
        var frmvalidator  = new Validator("changepwd");
        frmvalidator.EnableOnPageErrorDisplay();
        frmvalidator.EnableMsgsTogether();

        frmvalidator.addValidation("oldpwd","req","Please provide your old password");
        frmvalidator.addValidation("newpwd","req","Please provide your new password");
        // ]]>
      </script>
      <p>
        <a href='forms.php'>Home</a>
      </p>
    </div>
    <!--
    Form Code End (see html-form-guide.com for more info.)
    -->
  </body>
</html>