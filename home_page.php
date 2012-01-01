<html>

<? include("header.php");
?>

<?	session_start();
	include_once("functions.php");
	$title = "Create Team";
	if(!is_logged())
		header("Location: login.php");
?>
  <body>
 
    <h2>Buy</h2>
    <br>
    <h2>Sell</h2>
  </body>
<?
include("bottom.php");
?>
</html>

