<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'DB Lesen',
    null,
    true,
    'Informationen aus einer Datenbank lesen'
);
get_header( ...$args );

$sql = "SELECT `bstlg_nachname`, `bstlg_sorte`,`bstlg_menge` FROM `tbl_bestellung` ";

/*Abfrage an den DB-Server absenden*/
if ($result=mysqli_query($db,$sql)){
    /*Abfrage war korrekt*/
    echo '<pre>'. var_dump ($result).'</pre><p> <br> Abfrage war korrekt.</p>';

    $anzahl= mysqli_num_rows($result);
    echo '<p>Es wurden <b>'.$anzahl.'</b> Datensätze gefunden.</p>';

    $erg=mysqli_fetch_array($result);//norm array
    $erg1=mysqli_fetch_assoc($result);// als assoziierttes array mit namen ausgeben, einfacher

    echo '<pre>'. var_dump ($erg).'</pre>';
    echo '<pre>'. var_dump ($erg1).'</pre>';// ruft immer nur den 1. Datensatz auf, setzt zeiger auf nächsten
    // findet also 4 Datensätze, gibt nur den 1. aus. 
    //Deshalb: Ausgabe über Schleife
    while ($erg = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo'<pre>', var_dump($erg), '</pre>';
    }
}else{
    /*Abfrage war nicht korrekt*/
    echo '<pre>Abfrage FeHLerhAfT</pre>';

    /*FM des MariaDB herausfinden*/
    $errnum = mysqli_errno($db);
    $errmsg = mysqli_error($db);

    echo "<p>Fehler-Nr: <b>$errnum</b><br>$errmsg</p>";

    echo get_db_error($db,$sql);
}
mysqli_close($db);
?>
    
<?php get_footer(); ?>