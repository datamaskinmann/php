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
	
	$mysqli = mysqli_connect($vars["host"], $vars["user"], $vars["password"], "test", $vars["port"]);
 ?> 
 </body>
</html>