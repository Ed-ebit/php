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
            $meldung = '<p class="alert alert-success text-center">Login erfolgreich!</p>';

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
        '<img src="https://icon-library.com/images/icon-for-blog/icon-for-blog-28.jpg" alt="miniblog">',
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

<h2 class="text-center">Bitte tragen Sie ihre Login-Daten ein!!!</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div class="row">

        <div class="text-center">
            <p>E-Mail-Adresse: <input type="email" name="autor_email"></p>
            
            <p>Passwort: <input type="password" name="autor_passwort"></p>
            

            <tr>
                <td>
                    <input type="submit" value="Anmelden" name="anmelden">
                    <input type="reset" value="L??schen">
                </td>
            </tr>   
        </div>

</div>
    
</form>

<?php }

echo '<br>' . $meldung; ?>

<p class="text-center"><a href="startseite.php">Zur??ck zur Startseite</a></p>

<?php get_footer( false, true ); ?>