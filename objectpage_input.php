<html>
<head>
<? include 'header.php'; ?>

<?	session_start();
	include_once("functions.php");
	$title = "Create Team";
	if(!is_logged())
		header("Location: login.php");
?>
</head>
<body>
<font size=5>
<div id="wrap">
<br>
Enter object ID to display : <br><br>
<form action="objectpage.php" method="get"
enctype="multipart/form-data">
Object ID :<input type="text" name="object_id" />
<br><br>
<input type="submit" name="submit" value="  Submit  " />
</form>
</div>
<?
   include("bottom.php");
?>
</font>
</body>
</html>
