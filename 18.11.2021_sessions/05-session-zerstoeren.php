<?php
session_start();
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Session-zerstören',
    null,
    true
    
);
get_header( ...$args );

/*Eionzelne Einträge löschen*/
echo '<p>';
echo print_r($_SESSION);
echo '</p>';

unset ($_SESSION['vorname']);

echo '<p>';
echo print_r($_SESSION);
echo '</p>';


/*=== Session zerstören ==============================*/

/*1. Session Array leeren */

$_SESSION = array();

echo '<p>';
echo 'Die Session mit der ID: '.session_id().' wurde ';

/*2.Sessin zerstören*/

if (session_destroy()){
    echo '<span class="text-success">erfolgreich zerstört</span>';
} else {
    echo '<span class="text-danger">nicht zerstört</span>';
}
echo '</p>';

?>
    
<?php get_footer(); ?>