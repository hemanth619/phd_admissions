<!--
************************************************************************
register.php : Resister users for further login

Inputs :    Your Full Name 
            Email Address  
            UserName  
            Password  
Dropdowm :  Discipline
            Mode of Registration
Outputs :   NIL  
Buttons :   Submit
            Generate (Generates random password)
            Show (Shows password)
            Mask (Hides password)
************************************************************************
-->

<!--********************************SUBMIT******************************-->
<?PHP
require_once("./include/membersite_config.php");

if(isset($_POST['submitted']))
{
   if($fgmembersite->RegisterUser())
   {
        $fgmembersite->RedirectToURL("thank-you.html");
   
}}
?>
<!--********************************************************************-->

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
        <title>Contact us</title>
        <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" />
        <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
        <link rel="STYLESHEET" type="text/css" href="style/pwdwidget.css" />
        <script src="scripts/pwdwidget.js" type="text/javascript"></script>      
    </head>

    <body>
        <div id='fg_membersite'>
            <!--****************************************REGISTER FORM************************************ -->
            <form id='register' action='<?php echo $fgmembersite->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
                <fieldset >
                <legend>Register</legend>

                <input type='hidden' name='submitted' id='submitted' value='1'/>
                <div class='short_explanation'>* required fields</div>
                <input type='text'  class='spmhidip' name='<?php echo $fgmembersite->GetSpamTrapInputName(); ?>' />
                <div><span class='error'><?php echo $fgmembersite->GetErrorMessage(); ?></span></div>

                <div class='container'>
                    <label for='name' >Your Full Name*: </label><br/>
                    <input type='text' name='name' id='name' value='<?php echo $fgmembersite->SafeDisplay('name') ?>' maxlength="50" pattern='/[A-Za-z]+/' /><br/>
                    <span id='register_name_errorloc' class='error'></span>
                </div>

                <div class='container'>
                    <label for='email' >Email Address*:</label><br/>
                    <input type='text' name='email' id='email' value='<?php echo $fgmembersite->SafeDisplay('email')?>' maxlength="50" /><br/>
                    <span id='register_email_errorloc' class='error'></span>
                </div>

                <div class='container'>
                    <label for='username' >UserName*:</label><br/>
                    <input type='text' name='username' id='username' value='<?php echo $fgmembersite->SafeDisplay('username') ?>' maxlength="50" /><br/>
                    <span id='register_username_errorloc' class='error'></span>
                </div>

                <div class='container' style='height:80px;'>
                    <label for='password' >Password*:</label><br/>
                    <div class='pwdwidgetdiv' id='thepwddiv' ></div>
                    <noscript>
                    <input type='password' name='password' id='password' maxlength="50" />
                    </noscript>    
                    <div id='register_password_errorloc' class='error' style='clear:both'></div>
                </div>

                <div class='container'>
                    <input type='submit' name='Submit' value='Submit' />
                </div>

                </fieldset>
            </form>
            <!--************************************************************************************************************8-->
            <!-- client-side Form Validations:
            Uses form validation script from JavaScript-coder.com-->

            <!--****************************VALIDATION*********************************-->
            <script type='text/javascript'>
                var pwdwidget = new PasswordWidget('thepwddiv','password');
                pwdwidget.MakePWDWidget();
                var frmvalidator  = new Validator("register");
                frmvalidator.EnableOnPageErrorDisplay();
                frmvalidator.EnableMsgsTogether();
                frmvalidator.addValidation("name","req","Please provide your name");
                frmvalidator.addValidation("name","alpha","Please provide a valid name");
                frmvalidator.addValidation("email","req","Please provide your email address");
                //frmvalidator.addValidation("email","email","Please provide a valid email address");
                frmvalidator.addValidation("username","req","Please provide a username");
                frmvalidator.addValidation("password","req","Please provide a password");
            </script>
            <!--************************************************************************-->

        </div>
    </body>
</html>