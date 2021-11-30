<?php

session_start();

require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Login',
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

if( !empty( $_POST ) ) {
    // Variablen anlegen
    $autor_email = $_POST['autor_email'];
    $autor_passwort = $_POST['autor_passwort'];
    
    $sql = "SELECT
        autor_email,
        autor_passwort
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
        mysqli_stmt_bind_result( $stmt, $db_uname, $db_upw );
        mysqli_stmt_fetch( $stmt );
        mysqli_stmt_close( $stmt );

        if( password_verify( $autor_passwort, $db_upw ) ) {
            echo '<p class="alert alert-success">Login erfolgreich!</p>';
        } else {
            echo '<p class="alert alert-danger">Anmeldedaten stimmen nicht!!! Bitte probieren Sie es erneut.</p>';
        }
    }
}

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

<p><a href="startseite.php"><br>Zurück zur Startseite</a></p>

<?php get_footer(); ?>