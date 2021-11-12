<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form_uebung</title>
    <?php
    $zahl1= 0;
    $zahl2= 0;
    $zahl3= 0;
    $erg= 0;
    $ausgabe= 'x';

    include '2funktion_uebung.inc.php';

    if(!empty($_POST['zahl1']) && !empty($_POST['zahl2'])){

        $zahl1=$_POST['zahl1'];
        $zahl2=$_POST['zahl2'];
        
        if(!empty($_POST['zahl3'])) {
            $zahl3=$_POST['zahl3'];
            $erg= addiere($zahl1,$zahl2,$zahl3);
        } else {
            $erg= addiere($zahl1,$zahl2);
        }

        $ausgabe ='<p>Formular wurde gesendet, das Ergebnis der Addition lautet: <br>'.$erg.'</p>';

    } else {
        $ausgabe = 'Bitte Formular vollständig ausfüllen!';
    }
    ?>
</head>
<body>

<h1>Addition mit eingebundener Funktion</h1>

<p>Bitte geben Sie 2 oder 3 Zahlen ein und senden Sie das Formular ab.</p>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<p>
    Zahl 1:
    <input type="number" name="zahl1"><br>
    Zahl 2:
    <input type="number" name="zahl2"><br>
    Zahl 3 <i>(optional)</i>:
    <input type="number" name="zahl3"><br>
</p>

<input type="submit" name="senden" value="los">
<input type="reset" namme="reset" value="reset">

</form>

<?php if(isset($_POST['senden'])){
            echo $ausgabe;
        }
?>
    
</body>
</html>