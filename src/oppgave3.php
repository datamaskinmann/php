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
    <h3>Modul 2 - Oppgave 3</h3>
    <form action="/src/wordInstanceCounter.php" method="get">
        <textarea name="richText" id="text" placeholder="Din tekst">
Thereses familie skulle ha ris til middag. Hun ville heller ha en is å spise.
        </textarea>
        <br/>
        <input style="display: inline-block" type="text" value="is" name="word" placeholder="Et ord"/>
        <input style="float: right" type="submit" value="Send inn"/>
    </form>
</div>
</html>