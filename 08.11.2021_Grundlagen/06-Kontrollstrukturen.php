<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrollstrukturen</title>
</head>
<body>
    <h1>Kontrollstrukturen</h1>

    <?php
    
    $a=4;
    $b = 3;

    /*=== Wenn==> Dann==> Sonst
    =============================================================== */
    if ($a=6) { // nur EIN = hier wird $a einfach die 6 zugewiesen. Daher ist die If-Bedingung immer wahr, egal welchen Wert die Variable vorher hatte. " = werden hier gebraucht!
        echo "<p>a ist gleich 6<br>";
        echo "Weil die Prüfung <b>wahr</b> ergibt.</p>";
    }else {
        echo "<p>a ist NICHT gleich 6<br>";
        echo "Weil die Prüfung <b>falsch</b> ergibt.</p>";
    }

    echo "<p>Diese Zeile wird immer ausgeführt.</p>";

    // Vergleichsoperatoren
    /*
        ist gleich: zwei Gleichheitszeichen -> == - Werte müssen übereinstimmen
        nicht gleich: Ausrufezeichen& Gleichheitszeichen) -> !=
        größer als: > größer gleich: >=
        kleiner als: <
        etc.
        pp.

        identisch: ===(3Gleichheitszeichen)
        nicht identisch: !==(!&2 Gleichheitszeichen)
    */

    // Bei identisch-Operator müssen Wert und Datentyp  übereinstimmen, weicht eins ab, ist es unidentisch

    if(6=='6') {
        echo 'true';
    } else {
        echo 'false';
    } // == Operator

    if(6 ==='6') {
        echo 'true';
    } else {
        echo 'false';
    } // === Operator

/* === Ternär-Operator
========================================================================= */
$schalter = 1;
$licht = 'AUS';
if ($schalter = 1) {
    echo '<p>Das Licht ist "AN".</p>';
} else {
    echo '<p>Das Licht ist "AUS".</p>';
}

$licht = ($schalter ==1 ) ? 'AN' : 'AUS';
echo "<p>Das Licht ist $licht.</p>";

echo '<p>Das Licht ist ' .(( $schalter == 1) ? 'AN':'AUS'). '.</p>';
    
    ?>
</body>
</html>