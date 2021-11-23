<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Daten änder',
    null,
    true,
    'Änderung in eine DB eintragen'
);
get_header( ...$args );

$sql = 'UPDATE `tbl_bestellung`
    SET
        `bstlg_nachname` = "Meyer",
        `bstlg_menge` = 10
    Where /*Bedingung, damit dies nicht für alle Datensätze durchgeführt wird*/
        `bstlg_nachname`= "Schmidt"';

if ($result=mysqli_query($db,$sql)) {
    $anzahl=mysqli_affected_rows($db); // findet heraus, wie viele datensätze in unserer Abfrage geändert wurden
    echo "<p>$anzahl Datensätze wurden geändert.</p>";
}else{
    echo get_db_error($db, $sql);
}
mysqli_close($db);
?>
    
<?php get_footer(); ?>