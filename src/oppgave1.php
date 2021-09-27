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
    <h3>Modul 3 - Oppgave 1</h3>
    <form action="" method="post">
        <input name="name" type="text" placeholder="Navn..."/>
        <br/>
		<input name="age" type="number" placeholder="Alder..."/>
		<br>
        <input style="float: right" type="submit" value="Send inn"/>
    </form>
	<div>
	<?php
	// Sjekke om post parametere name og age eksisterer
	if(empty($_POST["name"]) || empty($_POST["age"])) return;
	echo "<div class='result' style='width: 50vw'>";
		echo "<br/></br>";
		echo "<h3 style='display: inline-block'>" . $_POST["name"] . "</h3> er <h3 style='display: inline-block'>" . $_POST["age"] . "</h3> og dermed ";
		// Er personen under 18?
		if($_POST["age"] < 18) {
			// legg til ikke
			echo " ikke ";
		}
		echo " myndig</div>";
	?>
	</div>
</html>