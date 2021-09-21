<html>
<head>
    <link rel="stylesheet" href="/stylesheets/body.css"/>
    <link rel="stylesheet" href="/stylesheets/navBar.css"/>
    <link rel="stylesheet" href="/stylesheets/menu.css"/>
    <link rel="stylesheet" href="/stylesheets/input.css"/>
	    <link rel="stylesheet" href="/stylesheets/result.css"/>
</head>
<div class="navBar">
    <a href="./">Hovedmeny</a>
</div>
<div class="menu">
    <h3>Modul 3 - Oppgave 2</h3>
	<?php
	$sum = 0;
		for($i = 0; $i <= 9; $i++) {
			echo $i . "<br/>";
			$sum += $i;
		}
		echo "Ferdig å telle! Summen av tallene ble " . $sum;
	?>
	</div>
</html>