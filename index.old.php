<?
	include 'header.php';
	session_start();
	include_once("functions.php");
	$title = "Home";
	if(!is_logged())
		header("Location: login.php");
	echo  	"<h2>Welcome Mr.".$_SESSION["user_name"]." to Insti-bay</h2>";
	echo    "<font size=5>";
	echo	"<a href=\"search_input.php\">Search </a>"; echo "<br><br>";
	//echo	"<a href=\"objectpage_input.php\">Object page </a>"; echo "<br><br>";
	echo	"<a href=\"upload_file_input.php\">Upload a new item </a>"; echo "<br><br>";
	//echo	"<a href=\"register.php\">Register </a>"; echo "<br><br>";
	echo	"<a href=\"onsale.php\">On Sale </a>"; echo "<br><br>";
	echo	"<a href=\"logout.php\">Logout </a>"; echo "<br><br>";
	echo 	"</font>";
	include("bottom.php");

?>
