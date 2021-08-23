<html>
<head>
	<link rel="stylesheet" href="/stylesheets/body.css"/>
	<link rel="stylesheet" href="/stylesheets/navBar.css"/>
	<link rel="stylesheet" href="/stylesheets/menu.css"/>
</head>
	<div class="navBar">
		<a href="./">Hovedmeny</a>
	</div>
<?php
	$tall1 = 90;
	$tall2 = 39;
	
	echo "<div class=\"menu\"><h3>4. Kalkulator</h3>";
	echo "Summen av tallene er " . $tall1 + $tall2 . "<br>";
	echo "Differansen av tallene er " .  abs($tall1 - $tall2) . "<br>";
	echo "Gjennomsnittet av tallene er " . ($tall1+$tall2)/2 . "<br>";
	echo "</div>";
?>
</html>