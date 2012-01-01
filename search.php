
<html>
  <title>
    Search
  </title>
  <head>
    <? include 'header.php' ;
?>
  </head>
  
  <body>
    
  <?
     include_once("header.php");
     include_once("functions.php");
     connect();
     $sql = "SELECT object_id, object_name FROM objects where object_description LIKE '%" . $_POST['keyword']."%' or object_name like '%".$_POST['keyword']."%';" ;
     $result = mysql_query($sql);  
     echo "<h2>Showing results :</h2> ";
     $cnt = 1;
     while($row = mysql_fetch_array($result))
     {
  
     echo "<h3>".$cnt.".  <a href ='objectpage.php?object_id=".$row['object_id']."'> ". $row['object_name']." </a></h3> ";
     $cnt++;
     
     }
     if($cnt == 1)
     {
     echo "<br><h3>Sorry! No results found.</h3>";
     }
     ?>
    
     <?
     include("bottom.php");
     ?>
  </body>
</html>
