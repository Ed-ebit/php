<?php
session_start();
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
            'Neuer Eintrag' =>'erstellen.php',
             $menuL=>'logout.php',
             $menuR=> 'regi.php',
             $menuE=> 'login.php'
            )
        ),
    true    
);
get_header( ...$args );

/* DB-Abfragen*/

$sql= 'SELECT 
    `posts_id`,
    `posts_autor_id_ref`,
    `posts_kateg_id_ref`,
    `posts_titel`,
    `posts_inhalt`,
    `posts_bild`
FROM 
    `tbl_posts`';
//Eigene Abfrage für Erstellung der Filteroptionen nach Kategorie
$sqlkat= 'SELECT
    `kateg_id`,
    `kateg_name`
FROM
    `tbl_kategorien`';

$result=mysqli_query($db,$sql);
$resultkat=mysqli_query($db,$sqlkat);
if (!$result && !$resultkat){
    echo get_db_error($db,$sql);
}

/*Testecke*/

// $erg=mysqli_fetch_assoc($result);
// echo '<pre>'. var_dump ($erg).'</pre>';
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
                <option value="0">Alle</option>
                <?php 
                while($erg=mysqli_fetch_assoc($resultkat) ){
                    echo '<option value='.$erg['kateg_id'].'>'.$erg['kateg_name'].'</option>';
                } 
                ?>
            </select>
            <button type="submit">Filtern</button>
        </div>
    </form>
</div>

<?php 
while($erg=mysqli_fetch_assoc($result) ): 

    if($filter == 0 || $filter == $erg['posts_kateg_id_ref']){
        $treffer++;
?>
        <div>
            <form action="details.php" method="post">
                <h4><button type="submit" name="id" value="<?php echo $erg['posts_id'] ?>"><?php echo ($erg['posts_titel']) ?> </button></h4>
            </form>
            <p><?php echo substr($erg['posts_inhalt'],0,100).'...' ?> </p>
        </div> 

<?php } endwhile; ?>

<p class="<?php echo $sichtbarkeit?>">Anzahl gefundener Einträge: <b><?php echo $treffer ?></b> </p>

<?php get_footer(); ?>