<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch - Case</title>
</head>
<body>
    <h1>Switch - Case</h1>
    <h2>V1 Wochentage</h2>

    <?php 
    
    $heute = 'Dienstag';

    switch($heute) {
        case 'Samstag':
            echo '<p>Heute ist Samstag.</p>';
            break; //break; weil: falls Bed. true, wird Switchcase abgebrochen - Performance!
        case 'Sonntag':
            echo '<p>Heute ist Sonntag.</p>';
            break;
        default:
            echo '<p>Leider kein Wochenende.</p>';
    }
    ?>
    <h2>V2&V3 Prüfungsergebnis</h2>

    <?php 
    
    $note = 2;
    
    switch($note) {
        case 1:
        case 2:
        case 3:
        case 4:
            $erg = 'bestanden';// gilt für alle vorhergehenden Cases
            break;
        case 5:
        case 6:
            $erg = 'durchgefallen';
            break;
        case 'keine Wertung':
            $erg = $note;
            break;
        default:
            $erg = 'Keine Auswertbare Bedingung gefunden.';
    }

    echo "<p>Das Ergebnis der Prüfung: $erg.</p>";

    switch(true) {
        case (($note >=1) and ($note <= 4)):
            $erg = 'bestanden';
            break;
        case (($note >=5) and ($note <=6)):
            $erg = 'durchgefallen';
            break;
        case ($note == 'keine Wertung'):
            $erg = $note;
            break;
        default:
            $erg = 'Keine Auswertbare Bedingung gefunden.';
    }

    echo "<p>Das Ergebnis der Prüfung: $erg.</p>";

    ?>
</body>
</html>