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
<?php  
function kugel_preis ($dm,$mat){
    
    $endpreis = pow((1/2*(double)$dm),3)*(double)$mat*1.19;
    return $endpreis;
}

//if(isset($_POST['senden'])){
    $endpreis = kugel_preis($_POST['durchmesser'],$_POST['material']);
//}

?>
<h1>Kugeln</h1>

<p>Bitte wählen Sie Größe und Material Ihrer gewünschten Kugel!</p>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<p>
gewünschter Durchmesser in Metern: <br>
<input type="number" name="durchmesser"><br>
gewünschtes Material: <br>
<input type="radio" name="material" value="Holz">
Holz
<input type="radio" name="material" value="Styropor">
Styropor
<input type="radio" name="material" value="Glas">
Glas
<input type="radio" name="material" value="Metall">
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