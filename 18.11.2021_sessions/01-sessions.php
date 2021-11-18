<?php
session_start();//vorgefertigter Befehl - brauchts auch in anderen Dateien die für selbe Session genutzt werden.
// muss immer an den Anfang, sonst geht ALLES KAPUTT
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions',
    NULL,
    true,
    'Sesions-Startseite'
);
get_header( ...$args );
?>

<h2>Session gestartet... okrogerlol</h2>

<p>Session-ID: <?php echo session_id(); ?><br>
Name der Session: <?php echo session_name(); ?> </p>

<p>Weiter zur <a href="02-formular.php">nächsten Seite</a></p>
    
<?php get_footer(); ?>