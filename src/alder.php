<html>
 <head>
  <title>PHP Test</title>
  <link rel="stylesheet" href="./stylesheets/menu.css"/>
  <link rel="stylesheet" href="./stylesheets/body.css"/>
  <link rel="stylesheet" href="./stylesheets/navBar.css"/>
 </head>
 <body>
 	<div class="navBar">
		<a href="./">Hovedmeny</a>
	</div>
 <?php
	$navn = "Sven";
	$alder = 21;
	
	
	echo "<div class=\"menu\"><h3>1. Nummerert liste</h3><ol><li>" . $navn . "</li><li>" . $alder . "</li></ol>";
	echo "<h3>2. Punktmerket liste</h3><ul style=\"list-style: circle;\"><li>" . $navn . "</li><li>" . $alder . "</li></ul>";
	echo "<h3>3. Paragraf</h3><p>" . $navn . "<br>" . $alder . "</p>";
	echo "</div>";
 ?>
 </body>
</html>