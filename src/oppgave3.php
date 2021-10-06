<html>
<head>
    <script type="text/javascript" src="./src/jquery.js"></script>
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
    <h3>Modul 4 - Oppgave 3</h3>
	Endre et meldem
    <div id="msg" style="visibility: hidden">Feltene i rødt må fylles ut!</div>
    <?php
	// Opprette matrise
        $m = array(
            "firstname" => "Sven",
            "lastname" => "Sørensen",
            "streetname" => "Markens gate 4a",
            "postalcode" => "4610",
            "city" => "Kristiansand",
            "phone" => "94034858",
            "email" => "svens@uia.no",
            "gender" => "male",
            "interests" => "Klatring, matlaging, musikk",
            "contingentstate" => 0,
            "courseactivities" => null,
        );
		
		// Dynamisk opprette form
		echo "<form action='' method='post'>";
		// Iterere gjennom overnevnte matrise
		foreach($m as $key => $value) {
			// Genererere input feltene
			echo "<input type='text' name='" . $key . "' value='" . $value . "'/>";
		}
		// Send inn knapp
		echo "<input style='margin-top: 1ch; float: right;' type='submit' name='submit' value='Send inn'/>";
		echo "</form>";
		
		// Hvis submit ikke er satt eller submit er tom hopper vi ut av koden
		if(!isset($_POST['submit']) || empty($_POST['submit'])) return;
		
		// Generere matrise over parametere fra skjema
		$params = array("firstname", "lastname", "streetname", "postalcode", "city", "phone", "email",
            "gender", "interests", "contingentstate", "courseactivities");

		// Generere tom matrise 'missing'
        $missing = [];

		// Iterere gjennom $params
        foreach ($params as $param) {
			// Ignorer hvis vi itererer på contingentstate og contingentstate er 0 eller
			// hvis vi itererer på courseactivities
			if(($param == "contingentstate" && $_POST['contingentstate'] == 0) 
				|| $param == "courseactivities") continue;
			// Sette index $param på missing til å være
			// enten true eller false basert på om verdien
			// er tom eller ei
            $missing[$param] = empty($_POST[$param]);
        }

		// Definere variabel ok
        $ok = false;
		// Iterere gjennom verdier i missing
        foreach (array_values($missing) as $value) {
            $ok = true;
			// Hvis verdien er true (altså et felt mangler)
            if ($value) {
				// sette ok til å være false og bryte ut av løkken
                $ok = false;
                break;
            }
        }

		// For å endre farge på felt basert på om feltet
		// er gyldig eller ei
        echo "<script type='text/javascript'>";
        foreach ($missing as $key => $value) {
            if ($value) {
				// Feltet mangler, feltet blir rødt
                echo "$(\"input[name='" . $key . "']\").css(\"background-color\", \"#e8aeae\");";
            } else {
				// Feltet er gyldig, feltet blir grønt
                echo "$(\"input[name='" . $key . "']\").css(\"background-color\", \"#e1eedd\");";
            }
        }
		echo "</script>";
		
		// Endre veridene på feltene dersom det har forekommet endringer
		echo "<script type='text/javascript'>";
		foreach($params as $param) {
			// Sette attributten value på inputen til å være den endringen som kom inn
			echo "$(\"input[name='" . $param . "']\").attr('value', '" . $_POST[$param] . "');";
			// Dersom det finnes noen ugyldige felt
			// ønsker vi kun å oppdatere visuelt
			if($ok) $m[$param] = $_POST[$param];
		}
		
		echo "</script>";
		
		// Bryt ut av koden dersom det finnes none
		// ugyldige endringer
		if(!$ok) return;
		
		// Det finnes ingen ugyldige endringer,
		// si i fra til brukeren at endringene ble lagret
		echo "<script type='text/javascript'>";
		echo "alert('Endringene dine ble lagret')";
		echo "</script>";
	
    ?>
</div>
</html>