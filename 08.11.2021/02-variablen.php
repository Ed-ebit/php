<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen</title>
</head>
<body>
    <h1>Variablen</h1>

    <?php 
    // Variablen beginnen in PHP mit einem $
    // Bekanntgabe (Deklaration) und Wertzuweisung (Initialisierung)
    $eine_zahl = 5; //Datentyp Integer (Ganzzahl)
    $eine_zeichenkette = 'Hier kommt ein Karton.';// Datentyp Zeichenkette (String)

    $keine_ahnung = '5'; //Zeichenkette, wird aber als num. Wert gelesen, solange ausschliesslich Zahlen darin zu finden sind. (Nur in php 8.0, in php7 wird aus Zeichenkette immer 0)

    /*=== Umgang mit Zeichenketten
    =========================================================
    Bei Einfügen in Strings wird ein Punkt statt + oder Komma genutzt! + ist hier MATHEMATISCHER Operator
    */
    echo '<h2>'. $eine_zeichenkette .'</h2>';

    echo "<h2>$eine_zeichenkette</h2>";
    // lol: in "" geschriebene Sachen werden interpretiert, nicht nur ausgegeben. s.o.
    // also Achtung vor "", falls etwas nicht interpretiert werden soll, außerdem schlägt es etwas auffe Performance.

    echo '<p>Das Ergebnis ist: '. $keine_ahnung + $eine_zahl . '</p>';

    // In Websiteformulare eingegebene Daten kommen immer als Zeichenketten an, egal ob Zahl oder nicht

    echo '<p>'.gettype($eine_zahl).'<br>';
    echo gettype($eine_zeichenkette).'<br>';
    echo gettype($keine_ahnung).'<br> </p>';

    // automatische Typkonvertierung:
    $keine_ahnung = 10.5; // Dezimalzahl mit Kommastelle (double/float)
    echo gettype($keine_ahnung).'</p>';

    /* === Rechnen mit Variablen
    ====================================================================
    */
    $a = 2.4;
    $b = ' 3 Tassen Kaffee';
    $c = '2.5';

    $erg = $a * $c;
    echo "<p> $a mal $c ist gleich $erg.</p>";
    
    $preis = $eine_zahl * $b;
    // steht am Anfang des Strings ein numerischer Wert, wird dieser für Rechnung genommen, ansonsten kommt FM
    // Trotzdem Warnung, dass nicht numerische Variable getroffen wurde. Man kann die Ausgabe der Warnung abstellen
    echo "<p>$b kosten $preis €.</p>";

    /* ===Inkrement und Dekrement
    ===============================================================
    */

    // 1. Pre- Inkrement
    $a = 39;
    $b = 2;

    echo "<p>a= $a, b = $b</p>";
    ++$a; //Inkrement: ist das Selbe wie $a +1;

    echo "<p>a= $a, b = $b</p>";

    $erg = ++$a + $b;

    echo "<p>Das Ergebnis von $a +$b ist <b>$erg</b>.</p>";

    // 2. Poat-Inkrement
    $a = 39;
    $b = 2;

    $erg = $a++ + $b; // hier stehen die + HINTER der Variable - Variable wird erst NACH der o.s. Addition nach oben gezählt
    echo "<p>Das Ergebnis von $a +$b ist <b>$erg</b>.</p>";
    // lustiger Sideeffekt: rechnet 39+2, dann bekommt a+1, deshalb steht in Ausgabe 40+2=41
    
    /*=== Abgekürzte Addition
    ============================================================== */

    $a = 10;
    $a += 5; //entspricht $a = $a +5;
    echo "<p>Der Wert von a ist $a</p>";
    //  für alle arithm. Ops möglich
    //$a -=5
    //$a /=5 etc.

    /* === Datentyp explizit konvertieren
    ==================================================================*/

    $z1 = '25.8';
    $z2 = '17';
    $z3=(int)$z2;
    $z4=(double)$z1;

    $erg = $z3 + $z4;

    echo "<p>Das Ergebnis von $z3 + $z4 = $erg.</p>";

    $z5=(double)$z2;
    $z6=(int)$z1;

    $erg = $z5 + $z6;
    // wegen int kommt nun ganzzahliges Ergebnis.
    echo "<p>Das Ergebnis von $z5 + $z6 = $erg.</p>";

    ?>
</body>
</html>