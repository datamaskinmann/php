<html>
<head>
	<link rel="stylesheet" href="/stylesheets/body.css"/>
	<link rel="stylesheet" href="/stylesheets/navBar.css"/>
	<link rel="stylesheet" href="/stylesheets/menu.css"/>
</head>
	<div class="navBar">
		<a href="./">Hovedmeny</a>
	</div>
<?php
	$secs = 4400;
	
	echo "<div class=\"menu\"><h3>5. Omgjøring fra sekunder til minutter</h3>";
	echo $secs . " sekunder er <br>";
	
	// At least one hour?
	if($secs > 3600) {
		$hours = ($secs - $secs % 3600) / 3600;
		echo $hours;
		echo $hours > 1 ? " timer " : " time ";
		
		$secs -= 3600 * $hours;
	}
	
	if($secs > 60) {
		$minutes = ($secs - $secs % 60) / 60;
		
		echo $minutes;
		echo $minutes > 1 ? " minutter " : " minutt ";
		
		$secs -= 60 * $minutes;
	}
	
	if($secs > 0) {
		$secs = ($secs - $secs % 1);
		echo $secs;
		echo $secs > 1 ? " sekunder " : " sekund ";
	}
	echo "</div>";
?>
</html>