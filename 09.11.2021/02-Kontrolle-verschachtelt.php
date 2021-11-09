<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verschachtelte Kontrollstrukturen</title>
</head>
<body>
    <h1>Verschachtelte Kontrollstrukturen</h1>
    <h2>V1: Zahlungsweise</h2>
    <?php 
    
    $zw = ''; // Rechnung, Vorkasse, Sofortüberweisung

    if($zw == 'Rechnung' ) {
        echo '<p>Zahlung per Rechnung,<br>bitte überweisen Sie innerhalbt von 10 Tagen.</p>';
    } elseif ($zw == 'Vorkasse' ) {
        echo '<p>Zahlung per Vorkasse,<br>her mit ze Money und dann versenden wir die Ware.</p>';
    } elseif ($zw == 'Sofortüberweisung' ) {
        echo '<p>Ware wird sofort versendet.</p>';
    } else {
        echo '<p> Bitte wählen Sie eine Zahlungsweise!</p>';
    }

    ?>

    <h2>V2: Gepäck-Kategorie</h2>

    <?php 
    $g = 45;

    if($g <= 20) {
        echo'<p>Kategorie S (bis 20kg)</p>';
    } else {
        if($g <= 40) {
            echo'<p>Kategorie M (bis 40k/p>';
        } else {
            if($g <= 600) {
                echo'<p>Kategorie L (bis 60kg)</p>';
            } else {
                echo'<p>Kategorie XL (über 60kg)</p>';
            }
        }
    }
    // IF-Else nicht die performanteste Lösung, bei mehr als 10 Fällen überlegen, ob was anderes genommen werden kann, z.B. Switchcase
    ?>


</body>
</html>