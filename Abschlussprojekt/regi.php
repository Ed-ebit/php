<?php

session_start();

require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Registrierung',
    'css/styles.css',
    true,
    NULL,
        array(
        'Home',
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
                echo '<p class="alert alert-danger">';
                echo 'Diese E-Mail-Adresse ist schon registriert!!!</p>';
            } else {
                get_db_error( $db, $sql );
            }
        } else {
        
            mysqli_stmt_execute( $stmt );

            $id = mysqli_stmt_insert_id( $stmt );

            echo '<p class="alert alert-success">';
            echo ' Registrieung war erfolgreich!</p>';

            echo '<p><a href="login.php"><br>Jetzt Einloggen</a></p>';

            mysqli_stmt_close( $stmt );
        }
    } else {
        echo 'Bitte min. Nachnamen, E-Mail und Passwort angeben';
        $_POST = array();
    }
} 

if (empty ($_POST)){
?>

<h2>Bitte tragen Sie ihre persönlichen Daten ein!!!</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <P>Vorname: <input type="name" name="autor_vorname"></P>
    <P>Nachname: <input type="name" name="autor_nachname"></P>
    <P>E-Mail-Adresse: <input type="email" name="autor_email"></P>
    <p>Passwort: <input type="password" name="autor_passwort"></p>

    <tr>
        <td>
            <input type="submit" value="Registrieren" name="registrieren">
            <input type="reset" value="Löschen">
        </td>
    </tr>

</form>

<p><a href="startseite.php"><br>Zurück zur Startseite</a></p>

<?php } get_footer( false, true ); ?>