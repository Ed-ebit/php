<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indizierte Arrays</title>
</head>
<body>
    <h1>Indizierte Arrays</h1>

    <?php 
    
    $staedte = array(
        'Erfurt',
        'Jena',
        'Weimar',
        'Frankfurt',
        'Berlin',
        'Leipzig'
    );

    echo $staedte[0];

    //Kurzschreibweise seit PHP 5.4

    $laender = [
        'Deutschland',
        'Schweiz',
        'Frankreich'
    ];

    echo $laender[0];// Ausgabe in ordentlichem html Absatz: 
    echo "<p>$laender[0]</p>";

    // Ausgabe eines Arrays zu Testzwecken
    // 1. mit print_r()

    echo '<pre>';
    print_r ($laender);
    echo '</pre>';

    // 2. mit var_dump()

    echo '<pre>';
    print_r ($laender);
    echo '</pre>';

    echo '<pre>', var_dump($staedte), '</pre>';

    //Anfügen eines Wertes in indizierten Arrays
    $laender[] = 'Belgien';

    echo '<pre>', var_dump($staedte), '</pre>';

    //Löschen eines Wertes aus einem indizierten Array

    unset($laender[2]);
    echo '<pre>', var_dump($laender), '</pre>';
    // Der Eintrag verchwindet inkl. seines Index, um die Indexzuordnung der anderen Werte im Array zu erhalten
    //echo "<p>$laender[2]</p>"; // gibt Warnung
    // wieder hinzufügen:
    $laender[2] = 'Niederlande';
    // so kann man auch die Werte an exist. Indices ändern/überschreiben
    echo '<pre>', var_dump($laender), '</pre>';//Nun hängt Index nr. 2 mit Nied. hintendran lol.
    // ksort() kann solche sachen sortieren
    ksort($laender);
    $laender[435] = 'Dänemark';
    echo '<pre>', var_dump($laender), '</pre>';
    echo '<pre>Das Array Laender hat '.count($laender).' Einträge.</pre>'; // % Einträge, leere Indices werden nicht gezählt

    //Ausgabe für den produktiven Einsatz
    foreach ($staedte as $stadt) {
        echo "$stadt<br>";
    }
    // die ersten 2:
    for ($i=0;$i<2;$i++) {
        echo "$laender[$i]<br>";
    }


    ?>
</body>
</html>