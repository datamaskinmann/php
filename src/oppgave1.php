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
    <h3>Modul 4 - Oppgave 1</h3>
	<?php
		// Definere tom matrise
		$a = [];
		
		// Sette indeksene som gitt i oppgavebeskrivelsen
		$a[0] = 1;
		$a[3] = 2;
		$a[5] = 3;
		$a[7] = 4;
		$a[8] = 5;
		$a[15] = 6;
		
		echo "<h3>print_r</h3>";
		// Skrive ut matrisen ved hjelp av print_r
		print_r($a);
		echo "<br/>";
		
		// Skrive ut matrisen ved hjelp av løkke
		echo "<h3>Løkke</h3>";
		foreach($a as $i => $val) {
			echo "[" . $i . "] => " . $val . " ";
		}
	?>
	</div>
</html>