<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>externes Skript einbinden</title>
</head>
<body>
    <h1>externes Skript einbinden</h1>

    <?php 
    
    /*
    Zum Einbinden von Skripten kennt PHP vier  Befehle:

    include
    require

    include_once
    require_once
    */

    include '02-funktion.inc.php';// .inc ist Konvention - nicht jeder Webserver kann reine .incs interpretieren. Machts aber übersichtlicher
    // hiermit können zB Funktionen ausgelagert werden, um dann hier wieder normal genutzt werden zu können

    
    // include: wenn Skript nicht gefunden wird gibts ne Warnung, Skript wird abere weiter ausgeführt
    // bei Aufruf der Funktion aber ein fatal Error, da die ja jetz nich existiert

    echo klausdieter ('verdammt');

    //require gibt sofort fatal error, wenn externes Skript nicht gefunden wird

    //_once: spezifischer Nutzen für eine Anwendung, gut falls ich nicht das ganze Skript schreibe sondern andere Autoren an anderen Stellen auch dinge aufrufen
    //(können nur 1x required/included werden sonst Fehler) 

    echo gib_mir('Duck','Donald Fauntleroy',78);

    /*seit PHP 8 Änderung der Parameter-RTeihenfolge möglich durch benannte Parameter */
    echo gib_mir(vorname: 'Hans', alter:25, nachname: 'Wurst');
    
    ?>
</body>
</html>