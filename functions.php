<? 
	function show_bid($object_id)
	{
	
	$sql = "SELECT user_name ,price FROM bids where object_id=".$object_id;
	$result = mysql_query($sql);
	echo "<table border=\"1\">";
	echo "<tr><th>User Name</th><th>Bid Amount</th></tr>";
	while($row = mysql_fetch_array($result))
	{
  		echo "<tr><td width=10%>".$row['user_name'] ."</td><td width=80%>".$row['price']."</td></tr>";
    }
	echo "</table>";
	}

	
  function is_logged()
   {

   if($_SESSION["logged"])
		return true ; 
   else 
   	return false ; 
   }

   function connect()
   {
	$host = "localhost";
	$username = "root";
	$password = "svpranay";	
	$database = "insti-ebay";
	
	if(mysql_connect($host, $username , $password))
		if(mysql_select_db($database))
			return true ; 
		else
			return false ; 
	else
		return false ; 
   }

   function close()
   {
	mysql_close();
   }

?>