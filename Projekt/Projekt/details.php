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
        '<img src="https://icon-library.com/images/icon-for-blog/icon-for-blog-28.jpg" alt="miniblog" height="80px" width="80px">Home</img>',
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
// echo '<pre>', var_dump( $erg ), '</pre>';

/*Session Array mit Abfragedaten zur weiteren Bearbeitung befüllen*/
$_SESSION['posts_titel'] = $erg['posts_titel'];
$_SESSION['posts_inhalt'] = $erg['posts_inhalt'];
$_SESSION['posts_bild'] = $erg['posts_bild'];
$_SESSION['posts_kateg_id_ref'] = $erg['posts_kateg_id_ref'];
$_SESSION['posts_autor_id_ref'] = $erg['posts_autor_id_ref'];
$_SESSION['posts_id'] = $erg['posts_id'];
$_SESSION['kateg_name'] = $erg['kateg_name'];
$_SESSION['kateg_id'] = $erg['kateg_id'];

/* Variablen die Kontrollieren, dass der Bearbeiten-Button nur dem urspr. Autor zugänglich ist*/
if (isset($_SESSION['autor_id']) && $_SESSION['autor_id'] == $_SESSION['posts_autor_id_ref']){
        $bearb ="<div><button class='btn docfarbe'><a href='bearbeiten.php'>Bearbeiten</a></button></div>";
    } else {
        $bearb ="<div><p><b>Hier kann der eingeloggte Autor seinen Artikel bearbeiten</b></div>";  
    }
    

?>

<h1 class="mb-3"><?php echo $erg['posts_titel'] ?></h1>

<div class="nutzerfarbe">
    <h5>Kategorie: <?php echo $_SESSION['kateg_name'] ?> </h5>
</div>

<div class="m-3">
    <img class="hauptbild" src="<?php echo $erg['posts_bild'] ?>" alt="Eintragsbild"></img>
</div>
<div class="row justify-content-center">
    <div class="col-6"> 
        <p ><?php echo $erg['posts_inhalt'] ?></p>
    </div>
</div>



<?php echo $bearb ?>

<h5>Unser Autor:</h5>

<div>
    <?php echo $erg['autor_vorname'] ?>
    <?php echo $erg['autor_nachname'] ?>,<br>
    Kontakt: <?php echo $erg['autor_email'] ?>    
</div>

<?php } else {
    echo '<br><h3>Kein Eintrag gewählt</h3><br>';
    echo '<p><b>Bitte wählen Sie einen Eintrag zum betrachten auf der Startseite.</b></p>';
} ?>

<p class="text-center mt-2"><a class="nutzerfarbe" href="startseite.php"><b>Zurück zur Startseite</b></a></p>

<?php get_footer( false, true ); ?>