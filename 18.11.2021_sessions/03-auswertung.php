
<?php
session_start();
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions',
    NULL,
    true,
    'Sessions - Auswertung, Daten speichern'    
);
get_header( ...$args );
?>

<p>Sie haben folgende Daten im Formular übertragen:</p>
<p>Vorname: <?php echo $_POST['vorname'] ?><br>
Nachname: <?php echo $_POST['nachname'] ?><br>
Wohnort: <?php echo $_POST['ort'] ?><br></p>

<?php 

/*Formulardaten im Sessioncookie auf dem Server <speichern></speichern>*/

$_SESSION['vorname'] = $_POST['vorname'];
$_SESSION['nachname'] = $_POST['nachname'];
$_SESSION['ort'] = $_POST['ort'];

$_SESSION['zeit'] = time();

?>

<p>Folgende Daten sind nun im Session-Cookie auf dem Server gespeichert:</p>

<?php '<pre>'. var_dump($_SESSION).  '</pre>'; ?>

<p>Weiter zur <a href="04-auslesen.php">nächsten Seite</a></p>

    
<?php get_footer(); ?>