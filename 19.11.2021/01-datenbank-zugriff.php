<?php 

$db = mysqli_connect('localhost','php-user','Pa$$w0rd','obstladen'); //'i' hinter mysql ist wichtig, ohne ist es ein altes Modell. !! mysqli !!

if(!$db) {
    echo '<p><b>DB-Verbindung fehlgeschlagen</b></p>';
    exit;
}

echo '<p>';
echo 'DB-Verbindung steht. Datenbank "obstladen" wurde ausgewählt.';
echo '</p>';

mysqli_close($db);