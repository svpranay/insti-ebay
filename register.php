<html>
<body>
<? session_start();
   include_once("functions.php");
   include("header.php");
   connect();
   
   if(!is_logged() && (($_POST["check_captcha"] == $_SESSION["captcha_check"])))
	{	
            $query = "SELECT * FROM users WHERE user_name = '".$_POST["user_name"]."'";
            $result = mysql_query($query);
	    if(mysql_num_rows($result) > 0)
            { 
              echo "<h2><a href=login.php>User-name already taken, choosen another username. </a></h2>";
            } else {
             $secretword = "this is my first web deployment";
             $hashedpasswd  = md5($_POST["password"].$secretword);
             $sql = "INSERT into users(user_name , email_id , password) values('".$_POST["user_name"]."','".$_POST["email_id"]."' ,'".$hashedpasswd."')";
             $result = mysql_query($sql); 
             echo "<h2><a href=login.php>Registration successful. Please login to continue</a></h2>";
           }
   } else {
   header("Location: login.php");
   }
   include("bottom.php");
   ?>
</body>
</html>
