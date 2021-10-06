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
<div class="menu" style="max-height: 90%; overflow-y: scroll">
    <h3>Modul 4 - Oppgave 5</h3>
	<?php
	
		// Matrise for deltagere
		$participants = array(
			"Jens" => 0,
			"Kristian" => 0,
			"Pelle" => 0,
			"Kristina" => 0,
			"Frøya" => 0,
			"Gina" => 0,
			"½geir" => 0,
			"Geir" => 0,
			"Stian" => 0,
			"Julia" => 0,
		);
		
		echo "<h3>Deltagere i konkurransen</h3>";
		
		// Printe deltagere
		foreach(array_keys($participants) as $n) {
			echo $n . "<br/>";
		}
		
		$round = 1;
		
		// Løkke som brytes når det er 1 deltager igjen
		while(count($participants) > 1) {
			// Printe ut hvilken runde det er
			echo "<h3>Runde " . $round . "</h3>";
			// Trekke poeng for deltagerene
			drawPoints();
			// Sortere etter synkende verdi
			arsort($participants);
			// Printe ut deltager samt poeng
			printArray($participants);
			// Hente ut matrise over spillere med lavest poeng
			$l = getLowestScores();
			// Fjerne de fra deltager matrisen
			removeIndexes($participants, array_keys($l));
			// Gi beskjed til brukeren hvem som har blitt fjernet
			echo "<h3>-----------------------------</h3>";
			echo "<h3>Fjernede deltagere</h3>";
			printArray($l);
			echo "<h3>-----------------------------</h3>";
			// Inkrementere rundenummer
			$round++;
		}
		
		// Løkken har brutt, det er kun 1 deltager igjen, printe
		// vinneren til brukeren
		echo "<h3>Vinneren er</h3>";
		echo array_keys($participants)[0];
		
		// Funksjon for å trekke poeng for brukerene
		function drawPoints() {
			global $participants;
			foreach(array_keys($participants) as $n) {
				// Trekke tall mellom 1 og 50
				$participants[$n] = rand(1, 50);
				// Hvis det kun er to deltagere igjen og de ruller likt må
				// de rulle igjen for å avgjøre
				if(count($participants) == 2 && array_values($participants)[0] == 
				array_values($participants)[1]) {
					drawPoints();
				}
			}
		}
		
		// Funksjon for å printe ut en matrise
		function printArray($a) {
			foreach($a as $key => $value) {
				echo $key . " <h3 style='display: inline-block; margin: 0'>[" . $value . "]</h3><br/>";
			}
		}
		
		// Funksjon for å hente ut en matrise
		// over deltager(e) med lavest poeng
		function getLowestScores() {
			global $participants;
			
			// Opprette buffer for deltager(e)
			// med lavest poeng
			$buffer = [];
			
			// Sortere etter synkende verdi
			asort($participants);
			// Hente ut første elementet av sortert matrise (lavest poeng)
			$lowest = reset($participants);
			
			foreach($participants as $key => $value) {
				// Hvis verdien ikke er det
				// samme som den laveste verdien i matrisen, brytes løkken
				if($value != $lowest) break;
				// Ellers legges deltageren til i matrisen over
				// fjernede deltagere
				$buffer[$key] = $value;
			}
			
			return $buffer;
		}
		
		// Funksjon for å fjerne gitte indekser på en matrise
		function removeIndexes(&$a, $e) {
			foreach($e as $element) {
				unset($a[$element]);
			}
		}
	?>
	</div>
</html>