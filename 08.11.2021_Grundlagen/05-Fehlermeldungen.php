<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlermeldungen</title>
</head>
<body>
    <h1>Fehlermeldungen</h1>

    <?php
    
    //echo 4/0;
    //error_reporting(0);
    echo "<p>Der Wert der Variable i ist: $i.</p>";
    // FM Einstellungen (was wird angezeigt und was nicht) kann man entweder in php.ini editieren( bei gemietetem Webspace meist nicht zu erreichen) oder über eine Funktion 'error_reporting' in php:

    // für Optionen hierdrin siehe Dokumentation
    //nicht empfohlen!

    // Warnungen vs. Fehlermeldungen: Erstere werden mit angezeigt, letztere stoppen das ganze Skript: s.o.,4/0

    print_r ($i) // fehlendes ; -> Parse Error
    echo "<p>Keine weiteren Meldungen.</p>";
    
    
    ?>
</body>
</html>