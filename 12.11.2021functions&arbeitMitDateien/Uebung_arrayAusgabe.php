<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

    $a1 = array (
        'bester Mann',
        'zweitbester Mann',
        'drittbester Mann'
    );


    function array_ausgabe($array, $rand = 0, $farbe = '#000' ) {

        echo "<table border='$rand' style='border-color: $farbe'>";
        echo "<th>Schlüssel</th><th>Wert</th>";

        foreach($array as $schluessel => $wert){

            echo "<tr><td>$schluessel</td><td>$wert</td></tr>";
        }

        echo '</table>';

    }

    echo array_ausgabe($a1,2,'#a1c');

?>
<!-- Aufgabe 2, Fragen: set eines checks für Button, und wie geht die Zahl in den Inputtype?-->
<?php  

$chk_dm='';
$chk_holz='';
$chk_styropor='';
$chk_glass='';
$chk_metall='';

if (isset($_POST['durchmesser'])) {
    $chk_dm=$_POST['durchmesser'];
}
if (isset($_POST['material'])) {
    switch($_POST['material']) {
        case 'holz': $chk_holz = 'checked';
        case 'styropor': $chk_styropor = 'checked';
        case 'glass': $chk_glass = 'checked';
        case 'metall': $chk_metall = 'checked';
    }
}


function kugel_preis ($dm,$mat){

    $gp = array (
        'Holz' => 100,
        'Styropor' => 20,
        'Glas' => 250,
        'Metall' => 175,
    );

    foreach($gp as $material=>$geld) {
        if ($mat == $material) {
        $endpreis = pow((1/2*(double)$dm),3)*(double)$geld*1.19;
        return $endpreis;
        }
    }   
}

$endpreis = kugel_preis($_POST['durchmesser'],$_POST['material']);


?>
<h1>Kugeln</h1>

<p>Bitte wählen Sie Größe und Material Ihrer gewünschten Kugel!</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<p>
gewünschter Durchmesser in Metern: <br>
<input type="number" name="durchmesser"><?php echo $chk_dm; ?>
</input><br>
gewünschtes Material: <br>
<input type="radio" name="material" value="Holz" <?php echo $chk_holz; ?>>
Holz
<input type="radio" name="material" value="Styropor" <?php echo $chk_styropor; ?>>
Styropor
<input type="radio" name="material" value="Glas" <?php echo $chk_glass; ?>>
Glas
<input type="radio" name="material" value="Metall" <?php echo $chk_metall; ?>>
Metall
</p>

<input type="submit" name="senden">

</form>
<p>
    <?php 
    if(isset($_POST['senden'])){
        echo 'Preis des gewählten Artikels: '.$endpreis.'€ für eine Kugel aus '.$_POST['material'].' mit '.$_POST['durchmesser'].' m Durchmesser.';
    }    
    ?>
</p>
    
</body>
</html>