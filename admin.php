<html>

    <head>
        <title>Login</title>
        <?php include 'header.php' ?>
    </head>

    <style>
        table
        {
            border-collapse:collapse;
        }
        table,th, td
        {
            border: 0px solid black;
        }
    </style>

    <body>
        <ul id="nav">
            <?php include 'menu.php' ?>
        </ul>
        <div id="page" class="container">
            <div id="logo">
        		<img src="images/logo.jpg" width="180" height="150" alt="IIITD&M logo" />
        	</div>
        	
            <form action="admin.php" method=post>
                <?php
                    error_reporting(E_ALL ^ E_NOTICE);
                    session_start(); 
                    $notify = "";
                    if(isset($_SESSION['notify_box']))
                    {
                         $notify = $_SESSION['notify_box'];
                    }
                    if( $_SESSION["logging"]&& $_SESSION["logged"])
                    {
                         print_secure_content();
                    }
                    else
                    {
                        if(!$_SESSION["logging"])
                        {  
                            $_SESSION["logging"]=true;
                            loginform();
                        }
                        else if($_SESSION["logging"])
                        {
                            $number_of_rows=checkpass();
                            if($number_of_rows==1)
                            {	
                    	         $_SESSION[user]=$_POST[userlogin];
                    	         $_SESSION[logged]=true;
                    	         print"<h1>You have logged in successfully</h1>";
                    	         print_secure_content();
                            }
                            else
                            {       	 
                                loginform();
                    	        echo '<script type="text/javascript">';
                                echo 'alert("Invalid username or Password")';
                                echo '</script>';
                            }
                        }
                    }
                         
                    function loginform()
                    {
                        print "<h2>Welcome Admin</h2> <br>";
                        print ("<table border='0'><tr><td>Username</td><td><input type='text' name='userlogin' size'20'></td></tr><tr><td>password</td><td><input type='password' name='password' size'20'></td></tr></table>");
                        print "<input type='submit' value='Login'>";
                    }

                    function checkpass()
                    {
                        $servername="localhost";
                        $username="root";
                        $password="z";
                        $conn=  mysql_connect($servername,$username)or die(mysql_error());
                        mysql_select_db("test",$conn);
                        $notify1 = "";
                        if(isset($_GET['notify1_box'])){ $notify1 = $_GET['notify1_box']; }
                        $sql="select * from admin where name='$_POST[userlogin]' and password='$_POST[password]'";
                        $result=mysql_query($sql,$conn) or die(mysql_error());
                        return  mysql_num_rows($result);
                    }

                    function print_secure_content()
                    {
                        header("location:adminform1.php");
                    }
                ?>
            </form>
        <!-- /div added later-->
        </div>
    </body>
    <?php include 'copyright.php' ?>
</html>
