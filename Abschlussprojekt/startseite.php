<?php
require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog!',
    null,
    true,
    null,
        array(
        'Home',
            array(
            'Neuer Eintrag' =>'',
            'Einloggen' =>'',
            'Registrieren' =>''
            )
        ),
    true    
);
get_header( ...$args );

/* DB-Abfrage*/

$sql= 'SELECT 
    `posts_id`,
    `posts_autor_id_ref`,
    `posts_kateg_id_ref`,
    `posts_titel`,
    `posts_inhalt`,
    `posts_bild`
FROM `tbl_posts`';

if ($result=mysqli_query($db,$sql)){
    /*Abfrage war korrekt*/
    //echo '<pre>'. var_dump ($result).'</pre><p> <br> Abfrage war korrekt.</p>';
    //$erg=mysqli_fetch_assoc($result);
    //echo '<pre>'. var_dump ($erg).'</pre>';

}else{
    get_db_error($db,$sql);
}
// echo '<p>';
// echo '<pre>', var_dump( $_POST ), '</pre>';
// echo '</p>';

/*Variablen*/

//Variable zum verstecken einzelner Einträge
$sichtbarkeit='invisible';
//Zählvariable für Anzahl gefundener Einträge in jew. Kategorie
$treffer=0;
//Filtervariable:
$filter = 0;
//Filter befüllen, Sichtbarkeit ändern:
if (!empty($_POST)){
    $filter=$_POST['Kategorie'];
    $sichtbarkeit='visible';
}
?>

<h1>Herzlich willkommen zum Super-miniblog!</h1>
<div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <p>Bitte wählen Sie eine Kategorie zum Anzeigen</p>
            <select name="Kategorie">
                <option value= "0">Alle</option>
                <option value= "1">Sport</option>
                <option value= "2">Freizeit</option>
                <option value= "3">Karl</option>
                <option value= "4">Nich Karl</option>
            </select>
            <button type="submit">Filtern</button>
        </div>
    </form>
    <p class="<?php echo $sichtbarkeit?>">Anzahl gefundener Einträge: <b><?php echo $treffer ?></b> </p>
</div>

<?php 
while($erg=mysqli_fetch_assoc($result) ): 

    if($filter == 0 || $filter == $erg['posts_kateg_id_ref']){
        $treffer++;
?>
        <div>
            <h4><a href="#"><?php echo ($erg['posts_titel']) ?> </a></h4>
            <p><?php echo substr($erg['posts_inhalt'],0,50).'...' ?> </p>
        </div> 

<?php } endwhile; ?>
<p class="<?php echo $sichtbarkeit?>">Anzahl gefundener Einträge: <b><?php echo $treffer ?></b> </p>
<?php get_footer(); ?>