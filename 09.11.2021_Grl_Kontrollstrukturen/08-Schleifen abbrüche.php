<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schleifen abbrechen oder Durchläufe überscpringen</title>
</head>
<body>
    <h1>Schleifen abbrechen oder Durchläufe überscpringen</h1>
    <h2>Schleifenabbruch</h2>

    <?php 
    $budget = 50;
    $ep = 9;
    $menge = 8;

    while($menge <= 15) {
        $gp = $ep*$menge;

        // Wenn das Budget gesprent wird, wird abgebrochen
        if( $gp > $budget) {
            // ... dann gib eine Meldung aus ...
            echo '<p> Budget überschritten!</p>';
            // ... und brich die Schleife ab.
            break;
        }

        //Ausgabe der Menge und des Gesamtpreises
        echo "<p>$menge Stück: $gp €.</p>";

        // Mengen-Variable um 1 erhöhen
        $menge++;
    }
    
    ?>
</body>
</html>