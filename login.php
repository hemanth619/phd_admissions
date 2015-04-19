<?PHP
session_start();
//var_dump($_POST);
  //require_once("./include/membersite_config.php");
include_once('QOB/qob.php');
include_once('backendFunctions.php');


 if(isset($_SESSION['userId']))
  {
    RedirectToURL("forms.php");
  }
  else
  {
    //displayAlert("Session Not Set");
    //var_dump($_POST);
    if(isset($_POST['submit']))
    {
      //displayAlert("Post Value Set");
      $conObj = new QoB();
      $userEmail = strtolower($_POST['email']);
      $password = $_POST['password'];
      $passwordHash=hash("sha512",$password.PASSSALT);
      //$userIdHash = hash("sha512",$userId.SALT);
      $values1 = array(0 => array($userEmail => 's'));
      $getUserSQL = "SELECT registered_users.userId, emailConfirmationStatus, password, fullName FROM registered_users left join personal_info on personal_info.userId=registered_users.userId  WHERE emailAddress = ?";
      $result1 = $conObj->fetchAll($getUserSQL,$values1,false);
      if($conObj->error == "")
      {
        //displayAlert("Queried");
        if($result1 != "")
        {
          //displayAlert("Fetched Something");
          if($result1['emailConfirmationStatus']!=1)
          {
            echo '<script>alert("Your Email is not yet confirmed. Please confirm your email address to proceed.")</script>';
          }
          else
          {
            if($passwordHash==$result1['password'])
            {
              //displayAlert("Passwords matched");
              $_SESSION['userId']=$result1['userId'];
              $_SESSION['email']=$_POST['email'];
              $_SESSION['applicationNo']=getAppNoPrefix().$result1['userId'];
              $_SESSION['UserFullName']=$result1['fullName'];
              RedirectToURL("forms.php");
            }
            else
            {
              displayAlert("Entered Email and password doesn't match.");
            }
          }
        }
        else
        {
          displayAlert("Entered Email and password doesn't match.");
        }
      }
      else
      {
        echo "Database Error. Please Try Again.".$conObj->error;
      }
    }
  }
?>
<!--****************************************************************-->
<!--
*********************************************************************
      login.php : Login to access the forms 

      Inputs :  Username
                Password
      Outputs : NIL
      Buttons : Submit
**********************************************************************
-->

<!--*****************************SUBMIT BUTTON*************************-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
    <head>
          <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
          <!--AUTHORS-->
          <meta name="author" content="Kuldeep Gunta">
          <meta name="author" content="Deepanshu">
          <meta name="author" content="Majety Hari Krishna">
          <meta name="author" content="Gantasala Hemanth">
          <!--AUTHORS-->

          <title>Login</title>
          <!-- <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css" /> -->
          <!-- Fontawesome CSS -->
          <link rel="stylesheet" href="css/font-awesome.min.css">
          <link href="default.css" rel="stylesheet" type="text/css" media="all" />
          <!-- Matrialize CSS -->
          <link rel="stylesheet" type="text/css" href="css/materialize.min.css" />

          <!-- JQUERY JS-->
          <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>

          <!-- Materialize JS -->
          <script type="text/javascript" src="js/materialize.min.js"></script>

          <!--<script type='text/javascript' src='scripts/gen_validatorv31.js'></script>-->
    
    </head>

    <!--*********************NAVIGATION BAR****************************-->
    <body>
      <?php require_once("header_logo.php"); ?>
      <!-- Dropdown Structure -->
      <ul id="dropdown1" class="dropdown-content">
        <li><a href="http://www.iiitdm.ac.in/" >Institute</a></li>
        <li><a href="http://www.iiitdm.ac.in/faculty.php">Faculty</a></li>
        <li><a href="http://www.iiitdm.ac.in/students.php">Students</a></li>
      </ul>
      <ul id="dropdown4" class="dropdown-content">
        <li><a href="impdates.php">Important Dates</a></li>
        <li><a href="faq.php">FAQ's</a></li>
        <li><a href="ack.php">Acknowledgment</a></li>
      </ul>
      <ul id="dropdown5" class="dropdown-content">
        <li><a href="http://iiitdm.ac.in/Contact%20Us.html">Office</a></li>
        <li><a href="dev.php">Dev Team</a></li>
      </ul>
      <nav id="mynav">
        <div id="mynav-wrapper" class="nav-wrapper">
          <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a class="dropdown-button" href="index.php" data-activates="dropdown1">Home<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Candidate Login</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown4">Information<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown5">Contact Us<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
          </ul>
        </div>
      </nav> 
      
    <!--***************************************************************-->
    
    <div id="page" class="container">
      <!--***********************LOGO**********************************-->
      <!-- <div id="logo">
    		<img src="images/iiitdm.svg" width="180" height="180" alt="IIITD&M logo" />
    	</div> -->
      <!--*************************************************************-->
      
      <!--********************LOGIN FORM*****************************-->
    	<div >
        <form id='login' method='POST' action="login.php" accept-charset='UTF-8'>
            <div id="loghead" class="center">Login</div>
            <!-- <input type='hidden' name='submitted' id='submitted' value='1'/> -->
              <div id="Email_button" class="input-field">
                <i class="mdi-content-mail prefix"></i>
                <input type="text" name='email' id='email' maxlength="50">
                <label for='email' >Email</label>
                <span id='login_username_errorloc' class='error'></span>
              </div>

              <div id="password_button" class="input-field">
                <i class="mdi-action-https prefix"></i>
                <input type="password" name='password' id='password' maxlength="50" />
                <label for='password' >Password</label>
                <span id='login_password_errorloc' class='error'></span>
              </div>

              <div id="submit_button" class="center"><button class="waves-effect waves-light btn-large" type='submit' name='submit' value='Submit' >Submit<i class="mdi-content-send right"></i></button></div>

            <div class='short_explanation'><a href='forgotPassword.php'>Forgot Password?</a></div>
        </form>
        <!--*************************************************************-->

      </div>
    </div>
    </body>
  <!--*****************************FOOTER********************************-->
  <?php include 'copyright.php' ?>
  <!--*******************************************************************-->
</html>

<script type="text/javascript">
$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
    $(this).removeClass('is-active');
  });

  $(".dropdown-button").dropdown();

});
</script>