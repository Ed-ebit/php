<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Dynamische Tabelle zum löschen Ausführung',
    null,
    true,
    'Dynamische Tabelle zum löschen Ausführung'
);
get_header( ...$args );

$sql ='DELETE FROM `tbl_bestellung`
    WHERE `bstlg_id`= ' .$_POST['auswahl'];

    $result = mysqli_query($db, $sql);

    if(false===$result) {
        echo get_db_error($db,$sql);
    } else {
        $anzahl = mysqli_affected_rows($db);
        echo '<p class="alert alert-success">'.$anzahl.' Datensätze wurden gelöscht.</p>';
    }
mysqli_close($db);
?>
    
<?php get_footer(); ?>