<?php

session_start();
// Array wird vor dem Laden des Headers geleert, um der Navbar beim Laden den Status 'ausgeloggt' mitzugeben.
$_SESSION = array(); 
require_once( 'includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Logout',
    NULL,
    true,
    NULL,
        array(
        'Home',
            array(
             $menuER =>'erstellen.php',
             $menuL=>'logout.php',
             $menuR=> 'regi.php',
             $menuE=> 'login.php',
             $user=>''
            )
        ),
    true    
);
get_header( ...$args );
// echo '<pre>', var_dump( $_SESSION ), '</pre>';

if ( session_destroy() ) {
    echo '<span class="text-success">Logout erfolgreich</span>';
}  else {
    echo '<span class="text-danger">Logout fehlgeschlagen!!! Probieren Sie es erneut.';
}

?>

<p><a href="startseite.php">Zurück zur Startseite</a></p>
    
<?php get_footer(); ?>