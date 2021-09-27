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
    <h3>Modul 3 - Oppgave 5</h3>
    <?php
    $buffer = 1;
	
	// Sjakkbrett har 64 ruter
    for ($i = 0; $i < 64; $i++) {
		// Gange buffer med seg selv
        $buffer *= 2;
		// Buffer større enn 1 milliard -> bryt løkken
        if ($buffer >= 1000000000) break;
    }

	// Printe ut bufferen til brukeren
	echo $buffer . "<br/><br/>";

	// Nøkkel, verdipar for
	// uttale av tall på Norsk
    $numbers = array(
        1 => "én",
        2 => "to",
        3 => "tre",
        4 => "fire",
        5 => "fem",
        6 => "seks",
        7 => "sju",
        8 => "åtte",
        9 => "ni",
        10 => "ti",
        11 => "elleve",
        12 => "tolv",
        13 => "tretten",
        14 => "fjorten",
        15 => "femten",
        16 => "seksten",
        17 => "sytten",
        18 => "atten",
        19 => "nitten",
        20 => "tjue",
        30 => "tretti",
        40 => "førti",
        50 => "femti",
        60 => "seksti",
        70 => "sytti",
        80 => "åtti",
        90 => "nitti",
        100 => "hundre",
        1000 => "tusen",
        1000000 => "million",
        1000000000 => "milliard",
    );
	
	$finished = false;
	
	while(true) {
		for($x = 0; $x < strlen((string)$buffer); $x++) {
			// Etablere den næreste enheten (Se kommentarer på closestUnit funksjonen for kontekst)
			$closestUnit = closestUnit($buffer);
			// Etablere navnet på den næreste enheten (Se kommentarer på closestUnitName funksjonen for kontekst)
			$closestUnitName = closestUnitName($buffer);
			
			// Hvis tallet for eksempel er 743 958,
			// må vi behandle tre sifre om gangen (743), fordi den næreste
			// enheten er 1000
			if($buffer >= 100*$closestUnit || ($buffer > 99 && $buffer < 1000)) {
				// 'Konvertere' strengen til språk
				// Hvis tallet eksempelvis er 832 958 nå vi hente ut '832'
				echo " " . threeDigit(subInt($buffer, 0, 3)) . " ";
				// I threeDigit funksjonen legges 'hundre' automatisk til,
				// denne if-setningen er dermed nødvendig for å unngå at vi
				// for eksempel får 'ni hundre og femtiåtte hundre' dersom tallet
				// er 958
				if(!($buffer > 99 && $buffer < 1000)) echo $closestUnitName;
				// Hvis tallet eksempelvis er 743 958
				// må vi sette tallet til å være 958 for neste iterasjon
				$buffer = subInt($buffer, 3);
				if($buffer <= 0) {
					// Vi har kalkulert hele tallet
					$finished=true;
				} else {
					// Vi har ikke kalkulert hele tallet, vi må legge på et komma
					// Slik at vi får formuleringer slik som
					// Ni millioner, trehundre og åtti to tusen, tre hundre og to <- merk kommaene
					echo ",";
				}
				break;
			} else if($buffer >= 10*$closestUnit || ($buffer >= 0 && $buffer < 100)) {
				// 'Konvertere' tallet til naturlig språk
				// Hvis tallet eksempelvis er 12 192, må vi hente ut '12'
				echo " " . twoDigit(subInt($buffer, 0, 2)) . " ";
				// Hvis tallet eksempelvis er 68 vil vi ikke at teksten skal bli slik 'seksti åtte seksti',
				// dermed må vi kun legge til enheten dersom tallet er større enn hundre
				if(!($buffer >= 0 && $buffer < 100)) echo $closestUnitName . "er";
				// Hvis tallet eksempelvis er 82 512 må vi gjøre slik at det neste tallet
				// som prosesseres er 512
				$buffer = subInt($buffer, 2);
				
				if($buffer <= 0) {
					
					$finished=true;
				} else {
					echo ",";
				}
				break;
			} else {
				echo " " . $numbers[intIndex($buffer, 0)] . " " . $closestUnitName;
				$buffer = subInt($buffer, 1);
				if($buffer <= 0) {
					// Vi har kalkulert hele tallet
					$finished=true;
				} else {
					// Vi har ikke kalkulert hele tallet, vi må legge på et komma
					// Slik at vi får formuleringer slik som
					// Ni millioner, trehundre og åtti to tusen, tre hundre og to <- merk kommaene
					echo ",";
				}
				break;
			}
		}
		// Bryte ut av while-løkken dersom vi har
		// kalkulert hele tallet. Dette er nødvendig å gjøre her
		if($finished) break;
	}
	
	// Henter navnet på den nærmeste enheten
	// Eksempel: 12 812 -> tusen
	// 1 312 983 721 -> milliard
	function closestUnitName($num) {
		global $numbers;
		
		$buffer = 0;
		for($i = 0; $i < sizeof($numbers); $i++) {
			// Er tallet vårt større enn $numbers[$i]?
			if($num >= array_keys($numbers)[$i]) {
				// Ja, sett bufferen til å være det tallet
				$buffer = array_keys($numbers)[$i];
			} else {
				// Nei, vi har funnet riktig tall -> bryt ut av løkken
				break;
			}
		}
		return $numbers[$buffer];
	}
	
	// Finner verdien på den nærmeste navngitte enheten
	// Eksempel: 12 812 -> 1000
	// 1 312 983 721 -> 1 000 000 000
	function closestUnit($num) {
		global $numbers;
		
		$buffer = 0;
		for($i = 0; $i < sizeof($numbers); $i++) {
			// Er tallet vårt større enn $numbers[$i]?
			if($num >= array_keys($numbers)[$i]) {
				// Ja -> sett bufferen til å være det tallet
				$buffer = array_keys($numbers)[$i];
			} else {
				// Nei -> vi har funnet det riktige tallet ->
				// bryt ut av løkken
				break;
			}
		}
		return $buffer;
	}
	
	// Konverterer et tresifret tall til naturlig språk
	// Eksempel: 209 -> to hundre og ni
	function threeDigit($num) {
		global $numbers;
		
		$buffer = "";
		
		// Konverter det første sifret og legg på ' hundre og ',
		// eksempelvis: To hundre og
		$buffer .= $numbers[intIndex($num, 0)]. " hundre og ";
		
		// Er det midterste tallet en null?
		if(intIndex($num, 1) == 0) {
			// Ja -> konverter kun det siste tallet til naturlig språk
			// Eksempelvis -> To hundre og ni
			$buffer .= $numbers[intIndex($num, 3)];
		} else {
			// Nei -> Sammensett de to siste tallene og konverter det
			// til naturlig språk
			// Eksempelvis: To hundre og tretti ni
			$buffer .= twoDigit(subInt($num, 1));
		}
		
		return $buffer;
	}
	
	// Konverterer et tosifret tall til naturlig språk
	// Eksempelvis: 24 -> Tjuefire
	function twoDigit($num) {
		global $numbers;
		
		// Finnes det et navn på tallet (f.eks 12 = tolv)
		// men 24 er en sammensetning av tjue og fire
		if(in_array($num, array_keys($numbers))) {
			// Ja -> returner det tallet
			return $numbers[$num];
		} else {
			// Nei, vi må 'skape' tallet ved å sette sammen
			// to navngitte enheter
			$buffer = "";
			
			// Finn enheten på det første sifret * 10 (Eks -> 24 -> 20 -> tjue)
			$buffer .= $numbers[(intIndex($num, 0))*10] . 
			// Finn enheten på det andre tallet, eks: 24 -> 4 -> fire
			$numbers[intIndex($num, 1)];
			// Resultat: Tjuefire
			return $buffer;
		}
	}
	
	function intIndex($int, $index) {
		// Finner tallet på index $index
		// Eksempel: (724, 1) -> 2
		return (int)((string)$int)[$index];
	}
	
	// Returnerer en del av et tall
	// Eksempel (1378912, 2, 3) -> 891
	// Eller (1378912, 2) -> 8912
	function subInt() {
		if(func_num_args() == 2) {
			// Konvertere tallet til string,
			// utføre substring med gitte parametere
			// konvertere tilbake til int og returnere
			return (int)
			(substr((string)func_get_arg(0),
			func_get_arg(1)));
		}
		else if(func_num_args() == 3) {
			// Konvertere tallet til string,
			// utføre substring med gitte parametere
			// konvertere tilbake til int og returnere
			return (int)
			(substr((string)func_get_arg(0), 
			func_get_arg(1), 
			func_get_arg(2)));
		} else throw new Exception("subInt must have either two or three arguments");
	}
    ?>
</html>