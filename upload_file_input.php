<html>
<head>
<?php
include 'header.php' ;
?>
</head>
<body>
<br/>
<?	session_start();
	include_once("functions.php");
	$title = "Create Team";
	if(!is_logged())
		header("Location: login.php");
?>
<div id="wrap">
</div>
<h2>Upload details of Item : </h2>
<table width="50" border="1" >
<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<tr><th>Name :</th><th><input type="text" name="name" /></th></tr>
<br/>
<tr><th>Description :</th><th><input type="text" name="description" /></th></tr>
<br/>
<tr><th>Price (in INR):</th><th><input type="text" name="price" /></th></tr>
<br/>
<tr><th>Date :</th><th><input type="text" name="date" /></th></tr>
<tr><th>Category :</th><th><input type="text" name="category" /></th></tr>
<br/>
<tr>
<th>
<label for="file">Filename:</label></th>
<th>
<input type="file" name="file" id="file" /> 
</th>
</tr>
<br />
<tr>
<th>
<input type="submit" name="submit" value="Submit" />
</th>
<th>
</th>
</tr>
</form>
</table>
</div>
  <?
     include("bottom.php");
   ?>
</body>
</html>
