<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>in Datei schreiben</title>
</head>
<body>
    <h1>in Datei schreiben</h1>

    <?php 
    
    $datei= 'bestellung.csv';

            //wir wolln zus. Ordnung in Datei bringen:
            //Prüfung, ob Datei schon angelegt ist
            $tkopf = file_exists($datei);

    //Öffnen, wenn nicht vorhanden wird angelegt im Modus 'a'
    $fh = fopen($datei,'a');


            //Zusätlich prüfen: is das übahaupt ne Textdatei, falls sie schon existiert?
            // dazu: Mime-Type auslesen
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

            //Falls die Datei neu angelegt wurde:
            if (false===$tkopf){
                //dann schreiben wir noch den Tabellenkopf
                fwrite($fh,"Name;Vorname;Ort;Anschrift;PLZ\r\n");
            }

    $k_name = 'Kirk';
    $k_vorname = 'James Tiberius';
    $k_ort = 'USS. Enterprise';
    $k_anschrift = 'Brücke';
    $k_zip = '12345';

    $inhalt = "$k_name;$k_vorname; $k_ort;$k_anschrift; $k_zip\r\n";

    if(fwrite($fh,$inhalt)){
        echo '<p>Folgende Daten wurden gespeichert:<br>';
        echo "k_name<br>$k_vorname<br> $k_ort<br>$k_anschrift<br> $k_zip.</p>";
    } else {
        echo '<p>Das Schreiben der Daten ist fehlgeschlagen.</p>';
    }
    fclose($fh);
    ?>

    <h2>Alles auf einmal und komprimiert</h2>
    <!--dafür hier kein Tabellenkopf-->
    <?php 
    $datei = 'text.txt';

    file_put_contents($datei, "Daten für Zeile 1\r\n", FILE_APPEND);//immer ans Ende gehängt
    file_put_contents($datei, "Daten für Zeile 2\r\n", FILE_APPEND);
    ?>

</body>
</html>