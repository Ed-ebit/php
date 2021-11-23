<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Dynamische Tabelle zum löschen',
    null,
    true,
    'Dynamische Tabelle zum löschen'
);
get_header( ...$args );
?>

<form action="04-db-delete.php" method="post">
    <table class="table">
        <tr>
            <th>Auswahl</th>
            <th>Kunde</th>
            <th>Ort</th>
        </tr>
    

<?php 
    
    $sql = 'SELECT
        	`bstlg_id`,
            `bstlg_vorname`,
            `bstlg_nachname`,
            `bstlg_ort`
        FROM
            `tbl_bestellung`';

    $result = mysqli_query($db,$sql);

    while($row = mysqli_fetch_assoc($result)): //assoziiertes Array, dessen Schlüssel die obigen bstlg_daten sind ?>

        <tr>
            <td>
                <input type="radio" name="auswahl" value="<?php echo $row['bstlg_id']; ?> ">
            </td>
            <td><?php echo $row['bstlg_vorname'].' '.$row['bstlg_nachname']; ?></td>
            <td><?php echo $row['bstlg_ort']; ?></td>
        </tr>
    
    <?php endwhile;?>

    </table>

    <button type="submit" class="btn btn-primary">Auswahl löschen</button>
</form>
    
<?php 
mysqli_close($db);
get_footer(); ?>