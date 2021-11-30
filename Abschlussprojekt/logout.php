<?php

session_start();

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
            'Neuer Eintrag' =>'erstellen.php',
             $menuL=>'logout.php',
             $menuR=> 'regi.php',
             $menuE=> 'login.php'
            )
        ),
    true    
);
get_header( ...$args );

$_SESSION = array();

if ( session_destroy() ) {
    echo '<span class="text-success">Logout erfolgreich</span>';
    $_SESSION['login'] = false;
}  else {
    echo '<span class="text-danger">Logout fehlgeschlagen!!! Probieren Sie es erneut.';
}

?>

<p><a href="startseite.php">Zurück zur Startseite</a></p>
    
<?php get_footer(); ?>