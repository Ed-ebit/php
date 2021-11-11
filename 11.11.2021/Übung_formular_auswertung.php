<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>auswertung</title>
</head>
<body>
    <h1>Auswertung Formular</h1>

    <?php 
    if(isset($_POST['senden'])) {
        echo '<p>Vielen Dank für die Teilnahme an der Umfrage. Ihre übermittelten Daten:</p>';
        if (!empty(trim($_POST['vname']))) {
            echo '<p> Vorname: '.$_POST['vname'] .'</p>';
            }
        if (!empty(trim($_POST['name']))) {
            echo '<p> Name: '.$_POST['name'] .'</p>';
            }
        if (!empty(trim($_POST['ort']))) {
            echo '<p> Wohnort: '.$_POST['ort'] .'</p>';
            }

        if (!empty(($_POST['wohnart']))) {
            echo '<p> Wohnart: '.$_POST['wohnart'] .'</p>';
            }

        if (!empty(($_POST['sendungen']))) {
            echo '<p>Lieblingssendungen: </p>';
            foreach($_POST['sendungen'] as $ind => $art){
                echo '<p>'.$art.'</p>';}}

        if (!empty(($_POST['nachricht']))) {
            echo '<p> Ihre Nachricht: '.$_POST['nachricht'] .'</p>';
            } else {
                echo '<p> Ihre Nachricht: <i>keine</i></p>';
            }
    }
        echo '<pre>',print_r($_POST).'</pre>';

    ?>
</body>
</html>