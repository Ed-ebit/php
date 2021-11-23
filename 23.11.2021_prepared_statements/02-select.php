<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sichere SELECTs',
    NULL,
    true
);
get_header( ...$args );
require_once( '../includes/db-connect.inc.php' );

$suche = "%Kichererbsen%";

$sql = 'SELECT
    gerte_name,
    gerte_beschreibung
FROM tbl_gerichte
WHERE gerte_beschreibung LIKE ?';

if($stmt = mysqli_prepare ($db,$sql)){
    //Variable an den Platzhalter binden
    mysqli_stmt_bind_param($stmt, 's',$suche);// s: String Datentyp
    //Ausführen der Verknüpfung und der Abfrage
    mysqli_stmt_execute($stmt);
    //Füllen der Ergebnisse in Variablen
    mysqli_stmt_bind_result($stmt,$gerte_name, $gerte_beschreibung);

 ?>
    <table class="table">
        <tr>
            <th>Gerichte</th>
            <th>Beschreibung</th>
        </tr>

        <?php while( mysqli_stmt_fetch($stmt) ): ?>
            <tr>
                <td><?php echo $gerte_name; ?></td>
                <td><?php echo $gerte_beschreibung; ?></td>
            </tr>

        <?php endwhile;
        
        ?>
    </table>
<?php
mysqli_stmt_close($stmt);
} else{
    echo get_db_error($db,$sql);
}
mysqli_close($db);

?>
    
<?php get_footer(); ?>