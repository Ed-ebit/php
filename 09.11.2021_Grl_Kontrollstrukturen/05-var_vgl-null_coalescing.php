<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raumschiffe und anderes</title>
</head>
<body>
    <h1>Raumschiffe und anderes</h1>

    <?php 
    // Spaceship-Operator
    $a = 6;
    $b = 9;

    echo $a <=> $b;//Größenvergleich, welcher Wert ist größer? (-1,0,1)

    //Null coalescing-Operator
    // weisst der Variablen c den Wert von a zu wenn a initialisiert und nicht null ist, ansonsten wird der Wert von b zugewiesen.

    $c = $a ?? $b;

    echo "<p>$c</p>";
    ?>
</body>
</html>