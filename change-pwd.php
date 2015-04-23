<?PHP
session_start();
require_once("QOB/qob.php");

require_once("backendFunctions.php");

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
   <?php require_once("header.php"); ?>
  </head>

  <body>
    <!-- Form Code Start -->
    <div >
      <form id='changepwd' action='change-pwd.php' method='post' accept-charset='UTF-8'>
        <div style="padding-top: 20px;" class='container'>
          <div style="font-size: 26px;"><center><strong>Change Password</strong></center></div>

           <div style="padding-left: 40px; padding-top: 20px;">
            <a class="waves-effect waves-light btn" href='forms.php'>Home</a>
          </div>

          <input type='hidden' name='submitted' id='submitted' value='1'/>
          <div class='short_explanation'><font color=red>&nbsp;*</font> required fields</div>
          <div class="row">
            <div class="input-field col s6">
            <input type='password' name='oldpwd' id='oldpwd' maxlength="50" />
            <label for='oldpwd' >Old Password<font color=red>&nbsp;*</font>&nbsp;:</label>
            </div>
          </div>     
          
          <div class="row">
            <div class="input-field col s6">
            <input type='password' name='newpwd' id='newpwd' maxlength="50" />
            <label for='newpwd' >New Password<font color=red>&nbsp;*</font>&nbsp;:</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s6">
            <input type='password' name='confirmNewPassword' id='confirmNewPassword' maxlength="50" />
            <label for='confirmNewPassword' >Confirm New Password<font color=red>&nbsp;*</font>&nbsp;:</label>
            </div>
          </div>

          <div class='container'>
              <button class="waves-effect waves-light btn" type='submit' name='Submit' value='Submit' >Submit<i class="mdi-content-send right"></i></button>
          </div>
        </div>
      </form>
      <!-- client-side Form Validations:
      Uses the excellent form validation script from JavaScript-coder.com-->
     
    </div>
    <!--
    Form Code End (see html-form-guide.com for more info.)
    -->
  </body>
</html>