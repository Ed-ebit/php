<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auswertung</title>
</head>
<body>
    <h1>Auswertung</h1>

    <?php 
    if(isset($_POST['senden'])){// Trigger funkt nicht, why?

        $datei='umfrage_daten.csv';
        $tkopf=file_exists($datei);
        $fh=fopen($datei,'a');

        //ist sie textdatei? kann sie geöffnet werden?
        if(true===$fh){
            $mtype = mime_content_type($datei);
            

            if($mtype !== 'text/plain') {
                echo "<p>Die Datei <b>$datei</b> ist keine Textdatei und für unsere Zwecke somit nicht nutzbar.</p>";
                die('<p>Programm wird geschlossen.</p>');//programm killen
            }
        }
        if(false===$fh) {
            echo "<p>Die Datei <b>$datei</b> konnte nicht geöffnet werden.</p>";
            die('<p>Programm wird geschlossen.</p>');//programm killen
        }
        //frischangelegte Datei?
        if (false===$tkopf){
            //dann schreiben wir noch den Tabellenkopf
            fwrite($fh,"1. Vor- und Nachname;2. Straße;3. Anschrift;\r\n4. Internetangebot Bewertung;\r\n5. Informationsgehalt Bewertung;\r\n6. Bestellsystem Bewertung;\r\n7. zusätzliche Nachricht\r\n\n");
        }
        //radiobuttons Infogehalt interpretieren
        switch($_POST['infogehalt']){
            case '0': $infogehalt='sehr informativ'; 
            break;
            case '1': $infogehalt='die eine oder andere Information fehlt'; 
            break;
            case '2': $infogehalt='es fehlen sehr viele wichtige Informationen'; 
            break;
            default:  $infogehalt=null;
        }
        


        file_put_contents($datei, "1.$_POST[name]; 2.$_POST[strasse];3.$_POST[ort];\r\n4.$_POST[inet];\r\n5. $infogehalt;\r\n6.$_POST[bestellsyst];\r\n7.$_POST[nachricht];\r\n\n", FILE_APPEND);

        echo '<p>Folgende Daten wurden gespeichert:<br>';
        echo "1.$_POST[name]; 2.$_POST[strasse];3.$_POST[ort];\r\n4.$_POST[inet];\r\n5. $infogehalt;\r\n6.$_POST[bestellsyst];\r\n7.$_POST[nachricht];\r\n\n</p>";
    } else {
        echo '<p>Bitte das Formular auf der vorhergehenden Seite ausfüllen, Sie Schummler/in!</p>';
    }
    
    ?>

</body>
</html>