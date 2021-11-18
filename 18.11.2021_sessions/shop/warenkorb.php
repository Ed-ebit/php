<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Master of Desaster',
    null,
    true,
    'MoD - Warenkorb',
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
//echo '<pre>', var_dump( $_POST ), '</pre>';

if (isset($_POST['schokolade'])OR isset($_POST['pralinen'])) {
   // POST array durchlaufen... 
   foreach ($_POST as $art_nr => $menge) {
        //prüfen, ob $menge > 0
        if((int)$menge > 0) {
                //Menge in das Session-Array aufnehmen
                $_SESSION[$art_nr] = (int)$menge;
        } else {
            if(isset($_SESSION[$art_nr])) {
                unset($_SESSION[$art_nr]);
            }

        }
   }
}
//echo '<pre>', var_dump( $_SESSION ), '</pre>';
?>

<table class="table table-hover">
    <tr class="table-success">
        <th>Art.-Nr.</th>
        <th>Bezeichnung</th>
        <th>Menge</th>
    </tr>

    <?php foreach($_SESSION as $art_nr => $menge):  ?>

        <tr>
            <td><?php echo $art_nr; ?></td>
            <td>
                <?php 
                if(str_starts_with($art_nr, 's')){
                    echo $array_schoko[$art_nr];
                }
                if(str_starts_with($art_nr, 'p')){
                    echo $array_pralinen[$art_nr];
                }

                ?>
            </td>
            <td><?php echo $menge; ?></td>
        </tr>

    <?php endforeach; ?>
</table>

<p>Was möchten Sie nun TUN??</p>

<ul>
    <a href="schokolade.php"><button class="btn btn-primary">Schokoladenauswahl</button></a>
    <a href="pralinen.php"><button class="btn btn-primary">Pralinenauswahl</button></a>
    <a href="kasse.php"><button class="btn btn-primary">zur Kasse</button></a>
</ul>
    
<?php get_footer(); ?>