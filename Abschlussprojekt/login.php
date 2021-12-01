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
            $meldung = '<p class="alert alert-success">Login erfolgreich!</p>';

            //Loginformular verstecken
            $sichtbarkeit = 'hidden';
            // echo '<pre>', var_dump( $_SESSION ), '</pre>';
            //User einloggen und in Session Array speichern
            
            $_SESSION['login'] = true;
            $_SESSION['autor_vorname']=$db_vorname;
            $_SESSION['autor_nachname']=$db_nachname;
            $_SESSION['autor_email']=$db_email;
            $_SESSION['autor_id'] = $db_id;

            // echo '<pre>', var_dump( $_SESSION ), '</pre>';

        } else {
            $meldung ='<p class="alert alert-danger">Anmeldedaten stimmen nicht!!! Bitte probieren Sie es erneut.</p>';
        }
    }
}

require_once( 'includes/functions.inc.php' );

// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Login',
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

?>

<h2>Bitte tragen Sie ihre Login-Daten ein!!!</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <P>E-Mail-Adresse: <input type="email" name="autor_email"></P>
    <p>Passwort: <input type="password" name="autor_passwort"></p>

    <tr>
        <td>
            <input type="submit" value="Anmelden" name="anmelden">
            <input type="reset" value="Löschen">
        </td>
    </tr>
    
</form>

<?php echo $meldung; ?>

<p><a href="startseite.php"><br>Zurück zur Startseite</a></p>

<?php get_footer(); ?>