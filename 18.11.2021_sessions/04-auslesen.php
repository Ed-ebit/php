<?php
session_start();
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions',
    NULL,
    true,
    'Sessions-Daten auslesen'
    
);
get_header( ...$args );
?>

<p>Daten aus dem Session-Cookie auslesen:</p>

<ul>
    <?php 
    foreach($_SESSION as $key =>$value){
        echo "<li> $key: $value</li>";
    } 
    ?>
</ul>

<p>Weiter zur <a href="05-session-zerstoeren.php">nächsten Seite</a></p>
    
<?php get_footer(); ?>