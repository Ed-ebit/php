<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Master of Desaster',
    null,
    true,
    'MoD - Bestellung abschliessen',
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


if(isset($_POST['absenden'])):

    $vname=$_POST['vname'];
    $nname=$_POST['nname'];
    $strasse=$_POST['strasse'];
    $ort=$_POST['ort'];

    echo "<p>Vielen Dank, $vname $nname, für Ihre Bestellung!<br></p>";
    echo "<p>Wir senden die bestellten Artikel an folgende Adresse: <br>$strasse<br>ort</p>";

    /*=========Erzeugen der CSV-Datei========================================*/

    /*Überschriftenzeile für die CSV-Datei */

    $bestellung = "Art-Nr.;Artikel;Menge\r\n";

    /*bestellte Artikel für die CSV-Datei übernehmen */
    foreach($_SESSION as $art_nr =>$menge){
        if(str_starts_with($art_nr, 's')){
            $bestellung .= "$art_nr;";
            $bestellung .= $array_schoko[$art_nr].';';
            $bestellung .= "$menge\r\n";

        }
        if(str_starts_with($art_nr, 'p')){
            $bestellung .= "$art_nr;";
            $bestellung .= $array_pralinen[$art_nr].';';
            $bestellung .= "$menge\r\n";

        }
    }

    /*Adressdaten in die CSV-Datei <aufnehmen></aufnehmen>*/
    $bestellung .= "\r\nbestellt von:\r\n$vname;$nname;
    $strasse;$ort\r\n\r\n";

    /* CSV-Datei erstellen und / oder Bestellung hinzufügen*/
    if(file_put_contents('bestellung.csv', $bestellung, FILE_APPEND)){
        echo '<p class="alert alert-success">Die Bestelldaten wurden übermittelt.</p>';

        /*Session zerstören*/ 
        $SESSION = array();
        session_destroy();
    }else{
        echo '<p class="alert alert-danger">Die Bestelldaten konnten leider nicht übermittelt werden.<br> Bitte versuchen Sie es noch einmal!.</p>';
    }

else:
?>

<table class="table table-hover">
    <tr class="table-primary">
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

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
<div class="form-group">
    <label for="vname" class="form-label">Vorname</label>
    <input type="text" name="vname" id="vname" class="form-control">
</div>    

<div class="form-group">
    <label for="nname" class="form-label">Nachname</label>
    <input type="text" name="nname" id="nname" class="form-control">
</div>  

<div class="form-group">
    <label for="strasse" class="form-label">Straße</label>
    <input type="text" name="strasse" id="strasse" class="form-control">
</div>    

<div class="form-group">
    <label for="ort" class="form-label">Ort</label>
    <input type="text" name="ort" id="ort" class="form-control">
</div>

<button type="submit" name="absenden" class="btn btn-primary">verbindlich bestellen</button>

</form>

<?php endif; ?>
    
<?php get_footer(); ?>