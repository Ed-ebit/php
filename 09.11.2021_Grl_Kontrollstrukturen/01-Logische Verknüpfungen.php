<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logische Verkettungen</title>
</head>
<body>
    <h1>Logische Verkettungen</h1>

    <?php
    
    $a=4;
    $b=2;
    //logisches und: AND oder &&
    //ALLE Vergleiche müssen true ergeben, damit die komplette Prüfung true ergibt
    if(($a>=3) and ($a<=8) ){
        echo '<p>$a liegt zwischen 3 und 8</p>';
    }

    // logisches ODER: OR oder ||
    // Ein Vergleich muss true ergeben, damit die komplette Prüfung true ergibt
    if(($a == 3) or ($b<=4)) {
        echo '<p> $a ist gleich 3 oder $b ist kleiner als 4.</p>';
    }

    //logisches entweder oder: XOR
    // NUR EIN Vergleich darf true ergeben!
    if(($a == 3) XOR ($b<=4)) {
        echo '<p> Entweder $a ist gleich 3 oder $b ist kleiner als 4.</p>';
    }

    //logisches NICHT: !
    // Der Vergleich wird ins Gegenteil gewandelt
    if(!($a==3)) {
        echo'<p>$a ist nicht gleich 3.</p>';
    }

    // der Ungleich Operator
    if (($a!=3)) {
        echo '<p>$a ist nicht gleich 3.</p>';

    }

    ?>
</body>
</html>