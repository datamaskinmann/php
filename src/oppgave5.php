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
    <h3>Modul 5 - Oppgave 5</h3>
	<form action="" method="POST">
		<label>Kryptering</label>
		<input type="text" name="encryptText" placeholder="Din tekst..."/>
		<input type="submit" name="encrypt"/>
	</form>
	
	<form action="" method="POST">
		<label>Dekryptering</label>
		<input type="text" name="decryptText" placeholder="Din tekst..."/>
		<input type="submit" name="decrypt"/>
	</form>
	<?php
		// Determinere offseten for cæsarschiffreringen vår
		$caesarOffset = -7;
		
		// Determinere de tillatte karakterene
		$chars = ['a','b','c','d','e','f','g','h','i','j',
		'k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
		
		function encrypt($text, $offset) {
			global $chars;
			
			// Opprette buffer for resultatet
			$buffer = "";
			
			foreach(str_split($text) as $c) {
				// Vi ønsker å beholde mellomrom inntakte
				// Dermed utfører vi ingen 'kryptering' av mellomrom
				
				if($c == " ") {
					$buffer .= " ";
					continue;
				}
				
				// Finne indeksen av $c i $chars
				$i = array_search(strtolower($c), $chars, true);
		
				if($i + $offset > count($chars) - 1) {
					// Hvis den nye bokstaven er utenfor lengden av matrisen,
					// må vi gå rundt til begynnelsen av matrisen igjen
					$buffer .= $chars[(($i+$offset)-(count($chars)-1))-1];
					continue;
				}
				if($i + $offset < 0) {
					// Hvis den nye bokstaven er utenfor lengden av matrisen i den andre retningen
					// må vi gå rundt til slutten av matrisen igjen
					$buffer .= $chars[count($chars)-abs(($offset+$i))];
					continue;
				}
				// Den nye bokstaven er innenfor lengden av matrisen
				$buffer .= $chars[$i + $offset];
			}
			
			return $buffer;
		}
		
		function decrypt($text, $offset) {
			
			return encrypt($text, $offset);
			
		}
		
		if(!empty($_POST["encryptText"])) echo(encrypt($_POST["encryptText"], $caesarOffset));
		if(!empty($_POST["decryptText"])) echo(encrypt($_POST["decryptText"], -$caesarOffset));
	?>
	</div>
</html>