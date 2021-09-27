<html>
<head>
    <link rel="stylesheet" href="/stylesheets/body.css"/>
    <link rel="stylesheet" href="/stylesheets/navBar.css"/>
    <link rel="stylesheet" href="/stylesheets/menu.css"/>
    <link rel="stylesheet" href="/stylesheets/input.css"/>
	    <link rel="stylesheet" href="/stylesheets/result.css"/>
</head>
<div class="navBar">
    <a href="../">Hovedmeny</a>
</div>
<div style="display: table; position: absolute; left: 50%; top: 10%; transform: translateX(-50%)">
<h3>Modul 3 - Oppgave 3</h3>
	<?php
	if(empty($_GET["x"]) || empty($_GET["y"])) return;
	for($i = 0; $i < 10; $i++) {
		echo "<div class='resultBox'>";
		// Skrive ut tallene til brukeren
		echo "Tallene er: <h3 style='display: inline-block'>" . $_GET["x"] . "</h3> og <h3 style='display: inline-block'>" . $_GET["y"] . "</h3><br/>";
		// Regne- og skrive ut summen av tallene til brukeren
		echo "<h3 style='display: inline-block'>Summen</h3> er " . $_GET["x"] + $_GET["y"] . "<br/>";
		// Regne- og skrive ut differansen av tallene til brukeren
		echo "<h3 style='display: inline-block'>Differansen</h3> er " . abs($_GET["x"] - $_GET["y"]) . "<br/>";
		// Regne- og skrive ut gjennomsnittet av tallene til brukeren
		echo "<h3 style='display: inline-block'>Gjennomsnittet</h3> er " . ($_GET["x"] + $_GET["y"])/2 . "<br/>";
		echo "</div>";
		// Øke tallet med 1
		$_GET["x"]++;
		// Bare for å få en ny linje for hver tredje boks som lages
		if(($i+1)%3 == 0) {
			echo "<br/>";
		}
	}
	?>

</html>