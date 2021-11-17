<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Datumsfunktionen',
    NULL,
    true
);

get_header( ...$args );

echo '<pre>';
echo var_dump(getdate());
echo '</pre>';

$datum = getdate(1637147645);

printf('<p> das Datum: %s, %d. %s %d</p>',$datum['weekday'], $datum['mday'], $datum['month'], $datum['year']);

$args = array(
    '<p>Das Datum: %02d.%02d.%d</p>',
    $datum['mday'], 
    $datum['mon'], 
    $datum['year']

);

printf(...$args);


/*Funktionen zur formatierten <Datumsausgabe></Datumsausgabe>
/* Datumsangaben mit strftime()*/
//S.181
echo '<p>';
echo time();
echo '</p>';
echo '<p>';
echo strftime('%A,%e. %B %Y').'<br>';
echo '</p>';

// setzt lokalen Ausgaben Länderspezifisch
//funkt nur in Verbindung mit strftime() !
setlocale(LC_ALL,'DE');
echo '<p>';
echo strftime('%A, den %e. %B %Y',time()-28*24*60*60);
echo '</p>';


/* erzeugt einen zeitstempel aufgrund eines Datums
dabei erfolgt die Datumsangabe in folgender Reihenfolge:
Std, Min, Sek, Monat, Tag, Jahr */
$zeitstempel= mktime(17,0,0,12,24,2021);

/*Datumsangaben mit date() */
printf('<p>Datums- und Zeitausgabe mit date(): %s</p>',
        date('d.m.Y H:i',$zeitstempel));

echo '<p>';
echo date('l. \d\e\n d.m.Y H:i:s \U\h\r', $zeitstempel);
echo '</p>';

/*Zeitmessung mit mikrotime()  - rechnet in Mikrosekunden - sehr viel genauer*/// 2 Varianten gibt es lol

echo '<p>';
echo 'microtime(): '.microtime(). '<br>';
echo 'microtime(true): '.microtime(true). '<br>';

echo '</p>';

$start=microtime(true);
for ($i=1;$i<=100000;$i++){
    $quadrat = sqrt($i);
}

$ende=microtime(true);
echo '<p>';
echo 'Die Ausführungsdauer: '.($ende-$start).'Sekunden';
echo '</p>';

/*Zeitstempel mit englischen <Zeitangaben></Zeitangaben>*/

$zeitstempel = strtotime('+2 weeks 2 days 5 hours 2 minutes');
echo '<p>';
echo date('d.m.Y H:i:s', $zeitstempel);
echo '</p>';
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
    <p>Geben Sie bitte das Datum  in der Form tt.mm.jjj ein!</p>

    <input type="text" name="datum">
    <input type="submit" value="prüfen" name="senden">

</form>
<?php 
if(isset($_POST['senden'])) {
    /*Zum Prüfen der korrekten Datumsangabde mit der Funktion checkdate() benötigen wir das in seine einzelnen Teile zerlegte Datum.*/

    //Zerlege die Zeichenkette Datum anhand eines Trennzeichens (.) in ein Array

    $datum = explode('.', $_POST['datum'], 3);

    $check = checkdate($datum[1],$datum[0],$datum[2]);

    if($check) {
        echo '<p class="alert alert-success">'.$_POST['datum'].' ist korrekt </p>';       
    } else {
        echo '<p class="alert alert-danger">'.$_POST['datum'].' ist <b>nicht</b> korrekt </p>'; 
    }
}

?>
    
<?php get_footer(); ?>