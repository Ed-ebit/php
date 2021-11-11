<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ergebnis</title>
</head>
<body>
    <h1>Ergebnis</h1>

    <?php 
    
    $erg = 0;

    echo '<pre>', var_dump( $_GET ), '</pre>';

    if( isset( $_GET['plus'] ) ) {
        $erg = (float)$_GET['zahl1'] + (float)$_GET['zahl2'];
     } else {
        $erg = (float)$_GET['zahl1'] * (float)$_GET['zahl2'];
     }
    
     echo "<p>$erg (" . gettype( $erg ) . ")</p>";

    ?>
</body>
</html>