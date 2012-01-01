<? session_start(); ?>

<html>
<title>
Add comments
</title>
<body>

<?
	include_once("functions.php");
	connect();
   $objectid = $_GET['object_id'];
	
	$sql = "INSERT into comment(user_name , object_id , comment) values('".$_SESSION["user_name"]."','".$_GET["object_id"]."' ,'".$_POST["comment"]."')";
	$result = mysql_query($sql); 
	echo " status ".$result;
	echo " Inserting the comment  ... Redirecting to home page";	
	
	echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"1; url=objectpage.php?object_id=".$objectid. "\">";
?>
</body>
</html>
