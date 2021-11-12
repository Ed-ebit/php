<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gültigkeitsbereiche Variablen</title>
</head>
<body>
    <h1>Gültigkeitsbereiche Variablen</h1>

    <?php 
    
    $ausgabe = 'ein Brot';

    function tue_etwas($n) {
        $ausgabe = $n;

        global $innen; // Konter: Var innerhalb Fkt als global definieren, dann ist sie auch außerhalb gültig. nicht empfohlen
        // global hilft nicht, wenn außerhalb der Fkt definiert, gilt auch ausschließlich für die Funktion, in der das Vorgenommen wird.
        $innen = 42;
        echo '<pre>1. Funktion: ',var_dump($ausgabe), '</pre>';
    
        $ausgabe = 'noch ein Brot';

        echo '<pre>2. Funktion: ',var_dump($ausgabe), '</pre>';
    }

    tue_etwas($ausgabe);
    echo '<pre>3. Funktion: ',var_dump($ausgabe), '</pre>';//von funktion unberührter urspr. zugewiesener Wert

    echo $innen;//  global :)

    ?>

    <h2>Funktionsaufruf per Referenz</h2>

    <?php 
    //"normal"
    Function quadrat ($zahl) {
        echo "<p>Das Quadrat von $zahl ist: ";
        $zahl*=$zahl;
        echo "$zahl.</p>";
    }
    //Referenzfkt:
    Function quadrat_ref (&$zahl) {//&:Parameterübergabe per Referenz
        echo "<p>Das Quadrat von $zahl ist: ";
        $zahl*=$zahl;
        echo "$zahl.</p>";
    }

    $wert = 3;
    echo "<p>Der Ausgangswert von \$wert ist:
    <b>$wert</b>.</p>";

    //"normal"
    echo "<h3>call-by-value</h3>";

    for($i = 1; $i < 4; $i++) {
        quadrat($wert);
    }
    //Referenzfkt:
    echo "<h3>call-by-reference</h3>";

    for($i = 1; $i < 4; $i++) {
        quadrat_ref($wert);
    }
    /*Referenziell übergebene Variable: Der durch die Fkt geänderte Wert der Variable wird an diese zurückgegeben und ist somit der
    neue Wert dieser außerhalb der Fkt deklarierten Variable.*/
    ?>

</body>
</html>