<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
	echo '<p>Hello World</p>'; 
	
	$fStream = fopen('./config/database.json', 'r') or die ('Unable to open file');
	$vars = json_decode(fread($fStream, filesize('./config/database.json')), true);
	fclose($fStream);
	
	$conn = mysqli_connect($vars["host"], $vars["user"], $vars["password"], $vars["database"], $vars["port"]);
	
	if($conn->connect_error) {
		die("Connection failed" . $conn->connect_error);
	}
	echo "Connected successfully";
 ?> 
 </body>
</html>