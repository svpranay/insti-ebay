<html>
<body>
    <? include 'header_login.php'; 
       session_start();
       include_once("functions.php");
       
       if(!is_logged())
       { 
       if(!$_POST["submit"]) { 
       if($_GET["fail"] == 1)
       echo "<h2>Invalid Password! Please try again!</h2>";
       else if($_GET["fail"] == 2)
       echo "<h2>Invalid login! Please try again!</h2>";
       ?>

    <form action="login.php" method="POST">
      <table id="login_table">
	<tr>
	  <th>Username:</th>
	  <td><input name="uname" type="text" />
	</tr>
	<tr>
	  <th>Password:</th>
	  <td><input name="passwd" type="password" />
	</tr>
	<tr> 
	  <th>Human ? <img src="generate_captcha.php"> </th>
	  <th><input type="text" size="10" name="check_captcha" ></th> 
	</tr>
	<tr><th></th>
	  <th><input type="submit" name="submit" /></th>
	</tr>
      </table>
    </form>
    <br></br>
    <table>
      <form action = "register.php" method="post">
	<tr> <th></th><th>New registration ? Welcome</th></tr>	
	<tr> <th>User-name :</th><th><input  type="text"  name="user_name"> </th></tr>
	<tr> <th>Email-ID</th><th><input  type="text"  name="email_id"></th></tr>
	<tr> <th>Password</th><th><input  type="password"  name="password"></th></tr>
		<tr> 
	  <th>Human ? <img src="generate_captcha.php"> </th>
	  <th><input type="text" size="10" name="check_captcha"> </th>
	</tr>
	<tr><th></th><th><input type="submit" method="post" name="submit"></th></tr>
    </table>			
      </form>
    <br><br>
    <table>			
      <form action = "forgot_password.php" method="post">
	<tr> <th></th><th>Forgot password ?</th></tr>	<tr> <th>Email-ID</th><th><input  type="text"  name="email_id"></th></tr>
		<tr> <th>User-name :</th><th><input  type="text"  name="user_name"> </th></tr>
	<tr> 
	  <th>Human ? <img src="generate_captcha.php"> </th>
	  <th><input type="text" size="10" name="check_captcha" ></th> 
	</tr>
	<tr><th></th><th><input type="submit" method="post" name="submit"></th></tr>

      </form>
    </table>			


    <?} else {
	$name = $_POST["uname"];
	$passwd = $_POST["passwd"];
	connect();
	
	$query = "SELECT * FROM users WHERE user_name = '$name'";
	
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0)
        {
           $user = mysql_fetch_array($result);
           $secretword = "this is my first web deployment";
           $hashedpasswd  = md5($passwd.$secretword);
    
    if(($hashedpasswd == $user["password"]) && ($_POST["check_captcha"] == $_SESSION["captcha_check"]))
    {
     $_SESSION["logged"] = true;
     $_SESSION["user_name"] = $name;
     $_SESSION["user_id"] = $user["user_id"];
     $_SESSION["email_id"] = $user["email_id"];
     header("Location: index.php");
    }
    else
    {
     header("Location: login.php?fail=1");
    }
    }
    else
    {
    header("Location: login.php?fail=2");
    }
    }
    }
    else {
    header("Location: index.php");
    }

    include("bottom.php");
    ?>
    
  </body>
</html>
