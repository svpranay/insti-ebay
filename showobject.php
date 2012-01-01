<html>
<body>
Testing show objects.
</body>
<?
	include_once("functions.php");
	connect();
	$sql = "SELECT user_id , object_id , comment FROM comment";
	$result = mysql_query($sql);
	
	echo "<table border=\"1\">";
	echo "<tr><th>User Id</th><th>Object Id</th><th>Comment</th></tr>";
	while($row = mysql_fetch_array($result))
	{
  		echo "<tr><td width=5%>".$row['user_id'] . "</td><td width=10%>" . $row['object_id']."</td><td width=10%>".$row['comment']."</td></tr>";
    }
	echo "</table>";


?>

</html>
