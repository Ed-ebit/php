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
?>

<?php 

/* $_POST auslesen */
if (!empty($_POST)){
$eintrag = $_POST['id'];


/* DB-Abfrage*/

$sql = 'SELECT
    `posts_id`,
    `posts_autor_id_ref`,
    `posts_kateg_id_ref`,
    `posts_titel`,
    `posts_inhalt`,
    `posts_bild`,
    `autor_vorname`,
    `autor_nachname`,
    `autor_email`,
    `kateg_id`, 
    `kateg_name`
FROM
    `tbl_posts`
JOIN
    `tbl_autoren`
ON
    `posts_autor_id_ref` = `autor_id`
JOIN
    `tbl_kategorien`
ON
    `posts_kateg_id_ref`=`kateg_id`
WHERE
    `posts_id` LIKE '.$eintrag;

$result=mysqli_query($db,$sql);
if (!$result){
    echo get_db_error($db,$sql);
}
$erg=mysqli_fetch_assoc($result);

/* Testecke */

// echo 'Session-ID: '.session_id() .'<br>';
// echo 'Name der Session: '.session_name().'</p>';
// echo '<pre>', var_dump( $_SESSION ), '</pre>';
// echo '<pre>', var_dump( $_POST ), '</pre>'; 
echo '<pre>', var_dump( $erg ), '</pre>';

/*Session Array mit Abfragedaten zur weiteren Bearbeitung befüllen*/
$_SESSION['posts_titel'] = $erg['posts_titel'];
$_SESSION['posts_inhalt'] = $erg['posts_inhalt'];
$_SESSION['posts_bild'] = $erg['posts_bild'];
$_SESSION['posts_kateg_id_ref'] = $erg['posts_kateg_id_ref'];
$_SESSION['posts_autor_id_ref'] = $erg['posts_autor_id_ref'];
$_SESSION['posts_id'] = $erg['posts_id'];
$_SESSION['kateg_name'] = $erg['kateg_name'];

/* Variablen die Kontrollieren, dass der Bearbeiten-Button nur dem urspr. Autor zugänglich ist*/
if (isset($_SESSION['autor_id']) && $_SESSION['autor_id'] == $_SESSION['posts_autor_id_ref']){
        $bearb ="<div><button><a href='bearbeiten.php'>Bearbeiten</a></button></div>";
    } else {
        $bearb ="<div><p><b>Hier kann der eingeloggte Autor seinen Artikel bearbeiten</b></div>";  
    }
    

?>

<h1><?php echo $erg['posts_titel'] ?></h1>

<div>
    Kategorie: <?php echo $_SESSION['kateg_name'] ?>
</div>

<div>
    <?php echo $erg['posts_inhalt'] ?>
</div>

<img src="<?php echo $erg['posts_bild'] ?>" alt="Eintragsbild">

<?php echo $bearb ?>

<h4>Unser Autor:</h4>

<div>
    <?php echo $erg['autor_vorname'] ?>
    <?php echo $erg['autor_nachname'] ?>,<br>
    Kontakt: <?php echo $erg['autor_email'] ?>    
</div>

<?php } else {
    echo '<br><h3>Kein Eintrag gewählt</h3><br>';
    echo '<p><b>Bitte wählen Sie einen Eintrag zum betrachten auf der Startseite.</b></p>';
} ?>
<?php get_footer(); ?>