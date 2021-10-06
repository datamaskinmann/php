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
    <h3>Modul 4 - Oppgave 4</h3>
	<?php
	// Generere tom matrise til gjenbruk i koden
		$a = [];
		
		echo "<h3>Utgangspunktsmatrise</h3>";
		// Generere indekser 0-9 og sette verdier på dem
		for($i = 0; $i < 10; $i++) {
			$a[$i] = $i+1;
		}
		
		print_r($a);
		echo "</br>";
		
		echo "<h3>Endret matrise</h3>";
		// Endre på matrisen
		for($i = 0; $i < 10; $i++) {
			// Sette verdien til å være det samme, men negativ
			$a[$i] = -$a[$i];
		}
		
		print_r($a);
		
		echo "<br/>";
		
		echo "<h3>Endrede indekser</h3>";
		
		// Endre på indekser
		for($i = 0; $i < 10; $i++) {
			shift($a, $i, $i+10);
		}
		
		print_r($a);
		
		// Funksjon som tar inn referanse til matrise, gammel index og ny index
		function shift(&$in, $oldIndex, $newIndex) {
			// Sette verdi på ny index 
			$in[$newIndex] = $in[$oldIndex];
			// Slette gammel index
			unset($in[$oldIndex]);
		}
	?>
	</div>
</html>