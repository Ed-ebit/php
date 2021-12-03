<?php

session_start();
// Array wird vor dem Laden des Headers geleert, um der Navbar beim Laden den Status 'ausgeloggt' mitzugeben.
$_SESSION = array(); 
require_once( 'includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Logout',
    array(
        'css/styles.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'
    ),
    true,
    NULL,
        array(
        '<img src="https://icon-library.com/images/icon-for-blog/icon-for-blog-28.jpg" alt="miniblog" height="80px" width="80px">Home</img>',
            array(
             $menuER=>'erstellen.php',
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
    echo '<p class="alert alert-success text-center"> <i class="bi bi-check-square"></i> Logout erfolgreich!</p>';
}  else {
    echo '<p class="alert-danger text-center">Logout fehlgeschlagen!!! Probieren Sie es erneut.</p>';
}

?>

<p class="text-center mt-2"><a class="nutzerfarbe" href="startseite.php"><b>Zurück zur Startseite</b></a></p>
    
<?php get_footer( false, true ); ?>