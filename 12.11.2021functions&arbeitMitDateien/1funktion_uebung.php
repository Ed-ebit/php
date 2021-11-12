<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uebung</title>
</head>
<body>

<?php 

function addiere($zahl1,$zahl2,$zahl3=0){
    $erg= $zahl1+$zahl2+$zahl3;
    echo "<p>Ergebnis ( $zahl1+$zahl2+$zahl3): $erg</p>";
}
function multipliziere($zahl1,$zahl2,$zahl3=1){
    $erg= $zahl1*$zahl2*$zahl3;
    echo "<p>Ergebnis ( $zahl1*$zahl2*$zahl3): $erg</p>";
}

addiere(8,4,2);
multipliziere(8,4,2);
addiere(8,4);
multipliziere(8,4);



?>
    
</body>
</html>