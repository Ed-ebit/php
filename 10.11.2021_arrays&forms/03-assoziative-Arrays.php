<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>assoziative Arrays</title>
</head>
<body>
    <h1>assoziative Arrays</h1>

    <?php 
    $hauptstaedte = array(
        'Schweiz' => 'Bern',
        'Frankreich' => 'Paris',
        'Spanien' => 'Madrid'
    );

    echo "<p>{$hauptstaedte['Frankreich']}</p>"; // hier wird stattt Index der selbst festgelegte Schlüssel zur Ausgabe verwendet

    //Hinzufügen
    $hauptstaedte['Polen'] = 'Warschau';

    echo '<pre>', var_dump($hauptstaedte), '</pre>';
    echo '<pre>', print_R($hauptstaedte), '</pre>';

    //Löschen
    unset($hauptstaedte['Spanien']);

    echo '<pre>', print_R($hauptstaedte), '</pre>';
    
    ?>

    <table style="border: 1px solid gray;">
        <tr>
            <th>Land</th>
            <th>Hauptstadt</th>
        </tr>
    <?php 
    //Syntax foreach(arrays as key=>Value)
    foreach($hauptstaedte as $land =>$stadt) {
        echo '<tr>';
            echo "<td>$land</td>";
            echo "<td>$stadt</td>";
        echo '</td>';
    }
    ?>
    </table> <!-- dynamische Tabelle erstellt :) -->
</body>
</html>