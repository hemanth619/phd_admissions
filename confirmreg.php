<?PHP
  require_once("QOB/qob.php");
  require_once("backendFunctions.php");
  if(isset($_GET['code']))
  {
    confirmUser($_GET['code']);
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
  <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>Confirm registration</title>
        <?php require_once("header.php");?>
  </head>

  <body>
  <?php
  require_once("header_logo.php"); 
  ?>
  <div style="padding-top: 20px;" class="container">
    <div  style="font-size: 26px;">Confirm registration</div>
    <p>
      Please Click on the Confirmation Link sent or enter the confirmation code that has been mailed to the email-id you provided in the box below.
    </p>

    <div >
      <form id='confirm' action="confirmreg.php" method='get' accept-charset='UTF-8'>
        <div class='short_explanation'><font color="red">&nbsp;* </font>&nbsp; required fields</div>
       <!--  <div><span class='error'><?php //echo $fgmembersite->GetErrorMessage(); ?></span></div> -->
        <div class='input-field container row col s4 offset-s3'>
            <input type='text' name='code' id='code' /><label for='code' >Confirmation Code:<font color="red">&nbsp;* </font></label>
        </div>
        <div class='container'>
          <button class="waves-effect waves-light btn" type='submit' name='Submit' value='Submit' >Submit<i class="mdi-content-send right"></i></button>
        </div>
      </form>
      
    </div>
  </div>
  </body>
</html>