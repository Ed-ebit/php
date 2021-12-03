<?php

session_start();
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );

//Seitenvariablen
$meldung = '';//Meldung, ob Login klappt oder nicht

if( !empty( $_POST ) ) {
    // Variablen anlegen
    $autor_email = $_POST['autor_email'];
    $autor_passwort = $_POST['autor_passwort'];

    
    $sql = "SELECT
        autor_email,
        autor_passwort,
        autor_id,
        autor_vorname,
        autor_nachname
    FROM
        tbl_autoren
    WHERE
        autor_email = ?";
        
    $stmt = mysqli_prepare( $db, $sql );
    if( false === $stmt ) {
        echo get_db_error( $db, $sql );
    } else {
        mysqli_stmt_bind_param( $stmt, 's', $autor_email );
        mysqli_stmt_execute( $stmt );
        mysqli_stmt_store_result( $stmt );
        mysqli_stmt_bind_result( $stmt, $db_email, $db_pw, $db_id, $db_vorname, $db_nachname );
        mysqli_stmt_fetch( $stmt );
        mysqli_stmt_close( $stmt );

        if( password_verify( $autor_passwort, $db_pw ) ) {
            $meldung = '<p class="alert alert-success text-center"><i class="bi bi-check-square"></i> Login erfolgreich!</p>';

            //User einloggen und in Session Array speichern
            
            $_SESSION['login'] = true;
            $_SESSION['autor_vorname']=$db_vorname;
            $_SESSION['autor_nachname']=$db_nachname;
            $_SESSION['autor_email']=$db_email;
            $_SESSION['autor_id'] = $db_id;

        } else {
            $meldung ='<p class="alert alert-danger text-center">Anmeldedaten stimmen nicht!!! Bitte probieren Sie es erneut.</p>';
            $_POST = array();
        }
    }
}

require_once( 'includes/functions.inc.php' );

// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Login',
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
if (empty($_POST)){
?>

<h2 class="m-2">Bitte tragen Sie ihre Login-Daten ein!</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="row justify-content-center">

        <div class="col-3">
            <label>E-Mail-Adresse: </label><input class="form-control" type="email" name="autor_email">
        </div> 
        <div class="col-3">
            <label>Passwort: </label><input class="form-control" type="password" name="autor_passwort">
        </div> 
    </div>      
    <div class="row justify-content-center">
        <div class="col-2">
            <button class="btn docfarbe m-2" type="submit" name="Login">Einloggen</button>
        </div>
        <div class="col-2">
            <button class="btn docfarbe m-2" type="reset">Zurücksetzen</button>
        </div>
    </div>

    
</form>

<?php }

echo '<br>' . $meldung; ?>

<p class="text-center mt-2"><a class="nutzerfarbe" href="startseite.php"><b>Zurück zur Startseite</b></a></p>

<?php get_footer( false, true ); ?>