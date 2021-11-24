<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Tabellenbeziehungen',
    NULL,
    true 
);
get_header( ...$args );

$sql = 'SELECT
    gerte_id,
    gerte_name,
    gerte_beschreibung,
    gerte_kateg_id_ref,
    kateg_id,
    kateg_name
FROM
    tbl_gerichte
JOIN
    tbl_kategorien
ON 
    (gerte_kateg_id_ref = kateg_id)';

$result = mysqli_query($db, $sql);
if (false === $result) {
    echo get_db_error($db,$sql);
} else { ?>
<table class="table">
    <tr>
        <th>Gericht</th>
        <th>Beschreibung</th>
        <th>Kategorie</th>
    </tr>
<?php while ($row = mysqli_fetch_assoc($result)):?>
    <tr>
        <td><?php echo $row['gerte_name']; ?> </td>
        <td><?php echo $row['gerte_beschreibung']; ?> </td>
        <td><?php echo $row['kateg_name']; ?> </td>
    </tr>
<?php endwhile; ?>
</table>

<?php
}

?>
    
<?php get_footer(); ?>