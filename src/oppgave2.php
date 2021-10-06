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
    <h3>Modul 4 - Oppgave 2</h3>
    <div id="msg" style="visibility: hidden">Feltene i rødt må fylles ut!</div>
    <?php
	// Lage en form
    echo "<div><form action=\"\" method=\"post\">
    <input type=\"text\" name=\"firstname\" value=\"" . (!empty($_POST['firstname']) // Gi feltet verdi dersom den ikke er tom i post
            ? $_POST['firstname'] : "") . "\" placeholder=\"Fornavn\"/>
    <input type=\"text\" name=\"lastname\" value=\"" . (!empty($_POST['lastname'])
            ? $_POST['lastname'] : "") . "\"placeholder=\"Etternavn\"/>
    <input type=\"text\" name=\"streetname\" value=\"" . (!empty($_POST['streetname'])
            ? $_POST['streetname'] : "") . "\" placeholder=\"Gatenavn\"/>
    <input type=\"number\" name=\"postalcode\" value=\"" . (!empty($_POST['postalcode'])
            ? $_POST['postalcode'] : "") . "\" placeholder=\"Postnummer\"/>
    <input type=\"text\" name=\"city\" value=\"" . (!empty($_POST['city'])
            ? $_POST['city'] : "") . "\"placeholder=\"Poststed\"/>
    <input type=\"text\" value=\"" . (!empty($_POST['phone'])
            ? $_POST['phone'] : "") . "\"name=\"phone\" placeholder=\"Mobilnummer\"/>
    <input type=\"text\" name=\"email\" value=\"" . (!empty($_POST['email'])
            ? $_POST['email'] : "") . "\" placeholder=\"Epost\"/>
    <select id='gender' style=\"width: 100%\" name=\"gender\" value=\"" . (!empty($_POST['gender'])
            ? $_POST['gender'] : "male") . "\">
        <option value=\"male\">Mann</option>
        <option value=\"female\">Kvinne</option>
    </select>
    <input type=\"text\" name=\"interests\" value=\"" . (!empty($_POST['interests'])
            ? $_POST['interests'] : "") . "\" placeholder=\"Interesser\"/>
    <input style=\"float: right; margin-top: 1ch\" name=\"submit\" type=\"submit\" value=\"Send inn\"/>
</form></div>";
// Hvis submit er satt og ikke tom
    if (isset($_POST["submit"]) && !empty($_POST["submit"])) {
		// Opprette matrise over parameter navn fra inputs
        $params = array("firstname", "lastname", "streetname", "postalcode", "city", "phone", "email",
            "gender", "interests");
		
		// Generere tom matrise $missing
        $missing = [];

		// Iterere over parameternavn
        foreach ($params as $param) {
			// Sette index i matrise til å være true eller false
			// basert på evalueringen av empty
            $missing[$param] = empty($_POST[$param]);
        }

		// OK skal være true dersom ingen av feltene er ugydlige
        $ok = false;
		// Iterere gjennom verdiene i $missing
        foreach (array_values($missing) as $value) {
            $ok = true;
			// Hvis et felt er ugyldig
            if ($value) {
				// Sett ok til å være false og bryt ut av løkken
                $ok = false;
                break;
            }
        }
		
		// Hvis gender feltet har en verdi
        if (!$missing['gender']) {
			// Gender er en select med options
			// Dermed må dette feltet 'auto-settes' på en
			// annen måte en de andre feltene ovenfor
            echo "<script type='text/javascript'>
            $(\"#gender option[value='" . $_POST["gender"] . "']\").attr('selected', 'selected');
            </script>";
        }

		// Sette farge rød eller grønn basert på om 
		// felt er gyldig eller ugyldig
        echo "<script type='text/javascript'>";
		// Iterere gjennom $missing
        foreach ($missing as $key => $value) {
            if ($value) {
				// Feltet mangler, feltet skal være rødt
                echo "$(\"input[name='" . $key . "']\").css(\"background-color\", \"#e8aeae\");";
            } else {
				// Feltet er gyldig, feltet skal være grønt
                echo "$(\"input[name='" . $key . "']\").css(\"background-color\", \"#e1eedd\");";
            }
        }

		// Hvis ikke alle felter er gydlige
		// Skal vi gi beskjed til brukeren at
		// Feltene i rødt må fylles ut
		// Dette gjøres ved hjelp av å vise eller skjule
		// En beskjed
        if (!$ok) echo "$(\"#msg\").css('visibility', 'visible')";
        else echo "$(\"#msg\").css('visibility', 'hidden')";
        echo "</script>";

		// Koden underfor skal ikke eksekveres dersom
		// Det eksisterer ugyldige felt
		// Derfor bryter vi ut av koden dersom
		// ok er false
        if (!$ok) return;

		// Opprette matrise, sette relevante felt
        $m = array(
            "firstname" => $_POST["firstname"],
            "lastname" => $_POST["lastname"],
            "streetname" => $_POST["streetname"],
            "postalcode" => $_POST["postalcode"],
            "city" => $_POST["city"],
            "phone" => $_POST["phone"],
            "email" => $_POST["email"],
            "gender" => $_POST["gender"],
            "interests" => $_POST["interests"],
            "contingentstate" => 0,
            "courseactivities" => null,
        );

        echo "<br/></br><br/><h3>Et nytt medlem ble registrert</h3>";
		// Iterere gjennom matrisen som ble generert,
		// printe ut verdi
        foreach(array_values($m) as $value) {
            echo $value . "<br>";
        }
    }
    ?>
</div>
</html>