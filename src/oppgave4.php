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
    <h3>Modul 3 - Oppgave 4</h3>
    <form action="./oppgave4.php" method="post">
        <select name="kommune" style="width: 100%; margin: 1em">
			<option value="Kristiansand">Kristiansand</option>
			<option value="Lillesand">Lillesand</option>
			<option value="Birkenes">Birkenes</option>
			<option value="Harstad">Harstad</option>
			<option value="Kvæfjord">Kvæfjord</option>
			<option value="Tromsø">Tromsø</option>
			<option value="Bergen">Bergen</option>
			<option value="Trondheim">Trondheim</option>
			<option value="Bodø">Bodø</option>
			<option value="Alta">Alta</option>
		</select>
        <br/>
        <input style="float: right" type="submit" value="Send inn"/>
    </form>
	<div class="result" style='width: 50vw; margin-top: 2em'>
	<?php
	if(empty($_POST["kommune"])) return;
	// Opprette nøkkel-verdi par for By og fylke
	$counties = array(
		"Kristiansand" => "Agder",
		"Lillesand" => "Agder",
		"Birkenes" => "Agder",
		"Harstad" => "Troms og Finnmark",
		"Kvæfjord" => "Troms og Finnmark",
		"Tromsø" => "Troms og Finnmark",
		"Bergen" => "Vestland",
		"Trondheim" => "Trøndelag",
		"Bodø" => "Nordland",
		"Alta" => "Troms og Finnmark",
	);
	// Skrive ut beskjed til brukeren
		echo $_POST["kommune"] . " ligger i " . $counties[$_POST["kommune"]] . " fylke";
	echo "</div>";
	?>
</html>