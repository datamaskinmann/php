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
		echo "Tallene er: <h3 style='display: inline-block'>" . $_GET["x"] . "</h3> og <h3 style='display: inline-block'>" . $_GET["y"] . "</h3><br/>";
		echo "<h3 style='display: inline-block'>Summen</h3> er " . $_GET["x"] + $_GET["y"] . "<br/>";
		echo "<h3 style='display: inline-block'>Differansen</h3> er " . abs($_GET["x"] - $_GET["y"]) . "<br/>";
		echo "<h3 style='display: inline-block'>Gjennomsnittet</h3> er " . ($_GET["x"] + $_GET["y"])/2 . "<br/>";
		echo "</div>";
		$_GET["x"]++;
		if(($i+1)%3 == 0) {
			echo "<br/>";
		}
	}
	?>

</html>