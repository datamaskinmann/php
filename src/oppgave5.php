<html>
<head>
    <link rel="stylesheet" href="/stylesheets/body.css"/>
    <link rel="stylesheet" href="/stylesheets/navBar.css"/>
    <link rel="stylesheet" href="/stylesheets/menu.css"/>
    <link rel="stylesheet" href="./stylesheets/input.css"/>
</head>
<div class="navBar">
    <a href="./">Hovedmeny</a>
</div>
<div class="menu">
    <h3>Modul 2 - Oppgave 5</h3>
    <h4>Ditt tilfeldig-genererte passord</h4>
    <br/>
    <?php
        // Tillatte karakterer i passordgenereringen
        // A-Z og 0-9
        $allowedChars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        // Opprette en buffer for passordet
        $buffer = "";
        // Evig løkke
        while(true) {
            // Resette bufferen
            $buffer = "";

            // Generere en streng der vi legger til tilfeldige karakterer fra
            // våre tillatte karakterer
            for($i = 0; $i < 8; $i++) {
                $buffer .= $allowedChars[rand(0, strlen($allowedChars) -1)];
            }

            // Inneholder strengen en karakter mellom stor A og stor Z
            // og inneholder strengen et tall mellom 0-9?
            if(preg_match('/[A-Z]/', $buffer) && preg_match('/[0-9]/', $buffer)){
                // Ja -> bryt ut av løkken
                break;
            }
        }
        // Skrive resultatet til brukeren
        echo $buffer;
    ?>
</div>
</html>