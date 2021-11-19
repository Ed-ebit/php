<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Master of Desaster',
    null,
    true,
    'MoD - Schokolade',
        array(
            '<img src="img/master-of-disaster-sticker.jpg" alt="Master of Desaster" width=90 height=80 >',
            array(
                'Start'=>'index.php',
                'Pralinen'=>'pralinen.php',
                'Schokolade'=>'schokolade.php',
                'Warenkorb'=>'warenkorb.php',
            )
        )
    );


include 'shop_artikel.php';
get_header( ...$args );
?>

<form action="warenkorb.php" method="post">

<table class="table table-hover">
    <tr class="table-warning">
        <th>Art.-Nr.</th>
        <th>Bezeichnung</th>
        <th>Menge</th>
        <th>Einheit</th>
    </tr>

    <?php foreach($array_schoko as $art_nr => $bez): ?>

        <?php $menge = isset($_SESSION[$art_nr]) ? $_SESSION[$art_nr] :0; ?>
        <?php 
        /*Folgender Code funkt nur in Zusammenhang mit dem Bearbeiten-button aus dem Warenkorn*/

        $focus='';
        if(isset($_GET['edit']) && $art_nr === $_GET['edit']) {
            $focus = 'autofocus';// autofocus:boolsches element, true oder false
        }
        ?>
        <tr>
            <td><?php echo $art_nr ?> </td>
            <td><?php echo $bez ?></td>
            <td>
                <input type="number" name="<?php echo $art_nr; ?>" value="<?php echo $menge; ?>" size="5"<?php echo $focus;?> >
            </td>
            <td>Tafel von 100g</td>
        </tr>

    <?php endforeach; ?>

        <tr>
            <td colspan="4">
                <input type="submit" name="schokolade" value="In den Warenkorb" class="btn btn-primary">
                <input type="reset" value="abbrechen" class="btn btn-secondary">
            </td>

        </tr>

</table>


</form>
    
<?php get_footer(); ?>