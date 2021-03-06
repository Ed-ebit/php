<?php
session_start();
require_once( 'includes/functions.inc.php' );
$database = 'miniblog';
require_once( 'includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool$bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog!',
    array(
        'css/styles.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'
    ),
    true,
    null,
        array(
        'Home',
            array(
             $menuER =>'erstellen.php',
             $menuL=>'logout.php',
             $menuR=> 'regi.php',
             $menuE=> 'login.php',
             $user=>''
            )
        ),
    true    
);
get_header( ...$args );

/*Variablen*/

//Variable zum verstecken Anzahl gefundener Einträge
$sichtbarkeit='invisible';
//Zählvariable für Anzahl gefundener Einträge in jew. Kategorie
$treffer=0;
//Filtervariablen:
$filter = 0;
$filterAutor = '';
$btnMeineB = '';
$btnAlleB = '';

//Prüfen, ob ein Autor in der Session ist, Beitreage-button
if (isset ($_SESSION['autor_id'])) {
    $btnMeineB = "<button type='submit' name='meineB' >Meine Beiträge</button>";
    $btnAlleB = "<button type='submit' name='alleB' >Alle Beiträge</button>";
}

//Filter befüllen, Sichtbarkeit ändern:
if (!empty($_POST)){
    $_SESSION['Kategorie']=$_POST['Kategorie'];
    $sichtbarkeit='visible';
    if (isset($_POST['meineB'])){
        $_SESSION['meineB']=$_POST['meineB'];
        $_SESSION['alleB']=null;
    }
    if (isset($_POST['alleB'])){
        $_SESSION['alleB']=$_POST['alleB'];
        $_SESSION['meineB']=null;
    }
}
// Durch den Umweg über die Sessionvariablen merkt sich die Startseite, welche Filter aktiv sind
if (isset($_SESSION['Kategorie'])){
    $filter = $_SESSION['Kategorie'];
}
if (isset($_SESSION['meineB'])){
    $filterAutor = "WHERE `posts_autor_id_ref` LIKE $_SESSION[autor_id]";
}
if (isset($_SESSION['alleB'])){
    $filterAutor = '';
}

/* DB-Abfragen*/

$sql= 'SELECT 
    `posts_id`,
    `posts_autor_id_ref`,
    `posts_kateg_id_ref`,
    `posts_titel`,
    `posts_inhalt`,
    `posts_bild`
FROM 
    `tbl_posts`'
.$filterAutor.'';

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

?>

<h1>Herzlich willkommen zum Super-Miniblog!</h1>

<!-- Buttons eigene Beiträge/Alle Beiträge, nur für Autoren sichtbar -->
<div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div>
            <?php echo $btnMeineB;
                echo $btnAlleB; ?>
        </div>
<!-- Buttons Ende -->
        <div>
            <p>Bitte wählen Sie eine Kategorie zum Anzeigen</p>
            <select name="Kategorie">
                <option value="0">Alle</option>
                <?php 
                while($erg=mysqli_fetch_assoc($resultkat) ){
                    if ($erg['kateg_id']==$_SESSION['Kategorie']){//gemerkte Kategorieauswahl ist 'selected'
                        echo '<option value='.$erg['kateg_id'].' selected>'.$erg['kateg_name'].'</option>';
                    }
                    echo '<option value='.$erg['kateg_id'].'>'.$erg['kateg_name'].'</option>';
                } 
                ?>
            </select>
            <button type="submit">Filtern</button>
        </div>
    </form>
</div>

<div class="row">

<?php 
while($erg=mysqli_fetch_assoc($result) ): 
    //Kategorie-Filter
    if($filter == 0 || $filter == $erg['posts_kateg_id_ref']){
        $treffer++;
?>
    
    <div class="card border-0 col-md-6 col-lg-4 my-3">
        <form action="details.php" method="post">
            <h4 class="card-title"><button type="submit" name="id" value="<?php echo $erg['posts_id'] ?>"><?php echo ($erg['posts_titel']) ?> </button></h4>
        </form>
        <div class="card-body d-flex border">
            <img src="<?php echo $erg['posts_bild'] ?>" alt="Artikelbild" width="160" height="140">
            <p class="card-text "><?php echo substr($erg['posts_inhalt'],0,100).'...' ?> </p>
        </div>
    </div> 


<?php } endwhile; ?>
</div>



<p class="<?php echo $sichtbarkeit?>">Anzahl gefundener Einträge: <b><?php echo $treffer ?></b> </p>

<?php get_footer( false, true ); ?>