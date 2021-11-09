<!--Skript PHP 8.0 Aufgabe S.29-->

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master of Desaster</title>
</head>
<body>
    <h1>Master of Desaster</h1>

    <?php 

        echo "<p>Geboren am 1.1.1111 in Aachen.<br>\n";
        echo "Besondere Merkmale: bester Musiker aller Zeiten<br>\n";
        echo "Unter seinem Pseudonym \"Walther von der Vogelweide\" \n schrieb er seine besten Songs.<br></p>\n<hr>\n";
        echo "<p style= 'color: #0f7' >Eine Gesamtliste aller Werke sprengt den Rahmen, aber sein berühmtestes Werk ist:<br></p>\n";
        echo "<p style= 'font-style: italic; font-weight: bold'>Knocking on Heaven´s Door<br></p>\n";
    ?>


<!--Aufgabe S.44 1.
a) 730 Euro!
b) Text
c) Text7
d) Text 730 Euro
e) 37 und zus. Warnmeldung
f) 37 und Warnmeldug ($c auf 0 gesetzt)
g) Fatal Error, division durch 0
h) Fetter['Text'], dann: [7Text30 Euro]-->

<!--Aufgabe S.45 2. -->

<h1>Preise</h1>

<?php 
define ('inklMWST',1.19);
define ('EURO', '€');
$bezeichnung_tisch = 'Schreibtisch';
$preis_tisch = '1999.00 €';
$bezeichnung_stuhl = 'Bürostuhl';
$preis_stuhl = '589.00 €';
$bezeichnung_lampe = 'Lampe';
$preis_lampe = '29.00 €';
$bezeichnung_pctisch = 'Computertisch';
$preis_pctisch = '999.00 €';

$br_preis_tisch = (double)$preis_tisch*inklMWST.EURO;
$br_preis_lampe = (double)$preis_lampe*inklMWST.EURO;
$br_preis_stuhl = (double)$preis_stuhl*inklMWST.EURO;
$br_preis_pctisch = (double)$preis_pctisch*inklMWST.EURO;

$netto_gesamt = (double)$preis_tisch+(double)$preis_stuhl+(double)$preis_lampe+(double)$preis_pctisch.EURO;
$brutto_gesamt = (double)$netto_gesamt*inklMWST.EURO;

echo    "<p>
         Netto-Gesamtpreis aller Artikel: $netto_gesamt .<br>\n
         Brutto-Gesamtpreis aller Artikel: $brutto_gesamt .<br>\n
         <hr>
         Brutto-Preis <b>Schreibtisch</b>: $br_preis_tisch .<br>\n
         Brutto-Preis <b>Bürostuhl</b>: $br_preis_stuhl .<br>\n
         Brutto-Preis <b>Lampe</b>: $br_preis_lampe .<br>\n
         Brutto-Preis <b>Computertisch</b>: $br_preis_pctisch .<br>\n
        </p>"

?>

<!--Aufgabe S.70 1.&2.-->
<h1>Bewertung</h1>

<?php 
$punkte = 8;

for ($i = 11; $i>=0; $i--) {

    switch($i) {
        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
        case 6: 
            $erg = 'Leider zu wenige Punkte erreicht';
            break;
        case 7:
            $erg = 'Ausreichend';
            break;
        case 8:
            $erg = 'Befriedigend';
            break;
        case 9:
            $erg = 'Gut';
            break;
        case 10:
            $erg = 'Sehr gut';
            break;
        default:
            $erg = 'Kein Wert im Scope der Bewertung vorhanden';
    }

    echo "<p>$i Punkte ergeben folgende Bewertung: $erg.</p>\n";
}

?>

<!--Aufgabe S.72 3.-->
<h1>while_do while Schleife</h1>

<?php 
$zahl = 1;
echo "<p>while Schleife mit Startwert: $zahl</p>\n";
while ($zahl <=5) {
    echo "$zahl<br>\n";
    $zahl++;
}
echo '<hr>';

$zahl = 1;
echo "<p>do-while Schleife mit Startwert: $zahl</p>\n";
do {
    echo "$zahl<br>\n";
    $zahl++;
} while($zahl<=5);
echo '<hr>';

?>

</body>
</html>