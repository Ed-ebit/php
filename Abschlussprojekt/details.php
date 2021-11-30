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
    `autor_email`
FROM
    `tbl_posts`
JOIN
    `tbl_autoren`
ON
    `posts_autor_id_ref` = `autor_id`
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

?>

<h1><?php echo $erg['posts_titel'] ?></h1>

<div>
    <?php echo $erg['posts_inhalt'] ?>
</div>

<img src="<?php echo $erg['posts_bild'] ?>" alt="Eintragsbild">

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