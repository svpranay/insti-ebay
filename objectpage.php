<html>
<? include 'header.php' ?>
<body>
<font size=5>
<? 
	echo " <div class=\"left\"> ";
	session_start();
	include_once("functions.php");
   $title = "Home";
	if(!is_logged())
           header("Location: login.php");
		
	connect();
	$objectid = $_GET["object_id"];
	$sql = "SELECT image_file_name,	upload_date,	object_description ,	object_price,	object_name FROM objects where object_id = $objectid ";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result))	
   {
	$imagefilename = $row['image_file_name'];
	echo "<br> <p> Name : ".$row['object_name']."</p><br>";
	echo " <img width=300 height=300 src=\"".$imagefilename."\"\><br>";
	echo "<br> <p> Description : ".$row['object_description']."</p>";
	echo "<br> <p> Price : ".$row['object_price']."</p>";
	echo "<br> <p> Date : ".$row['upload_date']."</p><br>";
	}

	$sql = "SELECT user_name , object_id , comment FROM comment where object_id=".$objectid;
	$result = mysql_query($sql);
	
	echo "<table width=\"50\"  border=\"1\">";
	echo "<tr><th>User Id</th><th>Comment</th></tr>";
	while($row = mysql_fetch_array($result))
	{
  		echo "<tr><td width=10%>".$row['user_name'] ."</td><td width=80%>".$row['comment']."</td></tr>";
    }
	echo "</table>";
	
echo "<br>";

// here is the code for commenting 
echo "<form action ='addcomments.php?object_id=".$objectid."' method='post'>";

?>
Have a Comment ? <input  type="text"  name="comment"> 
<input type="submit" name="submit" value="Post it!"  >
</form>
<br><br><br>
</div> 
<div class="right">
	<?
		echo "<form action ='addbids.php?object_id=".$objectid."' method='post'>";
?>
Want to bid ? <input  type="text"  name="price"> 
<input type="submit" name="submit" value="  Bid for it!  "  >
</form>
<br><br><br>
<?
		show_bid($objectid);
	?>
</div>
<div style="clear: both;"> </div>
</div>
<?

     include("bottom.php");
     ?>
     </font>
</body>
</html>
