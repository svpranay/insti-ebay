<html>
<? 
	session_start();
	include_once("functions.php");
	include 'header.php' 
?>
<body>
<?
	 $title = "Home";
	if(!is_logged())
		header("Location: login.php");
	connect();
?>
<form method="POST" action="cc.php"> 
<img src="generate_captcha.php"> <br>
<input type="text" size="10" name="check"> <br> 
<input type="submit" name="submit" value="submit"> 
</form>
<?
   echo $_SESSION['check'];
   include("bottom.php");
 ?>
</body>
</html>
