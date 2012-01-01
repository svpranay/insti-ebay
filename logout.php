<?
	include("header.php");
	session_start();
	session_unset();
	header('Location: login.php');
	include("bottom.php");
?>
     