<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>while Schleife</title>
</head>
<body>
    <h1>while Schleife</h1>
    <h2>kopfgesteuert</h2>

    <?php 
    $z = 8;

    while($z <= 10 ) {
        echo "$z<br>";
        $z++;
    }
    ?>

    <h2>Fussgesteuert</h2>

    <?php 
    $x=8;

    do {
        echo "$x<br>";
        $x++;
    } while($x <= 10);

    /*bei der fussgesteuerten Schleife, gibt es minimum einen Durchlauf,, danach wird erst geprüft ob Bedingung noch gilt*/
    ?>
</body>
</html>