<?php
	session_start();
	include_once("functions.php");
	connect();

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }  
    else
    {
     echo "Upload: " . $_FILES["file"]["name"] . "<br />";
     echo "Type: " . $_FILES["file"]["type"] . "<br />";
     echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
     echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
	 
     if (file_exists("/var/www/insti-ebay/" . $_FILES["file"]["name"]))
      {
       echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      $location = "/var/www/insti-ebay/";
      if(move_uploaded_file($_FILES["file"]["tmp_name"],
      $location . $_FILES["file"]["name"]))
      	echo "<br>successfully uploaded<br>";
      echo "Stored in: " . $location . $_FILES["file"]["name"];
      }
      // here add the details to the object database
    
		echo "<br>Dear ".$_SESSION["user_name"].","."<br>";
		$sql = "INSERT into objects( object_name , image_file_name  ,upload_date , object_description , object_price, user_name, category) values('".$_POST["name"]."' ,'".$_FILES["file"]["name"]."','".$_POST["date"]."','".$_POST["description"]."' ,'".$_POST["price"]."', '".$_SESSION["user_name"]."','".$_POST["category"]."')";
		$result = mysql_query($sql); 
		echo "Adding details of new item to database ";	
		// added to database

    }
  }
else
  {
  echo "Invalid file";
  }
  
     include("bottom.php");
     
?>