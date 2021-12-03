<?php

session_start();

require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Registrierung',
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

if( !empty( $_POST ) ) {
    if( !empty(trim( $_POST['autor_nachname'])) && !empty(trim( $_POST['autor_email'])) && !empty(trim( $_POST['autor_passwort']))){ 
        $autor_vorname = $_POST['autor_vorname'];
        $autor_nachname = $_POST['autor_nachname'];
        $autor_email = $_POST['autor_email'] ;
        $autor_passwort = password_hash ( $_POST['autor_passwort'] , PASSWORD_DEFAULT);

        $sql = "INSERT INTO `tbl_autoren`
            (
                    `autor_vorname`,
                    `autor_nachname`,
                    `autor_email`,
                    `autor_passwort`
                )
                VALUES
                (
                    '$autor_vorname',
                    '$autor_nachname',
                    '$autor_email',
                    '$autor_passwort'
                )";

        $stmt = mysqli_prepare( $db, $sql );

        if( false === mysqli_stmt_execute( $stmt )   ) {
            if( str_contains( get_db_error( $db, $sql ), 'Duplicate entry' ) ) {
                echo '<p class="alert alert-danger text-center">Diese E-Mail-Adresse ist schon registriert!!!</p>';
                echo '<p class="text-center mt-2"><a class="nutzerfarbe" href="regi.php"><b>Neuer Versuch</b></a></p>';
            } else {
                get_db_error( $db, $sql );
            }
        } else {
        
            mysqli_stmt_execute( $stmt );

            $id = mysqli_stmt_insert_id( $stmt );

            echo '<p class="alert alert-success text-center"><i class="bi bi-check-square"></i> Registrierung war erfolgreich!</p>';

            echo '<p class="text-center mt-2"><a class="nutzerfarbe" href="login.php"><b>Jetzt Einloggen</b></a></p>';

            mysqli_stmt_close( $stmt );
        }
    } else {
        echo '<p class="alert alert-danger text-center">Bitte min. Nachnamen, E-Mail und Passwort angeben</p>';
        $_POST = array();
    }
} 

if (empty ($_POST)){
?>

<h2 class="m-2">Bitte tragen Sie ihre persönlichen Daten ein!</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="row justify-content-center">
        <div class="col-3">
            <label>Vorname:</label> <input class="form-control" type="name" name="autor_vorname">
        </div>
        <div class="col-3">
            <label>Nachname:</label> <input class="form-control" type="name" name="autor_nachname">
        </div>
    </div>
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
            <button class="btn docfarbe m-2" type="submit" value="Registrieren" name="registrieren">Registrierung</button>
        </div>
        <div class="col-2">
            <button class="btn docfarbe m-2" type="reset" value="Zurücksetzen">Zurücksetzen</button>
        </div>
    </div>

</form>

<p class="text-center mt-2"><a class="nutzerfarbe" href="startseite.php"><b>Zurück zur Startseite</b></a></p>

<?php } get_footer( false, true ); ?>