<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ein kleines Rechenbeispiel<</title>
</head>
<body>
    <h1>Ein kleines Rechenbeispiel</h1>
    <?php 
    
    $zahl1 = '';
    $zahl2 = '';

    if( isset( $_GET['plus']) OR isset( $_GET['mal']) ) {

        $zahl1 = $_GET['zahl1'];
        $zahl2 = $_GET['zahl2'];

    $erg = 0;

    echo '<pre>', var_dump( $_GET ), '</pre>';

    if( isset( $_GET['plus'] ) ) {
        //$erg = (float)$_GET['zahl1'] + (float)$_GET['zahl2'];
        $erg = (float)$zahl1 + (float)$zahl2;
     } else {
       // $erg = (float)$_GET['zahl1'] * (float)$_GET['zahl2'];
       $erg = (float)$zahl1 * (float)$zahl2;
     }
    
     echo "<p>$erg (" . gettype( $erg ) . ")</p>";

    }
    ?>
    
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>">

        <p>Erste Zahl: <input type="number" name="zahl1" value="<?php echo $zahl1;?>"></p>
        <p>Zweite Zahl: <input type="number" name="zahl2" value="<?php echo $zahl2;?>"></p>

        <p>
            
            <input type="submit" value="+" name="plus">
            <input type="submit" value="x" name="mal">

        </p>

    </form>


</body>
</html>