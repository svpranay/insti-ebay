<? session_start(); ?>

<html>
<title>
Add bids
</title>
<body>

<?
	include_once("functions.php");
	connect();
   $objectid = $_GET['object_id'];
	$sql = "INSERT into bids(user_name , object_id , price) values('".$_SESSION["user_name"]."','".$_GET["object_id"]."' ,'".$_POST["price"]."')";
	$result = mysql_query($sql); 
	echo " Inserting the bid ... Redirecting to home page";	

	echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"1; url=objectpage.php?object_id=".$objectid. "\">";
?>
</body>
</html>
