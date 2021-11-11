<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formular-auswertung</title>
</head>
<body>
    <h1>formular-auswertung</h1>
    <p>folgende Daten wurden übermittelt:</p>

    <?php 
    // Formulardaten kommen über name-Attribut an!, in Form eines vorgefertigten assoziativen Arrays!
    // Arrayname= $_POST

    echo '<p>Vorname: '.$_POST['vorname'].'<br>';
    echo '<p>Nachname: '.$_POST['nachname'].'<br>';
    echo '<p>E-Mail: '.$_POST['email'].'<br></p>';

    //Formulardaten zu Testzwecken ausgeben:
    echo '<pre>', print_r($_POST),'</pre>';

    ?>
</body>
</html>