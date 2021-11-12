<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06-Formularauswertung</title>
</head>
<body>
    <h1>06-Formularauswertung</h1>

    <?php 
    if( isset($_POST['senden'])){// ohne isset würde trotzdem FM kommen, das php sich trotzdem aufregt dass das $_POST-Array leer ist.
                                 // isset fragt, ob es was gibt und liefert true oder false zurück, aber keine FM :D
        //dann darf das Formular ausgewertet werden:

        //prüfe ob e-mailfeld leer ist:
        if(empty(trim($_POST['email']))){// empty() besser als e-mail=='', da hier auch undefined, null etx abgefangen wird.
                                        // trim entfernt alle leerzeichen, um versehentliche und absichtliche Spaces abzufangen.
            echo '<p>Bitte Mailadresse angeben!</p>';
        }else {
            echo '<p>Mail-Adresse: '.$_POST['email'].'</p>';
        }
        echo '<p>Ihre Nachricht:<br>'.nl2br($_POST['memo']).'</p>';//nl2br: wandelt neue Zeilen im Eingabetextfeld in <br> tags um, damit diese auf rückgebender html-Seite mit angezeigt werden.
        echo '<pre>',print_r($_POST).'</pre>';
        
    } else {
        echo '<p>Diese Seite wurde nicht durch das Formular aufgerufen.
        Bitte fülle zunächst 
        das Formular <a href="06-form-elemente.html"> </a> aus!</p>';
    }
    
    ?>

</body>
</html>