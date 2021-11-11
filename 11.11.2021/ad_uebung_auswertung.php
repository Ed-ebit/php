<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Übung 1 (Kapitel 7)</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Auswertung</h1>

    <p>

    <?php  
    
    echo 'Vorname: ' . $_POST['vorname'] . '<br>';

    echo 'Nachname: ' . $_POST['nachname'] . '<br>';

    echo 'Ort: ' . $_POST['ort'] . '<br>';

    if( isset( $_POST['wohnung'] ) ) {
        echo 'Wohnung: ' . $_POST['wohnung'] . '<br>';
    }

    if( isset( $_POST['tv'] ) ) {
        echo 'Beliebte TV-Sendungen: ';
        foreach( $_POST['tv'] as $value )
            echo $value . ', ';
        echo '<br>';
    }

    echo 'Nachricht:<br>';
    echo empty( trim( $_POST['nachricht'] ) ) ? '<i>keine</i>' : nl2br( $_POST['nachricht'], false );
    
    ?>

    </p>
</body>
</html>