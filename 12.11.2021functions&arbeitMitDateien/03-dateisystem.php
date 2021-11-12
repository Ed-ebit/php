<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dateisystem</title>
</head>
<body>
    <h1>Arbeiten mit dem Dateisystem</h1>

    <h2>Öffnen, Lesen, Schliessen</h2>

    <?php 
    
    $datei = '03-protokoll.txt';

    // Prüfe ob es sich um eine Datei handelt
    if(is_file($datei)) {

        //Datei zum Lesen öffnen
        $fh/*Variable für Sourcekennung*/ = fopen($datei/*dateiname*/,'r'/*Modus*/);//Modus: wie wird die Datei geöffnet? Will ich nur Lesen, schreiben, beides, hintentran schreiben, vornedran?
        //generierter Rückgabewert: Sourcekennung, damit man weiss mit welcher Datei änderungen gemacht werden.
        // Sourcekennung kann in variable gelegt werden, um später mit der Datei weiter arbeiten zu können
        // sourcekennung false: Datei konnte nicht geöffnet werden, auch das ist ein nützliches Tool
    
        //Prüfen ob Öffnen erfolgreich
        if(false !=$fh){

            while(!feof($fh)){//feof: file end of file - solange das dateiende nicht erreicht ist
                //fegets() liest eine Zeile und setzt den Dateizeiger auf den Anfang der nächsten Zeile
                $zeile = fgets($fh);

                //Ausgabe der Zeile
                echo "$zeile<br>";
            }

            //Bitte nicht vergessen die Datei zu schliesen, sonst Syntaxfehler
            fclose($fh);

        } else {
            echo "<p>Beim Öffnen der Datei <b>$datei</b> ist unbekannter Fehler aufgetreten!</p>";
        }

    }else {
        echo "<p>Die Datei <b>$datei</b> ist gar keine Datei!</p>";
    }
    ?>
    <h2>Alles auf einmal</h2>

    <?php 
    //Datei lesen und sofort im Browser ausgeben
    readfile($datei);
    //nachteil zu oben: hier kann ich die Zeilen nur mit großem Aufwand Bearbeiten etc.

    //Datei lesen: Zeilen werden in einem Array zurückgeliefert
    $zeilen_array= file($datei);
    echo '<p>';
    foreach($zeilen_array as $zeile){
        echo "$zeile<br>";
    }    
    echo '</p>';

    //Datei komplett lesen
    $inhalt = file_get_contents($datei);
    echo nl2br ($inhalt, false);
    ?>

    <h2>Eine bestimmte Zeile lesen</h2>

    <?php 
        // selbe suppe wi im 1.Beispiel oben, mit leichter Änderung
        if(is_file($datei)) {

            //Datei zum Lesen öffnen
            $fh/*Variable für Sourcekennung*/ = fopen($datei/*dateiname*/,'r'/*Modus*/);//Modus: wie wird die Datei geöffnet? 
        
            //Prüfen ob Öffnen erfolgreich
            if(false !=$fh){
                fseek($fh,10);//10 = Zeigerstelle
               echo fgets ($fh);
            
            
            
                echo '<p>';
               $i=0;
                while(!feof($fh)){//feof: file end of file - 
                    $i++;
                    if($i != 2) {
                        fgets($fh);//nur,damit dateizeiger in die nächste Zeile rutscht
                        continue;
                    } else {
                        echo fgets ($fh);
                    }
                }
                echo '</p>';
                
                    
                
    
                //Bitte nicht vergessen die Datei zu schliesen, sonst Syntaxfehler
                fclose($fh);
    
            } else {
                echo "<p>Beim Öffnen der Datei <b>$datei</b> ist unbekannter Fehler aufgetreten!</p>";
            }
        }
        else {
            echo "<p>Die Datei <b>$datei</b> ist gar keine Datei!</p>";
        }
    
    
    ?>


    
</body>
</html>