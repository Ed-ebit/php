<?php 
define('DB_HOST','localhost');
define('DB_USER','php-user');
define('DB_PW','Pa$$w0rd');
define('DB_DATABASE', $database);

$db=mysqli_connect(DB_HOST, DB_USER, DB_PW)
    or die('<p class="alert alert-danger">Die DB-Verbindung kam nicht zustande!</p>');

    /*Zeichensatz der DB-Verbindung explizit einstellen*/
mysqli_set_charset($db, 'UTF-8');

/*Datenbank auswählen*/
mysqli_select_db($db, DB_DATABASE)
    or die('<p class="alert alert-danger">Die Datenbank '.DB_DATABASE.' konnte nicht ausgewählt werden!</p>');