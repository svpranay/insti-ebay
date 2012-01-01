<html>
<body>
<? session_start();
   include_once("functions.php");
   include("header.php");
   connect();
   
   if(!is_logged() && (($_POST["check_captcha"] == $_SESSION["captcha_check"])))
	{	
            $newpasswd = rand(10000, 99999); 
            $secretword = "this is my first web deployment";
            $hashedpasswd  = md5($newpasswd.$secretword);
            $sql = "INSERT into users(user_name , email_id , password) values('".$_POST["user_name"]."','".$_POST["email_id"]."' ,'".$hashedpasswd."')";
            $result = mysql_query($sql); 
            // TODO : mail the new password
   ?>	  
   <h2><a href=login.php> Password reset successful. Please check for our e-mail at the e-mail address registered with our site. </a></h2>
   // remove the below line
   Your new password is <? echo $newpasswd; ?>.
  <? } else {
   header("Location: login.php");
   }
   include("bottom.php");
   ?>
</body>
</html>
