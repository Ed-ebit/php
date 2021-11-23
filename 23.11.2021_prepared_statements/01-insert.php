<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sichere INSERTS',
    NULL,
    true
);
get_header( ...$args );
require_once( '../includes/db-connect.inc.php' );
/*MERKE: Was man auf SQL-Server an Arbeit erledigen lassen kann, lass da erledigen (Suchen, verschl, berechnen) und schwurbel das nicht im PHP!*/
// Formular gesendet?
if( !empty( $_POST ) ) {
    $gerte_name = mysqli_real_escape_string ( $db, $_POST['gerte_name'] );
    $gerte_beschreibung = mysqli_real_escape_string ( $db, $_POST['gerte_beschreibung'] );
    $gerte_kateg_id_ref = mysqli_real_escape_string ( $db, $_POST['gerte_kateg_id_ref'] );

    $sql = "INSERT INTO `tbl_gerichte` (
                            gerte_name,
                            gerte_beschreibung,
                            gerte_kateg_id_ref
                        )
                        VALUES
                        (
                            ?,
                            ?,
                            ?
                        )";

    $stmt = mysqli_prepare ($db,$sql);

    if( false === $stmt ) {
        echo get_db_error( $db, $sql );
    } else {
        //Werte und Datentypen an die Platzhalter (?) binden
        mysqli_stmt_bind_param ($stmt, 'ssi', $gerte_name, $gerte_beschreibung, $gerte_kateg_id_ref);//string string integer

        //Ausführung
        mysqli_stmt_execute($stmt);

        //Liefert die zuletzt hinzugefügte ID
        $id = mysqli_stmt_insert_id($stmt);

        echo '<p class="alert alert-success">';
        echo mysqli_affected_rows( $db );
        echo ' Datensatz wurde hinzugefügt<br>';
        echo 'Hinzugefügte ID: ' . $id.'</p>';

        mysqli_stmt_close($stmt);
    }
}

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">

    <h2>Neues Gericht anlegen</h2>

    <p>
        Name des Gerichtes:
        <input type="text" name="gerte_name">
    </p>

    <p>
        Beschreibung:<br>
        <textarea name="gerte_beschreibung"></textarea>
    </p>

    <p>
        Kategorie:<br>
        <select name="gerte_kateg_id_ref">

    <?php 
    
        $sql = "SELECT `kateg_id`,`kateg_name`
            FROM `tbl_kategorien`";
        $result = mysqli_query( $db, $sql );

        if( false === $result ) {
            echo get_db_error( $db, $sql );
        } else {
            while( $row = mysqli_fetch_assoc( $result ) ):
                 ?>

                    <option value="<?php echo $row['kateg_id']; ?>"><?php echo $row['kateg_name']; ?></option>

                 <?php 
                 endwhile;
        }

    ?>    

        </select>
    </p>

    <p>
        <button type="submit">Speichern</button>
    </p>

</form>
    
<?php 
mysqli_close($db);
get_footer(); ?>