<html>
<? include 'header.php' ?>
<body>
<font size=5>
  <? 
     session_start();
     include_once("functions.php");
     $title = "Home";
     if(!is_logged())
      header("Location: login.php");
     echo "Welcome Mr. ".$_SESSION['user_name'].","."<br><br>";
     connect();
     $sql = "SELECT image_file_name,	upload_date,	object_description , object_price, object_name , object_id FROM objects";
     $result = mysql_query($sql);
     $counter = 0;
     echo "<table>";
     $in_a_row = 4;
     while($row = mysql_fetch_array($result))	
     {
     if ( $counter%$in_a_row == 0) 
     { 
     echo "<tr>";
     }
     $counter = $counter + 1;
     $imagefilename = $row['image_file_name'];
     echo "<td>";
     echo "<br> <p> <b>Item Name :</b> ".$row['object_name']."</p><br>";
     echo " <img width=200 height=200 src=\"".$imagefilename."\"\><br>";
     echo "<br> <p> <b>Description :</b> ".$row['object_description']."</p>";
     echo "<br> <p> <b>Price :</b> ".$row['object_price']."</p>";
     echo "<br> <p> <b>Date :</b> ".$row['upload_date']."</p>";
     //echo "<br> <p> <b>Object ID :</b> ".$row['object_id']."</p>";
     echo "<br> <p> <a href='/insti-ebay/objectpage.php?object_id=".$row['object_id']."' >Object page</a>";
     //http://localhost/insti-ebay/objectpage.php?object_id=19
     //echo "<br><hr /><br>";
     echo "</td>";
     if ( $counter%$in_a_row == 0) 
     { 
     echo "</tr>";
     }
     }
     echo "</table>";
     include("bottom.php");
     ?>
</font>
</body>
</html>
