<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schleifen abbrechen oder Durchläufe überspringen</title>
</head>
<body>
    <h1>Schleifen abbrechen oder Durchläufe überspringen</h1>
    <h2> Schleifenabbruch</h2>

    <?php 
    
    $budget = 50;
    $ep = 9;
    $menge = 1;

    while( $menge <= 15 ){
        $gp = $ep * $menge;

        // Wenn der Gesamtpreis das Budget übersteigt
        if( $gp > $budget ) {
            // ... dann gib eine Meldung aus ..
            echo '<p>Budget überschritten!</p>';
            // und brich die Schleife ab.
            break;
        }

        // Ausgabe der Menge und des Gesamtpreises
        echo "<p>$menge Stück: $gp €.</p>";

        // Mengen-Variablen um 1 erhöhen
        $menge++;

    }
    ?>

    <h2>Schleifendurchlauf überspringen</h2>
    <p>Alle geraden Zahlen zwischen 1 und 20 ausgeben.</p>

    <?php 
    
    for( $i = 1; $i <= 20; $i++) {
        // Prüfung auf ungerade Zahl
        if( $i % 2 == 1 ) {
            // diesen Durchlauf hier abbrechen und mit dem nächsten weiter machen
            continue;
        }
        echo "$i<br>";
    }
    
    ?>


</body>
</html>