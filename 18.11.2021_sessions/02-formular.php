<?php
session_start();
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions',
    NULL,
    true,
    'Sessions-Formular'
    
);
get_header( ...$args );
?>
<p>Bitte füllen Sie folgendes Formular aus!</p>
<form action="03-auswertung.php" method="post">
    <p>Vorname: <input type="text" name="vorname"> </p>
    <p>Nachname: <input type="text" name="nachname"> </p>
    <p>Wohnort: <input type="text" name="ort"> </p>

    <p><input type="submit" value="senden" name="senden"></p>
</form>
<?php get_footer(); ?>